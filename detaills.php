<?php
include 'classes/db.php';
$pdo = new Database();
$connection = $pdo->connect();

if (isset($_GET['id'])) {
    $gameId = (int)$_GET['id'];

    $stmt = $connection->prepare('SELECT * FROM Games WHERE id = :id');
    $stmt->bindParam(':id', $gameId, PDO::PARAM_INT);
    $stmt->execute();
    $game = $stmt->fetch(PDO::FETCH_ASSOC);

    $stmtComments = $connection->prepare('SELECT * FROM ChatRooms WHERE game_id = :game_id ORDER BY created_at DESC');
    $stmtComments->bindParam(':game_id', $gameId, PDO::PARAM_INT);
    $stmtComments->execute();
    $comments = $stmtComments->fetchAll(PDO::FETCH_ASSOC);

    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['message'])) {
        $name = htmlspecialchars($_POST['name']);
        $message = htmlspecialchars($_POST['message']);

        if (!empty($message)) {
            $stmtInsert = $connection->prepare('INSERT INTO ChatRooms (game_id, name, message) VALUES (:game_id, :name, :message)');
            $stmtInsert->bindParam(':game_id', $gameId, PDO::PARAM_INT);
            $stmtInsert->bindParam(':name', $name, PDO::PARAM_STR);
            $stmtInsert->bindParam(':message', $message, PDO::PARAM_STR);
            $stmtInsert->execute();


            header("Location: " . $_SERVER['REQUEST_URI']);
            exit();
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Game Details</title>
    <link rel="stylesheet" href="detaills.css">
</head>

<body>
    <nav class="navbar">
        <div class="logo">
            <a href="index.php"><img src="img/logo.png" alt="not"></a>
        </div>
        <ul class="nav-links">
            <li><a href="index.php">Home</a></li>
            <li><a href="library.php">Library</a></li>
            <li><a href="games.php">Games</a></li>
            <li><a href="contact.php">Contact Us</a></li>
        </ul>
        <div class="login-btn"><a href="view/login.php">Login</a></div>
    </nav>
    <main>
    <section class="game-container">
        <section class="game-details">
            <h1><?php echo htmlspecialchars($game['title']); ?></h1>
            <div class="game-detail-image">
                <?php if (!empty($game['image_url'])): ?>
                    <img src="<?php echo htmlspecialchars($game['image_url']); ?>" alt="Game Image">
                <?php endif; ?>
            </div>
            <p><strong>Release Date:</strong> <?php echo htmlspecialchars($game['release_date']); ?></p>
            <p><strong>Genre:</strong> <?php echo htmlspecialchars($game['genre']); ?></p>
            <p><strong>Description:</strong> <?php echo nl2br(htmlspecialchars($game['description'])); ?></p>
            <p><strong>Score:</strong> <?php echo htmlspecialchars($game['score']); ?></p>
        </section>
        
        <aside class="comments">
            <h2>Chat</h2>
            <?php if ($comments): ?>
                <ul>
                    <?php foreach ($comments as $comment): ?>
                        <li class="comment-item">
                            <strong><?php echo htmlspecialchars($comment['name']); ?>:</strong>
                            <p><?php echo nl2br(htmlspecialchars($comment['message'])); ?></p>
                            <small>sent <?php echo $comment['created_at']; ?></small>
                        </li>
                    <?php endforeach; ?>
                </ul>
            <?php else: ?>
                <p>No chat here yet!</p>
            <?php endif; ?>

            <h3>Send a Message:</h3>
            <form action="" method="POST">
                <div class="inp">
                <label for="name">Your Name:</label>
                <input type="text" name="name" id="name" required>
                </div>
                <div class="inp">
                <label for="message">Message:</label>
                <textarea name="message" id="message" required></textarea>
                </div>
                <button type="submit">Send</button>
            </form>
        </aside>
    </section>
</main>


    <footer class="footer">
        <div class="footer-content">
            <div class="logo">
                <a href="index.php"><img src="img/logo.png" alt=""></a>
            </div>
            <div class="footer-links">
                <a href="#privacy">Privacy Policy</a>
                <a href="#terms">Terms of Service</a>
                <a href="#support">Support</a>
            </div>
        </div>
        <p>&copy; 2025 GameVault. All rights reserved.</p>
    </footer>
</body>

</html>
