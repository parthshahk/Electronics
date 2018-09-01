<?php
    include './includes/config.php';
    include './includes/helpers.php';

    $title = "Track Order - Malgadi Electronics";
    $pageDescription = "Malgadi is a for the students, by the student's venture. It is a non-profitable organization started by the college students to provide better quality electronic components at a reasonable rate.";
    $imagePath = BaseAddress."/images/logo.jpg";
    $canonUrl = BaseAddress."/cart.php";

    $extendNavbar=0;
    $searchVisibility=0;
    $cartVisibility=0;
    $subtitleVisibility=0;

    include './includes/header.php';

    $state = 'fresh';
    if(isset($_GET)){
        if(isset($_GET['id']) && isset($_GET['email'])){
            
            $id = filterStringBasic($_GET['id']);
            $email = filterStringBasic($_GET['email']);

            $cardObject = $pdo->prepare("SELECT * FROM orders WHERE ID=:id AND Email=:email");
            $cardObject->execute(['id' => $id, 'email' => $email]);
            $row = $cardObject->fetch();

            if(!$row){
                $state = 'not-found';
            }else{
                $state = 'found';
            }
            
        }
    }
?>

    <section>
        <div class="container">

            <div class="row"></div>

            <form action="track.php" method="get" id="track-order" class="<?php echo $state == 'fresh' ? '' : 'hide'; ?>">

                <div class="row">
                    <div class="col s12 center">
                        <h4 class="light">Track Order</h4>
                    </div>
                </div>

                <div class="row">
                    <div class="col s6 input-field">
                        <input placeholder="Order ID" type="number" name="id" autocomplete="off" required>
                    </div>
                    <div class="col s6 input-field">
                        <input placeholder="Email" type="email" name="email" autocomplete="off" required>
                    </div>
                </div>
                <div class="row">
                    <div class="col s12 center">
                        <button class="btn-large red waves-effect waves-light" type="submit" form="track-order"><i class="fa fa-search left"></i>Search</button>
                    </div>
                </div>

            </form>

            <?php
                if($state == 'found'){

                    if($row['OStatus'] == 'Canceled'){
                        $statusColor = 'red-text text-darken-1';

                    }else if($row['OStatus'] == 'Placed'){
                        $statusColor = 'amber-text text-darken-4';

                    }else if($row['OStatus'] == 'Delivered'){
                        $statusColor = 'green-text text-darken-3';
                    }

                    $contents='';
                    $contentArray = explode("*", $row['Contents']);
                    for($i = 0; $i < sizeof($contentArray) ;$i++){

                        $contentArray[$i] = explode(".", $contentArray[$i]);
                        $s = $pdo->prepare("SELECT `Full Name` FROM items WHERE `ID`=".$contentArray[$i][0]."");
                        $s->execute();
                        $row2 = $s->fetch();
                        $contents .= $row2['Full Name']." <b>X ".$contentArray[$i][1]."</b><br>";

                        if(!isset($requirement[$contentArray[$i][0]])){
                            $requirement[$contentArray[$i][0]]['quantity'] = $contentArray[$i][1];
                            $requirement[$contentArray[$i][0]]['name'] = $row2['Full Name'];
                            $requirement[$contentArray[$i][0]]['idList'] = $row['ID'];
                        }else{
                            $requirement[$contentArray[$i][0]]['quantity'] += $contentArray[$i][1];
                            $requirement[$contentArray[$i][0]]['name'] = $row2['Full Name'];
                            $requirement[$contentArray[$i][0]]['idList'] .= ", ".$row['ID'];
                        }

                    }
            ?>

            <div class="row">

                <div class="col s12 center">
                    <h4 class="light">Order <span class="blue-text text-darken-3"><?php echo $row['ID']; ?></span></h4>
                    <h6>Status: <span class="<?php echo $statusColor; ?>"><?php echo $row['OStatus']; ?></span></h6>
                    <br>
                </div>

                <div class="col s12">
                    <ul class="collection">
                        <li class="collection-item"><span class="blue-text text-darken-4">Name</span> : <?php echo $row['Name']; ?></li>
                        <li class="collection-item"><span class="blue-text text-darken-4">Date</span> : <?php echo $row['Date']; ?></li>
                        <li class="collection-item"><span class="blue-text text-darken-4">Email</span> : <?php echo $row['Email']; ?></li>
                        <li class="collection-item"><span class="blue-text text-darken-4">Phone</span> : <?php echo $row['Mobile']; ?></li>
                        <li class="collection-item"><span class="blue-text text-darken-4">Address</span> : <?php echo $row['Address']; ?></li>
                        <li class="collection-item"><span class="blue-text text-darken-4">Contents</span> :<br><?php echo $contents; ?></li>
                        <li class="collection-item"><span class="blue-text text-darken-4">Amount</span> : Rs. <?php echo $row['Amount']; ?></li>
                    </ul>
                </div>

            </div>

            <div class="row">
                <div class="col s12 center">
                    <a href="./" class="btn-large red waves-light waves-effect">Home</a>
                </div>
            </div>

            <?php
                }
            ?>

            <div class="row <?php echo $state == 'not-found' ? '' : 'hide'; ?>">
                <div class="col s12 center">
                    <h4 class="light">Order Not Found :(</h4>
                    <br>
                    <p>Please make sure you entered correct Order ID and Email associated with that order.</p>
                    <br>
                    <a href="track.php" class="btn-large red waves-effect waves-light">Try Again</a>
                </div>
            </div>

        </div>
    </section>

<?php
    include './includes/footer.php';
?>