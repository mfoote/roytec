<?php
    include('../Database/dbconnect.php');

    $workorder = $_POST['WorkOrder'];
    $partnumber = $_POST['PartNumber'];
    $downtime = $_POST['Downtime'];
    $area = $_POST['area'];
    $reason = $_POST['reason'];

    if(isset($workorder) && isset($partnumber) && isset($downtime) && isset($area) && isset($reason))
    {
        insertDowntime($workorder,$partnumber,$downtime,$area,$reason);
    }
?>
