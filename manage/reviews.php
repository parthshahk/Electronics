<?php
    include './includes/config.php';

    if(isset($_SESSION['login'])){
        if($_SESSION['login'] != 1){
            header("Location: ".ManageAddress."/handlers/logout.php");
        }
    }else{
        header("Location: ".ManageAddress."/handlers/logout.php");
    }

    $title = 'Reviews - Malgadi Electronics';
    $thisPage = 'reviews';

    include  './includes/header.php';
    
    $cardObject = $pdo->prepare("SELECT * FROM reviews ORDER by `ID` DESC");
    $cardObject->execute();
    $rows = $cardObject->fetchAll();
?>
            <section class="grey-text text-darken-3">
                <div class="container">

                    <div class="row"></div>

                    <div class="row">
                        <div class="col s12 center">
                            <h4 class="light">Reviews</h4>
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
                                        <div class="switch">
                                            <label>
                                                <input onclick="toggleReview(<?php echo $row['ID']; ?>)" type="checkbox" <?php echo $row['Visibility'] ? 'checked' : ''; ?>>
                                                <span class="lever"></span>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="collapsible-body">
                                        <?php echo $row['Date']; ?><br>
                                        <a href="mailto:<?php echo $row['Email']; ?>"><?php echo $row['Email']; ?></a><br>
                                        <?php echo nl2br($row['Review']); ?>
                                        <a href="#" class="right" onclick="deleteReview(<?php echo $row['ID']; ?>)"><i class="fa fa-trash" aria-hidden="true"></i></a>
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