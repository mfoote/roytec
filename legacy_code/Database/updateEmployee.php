<?php
    include('../Database/dbconnect.php');

    $employee = $_POST['employee'];
    $workorder = $_POST['workorder'];
    $area = $_POST['area'];
    $partnumber = $_POST['partnumber'];
    $finished = $_POST['finished'];

    if(isset($employee) && isset($workorder) && isset($area))
    {
        updateEmployee($employee,$workorder,$area,$partnumber,$finished);
    }
?>
