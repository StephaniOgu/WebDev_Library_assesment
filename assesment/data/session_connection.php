<?php
/*
    * starts the session 
    * checks is the user logged in
*/
    session_start();

    if(isset($_SESSION['User'])) {
        $user = $_SESSION['User'];
    }
    else {
        header("location:http://localhost/tuUni/webD/assesment/features/login/login_screen.php");
    }
?>