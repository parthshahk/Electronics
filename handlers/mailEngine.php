<?php

    $action = $_GET['action'];

    $recipients = file_get_contents("../json/notifications.json");
    $recipients = json_decode($recipients, true);

    $teamInfo = file_get_contents("../json/team.json");
    $teamInfo = json_decode($teamInfo, true);

    include '../includes/config.php';
    include '../includes/helpers.php';

    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;
    
    require '../includes/Exception.php';
    require '../includes/PHPMailer.php';
    require '../includes/SMTP.php';

    $mail = new PHPMailer(true);               
    $mail->isSMTP();                   
    $mail->SMTPDebug = 0;
    $mail->Host = 'smtp.gmail.com'; 
    $mail->SMTPAuth = true;                         
    include 'mail-credentials.php';                             // Contains Credentials to malgadi gmail account. Ignored in git.
    /*
        Template of mail-credentials.php

        $mail->Username = '';          
        $mail->Password = '';
    */
    $mail->SMTPSecure = 'tls';                         
    $mail->Port = 587;              
    $mail->setFrom('ready2help.malgadi@gmail.com', 'Malgadi Electronics');
    $mail->addReplyTo('ready2help.malgadi@gmail.com', 'Malgadi Electronics');
    $mail->isHTML(true); 

    if($action == 'orderPlaced'){

        $id = $_GET['id'];
        
        $statement = $pdo->prepare("SELECT * FROM orders WHERE ID = :id");
        $statement->execute(['id' => $id]);
        $row = $statement->fetch();

        if(!$row['Notified']){

            $mail->addAddress($row['Email']);
            $mail->Subject = 'Order Placed Malgadi Electronics';
            $mail->Body    = 'Your Order with ID : <b>'.$row['ID'].'</b> has been placed successfully worth Rs. <b>'.$row['Amount'].'</b><br>Thank You for shopping with us. - Malgadi Electronics';
            $mail->AltBody = 'Your Order with ID : '.$row['ID'].' has been placed successfully worth Rs. '.$row['Amount'].'Thank You for shopping with us. - Malgadi Electronics';
            $mail->send();

            $mail->ClearAllRecipients();

            for($i = 0 ; $i < sizeof($recipients[$action]) ; $i++){
                $key = array_search($recipients[$action][$i], array_column($teamInfo, 'name'));
                $mail->addAddress($teamInfo[$key]['email']);
            }
            $mail->Subject = 'Order Placed Malgadi Electronics';
            $mail->Body    = 'A new Order with ID : <b>'.$row['ID'].'</b> has been placed worth Rs. <b>'.$row['Amount'].'</b>';
            $mail->AltBody = 'A new Order with ID : '.$row['ID'].' has been placed worth Rs. '.$row['Amount'];
            $mail->send();

            $statement = $pdo->prepare("UPDATE orders SET Notified = 1 WHERE ID = :id");
            $statement->execute(['id' => $id]);

        }

    } elseif ($action == 'newMessage') {

        for($i = 0 ; $i < sizeof($recipients[$action]) ; $i++){
            $key = array_search($recipients[$action][$i], array_column($teamInfo, 'name'));
            $mail->addAddress($teamInfo[$key]['email']);
        }
        $mail->Subject = 'New Message Malgadi Electronics';
        $mail->Body    = 'A new Message has been recieved.';
        $mail->AltBody = 'A new Message has been recieved.';
        $mail->send();
        
    } elseif ($action == 'newReview') {

        for($i = 0 ; $i < sizeof($recipients[$action]) ; $i++){
            $key = array_search($recipients[$action][$i], array_column($teamInfo, 'name'));
            $mail->addAddress($teamInfo[$key]['email']);
        }
        $mail->Subject = 'New Review Malgadi Electronics';
        $mail->Body    = 'A new Review has been Posted.';
        $mail->AltBody = 'A new Review has been Posted.';
        $mail->send();

    } elseif ($action == 'orderDelivered') {

        $id = filterStringBasic($_GET['id']);

        $statement = $pdo->prepare("SELECT * FROM orders WHERE ID = :id");
        $statement->execute(['id' => $id]);
        $row = $statement->fetch();

        $mail->addAddress($row['Email']);
        $mail->Subject = 'Order Delivered - Malgadi Electronics';
        $mail->Body    = 'Your Order with ID : <b>'.$row['ID'].'</b> has been delivered successfully.<br>Make sure to leave a <a href="http://electronics.malgadi.co.in/review.php" target="_BLANK">review</a> on the website.<br><br>Thank You for shopping with us. - Malgadi Electronics';
        $mail->AltBody = 'Your Order with ID : '.$row['ID'].' has been delivered successfully. Thank You for shopping with us. - Malgadi Electronics';
        $mail->send();

        $mail->ClearAllRecipients();

        for($i = 0 ; $i < sizeof($recipients[$action]) ; $i++){
            $key = array_search($recipients[$action][$i], array_column($teamInfo, 'name'));
            $mail->addAddress($teamInfo[$key]['email']);
        }
        $mail->Subject = 'Order Delivered';
        $mail->Body    = 'Order with ID : <b>'.$row['ID'].'</b> has been delivered.';
        $mail->AltBody = 'Order with ID : '.$row['ID'].' has been delivered.';
        $mail->send();


    } elseif ($action == 'orderCanceled') {

        $id = filterStringBasic($_GET['id']);

        $statement = $pdo->prepare("SELECT * FROM orders WHERE ID = :id");
        $statement->execute(['id' => $id]);
        $row = $statement->fetch();

        $mail->addAddress($row['Email']);
        $mail->Subject = 'Order Canceled - Malgadi Electronics';
        $mail->Body    = 'Your Order with ID : <b>'.$row['ID'].'</b> has been canceled.<br>If this was not intended please contact us immediately. - Malgadi Electronics';
        $mail->AltBody = 'Your Order with ID : '.$row['ID'].' has been canceled. If this was not intended please contact us immediately. - Malgadi Electronics';
        $mail->send();

        $mail->ClearAllRecipients();

        for($i = 0 ; $i < sizeof($recipients[$action]) ; $i++){
            $key = array_search($recipients[$action][$i], array_column($teamInfo, 'name'));
            $mail->addAddress($teamInfo[$key]['email']);
        }
        $mail->Subject = 'Order Canceled';
        $mail->Body    = 'Order with ID : <b>'.$row['ID'].'</b> has been canceled.';
        $mail->AltBody = 'Order with ID : '.$row['ID'].' has been canceled.';
        $mail->send();

    } elseif ($action == 'stockArrival') {

        $id = filterStringBasic($_GET['id']);

        $statement = $pdo->prepare("SELECT * FROM items WHERE ID = :id");
        $statement->execute(['id' => $id]);
        $row = $statement->fetch();
        $name = $row['Full Name'];

        $statement = $pdo->prepare("SELECT * FROM notify_me WHERE ID = :id");
        $statement->execute(['id' => $id]);
        $rows = $statement->fetchAll();

        if($rows == null){
            exit("0");
        }
        
        foreach ($rows as $row) {

            $mail->addAddress($row['Email']);
        }

        $mail->Subject = 'Malgadi Electronics Stock Arrival';
        $mail->Body    = $name." is now available at <a href='http://electronics.malgadi.co.in'>Malgadi Electronics</a>! Place your order now!";
        $mail->AltBody = $name.' is now available at Malgadi Electronics! Place your order now!';
        $mail->send();

        $statement = $pdo->prepare("DELETE FROM notify_me WHERE ID = :id");
        $statement->execute(['id' => $id]);
    }
?>