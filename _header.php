
<?php

$now = new DateTime(null, new DateTimeZone('Asia/Taipei'));

if (empty($_SESSION['userid']))
{
    echo '<script type="text/javascript">alert("Please login first!!");</script>';
    header( "refresh:1;url=../index.php" );
}
else
{
    include('../config/db.php');
    include('../config/dependencies.php');
    include('../controller/empInfo.php');
    include('../controller/indexProcess.php');
    $status = "OPEN";

    $empInfo = new EmployeeInformation();

    $empInfo->SetEmployeeInformation($_SESSION['userid']);
    
    $empCode = $empInfo->GetEmployeeCode();
    $empName = $empInfo->GetEmployeeName();
    $empDept = $empInfo->GetEmployeeDepartment();
    $empReportingTo = $empInfo->GetEmployeeReportingTo();
    $empDateHired = $empInfo->GetEmployeeDateHired();
    $empType = $empInfo->GetEmployeeType();
    $empUserType = $empInfo->GetEmployeeUserType();
    $empPost = $empInfo->GetEmployeePosition();
    $empRank = $empInfo->GetEmployeeRanking();

    global $connL;

    $query = "SELECT count(emp_code) as ot_count from tr_overtime where status = 1 and reporting_to = :empcode";
    $stmt =$connL->prepare($query);
    $param = array(":empcode" => $empCode);
    $stmt->execute($param);
    $result = $stmt->fetch();


    $querys = "SELECT count(emp_code) as lv_count from tr_leave where approved = 1 and approval = :empcode";
    $stmts =$connL->prepare($querys);
    $params = array(":empcode" => $empCode);
    $stmts->execute($params);
    $results = $stmts->fetch();

    $queryss = "SELECT count(emp_code) as wfh_count from tr_workfromhome where status = 1 and reporting_to = :empcode";
    $stmtss =$connL->prepare($queryss);
    $paramss = array(":empcode" => $empCode);
    $stmtss->execute($paramss);
    $resultss = $stmtss->fetch();

}

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>Premium Megastructures Inc. | Web Portal</title>

  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link type='image/x-png' rel='icon' href='../img/logo-icon.png'>
  <link href="../assets/img/apple-touch-icon.png" rel="apple-touch-icon">
          <!-- Bootstrap icons-->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
  <!-- Google fonts-->
  <link rel="preconnect" href="https://fonts.gstatic.com" />
  <link href="https://fonts.googleapis.com/css2?family=Newsreader:ital,wght@0,600;1,600&amp;display=swap" rel="stylesheet" />
  <link href="https://fonts.googleapis.com/css2?family=Mulish:ital,wght@0,300;0,500;0,600;0,700;1,300;1,500;1,600;1,700&amp;display=swap" rel="stylesheet" />
  <link href="https://fonts.googleapis.com/css2?family=Kanit:ital,wght@0,400;1,400&amp;display=swap" rel="stylesheet" />


  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Dosis:300,400,500,,600,700,700i|Lato:300,300i,400,400i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="../assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="../assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="../assets/css/style.css" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="../node_modules/bootstrap/dist/css/bootstrap.min.css">
  <link type='text/css' rel='stylesheet' href="<?= constant('FONTAWESOME_CSS'); ?>">
  <link rel="stylesheet" href="../css/header.css">
  <link rel="stylesheet" href="../css/custom.css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">
    <link href="../css/styles.css" rel="stylesheet" />
    <script type='text/javascript' src='https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js'></script>
    <script type='text/javascript' src="<?= constant('BOOTSTRAP_JS'); ?>"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <!-- <script type="text/javascript" src='../js/script.js'></script> -->
    </head>
