<?php   session_start();
    if(!isset($_SESSION['Email']))
    { header('Location:Sign-In.html'); 
    }
	
	$Email_temp=$_SESSION['Email'];
	$User_id_temp=$_SESSION['User_id'];
	$Mobile_temp=$_SESSION['Mobile_No'];	
	
    if(isset($_POST['PhotoUpdate']))
    {  $dbhost='localhost';
       $username='root';
       $pass='';
       $db='roomiee';
       $con= mysqli_connect("$dbhost","$username","$pass","$db") ; 
	   
	   if(empty($_FILES["User_image"]["tmp_name"]))
	   { echo '<script type="text/javascript"> alert("Please select proper image.") </script>';
	   }
       else {
       $User_image=addslashes(file_get_contents($_FILES["User_image"]["tmp_name"]));		   
	   $sql="UPDATE user SET User_image='$User_image' WHERE Email='$Email_temp'";
	   if(!mysqli_query($con,$sql))
	   {  echo '<script type="text/javascript"> alert("Failed to upload image.") </script>';
       }
	   }
    }	
    
	if(isset($_POST['NameUpdate']))
	{  $dbhost='localhost';
       $username='root';
       $pass='';
       $db='roomiee';
       $con= mysqli_connect("$dbhost","$username","$pass","$db") ; 
	   
	   $string = $_POST['Name'];
	   
	   if (preg_match('/[\'^£$%&*()}{@#~?><>,|=_+¬-]/', $string))
       {  $msg="Special characters are not allowed for Username!!";
          echo "<script> alert('$msg'); window.location.href='User Profile.php';</script>";
       }
	   else {
	   if($_POST['Name']=="")
	   { echo '<script> alert("Name cannot be empty"); window.location.href="User Profile.php"; </script>';
       }   
	   else {
	      $Name=$_POST['Name'];
	      $sql="Update user SET Name='$Name' WHERE Email='$Email_temp'";
	      $a=mysqli_query($con,$sql);
	      if($a)
	      {  echo '<script> alert("Name is updated."); window.location.href="User Profile.php"; </script>'; 
             unset($_SESSION['Name']);
		     $_SESSION['Name']=$Name;
          }
	      else
	      {  echo '<script> alert("Failed to update Name."); window.location.href="User Profile.php"; </script>';  }
        }
	   }
	}
	
	/*if(isset($_POST['MobileUpdate']))
	{  $dbhost='localhost';
       $username='root';
       $pass='';
       $db='roomiee';
	   $Mobile_No=$_POST['Mobile_No'];
       $con= mysqli_connect("$dbhost","$username","$pass","$db") ;
       $check=mysqli_query($con,"select * from user where Mobile_No='$Mobile_No'");
       $checkrows=mysqli_num_rows($check);
	   
       if($_POST['Mobile_No']=="")
	   { echo '<script> alert("Mobile No. cannot be empty"); window.location.href="User Profile.php"; </script>';
       }   
	   else {
       if($checkrows>0)
       {  echo '<script> alert("The Mobile No. is already registered with us."); window.location.href="User Profile.php"; </script>';
       } 	   
	   else if($checkrows==0)
	   {
	     $sql="Update user SET Mobile_No='$Mobile_No' WHERE Email='$Email_temp'";
	     $a=mysqli_query($con,$sql);
	     if($a)
	     {  echo '<script> alert("Mobile No. is updated."); window.location.href="User Profile.php"; </script>'; 
            unset($_SESSION['Mobile_No']);
		    $_SESSION['Mobile_No']=$Mobile_No;
         }
	     else
	     {  echo '<script> alert("Failed to update Mobile No."); window.location.href="User Profile.php"; </script>';  }
        }
	  }
	}*/
	
	/*if(isset($_POST['EmailUpdate']))
	{  $dbhost='localhost';
       $username='root';
       $pass='';
       $db='roomiee';
       $con= mysqli_connect("$dbhost","$username","$pass","$db") ;
	   $Email=$_POST['Email'];
       $check=mysqli_query($con,"select * from user where Email='$Email'");
       $checkrows=mysqli_num_rows($check);
       
	   if($_POST['Email']=="")
	   { echo '<script> alert("Mail cannot be empty"); window.location.href="User Profile.php"; </script>';
       }   
	   else {
       if($checkrows>0)
       {  echo '<script> alert("The Email is already registered with us."); window.location.href="User Profile.php"; </script>';
       } 	   
	   else if($checkrows==0)	   
	   {
	     $sql="Update user SET Email='$Email' WHERE User_id='$User_id_temp'";
	     $a=mysqli_query($con,$sql);
	     if($a)
	     {  echo '<script> alert("Email is updated."); window.location.href="User Profile.php"; </script>'; 
            unset($_SESSION['Email']);
		    $_SESSION['Email']=$Email;
         }
	     else
	     {  echo '<script> alert("Failed to update Email"); window.location.href="User Profile.php"; </script>';  }
       }
	   }
	}*/
	
	
	if(isset($_POST['PasswordUpdate']))
	{  $dbhost='localhost';
       $username='root';
       $pass='';
       $db='roomiee';
       $con= mysqli_connect("$dbhost","$username","$pass","$db") ; 
	   
	   $q=mysqli_query($con,"Select Password from user where Email='$Email_temp'");
	   $c=mysqli_num_rows($q);
	   $Password=$_POST['Password'];
	   $NPassword=$_POST['NPassword'];
	   
	   if($_POST['NPassword']=="")
	   { echo '<script> alert("Password cannot be empty"); window.location.href="User Profile.php"; </script>';
       }   
	   else if(strlen($NPassword)<8){
		 echo '<script> alert("Password should be of minimum 8 characters in length..!!"); window.location.href="User Profile.php"; </script>'; 
       }
	   else if($c>0)
       {  while($row=mysqli_fetch_array($q)) 
		  { $hash_password=$row["Password"];  }
          
		  if(password_verify($Password,$hash_password))
		  {   $hash_pass=password_hash($NPassword,PASSWORD_DEFAULT);
          	  $sql="Update user SET Password='$hash_pass' Where Email='$Email_temp'";
			  $a=mysqli_query($con,$sql);
	          if($a)
	          {  echo '<script> alert("Password updated."); window.location.href="User Profile.php"; </script>';  }
	          else
	          {  echo '<script> alert("Failed to update Password"); window.location.href="User Profile.php"; </script>';  }
		  }
		  else
		  {  echo '<script> alert("Current password invalid."); window.location.href="User Profile.php"; </script>';  }
	   }
	}
	 
	 if(isset($_POST['AddressUpdate']))
	{  $dbhost='localhost';
       $username='root';
       $pass='';
       $db='roomiee';
       $con= mysqli_connect("$dbhost","$username","$pass","$db") ; 
	   
	   $Address=$_POST['Address'];
	   if($_POST['Address']=="")
	   { echo '<script> alert("Address cannot be empty"); window.location.href="User Profile.php"; </script>';
       }   
	   else {
	   $sql="Update user SET Address='$Address' WHERE Email='$Email_temp'";
	   $a=mysqli_query($con,$sql);
	   if($a)
	   {  echo '<script> alert("Address is updated."); window.location.href="User Profile.php"; </script>'; 
          unset($_SESSION['Address']);
		  $_SESSION['Address']=$Address;
       }
	   else
	   {  echo '<script> alert("Failed to update Address."); window.location.href="User Profile.php"; </script>';  }
	  }
	}	
