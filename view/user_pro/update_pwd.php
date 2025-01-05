<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile Settings</title>
    <link rel="stylesheet" href="../edit_pro.css">
</head>
<body>       

    <div class="container">
    <h2 class="h2">Update  Password</h2>
    
        <form action="#" method="post">
           
            <div class="lbl_inp">
                <label for="img_pro">Old Password:</label>
                <input type="text" id="img_pro" name="old_pwd" placeholder="Enter your password">
            </div>
            <div class="lbl_inp">
                <label for="fullname">New Password:</label>
                <input type="text" id="fullname" name="new_pwd" placeholder="Enter new password">
            </div>
            <div class="lbl_inp">
                <label for="email">Confirm Password:</label>
                <input type="text" id="email" name="conf_pwd" placeholder="Confirm new password">
            </div>
        </form>            <button type="submit" class="edit_img">Update Password</button>

    </div>
</body>
</html>
