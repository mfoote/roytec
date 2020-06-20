
<?php 
    include('../../Database/dbconnect.php');
    include('../../Templates/Header.php');
    include('../../Functions/functions.php');

    getAssyTableView('Schedule_Assy','table 8');
?>

<body>
    <table class="table table-striped" id="draggable">
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
                <tr>
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
    <script src='../../JS/partcycle.js'></script>
</body>