<?php
require_once "User.php";

class Borrower implements User {
    private $name;
    private $borrowedItems = [];

    public function __construct($name) {
        $this->name = $name;
    }

    public function viewItems($items) {
        echo "<h4> Available Items:</h4>";
        foreach ($items as $item) {
            echo $item->getDetails() . "<br>";
        }
    }

    public function borrowItem(LibraryItem $item) {
        $this->borrowedItems[] = $item;
        echo "<p> {$this->name} borrowed '{$item->title}'.</p>";
    }

    public function showBorrowedItems() {
        echo "<h4> {$this->name}'s Borrowed Items:</h4>";
        if (empty($this->borrowedItems)) {
            echo "No items borrowed.<br>";
        } else {
            foreach ($this->borrowedItems as $item) {
                echo $item . "<br>";
            }
        }
    }
}
?>
