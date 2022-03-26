<?php
include "controllers/registerController.php";
include "controllers/loginController.php";
include "controllers/authenticationController.php";

$register = new registerController;
$login = new loginController;
$Authenticate = new authenticationController;

if (isset($_POST['register_btn'])) {
    $Username = $_POST['user_name'];
    $Email = $_POST['email'];
    $Password = $_POST['password'];
    $ConfirmPassword = $_POST['confirm_password'];
    $matchPassword = $register->confirmPassword($Password, $ConfirmPassword);
    if ($matchPassword) {
        $checkUser = $register->isUserExists($Email, $Username);
        if ($checkUser) {
            redirect("User Already Exists", "register.php");
        } else {
            $finally = $register->registration($Username, $Email, $Password);
            if ($finally) {
                redirect("User Registered Successfully!", 'login.php');
            } else {
                redirect("Something Went Wrong...Please try Again", 'register.php');
            }
        }
    } else {
        redirect("Password and Confirm Password Does not Match", 'register.php');
    }
}


if (isset($_POST['login_btn'])) {
    $Email = $_POST['email'];
    $Password = $_POST['password'];
    $checkLogin = $login->userLogin($Email, $Password);
    if ($checkLogin) {
        redirect("Logged in Successfully!", "userDetails.php");
    } else {
        redirect("Invalid Username or Invalid Password", "login.php");
    }
}


if (isset($_POST['logout_btn'])) {
    $checkLogout = $login->userLogout();
    if ($checkLogout) {
        redirect("Logged Out Successfully!", 'index.php');
    }
}


if (isset($_POST['pwd_change_btn'])) {
    $Email = $_SESSION['auth_user']['user_email'];
    $Current_pwd = $_POST['current_pwd'];
    $New_pwd = $_POST['new_pwd'];
    $Confirm_pwd = $_POST['confirm_pwd'];

    $checkpwd = $register->confirmPassword($New_pwd, $Confirm_pwd);
    if ($checkpwd) {
        $change_pwd = $login->changePassword($New_pwd, $Email, $Current_pwd);
        if ($change_pwd) {
            redirect("Password changed Successfully!", "Profile.php");
        } else {
            redirect("Password changed Failed...Try again", "Profile.php");
        }
    }
}

if (isset($_POST['profile_pic_btn'])) {
    $Username = $_SESSION['auth_user']['user_name'];
    $img_name = $_FILES['profile_pic']['name'];
    $tmp_name = $_FILES['profile_pic']['tmp_name'];

    $img_extension = pathinfo($img_name, PATHINFO_EXTENSION);
    $img_extension_to_lc = strtolower($img_extension);

    $allowed_extension = array('jpg', 'jpeg', 'png');

    if (in_array($img_extension_to_lc, $allowed_extension)) {
        $Profile_pic = uniqid("$Username", true) . "." . $img_extension_to_lc;
        $img_upload_path = "./upload/Profile/" . $Profile_pic;
        move_uploaded_file($tmp_name, $img_upload_path);
        $Upload_profile = $login->likeProfile($Profile_pic, $Username);
        if ($Upload_profile) {
            return $Upload_profile;
        }
    } else {
        redirect("You can't upload files of this type", "index.php");
    }
}



if (isset($_POST['upload_btn'])) {
    $Title = $_POST['title'];
    $Author = $_POST['author'];
    $Body_content = $_POST['body_content'];
    $Created_by = $_SESSION['auth_user']['user_name'];

    $img_name = $_FILES['image']['name'];
    $img_size = $_FILES['image']['size'];
    $tmp_name = $_FILES['image']['tmp_name'];
    $error = $_FILES['image']['error'];

    if ($error === 0) {
        $img_extension = pathinfo($img_name, PATHINFO_EXTENSION);
        $img_extension_to_lc = strtolower($img_extension);

        $allowed_extension = array('jpg', 'jpeg', 'png');

        if (in_array($img_extension_to_lc, $allowed_extension)) {
            $new_img_name = uniqid("$Title", true) . "." . $img_extension_to_lc;
            $img_upload_path =  "./upload/" . $new_img_name;
            move_uploaded_file($tmp_name, $img_upload_path);
        } else {
            redirect("You can't upload files of this type", "uploadhere.php");
        }
    } else {
        redirect("unKnown error occured", "uploadhere.php");
    }

    $checkData = $Authenticate->isData($Title, $Author, $Body_content, $new_img_name);
    if ($checkData) {
        $finally = $Authenticate->uploadData($Title, $Author, $Body_content, $new_img_name, $Created_by);
        if ($finally) {
            redirect("User Data Uploaded Successfully!", "userDetails.php");
        } else {
            redirect("Something Went Wrong...Please try Again", 'uploadhere.php');
        }
    } else {
        redirect("Please Filled all Fields...", 'uploadhere.php');
    }
}

if (isset($_POST['delete_multiple_btn'])) {
    $all_id = $_POST['record_del_id'];
    $extract_id = implode(',', $all_id);
    // echo $extract_id;
    $delete_multiple_data = $Authenticate->deleteMultipleData($extract_id);
    if ($delete_multiple_data) {
        redirect("User Data Deleted Successfully!", "userDetails.php");
    } else {
        redirect("User data's not deleted try again", "userDetails.php");
    }
}


if (isset($_GET['search_btn'])) {
    $filterValues = $_GET['search'];
    $getValues = $Authenticate->searchBooks($filterValues);
    if ($getValues) {
        return true;
    } else return false;
}
