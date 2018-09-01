<?php
    include './includes/config.php';

    if(isset($_SESSION['login'])){
        if($_SESSION['login'] != 1){
            header("Location: ".ManageAddress."/handlers/logout.php");
        }
    }else{
        header("Location: ".ManageAddress."/handlers/logout.php");
    }

    $title = 'Messages - Malgadi Electronics';
    $thisPage = 'messages';

    include  './includes/header.php';
    
    $cardObject = $pdo->prepare("SELECT * FROM contact ORDER by `ID` DESC");
    $cardObject->execute();
    $rows = $cardObject->fetchAll();
?>
            <section class="grey-text text-darken-3">
                <div class="container">

                    <div class="row"></div>

                    <div class="row">
                        <div class="col s12 center">
                            <h4 class="light">Messages</h4>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col s12">

                            <ul class="collapsible">

                                <?php
                                    foreach($rows as $row){
                                ?>

                                <li id="s<?php echo $row['ID']; ?>">
                                    <div class="collapsible-header">
                                        <?php echo $row['Name']; ?>
                                        <span><?php echo $row['Date']; ?></span>                                        
                                    </div>
                                    <div class="collapsible-body">
                                        <a href="tel:<?php echo $row['Mob']; ?>"><?php echo $row['Mob']; ?></a><br>
                                        <a href="mailto:<?php echo $row['Email']; ?>"><?php echo $row['Email']; ?></a><br>
                                        <?php echo nl2br($row['Message']); ?>
                                        <a href="#" class="right" onclick="deleteMessage(<?php echo $row['ID']; ?>)"><i class="fa fa-trash" aria-hidden="true"></i></a>
                                    </div>
                                </li>
                                <?php
                                    }
                                ?>

                            </ul>
                        </div>
                    </div>
                </div>
            </section>
<?php
    include './includes/footer.php';
?>