<?php
    include "connectToBD.php";

    if (isset($_POST['to_user_id'])) 
    {
        $id = (int)$_POST['to_user_id'];
        $query = mysqli_query($link, "SELECT `name` FROM `user` WHERE `id` = '$id'");
        $Result = mysqli_fetch_array($query);
        ?>
            <span><?php echo "User: ". $Result['name'] . " №".$id; ?></span>
        <?php
    }
?>