?>
		
<!DOCTYPE html>
<html lang="en">
<head>

  <!-- SITE TITTLE -->
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>User Profile</title>
  

  <!-- PLUGINS CSS STYLE -->
  <!-- <link href="plugins/jquery-ui/jquery-ui.min.css" rel="stylesheet"> -->
  <!-- Bootstrap -->
  <link rel="stylesheet" href="plugins/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="plugins/bootstrap/css/bootstrap-slider.css">
  <!-- Font Awesome -->
  <link href="plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet">
  <!-- Owl Carousel -->
  <link href="plugins/slick-carousel/slick/slick.css" rel="stylesheet">
  <link href="plugins/slick-carousel/slick/slick-theme.css" rel="stylesheet">
  <!-- Fancy Box -->
  <link href="plugins/fancybox/jquery.fancybox.pack.css" rel="stylesheet">
  <link href="plugins/jquery-nice-select/css/nice-select.css" rel="stylesheet">
  <!-- CUSTOM CSS -->
  <link href="Main.css" rel="stylesheet">


  <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

</head>
<body class="body-wrapper">
<section>
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<nav class="navbar navbar-expand-lg navbar-light navigation">
					<a class="navbar-brand" href="index.html">
						<img src="logo.jpg" alt="">
					</a>
					<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
					 aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
						<span class="navbar-toggler-icon"></span>
					</button>
					<div class="collapse navbar-collapse" id="navbarSupportedContent">
						<ul class="navbar-nav ml-auto main-nav ">
							<li class="nav-item active">
								<a class="nav-link" href="Room.php">Home</a>
							</li>
							<li class="nav-item active">
								<a class="nav-link" href="Our Team.html">Our Team</a>
							</li>
							<li class="nav-item active">
								<a class="nav-link" href="Contact Us.html">Contact Us</a>
							</li>
							<li class="nav-item dropdown dropdown-slide">
								<a class="nav-link dropdown-toggle" data-toggle="dropdown" href="">Menu<span><i class="fa fa-angle-down"></i></span>
								</a>

								<!-- Dropdown list -->
								<div class="dropdown-menu">
									<a class="dropdown-item" href="My Ads.php">My Ads</a>
									<a class="dropdown-item" href="Favourite.php">Favourite Ads</a>
								</div>
							</li>
							<li class="nav-item active">
                                    <a class="nav-link" href="Terms & Conditions.html">Terms & Conditions</a>
                                </li>
						</ul>
						<ul class="navbar-nav ml-auto mt-10">
							<li class="nav-item">
							<a class="nav-link login-button" style="color: #000;" data-toggle="modal" data-target="#Logout">Log Out</a>
							</li>
							<li class="nav-item">
                                    <a class="nav-link add-button" style="color: #000;" data-toggle="modal" data-target="#PostAd"><i class="fa fa-plus-circle"></i> Post Your Ads</a>
                                </li>
						  </ul>
						</div>
						 
						 <!-- delete-account modal -->
												<!-- delete account popup modal start-->
							<!-- Modal -->
							<div class="modal fade" id="Logout" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
							  aria-hidden="true">
							  <div class="modal-dialog modal-dialog-centered" role="document">
								<div class="modal-content">
								  <div class="modal-header border-bottom-0">
									<button type="button" class="close" data-dismiss="modal" aria-label="Close">
									  <span aria-hidden="true">&times;</span>
									</button>
								  </div>
								  <form method="post" action="logout.php">
								  <div class="modal-body text-center">
									<img src="Account2.png" class="img-fluid mb-2" alt="" style="height: 300px;">
									<h6 class="py-2">Are you sure you want to Log Out from your account?</h6>
								  </div>
								  <div class="modal-body text-center">
									<button type="button" class="btn btn-primary" data-dismiss="modal" style="margin-right:60px;">Cancel</button>
									<button type="submit" name="Logout" class="btn btn-danger" style="margin-left:60px;">Yes,Sure</button>
								  </div>
								  </form>
								</div>
							  </div>
							</div>
							<!-- delete-account modal -->
          						  <!-- delete account popup modal start-->
                <!-- Modal -->
                <div class="modal fade" id="deleteaccount" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
                  aria-hidden="true">
                  <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                      <div class="modal-header border-bottom-0">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
					  <form method="Post" action="delete.php">
                      <div class="modal-body text-center">
                        <img src="Account1.png" class="img-fluid mb-2" alt="">
                        <h6 class="py-2">Are you sure you want to delete your account?</h6>
                        <p>If you delete it now then you will not able to undo it.</p>
                      </div>
                      <div class="modal-footer border-top-0 mb-3 mx-5 justify-content-lg-between justify-content-center">
                        <button type="button" class="btn btn-primary" data-dismiss="modal">Cancel</button>
                        <button type="submit" name="Delete" class="btn btn-danger">Delete</button>
                      </div>
					 </form>
                    </div>
                  </div>
                </div>
                <div class="modal fade" id="PostAd" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                    <div class="modal-header border-bottom-0">
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
                                    </div>
                                    <div class="modal-body text-center">
                                        <a href="Add Room.php">
                                            <img class="option1" src="Room footer.jpg" alt="">
                                            <div class="top">Post Room</div>
                                        </a>
                                        <a href="Add Mess.php">
                                            <img class="option2" src="Mess footer.jpg" alt="">
                                            <div class="centered">Post Mess</div>
                                        </a>
                                        <a href="Add Stationary.php">
                                            <img class="option3" src="Stationary footer.jpg" alt="">
                                            <div class="bottom">Post Stationary Items</div>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                </div>
					  </nav>
					</div>
				  </div>
				</div>
			  </section>
