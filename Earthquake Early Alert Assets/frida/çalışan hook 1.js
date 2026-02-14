// hook_fcm_auto.js
Java.perform(function () {
  var targetClassName = "com.finazzi.distquake.MyFirebaseMessagingService";
  var cls = null;

  try {
    cls = Java.use(targetClassName);
    console.log("[*] Loaded target class: " + targetClassName);
  } catch (e) {
    console.log("[!] Cannot Java.use(" + targetClassName + "): " + e);
    // fallback: enumerate loaded classes containing 'distquake' veya 'finazzi'
    console.log("[*] Enumerating loaded classes for hints...");
    Java.enumerateLoadedClasses({
      onMatch: function (aClass) {
        if (
          aClass.indexOf("distquake") !== -1 ||
          aClass.indexOf("finazzi") !== -1
        ) {
          console.log("[=] Candidate: " + aClass);
        }
      },
      onComplete: function () {},
    });
    return;
  }

  // List fields
  try {
    var fields = cls.class.getDeclaredFields();
    console.log("[*] Declared fields (" + fields.length + "):");
    for (var i = 0; i < fields.length; i++) {
      try {
        console.log("    " + fields[i].toString());
      } catch (ee) {}
    }
  } catch (e) {}

  // List methods (declaration string)
  try {
    var methods = cls.class.getDeclaredMethods();
    console.log("[*] Declared methods (" + methods.length + "):");
    for (var i = 0; i < methods.length; i++) {
      try {
        var ms = methods[i].toString();
        console.log("    " + ms);
      } catch (ee) {}
    }
  } catch (e) {
    console.log("[!] Could not list declared methods: " + e);
  }

  // Candidate method names to try hooking
  var candidates = [
    "c",
    "onMessageReceived",
    "onMessage",
    "handleMessage",
    "a",
    "b",
    "processMessage",
  ];

  var hooked = {};

  function tryHookByName(name) {
    try {
      if (typeof cls[name] === "undefined") {
        // Sometimes method exists only as overloads property names or different mangling
        console.log("[..] No direct member '" + name + "' on class wrapper.");
        return false;
      }
      var overloads = cls[name].overloads;
      if (!overloads || overloads.length === 0) {
        console.log(
          "[..] '" + name + "' exists but has no overloads property."
        );
        return false;
      }
      console.log(
        "[*] Hooking method '" +
          name +
          "' (" +
          overloads.length +
          " overload(s))"
      );
      for (var oi = 0; oi < overloads.length; oi++) {
        (function (oi) {
          overloads[oi].implementation = function () {
            try {
              console.log(
                "\n=== HOOK: " + name + " (overload " + oi + ") called ==="
              );
              // Dump arguments
              for (var ai = 0; ai < arguments.length; ai++) {
                var a = arguments[ai];
                try {
                  if (a === null) {
                    console.log(" arg[" + ai + "] = null");
                  } else {
                    // Try some useful introspection for RemoteMessage-like object or bundle
                    var s = "";
                    try {
                      s = a.toString();
                    } catch (e) {
                      s = "<toString error>";
                    }
                    console.log(
                      " arg[" +
                        ai +
                        "] type=" +
                        (a.$className || typeof a) +
                        " toString=" +
                        s
                    );
                    // Try to access known fields used in decompiled code: f15097b, f15096a
                    try {
                      if (a.hasOwnProperty && a.hasOwnProperty("f15097b")) {
                        console.log("  -> has f15097b: " + a.f15097b);
                      }
                    } catch (ee) {}
                    try {
                      if (a.f15097b) {
                        try {
                          console.log(
                            "  f15097b.toString(): " + a.f15097b.toString()
                          );
                        } catch (e) {}
                      }
                    } catch (e) {}
                    // Try getData() (RemoteMessage)
                    try {
                      if (a.getData) {
                        var data = a.getData();
                        try {
                          console.log("  getData() => " + data.toString());
                        } catch (ee) {
                          // try enumerating keys if it's a map/bundle-like
                          try {
                            var keySet = data.keySet();
                            var itr = keySet.iterator();
                            while (itr.hasNext()) {
                              var k = itr.next();
                              var v = data.get(k);
                              console.log("    data[" + k + "] = " + v);
                            }
                          } catch (err) {}
                        }
                      }
                    } catch (e) {}
                    // If it's a Bundle-like (android.os.Bundle)
                    try {
                      if (
                        a.getClass &&
                        a.getClass().getName &&
                        a.getClass().getName().indexOf("android.os.Bundle") !==
                          -1
                      ) {
                        var ks = a.keySet().toArray();
                        for (var kI = 0; kI < ks.length; kI++) {
                          var key = ks[kI];
                          console.log(
                            "    bundle[" + key + "] = " + a.get(key)
                          );
                        }
                      }
                    } catch (e) {}
                  }
                } catch (argErr) {
                  console.log("  (arg dump error) " + argErr);
                }
              }
            } catch (outer) {
              console.log("[!] Hook handler error: " + outer);
            }
            // Call original
            return this[name].apply(this, arguments);
          };
        })(oi);
      }
      hooked[name] = true;
      return true;
    } catch (err) {
      console.log("[!] Failed to hook '" + name + "': " + err);
      return false;
    }
  }

  // Try candidates first
  var anyHooked = false;
  for (var i = 0; i < candidates.length; i++) {
    var nm = candidates[i];
    if (tryHookByName(nm)) {
      anyHooked = true;
    }
  }

  // Fallback: inspect declared methods and try to hook those whose signature mentions RemoteMessage, q, or 'Bundle'
  try {
    var declared = cls.class.getDeclaredMethods();
    for (var i = 0; i < declared.length; i++) {
      try {
        var sig = declared[i].toString();
        if (
          sig.indexOf("RemoteMessage") !== -1 ||
          sig.indexOf("q ") !== -1 ||
          sig.indexOf("android.os.Bundle") !== -1 ||
          sig.indexOf("com.google.firebase") !== -1
        ) {
          var methodName = declared[i].getName();
          if (!hooked[methodName]) {
            console.log(
              "[*] Fallback trying to hook method by name: " +
                methodName +
                " because signature matched: " +
                sig
            );
            tryHookByName(methodName);
            anyHooked = anyHooked || !!hooked[methodName];
          }
        }
      } catch (ee) {}
    }
  } catch (e) {}

  if (!anyHooked) {
    console.log("\n[!] Uyarı: Hiçbir metot hooklanamadı otomatik yollardan.");
    console.log("[*] Yapılacaklar:");
    console.log(
      "    - Yukarıdaki 'Declared methods' listesine bak ve FCM/Message işleyen metoda karar ver."
    );
    console.log(
      "    - Eğer metod adı obfuscate ise (ör. tek harf), o isimle tekrar deneyebilirsin."
    );
    console.log(
      "    - Alternatif: sınıf adını enumerateLoadedClasses ile doğrula veya uygulamayı rebuild edip ProGuard haritası varsa kullan."
    );
  } else {
    console.log("[*] Hook kuruldu. Gelen çağrılarda konsola dump düşecek.");
  }
});
// hook_fcm_auto.js
Java.perform(function () {
  var targetClassName = "com.finazzi.distquake.MyFirebaseMessagingService";
  var cls = null;

  try {
    cls = Java.use(targetClassName);
    console.log("[*] Loaded target class: " + targetClassName);
  } catch (e) {
    console.log("[!] Cannot Java.use(" + targetClassName + "): " + e);
    // fallback: enumerate loaded classes containing 'distquake' veya 'finazzi'
    console.log("[*] Enumerating loaded classes for hints...");
    Java.enumerateLoadedClasses({
      onMatch: function (aClass) {
        if (
          aClass.indexOf("distquake") !== -1 ||
          aClass.indexOf("finazzi") !== -1
        ) {
          console.log("[=] Candidate: " + aClass);
        }
      },
      onComplete: function () {},
    });
    return;
  }

  // List fields
  try {
    var fields = cls.class.getDeclaredFields();
    console.log("[*] Declared fields (" + fields.length + "):");
    for (var i = 0; i < fields.length; i++) {
      try {
        console.log("    " + fields[i].toString());
      } catch (ee) {}
    }
  } catch (e) {}

  // List methods (declaration string)
  try {
    var methods = cls.class.getDeclaredMethods();
    console.log("[*] Declared methods (" + methods.length + "):");
    for (var i = 0; i < methods.length; i++) {
      try {
        var ms = methods[i].toString();
        console.log("    " + ms);
      } catch (ee) {}
    }
  } catch (e) {
    console.log("[!] Could not list declared methods: " + e);
  }

  // Candidate method names to try hooking
  var candidates = [
    "c",
    "onMessageReceived",
    "onMessage",
    "handleMessage",
    "a",
    "b",
    "processMessage",
  ];

  var hooked = {};

  function tryHookByName(name) {
    try {
      if (typeof cls[name] === "undefined") {
        // Sometimes method exists only as overloads property names or different mangling
        console.log("[..] No direct member '" + name + "' on class wrapper.");
        return false;
      }
      var overloads = cls[name].overloads;
      if (!overloads || overloads.length === 0) {
        console.log(
          "[..] '" + name + "' exists but has no overloads property."
        );
        return false;
      }
      console.log(
        "[*] Hooking method '" +
          name +
          "' (" +
          overloads.length +
          " overload(s))"
      );
      for (var oi = 0; oi < overloads.length; oi++) {
        (function (oi) {
          overloads[oi].implementation = function () {
            try {
              console.log(
                "\n=== HOOK: " + name + " (overload " + oi + ") called ==="
              );
              // Dump arguments
              for (var ai = 0; ai < arguments.length; ai++) {
                var a = arguments[ai];
                try {
                  if (a === null) {
                    console.log(" arg[" + ai + "] = null");
                  } else {
                    // Try some useful introspection for RemoteMessage-like object or bundle
                    var s = "";
                    try {
                      s = a.toString();
                    } catch (e) {
                      s = "<toString error>";
                    }
                    console.log(
                      " arg[" +
                        ai +
                        "] type=" +
                        (a.$className || typeof a) +
                        " toString=" +
                        s
                    );
                    // Try to access known fields used in decompiled code: f15097b, f15096a
                    try {
                      if (a.hasOwnProperty && a.hasOwnProperty("f15097b")) {
                        console.log("  -> has f15097b: " + a.f15097b);
                      }
                    } catch (ee) {}
                    try {
                      if (a.f15097b) {
                        try {
                          console.log(
                            "  f15097b.toString(): " + a.f15097b.toString()
                          );
                        } catch (e) {}
                      }
                    } catch (e) {}
                    // Try getData() (RemoteMessage)
                    try {
                      if (a.getData) {
                        var data = a.getData();
                        try {
                          console.log("  getData() => " + data.toString());
                        } catch (ee) {
                          // try enumerating keys if it's a map/bundle-like
                          try {
                            var keySet = data.keySet();
                            var itr = keySet.iterator();
                            while (itr.hasNext()) {
                              var k = itr.next();
                              var v = data.get(k);
                              console.log("    data[" + k + "] = " + v);
                            }
                          } catch (err) {}
                        }
                      }
                    } catch (e) {}
                    // If it's a Bundle-like (android.os.Bundle)
                    try {
                      if (
                        a.getClass &&
                        a.getClass().getName &&
                        a.getClass().getName().indexOf("android.os.Bundle") !==
                          -1
                      ) {
                        var ks = a.keySet().toArray();
                        for (var kI = 0; kI < ks.length; kI++) {
                          var key = ks[kI];
                          console.log(
                            "    bundle[" + key + "] = " + a.get(key)
                          );
                        }
                      }
                    } catch (e) {}
                  }
                } catch (argErr) {
                  console.log("  (arg dump error) " + argErr);
                }
              }
            } catch (outer) {
              console.log("[!] Hook handler error: " + outer);
            }
            // Call original
            return this[name].apply(this, arguments);
          };
        })(oi);
      }
      hooked[name] = true;
      return true;
    } catch (err) {
      console.log("[!] Failed to hook '" + name + "': " + err);
      return false;
    }
  }

  // Try candidates first
  var anyHooked = false;
  for (var i = 0; i < candidates.length; i++) {
    var nm = candidates[i];
    if (tryHookByName(nm)) {
      anyHooked = true;
    }
  }

  // Fallback: inspect declared methods and try to hook those whose signature mentions RemoteMessage, q, or 'Bundle'
  try {
    var declared = cls.class.getDeclaredMethods();
    for (var i = 0; i < declared.length; i++) {
      try {
        var sig = declared[i].toString();
        if (
          sig.indexOf("RemoteMessage") !== -1 ||
          sig.indexOf("q ") !== -1 ||
          sig.indexOf("android.os.Bundle") !== -1 ||
          sig.indexOf("com.google.firebase") !== -1
        ) {
          var methodName = declared[i].getName();
          if (!hooked[methodName]) {
            console.log(
              "[*] Fallback trying to hook method by name: " +
                methodName +
                " because signature matched: " +
                sig
            );
            tryHookByName(methodName);
            anyHooked = anyHooked || !!hooked[methodName];
          }
        }
      } catch (ee) {}
    }
  } catch (e) {}

  if (!anyHooked) {
    console.log("\n[!] Uyarı: Hiçbir metot hooklanamadı otomatik yollardan.");
    console.log("[*] Yapılacaklar:");
    console.log(
      "    - Yukarıdaki 'Declared methods' listesine bak ve FCM/Message işleyen metoda karar ver."
    );
    console.log(
      "    - Eğer metod adı obfuscate ise (ör. tek harf), o isimle tekrar deneyebilirsin."
    );
    console.log(
      "    - Alternatif: sınıf adını enumerateLoadedClasses ile doğrula veya uygulamayı rebuild edip ProGuard haritası varsa kullan."
    );
  } else {
    console.log("[*] Hook kuruldu. Gelen çağrılarda konsola dump düşecek.");
  }
});
