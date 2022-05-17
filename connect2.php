<?php
  session_start();
  if(!empty($_POST['Email']) && !empty($_POST['Password']))
  {  $Email=$_POST['Email'];
     $Password=$_POST['Password'];
	 
	 $dbhost='localhost';
     $username='root';
     $pass='';
     $db='roomiee';
     $con= mysqli_connect("$dbhost","$username","$pass","$db") ;
  
     $q=mysqli_query($con,"Select * from user where Email='$Email'");
     $c=mysqli_num_rows($q);
  
     if($c>0)
     {  while($row=mysqli_fetch_array($q)) 
	    { 
		  $hash_password=$row["Password"];
        if(password_verify($Password,$hash_password))
        {  
			  $_SESSION['User_id']=$row["User_id"];
			  $_SESSION['Name']=$row["Name"];
			  $_SESSION['Mobile_No']=$row["Mobile_No"];
			  $_SESSION['Address']=$row["Address"];
			  $_SESSION['Email']=$Email ;
			echo "<script> window.location.href='Room.php'; </script>"; 
        } 
        else
        {  $msg1="Invalid Password !!....";
           echo "<script> alert('$msg1'); window.location.href='Sign-In.html'; </script>" ;
		   session_destroy();
        }
		}
     }
     else if($c==0)
     { $msg2="Invalid Email !!....";
       echo "<script> alert('$msg2'); window.location.href='Sign-In.html'; </script>" ;
     }
  }
  else
  { $msg="Please fill the form properly !!";
    echo "<script> alert('$msg'); window.location.href='Sign-In.html'; </script>" ;
  }
?>