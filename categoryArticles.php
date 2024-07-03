<?php
include 'partials/header.php';



if (isset($_GET['id'])) {
    $id = filter_var($_GET['id'], FILTER_SANITIZE_NUMBER_INT);
    $categoryQuery = "SELECT * FROM categories WHERE id=$id";
    $categoryResult = mysqli_query($connection, $categoryQuery);
    $category = mysqli_fetch_assoc($categoryResult);


    $articlesQuery = "SELECT * FROM articles WHERE category_id=$id";
    $articlesResult = mysqli_query($connection, $articlesQuery);

    $currentUserId = $_SESSION['userId'];

} else {
    header('location: ' . ROOT_URL . 'discover.php');
}
?>



    <section class="categoriesPage">
        <h2><?= $category['title'] ?></h2>
        <h4><?= $category['description'] ?></h4>
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
                    </div>
                    <div class="articleBody">
                        <h3><a href="<?= ROOT_URL ?>article.php?id=<?= $article['id'] ?>"><?= $article['title'] ?></a></h3>
                        <p><?= substr($article['body'], 0, 300) ?>...</p>
                    </div>
                </div>
            </article>
        <?php endwhile ?>
        </div>
    </section>



<?php include 'partials/footer.php'; ?>