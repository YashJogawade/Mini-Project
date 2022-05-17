<?php session_start();
  if(!isset($_POST['ViewAd']))
  {  $mess_id=$_SESSION['mess_id'];
  }
  else
  {  
     $_SESSION['mess_id']=$_POST['mess_id'];
     $mess_id=$_SESSION['mess_id'];
  }
  $User_id=$_SESSION['User_id'];
  
  
  if(isset($_POST['fav']))
  {    $dbhost='localhost';
       $username='root';
       $pass='';
       $db='roomiee';
       $con= mysqli_connect("$dbhost","$username","$pass","$db") ;
	   $mess_id=$_SESSION['mess_id'];
	   $User_id=$_SESSION['User_id'];
	   
	   $q="select * from favourite_mess where  User_id='$User_id' AND mess_id='$mess_id'";
	   $res=mysqli_query($con,$q);
	   $n=mysqli_num_rows($res);
	   
	   if($n==0){
	   $sql="INSERT INTO favourite_mess values('$User_id','$mess_id')";
       $a=mysqli_query($con,$sql);
       if($a)
	   {  setcookie($mess_id,'1');
	      echo '<script> alert("Added to your favourites..!!"); window.location.href="Advertisement_Mess.php"; </script>';   }
	   else
	   {  echo '<script> alert("Error..!!"); window.location.href="Advertisement_Mess.php"; </script>';   }   
	   }
	   else
	   {  echo '<script> alert("Already added !!"); window.location.href="Advertisement_Mess.php"; </script>'; 
	   }
  } 
  
  
  if(isset($_POST['Report']))
  {   
       $dbhost='localhost';
       $username='root';
       $pass='';
       $db='roomiee';
       $con= mysqli_connect("$dbhost","$username","$pass","$db") ;
	   $messid=$mess_id;
       
	   if(!isset($_COOKIE[$mess_id])) {
       $sql="Update mess set No_of_reports=No_of_reports+1 WHERE mess_id='$messid'";
       $a=mysqli_query($con,$sql);
       if($a)
       {  
	      setcookie($mess_id,'1');
	      echo '<script> alert("Advertisement reported.!!"); window.location.href="Advertisement_Mess.php"; </script>'; 
       }
       else
       { echo '<script> alert("Failed to report Ad!!"); window.location.href="Advertisement_Mess.php"; </script>'; 
       } }
	   else
	   { echo '<script> alert("Ad. already reported !!"); window.location.href="Advertisement_Mess.php"; </script>'; 
       }
  }
  
  
  if(isset($_POST['breview']))
  {  if(!empty($_POST['name']) && !empty($_POST['email']) && !empty($_POST['review']))
	 {  	  $dbhost='localhost';
              $username='root';
              $pass='';
              $db='roomiee';
              $con= mysqli_connect("$dbhost","$username","$pass","$db") ;
              $name=$_POST['name'];
			  $email=$_POST['email'];
			  $review=$_POST['review'];
			  
              $sql="Insert into reviews_mess values('','$name','$email','$review','$mess_id','$User_id') ";
			  $result=mysqli_query($con,$sql);
			  if($result)
			  { echo '<script> alert("SUCCESS"); window.location.href="Advertisement_Mess.php"; </script>';
		      }
			  else
			  { echo '<script> alert("ERROR"); window.location.href="Advertisement_Mess.php"; </script>';
			  }
     }
	 else
     {  echo '<script> alert("Fill all the fields..!!"); window.location.href="Advertisement_Mess.php"; </script>';   }
  }	 
?> 

<!DOCTYPE html>
<html lang="en">
<head>

  <!-- SITE TITTLE -->
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Advertisement Room</title>
  

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
									<a class="dropdown-item" href="User Profile.php">My Profile</a>
									<a class="dropdown-item" href="My Ads.php">My Ads</a>
									<a class="dropdown-item" href="Favourite.php">Favourite Ads</a>
								</div>
							</li>
							<li class="nav-item dropdown dropdown-slide">
								<a class="nav-link dropdown-toggle" data-toggle="dropdown" href="">Post Your Ad<span><i class="fa fa-angle-down"></i></span>
								</a>

								<!-- Dropdown list -->
								<div class="dropdown-menu">
									<a class="dropdown-item" href="Add Room.php">Room</a>
									<a class="dropdown-item" href="Add Mess.html">Mess</a>
									<a class="dropdown-item" href="Add Stationary.html">Stationary</a>
								</div>
							</li>
						</ul>
						<ul class="navbar-nav ml-auto mt-10">
							<li class="nav-item">
							<a class="nav-link login-button" style="color: #000;" data-toggle="modal" data-target="#Logout">Log Out</a>
							</li>
						  </ul>
						</div>
						
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
					  </nav>
					</div>
				  </div>
				</div>
			  </section>
