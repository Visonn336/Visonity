<?php
include 'partials/header.php';



$articlesQuery = "SELECT * FROM articles ORDER BY date_time DESC";
$articlesResult = mysqli_query($connection, $articlesQuery);

$currentUserId = $_SESSION['userId'];
?>



    <section class="articleTopExtraMargin">
        <div class="container articleContainer">

            <h1 class="Top1">#1</h1>

            <article class="articleTop1">
                <div class="articleTopThumbnail">
                    <img src="images/blog3.jpg">
                </div>
                <div class="articleInfo">
                    <div class="articleTopBar">
                        <div class="articleAuthorBody">
                            <div class="articleAuthorAvatar">
                                <img src="images/avatar1.png">
                            </div>
                            <div class="articleAuthorInfo">
                                <h5><a href="authorProfile.php">By: Plato Dostoyevski</a></h5>
                                <small>23.05.2024 - 17:36</small>
                            </div>
                        </div>
                        <div class="articleButtonsBody Top1ButtonsBody">
                            <a href="upVote.php"><i class="uil uil-angle-double-up"></i></a>
                            <a href="downVote.php"><i class="uil uil-angle-double-down"></i></a>
                        </div>
                    </div>
                    <div class="articleBody">
                        <a href="categoryArticles.php" class="featuredArticleCategoryButton Top1CategoryButton">Texnologiya</a>
                        <h3><a href="article.php">Lorem ipsum dolor sit amet consectetur.</a></h3>
                        <p>
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Atque, molestias quasi harum molestiae veniam exercitationem sunt reprehenderit beatae officiis quia facere quisquam inventore esse vitae nulla itaque et, placeat Lorem ipsum dolor, sit amet consectetur adipisicing elit. Alias, eveniet! Lorem ipsum dolor sit amet.
                        </p>
                    </div>
                </div>
            </article>

            <h1 class="Top2">#2</h1>

            <article class="articleTop2">
                <div class="articleTopThumbnail">
                    <img src="images/blog3.jpg">
                </div>
                <div class="articleInfo">
                    <div class="articleTopBar">
                        <div class="articleAuthorBody">
                            <div class="articleAuthorAvatar">
                                <img src="images/avatar1.png">
                            </div>
                            <div class="articleAuthorInfo">
                                <h5><a href="authorProfile.php">By: Plato Dostoyevski</a></h5>
                                <small>23.05.2024 - 17:36</small>
                            </div>
                        </div>
                        <div class="articleButtonsBody Top2ButtonsBody">
                            <a href="upVote.php"><i class="uil uil-angle-double-up"></i></a>
                            <a href="downVote.php"><i class="uil uil-angle-double-down"></i></a>
                        </div>
                    </div>
                    <div class="articleBody">
                        <a href="categoryArticles.php" class="featuredArticleCategoryButton Top2CategoryButton">Texnologiya</a>
                        <h3><a href="article.php">Lorem ipsum dolor sit amet consectetur.</a></h3>
                        <p>
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Atque, molestias quasi harum molestiae veniam exercitationem sunt reprehenderit beatae officiis quia facere quisquam inventore esse vitae nulla itaque et, placeat Lorem ipsum dolor, sit amet consectetur adipisicing elit. Alias, eveniet! Lorem ipsum dolor sit amet.
                        </p>
                    </div>
                </div>
            </article>

            <h1 class="Top3">#3</h1>

            <article class="articleTop3">
                <div class="articleTopThumbnail">
                    <img src="images/blog3.jpg">
                </div>
                <div class="articleInfo">
                    <div class="articleTopBar">
                        <div class="articleAuthorBody">
                            <div class="articleAuthorAvatar">
                                <img src="images/avatar1.png">
                            </div>
                            <div class="articleAuthorInfo">
                                <h5><a href="authorProfile.php">By: Plato Dostoyevski</a></h5>
                                <small>23.05.2024 - 17:36</small>
                            </div>
                        </div>
                        <div class="articleButtonsBody Top3ButtonsBody">
                            <a href="upVote.php"><i class="uil uil-angle-double-up"></i></a>
                            <a href="downVote.php"><i class="uil uil-angle-double-down"></i></a>
                        </div>
                    </div>
                    <div class="articleBody">
                        <a href="categoryArticles.php" class="featuredArticleCategoryButton Top3CategoryButton">Texnologiya</a>
                        <h3><a href="article.php">Lorem ipsum dolor sit amet consectetur.</a></h3>
                        <p>
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Atque, molestias quasi harum molestiae veniam exercitationem sunt reprehenderit beatae officiis quia facere quisquam inventore esse vitae nulla itaque et, placeat Lorem ipsum dolor, sit amet consectetur adipisicing elit. Alias, eveniet! Lorem ipsum dolor sit amet.
                        </p>
                    </div>
                </div>
            </article>

            
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