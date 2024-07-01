<?php
include 'partials/header.php';



$query = "SELECT * FROM categories ORDER BY title";
$categories = mysqli_query($connection, $query);
?>



    <section class="dashboard">
            <?php if (isset($_SESSION['addCategorySuccess'])): ?>
                <div class="alertMessage success container">
                    <p>
                        <?= $_SESSION['addCategorySuccess'];
                        unset($_SESSION['addCategorySuccess']); ?>
                    </p>
                </div>

            <?php elseif (isset($_SESSION['editCategorySuccess'])): ?>
                <div class="alertMessage success container">
                    <p>
                        <?= $_SESSION['editCategorySuccess'];
                        unset($_SESSION['editCategorySuccess']); ?>
                    </p>
                </div>
            <?php elseif (isset($_SESSION['editCategory'])): ?>
                <div class="alertMessage error container">
                    <p>
                        <?= $_SESSION['editCategory'];
                        unset($_SESSION['editCategory']); ?>
                    </p>
                </div>

            <?php elseif (isset($_SESSION['deleteCategorySuccess'])): ?>
                <div class="alertMessage success container">
                    <p>
                        <?= $_SESSION['deleteCategorySuccess'];
                        unset($_SESSION['deleteCategorySuccess']); ?>
                    </p>
                </div>
            <?php elseif (isset($_SESSION['deleteCategory'])): ?>
                <div class="alertMessage error container">
                    <p>
                        <?= $_SESSION['deleteCategory'];
                        unset($_SESSION['deleteCategory']); ?>
                    </p>
                </div>

            <?php endif ?>
        <div class="container dashboardContainer">
            <aside>
                <ul>
                    <li>
                        <a href="addArticle.php">
                            <i class="uil uil-pen"></i>
                            <h5>Məqalə Yaz</h5>
                        </a>
                    </li>
                    <li>
                        <a href="index.php">
                            <i class="uil uil-postcard"></i>
                            <h5>Məqaləni İdarə Et</h5>
                        </a>
                    </li>
                    <?php if (isset($_SESSION['userIsAdmin'])) : ?>
                        <li>
                            <a href="addAuthor.php">
                                <i class="uil uil-user-plus"></i>
                                <h5>Yazar Əlavə Et</h5>
                            </a>
                        </li>
                        <li>
                            <a href="manageAuthors.php">
                                <i class="uil uil-users-alt"></i>
                                <h5>Yazarı İdarə Et</h5>
                            </a>
                        </li>
                        <li>
                            <a href="addCategory.php">
                                <i class="uil uil-edit"></i>
                                <h5>Kateqoriya Əlavə Et</h5>
                            </a>
                        </li>
                        <li>
                            <a href="manageCategories.php"  class="active">
                                <i class="uil uil-list-ul"></i>
                                <h5>Kateqoriyanı İdarə Et</h5>
                            </a>
                        </li>
                    <?php endif ?>
                </ul>
            </aside>
            <main>
                <h2>Kateqoriyaları İdarə Et</h2>
                <table>
                    <thead>
                        <tr>
                            <th>Başlıq</th>
                            <th>Redaktə</th>
                            <th>Sil</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php while($category = mysqli_fetch_assoc($categories)) : ?>
                            <tr>
                                <td><a href="<?= ROOT_URL ?>categoryArticles.php"><?= $category['title'] ?></a></td>
                                <td>
                                    <a href="<?= ROOT_URL ?>admin/editCategory.php?id=<?= $category['id'] ?>" class="btn sm">Redaktə</a>
                                </td>
                                <td>
                                    <a href="<?= ROOT_URL ?>admin/deleteCategory.php?id=<?= $category['id'] ?>" class="btn sm danger">Sil</a>
                                </td>
                            </tr>
                        <?php endwhile ?>
                    </tbody>
                </table>
            </main>
        </div>
    </section>



<?php include '../partials/footer.php'; ?>