<!--===================================
=            Store Section            =
====================================-->

<?php 
			  $dbhost='localhost';
              $username='root';
              $pass='';
              $db='roomiee';
              $con= mysqli_connect("$dbhost","$username","$pass","$db") ; 
              $sql="Select * from mess where mess_id='$mess_id'";
			  $result=mysqli_query($con,$sql);
			  while($row=mysqli_fetch_assoc($result))
			  {  
?>
<section class="section bg-gray">
	<!-- Container Start -->
	<div class="container">
		<div class="row">
			<!-- Left sidebar -->
			<div class="col-md-8">
				<div class="product-details">
					<h1 class="product-title"><?php echo $row['title']; ?></h1>
					<div class="product-meta">
						<ul class="list-inline">
							<li class="list-inline-item"><i class="fa fa-folder-open-o"></i> Category :<?php echo $row['category']; ?></li>
							<li class="list-inline-item"><i class="fa fa-location-arrow"></i> Location :<?php echo $row['location']; ?></li>
						</ul>
					</div>

					<!-- product slider -->
					<div class="product-slider">
						<div class="product-slider-item my-4" data-image="">
						 <?php echo '<img width="600px"  height="300px" src="data:image1;base64,'.base64_encode($row['image1']).'">';  ?>
						</div>
						<div class="product-slider-item my-4" data-image="">
						 <?php echo '<img width="600px"  height="300px" src="data:image2;base64,'.base64_encode($row['image2']).'">';  ?>
						</div>
						<div class="product-slider-item my-4" data-image="">
						 <?php echo '<img width="600px"  height="300px" src="data:image3;base64,'.base64_encode($row['image3']).'">';  ?>
						</div>
					</div>
					<!-- product slider -->
					<div class="content mt-5 pt-5">
						<ul class="nav nav-pills  justify-content-center" id="pills-tab" role="tablist">
							<li class="nav-item">
								<a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home"
								 aria-selected="true">Description</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" id="pills-contact-tab" data-toggle="pill" href="#pills-contact" role="tab" aria-controls="pills-contact"
								 aria-selected="false">Reviews</a>
							</li>
						</ul>
						<div class="tab-content" id="pills-tabContent">
							<div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
								<h3 class="tab-title">Description</h3>
								<?php echo $row['description']; ?>
							</div>
							<div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab">
								<h3 class="tab-title">Reviews</h3>								
								<div class="product-review">
								<?php
								    $dbhost='localhost';
                                    $username='root';
                                    $pass='';
                                    $db='roomiee';
                                    $con= mysqli_connect("$dbhost","$username","$pass","$db") ;
									
                                    $sql="Select * from reviews_mess where mess_id='$mess_id'";
			                        $result=mysqli_query($con,$sql);
                                    while($r=mysqli_fetch_assoc($result))
                                    {  $review_id=$r['review_id'];
                                ?>		
									<div class="media">
									 <?php 
									   $sql1="Select User_image from user where User_id IN(Select User_id from reviews_mess where review_id='$review_id')";
			                           $result1=mysqli_query($con,$sql1);
                                       $row1=mysqli_fetch_assoc($result1);
									   echo '<img src="data:User_image;base64,'.base64_encode($row1['User_image']).'">'; 
									 ?>
								    <div class="media-body">
											<!-- Ratings 
											<div class="ratings">
												<ul class="list-inline">
													<li class="list-inline-item">
														<i class="fa fa-star"></i>
													</li>
													<li class="list-inline-item">
														<i class="fa fa-star"></i>
													</li>
													<li class="list-inline-item">
														<i class="fa fa-star"></i>
													</li>
													<li class="list-inline-item">
														<i class="fa fa-star"></i>
													</li>
													<li class="list-inline-item">
														<i class="fa fa-star"></i>
													</li>
												</ul>
											</div> -->
											<div class="name">
												<h5><?php echo $r['name']; ?></h5>
											</div>
											<div class="email">
												<p><?php echo $r['email']; ?></p>
											</div>
											<div class="review-comment">
												<p>
												 <?php echo $r['review']; ?>
												</p>
											</div>
										</div>
									</div>
									<?php 
									  }
									?>
									<div class="review-submission">
										<h3 class="tab-title">Submit your review</h3>
										<!-- Rate 
										<div class="rate">
											<div class="starrr"></div>
										</div> -->
										<div class="review-submit">
											<form action="Advertisement_Mess.php" method="post" class="row">
												<div class="col-lg-6">
													<input type="text" name="name" id="name" class="form-control" value="<?php echo $_SESSION['Name']; ?>" readonly>
												</div>
												<div class="col-lg-6">
													<input type="email" name="email" id="email" class="form-control" value="<?php echo $_SESSION['Email']; ?>" readonly>
												</div>
												<div class="col-12">
													<textarea name="review" id="review" rows="10" class="form-control" placeholder="Message"></textarea>
												</div>
												<div class="col-12">
													<button name="breview" type="submit" class="btn btn-main">Submit</button>
												</div>
											</form>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-md-4">
				<div class="sidebar">
					<!--<div class="widget price text-center">
						<h4>Price(Rs)</h4>
						<p><?php echo $row['price']; ?></p>
					</div>
					 User Profile widget -->
					
					<?php  
					  $q="Select * from user where User_id IN( Select User_id from mess where mess_id='$mess_id')";
					  $r=mysqli_query($con,$q);
					  while($rows=mysqli_fetch_assoc($r))
			          {
					?>
					<div class="widget user text-center">
						<?php echo '<img src="data:User_image;base64,'.base64_encode($rows['User_image']).'">';  ?>
						<h5>Seller Name:-</h5>
						<h4><?php echo $rows['Name']; ?></h4>
						<ul class="list-inline mt-20">
							<li class="list-inline-item"><a href="" class="btn btn-contact d-inline-block  btn-primary px-lg-5 my-1 px-md-3" data-toggle="modal" data-target="#contact">Contact</a></li>
							<li class="list-inline-item"><a href="https://wa.me/91<?php echo $rows['Mobile_No']; ?>" target="_blank" class="btn btn-offer d-inline-block btn-primary ml-n1 my-1 px-lg-4 px-md-3">Chat</a></li>
						</ul>
					</div>
					
								<!-- Modal -->
								<div class="modal fade" id="contact" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
								  aria-hidden="true">
								  <div class="modal-dialog modal-dialog-centered" role="document">
									<div class="modal-content">
									  <div class="modal-header border-bottom-0">
										<button type="button" class="close" data-dismiss="modal" aria-label="Close">
										  <span aria-hidden="true">&times;</span>
										</button>
									  </div>
									  <div class="modal-body text-center">
										<img src="Account3.png" class="img-fluid mb-2" alt="" style="height: 200px;">
									  </div>
									  <table class="table table-bordered product-table">
										<tbody>
											<tr>
												<td><i class="fa fa-phone" style="margin-right:10px;"></i>Mobile No. :</td>
												<td><?php echo $rows['Mobile_No']; ?></td>
											</tr>
											<tr>
												<td><i class="fa fa-envelope" style="margin-right:10px;"></i>Email ID:</td>
												<td><?php echo $rows['Email']; ?></td>
											</tr>
										</tbody>
									</table>
									</div>
								  </div>
								</div>
					  <?php  }
					  ?>
								<!-- delete account popup modal end-->
					<!-- Safety tips widget -->
					<div class="widget disclaimer">
						<h5 class="widget-header">Safety Tips</h5>
						<ul>
							<li>○ Meet seller at a public place</li>
							<li>○ Check the item before you buy</li>
							<li>○ Pay only after collecting the item</li>
						</ul>
					</div>
					<div class="widget coupon text-center">
						<!-- Coupon description -->
						<p>Add to Favourite</p>
						<!-- Submii button -->
						<form action="Advertisement_Mess.php" method="Post">
						<input type="submit" name="fav" value="Click Here" class="btn btn-transparent-white">
					    </form>
					</div>
					<!-- Coupon Widget -->
					<div class="widget coupon text-center">
						<!-- Coupon description -->
						<p>Found Ad Inappropriate ? Report Here.</p>
						<!-- Submii button -->
						<form action="Advertisement_Mess.php" method="Post">
						<input type="submit" name="Report" value="Report" class="btn btn-transparent-white">
					    </form>
					</div>
				</div>
			</div>

		</div>
	</div>
	<!-- Container End -->
</section>
<?php 
	}
?>			
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