<?php
    session_start();
    $_SESSION["login"] = "start";
    $_SESSION["uid"] = NULL;
    header("Location: home.php");
?>