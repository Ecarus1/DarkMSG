<?php
    require "php/connectToBD.php";
    if(!isset($_SESSION["login"]))
    {
        exit("<meta http-equiv='refresh' content='0; url= index.php'>");
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
        <link rel="stylesheet" href="style/avatar.css">
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    </head>


    <body>
        <div class="avatar_box">
            <svg class="svg_box" width="800" height="816" viewBox="0 0 800 816" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M0.5 42C0.5 19.0802 19.0802 0.5 42 0.5H758C780.92 0.5 799.5 19.0802 799.5 42V570.745C799.5 588.117 788.68 603.65 772.386 609.672L750.161 617.886C737.821 622.446 728.289 632.464 724.347 645.016L692.838 745.339C682.656 777.758 639.959 784.869 619.819 757.5L596.458 725.753C576.75 698.971 535.307 704.173 522.831 734.996L505.055 778.913C501.829 786.884 496.207 793.655 488.965 798.292L473.489 808.201C451.56 822.242 422.268 812.853 412.587 788.681L369.527 681.17C360.821 659.433 336.173 648.833 314.407 657.465L277.225 672.209C270.004 675.073 263.706 679.861 259.015 686.052L232.561 720.971C229.907 724.474 227.971 728.467 226.864 732.721C218.838 763.557 175.781 765.479 165.04 735.48L150.112 693.788C138.814 662.233 94.0765 662.552 83.2295 694.265C72.5932 725.362 28.5912 725.301 18.0416 694.174L2.69609 648.897C1.24184 644.606 0.5 640.107 0.5 635.576V600V42Z" fill="#393939" stroke="black"/>
            </svg>
            <div class="box_circle">
                <div class="circle"></div>
                <div class="circle"></div>
            </div>
            <div class="registr_form">
                <form action="" method="POST" id="firstForm">
                    <div class="input_info">
                        <input type="text" id="user_name" name="user_name" placeholder="New My Name" required>
                    </div>
                    <div class="input_info">
                        <input type="submit" id="rename" name="rename" value="Let's go">
                    </div>
                    <div class="input_info">
                        <input type="button" value="Back" onclick="document.location.href = 'massage.php'">
                    </div>
                </form>
            </div>
        </div>

        <?php
            if(isset($_POST['rename']))
            {
                $name = $_POST['user_name'];
                mysqli_query($link, "UPDATE `user` SET `name` = '".$name."' WHERE `login` = '".$current_user['login']."'");
                exit("<meta http-equiv='refresh' content='0; url= massage.php'>");
            }
        ?>
    </body>
</html>