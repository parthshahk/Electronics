<?php
    include './includes/config.php';
    include './includes/helpers.php';

    $keywords='';
    if(isset($_GET['q'])){
        $keywords = filterStringBasic($_GET['q']);
    }else{
        header("Location: ".BaseAddress);
    }
    

    if($keywords == ''){
        header('Location: '.BaseAddress);
    }

    $keywordsQuery = str_replace(" ","* *",$keywords);
    $keywordsQuery = "*".$keywordsQuery."*";

    $title = "Search for ".$keywords." - Malgadi Electronics";
    $pageDescription = "Malgadi is a for the students, by the student's venture. It is a non-profitable organization started by the college students to provide better quality electronic components at a reasonable rate.";
    $imagePath = BaseAddress."/images/logo.jpg";
    $canonUrl = BaseAddress."/search.php";

    $extendNavbar=0;
    $searchVisibility=1;
    $cartVisibility=1;
    $subtitleVisibility=0;

    include './includes/header.php';
?>
        <script>
            document.addEventListener('DOMContentLoaded', function(){
                document.getElementById("search").value = "<?php echo $keywords; ?>";
            });
        </script>
        <section class="grey-text text-darken-3">
            <div class="container">
                <div class="row">
                    <div class="col s12 center">
                        <h4 class="light" id="search-heading">
                            Search Results for '<?php echo $keywords; ?>'
                        </h4>
                    </div>
                </div>
            </div>
        </section>

        <?php
            $cardObject = $pdo->prepare("SELECT * FROM items WHERE MATCH(Tags) AGAINST(:keywords IN BOOLEAN MODE) && `Category` != 'Kits' ORDER BY MATCH(Tags) AGAINST(:keywords IN BOOLEAN MODE) DESC");
            $cardObject->execute(['keywords' => $keywordsQuery]);
            include './includes/cards.php';

            if($rows == null){
        ?>
            <section class="grey-text text-darken-3">
                <div class="container">
                    <div class="row">
                        <div class="col s12 center">
                            <h5 class="light">
                                No Direct Matches Found
                            </h5>
                        </div>
                    </div>
                </div>
            </section>
            <script>
                document.addEventListener('DOMContentLoaded', function(){
                    document.getElementById("search-heading").classList.add("hide");
                });
            </script>
        <?php
            }
        ?>
        <section class="grey-text text-darken-3">
            <div class="container">
                <div class="row">
                    <div class="col s12 center">
                        <h4 class="light" id="kits-heading">
                            Related Kits
                        </h4>
                    </div>
                </div>
            </div>
        </section>
        <?php
            $cardObject = $pdo->prepare("SELECT * FROM items WHERE MATCH(Tags, `Kit Contents`) AGAINST(:keywords IN BOOLEAN MODE) && `Category`='Kits' ORDER BY MATCH(Tags, `Kit Contents`) AGAINST(:keywords IN BOOLEAN MODE) DESC");
            $cardObject->execute(['keywords' => $keywordsQuery]);
            include './includes/cards.php';
            
            if($rows == null){
        ?>
            <script>
                document.addEventListener('DOMContentLoaded', function(){
                    document.getElementById("kits-heading").classList.add("hide");
                });
            </script>
        <?php
            }
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