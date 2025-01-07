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
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Profile</title>
    <link rel="stylesheet" href="../styles_profail.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
</head>
<body>
<?php
include '../header.php'; ?>
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
                   <li><a href="logout.php">Signout</a></li>
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
<P class="join">Join at <span class="ss">2024/07/31</span></P>
<P class="join">Total Games <span class="ss">10</span></P>
<P class="join">PLayed Time:<span class="ss">35h:25min</span></P>


</div>

   </div>
   <div class="last_games">
<h2 class="h22">Favorit Games: </h2>
<section class="part1">

<div class="game-card">
                <div class="game-image">
                    <img src="../../img/pexels-pixabay-54101.jpg" alt="Game Title">
                </div>
                <div class="game-info">
                    <h3 class="game-title">Game Title</h3>
                   
                </div>
            </div>
            <div class="game-card">
                <div class="game-image">
                    <img src="../../img/pexels-pixabay-54101.jpg" alt="Game Title">
                </div>
                <div class="game-info">
                    <h3 class="game-title">Game Title</h3>
                   
                </div>
            </div>
            <div class="game-card">
                <div class="game-image">
                    <img src="../../img/pexels-pixabay-54101.jpg" alt="Game Title">
                </div>
                <div class="game-info">
                    <h3 class="game-title">Game Title</h3>
                   
                </div>
            </div>
                
</section>
   </div>
   </div>
   </div>

</body>
</html>
