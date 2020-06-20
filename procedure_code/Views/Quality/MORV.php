<?php
date_default_timezone_set('America/New_York');
$workorder =  $_POST['WorkOrder'];
$partnumber = $_POST['partNumber'];
$initials =   $_POST['initials'];
$quantity =   $_POST['quantity'];
$location =   $_POST['location'];
$woQty    =   $_POST['woQty'];

$arr = explode("-", $location, 2);
$stk = $arr[1];
$bin = $arr[0];
$date = date('m/d/Y');
$date2 = date('mdY');
$time = date('h:i:s');

$fp = fopen('\\\\RTCFS02\\o\\IMPORT_FILES\\MR\\TESTMORV.csv', 'a');
fwrite($fp, "MORV00,$initials,$date,00$time,9,C,$workorder,001,R,$woQty,,$quantity,$bin,$stk,O,,N,0,,,,,,,,,,,,,M,,,,Y,,,$partnumber,,,,,,,,,,,,,,,,,,,,,,,,"."\r\n");
fclose($fp);
?>