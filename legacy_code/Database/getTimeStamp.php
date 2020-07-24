<?php
    include('../Database/dbconnect.php');

    $workorder = $_GET['Work_Order'];

    function getTimeLap($workorder)
    {
            global $dbh;
            global $stmt;
            
            $stmt = $dbh->query("SELECT timelap FROM Schedule_part WHERE Workorder = '$workorder'"); 
            $results = $stmt->execute();

            var_dump($results);
    }
?>
