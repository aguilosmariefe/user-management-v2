<nav class="navbar navbar-expand-lg navbar-light bg-primary">
    <div class="container ">
        <a class="navbar-brand text-light" href="#">User Management</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link text-light active" aria-current="page" href="dashboard.php">Dashboard</a>
                </li>
                <?php if (can([User::ADMIN, User::MANAGER], Auth::getRole())) { ?>
                    <li class="nav-item">
                        <a class="nav-link text-light" href="users.php">Users</a>
                    </li>
                <?php } ?>
            </ul>
            <div class="dropdown">
                <a class="nav-link dropdown-toggle text-white" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    <!-- <img src="assets/img/user.png" class="rounded-circle" width="40px"> -->
                    <i style="font-size: 24px;" class="fa fa-user"></i>
                </a>
                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                    <li><a class="dropdown-item" href="index.php">Logout</a></li>
                </ul>
            </div>
        </div>
    </div>
</nav>