<?php
    session_start();

    $picture = $_POST['image'];
    $service = $_POST['service'];
    $description = $_POST['description'];
    $price = $_POST['price'];

    $mysqli = new mysqli('localhost', 'root', '', 'homeservice');

    if ($mysqli->connect_errno) {
        echo $mysqli->connect_errno . ": " . $mysqli->connect_error;
    }

    $q = "INSERT INTO service (picture,ServiceName,Description,Price) 
    VALUES ('$picture','$service','$description','$price');";

    echo $q;

    if (!$mysqli->query($q)) {
        echo "UPDATE failed. Error: " . $mysqli->error;
    }

    //redirect
    header("Location: service.php?id=1");

?>