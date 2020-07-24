<?php
    include('../Database/dbconnect.php');

    $status = $_POST['Status'];
    $id = $_POST['ID'];
    $table = $_POST['Table'];

    if(isset($status) && isset($id) && isset($table))
    {
       updateStatus($table,$status,$id);

    }
?>