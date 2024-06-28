<?php
require 'config/database.php';
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
                <li class="navProfile">
                    <div class="avatar">
                        <img src="images/avatar1.png">
                    </div>
                    <ul>
                        <li><a href="<?= ROOT_URL ?>authorProfile.php">Profil</a></li>
                        <li><a href="<?= ROOT_URL ?>admin/index.php">İdarə</a></li>
                        <li><a href="<?= ROOT_URL ?>logout.php">Çıxış</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </nav>