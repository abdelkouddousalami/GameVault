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
        session_start();
        $stmt = $this->pdo->prepare("SELECT * FROM users WHERE username = :username");
        $stmt->execute([':username' => $username]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user) {
            if (password_verify($password, $user['password_hash'])) {
                session_start();
                $_SESSION['user_id'] = $user['id'];
                $_SESSION['username'] = $user['username'];
                header('location: user_pro/user_profail.php');
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
    public function editProfile($id, $fullname, $email, $img_url) {
        if (empty($fullname) || empty($email)) {
            $this->error[] = "Full name and email are required!";
            return false;
        }
    
        $stmt = $this->pdo->prepare("SELECT * FROM users WHERE email = :email AND id != :id");
        $stmt->execute([':email' => $email, ':id' => $id]);
        if ($stmt->rowCount() > 0) {
            $this->error[] = "Email is already taken!";
            return false;
        }
    
        $stmt = $this->pdo->prepare("UPDATE users SET username = :username, email = :email, profile_picture = :img_url WHERE id = :id");
        try {
            $stmt->execute([
                ':username' => $fullname,
                ':email' => $email,
                ':img_url' => $img_url,
                ':id' => $id
            ]);
            return true;
        } catch (PDOException $e) {
            $this->error[] = "Error updating profile: " . $e->getMessage();
            return false;
        }
    }
    
    public function getUserById($id) {
        $stmt = $this->pdo->prepare("SELECT * FROM users WHERE id = :id");
        $stmt->execute([':id' => $id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
    
    public function updatePassword($userId, $oldPassword, $newPassword, $confirmPassword) {
        if ($newPassword !== $confirmPassword) {
            $this->error['confirm_password'] = "New password and confirmation do not match!";

            return false;
        }
    
        $stmt = $this->pdo->prepare("SELECT password_hash FROM users WHERE id = :id");
        $stmt->execute([':id' => $userId]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);
    
        if (!$user) {
            $this->error['user_not_found'] = "User not found!";
            return false;
        }
    
        if (!password_verify($oldPassword, $user['password_hash'])) {
            $this->error['old_password'] = "Old password is incorrect!";
            return false;
        }
    
        $hashedPassword = password_hash($newPassword, PASSWORD_BCRYPT);
    
        $stmt = $this->pdo->prepare("UPDATE users SET password_hash = :password WHERE id = :id");
        try {
            $stmt->execute([
                ':password' => $hashedPassword,
                ':id' => $userId,
            ]);
            return true;
        } catch (PDOException $e) {
            $this->error[] = "Error updating password: " . $e->getMessage();
            return false;
        }
    }
    
    public function logout() {
        session_unset();
        session_destroy();
        session_start();
        session_regenerate_id(true);
    }

    public function banUser($id) {
        $stmt = $this->pdo->prepare("UPDATE users SET banned = 1 WHERE id = :id");
        try {
            $stmt->execute([':id' => $id]);
            return true;
        } catch (PDOException $e) {
            $this->error[] = "Error banning user: " . $e->getMessage();
            return false;
        }
    }
    
    public function unbanUser($id) {
        $stmt = $this->pdo->prepare("UPDATE users SET banned = 0 WHERE id = :id");
        try {
            $stmt->execute([':id' => $id]);
            return true;
        } catch (PDOException $e) {
            $this->error[] = "Error unbanning user: " . $e->getMessage();
            return false;
        }
    }
    

    public function fetchAllUsers() {
        $stmt = $this->pdo->prepare("SELECT id, username, email, banned FROM users");
        try {
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            $this->error[] = "Error fetching users: " . $e->getMessage();
            return [];
        }
    }

}
