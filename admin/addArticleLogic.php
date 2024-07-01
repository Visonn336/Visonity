<?php 
require 'config/database.php';



if (isset($_POST['submit'])) {
    $authorId = $_SESSION['userId'];
    $title = filter_var($_POST['title'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $body = filter_var($_POST['body'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $categoryId = filter_var($_POST['category'], FILTER_SANITIZE_NUMBER_INT);
    $isFeatured = filter_var($_POST['isFeatured']);
    $thumbnail = $_FILES['thumbnail'];

    $isFeatured = $isFeatured ? 1 : 0;

    
    if (!$title) {
        $_SESSION['addArticle'] = "Zəhmət olmasa, Məqalə Başlığını qeyd edin";
    } else if (!$categoryId) {
        $_SESSION['addArticle'] = "Zəhmət olmasa, Kateqoriya seçin";
    } else if (!$body) {
        $_SESSION['addArticle'] = "Zəhmət olmasa, Məqalə Gövdəsini yazın";
    } else if (!$thumbnail['name']) {
        $_SESSION['addArticle'] = "Zəhmət olmasa, Məqalənin kiçik rəsmini əlavə edin";
    } else {
        $time = time();
        $thumbnailName = $time . $thumbnail['name'];
        $thumbnailTmpName = $thumbnail['tmp_name'];
        $thumbnailDestinationPath = '../images/' . $thumbnailName;

        $allowedFiles = ['png', 'jpg', 'jpeg'];
        $extention = explode('.', $thumbnailName);
        $extention = end($extention);
        if (in_array($extention, $allowedFiles)) {

            if ($thumbnail['size'] < 8000000) {

                list($width, $height) = getimagesize($thumbnailTmpName);
                if (abs($width / $height - 16/9) < 0.025) {
                    move_uploaded_file($thumbnailTmpName, $thumbnailDestinationPath);
                } else {
                    $_SESSION['addArticle'] = "Kiçik rəsm 16:9 ölçülərində olmalıdır";
                }
            } else {
                $_SESSION['addArticle'] = "Kiçik rəsm 8 MB-dan az olmalıdır";
            }
        } else {
            $_SESSION['addArticle'] = "Kiçik rəsm PNG, JPG və ya JPEG Formatında olmalıdır";
        }
    }
    if (isset($_SESSION['addArticle'])) {
        $_SESSION['addArticleData'] = $_POST;
        header('location: ' . ROOT_URL . '/admin/addArticle.php');
        die(); 

    } else {
        if ($isFeatured == 1) {
            $zeroAllIsFeaturedQuery = "UPDATE articles SET is_featured=0";
            $zeroAllIsFeaturedResult = mysqli_query($connection, $zeroAllIsFeaturedQuery);
        }

        $insertArticleQuery = "INSERT INTO articles (title, body, thumbnail, category_id, author_id, is_featured) 
        VALUES ('$title', '$body', '$thumbnailName', '$categoryId', '$authorId', '$isFeatured')";
        $insertArticleResult = mysqli_query($connection, $insertArticleQuery);

        if (!mysqli_errno($connection)) {
            $_SESSION['addArticleSuccess'] = "Yeni Məqalə uğurla yayımlandı!";
            header('location: ' . ROOT_URL . 'admin/');
            die(); 
        }
    }
} else {
    header('location: ' . ROOT_URL . 'admin/addArticle.php');
    die(); 
}