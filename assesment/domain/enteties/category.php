<?php
//class for a category entity
class Category {
    public $categoryID;
    public $name;

    function __construct($categoryID, $name) {
        $this->categoryID = $categoryID;
        $this->name = $name;
    }
}

?>

