<?php

include("function.php");

$stdObj = new Student();

$data = $stdObj->viewData();

if (isset(($_POST['submit']))) {
    $stdObj->add();
}

// echo var_dump($data);


// class Fruit
// {
//     public $name;
//     public $color;

//     function __construct($name)
//     {
//         $this->name = $name;
//     }
//     function get_name()
//     {
//         return $this->name;
//     }
// }

// $apple = new Fruit("Apple");
// echo $apple->get_name();

// $banana = new Fruit("Banana");

// echo $banana->get_name();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
    <title>PHP CRUD Application </title>
</head>

<body>
    <div class="container">
        <header>
            <h2>PHP CRUD Appplication </h2>
        </header>

        <div class="section">
            <h1>Add New Students </h1>
            <form action="index.php" method="POST">
                <div class="form-group">
                    <label for="first_name">First Name</label>
                    <input type="text" class="form-control" name="first_name" id="first_name" aria-describedby="first_name" placeholder="Enter First Name">

                </div>
                <div class="form-group">
                    <label for="last_name">Last Name</label>
                    <input type="text" class="form-control" name="last_name" id="last_name" aria-describedby="last_name" placeholder="Enter Last Name">
                </div>
                <div class="form-group">
                    <label for="email">Email address</label>
                    <input type="email" class="form-control" name="email" id="email" aria-describedby="emailHelp" placeholder="Enter email">
                    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                </div>
                <div class="form-group">
                    <label for="phone">Phone</label>
                    <input type="text" class="form-control" name="phone" id="phone" aria-describedby="phone #" placeholder="Enter Phone">
                </div>
                <div class="form-group">
                    <label for="address">Address</label>
                    <input type="text" class="form-control" name="address" id="address" aria-describedby="Address " placeholder="Enter Address">
                </div>
                <div class="form-group">
                    <label for="course">Course</label>
                    <input type="text" class="form-control" name="course" id="course" aria-describedby="Course " placeholder="Enter Course">
                </div>

                <input type="submit" style="margin:20px;" name="submit" value="Add Record" class="btn btn-danger">


            </form>
        </div>


        <main>

            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">Serial # </th>
                        <th scope="col">First Name</th>
                        <th scope="col">Last Name</th>
                        <th scope="col">Phone</th>
                        <th scope="col">Email</th>
                        <th scope="col">Address</th>
                        <th scope="col">Course</th>
                        <th scope="col">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($data as $student) {

                    ?>
                        <tr>
                            <th scope="row"><?php echo $student['id'] ?></th>
                            <td><?php echo $student['first_name'] ?></td>
                            <td><?php echo $student['last_name'] ?></td>
                            <td><?php echo $student['phone'] ?></td>
                            <td><?php echo $student['email'] ?></td>
                            <td><?php echo $student['address'] ?></td>
                            <td><?php echo $student['course'] ?></td>
                            <td><a href="edit.php?edit_id=<?php echo $student['id']; ?>"><i class="fas fa-edit"> </i></a>
                                <a href="index.php?del_id=?<?php echo $student['id']; ?>"><i class="fas fa-trash"></i></a>
                            </td>



                        </tr>
                    <?php } ?>
                </tbody>

            </table>


        </main>
    </div>
</body>

</html>