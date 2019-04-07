//(function(){
var config = {
  apiKey: "AIzaSyD_A_ZdxofoM78Ud7y4jP1UhWNo3PNbPHc",
   authDomain: "php-tutorial-e893d.firebaseapp.com",
   databaseURL: "https://php-tutorial-e893d.firebaseio.com",
   projectId: "php-tutorial-e893d",
   storageBucket: "php-tutorial-e893d.appspot.com",
   messagingSenderId: "1044268116231"

 };
 firebase.initializeApp(config);
//	var preobject=document.getElementById('object');
	//var list=document.getElementById('list');

  ref=firebase.database().ref();
var longitude1=new Array();
var latitude1=new Array();
var key=new Array();
var speed1=new Array();
var speeds=new Array();
var timex=new Array();
timex.push(0);
var radius;
var mutex=0;

      ref.on("value", function(snapshot) {
      (snapshot.child('user').child('user1').child('sensor2').forEach(function (childSnapshot) {
              var value = childSnapshot.val();
              var xx=childSnapshot.key;
              timex.push(xx);
              radius=childSnapshot.val();
              mutex=1;
          }));
    }, function (error) {
       console.log("Error: " + error.code);
    })
      ref.on("value", function(snapshot) {
      (snapshot.child('user').child('user1').child('sensor1').forEach(function (childSnapshot) {
      var value = childSnapshot.val();
      //  console.log(value.longitude);
      //  console.log(value.latitude);
      key.push(childSnapshot.key);
      longitude1.push( value.longitude);   // console.log("Title is : " +);
      latitude1.push(value.latitude);
      mutex=2;
      speed1.push(10);
      }));
    }, function (error) {
       console.log("Error: " + error.code);
    });
    console.log(timex.length);
    for(i=1;i<timex.length-1;i++)
    {
      speeds[i]=timex[i]-timex[i-1];
      speeds[i]=(((radius*3.14*2)/speeds[i-1])*18)/5;
    }
      var expected;
      for(i=1;i<speeds.length;i++)
      {
        if(key[i]==timex[i])
        {
          if(speeds[i]>speed1[i])
            expected=expected+1;
        }
      }

execute();

  //console.log(speeds);
  //console.log(speed1);
  //console.log(expected);
//  console.log(longitude1);
  //console.log(latitude1);
//	var dbRefObject = firebase.database().ref().child('object');
//	var dbRelist=dbRefObject.child('favnumber').val();
//  document.write(dbRelist);
//  console.log(dbRelist);
	/*dbRefObject.on('value',snap=>{
		preobject.innerText=JSON.stringify(snap.val(),null,3);
		});
    document.write(snap.val());
	dbRelist.on('child_added',snap=>console.log(snap.val()));*/
//});
