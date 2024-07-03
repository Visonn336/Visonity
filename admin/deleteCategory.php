<?php
require 'config/database.php';

if (isset($_GET['id'])) {
    $id = filter_var($_GET['id'], FILTER_SANITIZE_NUMBER_INT);

    $query = "UPDATE articles SET category_id=0 WHERE category_id='$id'";
    $result = mysqli_query($connection, $query);

    $deleteCategoryQuery = "DELETE FROM categories WHERE id=$id LIMIT 1";
    $deleteCategoryResult = mysqli_query($connection, $deleteCategoryQuery);
    if (mysqli_errno($connection)) {
        $_SESSION['deleteCategory'] = "Kateqoriya silinə bilmədi";
    } else {
        $_SESSION['deleteCategorySuccess'] = "Kateqoriya uğurla sistemdən silindi!";
    }
}

header('location: ' . ROOT_URL . 'admin/manageCategories.php');
die();