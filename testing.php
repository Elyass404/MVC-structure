<?php
use App\Config\Connection;
use App\Controllers\back\UserController;
require __DIR__.'/vendor/autoload.php'; 

$database = new Connection();
$db = $database->getConnection();

$userController = new UserController;

$allUsers= $userController->index();




?>