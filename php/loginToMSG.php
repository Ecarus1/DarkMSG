<?php
    require "connectToBD.php";

    $login = $_POST['login'];
    $pass = md5($_POST['pass']);

    $query = mysqli_query($link, "SELECT `login`, `pass_hash` FROM `users` WHERE `login` = '".$login."' AND `pass_hash` = '".$pass."'");
    if(mysqli_num_rows($query) > 0)
    {
        echo "Yes";
    }
    else 
    {
        echo "No";
    }

?>