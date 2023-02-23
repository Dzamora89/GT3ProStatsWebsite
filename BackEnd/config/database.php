<?php

class Database
{
    // DB Parameters
    private $host = 'localhost';
    private $db_name = 'gt3stats';
    private $username = 'root';
    private $password = '';
    private $conn;

    //Db connect

    public function connect()
    {
        $this->conn = null;
        try {
            $this->conn = new PDO(
                'mysql:host=' . $this->host . ';dbname=' . $this->db_name, $this->username, $this->password
            );
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        } catch (PDOException $exception) {
            echo 'connection error' . $exception->getMessage();
        }
        return $this->conn;
    }
}