<?php
 

class PayrollRegApplication { 
function GetPayrollRegList(){

           
            global $connL;

            $query = "SELECT * FROM dbo.payroll WHERE payroll_status = 'R' ORDER BY name asc";
            $stmt =$connL->prepare($query);
            $stmt->execute();
            $r = $stmt->fetch();

            echo "
            <input type='text' id='myInput' onkeyup='myFunction()' placeholder='Search for names..' title='Type in a name'>
            <table id='payrollRegList' class='table table-striped table-sm'>
                <thead>
                    <tr>
                        <th colspan='55' class='paytop'>Payroll Register View</th>
                    </tr>
                    <tr>
                        <th>Employee Name</th>
                        <th>Bank Account#</th>
                        <th>Bank</th>
                        <th>Position</th>
                        <th>Employment Status</th>
                        <th>Company</th>
                        <th>Department </th>
                        <th>Location</th>
                        <th>Date Hired</th>
                        <th>Cut-off From</th>
                        <th>Cut-off To</th>
                        <th>Monthly Rate</th>
                        <th>Daily Rate</th>
                        <th>Semi-Monthly Rate</th>
                        <th>Absences</th>
                        <th> Lates </th>
                        <th> Undertime </th>
                        <th> Salary Adjustment </th>
                        <th> Overtime </th>
                        <th> Meal Allowance </th>
                        <th> Salary Allowance </th>
                        <th> Out of Town Allowance </th>
                        <th> Incentives Allowance </th>
                        <th> Relocation Allowance </th>
                        <th> Discretionary Allowance </th>
                        <th> Transportation Allowance</th>
                        <th> Load Allowance </th>
                        <th> Grosspay </th>
                        <th> Total Taxable </th>
                        <th> Withholding Tax </th>
                        <th> SSS EE </th>
                        <th> SSS MPF EE </th>
                        <th> PHIC EE </th>
                        <th> hdmf EE </th>
                        <th> hdmf Salary Loan </th>
                        <th> hdmf Calamity Loan </th>
                        <th> SSS Salary Loan </th>
                        <th> SSS Calamity Loan </th>
                        <th> Salary Deduction (Taxable)</th>
                        <th> Salary Deduction (Non-Taxable)</th>
                        <th> Salary Loan </th>
                        <th> Company Loan </th>
                        <th> OMHAS </th>
                        <th> COOP CBU </th>
                        <th> COOP Regular Loan </th>
                        <th> COOP MESCCO </th>
                        <th> Uploan </th>
                        <th> Others</th>
                        <th> Total Deduction</th>
                        <th> Netpay </th>
                        <th> SSS ER </th>
                        <th> SSS MPF ER </th>
                        <th> SSS EC </th>
                        <th> PHIC ER </th>
                        <th> hdmf ER </th>   
                    </tr>
                </thead>
                <tbody>";

                 if($r){
                    do {

             
                            echo "<tr>".
                                    "<td>" . $r['name'] . "</td>".
                                    "<td>" . $r['bank_acctno'] . "</td>".
                                    "<td>" . $r['bank'] . "</td>".
                                    "<td>" . $r['position'] . "</td>".
                                    "<td>" . $r['emp_status'] . "</td>".
                                    "<td>" . $r['company'] . "</td>".
                                    "<td>" . $r['department'] . "</td>".
                                    "<td>" . $r['location'] . "</td>".
                                    "<td>" . date('m/d/y', strtotime($r['date_hired'])) . "</td>".
                                    "<td>" . date('m/d/y', strtotime($r['date_from'])) . "</td>".
                                    "<td>" . date('m/d/y', strtotime($r['date_to'])) . "</td>".                                           
                                    "<td>" . round($r['month_pay'],2) . "</td>".
                                    "<td>" . round($r['daily_pay'],2) . "</td>".
                                    "<td>" . round($r['semi_month_pay'],2) . "</td>".
                                    "<td>" . round($r['absences'],2) . "</td>".
                                    "<td>" . round($r['late'],2) . "</td>".
                                    "<td>" . round($r['undertime'],2) . "</td>".
                                    "<td>" . round($r['salary_adjustment'],2) . "</td>".
                                    "<td>" . round($r['overtime'],2) . "</td>".
                                    "<td>" . round($r['meal_allowance'],2) . "</td>".
                                    "<td>" . round($r['salary_allowance'],2) . "</td>".
                                    "<td>" . round($r['oot_allowance'],2) . "</td>".
                                    "<td>" . round($r['inc_allowance'],2) . "</td>".
                                    "<td>" . round($r['rel_allowance'],2) . "</td>".
                                    "<td>" . round($r['disc_allowance'],2) . "</td>".
                                    "<td>" . round($r['trans_allowance'],2) . "</td>".
                                    "<td>" . round($r['load_allowance'],2) . "</td>".
                                    "<td>" . round($r['gross_pay'],2) . "</td>".
                                    "<td>" . round($r['total_taxable'],2) . "</td>".
                                    "<td>" . round($r['witholding_tax'],2) . "</td>".
                                    "<td>" . round($r['sss_regee'],2) . "</td>".
                                    "<td>" . round($r['sss_mpfee'],2) . "</td>".
                                    "<td>" . round($r['phic_ee'],2) . "</td>".
                                    "<td>" . round($r['hdmf_ee'],2) . "</td>".
                                    "<td>" . round($r['hdmf_sal_loan'],2) . "</td>".
                                    "<td>" . round($r['hdmf_cal_loan'],2) . "</td>".
                                    "<td>" . round($r['sss_sal_loan'],2) . "</td>".
                                    "<td>" . round($r['sss_cal_loan'],2) . "</td>".
                                    "<td>" . round($r['sal_ded_tax'],2) . "</td>".
                                    "<td>" . round($r['sal_ded_nontax'],2) . "</td>".
                                    "<td>" . round($r['sal_loan'],2) . "</td>".
                                    "<td>" . round($r['com_loan'],2) . "</td>".
                                    "<td>" . round($r['omhas'],2) . "</td>".
                                    "<td>" . round($r['coop_cbu'],2) . "</td>".
                                    "<td>" . round($r['coop_reg_loan'],2) . "</td>".
                                    "<td>" . round($r['coop_messco'],2) . "</td>".
                                    "<td>" . round($r['uploan'],2) . "</td>".
                                    "<td>" . round($r['others'],2) . "</td>".
                                    "<td>" . round($r['total_deduction'],2) . "</td>".
                                    "<td>" . round($r['netpay'],5) . "</td>".
                                    "<td>" . round($r['sss_reg_er'],2) . "</td>".
                                    "<td>" . round($r['sss_mpf_er'],2) . "</td>".
                                    "<td>" . round($r['sss_ec'],2) . "</td>".
                                    "<td>" . round($r['phic_er'],2) . "</td>".
                                    "<td>" . round($r['hdmf_er'],2) . "</td>".
                                    "</tr>";

                // $pay_stat = $r['payroll_status'] ; 
                   } while($r = $stmt->fetch(PDO::FETCH_ASSOC));
                              echo"</tbody><tfoot>".
                                    "</tr><tr>".
                                    "<td colspan='55' class='paytop'>".
                                    "<button id='btnApproveRegView' style='font-weight:bolder;background-color: #b52020;border-color: #b52020;color: #ffff;width: 200px;' onmousedown='javascript:ApprovePayRegView()'>CONFIRM PAYROLL REGISTER</button></td>".
                                    "</tr></tfoot>";    
           
                }else { 
                    echo '<tfoot><tr><td colspan="55" class="paytop">No Results Found</td></tr></tfoot>'; 
                }
    
            echo"</table>"; 
  
}

    
}


function ApprovePayRegView($empCode)
    {
            global $connL;

            $q_logs = 'SELECT* FROM dbo.payroll_period_logs WHERE rowid = (SELECT MAX(rowid) AS id from dbo.payroll_period_logs where emp_code = :emp_cd)';
            $paramq = array(":emp_cd" => 'PMI14000010');
            $stmt_q =$connL->prepare($q_logs);
            $stmt_q->execute($paramq);
            $rs = $stmt_q->fetch();

            $prf = date('m/d/Y', strtotime($rs['period_from']));
            $prt = date('m/d/Y', strtotime($rs['period_to']));
            $loc = $rs["location"];
        
            $cmd = $connL->prepare("UPDATE dbo.payroll SET payroll_status = 'N' where date_from = :date_from and date_to = :date_to and location = :location  ");
            $cmd->bindValue('date_from',$prf);
            $cmd->bindValue('date_to', $prt);
            $cmd->bindValue('location', $loc);
            $cmd->execute();

    }
?>
