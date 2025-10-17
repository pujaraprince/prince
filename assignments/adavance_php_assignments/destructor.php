<?php
echo "Questions: Write a class that implements a destructor to perform cleanup tasks when an object is
destroyed.". "<br><br>";

?>

<?php
class FileHandler {
    private $file;

    // Constructor: Opens the file when the object is created
    public function __construct($filename) {
        echo "Opening file: $filename<br>";
        $this->file = fopen($filename, "w");
    }

    // Method to write data to the file
    public function writeData($data) {
        if ($this->file) {
            fwrite($this->file, $data);
            echo "Data written to file.<br>";
        }
    }

    // Destructor: Closes the file when the object is destroyed
    public function __destruct() {
        if ($this->file) {
            fclose($this->file);
            echo "File closed successfully.<br>";
        }
        echo "Object destroyed and cleanup done.<br>";
    }
}

// Create object
$obj = new FileHandler("example.txt");

// Write data
$obj->writeData("Hello, this is sample content.");

// Object will be destroyed automatically at end of script
?>
