<?php
    require('../Database/dbconnect.php');

    
    $Employee = $_POST['employee'];
    $workOrder = $_POST['WorkOrder'];
    $Partnumber = $_POST['PartNumber'];
    $Timelap = $_POST['timelap'];
    $count = $_POST['count'];

    if(isset($Employee) && isset($workOrder) && isset($Partnumber) && isset($Timelap) && isset($count))
    {
       updateWorkOrder($Employee,$workOrder,$Timelap,$Partnumber,$count);
    }
?>
