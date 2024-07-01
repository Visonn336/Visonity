<?php 
require 'config/database.php';



if (isset($_POST['submit'])) {
    $title = filter_var($_POST['title'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $description = filter_var($_POST['description'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);

    
    if (!$title) {
        $_SESSION['addCategory'] = "Zəhmət olmasa, Kateqoriya Başlığını qeyd edin";
    } else if (!$description) {
        $_SESSION['addCategory'] = "Zəhmət olmasa, Kateqoriya Açıqlamasını qeyd edin";
    }

    if (isset($_SESSION['addCategory'])) {
        $_SESSION['addCategoryData'] = $_POST;
        header('location: ' . ROOT_URL . '/admin/addCategory.php');
        die(); 
    } else {
        $insertCategoryQuery = "INSERT INTO categories (title, description) VALUES ('$title', '$description')";
        $insertCategoryResult = mysqli_query($connection, $insertCategoryQuery);

        if (!mysqli_errno($connection)) {
            $_SESSION['addCategorySuccess'] = "Əməliyyat uğurla başa çatdı! Yeni Kateqoriya sistemə daxil edildi";
            header('location: ' . ROOT_URL . 'admin/manageCategories.php');
            die(); 
        }
    }
} else {
    header('location: ' . ROOT_URL . 'admin/addCategory.php');
    die(); 
}