<?php
//class for a book entity
class Book {
    public $isbn;
    public $title;
    public $author;
    public $year;
    public $edition;
    public $categoryID;
    public $img;

    function __construct($isbn, $title, $author, $year, $edition, $categoryID, $img) {
        $this->isbn = $isbn;
        $this->title = $title;
        $this->author = $author;
        $this->year = $year;
        $this->edition = $edition;
        $this->categoryID = $categoryID;
        $this->img = $img;
    }
}

?>