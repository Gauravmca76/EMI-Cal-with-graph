<?php
session_start();
$tir=$_SESSION['toir'];
$tp=$_SESSION['top'];
 
$dataPoints = array( 
	array("label"=>"Principal", "y"=>$tp),
	array("label"=>"Interest", "y"=>$tir))


?>
<!DOCTYPE HTML>
<html>
<head>
<script>
window.onload = function() {
 
 
var chart = new CanvasJS.Chart("chartContainer", {
	animationEnabled: true,
	title: {
		text: "EMI Calculation Graph"
	},
	data: [{
		type: "pie",
		indexLabel: "{label} ({y})",
		dataPoints: <?php echo json_encode($dataPoints, JSON_NUMERIC_CHECK); ?>
	}]
});
chart.render();
 
}
</script>
</head>
<body>
<div id="chartContainer" style="height: 370px; width: 100%;"></div>
<script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
<a href="finalemical.php">Back To EMI Calculator</a>
</body>
</html> 