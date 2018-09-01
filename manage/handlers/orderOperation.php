<?php
    include '../includes/config.php';
    include '../../includes/helpers.php';

    if(!isset($_SESSION['login'])){
        exit(0);
    }else{
        if($_SESSION['login'] != 1 && $_SESSION['login'] !=2){
            exit(0);
        }
    }

    if(isset($_GET['action'])){
        $action = filterStringBasic($_GET['action']);
    }else{
        exit("Action Not Found");
    }

    if(isset($_GET['id'])){
        $id = filterStringBasic($_GET['id']);
    }else{
        exit("ID Not Found");
    }

    if(isset($_GET['op'])){
        $op = filterStringBasic($_GET['op']);
    }else{
        exit("Operator Not Found");
    }


    if($action == 'deliver'){

        $s = $pdo->prepare("UPDATE orders SET `OStatus`='Delivered', `Operator`=:op WHERE `ID`=:id ");
        $s->execute(['id' => $id, ':op' => $op]);

    }elseif($action == 'cancel'){
        
        $s = $pdo->prepare("UPDATE orders SET `OStatus`='Canceled', `Operator`=:op WHERE `ID`=:id ");
        $s->execute(['id' => $id, ':op' => $op]);

        //  Decrement order stat

        $st = $pdo->prepare("SELECT * FROM orders WHERE `ID` = :id");
        $st->execute(['id' => $id]);
        $dateO = $st->fetch();
        $date = date_parse_from_format("Y-m-d", $dateO['Date']);
        $dateObj   = DateTime::createFromFormat('!m', $date['month']);
        $monthName = $dateObj->format('M');
        $month = $monthName.substr($date['year'],2);

        $statement = $pdo->query("SELECT * FROM stats WHERE `Month`='$month'");
        $row = $statement->fetch();
        $orderCount = $row['Orders'];
        $orderCount--;
        $statement = $pdo->prepare("UPDATE stats SET Orders=$orderCount WHERE `Month` = '$month'");
        $row = $statement->execute();

    }
?>