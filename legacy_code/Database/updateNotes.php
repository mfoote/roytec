<?php
    include('../Database/dbconnect.php');

    $notes = $_POST['Notes'];
    $id = $_POST['ID'];
    $table = $_POST['Table'];

    if(isset($notes) && isset($id) && isset($table))
    {
        updateNotes($table,$notes,$id);
    }
?>
