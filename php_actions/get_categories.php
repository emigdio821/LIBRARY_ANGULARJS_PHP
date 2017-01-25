<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

include_once '../config/database.php';
include_once '../php_objects/book.php';

$database = new Database();
$db       = $database->getConnection();
$book     = new BookInterface($db);
$stmt     = $book->getCategories();
$num      = $stmt->rowCount();

$data = array();

if ($num > 0) {
    $x = 1;
    
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        $data[] = $row;
    }
}

//json format output 
echo json_encode($data);
?>