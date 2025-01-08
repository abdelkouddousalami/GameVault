<?php
include 'classes/db.php';

$pdo = new Database();
$connection = $pdo->connect();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['ban-username'];

    $stmt = $connection->prepare("UPDATE Users SET banned = TRUE WHERE username = ?");
    $stmt->bind_param("s", $username);

    if ($stmt->execute()) {
        echo "Done";
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
    $connection->close();
}
?>
