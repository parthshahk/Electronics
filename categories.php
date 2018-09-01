<?php
    include './includes/config.php';
    include './includes/helpers.php';

    $cat = '';
    if(isset($_GET['q'])){
        $cat = $_GET['q'];
        $cat = filterStringBasic($cat);
    }else{
        header('Location: '.BaseAddress);
    }
    
    $title = "Shop ".$cat." Online Now - Malgadi Electronics";
    $pageDescription = "The following is our catalog of ".$cat.". Shop them now at the most reasonable rates at Malgadi Electronics! Malgadi is a for the students, by the students venture started by college students.";
    $imagePath = BaseAddress."/images/logo.jpg";
    $canonUrl = BaseAddress."/categories.php?q=".urlencode($cat);

    $extendNavbar=0;
    $searchVisibility=1;
    $cartVisibility=1;
    $subtitleVisibility=0;

    include './includes/header.php';
?>

        <section class="grey-text text-darken-3">
            <div class="container">
                <div class="row">
                    <div class="col s12 center">
                        <h4 class="light"><?php echo $cat; ?></h4>
                    </div>
                </div>
            </div>
        </section>

        <?php
            $cardObject = $pdo->prepare('SELECT * FROM items WHERE `Category`= :cat AND `Deprecated`=0 ORDER by `ID` DESC');
            $cardObject->execute(['cat' => $cat]);
            include './includes/cards.php';
        ?>

        <section class="grey-text text-darken-3 hide-on-large-only">
            <div class="container">
                <div class="row">
                    <div class="col s12 center">
                        <button class="btn-large waves-light waves-effect red" onclick="openSidenav()">Browse Categories<i class="fa fa-list right" aria-hidden="true"></i></button>
                    </div>
                </div>
            </div>
        </section>

<?php
include './includes/footer.php';
?>