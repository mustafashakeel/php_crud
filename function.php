<?php

class Student
{

    private  $host = 'localhost';
    private $username = 'root';
    private $password = 'root';
    private $dbname = 'students';
    private $port = 8889;

    public $conn;
    function __construct()
    {
        $this->conn = new mysqli($this->host, $this->username, $this->password, $this->dbname);

        if (mysqli_connect_error()) {
            trigger_error(" Error is in DB " . mysqli_connect_error());
        } {
            return $this->conn;
        }
    }
    public function viewData()
    {
    }
    public function add()
    {
    }
    public function delete()
    {
    }
    public function update()
    {
    }




    // public function getStudent()
    // {
    //     return $this->host;
    // }
}

// $yuka = new Student();
// $machika = new Student();
// echo $yuka->getStudent();
// echo $yuka->host;
