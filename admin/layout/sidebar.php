<div class="col-lg-3 mb-5 mb-lg-0 border-end border-bottom rounded-end">
    <!-- Navbar -->
    <div class="navbar-expand-lg">
        <!-- Navbar Toggle -->
        <div class="d-grid">
            <button type="button" class="navbar-toggler btn btn-white mb-3" data-bs-toggle="collapse"
                data-bs-target="#navbarVerticalNavMenuEg3" aria-label="Toggle navigation" aria-expanded="false"
                aria-controls="navbarVerticalNavMenuEg3">
                <span class="d-flex justify-content-between align-items-center">
                    <span class="text-dark">Menu</span>

                    <span class="navbar-toggler-default">
                        <i class="bi-list"></i>
                    </span>

                    <span class="navbar-toggler-toggled">
                        <i class="bi-x"></i>
                    </span>
                </span>
            </button>
        </div>
        <!-- End Navbar Toggle -->

        <!-- Navbar Collapse -->
        <div id="navbarVerticalNavMenuEg3" class="collapse navbar-collapse">
            <div id="shopNavCategories" class="nav nav-pills nav-vertical">

                <a class="nav-link" href="<?= ADMINURL?>/">
                    <i class="bi-house-fill nav-icon"></i> Home
                </a>

                <a class="nav-link" href="<?= ADMINURL?>/admin/admins.php">
                    <i class="bi-person-check-fill nav-icon"></i> Admin
                </a>

                <a class="nav-link" href="<?= ADMINURL?>/show/shows.php">
                    <i class="bi-tv nav-icon"></i> Show
                </a>

                <a class="nav-link" href="<?= ADMINURL?>/genre/genres.php">
                    <i class="bi-type-bold nav-icon"></i> Genre
                </a>

                <a class="nav-link" href="<?= ADMINURL?>/episode/episodes.php">
                    <i class="bi-eyeglasses nav-icon"></i> Episodes
                </a>


            </div>
        </div>
        <!-- End Navbar Collapse -->
    </div>
    <!-- End Navbar -->
</div>