<?php
  if(!empty($_POST['Name']) && !empty($_POST['Mobile_No']) && !empty($_POST['Address']) && !empty($_POST['Email']) && !empty($_POST['Password']) && !empty($_POST['question']))
  {  $address=$_POST['Address'];
     
    $string = $_POST['Name'];
    if (preg_match('/[\'^£$%&*()}{@#~?><>,|=+¬-]/', $string))
    {  $msg="Special characters are not allowed for Username!!";
        echo "<script> alert('$msg'); window.location.href='Sign-Up.html';</script>";
    }
	else
	{   $name=$_POST['Name'];
	}

    $str = $_POST['Email'];
    if (preg_match('/[\'^£$%&*()}{#~?><>,|=_+¬-]/', $str))
    {   $msg="Invalid Email Id!!";
        echo "<script> alert('$msg'); window.location.href='Sign-Up.html';</script>";
    }
	else
	{   $email=$_POST['Email'];
	}	
	 
    if(strlen($_POST['Mobile_No'])<10 || strlen($_POST['Mobile_No'])>10)
	{    $m1="Please enter correct mobile number.";
         echo "<script> alert('$m1'); window.location.href='Sign-Up.html';</script>";
    }
	else
	{ $mobile=$_POST['Mobile_No'];  }

	if(strlen($_POST['Password'])<8)
	{  $m2="Password should be of minimum 8 characters in length..!!";
       echo "<script> window.alert('$m2'); window.location.href='Sign-Up.html'; </script>";
	}
	else
    { $password=$_POST['Password'];  
      $hash_password=password_hash($password,PASSWORD_DEFAULT);
    }
	
	$answer=$_POST['answer'];
	$question=$_POST['question'];
  }
  else
  {  $m3="Please fill all the fields in the form..!!!";
     echo "<script> alert('$m3'); window.location.href='Sign-Up.html';</script>";
  }
    
  $dbhost='localhost';
  $username='root';
  $pass='';
  $db='roomiee';
  $con= mysqli_connect($dbhost,$username,$pass,$db) ;
  $check=mysqli_query($con,"select * from user where Mobile_No='$mobile' OR Email='$email'");
  $checkrows=mysqli_num_rows($check);
   
  if($checkrows>0)
  { $msg="Account Already Exists !!";
	echo "<script type='text/javascript'> alert('$msg'); window.location.href='Sign-Up.html'; </script>";
  } 
  else 
  {  $stmt= $con->prepare("INSERT INTO user(Name,Mobile_No,Address,Email,Password,question,answer) VALUES(?,?,?,?,?,?,?)") ;
     $stmt->bind_param("sisssss",$name,$mobile,$address,$email,$hash_password,$question,$answer);
	 $stmt->execute();
	 $message="Successfully SignedUp";
	 echo "<script type='text/javascript'>alert('$message'); window.location.href='Sign-In.html';</script>";
	 $stmt->close();
	 $con->close();
   }
?>