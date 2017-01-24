<?php
include_once 'config/database.php';
include_once 'php_objects/book.php';
$database = new Database();
$db       = $database->getConnection();
$book     = new BookInterface($db);

//get posted data
$data = json_decode(file_get_contents("php://input"));

//property values
$book->name        = $data->name;
$book->author      = $data->author;
$book->category    = $data->category;
$book->description = $data->description;
$book->img 	       = $data->img;
$book->created     = date('Y-m-d H:i:s');

if ($book->create()) {
    echo "Book created successfuly.";
} else {
    echo "Unable to create the book.";
}
?>