<?php
include 'partials/header.php';

$currentUserId = $_SESSION['userId'];



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
            <?php if ($currentUserId == $author['id']) : ?>
                <form action="editProfilePictureLogic.php" method="post" enctype="multipart/form-data">
                    <label for="avatarInput" style="cursor: pointer;">
                        <img src="images/<?= $author['avatar'] ?>" alt="Profile Picture">
                    </label>
                    <input type="file" name="avatar" id="avatarInput" style="display: none;" onchange="this.form.submit()">
                    <input type="hidden" name="id" value="<?= $author['id'] ?>">
                    <input type="hidden" name="previousAvatarName" value="<?= $author['avatar'] ?>">
                </form>
            <?php else : ?>
                <img src="images/<?= $author['avatar'] ?>">
            <?php endif ?>
        </div>
    </section>

    <section class="usernameProfilePage">
        <?php if ($currentUserId == $author['id']) : ?>
            <h1><a href="<?= ROOT_URL ?>authorProfileEdit.php?id=<?= $author['id'] ?>"><?= $author['username'] ?></a></h1>
        <?php else : ?>
            <h1><a href=""><?= $author['username'] ?></a></h1>
        <?php endif ?>
        <h2><?= $author['lastname'] ?> <?= $author['firstname'] ?></h2>
    </section>

    <section class="userInformationProfilePage">
        <h2><?= $author['about_me'] ?></h2>

        <div class="numberOfArticles">
            <h2>Paylaşılan Məqalə:</h2>
            <h2><?= mysqli_num_rows($articlesResult) ?></h2>
        </div>

        <div class="decimalBarProfilePage">
            <?php
            $author_id = $author['id'];
            $sumUpVotesQuery = "SELECT up_vote FROM articles WHERE author_id=$author_id";
            $sumUpVotesResult = mysqli_query($connection, $sumUpVotesQuery);
            $sumUpVote = 0;
            ?>
            <?php while($upVote = mysqli_fetch_assoc($sumUpVotesResult)) : ?>
                <?php $sumUpVote += $upVote['up_vote'] ?>
            <?php endwhile ?>

            <?php
            $sumDownVotesQuery = "SELECT down_vote FROM articles WHERE author_id=$author_id";
            $sumDownVotesResult = mysqli_query($connection, $sumDownVotesQuery);
            $sumDownVote = 0;
            ?>
            <?php while($downVote = mysqli_fetch_assoc($sumDownVotesResult)) : ?>
                <?php $sumDownVote += $downVote['down_vote'] ?>
            <?php endwhile ?>

            <?php
            $sumTotalVote = $sumUpVote + $sumDownVote;
            $upVotePercent = $sumTotalVote > 0 ? ($sumUpVote / $sumTotalVote) * 100 : 0;
            ?>

            <i class="uil uil-angle-double-up"></i>
            <h2><?= $sumUpVote ?></h2>

            <div class="decimalBar">
                <div class="upVote" style="width: <?= $upVotePercent ?>%;"></div>
            </div>

            <h2><?= $sumDownVote ?></h2>
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
                            <?php if ($currentUserId) : ?>
                                <div class="articleButtonsBody">
                                    <?php
                                    $article_id = $article['id'];
                                    $upVoteQuery = "SELECT * FROM up_votes WHERE article_id=$article_id AND author_id=$currentUserId";
                                    $upVoteResult = mysqli_query($connection, $upVoteQuery);
                                    $downVoteQuery = "SELECT * FROM down_votes WHERE article_id=$article_id AND author_id=$currentUserId";
                                    $downVoteResult = mysqli_query($connection, $downVoteQuery);
                                    $upVoted = mysqli_num_rows($upVoteResult) > 0;
                                    $downVoted = mysqli_num_rows($downVoteResult) > 0;
                                    ?>
                                    <a href="#" class="upVoteButton <?= $upVoted ? 'voted' : '' ?>" articleData_id="<?= $article['id'] ?>" authorData_id="<?= $currentUserId ?>"><i class="uil uil-angle-double-up"></i><span class="upVoteCount"><?= $article['up_vote'] ?></span></a>
                                    <a href="#" class="downVoteButton <?= $downVoted ? 'voted' : '' ?>" articleData_id="<?= $article['id'] ?>" authorData_id="<?= $currentUserId ?>"><i class="uil uil-angle-double-down"></i><span class="downVoteCount"><?= $article['down_vote'] ?></span></a>
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



<script src="<?= ROOT_URL ?>js/upVote.js"></script>
<script src="<?= ROOT_URL ?>js/downVote.js"></script>