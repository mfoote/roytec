<?php
    include('../Database/dbconnect.php');

    $id = $_POST['ID'];
    $table = $_POST['Table'];
    $tableNumber = $_POST['tableNumber'];

    if(isset($id) && isset($table) && isset($tableNumber))
    {
       updateTable($table,$id,$tableNumber);
    }
?>