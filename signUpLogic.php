<?php 
require 'config/database.php';



if (isset($_POST['submit'])) {
    $firstname = filter_var($_POST['firstname'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $lastname = filter_var($_POST['lastname'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $username = filter_var($_POST['username'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $createPassword = filter_var($_POST['createPassword'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $confirmPassword = filter_var($_POST['confirmPassword'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $avatar = $_FILES['avatar'];

    
    if (!$firstname) {
        $_SESSION['signUp'] = "Zəhmət olmasa, Adınızı qeyd edin";
    } else if (!$lastname) {
        $_SESSION['signUp'] = "Zəhmət olmasa, Soyadınızı qeyd edin";
    } else if (!$username) {
        $_SESSION['signUp'] = "Zəhmət olmasa, İstifadəçi Adınızı qeyd edin";
    } else if (strlen($createPassword) < 8 || strlen($confirmPassword) < 8) {
        $_SESSION['signUp'] = "Şifrə ən az 8 Simvoldan ibarət olmalıdır";
    } else if (!$avatar['name']) {
        $_SESSION['signUp'] = "Zəhmət olmasa, Profil Şəkli əlavə edin";

    } else {
        if ($createPassword !== $confirmPassword) {
            $_SESSION['signUp'] = "Zəhmət olmasa, Şifrələrin doğruluğundan əmin olun";

        } else {
            $hashedPassword = password_hash($createPassword, PASSWORD_DEFAULT);
            
            $userCheckQuery = "SELECT * FROM users WHERE username='$username'";
            $userCheckResult = mysqli_query($connection, $userCheckQuery);
            if (mysqli_num_rows($userCheckResult) > 0) {
                $_SESSION['signUp'] = "Təəssüf ki, seçdiyiniz İstifadəçi Adı Başqasına məxsusdur";

            } else {
                $time = time();
                $avatarName = $time . $avatar['name'];
                $avatarTmpName = $avatar['tmp_name'];
                $avatarDestinationPath = 'images/' . $avatarName;

                $allowedFiles = ['png', 'jpg', 'jpeg'];
                $extention = explode('.', $avatarName);
                $extention = end($extention);
                if (in_array($extention, $allowedFiles)) {

                    if ($avatar['size'] < 8000000) {

                        move_uploaded_file($avatarTmpName, $avatarDestinationPath);
                    } else {
                        $_SESSION['signUp'] = "Profil Şəkli 8 MB-dan az olmalıdır";
                    }
                } else {
                    $_SESSION['signUp'] = "Profil Şəkli PNG, JPG və ya JPEG Formatında olmalıdır";
                }
            }
        }
    }
    if (isset($_SESSION['signUp'])) {
        $_SESSION['signUpData'] = $_POST;
        header('location: ' . ROOT_URL . 'signUp.php');
        die(); 

    } else {
        $insertUserQuery = "INSERT INTO users (firstname, lastname, username, password, avatar, is_admin) 
        VALUES ('$firstname', '$lastname', '$username', '$hashedPassword', '$avatarName', 0)";
        $insertUserResult = mysqli_query($connection, $insertUserQuery);

        if (!mysqli_errno($connection)) {
            $_SESSION['signUpSuccess'] = "Əməliyyat uğurla başa çatdı! Zəhmət olmasa, Giriş edin";
            header('location: ' . ROOT_URL . 'signIn.php');
            die(); 
        }
    }
} else {
    header('location: ' . ROOT_URL . 'signUp.php');
    die(); 
}