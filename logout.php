<?php
    session_start();
    if(isset($_POST['Logout']))
    {   
        unset($_SESSION['User_id']);
        unset($_SESSION['Name']);
		unset($_SESSION['Mobile_No']);
		unset($_SESSION['Address']);
		unset($_SESSION['Email']);
		session_destroy();
        header('location:Index.html');
    }
	else
	{  echo "button not set";
    }
?>