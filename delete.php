<?php
    session_start();
	$User_id=$_SESSION['User_id'];
    if(isset($_POST['Delete']))
    {   
       $dbhost='localhost';
       $username='root';
       $pass='';
       $db='roomiee';
       $con= mysqli_connect("$dbhost","$username","$pass","$db") ; 
	   
	   $sql="Delete from user where User_id='$User_id'";
	   $result=mysqli_query($con,$sql);
	   if($result)
	   {  unset($_SESSION['User_id']);
          unset($_SESSION['Name']);
		  unset($_SESSION['Mobile_No']);
		  unset($_SESSION['Address']);
		  unset($_SESSION['Email']);
		  session_destroy();
	      echo '<script>alert("account deleted successfully..!"); window.location.href="Index.html";</script>';
	   }
	   else
	   {  echo '<script>alert("ERROR !"); window.location.href="My Ads.php"; </script>'; }
    }
?>