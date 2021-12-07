<?php

    if (isset($_POST["search"])) {
        $search = $_POST["search"];
    } else {
        $search = $_GET[""];

        $mysqli = new mysqli('localhost', 'root', '', 'homeservice');

        if ($mysqli->connect_errno) {
            echo $mysqli->connect_errno . ": " . $mysqli->connect_error;
        }

        $j = "SELECT ServiceName FROM Service WHERE ServiceName LIKE "%.$_GET["search"].%";";

        $a = mysqli_fetch_all($mysqli->query($j));
        $search = $a[0][0];

        //var_dump($search);

        $mysqli->close();
    }


    //redirect
    header("Location: shop.php?shopsearch=" . $search . "&search=".$_GET["search"]);
?>