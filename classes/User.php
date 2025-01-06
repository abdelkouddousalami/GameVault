<?php
require_once "db.php";
class User {
    private $error = [];
    private $pdo;

    public function __construct() {
        $db = new Database(); 
        $this->pdo = $db->connect();
    }

    public function register($username, $email, $password, $conf_pwd) {
        if ($password !== $conf_pwd) {
            $this->error[] = "Passwords do not match!";
            return false;
        }

        $stmt = $this->pdo->prepare("SELECT * FROM users WHERE email = :email");
        $stmt->execute([':email' => $email]);
        if ($stmt->rowCount() > 0) {
            $this->error[] = "Email already exists!";
            return false;
        }

        $hashedPassword = password_hash($password, PASSWORD_BCRYPT);

        try {
            $stmt = $this->pdo->prepare("INSERT INTO users (username, email, password_hash) VALUES (:username, :email, :password)");
            $stmt->execute([
                ':username' => $username,
                ':email' => $email,
                ':password' => $hashedPassword
            ]);
            return true;
        } catch (PDOException $e) {
            $this->error[] = "Error during registration: " . $e->getMessage();
            return false;
        }
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
                $this->error[] = "Invalid password!";
                return false;
            }
        } else {
            $this->error[] = "User not found!";
            return false;
        }
    }

    public function getErrors() {
        return $this->error;
    }
}
