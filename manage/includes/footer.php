        </div>
        <script src="<?php echo BaseAddress; ?>/js/materialize.min.js"></script>
        <script src="<?php echo ManageAddress; ?>/js/script1.0.js"></script>
        <script>
            <?php
            if(isset($_SESSION['login'])){

                if($_SESSION['login'] != 1){
                    echo "hideHigherFunctions();";
                }
            }
            ?>
        </script>
        <script src="https://use.fontawesome.com/25db837a52.js"></script>
    </body>
</html>