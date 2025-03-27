<?php require '../layout/header.php'; ?>
<!-- ========== END HEADER ========== -->
<?php
if(!isset($_SESSION['adminname'])){
    echo ("<script>setInterval(window.location.assign('".ADMINURL."/admin/login-admin.php'), 5000);</script>");
}
?>
<div class="container-fluid content-space-2 content-space-lg-3">
    <div class="row">
        <div class="col-lg-3 mb-5 mb-lg-0 border-right">
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

                        <a class="nav-link" href="../index.php">
                            <i class="bi-house-fill nav-icon"></i> Home
                        </a>

                        <a class="nav-link" href="../admin/admin.php">
                            <i class="bi-person-check-fill nav-icon"></i> Admin
                        </a>

                        <a class="nav-link" href="../show/shows.php">
                            <i class="bi-tv nav-icon"></i> Show
                        </a>

                        <a class="nav-link" href="genre/genres.php">
                            <i class="bi-type-bold nav-icon"></i> Genre
                        </a>

                        <a class="nav-link" href="../episode/episodes.php">
                            <i class="bi-eyeglasses nav-icon"></i> Episodes
                        </a>


                    </div>
                </div>
                <!-- End Navbar Collapse -->
            </div>
            <!-- End Navbar -->
        </div>
        <div class="col-lg-9 mb-3">
            <nav style="--bs-breadcrumb-divider: '/';" aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item"><a href="genres.php">Genre</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Create Genre</li>
                </ol>
            </nav>

            <div class="card border-0 shadow-md">
                <!-- Form -->
                <div class="content-space-2 ">
                    <div class="flex-grow-1 mx-auto" style="max-width: 28rem;">

                        <!-- Form -->
                        <form class="js-validate needs-validation" novalidate>
                            <!-- Form -->
                            <div class="mb-3">
                                <label class="form-label" for="signupSimpleSignupName">Name</label>
                                <input type="text" class="form-control form-control-lg" name="name"
                                    id="signupSimpleSignupName" placeholder="Input Genre eg 'Action'" aria-label="name"
                                    required>
                                <span class="invalid-feedback">Please enter a valid name .</span>
                            </div>
                            <!-- End Form -->

                            <div class="d-grid mb-3">
                                <button type="submit" class="btn btn-primary btn-lg">Create</button>
                            </div>

                        </form>
                        <!-- End Form -->
                    </div>
                </div>
                <!-- End Form -->
            </div>

        </div>
        <!-- End Col -->
    </div>
    <!-- End Row -->
</div>
<?php require '../layout/footer.php'; ?>