<!--==================================
=            User Profile            =
===================================-->

<section class="user-profile section">
	<div class="container">
		<div class="row">
			<div class="col-md-10 offset-md-1 col-lg-3 offset-lg-0">
				<div class="sidebar">
					<!-- User Widget -->
					<div class="widget user">
						<!-- User Image -->
						<div class="image d-flex justify-content-center">
						<?php						  
						    $dbhost='localhost';
                            $username='root';
                            $pass='';
                            $db='roomiee';
                            $con= mysqli_connect("$dbhost","$username","$pass","$db") ;  
                             
                            $q=mysqli_query($con,"Select User_image from user where Email='$Email_temp'");
                            $c=mysqli_num_rows($q);
 
                            if($c>0)
                            {  while($row=mysqli_fetch_array($q))
							   { echo '<img src="data:User_image;base64,'.base64_encode($row['User_image']).'">';
                               } 						   
					        }
						?>
						</div>
						<br>
						<!-- User Name -->
						<h2 align="center"> <?php echo("Name : ".$_SESSION['Name']); ?> </h2> 
						<h6 align="center"> <?php echo("Mobile : ".$_SESSION['Mobile_No']); ?> </h6> 
						<h6 align="center"> <?php echo("Address : ".$_SESSION['Address']);   ?> </h6>
					</div>
					<!-- Dashboard Links -->
				</div>
				<!-- Dashboard Links -->
          <div class="widget user-dashboard-menu">
            <ul>
              <li><a href="" data-toggle="modal" data-target="#Logout"><i class="fa fa-cog"></i> Logout</a></li>
              <li><a href="" data-toggle="modal" data-target="#deleteaccount"><i class="fa fa-power-off"></i>Delete Account</a></li>
            </ul>
          </div>
			</div> 
			
			<div class="col-md-10 offset-md-1 col-lg-9 offset-lg-0">
				<!-- Edit Profile Welcome Text -->
				<div class="widget welcome-message">
					<h2>Edit profile</h2>
					<p>	<h6> <?php echo($_SESSION['Email']);   ?> </h6></p>
				</div>
			
				<!-- Edit Personal Info -->
				<div class="row">
					<div class="col-lg-6 col-md-6">
						<div class="widget personal-info">
							<h3 class="widget-header user">Edit Your Name</h3>
							<form action="User Profile.php" method="post" >
								<!-- First Name -->
							 	<div class="form-group">
									<label for="first-name">Edit Name</label>
									<input type="text" name="Name" class="form-control" id="first-name">
								</div>
								<!-- Submit button -->
								<button type="submit" name="NameUpdate" class="btn btn-transparent" style="margin:10px;">Save Changes</button>
								<button type="reset" class="btn btn-transparent"  style="margin:10px;">Clear</button>
							</form>
						</div>
					</div>
					<div class="col-lg-6 col-md-6">
						<div class="widget personal-info">
							<h3 class="widget-header user">Edit Image</h3>
							<form action="User Profile.php" method="post" enctype="multipart/form-data">
							    <!-- File chooser -->
								<div class="form-group choose-file d-inline-flex" >
									<input type="file" class="form-control-file mt-2 pt-1" name="User_image" id="input-file">
								</div>
								<!-- Submit button -->
								<button type="submit" name="PhotoUpdate" class="btn btn-transparent" style="margin:10px;">Update Image</button>
								<button type="reset" class="btn btn-transparent"  style="margin:10px;">Clear</button>
							</form>
						</div>
					</div>
					<div class="col-lg-6 col-md-6">
						<!-- Change Password -->
					<div class="widget change-password">
						<h3 class="widget-header user">Edit Password</h3>
						<form action="User Profile.php" method="post">
							<!-- Current Password -->
							<div class="form-group">
								<label for="current-password">Current Password</label>
								<input type="password" name="Password" class="form-control" id="current-password">
							</div>
							<!-- New Password -->
							<div class="form-group">
								<label for="new-password">New Password</label>
								<input type="password" name="NPassword" class="form-control" id="new-password">
							</div>
							<!-- Submit Button -->
							<button type="submit" name="PasswordUpdate" class="btn btn-transparent" style="margin:10px;">Change Password</button>
						</form>
					</div>
					</div>
					<div class="col-lg-6 col-md-6">
					<div class="widget change-email mb-0">
						<h3 class="widget-header user">Edit Resident Address</h3>
						<form action="User Profile.php" method="post">
							<div class="form-group">
								<label>Update Address</label>
								<input type="text" name="Address" class="form-control" >
							</div>
							<!-- Submit Button -->
							<button type="submit" name="AddressUpdate" class="btn btn-transparent" style="margin:10px;">Change Address</button>
							<button class="btn btn-transparent" type="clear" style="margin:10px;">Clear</button>
						</form>
					</div>
					</div>
					
		</div>
	</div>
