        <section class="item-cards">
            <div class="container">
                <div class="row">
                    <?php

                        $rows = $cardObject->fetchAll();

                        foreach($rows as $row){

                            $inCart = 0;
                            foreach ($_SESSION['cart'] as $object) {
                                if($object['id'] == $row['ID']){
                                    $inCart = 1;
                                    break;
                                }
                            }
                            
                    ?>
                    <?php
                        if($inCart){
                    ?>
                        <script>
                            document.addEventListener('DOMContentLoaded', function(){
                                modifyInCart(<?php echo $row['ID'] ?>);
                            });
                        </script>
                    <?php
                        }
                    ?>
                    <div class="col xl3 m4 s12">
                        <div class="card grey lighten-3">
                            <div class="card-image">
                                <img class="activator" src="<?php echo BaseAddress; ?>/images/products/<?php echo $row['ID']; ?>.0.jpg" alt="<?php echo $row['Full Name']; ?>">                                
                                <a id="item<?php echo $row['ID']; ?>" class="btn-floating halfway-fab red <?php echo $row['Stock Status'] ? '' : 'hide'; ?>" onclick="addToCart('<?php echo $row['ID']; ?>')">
                                    <i class="fa fa-cart-plus" aria-hidden="true" id="icon<?php echo $row['ID']; ?>"></i>
                                </a>
                                <a class="btn-floating halfway-fab light-blue <?php echo $row['Stock Status'] ? 'hide' : ''; ?>" href="item.php?q=<?php echo $row['ID']; ?>#notify">
                                    <i class="fa fa-bell" aria-hidden="true"></i>
                                </a>
                            </div>
                            <div class="card-content">
                                <span class="card-title activator grey-text text-darken-4 truncate">
                                    <?php echo $row['Short Name']; ?>
                                    <i class="fa fa-ellipsis-v right hide-on-med-and-up" aria-hidden="true"></i>
                                </span>
                                <p class="blue-text <?php echo $row['Stock Status'] ? '' : 'hide'; ?>">Rs. <?php echo $row['Selling Price']; ?> <strike class="grey-text">Rs. <?php echo $row['Original Price']; ?></strike></p>
                                <p class='red-text'><?php echo $row['Stock Status'] ? '' : 'OUT OF STOCK'; ?></p>
                            </div>
                            <div class='card-reveal'>
                                <span class='card-title grey-text text-darken-4'><?php echo $row['Full Name']; ?><i class="fa fa-times right" aria-hidden="true"></i></span>
                                <p>
                                <?php
                                    if($row['Description']!='-'){                                   // If description exists then show description

                                        echo $row['Description'];
                                    }else if($row['Specifications']!='-'){                          // Else if Specifications

                                        echo "<ul>";
                                        $pieces=explode("*",$row['Specifications']);
                                        for($j=0;$j<sizeof($pieces);$j++){

                                            echo "<li>".$pieces[$j]."</li>";
                                        }
                                        echo "</ul>";
                                    }else if($row['Kit Contents']!='-'){                            // Else Kit Contents

                                        echo "<ul>";
                                        $pieces=explode("*",$row['Kit Contents']);
                                        for($j=0;$j<sizeof($pieces);$j++){

                                            echo "<li>".$pieces[$j]."</li>";
                                        }
                                        echo "</ul>";
                                    }
                                ?>
                                </p><p>Open product page for technical details.</p>
                            </div>
                            <div class='card-action'>
                                <a href='item.php?q=<?php echo $row['ID']; ?>' class='blue-text truncate'>Open Page</a>
                            </div>
                        </div>
                    </div>
                    <?php
                        }
                    ?>
                </div>
            </div>
        </section>