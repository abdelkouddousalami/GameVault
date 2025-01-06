<?php
session_start();
require_once "../../classes/User.php";

if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit;
}

$userId = $_SESSION['user_id'];
$user = new User();
$error = [];
$success = "";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $fullname = $_POST['fullname'];
    $email = $_POST['email'];
    $img_url = $_POST['img_pro'];

    if ($user->editProfile($userId, $fullname, $email, $img_url)) {
        $success = "Profile updated successfully!";
    } else {
        $error = $user->getErrors();
    }
}

$currentUser = $user->getUserById($userId);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile Settings</title>
    <link rel="stylesheet" href="../edit_pro.css">
</head>
<body>

<?php
include '../header.php'; ?>
    <div class="container">
        <h2 class="h2">Profile Settings</h2>
        <?php if (!empty($success)): ?>
            <div class="success-message"><?= htmlspecialchars($success) ?></div>
        <?php endif; ?>
        <?php if (!empty($error)): ?>
            <div class="error-messages">
                <?php foreach ($error as $err): ?>
                    <p><?= htmlspecialchars($err) ?></p>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>
        <div class="pro_img">
            <img src="<?= htmlspecialchars($currentUser['profile_picture'] ?? '../../media/pic_pro.jpg') ?>" alt="Profile Picture">
        </div>
        <form action="edit_profail.php" method="post">
            <div class="lbl_inp">
                <label for="img_pro">Pic:</label>
                <input type="text" id="img_pro" name="img_pro" value="<?= htmlspecialchars($currentUser['profile_picture'] ?? '') ?>" placeholder="Enter new pic URL">
            </div>
            <div class="lbl_inp">
                <label for="fullname">Fullname:</label>
                <input type="text" id="fullname" name="fullname" value="<?= htmlspecialchars($currentUser['username'] ?? '') ?>" placeholder="Enter new name">
            </div>
            <div class="lbl_inp">
                <label for="email">Email:</label>
                <input type="text" id="email" name="email" value="<?= htmlspecialchars($currentUser['email'] ?? '') ?>" placeholder="Enter new email">
            </div>
            <button type="submit" class="edit_img">Update Info</button>
        </form>
    </div>
</body>
</html>
