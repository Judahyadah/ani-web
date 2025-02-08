<?php require "includes/header.php" ?>
<?php require "config/config.php";

$shows = $conn->query("SELECT * FROM shows LIMIT 3");
$shows->execute();
$allShows =$shows->fetchAll(PDO::FETCH_OBJ);

// trending show_source
$trendingShows =  $conn->query("SELECT shows.id AS id, shows.image AS image, shows.num_available AS num_available, shows.num_total AS num_total, shows.title AS title, shows.genre AS genre, shows.type AS type, COUNT(views.show_id) AS count_views FROM shows JOIN views ON shows.id = views.show_id GROUP BY(shows.id) ORDER BY views.show_id DESC");
$trendingShows->execute();
$allTrendingShows = $trendingShows->fetchAll(PDO::FETCH_OBJ);

// adventure shows
$adventureShows =  $conn->query("SELECT shows.id AS id, shows.image AS image, shows.num_available AS num_available, shows.num_total AS num_total, shows.title AS title, shows.genre AS genre, shows.type AS type, COUNT(views.show_id) AS count_views FROM shows JOIN views ON shows.id = views.show_id  WHERE shows.genre = 'adventure' GROUP BY(shows.id) ORDER BY views.show_id DESC");
$adventureShows->execute();
$allAdventureShows = $adventureShows->fetchAll(PDO::FETCH_OBJ);

// recently added shows
$recentlyAddedShows =  $conn->query("SELECT shows.id AS id, shows.image AS image, shows.num_available AS num_available, shows.num_total AS num_total, shows.title AS title, shows.genre AS genre, shows.type AS type, COUNT(views.show_id) AS count_views FROM shows JOIN views ON shows.id = views.show_id GROUP BY(shows.id) ORDER BY shows.created_at DESC");
$recentlyAddedShows->execute();
$allRecentlyAddedShows = $recentlyAddedShows->fetchAll(PDO::FETCH_OBJ);

// action shows
$actionShows =  $conn->query("SELECT shows.id AS id, shows.image AS image, shows.num_available AS num_available, shows.num_total AS num_total, shows.title AS title, shows.genre AS genre, shows.type AS type, COUNT(views.show_id) AS count_views FROM shows JOIN views ON shows.id = views.show_id  WHERE shows.genre = 'action' GROUP BY(shows.id) ORDER BY views.show_id DESC");
$actionShows->execute();
$allActionShows = $actionShows->fetchAll(PDO::FETCH_OBJ);

// for you shows
$forYouShows =  $conn->query("SELECT shows.id AS id, shows.image AS image, shows.num_available AS num_available, shows.num_total AS num_total, shows.title AS title, shows.genre AS genre, shows.type AS type, COUNT(views.show_id) AS count_views FROM shows JOIN views ON shows.id = views.show_id GROUP BY(shows.id) ORDER BY views.show_id DESC");
$forYouShows->execute();
$allForYouShows = $forYouShows->fetchAll(PDO::FETCH_OBJ);
?>

<!-- Hero Section Begin -->
<section class="hero">
    <div class="container">
        <div class="hero__slider owl-carousel">
            <?php foreach($allShows as $show) : ?>
            <div class="hero__items set-bg" data-setbg="img/live/<?php echo $show->image; ?>"
                style="max-height:552px; max-width:1140px;">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="hero__text">
                            <div class="label"><?php echo $show->genre; ?></div>
                            <h2><?php echo $show->title; ?></h2>
                            <p><?php echo $show->description; ?></p>
                            <a href="anime-watching.php?id<?php echo $show->id;?>"><span>Watch Now</span> <i
                                    class="fa fa-angle-right"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>
<!-- Hero Section End -->

