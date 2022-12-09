<?php 
/*
    * functionality for login the user;
    * stars the session and checking the connection to the DB (in session connection)
    * gots the username and password, hendles the select user query
    * if user does not exist, returns the information for validationg
*/

//including the db and session connection file (for abvoid dublications)
    require_once('../../data/db_connection.php');
    require_once('../../data/session_connection.php');
    
    if(isset($_POST['Login'])) {
        $username = $_POST['Username'];
        $password = $_POST['Password'];

        if(empty($username) || empty($password)) {
            header("location:login_screen.php?Empty= Please Fill in the Blanks");
        }
        else {
            $query="SELECT * FROM Users WHERE UserName='".$username."' and Password='".$password."'";
            $result=mysqli_query($con,$query);

            if(mysqli_fetch_assoc($result)) {
                $_SESSION['User']=$username;
                header("location:../home/wellcome.php");
            }
            else {
                header("location:login_screen.php?Invalid= User name or Password is incorrect. Please enter correct User Name and Password");
            }
        }
    }
    else {
        echo 'Unexpected error';
    }

?>