<?php 
session_start();

$email = $_POST['email'];
$passwd = $_POST['psw'];

$passwd=md5($passwd);
$mysqli = new mysqli('localhost', 'root', '', 'homeservice');
#echo $passwd; 
#echo "<br>";
if ($mysqli->connect_errno) {
    echo $mysqli->connect_errno . ": " . $mysqli->connect_error;
}

$q = "SELECT email, password, UserID FROM user WHERE email = '$email' AND password like '$passwd';";

//echo $q;

$row = mysqli_fetch_row($mysqli->query($q));

var_dump($row);

$mysqli->close();

if($row!=NULL){
    $_SESSION["login"] = "True";
    $_SESSION["uid"] = $row[2];
   header("Location: home.php");
    exit();
}

else{
    $_SESSION["login"] = "False";
    header("Location: login.php");
    exit();
}
?>
