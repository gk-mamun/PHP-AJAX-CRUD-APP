<?php 

    include('config/config.php');

    $database = new Database();

    extract($_POST);


    // Delete record
    if(isset($_POST['delete_user_id'])){
        $userid = $_POST['delete_user_id'];

        $database->query('DELETE FROM users WHERE id = :userid');
        $database->bind(':userid', $userid);
        $database->execute();
    }

?>