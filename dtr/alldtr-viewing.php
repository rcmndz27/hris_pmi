<?php

include('../config/db.php');

Class EmployeeLocAttendance{

    function GetTime($dateTime){
        $formattedDateTime = new DateTime($dateTime);
        $time = $formattedDateTime->format('h:i:s A');

        return $time;
    }

    function GetEmployeeLocAttendannce($alllocation, $dateFrom, $dateTo){


         global $dbConnection;

        $query = "SELECT b.area_alias as location,a.emp_code as emp_code,
                punch_time as punchdate,a.first_name as fullname, 
                case when punch_state = 0 then 'TIME-IN' else 'TIME-OUT' END as [type] from personnel_employee a left join iclock_transaction b on a.emp_code = b.emp_code
                where b.area_alias = :alllocation and b.punch_time >= :startDate and b.punch_time <= :endDate
                ORDER BY fullname,punchdate,type asc";
        $param = array(":alllocation" => $alllocation,":startDate" => $dateFrom, ":endDate" => $dateTo);
        $stmt =$dbConnection->prepare($query);
        $stmt->execute($param);
        $result = $stmt->fetch();

        echo "
        <input type='text' id='myInput' class='form-control' onkeyup='myFunction()' placeholder='Search for employee..' title='Type in leave details'> 
        <table id='empDtrList' class='table table-striped table-sm'>
            <thead>
                <tr>
                    <th>Full Name</th>
                    <th>Date</th>
                    <th>Time</th>
                    <th>Type</th>
                    <th>Location</th>
                </tr>
            </thead>
            <tbody>";

            if($result){
                do {

                    $pnchtime = (isset($result['punchdate']) ? $this->GetTime($result['punchdate']): '');

                    echo    "<tr>".
                                "<td>" . $result['fullname'] . "</td>".
                                "<td>" . date('m-d-Y', strtotime($result['punchdate'])). "</td>".
                                "<td>" . $pnchtime . "</td>".
                                "<td>" . $result['type'] . "</td>".
                                "<td>" . $result['location'] . "</td>".
                            "</tr>";
     
                } while ($result = $stmt->fetch()); 	
            }

        echo"
            </tbody>
        </table>";
    }
}

?>