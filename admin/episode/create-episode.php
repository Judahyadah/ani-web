<?php require '../layout/header.php'; ?>
<!-- ========== END HEADER ========== -->
<?php
if(!isset($_SESSION['adminname'])){
    echo ("<script>setInterval(window.location.assign('".ADMINURL."/admin/login-admin.php'), 5000);</script>");
}

?>
<div class="container-fluid content-space-2 content-space-lg-3">
    <?php require '../layout/alert.php' ?>
    <div class="row">
        <?php require '../layout/sidebar.php'; ?>
        <div class="col-lg-9 mb-3">
            <nav style="--bs-breadcrumb-divider: '/';" aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item"><a href="episodes.php">Episode</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Create Episode</li>
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
                                <label class="form-label" for="simpleName">Name</label>
                                <input type="text" class="form-control form-control-lg" name="name" id="simpleName"
                                    placeholder="eg. One Piece" aria-label="eg. One Piece" required>
                                <span class="invalid-feedback">Please enter a valid name.</span>
                            </div>
                            <!-- End Form -->

                            <!-- Form -->
                            <div class="mb-3">
                                <label class="form-label" for="simpleThumbnail">Thumbnail</label>
                                <input type="file" class="form-control form-control-lg" name="thumbnail"
                                    id="simpleThumbnail" placeholder="thumbnail" required>
                                <span class="invalid-feedback">Please enter a valid thumbnail .</span>
                            </div>
                            <!-- End Form -->

                            <div class="mb-3">
                                <label class="form-label">Video</label>
                                <input type="file" class="form-control form-control-lg" name="video" id="simpleVideo"
                                    placeholder="video" required>
                            </div>

                            <div class="mb-3">
                                <label class="form-label" for="exampleFormControlSelect1">Shows</label>
                                <select id="exampleFormControlSelect1" class="form-control" required>
                                    <option>Choose an option</option>
                                    <option>2</option>
                                </select>
                            </div>


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
</body>

<?php require '../layout/footer.php'; ?>