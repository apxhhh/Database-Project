<?php

    $fname = $_POST['Firstname'];
    $lname = $_POST['Lastname'];
    $email = $_POST['email'];
    $passwd = $_POST['pass'];
    $phone = $_POST['phone'];
    $address = $_POST['Address'];

    $mysqli = new mysqli('localhost', 'root', '', 'homeservice');

    if ($mysqli->connect_errno) {
        echo $mysqli->connect_errno . ": " . $mysqli->connect_error;
    }

    $q = "INSERT INTO user (UserID,FirstName,LastName,email,password,address,phone) VALUES ('$fname','$lname','$email','$passwd','$address','$phone');";

    echo $q;

    if (!$mysqli->query($q)) {
        echo "UPDATE failed. Error: " . $mysqli->error;
    }

    $mysqli->close();
    //redirect
    header("Location: home.php");

?>