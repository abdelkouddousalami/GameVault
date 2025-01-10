<?php
session_start();
require_once "../../classes/User.php";

if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit;
}

$userId = $_SESSION['user_id'];
$user = new User();
$currentUser = $user->getUserById($userId);

if (isset($_POST['sub'])) {
    $user->logout();
    header('Location: ../login.php');
    exit;
}
?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Profile</title>
    <link rel="stylesheet" href="../../view/styles_profail.css?<?php echo time();?>">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
</head>

<body>
    <nav class="navbar">
        <div class="logo">
            <a href="index.php"><img src="../../img/logo.png" alt="not"></a>
        </div>
        <ul class="nav-links">
            <li><a href="index.php">Home</a></li>
            <li><a href="library.php">Library</a></li>
            <li><a href="games.php">Games</a></li>
            <li><a href="contact.php">Contact Us</a></li>
        </ul>
        <div class="login-btn"><a href="view/login.php">Login</a></div>
    </nav>
    <div class="all">
        <div class="nav_section">
            <div class="content_section">
                <h3>Welcome, <?= htmlspecialchars($currentUser['username'] ?? 'User') ?>!</h3>
            </div>

            <div class="ulo">
                <ul class="nav_profail">
                    <li><a href="#">Home</a></li>
                    <li><a href="edit_profail.php">Edit Profile</a></li>
                    <li><a href="update_pwd.php">Update Password</a></li>
                    <li><a href="../../library.php">Favorites</a></li>
                    <li>
                        <form action="user_profail.php" method="post" style="display: inline;">
                            <input type="hidden" name="user_id" value="$_SESSION['user_id']?>">
                            <button type="submit" name="sub" style="border: none; background: none; color: #007bff; cursor: pointer; font-size: 18px">Signout</button>
                        </form>
                    </li>



                </ul>
            </div>
        </div>
        <div class="dd">
            <div class="player_status">
                <div class="img_div">
                    <img src="<?= htmlspecialchars($currentUser['profile_picture'] ?? '../../media/pic_pro.jpg') ?>" alt="Profile Picture">
                    <h4><?= htmlspecialchars($currentUser['username'] ?? 'Unknown User') ?></h4>
                </div>
                <div class="stt">
                    <p class="join">Join at <span class="ss"><?= htmlspecialchars($currentUser['created_at'] ?? 'Unknown') ?></span></p>
                    <P class="join">Total Games <span class="ss">10</span></P>
                    <P class="join">PLayed Time:<span class="ss">35h:25min</span></P>


                </div>

            </div>
            <div class="last_games">
                <h2 class="h22"></h2>
                <section class="part1">

                    <div class="game-card">
                    <a href="../../library.php"><button>See your favourite games</button></a>
                    </div>

                </section>
            </div>
        </div>
    </div>

</body>

</html>