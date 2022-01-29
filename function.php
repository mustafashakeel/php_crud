<?php

class Student
{

    private $host = 'localhost';
    private $username  = 'root';
    private $password = 'root';
    private $dbName = 'students';
    // private $port = 8889;

    public $conn;
    // Database Connection

    public function __construct()
    {
        $this->conn = new mysqli($this->host, $this->username, $this->password, $this->dbName);

        if (mysqli_connect_error()) {
            trigger_error('Error in DB' . mysqli_connect_error());
        } else {
            return $this->conn;
        }
    }
    public function viewStudent()
    {
        $sql = "SELECT * FROM students";
        $result = $this->conn->query($sql);

        if ($result->num_rows > 0) {
            $data = array();
            while ($row = $result->fetch_assoc()) {
                $data[] = $row;
            }

            return $data;
        }
    }
    public function addStudent()
    {
        $first_name = $_POST['first_name'];
        $last_name = $_POST['last_name'];
        $email = $_POST['email'];
        $phone = (int) $_POST['phone'];
        $address = $_POST['address'];
        $course = $_POST['course'];

        // $sql = "insert into students(first_name, last_name, phone, email, address, course) values('$first_name', '$last_name', '$phone', '$email',  '$address',  '$course')";

        // if ($this->conn->query($sql) === TRUE) {
        //     echo "New record created successfully";
        // } else {
        //     echo "Error: " . $sql . "<br>" . $this->conn->error;
        // }


        $sql = "insert into students(first_name, last_name, phone, email, address, course) values('$first_name', '$last_name','$phone','$email', '$address','$course' )";
        if ($this->conn->query($sql)) {
            echo " New Student Added ";
        } else {
            echo " We have an erro " . $this->conn->error;
        }


        // $stmt = $this->conn->prepare("INSERT INTO students (first_name, last_name, phone, email, address, course) VALUES (?, ?, ?,?,?,?)");
        // $stmt->bind_param("ssisss", $first_name, $last_name, $phone, $email,  $address,  $course);

        // $stmt->execute();

        // if ($stmt = true) {
        //     echo " Successs";
        // }


        // $sql = "INSERT INTO students ( first_name, last_name, phone, email, address, course ) VALUES ( $first_name, $last_name , $phone, $email,  $address,  $course)";


        // $sql = "INSERT INTO students (first_name, last_name, phone, email, address, course)
        // VALUES ($first_name, $last_name , $phone, $email,  $address,  $course  )";





        // if ($this->conn->query($sql) === TRUE) {
        //     echo "New record created successfully";
        // } else {
        //     echo "Error: " . $sql . "<br>" . $this->conn->error;
        // }
    }
    public function deleteStudent($id)
    {
        $sql = "DELETE FROM students WHERE id = '$id'";
        $result = $this->conn->query($sql);
        if ($result) {
            echo " the Student Record has been deleted";
            header("Location:index.php");
        } else {
            echo " Not able to delete ";
        }
    }

    public function getRecordById($id)
    {

        // display the record of the student by id 
        $query = "select * from students where id= '$id' limit 1";
        $result = $this->conn->query($query);
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            return $row;
        } else {
            echo "No records found";
        }
    }

    public function updateStudent($postData)
    {
        $first_name = $_POST['first_name'];
        $last_name = $_POST['last_name'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $address = $_POST['address'];
        $course = $_POST['course'];
        $id = $_POST['id'];

        if (!empty($id) && !empty($postData)) {

            $sql = "UPDATE students SET first_name = '$first_name', last_name='$last_name', email='$email', phone='$phone', address='$address', course='$course' WHERE id='$id'";

            $result = $this->conn->query($sql);

            if ($sql == true) {
                header("Location:index.php");
            } else {
                echo " update failed ";
            }
        }
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
