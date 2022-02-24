<?php
    session_start();

    if (empty($_SESSION['userid']))
    {
        echo '<script type="text/javascript">alert("Please login first!!");</script>';
        header('refresh:1;url=../index.php' );
    }
    else
    {
        include('../_header.php');
        include('../leave/leaveApplication.php');

        $leaveApp = new LeaveApplication(); 
        $leaveApp->SetLeaveApplicationParams($empCode,$empType);

        $query = 'SELECT * FROM dbo.employee_profile WHERE emp_code = :empcode ';
        $param = array(":empcode" => $_SESSION['userid']);
        $stmt =$connL->prepare($query);
        $stmt->execute($param);
        $r = $stmt->fetch();

        $querys = 'SELECT * FROM dbo.employee_leave WHERE emp_code = :empcode ';
        $params = array(":empcode" => $_SESSION['userid']);
        $stmts =$connL->prepare($querys);
        $stmts->execute($params);
        $rs = $stmts->fetch();


    }    
?>

<script type='text/javascript' src='../leave/leaveApplication.js'></script>
<script type='text/javascript' src='../js/validator.js'></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<style type="text/css">
    .cstat {
        color: #e65a5a;
        font-size: 20px;
        margin: 0;
        padding: 5px 5px 5px 5px;
        width: 500px;
    }
    .ppclip{
        height: 50px;
        width: 50px;
        cursor: pointer;
    }
    .ppclip:hover{
        opacity: 0.5;
    }

    .bb{
        font-weight: bolder;
    }
    .wr{
        width: 150px;
    }


     table,th{

                border: 1px solid #dee2e6;
                font-weight: 700;
                font-size: 14px;
 }   


table,td{

                border: 1px solid #dee2e6;
 }  

 th,td{
    border: 1px solid #dee2e6;
 }
  
table {
        border: 1px solid #dee2e6;
        color: #ffff;
        margin-bottom: 100px;
        border: 2px solid black;
        background-color: white;
        text-align: center;
}
.mbt {
    background-color: #faf9f9;
    padding: 30px;
    border-radius: 0.25rem;
}

