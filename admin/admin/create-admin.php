<?php require '../layout/header.php'; ?>
<?php require '../../config/config.php' ?>
<!-- ========== END HEADER ========== -->
<?php
if(!isset($_SESSION['adminname'])){
    echo ("<script>setInterval(window.location.assign('".ADMINURL."/admin/login-admin.php'), 5000);</script>");
}

if(isset($_POST['createAdmin'])){
    if(empty($_POST['email']) OR empty($_POST['username']) OR empty($_POST['password'])){
    echo "<script>
    alert('one or more of the inputs are empty')
    </script>";
    }
    else{
    $email = $_POST['email'];
    $username = $_POST['username'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    
    $insert = $conn->prepare("INSERT INTO administrators(email, username, password) VALUES(:email, :username, :password)");
    
    $insert->execute([
    ":email" =>$email,
    ":username" =>$username,
    ":password" =>$password,
    ]);
    $success = "$username has been signed up";
    header("Refresh: 5; url= admins.php");
    }
}
?>
<div class="container-fluid content-space-2 content-space-lg-3">
    <div class="row">
        <?php require '../layout/sidebar.php'; ?>
        <div class="col-lg-9 mb-3">
            <?php require '../layout/alert.php'; ?>
            <nav style="--bs-breadcrumb-divider: '/';" aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item"><a href="admins.php">Admin</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Create Admin</li>
                </ol>
            </nav>

            <div class="card border-0 shadow-md">
                <!-- Form -->
                <div class="content-space-2 ">
                    <div class="flex-grow-1 mx-auto" style="max-width: 28rem;">

                        <!-- Form -->
                        <form class="js-validate needs-validation" method="post" action="create-admin.php" novalidate>
                            <!-- Form -->
                            <div class="mb-3">
                                <label class="form-label" for="signupSimpleSignupEmail">Your email</label>
                                <input type="email" class="form-control form-control-lg" name="email"
                                    id="signupSimpleSignupEmail" placeholder="email@site.com"
                                    aria-label="email@site.com" required>
                                <span class="invalid-feedback">Please enter a valid email address.</span>
                            </div>
                            <!-- End Form -->

                            <!-- Form -->
                            <div class="mb-3">
                                <label class="form-label" for="signupSimpleSignupUsername">Username</label>
                                <input type="text" class="form-control form-control-lg" name="username"
                                    id="signupSimpleSignupUsername" placeholder="username" aria-label="username"
                                    required>
                                <span class="invalid-feedback">Please enter a valid username .</span>
                            </div>
                            <!-- End Form -->

                            <!-- Form -->
                            <div class="mb-3">
                                <label class="form-label" for="signupSimpleSignupPassword">Password</label>

                                <div class="input-group input-group-merge" data-hs-validation-validate-class>
                                    <input type="password" class="js-toggle-password form-control form-control-lg"
                                        name="password" id="signupSimpleSignupPassword"
                                        placeholder="8+ characters required" aria-label="8+ characters required"
                                        required data-hs-toggle-password-options='{
                                        "target": [".js-toggle-password-target-1"],
                                            "defaultClass": "bi-eye-slash",
                                            "showClass": "bi-eye",
                                            "classChangeTarget": ".js-toggle-passowrd-show-icon-1"
                                        }'>
                                    <a class="js-toggle-password-target-1 input-group-append input-group-text"
                                        href="javascript:;">
                                        <i class="js-toggle-passowrd-show-icon-1 bi-eye"></i>
                                    </a>
                                </div>

                                <span class="invalid-feedback">Your password is invalid. Please try again.</span>
                            </div>
                            <!-- End Form -->

                            <div class="d-grid mb-3">
                                <button type="submit" name="createAdmin" class="btn btn-primary btn-lg">Create</button>
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