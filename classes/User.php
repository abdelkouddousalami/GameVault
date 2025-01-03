<?php
class User{

private $pdo;

public function __construct()
{
    $db = new Database(); 
 $this->pdo = $db->connect();
}
public function register($username, $email, $password) {
    $stmt = $this->pdo->prepare("SELECT * FROM users WHERE email = :email");
    $stmt->execute([':email' => $email]);
    if ($stmt->rowCount() > 0) {
        return "Email already exists!";
    }
    $hashedPassword = password_hash($password, PASSWORD_BCRYPT);

    $stmt = $this->pdo->prepare("INSERT INTO users (username, email, password_hash) VALUES (:username, :email, :password)");
    $stmt->execute([
        ':username' => $username,
        ':email' => $email,
        ':password' => $hashedPassword
    ]);
    
    return true;
}
public function login($username, $password) {
    $stmt = $this->pdo->prepare("SELECT * FROM users WHERE username = :username");
    $stmt->execute([':username' => $username]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($user) {
        if (password_verify($password, $user['password_hash'])) {
            session_start();
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['username'] = $user['username'];
            return true;
        } else {
            return "Invalid password!";
        }
    } else {
        return "User not found!";
    }
}



}