<?php
class Database {
private $dsn = "mysql:host=localhost;dbname=crud_app";
private $username = "root";
private $password = "";
public $conn;

public function __construct() {
    try {
        $this->conn = new PDO($this->dsn, $this->username, $this->password);
        $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        // echo "Connected successfully";
    } catch(PDOException $e) {
        echo "Connection failed: ". $e->getMessage();
    }
}

// function to add data to database

public function addUser($fullname, $email, $phone) {
    $sql = "INSERT INTO users (fullname, email, phone) VALUES (:fullname, :email, :phone)";
    $stmt = $this->conn->prepare($sql);
    $stmt->execute(['fullname'=>$fullname, 'email'=>$email, 'phone'=>$phone]);
       return true;
    
}

// read all data records from the database.

public function read() {
    $data = array();
    $sql = "SELECT * FROM users";
    $stmt = $this->conn->prepare($sql);
    $stmt->execute();
    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
    foreach ($results as $row){
        $data[]=$row;
    }
    
    return $data;
}

// function to delete data from the database

public function delete($id) {
    $sql = "DELETE FROM users WHERE id = :id";
    $stmt = $this->conn->prepare($sql);
    $stmt->execute(['id'=> $id]);
        return true;
    
}


//  get User By ID

public function getUserById($id) {
    $sql = "SELECT * FROM users WHERE id = :id";
    $stmt = $this->conn->prepare($sql);
    $stmt->execute(['id'=> $id]);
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    return $result;
}
// function to update data in the database

public function update($id, $fullname, $email, $phone) {
    $sql = "UPDATE users SET fullname = :fullname, email = :email, phone = :phone WHERE id = :id";
    $stmt = $this->conn->prepare($sql);
    $stmt->execute(['fullname'=>$fullname, 'email'=>$email, 'phone'=>$phone,'id'=>$id]);
        return true;
    
}

// function to search data from the database

public function search($keyword) {
    $sql = "SELECT * FROM users WHERE fullname LIKE :keyword OR email LIKE :keyword OR phone LIKE :keyword";
    $stmt = $this->conn->prepare($sql);
    $stmt->execute(['id'=>$keyword]);
    // return $stmt;
    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $results;
}

// get total number of records in the database

public function getTotalUsers() {
    $sql = "SELECT COUNT(*) as total FROM users";
    $stmt = $this->conn->prepare($sql);
    $stmt->execute();
    $total_rows = $stmt->fetch(PDO::FETCH_ASSOC)['total'];
    return $total_rows;
}

}
// 
    
?>