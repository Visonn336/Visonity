<?php 
require 'config/database.php';



if (isset($_POST['submit'])) {
    $firstname = filter_var($_POST['firstname'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $lastname = filter_var($_POST['lastname'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $username = filter_var($_POST['username'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $createPassword = filter_var($_POST['createPassword'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $confirmPassword = filter_var($_POST['confirmPassword'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $is_admin = filter_var($_POST['userRole'], FILTER_SANITIZE_NUMBER_INT);
    $avatar = $_FILES['avatar'];

    
    if (!$firstname) {
        $_SESSION['addAuthor'] = "Zəhmət olmasa, Adınızı qeyd edin";
    } else if (!$lastname) {
        $_SESSION['addAuthor'] = "Zəhmət olmasa, Soyadınızı qeyd edin";
    } else if (!$username) {
        $_SESSION['addAuthor'] = "Zəhmət olmasa, İstifadəçi Adınızı qeyd edin";
    } else if (strlen($createPassword) < 8 || strlen($confirmPassword) < 8) {
        $_SESSION['addAuthor'] = "Şifrə ən az 8 Simvoldan ibarət olmalıdır";
    } else if (!$avatar['name']) {
        $_SESSION['addAuthor'] = "Zəhmət olmasa, Profil Şəkli əlavə edin";

    } else {
        if ($createPassword !== $confirmPassword) {
            $_SESSION['addAuthor'] = "Zəhmət olmasa, Şifrələrin doğruluğundan əmin olun";

        } else {
            $hashedPassword = password_hash($createPassword, PASSWORD_DEFAULT);
            
            $userCheckQuery = "SELECT * FROM users WHERE username='$username'";
            $userCheckResult = mysqli_query($connection, $userCheckQuery);
            if (mysqli_num_rows($userCheckResult) > 0) {
                $_SESSION['addAuthor'] = "Təəssüf ki, seçdiyiniz İstifadəçi Adı Başqasına məxsusdur";

            } else {
                $time = time();
                $avatarName = $time . $avatar['name'];
                $avatarTmpName = $avatar['tmp_name'];
                $avatarDestinationPath = '../images/' . $avatarName;

                $allowedFiles = ['png', 'jpg', 'jpeg'];
                $extention = explode('.', $avatarName);
                $extention = end($extention);
                if (in_array($extention, $allowedFiles)) {

                    if ($avatar['size'] < 8000000) {

                        move_uploaded_file($avatarTmpName, $avatarDestinationPath);
                    } else {
                        $_SESSION['addAuthor'] = "Profil Şəkli 8 MB-dan az olmalıdır";
                    }
                } else {
                    $_SESSION['addAuthor'] = "Profil Şəkli PNG, JPG və ya JPEG Formatında olmalıdır";
                }
            }
        }
    }
    if (isset($_SESSION['addAuthor'])) {
        $_SESSION['addAuthorData'] = $_POST;
        header('location: ' . ROOT_URL . '/admin/addAuthor.php');
        die(); 

    } else {
        $insertUserQuery = "INSERT INTO users (firstname, lastname, username, password, avatar, is_admin) 
        VALUES ('$firstname', '$lastname', '$username', '$hashedPassword', '$avatarName', '$is_admin')";
        $insertUserResult = mysqli_query($connection, $insertUserQuery);

        if (!mysqli_errno($connection)) {
            $_SESSION['addAuthorSuccess'] = "Əməliyyat uğurla başa çatdı! Yeni İstifadəçi sistemə daxil edildi";
            header('location: ' . ROOT_URL . 'admin/manageAuthors.php');
            die(); 
        }
    }
} else {
    header('location: ' . ROOT_URL . 'admin/addAuthor.php');
    die(); 
}