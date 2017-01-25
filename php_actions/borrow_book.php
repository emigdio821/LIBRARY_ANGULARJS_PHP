<?php
// include database and object files 
include_once '../config/database.php';
include_once '../php_objects/book.php';

$database = new Database();
$db       = $database->getConnection();
$book     = new BookInterface($db);
$data     = json_decode(file_get_contents("php://input"));
$book->id = $data->id;

//set book property values
$book->borrowed = $data->borrowed;

// update the book
if ($book->borrowBook()) {
    echo "The book was updated.";
} else {
    echo "Unable to update book.";
}
?>