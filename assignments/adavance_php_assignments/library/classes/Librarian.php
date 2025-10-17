<?php
require_once "Borrower.php";

class Librarian extends Borrower {
    public function __construct($name) {
        parent::__construct($name);
    }

    // Overriding viewItems
    public function viewItems($items) {
        echo "<h4> Librarian View:</h4>";
        foreach ($items as $item) {
            echo $item->getDetails() . "<br>";
        }
        echo "<p>Total Books: " . Book::getBookCount() . "</p>";
    }

    public function addItem(&$collection, LibraryItem $item) {
        $collection[] = $item;
        echo "<p> {$item->title} added by librarian.</p>";
    }
}
?>
