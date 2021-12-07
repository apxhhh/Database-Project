<?php
    var_dump($_POST);
    session_start();

    $mysqli = new mysqli('localhost', 'root', '', 'ARTY');
    if ($mysqli->connect_errno) {
        echo $mysqli->connect_errno . ": " . $mysqli->connect_error;
    }

    foreach ($_POST as $key=>$p) {

        $q = "UPDATE cart set Quantity = '" . $p . "' WHERE userID = '" . $_SESSION["uid"] . "' AND CartID = '".$key."';";

        if (!$mysqli->query($q)) {
            echo "UPDATE failed. Error: " . $mysqli->error;
        }
    }
    $mysqli->close();

    header("Location: cart.php");
?>