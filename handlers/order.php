<?php
    include '../includes/config.php';
    include '../includes/helpers.php';


    if(isset($_POST['name']) && isset($_POST['email']) && isset($_POST['address']) && isset($_POST['phone']) && isset($_POST['city']) && isset($_POST['paymode'])){

        if($_POST['name'] == '' || $_POST['email'] == '' || $_POST['address'] == '' || $_POST['phone'] == '' || $_POST['city'] == '' || $_POST['paymode'] == ''){
            exit("Sufficient information was not provided. Please <a href='../checkout.php'>Go back</a> and try again!");
        }

    }else{

        exit("Looks like you are on the wrong page. Go back to <a href='".BaseAddress."'>Homepage</a>");
    }
    

    $name       =   filterStringBasic($_POST['name']);
    $email      =   filterStringBasic($_POST['email']);
    $address    =   filterStringBasic($_POST['address']);
    $phone      =   filterStringBasic($_POST['phone']);
    $branch     =   filterStringBasic($_POST['branch']);
    $semester   =   filterStringBasic($_POST['semester']);
    $city       =   filterStringBasic($_POST['city']);
    $payMode    =   filterStringBasic($_POST['paymode']);

    if($branch == ''){
        $branch = '-';
    }

    if($semester == ''){
        $semester = 0;
    }

    $contentStrArray = [];
    for($i = 0 ; $i < sizeof($_SESSION['cart']) ; $i++){
        $contentStrArray [] = $_SESSION['cart'][$i]['id'].".".$_SESSION['cart'][$i]['quantity'];
    }

    $contentStr =   implode("*",$contentStrArray);
    $subtotal   =   $_SESSION['subtotal'];

    
    $sql =  "    INSERT INTO 
                orders(Date, Name, Email, Mobile, Address, Branch, Semester, City, PayMode, Contents, Amount, OStatus, Notified, Operator) 
                VALUES(CURDATE(), :name, :email, :mobile, :address, :branch, :semester, :city, :paymode, :contents, :amount, 'Placed', 0, '-')
            ";

    $statement = $pdo->prepare($sql);

    $statement->execute(
        [
            'name'      =>  $name,
            'email'     =>  $email,
            'mobile'    =>  $phone,
            'address'   =>  $address,
            'branch'    =>  $branch,
            'semester'  =>  $semester,
            'city'      =>  $city,
            'paymode'   =>  $payMode,
            'contents'  =>  $contentStr,
            'amount'    =>  $subtotal
        ]
    );

    $lastId = $pdo->lastInsertId();

    //      Increment Order Stats       //
    $month=date('M').date('y');
    $exists=0;    
    $statement = $pdo->query('SELECT * FROM stats');
    while($row = $statement->fetch()){
        if($row['Month'] == $month){
            $exists = 1;
            break;
        }
    }
    if($exists){
        $statement = $pdo->query("SELECT * FROM stats WHERE Month = '$month'");
        $row = $statement->fetch();
        $orderCount = $row['Orders'];
        $orderCount++;        
        $statement = $pdo->prepare("UPDATE stats SET Orders=$orderCount WHERE Month = '$month'");
        $row = $statement->execute();
    }else {    
        $statement = $pdo->prepare("INSERT INTO stats(Month, Orders) VALUES('$month', 1)");
        $row = $statement->execute();
    }
    //////////////////////////////////////
    
    session_destroy();

    header('Location: ../thankyou.php?q='.$lastId);
?>