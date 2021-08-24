<?php
include_once './auth_header.php';

if (isset($_POST['user_btn_submit'])) {

    $request = new  UserRequest($_POST);

    $userCount = User::checkEmailDuplicate($connection, $request->email);

    if ($userCount == 0) {
        $user =  User::create($connection, $request);

        Auth::setUser($user);

        echo "<script> window.location.replace('./dashboard.php')</script>";
    } else {
        $_SESSION['hasError'] = true;
    }
}
?>

<main class="form-signin register">
    <form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>" class="needs-validation" novalidate>
        <div class="text-center">
            <img class="mb-4 text-center" src="assets/img/evsu.jpg" alt="" width="100">
            <h1 class="h3 mb-3 fw-normal">Sign Up an Account</h1>
            <hr>
        </div>
        <?php if (isset($_SESSION['hasError'])) { ?>
            <div class="alert alert-danger alert-dismissible show fade">
                <div class="alert-body">
                    <button class="close" data-dismiss="alert">
                        <span>&times;</span>
                    </button>
                    Email alreday exists.
                </div>
            </div>
        <?php } ?>
        <div class="row mb-3">
            <div class="form-group col-6">
                <label for="firstname" class="form-label">First Name</label>
                <input id="firstname" type="text" class="form-control" name="firstname" required autofocus>
                <div class="invalid-feedback">
                    The field firstname is required.
                </div>
            </div>
            <div class="form-group col-6">
                <label for="last_name" class="form-label">Last Name</label>
                <input id="last_name" type="text" class="form-control" name="lastname" required>
                <div class="invalid-feedback">
                    The field lastname is required.
                </div>
            </div>
        </div>
        <div class="form-group my-3">
            <label for="email" class="form-label">Email</label>
            <input id="email" type="email" class="form-control" name="email" required>
            <div class="invalid-feedback">
                The field email is required.
            </div>
        </div>
        <div class="row mb-3">
            <div class="form-group col-6">
                <label for="password" class="d-block form-label ">Password</label>
                <input id="password" type="password" class="form-control pwstrength" data-indicator="pwindicator" name="password" required>
                <div id="pwindicator" class="pwindicator">
                    <div class="bar"></div>
                    <div class="label"></div>
                </div>
                <div class="invalid-feedback">
                    The field password is required.
                </div>
            </div>
            <div class="form-group col-6">
                <label for="password2" class="d-block form-label">Password Confirmation</label>
                <input id="password2" type="password" class="form-control" name="password-confirm" required>
                <div class="invalid-feedback">
                    The field password should match.
                </div>
            </div>
        </div>


        <div class="form-group mb-3">
            <button type="submit" class="btn btn-primary  w-100" name="user_btn_submit">
                Register
            </button>
        </div>
        <hr>
        <div class="mb-4 text-muted text-center">
            Already Registered? <a href="./index.php">Login</a>
        </div>
    </form>
</main>
<?php include './auth_footer.php';
