<?php

include_once './auth_header.php';

if (isset($_SESSION['user'])) {
    Auth::logout();
}

if (isset($_POST['btn_login'])) {

    $request = new UserRequest($_POST);

    $user = User::login($connection, $request);

    if ($user) {

        Auth::setUser($user);

        redirect('dashboard');
    } else {
        $_SESSION['hasError'] = true;
    }
}

?>
<main class="form-signin login">
    <form method="POST" class="text-center login" action="<?php echo $_SERVER['PHP_SELF']; ?>">
        <img class="mb-4" src="assets/img/evsu.jpg" alt="" width="100">
        <h1 class="h3 mb-3 fw-normal">Login to your Account</h1>
        <hr>
        <?php if (isset($_SESSION['hasError'])) { ?>
            <div class="alert alert-danger alert-dismissible show fade">
                <div class="alert-body">
                    <button class="close" data-dismiss="alert">
                        <span>&times;</span>
                    </button>
                    Invalid credentials.
                </div>
            </div>
        <?php } ?>

        <div class="form-floating">
            <input type="email" class="form-control" id="floatingInput" name="email">
            <label for="floatingInput">Email address</label>
        </div>
        <div class="form-floating">
            <input type="password" class="form-control" id="floatingPassword" name="password">
            <label for="floatingPassword">Password</label>
        </div>


        <button class="w-100 btn btn-lg btn-primary" type="submit" name="btn_login">Sign in</button>
        <hr>
        <p class="mt-5 mb-3 text-muted">Doesn't have an account? <a href="register.php"> Create one.</a></p>
    </form>
</main>

<?php include './auth_footer.php'; ?>