<?php
session_start();
include 'classes/db.php';

if (!isset($_SESSION['user_id'])) {
    header("location: view/login.php");
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $gameId = $_POST['game_id'];

    if (empty($gameId)) {
        echo "Invalid game ID.";
        exit;
    }

    $userId = $_SESSION['user_id'];
    $pdo = (new Database())->connect();

    $stmt = $pdo->prepare("INSERT INTO UserGames (user_id, game_id, is_favorite) VALUES (:user_id, :game_id, 1)");
    try {
        $stmt->execute(['user_id' => $userId, 'game_id' => $gameId]);
        
        header("Location: library.php");
        exit;
    } catch (PDOException $e) {
        echo "Error adding to favorites: " . $e->getMessage();
    }
}
?>
