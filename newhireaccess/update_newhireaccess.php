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
        include('../newhireaccess/update_nhaccess.php');
        include('../elements/DropDown.php');
        include('../controller/MasterFile.php');

        $empCode = $_SESSION['userid'];
        $rowid = $_GET['id'];
        $query = 'SELECT * FROM dbo.employee_profile WHERE rowid = :rowid';
        $param = array(":rowid" => $rowid);
        $stmt =$connL->prepare($query);
        $stmt->execute($param);
        $r = $stmt->fetch();
        $uempcode = $r['emp_code'];
        $fname = $r['firstname'];
        $mname = $r['middlename'];
        $lname = $r['lastname'];
        $fullname = $lname.', '.$fname.' '. $mname;
        $posit = $r['position'];
        $cmp = $r['company'];
        $depart = $r['department'];
        $locat = $r['location'];
        $empt = $r['emp_type'];
        $ranki = (isset($r['ranking'])) ? $r['ranking'] : '0' ;


        $querys = 'SELECT * FROM dbo.employee_level WHERE level_id = :ranki';
        $params = array(":ranki" => $ranki);
        $stmts =$connL->prepare($querys);
        $stmts->execute($params);
        $rs = $stmts->fetch();


        $empInfo->SetEmployeeInformation($_SESSION['userid']);
        $empUserType = $empInfo->GetEmployeeUserType();
        $empInfo = new EmployeeInformation();
        $mf = new MasterFile();
        $dd = new DropDown();

            if($empUserType == 'Admin'|| $empUserType == 'HR-CreateStaff') {

            }else{
                        echo '<script type="text/javascript">alert("You do not have access here!");';
                        echo "window.location.href = '../index.php';";
                        echo "</script>";
            }
    }
        
?>

<style type="text/css">
    
.bup{

font-weight: bold;
}

.mbt {
    background-color: #faf9f9;
    padding: 30px;
    border-radius: 0.25rem;
}

.pad{
    padding: 5px 5px 5px 5px;
    font-weight: bolder;
}
</style>
<div class="container">
    <div class="section-title">
          <h1>UPDATE EMPLOYEE PROFILE</h1>
        </div>
    <div class="main-body mbt">

          <!-- Breadcrumb -->
          <nav aria-label="breadcrumb" class="main-breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item active" aria-current="page"><b><i class='fas fa-users fa-fw'>
                        </i>&nbsp; UPDATE EMPLOYEE PROFILE</b></li>
            </ol>
          </nav>

        <button id='rowid' value='<?php echo $rowid ?>' hidden></button>
        <div class="form-row align-items-center mb-2">
                        <div class="col-md-2 d-inline">
                            <label for="empcode">Employee Code:</label>
                        </div>
                        <div class="col-md-4 d-inline">
                            <input type="text" class="form-control inputtext" id="employeecode" name="employeecode" value="<?php echo $uempcode; ?>" readonly >
                        </div>

        </div>

        <div class="form-row align-items-center mb-2">
                        <div class="col-md-2 d-inline">
                            <label class="col-form-label" for="firstname">Full Name:</label>
                        </div>
                        <div class="col-md-4 d-inline">
                            <input type="text" class="form-control inputtext" 
                            id="firstname" name="firstname" value="<?php echo $fullname; ?>" readonly>
                        </div>
        </div> 

        <div class="form-row align-items-center mb-2">
                        <div class="col-md-2 d-inline">
                            <label for="empcode">Employee Code:</label>
                        </div>
                        <div class="col-md-4 d-inline">
                            <input type="text" class="form-control inputtext" id="employeecode" name="employeecode" value="<?php echo $uempcode; ?>" readonly >
                        </div>

        </div>

        <div class="form-row align-items-center mb-2">
                        <div class="col-md-2 d-inline">
                            <label class="col-form-label" for="position">Position:</label>
                        </div>
                        <div class="col-md-4 d-inline">
                            <input type="text" class="form-control inputtext" 
                            id="position" name="position" value="<?php echo $posit; ?>" readonly>
                        </div>
        </div>  


        <div class="form-row align-items-center mb-2">
                        <div class="col-md-2 d-inline">
                            <label for="company">Company:</label>
                        </div>
                        <div class="col-md-4 d-inline">
                            <input type="text" class="form-control inputtext" id="company" name="company" value="<?php echo $cmp; ?>" readonly >
                        </div>

        </div>

        <div class="form-row align-items-center mb-2">
                        <div class="col-md-2 d-inline">
                            <label class="col-form-label" for="department">Department:</label>
                        </div>
                        <div class="col-md-4 d-inline">
                            <input type="text" class="form-control inputtext" 
                            id="department" name="department" value="<?php echo $depart; ?>" readonly>
                        </div>
        </div>  


        <div class="form-row align-items-center mb-2">
                        <div class="col-md-2 d-inline">
                            <label for="location">Location:</label>
                        </div>
                        <div class="col-md-4 d-inline">
                            <input type="text" class="form-control inputtext" id="location" name="location" value="<?php echo $locat; ?>" readonly >
                        </div>

        </div>

        <div class="form-row align-items-center mb-2">
                        <div class="col-md-2 d-inline">
                            <label class="col-form-label" for="emptype">Employee Type:</label>
                        </div>
                        <div class="col-md-4 d-inline">
                            <input type="text" class="form-control inputtext" 
                            id="emptype" name="emptype" value="<?php echo $empt; ?>" readonly>
                        </div>
        </div> 

        <div class="form-row align-items-center mb-2">
                        <div class="col-md-2 d-inline">
                            <label class="col-form-label" for="emplevel">Employee Level:</label>
                        </div>
                <div class="col-md-4 d-inline">     
                    <?php $dd->GenerateDropDown("emp_level", $mf->GetAllEmployeeLevel("emp_level"));  ?>
                </div>
        </div>   

<div class="d-flex justify-content-center">
            <div class="col-md-2 d-flex">
              <button type="button" id="search" class="btn btn-small btn-primary mr-1 bup" onmousedown="javascript:filterAtt()">
                            UPDATE PROFILE
                        </button>
                </div>
 </div>
</div>
</div>
<br><br>

<script>
    function filterAtt()
    {
        $("#search").one('click', function (event) 
        {
        $("body").css("cursor", "progress");
        var url = "../newhireaccess/update_newhireaccess_process.php";
        var rowid = $('#rowid').val();
        var emp_level = $('#emp_level').children("option:selected").val();
        var emplevel = emp_level.split(" - ");
        $(this).prop('disabled', true);

        $('#contents').html('');

                        swal({
                          title: "Are you sure?",
                          text: "You want to update this profile?",
                          icon: "success",
                          buttons: true,
                          dangerMode: true,
                        })
                        .then((updateProfile) => {
                          if (updateProfile) {
                                    $.post (
                                        url,
                                        {
                                            action: 1,
                                            emplevel: emplevel[0],
                                            rowid: rowid                
                                        },
                                        function(data) { $("#contents").html(data).show(); }
                                    );
                            swal({text:"You have succesfully updated this employee profile!",icon:"success"});
                          } else {
                            swal({text:"You cancel the update of employee profile!",icon:"error"});
                          }
                        });

    });
    }
</script>


<?php include('../_footer.php');  ?>
