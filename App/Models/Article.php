<?php
namespace App\models;

use App\COnfig\Connection;
use PDO;

class article{

    protected $db;

    public function __construct(){
        $database = new Connection();
        $this->db = $database->getConnection();
    }
    
    public function getArticles(){
        $query= "SELECT * from articles";
        $result= $this->db->prepare($query);
        $result->execute();
        return $result->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getArticleById($id){
        $query="SELECT * from articles where id=$id";
        $result= $this->db->prepare($query);
        $result->execute();
        return $result->fetch(PDO::FETCH_ASSOC);
    }
    
}

?>