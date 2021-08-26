<?php
    include "connectToBD.php";
    date_default_timezone_set('Europe/Moscow');

    // $my_login = $_SESSION['login']; // мой логин
    // $query = mysqli_query($link, "SELECT `id_user` FROM `users` WHERE `login` = '".$my_login."'");
    // $res = mysqli_fetch_assoc($query);
    // $my_id = (int)$res['id_user']; // мой Id
    $text_message = mysqli_real_escape_string($link, $_POST['text_message']); // текст который я написал 
    $to_user_id = isset($_POST['to_user_id']) ? (int)$_POST['to_user_id'] : NULL; // id человека которому написал
    $room_id = isset($_POST['room_id']) ? (int)$_POST['room_id'] : NULL;
    // $date = date("d/m/Y");
    // $date_time = date("H:i:s");
    // $id_chat = 0;   //инециализируем id переписки 
    
    if ($text_message == '')
    {
        echo json_encode(array(
            "error" => "Не указанно сообщение",
            "success" => false
        ));
        return;
    }
    if (!$room_id)
    {
        $query = mysqli_query($link, 'SELECT room.id FROM room
            JOIN room_user ru1 ON ru1.room_id = room.id AND ru1.user_id="'.$current_user['id'].'"
            JOIN room_user ru2 ON ru2.room_id = room.id AND ru2.user_id="'.$to_user_id.'"
        ');
        $room_id = mysqli_num_rows($query) ? mysqli_fetch_assoc($query) ['id'] : NULL;
    }

    if($room_id == NULL)
    {
        mysqli_query($link, "INSERT INTO `room` (`title`) VALUES ('')");
        $room_id = mysqli_insert_id($link);
        mysqli_query($link, 'INSERT INTO `room_user` (`user_id`, `room_id`, `is_admin`) VALUES ('.$to_user_id.', '.$room_id.', 0), ('.$current_user['id'].', '.$room_id.', 1)');
        // $query = mysqli_query($link, "SELECT `id_chat` FROM `chats` WHERE `id_user` = '$my_id' AND `to_id_user` = '$to_user_id'"); // находим id переписки
        // $Resoult = mysqli_fetch_assoc($query);
        // $id_chat = (int)$Resoult['id_chat']; // сохраняем id переписки
        // mysqli_query($link, "INSERT INTO `messages` (`id_chat`, `id_user`, `content`, `date_create`, `time_create`, `status`) VALUES ('$id_chat', '$my_id', '".$text_message."', '$date', '$date_time', 1)");
    }

    mysqli_query($link, 'INSERT INTO `room_message` (`room_id`, `user_id`, `message`) VALUES ('.$room_id.', '.$current_user['id'].', "'.$text_message.'")');
    // else
    // {
    //     // $query = mysqli_query($link, "SELECT `id_chat` FROM `chats` WHERE `id_user` = '$my_id' AND `to_id_user` = '$to_user_id'"); // находим id переписки
    //     // $Resoult = mysqli_fetch_assoc($query);
    //     // $id_chat = (int)$Resoult['id_chat']; // сохраняем id переписки
    //     // mysqli_query($link, "INSERT INTO `messages` (`id_chat`, `id_user`, `content`, `date_create`, `time_create`, `status`) VALUES ('$id_chat', '$my_id', '".$text_message."', '$date', '$date_time', 1)");
    // }
    echo json_encode(array(
        "room_id" => $room_id,
        "success" => true
    ));
?>