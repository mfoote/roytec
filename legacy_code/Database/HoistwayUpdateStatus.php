<?php
    include('../Database/dbconnect.php');

    $workorder = $_POST['Contract'];
    $partnumber = $_POST['PN'];

    if(isset($workorder) && isset($partnumber))
    {
        updateFinished($workorder,$partnumber);
    }
?>
