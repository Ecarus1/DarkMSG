<?php
    include "connectToBD.php";

    // $my_login = $_SESSION['login']; // мой логин
    // $query = mysqli_query($link, 'SELECT * FROM user WHERE login="'.$my_login.'"');
    // $current_user = mysqli_fetch_assoc($query);

// 'SELECT room.* FROM room
// JOIN room_user ON room_user.room_id = room.id
// WHERE room_user.user_id = "'.$current_user['id'].'"';

    // $query = mysqli_query($link, "SELECT `id_user` FROM `users` WHERE `login` = '".$my_login."'");
    // $res = mysqli_fetch_assoc($query);
    // $my_id = (int)$res['id_user']; // мой Id

    $query = mysqli_query($link, 'SELECT room.* 
        FROM room 
        JOIN room_user ON room_user.room_id = room.id
        WHERE room_user.user_id = "'.$current_user['id'].'"
    ');
    while($room = mysqli_fetch_assoc($query))
    {
        // $id_user = $res['to_id_user'];
        // $query1 = mysqli_query($link, "SELECT `name_user` FROM `users` WHERE `id_user` = '$id_user'");
        // $Resoult = mysqli_fetch_assoc($query1);
        // $name_user = $Resoult['name_user'];

        ?>
            <div class="chat_to_user" onclick='show_chat("<?php echo $room['id']; ?>", "<?php echo $room['title'] ? $room['title'] : "Комната №".$room['id'] ?>")'>
                <div><?php echo $room['title'] ? $room['title'] : "Комната №".$room['id'] ?></div>

            </div>
        <?php
    }
?>