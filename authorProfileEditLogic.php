<?php 
require 'config/database.php';


if (isset($_POST['submit'])) {
    $id = filter_var($_POST['id'], FILTER_SANITIZE_NUMBER_INT);
    $firstname = filter_var($_POST['firstname'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $lastname = filter_var($_POST['lastname'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $username = filter_var($_POST['username'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $about_me = filter_var($_POST['about_me'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);

    $password = filter_var($_POST['password'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);


    
    if (!$firstname || !$lastname || !$username) {
        $_SESSION['editAuthor'] = "Zəhmət olmasa, Bütün xanaları doldurun";

    } else {
        $query = "SELECT * FROM users WHERE username='$username' AND id != '$id'";
        $result = mysqli_query($connection, $query);
        if (mysqli_num_rows($result) > 0) {
            $_SESSION['editAuthor'] = "Təəssüf ki, seçdiyiniz İstifadəçi Adı Başqasına məxsusdur";
        } else {
            if ($password) {
                $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
                $query = "UPDATE users SET firstname='$firstname', lastname='$lastname', username='$username', about_me='$about_me', password='$hashedPassword' WHERE id=$id LIMIT 1";
                $result = mysqli_query($connection, $query);
            } else if (!$password) {
                $query = "UPDATE users SET firstname='$firstname', lastname='$lastname', username='$username', about_me='$about_me' WHERE id=$id LIMIT 1";
                $result = mysqli_query($connection, $query);
            }
        }
    }
}
header('location: ' . ROOT_URL . 'authorProfile.php?id=' . $id);
die(); 