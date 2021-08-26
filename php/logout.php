<?php
    //require "connectToBD.php";
    session_start();
    session_destroy();
    exit("<meta http-equiv='refresh' content='0; url= ../autoriz.php'>");
    //header("Location: ../autoriz.php");
?>