<?php 
require 'config/database.php';



if (isset($_POST['submit'])) {
    $username = filter_var($_POST['username'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $password = filter_var($_POST['password'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);

    if (!$username) {
        $_SESSION['signIn'] = "Zəhmət olmasa, İstifadəçi Adınızı qeyd edin";
    } else if (!$password) {
        $_SESSION['signIn'] = "Zəhmət olmasa, Şifrənizi qeyd edin";

    } else {
        $fetchUserQuery = "SELECT * FROM users WHERE username='$username'";
        $fetchUserResult = mysqli_query($connection, $fetchUserQuery);
        if (mysqli_num_rows($fetchUserResult) == 1) {

            $userRecord = mysqli_fetch_assoc($fetchUserResult);
            $dbPassword = $userRecord['password'];
            if (password_verify($password, $dbPassword)) {

                $_SESSION['userId'] = $userRecord['id'];
                if($userRecord['is_admin'] == 1) {
                    $_SESSION['userIsAdmin'] = true;
                }
                header('location: ' . ROOT_URL . 'admin/');
            } else {
                $_SESSION['signIn'] = "Zəhmət olmasa, Şifrənizin doğruluğundan əmin olun";
            }
        } else {
            $_SESSION['signIn'] = "Zəhmət olmasa, İstifadəçi Adınızın doğruluğundan əmin olun";
        }
    }
    if(isset($_SESSION['signIn'])) {
        $_SESSION['signInData'] = $_POST;
        header('location: ' . ROOT_URL . 'signIn.php');
        die();
    }
} else {
    header('location: ' . ROOT_URL . 'signIn.php');
    die();
}