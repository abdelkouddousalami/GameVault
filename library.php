<?php
include 'classes/db.php';
$pdo = new Database();
$connection = $pdo->connect();

$query = $connection->query('SELECT * FROM Games');
$games = $query->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Favorite Films</title>
    <link rel="stylesheet" href="library.css?<?php echo time(); ?>">
</head>

<body>
    <nav class="navbar">
        <div class="logo">
            <a href="#home"><img src="img/logo.png" alt="Logo"></a>
        </div>
        <ul class="nav-links">
            <li><a href="index.php">Home</a></li>
            <li><a href="library.php">Library</a></li>
            <li><a href="#games">Games</a></li>
            <li><a href="#contact">Contact Us</a></li>
        </ul>
        <div class="login-btn"><a href="#login">Login</a></div>
    </nav>

    <main>
        <section class="part1">
            <div class="game-cards">
                <?php foreach ($games as $game): ?>
                    <div class="game-card">
                        <div class="game-image">
                            <?php if (!empty($game['image_url'])): ?>
                                <img src="<?php echo htmlspecialchars($game['image_url']); ?>" alt="Game Image">
                            <?php endif; ?>
                        </div>
                        <div class="game-info">
                            <h3 class="game-title"><?php echo htmlspecialchars($game['title']); ?></h3>
                            <p class="game-description"><?php echo htmlspecialchars($game['description']); ?></p>
                            <div class="game-actions">
                                <button class="btn-primary">Add To Favorite</button>
                                <button class="btn-secondary">Details</button>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </section>
    </main>

    <footer class="footer">
        <div class="footer-content">
            <div class="logo">
                <a href="index.php"><img src="img/logo.png" alt="Logo"></a>
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