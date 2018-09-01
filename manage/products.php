<?php
    include './includes/config.php';
    include '../includes/helpers.php';

    if(isset($_SESSION['login'])){
        if($_SESSION['login'] != 1){
            header("Location: ".ManageAddress."/handlers/logout.php");
        }
    }else{
        header("Location: ".ManageAddress."/handlers/logout.php");
    }

    $totalRows = $pdo->query('SELECT count(*) FROM items WHERE `Deprecated`=0')->fetchColumn();
    $pagesRequired = ceil($totalRows/10);

    $pageNo = 1;
    if(isset($_GET['page'])){
        if($_GET['page'] != '' && is_numeric($_GET['page']) && $_GET['page']>0 && $_GET['page'] <= $pagesRequired){
            $pageNo = filterStringBasic($_GET['page']);
        }
    }

    $pageOffset = ($pageNo-1)*10;

    if(isset($_GET['id'])){
        if($_GET['id'] != '' && is_numeric($_GET['id'])){
            $id = filterStringBasic($_GET['id']);
        }
    }

    $title = 'Products - Malgadi Electronics';
    $thisPage = 'products';

    include  './includes/header.php';
?>

            <section class="grey-text text-darken-3">
                <div class="container">

                    <div class="row"></div>

                    <div class="row">
                        <div class="col s12 center">
                            <h4 class="light">Products</h4>
                        </div>
                    </div>

                    <div class="row"></div>

                    <div class="row">
                        <form action="products.php" method="GET" id="item-search-form">
                            <div class="col s8 offset-s2 m4 offset-m4 center input-field">
                                <input placeholder="Search" id="item-search" type="number" name="id" value="<?php echo isset($id) ? $id : '' ;?>" autocomplete="off">
                                <label for="order-search">Item ID</label>
                            </div>
                        </form> 
                    </div>

                    <div class="row">
                        <div class="col s12 center">
                            <button class="btn-large waves-effect waves-light blue-grey darken-3" type="submit" form="item-search-form">Search<i class="fa fa-search right" aria-hidden="true"></i></button>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col s12">
                            <a href="add-product.php" class="right"><i class="fa fa-plus" aria-hidden="true"></i> Add Product</a>
                            <a href="#modal-waiting-list" class="left modal-trigger"><i class="fa fa-list-alt" aria-hidden="true"></i> Waiting List</a>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col s12">
                            <ul class="collapsible expandable">

                                    <?php                        
                                        if(isset($id)){

                                            $cardObject = $pdo->prepare("SELECT * FROM items WHERE `ID`=:id && `Deprecated`=0 ORDER by `ID` DESC");
                                            $cardObject->execute(["id" => $id]);
                                            $showPagination = 0;

                                        }else{

                                            $cardObject = $pdo->prepare("SELECT * FROM items WHERE `Deprecated`=0 ORDER by `ID` DESC LIMIT :offset, 10");
                                            $cardObject->execute(["offset" => $pageOffset]);
                                            $showPagination = 1;

                                        }

                                        $rows = $cardObject->fetchAll();

                                        foreach($rows as $row){

                                            $iid = $row['ID'];
                                            $waiting = $pdo->query("SELECT count(*) FROM notify_me WHERE `ID`=$iid")->fetchColumn();

                                    ?>
                                
                                <li id="s<?php echo $row['ID'];?>" class="active">
                                    <div class="collapsible-header"><span><b><?php echo $row['ID']; ?>.</b>&nbsp;&nbsp;<?php echo $row['Full Name']; ?></span></div>
                                    <div class="collapsible-body">
                                        <div class="row">
                                            <div class="col s4 m5">
                                                <img src="<?php echo BaseAddress."/images/products/".$row['ID'].".0.jpg"; ?>" class="responsive-img">
                                            </div>
                                            <div class="col s8 m6 offset-m1">
                                                <p><b>Price:</b> <span class="right">Rs. <?php echo $row['Selling Price']; ?></span></p>

                                                <p><b>Waiting:</b> <span class="right"><?php echo $waiting; ?></span></p>

                                                <p>

                                                    <div class="switch"><b>Stock Status:</b><label class="right">
                                                        <input onclick="toggleStock(<?php echo $row['ID']; ?>)" type="checkbox" <?php echo $row['Stock Status'] ? 'checked' : ''; ?>>
                                                        <span class="lever"></span>
                                                    </label></div>

                                                </p>

                                                <p>

                                                    <div class="switch"><b>Homepage:</b><label class="right">
                                                        <input onclick="toggleHomepage(<?php echo $row['ID']; ?>)" type="checkbox" <?php echo $row['Homepage'] ? 'checked' : ''; ?>>
                                                        <span class="lever"></span>
                                                    </label></div>

                                                </p>

                                                <p>

                                                    <div class="switch"><b>Featured:</b><label class="right">
                                                        <input onclick="toggleFeatured(<?php echo $row['ID']; ?>)" type="checkbox" <?php echo $row['Featured'] ? 'checked' : ''; ?>>
                                                        <span class="lever"></span>
                                                    </label></div>

                                                </p>

                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col s6">
                                                <a href="edit-product.php?q=<?php echo $row['ID']; ?>"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> EDIT</a>
                                            </div>
                                            <div class="col s6 right-align">
                                                <a href="#" onclick="deleteProduct(<?php echo $row['ID']; ?>)"><i class="fa fa-trash" aria-hidden="true"></i> DELETE</a>
                                            </div>
                                        </div>

                                    </div>
                                </li>

                                    <?php
                                        }
                                    ?>
                            </ul>
                        </div>
                    </div>

                    <div class="row <?php echo $showPagination ? '' : 'hide' ?>">
                        <div class="col s12 center">

                            <ul class="pagination">
                                <li class="waves-effect"><a href="products.php?page=<?php echo $pageNo-1; ?>"><i class="fa fa-angle-left" aria-hidden="true"></i></a></li>

                                <?php
                                    for($i=0 ; $i<$pagesRequired ;$i++){
                                ?>

                                <li class="waves-effect <?php echo $pageNo == $i+1 ? 'active' : '';?>"><a href="products.php?page=<?php echo $i+1; ?>"><?php echo $i+1; ?></a></li>

                                <?php
                                    }
                                ?>

                                <li class="waves-effect"><a href="products.php?page=<?php echo $pageNo+1; ?>"><i class="fa fa-angle-right" aria-hidden="true"></i></a></li>
                                
                            </ul>
                        </div>
                    </div>

                </div>
            </section>

            <div id="modal-waiting-list" class="modal">
                <div class="modal-content grey-text text-darken-3">
                    <h4 class="light center">Waiting List</h4>
                        <table class="striped">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Number</th>
                                </tr>
                            </thead>
                            <tbody>
                        <?php
                            $c = $pdo->prepare("SELECT * FROM items WHERE Deprecated=0");
                            $c->execute();
                            $rows2 = $c->fetchAll();
                            
                            foreach($rows2 as $row2){
                                
                                $cid = $row2['ID'];
                                $waitingCount = $pdo->query("SELECT count(*) FROM notify_me WHERE `ID`=$cid")->fetchColumn();

                                if($waitingCount){
                                
                                    $d = $pdo->prepare("SELECT * FROM items WHERE ID=$cid");
                                    $d->execute();
                                    $itemInstance = $d->fetch();
                        ?>
                            <tr>
                                <td><?php echo $itemInstance['Full Name']; ?></td>
                                <td><?php echo $waitingCount; ?></td>
                            </tr>
                    
                        <?php
                                }
                            }
                        ?>
                            </tbody>
                        </table>
                </div>
                <div class="modal-footer">
                    <a href="#!" class="modal-close waves-effect waves-yellow btn-flat">Close</a>
                </div>
            </div>


<?php
    include './includes/footer.php';
?>