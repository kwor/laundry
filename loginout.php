<?php
@session_start();
 
if (session_destroy())
        {
          //  location.href="index.php";
			
			header("Location:index.php ");   
            exit();
        }
        else
        {
            unset($_SESSION);
            header("Location:kuser.php ");   
            exit();
        }

?>