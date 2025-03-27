<?php require '../layout/header.php'; ?>
<?php require '../../config/config.php'; ?>
<?php
    if(isset($_SESSION['adminname'])){
        header("location:" . ADMINURL);
    }

    if(isset($_POST['adminLogIn'])){
        if(empty($_POST['email']) OR empty($_POST['password'])){
            echo "<script>alert('one or more of the inputs are empty')</script>";
        } else{
            $email= $_POST['email'];
            $password = $_POST['password'];

            $login = $conn->query("SELECT * FROM administrators WHERE email='$email'");
            $login->execute();

            $fetch = $login->fetch(PDO::FETCH_ASSOC);

            if($login->rowCount() > 0){
                if(password_verify($password, $fetch['password'])){
                    // start session
                    $_SESSION['user_id'] = $fetch['id'];
                    $_SESSION['adminname'] = $fetch['username'];
                    $_SESSION['email'] = $fetch['password'];
                    $success = "Logged In";
                    echo ("<script>setInterval(window.location.assign('".ADMINURL."'), 5000);</script>");
                }else{
                    // echo "<script>alert('email or password is wrong')</script>";
                    $error = "email or password is wrong";
                }
            } else{
                // echo "<script>alert('email or password is wrong')</script>";
                $error = "email or password is wrong";
            }
        }
    }
?>


<!-- ========== END HEADER ========== -->
<div class="container-fluid content-space-2 content-space-lg-3">

    <!-- Form -->
    <div class="container content-space-2 content-space-lg-3">
        <?php require '../layout/alert.php'?>
        <div class="flex-grow-1 mx-auto" style="max-width: 28rem;">
            <!-- Heading -->
            <div class="text-center mb-5 mb-md-7">
                <h1 class="h2">Welcome back</h1>
                <p>Login to manage your account.</p>
            </div>
            <!-- End Heading -->

            <!-- Form -->
            <form class="js-validate needs-validation" action="login-admin.php" method="post" novalidate>
                <!-- Form -->
                <div class="mb-4">
                    <label class="form-label" for="signupSimpleLoginEmail">Your email</label>
                    <input type="email" class="form-control form-control-lg" name="email" id="signupSimpleLoginEmail"
                        placeholder="email@site.com" aria-label="email@site.com" required>
                    <span class="invalid-feedback">Please enter a valid email address.</span>
                </div>
                <!-- End Form -->

                <!-- Form -->
                <div class="mb-4">
                    <div class="d-flex justify-content-between align-items-center">
                        <label class="form-label" for="signupSimpleLoginPassword">Password</label>

                        <a class="form-label-link" href="../page-reset-password-simple.html">Forgot Password?</a>
                    </div>

                    <div class="input-group input-group-merge" data-hs-validation-validate-class>
                        <input type="password" class="js-toggle-password form-control form-control-lg" name="password"
                            id="signupSimpleLoginPassword" placeholder="8+ characters required"
                            aria-label="8+ characters required" required minlength="8" data-hs-toggle-password-options='{
                                "target": "#changePassTarget",
                                "defaultClass": "bi-eye-slash",
                                "showClass": "bi-eye",
                                "classChangeTarget": "#changePassIcon"
                            }'>
                        <a id="changePassTarget" class="input-group-append input-group-text" href="javascript:;">
                            <i id="changePassIcon" class="bi-eye"></i>
                        </a>
                    </div>

                    <span class="invalid-feedback">Please enter a valid password.</span>
                </div>
                <!-- End Form -->

                <div class="d-grid mb-3">
                    <button name="adminLogIn" class="btn btn-primary btn-lg">Log in</button>
                </div>

                <div class="text-center">
                    <p>Don't have an account yet? <a class="link" href="../page-signup-simple.html">Sign up here</a></p>
                </div>
            </form>
            <!-- End Form -->
        </div>
    </div>
    <!-- End Form -->

</div>


<?php require '../layout/footer.php'; ?>