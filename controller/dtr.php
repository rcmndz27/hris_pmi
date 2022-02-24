<?php

    Class EmployeeDTR{

        public function GetTime($dateTime){
            $formattedDateTime = new DateTime($dateTime);
            $time = $formattedDateTime->format('h:i:s A');
    
            return $time;
        }

        public function GetAttendanceList($dateStart, $dateEnd, $empcode){

            global $connL;

            $totalWork = 0;
            $totalLate = 0;
            $totalUndertime = 0;
            $totalOvertime = 0;

            $queryy = "SELECT * from employee_profile where emp_code = :empcode";
            $stmty =$connL->prepare($queryy);
            $paramy = array(":empcode" => $empcode);
            $stmty->execute($paramy);
            $resulty = $stmty->fetch();
            $cmp = $resulty['company'];
            $subemp = strlen($cmp);

            // var_dump($dateStart);
            // exit();
            
            $query = 'EXEC hrissys_dev.dbo.xp_attendance_portal :emp_code,:startDate,:endDate';
            $param = array(":emp_code" => substr($empcode,$subemp), ":startDate" => $dateStart, ":endDate" => $dateEnd );
            $stmt =$connL->prepare($query);
            $stmt->execute($param);
            $result = $stmt->fetch();
            $nm = (isset($result['name'])) ? $result['name'] : '' ;
            $name=str_replace('.',', ',$nm);
            echo "
            <table id='dtrList' class='table table-striped table-sm'>
                <thead>
                    <tr>
                        <th colspan='7' class='text-center'>".(isset($name) ? $name : "" )."</th>
                    </tr>
                    <tr>
                        <th>Date</th>
                        <th>Time In</th>
                        <th>Time Out</th>
                        <th>Work (Hrs)</th>
                        <th>Lates (Hrs)</th>
                        <th>Undertime (Hrs)</th>
                        <th>Overtime (Hrs)</th>
                    </tr>
                </thead>
                <tbody>";

                if($result){
                    do {
    
                        $timeIn = (isset($result['timein']) ? $this->GetTime($result['timein']): '');
                        $timeOut = (isset($result['timeout']) ? $this->GetTime($result['timeout']) : '');
    
                        echo    "<tr>".
                                "<td>" . date('F d, Y', strtotime($result['punch_date'])) . "</td>".
                                "<td>" . $timeIn . "</td>".
                                "<td>" . $timeOut . "</td>".
                                "<td>" . round($result['workhours'],2) . "</td>".
                                "<td>" . round($result['late'],2) . "</td>".
                                "<td>" . round($result['undertime'],2) . "</td>".
                                "<td>" . round($result['overtime'],2) . "</td>".
                                "</tr>";
    
                        $totalWork += $result['workhours'];
                        $totalLate += $result['late'];
                        $totalUndertime += $result['undertime'];
                        $totalOvertime += $result['overtime'];
    
                    } while ($result = $stmt->fetch()); 	

                    echo"</tbody>";

                    echo "<tfoot>
                            <tr>".
                                "<td colspan='3' class='text-right bg-success'><b>Total</b></td>".
                                "<td class='bg-success'><b>" . $totalWork . "</b></td>".
                                "<td class='bg-success'><b>" . $totalLate . "</b></td>".
                                "<td class='bg-success'><b>" . $totalUndertime . "</b></td>".
                                "<td class='bg-success'><b>" . $totalOvertime . "</b></td>".
                            "</tr>
                        </tfoot>";
                }else { 
                    echo '<tfoot><tr><td colspan="7" class="text-center">No Results Found</td></tr></tfoot>'; 
                }
    
            echo"
                
            </table>";
    

        }

        public function ListTeamMembers($reportingTo){

            global $connL;

            $query = 'SELECT emp_code, employee FROM view_employee WHERE reporting_to = :reporting_to ORDER BY employee';
            $param = array(":reporting_to" => $reportingTo);
            $stmt =$connL->prepare($query);
            $stmt->execute($param);
            $result = $stmt->fetch();

            $teamMemberList = '';

            $teamMemberList.='<select id="memberList" class="form-control" >';
            $teamMemberList.= '<option value=""></option>';

            if($result){
                do {
                    $teamMemberList.= '<option value="'.$result['emp_code'].'">'.$result['employee'].'</option>';
                } while ($result = $stmt->fetch()); 	

                $teamMemberList.='</select>';
            }

            echo $teamMemberList;


        }

    }







    



?>