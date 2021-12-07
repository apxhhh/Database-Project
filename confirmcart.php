<?php
session_start();

$mysqli = new mysqli('localhost', 'root', '', 'homeservice');

if ($mysqli->connect_errno) {
    echo $mysqli->connect_errno . ": " . $mysqli->connect_error;
}

$uid = $_SESSION['uid'];
$pid = $_POST['payment'];

$p = "SELECT * FROM cart c INNER JOIN service s ON c.ServiceID = s.ServiceID WHERE c.UserID = '$uid';";
$row = mysqli_fetch_all($mysqli->query($p));
$mysqli->close();

foreach ($row as $i) {
    $id = $i[2];
    $date = $i[3];
    $time = $i[4];

    $mysqli = new mysqli('localhost', 'root', '', 'homeservice');

    if ($mysqli->connect_errno) {
        echo $mysqli->connect_errno . ": " . $mysqli->connect_error;
    }

    $q = "INSERT INTO booking (UserID,ServiceID,PaymentID,Date,Time) VALUES ('$uid','$id','$pid','$date','$time');";

    echo $q;

    if (!$mysqli->query($q)) {
        echo "UPDATE failed. Error: " . $mysqli->error;
    }

    $mysqli = new mysqli('localhost', 'root', '', 'homeservice');

    if ($mysqli->connect_errno) {
        echo $mysqli->connect_errno . ": " . $mysqli->connect_error;
    }

    $d = "DELETE FROM cart WHERE UserID ='$uid';";

    echo $d;

    if (!$mysqli->query($d)) {
        echo "UPDATE failed. Error: " . $mysqli->error;
    }

}

//redirect
header("Location: thankyou.php");

?>