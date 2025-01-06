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
</head>
<body>
<?php
include '../header.php'; ?>
   <div class="all">
       <div class="nav_section">
           <div class="img_div">
               <img src="<?= htmlspecialchars($currentUser['profile_picture'] ?? '../../media/pic_pro.jpg') ?>" alt="Profile Picture">
               <h4><?= htmlspecialchars($currentUser['username'] ?? 'Unknown User') ?></h4>
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
   </div>
</body>
</html>
