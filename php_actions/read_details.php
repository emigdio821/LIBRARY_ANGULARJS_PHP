<?php
include_once '../config/database.php';
include_once '../php_objects/book.php';

$database = new Database();
$db       = $database->getConnection();
$book     = new BookInterface($db);
$data     = json_decode(file_get_contents("php://input"));
$book->id = $data->id;
$book->readBookDetails();

$book_arr[] = array(
    "id" => $book->id,
    "name" => $book->name,
    "author" => $book->author,
    "category" => $book->category,
    "description" => $book->description,
    "img" => $book->img,
    "borrowed" => $book->borrowed,
    "user" => $book->user
);

print_r(json_encode($book_arr));
?>