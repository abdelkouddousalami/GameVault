<?php
require_once '../classes/User.php'; 

$error = null;
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $user = new User();
    $username = $_POST['username'];
    $password = $_POST['password'];

    if (!$user->login($username, $password)) {
        $error = $user->getErrors()[0]; 
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign In</title>
    <link rel="stylesheet" href="styles_Auth.css">
</head>
<body>
<?php
include_once 'header.php'; ?>
    <div class="form-container login">
        <h2>Sign In</h2>

        <?php if ($error): ?>
            <div class="error-messages">
                <p><?= htmlspecialchars($error) ?></p>
            </div>
        <?php endif; ?>

        <form action="login.php" method="POST" id="login-form">
            <label for="username">Username</label>
            <input type="text" id="username" name="username" required>
            
            <label for="password">Password</label>
            <div class="password-container">
                <input type="password" id="password" name="password" required>
                <button type="button" id="toggle-password">Show</button>
            </div>
            
            <button type="submit">Sign In</button>
        </form>
        
        <p>Don't have an account? <a href="register.php">Register</a></p>
    </div>

    <script src="script.js"></script>
</body>
</html>
