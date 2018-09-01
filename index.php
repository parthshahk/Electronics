<?php
    include './includes/config.php';

    $title = "Malgadi Electronics | Shop Electronic Components Online";
    $pageDescription = "Malgadi is a for the students, by the student's venture. It is a non-profitable organization started by the college students to provide better quality electronic components at a reasonable rate.";
    $imagePath = BaseAddress."/images/logo.jpg";
    $canonUrl = BaseAddress;

    $extendNavbar=1;
    $searchVisibility=1;
    $cartVisibility=1;
    $subtitleVisibility=1;

    include './includes/header.php';
?>
        <!-- Slider -->
        <section>
            <div class="slider">
                <ul class="slides">
                    <?php
                        $slides = file_get_contents("./json/slider.json");
                        $slides = json_decode($slides,true);
                        foreach ($slides as $slide) {
                    ?>
                    <li>
                        <img src="<?php echo BaseAddress; ?><?php echo $slide['image']; ?>" alt="<?php echo $slide['imageAlt']; ?>">
                        <div class="caption <?php echo $slide['alignment']; ?>">
                            <h3 class="<?php echo $slide['captionBigClasslist']; ?>"><?php echo $slide['captionBig']; ?></h3>
                            <h5 class="<?php echo $slide['captionSmallClasslist']; ?>"><?php echo $slide['captionSmall']; ?></h5>
                        </div>
                    </li>
                    <?php
                        }
                    ?>
                </ul>
            </div>
        </section>

        <!-- Featured Cards -->
        <?php
            $cardObject = $pdo->prepare('SELECT * FROM items WHERE `Featured`=1 AND `Deprecated`=0 ORDER by `ID` DESC');
            $cardObject->execute();
            include './includes/cards.php';
        ?>
        
        <section>
            <div class="container">
                <div class="row">
                    <div class="col s12 center">
                        <iframe src="https://www.facebook.com/plugins/like.php?href=https%3A%2F%2Fwww.facebook.com%2Fmalgadi.co.in%2F&width=230&layout=standard&action=like&size=small&show_faces=true&share=true&height=80&appId" width="250" height="80" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowTransparency="true" allow="encrypted-media"></iframe>
                    </div>
                </div>
            </div>
        </section>

        <!-- Social -->
        <section class="light-blue darken-4 social-icons">
            <div class="row center">
                <div class="col s12">
                    <h5 class="light white-text">CONNECT WITH US</h5>
                </div>
                <div class="col s12">
                    <a target="_blank" href="https://www.facebook.com/malgadi.co.in/"><i class="fa fa-facebook-official"></i></a>
                    <a target="_blank" href="https://www.instagram.com/malgadi_ndd/"><i class="fa fa-instagram"></i></a>
                    <a target="_blank" href="https://www.youtube.com/channel/UC37swT-hpPGfXfg01CTPOBQ"><i class="fa fa-youtube-play"></i></a>
                    <a target="_blank" href="mailto:ready2help.malgadi@gmail.com"><i class="fa fa-envelope-o"></i></a>
                    <a class="modal-trigger" href="#contactModal"><i class="fa fa-phone"></i></a>
                </div>
            </div>
        </section>

        <!-- Homepage Cards -->
        <?php
            $cardObject = $pdo->prepare('SELECT * FROM items WHERE `Homepage`=1 AND `Deprecated`=0 ORDER by `ID` DESC');
            $cardObject->execute();
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