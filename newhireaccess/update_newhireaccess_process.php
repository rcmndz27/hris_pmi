<?php

    include('../newhireaccess/update_nhaccess.php');
    include('../config/db.php');


    $action = $_POST["action"];
    $emplevel = $_POST["emplevel"];
    $rowid = $_POST["rowid"];


    if ($action == 1)
    {
        UpdateEmployeeLevel($emplevel,$rowid);
    }
    else {

    }

?>
