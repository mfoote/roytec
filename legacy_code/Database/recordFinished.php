<?php
require('../Database/dbconnect.php');

$partnumber = $_POST['PN'];
$contract = $_POST['Contract'];
$Run_Start_Time = $_POST['Run_Start_Time'];
$quoted_time = $_POST['Quoted_Time'];
$employee = $_POST['employee'];
$area = $_POST['area'];


    insertFinishedpart($partnumber,$contract,$Run_Start_Time,$quoted_time,$employee,$area);


?>