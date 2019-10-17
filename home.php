<?php
include("functions.php");
if(isloggedin()==FALSE)
{
  header("location:index.php");  
}
else
{
  
}
$sid=$_SESSION['id'];
?>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Record of Daily Expenses</title>
	<link rel="icon" type="image/png" href="images/Innovation.png" />
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="css/font-awesome.min.css" rel="stylesheet">
	<link href="css/datepicker3.css" rel="stylesheet">
	<link href="css/styles.css" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Montserrat:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
	<script src="js/html5shiv.js"></script>
	<script src="js/respond.min.js"></script>
  <script>
    $(function() {
    $( "#datepicker1" ).datepicker({dateFormat: "dd-mm-yy"});
    $( "#datepicker2" ).datepicker({dateFormat: "dd-mm-yy"});
    $( "#datepicker3" ).datepicker({dateFormat: "dd-mm-yy"});
  });
  </script>
   <style>
body{
  height: 100%;
  margin: 0;
}

* {
  box-sizing: border-box;
}

.bg-image {
  /* The image used */
  background-image: url("images/dash.jpg");
  /* Add the blur effect */
  filter: blur(6px);
  -webkit-filter: blur(6px);
  /* Full height */
  height: 100%; 
  /* Center and scale the image nicely */
  background-position: center;
  background-repeat: no-repeat;
  background-size: cover;
}

/* Position text in the middle of the page/image */
.bg-text {
  background-color: rgb(192,192,192); /* Fallback color */
  background-color: rgba(192,192,192,0.6); /* Black w/opacity/see-through */
  position: absolute;
  top: 35%;
  left: 60%;
  transform: translate(-50%, -50%);
  z-index: 2;
  width: 90%;
  padding: 20px;
}
</style>
  <style>
	  .content{
		  	max-width:1500px;
			  margin:auto;
	  }	</style>
  <script>
  $(function() {
    $( "#edetail" ).autocomplete({
      source: 'readxp.php'
    });
  });
  </script>
</head>
<body style="padding:0px;">
	<?php include_once('header.php');?>
	<?php include_once('sidebar.php');?>
	<div class= "content">
	  <div class="bg-image"></div>
		  <div class="bg-text">
	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="#">
					<em class="fa fa-home"></em>
				</a></li>
				<li class="active">Dashboard</li>
			</ol>
		</div><!--/.row-->
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Dashboard</h1>
			</div>
		</div><!--/.row-->
		<div class="row">
			<div class="col-xs-6 col-md-3">
				
				<div class="panel panel-default">
					<div class="panel-body easypiechart-panel">
<?php
//Today Expense
$today = date("Y-m-d");
$dtstart = date("1950-m-d");
$thiyear = date("y-01-01");
$query = "SELECT SUM(pprice) FROM expense WHERE date = '$today' AND uid='$sid' AND isdel=0"; 
$result = $conn->query($query);
    while($psum = $result->fetch_assoc()) 
{
$tesum = $psum['SUM(pprice)']; 
 ?> 
						<h4>Today's Expenses</h4>
						<div class="easypiechart" id="easypiechart-blue" data-percent="<?php echo $tesum;?>" ><span class="percent"><?php if($tesum==""){
echo "0";
} else {
echo $tesum;
}
	?></span></div>
					</div>
				</div>
			</div>
			<div class="col-xs-6 col-md-3">
				<div class="panel panel-default">
					<?php
//Yestreday Expense
$today = date("Y-m-d");
$dtstart = date("1950-m-d");
$thiyear = date("y-01-01");
$query = "SELECT SUM(pprice) FROM expense WHERE date >= '$dtstart' AND date <= '$today' AND uid='$sid' AND isdel=0"; 
$result = $conn->query($query);
    while($psum = $result->fetch_assoc()) 
{
$tesum = $psum['SUM(pprice)']; }
 ?> 
					<div class="panel-body easypiechart-panel">
						<h4>Total Expenses</h4>
						<div class="easypiechart" id="easypiechart-orange" data-percent="<?php echo $tesum;?>" ><span class="percent"><?php if($tesum==""){
echo "0";
} else {
echo $tesum;
}

	?></span></div>
					</div>
				</div>
			</div>
			<div class="col-xs-6 col-md-3">
				<div class="panel panel-default">
					<?php
//Total balance
$today = date("Y-m-d");
$dtstart = date("1950-m-d");
$thiyear = date("y-01-01");
$query = "SELECT SUM(tvalue) FROM income WHERE date >= '$dtstart' AND date <= '$today' AND uid='$sid' AND isdel=0"; 
$result = $conn->query($query);
    while($psum = $result->fetch_assoc()) 
{
$tisum = $psum['SUM(tvalue)']; }
$rbalance = $tisum - $tesum;
 ?>
					<div class="panel-body easypiechart-panel">
						<h4>Total Balance</h4>
						<div class="easypiechart" id="easypiechart-teal" data-percent="<?php echo $rbalance;?>"><span class="percent"><?php if($rbalance==""){
echo "0";
} else {
echo $rbalance;
}

	?></span></div>
					</div>
				</div>
			</div>
			<div class="col-xs-6 col-md-3">
				<div class="panel panel-default">
					<?php
//Total income

 ?>
					<div class="panel-body easypiechart-panel">
						<h4>Total Income</h4>
						<div class="easypiechart" id="easypiechart-red" data-percent="<?php echo $tisum;?>" ><span class="percent"><?php if($tisum==""){
echo "0";
} else {
echo $tisum;
}

	?></span></div>
					</div>
				</div>
			</div>
		
</div>
		</div>
		
		<!--/.row-->
	</div>	<!--/.main-->

	<script src="js/jquery-1.11.1.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/chart.min.js"></script>
	<script src="js/chart-data.js"></script>
	<script src="js/easypiechart.js"></script>
	<script src="js/easypiechart-data.js"></script>
	<script src="js/bootstrap-datepicker.js"></script>
	<script src="js/custom.js"></script>
	<script>
		window.onload = function () {
	var chart1 = document.getElementById("line-chart").getContext("2d");
	window.myLine = new Chart(chart1).Line(lineChartData, {
	responsive: true,
	scaleLineColor: "rgba(0,0,0,.2)",
	scaleGridLineColor: "rgba(0,0,0,.05)",
	scaleFontColor: "#c5c7cc"
	});
};
	</script>
	<div id="google_translate_element"></div>

<script type="text/javascript">
function googleTranslateElementInit() {
  new google.translate.TranslateElement({pageLanguage: 'en'}, 'google_translate_element');
}
</script>

<script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
		
</body>
<?php } ?>