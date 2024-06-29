<?php
require 'config/constants.php';


$firstname = $_SESSION['signUpData']['firstname'] ?? null;
$lastname = $_SESSION['signUpData']['lastname'] ?? null;
$username = $_SESSION['signUpData']['username'] ?? null;
$createPassword = $_SESSION['signUpData']['createPassword'] ?? null;
$confirmPassword = $_SESSION['signUpData']['confirmPassword'] ?? null;

unset($_SESSION['signUpData']);
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
    <section class="formSection">
        <div class="container formSectionContainer formSectionContainerSign">
            <h2>Hesab Yarat</h2>
            <?php if (isset($_SESSION['signUp'])): ?>
                <div class="alertMessage error">
                    <p>
                        <?= $_SESSION['signUp'];
                        unset($_SESSION['signUp']); ?>
                    </p>
                </div>
            <?php endif ?>
            <form action="<?= ROOT_URL ?>signUpLogic.php" enctype="multipart/form-data" method="POST">
                <input type="text" name="firstname" value="<?= $firstname ?>" placeholder="Ad">
                <input type="text" name="lastname" value="<?= $lastname ?>" placeholder="Soyad">
                <input type="text" name="username" value="<?= $username ?>" placeholder="İstifadəçi Adı">
                <input type="password" name="createPassword" value="<?= $createPassword ?>" placeholder="Şifrə Yarat">
                <input type="password" name="confirmPassword" value="<?= $confirmPassword ?>" placeholder="Şifrəni Təsdiqlə">
                <div class="formControl">
                    <label for="formControl">Profil Şəkli</label>
                    <input type="file" name="avatar" id="avatar">
                </div>
                <button type="submit" name="submit" class="btn">Hesab Yarat</button>
                <small>
                    Hazırda hesabın var?
                    <a href="signIn.php">Giriş et</a>
                </small>
            </form>
        </div>
    </section>
</body>
</html>