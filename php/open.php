<?php
    session_start();
    if(isset($_SESSION["login"]))
    {
        exit("<meta http-equiv='refresh' content='0; url= ../massage.php'>");
        echo $_SESSION["login"];
    }
    else
    {
        exit("<meta http-equiv='refresh' content='0; url= ../index.html'>");
    }
?>