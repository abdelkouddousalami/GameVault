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
        <form action="../view/process_register.php" method="POST" id="register-form">
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
