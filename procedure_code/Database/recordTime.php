<?php
    include('../Database/dbconnect.php');

    $workorder = $_POST['Work_Order'];
    $partnumber = $_POST['PartNumber'];
    $area = $_POST['Area'];
    $people = $_POST['People'];
    $time = $_POST['Time'];
    $started = $_POST['Started'];
    $quantity = $_POST['Quantity'];

    if(isset($workorder) && isset($partnumber) && isset($area) && isset($people) && isset($time) && isset($started) && isset($quantity))
    {
        updateTime($workorder,$partnumber,$area,$people,$time,$started,$quantity);
    }
?>
