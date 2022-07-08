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
        include('../controller/dtr.php');
        $employeedtr = new EmployeeDTR();
    }
        
?>
<script src="https://unpkg.com/@themesberg/flowbite@1.2.0/dist/datepicker.bundle.js"></script>
<script type='text/javascript' src='../js/dtr.js'></script>
<script src="<?= constant('NODE'); ?>xlsx/dist/xlsx.core.min.js"></script>
<script src="<?= constant('NODE'); ?>file-saverjs/FileSaver.min.js"></script>
<script src="<?= constant('NODE'); ?>tableexport/dist/js/tableexport.min.js"></script>
<script src="https://cdn.jsdelivr.net/gh/linways/table-to-excel@v1.0.4/dist/tableToExcel.js"></script>
<script type="text/javascript" src='../js/script.js'></script>

<style type="text/css">
.bgen{
    font-weight: bolder;
    width: 120px;
}


.pad{
    padding: 5px 5px 5px 5px;
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

label{
    font-weight: bolder;
}

</style>
<div class="container">
    <div class="section-title">
          <h1>MY PROFILE</h1>
        </div>
    <div class="main-body mbt">

          <!-- Breadcrumb -->
          <nav aria-label="breadcrumb" class="main-breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item active" aria-current="page"><b><i class='fas fa-calendar fa-fw'>
                        </i>&nbsp;ATTENDANCE</b></li>
            </ol>
          </nav>
    <div class="form-row pt-3">
            <input type="text" name="empCode" id="empCode" value="<?php $empCode ?>" hidden>
                <label class="control-label pad" for="dateFrom">FROM:</label>
            <div class="col-md-2">
                <input type="date" id="dateFrom" class="form-control" name="dateFrom"
                    value="<?php echo date('Y-m-d'); ?>">
            </div>
                <label class="control-label pad" for="dateTo">TO:</label>
            <div class="col-md-2">
                <input type="date" id="dateTo" class="form-control" name="dateTo" value="<?php echo date('Y-m-d'); ?>">
            </div>
            <div class="col-md-1">
                <input type="submit" id="search" class="form-control btn btn-primary bgen" value="SEARCH">
            </div>
        </div>
    <br>
    <div class="row">
        <div class="col-md-12">
            <div class="panel-body">
                <div id="dtrViewList" class="table-responsive-sm table-body"></div>
            </div>
        </div>
    </div>
    </div>
</div>
    <br><br>
<script type="text/javascript">
    
function exportReportToExcel() {
  let table = document.getElementsByTagName("table"); // you can use document.getElementById('tableId') as well by providing id to the table tag
  TableToExcel.convert(table[0], { // html code may contain multiple tables so here we are refering to 1st table tag
    name: `export_myattendance.xlsx`, // fileName you could use any name
    sheet: {
      name: 'Attendance' // sheetName
    }
  });
}

           $('#dateTo').change(function(){

                if($('#dateTo').val() < $('#dateFrom').val()){

                    swal({text:"Date to must be greater than date from!",icon:"error"});

                    var input2 = document.getElementById('dateTo');
                    input2.value = '';               
                }
            });


            $('#dateFrom').change(function(){

                if($('#dateFrom').val() > $('#dateTo').val()){
                    var input2 = document.getElementById('dateTo');
                    document.getElementById("dateTo").min = $('#dateFrom').val();
                    input2.value = '';
                }
            });
</script>
<?php include('../_footer.php');  ?>
