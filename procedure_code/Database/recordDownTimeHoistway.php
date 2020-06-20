<?php
    include('../Database/dbconnect.php');

    $contract = $_POST['Contract'];
    $partnumber = $_POST['PartNumber'];
    $downtime = $_POST['Downtime'];


    if(isset($contract) && isset($partnumber) && isset($downtime))
    {
        insertDowntimeHoistway($contract,$partnumber,$downtime);
    }
?>
