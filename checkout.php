<?php
    include './includes/config.php';

    if(!sizeof($_SESSION['cart'])){
        header('Location: cart.php');
    }

    if($_SESSION['subtotal'] < 50){
        header('Location: cart.php');
    }
    

    $title = "Place Your Order - Malgadi Electronics";
    $pageDescription = "Malgadi is a for the students, by the student's venture. It is a non-profitable organization started by the college students to provide better quality electronic components at a reasonable rate.";
    $imagePath = BaseAddress."/images/logo.jpg";
    $canonUrl = BaseAddress."/checkout.php";

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
                    <h5 class="light">Delivery Information</h5>
                </div>
            </div>
        </div>
    </section>

    <section class="grey-text text-darken-3">
        <div class="container">
            <div class="row">
                <form action="handlers/order.php" method="POST" id="order-form" onsubmit="placeOrder()">

                <div class="col s6 m3 offset-m3 xl3 offset-xl3 input-field">
                    <input placeholder="Name" type="text" name="name" autocomplete="name" required>
                </div>

                <div class="col s6 m3 xl3 input-field">
                    <input placeholder="Email" type="email" name="email" autocomplete="email" required>
                </div>

                <div class="col s12 m6 offset-m3 xl6 offset-xl3 input-field">
                    <input placeholder="Address" type="text" name="address" autocomplete="street-address" required>
                </div>

                <div class="col s6 m2 offset-m3 xl2 offset-xl3 input-field">
                    <input placeholder="Phone" type="number" name="phone" autocomplete="tel-national" required>
                </div>

                <div class="col s6 m2 xl2 input-field">
                    <input placeholder="Branch" type="text" name="branch">
                </div>

                <div class="col s6 m2 xl2 input-field">
                    <input placeholder="Semester" type="text" name="semester">
                </div>

                <div class="col s6 m2 offset-m3 xl2 offset-xl3 input-field hide">
                    <input type="text" name="city" value="Nadiad">
                </div>

                <div class="col s6 m2 xl2 input-field hide">
                    <input type="text" name="paymode" value="COD">
                </div>

                </form>
            </div>
        </div>
    </section>

    <section class="grey-text text-darken-1">
        <div class="container">
            <div class="row">
                <div class="col s12 center">
                    <p class="light">Currently we deliver only in Nadiad and accept cash on delivery.</p>
                </div>
                <div class="col s12 center">
                    <p class="light">By using this service, you agree to the <a href="#modal-terms" class="modal-trigger">terms and privacy policy</a> of Malgadi Electronics.</p>
                </div>
            </div>
            <div class="row">
                <div class="col s12 center">
                    <button class="btn-large waves-effect waves-light red" type="submit" form="order-form" id="order-form-button">Place Order</button>
                </div>
            </div>
        </div>
    </section>

    <div id="modal-terms" class="modal modal-fixed-footer">
        <div class="modal-content light">

            <div class="row">
                <div class="col s12 center">
                    <h5 class="light">Terms &amp; Privacy Policy</h5>
                </div>
                <div class="col s12 divider"></div>
            </div>

            <div class="row">
                <div class="col s12">
                    <blockquote>This Privacy Policy governs the manner in which Malgadi Electronics collects, uses, maintains and discloses information collected from users (each, a "User") of the website ("Site"). This privacy policy applies to the Site and all products and services offered by Malgadi Electronics.</blockquote>
                </div>
            </div>

            <div class="row">
                <div class="col s12">
                    <h5 class="light">Product Related Terms</h5>
                </div>
                <div class="col s12">
                    <p>The sole purpose of this initiative is to provide good quality electronic products at a cheaper rate.</p>
                    <p>We usually deliver within 3-5 days, however the time of delivery depends on factors like product availability, holidays, etc.</p>
                    <p>Urgent orders can take atleast upto 12 hours to be processed.</p>
                    <p>We expect the payment to be made either prior to (online payment) or at the time of delivery.</p>
                </div>
            </div>

            <div class="row">
                <div class="col s12">
                    <h5 class="light">Return Policy</h5>
                </div>
                <div class="col s12">
                    <p>We here at Malgadi believe in providing the best quality products. Every product is thoroughly examined for their integrity prior to delivery. However, we don't deliver tested items but we assure you that the items delivered are of the best quality. Thus, we do not guarantee a replacement in case of product damaged by a customer. This follows because the items are not purchased under any sort of warranty/guarantee from the dealer. But, we may offer to fix it for you if possible, so make sure to contact us in such situations.</p>
                </div>
            </div>

            <div class="row">
                <div class="col s12">
                    <h5 class="light">Personal identification information</h5>
                </div>
                <div class="col s12">
                    <p>We may collect personal identification information from Users in a variety of ways, including, but not limited to, when Users visit our site, place an orderfill out a formrespond to a survey and in connection with other activities, services, features or resources we make available on our Site. Users may be asked for, as appropriate, name, email address, phone number, Users may, however, visit our Site anonymously. We will collect personal identification information from Users only if they voluntarily submit such information to us. Users can always refuse to supply personally identification information, except that it may prevent them from engaging in certain Site related activities.</p>
                </div>
            </div>

            <div class="row">
                <div class="col s12">
                    <h5 class="light">Non-personal identification information</h5>
                </div>
                <div class="col s12">
                    <p>We may collect non-personal identification information about Users whenever they interact with our Site. Non-personal identification information may include the browser name, the type of computer and technical information about Users means of connection to our Site, such as the operating system and the Internet service providers utilized and other similar information.</p>
                </div>
            </div>

            <div class="row">
                <div class="col s12">
                    <h5 class="light">Web browser cookies</h5>
                </div>
                <div class="col s12">
                    <p>Our Site may use "cookies" to enhance User experience. User's web browser places cookies on their hard drive for record-keeping purposes and sometimes to track information about them. The sole purpose of doing this is to enhance the user experience.</p>
                </div>
            </div>

            <div class="row">
                <div class="col s12">
                    <h5 class="light">How we protect your information</h5>
                </div>
                <div class="col s12">
                    <p>We adopt appropriate data collection, storage and processing practices and security measures to protect against unauthorized access, alteration, disclosure or destruction of your personal information, username, password, transaction information and data stored on our Site.</p>
                </div>
            </div>

            <div class="row">
                <div class="col s12">
                    <h5 class="light">Your acceptance of these terms</h5>
                </div>
                <div class="col s12">
                    <p>By using this Site, you signify your acceptance of this policy and terms of service. Your continued use of the Site following the posting of changes to this policy will be deemed your acceptance of those changes.</p>
                </div>
            </div>

        </div>
        <div class="modal-footer">
            <a href="#!" class="modal-close waves-effect waves-green btn-flat">Close</a>
        </div>
    </div>


<?php
    include './includes/footer.php';
?>