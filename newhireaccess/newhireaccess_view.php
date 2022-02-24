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
        if ($empUserType == "Admin" || $empUserType == "HR-CreateStaff")
        {
            include("../newhireaccess/newhire-access.php");
            $allEmpApp = new NewHireAccess(); 
        }
        else
        {
            header( "refresh:1;url=../index.php" );
        }

    }    
?>

<script type="text/javascript" src="../newhireaccess/newhire-access.js"></script>
<script type='text/javascript' src='../js/validator.js'></script>
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
        text-align: center;
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
    .bb{
        font-weight: bolder;
        text-align: center;
    }
    .cstat {
    color: #e65a5a;
    font-size: 10px;
    text-align: center;
    margin: 0;
    padding: 5px 5px 5px 5px;
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
<div class="container">
    <div class="section-title">
          <h1>ALL HIRED EMPLOYEES</h1>
        </div>
    <div class="main-body mbt">

          <!-- Breadcrumb -->
          <nav aria-label="breadcrumb" class="main-breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item active" aria-current="page"><b><i class='fas fa-users fa-fw'>
                        </i>&nbsp;ALL HIRED EMPLOYEES</b></li>
            </ol>
          </nav>
    <div class="pt-3">

        <div class="row align-items-end justify-content-end">
            <div class="col-md-12 mb-3">
                <button type="button" class="btn btn-primary bb" id="applyNewHire">ADD NEW HIRE (+)</button>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="panel-body">
                    <div id="tableList" class="table-responsive-sm table-body">
                        <?php $allEmpApp->GetAllEmpHistory(); ?>
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
                    <h5 class="modal-title bb" id="popUpModalTitle">ADD NEW HIRE (+)</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times; </span>
                    </button>
                </div>
                <div class="modal-body">
                    <div>


                <div class="form-row align-items-center mb-2">
                        <div class="col-md-3 d-inline">
                            <label for="">Employee Code:</label>
                        </div>
                        <div class="col-md-4 d-inline">
                            <input type="text" class="form-control inputtext" id="employeecode" name="employeecode">
                        </div>
                 </div>

                <div class="form-row align-items-center mb-2">
                        <div class="col-md-3 d-inline">
                            <label class="col-form-label" for="firstname">First Name:</label>
                        </div>
                        <div class="col-md-6 d-inline">
                            <input type="text" class="form-control inputtext" 
                            id="firstname" name="firstname">
                        </div>
                 </div>                 

                <div class="form-row align-items-center mb-2">
                        <div class="col-md-3 d-inline">
                            <label class="col-form-label" for="middlename">Middle Name:</label>
                        </div>
                        <div class="col-md-6 d-inline">
                            <input type="text" class="form-control inputtext" 
                            id="middlename" name="middlename">
                        </div>
                 </div>  

                <div class="form-row align-items-center mb-2">
                        <div class="col-md-3 d-inline">
                            <label class="col-form-label" for="lastname">Last Name:</label>
                        </div>
                        <div class="col-md-6 d-inline">
                            <input type="text" class="form-control inputtext" 
                            id="lastname" name="lastname">
                        </div>
                 </div>                   

                <div class="form-row align-items-center mb-2">
                        <div class="col-md-3 d-inline">
                            <label class="col-form-label" for="companylist">Company:</label>
                        </div>
                        <div class="col-md-7 d-inline">
                            <select class="form-select inputtext" id="companylist"></select>
                        </div>
                 </div> 

                <div class="form-row align-items-center mb-2">
                        <div class="col-md-3 d-inline">
                            <label class="col-form-label" for="departmentlist">Department:</label>
                        </div>
                        <div class="col-md-7 d-inline">
                            <select class="form-select inputtext" id="departmentlist"></select>
                        </div>
                 </div>

                <div class="form-row align-items-center mb-2">
                        <div class="col-md-3 d-inline">
                            <label class="col-form-label" for="locationlist">Location:</label>
                        </div>
                        <div class="col-md-3 d-inline">
                            <select class="form-select inputtext" id="locationlist"></select>
                        </div>
                 </div>

                <div class="form-row align-items-center mb-2">
                        <div class="col-md-3 d-inline">
                            <label class="col-form-label" for="levellist">Employee Level:</label>
                        </div>
                        <div class="col-md-3 d-inline">
                            <select class="form-select inputtext" id="levellist"></select>
                        </div>
                 </div>                 

                <div class="form-row align-items-center mb-2">
                        <div class="col-md-3 d-inline">
                            <label class="col-form-label" for="employeetypelist">Employee Type:</label>
                        </div>
                        <div class="col-md-3 d-inline">
                            <select class="form-select inputtext" id="employeetypelist"></select>
                        </div>
                 </div>

               <div class="form-row align-items-center mb-2">
                        <div class="col-md-3 d-inline">
                            <label class="col-form-label" for="employeereportingtolist">Reporting To:</label>
                        </div>
                        <div class="col-md-6 d-inline">
                            <select class="form-select inputtext" id="employeereportingtolist"></select>
                        </div>
                 </div>

               <div class="form-row align-items-center mb-2">
                        <div class="col-md-3 d-inline">
                            <label class="col-form-label" for="prcexpirydate">Date Hired :</label>
                        </div>
                        <div class="col-md-3 d-inline">
                            <input type="date" class="form-control inputtext" name="datehired" id="datehired" value="<?php echo date('Y-m-d'); ?>">
                        </div>
                 </div>                 

               <div class="form-row align-items-center mb-2">
                        <div class="col-md-3 d-inline">
                            <label class="col-form-label" for="employeereportingtolist">Position Applying For:</label>
                        </div>
                        <div class="col-md-5 d-inline">
                            <select class="form-select inputtext" id="positionList"></select>
                        </div>
                 </div>

                <div class="form-row align-items-center mb-2">
                        <div class="col-md-3 d-inline">
                            <label class="col-form-label" for="otherposition">Other Position:</label>
                        </div>
                        <div class="col-md-5 d-inline">
                            <input type="text" class="form-control" id="otherposition" name="otherposition">
                        </div>
                 </div>
       
                   </div>
                </div>


                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" id="Submit" >Submit</button>
                </div>

            </div>
        </div>
    </div>
        <div class="col-md-12 mbot">
            <div id='contents'>       
            </div>
        </div>
 </div>
</div>
<br><br>

<script>
function myFunction() {
  var input, filter, table, tr, td, i, txtValue;
  input = document.getElementById("myInput");
  filter = input.value.toUpperCase();
  table = document.getElementById("allEmpList");
  tr = table.getElementsByTagName("tr");
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[1];
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


<?php include("../_footer.php");?>
