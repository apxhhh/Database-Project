<?php
$mysqli = new mysqli('localhost','root','','homeservice');
    if($mysqli->connect_errno){
        echo $mysqli->connect_errno.": ".$mysqli->connect_error;
    }
?>