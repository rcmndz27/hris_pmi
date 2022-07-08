<?php
session_start();

if (empty($_SESSION["userid"]))
{
    header( "refresh:1;url=../index.php" );
}
else
{
    include("../_header.php");
    
    if ($empUserType == "Admin" || $empUserType == "HR-CreateStaff")
    {
        include("../dtr/alldtr-viewing.php");
        include('../elements/DropDown.php');
        $dd = new DropDown();
    }
    else
    {
        header( "refresh:1;url=../index.php" );
    }
}
?>


<script type="text/javascript" src="../dtr/alldtr-viewing.js"></script>
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
    font-weight: bolder;
}
</style>
<div id = "myDiv" style="display:none;" class="loader"></div>
<div class="container">
    <div class="section-title">
          <h1>BY LOCATION - ALL EMPLOYEE DAILY TIME RECORD VIEWING </h1>
        </div>
    <div class="main-body mbt">

          <!-- Breadcrumb -->
          <nav aria-label="breadcrumb" class="main-breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item active" aria-current="page"><b><i class='fas fa-suitcase fa-fw'>
                        </i>&nbsp;BY LOCATION - ALL EMPLOYEE DAILY TIME RECORD VIEWING</b></li>
            </ol>
          </nav>
        <div class="form-row pt-3">
            <label for="employee" class="col-form-label pad">LOCATION:</label>
        <div class='col-md-3'>
            <select class="form-select" id="alllocation" name="alllocation" >
                    <option value="1">PMI16th</option>
                    <option value="2">PMI TOWER</option>
                    <option value="3">PMI15th</option>
            </select>
        </div>  
        <label for="from" class="col-form-label pad">FROM:</label>
        <div class="col-md-2">
            <input type="date" id="dateFrom" class="form-control" name="dateFrom" value="<?php echo date('Y-m-d'); ?>">
        </div>
        <label for="to" class="col-form-label pad">TO:</label>
        <div class="col-md-2">
            <input type="date" id="dateTo" class="form-control" name="dateTo" value="<?php echo date('Y-m-d'); ?>">
        </div>
        <div class="col-md-1">
            <input type="submit" id="search" class="form-control btn btn-primary bgen" value="SEARCH">
        </div>

    </div>

    <div id="dtrViewList" class="form-row pt-3">
    </div>
 </div>
</div>
<br><br>

<script type="text/javascript">
    
    function myFunction() {
        var input, filter, table, tr, td, i, txtValue;
        input = document.getElementById("myInput");
        filter = input.value.toUpperCase();
        table = document.getElementById("empDtrList");
        tr = table.getElementsByTagName("tr");
        for (i = 0; i < tr.length; i++) {
        td = tr[i].getElementsByTagName("td");
        if(td.length > 0){ // to avoid th
        if (td[0].innerHTML.toUpperCase().indexOf(filter) > -1 || td[1].innerHTML.toUpperCase().indexOf(filter) > -1 ) {
        tr[i].style.display = "";
        } else {
        tr[i].style.display = "none";
            }
        }
        }
    }

function exportReportToExcel() {
  let table = document.getElementsByTagName("table"); // you can use document.getElementById('tableId') as well by providing id to the table tag
  TableToExcel.convert(table[0], { // html code may contain multiple tables so here we are refering to 1st table tag
    name: `export_attendance.xlsx`, // fileName you could use any name
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