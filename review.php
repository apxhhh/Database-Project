<?php

//store review to review database from post and session
session_start();

if($_POST["rating"] == 0){
    header("Location: service.php?id=".$_GET["id"]);
    exit();
}


$mysqli = new mysqli('localhost', 'root', '', 'homeservice');

if ($mysqli->connect_errno) {
    echo $mysqli->connect_errno . ": " . $mysqli->connect_error;
}

$d = "SELECT * FROM review WHERE ServiceID = ".$_GET["id"]." AND UserID = " .$_SESSION["uid"];
$row = mysqli_fetch_all($mysqli->query($d));
$mysqli->close();

if (isset($row[0])) {
    $mysqli = new mysqli('localhost', 'root', '', 'homeservice');

    if ($mysqli->connect_errno) {
        echo $mysqli->connect_errno . ": " . $mysqli->connect_error;
    }

    $p = "UPDATE review SET Rating = '".$_POST["rating"]."', Comment = '".$_POST["review"]."' WHERE ServiceID = ". $_GET["id"] ." AND UserID = ". $_SESSION["uid"];

    echo $p;

    if (!$mysqli->query($p)) {
        echo "UPDATE failed. Error: " . $mysqli->error;
    }

    $mysqli->close();

} else {
    $mysqli = new mysqli('localhost', 'root', '', 'homeservice');

    if ($mysqli->connect_errno) {
        echo $mysqli->connect_errno . ": " . $mysqli->connect_error;
    }

    $q = "INSERT INTO review (UserID,ServiceID,Rating,Comment) VALUES ('".$_SESSION["uid"]."','".$_GET["id"]."','".$_POST["rating"]."','".$_POST["review"]."');";

    echo $q;

    if (!$mysqli->query($q)) {
        echo "UPDATE failed. Error: " . $mysqli->error;
    }

    $mysqli->close();
}

//var_dump($row);


header("Location: service.php?id=".$_GET["id"]);
?>