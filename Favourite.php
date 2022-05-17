<?php session_start(); 
    if(!isset($_SESSION['Email']))
    { header('Location:Sign-In.html'); 
    }
	$Email_temp=$_SESSION['Email'];
	$User_id=$_SESSION['User_id'];
	
	if(isset($_POST['delete']))
    {  $dbhost='localhost';
       $username='root';
       $pass='';
       $db='roomiee';
       $con= mysqli_connect("$dbhost","$username","$pass","$db") ; 
	   $room_id=$_POST['room_id'];
	   
	   $sql="DELETE FROM favourite WHERE room_id='$room_id'";
	   $result=mysqli_query($con,$sql);
	   if($result)
	   { echo '<script> alert("SUCCESS!!"); window.location.href="Favourite.php"; </script>' ; }
       else
	   { echo '<script> alert("ERROR!!"); window.location.href="Favourite.php"; </script>' ; }
	}
	
	if(isset($_POST['view']))
    {  
	   $room_id=$_POST['room_id'];
	   $_SESSION['room_id']=$room_id;
	   header('Location:Advertisement_Room.php');
	}
	
  
  if(isset($_POST['delete_mess']))
    {  $dbhost='localhost';
       $username='root';
       $pass='';
       $db='roomiee';
       $con= mysqli_connect("$dbhost","$username","$pass","$db") ; 
	   $mess_id=$_POST['mess_id'];
	   
	   $sql="DELETE FROM favourite_mess WHERE mess_id='$mess_id'";
	   $result=mysqli_query($con,$sql);
	   if($result)
	   { echo '<script> alert("SUCCESS!!"); window.location.href="Favourite.php"; </script>' ; }
       else
	   { echo '<script> alert("ERROR!!"); window.location.href="Favourite.php"; </script>' ; }
	}
	
	if(isset($_POST['view_mess']))
  {  
	   $mess_id=$_POST['mess_id'];
	   $_SESSION['mess_id']=$mess_id;
	   header('Location:Advertisement_Mess.php');
	}
	

  
  if(isset($_POST['delete_stationery']))
    {  $dbhost='localhost';
       $username='root';
       $pass='';
       $db='roomiee';
       $con= mysqli_connect("$dbhost","$username","$pass","$db") ; 
	   $stationery_id=$_POST['stationery_id'];
	   
	   $sql="DELETE FROM favourite_stationery WHERE stationery_id='$stationery_id'";
	   $result=mysqli_query($con,$sql);
	   if($result)
	   { echo '<script> alert("SUCCESS!!"); window.location.href="Favourite.php"; </script>' ; }
       else
	   { echo '<script> alert("ERROR!!"); window.location.href="Favourite.php"; </script>' ; }
	}
	
	if(isset($_POST['view_stationery']))
    {  
	   $stationery_id=$_POST['stationery_id'];
	   $_SESSION['stationery_id']=$stationery_id;
	   header('Location:Advertisement_Stationary.php');
	}
	
