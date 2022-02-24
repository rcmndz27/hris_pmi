<?php
    session_start();

    if (empty($_SESSION['userid']))
    {
        echo '<script type="text/javascript">alert("Please login first!!");</script>';
        header( "refresh:1;url=../index.php" );
    }
    else
    {
        include('../_header.php');

        global $connL;

        $query = "SELECT * from employee_profile where emp_code = :empcode";
        $stmt =$connL->prepare($query);
        $param = array(":empcode" => $empCode);
        $stmt->execute($param);
        $result = $stmt->fetch();
        $rptto = $result['reporting_to'];
        $reportingto = ($rptto === false) ? 'none' : $rptto;

        if($reportingto == 'none'){
            $repname = 'n/a';
        }else{

        $querys = "SELECT * from employee_profile where emp_code = :reportingto";
        $stmts =$connL->prepare($querys);
        $params = array(":reportingto" => $reportingto);
        $stmts->execute($params);
        $results = $stmts->fetch();
              if(isset($results['emp_code'])){
                $repname = $results['lastname'].",".$results['firstname']." ".$results['middlename'];
              }else{                       
                $repname = 'n/a';
              }
        }
     
    }
        
?>
<style type="text/css">
.main-body {
    padding: 15px;
}
.card {
    box-shadow: 0 1px 3px 0 rgba(0,0,0,.1), 0 1px 2px 0 rgba(0,0,0,.06);
}

.card {
    position: relative;
    display: flex;
    flex-direction: column;
    min-width: 0;
    word-wrap: break-word;
    background-color: #fff;
    background-clip: border-box;
    border: 0 solid rgba(0,0,0,.125);
    border-radius: .25rem;
}

.card-body {
    flex: 1 1 auto;
    min-height: 1px;
    padding: 1rem;
}

.gutters-sm {
    margin-right: -8px;
    margin-left: -8px;
}

.gutters-sm>.col, .gutters-sm>[class*=col-] {
    padding-right: 8px;
    padding-left: 8px;
}
.mb-3, .my-3 {
    margin-bottom: 1rem!important;
}

.bg-gray-300 {
    background-color: #e2e8f0;
}
.h-100 {
    height: 100%!important;
}
.shadow-none {
    box-shadow: none!important;
}


</style>
<body>
  <!-- Bootstrap CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous" />

<!-- font awesome  -->
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous" />

