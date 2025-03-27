<?php require 'layout/header.php'?>
<?php require '../config/config.php'?>
<!--==========END HEADER==========-->
<?php
if(!isset($_SESSION['adminname'])){
    echo ("<script>setInterval(window.location.assign('".ADMINURL."/admin/login-admin.php'), 5000);</script>");
}

// show
$shows = $conn->query("SELECT COUNT(*) AS show_count FROM shows");
$shows->execute();
$allShows = $shows->fetch(PDO::FETCH_OBJ);
// episode
$episodes = $conn->query("SELECT COUNT(*) AS episode_count FROM episodes");
$episodes->execute();
$allEpisodes = $episodes->fetch(PDO::FETCH_OBJ);
// genres
$genres = $conn->query("SELECT COUNT(*) AS genre_count FROM genre");
$genres->execute();
$allGenres = $genres->fetch(PDO::FETCH_OBJ);
// admin
$administrators = $conn->query("SELECT COUNT(*) AS admin_count FROM administrators");
$administrators->execute();
$allAdministrators = $administrators->fetch(PDO::FETCH_OBJ);
?>
<!-- Categories Section -->
<div class="container-fluid content-space-2 content-space-lg-3">
    <div class="row">
        <?php require './layout/sidebar.php'; ?>
        <div class="col-lg-9 mb-3">
            <div class="row g-3">
                <div class="col-sm-6 col-md-4 mb-3 mb-md-0">
                    <!-- Card -->
                    <a class="card card-bordered card-transition h-100" href="./show/shows.php">

                        <div class="card-body">
                            <div class="d-flex align-items-center mb-2">
                                <h4 class="card-title mb-0">Show</h4>
                                <img class="avatar avatar-xss ms-1" src="dist/svg/illustrations/top-vendor.svg"
                                    alt="Image Description" title="Top Vendor">
                            </div>
                            <p class="card-text text-body">No of Shows: <?= $allShows->show_count; ?>
                            </p>
                        </div>
                    </a>
                    <!-- End Card -->
                </div>
                <!-- End Col -->

                <div class="col-sm-6 col-md-4 mb-3 mb-md-0">
                    <!-- Card -->
                    <a class="card card-bordered card-transition h-100" href="./episode/episodes.php">

                        <div class="card-body">
                            <div class="d-flex align-items-center mb-2">
                                <h4 class="card-title mb-0">Episodes</h4>
                                <img class="avatar avatar-xss ms-1" src="dist/svg/illustrations/pro-account.svg"
                                    alt="Image Description" title="Top Vendor">
                            </div>
                            <p class="card-text text-body">No of Episodes: <?= $allEpisodes->episode_count; ?></p>
                        </div>
                    </a>
                    <!-- End Card -->
                </div>
                <!-- End Col -->

                <div class="col-sm-6 col-md-4">
                    <!-- Card -->
                    <a class="card card-bordered card-transition h-100" href="./genre/genres.php">

                        <div class="card-body">
                            <div class="d-flex align-items-center mb-2">
                                <h4 class="card-title mb-0">Genre</h4>
                                <img class="avatar avatar-xss ms-1" src="dist/svg/illustrations/pro-account.svg"
                                    alt="Image Description" title="Top Vendor">
                            </div>
                            <p class="card-text text-body">No of Genre: <?= $allGenres->genre_count; ?></p>
                        </div>
                    </a>
                    <!-- End Card -->
                </div>
                <div class="col-sm-6 col-md-4 ">
                    <!-- Card -->
                    <a class="card card-bordered card-transition h-100" href="./admin/admins.php">

                        <div class="card-body">
                            <div class="d-flex align-items-center mb-2">
                                <h4 class="card-title mb-0">Admin</h4>
                                <img class="avatar avatar-xss ms-1" src="dist/svg/illustrations/medal.svg"
                                    alt="Image Description" title="Top Vendor">
                            </div>
                            <p class="card-text text-body">No of Admin: <?= $allAdministrators->admin_count; ?></p>
                        </div>
                    </a>
                    <!-- End Card -->
                </div>
                <!-- End Col -->
            </div>
            <!-- End Row -->
        </div>
        <!-- End Col -->
    </div>
    <!-- End Row -->
</div>
<!-- End Categories Section -->

<?php require 'layout/footer.php' ?>