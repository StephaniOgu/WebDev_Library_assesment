<?php
/*
    * displays books form $books_array
    * allow to perfom an action with book (reserve or delete form reserved)
*/
    include ('../../../domain/enteties/book.php');
    $books_array = $_POST['books_array'];
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Welcome to the book system</title>

        <link rel="stylesheet" href="style.css"> 
        <link rel="stylesheet" href="../ui/footer/style.css"> 
    </head>
    <body>
        <div class="wrapper">


        <?php
            foreach ($books_arr as $book) {
                $isbn = $book->isbn;
                $title = $book->title;
                $author = $book->author;
                $edition = $book->edition;
                $year = $book->year;
                $img = $book->img;
        ?>
            <div class="cover">
                <div class="book">
                    <label class="book__page book_cover_page">
                        <?php echo("<img src=\"$img\", alt = \"https://s3-us-west-2.amazonaws.com/s.cdpn.io/193203/1111.jpg\">"); ?>
                    </label>

                    <label class="book__page book_info_page">
                        <div class="page__content">
                            <?php echo("<h1 class=\"page__content-book-title\"> $title </h1>"); ?>
                            <?php echo("<h2 class=\"page__content-author\"> $author </h2>"); ?>
        
                            <p class="page__content-edition">
                                Edition
                                <?php echo("<span> $edition </span>"); ?>
                            </p>

                            <div class="page__content-year">
                                <p>Year</p>
                                <?php echo("<p> $year </p>"); ?>
                           </div>
                       </div>
                    </label>
                    <!-- form for perfome the action (delete form reserved or reserve) -->
                        <?php echo("<form action=\"$form_action\", method=\"post\">"); ?>
                            <?php echo("<input type=\"hidden\" name=\"isbn\" value=\"$isbn\">"); ?>
                            <button class="book_action" type="submit">
                                <?php echo("<img src=$button_icon>")?>
                            </button>
                        </form>
                </div>
               
            </div>
        <?php
            }
            include ('../ui/footer/footer.php');
        ?>
        </div>

    </body>
</html>