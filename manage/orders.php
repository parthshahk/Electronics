<?php
    include './includes/config.php';
    include '../includes/helpers.php';

    $totalRows = $pdo->query('SELECT count(*) FROM orders')->fetchColumn();
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

    $title = 'Member Section - Malgadi Electronics';
    $thisPage = 'orders';

    include  './includes/header.php';
?>

        <section class="grey-text text-darken-3">
                <div class="container">

                    <div class="row"></div>

                    <div class="row">
                        <div class="col s12 center">
                            <h4 class="light">Orders</h4>
                        </div>
                    </div>

                    <div class="row"></div>

                    <div class="row">
                        <form action="orders.php" method="GET" id="order-search-form">
                            <div class="col s8 offset-s2 m4 offset-m4 center input-field">
                                <input placeholder="Search" id="order-search" type="number" name="id" value="<?php echo isset($id) ? $id : '' ;?>" autocomplete="off">
                                <label for="order-search">Order ID</label>
                            </div>
                        </form> 
                    </div>

                    <div class="row">
                        <div class="col s12 center">
                            <button class="btn-large waves-effect waves-light blue-grey darken-3" type="submit" form="order-search-form">Search<i class="fa fa-search right" aria-hidden="true"></i></button>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col s12">
                            <ul class="collapsible popout">

                                    <?php                        
                                        if(isset($id)){

                                            $cardObject = $pdo->prepare("SELECT * FROM orders WHERE `ID`=:id ORDER by `ID` DESC");
                                            $cardObject->execute(["id" => $id]);
                                            $showPagination = 0;

                                        }else{

                                            $cardObject = $pdo->prepare("SELECT * FROM orders ORDER by `ID` DESC LIMIT :offset, 10");
                                            $cardObject->execute(["offset" => $pageOffset]);
                                            $showPagination = 1;

                                        }

                                        include './includes/orderCards.php';
                                    ?>

                            </ul>
                        </div>
                    </div>

                    <div class="row <?php echo $showPagination ? '' : 'hide' ?>">
                        <div class="col s12 center">

                            <ul class="pagination">
                                <li class="waves-effect"><a href="orders.php?page=<?php echo $pageNo-1; ?>"><i class="fa fa-angle-left" aria-hidden="true"></i></a></li>

                                <?php
                                    for($i=0 ; $i<$pagesRequired ;$i++){
                                ?>

                                <li class="waves-effect <?php echo $pageNo == $i+1 ? 'active' : '';?>"><a href="orders.php?page=<?php echo $i+1; ?>"><?php echo $i+1; ?></a></li>

                                <?php
                                    }
                                ?>

                                <li class="waves-effect"><a href="orders.php?page=<?php echo $pageNo+1; ?>"><i class="fa fa-angle-right" aria-hidden="true"></i></a></li>
                                
                            </ul>
                        </div>
                    </div>
                </div>
            </section>

<?php
    include './includes/footer.php';
?>