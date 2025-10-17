<?php
require_once "./classes/Book.php";
require_once "./classes/Magazine.php";
require_once "./classes/Borrower.php";
require_once "./classes/Librarian.php";

echo "Questions: Develop a mini project (e.g., a Library Management System) that utilizes all OOP concepts
like classes, inheritance, interfaces, magic methods, etc.". "<br><br>";

echo "<h2> Library Management System (OOP Mini Project)</h2>";

// Create Library Items
$book1 = new Book("The Alchemist", "Paulo Coelho", 1988, "Fiction");
$book2 = new Book("Clean Code", "Robert C. Martin", 2008, "Programming");
$mag1  = new Magazine("National Geographic", "Various", 2024, 122);

$collection = [$book1, $book2, $mag1];

// Create Users
$librarian = new Librarian("Priya");
$borrower  = new Borrower("Prince");

// Librarian adds new book
$newBook = new Book("Atomic Habits", "James Clear", 2018, "Self-help");
$librarian->addItem($collection, $newBook);

// Librarian views all items
$librarian->viewItems($collection);

// Borrower views and borrows
$borrower->viewItems($collection);
$borrower->borrowItem($book2);
$borrower->borrowItem($newBook);

// Show borrowed items
$borrower->showBorrowedItems();

echo "<hr><strong> Total Books Created: " . Book::getBookCount() . "</strong>";
?>
