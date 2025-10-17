<?php
abstract class LibraryItem {
    protected $title;
    protected $author;
    protected $year;

    public function __construct($title, $author, $year) {
        $this->title = $title;
        $this->author = $author;
        $this->year = $year;
    }

    // Abstract method (must be implemented by subclasses)
    abstract public function getDetails();

    // Magic getter and setter
    public function __get($property) {
        return $this->$property ?? null;
    }

    public function __set($property, $value) {
        if (property_exists($this, $property)) {
            $this->$property = $value;
        }
    }

    // Magic method for string conversion
    public function __toString() {
        return "{$this->title} by {$this->author} ({$this->year})";
    }
}
?>
