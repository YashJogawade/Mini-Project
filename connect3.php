<?php
  session_start();
  if(!empty($_POST['Name']) && !empty($_POST['Email']) && !empty($_POST['Message']))
  { $name=$_POST['Name'];
    $email=$_POST['Email'];
    $message=$_POST['Message'];
  }
  else
  {  $m1="Please fill all the fields in the form..!!!";
     echo "<script> alert('$m1'); window.location.href='Contact Us.html';</script>";
  }
  
  $name=$_POST['Name'];
  $email=$_POST['Email'];
  $message=$_POST['Message'];
  
  $dbhost='localhost';
  $username='root';
  $password='';
  $db='roomiee';
  $con= mysqli_connect("$dbhost","$username","$password","$db") ;
  
  $stmt= $con->prepare("INSERT INTO contactus(Name,Email,Message) VALUES(?,?,?)") ;
  $stmt->bind_param("sss",$name,$email,$message);
  $stmt->execute();
  $m2="Thanks for contacting us..We will get back to you soon!!";
  echo "<script type='text/javascript'> alert('$m2');  window.location.href='Contact Us.html'; </script>";
  $stmt->close();
  $con->close();
?>