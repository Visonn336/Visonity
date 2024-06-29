<?php 
require 'config/database.php';


if (isset($_POST['submit'])) {
    $id = filter_var($_POST['id'], FILTER_SANITIZE_NUMBER_INT);
    $firstname = filter_var($_POST['firstname'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $lastname = filter_var($_POST['lastname'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $username = filter_var($_POST['username'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $is_admin = filter_var($_POST['userRole'], FILTER_SANITIZE_NUMBER_INT);

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
                $query = "UPDATE users SET firstname='$firstname', lastname='$lastname', username='$username', is_admin='$is_admin', password='$hashedPassword' WHERE id=$id LIMIT 1";
                $result = mysqli_query($connection, $query);
            } else if (!$password) {
                $query = "UPDATE users SET firstname='$firstname', lastname='$lastname', username='$username', is_admin='$is_admin' WHERE id=$id LIMIT 1";
                $result = mysqli_query($connection, $query);
            }
            if (!mysqli_errno($connection)) {
                $_SESSION['editAuthorSuccess'] = "Əməliyyat uğurla başa çatdı!";
            } else {
                $_SESSION['editAuthor'] = "Təəssüf ki, İstifadəçi redaktə edilə bilmədi";
            }
        }
    }
}
header('location: ' . ROOT_URL . 'admin/manageAuthors.php');
die(); 
