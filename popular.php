<?php
include 'partials/header.php';



$articlesQuery = "SELECT * FROM articles ORDER BY up_vote DESC LIMIT 18446744073709551615 OFFSET 3";
$articlesResult = mysqli_query($connection, $articlesQuery);

$currentUserId = $_SESSION['userId'];
?>



    <section class="articleTopExtraMargin">
        <div class="container articleContainer">

            <h1 class="Top1">#1</h1>

            <article class="articleTop1">
                <?php
                $top1Query = "SELECT * FROM articles ORDER BY up_vote DESC LIMIT 1";
                $top1Result = mysqli_query($connection, $top1Query);
                $top1 = mysqli_fetch_assoc($top1Result)
                ?>
                <div class="articleTopThumbnail">
                    <img src="images/<?= $top1['thumbnail'] ?>">
                </div>
                <div class="articleInfo">
                    <div class="articleTopBar">
                        <div class="articleAuthorBody">
                            <?php
                            $authorId = $top1['author_id'];
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
                                    <?= date("d.m.Y - H:i", strtotime($top1['date_time'])) ?>
                                </small>
                            </div>
                        </div>
                        <?php if ($currentUserId) : ?>
                            <div class="articleButtonsBody Top1ButtonsBody">
                                <?php
                                $article_id = $top1['id'];
                                $upVoteQuery = "SELECT * FROM up_votes WHERE article_id=$article_id AND author_id=$currentUserId";
                                $upVoteResult = mysqli_query($connection, $upVoteQuery);
                                $downVoteQuery = "SELECT * FROM down_votes WHERE article_id=$article_id AND author_id=$currentUserId";
                                $downVoteResult = mysqli_query($connection, $downVoteQuery);
                                ?>
                                <?php if (mysqli_num_rows($upVoteResult) == 0) : ?>
                                    <a href="<?= ROOT_URL ?>upVote.php?article_id=<?= $top1['id'] ?>&author_id=<?= $currentUserId ?>"><i class="uil uil-angle-double-up"></i></a>
                                <?php else : ?>
                                    <a href="<?= ROOT_URL ?>upVoteUndo.php?article_id=<?= $top1['id'] ?>&author_id=<?= $currentUserId ?>"><i class="uil uil-angle-double-up"></i></a>
                                <?php endif ?>
                                <?php if (mysqli_num_rows($downVoteResult) == 0) : ?>
                                    <a href="<?= ROOT_URL ?>downVote.php?article_id=<?= $top1['id'] ?>&author_id=<?= $currentUserId ?>"><i class="uil uil-angle-double-down"></i></a>
                                <?php else : ?>
                                    <a href="<?= ROOT_URL ?>downVoteUndo.php?article_id=<?= $top1['id'] ?>&author_id=<?= $currentUserId ?>"><i class="uil uil-angle-double-down"></i></a>
                                <?php endif ?>
                            </div>
                        <?php endif ?>
                    </div>
                    <div class="articleBody">
                        <?php
                        $categoryId = $top1['category_id'];
                        $categoryQuery = "SELECT * FROM categories WHERE id=$categoryId";
                        $categoryResult = mysqli_query($connection, $categoryQuery);
                        $category = mysqli_fetch_assoc($categoryResult);
                        ?>
                        <a href="<?= ROOT_URL ?>categoryArticles.php?id=<?= $category['id'] ?>" class="featuredArticleCategoryButton Top1CategoryButton"><?= $category['title'] ?></a>
                        <h3><a href="<?= ROOT_URL ?>article.php?id=<?= $top1['id'] ?>"><?= $top1['title'] ?></a></h3>
                        <p><?= substr($top1['body'], 0, 300) ?>...</p>
                    </div>
                </div>
            </article>

            <h1 class="Top2">#2</h1>

            <article class="articleTop2">
                <?php
                $top2Query = "SELECT * FROM articles ORDER BY up_vote DESC LIMIT 1 OFFSET 1";
                $top2Result = mysqli_query($connection, $top2Query);
                $top2 = mysqli_fetch_assoc($top2Result)
                ?>
                <div class="articleTopThumbnail">
                    <img src="images/<?= $top2['thumbnail'] ?>">
                </div>
                <div class="articleInfo">
                    <div class="articleTopBar">
                        <div class="articleAuthorBody">
                            <?php
                            $authorId = $top2['author_id'];
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
                                    <?= date("d.m.Y - H:i", strtotime($top2['date_time'])) ?>
                                </small>
                            </div>
                        </div>
                        <?php if ($currentUserId) : ?>
                            <div class="articleButtonsBody Top2ButtonsBody">
                                <?php
                                $article_id = $top2['id'];
                                $upVoteQuery = "SELECT * FROM up_votes WHERE article_id=$article_id AND author_id=$currentUserId";
                                $upVoteResult = mysqli_query($connection, $upVoteQuery);
                                $downVoteQuery = "SELECT * FROM down_votes WHERE article_id=$article_id AND author_id=$currentUserId";
                                $downVoteResult = mysqli_query($connection, $downVoteQuery);
                                ?>
                                <?php if (mysqli_num_rows($upVoteResult) == 0) : ?>
                                    <a href="<?= ROOT_URL ?>upVote.php?article_id=<?= $top2['id'] ?>&author_id=<?= $currentUserId ?>"><i class="uil uil-angle-double-up"></i></a>
                                <?php else : ?>
                                    <a href="<?= ROOT_URL ?>upVoteUndo.php?article_id=<?= $top2['id'] ?>&author_id=<?= $currentUserId ?>"><i class="uil uil-angle-double-up"></i></a>
                                <?php endif ?>
                                <?php if (mysqli_num_rows($downVoteResult) == 0) : ?>
                                    <a href="<?= ROOT_URL ?>downVote.php?article_id=<?= $top2['id'] ?>&author_id=<?= $currentUserId ?>"><i class="uil uil-angle-double-down"></i></a>
                                <?php else : ?>
                                    <a href="<?= ROOT_URL ?>downVoteUndo.php?article_id=<?= $top2['id'] ?>&author_id=<?= $currentUserId ?>"><i class="uil uil-angle-double-down"></i></a>
                                <?php endif ?>
                            </div>
                        <?php endif ?>
                    </div>
                    <div class="articleBody">
                        <?php
                        $categoryId = $top2['category_id'];
                        $categoryQuery = "SELECT * FROM categories WHERE id=$categoryId";
                        $categoryResult = mysqli_query($connection, $categoryQuery);
                        $category = mysqli_fetch_assoc($categoryResult);
                        ?>
                        <a href="<?= ROOT_URL ?>categoryArticles.php?id=<?= $category['id'] ?>" class="featuredArticleCategoryButton Top2CategoryButton"><?= $category['title'] ?></a>
                        <h3><a href="<?= ROOT_URL ?>article.php?id=<?= $top2['id'] ?>"><?= $top2['title'] ?></a></h3>
                        <p><?= substr($top2['body'], 0, 300) ?>...</p>
                    </div>
                </div>
            </article>

            <h1 class="Top3">#3</h1>

            <article class="articleTop3">
                <?php
                $top3Query = "SELECT * FROM articles ORDER BY up_vote DESC LIMIT 1 OFFSET 2";
                $top3Result = mysqli_query($connection, $top3Query);
                $top3 = mysqli_fetch_assoc($top3Result)
                ?>
                <div class="articleTopThumbnail">
                    <img src="images/<?= $top3['thumbnail'] ?>">
                </div>
                <div class="articleInfo">
                    <div class="articleTopBar">
                        <div class="articleAuthorBody">
                            <?php
                            $authorId = $top3['author_id'];
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
                                    <?= date("d.m.Y - H:i", strtotime($top3['date_time'])) ?>
                                </small>
                            </div>
                        </div>
                        <?php if ($currentUserId) : ?>
                            <div class="articleButtonsBody Top3ButtonsBody">
                                <?php
                                $article_id = $top3['id'];
                                $upVoteQuery = "SELECT * FROM up_votes WHERE article_id=$article_id AND author_id=$currentUserId";
                                $upVoteResult = mysqli_query($connection, $upVoteQuery);
                                $downVoteQuery = "SELECT * FROM down_votes WHERE article_id=$article_id AND author_id=$currentUserId";
                                $downVoteResult = mysqli_query($connection, $downVoteQuery);
                                ?>
                                <?php if (mysqli_num_rows($upVoteResult) == 0) : ?>
                                    <a href="<?= ROOT_URL ?>upVote.php?article_id=<?= $top3['id'] ?>&author_id=<?= $currentUserId ?>"><i class="uil uil-angle-double-up"></i></a>
                                <?php else : ?>
                                    <a href="<?= ROOT_URL ?>upVoteUndo.php?article_id=<?= $top3['id'] ?>&author_id=<?= $currentUserId ?>"><i class="uil uil-angle-double-up"></i></a>
                                <?php endif ?>
                                <?php if (mysqli_num_rows($downVoteResult) == 0) : ?>
                                    <a href="<?= ROOT_URL ?>downVote.php?article_id=<?= $top3['id'] ?>&author_id=<?= $currentUserId ?>"><i class="uil uil-angle-double-down"></i></a>
                                <?php else : ?>
                                    <a href="<?= ROOT_URL ?>downVoteUndo.php?article_id=<?= $top3['id'] ?>&author_id=<?= $currentUserId ?>"><i class="uil uil-angle-double-down"></i></a>
                                <?php endif ?>
                            </div>
                        <?php endif ?>
                    </div>
                    <div class="articleBody">
                        <?php
                        $categoryId = $top3['category_id'];
                        $categoryQuery = "SELECT * FROM categories WHERE id=$categoryId";
                        $categoryResult = mysqli_query($connection, $categoryQuery);
                        $category = mysqli_fetch_assoc($categoryResult);
                        ?>
                        <a href="<?= ROOT_URL ?>categoryArticles.php?id=<?= $category['id'] ?>" class="featuredArticleCategoryButton Top3CategoryButton"><?= $category['title'] ?></a>
                        <h3><a href="<?= ROOT_URL ?>article.php?id=<?= $top3['id'] ?>"><?= $top3['title'] ?></a></h3>
                        <p><?= substr($top3['body'], 0, 300) ?>...</p>
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
                            <?php if ($currentUserId) : ?>
                                <div class="articleButtonsBody">
                                    <?php
                                    $article_id = $article['id'];
                                    $upVoteQuery = "SELECT * FROM up_votes WHERE article_id=$article_id AND author_id=$currentUserId";
                                    $upVoteResult = mysqli_query($connection, $upVoteQuery);
                                    $downVoteQuery = "SELECT * FROM down_votes WHERE article_id=$article_id AND author_id=$currentUserId";
                                    $downVoteResult = mysqli_query($connection, $downVoteQuery);
                                    ?>
                                    <?php if (mysqli_num_rows($upVoteResult) == 0) : ?>
                                        <a href="<?= ROOT_URL ?>upVote.php?article_id=<?= $article['id'] ?>&author_id=<?= $currentUserId ?>"><i class="uil uil-angle-double-up"></i></a>
                                    <?php else : ?>
                                        <a href="<?= ROOT_URL ?>upVoteUndo.php?article_id=<?= $article['id'] ?>&author_id=<?= $currentUserId ?>"><i class="uil uil-angle-double-up"></i></a>
                                    <?php endif ?>
                                    <?php if (mysqli_num_rows($downVoteResult) == 0) : ?>
                                        <a href="<?= ROOT_URL ?>downVote.php?article_id=<?= $article['id'] ?>&author_id=<?= $currentUserId ?>"><i class="uil uil-angle-double-down"></i></a>
                                    <?php else : ?>
                                        <a href="<?= ROOT_URL ?>downVoteUndo.php?article_id=<?= $article['id'] ?>&author_id=<?= $currentUserId ?>"><i class="uil uil-angle-double-down"></i></a>
                                    <?php endif ?>
                                </div>
                            <?php endif ?>
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