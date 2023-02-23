<?php
error_reporting(0);
class ConnectDatabase
{
    private $username = 'root';
    private $pass = '';
    public function connectdb()
    {
        $conn = new PDO("mysql:host=127.0.0.1;dbname=ecommerce;", $this->username, $this->pass);
        return $conn;
        
    }
}
