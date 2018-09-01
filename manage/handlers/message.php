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

    
    if($action == 'toggleReview'){
        
        $review = $pdo->prepare("SELECT * FROM reviews WHERE `ID`=:id");
        $review->execute(["id" => $id]); 
        $row = $review->fetch();
        if($row['Visibility']){
            $s = $pdo->prepare("UPDATE reviews SET `Visibility`=0 WHERE `ID`=:id");
            $s->execute(['id' => $id]);
        }else{
            $s = $pdo->prepare("UPDATE reviews SET `Visibility`=1 WHERE `ID`=:id");
            $s->execute(['id' => $id]);
        }

    }elseif ($action == 'deleteReview') {

        $s = $pdo->prepare("DELETE FROM reviews WHERE `ID`=:id");
        $s->execute(['id' => $id]);

    }elseif ($action == 'deleteMessage') {

        $s = $pdo->prepare("DELETE FROM contact WHERE `ID`=:id");
        $s->execute(['id' => $id]);

    }
?>