<?php

    $file = "../../json/".$_POST['name'].".json";
    $contents = $_POST['contents'];
    file_put_contents($file, $contents);

    header("Location: ../config.php");

?>