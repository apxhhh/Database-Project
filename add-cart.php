<?php
    session_start();

    $mysqli = new mysqli('localhost', 'root', '', 'homeservice');
    if ($mysqli->connect_errno) {
        echo $mysqli->connect_errno . ": " . $mysqli->connect_error;
    }

    $q = "INSERT into cart (CartID, BookingID, PaymentID) VALUES ('".$_SESSION["Cartid"]."','".$_GET["Bookingid"]."','".$_GET["payid"]."');";

    if (!$mysqli->query($q)) {
        echo "UPDATE failed. Error: " . $mysqli->error;
    }

    $mysqli->close();

    header("Location: cart.php");
?>