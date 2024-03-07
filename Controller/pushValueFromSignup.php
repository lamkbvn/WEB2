<?php
session_start();

include("../Model/connectData.php");
include("function.php");

if($_SERVER['REQUEST_METHOD'] == "POST")
{
    //something was posted
    $user_name = $_POST['user_name'];
    $password = $_POST['password'];
    $fullname = $_POST['fullname'];
    $phone_number = $_POST['phone_number'];
    $email = $_POST['email'];
    $address = $_POST['address'];

   
        // Data is valid, proceed with saving to the database

        // Save to database
        $id_role = random_num(20);
        $query = "INSERT INTO users (id_role, user_name, password, fullname, phone_number, email, address) VALUES ('$id_role', '$user_name', '$password', '$fullname', '$phone_number', '$email', '$address')";

        if(mysqli_query($conn, $query)) {
            // Redirect to login page if insertion is successful
            header("Location: ../View/login.php");
            die; // Stop execution after redirection
        } else {
            // Handle database insertion error
            echo "Error: " . mysqli_error($conn);
        }
    } else {
        // Data validation failed
        echo "Please enter some valid information!";
    
}
?>