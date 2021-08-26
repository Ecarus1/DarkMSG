<?php
    session_start();
    $host = "localhost";
    $user = "root";
    $password = "root";
    $nameBD = "dark_msg_2";

    $link = mysqli_connect($host, $user, $password, $nameBD) or die(mysqli_error($link));
    mysqli_query($link, "SET NAMES 'utf8'");
    if(isset($_SESSION['login']))
    {
        $my_login = $_SESSION['login']; // мой логин
        $query = mysqli_query($link, 'SELECT * FROM user WHERE login="'.$my_login.'"');
        $current_user = mysqli_fetch_assoc($query);
    }
?>