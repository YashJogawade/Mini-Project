<?php session_start();  
 if(!isset($_SESSION['Email']))
 { header('Location:Sign-In.html'); 
 }
?>
<!DOCTYPE html>
<html lang="en">
<head>

  <!-- SITE TITTLE -->
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Rooms</title>
  
 
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
							<!-- Modal -->
							<div class="modal fade" id="PostAd" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
							  aria-hidden="true">
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
							<!-- delete account popup modal end-->
					  </nav>
					</div>
				  </div>
				</div>
			  </section>
<!--===============================
=            Hero Area            =
================================-->

<section class="hero-area bg-1 text-center overly">
	<!-- Container Start -->
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<!-- Header Contetnt -->
				<div class="content-block">
					<h1>ROOMiee</h1>
						<!--<h1>Near You</h1>-->
					<div class="short-popular-category-list text-center">
						<h2>Category</h2>
						<ul class="list-inline">
							<li class="list-inline-item">
								<a href="#" class="select"><i class="fa fa-bed"></i> Rooms</a></li>
							<li class="list-inline-item">
								<a href="Mess.php"><i class="fa fa-cutlery"></i> Mess</a>
							</li>
							<li class="list-inline-item">
								<a href="Stationary.php"><i class="fa fa-book"></i> Stationery Items</a>
							</li>
					</div>
					
				</div>
				<!-- Advance Search -->
				<div class="advance-search">
						<div class="container">
							<div class="row justify-content-center">
								<div class="col-lg-12 col-md-12 align-content-center">
										<form>
											<div class="form-row">
												<div class="form-group col-md-4">
													<input type="text" class="form-control my-2 my-lg-1" id="search_title" placeholder="What are you looking for">
												</div>
												<div class="form-group col-md-3">
													<select class="w-100 form-control mt-lg-1 mt-md-2" id="search_category">
														<option value="1">Category</option>
														<option value="2">Flat</option>
														<option value="3">PG</option>
														<option value="4">Hostel</option>
														<option value="5">Guest Room</option> 
														<option value="6">Other</option> 
													</select>
												</div>
												<div class="form-group col-md-3">
													<input type="text" class="form-control my-2 my-lg-1" id="search_location" placeholder="Location">
												</div>
												<div class="form-group col-md-2 align-self-center">
													<input type="button" id="search_btn" class="btn btn-primary" value="Search Now">
												</div>
											</div>
										</form>
									</div>
								</div>
					</div>
				    <script type="text/javascript" src="Js/jquery-3.5.1.js"> </script> 
                    <script type="text/javascript">
					$(document).ready(function(){
						$("#search_btn").on("click",function(e){
						 var search_title=$("#search_title").val();
						 var search_category=$("#search_category").val();
						 var search_location=$("#search_location").val();
                        $.ajax({
                        url:"search.php",
                        type:"POST",
						data:{search_title:search_title,search_category:search_category,search_location:search_location},
                        success:function(data){
                        $("#cards").html(data);
                        }
                        });
                     });
					});
					</script>
				</div>
				
			</div>
		</div>
	</div>
	<!-- Container End -->
</section>
<section class="section-sm">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="search-result bg-gray">
					<h2>Result For "Rooms"</h2>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-lg-3 col-md-4">
				<div class="category-sidebar" id="category-list">
					<div class="widget category-list">
	<h4 class="widget-header">All Categories</h4>
	<ul class="category-list">
		<li><a href="">Flats <span></span></a></li>
		<li><a href="">PGs <span></span></a></li>
		<li><a href="">Hostels <span></span></a></li>
    <li><a href="">Guest Rooms <span></span></a></li>
    <li><a href="">Others <span></span></a></li>
	</ul>
	               <script type="text/javascript" src="Js/jquery-3.5.1.js"> </script> 
                    <script type="text/javascript">
					$(document).ready(function(){
                        $.ajax({
                        url:"category-list.php",
                        type:"POST",
                        success:function(data){
                        $("#category-list").html(data);
                        }
                        });
					});
					</script>
</div>
</div>


<div class="widget category-list">
	<h4 class="widget-header">Sort by Price</h4>
	<ul class="category-list">
	    <form method="POST">
		<li>Lowest &nbsp-->&nbsp Highest &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp  <input type="radio" name="filter" value="1"> <br><br> </li>
		<li>Highest &nbsp-->&nbsp Lowest &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp  <input type="radio" name="filter"  value="2"> <br><br> </li>
		</form>
	</ul>
	<script type="text/javascript" src="Js/jquery-3.5.1.js"> </script> 
                    <script type="text/javascript">
					$(document).ready(function(){
						$('input[type="radio"]').on("click",function(e){
						 var value=$(this).val();
                        $.ajax({
                        url:"sort.php",
                        type:"POST",
						data:{value:value},
                        success:function(data){
                        $("#cards").html(data);
                        }
                        });
						});
					});
	 </script>
</div>

