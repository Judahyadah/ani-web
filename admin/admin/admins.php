<?php require '../layout/header.php'; ?>
<?php require '../../config/config.php'; ?>
<!-- ========== END HEADER ========== -->
<?php 
if(!isset($_SESSION['adminname'])){
    echo ("<script>setInterval(window.location.assign('".ADMINURL."/admin/login-admin.php'), 5000);</script>");
}

$admin = $conn->query("SELECT * FROM administrators");
$admin->execute();

$allAdmin = $admin->fetchAll(PDO::FETCH_OBJ);
?>
<!-- Categories Section -->
<div class="container-fluid content-space-2 content-space-lg-3">
    <div class="row">
        <?php require '../layout/sidebar.php'; ?>
        <div class="col-lg-9 mb-3">
            <div class="container">
                <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Admin</li>
                    </ol>
                </nav>
                <div class="card shadow-md">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-6">
                                <h4 class="mt-3"><strong>Admin</strong></h4>
                            </div>
                            <div class="col-6 d-flex justify-content-end">
                                <a href="create-admin.php">
                                    <button class="btn btn-primary">+ Admin</button>
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
                                    <th scope="col">First</th>
                                    <th scope="col">Email</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach($allAdmin as $admin) : ?>
                                <tr>
                                    <th scope="row"><?= $admin->id; ?></th>
                                    <td><?= $admin->username; ?></td>
                                    <td><?= $admin->email; ?></td>
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