<?php
include 'partials/header.php';



$currentUserId = $_SESSION['userId'];
$query = "SELECT * FROM users WHERE id=$currentUserId";
$result = mysqli_query($connection, $query);
$user = mysqli_fetch_assoc($result);

if ($user['is_admin'] == 1) {
    $adminId = $user['id'];
    $adminArticlesQuery = "SELECT * FROM articles WHERE author_id=$adminId";
    $adminArticles = mysqli_query($connection, $adminArticlesQuery);

    $authorsArticlesQuery = "SELECT * FROM articles WHERE NOT author_id=$adminId ORDER BY author_id";
    $authorsArticles = mysqli_query($connection, $authorsArticlesQuery);

} else if ($user['is_admin'] == 0) {
    $authorId = $user['id'];
    $authorArticlesQuery = "SELECT * FROM articles WHERE author_id=$authorId";
    $authorArticles = mysqli_query($connection, $authorArticlesQuery);
}
?>



    <section class="dashboard">
            <?php if (isset($_SESSION['addArticleSuccess'])): ?>
                <div class="alertMessage success container">
                    <p>
                        <?= $_SESSION['addArticleSuccess'];
                        unset($_SESSION['addArticleSuccess']); ?>
                    </p>
                </div>

            <?php elseif (isset($_SESSION['editArticleSuccess'])): ?>
                <div class="alertMessage success container">
                    <p>
                        <?= $_SESSION['editArticleSuccess'];
                        unset($_SESSION['editArticleSuccess']); ?>
                    </p>
                </div>
            <?php elseif (isset($_SESSION['editArticle'])): ?>
                <div class="alertMessage error container">
                    <p>
                        <?= $_SESSION['editArticle'];
                        unset($_SESSION['editArticle']); ?>
                    </p>
                </div>

            <?php elseif (isset($_SESSION['deleteArticleSuccess'])): ?>
                <div class="alertMessage success container">
                    <p>
                        <?= $_SESSION['deleteArticleSuccess'];
                        unset($_SESSION['deleteArticleSuccess']); ?>
                    </p>
                </div>
            <?php elseif (isset($_SESSION['deleteArticle'])): ?>
                <div class="alertMessage error container">
                    <p>
                        <?= $_SESSION['deleteArticle'];
                        unset($_SESSION['deleteArticle']); ?>
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
                        <a href="index.php" class="active">
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
                            <a href="manageCategories.php">
                                <i class="uil uil-list-ul"></i>
                                <h5>Kateqoriyanı İdarə Et</h5>
                            </a>
                        </li>
                    <?php endif ?>
                </ul>
            </aside>
            <main>
                <h2>Məqalələri İdarə Et</h2>
                <table>
                    <thead>
                        <tr>
                            <th>Başlıq</th>
                            <th>Yazar</th>
                            <th>Kateqoriya</th>
                            <th>Redaktə</th>
                            <th>Sil</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if($user['is_admin'] == 1) : ?>
                            <?php while($article = mysqli_fetch_assoc($adminArticles)) : ?>
                                <?php
                                    $categoryId = $article['category_id'];
                                    $categoryQuery = "SELECT title FROM categories WHERE id=$categoryId";
                                    $categoryResult = mysqli_query($connection, $categoryQuery);
                                    $category = mysqli_fetch_assoc($categoryResult);
                                ?>
                                <tr>
                                    <td><a href="<?= ROOT_URL ?>article.php?id=<?= $article['id'] ?>"><?= $article['title'] ?></a></td>
                                    <td><a href="<?= ROOT_URL ?>authorProfile.php?id=<?= $user['id'] ?>"><?= $user['username'] ?></a></td>
                                    <td><?= $category['title'] ?></td>
                                    <td>
                                        <a href="<?= ROOT_URL ?>admin/editArticle.php?id=<?= $article['id'] ?>" class="btn sm">Redaktə</a>
                                    </td>
                                    <td>
                                        <a href="<?= ROOT_URL ?>admin/deleteArticle.php?id=<?= $article['id'] ?>" class="btn sm danger">Sil</a>
                                    </td>
                                </tr>
                            <?php endwhile ?>
                            <?php while($article = mysqli_fetch_assoc($authorsArticles)) : ?>
                                <?php
                                    $categoryId = $article['category_id'];
                                    $categoryQuery = "SELECT title FROM categories WHERE id=$categoryId";
                                    $categoryResult = mysqli_query($connection, $categoryQuery);
                                    $category = mysqli_fetch_assoc($categoryResult);

                                    $authorId = $article['author_id'];
                                    $authorQuery = "SELECT * FROM users WHERE id=$authorId";
                                    $authorResult = mysqli_query($connection, $authorQuery);
                                    $author = mysqli_fetch_assoc($authorResult)
                                ?>
                                <tr>
                                    <td><a href="<?= ROOT_URL ?>article.php?id=<?= $article['id'] ?>"><?= $article['title'] ?></a></td>
                                    <td><a href="<?= ROOT_URL ?>authorProfile.php?id=<?= $author['id'] ?>"><?= $author['username'] ?></a></td>
                                    <td><?= $category['title'] ?></td>
                                    <td>
                                        <a href="<?= ROOT_URL ?>admin/editArticle.php?id=<?= $article['id'] ?>" class="btn sm">Redaktə</a>
                                    </td>
                                    <td>
                                        <a href="<?= ROOT_URL ?>admin/deleteArticle.php?id=<?= $article['id'] ?>" class="btn sm danger">Sil</a>
                                    </td>
                                </tr>
                            <?php endwhile ?>
                        <?php elseif($user['is_admin'] == 0) : ?>
                            <?php while($article = mysqli_fetch_assoc($authorArticles)) : ?>
                                <?php
                                    $categoryId = $article['category_id'];
                                    $categoryQuery = "SELECT title FROM categories WHERE id=$categoryId";
                                    $categoryResult = mysqli_query($connection, $categoryQuery);
                                    $category = mysqli_fetch_assoc($categoryResult);
                                ?>
                                <tr>
                                    <td><a href="<?= ROOT_URL ?>article.php?id=<?= $article['id'] ?>"><?= $article['title'] ?></a></td>
                                    <td><a href="<?= ROOT_URL ?>authorProfile.php?id=<?= $user['id'] ?>"><?= $user['username'] ?></a></td>
                                    <td><?= $category['title'] ?></td>
                                    <td>
                                        <a href="<?= ROOT_URL ?>admin/editArticle.php?id=<?= $article['id'] ?>" class="btn sm">Redaktə</a>
                                    </td>
                                    <td>
                                        <a href="<?= ROOT_URL ?>admin/deleteArticle.php?id=<?= $article['id'] ?>" class="btn sm danger">Sil</a>
                                    </td>
                                </tr>
                            <?php endwhile ?>
                        <?php endif ?>
                    </tbody>
                </table>
            </main>
        </div>
    </section>



<?php include '../partials/footer.php'; ?>