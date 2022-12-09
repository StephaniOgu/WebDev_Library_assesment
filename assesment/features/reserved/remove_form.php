
<?php
//connecton for db
    require_once('../../data/session_connection.php');
    require_once('../../data/db_connection.php');

    $isbn = $_POST['isbn'];

    //query for remove book from reserved
    $sql = "DELETE FROM Library.Reservations WHERE ISBN=\"$isbn\" AND UserName=\"$user\"";

    if ($con -> query($sql) === TRUE) {
?>
    <form id= "success_form", action="reserved.php">
        <script type="text/javascript">
            document.getElementById('success_form').submit(); // SUBMIT FORM
        </script>
    </form
<?php
    }

    $con->close();
?>