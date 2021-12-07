<?php
session_start();

$fname = $_POST['Firstname'];
$lname = $_POST['Lastname'];
$gender = $_POST['gender'];
$usertype = $_POST['usertype'];
$address = $_POST['address'];
$phone = $_POST['phone'];
$email = $_POST['email'];
$passwd = $_POST['psw'];
$cpasswd = $_POST['psw-repeat'];

$passwd=md5($passwd);
$mysqli = new mysqli('localhost', 'root', '', 'homeservice');

if ($mysqli->connect_errno) {
    echo $mysqli->connect_errno . ": " . $mysqli->connect_error;
}

$q = "INSERT INTO user (Email,Password,UserType,FirstName,LastName,Gender,Address,PhoneNo) 
VALUES ('$email','$passwd','$usertype','$fname','$lname','$gender','$address','$phone');";

echo $q;

if (!$mysqli->query($q)) {
    echo "UPDATE failed. Error: " . $mysqli->error;
}

$mysqli->close();


if ($usertype=="staff") {

    $mysqli = new mysqli('localhost', 'root', '', 'homeservice');

    if ($mysqli->connect_errno) {
        echo $mysqli->connect_errno . ": " . $mysqli->connect_error;
    }

    $q = "INSERT INTO staff (UserID) SELECT MAX(UserID) FROM user;";
#$q = "select insert_staff() ";
    echo $q;

    if (!$mysqli->query($q)) {
        echo "UPDATE failed. Error: " . $mysqli->error;
    }

    $mysqli->close();
}

//redirect
header("Location: home.php");

?>