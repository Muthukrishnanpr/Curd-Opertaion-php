<?php
include "includes/header.php";
include_once("controllers/authenticationController.php");
$users = $Authenticate->getData();
?>

<div class="container home">
    <div class="row">
        <?php foreach ($users as $data) { ?>
            <div class="col-md-4">
                <div class="card mt-5 position-relative">
                    <img src="upload/<?= $data['image'] ?>" style="height: 200px;" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title"><?= $data['title'] ?></h5>
                        <h6 class="card-subtitle mb-2 text-muted"><?= $data['author_name'] ?></h6>
                        <p class="card-text"><?= $data['body_content'] ?></p>
                        <span class="created_by position-absolute top-0 start-0 py-1 ps-3 text-uppercase fw-bolder text-light">
                        created_by : <?= $data['created_by'] ?></span>
                    </div>
                </div>
            </div>
        <?php } ?>
        <div class="col-md-4">
            <div class="add-story mt-5 d-flex align-items-center justify-content-center">
                <a href="userDetails.php" class="fa fa-plus btn btn-outline-primary p-4 fs-2" name="add-story" aria-hidden="true"></a>
            </div>
        </div>
    </div>
</div>