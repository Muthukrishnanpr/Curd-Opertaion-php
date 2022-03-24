<?php

class loginController
{

    public function __construct()
    {
        $db = new DatabaseConnection;
        $this->conn = $db->conn;
    }

    public function userLogin($email, $password)
    {
        $checkLogin = "SELECT * FROM users WHERE (email = '$email' OR user_name = '$email') AND password = '$password' LIMIT 1";
        $result = $this->conn->query($checkLogin);
        if ($result->num_rows > 0) {
            $data = $result->fetch_assoc();
            $this->userAuthentication($data);
            return true;
        } else return false;
    }

    private function userAuthentication($data)
    {
        $_SESSION['authenticated'] = true;
        $_SESSION['auth_user'] = [
            'user_id' => $data['id'],
            'user_name' => $data['user_name'],
            'user_email' => $data['email'],
            'user_profile' => $data['profile_pic']
        ];
    }

    public function isLoggedIn()
    {
        if (isset($_SESSION['authenticated']) === TRUE) {
            redirect("You are already Logged In", 'index.php');
        } else return false;
    }

    public function userLogout()
    {
        if (isset($_SESSION['authenticated']) === TRUE) {
            // session_destroy();
            unset($_SESSION['authenticated']);
            unset($_SESSION['auth_user']);
            return true;
        }
    }

    public function changePassword($new_pwd, $Email, $current_pwd)
    {
        // $query = "SELECT * FROM users WHERE email='$Email' AND password='$current_pwd'";
        // $result = $this->conn->query($query);
        // if ($result->num_rows > 0) {
        //     $change_pwd = "UPDATE users SET password='$new_pwd' WHERE email='$Email' AND password='$current_pwd'";
        //     $result1 = $this->conn->query($change_pwd);
        //     return $result1;
        // }
        $query = "UPDATE users SET password=? WHERE email=? AND password=?";
        $change_pwd = $this->conn->prepare($query);
        $change_pwd->execute([$new_pwd, $Email, $current_pwd]);
        return $change_pwd;
    }

    public function likeProfile($profile, $username)
    {
        $query = "UPDATE users SET profile_pic=? WHERE user_name=?";
        $result = $this->conn->prepare($query);
        $result->execute([$profile, $username]);
        return $result;
    }
}