<script type='text/javascript' src='../js/changepass.js'></script>
<div class="container">
    <div class="section-title">
          <h1>MY PROFILE</h1>
        </div>
    <div class="main-body">
          <!-- Breadcrumb -->
          <nav aria-label="breadcrumb" class="main-breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item active" aria-current="page"><b><i class="fas fa-cogs fa-fw"></i>&nbsp;CHANGE PASSWORD</b></li>
            </ol>
          </nav>
          <?php  
              $sex = $result['sex'];
              $emp_pic = $result['emp_pic'];

              if($sex == 'Male' AND empty($emp_pic)){
                  $avatar = 'avatar2.png';
              }else if($sex == 'Female' AND empty($emp_pic)){
                  $avatar = 'avatar8.png';
              }else{
                  $avatar = $emp_pic;             
              }
           ?>
          <div class="row gutters-sm">
            <div class="col-md-4 mb-3">
              <div class="card">
                <div class="card-body">
                  <div class="d-flex flex-column align-items-center text-center">
                    <?php 
                    echo'<img src="https://bootdey.com/img/Content/avatar/'.$avatar.'" alt="Admin" class="rounded-circle" width="150">';
                     ?>
                    
                    <div class="mt-3">
                      <h4><?php echo $empName; ?></h4>
                      <p class="text-secondary mb-1"><?php echo $result['position']; ?></p>
                      <p class="text-muted font-size-sm"><?php echo $empCode.'-'.$result['emp_type']; ?></p>
                    </div>
                  </div>
                </div>
              </div>
               <div class="card mt-3">
                <ul class="list-group list-group-flush">
                  <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                    <h6 class="mb-0">
                      <i class='fas fa-table fa-fw'></i></svg>Date Hired:</h6>
                    <span class="text-secondary"><?php echo date('m/d/Y', strtotime($result['datehired'])); ?></span>
                  </li>
                  <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                    <h6 class="mb-0"><i class='fas fa-birthday-cake fa-fw'></i></svg>Birthdate:</h6>
                    <span class="text-secondary"><?php echo date('m/d/Y', strtotime($result['birthdate'])); ?></span>
                  </li>
                  <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                    <h6 class="mb-0"><i class='fas fa-phone fa-fw'></i></svg>Phone:</h6>
                    <span class="text-secondary"><?php echo $result['celno1']; ?></span>
                  </li>
                </ul>
              </div>
            </div>
            <div class="col-md-8">
              <div class="card mb-3">
                <div class="card-body">
               <!--Section: Block Content-->
                  <section class="mb-5 text-center">

       <h4>SET A NEW PASSWORD</h4>

          <div class="col-12">
            <div class="input-group mb-3">
              <div class="input-group-prepend">
                <span class="input-group-text" id="basic-addon1"><i class="fas fa-lock"></i></span>
              </div>
              <input name="password" type="password" value="" class="input form-control" id="newpassword" placeholder="New Password" required="true" aria-label="password" aria-describedby="basic-addon1" />
              <div class="input-group-append">
                <span class="input-group-text" onclick="password_show_hide();">
                  <i class="fas fa-eye" id="show_eye"></i>
                  <i class="fas fa-eye-slash d-none" id="hide_eye"></i>
                </span>
              </div>
            </div>
          </div>


          <div class="col-12">
            <div class="input-group mb-3">
              <div class="input-group-prepend">
                <span class="input-group-text" id="basic-addon1"><i class="fas fa-lock"></i></span>
              </div>
              <input name="password" type="password" value="" class="input form-control" id="confirmpassword" placeholder="Confirm Password" required="true" aria-label="password" aria-describedby="basic-addon1" />
              <div class="input-group-append">
                <span class="input-group-text" onclick="confirmpassword_show_hide();">
                  <i class="fas fa-eye" id="cfshow_eye"></i>
                  <i class="fas fa-eye-slash d-none" id="cfhide_eye"></i>
                </span>
              </div>
            </div>
          </div>

                      <button id="empCode" value="<?php echo $result['emp_code']; ?>" hidden></button>
                      <button type="submit" class="btn btn-primary mb-4" id="Submit">Change Password</button>
                  </section>
                </div>
              </div>
            </div>
          </div>
      </div>
    </div>
</body>

<script type="text/javascript">
function password_show_hide() {
  var x = document.getElementById("newpassword");
  var show_eye = document.getElementById("show_eye");
  var hide_eye = document.getElementById("hide_eye");
  hide_eye.classList.remove("d-none");
  if (x.type === "password") {
    x.type = "text";
    show_eye.style.display = "none";
    hide_eye.style.display = "block";
  } else {
    x.type = "password";
    show_eye.style.display = "block";
    hide_eye.style.display = "none";
  }
}
</script>


<script type="text/javascript">
function confirmpassword_show_hide() {
  var xcf = document.getElementById("confirmpassword");
  var cfshow_eye = document.getElementById("cfshow_eye");
  var cfhide_eye = document.getElementById("cfhide_eye");
  cfhide_eye.classList.remove("d-none");
  if (xcf.type === "password") {
    xcf.type = "text";
    cfshow_eye.style.display = "none";
    cfhide_eye.style.display = "block";
  } else {
    xcf.type = "password";
    cfshow_eye.style.display = "block";
    cfhide_eye.style.display = "none";
  }
}
</script>


<?php include('../_footer.php');  ?>
