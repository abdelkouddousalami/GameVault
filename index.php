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
    <title>GameVault</title>
    <link rel="stylesheet" href="index.css">
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

        <section class="welcome">
            <video autoplay muted loop id="bg-video">
                <source src="img/3209828-uhd_3840_2160_25fps.mp4" type="video/mp4">
                Your browser does not support the video tag.
            </video>
            <h1>Welcome to GameVault</h1>
            <p>Discover, organize, and enjoy your video game collection.</p>
        </section>
        <section class="games">
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
                <form action="favorites.php" method="POST">
                    <input type="hidden" name="game_id" value="<?php echo $game['id']; ?>">
                    <button type="submit" class="btn-primary">Add To Favorit</button>
                </form>
                <a href="detaills.php?id=<?php echo $game['id']; ?>"><button class="btn-secondary">Details</button></a>
            </div>
        </div>
    </div>
<?php endforeach; ?>

        </section>
        <div>
            <button class="btn-primary see">See More</button>
        </div>

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