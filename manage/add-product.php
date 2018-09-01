<?php
    include './includes/config.php';

    if(isset($_SESSION['login'])){
        if($_SESSION['login'] != 1){
            header("Location: ".ManageAddress."/handlers/logout.php");
        }
    }else{
        header("Location: ".ManageAddress."/handlers/logout.php");
    }

    $title = 'Add Product - Malgadi Electronics';
    $thisPage = 'products';

    include  './includes/header.php';
?>

            <section class="grey-text text-darken-3">
                <div class="container">

                    <div class="row"></div>

                    <div class="row">
                        <div class="col s12 center">
                            <h4 class="light">Add Product</h4>
                        </div>
                        <div class="col s12 center">
                            <p class=light"">Please read these <a href="#addIns" class="modal-trigger">instructions</a> carefully before adding a product.</p>
                        </div>
                    </div>

                    <form id="add-product" method="POST" action="handlers/product.php" enctype="multipart/form-data" onsubmit="addProduct()">
                        <input name="action" value="addProduct" class="hide">
                    <div class="row">                        

                        <div class="col s6 m4 offset-m2 input-field">
                            <input id="fullName" type="text" name="fullName" required>
                            <label for="fullName">Full Name*</label>
                        </div>
                        <div class="col s6 m4 input-field">
                            <input id="shortName" type="text" name="shortName" required>
                            <label for="shortName">Short Name*</label>
                        </div>
                        <div class="col s6 m4 offset-m2 input-field">
                            <input id="original_price" type="number" name="originalPrice" required>
                            <label for="original_price">Original Price*</label>
                        </div>
                        <div class="col s6 m4 input-field">
                            <input id="selling_price" type="number" name="sellingPrice" required>
                            <label for="selling_price">Selling Pirce*</label>
                        </div>
                        <div class="col s6 m4 offset-m2 input-field">
                            <textarea id="description" name="description" class="materialize-textarea"></textarea>
                            <label for="description">Description</label>
                        </div>
                        <div class="col s6 m4">
                            <label>Category*</label>
                            <select class="browser-default" name="category" required>
                                <option value="" disabled selected>Choose your option</option>
                                <option value="Basic Components">Basic Components</option>
                                <option value="Robotics">Robotics</option>
                                <option value="Controllers">Controllers</option>
                                <option value="Sensors">Sensors</option>
                                <option value="IC">IC</option>
                                <option value="Kits">Kits</option>
                                <option value="EG Kits">EG Kits</option>
                            </select>
                        </div>
                    
                    </div>
                    
                    <div class="row">
                        
                        <div class="col s6 m4 offset-m2 input-field">
                            <textarea id="specifications" name="specifications" class="materialize-textarea"></textarea>
                            <label for="specifications">Specifications</label>
                        </div>
                        <div class="col s6 m4 input-field">
                            <textarea id="kit_contents" name="kitContents" class="materialize-textarea"></textarea>
                            <label for="kit_contents">Kit Contents</label>
                        </div>

                    </div>

                    <div class="row">
                        <div class="col s6 m4 offset-m2 input-field">
                            <textarea id="tags" name="tags" class="materialize-textarea" required></textarea>
                            <label for="tags">Search Tags*</label>
                        </div>
                    </div>

                    <div class="row">

                        <div class="file-field input-field col s12 m8 offset-m2">
                            <div class="btn blue-grey darken-4">
                                <span>IMG 1*</span>
                                <input type="file" accept=".jpg" name="img1" required>
                            </div>
                            <div class="file-path-wrapper">
                                <input class="file-path validate" type="text">
                            </div>
                        </div>

                        <div class="file-field input-field col s12 m8 offset-m2">
                            <div class="btn blue-grey darken-4">
                                <span>IMG 2</span>
                                <input type="file" accept=".jpg" name="img2">
                            </div>
                            <div class="file-path-wrapper">
                                <input class="file-path validate" type="text">
                            </div>
                        </div>

                        <div class="file-field input-field col s12 m8 offset-m2">
                            <div class="btn blue-grey darken-4">
                                <span>IMG 3</span>
                                <input type="file" accept=".jpg" name="img3">
                            </div>
                            <div class="file-path-wrapper">
                                <input class="file-path validate" type="text">
                            </div>
                        </div>

                        <div class="file-field input-field col s12 m8 offset-m2">
                            <div class="btn blue-grey darken-4">
                                <span>Tutorial File</span>
                                <input type="file" accept=".zip" name="tutorial_file">
                            </div>
                            <div class="file-path-wrapper">
                                <input class="file-path validate" type="text">
                            </div>
                        </div>


                    </div>

                    <div class="row">
                        <div class="col s12 center">
                            <button class="btn-large waves-light waves-effect blue-grey darken-4" type="submit" form="add-product" id="addSubmit">Submit</button>
                        </div>
                    </div>


                    </form>

                </div>
            </section>

            <div id="addIns" class="modal">
                <div class="modal-content">
                    <h4 class="light">Adding a Product</h4>
                    <p class="light">It's important to keep the following things in mind before adding a product.</p>
                    <ul class="collection light">
                        <li class="collection-item">"Full Name" is the name displayed on the product page.</li>
                        <li class="collection-item">"Short Name" is the name displayed on the "cards" in the category page.</li>
                        <li class="collection-item">Original price is the price that will be <strike>striked out</strike>.</li>
                        <li class="collection-item">Selling price is the price with which the item will be sold.</li>
                        <li class="collection-item">Specifications and kit items will be displayed as lists on the product page. Use * to separate every list item. <span class="grey-text">eg. List item 1 * List item 2</span></li>
                        <li class="collection-item">Search tags will be used by the search function for indexing. Add a few tags seperated by space.</li>
                        <li class="collection-item">IMG 1 is compulsory to add, it will be used as the main image of the product.</li>
                        <li class="collection-item">IMG 2 and IMG 3 are optional.</li>
                        <li class="collection-item">The image specs are as follows: Dimensions: 500X400 px. File extension: .jpg</li>
                        <li class="collection-item">The tutorial file should always be a zip file.</li>
                    </ul>
                    <p class="light">If the above conditions are not followed, the website is likely to show errors.</p>
                </div>
                <div class="modal-footer">
                    <a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat">Close</a>
                </div>
            </div>


<?php
    include './includes/footer.php';
?>