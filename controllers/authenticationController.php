<?php

class authenticationController
{

    public function __construct()
    {
        $db = new DatabaseConnection;
        $this->conn = $db->conn;
    }

    public function checkIsLoggedIn()
    {
        if (!isset($_SESSION['authenticated'])) {
            redirect("Login to access the Page", 'login.php');
            return false;
        } else return true;
    }

    public function userAuthenticated()
    {
        $checkAuth = $this->checkIsLoggedIn();
        if ($checkAuth) {
            return true;
        } else return false;
    }

    public function isData($title, $author, $body_content)
    {
        if ($title != "" && $author != "" && $body_content != "") {
            return true;
        } else return false;
    }

    public function uploadData($title, $author, $body_content, $new_img_name, $created_by)
    {
        $query = "INSERT INTO user_post (title, author_name, body_content, image, created_by)
        VALUES (?, ?, ?, ?, ?)";
        $result = $this->conn->prepare($query);
        $result->execute([$title, $author, $body_content, $new_img_name, $created_by]);
        return $result;
    }

    public function getOwnData()
    {
        $checkAuth = $this->checkIsLoggedIn();
        $username = $_SESSION['auth_user']['user_name'];
        if ($checkAuth) {
            $query = "SELECT * FROM user_post WHERE created_by = '$username'";
            $result = $this->conn->query($query);
            $result->fetch_assoc();
            return $result;
        } else {
            redirect("Something Went Wrong", "login.php");
        }
    }

    public function getData()
    {
        try {
            $query = "SELECT * FROM user_post";
            $result = $this->conn->query($query);
            $result->fetch_assoc();
            return $result;
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function deletedata($id)
    {
        $query = "DELETE FROM user_post WHERE id = '$id'";
        $result = $this->conn->query($query);
        return $result;
    }

    public function deleteMultipleData($extract_id)
    {
        $query = "DELETE FROM user_post WHERE id IN($extract_id)";
        $result = $this->conn->query($query);
        return $result;
    }

    public function searchBooks($filterValues)
    {
        $query = "SELECT * FROM user_post WHERE title LIKE %$filterValues%";
        $result = $this->conn->query($query);
        $posts = $result->fetch_asssoc();
       echo $posts;
    }
}
