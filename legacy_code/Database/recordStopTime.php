<?php
    include('../Database/dbconnect.php');

    $workorder = $_POST['WorkOrder'];
    $time = $_POST['timelap'];
    $partcount = $_POST['count'];
    $area = $_POST['area'];

    if(isset($workorder) && isset($time) && isset($partcount) && isset($area) )
    {
        updateStopTime($workorder,$time,$partcount,$area);
    }
?>
