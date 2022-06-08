<?php

    class MasterFile
    {
        public function GetUserType()
        {

        }

        public function GetAllStaff($reportingto = null)
        {
            global $connL;

            try
            {
                $sql = "";
                $data = [];

                if ($reportingto == null || $reportingto == "")
                {
                    $sql = $connL->prepare(@"SELECT emp_code, Employee FROM dbo.view_employee ORDER BY Employee");
                }
                else
                {
                    $sql = $connL->prepare(@"SELECT emp_code, Employee FROM dbo.view_employee WHERE reporting_to = :rpt ORDER BY Employee");
                    $sql->bindParam(":rpt", $reportingto, PDO::PARAM_STR);
		$sql->execute();
                }
                
                $sql->execute();

                while ($r = $sql->fetch(PDO::FETCH_ASSOC))
                {
                    array_push($data, array($r["emp_code"], $r["Employee"]));
                }

                return $data;
            }
            catch(Exception $e)
            {
                echo $e->getMessage();
            }
        }

        public function GetAllCutoff($type)
        {
            global $connL;

            try
            {
                $data = [];

               

                $sql = $connL->prepare(@"SELECT * FROM dbo.payroll_generate ORDER by payroll_from, payroll_to DESC");
                $sql->execute();

                if ($type == "payroll")
                {
                    while ($r = $sql->fetch(PDO::FETCH_ASSOC))
                    {
                        array_push( $data, array($r["rowid"], date("m/d/Y", strtotime($r["payroll_from"])) . " - " . date("m/d/Y", strtotime($r["payroll_to"]))) );
                    }
                }

                return $data;
            }
            catch (Exception $e)
            {
                echo $e->getMessage();
            }
        }

        public function GetAllCutoffPay($type)
        {
            global $connL;

            try
            {
                $data = [];

               

                $sql = $connL->prepare(@"select location,period_from,period_to from att_summary group by location,period_from,period_to");
                $sql->execute();

                if ($type == "payview")
                {
                    while ($r = $sql->fetch(PDO::FETCH_ASSOC))
                    {
                        array_push( $data, array($r["location"], 
                            date("m/d/Y", strtotime($r["period_from"])) . " - " . date("m/d/Y", strtotime($r["period_to"])) 
                        . " - " .$r["location"] ) );
                    }
                }

                return $data;
            }
            catch (Exception $e)
            {
                echo $e->getMessage();
            }
        }

        public function GetAllPayCutoff($type)
        {
            global $connL;

            try
            {
                $data = [];
        
                $sql = $connL->prepare(@"SELECT rowid,date_from,date_to FROM dbo.payroll where rowid = (select max(rowid) from dbo.payroll)");
                $sql->execute();

                if ($type == "paycut")
                {
                    while ($r = $sql->fetch(PDO::FETCH_ASSOC))
                    {
                        array_push( $data, array($r["rowid"], 
                            date("m/d/Y", strtotime($r["date_from"])) . " - " . date("m/d/Y", strtotime($r["date_to"]))) );
                    }
                }

                return $data;
            }
            catch (Exception $e)
            {
                echo $e->getMessage();
            }
        }


        public function GetAllPayLocCutoff($type)
        {
            global $connL;

            try
            {
                $data = [];
        
                $sql = $connL->prepare(@"SELECT rowid,date_from,date_to,location FROM dbo.payroll where rowid = (select max(rowid) from dbo.payroll)");
                $sql->execute();

                if ($type == "payloccut")
                {
                    while ($r = $sql->fetch(PDO::FETCH_ASSOC))
                    {
                        array_push( $data, array($r["rowid"], 
                            date("m/d/Y", strtotime($r["date_from"])) . " - " . date("m/d/Y", strtotime($r["date_to"])) . " - " .$r["location"]));
                    }
                }

                return $data;
            }
            catch (Exception $e)
            {
                echo $e->getMessage();
            }
        }


        public function GetBioLoc($type)
        {
            global $dbConnection;

            try
            {
                $data = [];
               

                $sql = $dbConnection->prepare(@"SELECT DISTINCT area_alias from biotime8.dbo.iclock_transaction");
                $sql->execute();

                if ($type == "alllocation")
                {
                    while ($r = $sql->fetch(PDO::FETCH_ASSOC))
                    {
                        array_push($data, array($r["area_alias"],$r["area_alias"]));
                    }
                }

                return $data;
            }
            catch (Exception $e)
            {
                echo $e->getMessage();
            }
        }


        public function GetPayLocation($type)
        {
            global $connL;

            try
            {
                $data = [];
               

                $sql = $connL->prepare(@"SELECT * FROM dbo.mf_location ORDER by rowid ASC");
                $sql->execute();

                if ($type == "locpay")
                {
                    while ($r = $sql->fetch(PDO::FETCH_ASSOC))
                    {
                        array_push($data, array($r["rowid"],$r["location"]));
                    }
                }

                return $data;
            }
            catch (Exception $e)
            {
                echo $e->getMessage();
            }
        }

        public function GetPayCompany($type)
        {
            global $connL;

            try
            {
                $data = [];
               

                $sql = $connL->prepare(@"SELECT rowid,code,descs FROM dbo.mf_company ORDER by rowid ASC");
                $sql->execute();

                if ($type == "compay")
                {
                    while ($r = $sql->fetch(PDO::FETCH_ASSOC))
                    {
                       array_push( $data, array($r["code"], $r["code"]." - ".$r["descs"]));
                    }
                }

                return $data;
            }
            catch (Exception $e)
            {
                echo $e->getMessage();
            }
        }

        public function  GetAllEmployeePay($type)
        {
            global $connL;

            try
            {
                $data = [];
               

                $sql = $connL->prepare(@"SELECT rowid,emp_code,name,date_from,date_to FROM dbo.payroll ORDER by name ASC");
                $sql->execute();

                if ($type == "emppay")
                {
                    while ($r = $sql->fetch(PDO::FETCH_ASSOC))
                    {
                       array_push( $data, array($r["rowid"], $r["emp_code"]." - ".$r["name"]. " - " . 
                   date("m/d/Y", strtotime($r["date_from"])) . " - " . date("m/d/Y", strtotime($r["date_to"]))));
                    }
                }

                return $data;
            }
            catch (Exception $e)
            {
                echo $e->getMessage();
            }
        }


        public function GetAllEmployeeLevel($type)
        {
            global $connL;

            try
            {
                $data = [];
               

                $sql = $connL->prepare(@"SELECT level_id,level_code,level_description FROM dbo.employee_level ORDER by level_id ASC");
                $sql->execute();

                if ($type == "emp_level")
                {
                    while ($r = $sql->fetch(PDO::FETCH_ASSOC))
                    {
                       array_push( $data, array($r["level_code"], $r["level_id"]." - ".$r["level_description"]));
                    }
                }

                return $data;
            }
            catch (Exception $e)
            {
                echo $e->getMessage();
            }
        }

        public function GetAllCutoffP($type)
        {
            global $connL;

            try
            {
                $data = [];

                $payql = $connL->prepare(@"SELECT * FROM dbo.payroll");
                $payql->execute();
                $pql = $payql->fetch();

                if($pql == false) {
                    $sql = $connL->prepare(@"SELECT * FROM dbo.payroll_generate ORDER by payroll_from, payroll_to DESC");
                    $sql->execute();
                }else{
                    $sql = $connL->prepare(@"SELECT rowid,payroll_from,payroll_to FROM dbo.payroll_generate WHERE payroll_from <> (SELECT date_from from 
                        dbo.payroll where rowid = (select max(rowid) from dbo.payroll)) ORDER by payroll_from, payroll_to DESC");
                    $sql->execute();
                }

                if ($type == "payroll")
                {
                    while ($r = $sql->fetch(PDO::FETCH_ASSOC))
                    {
                        array_push( $data, array($r["rowid"], date("m/d/Y", strtotime($r["payroll_from"])) . " - " . date("m/d/Y", strtotime($r["payroll_to"]))) );
                    }
                }

                return $data;
            }
            catch (Exception $e)
            {
                echo $e->getMessage();
            }
        }

        public function GetUnlockedCutOff()
        {
            global $connL;

            try
            {
                $data = [];

                $sql = $connL->prepare(@"SELECT MIN(payroll_from), MAX(payroll_to) FROM dbo.payroll_generate where locked = 0");
                $sql->execute();

                while ($r = $sql->fetch(PDO::FETCH_BOTH))
                {
                    array_push($data, $r[0]);
                    array_push($data, $r[1]);
                }
                
                return $data;
            }
            catch (Exception $e)
            {
                echo $e->getMessage();
            }
        }
    }

?>