</section>


<!--============================
=            Footer            =
=============================-->
<footer class="footer section section-sm">
  <!-- Container Start -->
  <div class="container">
    <div class="row">
      <div class="col-lg-3 col-md-7 offset-md-1 offset-lg-0">
        <!-- About -->
        <div class="block about">
          <!-- footer logo -->
          <img src="logo-footer.png" alt="">
          <!-- description -->
          <p class="alt-color">This is a student friendly website
			   which will help students/tenants to explore Rooms/PG/Hostel around them 
			   including some other basic facilities like Mess , stationary materials.
			   Point of this undertaking to build up a versatile application for Hostel
			    Students to diminish their issues.</p>
        </div>
      </div>
      <!-- Link list -->
      <div class="col-lg-3 offset-lg-1 col-md-3">
        <div class="block">
			<br><br>
          <h4>Feactures</h4>
          <ul>
            <li>1) Student login through college id or mobile number/mail id.</li>
            <li>2) Room/PG owner can login through their mail-id/mobile number.</li>
            <li>3) User friendly interface.</li>
            <li>4) Student can search for rooms/PG, mess.</li>
			
          </ul>
        </div>
	  </div>
	  	 
<!-- Link list -->
      <div class="col-lg-3 col-md-3 offset-md-1 offset-lg-0">
        <div class="block">
			<br><br><br><br>
          <ul>
			<li>5) User can buy-sell their any stationary material/item.</li>
			<li>6) Student can chat through chat box.</li>
            <li>7) Broker restricted application environment.</li>
            <li>8) Student can rate Rooms/PG/Mess based upon their experience.</li>
          </ul>
        </div>
      </div>
      <!-- Promotion -->
    </div>
  </div>
  <!-- Container End -->
