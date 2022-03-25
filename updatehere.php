<?php
include "config/app.php";

include_once("controllers/authenticationController.php");
$Authenticate->userAuthenticated();
echo $ID = $_REQUEST['id'];
$user = $Authenticate->getOwnData();
foreach ($user as $data) {

include("includes/header.php");
include("includes/navbar.php");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <div class="pt-5">
        <div class="container">
            <div class="row">
                <div class="col-md-5 mx-auto">
                    <div class="card">
                        <div class="card-header">
                            <h4>Updatehere</h4>
                        </div>
                        <div class="card-body">
                            <form action="" method="POST" enctype="multipart/form-data">
                                <div class="form-group mb-3">
                                    <label for="title">Title</label>
                                    <input type="text" name="title" id="title" class="form-control"
                                    value="<?= $data['title'] ?>" >
                                </div>
                                <div class="form-group mb-3">
                                    <label for="author">Author</label>
                                    <input type="text" name="author" id="author" class="form-control"
                                    value="<?= $data['author_name'] ?>">
                                </div>
                                <div class="form-group mb-3">
                                    <label for="image">Image</label>
                                    <input type="file" name="image" id="image" class="form-control">
                                    <!-- <?= $data['image'] ?></input> -->
                                </div>
                                <div class="form-group mb-3 d-flex flex-column">
                                    <label for="content">Content</label>
                                    <textarea name="body_content" id="content" rows="3">
                                    <?= $data['body_content'] ?></textarea>
                                </div>
                                <div class="form-group mb-3">
                                    <button type="submit" name="upload_btn" class="btn btn-success px-2">Update</button>
                                    <a href="userDetails.php" class="btn btn-danger px-3 ms-2 ">Close</a>
                                </div>
                                <span style="position:absolute; top: 12.5px; right: 50px"><?php  include 'message.php'; ?></span>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>

<?php
}
include("includes/footer.php")
?>