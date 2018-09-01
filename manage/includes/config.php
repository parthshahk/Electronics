<?php

    if($_SERVER['SERVER_NAME'] != 'electronics.malgadi.co.in' && $_SERVER['SERVER_NAME'] != 'localhost'){
        header('Location: http://electronics.malgadi.co.in');
    }

    session_start();

    define("BaseAddress","http://".$_SERVER['SERVER_NAME']);

    define("ManageAddress","http://".$_SERVER['SERVER_NAME']."/manage");

    if(!isset($_SESSION['login'])){
        header("Location: ".ManageAddress."/login.php");
    }else{
        if($_SESSION['login'] != 1 && $_SESSION['login'] !=2){
            header("Location: ".ManageAddress."/handlers/logout.php");
        }
    }

    $DBCpath = $_SERVER['DOCUMENT_ROOT'];
    $DBCpath .= "/includes/db-credentials.php";
    include $DBCpath;                                                     //  Contains MySQL username and Password. Ignored in git.

    $dsn = 'mysql:host='. $host .';dbname='. $dbname;

    $pdo = new PDO($dsn, $user, $password);
    $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
    $pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
?>