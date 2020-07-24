<!DOCTYPE html>
<header>
<?php require_once('../Database/dbconnect.php');
        require_once('../Templates/Header.php');
        require('../Functions/functions.php');
        workcenter('Schedule_Elevated','ELEVT');
        date_default_timezone_set('America/New_York');
?>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.blockUI/2.70/jquery.blockUI.js"></script>
</header>

<body>
<input type='text' id='search' placeholder='Search...'>
    <ul class='collapsible' data-collapsible='expandable'>
        <li>     
            <div class='collapsible-header'><h6>Table 1</h6></div>
            <div class='collapsible-body'>
                <table class='centered'>
                    <thead>
                        <th>Work Order</th>
                        <th>Part Number</th>
                        <th>Quantity</th>
                        <th>Quoted Time</th>
                        <th>Ship Date</th>
                        <th>Notes</th>
                        <th>Reassign Table</th>
                        <th>Status</th>
                    </thead>
                    <tbody>
                            <?php 
                            foreach($results as $row)
                            {
                                if ($row['Table#'] !== "table 1") 
                                {
                                    continue;
                                }
                                else
                                {
                            ?>
                                    <tr id='searchable' <?php if($row['Status'] == '1'){echo "class='green lighten-4'";} elseif($row['Status']=='2'){ echo "class='red darken-4'";}elseif($row['Status']=='3'){echo "class='yellow lighten-1'";}else{echo "class=''";}?>>
                                        <td id="WO"><?=$row["WorkOrder"]?></td>
                                        <td id="PN"><?=$row["PN"]?></td>
                                        <td><?=$row["Qty"]?></td>
                                        <td><?=convertTime($row["Quoted_Time"])?></td>
                                        <td><?=$row["Ship_Date"]?></td>
                                        <td>
                                            <div class='input-field inline'>
                                                <input type='text' value='<?=$row["Notes"]?>' class='center-align' id='notes'>
                                            </div>
                                        </td>
                                        <td>
                                            <div class='input-field inline'>
                                                <select id='table'>
                                                    <option value='table 1' <?php echo($row['Table#'] == 'table 1') ? "Selected": ""; ?>>Table 1</option>
                                                    <option value='table 2' <?php echo($row['Table#'] == 'table 2') ? "Selected": ""; ?>>Table 2</option>
                                                    <option value='table 3' <?php echo($row['Table#'] == 'table 3') ? "Selected": ""; ?>>Table 3</option>
                                                    <option value='table 4' <?php echo($row['Table#'] == 'table 4') ? "Selected": ""; ?>>Table 4</option>
                                                    <option value='table 5' <?php echo($row['Table#'] == 'table 5') ? "Selected": ""; ?>>Table 5</option>
                                                    <option value='table 6' <?php echo($row['Table#'] == 'table 6') ? "Selected": ""; ?>>Table 6</option>
                                                    <option value='table 7' <?php echo($row['Table#'] == 'table 7') ? "Selected": ""; ?>>Table 7</option>
                                                    <option value='table 8' <?php echo($row['Table#'] == 'table 8') ? "Selected": ""; ?>>Table 8</option>
                                                    <option value='table 9' <?php echo($row['Table#'] == 'table 9') ? "Selected": ""; ?>>Table 9</option>
                                                    <option value='table 11' <?php echo($row['Table#'] == 'table 11') ? "Selected": ""; ?>>Table 11</option>
                                                    <option value='AQJFIX' <?php echo($row['Table#'] == 'AQJFIX') ? "Selected": ""; ?>>AQJ Fixture</option>
                                                    <option value='BSFIX1' <?php echo($row['Table#'] == 'BSFIX1') ? "Selected": ""; ?>>BS Fixture 1</option>
                                                    <option value='BSFIX2' <?php echo($row['Table#'] == 'BSFIX2') ? "Selected": ""; ?>>BS Fixture 2</option>
                                                    <option value='HARNESS' <?php echo($row['Table#'] == 'HARNESS') ? "Selected": ""; ?>>HARNESS</option>
                                                    <option value='SONIC WELD' <?php echo($row['Table#'] == 'SONIC WELD') ? "Selected": ""; ?>>SONIC WELD</option>
                                                    <option value='BAGGING' <?php echo($row['Table#'] == 'BAGGING') ? "Selected": ""; ?>>BAGGING</option>
                                                    <option value='INKJET' <?php echo($row['Table#'] == 'INKJET') ? "Selected": ""; ?>>INKJET</option>
                                                    <option value='CONDUIT' <?php echo($row['Table#'] == 'CONDUIT') ? "Selected": ""; ?>>CONDUIT</option>
                                                </select>
                                            </div>  
                                        </td>
                                        <td>
                                            <div class='input-field inline' id='status'>
                                                <select>
                                                    <option value='0' <?php echo($row['Status'] == '0') ? "Selected": ""; ?>>Not Started</option>
                                                    <option value='1' <?php echo($row['Status'] == '1') ? "Selected": ""; ?>>Completed</option>
                                                    <option value='2' <?php echo($row['Status'] == '2') ? "Selected": ""; ?>>On Hold</option>
                                                    <option value='3' <?php echo($row['Status'] == '3') ? "Selected": ""; ?>>WIP</option>
                                                </select>
                                            </div>
                                        </td>
                                        <td>
                                            <a class="waves-effect waves-light btn" id='material'>Order Material</a>
                                        </td>
                                        <td>
                                            <a class="waves-effect waves-light btn" id='recordTime'>Record Time</a>
                                        </td>
                                        <td style="display:none" id="ID" data-id=<?=$row['id']?>><?=$row['id']?></td>  
                                    </tr>
                                
                            
                        <?php } }?>
                    </tbody>
                </table>
            </div>
        </li>
        <li>     
            <div class='collapsible-header'><h6>Table 2</h6></div>
            <div class='collapsible-body'>
                <table class='centered'>
                    <thead>
                        <th>Work Order</th>
                        <th>Part Number</th>
                        <th>Quantity</th>
                        <th>Quoted Time</th>
                        <th>Ship Date</th>
                        <th>Notes</th>
                        <th>Reassign Table</th>
                        <th>Status</th>
                    </thead>
                    <tbody>
                            <?php 
                            foreach($results as $row)
                            {
                                if ($row['Table#'] !== "table 2") 
                                {
                                    continue;
                                }
                                else
                                {
                            ?>
                                    <tr id='searchable' <?php if($row['Status'] == '1'){echo "class='green lighten-4'";} elseif($row['Status']=='2'){ echo "class='red darken-4'";}elseif($row['Status']=='3'){echo "class='yellow lighten-1'";}else{echo "class=''";}?>>
                                        <td id="WO"><?=$row["WorkOrder"]?></td>
                                        <td id="PN"><?=$row["PN"]?></td>
                                        <td><?=$row["Qty"]?></td>
                                        <td><?=convertTime($row["Quoted_Time"])?></td>
                                        <td><?=$row["Ship_Date"]?></td>
                                        <td>
                                            <div class='input-field inline'>
                                                <input type='text' value='<?=$row["Notes"]?>' class='center-align' id='notes'>
                                            </div>
                                        </td>
                                        <td>
                                            <div class='input-field inline'>
                                                <select id='table'>
                                                    <option value='table 1' <?php echo($row['Table#'] == 'table 1') ? "Selected": ""; ?>>Table 1</option>
                                                    <option value='table 2' <?php echo($row['Table#'] == 'table 2') ? "Selected": ""; ?>>Table 2</option>
                                                    <option value='table 3' <?php echo($row['Table#'] == 'table 3') ? "Selected": ""; ?>>Table 3</option>
                                                    <option value='table 4' <?php echo($row['Table#'] == 'table 4') ? "Selected": ""; ?>>Table 4</option>
                                                    <option value='table 5' <?php echo($row['Table#'] == 'table 5') ? "Selected": ""; ?>>Table 5</option>
                                                    <option value='table 6' <?php echo($row['Table#'] == 'table 6') ? "Selected": ""; ?>>Table 6</option>
                                                    <option value='table 7' <?php echo($row['Table#'] == 'table 7') ? "Selected": ""; ?>>Table 7</option>
                                                    <option value='table 8' <?php echo($row['Table#'] == 'table 8') ? "Selected": ""; ?>>Table 8</option>
                                                    <option value='table 9' <?php echo($row['Table#'] == 'table 9') ? "Selected": ""; ?>>Table 9</option>
                                                    <option value='table 11' <?php echo($row['Table#'] == 'table 11') ? "Selected": ""; ?>>Table 11</option>
                                                    <option value='AQJFIX' <?php echo($row['Table#'] == 'AQJFIX') ? "Selected": ""; ?>>AQJ Fixture</option>
                                                    <option value='BSFIX1' <?php echo($row['Table#'] == 'BSFIX1') ? "Selected": ""; ?>>BS Fixture 1</option>
                                                    <option value='BSFIX2' <?php echo($row['Table#'] == 'BSFIX2') ? "Selected": ""; ?>>BS Fixture 2</option>
                                                    <option value='HARNESS' <?php echo($row['Table#'] == 'HARNESS') ? "Selected": ""; ?>>HARNESS</option>
                                                    <option value='SONIC WELD' <?php echo($row['Table#'] == 'SONIC WELD') ? "Selected": ""; ?>>SONIC WELD</option>
                                                    <option value='BAGGING' <?php echo($row['Table#'] == 'BAGGING') ? "Selected": ""; ?>>BAGGING</option>
                                                    <option value='INKJET' <?php echo($row['Table#'] == 'INKJET') ? "Selected": ""; ?>>INKJET</option>
                                                    <option value='CONDUIT' <?php echo($row['Table#'] == 'CONDUIT') ? "Selected": ""; ?>>CONDUIT</option>
                                                </select>
                                            </div>  
                                        </td>
                                        <td>
                                            <div class='input-field inline' id='status'>
                                                <select>
                                                    <option value='0' <?php echo($row['Status'] == '0') ? "Selected": ""; ?>>Not Started</option>
                                                    <option value='1' <?php echo($row['Status'] == '1') ? "Selected": ""; ?>>Completed</option>
                                                    <option value='2' <?php echo($row['Status'] == '2') ? "Selected": ""; ?>>On Hold</option>
                                                    <option value='3' <?php echo($row['Status'] == '3') ? "Selected": ""; ?>>WIP</option>
                                                </select>
                                            </div>
                                        </td>
                                        <td>
                                            <a class="waves-effect waves-light btn" id='material'>Order Material</a>
                                        </td>
                                        <td>
                                            <a class="waves-effect waves-light btn" id='recordTime'>Record Time</a>
                                        </td>
                                        <td style="display:none" id="ID" data-id=<?=$row['id']?>><?=$row['id']?></td>  
                                    </tr>
                                
                            
                        <?php } }?>
                    </tbody>
                </table>
            </div>
        </li>
        <li>     
            <div class='collapsible-header'><h6>Table 3</h6></div>
            <div class='collapsible-body'>
                <table class='centered'>
                    <thead>
                        <th>Work Order</th>
                        <th>Part Number</th>
                        <th>Quantity</th>
                        <th>Quoted Time</th>
                        <th>Ship Date</th>
                        <th>Notes</th>
                        <th>Reassign Table</th>
                        <th>Status</th>
                    </thead>
                    <tbody>
                            <?php 
                            foreach($results as $row)
                            {
                                if ($row['Table#'] !== "table 3") 
                                {
                                    continue;
                                }
                                else
                                {
                            ?>
                                    <tr id='searchable' <?php if($row['Status'] == '1'){echo "class='green lighten-4'";} elseif($row['Status']=='2'){ echo "class='red darken-4'";}elseif($row['Status']=='3'){echo "class='yellow lighten-1'";}else{echo "class=''";}?>>
                                        <td id="WO"><?=$row["WorkOrder"]?></td>
                                        <td id="PN"><?=$row["PN"]?></td>
                                        <td><?=$row["Qty"]?></td>
                                        <td><?=convertTime($row["Quoted_Time"])?></td>
                                        <td><?=$row["Ship_Date"]?></td>
                                        <td>
                                            <div class='input-field inline'>
                                                <input type='text' value='<?=$row["Notes"]?>' class='center-align' id='notes'>
                                            </div>
                                        </td>
                                        <td>
                                            <div class='input-field inline'>
                                                <select id='table'>
                                                    <option value='table 1' <?php echo($row['Table#'] == 'table 1') ? "Selected": ""; ?>>Table 1</option>
                                                    <option value='table 2' <?php echo($row['Table#'] == 'table 2') ? "Selected": ""; ?>>Table 2</option>
                                                    <option value='table 3' <?php echo($row['Table#'] == 'table 3') ? "Selected": ""; ?>>Table 3</option>
                                                    <option value='table 4' <?php echo($row['Table#'] == 'table 4') ? "Selected": ""; ?>>Table 4</option>
                                                    <option value='table 5' <?php echo($row['Table#'] == 'table 5') ? "Selected": ""; ?>>Table 5</option>
                                                    <option value='table 6' <?php echo($row['Table#'] == 'table 6') ? "Selected": ""; ?>>Table 6</option>
                                                    <option value='table 7' <?php echo($row['Table#'] == 'table 7') ? "Selected": ""; ?>>Table 7</option>
                                                    <option value='table 8' <?php echo($row['Table#'] == 'table 8') ? "Selected": ""; ?>>Table 8</option>
                                                    <option value='table 9' <?php echo($row['Table#'] == 'table 9') ? "Selected": ""; ?>>Table 9</option>
                                                    <option value='table 11' <?php echo($row['Table#'] == 'table 11') ? "Selected": ""; ?>>Table 11</option>
                                                    <option value='AQJFIX' <?php echo($row['Table#'] == 'AQJFIX') ? "Selected": ""; ?>>AQJ Fixture</option>
                                                    <option value='BSFIX1' <?php echo($row['Table#'] == 'BSFIX1') ? "Selected": ""; ?>>BS Fixture 1</option>
                                                    <option value='BSFIX2' <?php echo($row['Table#'] == 'BSFIX2') ? "Selected": ""; ?>>BS Fixture 2</option>
                                                    <option value='HARNESS' <?php echo($row['Table#'] == 'HARNESS') ? "Selected": ""; ?>>HARNESS</option>
                                                    <option value='SONIC WELD' <?php echo($row['Table#'] == 'SONIC WELD') ? "Selected": ""; ?>>SONIC WELD</option>
                                                    <option value='BAGGING' <?php echo($row['Table#'] == 'BAGGING') ? "Selected": ""; ?>>BAGGING</option>
                                                    <option value='INKJET' <?php echo($row['Table#'] == 'INKJET') ? "Selected": ""; ?>>INKJET</option>
                                                    <option value='CONDUIT' <?php echo($row['Table#'] == 'CONDUIT') ? "Selected": ""; ?>>CONDUIT</option>
                                                </select>
                                            </div>  
                                        </td>
                                        <td>
                                            <div class='input-field inline' id='status'>
                                                <select>
                                                    <option value='0' <?php echo($row['Status'] == '0') ? "Selected": ""; ?>>Not Started</option>
                                                    <option value='1' <?php echo($row['Status'] == '1') ? "Selected": ""; ?>>Completed</option>
                                                    <option value='2' <?php echo($row['Status'] == '2') ? "Selected": ""; ?>>On Hold</option>
                                                    <option value='3' <?php echo($row['Status'] == '3') ? "Selected": ""; ?>>WIP</option>
                                                </select>
                                            </div>
                                        </td>
                                        <td>
                                            <a class="waves-effect waves-light btn" id='material'>Order Material</a>
                                        </td>
                                        <td>
                                            <a class="waves-effect waves-light btn" id='recordTime'>Record Time</a>
                                        </td>
                                        <td style="display:none" id="ID" data-id=<?=$row['id']?>><?=$row['id']?></td>  
                                    </tr>
                                
                            
                        <?php } }?>
                    </tbody>
                </table>
            </div>
        </li>
        <li>     
            <div class='collapsible-header'><h6>Table 4</h6></div>
            <div class='collapsible-body'>
                <table class='centered'>
                    <thead>
                        <th>Work Order</th>
                        <th>Part Number</th>
                        <th>Quantity</th>
                        <th>Quoted Time</th>
                        <th>Ship Date</th>
                        <th>Notes</th>
                        <th>Reassign Table</th>
                        <th>Status</th>
                    </thead>
                    <tbody>
                            <?php 
                            foreach($results as $row)
                            {
                                if ($row['Table#'] !== "table 4") 
                                {
                                    continue;
                                }
                                else
                                {
                            ?>
                                    <tr id='searchable' <?php if($row['Status'] == '1'){echo "class='green lighten-4'";} elseif($row['Status']=='2'){ echo "class='red darken-4'";}elseif($row['Status']=='3'){echo "class='yellow lighten-1'";}else{echo "class=''";}?>>
                                        <td id="WO"><?=$row["WorkOrder"]?></td>
                                        <td id="PN"><?=$row["PN"]?></td>
                                        <td><?=$row["Qty"]?></td>
                                        <td><?=convertTime($row["Quoted_Time"])?></td>
                                        <td><?=$row["Ship_Date"]?></td>
                                        <td>
                                            <div class='input-field inline'>
                                                <input type='text' value='<?=$row["Notes"]?>' class='center-align' id='notes'>
                                            </div>
                                        </td>
                                        <td>
                                            <div class='input-field inline'>
                                                <select id='table'>
                                                    <option value='table 1' <?php echo($row['Table#'] == 'table 1') ? "Selected": ""; ?>>Table 1</option>
                                                    <option value='table 2' <?php echo($row['Table#'] == 'table 2') ? "Selected": ""; ?>>Table 2</option>
                                                    <option value='table 3' <?php echo($row['Table#'] == 'table 3') ? "Selected": ""; ?>>Table 3</option>
                                                    <option value='table 4' <?php echo($row['Table#'] == 'table 4') ? "Selected": ""; ?>>Table 4</option>
                                                    <option value='table 5' <?php echo($row['Table#'] == 'table 5') ? "Selected": ""; ?>>Table 5</option>
                                                    <option value='table 6' <?php echo($row['Table#'] == 'table 6') ? "Selected": ""; ?>>Table 6</option>
                                                    <option value='table 7' <?php echo($row['Table#'] == 'table 7') ? "Selected": ""; ?>>Table 7</option>
                                                    <option value='table 8' <?php echo($row['Table#'] == 'table 8') ? "Selected": ""; ?>>Table 8</option>
                                                    <option value='table 9' <?php echo($row['Table#'] == 'table 9') ? "Selected": ""; ?>>Table 9</option>
                                                    <option value='table 11' <?php echo($row['Table#'] == 'table 11') ? "Selected": ""; ?>>Table 11</option>
                                                    <option value='AQJFIX' <?php echo($row['Table#'] == 'AQJFIX') ? "Selected": ""; ?>>AQJ Fixture</option>
                                                    <option value='BSFIX1' <?php echo($row['Table#'] == 'BSFIX1') ? "Selected": ""; ?>>BS Fixture 1</option>
                                                    <option value='BSFIX2' <?php echo($row['Table#'] == 'BSFIX2') ? "Selected": ""; ?>>BS Fixture 2</option>
                                                    <option value='HARNESS' <?php echo($row['Table#'] == 'HARNESS') ? "Selected": ""; ?>>HARNESS</option>
                                                    <option value='SONIC WELD' <?php echo($row['Table#'] == 'SONIC WELD') ? "Selected": ""; ?>>SONIC WELD</option>
                                                    <option value='BAGGING' <?php echo($row['Table#'] == 'BAGGING') ? "Selected": ""; ?>>BAGGING</option>
                                                    <option value='INKJET' <?php echo($row['Table#'] == 'INKJET') ? "Selected": ""; ?>>INKJET</option>
                                                    <option value='CONDUIT' <?php echo($row['Table#'] == 'CONDUIT') ? "Selected": ""; ?>>CONDUIT</option>
                                                </select>
                                            </div>  
                                        </td>
                                        <td>
                                            <div class='input-field inline' id='status'>
                                                <select>
                                                    <option value='0' <?php echo($row['Status'] == '0') ? "Selected": ""; ?>>Not Started</option>
                                                    <option value='1' <?php echo($row['Status'] == '1') ? "Selected": ""; ?>>Completed</option>
                                                    <option value='2' <?php echo($row['Status'] == '2') ? "Selected": ""; ?>>On Hold</option>
                                                    <option value='3' <?php echo($row['Status'] == '3') ? "Selected": ""; ?>>WIP</option>
                                                </select>
                                            </div>
                                        </td>
                                        <td>
                                            <a class="waves-effect waves-light btn" id='material'>Order Material</a>
                                        </td>
                                        <td>
                                            <a class="waves-effect waves-light btn" id='recordTime'>Record Time</a>
                                        </td>
                                        <td style="display:none" id="ID" data-id=<?=$row['id']?>><?=$row['id']?></td>  
                                    </tr>
                                
                            
                        <?php } }?>
                    </tbody>
                </table>
            </div>
        </li>
        <li>     
            <div class='collapsible-header'><h6>Table 5</h6></div>
            <div class='collapsible-body'>
                <table class='centered'>
                    <thead>
                        <th>Work Order</th>
                        <th>Part Number</th>
                        <th>Quantity</th>
                        <th>Quoted Time</th>
                        <th>Ship Date</th>
                        <th>Notes</th>
                        <th>Reassign Table</th>
                        <th>Status</th>
                    </thead>
                    <tbody>
                            <?php 
                            foreach($results as $row)
                            {
                                if ($row['Table#'] !== "table 5") 
                                {
                                    continue;
                                }
                                else
                                {
                            ?>
                                    <tr id='searchable' <?php if($row['Status'] == '1'){echo "class='green lighten-4'";} elseif($row['Status']=='2'){ echo "class='red darken-4'";}elseif($row['Status']=='3'){echo "class='yellow lighten-1'";}else{echo "class=''";}?>>
                                        <td id="WO"><?=$row["WorkOrder"]?></td>
                                        <td id="PN"><?=$row["PN"]?></td>
                                        <td><?=$row["Qty"]?></td>
                                        <td><?=convertTime($row["Quoted_Time"])?></td>
                                        <td><?=$row["Ship_Date"]?></td>
                                        <td>
                                            <div class='input-field inline'>
                                                <input type='text' value='<?=$row["Notes"]?>' class='center-align' id='notes'>
                                            </div>
                                        </td>
                                        <td>
                                            <div class='input-field inline'>
                                                <select id='table'>
                                                    <option value='table 1' <?php echo($row['Table#'] == 'table 1') ? "Selected": ""; ?>>Table 1</option>
                                                    <option value='table 2' <?php echo($row['Table#'] == 'table 2') ? "Selected": ""; ?>>Table 2</option>
                                                    <option value='table 3' <?php echo($row['Table#'] == 'table 3') ? "Selected": ""; ?>>Table 3</option>
                                                    <option value='table 4' <?php echo($row['Table#'] == 'table 4') ? "Selected": ""; ?>>Table 4</option>
                                                    <option value='table 5' <?php echo($row['Table#'] == 'table 5') ? "Selected": ""; ?>>Table 5</option>
                                                    <option value='table 6' <?php echo($row['Table#'] == 'table 6') ? "Selected": ""; ?>>Table 6</option>
                                                    <option value='table 7' <?php echo($row['Table#'] == 'table 7') ? "Selected": ""; ?>>Table 7</option>
                                                    <option value='table 8' <?php echo($row['Table#'] == 'table 8') ? "Selected": ""; ?>>Table 8</option>
                                                    <option value='table 9' <?php echo($row['Table#'] == 'table 9') ? "Selected": ""; ?>>Table 9</option>
                                                    <option value='table 11' <?php echo($row['Table#'] == 'table 11') ? "Selected": ""; ?>>Table 11</option>
                                                    <option value='AQJFIX' <?php echo($row['Table#'] == 'AQJFIX') ? "Selected": ""; ?>>AQJ Fixture</option>
                                                    <option value='BSFIX1' <?php echo($row['Table#'] == 'BSFIX1') ? "Selected": ""; ?>>BS Fixture 1</option>
                                                    <option value='BSFIX2' <?php echo($row['Table#'] == 'BSFIX2') ? "Selected": ""; ?>>BS Fixture 2</option>
                                                    <option value='HARNESS' <?php echo($row['Table#'] == 'HARNESS') ? "Selected": ""; ?>>HARNESS</option>
                                                    <option value='SONIC WELD' <?php echo($row['Table#'] == 'SONIC WELD') ? "Selected": ""; ?>>SONIC WELD</option>
                                                    <option value='BAGGING' <?php echo($row['Table#'] == 'BAGGING') ? "Selected": ""; ?>>BAGGING</option>
                                                    <option value='INKJET' <?php echo($row['Table#'] == 'INKJET') ? "Selected": ""; ?>>INKJET</option>
                                                    <option value='CONDUIT' <?php echo($row['Table#'] == 'CONDUIT') ? "Selected": ""; ?>>CONDUIT</option>
                                                </select>
                                            </div>  
                                        </td>
                                        <td>
                                            <div class='input-field inline' id='status'>
                                                <select>
                                                    <option value='0' <?php echo($row['Status'] == '0') ? "Selected": ""; ?>>Not Started</option>
                                                    <option value='1' <?php echo($row['Status'] == '1') ? "Selected": ""; ?>>Completed</option>
                                                    <option value='2' <?php echo($row['Status'] == '2') ? "Selected": ""; ?>>On Hold</option>
                                                    <option value='3' <?php echo($row['Status'] == '3') ? "Selected": ""; ?>>WIP</option>
                                                </select>
                                            </div>
                                        </td>
                                        <td>
                                            <a class="waves-effect waves-light btn" id='material'>Order Material</a>
                                        </td>
                                        <td>
                                            <a class="waves-effect waves-light btn" id='recordTime'>Record Time</a>
                                        </td>
                                        <td style="display:none" id="ID" data-id=<?=$row['id']?>><?=$row['id']?></td>  
                                    </tr>
                                
                            
                        <?php } }?>
                    </tbody>
                </table>
            </div>
        </li>
        <li>     
            <div class='collapsible-header'><h6>Table 6</h6></div>
            <div class='collapsible-body'>
                <table class='centered'>
                    <thead>
                        <th>Work Order</th>
                        <th>Part Number</th>
                        <th>Quantity</th>
                        <th>Quoted Time</th>
                        <th>Ship Date</th>
                        <th>Notes</th>
                        <th>Reassign Table</th>
                        <th>Status</th>
                    </thead>
                    <tbody>
                            <?php 
                            foreach($results as $row)
                            {
                                if ($row['Table#'] !== "table 6") 
                                {
                                    continue;
                                }
                                else
                                {
                            ?>
                                    <tr id='searchable' <?php if($row['Status'] == '1'){echo "class='green lighten-4'";} elseif($row['Status']=='2'){ echo "class='red darken-4'";}elseif($row['Status']=='3'){echo "class='yellow lighten-1'";}else{echo "class=''";}?>>
                                        <td id="WO"><?=$row["WorkOrder"]?></td>
                                        <td id="PN"><?=$row["PN"]?></td>
                                        <td><?=$row["Qty"]?></td>
                                        <td><?=convertTime($row["Quoted_Time"])?></td>
                                        <td><?=$row["Ship_Date"]?></td>
                                        <td>
                                            <div class='input-field inline'>
                                                <input type='text' value='<?=$row["Notes"]?>' class='center-align' id='notes'>
                                            </div>
                                        </td>
                                        <td>
                                            <div class='input-field inline'>
                                                <select id='table'>
                                                    <option value='table 1' <?php echo($row['Table#'] == 'table 1') ? "Selected": ""; ?>>Table 1</option>
                                                    <option value='table 2' <?php echo($row['Table#'] == 'table 2') ? "Selected": ""; ?>>Table 2</option>
                                                    <option value='table 3' <?php echo($row['Table#'] == 'table 3') ? "Selected": ""; ?>>Table 3</option>
                                                    <option value='table 4' <?php echo($row['Table#'] == 'table 4') ? "Selected": ""; ?>>Table 4</option>
                                                    <option value='table 5' <?php echo($row['Table#'] == 'table 5') ? "Selected": ""; ?>>Table 5</option>
                                                    <option value='table 6' <?php echo($row['Table#'] == 'table 6') ? "Selected": ""; ?>>Table 6</option>
                                                    <option value='table 7' <?php echo($row['Table#'] == 'table 7') ? "Selected": ""; ?>>Table 7</option>
                                                    <option value='table 8' <?php echo($row['Table#'] == 'table 8') ? "Selected": ""; ?>>Table 8</option>
                                                    <option value='table 9' <?php echo($row['Table#'] == 'table 9') ? "Selected": ""; ?>>Table 9</option>
                                                    <option value='table 11' <?php echo($row['Table#'] == 'table 11') ? "Selected": ""; ?>>Table 11</option>
                                                    <option value='AQJFIX' <?php echo($row['Table#'] == 'AQJFIX') ? "Selected": ""; ?>>AQJ Fixture</option>
                                                    <option value='BSFIX1' <?php echo($row['Table#'] == 'BSFIX1') ? "Selected": ""; ?>>BS Fixture 1</option>
                                                    <option value='BSFIX2' <?php echo($row['Table#'] == 'BSFIX2') ? "Selected": ""; ?>>BS Fixture 2</option>
                                                    <option value='HARNESS' <?php echo($row['Table#'] == 'HARNESS') ? "Selected": ""; ?>>HARNESS</option>
                                                    <option value='SONIC WELD' <?php echo($row['Table#'] == 'SONIC WELD') ? "Selected": ""; ?>>SONIC WELD</option>
                                                    <option value='BAGGING' <?php echo($row['Table#'] == 'BAGGING') ? "Selected": ""; ?>>BAGGING</option>
                                                    <option value='INKJET' <?php echo($row['Table#'] == 'INKJET') ? "Selected": ""; ?>>INKJET</option>
                                                    <option value='CONDUIT' <?php echo($row['Table#'] == 'CONDUIT') ? "Selected": ""; ?>>CONDUIT</option>
                                                </select>
                                            </div>  
                                        </td>
                                        <td>
                                            <div class='input-field inline' id='status'>
                                                <select>
                                                    <option value='0' <?php echo($row['Status'] == '0') ? "Selected": ""; ?>>Not Started</option>
                                                    <option value='1' <?php echo($row['Status'] == '1') ? "Selected": ""; ?>>Completed</option>
                                                    <option value='2' <?php echo($row['Status'] == '2') ? "Selected": ""; ?>>On Hold</option>
                                                    <option value='3' <?php echo($row['Status'] == '3') ? "Selected": ""; ?>>WIP</option>
                                                </select>
                                            </div>
                                        </td>
                                        <td>
                                            <a class="waves-effect waves-light btn" id='material'>Order Material</a>
                                        </td>
                                        <td>
                                            <a class="waves-effect waves-light btn" id='recordTime'>Record Time</a>
                                        </td>
                                        <td style="display:none" id="ID" data-id=<?=$row['id']?>><?=$row['id']?></td>  

                                    </tr>
                                
                            
                        <?php } }?>
                    </tbody>
                </table>
            </div>
        </li>
        <li>     
            <div class='collapsible-header'><h6>Table 7</h6></div>
            <div class='collapsible-body'>
                <table class='centered'>
                    <thead>
                        <th>Work Order</th>
                        <th>Part Number</th>
                        <th>Quantity</th>
                        <th>Quoted Time</th>
                        <th>Ship Date</th>
                        <th>Notes</th>
                        <th>Reassign Table</th>
                        <th>Status</th>
                    </thead>
                    <tbody>
                            <?php 
                            foreach($results as $row)
                            {
                                if ($row['Table#'] !== "table 7") 
                                {
                                    continue;
                                }
                                else
                                {
                            ?>
                                    <tr id='searchable' <?php if($row['Status'] == '1'){echo "class='green lighten-4'";} elseif($row['Status']=='2'){ echo "class='red darken-4'";}elseif($row['Status']=='3'){echo "class='yellow lighten-1'";}else{echo "class=''";}?>>
                                        <td id="WO"><?=$row["WorkOrder"]?></td>
                                        <td id="PN"><?=$row["PN"]?></td>
                                        <td><?=$row["Qty"]?></td>
                                        <td><?=convertTime($row["Quoted_Time"])?></td>
                                        <td><?=$row["Ship_Date"]?></td>
                                        <td>
                                            <div class='input-field inline'>
                                                <input type='text' value='<?=$row["Notes"]?>' class='center-align' id='notes'>
                                            </div>
                                        </td>
                                        <td>
                                            <div class='input-field inline'>
                                                <select id='table'>
                                                    <option value='table 1' <?php echo($row['Table#'] == 'table 1') ? "Selected": ""; ?>>Table 1</option>
                                                    <option value='table 2' <?php echo($row['Table#'] == 'table 2') ? "Selected": ""; ?>>Table 2</option>
                                                    <option value='table 3' <?php echo($row['Table#'] == 'table 3') ? "Selected": ""; ?>>Table 3</option>
                                                    <option value='table 4' <?php echo($row['Table#'] == 'table 4') ? "Selected": ""; ?>>Table 4</option>
                                                    <option value='table 5' <?php echo($row['Table#'] == 'table 5') ? "Selected": ""; ?>>Table 5</option>
                                                    <option value='table 6' <?php echo($row['Table#'] == 'table 6') ? "Selected": ""; ?>>Table 6</option>
                                                    <option value='table 7' <?php echo($row['Table#'] == 'table 7') ? "Selected": ""; ?>>Table 7</option>
                                                    <option value='table 8' <?php echo($row['Table#'] == 'table 8') ? "Selected": ""; ?>>Table 8</option>
                                                    <option value='table 9' <?php echo($row['Table#'] == 'table 9') ? "Selected": ""; ?>>Table 9</option>
                                                    <option value='table 11' <?php echo($row['Table#'] == 'table 11') ? "Selected": ""; ?>>Table 11</option>
                                                    <option value='AQJFIX' <?php echo($row['Table#'] == 'AQJFIX') ? "Selected": ""; ?>>AQJ Fixture</option>
                                                    <option value='BSFIX1' <?php echo($row['Table#'] == 'BSFIX1') ? "Selected": ""; ?>>BS Fixture 1</option>
                                                    <option value='BSFIX2' <?php echo($row['Table#'] == 'BSFIX2') ? "Selected": ""; ?>>BS Fixture 2</option>
                                                    <option value='HARNESS' <?php echo($row['Table#'] == 'HARNESS') ? "Selected": ""; ?>>HARNESS</option>
                                                    <option value='SONIC WELD' <?php echo($row['Table#'] == 'SONIC WELD') ? "Selected": ""; ?>>SONIC WELD</option>
                                                    <option value='BAGGING' <?php echo($row['Table#'] == 'BAGGING') ? "Selected": ""; ?>>BAGGING</option>
                                                    <option value='INKJET' <?php echo($row['Table#'] == 'INKJET') ? "Selected": ""; ?>>INKJET</option>
                                                    <option value='CONDUIT' <?php echo($row['Table#'] == 'CONDUIT') ? "Selected": ""; ?>>CONDUIT</option>
                                                </select>
                                            </div>  
                                        </td>
                                        <td>
                                            <div class='input-field inline' id='status'>
                                                <select>
                                                    <option value='0' <?php echo($row['Status'] == '0') ? "Selected": ""; ?>>Not Started</option>
                                                    <option value='1' <?php echo($row['Status'] == '1') ? "Selected": ""; ?>>Completed</option>
                                                    <option value='2' <?php echo($row['Status'] == '2') ? "Selected": ""; ?>>On Hold</option>
                                                    <option value='3' <?php echo($row['Status'] == '3') ? "Selected": ""; ?>>WIP</option>
                                                </select>
                                            </div>
                                        </td>
                                        <td>
                                            <a class="waves-effect waves-light btn" id='material'>Order Material</a>
                                        </td>
                                        <td>
                                            <a class="waves-effect waves-light btn" id='recordTime'>Record Time</a>
                                        </td>
                                        <td style="display:none" id="ID" data-id=<?=$row['id']?>><?=$row['id']?></td>  
                                    </tr>
                                
                            
                        <?php } }?>
                    </tbody>
                </table>
            </div>
        </li>
        <li>     
            <div class='collapsible-header'><h6>Table 8</h6></div>
            <div class='collapsible-body'>
                <table class='centered'>
                    <thead>
                        <th>Work Order</th>
                        <th>Part Number</th>
                        <th>Quantity</th>
                        <th>Quoted Time</th>
                        <th>Ship Date</th>
                        <th>Notes</th>
                        <th>Reassign Table</th>
                        <th>Status</th>
                    </thead>
                    <tbody>
                            <?php 
                            foreach($results as $row)
                            {
                                if ($row['Table#'] !== "table 8") 
                                {
                                    continue;
                                }
                                else
                                {
                            ?>
                                    <tr id='searchable' <?php if($row['Status'] == '1'){echo "class='green lighten-4'";} elseif($row['Status']=='2'){ echo "class='red darken-4'";}elseif($row['Status']=='3'){echo "class='yellow lighten-1'";}else{echo "class=''";}?>>
                                        <td id="WO"><?=$row["WorkOrder"]?></td>
                                        <td id="PN"><?=$row["PN"]?></td>
                                        <td><?=$row["Qty"]?></td>
                                        <td><?=convertTime($row["Quoted_Time"])?></td>
                                        <td><?=$row["Ship_Date"]?></td>
                                        <td>
                                            <div class='input-field inline'>
                                                <input type='text' value='<?=$row["Notes"]?>' class='center-align' id='notes'>
                                            </div>
                                        </td>
                                        <td>
                                            <div class='input-field inline'>
                                                <select id='table'>
                                                    <option value='table 1' <?php echo($row['Table#'] == 'table 1') ? "Selected": ""; ?>>Table 1</option>
                                                    <option value='table 2' <?php echo($row['Table#'] == 'table 2') ? "Selected": ""; ?>>Table 2</option>
                                                    <option value='table 3' <?php echo($row['Table#'] == 'table 3') ? "Selected": ""; ?>>Table 3</option>
                                                    <option value='table 4' <?php echo($row['Table#'] == 'table 4') ? "Selected": ""; ?>>Table 4</option>
                                                    <option value='table 5' <?php echo($row['Table#'] == 'table 5') ? "Selected": ""; ?>>Table 5</option>
                                                    <option value='table 6' <?php echo($row['Table#'] == 'table 6') ? "Selected": ""; ?>>Table 6</option>
                                                    <option value='table 7' <?php echo($row['Table#'] == 'table 7') ? "Selected": ""; ?>>Table 7</option>
                                                    <option value='table 8' <?php echo($row['Table#'] == 'table 8') ? "Selected": ""; ?>>Table 8</option>
                                                    <option value='table 9' <?php echo($row['Table#'] == 'table 9') ? "Selected": ""; ?>>Table 9</option>
                                                    <option value='table 11' <?php echo($row['Table#'] == 'table 11') ? "Selected": ""; ?>>Table 11</option>
                                                    <option value='AQJFIX' <?php echo($row['Table#'] == 'AQJFIX') ? "Selected": ""; ?>>AQJ Fixture</option>
                                                    <option value='BSFIX1' <?php echo($row['Table#'] == 'BSFIX1') ? "Selected": ""; ?>>BS Fixture 1</option>
                                                    <option value='BSFIX2' <?php echo($row['Table#'] == 'BSFIX2') ? "Selected": ""; ?>>BS Fixture 2</option>
                                                    <option value='HARNESS' <?php echo($row['Table#'] == 'HARNESS') ? "Selected": ""; ?>>HARNESS</option>
                                                    <option value='SONIC WELD' <?php echo($row['Table#'] == 'SONIC WELD') ? "Selected": ""; ?>>SONIC WELD</option>
                                                    <option value='BAGGING' <?php echo($row['Table#'] == 'BAGGING') ? "Selected": ""; ?>>BAGGING</option>
                                                    <option value='INKJET' <?php echo($row['Table#'] == 'INKJET') ? "Selected": ""; ?>>INKJET</option>
                                                    <option value='CONDUIT' <?php echo($row['Table#'] == 'CONDUIT') ? "Selected": ""; ?>>CONDUIT</option>
                                                </select>
                                            </div>  
                                        </td>
                                        <td>
                                            <div class='input-field inline' id='status'>
                                                <select>
                                                    <option value='0' <?php echo($row['Status'] == '0') ? "Selected": ""; ?>>Not Started</option>
                                                    <option value='1' <?php echo($row['Status'] == '1') ? "Selected": ""; ?>>Completed</option>
                                                    <option value='2' <?php echo($row['Status'] == '2') ? "Selected": ""; ?>>On Hold</option>
                                                    <option value='3' <?php echo($row['Status'] == '3') ? "Selected": ""; ?>>WIP</option>
                                                </select>
                                            </div>
                                        </td>
                                        <td>
                                            <a class="waves-effect waves-light btn" id='material'>Order Material</a>
                                        </td>
                                        <td>
                                            <a class="waves-effect waves-light btn" id='recordTime'>Record Time</a>
                                        </td>
                                        <td style="display:none" id="ID" data-id=<?=$row['id']?>><?=$row['id']?></td>  
                                    </tr>
                                
                            
                        <?php } }?>
                    </tbody>
                </table>
            </div>
        </li>
        <li>     
            <div class='collapsible-header'><h6>Table 9</h6></div>
            <div class='collapsible-body'>
                <table class='centered'>
                    <thead>
                        <th>Work Order</th>
                        <th>Part Number</th>
                        <th>Quantity</th>
                        <th>Quoted Time</th>
                        <th>Ship Date</th>
                        <th>Notes</th>
                        <th>Reassign Table</th>
                        <th>Status</th>
                    </thead>
                    <tbody>
                            <?php 
                            foreach($results as $row)
                            {
                                if ($row['Table#'] !== "table 9") 
                                {
                                    continue;
                                }
                                else
                                {
                            ?>
                                    <tr id='searchable' <?php if($row['Status'] == '1'){echo "class='green lighten-4'";} elseif($row['Status']=='2'){ echo "class='red darken-4'";}elseif($row['Status']=='3'){echo "class='yellow lighten-1'";}else{echo "class=''";}?>>
                                        <td id="WO"><?=$row["WorkOrder"]?></td>
                                        <td id="PN"><?=$row["PN"]?></td>
                                        <td><?=$row["Qty"]?></td>
                                        <td><?=convertTime($row["Quoted_Time"])?></td>
                                        <td><?=$row["Ship_Date"]?></td>
                                        <td>
                                            <div class='input-field inline'>
                                                <input type='text' value='<?=$row["Notes"]?>' class='center-align' id='notes'>
                                            </div>
                                        </td>
                                        <td>
                                            <div class='input-field inline'>
                                                <select id='table'>
                                                    <option value='table 1' <?php echo($row['Table#'] == 'table 1') ? "Selected": ""; ?>>Table 1</option>
                                                    <option value='table 2' <?php echo($row['Table#'] == 'table 2') ? "Selected": ""; ?>>Table 2</option>
                                                    <option value='table 3' <?php echo($row['Table#'] == 'table 3') ? "Selected": ""; ?>>Table 3</option>
                                                    <option value='table 4' <?php echo($row['Table#'] == 'table 4') ? "Selected": ""; ?>>Table 4</option>
                                                    <option value='table 5' <?php echo($row['Table#'] == 'table 5') ? "Selected": ""; ?>>Table 5</option>
                                                    <option value='table 6' <?php echo($row['Table#'] == 'table 6') ? "Selected": ""; ?>>Table 6</option>
                                                    <option value='table 7' <?php echo($row['Table#'] == 'table 7') ? "Selected": ""; ?>>Table 7</option>
                                                    <option value='table 8' <?php echo($row['Table#'] == 'table 8') ? "Selected": ""; ?>>Table 8</option>
                                                    <option value='table 9' <?php echo($row['Table#'] == 'table 9') ? "Selected": ""; ?>>Table 9</option>
                                                    <option value='table 11' <?php echo($row['Table#'] == 'table 11') ? "Selected": ""; ?>>Table 11</option>
                                                    <option value='AQJFIX' <?php echo($row['Table#'] == 'AQJFIX') ? "Selected": ""; ?>>AQJ Fixture</option>
                                                    <option value='BSFIX1' <?php echo($row['Table#'] == 'BSFIX1') ? "Selected": ""; ?>>BS Fixture 1</option>
                                                    <option value='BSFIX2' <?php echo($row['Table#'] == 'BSFIX2') ? "Selected": ""; ?>>BS Fixture 2</option>
                                                    <option value='HARNESS' <?php echo($row['Table#'] == 'HARNESS') ? "Selected": ""; ?>>HARNESS</option>
                                                    <option value='SONIC WELD' <?php echo($row['Table#'] == 'SONIC WELD') ? "Selected": ""; ?>>SONIC WELD</option>
                                                    <option value='BAGGING' <?php echo($row['Table#'] == 'BAGGING') ? "Selected": ""; ?>>BAGGING</option>
                                                    <option value='INKJET' <?php echo($row['Table#'] == 'INKJET') ? "Selected": ""; ?>>INKJET</option>
                                                    <option value='CONDUIT' <?php echo($row['Table#'] == 'CONDUIT') ? "Selected": ""; ?>>CONDUIT</option>
                                                </select>
                                            </div>  
                                        </td>
                                        <td>
                                            <div class='input-field inline' id='status'>
                                                <select>
                                                    <option value='0' <?php echo($row['Status'] == '0') ? "Selected": ""; ?>>Not Started</option>
                                                    <option value='1' <?php echo($row['Status'] == '1') ? "Selected": ""; ?>>Completed</option>
                                                    <option value='2' <?php echo($row['Status'] == '2') ? "Selected": ""; ?>>On Hold</option>
                                                    <option value='3' <?php echo($row['Status'] == '3') ? "Selected": ""; ?>>WIP</option>
                                                </select>
                                            </div>
                                        </td>
                                        <td>
                                            <a class="waves-effect waves-light btn" id='material'>Order Material</a>
                                        </td> 
                                        <td>
                                            <a class="waves-effect waves-light btn" id='recordTime'>Record Time</a>
                                        </td>
                                        <td style="display:none" id="ID" data-id=<?=$row['id']?>><?=$row['id']?></td>  
                                    </tr>
                                
                            
                        <?php } }?>
                    </tbody>
                </table>
            </div>
        </li>
        <li>     
            <div class='collapsible-header'><h6>Table 11</h6></div>
            <div class='collapsible-body'>
                <table class='centered'>
                    <thead>
                        <th>Work Order</th>
                        <th>Part Number</th>
                        <th>Quantity</th>
                        <th>Quoted Time</th>
                        <th>Ship Date</th>
                        <th>Notes</th>
                        <th>Reassign Table</th>
                        <th>Status</th>
                    </thead>
                    <tbody>
                            <?php 
                            foreach($results as $row)
                            {
                                if ($row['Table#'] !== "table 11") 
                                {
                                    continue;
                                }
                                else
                                {
                            ?>
                                    <tr id='searchable' <?php if($row['Status'] == '1'){echo "class='green lighten-4'";} elseif($row['Status']=='2'){ echo "class='red darken-4'";}elseif($row['Status']=='3'){echo "class='yellow lighten-1'";}else{echo "class=''";}?>>
                                        <td id="WO"><?=$row["WorkOrder"]?></td>
                                        <td id="PN"><?=$row["PN"]?></td>
                                        <td><?=$row["Qty"]?></td>
                                        <td><?=convertTime($row["Quoted_Time"])?></td>
                                        <td><?=$row["Ship_Date"]?></td>
                                        <td>
                                            <div class='input-field inline'>
                                                <input type='text' value='<?=$row["Notes"]?>' class='center-align' id='notes'>
                                            </div>
                                        </td>
                                        <td>
                                            <div class='input-field inline'>
                                                <select id='table'>
                                                    <option value='table 1' <?php echo($row['Table#'] == 'table 1') ? "Selected": ""; ?>>Table 1</option>
                                                    <option value='table 2' <?php echo($row['Table#'] == 'table 2') ? "Selected": ""; ?>>Table 2</option>
                                                    <option value='table 3' <?php echo($row['Table#'] == 'table 3') ? "Selected": ""; ?>>Table 3</option>
                                                    <option value='table 4' <?php echo($row['Table#'] == 'table 4') ? "Selected": ""; ?>>Table 4</option>
                                                    <option value='table 5' <?php echo($row['Table#'] == 'table 5') ? "Selected": ""; ?>>Table 5</option>
                                                    <option value='table 6' <?php echo($row['Table#'] == 'table 6') ? "Selected": ""; ?>>Table 6</option>
                                                    <option value='table 7' <?php echo($row['Table#'] == 'table 7') ? "Selected": ""; ?>>Table 7</option>
                                                    <option value='table 8' <?php echo($row['Table#'] == 'table 8') ? "Selected": ""; ?>>Table 8</option>
                                                    <option value='table 9' <?php echo($row['Table#'] == 'table 9') ? "Selected": ""; ?>>Table 9</option>
                                                    <option value='table 11' <?php echo($row['Table#'] == 'table 11') ? "Selected": ""; ?>>Table 11</option>
                                                    <option value='AQJFIX' <?php echo($row['Table#'] == 'AQJFIX') ? "Selected": ""; ?>>AQJ Fixture</option>
                                                    <option value='BSFIX1' <?php echo($row['Table#'] == 'BSFIX1') ? "Selected": ""; ?>>BS Fixture 1</option>
                                                    <option value='BSFIX2' <?php echo($row['Table#'] == 'BSFIX2') ? "Selected": ""; ?>>BS Fixture 2</option>
                                                    <option value='HARNESS' <?php echo($row['Table#'] == 'HARNESS') ? "Selected": ""; ?>>HARNESS</option>
                                                    <option value='SONIC WELD' <?php echo($row['Table#'] == 'SONIC WELD') ? "Selected": ""; ?>>SONIC WELD</option>
                                                    <option value='BAGGING' <?php echo($row['Table#'] == 'BAGGING') ? "Selected": ""; ?>>BAGGING</option>
                                                    <option value='INKJET' <?php echo($row['Table#'] == 'INKJET') ? "Selected": ""; ?>>INKJET</option>
                                                    <option value='CONDUIT' <?php echo($row['Table#'] == 'CONDUIT') ? "Selected": ""; ?>>CONDUIT</option>
                                                </select>
                                            </div>  
                                        </td>
                                        <td>
                                            <div class='input-field inline' id='status'>
                                                <select>
                                                    <option value='0' <?php echo($row['Status'] == '0') ? "Selected": ""; ?>>Not Started</option>
                                                    <option value='1' <?php echo($row['Status'] == '1') ? "Selected": ""; ?>>Completed</option>
                                                    <option value='2' <?php echo($row['Status'] == '2') ? "Selected": ""; ?>>On Hold</option>
                                                    <option value='3' <?php echo($row['Status'] == '3') ? "Selected": ""; ?>>WIP</option>
                                                </select>
                                            </div>
                                        </td>
                                        <td>
                                            <a class="waves-effect waves-light btn" id='material'>Order Material</a>
                                        </td> 
                                        <td>
                                            <a class="waves-effect waves-light btn" id='recordTime'>Record Time</a>
                                        </td>
                                        <td style="display:none" id="ID" data-id=<?=$row['id']?>><?=$row['id']?></td>  
                                    </tr>
                                
                            
                        <?php } }?>
                    </tbody>
                </table>
            </div>
        </li>
        <li>     
            <div class='collapsible-header'><h6>AQJ Fixture</h6></div>
            <div class='collapsible-body'>
                <table class='centered'>
                    <thead>
                        <th>Work Order</th>
                        <th>Part Number</th>
                        <th>Quantity</th>
                        <th>Quoted Time</th>
                        <th>Ship Date</th>
                        <th>Notes</th>
                        <th>Reassign Table</th>
                        <th>Status</th>
                    </thead>
                    <tbody>
                            <?php 
                            foreach($results as $row)
                            {
                                if ($row['Table#'] !== "AQJFIX") 
                                {
                                    continue;
                                }
                                else
                                {
                            ?>
                                    <tr id='searchable' <?php if($row['Status'] == '1'){echo "class='green lighten-4'";} elseif($row['Status']=='2'){ echo "class='red darken-4'";}elseif($row['Status']=='3'){echo "class='yellow lighten-1'";}else{echo "class=''";}?>>
                                        <td id="WO"><?=$row["WorkOrder"]?></td>
                                        <td id="PN"><?=$row["PN"]?></td>
                                        <td><?=$row["Qty"]?></td>
                                        <td><?=convertTime($row["Quoted_Time"])?></td>
                                        <td><?=$row["Ship_Date"]?></td>
                                        <td>
                                            <div class='input-field inline'>
                                                <input type='text' value='<?=$row["Notes"]?>' class='center-align' id='notes'>
                                            </div>
                                        </td>
                                        <td>
                                            <div class='input-field inline'>
                                                <select id='table'>
                                                    <option value='table 1' <?php echo($row['Table#'] == 'table 1') ? "Selected": ""; ?>>Table 1</option>
                                                    <option value='table 2' <?php echo($row['Table#'] == 'table 2') ? "Selected": ""; ?>>Table 2</option>
                                                    <option value='table 3' <?php echo($row['Table#'] == 'table 3') ? "Selected": ""; ?>>Table 3</option>
                                                    <option value='table 4' <?php echo($row['Table#'] == 'table 4') ? "Selected": ""; ?>>Table 4</option>
                                                    <option value='table 5' <?php echo($row['Table#'] == 'table 5') ? "Selected": ""; ?>>Table 5</option>
                                                    <option value='table 6' <?php echo($row['Table#'] == 'table 6') ? "Selected": ""; ?>>Table 6</option>
                                                    <option value='table 7' <?php echo($row['Table#'] == 'table 7') ? "Selected": ""; ?>>Table 7</option>
                                                    <option value='table 8' <?php echo($row['Table#'] == 'table 8') ? "Selected": ""; ?>>Table 8</option>
                                                    <option value='table 9' <?php echo($row['Table#'] == 'table 9') ? "Selected": ""; ?>>Table 9</option>
                                                    <option value='table 11' <?php echo($row['Table#'] == 'table 11') ? "Selected": ""; ?>>Table 11</option>
                                                    <option value='AQJFIX' <?php echo($row['Table#'] == 'AQJFIX') ? "Selected": ""; ?>>AQJ Fixture</option>
                                                    <option value='BSFIX1' <?php echo($row['Table#'] == 'BSFIX1') ? "Selected": ""; ?>>BS Fixture 1</option>
                                                    <option value='BSFIX2' <?php echo($row['Table#'] == 'BSFIX2') ? "Selected": ""; ?>>BS Fixture 2</option>
                                                    <option value='HARNESS' <?php echo($row['Table#'] == 'HARNESS') ? "Selected": ""; ?>>HARNESS</option>
                                                    <option value='SONIC WELD' <?php echo($row['Table#'] == 'SONIC WELD') ? "Selected": ""; ?>>SONIC WELD</option>
                                                    <option value='BAGGING' <?php echo($row['Table#'] == 'BAGGING') ? "Selected": ""; ?>>BAGGING</option>
                                                    <option value='INKJET' <?php echo($row['Table#'] == 'INKJET') ? "Selected": ""; ?>>INKJET</option>
                                                    <option value='CONDUIT' <?php echo($row['Table#'] == 'CONDUIT') ? "Selected": ""; ?>>CONDUIT</option>
                                                </select>
                                            </div>  
                                        </td>
                                        <td>
                                            <div class='input-field inline' id='status'>
                                                <select>
                                                    <option value='0' <?php echo($row['Status'] == '0') ? "Selected": ""; ?>>Not Started</option>
                                                    <option value='1' <?php echo($row['Status'] == '1') ? "Selected": ""; ?>>Completed</option>
                                                    <option value='2' <?php echo($row['Status'] == '2') ? "Selected": ""; ?>>On Hold</option>
                                                    <option value='3' <?php echo($row['Status'] == '3') ? "Selected": ""; ?>>WIP</option>
                                                </select>
                                            </div>
                                        </td>
                                        <td>
                                            <a class="waves-effect waves-light btn" id='material'>Order Material</a>
                                        </td> 
                                        <td>
                                            <a class="waves-effect waves-light btn" id='recordTime'>Record Time</a>
                                        </td>
                                        <td style="display:none" id="ID" data-id=<?=$row['id']?>><?=$row['id']?></td>  
                                    </tr>
                                
                            
                        <?php } }?>
                    </tbody>
                </table>
            </div>
        </li>
        <li>     
            <div class='collapsible-header'><h6>BS Fixture 1</h6></div>
            <div class='collapsible-body'>
                <table class='centered'>
                    <thead>
                        <th>Work Order</th>
                        <th>Part Number</th>
                        <th>Quantity</th>
                        <th>Quoted Time</th>
                        <th>Ship Date</th>
                        <th>Notes</th>
                        <th>Reassign Table</th>
                        <th>Status</th>
                    </thead>
                    <tbody>
                            <?php 
                            foreach($results as $row)
                            {
                                if ($row['Table#'] !== "BSFIX1") 
                                {
                                    continue;
                                }
                                else
                                {
                            ?>
                                    <tr id='searchable' <?php if($row['Status'] == '1'){echo "class='green lighten-4'";} elseif($row['Status']=='2'){ echo "class='red darken-4'";}elseif($row['Status']=='3'){echo "class='yellow lighten-1'";}else{echo "class=''";}?>>
                                        <td id="WO"><?=$row["WorkOrder"]?></td>
                                        <td id="PN"><?=$row["PN"]?></td>
                                        <td><?=$row["Qty"]?></td>
                                        <td><?=convertTime($row["Quoted_Time"])?></td>
                                        <td><?=$row["Ship_Date"]?></td>
                                        <td>
                                            <div class='input-field inline'>
                                                <input type='text' value='<?=$row["Notes"]?>' class='center-align' id='notes'>
                                            </div>
                                        </td>
                                        <td>
                                            <div class='input-field inline'>
                                                <select id='table'>
                                                    <option value='table 1' <?php echo($row['Table#'] == 'table 1') ? "Selected": ""; ?>>Table 1</option>
                                                    <option value='table 2' <?php echo($row['Table#'] == 'table 2') ? "Selected": ""; ?>>Table 2</option>
                                                    <option value='table 3' <?php echo($row['Table#'] == 'table 3') ? "Selected": ""; ?>>Table 3</option>
                                                    <option value='table 4' <?php echo($row['Table#'] == 'table 4') ? "Selected": ""; ?>>Table 4</option>
                                                    <option value='table 5' <?php echo($row['Table#'] == 'table 5') ? "Selected": ""; ?>>Table 5</option>
                                                    <option value='table 6' <?php echo($row['Table#'] == 'table 6') ? "Selected": ""; ?>>Table 6</option>
                                                    <option value='table 7' <?php echo($row['Table#'] == 'table 7') ? "Selected": ""; ?>>Table 7</option>
                                                    <option value='table 8' <?php echo($row['Table#'] == 'table 8') ? "Selected": ""; ?>>Table 8</option>
                                                    <option value='table 9' <?php echo($row['Table#'] == 'table 9') ? "Selected": ""; ?>>Table 9</option>
                                                    <option value='table 11' <?php echo($row['Table#'] == 'table 11') ? "Selected": ""; ?>>Table 11</option>
                                                    <option value='AQJFIX' <?php echo($row['Table#'] == 'AQJFIX') ? "Selected": ""; ?>>AQJ Fixture</option>
                                                    <option value='BSFIX1' <?php echo($row['Table#'] == 'BSFIX1') ? "Selected": ""; ?>>BS Fixture 1</option>
                                                    <option value='BSFIX2' <?php echo($row['Table#'] == 'BSFIX2') ? "Selected": ""; ?>>BS Fixture 2</option>
                                                    <option value='HARNESS' <?php echo($row['Table#'] == 'HARNESS') ? "Selected": ""; ?>>HARNESS</option>
                                                    <option value='SONIC WELD' <?php echo($row['Table#'] == 'SONIC WELD') ? "Selected": ""; ?>>SONIC WELD</option>
                                                    <option value='BAGGING' <?php echo($row['Table#'] == 'BAGGING') ? "Selected": ""; ?>>BAGGING</option>
                                                    <option value='INKJET' <?php echo($row['Table#'] == 'INKJET') ? "Selected": ""; ?>>INKJET</option>
                                                    <option value='CONDUIT' <?php echo($row['Table#'] == 'CONDUIT') ? "Selected": ""; ?>>CONDUIT</option>
                                                </select>
                                            </div>  
                                        </td>
                                        <td>
                                            <div class='input-field inline' id='status'>
                                                <select>
                                                    <option value='0' <?php echo($row['Status'] == '0') ? "Selected": ""; ?>>Not Started</option>
                                                    <option value='1' <?php echo($row['Status'] == '1') ? "Selected": ""; ?>>Completed</option>
                                                    <option value='2' <?php echo($row['Status'] == '2') ? "Selected": ""; ?>>On Hold</option>
                                                    <option value='3' <?php echo($row['Status'] == '3') ? "Selected": ""; ?>>WIP</option>
                                                </select>
                                            </div>
                                        </td>
                                        <td>
                                            <a class="waves-effect waves-light btn" id='material'>Order Material</a>
                                        </td> 
                                        <td>
                                            <a class="waves-effect waves-light btn" id='recordTime'>Record Time</a>
                                        </td>
                                        <td style="display:none" id="ID" data-id=<?=$row['id']?>><?=$row['id']?></td>  
                                    </tr>
                                
                            
                        <?php } }?>
                    </tbody>
                </table>
            </div>
        </li>
        <li>     
            <div class='collapsible-header'><h6>BS FIXTURE 2</h6></div>
            <div class='collapsible-body'>
                <table class='centered'>
                    <thead>
                        <th>Work Order</th>
                        <th>Part Number</th>
                        <th>Quantity</th>
                        <th>Quoted Time</th>
                        <th>Ship Date</th>
                        <th>Notes</th>
                        <th>Reassign Table</th>
                        <th>Status</th>
                    </thead>
                    <tbody>
                            <?php 
                            foreach($results as $row)
                            {
                                if ($row['Table#'] !== "BSFIX2") 
                                {
                                    continue;
                                }
                                else
                                {
                            ?>
                                    <tr id='searchable' <?php if($row['Status'] == '1'){echo "class='green lighten-4'";} elseif($row['Status']=='2'){ echo "class='red darken-4'";}elseif($row['Status']=='3'){echo "class='yellow lighten-1'";}else{echo "class=''";}?>>
                                        <td id="WO"><?=$row["WorkOrder"]?></td>
                                        <td id="PN"><?=$row["PN"]?></td>
                                        <td><?=$row["Qty"]?></td>
                                        <td><?=convertTime($row["Quoted_Time"])?></td>
                                        <td><?=$row["Ship_Date"]?></td>
                                        <td>
                                            <div class='input-field inline'>
                                                <input type='text' value='<?=$row["Notes"]?>' class='center-align' id='notes'>
                                            </div>
                                        </td>
                                        <td>
                                            <div class='input-field inline'>
                                                <select id='table'>
                                                    <option value='table 1' <?php echo($row['Table#'] == 'table 1') ? "Selected": ""; ?>>Table 1</option>
                                                    <option value='table 2' <?php echo($row['Table#'] == 'table 2') ? "Selected": ""; ?>>Table 2</option>
                                                    <option value='table 3' <?php echo($row['Table#'] == 'table 3') ? "Selected": ""; ?>>Table 3</option>
                                                    <option value='table 4' <?php echo($row['Table#'] == 'table 4') ? "Selected": ""; ?>>Table 4</option>
                                                    <option value='table 5' <?php echo($row['Table#'] == 'table 5') ? "Selected": ""; ?>>Table 5</option>
                                                    <option value='table 6' <?php echo($row['Table#'] == 'table 6') ? "Selected": ""; ?>>Table 6</option>
                                                    <option value='table 7' <?php echo($row['Table#'] == 'table 7') ? "Selected": ""; ?>>Table 7</option>
                                                    <option value='table 8' <?php echo($row['Table#'] == 'table 8') ? "Selected": ""; ?>>Table 8</option>
                                                    <option value='table 9' <?php echo($row['Table#'] == 'table 9') ? "Selected": ""; ?>>Table 9</option>
                                                    <option value='table 11' <?php echo($row['Table#'] == 'table 11') ? "Selected": ""; ?>>Table 11</option>
                                                    <option value='AQJFIX' <?php echo($row['Table#'] == 'AQJFIX') ? "Selected": ""; ?>>AQJ Fixture</option>
                                                    <option value='BSFIX1' <?php echo($row['Table#'] == 'BSFIX1') ? "Selected": ""; ?>>BS Fixture 1</option>
                                                    <option value='BSFIX2' <?php echo($row['Table#'] == 'BSFIX2') ? "Selected": ""; ?>>BS Fixture 2</option>
                                                    <option value='HARNESS' <?php echo($row['Table#'] == 'HARNESS') ? "Selected": ""; ?>>HARNESS</option>
                                                    <option value='SONIC WELD' <?php echo($row['Table#'] == 'SONIC WELD') ? "Selected": ""; ?>>SONIC WELD</option>
                                                    <option value='BAGGING' <?php echo($row['Table#'] == 'BAGGING') ? "Selected": ""; ?>>BAGGING</option>
                                                    <option value='INKJET' <?php echo($row['Table#'] == 'INKJET') ? "Selected": ""; ?>>INKJET</option>
                                                    <option value='CONDUIT' <?php echo($row['Table#'] == 'CONDUIT') ? "Selected": ""; ?>>CONDUIT</option>
                                                </select>
                                            </div>  
                                        </td>
                                        <td>
                                            <div class='input-field inline' id='status'>
                                                <select>
                                                    <option value='0' <?php echo($row['Status'] == '0') ? "Selected": ""; ?>>Not Started</option>
                                                    <option value='1' <?php echo($row['Status'] == '1') ? "Selected": ""; ?>>Completed</option>
                                                    <option value='2' <?php echo($row['Status'] == '2') ? "Selected": ""; ?>>On Hold</option>
                                                    <option value='3' <?php echo($row['Status'] == '3') ? "Selected": ""; ?>>WIP</option>
                                                </select>
                                            </div>
                                        </td>
                                        <td>
                                            <a class="waves-effect waves-light btn" id='material'>Order Material</a>
                                        </td> 
                                        <td>
                                            <a class="waves-effect waves-light btn" id='recordTime'>Record Time</a>
                                        </td>
                                        <td style="display:none" id="ID" data-id=<?=$row['id']?>><?=$row['id']?></td>  
                                    </tr>
                                
                            
                        <?php } }?>
                    </tbody>
                </table>
            </div>
        </li>
        <li>     
            <div class='collapsible-header'><h6>HARNESS</h6></div>
            <div class='collapsible-body'>
                <table class='centered'>
                    <thead>
                        <th>Work Order</th>
                        <th>Part Number</th>
                        <th>Quantity</th>
                        <th>Quoted Time</th>
                        <th>Ship Date</th>
                        <th>Notes</th>
                        <th>Reassign Table</th>
                        <th>Status</th>
                    </thead>
                    <tbody>
                            <?php 
                            foreach($results as $row)
                            {
                                if ($row['Table#'] !== "HARNESS") 
                                {
                                    continue;
                                }
                                else
                                {
                            ?>
                                    <tr id='searchable' <?php if($row['Status'] == '1'){echo "class='green lighten-4'";} elseif($row['Status']=='2'){ echo "class='red darken-4'";}elseif($row['Status']=='3'){echo "class='yellow lighten-1'";}else{echo "class=''";}?>>
                                        <td id="WO"><?=$row["WorkOrder"]?></td>
                                        <td id="PN"><?=$row["PN"]?></td>
                                        <td><?=$row["Qty"]?></td>
                                        <td><?=convertTime($row["Quoted_Time"])?></td>
                                        <td><?=$row["Ship_Date"]?></td>
                                        <td>
                                            <div class='input-field inline'>
                                                <input type='text' value='<?=$row["Notes"]?>' class='center-align' id='notes'>
                                            </div>
                                        </td>
                                        <td>
                                            <div class='input-field inline'>
                                                <select id='table'>
                                                    <option value='table 1' <?php echo($row['Table#'] == 'table 1') ? "Selected": ""; ?>>Table 1</option>
                                                    <option value='table 2' <?php echo($row['Table#'] == 'table 2') ? "Selected": ""; ?>>Table 2</option>
                                                    <option value='table 3' <?php echo($row['Table#'] == 'table 3') ? "Selected": ""; ?>>Table 3</option>
                                                    <option value='table 4' <?php echo($row['Table#'] == 'table 4') ? "Selected": ""; ?>>Table 4</option>
                                                    <option value='table 5' <?php echo($row['Table#'] == 'table 5') ? "Selected": ""; ?>>Table 5</option>
                                                    <option value='table 6' <?php echo($row['Table#'] == 'table 6') ? "Selected": ""; ?>>Table 6</option>
                                                    <option value='table 7' <?php echo($row['Table#'] == 'table 7') ? "Selected": ""; ?>>Table 7</option>
                                                    <option value='table 8' <?php echo($row['Table#'] == 'table 8') ? "Selected": ""; ?>>Table 8</option>
                                                    <option value='table 9' <?php echo($row['Table#'] == 'table 9') ? "Selected": ""; ?>>Table 9</option>
                                                    <option value='table 11' <?php echo($row['Table#'] == 'table 11') ? "Selected": ""; ?>>Table 11</option>
                                                    <option value='AQJFIX' <?php echo($row['Table#'] == 'AQJFIX') ? "Selected": ""; ?>>AQJ Fixture</option>
                                                    <option value='BSFIX1' <?php echo($row['Table#'] == 'BSFIX1') ? "Selected": ""; ?>>BS Fixture 1</option>
                                                    <option value='BSFIX2' <?php echo($row['Table#'] == 'BSFIX2') ? "Selected": ""; ?>>BS Fixture 2</option>
                                                    <option value='HARNESS' <?php echo($row['Table#'] == 'HARNESS') ? "Selected": ""; ?>>HARNESS</option>
                                                    <option value='SONIC WELD' <?php echo($row['Table#'] == 'SONIC WELD') ? "Selected": ""; ?>>SONIC WELD</option>
                                                    <option value='BAGGING' <?php echo($row['Table#'] == 'BAGGING') ? "Selected": ""; ?>>BAGGING</option>
                                                    <option value='INKJET' <?php echo($row['Table#'] == 'INKJET') ? "Selected": ""; ?>>INKJET</option>
                                                    <option value='CONDUIT' <?php echo($row['Table#'] == 'CONDUIT') ? "Selected": ""; ?>>CONDUIT</option>
                                                </select>
                                            </div>  
                                        </td>
                                        <td>
                                            <div class='input-field inline' id='status'>
                                                <select>
                                                    <option value='0' <?php echo($row['Status'] == '0') ? "Selected": ""; ?>>Not Started</option>
                                                    <option value='1' <?php echo($row['Status'] == '1') ? "Selected": ""; ?>>Completed</option>
                                                    <option value='2' <?php echo($row['Status'] == '2') ? "Selected": ""; ?>>On Hold</option>
                                                    <option value='3' <?php echo($row['Status'] == '3') ? "Selected": ""; ?>>WIP</option>
                                                </select>
                                            </div>
                                        </td>
                                        <td>
                                            <a class="waves-effect waves-light btn" id='material'>Order Material</a>
                                        </td> 
                                        <td>
                                            <a class="waves-effect waves-light btn" id='recordTime'>Record Time</a>
                                        </td>
                                        <td style="display:none" id="ID" data-id=<?=$row['id']?>><?=$row['id']?></td>  
                                    </tr>
                                
                            
                        <?php } }?>
                    </tbody>
                </table>
            </div>
        </li>
        <li>     
            <div class='collapsible-header'><h6>SONIC WELD</h6></div>
            <div class='collapsible-body'>
                <table class='centered'>
                    <thead>
                        <th>Work Order</th>
                        <th>Part Number</th>
                        <th>Quantity</th>
                        <th>Quoted Time</th>
                        <th>Ship Date</th>
                        <th>Notes</th>
                        <th>Reassign Table</th>
                        <th>Status</th>
                    </thead>
                    <tbody>
                            <?php 
                            foreach($results as $row)
                            {
                                if ($row['Table#'] !== "SONIC WELD") 
                                {
                                    continue;
                                }
                                else
                                {
                            ?>
                                    <tr id='searchable' <?php if($row['Status'] == '1'){echo "class='green lighten-4'";} elseif($row['Status']=='2'){ echo "class='red darken-4'";}elseif($row['Status']=='3'){echo "class='yellow lighten-1'";}else{echo "class=''";}?>>
                                        <td id="WO"><?=$row["WorkOrder"]?></td>
                                        <td id="PN"><?=$row["PN"]?></td>
                                        <td><?=$row["Qty"]?></td>
                                        <td><?=convertTime($row["Quoted_Time"])?></td>
                                        <td><?=$row["Ship_Date"]?></td>
                                        <td>
                                            <div class='input-field inline'>
                                                <input type='text' value='<?=$row["Notes"]?>' class='center-align' id='notes'>
                                            </div>
                                        </td>
                                        <td>
                                            <div class='input-field inline'>
                                                <select id='table'>
                                                    <option value='table 1' <?php echo($row['Table#'] == 'table 1') ? "Selected": ""; ?>>Table 1</option>
                                                    <option value='table 2' <?php echo($row['Table#'] == 'table 2') ? "Selected": ""; ?>>Table 2</option>
                                                    <option value='table 3' <?php echo($row['Table#'] == 'table 3') ? "Selected": ""; ?>>Table 3</option>
                                                    <option value='table 4' <?php echo($row['Table#'] == 'table 4') ? "Selected": ""; ?>>Table 4</option>
                                                    <option value='table 5' <?php echo($row['Table#'] == 'table 5') ? "Selected": ""; ?>>Table 5</option>
                                                    <option value='table 6' <?php echo($row['Table#'] == 'table 6') ? "Selected": ""; ?>>Table 6</option>
                                                    <option value='table 7' <?php echo($row['Table#'] == 'table 7') ? "Selected": ""; ?>>Table 7</option>
                                                    <option value='table 8' <?php echo($row['Table#'] == 'table 8') ? "Selected": ""; ?>>Table 8</option>
                                                    <option value='table 9' <?php echo($row['Table#'] == 'table 9') ? "Selected": ""; ?>>Table 9</option>
                                                    <option value='table 11' <?php echo($row['Table#'] == 'table 11') ? "Selected": ""; ?>>Table 11</option>
                                                    <option value='AQJFIX' <?php echo($row['Table#'] == 'AQJFIX') ? "Selected": ""; ?>>AQJ Fixture</option>
                                                    <option value='BSFIX1' <?php echo($row['Table#'] == 'BSFIX1') ? "Selected": ""; ?>>BS Fixture 1</option>
                                                    <option value='BSFIX2' <?php echo($row['Table#'] == 'BSFIX2') ? "Selected": ""; ?>>BS Fixture 2</option>
                                                    <option value='HARNESS' <?php echo($row['Table#'] == 'HARNESS') ? "Selected": ""; ?>>HARNESS</option>
                                                    <option value='SONIC WELD' <?php echo($row['Table#'] == 'SONIC WELD') ? "Selected": ""; ?>>SONIC WELD</option>
                                                    <option value='BAGGING' <?php echo($row['Table#'] == 'BAGGING') ? "Selected": ""; ?>>BAGGING</option>
                                                    <option value='INKJET' <?php echo($row['Table#'] == 'INKJET') ? "Selected": ""; ?>>INKJET</option>
                                                    <option value='CONDUIT' <?php echo($row['Table#'] == 'CONDUIT') ? "Selected": ""; ?>>CONDUIT</option>
                                                </select>
                                            </div>  
                                        </td>
                                        <td>
                                            <div class='input-field inline' id='status'>
                                                <select>
                                                    <option value='0' <?php echo($row['Status'] == '0') ? "Selected": ""; ?>>Not Started</option>
                                                    <option value='1' <?php echo($row['Status'] == '1') ? "Selected": ""; ?>>Completed</option>
                                                    <option value='2' <?php echo($row['Status'] == '2') ? "Selected": ""; ?>>On Hold</option>
                                                    <option value='3' <?php echo($row['Status'] == '3') ? "Selected": ""; ?>>WIP</option>
                                                </select>
                                            </div>
                                        </td>
                                        <td>
                                            <a class="waves-effect waves-light btn" id='material'>Order Material</a>
                                        </td> 
                                        <td>
                                            <a class="waves-effect waves-light btn" id='recordTime'>Record Time</a>
                                        </td>
                                        <td style="display:none" id="ID" data-id=<?=$row['id']?>><?=$row['id']?></td>  
                                    </tr>
                                
                            
                        <?php } }?>
                    </tbody>
                </table>
            </div>
        </li>
        <li>     
            <div class='collapsible-header'><h6>BAGGING</h6></div>
            <div class='collapsible-body'>
                <table class='centered'>
                    <thead>
                        <th>Work Order</th>
                        <th>Part Number</th>
                        <th>Quantity</th>
                        <th>Quoted Time</th>
                        <th>Ship Date</th>
                        <th>Notes</th>
                        <th>Reassign Table</th>
                        <th>Status</th>
                    </thead>
                    <tbody>
                            <?php 
                            foreach($results as $row)
                            {
                                if ($row['Table#'] !== "BAGGING") 
                                {
                                    continue;
                                }
                                else
                                {
                            ?>
                                    <tr id='searchable' <?php if($row['Status'] == '1'){echo "class='green lighten-4'";} elseif($row['Status']=='2'){ echo "class='red darken-4'";}elseif($row['Status']=='3'){echo "class='yellow lighten-1'";}else{echo "class=''";}?>>
                                        <td id="WO"><?=$row["WorkOrder"]?></td>
                                        <td id="PN"><?=$row["PN"]?></td>
                                        <td><?=$row["Qty"]?></td>
                                        <td><?=convertTime($row["Quoted_Time"])?></td>
                                        <td><?=$row["Ship_Date"]?></td>
                                        <td>
                                            <div class='input-field inline'>
                                                <input type='text' value='<?=$row["Notes"]?>' class='center-align' id='notes'>
                                            </div>
                                        </td>
                                        <td>
                                            <div class='input-field inline'>
                                                <select id='table'>
                                                    <option value='table 1' <?php echo($row['Table#'] == 'table 1') ? "Selected": ""; ?>>Table 1</option>
                                                    <option value='table 2' <?php echo($row['Table#'] == 'table 2') ? "Selected": ""; ?>>Table 2</option>
                                                    <option value='table 3' <?php echo($row['Table#'] == 'table 3') ? "Selected": ""; ?>>Table 3</option>
                                                    <option value='table 4' <?php echo($row['Table#'] == 'table 4') ? "Selected": ""; ?>>Table 4</option>
                                                    <option value='table 5' <?php echo($row['Table#'] == 'table 5') ? "Selected": ""; ?>>Table 5</option>
                                                    <option value='table 6' <?php echo($row['Table#'] == 'table 6') ? "Selected": ""; ?>>Table 6</option>
                                                    <option value='table 7' <?php echo($row['Table#'] == 'table 7') ? "Selected": ""; ?>>Table 7</option>
                                                    <option value='table 8' <?php echo($row['Table#'] == 'table 8') ? "Selected": ""; ?>>Table 8</option>
                                                    <option value='table 9' <?php echo($row['Table#'] == 'table 9') ? "Selected": ""; ?>>Table 9</option>
                                                    <option value='table 11' <?php echo($row['Table#'] == 'table 11') ? "Selected": ""; ?>>Table 11</option>
                                                    <option value='AQJFIX' <?php echo($row['Table#'] == 'AQJFIX') ? "Selected": ""; ?>>AQJ Fixture</option>
                                                    <option value='BSFIX1' <?php echo($row['Table#'] == 'BSFIX1') ? "Selected": ""; ?>>BS Fixture 1</option>
                                                    <option value='BSFIX2' <?php echo($row['Table#'] == 'BSFIX2') ? "Selected": ""; ?>>BS Fixture 2</option>
                                                    <option value='HARNESS' <?php echo($row['Table#'] == 'HARNESS') ? "Selected": ""; ?>>HARNESS</option>
                                                    <option value='SONIC WELD' <?php echo($row['Table#'] == 'SONIC WELD') ? "Selected": ""; ?>>SONIC WELD</option>
                                                    <option value='BAGGING' <?php echo($row['Table#'] == 'BAGGING') ? "Selected": ""; ?>>BAGGING</option>
                                                    <option value='INKJET' <?php echo($row['Table#'] == 'INKJET') ? "Selected": ""; ?>>INKJET</option>
                                                    <option value='CONDUIT' <?php echo($row['Table#'] == 'CONDUIT') ? "Selected": ""; ?>>CONDUIT</option>
                                                </select>
                                            </div>  
                                        </td>
                                        <td>
                                            <div class='input-field inline' id='status'>
                                                <select>
                                                    <option value='0' <?php echo($row['Status'] == '0') ? "Selected": ""; ?>>Not Started</option>
                                                    <option value='1' <?php echo($row['Status'] == '1') ? "Selected": ""; ?>>Completed</option>
                                                    <option value='2' <?php echo($row['Status'] == '2') ? "Selected": ""; ?>>On Hold</option>
                                                    <option value='3' <?php echo($row['Status'] == '3') ? "Selected": ""; ?>>WIP</option>
                                                </select>
                                            </div>
                                        </td>
                                        <td>
                                            <a class="waves-effect waves-light btn" id='material'>Order Material</a>
                                        </td> 
                                        <td>
                                            <a class="waves-effect waves-light btn" id='recordTime'>Record Time</a>
                                        </td>
                                        <td style="display:none" id="ID" data-id=<?=$row['id']?>><?=$row['id']?></td>  
                                    </tr>
                                
                            
                        <?php } }?>
                    </tbody>
                </table>
            </div>
        </li>
        <li>     
            <div class='collapsible-header'><h6>INKJET</h6></div>
            <div class='collapsible-body'>
                <table class='centered'>
                    <thead>
                        <th>Work Order</th>
                        <th>Part Number</th>
                        <th>Quantity</th>
                        <th>Quoted Time</th>
                        <th>Ship Date</th>
                        <th>Notes</th>
                        <th>Reassign Table</th>
                        <th>Status</th>
                    </thead>
                    <tbody>
                            <?php 
                            foreach($results as $row)
                            {
                                if ($row['Table#'] !== "INKJET") 
                                {
                                    continue;
                                }
                                else
                                {
                            ?>
                                    <tr id='searchable' <?php if($row['Status'] == '1'){echo "class='green lighten-4'";} elseif($row['Status']=='2'){ echo "class='red darken-4'";}elseif($row['Status']=='3'){echo "class='yellow lighten-1'";}else{echo "class=''";}?>>
                                        <td id="WO"><?=$row["WorkOrder"]?></td>
                                        <td id="PN"><?=$row["PN"]?></td>
                                        <td><?=$row["Qty"]?></td>
                                        <td><?=convertTime($row["Quoted_Time"])?></td>
                                        <td><?=$row["Ship_Date"]?></td>
                                        <td>
                                            <div class='input-field inline'>
                                                <input type='text' value='<?=$row["Notes"]?>' class='center-align' id='notes'>
                                            </div>
                                        </td>
                                        <td>
                                            <div class='input-field inline'>
                                                <select id='table'>
                                                    <option value='table 1' <?php echo($row['Table#'] == 'table 1') ? "Selected": ""; ?>>Table 1</option>
                                                    <option value='table 2' <?php echo($row['Table#'] == 'table 2') ? "Selected": ""; ?>>Table 2</option>
                                                    <option value='table 3' <?php echo($row['Table#'] == 'table 3') ? "Selected": ""; ?>>Table 3</option>
                                                    <option value='table 4' <?php echo($row['Table#'] == 'table 4') ? "Selected": ""; ?>>Table 4</option>
                                                    <option value='table 5' <?php echo($row['Table#'] == 'table 5') ? "Selected": ""; ?>>Table 5</option>
                                                    <option value='table 6' <?php echo($row['Table#'] == 'table 6') ? "Selected": ""; ?>>Table 6</option>
                                                    <option value='table 7' <?php echo($row['Table#'] == 'table 7') ? "Selected": ""; ?>>Table 7</option>
                                                    <option value='table 8' <?php echo($row['Table#'] == 'table 8') ? "Selected": ""; ?>>Table 8</option>
                                                    <option value='table 9' <?php echo($row['Table#'] == 'table 9') ? "Selected": ""; ?>>Table 9</option>
                                                    <option value='table 11' <?php echo($row['Table#'] == 'table 11') ? "Selected": ""; ?>>Table 11</option>
                                                    <option value='AQJFIX' <?php echo($row['Table#'] == 'AQJFIX') ? "Selected": ""; ?>>AQJ Fixture</option>
                                                    <option value='BSFIX1' <?php echo($row['Table#'] == 'BSFIX1') ? "Selected": ""; ?>>BS Fixture 1</option>
                                                    <option value='BSFIX2' <?php echo($row['Table#'] == 'BSFIX2') ? "Selected": ""; ?>>BS Fixture 2</option>
                                                    <option value='HARNESS' <?php echo($row['Table#'] == 'HARNESS') ? "Selected": ""; ?>>HARNESS</option>
                                                    <option value='SONIC WELD' <?php echo($row['Table#'] == 'SONIC WELD') ? "Selected": ""; ?>>SONIC WELD</option>
                                                    <option value='BAGGING' <?php echo($row['Table#'] == 'BAGGING') ? "Selected": ""; ?>>BAGGING</option>
                                                    <option value='INKJET' <?php echo($row['Table#'] == 'INKJET') ? "Selected": ""; ?>>INKJET</option>
                                                    <option value='CONDUIT' <?php echo($row['Table#'] == 'CONDUIT') ? "Selected": ""; ?>>CONDUIT</option>
                                                </select>
                                            </div>  
                                        </td>
                                        <td>
                                            <div class='input-field inline' id='status'>
                                                <select>
                                                    <option value='0' <?php echo($row['Status'] == '0') ? "Selected": ""; ?>>Not Started</option>
                                                    <option value='1' <?php echo($row['Status'] == '1') ? "Selected": ""; ?>>Completed</option>
                                                    <option value='2' <?php echo($row['Status'] == '2') ? "Selected": ""; ?>>On Hold</option>
                                                    <option value='3' <?php echo($row['Status'] == '3') ? "Selected": ""; ?>>WIP</option>
                                                </select>
                                            </div>
                                        </td>
                                        <td>
                                            <a class="waves-effect waves-light btn" id='material'>Order Material</a>
                                        </td> 
                                        <td>
                                            <a class="waves-effect waves-light btn" id='recordTime'>Record Time</a>
                                        </td>
                                        <td style="display:none" id="ID" data-id=<?=$row['id']?>><?=$row['id']?></td>  
                                    </tr>
                                
                            
                        <?php } }?>
                    </tbody>
                </table>
            </div>
        </li>
        <li>     
            <div class='collapsible-header'><h6>CONDUIT</h6></div>
            <div class='collapsible-body'>
                <table class='centered'>
                    <thead>
                        <th>Work Order</th>
                        <th>Part Number</th>
                        <th>Quantity</th>
                        <th>Quoted Time</th>
                        <th>Ship Date</th>
                        <th>Notes</th>
                        <th>Reassign Table</th>
                        <th>Status</th>
                    </thead>
                    <tbody>
                            <?php 
                            foreach($results as $row)
                            {
                                if ($row['Table#'] !== "CONDUIT") 
                                {
                                    continue;
                                }
                                else
                                {
                            ?>
                                    <tr id='searchable' <?php if($row['Status'] == '1'){echo "class='green lighten-4'";} elseif($row['Status']=='2'){ echo "class='red darken-4'";}elseif($row['Status']=='3'){echo "class='yellow lighten-1'";}else{echo "class=''";}?>>
                                        <td id="WO"><?=$row["WorkOrder"]?></td>
                                        <td id="PN"><?=$row["PN"]?></td>
                                        <td><?=$row["Qty"]?></td>
                                        <td><?=convertTime($row["Quoted_Time"])?></td>
                                        <td><?=$row["Ship_Date"]?></td>
                                        <td>
                                            <div class='input-field inline'>
                                                <input type='text' value='<?=$row["Notes"]?>' class='center-align' id='notes'>
                                            </div>
                                        </td>
                                        <td>
                                            <div class='input-field inline'>
                                                <select id='table'>
                                                    <option value='table 1' <?php echo($row['Table#'] == 'table 1') ? "Selected": ""; ?>>Table 1</option>
                                                    <option value='table 2' <?php echo($row['Table#'] == 'table 2') ? "Selected": ""; ?>>Table 2</option>
                                                    <option value='table 3' <?php echo($row['Table#'] == 'table 3') ? "Selected": ""; ?>>Table 3</option>
                                                    <option value='table 4' <?php echo($row['Table#'] == 'table 4') ? "Selected": ""; ?>>Table 4</option>
                                                    <option value='table 5' <?php echo($row['Table#'] == 'table 5') ? "Selected": ""; ?>>Table 5</option>
                                                    <option value='table 6' <?php echo($row['Table#'] == 'table 6') ? "Selected": ""; ?>>Table 6</option>
                                                    <option value='table 7' <?php echo($row['Table#'] == 'table 7') ? "Selected": ""; ?>>Table 7</option>
                                                    <option value='table 8' <?php echo($row['Table#'] == 'table 8') ? "Selected": ""; ?>>Table 8</option>
                                                    <option value='table 9' <?php echo($row['Table#'] == 'table 9') ? "Selected": ""; ?>>Table 9</option>
                                                    <option value='table 11' <?php echo($row['Table#'] == 'table 11') ? "Selected": ""; ?>>Table 11</option>
                                                    <option value='AQJFIX' <?php echo($row['Table#'] == 'AQJFIX') ? "Selected": ""; ?>>AQJ Fixture</option>
                                                    <option value='BSFIX1' <?php echo($row['Table#'] == 'BSFIX1') ? "Selected": ""; ?>>BS Fixture 1</option>
                                                    <option value='BSFIX2' <?php echo($row['Table#'] == 'BSFIX2') ? "Selected": ""; ?>>BS Fixture 2</option>
                                                    <option value='HARNESS' <?php echo($row['Table#'] == 'HARNESS') ? "Selected": ""; ?>>HARNESS</option>
                                                    <option value='SONIC WELD' <?php echo($row['Table#'] == 'SONIC WELD') ? "Selected": ""; ?>>SONIC WELD</option>
                                                    <option value='BAGGING' <?php echo($row['Table#'] == 'BAGGING') ? "Selected": ""; ?>>BAGGING</option>
                                                    <option value='INKJET' <?php echo($row['Table#'] == 'INKJET') ? "Selected": ""; ?>>INKJET</option>
                                                    <option value='CONDUIT' <?php echo($row['Table#'] == 'CONDUIT') ? "Selected": ""; ?>>CONDUIT</option>
                                                </select>
                                            </div>  
                                        </td>
                                        <td>
                                            <div class='input-field inline' id='status'>
                                                <select>
                                                    <option value='0' <?php echo($row['Status'] == '0') ? "Selected": ""; ?>>Not Started</option>
                                                    <option value='1' <?php echo($row['Status'] == '1') ? "Selected": ""; ?>>Completed</option>
                                                    <option value='2' <?php echo($row['Status'] == '2') ? "Selected": ""; ?>>On Hold</option>
                                                    <option value='3' <?php echo($row['Status'] == '3') ? "Selected": ""; ?>>WIP</option>
                                                </select>
                                            </div>
                                        </td>
                                        <td>
                                            <a class="waves-effect waves-light btn" id='material'>Order Material</a>
                                        </td> 
                                        <td>
                                            <a class="waves-effect waves-light btn" id='recordTime'>Record Time</a>
                                        </td>
                                        <td style="display:none" id="ID" data-id=<?=$row['id']?>><?=$row['id']?></td>  
                                    </tr>
                                
                            
                        <?php } }?>
                    </tbody>
                </table>
            </div>
        </li>
    </ul>


