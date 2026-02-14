console.log("INIT");

Java.perform(function () {
  try {
    const cls = Java.use("com.finazzi.distquake.MyFirebaseMessagingService");

    if (!cls.c) return;

    cls.c.overloads.forEach(function (over) {
      over.implementation = function (arg0) {
        console.log(
          "\n>>>> [FCM] FirebaseMessagingService.c() call <<<<"
        );

        try {
          if (arg0 === null) {
            console.log(" arg0 = null");
          } else {
            console.log(" arg0 type: " + arg0.$className);

            // pd.q sınıfının alanlarını dump et
            try {
              const clazz = arg0.getClass();
              console.log(" [*] Dumping fields of: " + clazz.getName());
              const fields = clazz.getDeclaredFields();
              for (let i = 0; i < fields.length; i++) {
                const f = fields[i];
                f.setAccessible(true);
                try {
                  const name = f.getName();
                  const value = f.get(arg0);
                  console.log("# " + name + " = " + value);
                } catch (fe) {
                  console.log(
                    "    " + f.getName() + " (error reading: " + fe + ")"
                  );
                }
              }
            } catch (error) {
              console.log(">>>> ERROR | " + error);
            }

            // Deneme: getData() metodu varsa (RemoteMessage benzeri)
            try {
              if (arg0.getData) {
                const data = arg0.getData();
                console.log(">>>> arg0.getData() EXISTS <<<<");
                const keySet = data.keySet().toArray();
                for (let j = 0; j < keySet.length; j++) {
                  const k = keySet[j];
                  const v = data.get(k);
                  console.log("    " + k + ": " + v);
                }
              }
            } catch (error) {}
          }
        } catch (error) {
          console.log(">>>> ERROR | " + error);
        }

        console.log(">>>> [FCM] FirebaseMessagingService.c() end <<<<");
        return over.call(this, arg0);
      };
    });
  } catch (error) {
    console.log(">>>> ERROR | " + error);
  }
});
