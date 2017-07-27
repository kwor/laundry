<?php
@session_start();
 
if (session_destroy())
        {
          //  location.href="index.php";
            setcookie('email', null);
			setcookie('pass', null);
			header("Location:login.php ");   
            exit();
        }
        else
        {
        	
            unset($_SESSION);
			setcookie('email', null);
			setcookie('pass', null);
            header("Location:login.php ");   
            exit();
        }

?>