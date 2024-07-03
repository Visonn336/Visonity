<?php
require 'config/database.php';

if (isset($_GET['id'])) {
    $id = filter_var($_GET['id'], FILTER_SANITIZE_NUMBER_INT);

    $query = "SELECT * FROM articles WHERE id=$id";
    $result = mysqli_query($connection, $query);
    $article = mysqli_fetch_assoc($result);


    if (mysqli_num_rows($result) == 1) {
        $thumbnailName = $article['thumbnail'];
        $thumbnailPath = '../images/' . $thumbnailName;
        if ($thumbnailPath) {
            unlink($thumbnailPath);

            $deleteArticleQuery = "DELETE FROM articles WHERE id=$id";
            $deleteArticleResult = mysqli_query($connection, $deleteArticleQuery);
            if (mysqli_errno($connection)) {
                $_SESSION['deleteArticle'] = "Məqalə silinə bilmədi";
            } else {
                $_SESSION['deleteArticleSuccess'] = "Məqalə uğurla sistemdən silindi!";
            }
        }
    }
}

header('location: ' . ROOT_URL . 'admin/');
die();