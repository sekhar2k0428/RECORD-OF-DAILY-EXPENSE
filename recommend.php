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
    <title>RECORD OF DAILY EXPENSES|| EVENT RECOMMENDATIONS</title>
    <link rel="icon" type="image/png" href="images/Innovation.png" />
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="css/font-awesome.min.css" rel="stylesheet">
	<link href="css/datepicker3.css" rel="stylesheet">
	<link href="css/styles.css" rel="stylesheet">
	
	<!--Custom Font-->
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
  background-image: url("images/rm.jpg");
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
  top: 45%;
  left: 60%;
  transform: translate(-50%, -50%);
  z-index: 2;
  width: 90%;
  padding: 20px;
}
</style>
<style>
	  .content{
		  	max-width:1400px;
			  margin:auto;
	  }	</style>
<body style="padding:0px;">
	<?php include_once('header.php');?>
    <?php include_once('sidebar.php');?>
    <div class="content">
    <div class="bg-image"></div>
		  <div class="bg-text">
	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="#">
					<em class="fa fa-home"></em>
				</a></li>
				<li class="active">EVENT RECOMMENDATIONS</li>
			</ol>
		</div><!--/.row-->

		<div class="row">
			<div class="col-lg-12">
			
            <div class="col-lg-12">
				<h1 class="page-header">EVENT RECOMMENDATIONS</h1>
			</div>
				
				<div class="panel panel-default">
					<div class="panel-body">
                    <div class="col-md-12">
                    <form role="form" method="post" action="recommend-detail.php" name="bwdatesreport">
                        
								<div class="form-group">
									<label>Enter Event Name 1</label>
									<input type="text" class="form-control" size="35" id="edetail"   name="edetail" required placeholder="Enter Event" title="Please Enter Source"  aria-label="..." autofocus>
								</div>
								<div class="form-group">
                                <label>Enter Event Name 2</label>
									<input type="text" class="form-control" size="35" id="edetail1"   name="edetail1" required placeholder="Enter Event" title="Please Enter Source"  aria-label="..." autofocus>
								</div>							
								<div class="form-group has-success">
									<button type="submit" class="btn btn-primary" name="submit">Check</button>
                                </div>
                                </div>
								
                            </form>
                            <div id="google_translate_element"></div>

                            <script type="text/javascript">
function googleTranslateElementInit() {
  new google.translate.TranslateElement({pageLanguage: 'en', layout: google.translate.TranslateElement.InlineLayout.SIMPLE}, 'google_translate_element');
}
</script>

<script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
                        </div>
    </div>
                    </div>
    </div>
				</div><!-- /.panel-->
			</div><!-- /.col-->
		</div><!-- /.row -->
    </div><!--/.main-->
    

						<div class="col-md-12">
    <script src="js/jquery-1.11.1.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/chart.min.js"></script>
	<script src="js/chart-data.js"></script>
	<script src="js/easypiechart.js"></script>
	<script src="js/easypiechart-data.js"></script>
	<script src="js/bootstrap-datepicker.js"></script>
	<script src="js/custom.js"></script>
    
</body>