console.log(">>>> Initialisation <<<<");

Java.perform(function () {
  let service = Java.use("com.finazzi.distquake.MyFirebaseMessagingService");

  if (!service.c && service.c.overloads.length != 1) return;

  service.c.overloads[0].implementation = function (message) {
    console.log("\n>>>> Firebase Messaging Service Call <<<<");

    let wh = message.getClass().getDeclaredFields()[1].get(message);
    // JSON.parse(wh.substring(7));
    console.log(wh);

    return service.c.overloads[0].call(this, message);
  };
});
