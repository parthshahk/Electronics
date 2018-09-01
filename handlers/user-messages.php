<?php
    include '../includes/config.php';
    include '../includes/helpers.php';

    $form = $_POST['formName'];

    $name = $_POST['name'];
    $email = $_POST['email'];
    if($form == "contact"){
        $phone = $_POST['phone'];
    }else{
        $phone = "000";                                                                                                     // Dummy for review form
    }
    $message = $_POST['message'];

    $name = filterStringBasic($name);
    $email = filterStringBasic($email);
    $phone = filterStringBasic($phone);
    $message = filterStringBasic($message);

    if(strlen($name)>255 || strlen($email)>255 || strlen($phone)>20 || strlen($message)>1500){                              // Reject if data is too long for security
        
        echo "failure";
    }else{
        
        if($form == "contact"){

            $sql = 'INSERT INTO contact(Date, Name, Email, Mob, Message) VALUES(CURDATE(), :name, :email, :mob, :message)';
            $statement = $pdo->prepare($sql);
            $statement->execute(['name' => $name, 'email' => $email, 'mob' => $phone, 'message' => $message]);

        }else if($form == "review"){

            $sql = 'INSERT INTO reviews(Date, Name, Email, Review, Visibility) VALUES(CURDATE(), :name, :email, :message, 0)';
            $statement = $pdo->prepare($sql);
            $statement->execute(['name' => $name, 'email' => $email, 'message' => $message]);

        }

        echo "success";
    }
?>