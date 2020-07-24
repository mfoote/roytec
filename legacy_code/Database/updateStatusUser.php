<?php
    include('../Database/dbconnect.php');

    $workorder = $_POST['WorkOrder'];
    $status = $_POST['status'];
    $area = $_POST['area'];

    if(isset($workorder) && isset($status) && isset($area))
    {
       updateStatusUser($workorder,$status,$area);
    }
?>