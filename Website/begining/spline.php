<?php
require  __DIR__.'/vendor/autoload.php';
use Kreait\Firebase\Factory;
use Kreait\Firebase\ServiceAccount;

$serviceAccount=ServiceAccount::fromJsonFile(__DIR__.'/php-tutorial-e893d-firebase-adminsdk-hk12l-124051df9e.json');

$firebase=(new Factory)
    ->withServiceAccount($serviceAccount)
    ->create();

  $database=$firebase->getDatabase();
  $reference1=$database->getReference('user/user1/speed');
  $snapshot1=$reference1->getSnapshot();
  $value1=$snapshot1->getValue();
  //$key1=$value1->getKeys();
  $actual_speed=array();
  foreach ($value1 as $key => $value) {
    $str1="user/user1/speed";
    $str1=$str1."/".$key;
    $database2=$firebase->getDatabase();
    $reference2=$database2->getReference($str1);
    $snapshot2=$reference2->getSnapshot();
    $key2=$snapshot2->getValue();
    array_push($actual_speed,$key2);
  }
  /*$tot=count($actual_speed);
  for($i=0;$i<$tot;$i++)
  {
    echo nl2br($actual_speed[$i]."\n");
  }
  */
  $expected_speed=array();
  $a=array();
  $start1=70;
  for($i=0;$i<count($actual_speed);$i++)
  {
    array_push($a,$start1);
    $start1=$start1+5;
  }
  for($i=0;$i<count($actual_speed);$i++)
  {
      echo $a[$i];
  }
  /*$a[0]=70;
  $a[1]=75;
  $a[2]=80;
  $a[3]=85;
  $a[4]=90;
  $a[5]=95;
  $a[6]=70;
  $a[7]=75;*/
  for($i=0;$i<count($actual_speed);$i++)
  {
    array_push($expected_speed,$a[$i]);
  }
  $per_of_actual_speed=0;
  $per_of_expected_speed=0;
//------------------------------------------------------------------------------------------------------------------------
  //Calculation of Percentage of Actual Speed And Expected Speed
  for($i=0;$i<count($actual_speed);$i++)
  {
    if($actual_speed[$i]>$expected_speed[$i])
      $per_of_actual_speed=$per_of_actual_speed+1;
  }
//  echo "per actual speed".$per_of_actual_speed;
$per_of_expected_speed=count($actual_speed)-$per_of_actual_speed;

$per_of_actual_speed=($per_of_actual_speed/count($actual_speed))*100;
$per_of_expected_speed=($per_of_expected_speed/count($actual_speed))*100;

//-------------------------------------------------------------------------------------------------------------------------
   function CreateArray($actual_speed_array,$expected_speed_array)
  {
    $length_array=count($actual_speed_array);
    $final_array=array();
    for ($i=0; $i <$length_array ; $i++) {
      {
        array_push($final_array,array("x"=>$actual_speed_array[$i],"y"=>$expected_speed_array[$i]));
      //echo  $final_array[$i]['x'];
    //echo   $final_array[$i]['y'];

      }
    }
    return $final_array;
  }
  $returned_array=array();
  $returned_array=CreateArray($actual_speed,$expected_speed);
/*
  for($i=0;$i<count($returned_array);$i++)
  {
    echo nl2br($returned_array[$i][0]." ".$returned_array[$i][1]."\n");
  }*/
  //  echo $key;
  //}
  $dataPoints=$returned_array;
  $dataPoints2=array(array("label"=>"Bad","y"=>$per_of_actual_speed),
                    array("label"=>"Good","y"=>$per_of_expected_speed)
                  );
?>
<!DOCTYPE HTML>
<html>
<head>
<script>
window.onload = function () {

var chart = new CanvasJS.Chart("chartContainer", {
	animationEnabled: true,
	title:{
		text: "Speed Graph"
	},
  axisX:{
    title:"Actual Speed",
    minimum:58,
    interval:2,

    suffix: "m/s"
  },
	axisY: {
		title: "Expected Speed",
	//	valueFormatString: "#0,,.",
    minimum:58,
    interval:2,
    suffix: "m/s",
	//	prefix: "$"
	},
	data: [{
		type: "spline",
		markerSize: 5,
	//	xValueFormatString: "YYYY",
//		yValueFormatString: "$#,##0.##",
		//xValueType: "",
		dataPoints: <?php echo json_encode($returned_array, JSON_NUMERIC_CHECK); ?>
	}]
});

chart.render();

var chart = new CanvasJS.Chart("chartContainer1", {
	theme: "light2",
	animationEnabled: true,
	title: {
		text: "Percentage of Exceded speed and expected speed"
	},
	data: [{
		type: "pie",
		indexLabel: "{y}",
		yValueFormatString: "#,##0.00\"%\"",
		indexLabelPlacement: "inside",
		indexLabelFontColor: "#36454F",
		indexLabelFontSize: 18,
		indexLabelFontWeight: "bolder",
		showInLegend: true,
		legendText: "{label}",
		dataPoints: <?php echo json_encode($dataPoints2, JSON_NUMERIC_CHECK); ?>
	}]
});
chart.render();
}
</script>
</head>
<body>
<div id="chartContainer" style="height: 500px; width: 100%;"></div>
<div id="chartContainer1" style="height: 370px; width: 100%;"></div>
<script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
</body>
</html>
