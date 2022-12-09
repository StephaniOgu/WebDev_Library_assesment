<?php 
/*
    * destroys current session 
    * refers user to login screen
*/
    require_once('../../data/session_connection.php');

    if(isset($_GET['logout']))
    {
        session_destroy();
        header("location:../login/login_screen.php");
    }
?>