<div class="widget price-range w-100">
	<h4 class="widget-header">Price Range</h4>
	<div class="block">
	 <input class="_price" type="number" id="min_num" placeholder="min" value="0">
		<span>to</span>
		<input class="_price" type="number" id="max_num" placeholder="max" value="0">	<br><br>
		<input type="button" id="price-filter-btn" align="center" class="btn btn-primary" value="Apply" style="height:30px; padding:2px 10px;">	
	</div>
	               <script type="text/javascript" src="Js/jquery-3.5.1.js"> </script> 
                    <script type="text/javascript">
					$(document).ready(function(){
						$("#price-filter-btn").on("click",function(e){
						var min_num=$("#min_num").val();
						var max_num=$("#max_num").val();
                        $.ajax({
                        url:"price-filter.php",
                        type:"POST",
						data:{min_num:min_num,max_num:max_num},
                        success:function(data){
                        $("#cards").html(data);
                        }
                        });
						});
					});
	                 </script>
</div>
				
			</div>
			<div class="col-md-9">
				
						
<div class="product-grid-list" id="cards">
<div class="row mt-30">
<?php 
			  $dbhost='localhost';
              $username='root';
              $pass='';
              $db='roomiee';
              $con= mysqli_connect("$dbhost","$username","$pass","$db") ; 
              $sql="Select * from room";
			  $result=mysqli_query($con,$sql);
			  while($row=mysqli_fetch_assoc($result))
			  {   
?>
<div class="col-sm-12 col-lg-4 col-md-6">
<div class="product-item bg-light">			
	<div class="card">
		<div class="thumb-content">
				<?php echo '<img class="card-img-top img-fluid" src="data:image1;base64,'.base64_encode($row['image1']).'">';  ?>
		</div>
		<div class="card-body">
		    <form method="post" action="Advertisement_Room.php">
		    <h4 class="card-title"><?php echo $row['title']; ?></h4>
		    <ul class="list-inline product-meta">
		    	<li class="list-inline-item">
		    		<i class="fa fa-folder-open-o"></i><?php echo $row['category']; ?>
		    	</li>
		    	<li class="list-inline-item">
		    		<?php echo "Price(Rs):".$row['price']; ?>
		    	</li>
				<li class="list-inline-item">
		    		<?php echo $row['location']; ?>
		    	</li>
				<input type="hidden" name="room_id" value="<?php echo $row['room_id']; ?>"> 
		    </ul>
			<div>  
			    <input type="submit" name="ViewAd" class="btn btn-primary" value="View Ad" style="height:30px; padding:2px 10px;">
		    </div>
			</form>
		</div>
	</div> 
</div>
</div>
<?php  }
?>
</div>
       
	   <div class="pagination justify-content-center" id="pagination">
	     <nav aria-label="Page navigation example">
	     <ul class="pagination">
						
						    <div id="previous">
							<li class="page-item">
								<a class="page-link" aria-label="Previous" id="">
									<span aria-hidden="true">&laquo;</span>
								</a>
							</li>
							</div>
							<li class="page-item active"><a class="page-link" id="1">1</a></li>
							<li class="page-item"><a class="page-link" id="2">2</a></li>
							<li class="page-item"><a class="page-link" id="3">3</a></li>
							<div id="next">
					        <li class="page-item">
							    <a class="page-link" aria-label="Next" id="">
									<span aria-hidden="true">&raquo;</span>
								</a>
							</li>
							</div>
						 </ul>
					     </nav>
					     </div>
							</div>
	   </div>
	   
</div>
				
				<script type="text/javascript" src="Js/jquery-3.5.1.js"> </script> 
                    <script type="text/javascript">
					$(document).ready(function(){
						function loadCard(page){
                        $.ajax({
                        url:"pagination.php",
                        type:"POST",
						data:{page_no:page},
                        success:function(data){
                        $("#cards").html(data);
                        }
                        });
					   }
						loadCard();
						
						$(document).on("click","#pagination li a",function(e){
						 e.preventDefault();
						 var page_id=$(this).attr("id");
						 loadCard(page_id);
						})
					});
	            </script>
			
			</div>
		</div>
	</div>
</section>
<!--============================
=            Footer            =
=============================-->
<section class="call-to-action overly bg-3 section-sm">
	<!-- Container Start -->
	<div class="container">
		<div class="row justify-content-md-center text-center">
			<div class="col-md-8">
				<div class="content-holder">
					<h2>Start today to get more exposure and
					grow your business</h2>
					<ul class="list-inline mt-30">
						<li class="list-inline-item"><a class="btn btn-main"  data-toggle="modal" data-target="#PostAd" style="color:white">Post Ads</a></li>
						<li class="list-inline-item"><a class="btn btn-main"  data-toggle="modal" data-target="#Logout" style="color:white">Log Out</a></li>
					</ul>
				</div>
			</div>
		</div>
	</div>
	<!-- Container End -->
</section>
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