<body>

  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top">
    <div class="container d-flex align-items-center justify-content-between">

      <img src='../img/logo.png'alt="" class="img-fluid">
      <nav id="navbar" class="navbar">
          <ul>
                  <?php 
                         $phpfile = basename($_SERVER['REQUEST_URI'], '?' . $_SERVER['QUERY_STRING']);

                            if($phpfile == 'admin.php' || $phpfile == 'employee.php'){
                              $admin = 'active';
                              $dtr_view = '';
                              $leaveApplication_view = '';
                              $ot_app_view = '';
                              $wfh_app_view = '';
                              $payslip_view = '';
                              $admintools = ''; 
                              $myprofile_view = '';
                            }else if($phpfile == 'dtr_view.php'){
                              $admin = '';
                              $dtr_view = 'active';
                              $leaveApplication_view = '';
                              $ot_app_view = '';
                              $wfh_app_view = '';
                              $payslip_view = '';
                              $admintools = ''; 
                              $myprofile_view = '';
                            }else if($phpfile == 'leaveApplication_view.php' || $phpfile == 'ot_app_view.php' || $phpfile == 'wfh_app_view.php'){
                              $leaveApplication_view = 'active';
                              $admin = '';
                              $dtr_view = '';
                              $ot_app_view = '';
                              $wfh_app_view = '';
                              $payslip_view = ''; 
                              $admintools = '';   
                              $myprofile_view = '';                           
                            }else if($phpfile == 'ot_app_view.php'){
                              $ot_app_view = 'active';
                              $admin = '';
                              $dtr_view = '';
                              $leaveApplication_view = '';
                              $wfh_app_view = '';
                              $payslip_view = '';
                              $admintools = ''; 
                              $myprofile_view = '';
                            }else if($phpfile == 'wfh_app_view.php'){
                              $wfh_app_view = 'active';
                              $admin = '';
                              $dtr_view = '';
                              $leaveApplication_view = '';
                              $ot_app_view = '';
                              $payslip_view = '';
                              $admintools = ''; 
                              $myprofile_view = '';
                            }else if($phpfile == 'payslip_view.php'){
                              $payslip_view = 'active';
                              $admin = '';
                              $dtr_view = '';
                              $leaveApplication_view = '';
                              $ot_app_view = '';
                              $wfh_app_view = ''; 
                              $admintools = ''; 
                              $myprofile_view = '';                           
                            }else if($phpfile == 'myprofile_view.php' || $phpfile == 'changepass.php'){
                              $payslip_view = '';
                              $admin = '';
                              $dtr_view = '';
                              $leaveApplication_view = '';
                              $ot_app_view = '';
                              $wfh_app_view = ''; 
                              $admintools = ''; 
                              $myprofile_view = 'active';                           
                            }else{
                              $admin = '';
                              $dtr_view = '';
                              $leaveApplication_view = '';
                              $ot_app_view = '';
                              $wfh_app_view = '';
                              $payslip_view = '';
                              $myprofile_view = '';
                              $admintools = 'active';
                            }

                      if($empUserType == 'Admin'){
                         echo'<li><a class="nav-link '.$admin.'" href="../pages/admin.php"><i class="fas fa-home fa-fw"></i>  &nbsp;Home</a></li>';
                        }else{
                         echo'<li><a class="nav-link '.$admin.'" href="../pages/employee.php"><i class="fas fa-home fa-fw"></i> &nbsp;Home</a></li>';
                       } 

                      echo"<li><a class='nav-link ".$dtr_view."' href='../pages/dtr_view.php'><i class='fas fa-calendar fa-fw'>
                        </i>&nbsp; My Attendance</a></li>";

                            $lv = (isset($results['lv_count'])) ? $results['lv_count'] : '0' ;
                            $ot = (isset($result['ot_count'])) ? $result['ot_count'] : '0' ;
                            $wfh = (isset($resultss['wfh_count'])) ? $resultss['wfh_count'] : '0' ;
                            echo"<button id='lv_count' value='You have ".$lv." leave approval!' hidden></button>
                            <button id='ot_count' value='You have ".$ot." overtime approval!' hidden></button>
                            <button id='wfh_count' value='You have ".$wfh." work from home approval!' hidden></button>
                            <button id='lv' value='".$lv."' hidden></button>
                            <button id='ot' value='".$ot."' hidden></button>
                            <button id='wfh' value='".$wfh."' hidden></button>"; 

                            $approval = $lv + $ot + $wfh;
                            if ($approval > 0) {
                              $appr = "&nbsp;<span class='badge badge-danger badge-counter'>".$approval."</span>";
                             }else{
                               $appr = '';
                             }
                            
                                switch(trim($empUserType)){
                                    case "Admin":
                                        echo "<li class='dropdown'><a href='#' class='".$admintools."'><i class='fas fa-toolbox fa-fw'></i>&nbsp;HR TOOLS ".$appr."<i class='bi bi-chevron-down'></i></a>
                                                <ul> 
                                                  <li><a href='../dtr/index.php'>All Employee Attendance</a></li>
                                                   <li><a href='../dtr/alldtr_index.php'>By Location - All Employee Attendance</a></li>
                                                </ul>
                                          </li>";
                                    break; 
                                }
                            ?> 
                 <!-- MY PROFILE TOOLS -->

          <li class="dropdown"><a href="#" class='<?php echo $myprofile_view; ?>'><span><i class='fas fa-user-circle fa-fw'></i><?php echo $empName; ?></span> <i class="bi bi-chevron-down"></i></a>
            <ul>
              <li><a href="../pages/myprofile_view.php"><i class='fas fa-id-card fa-fw'></i>MY PROFILE</a></li>
              <!-- <li><a href="../pages/changepass.php"><i class="fas fa-cogs fa-fw"></i>CHANGE PASSWORD</a></li> -->
              <li><a href="../controller/logout.php"><i class="fas fa-sign-out-alt fa-fw"></i>LOG-OUT</a></li>
            </ul>
          </li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->
    </div>
  </header><!-- End Header -->
  <br>
</body>
  <script type="text/javascript">

    var urpath = window.location.pathname;
    // swal($('#lv').val() + $('#ot').val() + $('#wfh').val());
    // exit();
    
    if(($('#lv').val() ==! 0 || $('#ot').val() ==! 0 || $('#wfh').val() ==! 0) && (urpath === '/webportal-beta/pages/admin.php')){

    const el = document.createElement('div')
    el.innerHTML = "<?php    echo "You have <a href='../leave/leaveApproval_view.php'>".$lv."</a> leave approval.<br>";
                             echo "You have <a href='../overtime/overtime-approval-view.php'>".$ot."</a> overtime approval.<br>";
                             echo "You have <a href='../wfhome/wfh-approval-view.php'>".$wfh."</a> work from home approval.";
                    ?>"

    swal({
      title: "Pending Approval:",
      content: el ,
      icon: "warning"
    })

    }else{
      // swal ('error');
    }
    
    
</script>
