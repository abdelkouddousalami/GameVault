<?php
include 'classes/db.php';
$pdo = new Database();
$connection = $pdo->connect();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $title = $_POST['game-name'];
    $genre = $_POST['game-genre'];
    $description = $_POST['game-description'];
    $release_date = $_POST['game-release-date'];
    $image_url = $_POST['game-photo-url'];
    $stmt = $connection->prepare('INSERT INTO Games (title, genre, description, release_date, image_url) VALUES (?, ?, ?, ?, ?)');
    $stmt->execute([$title, $genre, $description, $release_date, $image_url]);
}
?>
