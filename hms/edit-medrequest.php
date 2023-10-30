<?php
session_start();
error_reporting(0);
include('include/config.php');
if(strlen($_SESSION['id']==0)) {
 header('location:logout.php');
  } else{

$did=intval($_GET['id']);// get doctor id
if(isset($_POST['submit']))
{
	$pid = $_POST['pid'];
	$medName = $_POST['medName'];
	$prdoc = $_POST['prdoc'];
	$pname = $_POST['pname'];
	$medQuantity = $_POST['medQuantity'];
	$note = $_POST['note'];
	
	$sql=mysqli_query($con, "Update medrequest set pid = '$pid', medName = '$medName', prdoc = '$prdoc', pname = '$pname', medQuantity = '$medQuantity', note = '$note' where rid = '$did'");
	if($sql)
	{
		$msg="Medicine Request Details Updated Successfully";

	}
}
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<title>PatientHub | Edit Medicine Request</title>
		
		<link href="http://fonts.googleapis.com/css?family=Lato:300,400,400italic,600,700|Raleway:300,400,500,600,700|Crete+Round:400italic" rel="stylesheet" type="text/css" />
		<link rel="stylesheet" href="vendor/bootstrap/css/bootstrap.min.css">
		<link rel="stylesheet" href="vendor/fontawesome/css/font-awesome.min.css">
		<link rel="stylesheet" href="vendor/themify-icons/themify-icons.min.css">
		<link href="vendor/animate.css/animate.min.css" rel="stylesheet" media="screen">
		<link href="vendor/perfect-scrollbar/perfect-scrollbar.min.css" rel="stylesheet" media="screen">
		<link href="vendor/switchery/switchery.min.css" rel="stylesheet" media="screen">
		<link href="vendor/bootstrap-touchspin/jquery.bootstrap-touchspin.min.css" rel="stylesheet" media="screen">
		<link href="vendor/select2/select2.min.css" rel="stylesheet" media="screen">
		<link href="vendor/bootstrap-datepicker/bootstrap-datepicker3.standalone.min.css" rel="stylesheet" media="screen">
		<link href="vendor/bootstrap-timepicker/bootstrap-timepicker.min.css" rel="stylesheet" media="screen">
		<link rel="stylesheet" href="assets/css/styles.css">
		<link rel="stylesheet" href="assets/css/plugins.css">
		<link rel="stylesheet" href="assets/css/themes/theme-1.css" id="skin_color" />

	</head>
	<body>
		<div id="app">		
<?php include('include/sidebar.php');?>
			<div class="app-content">
				
						<?php include('include/header.php');?>
						<!-- start: MENU TOGGLER FOR MOBILE DEVICES -->
					
				<!-- end: TOP NAVBAR -->
				<div class="main-content" >
					<div class="wrap-content container" id="container">
						<!-- start: PAGE TITLE -->
						<section id="page-title">
							<div class="row">
								<div class="col-sm-8">
									<h1 class="mainTitle">PatientHub | Edit Medicine Request</h1>
																	</div>
								<ol class="breadcrumb">
									<li>
										<span>PatientHub</span>
									</li>
									<li class="active">
										<span>Edit Medicine Request</span>
									</li>
								</ol>
							</div>
						</section>
						<!-- end: PAGE TITLE -->
						<!-- start: BASIC EXAMPLE -->
						<div class="container-fluid container-fullw bg-white">
							<div class="row">
								<div class="col-md-12">
									<h5 style="color: green; font-size:18px; ">
										<?php if($msg) { echo htmlentities($msg);}?> </h5>
									<div class="row margin-top-30">
										<div class="col-lg-8 col-md-12">
											<div class="panel panel-white">
												<div class="panel-heading">
													<h5 class="panel-title">Edit Medicine Request Details</h5>
												</div>
												<div class="panel-body">
													<?php $sql=mysqli_query($con,"select * from medrequest where $did = rid");
													while($data=mysqli_fetch_array($sql))
													{
													?>
													<h4><?php echo htmlentities($data['medName']);?>'s Details</h4>
													<p><b>Requested Date: </b><?php echo htmlentities($data['createdAt']);?></p>
													<hr />
													<form role="form" name="addMedStock" method="post" onSubmit="return valid();">
                                                    <div class="form-group">
															<label for="patientID">
																Patient ID
															</label>
															<input type="text" name="pid" class="form-control" value="<?php echo htmlentities($data['pid']);?>">
														</div>
														<div class="form-group">
															<label for="medicineName">
																Medicine Name
															</label>
															<input type="text" name="medName" class="form-control" value="<?php echo htmlentities($data['medName']);?>">
														</div>
														<div class="form-group">
															<label for="priscriptedDocto">
																Priscripted Doctor
															</label>
															<input type="text" name="prdoc" class="form-control" value="<?php echo htmlentities($data['prdoc']);?>">
														</div>
														<div class="form-group">
															<label for="medicineQuantity">
																Patient Name
															</label>
														<input type="text" name="pname" class="form-control" value="<?php echo htmlentities($data['pname']);?>">
														</div>
														<div class="form-group">
															<label for="medicineCost">
																Medicine Quantity
															</label>
														<input type="text" name="medQuantity" class="form-control" value="<?php echo htmlentities($data['medQuantity']);?>">
														</div>
														<div class="form-group">
															<label for="Note">
																Note
															</label>
															<textarea name="note" class="form-control" <?php echo htmlentities($data['note']);?>></textarea>
														</div>
														
														<button type="submit" name="submit" id="submit" class="btn btn-o btn-primary">
															Submit
														</button>
													</form>
													<?php } ?>
												</div>
											</div>
										</div>
											
											</div>
										</div>
									<div class="col-lg-12 col-md-12">
											<div class="panel panel-white">
												
												
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
						<!-- end: BASIC EXAMPLE -->
			
					
					
						
						
					
						<!-- end: SELECT BOXES -->
						
					</div>
				</div>
			</div>
			<!-- start: FOOTER -->
	<?php include('include/footer.php');?>
			<!-- end: FOOTER -->
		
			<!-- start: SETTINGS -->
	<?php include('include/setting.php');?>
			<>
			<!-- end: SETTINGS -->
		</div>
		<!-- start: MAIN JAVASCRIPTS -->
		<script src="vendor/jquery/jquery.min.js"></script>
		<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
		<script src="vendor/modernizr/modernizr.js"></script>
		<script src="vendor/jquery-cookie/jquery.cookie.js"></script>
		<script src="vendor/perfect-scrollbar/perfect-scrollbar.min.js"></script>
		<script src="vendor/switchery/switchery.min.js"></script>
		<!-- end: MAIN JAVASCRIPTS -->
		<!-- start: JAVASCRIPTS REQUIRED FOR THIS PAGE ONLY -->
		<script src="vendor/maskedinput/jquery.maskedinput.min.js"></script>
		<script src="vendor/bootstrap-touchspin/jquery.bootstrap-touchspin.min.js"></script>
		<script src="vendor/autosize/autosize.min.js"></script>
		<script src="vendor/selectFx/classie.js"></script>
		<script src="vendor/selectFx/selectFx.js"></script>
		<script src="vendor/select2/select2.min.js"></script>
		<script src="vendor/bootstrap-datepicker/bootstrap-datepicker.min.js"></script>
		<script src="vendor/bootstrap-timepicker/bootstrap-timepicker.min.js"></script>
		<!-- end: JAVASCRIPTS REQUIRED FOR THIS PAGE ONLY -->
		<!-- start: CLIP-TWO JAVASCRIPTS -->
		<script src="assets/js/main.js"></script>
		<!-- start: JavaScript Event Handlers for this page -->
		<script src="assets/js/form-elements.js"></script>
		<script>
			jQuery(document).ready(function() {
				Main.init();
				FormElements.init();
			});
		</script>
		<!-- end: JavaScript Event Handlers for this page -->
		<!-- end: CLIP-TWO JAVASCRIPTS -->
	</body>
</html>
<?php } ?>