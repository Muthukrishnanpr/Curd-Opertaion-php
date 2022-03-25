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
foreach ($user as $data) {
?>

<div class="container">
        <div class="row">
            <div class="col-md-12 d-flex border p-2 mt-3 rounded" id="user-details">
                <div class="row">
                    <div class="col-md-2 text-center">
                        <img src="upload/<?= $data['image'] ?>" class="" alt="...">
                        <div class="card-footer mx-auto fw-bold" name="author"><?= $data['author_name'] ?></div>
                    </div>
                    <div class="d-flex flex-column justify-content-center col-md-8">
                        <h5 class="card-title"><?= $data['title'] ?></h5>
                        <p class="card-text mt-2 text-muted"><?= $data['body_content'] ?></p>
                    </div>
                    <div class="d-flex flex-column justify-content-around align-items-center col-md-2">
                        <a class="btn btn-danger w-50" name="discard_btn" 
                        href="?id=<?= $data['id'] ?>">Discard</a>
                        <a class="btn btn-primary w-50" name="update_btn"
                        href="updatehere.php?id=<?= $data['id'] ?>">Update</a>
                    </div>
                </div>
            </div>
        </div>
    </div>


<?php
}
include "includes/footer.php";

?>