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
	<title>RECORD OF DAILY EXPENSES|| Add Expense/Income Details </title>
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="css/font-awesome.min.css" rel="stylesheet">
	<link href="css/datepicker3.css" rel="stylesheet">
	<link href="css/styles.css" rel="stylesheet">
	
	
	<link href="https://fonts.googleapis.com/css?family=Montserrat:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
</head>
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
  background-image: url("images/income.png");
  /* Add the blur effect */
  filter: blur(6px);
  -webkit-filter: blur(6px);
  /* Full height */
  height: 75%; 
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
  top: 50%;
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
				<li class="active">Expense</li>
			</ol>
        </div><!--/.row-->
        <div class="row">
			<div class="col-lg-12">	
			<div class="col-lg-12">
				<h1 class="page-header">Add Expense/Income Details</h1>
	</div>
				<div class="panel panel-default">
					<div class="panel-body">
						<div class="col-md-12">
							
							<form role="form" method="post" action="">
								<div class="form-group">
									<label>Date of Expense</label>
									<?php $today = date("Y-m-d");
									$dtstart = date("1950-m-d");
									$thiyear = date("y-01-01");
									 ?>
									<input type="text" class="form-control" size="35"  name="entrydate" required placeholder="Choose Date" id="datepicker3" readonly  aria-label="..." value="<?php $thisday = strtotime($today);
    									$thisday= date('d-m-Y', $thisday); echo $thisday; ?>">
								</div>
								<div class="form-group">
									<label>Enter Event/Source</label>
									<input type="text" class="form-control" size="35" id="edetail"   name="edetail" required placeholder="Enter Detail/Source" title="Please Enter Source"  aria-label="..." autofocus>
								</div>
								
								<div class="form-group">
									<label>Enter Amount</label>
									<input type="text" class="form-control" size="35" id="eamount" name="eamount" required placeholder="Enter Amount" aria-label="..." title="Please enter Amount"  onkeypress="return isNumberKey(event)"  >
								</div>
								<div class="input-group">
      								<span class="input-group-addon">Choose Type:
      								<label><input type="radio"  name="enttype"  value="1" aria-label="..." checked="">Expense</label>
      								<label><input type="radio" name="enttype"   value="2" aria-label="...">Income</label>
      							</span></div>								
								<div class="form-group has-success">
									<button type="submit" class="btn btn-primary" name="submit">Add</button>
								</div>
								
								
								</div>
								
							</form>
						</div>
					</div>
				</div><!-- /.panel-->
			</div><!-- /.col-->
			<div id="google_translate_element"></div>

<script type="text/javascript">
function googleTranslateElementInit() {
  new google.translate.TranslateElement({pageLanguage: 'en'}, 'google_translate_element');
}
</script>

<script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
		</div><!-- /.row -->
	</div><!--/.main-->
	<?php
$uid=$sid;
if(isset($_POST["entrydate"]) && trim($_POST["entrydate"]) != "") 
  {

    $entrydate = $_POST["entrydate"];
    $entrydate = strtotime($entrydate);
    $entrydate= date('Y-m-d', $entrydate);
    $enttype = mysqli_real_escape_string($conn, $_POST["enttype"]);
    $edetail = mysqli_real_escape_string($conn,$_POST["edetail"]);
    $eamount = mysqli_real_escape_string($conn, $_POST["eamount"]);
    $edetail = strip_tags($edetail);
    $eamount = strip_tags($eamount);
    $eamount = floatval($eamount);

    if (isset($_POST["enttype"]) && trim($_POST["enttype"]) == "1") 
             
    {
$sql = "INSERT INTO expense (pname, pprice, uid, date )
VALUES ('$edetail','$eamount','$uid','$entrydate')";
if ($conn->query($sql) === TRUE) 
{
  echo " <script> 
  alert('EXPENSE ADDED SUCCESSFULLY'); 
  location.href = 'add-expense.php';
</script>  ";
} 

else 
{
    echo "Error: " . $sql . "<br>" . $conn->error;
}
    }

    elseif (isset($_POST["enttype"]) && trim($_POST["enttype"]) == "2") 
    {
$sql = "INSERT INTO income (income, tvalue, uid, date )
VALUES ('$edetail','$eamount','$uid','$entrydate')";
if ($conn->query($sql) === TRUE) {
		echo "
	   <script> 
			  alert('INCOME ADDED SUCCESSFULLY'); 
			  location.href = 'add-expense.php';
		</script>     
	
		";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

    }

  }


?>
</div>
    </div>  
  </div>
  
</div>
</div>
	<script src="js/jquery-1.11.1.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/chart.min.js"></script>
	<script src="js/chart-data.js"></script>
	<script src="js/easypiechart.js"></script>
	<script src="js/easypiechart-data.js"></script>
	<script src="js/bootstrap-datepicker.js"></script>
	<script src="js/custom.js"></script>
	

</body>