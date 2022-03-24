<?php
include ("config/app.php");
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
    <div class="py-5">
        <div class="container">
            <div class="row">
                <div class="col-md-5 mx-auto">
                
                    <div class="card">
                        <div class="card-header">
                            <h4>Login</h4>
                        </div>
                        <div class="card-body">
                            <form action="" method="post">
                                <div class="form-floating mb-3">
                                    <input type="text" name="email" class="form-control" id="floatingInput" placeholder="name@example.com">
                                    <label for="floatingInput">Username or Email</label>
                                </div>
                                <div class="form-floating">
                                    <input type="password" name="password" class="form-control" id="floatingPassword" placeholder="Password">
                                    <label for="floatingPassword">Password</label>
                                </div>
                                <h6 class="mt-2 ms-2">
                                <a href="recoverPassword.php" class="text-decoration-none">Forgot Password?</a>
                                </h6>
                                <div class="form-group mb-3 pt-2 d-flex align-items-end justify-content-between">
                                    <button type="submit" name="login_btn" class="btn btn-primary px-3 py-2">Login Now</button>
                                    <h6 class="me-5">Not a member? <a href="register.php" class="text-decoration-none">Signup Now</a></h6>
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
include("includes/footer.php");
?>