<!-- Product Section Begin -->
<section class="product spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <div class="trending__product">
                    <div class="row">
                        <div class="col-lg-8 col-md-8 col-sm-8">
                            <div class="section-title">
                                <h4>Trending Now</h4>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-4">
                            <div class="btn__all">
                                <a href="#" class="primary-btn">View All <span class="arrow_right"></span></a>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <?php foreach($allTrendingShows as $trendingShow) : ?>
                        <div class="col-lg-4 col-md-6 col-sm-6">
                            <div class="product__item">
                                <div class="product__item__pic set-bg"
                                    data-setbg="img/trending/<?php echo $trendingShow->image; ?>">
                                    <div class="ep"><?php echo $trendingShow->num_available; ?> /
                                        <?php echo $trendingShow->num_total; ?></div>
                                    <div class="comment"><i class="fa fa-comments"></i> 11</div>
                                    <div class="view"><i class="fa fa-eye"></i>
                                        <?php echo $trendingShow->count_views; ?>
                                    </div>
                                </div>
                                <div class="product__item__text">
                                    <ul>
                                        <li><?php echo $trendingShow->genre; ?></li>
                                        <li><?php echo $trendingShow->type; ?></li>
                                    </ul>
                                    <h5><a
                                            href="anime-details.php?id=<?php echo $trendingShow->id; ?>"><?php echo $trendingShow->title; ?></a>
                                    </h5>
                                </div>
                            </div>
                        </div>
                        <?php endforeach; ?>
                    </div>
                </div>
                <div class="popular__product">
                    <div class="row">
                        <div class="col-lg-8 col-md-8 col-sm-8">
                            <div class="section-title">
                                <h4>Adventure Shows</h4>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-4">
                            <div class="btn__all">
                                <a href="#" class="primary-btn">View All <span class="arrow_right"></span></a>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <?php foreach($allAdventureShows as $adventureShow) : ?>
                        <div class="col-lg-4 col-md-6 col-sm-6">
                            <div class="product__item">
                                <div class="product__item__pic set-bg"
                                    data-setbg="img/popular/<?php echo $adventureShow->image; ?>">
                                    <div class="ep"><?php echo $adventureShow->num_available; ?> /
                                        <?php echo $adventureShow->num_total; ?></div>
                                    <div class="comment"><i class="fa fa-comments"></i> 11</div>
                                    <div class="view"><i class="fa fa-eye"></i>
                                        <?php echo $adventureShow->count_views; ?></div>
                                </div>
                                <div class="product__item__text">
                                    <ul>
                                        <li><?php echo $adventureShow->genre; ?></li>
                                        <li><?php echo $adventureShow->type; ?></li>
                                    </ul>
                                    <h5><a href="anime-details.php?id=<?php echo $adventureShow->id; ?>">
                                            <?php echo $adventureShow->title; ?></a></h5>
                                </div>
                            </div>
                        </div>
                        <?php endforeach; ?>
                    </div>
                </div>
                <div class="recent__product">
                    <div class="row">
                        <div class="col-lg-8 col-md-8 col-sm-8">
                            <div class="section-title">
                                <h4>Recently Added Shows</h4>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-4">
                            <div class="btn__all">
                                <a href="#" class="primary-btn">View All <span class="arrow_right"></span></a>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <?php foreach($allRecentlyAddedShows as $allAdventureShow) : ?>
                        <div class="col-lg-4 col-md-6 col-sm-6">
                            <div class="product__item">
                                <div class="product__item__pic set-bg"
                                    data-setbg="img/recent/<?php echo $allAdventureShow->image; ?>">
                                    <div class="ep"><?php echo $allAdventureShow->num_available; ?> /
                                        <?php echo $allAdventureShow->num_total; ?></div>
                                    <div class="comment"><i class="fa fa-comments"></i> 11</div>
                                    <div class="view"><i class="fa fa-eye"></i>
                                        <?php echo $allAdventureShow->count_views; ?>
                                    </div>
                                </div>
                                <div class="product__item__text">
                                    <ul>
                                        <li><?php echo $allAdventureShow->genre; ?></li>
                                        <li><?php echo $allAdventureShow->type; ?></li>
                                    </ul>
                                    <h5><a
                                            href="<?php echo APPURL; ?>anime-details.php?id=<?php echo $allAdventureShow->id; ?>"><?php echo $allAdventureShow->title; ?></a>
                                    </h5>
                                </div>
                            </div>
                        </div>
                        <?php endforeach; ?>
                    </div>
                </div>
                <div class="live__product">
                    <div class="row">
                        <div class="col-lg-8 col-md-8 col-sm-8">
                            <div class="section-title">
                                <h4>Live Action</h4>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-4">
                            <div class="btn__all">
                                <a href="#" class="primary-btn">View All <span class="arrow_right"></span></a>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <?php foreach($allActionShows as $actionShow) : ?>
                        <div class="col-lg-4 col-md-6 col-sm-6">
                            <div class="product__item">
                                <div class="product__item__pic set-bg"
                                    data-setbg="img/live/<?php echo $actionShow->image; ?>">
                                    <div class="ep"><?php echo $actionShow->num_available; ?> /
                                        <?php echo $actionShow->num_total; ?></div>
                                    <div class="comment"><i class="fa fa-comments"></i> 11</div>
                                    <div class="view"><i class="fa fa-eye"></i> <?php echo $actionShow->count_views; ?>
                                    </div>
                                </div>
                                <div class="product__item__text">
                                    <ul>
                                        <li><?php echo $actionShow->genre; ?></li>
                                        <li><?php echo $actionShow->type; ?></li>
                                    </ul>
                                    <h5><a
                                            href="<?php echo APPURL; ?>/anime-details.php?id?<?php echo $actionShow->id; ?>"><?php echo $actionShow->title; ?></a>
                                    </h5>
                                </div>
                            </div>
                        </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-8">
                <div class="product__sidebar">
                    <div class="product__sidebar__view">
                    </div>
                </div>
                <div class="product__sidebar__comment">
                    <div class="section-title">
                        <h5>For You</h5>
                    </div>
                    <?php foreach($allForYouShows as $forYouShow) : ?>
                    <div class="product__sidebar__comment__item">
                        <div class="product__sidebar__comment__item__pic">
                            <img src="img/<?php echo $forYouShow->image; ?>" alt="" height="130px" width="90px">
                        </div>
                        <div class="product__sidebar__comment__item__text">
                            <ul>
                                <li><?php echo $forYouShow->genre; ?></li>
                                <li><?php echo $forYouShow->type; ?></li>
                            </ul>
                            <h5><a
                                    href="<?php echo APPURL; ?>anime-details?id=<?php echo $forYouShow->id; ?>"><?php echo $forYouShow->title; ?></a>
                            </h5>
                            <span><i class="fa fa-eye"></i> <?php echo $forYouShow->count_views; ?> Views</span>
                        </div>
                    </div>
                    <?php endforeach ?>
                </div>
            </div>
        </div>
    </div>
    </div>
</section>
<!-- Product Section End -->

<?php require "includes/footer.php"; ?>