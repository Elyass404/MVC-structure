<?php
use App\Config\Connection;
require __DIR__.'/vendor/autoload.php'; 

$database = new Connection();
$db = $database->getConnection();

?>