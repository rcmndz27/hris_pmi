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
        include('../payroll/payroll_rep.php');
        include('../elements/DropDown.php');
        include('../controller/MasterFile.php');

        // $payroll = new Payroll();
        $mf = new MasterFile();
        $dd = new DropDown();
         $empCode = $_SESSION['userid'];

        $empInfo = new EmployeeInformation();

        $empInfo->SetEmployeeInformation($_SESSION['userid']);

        $empUserType = $empInfo->GetEmployeeUserType();

            if($empUserType == 'Payroll' or $empUserType == 'Admin') {

            }else{
                        echo '<script type="text/javascript">alert("You do not have access here!");';
                        echo "window.location.href = '../index.php';";
                        echo "</script>";
            }
    }
        
?>

 
<script type='text/javascript' src='../payroll/payroll_rep.js'></script>
<script src="<?= constant('NODE'); ?>xlsx/dist/xlsx.core.min.js"></script>
<script src="<?= constant('NODE'); ?>file-saverjs/FileSaver.min.js"></script>
<script src="<?= constant('NODE'); ?>tableexport/dist/js/tableexport.min.js"></script>
<!-- <script type="text/javascript" src='../js/script.js'></script> -->

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
        text-align: center;
        width: 100%;
        height: 600px;
        display: block;
        overflow-y:auto;
}

.paytop{
text-align: left;
}
.btn-save{
background-color: #b52020;
border-color: #b52020;
color: #ffff;

}
.btn-save:hover{
background-color: #b71e1e;
}

.mbot{
    font-weight: bolder;
    font-size: 17px;
    margin-top: -50px;
}

.mleft{
    margin-left: 40px;
}

.bgen{
    font-weight: bolder;
}

#myInput {
  background-image: url('../img/searchicon.png');
  background-size: 30px;
  background-position: 5px 5px;
  background-repeat: no-repeat;
  width: 100%;
  font-size: 16px;  
  padding: 12px 20px 12px 40px;
  border: 1px solid #ddd;
  margin-bottom: 12px;
}
.arrow {
  border: solid black;
  border-width: 0 3px 3px 0;
  display: inline-block;
  padding: 3px;
}
.down {
  transform: rotate(45deg);
  -webkit-transform: rotate(45deg);
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
          <h1>PAYROLL REGISTER VIEW</h1>
        </div>
    <div class="main-body mbt">

          <!-- Breadcrumb -->
          <nav aria-label="breadcrumb" class="main-breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item active" aria-current="page"><b><i class='fas fa-money-check fa-fw'>
                        </i>&nbsp;PAYROLL REGISTER VIEW</b></li>
            </ol>
          </nav>

        <div class="form-row pt-3">

                <label for="companylist" class="col-form-label pad">COMPANY:</label>
                <div class="col-md-4">      
                    <?php $dd->GenerateDropDown("compay", $mf->GetPayCompany("compay")); ?>   
                </div>

                <label for="payroll_period" class="col-form-label pad">PAYROLL PERIOD:</label>   
                <div class='col-md-3'>
                    <?php $dd->GenerateDropDown("ddcutoff", $mf->GetAllPayCutoff("paycut")); ?>
                </div>

                <div class="col-md-2 d-flex">
                        <button type="button" id="search" class="btn btn-small btn-primary mr-1 bgen" onmousedown="javascript:filterAtt()">
                            GENERATE                      
                        </button>
                </div>
        </div>
    </div>
   
      <div class="row pt-5">
        <div class="col-md-12 mbot"><br>
            <div id='contents'></div>
        </div>
    </div>
    <span id='pdfres'></span>
</div>
</div>
<br><br>
<script>
function myFunction() {
  var input, filter, table, tr, td, i, txtValue;
  input = document.getElementById("myInput");
  filter = input.value.toUpperCase();
  table = document.getElementById("payrollRepList");
  tr = table.getElementsByTagName("tr");
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[0];
    if (td) {
      txtValue = td.textContent || td.innerText;
      if (txtValue.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }       
  }
}
</script>


<script>
    function filterAtt()
    {
        $("body").css("cursor", "progress");
        var url = "../payroll/payrollrep_rep_process.php";
        var cutoff = $('#ddcutoff').children("option:selected").val();
        var dates = cutoff.split(" - ");
        var company = $('#compay').children("option:selected").val();
        var companies = company.split(" - ");


        $('#contents').html('');

        $.post (
            url,
            {
                _action: 1,
                _from: dates[0],
                _to: dates[1],
                _company: companies[0]
                
            },
            function(data) { $("#contents").html(data).show(); }
        );
    }
</script>
<?php include('../_footer.php');  ?>
