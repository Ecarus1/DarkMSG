<?
    include "connectToBD.php";

    $messages = array();
    $room_id = $_POST['room_id'];

    $query = mysqli_query($link, 'SELECT 
            user.name user_name,
            room_message.message message,
            room_message.create_date create_date
        FROM room_message
        JOIN user ON user.id = room_message.user_id
        WHERE room_message.room_id = '.$room_id.'
        ORDER BY room_message.create_date DESC
    ');

    while ($message = mysqli_fetch_assoc($query))
    {
        $messages[] = $message;
    }
?>

        <? foreach ($messages as $message): ?>
            <div class="messages">
                <div class="message_text"> <? echo $message['message']; ?> </div>

                <div class="message_info">
                    <? echo $message['user_name']; ?> - <? echo date('d.m.Y H:i', strtotime($message['create_date'])); ?>
                </div>
            </div>
        <? endforeach; ?>