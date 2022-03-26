<?php
include "config/app.php";

include "includes/header.php";
include "includes/navbar.php";

include_once("controllers/authenticationController.php");
if (isset($_GET['id'])) {
    $del = $Authenticate->deletedata($_GET['id']);
    redirect("Data Deleted Successfully!", "userDetails.php");
    return true;
}

$user = $Authenticate->getOwnData();
?>

<div class="container">
    <form action="" method="POST">
        <div class="row">
            <span style="position:absolute;"><?php include 'message.php'; ?></span>
            <div class="col-md-9 d-flex mt-4 p-0">
                <input class="form-control me-2" type="search" placeholder="Search Books..." aria-label="Search"
                name="search" value="<?php foreach ($user as $data) {$data['title'];} ?>">
                <button class="btn btn-success px-4" type="submit" name="search_btn">Search</button>
            </div>
            <div class="col-md-3 mt-4 p-0 text-end">
                <button type="submit" class="btn btn-danger py-2 px-4" name="delete_multiple_btn">Delete Multiple Records</button>
            </div>
            <?php foreach ($user as $data) { ?>
                <div class=" col-md-12 d-flex border p-2 mt-3 rounded" id="user-details">
                    <div class="row">
                        <div class="col-md-2 text-center">
                            <img src="upload/<?= $data['image'] ?>" class="" alt="...">
                            <div class="card-footer mx-auto fw-bold" name="author"><?= $data['author_name'] ?></div>
                        </div>
                        <div class="d-flex flex-column justify-content-center col-md-8">
                            <h5 class="card-title"><?= $data['title'] ?>
                                <input type="checkbox" name="record_del_id[]" value="<?= $data['id'] ?>" id="">
                            </h5>
                            <p class="card-text mt-2 text-muted"><?= $data['body_content'] ?></p>
                        </div>
                        <div class="d-flex flex-column justify-content-around align-items-center col-md-2">
                            <a class="btn btn-danger w-50" name="discard_btn" href="?id=<?= $data['id'] ?>">Discard</a>
                            <a class="btn btn-primary w-50" name="update_btn" href="updatehere.php?id=<?= $data['id'] ?>">Update</a>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
    </form>
</div>


<?php
include "includes/footer.php";

?>