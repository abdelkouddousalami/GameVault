<?php
session_start();
require_once "../../classes/User.php";

if (!isset($_SESSION['user_id'])) {
    header('Location: ../login.php');
    exit;
}

$userId = $_SESSION['user_id'];
$user = new User();

$errors = [];
$oldPassword = '';
$newPassword = '';
$confirmPassword = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $oldPassword = $_POST['old_pwd'];
    $newPassword = $_POST['new_pwd'];
    $confirmPassword = $_POST['conf_pwd'];

    if ($user->updatePassword($userId, $oldPassword, $newPassword, $confirmPassword)) {
        $successMessage = "Password updated successfully!";
    } else {
        $errors = $user->getErrors(); 
    }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Password</title>
    <link rel="stylesheet" href="../edit_pro.css">
</head>
<body>   
<?php
include '../header.php'; ?>    
    <div class="container">
        <h2 class="h2">Update Password</h2>

        <?php
        if (isset($successMessage)) {
            echo "<p style='color:green;'>$successMessage</p>";
        }
        ?>

        <form action="update_pwd.php" method="post">
            <div class="lbl_inp">
                <label for="old_pwd">Old Password:</label>
                <input type="password" id="old_pwd" name="old_pwd" placeholder="Enter your password" required value="<?php echo htmlspecialchars($oldPassword); ?>">
                <?php
                if (isset($errors['old_password'])) {
                    echo "<p style='color:red;'>".$errors['old_password']."</p>";
                }
                ?>
            </div>

            <div class="lbl_inp">
                <label for="new_pwd">New Password:</label>
                <input type="password" id="new_pwd" name="new_pwd" placeholder="Enter new password" required value="<?php echo htmlspecialchars($newPassword); ?>">
                <?php
                if (isset($errors['new_password'])) {
                    echo "<p style='color:red;'>".$errors['new_password']."</p>";
                }
                ?>
            </div>

            <div class="lbl_inp">
                <label for="conf_pwd">Confirm Password:</label>
                <input type="password" id="conf_pwd" name="conf_pwd" placeholder="Confirm new password" required value="<?php echo htmlspecialchars($confirmPassword); ?>">
                <?php
                if (isset($errors['confirm_password'])) {
                    echo "<p style='color:red;'>".$errors['confirm_password']."</p>";
                }
                ?>
            </div>

            <button type="submit" class="edit_img">Update Password</button>
        </form>
    </div>
</body>
</html>


