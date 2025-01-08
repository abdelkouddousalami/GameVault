<?php
include 'classes/db.php';
include 'classes/User.php';
include 'ban.php';

$pdo = new Database();
$connection = $pdo->connect();
$user = new User();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="dashboard.css?<?php echo time(); ?>">
</head>

<body>
    <video autoplay muted loop id="bg-video">
        <source src="img/3209828-uhd_3840_2160_25fps.mp4" type="video/mp4">
        Your browser does not support the video tag.
    </video>
    <nav class="navbar">
        <div class="logo">
            <a href="index.php"><img src="img/logo.png" alt="logo"></a>
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
            <div id="users" class="section">
                <h2>View Users</h2>
                <table>
                    <tr>
                        <th>Username</th>
                        <th>Email</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                    <?php foreach ($users as $row): ?>
                        <tr>
                            <td><?php echo $row['username']; ?></td>
                            <td><?php echo $row['email']; ?></td>
                            <td><?php echo $row['banned'] ? 'Banned' : 'Active'; ?></td>
                            <td>
                                <?php if ($row['banned'] == 0): ?>
                                    <form action="" method="POST">
                                        <input type="hidden" name="ban-username" value="<?php echo $row['username']; ?>">
                                        <button type="submit">Ban</button>
                                    </form>
                                <?php else: ?>
                                    <form action="" method="POST">
                                        <input type="hidden" name="unban-username" value="<?php echo $row['username']; ?>">
                                        <button type="submit">Unban</button>
                                    </form>
                                <?php endif; ?>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </table>
            </div>

            <div id="ban-user" class="section">
                <h2>Ban User</h2>
                <form method="POST">
                    <div class="form-group">
                        <label for="ban-username">Username</label>
                        <input type="text" id="ban-username" name="ban-username" required>
                    </div>
                    <button type="submit" class="btn">Ban User</button>
                </form>
            </div>

            <div id="unban-user" class="section">
                <h2>Unban User</h2>
                <form method="POST">
                    <div class="form-group">
                        <label for="unban-username">Username</label>
                        <input type="text" id="unban-username" name="unban-username" required>
                    </div>
                    <button type="submit" class="btn">Unban User</button>
                </form>
            </div>
        </div>
    </main>
</body>

</html>