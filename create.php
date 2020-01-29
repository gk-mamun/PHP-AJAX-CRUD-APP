<?php 

    include('config/config.php');

    $database = new Database();

    extract($_POST);

    // Insert record
    if(isset($_POST['fname']) && isset($_POST['lname']) && isset($_POST['email'])) {

        $database->query('INSERT INTO users(fname, lname, email) VALUES (:firstname, :lastname, :email)');
        $database->bind(':firstname', $fname);
        $database->bind(':lastname', $lname);
        $database->bind(':email', $email);
        $database->execute();

    }

?>