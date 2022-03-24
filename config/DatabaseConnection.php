<?php

class DatabaseConnection{

    public function __construct()
    {
        $conn = new mysqli(host,user,password,dbname);

        if(!$conn){
            die ("<span>Database COnnection Failed</span>");
        }
        return $this->conn=$conn;
    }

}