<?php
    include './includes/config.php';

    $title = "About Us - Malgadi Electronics";
    $pageDescription = "Malgadi is a for the students, by the student's venture. It is a non-profitable organization started by the college students to provide better quality electronic components at a reasonable rate.";
    $imagePath = BaseAddress."/images/logo.jpg";
    $canonUrl = BaseAddress."/about.php";

    $extendNavbar=0;
    $searchVisibility=0;
    $cartVisibility=1;
    $subtitleVisibility=0;

    include './includes/header.php';
?>
        <section class="grey-text text-darken-3 grey lighten-4" id="details">
            <div class="container">
                <div class="row">
                    <div class="col s12 center">
                        <h4 class="light">About Us</h4>
                    </div>
                    <div class="col s12">
                        <p class="light">
                            Malgadi is a non profitable organisation run by college students to provide the best quality electronics components at reasonable rates. We here at Malgadi intend to develop the platform whereby selling electronic components and help college students.  Along with this, we also organize workshops and seminars in colleges to impart technical knowledge to students.
                        </p>
                        <p class="light">
                            This website contains a huge catalog of various electronic components you need for your project. Moreover, we also have various project kits that contain all the components for a particular project. We also take bulk orders for workshops and seminars.
                        </p>
                        <p class="light">
                            We believe in providing the best quality of service to our customers, all products at Malgadi Electronics are verified for their integrity by our experts.
                        </p>
                    </div>
                </div>
            </div>
        </section>

        <section>
            <div class="container">
                <div class="row">
                    <div class="col s12 center">
                        <iframe src="https://www.facebook.com/plugins/like.php?href=https%3A%2F%2Fwww.facebook.com%2Fmalgadi.co.in%2F&width=230&layout=standard&action=like&size=small&show_faces=true&share=true&height=80&appId" width="250" height="80" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowTransparency="true" allow="encrypted-media"></iframe>
                    </div>
                </div>
            </div>
        </section>

        <section id="photos" class="grey-text text-darken-3">
            <div class="container">
                <div class="row">
                    <div class="col s12 center">
                        <h5 class="light">Meet The Team</h5>
                    </div>
                    <div class="col s12 center">
                        <p class="light">We are passionate about Malgadi and strive to work together to provide the best service to our customers.</p>
                    </div>
                    <div class="col s10 offset-s1 divider"></div>
                </div>
                <div class="row center">
                    <?php
                        $members = file_get_contents("./json/team.json");
                        $members = json_decode($members,true);
                        foreach ($members as $member) {
                    ?>
                    <div class="col s12 m4 l3">
                        <img src="<?php echo BaseAddress; ?><?php echo $member['image']; ?>" class="circle">
                        <h5 class="light"><?php echo $member['name']; ?></h5>
                    </div>
                    <?php } ?>
                </div>
            </div>
        </section>
<?php
    include './includes/footer.php';
?>