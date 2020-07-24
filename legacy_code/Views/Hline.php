<!DOCTYPE html>

    <?php require('../Database/dbconnect.php');
          require('../Templates/Header.php');
          workcenter('Schedule_Assy','HLINE');
    ?>
<body>
    <table class="table table-striped" id="draggable">
        <thead class="thead-dark">
            <tr>
                <th>Work Order</th>
                <th>Part Number</th>
                <th>Qty</th>
                <th>Start Date</th>
                <th>Ship Date</th>
                <th>Notes</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
        <?php
            foreach($stmt as $row): ?>
                    <tr id='row' <?php if($row['Status'] == '1'){echo "class='bg-success'";} elseif($row['Status']=='2'){ echo "class='bg-danger'";}else{echo "class=''";}?>>
                        <form action='updateSchedule'>
                            <td><?=$row['WorkOrder'];?></td>
                            <td><?=$row['PN'];?></td>
                            <td><?=$row['Qty'];?></td>
                            <td><?=$row['Start_Date'];?></td>
                            <td><?=$row['Ship_Date'];?></td>
                            <td><input type='text' id='notes' value=<?=$row['Notes'];?>></td>
                            <td>
                                <select id='status'>
                                    <option value = '0' <?php echo($row['Status'] == '0') ?"Selected":"";?>>Not Started</option>
                                    <option value = '1'<?php echo($row['Status'] == '1') ?"Selected":"";?>>Completed</option>
                                    <option value = '2' <?php echo($row['Status'] == '2') ?"Selected":"";?>>On Hold</option>
                                </select>
                            </td>
                            <input type='hidden' data-id=<?=$row['id'];?> id='ID'>
                        </form>
                    </tr> 
            <?php endforeach; ?>

      </tbody>  
    </table>
</body>
</html>