<div id='ack' style="display:none;">
    <h4>Material Request</h4>
    <form id='formlogin' class='col s12' method="POST" action="http://192.168.1.130/MR_Building2/Controller/PHP/FormAction2.php">
        <div class='row'>
            <div class="input-field col s12">
                <input id="Work_Order" name="Work_Order" readonly="readonly">
            </div>
            <div class="input-field col s12">
                <input id="area" name="Area" readonly="readonly">
            </div>
            <div class="input-field col s12">
                <input placeholder='Employee ID' type='text' id='empID' name="ID">
            </div>
            <div class="input-field col s12">
                <select name="TimeNeeded">
                    <option value="" disabled selected>  Choose a time</option>
                        <?php for($i = 0; $i < 10; $i++): ?>
						    <option value="<?= date('h:i a',time() + $i * 3600*.25) ?>"><?= date('h:i A',time() + $i * 3600*.25) ?></option>
					    <?php endfor ?>
                </select>
            </div>
		        <button type='submit' id='submit' class='btn btn-primary'>Submit</button>
        </div>
    </form>
</div> 


<div id='recordForm' style="display:none;">
    <h4>Record Time</h4>
    <form id='formRecord' class='col s12'>
        <div class='row'>
            <div class="input-field col s12">
                <input id="recordWork_Order" name="recordWork_Order" readonly="readonly">
            </div>
            <div class="input-field col s12">
                <input id="recordPartNumber" name="recordPartNumber" readonly="readonly">
            </div>
            <div class="input-field col s12">
                <input id="recordarea" name="recordArea" readonly="readonly">
            </div>
            <div class="input-field col s12">
                <input placeholder="" id="qty" name="qty" type="number" />
                <label for="qty">Starting/Ending Quantity</label>
            </div>
            <div class="input-field col s12">
                <input placeholder="" id="numOfPeople" name="numOfPeople" type="number" class="validate" required="" value="1">
                <label for="numOfPeople"># of people</label>
            </div>
            <div class="col s4">
                <a class="waves-effect waves-light btn" id='start'>Start</a>
            </div>
            <div class="col s4">
                <a class="waves-effect waves-light btn" id='stop'>Stop</a>
            </div>
            <div class="col s4">
                <a class="waves-effect waves-light btn" id='exit'>Exit</a>
            </div>

        </div>
    </form>
</div>    
    
    <script src='../JS/findpartnumber.js'></script>
    <script src='../JS/SortTables.js'></script>
    <script src='../JS/jquery.simple.timer.js'></script>
    <script type='text/javascript' src='../JS/MaterialRequest.js'></script>
</body>
</html>