<?php include 'partials/header.php'; ?>



    <section class="dashboard">
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
                        <tr>
                            <td><a href="<?= ROOT_URL ?>categoryArticles.php">Texnologiya</a></td>
                            <td>
                                <a href="editCategory.php" class="btn sm">Redaktə</a>
                            </td>
                            <td>
                                <a href="deleteCategory.php" class="btn sm danger">Sil</a>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </main>
        </div>
    </section>



<?php include '../partials/footer.php'; ?>