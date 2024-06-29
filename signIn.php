<?php
require 'config/constants.php';


$username = $_SESSION['signInData']['username'] ?? null;
$password = $_SESSION['signInData']['password'] ?? null;

unset($_SESSION['signInData']);
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
            <h2>Giriş Et</h2>
            <?php if (isset($_SESSION['signUpSuccess'])): ?>
                <div class="alertMessage success">
                    <p>
                        <?= $_SESSION['signUpSuccess'];
                        unset($_SESSION['signUpSuccess']); ?>
                    </p>
                </div>
            <?php elseif (isset($_SESSION['signIn'])) : ?>
                <div class="alertMessage error">
                    <p>
                        <?= $_SESSION['signIn'];
                        unset($_SESSION['signIn']); ?>
                    </p>
                </div>
            <?php endif ?>
            <form action="<?= ROOT_URL ?>signInLogic.php" method="POST">
                <input type="text" name="username" value="<?= $username ?>" placeholder="İstifadəçi adı">
                <input type="password" name="password" value="<?= $password ?>" placeholder="Şifrə">
                <button type="submit" name="submit" class="btn">Giriş Et</button>
                <small>
                    Giriş edəcək hesabın yoxdur?
                    <a href="signUp.php">Hesab yarat</a>
                </small>
            </form>
        </div>
    </section>
</body>
</html>