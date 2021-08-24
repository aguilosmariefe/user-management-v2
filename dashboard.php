<?php
include_once './header.php';

// $posts = Post::getAllPublishedPost($connection);
?>
<div class="row">
    <div class="col-12">
        <div class="card mb-0">
            <div class="card-body">
                <h4 class="m-0">Dashboard</h4>

            </div>
        </div>
    </div>
</div>
<div class="row mt-4">

    <div class="col-12">
        <div class="card card-primary">
            <div class="card-header">
                <h4>Welcome <?php echo Auth::user()->firstname . ' ' . Auth::user()->lastname ?></h4>
            </div>
            <div class="card-body">
                <h6>We will sending updates to you email @ <strong> <?php echo Auth::user()->email  ?> </strong></h6>
            </div>
        </div>
    </div>

</div>

<?php include './footer.php';
