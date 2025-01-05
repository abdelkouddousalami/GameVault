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
    <h2 class="h2">Profile Settings</h2>
    <div class="pro_img">
                <img src="../../media/pic_pro.jpg" alt="Profile Picture">
            </div>
        <form action="#" method="post">
           
            <div class="lbl_inp">
                <label for="img_pro">Pic:</label>
                <input type="text" id="img_pro" name="img_pro" placeholder="Enter new pic URL">
            </div>
            <div class="lbl_inp">
                <label for="fullname">Fullname:</label>
                <input type="text" id="fullname" name="fullname" placeholder="Enter new name">
            </div>
            <div class="lbl_inp">
                <label for="email">Email:</label>
                <input type="text" id="email" name="email" placeholder="Enter new email">
            </div>
        </form>            <button type="submit" class="edit_img">Update Info</button>

    </div>
</body>
</html>
