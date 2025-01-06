
<?php
session_start();
require_once "../../classes/User.php";

if (isset($_SESSION['user_id'])) {
    $user = new User();
    $user->logout();
}

header('Location: ../login.php');
exit;
?>

