<?php
    session_start();
    if(isset($_SESSION["login"]))
    {
        exit("<meta http-equiv='refresh' content='0; url= massage.php'>");
        // echo $_SESSION["login"];
    }
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
        <link rel="stylesheet" href="style/index.css">

        <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    
    </head>

    <body>
        <div class="aimation_background"></div>

        <div class="reg">
            <div class="reg_p">
                <a class="reg_p_p" href="registr.php">Регистрация</a>
            </div>
        </div>
        <div class="autoriz">
            <div class="autoriz_p">
                <a class="autoriz_p_p" href="autoriz.php">Авторизация</a>
            </div>
        </div>

        <script>
            $(document).ready( function () {
                //$(document).load("php/open.php");
            });
        </script>
        
    </body>
</html>