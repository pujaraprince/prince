<?php
require_once "LibraryItem.php";

class Magazine extends LibraryItem {
    private $issueNumber;

    public function __construct($title, $author, $year, $issueNumber) {
        parent::__construct($title, $author, $year);
        $this->issueNumber = $issueNumber;
    }

    public function getDetails() {
        return " Magazine: {$this->title} (Issue {$this->issueNumber}) by {$this->author}, {$this->year}";
    }
}
?>
