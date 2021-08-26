<?php
    require "php/connectToBD.php";
    if(isset($_SESSION["login"]))
    {
        exit("<meta http-equiv='refresh' content='0; url= massage.php'>");
        echo $_SESSION["login"];
    }
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
        <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
        <link rel="stylesheet" href="style/autoriz.css">
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    </head>
    <body>
        <div class="registr_box">
            <svg class="svg_box" width="800" height="816" viewBox="0 0 800 816" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M0.5 42C0.5 19.0802 19.0802 0.5 42 0.5H758C780.92 0.5 799.5 19.0802 799.5 42V570.745C799.5 588.117 788.68 603.65 772.386 609.672L750.161 617.886C737.821 622.446 728.289 632.464 724.347 645.016L692.838 745.339C682.656 777.758 639.959 784.869 619.819 757.5L596.458 725.753C576.75 698.971 535.307 704.173 522.831 734.996L505.055 778.913C501.829 786.884 496.207 793.655 488.965 798.292L473.489 808.201C451.56 822.242 422.268 812.853 412.587 788.681L369.527 681.17C360.821 659.433 336.173 648.833 314.407 657.465L277.225 672.209C270.004 675.073 263.706 679.861 259.015 686.052L232.561 720.971C229.907 724.474 227.971 728.467 226.864 732.721C218.838 763.557 175.781 765.479 165.04 735.48L150.112 693.788C138.814 662.233 94.0765 662.552 83.2295 694.265C72.5932 725.362 28.5912 725.301 18.0416 694.174L2.69609 648.897C1.24184 644.606 0.5 640.107 0.5 635.576V600V42Z" fill="#393939" stroke="black"/>
            </svg>
            <div class="registr_form">
                <form action="" method="POST" id="firstForm">
                    <div class="name_company"> 
                        DARKMSG
                    </div>
                    <div class="input_info">
                        <input type="text" id="login" name="login" placeholder="Login" required>
                    </div>
                    <div class="input_info">
                        <input type="password" id="pass" name="pass" placeholder="Password" required>
                    </div>
                    <div class="input_info">
                        <input type="submit" id="regist" name="regist" value="Autorization">
                    </div>
                    <div class="input_info">
                        <input type="button" value="Back" onclick="document.location.href = 'index.php'">
                    </div>
                </form>
            </div>
        </div>
        <script>
            // $(document).ready( function () {
            //     var flag = false;

            //     $('#regist').hide();

            //     $('#pass_double').keypress( function (event) {

            //         if(flag == false)
            //         {
            //             window.setInterval( function () {
            //                 var pass = "";
            //                 var pass_double = "";
            //                 pass = $('#pass').val();
            //                 pass_double = $('#pass_double').val();
            //                 console.log(pass_double);
            //                 if (pass == pass_double && pass.length > 0)
            //                 {
            //                     $('#regist').show();
            //                     console.log("OK");
            //                 }
            //                 else{
            //                     $('#regist').hide();
            //                 }
            //             }, 100);
            //         }
            //         flag = true;
            //     });


            //     // Часть кода предназначена для отправки сообщений без перезагрузки страницы
            //     // В рот манал это понимать! Она нужная для общения в чате!!!!!!!!!!!!!!!!
            //     // $('#firstForm').submit( function (event) {
            //     //     event.preventDefault();

            //     //     $.ajax({
            //     //         url: "",
            //     //         type: "POST",
            //     //         data: $('#firstForm').serialize(),
            //     //         success: function (response) {
            //     //             //Обработка в случае удачи
            //     //         },

            //     //         error: function (response) {
            //     //             //Обработка в случае ошибки
            //     //         }
            //     //     });
            //     // });
            // });

            // $(document).ready( function () {
            //     $('#regist').click( function () {
            //         var login = $('#login').val();
            //         var pass = $('#pass').val();

            //         if (login != '' && pass != '')
            //         {
            //             // localStorage.setItem('login', login);
            //             // localStorage.setItem('pass', pass);
            //             alert ($('#firstForm').serialize());

            //             $.ajax({
            //                 url: "php/loginToMSG.php",
            //                 type: "POST",
            //                 data: $('#firstForm').serialize(),
            //                 success: function (response) {
            //                     if(response == "Yes")
            //                     {
            //                         localStorage.setItem('login', login);
            //                         localStorage.setItem('pass', pass);
                                    
            //                     }
            //                 },

            //                 error: function (response) {

            //                 }
            //             });
            //         }
            //     });
            // });

            $(document).ready( function () {
                $('#regist').click( function () {
                    localStorage.setItem('login', login);
                    localStorage.setItem('pass', pass);
                });
            });
        </script>
        <?php

            // if (isset($_POST["go"]))
            // {
            //     // $login = $_POST["login"];
            //     // $user_name = $_POST["user_name"];
            //     // $pass = md5($_POST["pass_double"]);
            //     // echo $pass;

            //     // mysqli_query($link, "INSERT INTO `users` (`login`, `pass_hash`, `name_user`) VALUES ('".$login."', '".$pass."', '".$user_name."');");


            // }
            $data = $_POST;


            if(isset($_POST['regist']))
            {
                if($data['login'] != '' && $data['pass'] != '')
                {
                    $login = $data['login'];
                    $pass = md5($data['pass']);
                    $query = mysqli_query($link, "SELECT `login`, `password` FROM `user` WHERE `login` = '".$login."' AND `password` = '".$pass."'");
                    if (mysqli_num_rows($query) > 0 )
                    {
                        $_SESSION['login'] = $login;
                        //setcookie("login", $login, time() + 3600);
                        exit("<meta http-equiv='refresh' content='0; url= massage.php'>");
                    }
                }
            }
        ?>
    </body>
</html>