<?php require '../layout/header.php'; ?>
<?php require '../../config/config.php'; ?>
<?php 
if(!isset($_SESSION['adminname'])){
    echo ("<script>setInterval(window.location.assign('".ADMINURL."/admin/login-admin.php'), 5000);</script>");
}

$show = $conn->query("SELECT * FROM shows");
$show->execute();

$allShow = $show->fetchAll(PDO::FETCH_OBJ);
?>
<!-- Categories Section -->
<div class="container-fluid content-space-2 content-space-lg-3">
    <?php require '../layout/alert.php'; ?>
    <div class="row">
        <?php require '../layout/sidebar.php'; ?>
        <div class="col-lg-9 mb-3">
            <div class="container">
                <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Shows</li>
                    </ol>
                </nav>
                <div class="card shadow-md" style="overflow: auto;">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-6">
                                <h4 class="mt-3"><strong>Shows</strong></h4>
                            </div>
                            <div class="col-6 d-flex justify-content-end">
                                <a href="create-show.php">
                                    <button class="btn btn-primary">+ Show</button>
                                </a>
                            </div>
                        </div>
                    </div>
                    <!-- Table -->
                    <div class="card-body " table-responsive"">
                        <table class="table table-nowrap ">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Title</th>
                                    <th scope="col">Image</th>
                                    <th scope="col">Type</th>
                                    <th scope="col">Date Aired</th>
                                    <th scope="col">Genre</th>
                                    <th scope="col">Num Available</th>
                                    <th scope="col">Num total</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Created At</th>
                                    <th scope="col"><i class="bi-toggles2"></i></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach($allShow as $show) : ?>
                                <tr>
                                    <th scope="row"><?= $show->id; ?></th>
                                    <td><?= $show->title; ?></td>
                                    <td><img style="height: 70px; width: 70px;"
                                            src="<?php echo APPURL ?>img/<?= $show->image; ?>" alt=""></td>
                                    <td><?= $show->type; ?></td>
                                    <td><?= $show->date_aired; ?></td>
                                    <td><?= $show->genre; ?></td>
                                    <td><?= $show->num_available; ?></td>
                                    <td><?= $show->num_total; ?></td>
                                    <td><?= $show->status; ?></td>
                                    <td><?= $show->created_at; ?></td>
                                    <td>
                                        <a class="text-body" href="delete-show.php?id=<?= $show->id; ?>"
                                            data-bs-toggle="tooltip" data-bs-placement="top" title="Remove member">
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
</body>

<?php require '../layout/footer.php'; ?>