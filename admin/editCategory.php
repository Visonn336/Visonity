<?php
include 'partials/header.php';



if (isset($_GET['id'])) {
    $id = filter_var($_GET['id'], FILTER_SANITIZE_NUMBER_INT);
    $query = "SELECT * FROM categories WHERE id=$id";
    $result = mysqli_query($connection, $query);
    $category = mysqli_fetch_assoc($result);
} else {
    header('location: ' . ROOT_URL . 'admin/manageCategories.php');
    die();
}
?>



    <section class="formSectionAdd">
        <div class="container formSectionContainer formSectionContainerEdit">
            <h2>Kateqoriyanı Redaktə Et</h2>
            <form action="<?= ROOT_URL ?>admin/editCategoryLogic.php" method="POST">
            <input type="hidden" value="<?= $category['id'] ?>" name="id">
                <input type="text" name="title" value="<?= $category['title'] ?>" placeholder="Başlıq">
                <textarea rows="4" name="description" placeholder="Açıqlama"><?= $category['description'] ?></textarea>
                <button type="submit" name="submit" class="btn">Redaktə Et</button>
            </form>
        </div>
    </section>



<?php include '../partials/footer.php'; ?>