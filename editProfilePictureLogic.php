<?php
require 'config/database.php';

if (isset($_POST['id']) && isset($_FILES['avatar'])) {
    $id = filter_var($_POST['id'], FILTER_SANITIZE_NUMBER_INT);
    $avatar = $_FILES['avatar'];
    $previousAvatarName = filter_var($_POST['previousAvatarName'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);

    if ($avatar['name']) {
        $time = time();
        $avatarName = $time . '_' . $avatar['name'];
        $avatarTmpName = $avatar['tmp_name'];
        $avatarDestinationPath = 'images/' . $avatarName;

        $allowedFiles = ['png', 'jpg', 'jpeg'];
        $extension = pathinfo($avatarName, PATHINFO_EXTENSION);

        if (in_array($extension, $allowedFiles)) {
            if ($avatar['size'] < 8000000) {
                move_uploaded_file($avatarTmpName, $avatarDestinationPath);

                $previousAvatarPath = 'images/' . $previousAvatarName;
                if (file_exists($previousAvatarPath)) {
                    unlink($previousAvatarPath);
                }

                $query = "UPDATE users SET avatar='$avatarName' WHERE id=$id LIMIT 1";
                $result = mysqli_query($connection, $query);

                if (!mysqli_errno($connection)) {
                    $_SESSION['editProfilePictureSuccess'] = "Profil resmi başarıyla güncellendi!";
                } else {
                    $_SESSION['editProfilePicture'] = "Profil resmi güncellenemedi.";
                }
            } else {
                $_SESSION['editProfilePicture'] = "Profil resmi 8 MB'dan küçük olmalıdır.";
            }
        } else {
            $_SESSION['editProfilePicture'] = "Profil resmi PNG, JPG veya JPEG formatında olmalıdır.";
        }
    } else {
        $_SESSION['editProfilePicture'] = "Lütfen bir resim seçin.";
    }
    header('location: ' . ROOT_URL . 'authorProfile.php?id=' . $id);
    exit();
} else {
    echo "Form gönderilmedi.";
}
?>
