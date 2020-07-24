<!DOCTYPE html>

<?php require_once('../Database/dbconnect.php');
        require_once('../Templates/Header.php');
        require('../Functions/functions.php');
        workcenter('Schedule_Assy','ASSY');
?>
<body>
    <table class="table table-striped" id="draggable">
        <thead class="thead-dark">
            <tr >
                <th>Work Order</th>
                <th>Part Number</th>
                <th>Qty</th>
                <th>Quoted Time</th>
                <th >Ship Date</th>
                <th>Notes</th>
                <th>Table</th>
                <th>Completed</th>
                <th></th>
            </tr>
        </thead>
        <tbody id="tableBody">
        <input placeholder='Enter partnumber' class='form-control' id='search'>
        <?php foreach($stmt as $row): ?>
                    <tr id='row' <?php if($row['Status'] == '1'){echo "class='bg-success'";} elseif($row['Status']=='2'){ echo "class='bg-danger '";}elseif($row['Status']=='3'){echo "class='bg-warning'";}else{echo "class=''";}?>>
                        <!--<form action='updateSchedule'> -->
                            <td><?=$row['WorkOrder'];?></td>
                            <td><?=$row['PN'];?></td>
                            <td><?=$row['Qty'];?></td>
                            <td><?=convertTime($row['Quoted_Time']);?></td>
                            <td><?=$row['Ship_Date'];?></td>
                            <td><input type='text' id='notes' value="<?=$row['Notes']?>"></td>
                            <td>
                                <select id='table' class='tableNumber'>
                                    <option selected ="true" disabled="disabled">Select Table</option>
                                    <option value = "table 1" <?php echo($row['Table#'] == 'table 1') ? "Selected": ""; ?>>SOLDER T-1</option>
                                    <option value = "table 2" <?php echo($row['Table#'] == 'table 2') ? "Selected": ""; ?>>SOLDER T-2</option>
                                    <option value = "table 3" <?php echo($row['Table#'] == 'table 3') ? "Selected": ""; ?>>SOLDER T-3</option>
                                    <option value = "table 4" <?php echo($row['Table#'] == 'table 4') ? "Selected": ""; ?>>ASSY T-4</option>
                                    <option value = "table 5" <?php echo($row['Table#'] == 'table 5') ? "Selected": ""; ?>>ASSY T-5</option>
                                    <option value = "table 6" <?php echo($row['Table#'] == 'table 6') ? "Selected": ""; ?>>ASSY T-6</option>
                                    <option value = "table 7" <?php echo($row['Table#'] == 'table 7') ? "Selected": ""; ?>>ASSY T-7</option>
                                    <option value = "table 8" <?php echo($row['Table#'] == 'table 8') ? "Selected": ""; ?>>ASSY T-8</option>
                                    <option value = "table 9" <?php echo($row['Table#'] == 'table 9') ? "Selected": ""; ?>>ASSY T-9</option>
                                    <option value = "table 10" <?php echo($row['Table#'] == 'table 10') ? "Selected": ""; ?>>MSA T-10</option>
                                    <option value = "table 11" <?php echo($row['Table#'] == 'table 11') ? "Selected": ""; ?>>ASSY T-11</option>
                                    <option value = "table 12" <?php echo($row['Table#'] == 'table 12') ? "Selected": ""; ?>>ASSY T-12</option>
                                    <option value = "table 13" <?php echo($row['Table#'] == 'table 13') ? "Selected": ""; ?>>ASSY T-13</option>
                                    <option value = "table 14" <?php echo($row['Table#'] == 'table 14') ? "Selected": ""; ?>>ASSY T-14</option>
                                    <option value = "HARN" <?php echo($row['Table#'] == 'HARN') ? "Selected": ""; ?>>HARN</option>
                                </select>
                            </td>
                            <td>
                                <select id='status'>
                                    <option value = '0' <?php echo($row['Status'] == '0') ?"Selected":"";?>>Not Started</option>
                                    <option value = '1' <?php echo($row['Status'] == '1') ?"Selected":"";?>>Completed</option>
                                    <option value = '2' <?php echo($row['Status'] == '2') ?"Selected":"";?>>On Hold</option>
                                    <option value = '3' <?php echo($row['Status'] == '3') ?"Selected":"";?>>WIP</option>
                                </select>
                            </td>
                            <td><input type='hidden' data-id=<?=$row['id'];?> id='ID'></td>
                        <!--</form>-->
                    </tr> 
        <?php endforeach; ?>

      </tbody>  
    </table>
    <script src='../JS/findpartnumber.js'></script>
</body>
</html>