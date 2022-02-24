<?php
    session_start();

    if (empty($_SESSION['userid'])){
        header('refresh:1;url=../index.php' );
    }
    else{
        include('../_header.php');
        include('../overtime/overtime-approval.php');

        $overtimeApproval = new OvertimeApproval();
    }
?>


<script type='text/javascript' src='../overtime/overtime-approval.js'></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<style type="text/css">
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
    }
.mbt {
    background-color: #faf9f9;
    padding: 30px;
    border-radius: 0.25rem;
}
</style>
<div class="container">
    <div class="section-title">
          <h1>OVERTIME APPROVAL</h1>
        </div>
    <div class="main-body mbt">

          <!-- Breadcrumb -->
          <nav aria-label="breadcrumb" class="main-breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item active" aria-current="page"><b><i class='fas fa-hourglass fa-fw'>
                        </i>&nbsp;OVERTIME APPROVAL</b></li>
            </ol>
          </nav>
          
    <div class="modal fade" id="popUpModal" tabindex="-1" role="dialog" aria-labelledby="informationModalTitle"
        aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="popUpModalTitle"></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div>
                        <label for="rejectReason">Reason for rejection</label>
                        <input type="text" name="rejectReason" id="rejectReason" class="form-control">
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" id="submit">Submit</button>
                </div>

            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12 pt-3">
            <?php $overtimeApproval->GetOTSummary($empCode);?>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12 pt-3" id="otDetails">
            
        </div>
    </div>
    </div>
</div>
<br><br>


<?php include("../_footer.php");?>