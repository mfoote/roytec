
<?php 
    include('../../Database/dbconnect.php');
    include('../../Templates/Header.php');
    include('../../Functions/functions.php');

    getAssyTableView('Schedule_Elevated','table 5');
?>

<body>
    <table class="table responsive-table table-striped" id="draggable">
        <thead class="thead-dark">
            <tr>
                <th>Work Order</th>
                <th>Part Number</th>
                <th>Qty</th>
                <th>Quoted Time</th>
                <th>Notes</th>
                <th>Start</th>
            </tr>
        </thead>
        <tbody>
        <?php foreach($stmt as $row): ?>
                <tr <?php if($row['Status'] == '1'){echo "class='green lighten-4'";} elseif($row['Status']=='2'){ echo "class='red darken-4'";}elseif($row['Status']=='3'){echo "class='yellow lighten-1'";}else{echo "class=''";}?>>
                        <td id='workOrder'><?=$row['WorkOrder'];?></td>
                        <td id='partNumber'><?=$row['PN'];?></td>
                        <td id='Qty'><?=$row['Qty'];?></td>
                        <td id='quotedTime'><?=$row['Quoted_Time'];?></td>
                        <td id='notes'><?=$row['Notes'];?></td>
                        <td><button id='cycleCounter' class='btn btn-success'>Start</button></td>
                </tr>
                <?php endforeach; ?>
        </tbody>
    </table>
    <form type="hidden" id="formAction" action="../Countdown Timer/Table_1.php" method="POST">
        <input type="hidden" name="WorkOrder">
        <input type="hidden" name="partNumber">
        <input type="hidden" name="Qty">
        <input type="hidden" name="QuotedTime">
        <input type= "hidden" name="area">
    </form>
    <script src='../../JS/partcycle.js'></script>
</body>