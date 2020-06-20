<?php
    include('../../Database/dbconnect.php');
    include('../../Templates/Header.php');
    include('../../Functions/functions.php');
    
    $contract =  $_POST['WorkOrder'];
    $area = $_POST['area'];
    Hoistway_Select_Parts($area,$contract);
?>

<table class="table responsive-table table-striped table-center" id="draggable">
        <thead class="thead-dark">
            <tr class='center-align'>
                <th>Contract</th>
                <th>Part Number</th>
                <th>Qty</th>
                <th>Quoted Time</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
        <?php foreach($results as $row): ?>
                <tr <?php if($row['Grabbed'] == '1'){echo "class='yellow lighten-1'";} else{echo "class=''";}?>>
                    <td id='contract'><?=$row['CONTRACT#'];?></td>
                    <td id='partNumber'><?=$row['Item'];?></td>
                    <td id='qty'><?=$row['Qty'];?></td>
                    <td id='quotedTime'><?=date('i:s',strtotime($row['RTIME']));?></td>
                    <td><button id='cycleCounter' class='btn btn-success'>Start</button></td>
                </tr>
                <?php endforeach;?>
        </tbody>
    </table>
    <form type="hidden" id="formAction" action="countdownTimer.php" method="POST">
        <input type="hidden" name="WorkOrder">
        <input type="hidden" name="partNumber">
        <input type="hidden" name="Qty">
        <input type="hidden" name="QuotedTime">
        <input type="hidden" name="area" value="<?=$area?>">
    </form>
    <script type="text/javascript" src="../../JS/hoistwayGrabbed.js"></script>