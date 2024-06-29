<?php
include 'partials/header.php';


$firstname = $_SESSION['addAuthorData']['firstname'] ?? null;
$lastname = $_SESSION['addAuthorData']['lastname'] ?? null;
$username = $_SESSION['addAuthorData']['username'] ?? null;
$createPassword = $_SESSION['addAuthorData']['createPassword'] ?? null;
$confirmPassword = $_SESSION['addAuthorData']['confirmPassword'] ?? null;

unset($_SESSION['addAuthorData']);
?>



    <section class="formSectionAdd">
        <div class="container formSectionContainer formSectionContainerAdd">
            <h2>Yazar Əlavə Et</h2>
            <?php if (isset($_SESSION['addAuthor'])): ?>
                <div class="alertMessage error">
                    <p>
                        <?= $_SESSION['addAuthor'];
                        unset($_SESSION['addAuthor']); ?>
                    </p>
                </div>
            <?php endif ?>
            <form action="<?= ROOT_URL ?>admin/addAuthorLogic.php" enctype="multipart/form-data" method="POST">
                <input type="text" name="firstname" value="<?= $firstname ?>" placeholder="Ad">
                <input type="text" name="lastname" value="<?= $lastname ?>" placeholder="Soyad">
                <input type="text" name="username" value="<?= $username ?>" placeholder="İstifadəçi Adı">
                <input type="password" name="createPassword" value="<?= $createPassword ?>" placeholder="Şifrə Yarat">
                <input type="password" name="confirmPassword" value="<?= $confirmPassword ?>" placeholder="Şifrəni Təsdiqlə">
                <select name="userRole">
                    <option value="0">Yazar</option>
                    <option value="1">Admin</option>
                </select>
                <div class="formControl">
                    <label for="formControl">Profil Şəkli</label>
                    <input type="file" name="avatar" id="avatar">
                </div>
                <button type="submit" name="submit" class="btn">Əlavə Et</button>
            </form>
        </div>
    </section>



<?php include '../partials/footer.php'; ?>