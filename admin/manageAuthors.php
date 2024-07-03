<?php
include 'partials/header.php';



$currentAdminId = $_SESSION['userId'];
$query = "SELECT * FROM users WHERE NOT id=$currentAdminId";
$users = mysqli_query($connection, $query);
?>



    <section class="dashboard">

            <?php if (isset($_SESSION['addAuthorSuccess'])): ?>
                <div class="alertMessage success container">
                    <p>
                        <?= $_SESSION['addAuthorSuccess'];
                        unset($_SESSION['addAuthorSuccess']); ?>
                    </p>
                </div>
                
            <?php elseif (isset($_SESSION['editAuthorSuccess'])): ?>
                <div class="alertMessage success container">
                    <p>
                        <?= $_SESSION['editAuthorSuccess'];
                        unset($_SESSION['editAuthorSuccess']); ?>
                    </p>
                </div>
            <?php elseif (isset($_SESSION['editAuthor'])): ?>
                <div class="alertMessage error container">
                    <p>
                        <?= $_SESSION['editAuthor'];
                        unset($_SESSION['editAuthor']); ?>
                    </p>
                </div>

            <?php elseif (isset($_SESSION['deleteAuthorSuccess'])): ?>
                <div class="alertMessage success container">
                    <p>
                        <?= $_SESSION['deleteAuthorSuccess'];
                        unset($_SESSION['deleteAuthorSuccess']); ?>
                    </p>
                </div>
            <?php elseif (isset($_SESSION['deleteAuthor'])): ?>
                <div class="alertMessage error container">
                    <p>
                        <?= $_SESSION['deleteAuthor'];
                        unset($_SESSION['deleteAuthor']); ?>
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
                    <?php endif ?>
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
                        <?php while($user = mysqli_fetch_assoc($users)) : ?>
                            <tr>
                                <td><?= $user['firstname'] ?></td>
                                <td><a href="<?= ROOT_URL ?>authorProfile.php?id=<?= $user['id'] ?>"><?= $user['username'] ?></a></td>
                                <td>
                                    <a href="<?= ROOT_URL ?>admin/editAuthor.php?id=<?= $user['id'] ?>" class="btn sm">Redaktə</a>
                                </td>
                                <td>
                                    <a href="<?= ROOT_URL ?>admin/deleteAuthor.php?id=<?= $user['id'] ?>" class="btn sm danger">Sil</a>
                                </td>
                                <td>
                                    <?php if ($user['is_admin'] == 0) : ?>
                                        Xeyr
                                    <?php elseif ($user['is_admin'] == 1) : ?>
                                        Bəli
                                    <?php endif ?>
                                </td>
                            </tr>
                        <?php endwhile ?>
                    </tbody>
                </table>
            </main>
        </div>
    </section>



<?php include '../partials/footer.php'; ?>