</footer>
<!-- Footer Bottom -->
<footer class="footer-bottom">
  <!-- Container Start -->
  <div class="container">
    <div class="row">
      <div class="col-sm-6 col-12">
        <!-- Copyright -->
        <div class="copyright">
          <p>Copyright © <script>
              var CurrentYear = new Date().getFullYear()
              document.write(CurrentYear)
            </script>. All Rights Reserved, by<a style="margin:5px;" href="Index.html">ROOMiee</a></p>
        </div>
      </div>
      <div class="col-sm-6 col-12">
        <!-- Social Icons -->
        <ul class="social-media-icons text-right">
          <li><a class="fa fa-facebook" href="#" target="_blank"></a></li>
          <li><a class="fa fa-instagram" href="#" target="_blank"></a></li>
        </ul>
      </div>
    </div>
  </div>
  <!-- Container End -->
  <!-- To Top -->
  <div class="top-to">
    <a id="top" class="" href="#"><i class="fa fa-angle-up"></i></a>
  </div>
</footer>

<!-- JAVASCRIPTS -->
<script src="plugins/jQuery/jquery.min.js"></script>
<script src="plugins/bootstrap/js/popper.min.js"></script>
<script src="plugins/bootstrap/js/bootstrap.min.js"></script>
<script src="plugins/bootstrap/js/bootstrap-slider.js"></script>
  <!-- tether js -->
<script src="plugins/tether/js/tether.min.js"></script>
<script src="plugins/raty/jquery.raty-fa.js"></script>
<script src="plugins/slick-carousel/slick/slick.min.js"></script>
<script src="plugins/jquery-nice-select/js/jquery.nice-select.min.js"></script>
<script src="plugins/fancybox/jquery.fancybox.pack.js"></script>
<script src="plugins/smoothscroll/SmoothScroll.min.js"></script>
</body>
</html>