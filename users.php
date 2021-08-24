<?php
include './header.php';
canView([User::ADMIN, User::MANAGER], Auth::getRole());
if (Auth::getRole() == User::ADMIN) {
    $users = User::all($connection);
} else {
    $users = User::clients($connection);
}

if (isset($_GET['id'])) {
    User::deleteById($connection, $_GET['id']);
    redirect('users');
}
?>

<section class="section">
    <div class="section-body">
        <div class="row">
            <div class="col-12">
                <div class="card mb-0">
                    <div class="card-body d-flex justify-content-between align-items-center">
                        <h6 class="m-0"><i data-feather="users" data-width="16"></i> Users</h6>

                        <a href="./create_user.php" class="btn btn-outline-primary">Create User</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mt-4">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table " id="table-1">
                                <thead>
                                    <tr>
                                        <th>Fullname</th>
                                        <th>Email</th>
                                        <th>Type</th>
                                        <th>Password</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($users as $user) {  ?>
                                        <tr>
                                            <td> <?php echo $user->firstname . ' ' . $user->lastname; ?> </td>
                                            <td> <a href="#"><?php echo $user->email; ?></a> </td>
                                            <td> <?php echo $user->type; ?> </td>
                                            <td class="d-flex justify-content-between">
                                                <div class="input-group">
                                                    <input type="password" class="form-control" value="<?php echo $user->password; ?>" readonly aria-label="password" aria-describedby="button-addon2">
                                                    <button class="btn btn-primary  mr-3 toggle-password" type="button" id="button-addon2">Show</button>
                                                </div>
                                            </td>
                                            <td>
                                                <a href="./update_user.php?id=<?php echo $user->id; ?>" class="btn btn-success"> <i class="fa fa-edit"></i></a>
                                                <a href="./users.php?id=<?php echo $user->id; ?>" class="btn btn-danger"> <i class="fa fa-trash"></i></a>
                                            </td>
                                        </tr>
                                    <?php  } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


<?php include './footer.php';
