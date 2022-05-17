<?php
  $dbhost='localhost';
  $username='root';
  $pass='';
  $db='roomiee';
  $con= mysqli_connect("$dbhost","$username","$pass","$db") ;
  
  $sql1="Select count(title) AS M from mess where category='Mess'";
  $result1=mysqli_query($con,$sql1);
  $data1=mysqli_fetch_assoc($result1);
  
  $sql2="Select count(title) AS C from mess where category='Cafe'";
  $result2=mysqli_query($con,$sql2);
  $data2=mysqli_fetch_assoc($result2);
  
  $sql3="Select count(title) AS R from mess where category='Restaurant'";
  $result3=mysqli_query($con,$sql3);
  $data3=mysqli_fetch_assoc($result3);
  
  $sql4="Select count(title) AS O from mess where category='Other'";
  $result4=mysqli_query($con,$sql4);
  $data4=mysqli_fetch_assoc($result4);
  
    echo '<div class="category-sidebar" id="category-list">
	<div class="widget category-list" id="category-list">
	<h4 class="widget-header">All Categories</h4>
	<ul class="category-list" >
		<li><a href="#">Mess <span>'.$data1['M'].'</span></a></li>
		<li><a href="#">Cafes <span>'.$data2['C'].'</span></a></li>
		<li><a href="#">Restaurants <span>'.$data3['R'].'</span></a></li>
        <li><a href="#">Others <span>'.$data4['O'].'</span></a></li>
	</ul>
	</div>
	</div>';
	
  mysqli_close($con);
?>
	   