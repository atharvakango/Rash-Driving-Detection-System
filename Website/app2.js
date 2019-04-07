  // Initialize Firebase
var request=require('request');
  var config = {
    apiKey: "AIzaSyD_A_ZdxofoM78Ud7y4jP1UhWNo3PNbPHc",
    authDomain: "php-tutorial-e893d.firebaseapp.com",
    databaseURL: "https://php-tutorial-e893d.firebaseio.com",
    projectId: "php-tutorial-e893d",
    storageBucket: "php-tutorial-e893d.appspot.com",
    messagingSenderId: "1044268116231"
  };
  firebase.initializeApp(config);
  var ref=firebase.database().ref();
  var time=new Array();
  var radius;

  var step1=function(){
    ref.on("value", function(snapshot) {
    (snapshot.child('user').child('user1').child('sensor2').forEach(function (childSnapshot) {
            var value = childSnapshot.val();
            var key=childSnapshot.key;
            radius=key
            time.push(key);
            console.log(key);
            console.log(value);

        }));
  }, function (error) {
     console.log("Error: " + error.code);
   })
  }
  var step2=function() {
  request(step1,function(){
    console.log(radius);
    console.log(time);
  })
}
step1();
step2();
  console.log("Hello");
