<?php
    session_start();

    $empID = $_SESSION['userid'];


    if (empty($_SESSION['userid']))
    {
        echo '<script type="text/javascript">alert("Please login first!!");</script>';
        header( "refresh:1;url=../index.php" );
    }
    else
    {
        include('../_header.php');
        include('../payroll/payrollApproval.php');

        if ($empType == 'Staff')
        {
            echo '<span class="etcMessage">
                    <script type="text/javascript">
                        alert("This page is RESTRICTED!!");
                        $("etcMessage").remove();
                    </script>
                </span';
        }
        else
        {

        }
    }
?>
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
          <h1>PAYROLL APPROVAL</h1>
        </div>
    <div class="main-body mbt">

          <!-- Breadcrumb -->
          <nav aria-label="breadcrumb" class="main-breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item active" aria-current="page"><b><i class='fas fa-money-check fa-fw'>
                        </i>&nbsp;PAYROLL APPROVAL</b></li>
            </ol>
          </nav>

            <div class="row pt-3">
                <div class="col-md-12">
                    <div class="panel-body">
                        <div id="contents" class="table-responsive-sm table-body">
                            <?php ShowAllPayroll(); ?>
                                
                        </div>
                    </div>
                </div>
            </div>
    </div>
</div>


<script type='text/javascript'>
    function ApprovePayroll()
    {
        $(".btnApprove").click(function(e)
        {
            if (confirm('Are you sure you want to approve this payroll?'))
            {
                var url = "../payroll/payrollApprovalProcess.php";
                
                $.post (
                    url,
                    {
                        choice: 1
                    },
                    function(data) { location.reload(true); }
                );
            }
        });
    }
</script>

<script type='text/javascript'>
    function RejectPayroll()
    {
        $(".btnReject").click(function(e)
        {
            if (confirm('Are you sure you want to reject this payroll?'))
            {
                var url = "../payroll/payrollApprovalProcess.php";
                
                $.post (
                    url,
                    { 
                        choice: 2
                    },
                    function(data) { location.reload(true); }
                );
            }
        });
    }
</script>
<script type='text/javascript' src='../js/tableFilter.js'></script>

<?php include('../_footer.php');?>