<?php

$partnumber = $_POST['PN'];
$workorder = $_POST['Contract'];
$area = $_POST['area'];
$employee = $_POST['employee'];

insertStatus($workorder,$partnumber,$area,$employee);

?>