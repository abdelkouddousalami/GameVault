<?php
require_once './../classes/User.php';

$user = new User();
$error = [];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['pwd'];
    $conf_pwd = $_POST['conf_pwd'];

    if (!$user->register($username, $email, $password, $conf_pwd)) {
        $error = $user->getErrors();
    } else {
        header('Location: register.php');
        exit;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration</title>
    <link rel="stylesheet" href="styles_Auth.css">
</head>
<body>
    <div class="form-container">
        <h2>Register</h2>
        <?php if (!empty($error)): ?>
            <div class="error-messages">
                <?php foreach ($error as $er): ?>
                    <p><?= htmlspecialchars($er) ?></p>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>
        <form action="" method="POST" id="register-form">
            <label for="username">Username</label>
            <input type="text" id="username" name="username" required>
            
            <label for="email">Email</label>
            <input type="email" id="email" name="email" required>
            
            <label for="password">Password</label>
            <input type="password" id="password" name="pwd" required>
            
            <label for="confirm-password">Confirm Password</label>
            <input type="password" id="confirm-password" name="conf_pwd" required>
            
            <button type="submit">Register</button>
        </form>
        <p>Already have an account? <a href="login.php">Sign In</a></p>
    </div>
</body>
</html>
