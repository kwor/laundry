<?php
@session_start();
 
if (session_destroy())
        {
            location.href="index.php";
            exit();
        }
        else
        {
            unset($_SESSION);
            location.href="kuser.php";
            exit();
        }

?>