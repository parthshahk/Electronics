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
    
    if(isset($_REQUEST['action'])){
        $action = filterStringBasic($_REQUEST['action']);
    }else{
        exit("Action Not Found");
    }

    if($action == 'toggleStock'){

        if(isset($_GET['id'])){
            $id = filterStringBasic($_GET['id']);
        }else{
            exit("ID Not Found");
        }

        $item = $pdo->prepare("SELECT * FROM items WHERE `ID`=:id");
        $item->execute(["id" => $id]); 
        $row = $item->fetch();
        if($row['Stock Status']){
            $s = $pdo->prepare("UPDATE items SET `Stock Status`=0 WHERE `ID`=:id");
            $s->execute(['id' => $id]);
        }else{
            $s = $pdo->prepare("UPDATE items SET `Stock Status`=1 WHERE `ID`=:id");
            $s->execute(['id' => $id]);
        }

    } elseif ($action == 'toggleHomepage'){

        if(isset($_GET['id'])){
            $id = filterStringBasic($_GET['id']);
        }else{
            exit("ID Not Found");
        }
        
        $item = $pdo->prepare("SELECT * FROM items WHERE `ID`=:id");
        $item->execute(["id" => $id]); 
        $row = $item->fetch();
        if($row['Homepage']){
            $s = $pdo->prepare("UPDATE items SET `Homepage`=0 WHERE `ID`=:id");
            $s->execute(['id' => $id]);
        }else{
            $s = $pdo->prepare("UPDATE items SET `Homepage`=1 WHERE `ID`=:id");
            $s->execute(['id' => $id]);
        }

    } elseif ($action == 'toggleFeatured'){

        if(isset($_GET['id'])){
            $id = filterStringBasic($_GET['id']);
        }else{
            exit("ID Not Found");
        }
        
        $item = $pdo->prepare("SELECT * FROM items WHERE `ID`=:id");
        $item->execute(["id" => $id]); 
        $row = $item->fetch();
        if($row['Featured']){
            $s = $pdo->prepare("UPDATE items SET `Featured`=0 WHERE `ID`=:id");
            $s->execute(['id' => $id]);
        }else{
            $s = $pdo->prepare("UPDATE items SET `Featured`=1 WHERE `ID`=:id");
            $s->execute(['id' => $id]);
        }

    }  elseif ($action == 'addProduct') {
        
        $fullName =         filterStringBasic($_POST['fullName']);
        $shortName =        filterStringBasic($_POST['shortName']);
        $originalPrice =    filterStringBasic($_POST['originalPrice']);
        $sellingPrice =     filterStringBasic($_POST['sellingPrice']);
        $category =         filterStringBasic($_POST['category']);
        $tags =             filterStringBasic($_POST['tags']);

        if($_POST['description']==''){
            $description='-';
        }else{
            $description = filterStringBasic($_POST['description']);
        }
    
        if($_POST['specifications']==''){
            $specifications='-';
        }else{
            $specifications = filterStringBasic($_POST['specifications']);
        }
    
        if($_POST['kitContents']==''){
            $kitContents='-';
        }else{
            $kitContents = filterStringBasic($_POST['kitContents']);
        }

        $imageCount = 1;
        if(!$_FILES['img2']['name']==''){
            $imageCount=2;
        }
        if(!$_FILES['img3']['name']==''){
            $imageCount=3;
        }

        $fileButton=0;
        if(!$_FILES['tutorial_file']['name']==''){
            $fileButton=1;
        }


        $sql = "INSERT INTO items(`Full Name`, `Short Name`, `Original Price`, `Selling Price`, `Description`, `Specifications`, `Kit Contents`, `Category`, `Featured`, `Homepage`, `Image Count`, `Stock Status`, `File Availability`, `Deprecated`, `Tags`) VALUES(:fullName, :shortName, :oPrice, :sPrice, :desc, :specs, :kCont, :cat, 0, 0, :iCount, 1, :file, 0, :tags)";

        $statement = $pdo->prepare($sql);

        $statement->execute(
            [
                'fullName'      => $fullName,
                'shortName'     => $shortName,
                'oPrice'        => $originalPrice,
                'sPrice'        => $sellingPrice,
                'desc'          => $description,
                'specs'         => $specifications,
                'kCont'         => $kitContents,
                'cat'           => $category,
                'iCount'        => $imageCount,
                'file'          => $fileButton,
                'tags'          => $tags
            ]
        );

        $lastId = $pdo->lastInsertId();
        
        $target='../../images/products/'.$lastId.'.0.jpg';
        move_uploaded_file( $_FILES['img1']['tmp_name'], $target);

        if(!$_FILES['img2']['name']==''){
            
            $target='../../images/products/'.$lastId.'.1.jpg';
            move_uploaded_file( $_FILES['img2']['tmp_name'], $target);
        }
        
        if(!$_FILES['img3']['name']==''){

            $target='../../images/products/'.$lastId.'.2.jpg';
            move_uploaded_file( $_FILES['img3']['tmp_name'], $target);
        }

        if(!$_FILES['tutorial_file']['name']==''){

            $target='../../downloads/tutorials/tutorial_'.$lastId.'.zip';
            move_uploaded_file( $_FILES['tutorial_file']['tmp_name'], $target);
        }

        header('Location: ../products.php');

    } elseif($action == 'editProduct') {

        $id =               filterStringBasic($_POST['id']);
        $fullName =         filterStringBasic($_POST['fullName']);
        $shortName =        filterStringBasic($_POST['shortName']);
        $originalPrice =    filterStringBasic($_POST['originalPrice']);
        $sellingPrice =     filterStringBasic($_POST['sellingPrice']);
        $category =         filterStringBasic($_POST['category']);
        $tags =             filterStringBasic($_POST['tags']);
        
        

        if($_POST['description']==''){
            $description='-';
        }else{
            $description = filterStringBasic($_POST['description']);
        }
        if($_POST['specifications']==''){
            $specifications='-';
        }else{
            $specifications = filterStringBasic($_POST['specifications']);
        }
        if($_POST['kitContents']==''){
            $kitContents='-';
        }else{
            $kitContents = filterStringBasic($_POST['kitContents']);
        }


        $imageCount =       filterStringBasic($_POST['iCount']);
        if(!$_FILES['img1']['name']==''){
            $imageCount=1;
        }
        if(!$_FILES['img2']['name']==''){
            $imageCount=2;
        }
        if(!$_FILES['img3']['name']==''){
            $imageCount=3;
        }


        $fileButton =       filterStringBasic($_POST['file']);
        if(!$_FILES['tutorial_file']['name']==''){
            $fileButton=1;
        }

        $sql = "UPDATE items SET `Full Name` = :fullName, `Short Name` = :shortName, `Original Price` = :oPrice, `Selling Price` = :sPrice, `Description` = :desc, `Specifications` = :specs, `Kit Contents` = :kCont, `Category` = :cat, `Image Count` = :iCount, `File Availability` = :file, `Tags` = :tags WHERE `ID` = :id";

        $statement = $pdo->prepare($sql);

        $statement -> execute(
            [
                'fullName'      => $fullName,
                'shortName'     => $shortName,
                'oPrice'        => $originalPrice,
                'sPrice'        => $sellingPrice,
                'desc'          => $description,
                'specs'         => $specifications,
                'kCont'         => $kitContents,
                'cat'           => $category,
                'iCount'        => $imageCount,
                'file'          => $fileButton,
                'tags'          => $tags,
                'id'            => $id
            ]
        );


        if(!$_FILES['img1']['name']==''){
        
            if(file_exists("../../images/products/".$id.".0.jpg")){

                unlink("../../images/products/".$id.".0.jpg");
            }
    
            if(file_exists("../../images/products/".$id.".1.jpg")){

                unlink("../../images/products/".$id.".1.jpg");
            }
    
            if(file_exists("../../images/products/".$id.".2.jpg")){
                
                unlink("../../images/products/".$id.".2.jpg");
            }   
    
            $target='../../images/products/'.$id.'.0.jpg';
            move_uploaded_file( $_FILES['img1']['tmp_name'], $target);
        }

        if(!$_FILES['img2']['name']==''){
            
            $target='../../images/products/'.$id.'.1.jpg';
            move_uploaded_file( $_FILES['img2']['tmp_name'], $target);
        }
        
        if(!$_FILES['img3']['name']==''){
            
            $target='../../images/products/'.$id.'.2.jpg';
            move_uploaded_file( $_FILES['img3']['tmp_name'], $target);
        }

        if(!$_FILES['tutorial_file']['name']==''){

            if(file_exists('../../downloads/tutorials/tutorial_'.$id.'.zip')){
                unlink('../../downloads/tutorials/tutorial_'.$id.'.zip');
            }
    
            $target='../../downloads/tutorials/tutorial_'.$id.'.zip';
            move_uploaded_file( $_FILES['tutorial_file']['tmp_name'], $target);
        }

        header('Location: ../products.php?id='.$id);

    }elseif($action == 'deleteProduct'){

        if(isset($_GET['id'])){
            $id = filterStringBasic($_GET['id']);
        }else{
            exit("ID Not Found");
        }

        $sql = "UPDATE items SET `Deprecated`=1 WHERE `ID` = :id";
        $statement = $pdo->prepare($sql);
        $statement -> execute(['id' => $id]);

        if(file_exists("../../images/products/".$id.".0.jpg")){
            unlink("../../images/products/".$id.".0.jpg");
        }

        if(file_exists("../../images/products/".$id.".1.jpg")){
            unlink("../../images/products/".$id.".1.jpg");
        }

        if(file_exists("../../images/products/".$id.".2.jpg")){
            unlink("../../images/products/".$id.".2.jpg");
        }   

        if(file_exists('../../downloads/tutorials/tutorial_'.$id.'.zip')){
            unlink('../../downloads/tutorials/tutorial_'.$id.'.zip');
        }
    }

?>