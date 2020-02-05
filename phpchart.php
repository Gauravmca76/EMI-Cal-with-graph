<?php
session_start();
error_reporting(0);
$ti=$_SESSION['ti'];

$dataPoints=array();
$dataPoints2=array();
$l=0;
$v=2020;
for($i=1;$i<=$ti;$i++)
{
$point=array("label"=>$v,"y"=>$_SESSION['ttp'][$l]);
$l++; $v++;
array_push($dataPoints,$point);
}
$l=0;
$v1=2020;
for($a=1;$a<=$ti;$a++)
{
$point1=array("label"=>$v1,"y"=>$_SESSION['ir'][$l]);
$l++; $v1++;
array_push($dataPoints2,$point1);
}
session_destroy();
?>
<!DOCTYPE HTML>
<html>
<head>
<script>
window.onload = function() {
var chart = new CanvasJS.Chart("chartContainer", {
	animationEnabled: true,
	title: {
		text: "EMI INTEREST RATE",
		fontFamily: "arial black",
		fontColor: "#695A42"
		},
		axisY:{
		valueFormatString:"$#0",
		gridColor: "#B6B1A8",
		tickColor: "#B6B1A8"
	},
	toolTip:{
		shared: true
	},
	data: [{
		type: "stackedColumn",
		showInLegend: true,
		name:"Principal",
		dataPoints: <?php echo json_encode($dataPoints,JSON_NUMERIC_CHECK); ?>
	},{
		type: "stackedColumn",
		showInLegend: true,
		name:"Rate",
		dataPoints: <?php echo json_encode($dataPoints2,JSON_NUMERIC_CHECK); ?>
	}]
});
chart.render();
}
</script>
</head>
<body>
<div id="chartContainer" style="height: 350px; width: 40%;"></div>
<script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
<a href="finalemical.php">Back To EMI Calculator</a>
</body>
</html>        