<?php
    include '../includes/config.php';
    include '../includes/helpers.php';

    $id = $_GET['id'];
    $email = $_GET['email'];

    $id = filterStringBasic($id);
    $email = filterStringBasic($email);


    if(strlen($email) <= 255 || strlen($id) <= 6){                              // Reject if data is too long for security
        
        $sql = 'INSERT INTO notify_me(Email, ID) VALUES(:email, :id)';
        $statement = $pdo->prepare($sql);
        $statement->execute(['email' => $email, 'id' => $id]);
    }
?>