<?php
session_start();

$mysqli = new mysqli('localhost', 'root', '', 'homeservice');

if ($mysqli->connect_errno) {
    echo $mysqli->connect_errno . ": " . $mysqli->connect_error;
}

$bid = $_GET['id'];
$sid = $_POST["assign"];


$q = "INSERT INTO staffassign (StaffID,BookingID) VALUES ('$sid','$bid');";

echo $q;

if (!$mysqli->query($q)) {
    echo "UPDATE failed. Error: " . $mysqli->error;
}

//redirect
header("Location: staffassign.php");

?>