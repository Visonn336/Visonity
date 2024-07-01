<?php
include 'partials/header.php';



$title = $_SESSION['addArticleData']['title'] ?? null;
$body = $_SESSION['addArticleData']['body'] ?? null;

unset($_SESSION['addArticleData']);



$query = "SELECT * FROM categories";
$categories = mysqli_query($connection, $query);
?>



    <section class="formSectionAdd">
        <div class="container formSectionContainer formSectionContainerAdd">
            <h2>Məqalə Yaz</h2>
            <?php if (isset($_SESSION['addArticle'])): ?>
                <div class="alertMessage error">
                    <p>
                        <?= $_SESSION['addArticle'];
                        unset($_SESSION['addArticle']); ?>
                    </p>
                </div>
            <?php endif ?>
            <form action="<?= ROOT_URL ?>admin/addArticleLogic.php" enctype="multipart/form-data" method="POST">
                <input type="text" name="title" value="<?= $title ?>" placeholder="Başlıq">
                <select name="category">
                    <?php while ($category = mysqli_fetch_assoc($categories)) : ?>
                        <option value="<?= $category['id'] ?>"><?= $category['title'] ?></option>
                    <?php endwhile ?>
                </select>
                <textarea rows="10"  name="body" placeholder="Gövdə"><?= $body ?></textarea>
                <?php if (isset($_SESSION['userIsAdmin'])) : ?>
                    <div class="formControl inline">
                        <input type="checkbox" name="isFeatured" id="isFeatured">
                        <label for="isFeatured">Sabitlənmiş</label>
                    </div>
                <?php endif ?>
                <div class="formControl">
                    <label for="thumbnail">Məqalənin kiçik rəsmini əlavə et</label>
                    <input type="file" name="thumbnail" id="thumbnail">
                </div>
                <button type="submit" name="submit" class="btn">Əlavə Et</button>
            </form>
        </div>
    </section>



<?php include '../partials/footer.php'; ?>