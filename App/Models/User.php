<?php

namespace App\Models;

use App\Config\Connection;
use PDO;
use PDOException;

class User {
    private $conn;

    public function __construct() {
        // Create a new database connection
        $database = new Connection();
        $this->conn = $database->getConnection();
    }

    // Fetch all users
    public function getAllUsers() {
        try {
            $query = "SELECT * FROM users";
            $stmt = $this->conn->prepare($query);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            die("Query error: " . $e->getMessage());
        }
    }

    // Insert a new user
    public function createUser($username, $email) {
        try {
            $query = "INSERT INTO users (username, email) VALUES (:username, :email)";
            $stmt = $this->conn->prepare($query);
            $stmt->bindParam(':username', $username);
            $stmt->bindParam(':email', $email);
            return $stmt->execute();
        } catch (PDOException $e) {
            die("Insert error: " . $e->getMessage());
        }
    }
}
