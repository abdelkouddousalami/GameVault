<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GameVault</title>
    <link rel="stylesheet" href="index.css?<?php echo time()?>">
</head>

<body>
    <nav class="navbar">
        <div class="logo">
            <a href="index.php"><img src="img/logo.png" alt=""></a>
        </div>
        <ul class="nav-links">
            <li><a href="index.php">Home</a></li>
            <li><a href="library.php">Library</a></li>
            <li><a href="#contact">Games</a></li>
            <li><a href="#games">Contact Us</a></li>
        </ul>
        <div class="login-btn"><a href="#login">Login</a></div>
    </nav>

    <main>
        <section class="welcome">
            <h1>Welcome to GameVault</h1>
            <p>Discover, organize, and enjoy your video game collection.</p>
        </section>
        <section class="games">
            <div class="game-card">
                <div class="game-image">
                    <img src="img/pexels-kowalievska-1174746.jpg" alt="Game Title">
                </div>
                <div class="game-info">
                    <h3 class="game-title">Game Title</h3>
                    <p class="game-description">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Excepturi optio rem tempora numquam mollitia doloribus placeat dignissimos labore, aut eum.</p>
                    <div class="game-actions">
                        <button class="btn-primary">Add To Favorit</button>
                        <button class="btn-secondary">Details</button>
                    </div>
                </div>
            </div>
            <div class="game-card">
                <div class="game-image">
                    <img src="img/pexels-pixabay-260024.jpg" alt="Game Title">
                </div>
                <div class="game-info">
                    <h3 class="game-title">Game Title</h3>
                    <p class="game-description">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Excepturi optio rem tempora numquam mollitia doloribus placeat dignissimos labore, aut eum.</p>
                    <div class="game-actions">
                        <button class="btn-primary">Add To Favorit</button>
                        <button class="btn-secondary">Details</button>
                    </div>
                </div>
            </div>
            <div class="game-card">
                <div class="game-image">
                    <img src="img/pexels-pixabay-54101.jpg" alt="Game Title">
                </div>
                <div class="game-info">
                    <h3 class="game-title">Game Title</h3>
                    <p class="game-description">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Excepturi optio rem tempora numquam mollitia doloribus placeat dignissimos labore, aut eum.</p>
                    <div class="game-actions">
                        <button class="btn-primary">Add To Favorit</button>
                        <button class="btn-secondary">Details</button>
                    </div>
                </div>
            </div>
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