<?php 

    include('config/config.php');

    $database = new Database();

    extract($_POST);


    // Get user id 
    if(isset($_POST['id']) && isset($_POST['id']) != ""){
        $user_id = $_POST['id'];
        
        $database->query('SELECT * FROM users WHERE id = :userid');
        $database->bind(':userid', $user_id);
        $database->execute();
        $result = $database->singleresult();

        echo json_encode($result);
    }
    else {
        $result['status'] = 200;
        $result['message'] = "Invalid Request";
    }

    // Update user details
    if(isset($_POST['update_user_id'])) {
        $update_user_id = $_POST['update_user_id'];
        $fname = $_POST['new_fname'];
        $lname = $_POST['new_lname'];
        $email = $_POST['new_email'];

        $database->query('UPDATE users SET fname = :firstname, lname = :lastname, email = :email WHERE id = :updateid');
        $database->bind(':firstname', $fname);
        $database->bind(':lastname', $lname);
        $database->bind(':email', $email);
        $database->bind('updateid', $update_user_id);
        $database->execute();
    }
    


?>