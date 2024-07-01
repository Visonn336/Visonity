<?php
require 'config/database.php';

if (isset($_GET['id'])) {
    $id = filter_var($_GET['id'], FILTER_SANITIZE_NUMBER_INT);

    $query = "SELECT * FROM users WHERE id=$id";
    $result = mysqli_query($connection, $query);
    $user = mysqli_fetch_assoc($result);


    if (mysqli_num_rows($result) == 1) {
        $avatarName = $user['avatar'];
        $avatarPath = '../images/' . $avatarName;
        if ($avatarPath) {
            unlink($avatarPath);
        }
    }





    $deleteUserQuery = "DELETE FROM users WHERE id=$id";
    $deleteUserResult = mysqli_query($connection, $deleteUserQuery);
    if (mysqli_errno($connection)) {
        $_SESSION['deleteAuthor'] = "İstifadəçi silinə bilmədi";
    } else {
        $_SESSION['deleteAuthorSuccess'] = "İstifadəçi uğurla sistemdən silindi!";
    }
}

header('location: ' . ROOT_URL . 'admin/manageAuthors.php');
die();