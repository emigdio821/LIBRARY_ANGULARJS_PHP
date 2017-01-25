<?php
class BookInterface
{
    private $conn;
    private $table_name = "books";
    
    //properties 
    public $id;
    public $name;
    public $author;
    public $description;
    public $category;
    public $created;
    public $modified;
    public $img;
    public $borrowed;
    public $user;
    
    public function __construct($db)
    {
        $this->conn = $db;
    }
    
    // create book
    function create()
    {
        $query = "INSERT INTO   
                " . $this->table_name . "   
            SET   
                name=:name, author=:author, description=:description, category=:category, created=:created, img=:img, borrowed=:borrowed";
        $stmt  = $this->conn->prepare($query);
        
        $this->name        = htmlspecialchars(strip_tags($this->name));
        $this->author      = htmlspecialchars(strip_tags($this->author));
        $this->description = htmlspecialchars(strip_tags($this->description));
        $this->category    = htmlspecialchars(strip_tags($this->category));
        $this->created     = htmlspecialchars(strip_tags($this->created));
        $this->borrowed    = htmlspecialchars(strip_tags($this->borrowed));
        $this->img         = htmlspecialchars(strip_tags($this->img));
        
        $stmt->bindParam(":name", $this->name);
        $stmt->bindParam(":author", $this->author);
        $stmt->bindParam(":description", $this->description);
        $stmt->bindParam(":category", $this->category);
        $stmt->bindParam(":created", $this->created);
        $stmt->bindParam(":borrowed", $this->borrowed);
        $stmt->bindParam(":img", $this->img);
        
        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }
    
    //read books
    function readAll()
    {
        $query = "SELECT   
                id, name, description, author, category, created, img, borrowed, user 
            FROM   
                " . $this->table_name . "   
            ORDER BY   
                id DESC";
        
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        
        return $stmt;
    }
    
    //read book details
    function readBookDetails()
    {
        $query = "SELECT   
                id, name, description, author, category, created, img, borrowed, user 
            FROM   
                " . $this->table_name . "   
            WHERE   
                id = ?   
            LIMIT   
                0,1";
        
        // prepare query statement
        $stmt = $this->conn->prepare($query);
        
        // bind id of book to be updated
        $stmt->bindParam(1, $this->id);
        $stmt->execute();
        
        // get retrieved row
        $row               = $stmt->fetch(PDO::FETCH_ASSOC);
        $this->name        = $row['name'];
        $this->author      = $row['author'];
        $this->description = $row['description'];
        $this->category    = $row['category'];
        $this->created     = $row['created'];
        $this->img         = $row['img'];
        $this->borrowed    = $row['borrowed'];
        $this->user        = $row['user'];
    }
    
    // update the book
    function update()
    {
        $query = "UPDATE   
                " . $this->table_name . "   
            SET   
                name = :name,   
                description = :description,   
                author = :author, 
                created = :created,   
                category = :category, 
                img = :img 
            WHERE   
                id = :id";
        
        // prepare query statement
        $stmt = $this->conn->prepare($query);
        
        // posted values
        $this->name        = htmlspecialchars(strip_tags($this->name));
        $this->description = htmlspecialchars(strip_tags($this->description));
        $this->author      = htmlspecialchars(strip_tags($this->author));
        $this->category    = htmlspecialchars(strip_tags($this->category));
        $this->created     = htmlspecialchars(strip_tags($this->created));
        $this->img         = htmlspecialchars(strip_tags($this->img));
        $this->id          = htmlspecialchars(strip_tags($this->id));
        
        // bind new values
        $stmt->bindParam(':name', $this->name);
        $stmt->bindParam(':description', $this->description);
        $stmt->bindParam(':author', $this->author);
        $stmt->bindParam(':category', $this->category);
        $stmt->bindParam(':created', $this->created);
        $stmt->bindParam(':img', $this->img);
        $stmt->bindParam(':id', $this->id);
        // execute the query
        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }
    
    // delete the book
    function delete()
    {
        $query = "DELETE FROM " . $this->table_name . " WHERE id = ?";
        $stmt  = $this->conn->prepare($query);
        $stmt->bindParam(1, $this->id);
        
        // execute query
        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }
    
    // borrow the book
    function borrowBook()
    {
        $query = "UPDATE   
                " . $this->table_name . "   
            SET   
                borrowed = :borrowed, 
                user = :user 
            WHERE   
                id = :id";
        
        // prepare query statement
        $stmt = $this->conn->prepare($query);
        
        // posted values
        $this->borrowed = htmlspecialchars(strip_tags($this->borrowed));
        $this->user     = htmlspecialchars(strip_tags($this->user));
        $this->id       = htmlspecialchars(strip_tags($this->id));
        
        // bind new values
        $stmt->bindParam(':borrowed', $this->borrowed);
        $stmt->bindParam(':user', $this->user);
        $stmt->bindParam(':id', $this->id);
        // execute the query
        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }
    
    // get categories
    function getCategories()
    {
        $query = "SELECT   
                id, name, description, author, category, created, img, borrowed, user 
            FROM   
                " . $this->table_name . "   
            ORDER BY   
                category DESC";
        
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        
        return $stmt;
    }
}