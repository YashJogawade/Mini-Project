<?php
  $dbhost='localhost';
  $username='root';
  $pass='';
  $db='roomiee';
  $con= mysqli_connect("$dbhost","$username","$pass","$db") ;
  
  $sql1="Select count(title) AS flats from room where category='Flat'";
  $result1=mysqli_query($con,$sql1);
  $data1=mysqli_fetch_assoc($result1);
  
  $sql2="Select count(title) AS pgs from room where category='PG'";
  $result2=mysqli_query($con,$sql2);
  $data2=mysqli_fetch_assoc($result2);
  
  $sql3="Select count(title) AS hostels from room where category='Hostel'";
  $result3=mysqli_query($con,$sql3);
  $data3=mysqli_fetch_assoc($result3);
  
  $sql4="Select count(title) AS grooms from room where category='Guest Room'";
  $result4=mysqli_query($con,$sql4);
  $data4=mysqli_fetch_assoc($result4);
  
  $sql5="Select count(title) AS others from room where category='Other'";
  $result5=mysqli_query($con,$sql5);
  $data5=mysqli_fetch_assoc($result5);
  
    echo '<div class="category-sidebar" id="category-list">
	<div class="widget category-list" id="category-list">
	<h4 class="widget-header">All Categories</h4>
	<ul class="category-list" >
		<li><a href="#">Flats <span>'.$data1['flats'].'</span></a></li>
		<li><a href="#">PGs <span>'.$data2['pgs'].'</span></a></li>
		<li><a href="#">Hostels <span>'.$data3['hostels'].'</span></a></li>
        <li><a href="#">Guest Rooms<span>'.$data4['grooms'].'</span></a></li>
	    <li><a href="#">Others<span>'.$data5['others'].'</span></a></li>
	</ul>
	</div>
	</div>';
	
  mysqli_close($con);
?>
	   