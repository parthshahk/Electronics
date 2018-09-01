<?php
    include './includes/config.php';
    include './includes/helpers.php';

    $id='';
    if(isset($_GET['q'])){
        $id = filterStringBasic($_GET['q']);
    }else{
        header("Location: ".BaseAddress);
    }

    $title = "Order Placed Successfully - Malgadi Electronics";
    $pageDescription = "Malgadi is a for the students, by the student's venture. It is a non-profitable organization started by the college students to provide better quality electronic components at a reasonable rate.";
    $imagePath = BaseAddress."/images/logo.jpg";
    $canonUrl = BaseAddress."/thankyou.php";

    $extendNavbar=0;
    $searchVisibility=0;
    $cartVisibility=0;
    $subtitleVisibility=0;

    include './includes/header.php';
?>

        <section class="grey-text text-darken-3">
            <div class="container">
                <div class="row"></div>
                <div class="row">
                    <div class="col s12 center">
                        <h5 class="light green-text">ORDER PLACED SUCCESSFULLY!</h5>
                    </div>
                </div>
                <div class="row">
                    <div class="col s12 center">
                        <h5 class="light">Your Order id is <span class="purple-text"><b><?php echo $id; ?></b></span></h5>
                        <p class="light">Kindly note it down for future reference.</p>
                    </div>
                </div>
                <div class="row"></div>
                <div class="row">
                    <div class="col s12 center">
                        <iframe src="https://www.facebook.com/plugins/like.php?href=https%3A%2F%2Fwww.facebook.com%2Fmalgadi.co.in%2F&width=230&layout=standard&action=like&size=small&show_faces=true&share=true&height=80&appId" width="250" height="80" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowTransparency="true" allow="encrypted-media"></iframe>
                    </div>
                </div>
                <div class="row"></div>
                <div class="row">
                    <div class="col s12 center">
                        <a href="<?php echo BaseAddress; ?>" class="btn-large red waves-light waves-effect">Home</a>
                    </div>
                </div>
            </div>
        </section>

        <script>
            document.addEventListener('DOMContentLoaded', function(){
                sendNotifications(<?php echo $id; ?>);
            });
        </script>

<?php
    include './includes/footer.php';
?>