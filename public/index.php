<?php
require_once __DIR__ . '/../vendor/autoload.php';

use App\Models\User;

$userModel = new User();

// Fetch all users
$users = $userModel->getAllUsers();
echo "<pre>";
print_r($users);
echo "</pre>";

// Insert a new user (TEST)
$userModel->createUser('John Doe', 'john@example.com');
echo "User created successfully!";
