<?php
    require_once('dbconnect.php'); 
    getAdminView();
    $data = array();
    foreach($results as $row)
    {
       $data[] = array('PartNumber' => $row['PN'],'Timelap' => $row['latestTime'], 'PartsCompleted' => $row['PartsCompleted'], 'QuotedTime' => $row['QuotedTime'], 'Quantity' => $row['Quantity']);
    }
    
    $data = array_values(array_unique($data, SORT_REGULAR));

    print_r(json_encode($data));
?>