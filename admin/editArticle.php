<?php
include 'partials/header.php';



if (isset($_GET['id'])) {
    $id = filter_var($_GET['id'], FILTER_SANITIZE_NUMBER_INT);
    $query = "SELECT * FROM articles WHERE id=$id";
    $result = mysqli_query($connection, $query);
    $article = mysqli_fetch_assoc($result);
} else {
    header('location: ' . ROOT_URL . 'admin/');
    die();
}


$query = "SELECT * FROM categories";
$categories = mysqli_query($connection, $query);
?>



    <section class="formSectionAdd">
        <div class="container formSectionContainer formSectionContainerEdit">
            <h2>Məqaləni Redaktə Et</h2>
            <form action="<?= ROOT_URL ?>admin/editArticleLogic.php" enctype="multipart/form-data" method="POST">
                <input type="hidden" value="<?= $article['id'] ?>" name="id">
                <input type="hidden" value="<?= $article['thumbnail'] ?>" name="previousThumbnailName">
                <input type="text" name="title" value="<?= $article['title'] ?>" placeholder="Başlıq">
                <select name="category">
                    <?php while ($category = mysqli_fetch_assoc($categories)) : ?>
                        <option value="<?= $category['id'] ?>"><?= $category['title'] ?></option>
                    <?php endwhile ?>
                </select>
                <textarea rows="10" name="body" placeholder="Gövdə"><?= $article['body'] ?></textarea>
                <div class="formControl inline">
                    <input type="checkbox" name="isFeatured" id="isFeatured">
                    <label for="isFeatured">Sabitlənmiş</label>
                </div>
                <div class="formControl">
                    <label for="thumbnail">Məqalənin kiçik rəsmini dəyişdir</label>
                    <input type="file" name="thumbnail" id="thumbnail">
                </div>
                <button type="submit" name="submit" class="btn">Redaktə Et</button>
            </form>
        </div>
    </section>



<?php include '../partials/footer.php'; ?>