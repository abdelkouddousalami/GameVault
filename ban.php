<?php 
    include 'classes/db.php';
    include 'classes/User.php';
    
    $pdo = new Database();
    $connection = $pdo->connect();
    $user = new User();
    
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        if (isset($_POST['ban-username'])) {
            $usernameToBan = $_POST['ban-username'];
            $stmt = $connection->prepare("SELECT id FROM users WHERE username = :username");
            $stmt->execute([':username' => $usernameToBan]);
            $userToBan = $stmt->fetch(PDO::FETCH_ASSOC);
    
            if ($userToBan) {
                $user->banUser($userToBan['id']);
            } else {
                $errorMessage = "User not found!";
            }
        }
    
        if (isset($_POST['unban-username'])) {
            $usernameToUnban = $_POST['unban-username'];
            $stmt = $connection->prepare("SELECT id FROM users WHERE username = :username");
            $stmt->execute([':username' => $usernameToUnban]);
            $userToUnban = $stmt->fetch(PDO::FETCH_ASSOC);
    
            if ($userToUnban) {
                $user->unbanUser($userToUnban['id']);
            } else {
                $errorMessage = "User not found!";
            }
        }
    }
    
    $query = $connection->query('SELECT id, username, email, banned FROM users');
    $users = $query->fetchAll(PDO::FETCH_ASSOC);
?>