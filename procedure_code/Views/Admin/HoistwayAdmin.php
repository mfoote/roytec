<?php
include('../../Database/dbconnect.php');
include('../../Templates/Header.php');
Hoistway_Part_List();
?>


<ul class='collapsible' data-collapsible='expandable'>
        <li>     
            <div class='collapsible-header'><h6>Table 1</h6></div>
            <div class='collapsible-body'>
                <table class='centered'>
                    <thead>
                        <th>Part Number</th>
                        <th>Reassign Table</th>
                    </thead>
                    <tbody>
                            <?php 
                            foreach($results as $row)
                            {
                                if ($row['table'] !== "1") 
                                {
                                    continue;
                                }
                                else
                                {
                            ?>
                                    <tr id='searchable'>
                                        <td id="WO"><?=$row["Item"]?></td>
                                        <td>
                                            <div class='input-field inline'>
                                            <select id='table'>
[                                               <option value='1' <?php echo($row['table'] == '1') ? "Selected": ""; ?>>Table 1</option>
                                                <option value='2' <?php echo($row['table'] == '2') ? "Selected": ""; ?>>Table 2</option>
                                                <option value='3' <?php echo($row['table'] == '3') ? "Selected": ""; ?>>Table 3</option>
                                                <option value='4' <?php echo($row['table'] == '4') ? "Selected": ""; ?>>Table 4</option>
                                                <option value='5' <?php echo($row['table'] == '5') ? "Selected": ""; ?>>Table 5</option>
                                                <option value='6' <?php echo($row['table'] == '6') ? "Selected": ""; ?>>Table 6</option>
                                                <option value='7' <?php echo($row['table'] == '7') ? "Selected": ""; ?>>Table 7</option>
                                                <option value='8' <?php echo($row['table'] == '8') ? "Selected": ""; ?>>Table 8</option>
                                                <option value='9' <?php echo($row['table'] == '9') ? "Selected": ""; ?>>Table 9</option>
                                                <option value='10' <?php echo($row['table'] == '10') ? "Selected": ""; ?>>Table 10</option>
                                                <option value='11' <?php echo($row['table'] == '11') ? "Selected": ""; ?>>Table 11</option>
                                                <option value='12' <?php echo($row['table'] == '12') ? "Selected": ""; ?>>Table 12</option>
                                            </select>
                                        </div>  
                                    </td> 
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
                        <th>Part Number</th>
                        <th>Reassign Table</th>
                    </thead>
                    <tbody>
                            <?php 
                            foreach($results as $row)
                            {
                                if ($row['table'] !== "2") 
                                {
                                    continue;
                                }
                                else
                                {
                            ?>
                                    <tr id='searchable'>
                                        <td id="WO"><?=$row["Item"]?></td>
                                        <td>
                                            <div class='input-field inline'>
                                                <select id='table'>
                                                    <option value='1' <?php echo($row['table'] == '1') ? "Selected": ""; ?>>Table 1</option>
                                                    <option value='2' <?php echo($row['table'] == '2') ? "Selected": ""; ?>>Table 2</option>
                                                    <option value='3' <?php echo($row['table'] == '3') ? "Selected": ""; ?>>Table 3</option>
                                                    <option value='4' <?php echo($row['table'] == '4') ? "Selected": ""; ?>>Table 4</option>
                                                    <option value='5' <?php echo($row['table'] == '5') ? "Selected": ""; ?>>Table 5</option>
                                                    <option value='6' <?php echo($row['table'] == '6') ? "Selected": ""; ?>>Table 6</option>
                                                    <option value='7' <?php echo($row['table'] == '7') ? "Selected": ""; ?>>Table 7</option>
                                                    <option value='8' <?php echo($row['table'] == '8') ? "Selected": ""; ?>>Table 8</option>
                                                    <option value='9' <?php echo($row['table'] == '9') ? "Selected": ""; ?>>Table 9</option>
                                                    <option value='10' <?php echo($row['table'] == '10') ? "Selected": ""; ?>>Table 10</option>
                                                    <option value='11' <?php echo($row['table'] == '11') ? "Selected": ""; ?>>Table 11</option>
                                                    <option value='12' <?php echo($row['table'] == '12') ? "Selected": ""; ?>>Table 12</option>
                                                </select>
                                            </div>  
                                        </td> 
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
                        <th>Part Number</th>
                        <th>Reassign Table</th>
                    </thead>
                    <tbody>
                            <?php 
                            foreach($results as $row)
                            {
                                if ($row['table'] !== "3") 
                                {
                                    continue;
                                }
                                else
                                {
                            ?>
                                    <tr id='searchable'>
                                        <td id="WO"><?=$row["Item"]?></td>
                                        <td>
                                            <div class='input-field inline'>
                                                <select id='table'>
                                                    <option value='1' <?php echo($row['table'] == '1') ? "Selected": ""; ?>>Table 1</option>
                                                    <option value='2' <?php echo($row['table'] == '2') ? "Selected": ""; ?>>Table 2</option>
                                                    <option value='3' <?php echo($row['table'] == '3') ? "Selected": ""; ?>>Table 3</option>
                                                    <option value='4' <?php echo($row['table'] == '4') ? "Selected": ""; ?>>Table 4</option>
                                                    <option value='5' <?php echo($row['table'] == '5') ? "Selected": ""; ?>>Table 5</option>
                                                    <option value='6' <?php echo($row['table'] == '6') ? "Selected": ""; ?>>Table 6</option>
                                                    <option value='7' <?php echo($row['table'] == '7') ? "Selected": ""; ?>>Table 7</option>
                                                    <option value='8' <?php echo($row['table'] == '8') ? "Selected": ""; ?>>Table 8</option>
                                                    <option value='9' <?php echo($row['table'] == '9') ? "Selected": ""; ?>>Table 9</option>
                                                    <option value='10' <?php echo($row['table'] == '10') ? "Selected": ""; ?>>Table 10</option>
                                                    <option value='11' <?php echo($row['table'] == '11') ? "Selected": ""; ?>>Table 11</option>
                                                    <option value='12' <?php echo($row['table'] == '12') ? "Selected": ""; ?>>Table 12</option>
                                                </select>
                                            </div>  
                                        </td> 
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
                        <th>Part Number</th>
                        <th>Reassign Table</th>
                    </thead>
                    <tbody>
                            <?php 
                            foreach($results as $row)
                            {
                                if ($row['table'] !== "4") 
                                {
                                    continue;
                                }
                                else
                                {
                            ?>
                                    <tr id='searchable'>
                                        <td id="WO"><?=$row["Item"]?></td>
                                        <td>
                                            <div class='input-field inline'>
                                                <select id='table'>
                                                    <option value='1' <?php echo($row['table'] == '1') ? "Selected": ""; ?>>Table 1</option>
                                                    <option value='2' <?php echo($row['table'] == '2') ? "Selected": ""; ?>>Table 2</option>
                                                    <option value='3' <?php echo($row['table'] == '3') ? "Selected": ""; ?>>Table 3</option>
                                                    <option value='4' <?php echo($row['table'] == '4') ? "Selected": ""; ?>>Table 4</option>
                                                    <option value='5' <?php echo($row['table'] == '5') ? "Selected": ""; ?>>Table 5</option>
                                                    <option value='6' <?php echo($row['table'] == '6') ? "Selected": ""; ?>>Table 6</option>
                                                    <option value='7' <?php echo($row['table'] == '7') ? "Selected": ""; ?>>Table 7</option>
                                                    <option value='8' <?php echo($row['table'] == '8') ? "Selected": ""; ?>>Table 8</option>
                                                    <option value='9' <?php echo($row['table'] == '9') ? "Selected": ""; ?>>Table 9</option>
                                                    <option value='10' <?php echo($row['table'] == '10') ? "Selected": ""; ?>>Table 10</option>
                                                    <option value='11' <?php echo($row['table'] == '11') ? "Selected": ""; ?>>Table 11</option>
                                                    <option value='12' <?php echo($row['table'] == '12') ? "Selected": ""; ?>>Table 12</option>
                                                </select>
                                            </div>  
                                        </td> 
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
                        <th>Part Number</th>
                        <th>Reassign Table</th>
                    </thead>
                    <tbody>
                            <?php 
                            foreach($results as $row)
                            {
                                if ($row['table'] !== "5") 
                                {
                                    continue;
                                }
                                else
                                {
                            ?>
                                    <tr id='searchable'>
                                        <td id="WO"><?=$row["Item"]?></td>
                                        <td>
                                            <div class='input-field inline'>
                                                <select id='table'>
                                                    <option value='1' <?php echo($row['table'] == '1') ? "Selected": ""; ?>>Table 1</option>
                                                    <option value='2' <?php echo($row['table'] == '2') ? "Selected": ""; ?>>Table 2</option>
                                                    <option value='3' <?php echo($row['table'] == '3') ? "Selected": ""; ?>>Table 3</option>
                                                    <option value='4' <?php echo($row['table'] == '4') ? "Selected": ""; ?>>Table 4</option>
                                                    <option value='5' <?php echo($row['table'] == '5') ? "Selected": ""; ?>>Table 5</option>
                                                    <option value='6' <?php echo($row['table'] == '6') ? "Selected": ""; ?>>Table 6</option>
                                                    <option value='7' <?php echo($row['table'] == '7') ? "Selected": ""; ?>>Table 7</option>
                                                    <option value='8' <?php echo($row['table'] == '8') ? "Selected": ""; ?>>Table 8</option>
                                                    <option value='9' <?php echo($row['table'] == '9') ? "Selected": ""; ?>>Table 9</option>
                                                    <option value='10' <?php echo($row['table'] == '10') ? "Selected": ""; ?>>Table 10</option>
                                                    <option value='11' <?php echo($row['table'] == '11') ? "Selected": ""; ?>>Table 11</option>
                                                    <option value='12' <?php echo($row['table'] == '12') ? "Selected": ""; ?>>Table 12</option>
                                                </select>
                                            </div>  
                                        </td> 
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
                        <th>Part Number</th>
                        <th>Reassign Table</th>
                    </thead>
                    <tbody>
                            <?php 
                            foreach($results as $row)
                            {
                                if ($row['table'] !== "6") 
                                {
                                    continue;
                                }
                                else
                                {
                            ?>
                                    <tr id='searchable'>
                                        <td id="WO"><?=$row["Item"]?></td>
                                        <td>
                                            <div class='input-field inline'>
                                                <select id='table'>
                                                    <option value='1' <?php echo($row['table'] == '1') ? "Selected": ""; ?>>Table 1</option>
                                                    <option value='2' <?php echo($row['table'] == '2') ? "Selected": ""; ?>>Table 2</option>
                                                    <option value='3' <?php echo($row['table'] == '3') ? "Selected": ""; ?>>Table 3</option>
                                                    <option value='4' <?php echo($row['table'] == '4') ? "Selected": ""; ?>>Table 4</option>
                                                    <option value='5' <?php echo($row['table'] == '5') ? "Selected": ""; ?>>Table 5</option>
                                                    <option value='6' <?php echo($row['table'] == '6') ? "Selected": ""; ?>>Table 6</option>
                                                    <option value='7' <?php echo($row['table'] == '7') ? "Selected": ""; ?>>Table 7</option>
                                                    <option value='8' <?php echo($row['table'] == '8') ? "Selected": ""; ?>>Table 8</option>
                                                    <option value='9' <?php echo($row['table'] == '9') ? "Selected": ""; ?>>Table 9</option>
                                                    <option value='10' <?php echo($row['table'] == '10') ? "Selected": ""; ?>>Table 10</option>
                                                    <option value='11' <?php echo($row['table'] == '11') ? "Selected": ""; ?>>Table 11</option>
                                                    <option value='12' <?php echo($row['table'] == '12') ? "Selected": ""; ?>>Table 12</option>
                                                </select>
                                            </div>  
                                        </td> 
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
                        <th>Part Number</th>
                        <th>Reassign Table</th>
                    </thead>
                    <tbody>
                            <?php 
                            foreach($results as $row)
                            {
                                if ($row['table'] !== "7") 
                                {
                                    continue;
                                }
                                else
                                {
                            ?>
                                    <tr id='searchable'>
                                        <td id="WO"><?=$row["Item"]?></td>
                                        <td>
                                            <div class='input-field inline'>
                                                <select id='table'>
                                                    <option value='1' <?php echo($row['table'] == '1') ? "Selected": ""; ?>>Table 1</option>
                                                    <option value='2' <?php echo($row['table'] == '2') ? "Selected": ""; ?>>Table 2</option>
                                                    <option value='3' <?php echo($row['table'] == '3') ? "Selected": ""; ?>>Table 3</option>
                                                    <option value='4' <?php echo($row['table'] == '4') ? "Selected": ""; ?>>Table 4</option>
                                                    <option value='5' <?php echo($row['table'] == '5') ? "Selected": ""; ?>>Table 5</option>
                                                    <option value='6' <?php echo($row['table'] == '6') ? "Selected": ""; ?>>Table 6</option>
                                                    <option value='7' <?php echo($row['table'] == '7') ? "Selected": ""; ?>>Table 7</option>
                                                    <option value='8' <?php echo($row['table'] == '8') ? "Selected": ""; ?>>Table 8</option>
                                                    <option value='9' <?php echo($row['table'] == '9') ? "Selected": ""; ?>>Table 9</option>
                                                    <option value='10' <?php echo($row['table'] == '10') ? "Selected": ""; ?>>Table 10</option>
                                                    <option value='11' <?php echo($row['table'] == '11') ? "Selected": ""; ?>>Table 11</option>
                                                    <option value='12' <?php echo($row['table'] == '12') ? "Selected": ""; ?>>Table 12</option>
                                                </select>
                                            </div>  
                                        </td> 
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
                        <th>Part Number</th>
                        <th>Reassign Table</th>
                    </thead>
                    <tbody>
                            <?php 
                            foreach($results as $row)
                            {
                                if ($row['table'] !== "8") 
                                {
                                    continue;
                                }
                                else
                                {
                            ?>
                                    <tr id='searchable'>
                                        <td id="WO"><?=$row["Item"]?></td>
                                        <td>
                                            <div class='input-field inline'>
                                                <select id='table'>
                                                    <option value='1' <?php echo($row['table'] == '1') ? "Selected": ""; ?>>Table 1</option>
                                                    <option value='2' <?php echo($row['table'] == '2') ? "Selected": ""; ?>>Table 2</option>
                                                    <option value='3' <?php echo($row['table'] == '3') ? "Selected": ""; ?>>Table 3</option>
                                                    <option value='4' <?php echo($row['table'] == '4') ? "Selected": ""; ?>>Table 4</option>
                                                    <option value='5' <?php echo($row['table'] == '5') ? "Selected": ""; ?>>Table 5</option>
                                                    <option value='6' <?php echo($row['table'] == '6') ? "Selected": ""; ?>>Table 6</option>
                                                    <option value='7' <?php echo($row['table'] == '7') ? "Selected": ""; ?>>Table 7</option>
                                                    <option value='8' <?php echo($row['table'] == '8') ? "Selected": ""; ?>>Table 8</option>
                                                    <option value='9' <?php echo($row['table'] == '9') ? "Selected": ""; ?>>Table 9</option>
                                                    <option value='10' <?php echo($row['table'] == '10') ? "Selected": ""; ?>>Table 10</option>
                                                    <option value='11' <?php echo($row['table'] == '11') ? "Selected": ""; ?>>Table 11</option>
                                                    <option value='12' <?php echo($row['table'] == '12') ? "Selected": ""; ?>>Table 12</option>
                                                </select>
                                            </div>  
                                        </td> 
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
                        <th>Part Number</th>
                        <th>Reassign Table</th>
                    </thead>
                    <tbody>
                            <?php 
                            foreach($results as $row)
                            {
                                if ($row['table'] !== "9") 
                                {
                                    continue;
                                }
                                else
                                {
                            ?>
                                    <tr id='searchable'>
                                        <td id="WO"><?=$row["Item"]?></td>
                                        <td>
                                            <div class='input-field inline'>
                                                <select id='table'>
                                                    <option value='1' <?php echo($row['table'] == '1') ? "Selected": ""; ?>>Table 1</option>
                                                    <option value='2' <?php echo($row['table'] == '2') ? "Selected": ""; ?>>Table 2</option>
                                                    <option value='3' <?php echo($row['table'] == '3') ? "Selected": ""; ?>>Table 3</option>
                                                    <option value='4' <?php echo($row['table'] == '4') ? "Selected": ""; ?>>Table 4</option>
                                                    <option value='5' <?php echo($row['table'] == '5') ? "Selected": ""; ?>>Table 5</option>
                                                    <option value='6' <?php echo($row['table'] == '6') ? "Selected": ""; ?>>Table 6</option>
                                                    <option value='7' <?php echo($row['table'] == '7') ? "Selected": ""; ?>>Table 7</option>
                                                    <option value='8' <?php echo($row['table'] == '8') ? "Selected": ""; ?>>Table 8</option>
                                                    <option value='9' <?php echo($row['table'] == '9') ? "Selected": ""; ?>>Table 9</option>
                                                    <option value='10' <?php echo($row['table'] == '10') ? "Selected": ""; ?>>Table 10</option>
                                                    <option value='11' <?php echo($row['table'] == '11') ? "Selected": ""; ?>>Table 11</option>
                                                    <option value='12' <?php echo($row['table'] == '12') ? "Selected": ""; ?>>Table 12</option>
                                                </select>
                                            </div>  
                                        </td> 
                                    </tr>
                        <?php } }?>
                    </tbody>
                </table>
            </div>
        </li>
        <li>     
            <div class='collapsible-header'><h6>Table 10</h6></div>
            <div class='collapsible-body'>
                <table class='centered'>
                    <thead>
                        <th>Part Number</th>
                        <th>Reassign Table</th>
                    </thead>
                    <tbody>
                            <?php 
                            foreach($results as $row)
                            {
                                if ($row['table'] !== "10") 
                                {
                                    continue;
                                }
                                else
                                {
                            ?>
                                    <tr id='searchable'>
                                        <td id="WO"><?=$row["Item"]?></td>
                                        <td>
                                            <div class='input-field inline'>
                                                <select id='table'>
                                                    <option value='1' <?php echo($row['table'] == '1') ? "Selected": ""; ?>>Table 1</option>
                                                    <option value='2' <?php echo($row['table'] == '2') ? "Selected": ""; ?>>Table 2</option>
                                                    <option value='3' <?php echo($row['table'] == '3') ? "Selected": ""; ?>>Table 3</option>
                                                    <option value='4' <?php echo($row['table'] == '4') ? "Selected": ""; ?>>Table 4</option>
                                                    <option value='5' <?php echo($row['table'] == '5') ? "Selected": ""; ?>>Table 5</option>
                                                    <option value='6' <?php echo($row['table'] == '6') ? "Selected": ""; ?>>Table 6</option>
                                                    <option value='7' <?php echo($row['table'] == '7') ? "Selected": ""; ?>>Table 7</option>
                                                    <option value='8' <?php echo($row['table'] == '8') ? "Selected": ""; ?>>Table 8</option>
                                                    <option value='9' <?php echo($row['table'] == '9') ? "Selected": ""; ?>>Table 9</option>
                                                    <option value='10' <?php echo($row['table'] == '10') ? "Selected": ""; ?>>Table 10</option>
                                                    <option value='11' <?php echo($row['table'] == '11') ? "Selected": ""; ?>>Table 11</option>
                                                    <option value='12' <?php echo($row['table'] == '12') ? "Selected": ""; ?>>Table 12</option>
                                                </select>
                                            </div>  
                                        </td> 
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
                        <th>Part Number</th>
                        <th>Reassign Table</th>
                    </thead>
                    <tbody>
                            <?php 
                            foreach($results as $row)
                            {
                                if ($row['table'] !== "11") 
                                {
                                    continue;
                                }
                                else
                                {
                            ?>
                                    <tr id='searchable'>
                                        <td id="WO"><?=$row["Item"]?></td>
                                        <td>
                                            <div class='input-field inline'>
                                                <select id='table'>
                                                    <option value='1' <?php echo($row['table'] == '1') ? "Selected": ""; ?>>Table 1</option>
                                                    <option value='2' <?php echo($row['table'] == '2') ? "Selected": ""; ?>>Table 2</option>
                                                    <option value='3' <?php echo($row['table'] == '3') ? "Selected": ""; ?>>Table 3</option>
                                                    <option value='4' <?php echo($row['table'] == '4') ? "Selected": ""; ?>>Table 4</option>
                                                    <option value='5' <?php echo($row['table'] == '5') ? "Selected": ""; ?>>Table 5</option>
                                                    <option value='6' <?php echo($row['table'] == '6') ? "Selected": ""; ?>>Table 6</option>
                                                    <option value='7' <?php echo($row['table'] == '7') ? "Selected": ""; ?>>Table 7</option>
                                                    <option value='8' <?php echo($row['table'] == '8') ? "Selected": ""; ?>>Table 8</option>
                                                    <option value='9' <?php echo($row['table'] == '9') ? "Selected": ""; ?>>Table 9</option>
                                                    <option value='10' <?php echo($row['table'] == '10') ? "Selected": ""; ?>>Table 10</option>
                                                    <option value='11' <?php echo($row['table'] == '11') ? "Selected": ""; ?>>Table 11</option>
                                                    <option value='12' <?php echo($row['table'] == '12') ? "Selected": ""; ?>>Table 12</option>
                                                </select>
                                            </div>  
                                        </td> 
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
<script type="text/javascript" src='../../JS/HoistwayAdmin.js'></script>