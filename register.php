<?php
include("config/app.php");
$login->isLoggedIn();

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
                            <h4>Register</h4>
                        </div>
                        <div class="card-body">
                            <form action="" method="POST">
                                <div class="form-group mb-3">
                                    <label for="username">User Name</label>
                                    <input type="text" name="user_name" id="username" class="form-control">
                                </div>
                                <div class="form-group mb-3">
                                    <label for="email">Email Id</label>
                                    <input type="email" name="email" id="email" class="form-control">
                                </div>
                                <div class="form-group mb-3">
                                    <label for="password">Password</label>
                                    <input type="password" name="password" id="password" class="form-control">
                                </div>
                                <div class="form-group mb-3">
                                    <label for="confirm_password">Confirm Password</label>
                                    <input type="text" name="confirm_password" id="confirm_password" class="form-control">
                                </div>
                                <div class="form-group mb-3 d-flex align-items-end justify-content-between">
                                    <button type="submit" name="register_btn" class="btn btn-success px-2">Register Now</button>
                                    <h6 class="me-5">Have already an account? <a href="login.php" class="text-decoration-none">Login</a></h6>
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
include("includes/footer.php")
?>