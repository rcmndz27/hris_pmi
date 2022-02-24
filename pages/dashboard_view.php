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
        include('../controller/dashboard.php');
    }    
?>

<script type='text/javascript' src='../js/chart.min.js'></script>
<style type="text/css">
    
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
          <h1>DEMOGRAPHIC REPORT</h1>
        </div>
    <div class="main-body mbt">

          <!-- Breadcrumb -->
          <nav aria-label="breadcrumb" class="main-breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item active" aria-current="page"><b><i class='fas fa-cogs fa-fw'>
                        </i>&nbsp;DEMOGRAPHIC REPORT</b></li>
            </ol>
          </nav>
    <div class="form-row pt-3">
    <label for="locationlist" class="col-form-label pad">LOCATION:</label>
        <div class="col-md-4">
            <select class="form-select" id="locationlist"></select><br>
        </div>

        <div class="col-md-10 bg-light">
            <h4 class="text-dark text-center">Population</h4>
            <div id="population">
                <canvas id="dash1"></canvas>
            </div>
            
        </div>
    </div>

    <div class="form-row pt-5 pb-5">
        <div class="col-md-5 bg-light">
            <h4 class="text-dark text-center">Age</h4>
            <div id="age">
                <canvas id="dash2"></canvas>
            </div>
        </div>

        <div class="col-md-5 bg-light">
            <h4 class="text-dark text-center">Gender</h4>
            <div id="gender">
                <canvas id="dash3"></canvas>
            </div>
        </div>
    </div>
 </div>
</div>
<br><br>


<script type='text/javascript' src='../js/dashboardchart.js'></script>