<?php
    include './includes/config.php';

    $title = 'Statistics - Malgadi Electronics';
    $thisPage = 'stats';

    include  './includes/header.php';
?>

            <section>
                <div class="container">
                    <div class="row"></div>
                    <div class="row">
                        <div class="col s10 offset-s1 m6 offset-m3 center">
                        <table class="striped centered">
                            <thead>
                            <tr>
                                <th>Month</th>
                                <th>Orders</th>
                                <th>Sales</th>
                            </tr>
                            </thead>
                            <tbody>
                                
                                <?php
                                    $c = $pdo->prepare("SELECT * FROM stats");
                                    
                                    $c->execute();

                                    while($row = $c->fetch()){

                                        $month = substr($row['Month'], -5, 3);
                                        $year = '20'.substr($row['Month'], 3);
                                        $monthNumber ='';
                                        
                                        if($month == 'Jan')
                                            $monthNumber = '01';
                                        
                                        if($month == 'Feb')
                                            $monthNumber = '02';
                                        
                                        if($month == 'Mar')
                                            $monthNumber = '03';
                                        
                                        if($month == 'Apr')
                                            $monthNumber = '04';
                                        
                                        if($month == 'May')
                                            $monthNumber = '05';
                                        
                                        if($month == 'Jun')
                                            $monthNumber = '06';
                                        
                                        if($month == 'Jul')                                        
                                            $monthNumber = '07';
                                        
                                        if($month == 'Aug')
                                            $monthNumber = '08';
                                        
                                        if($month == 'Sep')
                                            $monthNumber = '09';
                                        
                                        if($month == 'Oct')
                                            $monthNumber = '10';
                                        
                                        if($month == 'Nov')
                                            $monthNumber = '11';
                                        
                                        if($month == 'Dec')                                        
                                            $monthNumber = '12';

                                        $dateLike = $year.'-'.$monthNumber.'-%';
                                        
                                        $d = $pdo->prepare("SELECT SUM(Amount) as Sales FROM orders WHERE Date LIKE '$dateLike' AND OStatus != 'Canceled'");
                                        $d->execute();
                                        $row2 = $d->fetch();
                                ?>
                                <tr>
                                    <td><?php echo $row['Month'];?></td>
                                    <td><?php echo $row['Orders']; ?></td>
                                    <td><?php echo $row2['Sales'] ? 'Rs. '.$row2['Sales'] : '-'; ?></td>
                                </tr>
                                <?php
                                    }
                                ?>
                            
                            </tbody>
                        </table>
                        </div>
                    </div>
                </div>
            </section>
            <section>
                <div class="row">
                    <div class="col s12 center">
                        <iframe width="100%" height="2500" src="https://datastudio.google.com/embed/reporting/1PpEHg_zShm1ErfYfLZLg2E2NeWgB7JFp/page/uOEW" frameborder="0" style="border:0" allowfullscreen></iframe>
                    </div>
                </div>
            </section>
<?php
    include './includes/footer.php';
?>