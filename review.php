<?php
    include './includes/config.php';

    $title = "Reviews - Malgadi Electronics";
    $pageDescription = "Malgadi is a for the students, by the student's venture. It is a non-profitable organization started by the college students to provide better quality electronic components at a reasonable rate.";
    $imagePath = BaseAddress."/images/logo.jpg";
    $canonUrl = BaseAddress."/review.php";

    $extendNavbar=0;
    $searchVisibility=0;
    $cartVisibility=1;
    $subtitleVisibility=0;

    include './includes/header.php';

    $statement = $pdo->prepare('SELECT * FROM reviews WHERE Visibility = 1 ORDER BY ID DESC');
    $statement->execute();
    $posts = $statement->fetchAll();
?>
        <section class="grey-text text-darken-2">
            <div class="container">
                <div class="row">
                    <div class="col s12 center">
                        <h4 class="light">Review Us</h4>
                    </div>
                    <div class="col s12 center light">
                        <p>Let us know how feel about Malgadi, we would love to hear from you.</p>
                    </div>
                </div>
            </div>
        </section>

        <section>
            <div class="container">
                <form id="review-form">
                    <div class="row">
                        <div class="col s10 offset-s1 m4 offset-m2 l3 offset-l3 input-field">
                            <input type="text" id="ReviewName" autocomplete="name" required>
                            <label for="name">Name</label>
                        </div>
                        <div class="col s10 offset-s1 m4 l3 input-field">
                            <input type="email" id="ReviewEmail" autocomplete="email" required>
                            <label for="email">Email</label>
                        </div>
                        <div class="col s10 offset-s1 m8 offset-m2 l6 offset-l3 input-field">
                            <textarea class="materialize-textarea charCounter" data-length="1200" id="ReviewMessage" required></textarea>
                            <label for="review">Your Review</label>
                        </div>
                    </div>
                </form>
                <div class="row">
                    <div class="col s12 center">
                        <button class="btn-large waves-light waves-effect red" form="review-form" id="review-submit" type="submit">Post</button>
                    </div>
                </div>
                <div class="row">
                    <div class="col s10 offset-s1 divider"></div>
                </div>
            </div>
        </section>

        <div id="modal-review-success" class="modal">
                <div class="modal-content">
                    <h4 class="light green-text text-darken-1 center">Thank You!</h4>
                    <p class="ligth center">Your review has been submitted successfully.<br>It might soon appear on the reviews page after verification.</p>
                </div>
            <div class="modal-footer">
                <a href="#!" class="modal-close waves-effect waves-green btn-flat">Close</a>
            </div>
        </div>
        <div id="modal-review-failure" class="modal">
                <div class="modal-content">
                    <h4 class="light red-text text-darken-1 center">Oops!</h4>
                    <p class="ligth center">Sorry, suspicious activity was detected in your review or the content was too long.<br>Please try again or contact us directly.</p>
                </div>
            <div class="modal-footer">
                <a href="#!" class="modal-close waves-effect waves-red btn-flat">Close</a>
            </div>
        </div>

        <section>
            <div class="container">
                <div class="row">
                    <div class="col s12 center">
                        <iframe src="https://www.facebook.com/plugins/like.php?href=https%3A%2F%2Fwww.facebook.com%2Fmalgadi.co.in%2F&width=230&layout=standard&action=like&size=small&show_faces=true&share=true&height=80&appId" width="250" height="80" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowTransparency="true" allow="encrypted-media"></iframe>
                    </div>
                </div>
            </div>
        </section>

        <section class="grey-text text-darken-3">
            <div class="container">
                <div class="row">
                    <div class="col s12 center">
                        <h4 class="light">User Reviews</h4>
                    </div>
                </div>
                <div class="row">
                    <div class="col s12">
                        <ul class="collection reviews">
                            <?php
                                foreach ($posts as $post) {   
                            ?>
                            <li class="collection-item">
                                <span class="title">
                                    <i class="fa fa-user left" aria-hidden="true"></i>
                                    <?php echo $post['Name']; ?>
                                </span>
                                <p>
                                    <?php echo nl2br($post['Review']); ?>
                                </p>
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