<?php
include_once '../config/database.php';
include_once '../php_objects/book.php';

$database = new Database();
$db       = $database->getConnection();
$book     = new BookInterface($db);
$data     = json_decode(file_get_contents("php://input"));
$book->id = $data->id;

if ($book->delete()) {
    echo "Book was deleted.";
} else {
    echo "Unable to delete book.";
}
?>