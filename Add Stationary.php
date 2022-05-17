<?php session_start();
  $User_id=$_SESSION['User_id'];
  $Email_id=$_SESSION['Email'];  
  if(isset($_POST['postad']))
  {  if(!empty($_POST['title']) && !empty($_POST['location']) && !empty($_POST['category']) &&  !empty($_POST['description']) && !empty($_POST['price']) && !empty($_FILES["image1"]["tmp_name"]) && !empty($_FILES["image2"]["tmp_name"]) &&  !empty($_FILES["image3"]["tmp_name"]) )
     { $dbhost='localhost';
       $username='root';
       $pass='';
       $db='roomiee';
       $con= mysqli_connect("$dbhost","$username","$pass","$db") ; 
	   
	   $title=$_POST['title'];
	   $category=$_POST['category'];
	   $location=$_POST['location'];
	   $description=$_POST['description'];
	   $price=$_POST['price'];
	   
       $image1=addslashes(file_get_contents($_FILES["image1"]["tmp_name"]));
       $image2=addslashes(file_get_contents($_FILES["image2"]["tmp_name"]));
       $image3=addslashes(file_get_contents($_FILES["image3"]["tmp_name"]));	 
	   
	   $sql="Insert into stationery values('','$title','$category','$location','$description','$price','$image1','$image2','$image3','$User_id',0)" ;
	   $a=mysqli_query($con,$sql) ;
	   if($a)
	    {   echo '<script> alert("Ad posted successfully..!"); window.location.href="Add Stationary.php"; </script>' ;
	    }
		else
		{  echo '<script> alert("Failed to post ad..!"); window.location.href="Add Stationary.php"; </script>' ; }
     }
	 else 
     { echo '<script> alert("Fill all the details."); window.location.href="Add Stationary.php"; </script>' ;}
  }
?>

<!DOCTYPE html>
<html lang="en">
<head>

  <!-- SITE TITTLE -->
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Post Stationery Ads</title>
  

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
							</div>      <div class="modal fade" id="PostAd" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                    <div class="modal-header border-bottom-0">
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
                                    </div>
                                    <div class="modal-body text-center">
                                        <a href="Add Room.php">
                                            <img class="option1" src="Room footer.jpg" alt="" style="height: 140px;">
                                            <div class="top">Post Room</div>
                                        </a>
                                        <a href="Add Mess.php">
                                            <img class="option2" src="Mess footer.jpg" alt="" style="height: 140px;">
                                            <div class="centered">Post Mess</div>
                                        </a>
                                        <a href="Add Stationary.php">
                                            <img class="option3" src="Stationary footer.jpg" alt="" style="height: 140px;">
                                            <div class="bottom">Post Stationery Items</div>
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

<section class="ad-post bg-gray py-5">
    <div class="container">
        <form action="Add Stationary.php" method="post" enctype="multipart/form-data">
            <!-- Post Your ad start -->
            <fieldset class="border border-gary p-4 mb-5">
                    <div class="row">
                        <div class="col-lg-12">
                            <h3>Post Your Stationery ad</h3>
                        </div>
                        <div class="col-lg-6">
                            <h6 class="font-weight-bold pt-4 pb-1">Title Of Ad:</h6>
                            <input type="text" name="title" class="border w-100 p-2 bg-white text-capitalize" placeholder="Ad Title">
							<h6 class="font-weight-bold pt-4 pb-1">Location:</h6>
							<textarea name="location" class="border p-3 w-100" rows="2" placeholder="enter location here.."></textarea>
                            <h6 class="font-weight-bold pt-4 pb-1">Description:</h6>
                            <textarea name="description" class="border p-3 w-100" rows="7" placeholder="Write details about your product"></textarea>
                        </div>
                        <div class="col-lg-6">
                            <h6 class="font-weight-bold pt-4 pb-1">Select Stationery Category:</h6>
                            <select name="category" id="inputGroupSelect" class="w-100">
                              <option name="category">Select</option>
                              <option value="Books">Books</option>
							  <option value="Office supplies">Office supplies</option>
							  <option value="College supplies">College supplies</option>
							  <option value="Art & Craft">Art & Craft</option>
							  <option value="Others">Others</option>
                            </select>
                            <div class="price">
                                <h6 class="font-weight-bold pt-4 pb-1">Price(Rs):</h6>
                                <div class="row px-3">
                                    <div class="col-lg-4 mr-lg-4 rounded bg-white my-2 ">
                                    <input type="text" name="price" class="border-0 py-2 w-100 price" placeholder="Price" id="price">
                                    </div>
                                </div>
							</div> <br>
                        
                               <div class="form-group choose-file d-inline-flex" >
									<input type="file" class="form-control-file mt-2 pt-1" name="image1" id="input-file1" >
							   </div>
                               <div class="form-group choose-file d-inline-flex" >
									<input type="file" class="form-control-file mt-2 pt-1" name="image2" id="input-file2" >
							   </div>
                               <div class="form-group choose-file d-inline-flex" >
									<input type="file" class="form-control-file mt-2 pt-1" name="image3" id="input-file3" >
							   </div>
            </fieldset>
             <!-- submit button 
             <div class="checkbox d-inline-flex">
                    <input type="checkbox" id="terms-&-condition" class="mt-1">
                    <label for="terms-&-condition" class="ml-2">By click you must agree with our
                    <span> <a class="text-success" href="terms-condition.html">Terms & Condition and Posting Rules.</a></span>
                </label>
                </div> -->
            <button type="submit" name="postad" class="btn btn-primary d-block mt-2" href="Add Stationary.php">Post Your Ad</button>
        </form>
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