?>
<!DOCTYPE html>
<html lang="en">
<head>

  <!-- SITE TITTLE -->
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Favourite Ads</title>
  
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
  
  <style>
    .icon-input-btn{
        display: inline-block;
        position: relative;
      
    }
    .icon-input-btn input{
        border-radius: 50%;
        background: transparent;
        height: 30px;
        width: 30px;
    }
    .icon-input-btn input:hover{
       background-color: #d4af37;
    }
    .icon-input-btn .fa{
        display: inline-block;
        position: absolute;
        margin:7px;
           }
   </style>
  


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
            <a class="navbar-brand" href="Index.html">
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
                  </div>
                </li>
                <li class="nav-item active">
                                    <a class="nav-link" href="Terms _ Conditions.html">Terms & Conditions</a>
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
<section class="dashboard section">
  <!-- Container Start -->
  <div class="container">
    <!-- Row Start -->
    <div class="row">
      <div class="col-md-10 offset-md-1 col-lg-4 offset-lg-0">
        <div class="sidebar">
          <!-- User Widget -->
          <div class="widget user-dashboard-profile">
            <!-- User Image -->
            <div class="profile-thumb">
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
            </div><br>
            <!-- User Name -->
            <h5 class="text-center"><?php echo $_SESSION['Name']; ?></h5>
            <a href="User Profile.php" class="btn btn-main-sm">Edit Profile</a>
          </div>
          <!-- Dashboard Links -->
          <div class="widget user-dashboard-menu">
            <ul>
              <li><a href="" data-toggle="modal" data-target="#Logout"><i class="fa fa-cog"></i> Logout</a></li>
              <li><a href="" data-toggle="modal" data-target="#deleteaccount"><i class="fa fa-power-off"></i>Delete Account</a></li>
            </ul>
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
                <!-- delete account popup modal end-->
          <!-- delete-account modal -->
        </div>
      </div>
      <div class="col-md-10 offset-md-1 col-lg-8 offset-lg-0">
        <!-- Recently Favorited -->
        <div class="widget dashboard-container my-adslist">
          <h3 class="widget-header">Favourite Ads</h3>
          <table class="table table-responsive product-dashboard-table">
            <thead>
              <tr>
                <th class="text-center">Image</th>
                <th class="text-center"><span>Title</span></th>
                <th class="text-center">Category</th>
				<th class="text-center">Price(Rs)</th>
				<th class="text-center">Actions</th>
              </tr>
            </thead>
            <tbody>
			<?php 
			  $dbhost='localhost';
              $username='root';
              $pass='';
              $db='roomiee';
              $con= mysqli_connect("$dbhost","$username","$pass","$db") ; 
			  
			  
              $sql="Select * From room where room_id IN(Select room_id from favourite where User_id='$User_id')";
			  $result=mysqli_query($con,$sql);
			  $count=mysqli_num_rows($result);
			  for($i=0;$i<$count;$i++)
			  {   while($row=mysqli_fetch_assoc($result))
				  {  
              ?>			  
              <tr>
                <td class="product-thumb">
				<?php echo '<img width="130px"  height="auto" style="text-align:left;" src="data:image1;base64,'.base64_encode($row['image1']).'">';  ?>
                </td>
				<td>
				  <h3 class="title" style="text-align:center; margin-left:20px; overflow:hidden; max-width:10ch;"><?php echo $row['title']; ?></h3>
				</td>
				<td class="product-category"><span class="categories"><?php echo $row['category']; ?></span></td>
                <td style="text-align:center;"><span class="categories"><?php echo $row['price']; ?></span></td>
                <form method="post" action="Favourite.php">
				      <td class="action" data-title="Action">
                      <div class="m-3">
	                  <div class="icon-input-btn">
		              <i class="fa fa-eye"> </i>
                      <input type="submit" name="view" value="">
                      </div>
                      <div class="icon-input-btn">
		              <i class="fa fa-trash"></i> 
                      <input type="submit" name="delete" value="" >
                      </div>
					  <input type="hidden" name="room_id" value="<?php echo $row['room_id']; ?>">
                       </div>          
                      </td>
				</form>
              </tr>
		     <?php }
			  }
        ?>
        
		<?php 
			  $dbhost='localhost';
              $username='root';
              $pass='';
              $db='roomiee';
              $con= mysqli_connect("$dbhost","$username","$pass","$db") ; 
              $sql="Select * From stationery where stationery_id IN(Select stationery_id from favourite_stationery where User_id='$User_id')";
			  $result=mysqli_query($con,$sql);
			  $count=mysqli_num_rows($result);
			  for($i=0;$i<$count;$i++)
			  {   while($row=mysqli_fetch_assoc($result))
				  {  
              ?>			  
              <tr>
                <td class="product-thumb">
				<?php echo '<img width="130px"  height="auto" style="text-align:left;" src="data:image1;base64,'.base64_encode($row['image1']).'">';  ?>
                </td>
				<td>
				  <h3 class="title" style="text-align:center; margin-left:20px; overflow:hidden; max-width:10ch;"><?php echo $row['title']; ?></h3>
				</td>
				<td class="product-category"><span class="categories"><?php echo $row['category']; ?></span></td>
                <td style="text-align:center;"><span class="categories"><?php echo $row['price']; ?></span></td>
                <form method="post" action="Favourite.php">
				      <td class="action" data-title="Action">
                      <div class="m-3">
	                  <div class="icon-input-btn">
		              <i class="fa fa-eye"> </i>
                      <input type="submit" name="view_stationery" value="">
                      </div>
                      <div class="icon-input-btn">
		              <i class="fa fa-trash"></i> 
                      <input type="submit" name="delete_stationery" value="" >
                      </div>
					  <input type="hidden" name="stationery_id" value="<?php echo $row['stationery_id']; ?>">
                       </div>          
                      </td>
				 </form>
              </tr>
		     <?php }
			  }
        ?>
		
        <?php
	    $dbhost='localhost';
        $username='root';
        $pass='';
        $db='roomiee';
        $con= mysqli_connect("$dbhost","$username","$pass","$db") ;
        $sql="Select * From mess where mess_id IN(Select mess_id from favourite_mess where User_id='$User_id')";
			  $result=mysqli_query($con,$sql);
			  $count=mysqli_num_rows($result);
			  for($i=0;$i<$count;$i++)
			  {   while($row=mysqli_fetch_assoc($result))
				  {  
              ?>			  
              <tr>
                <td class="product-thumb">
				<?php echo '<img width="130px"  height="auto" style="text-align:left;" src="data:image1;base64,'.base64_encode($row['image1']).'">';  ?>
                </td>
				<td>
				  <h3 class="title" style="text-align:center; margin-left:20px; overflow:hidden; max-width:10ch;"><?php echo $row['title']; ?></h3>
				</td>
				<td class="product-category"><span class="categories"><?php echo $row['category']; ?></span></td>
                <td style="text-align:center;"><span class="categories">-</span></td>
                <form method="post" action="Favourite.php">
				      <td class="action" data-title="Action">
                      <div class="m-3">
	                  <div class="icon-input-btn">
		              <i class="fa fa-eye"> </i>
                      <input type="submit" name="view_mess" value="">
                      </div>
                      <div class="icon-input-btn">
		              <i class="fa fa-trash"></i> 
                      <input type="submit" name="delete_mess" value="" >
                      </div>
					  <input type="hidden" name="mess_id" value="<?php echo $row['mess_id']; ?>">
                       </div>          
                      </td>
				</form>
              </tr>
		     <?php }
			  }
			  ?>
            </tbody>
          </table>

        </div>
        <!-- pagination --
        <div class="pagination justify-content-center">
					<nav aria-label="Page navigation example">
						<ul class="pagination">
							<li class="page-item">
								<a class="page-link" href="#" aria-label="Previous">
									<span aria-hidden="true">&laquo;</span>
									<span class="sr-only">Previous</span>
								</a>
							</li>
							<li class="page-item"><a class="page-link" href="#">1</a></li>
							<li class="page-item active"><a class="page-link" href="#">2</a></li>
							<li class="page-item"><a class="page-link" href="#">3</a></li>
							<li class="page-item">
								<a class="page-link" href="#" aria-label="Next">
									<span aria-hidden="true">&raquo;</span>
									<span class="sr-only">Next</span>
								</a>
							</li>
						</ul>
					</nav>
				</div>
           -->

      </div>
    </div>
    <!-- Row End -->
  </div>
  <!-- Container End -->
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