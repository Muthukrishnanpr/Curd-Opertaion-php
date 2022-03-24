<?php

class registerController
{

    public function __construct()
    {
        $db = new DatabaseConnection;
        $this->conn = $db->conn;
    }

    public function confirmPassword($password, $c_password)
    {
        if ($password == $c_password) {
            return true;
        } else return false;
    }

    public function isUserExists($email, $username)
    {
        // // $checkUser = "SELECT * FROM users WHERE email =? LIMIT 1";
        // // $checkUser = "SELECT * FROM users WHERE email = '$email' OR user_name = '$username'  LIMIT 1";
        // $checkUser = "SELECT * FROM users WHERE email =? OR user_name =? LIMIT 1";
        // $result = $this->conn->prepare($checkUser);
        // // $result->execute();
        // $result->execute([$email, $username]);
        // return $result;
        $checkUser = "SELECT * FROM users WHERE email='$email' OR user_name='$username' LIMIT 1";
        $result = $this->conn->query($checkUser);
        if ($result->num_rows > 0) {
            return true;
        } else return false;
    }

    public function registration($username, $email, $password)
    {
        $register_query = "INSERT INTO users (user_name, email, password) VALUES ('$username','$email','$password')";
        // $register_query = "INSERT INTO users (user_name, email, password) VALUES (:user_name, :email, :password)";
        $result = $this->conn->query($register_query);
        return $result;
        // $result = $this->conn->prepare($register_query);
        // $result->execute([
        //     // 'user_name' => $username,
        //     // 'email' => $email,
        //     // 'password' => $password
        // ]);
        // $data = $result->fetch();
        // $new_data = array(
        //     'username' => $data['user_name'],
        //     'email' => $data['email'],
        //     'created_at' => $data['created_at']
        // );
        // $current_data = file_get_contents('json/user_data.json');
        // $array_data = json_decode($current_data, true);
        // $array_data[] = $new_data;
        // $json_data = json_decode($array_data, JSON_PRETTY_PRINT);
        // if (file_put_contents($current_data, $json_data)) {
        //     return true;
        // } 
    }
}
