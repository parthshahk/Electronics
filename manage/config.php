<?php
    include './includes/config.php';
    include '../includes/helpers.php';

    if(isset($_SESSION['login'])){
        if($_SESSION['login'] != 1){
            header("Location: ".ManageAddress."/handlers/logout.php");
        }
    }else{
        header("Location: ".ManageAddress."/handlers/logout.php");
    }

    $title = 'Configurations - Malgadi Electronics';
    $thisPage = 'config';

    include  './includes/header.php';

    $file='';
    if(isset($_GET['file'])){
        $file = filterStringBasic($_GET['file']);
    }
    
    if($file == ''){
?>

            <section class="grey-text text-darken-3">
                <div class="container">

                    <div class="row"></div>

                    <div class="row">
                        <div class="col s12 center">
                            <h4 class="light">Configurations</h4>
                        </div>
                    </div>

                    <div class="row"></div>

                    <div class="row">
                        <div class="col s10 offset-s1 m4 offset-m4">
                            <form action="config.php" method="GET" id="file-select-form">
                            <select class="browser-default" name="file" required>
                                <option value="" disabled selected>Select File</option>
                                <option value="contacts">Contacts</option>
                                <option value="notifications">Notifications</option>
                                <option value="slider">Slider</option>
                                <option value="team">Team</option>
                            </select>
                            </form>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col s12 center">
                            <button class="btn-large waves-effect waves-light blue accent-2" type="submit" form="file-select-form">Submit</button>
                        </div>
                    </div>
                </div>
            </section>   
            <?php
                }else{
                    
                    $fileContents = file_get_contents("../json/".$file.".json");
                    if($fileContents == null){
                        header("Location: config.php");
                    }
            ?>
            
            <section class="grey-text text-darken-3">
                <div class="container">

                    <div class="row"></div>

                    <div class="row">
                        <div class="col s12 center">
                            <h4 class="light"><?php echo $file;?>.json</h4>
                        </div>
                    </div>

                    <div class="row">
                        <form action="handlers/configurations.php" method="POST" id="file-form">
                        <div class="col s12 input-field">
                            <input type="text" value="<?php echo $file; ?>" class="hide" name="name">
                            <textarea name="contents" class="materialize-textarea fileEditor"><?php echo $fileContents; ?></textarea>
                        </div>
                        </form>
                    </div>

                    <div class="row">
                        <div class="col s12 center">
                            <button class="btn-large waves-effect waves-light blue accent-2" type="submit" form="file-form">Submit</button>
                        </div>
                    </div>
                </div>
            </section>

            <?php
                }
            ?>

<?php
    include './includes/footer.php';
?>