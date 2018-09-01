<?php
    $rows = $cardObject->fetchAll();

    foreach($rows as $row){

        $showOp = 1;
        $opText = '';
        if($row['OStatus'] == 'Placed'){

            $oStatus = 'Pending';
            $color = 'amber';
            $showOp = 0;

        }elseif($row['OStatus'] == 'Canceled'){

            $oStatus = $row['OStatus'];
            $color = 'red';
            $opText = 'Order Canceled by ';
        }elseif($row['OStatus'] == 'Delivered'){
            
            $oStatus = $row['OStatus'];
            $color = 'green';
            $opText = 'Marked as delivered by ';
        }

        $contents='';
        $contentArray = explode("*", $row['Contents']);
        for($i = 0; $i < sizeof($contentArray) ;$i++){

            $contentArray[$i] = explode(".", $contentArray[$i]);
            $s = $pdo->prepare("SELECT `Full Name` FROM items WHERE `ID`=".$contentArray[$i][0]."");
            $s->execute();
            $row2 = $s->fetch();
            $contents .= $row2['Full Name']." <b>X ".$contentArray[$i][1]."</b><br>";

            if(!isset($requirement[$contentArray[$i][0]])){
                $requirement[$contentArray[$i][0]]['quantity'] = $contentArray[$i][1];
                $requirement[$contentArray[$i][0]]['name'] = $row2['Full Name'];
                $requirement[$contentArray[$i][0]]['idList'] = $row['ID'];
            }else{
                $requirement[$contentArray[$i][0]]['quantity'] += $contentArray[$i][1];
                $requirement[$contentArray[$i][0]]['name'] = $row2['Full Name'];
                $requirement[$contentArray[$i][0]]['idList'] .= ", ".$row['ID'];
            }

        }
?>

<li id="s<?php echo $row['ID'];?>">
    <div class="collapsible-header"><span><b><?php echo $row['ID']; ?>.</b>&nbsp;&nbsp;<?php echo $row['Name']; ?></span><b class="white-text ostatus <?php echo $thisPage == 'home' ? 'hide' : '' ; echo " ".$color; ?>"><?php echo $oStatus; ?></b></div>
    <div class="collapsible-body">
        <ul class="collection">
            <li class="collection-item <?php echo $showOp ? '' : 'hide'; ?>"><?php echo $opText.$row['Operator']; ?></li>
            <li class="collection-item"><b>Date :&nbsp;</b><?php echo $row['Date']; ?></li>
            <li class="collection-item"><b>Email :&nbsp;</b><a href="mailto:<?php echo $row['Email']; ?>"><?php echo $row['Email']; ?></a></li>
            <li class="collection-item"><b>Phone :&nbsp;</b><a href="tel:<?php echo $row['Mobile']; ?>"><?php echo $row['Mobile']; ?></a></li>
            <li class="collection-item"><b>Address :&nbsp;</b><br><?php echo $row['Address']; ?></li>
            <li class="collection-item"><b>Br/Sem :&nbsp;</b><?php echo $row['Branch']; ?>/<?php echo $row['Semester']; ?></li>
            <li class="collection-item"><b>Contents :&nbsp;</b><br><?php echo $contents; ?></li>
            <li class="collection-item"><b>Amount :&nbsp;</b>Rs. <?php echo $row['Amount']; ?></li>
            <li class="collection-item <?php echo $thisPage == 'home' ? '' : 'hide';?>"><a href="#" onclick="deliver(<?php echo $row['ID']; ?>)">Delivered</a><a href="#" onclick="cancel(<?php echo $row['ID']; ?>)" class="right">Cancel</a></li>
        </ul>
    </div>
</li>

<?php
    }
?>