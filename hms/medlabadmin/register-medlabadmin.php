<?php
include('include/config.php');

if (isset($_POST['submit'])) {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $age = $_POST['age']; 
    $contactNo = $_POST['contactNo'];
    $address = $_POST['address'];
    $userRole = $_POST['userRole'];
    $email = $_POST['email'];
    $username = $_POST['username'];
    $password = md5($_POST['password']);

    $sql = mysqli_query($con, "INSERT INTO users (id, name, age, contactNo, address, userRole, email, username, password) VALUES ('$id', '$name', '$age', '$contactNo', '$address', '$userRole', '$email', '$username', '$password')");

    if ($sql) {
        echo "<script>alert('New MedLab Admin added Successfully');</script>";
        echo "<script>window.location.href ='index.php'</script>";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<title>MedLabAdmin | Create New Profile</title>
		
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
			<div class="app-content">
				
						
						
				<!-- end: TOP NAVBAR -->
				<div class="main-content" >
					<div class="wrap-content container" id="container">
						<!-- start: PAGE TITLE -->
						<section id="page-title">
							<div class="row">
								<div class="col-sm-8">
									<h1 class="mainTitle">MedLabAdmin | Create New Profile</h1>
								</div>
								<ol class="breadcrumb">
									<li>
										<span>MedLabAdmin</span>
									</li>
									<li class="active">
										<span>Create New Profile</span>
									</li>
								</ol>
							</div>
						</section>
						<!-- end: PAGE TITLE -->
						<!-- start: BASIC EXAMPLE -->
						<div class="container-fluid container-fullw bg-white">
							<div class="row">
								<div class="col-md-12">
									
									<div class="row margin-top-30">
										<div class="col-lg-8 col-md-12">
											<div class="panel panel-white">
												<div class="panel-heading">
													<h5 class="panel-title">Create New Profile</h5>
												</div>
												<div class="panel-body">
									
													<form role="form" name="addMedStock" method="post" onSubmit="return valid();">
														<div class="form-group">
															<label for="userID">
																User ID
															</label>
															<input type="text" name="id" class="form-control"  placeholder="Enter User ID Given by Admin" required="true">
														</div>
														<div class="form-group">
															<label for="fullname">
																Full Name
															</label>
															<input type="text" name="name" class="form-control"  placeholder="Enter Full Name" required="true">
														</div>
														<div class="form-group">
															<label for="age">
																Age
															</label>
															<input type="text" name="age" class="form-control"  placeholder="Enter Age" required="true">
														</div>
                                                        <div class="form-group">
															<label for="contactNo">
																Contact Number
															</label>
															<input type="text" name="contactNo" class="form-control"  placeholder="Enter Contact Number" required="true">
														</div>
                                                        <div class="form-group">
															<label for="address">
																Current Address
															</label>
															<input type="text" name="address" class="form-control"  placeholder="Enter Current Address" required="true">
														</div>
                                                        <div class="form-group">
															<label for="userRole">
																User Role (Keep it as Default)
															</label>
															<input type="text" name="userRole" class="form-control" value="MedLab Admin">
														</div>
                                                        <div class="form-group">
															<label for="email">
																Email
															</label>
															<input type="email" name="email" class="form-control"  placeholder="Enter Valid Email Address" required="true">
														</div>
                                                        <div class="form-group">
															<label for="username">
																User Name
															</label>
															<input type="text" name="username" class="form-control"  placeholder="Enter User Name" required="true">
														</div>
                                                        <div class="form-group">
															<label for="password">
																Password (Default Pasword is 'medease')
															</label>
															<input type="password" name="password" class="form-control" value="medease">
														</div>
																																									
														<button type="submit" name="submit" id="submit" class="btn btn-o btn-primary">
															Submit
														</button>
													</form>
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
					</div>
				</div>
			</div>
			<!-- start: FOOTER -->
	<?php include('include/footer.php');?>
			<!-- end: FOOTER -->
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