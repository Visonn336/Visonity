<?php
include 'partials/header.php';



$title = $_SESSION['addCategoryData']['title'] ?? null;
$description = $_SESSION['addCategoryData']['description'] ?? null;

unset($_SESSION['addCategoryData']);
?>



    <section class="formSectionAdd">
        <div class="container formSectionContainer formSectionContainerAdd">
            <h2>Kateqoriya Əlavə Et</h2>
            <?php if (isset($_SESSION['addCategory'])): ?>
                <div class="alertMessage error">
                    <p>
                        <?= $_SESSION['addCategory'];
                        unset($_SESSION['addCategory']); ?>
                    </p>
                </div>
            <?php endif ?>
            <form action="<?= ROOT_URL ?>admin/addCategoryLogic.php" enctype="multipart/form-data" method="POST">
                <input type="text" name="title" value="<?= $title ?>" placeholder="Başlıq">
                <textarea rows="4" name="description" value="<?= $description ?>" placeholder="Açıqlama"></textarea>
                <button type="submit" name="submit" class="btn">Əlavə Et</button>
            </form>
        </div>
    </section>



<?php include '../partials/footer.php'; ?>