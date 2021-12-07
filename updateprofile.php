<?php
session_start();

    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $gender = $_POST['gender'];
    $address = $_POST['address'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $id = $_SESSION["uid"];

    $mysqli = new mysqli('localhost', 'root', '', 'homeservice');

    if ($mysqli->connect_errno) {
        echo $mysqli->connect_errno . ": " . $mysqli->connect_error;
    }

    $q = "UPDATE user SET Email = '$email', FirstName = '$fname', LastName = '$lname', Gender = '$gender', 
        Address = '$address', PhoneNo = '$phone' WHERE UserID = '$id';";

    echo $q;

    if (!$mysqli->query($q)) {
        echo "UPDATE failed. Error: " . $mysqli->error;
    }

    //redirect
    header("Location: user-profile.php");

?>