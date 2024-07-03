<?php
include 'partials/header.php';


$featuredQuery = "SELECT * FROM articles WHERE is_featured=1";
$featuredResult = mysqli_query($connection, $featuredQuery);
$featured = mysqli_fetch_assoc($featuredResult);


$articlesQuery = "SELECT * FROM articles ORDER BY date_time DESC";
$articlesResult = mysqli_query($connection, $articlesQuery);

$currentUserId = $_SESSION['userId'];
?>


    <?php if (mysqli_num_rows($featuredResult) == 1) : ?>
        <section class="featured">
            <div class="container featuredContainer">
                <div class="featuredArticleThumbnail">
                    <img src="images/<?= $featured['thumbnail'] ?>">
                </div>
                <div class="featuredArticleAuthorBody">
                    <?php
                    $authorId = $featured['author_id'];
                    $authorQuery = "SELECT * FROM users WHERE id=$authorId";
                    $authorResult = mysqli_query($connection, $authorQuery);
                    $author = mysqli_fetch_assoc($authorResult);
                    ?>
                    <div class="featuredArticleAuthorAvatar">
                        <img src="images/<?= $author['avatar'] ?>">
                    </div>
                    <div class="featuredArticleAuthorInfo">
                        <h5><a href="<?= ROOT_URL ?>authorProfile.php?id=<?= $author['id'] ?>"><?= $author['username'] ?></a></h5>
                        <small>
                            <?= date("d.m.Y - H:i", strtotime($featured['date_time'])) ?>
                        </small>
                    </div>
                </div>
                <div class="featuredArticleButtonsBody">
                    <a href="<?= ROOT_URL ?>upVote.php?article_id=<?= $featured['id'] ?>&author_id=<?= $currentUserId ?>"><i class="uil uil-angle-double-up"></i></a>
                    <a href="<?= ROOT_URL ?>downVote.php?article_id=<?= $featured['id'] ?>&author_id=<?= $currentUserId ?>"><i class="uil uil-angle-double-down"></i></a>
                </div>
                <div class="featuredArticleBody">
                    <?php
                    $categoryId = $featured['category_id'];
                    $categoryQuery = "SELECT * FROM categories WHERE id=$categoryId";
                    $categoryResult = mysqli_query($connection, $categoryQuery);
                    $category = mysqli_fetch_assoc($categoryResult);
                    ?>
                    <a href="<?= ROOT_URL ?>categoryArticles.php?id=<?= $category['id'] ?>" class="featuredArticleCategoryButton"><?= $category['title'] ?></a>
                    <h2><a href="<?= ROOT_URL ?>article.php?id=<?= $featured['id'] ?>"><?= $featured['title'] ?></a></h2>
                    <p><?= substr($featured['body'], 0, 350) ?>...</p>
                </div>
            </div>
        </section>
    <?php endif ?>



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
                                <a href="<?= ROOT_URL ?>upVote.php?article_id=<?= $article['id'] ?>&author_id=<?= $currentUserId ?>"><i class="uil uil-angle-double-up"></i></a>
                                <a href="<?= ROOT_URL ?>downVote.php?article_id=<?= $article['id'] ?>&author_id=<?= $currentUserId ?>"><i class="uil uil-angle-double-down"></i></a>
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