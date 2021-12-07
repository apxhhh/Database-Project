<?php
session_start();

$mysqli = new mysqli('localhost', 'root', '', 'homeservice');

if ($mysqli->connect_errno) {
    echo $mysqli->connect_errno . ": " . $mysqli->connect_error;
}

$uid = $_SESSION['uid'];
$id = $_GET["id"];


$q = "DELETE FROM cart WHERE UserID = '$uid' AND CartID = '$id' ;";

echo $q;

if (!$mysqli->query($q)) {
    echo "UPDATE failed. Error: " . $mysqli->error;
}

//redirect
header("Location: shoppingcart.php");

?>