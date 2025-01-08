<?php
include 'classes/db.php';
$pdo = new Database();
$connection = $pdo->connect();

$query = $connection->query('SELECT username FROM Users');
$view = $query->fetchAll(PDO::FETCH_ASSOC);
$querry = $connection->query('SELECT email FROM Users');
$emails = $querry->fetchAll((PDO::FETCH_ASSOC));
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Game Dashboard</title>
    <link rel="stylesheet" href="dashboard.css? <?php echo time(); ?>">
</head>

<body>
    <video autoplay muted loop id="bg-video">
        <source src="img/3209828-uhd_3840_2160_25fps.mp4" type="video/mp4">
        Your browser does not support the video tag
    </video>
    <nav class="navbar">
        <div class="logo">
            <a href="index.php"><img src="img/logo.png" alt=""></a>
        </div>
        <ul class="nav-links">
            <li><a href="index.php">Home</a></li>
            <li><a href="library.php">Library</a></li>
            <li><a href="#games">Games</a></li>
            <li><a href="#contact">Contact Us</a></li>
        </ul>
        <div class="login-btn"><a href="view/login.php">Login</a></div>
    </nav>

    <main>
        <div class="sidebar">
            <h1>Dashboard</h1>
            <ul>
                <li><a href="#">Add Games</a></li>
                <li><a href="#">View Users</a></li>
                <li><a href="#">Chat</a></li>
                <li><a href="#">Ban User</a></li>
            </ul>
        </div>

        <div class="content">
            <div id="add-game" class="section">
                <h2>Add Games</h2>
                <form method="POST" action="crud.php" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="game-name">Game Name</label>
                        <input type="text" id="game-name" name="game-name" required>
                    </div>
                    <div class="form-group">
                        <label for="game-genre">Genre</label>
                        <input type="text" id="game-genre" name="game-genre" required>
                    </div>
                    <div class="form-group">
                        <label for="game-description">Description</label>
                        <textarea id="game-description" name="game-description" required></textarea>
                    </div>
                    <div class="form-group">
                        <label for="game-release-date">Release Date</label>
                        <input type="date" id="game-release-date" name="game-release-date" required>
                    </div>
                    <div class="form-group">
                        <label for="game-photo">Photo</label>
                        <input type="text" id="game-photo" name="game-photo-url" class="file-input" required>
                    </div>
                    <button type="submit" class="btn">Add Game</button>
                </form>

            </div>

            <div id="users" class="section">
                <h2>View Users</h2>
                <table>
                    <tr>
                        <th>Username</th>
                        <th>Email</th>
                    </tr>
                    <tr>
                        <td>
                            <?php
                            foreach ($view as $row) {
                                echo $row['username'] . '<br>' . '<br>';
                            }
                            ?>
                        </td>
                        <td>
                            <?php
                            foreach ($emails as $row) {
                                echo $row['email'] . '<br>' . '<br>';
                            }
                            ?>
                        </td>
                    </tr>
                </table>
            </div>

            <div id="chat" class="section">
                <h2>Chat</h2>
                <div class="chat-box">
                    <p><strong>abdo:</strong> test</p>
                    <p><strong>ahmed:</strong> test1</p>
                </div>
                <form class="chat-form">
                    <input type="text" placeholder="Type a message...">
                    <button type="submit" class="btn">Send</button>
                </form>
            </div>

            <div id="ban-user" class="section">
                <h2>Ban User</h2>
                <form method="POST" action="ban.php">
                    <div class="form-group">
                        <label for="ban-username">Username</label>
                        <input type="text" id="ban-username" name="ban-username" required>
                    </div>
                    <button type="submit" class="btn">Ban User</button>
                </form>

            </div>
        </div>
    </main>
</body>

</html>