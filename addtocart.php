<?php
session_start();

$mysqli = new mysqli('localhost', 'root', '', 'homeservice');

if ($mysqli->connect_errno) {
    echo $mysqli->connect_errno . ": " . $mysqli->connect_error;
}

$uid = $_SESSION['uid'];
$id = $_GET["id"];
$date = $_POST['date'];
$time = $_POST['time'];


$q = "INSERT INTO cart (UserID,ServiceID,Date,Time) VALUES ('$uid','$id','$date','$time');";

echo $q;

if (!$mysqli->query($q)) {
    echo "UPDATE failed. Error: " . $mysqli->error;
}

//redirect
header("Location: service.php?id=$id");

?>