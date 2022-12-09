<?php
// gets the information about user form signup form

$username = $_POST['Username'];
$password = $_POST['Password'];
$name = $_POST['Firstname'];
$surmane = $_POST['Surname'];
$address = $_POST['Address'];
$area = $_POST['Area'];
$city = $_POST['City'];
$telephone = $_POST['Telephone'];
$mobile = $_POST['Mobile'];

//including the db connection file (for abvoid dublications)
require_once('../../data/db_connection.php');

//inserting user
$sql = "INSERT INTO Library.Users 
VALUES ('$username', '$password', '$name', '$surmane', '$address', '$area', '$city',  '$telephone', '$mobile')";

//reffer to the loggin if signup was successfull
if ($con -> query($sql) === TRUE) {
?>
    <form name="loginform" method="post" action="../login/login_process.php">
        <input type="hidden" placeholder="Username" name="Username" value="<?php $username ?>">
        <input type="hidden" placeholder="Password" name="Password" value="<?php $password ?>">
        <button type="hidden" name="Login"></button>
        <script language="JavaScript"> document.loginform.submit(); </script>
    </form>

<?php    
} 
//validation if the user is already extists or password is too long
else {
    $result = $con -> error;
    $message;
    if (str_contains($result, "Data too long for column 'Password'")){
        $message = "Password must be 6 simbols";
    } elseif (str_contains($result, "Duplicate entry")) {
        $message = "This username is alsready taken";
    } 

    echo('<script type="text/javascript">
            alert("'. $message  .'");
        </script>');
    ?>
    <script>history.back();</script>
<?php
}
// close connection
$connection->close();
?>
