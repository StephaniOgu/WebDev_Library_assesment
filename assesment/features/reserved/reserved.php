<!DOCTYPE html>
<?php
//uses the book entity
include ('../../domain/enteties/book.php');
//forms array of books
$books_arr = array();
//button and action for removing book form resered
$button_icon = "../../assets/remove.png";
$form_action = "../reserved/remove_form.php";

?>

<!DOCTYPE html>
<html>
    <head>
	<meta charset="UTF-8">

        <title>Post Hour</title>
		<link rel="stylesheet" href="../ui/normalize.css">
		<link rel="stylesheet" href="../ui/header/style.css">
		<link rel="stylesheet" href="../ui/books/style.css">

    </head>
    <body>		
        <?php

            require_once('../../data/session_connection.php');
            require_once('../../data/db_connection.php');

            include ('../ui/header/header.php');
            //selects reserved books and adds them to the array
            $sql = "SELECT * FROM Library.Books WHERE ISBN IN(SELECT ISBN FROM Library.Reservations WHERE Username = \"$user\")";

            $result = $con->query($sql);
            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    $isbn = $row["ISBN"];
                    $bookTitle = $row["BookTitle"];
                    $bookAuthor = $row["Author"];
                    $bookEdition = $row["Edition"];
                    $bookYear = $row["Year"];
                    $bookCateforyID = $row["CategoryID"];
                    $img = "https://thisartworkdoesnotexist.com/";
                    $book = new Book("$isbn", "$bookTitle", "$bookAuthor","$bookYear", "$bookEdition", "$bookCateforyID", "$img");
                    array_push($books_arr, $book);
                }
            } else {
                echo "0 results";
            }
            //showing the books.php screen with array of reserved books
            include ('../ui/books/books.php');
            $con->close();
        ?>
    </body>
</html>


