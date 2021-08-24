    <?php
    require_once './header.php';

    if (isset($_POST['user_btn_submit'])) {

        $request = new  UserRequest($_POST);

        $userCount = User::checkEmailDuplicate($connection, $request->email);

        if ($userCount == 0) {
            User::create($connection, $request);
            redirect('users');
        } else {
            $_SESSION['hasError'] = true;
        }
    }

    ?>
    <section class="section">
        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card mb-0">
                        <div class="card-body">
                            <h6 class="m-0">
                                <a href="users.php">Users</a>
                                <i style="font-size: small;" class="fa fa-chevron-right"></i> <small>Create User</small>
                            </h6>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row mt-4">
                <div class="col-12">
                    <div class="card card-primary">
                        <div class="card-body">
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
                            <form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>" class="needs-validation" novalidate>
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
                                <div class="form-group mb-3">
                                    <label for="email" class="form-label">Email</label>
                                    <input id="email" type="email" class="form-control" name="email" required>
                                    <div class="invalid-feedback">
                                        The field email is required.
                                    </div>
                                </div>
                                <?php if (Auth::getRole() == User::ADMIN) { ?>
                                    <div class="form-group mb-3">
                                        <label for="type" class="form-label">Type</label>
                                        <select class="form-select" name="type">
                                            <option>MANAGER</option>
                                            <option>CLIENT</option>
                                        </select>
                                    </div>
                                <?php } else { ?>
                                    <input type="hidden" name="type" value="<?php echo User::CLIENT ?>">
                                <?php } ?>
                                <div class="row mb-3">
                                    <div class="form-group col-6">
                                        <label for="password" class="d-block form-label">Password</label>
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
                                <div class="d-grid gap-2 d-md-flex justify-content-md-end mt-2">
                                    <a href="users.php" class="btn btn-link me-md-2 text-danger">Cancel</a>
                                    <button type="submit" class="btn btn-outline-primary me-md-2" name="user_btn_submit">Create</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <?php include './footer.php'; ?>