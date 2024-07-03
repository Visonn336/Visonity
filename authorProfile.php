<?php
include 'partials/header.php';



if (isset($_GET['id'])) {
    $id = filter_var($_GET['id'], FILTER_SANITIZE_NUMBER_INT);
    $authorQuery = "SELECT * FROM users WHERE id=$id";
    $authorResult = mysqli_query($connection, $authorQuery);
    $author = mysqli_fetch_assoc($authorResult);

    $articlesQuery = "SELECT * FROM articles WHERE author_id=$id ORDER BY date_time DESC";
    $articlesResult = mysqli_query($connection, $articlesQuery);

} else {
    header('location: ' . ROOT_URL . 'discover.php');
}
?>



    <section class="profilePage">
        <div class="avatarProfilePage">
            <img src="images/<?= $author['avatar'] ?>">
        </div>
    </section>

    <section class="usernameProfilePage">
        <h1><a href="authorProfile.php"><?= $author['username'] ?></a></h1>
        <h2><?= $author['lastname'] ?> <?= $author['firstname'] ?></h2>
    </section>

    <section class="userInformationProfilePage">
        <h2>I am just a autistic, my friendo!</h2>

        <div class="numberOfArticles">
            <h2>Paylaşılan Məqalə:</h2>
            <h2><?= mysqli_num_rows($articlesResult) ?></h2>
        </div>

        <div class="decimalBarProfilePage">
            <i class="uil uil-angle-double-up"></i>
            <h2>23</h2>

            <div class="decimalBar">
                <div class="upVote"></div>
            </div>

            <h2>6</h2>
            <i class="uil uil-angle-double-down"></i>
        </div>
    </section>



    <section class="articles articlesExtraMargin">
        <div class="container articlesContainer">
            <?php while($article = mysqli_fetch_assoc($articlesResult)) : ?>

                <article class="article">
                    <div class="articleThumbnail">
                        <img src="images/<?= $article['thumbnail'] ?>">
                    </div>
                    <div class="articleInfo">
                        <div class="articleTopBar">
                            <div class="articleAuthorBody">
                                <?php
                                $authorId = $article['author_id'];
                                $authorQuery = "SELECT * FROM users WHERE id=$authorId";
                                $authorResult = mysqli_query($connection, $authorQuery);
                                $author = mysqli_fetch_assoc($authorResult);
                                ?>
                                <div class="articleAuthorAvatar">
                                    <img src="images/<?= $author['avatar'] ?>">
                                </div>
                                <div class="articleAuthorInfo">
                                    <h5><a href="<?= ROOT_URL ?>authorProfile.php?id=<?= $author['id'] ?>"><?= $author['username'] ?></a></h5>
                                    <small>
                                        <?= date("d.m.Y - H:i", strtotime($article['date_time'])) ?>
                                    </small>
                                </div>
                            </div>
                            <div class="articleButtonsBody">
                                <a href="upVote.php"><i class="uil uil-angle-double-up"></i></a>
                                <a href="downVote.php"><i class="uil uil-angle-double-down"></i></a>
                            </div>
                        </div>
                        <div class="articleBody">
                            <?php
                            $categoryId = $article['category_id'];
                            $categoryQuery = "SELECT * FROM categories WHERE id=$categoryId";
                            $categoryResult = mysqli_query($connection, $categoryQuery);
                            $category = mysqli_fetch_assoc($categoryResult);
                            ?>
                            <a href="<?= ROOT_URL ?>categoryArticles.php?id=<?= $category['id'] ?>" class="featuredArticleCategoryButton articleCategoryButton"><?= $category['title'] ?></a>
                            <h3><a href="<?= ROOT_URL ?>article.php?id=<?= $article['id'] ?>"><?= $article['title'] ?></a></h3>
                            <p><?= substr($article['body'], 0, 300) ?>...</p>
                        </div>
                    </div>
                </article>

            <?php endwhile ?>
        </div>
    </section>



<?php include 'partials/footer.php'; ?>