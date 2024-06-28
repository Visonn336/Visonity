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
                    <li>
                        <a href="addAuthor.php">
                            <i class="uil uil-user-plus"></i>
                            <h5>Yazar Əlavə Et</h5>
                        </a>
                    </li>
                    <li>
                        <a href="manageAuthors.php" class="active">
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
                        <a href="manageCategories.php">
                            <i class="uil uil-list-ul"></i>
                            <h5>Kateqoriyanı İdarə Et</h5>
                        </a>
                    </li>
                </ul>
            </aside>
            <main>
                <h2>Yazarları İdarə Et</h2>
                <table>
                    <thead>
                        <tr>
                            <th>Ad</th>
                            <th>İstifadəçi Adı</th>
                            <th>Redaktə</th>
                            <th>Sil</th>
                            <th>Admin</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Polad</td>
                            <td><a href="<?= ROOT_URL ?>authorProfile.php">visonn336</a></td>
                            <td>
                                <a href="editAuthor.php" class="btn sm">Redaktə</a>
                            </td>
                            <td>
                                <a href="deleteAuthor.php" class="btn sm danger">Sil</a>
                            </td>
                            <td>Xeyr</td>
                        </tr>
                    </tbody>
                </table>
            </main>
        </div>
    </section>



<?php include '../partials/footer.php'; ?>