<?php
   if(!empty($_POST['Email']) && !empty($_POST['question']) && !empty($_POST['answer']))
   { $Email=$_POST['Email'];
     $question=$_POST['question'];
     $answer=$_POST['answer'];
	 
	 $dbhost='localhost';
     $username='root';
     $pass='';
     $db='roomiee';
     $con= mysqli_connect("$dbhost","$username","$pass","$db") ;
	 
	 $sql=mysqli_query($con,"Select * from user where Email='$Email'");
	 $res=mysqli_num_rows($sql);
     
     if($res>0)
     {  while($row=mysqli_fetch_array($sql)) 
	    {  $ques=$row["question"];
		   $ans=$row["answer"];
		   
		   if($ques==$question)
		   {  if($ans==$answer)
		      {  echo "<script> window.location.href='Forgot-pass2.html'; </script>" ;  }
			  else
			  {  $msg1="Invalid Answer !!...."; 
			     echo "<script> alert('$msg1'); window.location.href='Forgot-pass.html'; </script>" ; 
		      }
		   }
		   else
		   {  $msg2="Invalid Question !!...."; 
			  echo "<script> alert('$msg2'); window.location.href='Forgot-pass.html'; </script>" ;
		   }
		}
	 }
     else
     { 	 $msg3="Invalid Email !!....";
         echo "<script> alert('$msg3'); window.location.href='Forgot-pass.html'; </script>" ;
     }	
   }
   else
   {     $msg4="Fill all the details..!!";
         echo "<script> alert('$msg4'); window.location.href='Forgot-pass.html'; </script>" ;
   }
?>