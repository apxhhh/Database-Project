<?php
    session_start();

    $mysqli = new mysqli('localhost', 'root', '', 'homeservice');
    if ($mysqli->connect_errno) {
        echo $mysqli->connect_errno . ": " . $mysqli->connect_error;
    }

    $q = "DELETE FROM cart WHERE CartID ='".$_GET["id"]."';";

    if (!$mysqli->query($q)) {
        echo "UPDATE failed. Error: " . $mysqli->error;
    }

    $mysqli->close();

    header("Location: cart.php");
?>