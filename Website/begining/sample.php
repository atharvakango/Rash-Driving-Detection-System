<?php
require __DIR__ . '/vendor/autoload.php';
use Kreait\Firebase\Factory;
use Kreait\Firebase\ServiceAccount;

$serviceAccount = ServiceAccount::fromJsonFile(__DIR__.'/php-tutorial-e893d-firebase-adminsdk-hk12l-124051df9e.json');
$firebase = (new Factory)
    ->withServiceAccount($serviceAccount)
    ->create();
$database = $firebase->getDatabase();

$reference = $database->getReference('user/user1/sensor2');
$snapshot=$reference->getSnapshot();
echo gettype($snapshot);
//echo $snapshot;
echo $snapshot->getKey();
$value1=$snapshot->getValue();

//$value=$snapshot->getChildKeys();
echo gettype($value1);
/*//echo $value1;
//echo $value1->get();
$len=count($value1);
$time_array=array();
*/
$time_array=array();
$radius=1;
foreach ($value1 as $key => $value) {
  echo "<br>";
  //echo nl2br($key);
  $str='user/user1/sensor2/'.$key;
  $reference1=$database->getReference($str);
  $snapshot1=$reference1->getSnapshot();
  array_push($time_array,$reference1->getKey());
  $radius=$reference1->getValue();
}
for($i=1;$i<sizeof($time_array);$i++)
{
  echo $time_array[$i];
  //echo (2*3.14*$radius)/($time_array[$i]-$time_array[$i-1]);
}

//Code for sensor1
/*$reference = $database->getReference('user/user1/sensor1');
$snapshot=$reference->getSnapshot();
echo gettype($snapshot);
//echo $snapshot;
echo $snapshot->getKey();

$value1=$snapshot->getValue();

//$value=$snapshot->getChildKeys();
echo gettype($value1);
//echo $value1;
//echo $value1->get();
$len=count($value1);
$time_array=array();
foreach ($value1 as $key => $value) {
  echo "<br>";
  //echo nl2br($key);
  $str='user/user1/sensor1/'.$key;
  $reference1=$database->getReference($str);
  $snapshot1=$reference1->getSnapshot();
  echo $reference1->getChild('latitude')->getValue();
}
*/
?>
