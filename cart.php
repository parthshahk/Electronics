<?php
    include './includes/config.php';

    $title = "Shopping Cart - Malgadi Electronics";
    $pageDescription = "Malgadi is a for the students, by the student's venture. It is a non-profitable organization started by the college students to provide better quality electronic components at a reasonable rate.";
    $imagePath = BaseAddress."/images/logo.jpg";
    $canonUrl = BaseAddress."/cart.php";

    $extendNavbar=0;
    $searchVisibility=0;
    $cartVisibility=0;
    $subtitleVisibility=0;

    include './includes/header.php';
?>

        <?php
            if(sizeof($_SESSION['cart']) == 0){
        ?>

            <section class="grey-text text-darken-3">
                <div class="container">
                    <div class="row">
                        <div class="row"></div>
                        <div class="row"></div>
                        <div class="col s12 center">
                            <h4 class="light">
                                Your Cart is Empty!
                            </h4>
                        </div>
                        <div class="row"></div>
                        <div class="row"></div>
                    </div>
                </div>
            </section>

            <section class="grey-text text-darken-3">
                <div class="container">
                    <div class="row">
                        <div class="col s12 center">
                            <a class="btn-large waves-light waves-effect green" href="<?php echo BaseAddress; ?>">Continue Shopping<i class="fa fa-shopping-bag right" aria-hidden="true"></i></a>
                        </div>
                    </div>
                </div>
            </section>     
        <?php
            }else{
        ?>
            <section class="grey-text text-darken-3">
                <div class="container">
                    <div class="row">
                        <div class="row"></div>
                        <div class="col s12 center">
                            <h4 class="light">
                                Your Cart
                            </h4>
                        </div>
                    </div>
                </div>
            </section>

            <section class="item-cards">
                <div class="container">
                    <div class="row">
                        <?php
                            for($i=0;$i<sizeof($_SESSION['cart']);$i++){
                                $id = $_SESSION['cart'][$i]['id'];
                                $cardObject = $pdo->prepare("SELECT * FROM items WHERE `ID` = $id");
                                $cardObject->execute();
                                $row = $cardObject->fetch();
                        ?>
                        <div class="col xl3 m4 s10 offset-s1 item-card" id="item<?php echo $row['ID']; ?>">
                            <div class="card grey lighten-3">
                                <div class="card-image">
                                    <img class="activator" src="<?php echo BaseAddress; ?>/images/products/<?php echo $row['ID']; ?>.0.jpg">
                                    <a id="button<?php echo $row['ID']; ?>" class="btn-floating halfway-fab red accent-2 waves-light waves-effect" onclick="removeFromCart(<?php echo $row['ID']; ?>)">
                                        <i class="fa fa-trash" aria-hidden="true"></i>
                                    </a>
                                </div>
                                <div class="card-content">
                                    <a class="card-title activator grey-text text-darken-4 truncate" href="<?php echo BaseAddress ;?>/item.php?q=<?php echo $row['ID'] ?>">
                                        <?php echo $row['Short Name']; ?>
                                    </a>
                                    <p class="blue-text">Rs. <?php echo $row['Selling Price']; ?> <strike class="grey-text">Rs. <?php echo $row['Original Price']; ?></strike></p>
                                </div>

                                <div class="col s12 divider"></div>

                                <div class='light quantity-meter center lighten-3'>
                                    <p>
                                        <span>Quantity :</span> 

                                        <span onclick='quantityDecrease(<?php echo $row['ID']; ?>)' class="quantityButton red-text text-accent-2">
                                            <i class="fa fa-minus-circle" aria-hidden="true"></i>
                                        </span>
                                        
                                        <span id='quantity<?php echo $row['ID']; ?>'><?php echo $_SESSION['cart'][$i]['quantity']; ?></span>
                                        
                                        <span onclick='quantityIncrease(<?php echo $row['ID']; ?>)' class="quantityButton green-text text-accent-4">
                                            <i class="fa fa-plus-circle" aria-hidden="true"></i>
                                        </span>
                                    </p>
                                </div>

                            </div>
                        </div>
                        <?php
                            }
                        ?>
                    </div>
                </div>
            </section>

            <section class="grey-text text-darken-3">
                <div class="container">
                    <div class="row">
                        <div class="col s12">
                            <h4 class="light">
                                Summary
                            </h4>
                        </div>
                        <div class="col s12 divider"></div>
                        <div class="col s6">
                            <h5>Subtotal:</h5>
                        </div>
                        <div class="col s6 right-align">
                            <h5 class="blue-text text-darken-2">

                                <div class="preloader-wrapper small active hide" id="subtotal-preloader">
                                    <div class="spinner-layer spinner-blue-only">
                                        <div class="circle-clipper left">
                                            <div class="circle"></div>
                                        </div>
                                        <div class="gap-patch">
                                            <div class="circle"></div>
                                        </div>
                                        <div class="circle-clipper right">
                                            <div class="circle"></div>
                                        </div>
                                    </div>
                                </div>

                                <span id="subtotal"></span>

                            </h5>
                        </div>
                    </div>
                </div>
            </section>

            <section class="grey-text text-darken-3">
                <div class="container">
                    <div class="row">
                        <div class="col s12 center">
                            <button class="btn-large waves-light waves-effect green" onclick="validateCart()">Checkout<i class="fa fa-shopping-bag right" aria-hidden="true"></i></button>
                        </div>
                    </div>
                </div>
            </section>

            <div id="modal-invalid-subtotal" class="modal">
                <div class="modal-content">
                    <h4 class="light red-text text-darken-1 center">Oops!</h4>
                    <p class="ligth center">A minimum order of Rs. 50 is required to proceed.</p>
                </div>
                <div class="modal-footer">
                    <a href="#!" class="modal-close waves-effect waves-green btn-flat">Close</a>
                </div>
            </div>

            <script>
                document.addEventListener('DOMContentLoaded', function(){
                    updateCartAmount();
                });
            </script>
        <?php
            }
        ?>
<?php
    include './includes/footer.php';
?>