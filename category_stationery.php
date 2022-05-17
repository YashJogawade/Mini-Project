<?php
  $dbhost='localhost';
  $username='root';
  $pass='';
  $db='roomiee';
  $con= mysqli_connect("$dbhost","$username","$pass","$db") ;
  
  $sql1="Select count(title) AS books from stationery where category='Books'";
  $result1=mysqli_query($con,$sql1);
  $data1=mysqli_fetch_assoc($result1);
  
  $sql2="Select count(title) AS Os from stationery where category='Office supplies'";
  $result2=mysqli_query($con,$sql2);
  $data2=mysqli_fetch_assoc($result2);
  
  $sql3="Select count(title) AS Cs from stationery where category='College supplies'";
  $result3=mysqli_query($con,$sql3);
  $data3=mysqli_fetch_assoc($result3);
  
  $sql4="Select count(title) AS AC from stationery where category='Art & Craft'";
  $result4=mysqli_query($con,$sql4);
  $data4=mysqli_fetch_assoc($result4);
  
  $sql5="Select count(title) AS others from stationery where category='Others'";
  $result5=mysqli_query($con,$sql5);
  $data5=mysqli_fetch_assoc($result5);
  
    echo '<div class="category-sidebar" id="category-list">
	<div class="widget category-list" id="category-list">
	<h4 class="widget-header">All Categories</h4>
	<ul class="category-list" >
		<li><a href="#">Books <span>'.$data1['books'].'</span></a></li>
		<li><a href="#">Office supplies<span>'.$data2['Os'].'</span></a></li>
		<li><a href="#">College supplies<span>'.$data3['Cs'].'</span></a></li>
        <li><a href="#">Art & Craft<span>'.$data4['AC'].'</span></a></li>
	    <li><a href="#">Others<span>'.$data5['others'].'</span></a></li>
	</ul>
	</div>
	</div>';
	
  mysqli_close($con);
?>
	   