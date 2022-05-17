<?php
   if(!empty($_POST['newp']) && !empty($_POST['conp']) && !empty($_POST['Email']))
   {  $newp=$_POST['newp'];
      $conp=!empty($_POST['conp']);
	  $email=$_POST['Email'];
	  
	  if($newp==$conp)
	  {  if(strlen($_POST['newp'])<8)
	     {  $m2="Password should be of minimum 8 characters in length..!!";
            echo "<script> window.alert('$m2'); window.location.href='Forgot-pass2.html'; </script>";
	     }
	     else
         { $password=$_POST['newp'];  
           $hash_password=password_hash($password,PASSWORD_DEFAULT);
		   
		   $dbhost='localhost';
           $username='root';
           $pass='';
           $db='roomiee';
           $con= mysqli_connect("$dbhost","$username","$pass","$db") ;
		   
		   $sql=mysqli_query($con,"UPDATE user set Password='$hash_password' WHERE Email='$email'");
		   if($sql)
		   { $msg="Your password has been updated...!!!"; 
		     echo "<script> alert('$msg'); window.location.href='Sign-In.html'; </script>" ;  
		   }
		   else
		   { $msg1="Some Error occured..!!";
		     echo "<script> alert('$msg1'); window.location.href='Forgot-pass2.html'; </script>" ;
		   }
         }
	  }
	  else
	  { $msg1="New password and Confirm Password didn't match!!";
        echo "<script> alert('$msg'); window.location.href='Forgot-pass2.html'; </script>" ;
	  }
   }
   else
   { $msg="Field cannot be empty..!!";
     echo "<script> alert('$msg'); window.location.href='Forgot-pass2.html'; </script>" ;
   }
?>