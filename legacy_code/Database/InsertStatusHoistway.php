<?php
require('../Database/dbconnect.php');
$workorder = $_POST['workorder'];
$partnumber = $_POST['partnumber'];
$area = $_POST['area'];
$employee = $_POST['employee'];

insertStatus($workorder,$partnumber,$area,$employee)
?>

