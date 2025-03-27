<?php require '../layout/header.php'; ?>
<?php require '../../config/config.php'; ?>
<!-- ========== END HEADER ========== -->
<?php 
if(!isset($_SESSION['adminname'])){
    echo ("<script>setInterval(window.location.assign('".ADMINURL."/admin/login-admin.php'), 5000);</script>");
}
$genre = $conn->query("SELECT * FROM genre");
$genre->execute();

$allGenre = $genre->fetchAll(PDO::FETCH_OBJ);
?>
<!-- Categories Section -->
<div class="container-fluid content-space-2 content-space-lg-3">
    <div class="row">
        <?php require "../layout/sidebar.php" ?>
        <div class="col-lg-9 mb-3">
            <div class="container">
                <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Genres</li>
                    </ol>
                </nav>
                <div class="card shadow-md">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-6">
                                <h4 class="mt-3"><strong>Genres</strong></h4>
                            </div>
                            <div class="col-6 d-flex justify-content-end">
                                <a href="create-genre.php">
                                    <button class="btn btn-primary">+ Genre</button>
                                </a>
                            </div>
                        </div>
                    </div>
                    <!-- Table -->
                    <div class="div class=" table-responsive"">
                        <table class="table table-nowrap">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Name</th>
                                    <th scope="col"><i class="bi-toggles2"></i></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach($allGenre as $genre) : ?>
                                <tr>
                                    <th scope="row"><?= $genre->id; ?></th>
                                    <td><?= $genre->name; ?></td>
                                    <td>
                                        <a class="text-body" href="javascript:;" data-bs-toggle="tooltip"
                                            data-bs-placement="top" title="Remove member">
                                            <i class="bi-trash"></i>
                                        </a>
                                    </td>
                                </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                    <!-- End Table -->
                </div>
            </div>
        </div>
        <!-- End Col -->
    </div>
    <!-- End Row -->
</div>
<!-- End Categories Section -->

<?php require '../layout/footer.php'; ?>