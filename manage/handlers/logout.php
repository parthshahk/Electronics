<?php
    session_start();
    session_destroy();
    if(isset($_COOKIE['fb2'])){
        setcookie("fb2", "askljfsdFsdfSD2FSDDSe324e2F1", time()-2592000, "/manage");
    }
    if(isset($_COOKIE['gd2'])){
        setcookie("gd2", "askljfsdFsdfSD1FSDDSe324e2F1", time()-2592000, "/manage");
    }
    header("Location: ../login.php");
?>