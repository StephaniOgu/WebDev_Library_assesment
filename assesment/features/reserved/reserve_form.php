
<?php
//conndecton for db
    require_once('../../data/session_connection.php');
    require_once('../../data/db_connection.php');

    $isbn = $_POST['isbn'];
    $sql;

    //query for check if the book is alredy reserved
    $sql = "SELECT * FROM Library.Reservations WHERE ISBN = \"$isbn\"";
    $result = $con->query($sql);
    $result_text; 

    if ($result->num_rows > 0) {
        //informing user if the book is alredy reserved
        $result_text = "It seems that this book is already reserved. Try enother one";
    } else {
        //query for reserve book if it is not reserved
        $sql = "INSERT INTO Library.Reservations VALUES (\"$isbn\", \"$user\", now())";
        $result_text = "Somethng went wrong"; 
        if ($con -> query($sql) === TRUE) {
            $result_text = "Book was successfully edded!"; 
        }
    }
    //shoeing the result of operation
    echo'<script type="text/javascript">
            alert("'. $result_text .'");
        </script>';
?>
    <form id= "success_form", action="../home/wellcome.php">
        <script type="text/javascript">
            document.getElementById('success_form').submit(); 
        </script>
    </form
<?php
    $con->close();
?>