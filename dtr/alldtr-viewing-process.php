<?php

include("../dtr/alldtr-viewing.php");

$dtrView = new EmployeeLocAttendance();

$dtrviewing = json_decode($_POST["data"]);
   
if($dtrviewing->{"Action"} == "GetEmployeeLocAttendannce"){

    $alllocation = $dtrviewing->{"alllocation"};
    $dateFrom = $dtrviewing->{"dateFrom"};
    $dateTo = $dtrviewing->{"dateTo"};

    $dtrView->GetEmployeeLocAttendannce($alllocation, $dateFrom, $dateTo);

}

?>