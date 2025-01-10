<?php
require_once '../classes/db.php';
require_once '../classes/user.php';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = trim($_POST['username']);
    $email = trim($_POST['email']);
    $password = trim($_POST['pwd']);
    $confirm_password = trim($_POST['conf_pwd']);

    if ($password !== $confirm_password) {
        echo "Passwords do not match!";
        exit;
    }

    $user = new User();  
    $result = $user->register($username, $email, $password,$confirm_password);  // Call the register method

    if ($result === true) {
        echo "User registered successfully!";
    } else {
        echo "Error: " . $result;    }
}


