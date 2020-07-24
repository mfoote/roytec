<?php
    include('../Database/dbconnect.php');

    $employee = $_POST['employee'];
    $workorder = $_POST['workorder'];

    if(isset($employee,$workorder))
    {
        updateEmployee($employee,$workorder);
    }
?>
