<?php
    function filterStringBasic($string){
        return trim(addslashes(htmlspecialchars($string)));
    }
?>