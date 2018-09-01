<?php
    include './includes/config.php';

    $title = 'Member Section - Malgadi Electronics';
    $thisPage = 'home';

    include  './includes/header.php';

    $totalRows = $pdo->query("SELECT count(*) FROM orders WHERE `OStatus`='Placed'")->fetchColumn();
?>

            <section class="grey-text text-darken-3">
                <div class="container">
                    <div class="row"></div>
                    <div class="row">
                        <div class="col s12 center <?php echo $totalRows == 0 ? 'hide' : '' ; ?>">
                            <h4 class="light">Pending Orders</h4>
                        </div>
                    </div>
                    <div class="row"></div>

                    <div class="row <?php echo $totalRows == 0 ? 'hide' : '' ; ?>">
                        <div class="col s10 offset-s1 m4 offset-m4">
                            <select class="browser-default" id="operator">
                                <option value="none" disabled selected>Select Your Name</option>

                                <?php
                                    $members = file_get_contents("../json/team.json");
                                    $members = json_decode($members,true);
                                    foreach ($members as $member) {
                                ?>
                                <option value="<?php echo $member['name'] ;?>"><?php echo $member['name'] ;?></option>
                                <?php
                                    }
                                ?>

                            </select>
                        </div>
                    </div>

                    <div class="row <?php echo $totalRows == 0 ? 'hide' : '' ; ?>">

                        <div class="col s12">
                            <span class="left light-blue-text text-darken-1"><?php echo $totalRows; ?> Pending Orders</span>
                            <a href="#stock-requirement" class="modal-trigger light-blue-text text-darken-1 right">Stock Requirement</a>
                            <br><br>
                        </div>

                        <div class="col s12">
                            <ul class="collapsible popout">

                                    <?php
                                        $cardObject = $pdo->prepare("SELECT * FROM orders WHERE `OStatus`='Placed' ORDER by `ID` DESC");
                                        $cardObject->execute();
                                        include './includes/orderCards.php';
                                    ?>

                            </ul>
                        </div>

                    </div>
                
                    
                    <div class="row <?php echo $totalRows == 0 ? '' : 'hide' ; ?>">
                        <div class="col m4 offset-m4 s8 offset-s2 center grey-text text-darken-2">
                            <img src="./images/nature.png" class="responsive-img">
                        </div>
                        <div class="col s12 center grey-text text-darken-2">
                            <h5 class="light">No Pending Orders</h5>
                            <h6 class="light">Enjoy The Day!</h6>
                        </div>
                    </div>

                </div>
            </section>

            <div id="stock-requirement" class="modal">
                <div class="modal-content">
                    <div class="row">

                        <div class="col s12 center">
                            <h5>Current Stock Requirement</h5>
                            <br><br>
                        </div>

                        <div class="col s12">
                            <table class="striped">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Quantity</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        foreach ($requirement as $reqItem) {
                                            echo "<tr>";
                                            echo "<td>".$reqItem['name']."<br><span class='light green-text'>".$reqItem['idList']."</span></td>
                                                    <td class='right'>".$reqItem['quantity']."</td>";
                                            echo "</tr>";
                                        }
                                    ?>
                                </tbody>
                            </table>
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