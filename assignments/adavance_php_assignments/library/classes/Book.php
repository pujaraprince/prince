<?php
require_once "LibraryItem.php";

class Book extends LibraryItem {
    private $genre;
    public static $bookCount = 0; // Static property

    public function __construct($title, $author, $year, $genre) {
        parent::__construct($title, $author, $year);
        $this->genre = $genre;
        self::$bookCount++; // Count every book created
    }

    // Implementation of abstract method
    public function getDetails() {
        return " Book: {$this->title} ({$this->genre}) by {$this->author}, published in {$this->year}";
    }

    public static function getBookCount() {
        return self::$bookCount;
    }
}
?>
