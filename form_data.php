<?php
include("dbcon.php");
// checking for when button is clicked
if (isset($_POST['add_student'])){
    // echo 'button has been clicked';
    //Get input from user input field
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $age = $_POST['age'];

    if ($first_name==='' || empty($first_name)){
        header('location:index.php?message=Please enter your first name');
    }
    if ($last_name==='' || empty($last_name)){
        header('location:index.php?nolastname=Please enter your last name');
    }
    if ($age==='' || empty($age)){
        header('location:index.php?noage=Please enter your age');
    }
    else{
        $query = "INSERT INTO `student` (`first_name`, `last_name`, `age`) VALUES ('$first_name', '$last_name', '$age')";
        $result = mysqli_query($connection,$query);
        if (!$result){
            die('Query has failed'. mysqli_error($connection));
        }
        else{
            header('location:index.php?insert_msg=Your data has been added successfully');
        } 
    }
}

?>