<?php
/*
    * this screen is a home hage for the user
    * user see all the books or result agter the serarching in the header
    * this screen contains the array of book @$books_arr variable which it will send to the book screen. This array contains
    or result of searchin or just all the books
    * screen contais header and books.php screen with cards of books (displays form array)
*/

//including classes Books and category for parsing information from db to the array and manipulate it threw the app
include ('../../domain/enteties/book.php');
include ('../../domain/enteties/categoty.php');

//icon for reserve book button
$button_icon = "../../assets/tap.png";
//adtion for reserve book button
$form_action = "../reserved/reserve_form.php";

//variables for search key words and selected category
$search = $_POST['search'];
$selected_category = $_POST['category'];

$books_arr = array();
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
            //getting all the books
            require_once('../../data/session_connection.php');
            require_once('../../data/db_connection.php');

            include ('../ui/header/header.php');
            $sql = "SELECT * FROM Library.Books";

            if ($search != '' AND $selected_category!= '') {
                $sql = "SELECT * FROM Library.Books WHERE BookTitle LIKE '%$search%' AND CategoryID = $selected_category OR Author LIKE '%$search%' AND CategoryID = $selected_category";
                ECHO("Results for '$search'");
            } elseif ($search != ''){
                $sql = "SELECT * FROM Library.Books WHERE BookTitle LIKE '%$search%' OR Author LIKE '%$search%'";
                ECHO("Results for '$search' \n");
            } elseif ($selected_category!= ''){
                $sql = "SELECT * FROM Library.Books WHERE CategoryID = $selected_category";
            }

            $result = $con->query($sql);
            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    //creating the book array form class book
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
            
            include ('../ui/books/books.php');
            
            $con->close();
        ?>
    </body>
</html>