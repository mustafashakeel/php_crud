<?php
include("function.php");

$editStudent = new Student();


if (isset($_GET['edit_id']) && !empty($_GET['edit_id'])) {
    $editId = $_GET['edit_id'];
    // echo " the Edit ID is  " . $editId;
    $studentRecord = $editStudent->getRecordById($editId);
    echo var_dump($studentRecord);
} else {
    echo " we dont have an edit id ";
}

if (isset($_POST['update'])) {
    echo " Please udpate";


    $data = $editStudent->updateStudent($_POST);
    echo $data;
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
</head>

<body>

    <div class="container">
        <div class="section">
            <h1>Edit Student Record </h1>
            <form action="edit.php" method="POST">
                <div class="form-group">
                    <label for="first_name">First Name</label>
                    <input type="text" class="form-control" name="first_name" id="first_name" value="<?php echo $studentRecord['first_name']; ?>" aria-describedby="first_name" placeholder="Enter First Name">

                </div>
                <div class="form-group">
                    <label for="last_name">Last Name</label>
                    <input type="text" class="form-control" name="last_name" id="last_name" aria-describedby="last_name" value="<?php echo $studentRecord['last_name']; ?>" placeholder="Enter Last Name">
                </div>
                <div class="form-group">
                    <label for="email">Email address</label>
                    <input type="email" class="form-control" value="<?php echo $studentRecord['email']; ?>" name="email" id="email" aria-describedby="emailHelp" placeholder="Enter email">
                    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                </div>
                <div class="form-group">
                    <label for="phone">Phone</label>
                    <input type="text" class="form-control" value="<?php echo $studentRecord['phone']; ?>" name="phone" id="phone" aria-describedby="phone #" placeholder="Enter Phone">
                </div>
                <div class="form-group">
                    <label for="address">Address</label>
                    <input type="text" class="form-control" value="<?php echo $studentRecord['address']; ?>" name="address" id="address" aria-describedby="Address " placeholder="Enter Address">
                </div>
                <div class="form-group">
                    <label for="course">Course</label>
                    <input type="text" class="form-control" value="<?php echo $studentRecord['course']; ?>" name="course" id="course" aria-describedby="Course " placeholder="Enter Course">
                </div>
                <input type="hidden" name="id" value="<?php echo $studentRecord['id']; ?>">

                <input type="submit" style="margin:20px;" name="update" value="Update Record" class="btn btn-danger">


            </form>
        </div>
    </div>

</body>

</html>