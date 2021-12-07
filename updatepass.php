<?php
    session_start();

    $oldpass = $_POST['oldpsw'];
    $newpass = $_POST['newpsw'];
    $newcpass = $_POST['newpsw-repeat'];
    $uid = $_SESSION['uid'];

    $mysqli = new mysqli('localhost', 'root', '', 'homeservice');

    if ($mysqli->connect_errno) {
        echo $mysqli->connect_errno . ": " . $mysqli->connect_error;
    }

    $q = "UPDATE user SET password = '$newpass' WHERE UserID = '$uid';";

    echo $q;

    if (!$mysqli->query($q)) {
        echo "UPDATE failed. Error: " . $mysqli->error;
    }

    //redirect
    header("Location: user-profile.php");

?>