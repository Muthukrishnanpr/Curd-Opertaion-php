<?php
include("config/app.php");

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
    <div class="py-5">
        <div class="container">
            <div class="row">
                <div class="col-md-5 mx-auto mt-5">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="text-muted">Reset Password</h4>
                        </div>
                        <div class="card-body">
                            <form action="" method="post">
                                <div class="input-group mb-3">
                                    <span class="input-group-text" id="basic-addon1">
                                        <i class="fa fa-lock fs-4"></i>
                                    </span>
                                    <input type="text" class="form-control py-3 fw-bolder" placeholder="New Password" aria-label="Username" aria-describedby="basic-addon1">
                                </div>
                                <div class="input-group mb-3">
                                    <span class="input-group-text" id="basic-addon1">
                                        <i class="fa fa-lock fs-4"></i>
                                    </span>
                                    <input type="text" class="form-control py-3 fw-bolder" placeholder="Confirm Password" aria-label="Username" aria-describedby="basic-addon1">
                                </div>
                                <div class="d-grid gap-2">
                                    <button class="btn btn-success fst-italic fw-bold fs-6 text-light py-2" type="submit">Submit</button>
                                </div>
                                <span style="position:absolute; top: 12.5px; right: 50px"><?php include 'message.php'; ?></span>
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
include("includes/footer.php");
?>