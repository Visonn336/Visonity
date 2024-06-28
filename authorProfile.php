<?php include 'partials/header.php'; ?>



    <section class="profilePage">
        <div class="avatarProfilePage">
            <img src="images/avatar1.png">
        </div>
    </section>

    <section class="usernameProfilePage">
        <h1><a href="authorProfile.php">Visonn336</a></h1>
        <h2>Abbasov Polad</h2>
    </section>

    <section class="userInformationProfilePage">
        <h2>I am just a autistic, my friendo!</h2>

        <div class="numberOfArticles">
            <h2>Paylaşılan Məqalə:</h2>
            <h2>8</h2>
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

            <article class="article">
                <div class="articleThumbnail">
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
                        <div class="articleButtonsBody">
                            <a href="upVote.php"><i class="uil uil-angle-double-up"></i></a>
                            <a href="downVote.php"><i class="uil uil-angle-double-down"></i></a>
                        </div>
                    </div>
                    <div class="articleBody">
                        <a href="categoryArticles.php" class="featuredArticleCategoryButton articleCategoryButton">Texnologiya</a>
                        <h3><a href="article.php">Lorem ipsum dolor sit amet consectetur.</a></h3>
                        <p>
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Atque, molestias quasi harum molestiae veniam exercitationem sunt reprehenderit beatae officiis quia facere quisquam inventore esse vitae nulla itaque et, placeat Lorem ipsum dolor, sit amet consectetur adipisicing elit. Alias, eveniet! Lorem ipsum dolor sit amet.
                        </p>
                    </div>
                </div>
            </article>

        </div>
    </section>



<?php include 'partials/footer.php'; ?>