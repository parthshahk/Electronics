<?php

    if($_SERVER['SERVER_NAME'] != 'electronics.malgadi.co.in' && $_SERVER['SERVER_NAME'] != 'localhost'){
        header('Location: http://electronics.malgadi.co.in');
    }

    session_start();

    if(!isset($_SESSION['cart'])){
        $_SESSION['cart'] = [];
    }

    if(!isset($_SESSION['subtotal'])){
        $_SESSION['subtotal'] = 0;
    }

    define("BaseAddress","http://".$_SERVER['SERVER_NAME']);

    $DBCpath = $_SERVER['DOCUMENT_ROOT'];
    $DBCpath .= "/includes/db-credentials.php";
    include $DBCpath;                                   //  Contains MySQL username and Password. Ignored in git.

    /*
        Template of db-credentials.php

        if($_SERVER['SERVER_NAME'] == 'electronics.malgadi.co.in'){

            $host =  '';
            $user = '';
            $password = '';
            $dbname = '';

        }else if($_SERVER['SERVER_NAME'] == 'localhost'){

            $host =  '';
            $user = '';
            $password = '';
            $dbname = '';

        }else{
            exit(0);
        }
    */

    $dsn = 'mysql:host='. $host .';dbname='. $dbname;

    $pdo = new PDO($dsn, $user, $password);
    $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
?>