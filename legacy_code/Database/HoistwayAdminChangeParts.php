<?php
    include('../Database/dbconnect.php');
    
    $partnumber = $_POST['partnumber'];
    $table = $_POST['table'];

    changeTable($partnumber,$table);
?>