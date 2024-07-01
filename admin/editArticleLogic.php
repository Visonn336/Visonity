<?php 
require 'config/database.php';


if (isset($_POST['submit'])) {
    $id = filter_var($_POST['id'], FILTER_SANITIZE_NUMBER_INT);
    $title = filter_var($_POST['title'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $body = filter_var($_POST['body'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $categoryId = filter_var($_POST['category'], FILTER_SANITIZE_NUMBER_INT);

    $isFeatured = isset($_POST['isFeatured']) ? 1 : 0;

    $thumbnail = $_FILES['thumbnail'];
    $previousThumbnailName = filter_var($_POST['previousThumbnailName'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);



    
    if (!$title || !$body) {
        $_SESSION['editArticle'] = "Zəhmət olmasa, Bütün xanaları doldurun";

    } else {
        if ($thumbnail['name']) {
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
                        $previousThumbnailPath = '../images/' . $previousThumbnailName;
                        if ($previousThumbnailPath) {
                            unlink($previousThumbnailPath);
                        }
                    } else {
                        $_SESSION['editArticle'] = "Kiçik rəsm 16:9 ölçülərində olmalıdır";
                    }
                } else {
                    $_SESSION['editArticle'] = "Kiçik rəsm 8 MB-dan az olmalıdır";
                }
            } else {
                $_SESSION['editArticle'] = "Kiçik rəsm PNG, JPG və ya JPEG Formatında olmalıdır";
            }
        }
    }
    if ($_SESSION['editArticle']) {
        $query = "UPDATE articles SET title='$title', body='$body' WHERE id=$id LIMIT 1";
        $result = mysqli_query($connection, $query);
        header('location: ' . ROOT_URL . 'admin/');
        die();
    } else {
        if ($isFeatured == 1) {
            $zeroAllIsFeaturedQuery = "UPDATE articles SET is_featured=0";
            $zeroAllIsFeaturedResult = mysqli_query($connection, $zeroAllIsFeaturedQuery);
        }
        $thumbnailToInsert = $thumbnailName ?? $previousThumbnailName;
        
        $query = "UPDATE articles SET title='$title', body='$body', category_id='$categoryId', is_featured='$isFeatured', thumbnail='$thumbnailToInsert' WHERE id=$id LIMIT 1";
        $result = mysqli_query($connection, $query);
    }
    if (!mysqli_errno($connection)) {
        $_SESSION['editArticleSuccess'] = "Məqalə uğurla redaktə olundu!";
    } else {
        $_SESSION['editArticle'] = "Təəssüf ki, Məqalə redaktə edilə bilmədi";
    }
}
header('location: ' . ROOT_URL . 'admin/');
die(); 
