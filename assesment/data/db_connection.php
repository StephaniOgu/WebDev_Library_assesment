<?php
/*
    * opening the connection Library db
*/

    $con=mysqli_connect('localhost','root','','Library');
    if(!$con)
    {
        die(' Please Check Your Connection'.mysqli_error($con));
    }
?>