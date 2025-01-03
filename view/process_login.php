<?php
require_once '../classes/db.php';
require_once '../classes/user.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);

    $user = new User();
    $result = $user->login($username, $password); 
    if ($result === true) {
        header('Location: ../index.php');  
    } else {
        echo $result;  
    }
}
