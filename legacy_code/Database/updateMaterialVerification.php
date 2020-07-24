<?php
    include('../Database/dbconnect.php');

    $workorder = $_POST['WorkOrder'];
    $partnumber = $_POST['PartNumber'];
    $area = $_POST['area'];
    $verified = $_POST['Verified'];

    if(isset($workorder) && isset($partnumber) && isset($verified) && isset($area))
    {
        updateMaterialVerification($workorder,$partnumber,$verified,$area);
    }
?>
