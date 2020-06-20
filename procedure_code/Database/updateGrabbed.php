<?php
    include('../Database/dbconnect.php');

    $partnumber = $_POST['PartNumber'];
    $contract = $_POST['contract'];

    if(isset($contract) && isset($partnumber))
    {
        updateGrabbed($contract,$partnumber);
    }
?>
