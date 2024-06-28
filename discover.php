<?php include 'partials/header.php'; ?>



    <section class="searchBar">
        <form action="" class="container searchBarContainer">
            <div>
                <i class="uil uil-search"></i>
                <input type="search" name="" placeholder="Kəşf Et">
            </div>
            <button type="submit" class="btn">Axtar</button>
        </form>
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



    <section class="categoryButtons">
        <div class="container categoryButtonsContainer">
            <a href="categoryArticles.php" class="featuredArticleCategoryButton articleCategoryButton">Texnologiya</a>
        </div>
    </section>



<?php include 'partials/footer.php'; ?>