<?php
include("config/app.php");

include_once("controllers/authenticationController.php");
$Authenticate->userAuthenticated();

include("includes/header.php");
include("includes/navbar.php");
?>

<div class="container profile-page user-select-none">
    <div class="row">
        <div class="col-md-6 mx-auto mt-5 pt-4">
            <div class="card bg-info text-white fw-bolder mt-5 shadow">
                <img src="upload/Profile/<?= $_SESSION['auth_user']['user_profile'] ?>" 
                class=" position-absolute rounded-circle border border-5 border-white" alt="">
                <div class="profile-content mt-5 pt-4 text-center">
                    <form action="" method="post" enctype="multipart/form-data">
                        <!-- <button name="profile_pic_btn" type="button" class=" bg-transparent border-0"> -->
                        <label class="text-muted fw-bold" for="profile_pic">Did you like set profile picture</label>
                        <button class="fa fa-camera text-muted bg-transparent border-0" name="profile_pic_btn" type="submit"></button>
                        <input type="file" name="profile_pic" id="profile_pic" hidden>
                        <!-- </button> -->
                    </form>
                    <div class="profile-details my-3">
                        <span class="username">Username :</span>
                        <span class="ps-2"><?= $_SESSION['auth_user']['user_name'] ?></span>
                    </div>
                    <div class="profile-details mb-3">
                        <span class="email">Email Address :</span>
                        <span class="ps-2"><?= $_SESSION['auth_user']['user_email'] ?></span>
                    </div>
                    <div class="profile-details mb-3">
                        <p class="bg-secondary mx-4 py-2 rounded-2 shadow-sm">SELECT <span style="color: red;">*</span> FROM
                            <span style="color: red;">World</span> WHERE "<span style="color: red;">Someone</span>"
                            LIKE %<span style="color: red;">You</span>%
                        </p>
                    </div>
                    <div class="profile-details mb-3">

                        <!-- Button trigger modal -->
                        <a class=" text-primary" href="" data-bs-toggle="modal" data-bs-target="#exampleModal">
                            Change Password?
                        </a>
                        <!-- Modal -->
                        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content p-3">
                                    <div class="modal-header">
                                        <h5 class="modal-title text-secondary" id="exampleModalLabel">Change Password</h5>
                                    </div>
                                    <div class="modal-body fw-normal text-muted">
                                        <form action="" method="POST">
                                            <div class="form-floating mb-3">
                                                <input type="password" name="current_pwd" class="form-control" id="floatingInput" placeholder="name@example.com">
                                                <label for="floatingInput">Enter your current Password</label>
                                            </div>
                                            <div class="form-floating mb-3">
                                                <input type="password" name="new_pwd" class="form-control" id="floatingPassword" placeholder="Password">
                                                <label for="floatingPassword">Enter your new Password</label>
                                            </div>
                                            <div class="form-floating mb-3">
                                                <input type="password" name="confirm_pwd" class="form-control" id="floatingPassword" placeholder="Password">
                                                <label for="floatingPassword">Enter your confirm Password</label>
                                            </div>
                                            <button type="submit" class="btn btn-primary" name="pwd_change_btn">Submit</button>
                                            <button type="button" class="btn btn-danger ms-3" data-bs-dismiss="modal">Close</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<?php
include("includes/footer.php")
?>