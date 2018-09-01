<?php
    include '../includes/config.php';

    if(!isset($_REQUEST['action'])){
        exit(0);
    }


    if($_REQUEST['action']=='add'){

        if(!isset($_REQUEST['id'])){
            exit(0);
        }

        $id = $_REQUEST['id'];

        $exists=0;                                                      // Check if item exist in cart
        foreach ($_SESSION['cart'] as $object) {
            if($object['id'] == $id){
                $exists = 1;
                break;
            }
        }

        if(is_numeric($id) && !$exists){                                // If id is a number and if not exist
            $instance = array("id"=>$id, "quantity"=>1);                // Create Instance
            $_SESSION['cart'][] = $instance;                            // Push to cart array
            echo 'success';
        }

    }elseif ($_REQUEST['action']=='remove'){

        if(!isset($_REQUEST['id'])){
            exit(0);
        }
        
        $id = $_REQUEST['id'];

        $i=0;                                                      
        foreach ($_SESSION['cart'] as $object) {
            if($object['id'] == $id){
                break;
            }
            $i++;
        }

        unset($_SESSION['cart'][$i]);
        $_SESSION['cart'] = array_values($_SESSION['cart']);

        echo 'success';

    }elseif ($_REQUEST['action'] == 'getAmount'){

        $subtotal=0;

        for($i=0;$i<sizeof($_SESSION['cart']);$i++){

            $id = $_SESSION['cart'][$i]['id'];
            
            $cardObject = $pdo->prepare("SELECT * FROM items WHERE `ID` = $id");
            $cardObject->execute();
            $row = $cardObject->fetch();

            $subtotal += (($row['Selling Price']) * ($_SESSION['cart'][$i]['quantity']));
        }

        $_SESSION['subtotal'] = $subtotal;

        echo 'Rs. '.$subtotal;

    }elseif ($_REQUEST['action'] == 'qincrease'){

        if(!isset($_REQUEST['id'])){
            exit(0);
        }

        $id = $_GET['id'];

        $i=0;                                                      
        foreach ($_SESSION['cart'] as $object) {
            if($object['id'] == $id){
                break;
            }
            $i++;
        }

        $_SESSION['cart'][$i]['quantity']++;
        
        echo $_SESSION['cart'][$i]['quantity'];

    }elseif ($_REQUEST['action'] == 'qdecrease'){

        if(!isset($_REQUEST['id'])){
            exit(0);
        }

        $id = $_GET['id'];

        $i=0;                                                      
        foreach ($_SESSION['cart'] as $object) {
            if($object['id'] == $id){
                break;
            }
            $i++;
        }

        if($_SESSION['cart'][$i]['quantity'] == 1){
            echo 1;
        }else{
            $_SESSION['cart'][$i]['quantity']--;
            echo $_SESSION['cart'][$i]['quantity'];
        }

    }
?>