.pad{
    padding: 5px 5px 5px 5px;
}
</style>
<div class="container">
    <div class="section-title">
          <h1>LEAVE APPLICATION</h1>
        </div>
    <div class="main-body mbt">

          <!-- Breadcrumb -->
          <nav aria-label="breadcrumb" class="main-breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item active" aria-current="page"><b><i class='fas fa-suitcase fa-fw'>
                        </i>&nbsp;LEAVE APPLICATION</b></li>
            </ol>
          </nav>
    <div class="pt-3">
        <div class="row">
            <div class="col-md-12">
                <div class="panel-body">
                    <div id="tableList" class="table-responsive-sm table-body">
                        <?php $leaveApp->GetLeaveSummary(); ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="row align-items-end justify-content-end">
            <div class="col-md-12 mb-3">
                <button type="button" class="btn btn-primary bb" id="applyLeave">APPLY LEAVE (+)</button>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="panel-body">
                    <div id="tableList" class="table-responsive-sm table-body">
                        <?php $leaveApp->GetLeaveHistory(); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="messageModal" tabindex="-1" role="dialog" aria-labelledby="informationModalTitle"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="popUpModalTitle"></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <h3 class="text-danger text-center"><label for="" id="modalText"></label></h3>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="popUpModal" tabindex="-1" role="dialog" aria-labelledby="informationModalTitle"
        aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title bb" id="popUpModalTitle">APPLY LEAVE</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div>
                        <?php $leaveApp->GetLeaveType(); ?>

                                             <!-- Leave pay  -->
                        <div id="leavepay">
                            <div class="row">
                                <div class=col-md-2>
                                    <label for="">Leave Pay:</label>
                                </div>
                                <div class="col-md-10">                                
                                        <div class="form-check form-check-inline" id="wpay" id="wpay">
                                            <input class="form-check-input" type="radio" name="leavepay"
                                                id="leave_pay1" value="WithPay" checked>
                                            <label class="form-check-label" for="withpay">With Pay</label>
                                        </div>
                                       <div class="form-check form-check-inline" id="woutpay">
                                        <input class="form-check-input" type="radio" name="leavepay"
                                            id="leave_pay2" value="WithoutPay">
                                        <label class="form-check-label" for="withoutpay">Without Pay</label>
                            </div>

                                </div>
                            </div>
                        </div>

                        
                                <input type='text' id='emptype' name='emptype' class='form-control'
                                            value=<?php echo $r['emp_type']; ?> hidden>                            
                        
                        
                                <?php 
                                $emp_type = $r['emp_type'];
                                $sl = $rs['earned_sl'];                
                                if($emp_type == 'Regular'){
                                echo'<div id="sickleavebal">
                                            <div class="form-row align-items-center mb-2">
                                               <div class="col-md-2 d-inline">
                                                    <label for="">SL Balance:</label>
                                                </div>
                                                <div class="col-md-3 d-inline">
                                                        <input type="text" id="sick_leavebal" name="sickleavebal" class="form-control"
                                                        value='.$sl.' readonly>
                                                </div>
                                            </div>
                                    </div>';
                                }else{
                                }


                                 ?>                                            

                         <!-- sick leave advance filing  -->

                        <div id="advancefiling">
                            <div class="row">
                                <div class=col-md-2>
                                    <label for="">Advance Filing:</label>
                                </div>
                                <div class="col-md-10">
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input advancesl" type="radio" name="advancesl"
                                            id="advancesl" value="yes">
                                        <label class="form-check-label" for="inlineRadio1">Yes</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input advancesl" type="radio" name="advancesl"
                                            id="advancesl" value="no">
                                        <label class="form-check-label" for="inlineRadio2">No</label>
                                    </div>
                                </div>
                            </div>
                        </div>

           
                    
                        <?php 
                        $emp_type = $r['emp_type'];
                        $vl = $rs['earned_vl'];  

                       echo'<div id="vacleavebal">
                                    <div class="form-row align-items-center mb-2">
                                       <div class="col-md-2 d-inline">
                                            <label for="">VL Balance:</label>
                                        </div>
                                        <div class="col-md-3 d-inline">
                                                <input type="text" id="vac_leavebal" name="vacleavebal" class="form-control"
                                                value='.$vl.' readonly>
                                        </div>
                                    </div>
                                </div>';
                      

                        ?>




                    <div id="paternity">
                               <div class="form-row mb-2">
                                    <div class=col-md-2>
                                        <label for="">Civil Status:</label>
                                    </div>
                                    <div class="col-md-4">
                                          <div class="form-check form-check-inline">
                                        <?php 
                                            $cs = $r['civilstatus'];
                                            if($cs =='Single'){
                                           echo"<input type='text' id='civilstatus' name='civilstatus' class='form-control wr'
                                                value=".$cs." readonly>
                                                <h3 class='cstat'>*Please contact HRD to update your civil status*</h3>";

                                            }else{
                                                  echo"<input type='text' id='civilstatus' name='civilstatus' class='form-control'value=".$cs." readonly>";
                                            }
                                         ?>
                                    
                                        </div>
                                    </div>
                                </div>
                                <div class="form-row align-items-center mb-2">
                                   <div class="col-md-2 d-inline">
                                        <label for="">Child Date of Birth:</label>
                                    </div>
                                        <div class="col-md-3 d-inline">
                                            <input type="date" id="dateBirth" name="dateBirth" class="form-control"
                                                value="<?php echo date('Y-m-d');?>">
                                        </div>
                                </div>
                     </div>

                           <div id="maternity">
                                <div class="form-row align-items-center mb-2">
                                   <div class="col-md-2 d-inline">
                                        <label for="">Delivery Date:</label>
                                    </div>
                                    <div class="col-md-3 d-inline">
                                        <input type="date" id="dateStartMaternity" name="dateStartMaternity" class="form-control"
                                            value="<?php echo date('Y-m-d');?>">
                                    </div>
                                </div>
                        </div>

                        <div id="specialwomen">
                        </div>

                            <div id="specialviolence">
                                <div class="form-row align-items-center mb-2">
                                   <div class="col-md-2 d-inline">
                                        <label for="">Operation Date:</label>
                                    </div>
                                    <div class="col-md-3 d-inline">
                                        <input type="date" id="dateOfOperation" name="dateOfOperation" class="form-control"
                                            value="<?php echo date('Y-m-d');?>">
                                    </div>
                                </div>
                        </div>

                        <div id="soloparent">
                        </div>



                        <div class="form-row align-items-center mb-2">

                            <div class="col-md-2 d-inline">
                                <label for="">Leave From:</label>
                            </div>
                            <div class="col-md-3 d-inline">
                                <input type="date" id="dateFrom" name="dateFrom" class="form-control"
                                    value="<?php echo date('Y-m-d');?>">
                            </div>
                            <div class="col-md-1 d-inline">
                                <label for="">To:</label>
                            </div>
                            <div class="col-md-3 d-inline">
                                <input type="date" id="dateTo" name="dateTo" class="form-control"
                                    value="<?php echo date('Y-m-d'); ?>">
                            </div>
                            <div class="col-md-3 d-inline">
                                <div class="form-check" id="singleHalf">
                                    <input class="form-check-input" type="checkbox" id="halfDay">
                                        <label class="form-check-label " for="halfDay">Half Day</label>
                                </div>
                            </div>
                        </div>

                        <div class="form-row mb-2 align-items-center" id="halfdayset">
                            <div class="col-md-2 d-inline">
                            </div>

                            <div class="col-md-3 d-inline">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="lastDayHalfDay" name="lastDayHalfDay">
                                    <label class="form-check-label " for="lastDayHalfDay">Single Half Day</label>
                                </div>
                            </div>

                            <div class="col-md-3 d-inline">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="multiHalfDay" name="multiHalfDay">
                                    <label class="form-check-label " for="multiHalfDay">All Half Day</label>
                                </div>
                            </div>

                            <div class="col-md-4 d-inline">
                                <span id="errMsg"></span>
                            </div>

                        </div>

                        <div class="form-row mb-2">
                            <div class="col-md-2 d-inline">
                                <label for='leaveDesc'>Reason:</label>
                            </div>
                            <div class="col-md-10 d-inline">
                                <textarea class="form-control inputtext" id="leaveDesc" name="leaveDesc" rows="4" cols="50" ></textarea>
                            </div>
                        </div>



                        <div id='AddAttachment'>
                            <div class="form-row mb-2">
                                <div class="col-md-2">
                                    <label for="">Attach File:</label>
                                </div>
                                <div class="col-md-10 d-inline">
                                    <a class="" onclick="myFunction()"><img src='../img/ppclip.jpg' class='ppclip' onclick="myFunction()"></img></a>
                                </div>
                            </div>
                        </div>


                        <div id='Attachment'>
                             <div class="row pb-2">
                                <div class="col-md-2">
                                    <label for="">Attachment:</label>
                                </div>
                                <div class="col-md-10">
                                    <input type="file" name="medicalfiles" id="medicalfiles" accept=".pdf" onChange="GetMedFile()">
                                </div>
                            </div>
                        </div>


                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" id="Submit" onclick="uploadFile();" >Submit</button>
                </div>

            </div>
        </div>
    </div>
</div>
</div>
<br><br>

         <script>
                $("#Attachment").hide();
                $("#AddAttachment").show();
                function myFunction() {
                    $("#Attachment").show();
                    $("#AddAttachment").hide();            
                }



           </script>


<?php include("../_footer.php");?>
