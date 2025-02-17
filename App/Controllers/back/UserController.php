<?php

namespace App\Controllers\back;

use App\Models\User;

class UserController {

    private $userModel;

    public function __construct() {
        $this->userModel = new User(); // Initialize User model
    }

    // Method to get all users
    public function index() {
        $users = $this->userModel->getAllUsers();

        // Load the view and pass users data
        require_once __DIR__ . '/../../Views/back/User.php';
    }

    public function say_hello(){
        echo "hello";
    }
}
