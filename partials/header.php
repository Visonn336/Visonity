<?php
require 'config/database.php';



if (isset($_SESSION['userId'])) {
    $id = filter_var($_SESSION['userId'], FILTER_SANITIZE_NUMBER_INT);
    $query = "SELECT avatar FROM users WHERE id=$id";
    $result = mysqli_query($connection, $query);
    $avatar = mysqli_fetch_assoc($result);
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Visonity 3.6</title>
    <link rel="stylesheet" href="<?= ROOT_URL ?>css/style.css">
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.8/css/line.css">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
</head>

<body>
    <nav>
        <div class="container navContainer">
            <a href="<?= ROOT_URL ?>index.php" class="navLogo">Visonity</a>
            <ul class="navItems">
                <li><a href="<?= ROOT_URL ?>discover.php">Kəşf Et</a></li>
                <li><a href="<?= ROOT_URL ?>popular.php">Populyar</a></li>
                <li><a href="<?= ROOT_URL ?>help.php">Kömək</a></li>
                <li><a href="<?= ROOT_URL ?>aboutUs.php">Haqqımızda</a></li>
                <?php if (isset($_SESSION['userId'])) : ?>
                    <li class="navProfile">
                        <div class="avatar">
                            <img src="<?= ROOT_URL . 'images/' . $avatar['avatar'] ?>">
                        </div>
                        <ul>
                            <li><a href="<?= ROOT_URL ?>authorProfile.php">Profil</a></li>
                            <li><a href="<?= ROOT_URL ?>admin/index.php">İdarə</a></li>
                            <li><a href="<?= ROOT_URL ?>logout.php">Çıxış</a></li>
                        </ul>
                    </li>
                <?php else : ?>
                    <li><a href="<?= ROOT_URL ?>signIn.php">Giriş et</a></li>
                <?php endif ?>
            </ul>
        </div>
    </nav>