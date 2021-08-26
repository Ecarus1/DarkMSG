<?php
    include "connectToBD.php";

    $users = array();

    if (isset($_POST['search'])) {
        $Name = $_POST['search'];
        $Query = "SELECT id, name FROM user WHERE name LIKE '%$Name%' OR id LIKE '%$Name%' LIMIT 5";
        $ExecQuery = mysqli_query($link, $Query);
        while ($user = mysqli_fetch_array($ExecQuery)) {
            $users[] = $user;
        }
    }
?>
    <ul class="list_user">
        <? foreach ($users as $user): ?>
            <li onclick='fill("<?php echo $user['id']; ?>", "<?php echo $user['name']; ?>")'>
                <a>
                    <?php echo $user['name'] ." #id".$user['id']; ?>
                </a>
            </li>
        <? endforeach; ?>
    </ul>