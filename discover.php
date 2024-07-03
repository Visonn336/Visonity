<?php
include 'partials/header.php';



$articlesQuery = "SELECT * FROM articles ORDER BY date_time DESC";
$articlesResult = mysqli_query($connection, $articlesQuery);
?>



    <section class="searchBar">
        <form action="<?= ROOT_URL ?>search.php" method="GET" class="container searchBarContainer">
            <div>
                <i class="uil uil-search"></i>
                <input type="search" name="search" placeholder="Kəşf Et">
            </div>
            <button type="submit" name="submit" class="btn">Axtar</button>
        </form>
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