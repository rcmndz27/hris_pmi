<?php ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Applicant Profile</title>

    <!-- <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script> -->

    <script type="text/javascript" src="jquery-3.5.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
    </script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
    </script>
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/webcamjs/1.0.25/webcam.min.js"></script> -->

    <script type="text/javascript" src="applicant-profile.js"></script>
    <script type="text/javascript" src="validator.js"></script>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">

    <link type="image/x-png" rel="icon" href="img/logo-icon.png">

</head>

<body>
    <header>
        <nav class="navbar navbar-expand-md fixed-top">
            <a class="navbar-brand center-logo" href="../pages/index.php"><img src="img/pmi_logo_full.png" alt="" srcset=""></a>
        </nav>
    </header>
    <main>
        <div class="container-fluid">
            <form id="applicantform">

                <div class="form-row">
                    <div class="col-lg-12">
                        <h3 class="display-5 mt-3">Applicant Profile</h3>
                    </div>
                </div>

                <br>
                <ul class="nav nav-tabs" id="myTab" name="myTab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <a class="nav-link active" id="personal-tab" name="personal-tab" data-toggle="tab"
                            href="#personal" role="tab" aria-controls="personal" aria-selected="true">Personal</a>
                    </li>
                    <li class="nav-item" role="presentation">
                        <a class="nav-link" id="family-tab" name="family-tab" data-toggle="tab" href="#family"
                            role="tab" aria-controls="family" aria-selected="false">Family</a>
                    </li>
                    <li class="nav-item" role="presentation">
                        <a class="nav-link" id="education-tab" name="education-tab" data-toggle="tab" href="#education"
                            role="tab" aria-controls="education" aria-selected="false">Education</a>
                    </li>
                    <li class="nav-item" role="presentation">
                        <a class="nav-link" id="job-tab" name="job-tab" data-toggle="tab" href="#job" role="tab"
                            aria-controls="job" aria-selected="false">Employment</a>
                    </li>
                    <li class="nav-item" role="presentation">
                        <a class="nav-link" id="others-tab" name="others-tab" data-toggle="tab" href="#others"
                            role="tab" aria-controls="others" aria-selected="false">Other Information</a>
                    </li>
                </ul>

                <div class="tab-content" id="myTabContent">

                    <div class="tab-pane fade show active" id="personal" role="tabpanel" aria-labelledby="personal-tab">
                        <br>

                        <div class="form-row">
                            <div class="col-lg-12">
                                <h3 class="display-5">Personal Information</h3>
                            </div>
                        </div>

                        <br>
                        
                        <div class="form-row">

                            <!-- <div class="col-lg-12  mb-3">
                                <span id="my_camera"></span>
                                <img src="img/person.jpg" id="imgPic" class="d-block mb-1" alt="applicantPic">
                                <button type="button" class="btn btn-primary d-block" id="snapShot">Capture</button>
                            </div> -->

                            <div class="col-lg-12  mb-3">
                                <img src="img/person.jpg" id="imgPic" class="d-block mb-1" alt="applicantPic">
                                <input id="imgInput" class="d-block" type="file" onchange="ImageEncode();">
                            </div>

                        </div>

                        <div class="form-row">
                            <div class="col-lg-6">
                                <label class="control-label" for="positionList">Position Applying For</label>
                                <select class="form-control" id="positionList"></select>
                            </div>
                            <div class="col-lg-6" id="otherpositionholder">
                                <label class="control-label" for="otherPosition">Other Position</label>
                                <input type="text" class="form-control" id="otherPosition" name="otherPosition">
                            </div>
                        </div>

                        <fieldset class="fieldset-border">
                            <legend class="fieldset-border">
                                Personal Details
                            </legend>

                            <div class="form-row">
                                <div class="col-lg-3">
                                    <div class="form-group">
                                        <label class="control-label" for="firstname">First Name</label>
                                        <input type="text" class="form-control inputtext" id="firstname"
                                            name="firstname" place placeholder="Required">
                                    </div>
                                </div>

                                <div class="col-lg-3">
                                    <div class="form-group">
                                        <label class="control-label" for="middlename">Middle Name</label>
                                        <input type="text" class="form-control inputtext" name="middlename"
                                            id="middlename" placeholder="Required">
                                    </div>
                                </div>

                                <div class="col-lg-3">
                                    <div class="form-group">
                                        <label class="control-label" s for="lastname">Last Name</label>
                                        <input type="text" class="form-control inputtext" name="lastname" id="lastname"
                                            placeholder="Required">
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <label class="control-label" s for="suffix">Suffix</label>
                                    <input type="text" class="form-control" name="suffix" id="suffix">
                                </div>
                            </div> <!-- firstname, middlename, lastname, suffix -->

                            <div class="form-row">

                                <div class="col-lg-3">
                                    <div class="form-group">
                                        <label class="control-label" for="gender">Gender</label>
                                        <select class="form-control" id="gender">
                                            <option>Male</option>
                                            <option>Female</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-lg-3">
                                    <div class="form-group">
                                        <label class="control-label" s for="bloodtype">Blood Type</label>
                                        <input type="text" class="form-control inputtext" name="bloodtype"
                                            id="bloodtype" placeholder="Required">
                                    </div>
                                </div>

                                <div class="col-lg-3">
                                    <div class="form-group">
                                        <label class="control-label" for="civilstatus">Civil Status</label>
                                        <select class="form-control" id="civilstatus">
                                            <option>Single</option>
                                            <option>Married</option>
                                            <option>Widowed</option>
                                            <option>Separated</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-lg-3">
                                    <div class="form-group">
                                        <label class="control-label" for="birthday">Birthday</label>
                                        <input type="date" class="form-control inputtext" name="birthday" id="birthday">
                                    </div>
                                </div>
                            </div> <!-- gender, bloodtype, civilstatus, birthday -->
                        </fieldset>

                        <fieldset class="fieldset-border">
                            <legend class="fieldset-border">
                                Contact Details
                            </legend>

                            <div class="form-row">

                                <div class="col-lg-3">
                                    <label class="control-label" s for="email">Email Address</label>
                                    <input type="email" class="form-control inputemail" name="email" id="email"
                                        placeholder="Required">


                                </div>

                                <div class="col-lg-3">
                                    <label class="control-label" for="telephone">Telephone Number</label>
                                    <input type="text" class="form-control" name="telephone" id="telephone">


                                </div>

                                <div class="col-lg-3">
                                    <div class="form-group">
                                        <label class="control-label" for="cellphone">Cellphone Number</label>
                                        <input type="text" class="form-control inputnumber" name="cellphone"
                                            id="cellphone" placeholder="Required">


                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="form-group">
                                        <label class="control-label" for="otherCellphone">Other Cellphone Number</label>
                                        <input type="text" class="form-control inputnumber" name="otherCellphone"
                                            id="otherCellphone" placeholder="Required">


                                    </div>
                                </div>
                            </div> <!-- email, telephone, cellphone -->

                            <div class="form-row">

                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label class="control-label" for="presentAddress">Present Address</label>
                                        <input type="text" class="form-control inputtext" name="presentAddress"
                                            id="presentAddress" placeholder="Required">


                                    </div>
                                </div>

                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label class="control-label" for="permanentAddress">Permanent Address</label>
                                        &emsp;
                                        &emsp;
                                        <input type="checkbox" class="form-check-input" id="setpermanentaddress">
                                        <label class="form-check-label" for="setpermanentaddress">Same as Present
                                            Address</label>
                                        <input type="text" class="form-control inputtext" name="permanentAddress"
                                            id="permanentAddress" placeholder="Required">


                                    </div>
                                </div>
                            </div> <!-- present address, permanent address -->

                        </fieldset>

                        <fieldset class="fieldset-border">
                            <legend class="fieldset-border">
                                Government IDs
                            </legend>

                            <div class="from-row pb-2">
                                <div class="col-lg-12 pl-0">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="firstjob">
                                        <label class="form-check-label " for="firstjob">First Job</label>
                                    </div>
                                </div>
                            </div>

                            <div class="form-row">

                                <div class="col-lg-3">
                                    <div class="form-group">
                                        <label class="control-label" s for="tin">Tin No</label>
                                        <input type="text" class="form-control inputtext" name="tin" id="tin"
                                            placeholder="Required">
                                    </div>
                                </div>

                                <div class="col-lg-3">
                                    <div class="form-group">
                                        <label class="control-label" for="sss">SSS No</label>
                                        <input type="text" class="form-control inputtext" name="sss" id="sss"
                                            placeholder="Required">
                                    </div>
                                </div>

                                <div class="col-lg-3">
                                    <div class="form-group">
                                        <label class="control-label" for="philhealth">Philhealth No</label>
                                        <input type="text" class="form-control inputtext" name="philhealth"
                                            id="philhealth" placeholder="Required">
                                    </div>
                                </div>

                                <div class="col-lg-3">
                                    <div class="form-group">
                                        <label class="control-label" for="pagibig">Pag-ibig No</label>
                                        <input type="text" class="form-control inputtext" name="pagibig" id="pagibig"
                                            placeholder="Required">
                                    </div>
                                </div>
                            </div> <!-- tin, sss, philhealth, pagibig -->

                            <div class="form-row">

                                <div class="col-lg-3">
                                    <div class="form-group">
                                        <label class="control-label" for="prclicense">PRC License</label>
                                        <input type="text" class="form-control" name="prclicense" id="prclicense">
                                    </div>
                                </div>

                                <div class="col-lg-3">
                                    <div class="form-group">
                                        <label class="control-label" for="prcexpirydate">PRC License Expiry Date</label>
                                        <input type="date" class="form-control" name="prcexpirydate" id="prcexpirydate">
                                    </div>
                                </div>

                                <div class="col-lg-3">
                                    <div class="form-group">
                                        <label class="control-label" for="driverslicense">Driver License</label>
                                        <input type="text" class="form-control" name="driverslicense"
                                            id="driverslicense">
                                    </div>
                                </div>

                                <div class="col-lg-3">
                                    <div class="form-group">
                                        <label class="control-label" for="driversexpirydate">Drivers License Expiry
                                            Date</label>
                                        <input type="date" class="form-control" name="driversexpirydate"
                                            id="driversexpirydate">
                                    </div>
                                </div>
                            </div> <!-- prc license, expiry date, drivers license  -->
                        </fieldset>
                    </div>

                    <div class="tab-pane fade" id="family" role="tabpanel" aria-labelledby="family-tab">
                        <br>
                        <div class="form-row">
                            <div class="col-lg-12">
                                <h3 class="display-5">Family Information</h3>
                            </div>
                        </div>
                        <br>

                        

                        <!-- <fieldset class="fieldset-border">
                            <legend class="fieldset-border">
                                Family
                            </legend>

                            <div class="form-row">
                                <div class="col-lg-3">
                                    <div class="form-group">
                                        <label class="control-label" for="">Fullname</label>
                                        <input type="text" class="form-control" id="fullname" name="fullname">
                                    </div>
                                </div>
                                <div class="col-lg-2">
                                    <div class="form-group">
                                        <label class="control-label" for="relationshipList">Relationship</label>
                                        <select class="form-control" id="relationshipList"></select>
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="form-group">
                                        <label class="control-label" for="familyBirthday">Birthday</label>
                                        <input type="date" class="form-control inputtext" name="familyBirthday" id="familyBirthday">
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="form-group">
                                        <label class="control-label" for="familyAddress">Address</label>
                                        <input type="text" class="form-control" id="familyAddress" name="familyAddress">
                                    </div>
                                </div>
                                <div class="col-lg-1">
                                    <div class="form-group">
                                        <label class="control-label">&nbsp;</label>
                                        <button class="form-control btn btnAdd" id="btnAdd"><i class="fas fa-plus-circle"></i></button>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-1">
                                <div class="form-group">
                                    <label class="control-label">&nbsp;</label>
                                    <button class="form-control btn" id="btnTest">Ok</button>
                                </div>
                            </div>
                            



                            <div class="form-row" id="spouseCredentials">
                                <div class="col-lg-3">
                                    <div class="form-group">
                                        <label class="control-label" for="">TIN No.</label>
                                        <input type="text" class="form-control" id="spouseTINNo" name="spouseTINNo">
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="form-group">
                                        <label class="control-label" for="">SSS No.</label>
                                        <input type="text" class="form-control" id="spouseSSSNo" name="spouseSSSNo">
                                    </div>
                                </div>
                            </div>
                        </fieldset> -->

                        

                        <fieldset class="fieldset-border">
                            <legend class="fieldset-border">
                                Parents
                            </legend>
                            <div class="form-row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label class="control-label" for="mother">Mother</label>
                                        <input type="text" class="form-control" id="mother" name="mother">
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label" for="motherAddress">Address</label>
                                        <input type="text" class="form-control" id="motherAddress" name="motherAddress">
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label" for="motherContact">Contact Number</label>
                                        <input type="text" class="form-control" id="motherContact" name="motherContact">

                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label class="control-label" for="father">Father</label>
                                        <input type="text" class="form-control" id="father" name="father">

                                    </div>
                                    <div class="form-group">
                                        <label class="control-label" for="fatherAddress">Address</label>
                                        <input type="text" class="form-control" id="fatherAddress" name="fatherAddress">

                                    </div>
                                    <div class="form-group">
                                        <label class="control-label" for="fatherContact">Contact Number</label>
                                        <input type="text" class="form-control" id="fatherContact" name="fatherContact">

                                    </div>
                                </div>
                            </div>
                        </fieldset><!-- Parents  -->

                        <fieldset class="fieldset-border" id="spouseInfo">
                            <legend class="fieldset-border">
                                Spouse
                            </legend>
                            <div class="form-row">
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label class="control-label" for="spouse">Name</label>
                                        <input type="text" class="form-control" id="spouse" name="spouse">

                                    </div>
                                </div>

                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label class="control-label" for="spouseBirthdate">Birthdate</label>
                                        <input type="date" class="form-control" name="spouseBirthdate"
                                            id="spouseBirthdate">

                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label class="control-label" for="spouseOccupation">Occupation</label>
                                        <input type="text" class="form-control" name="spouseOccupation"
                                            id="spouseOccupation">

                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label class="control-label" for="spouseTIN">TIN</label>
                                        <input type="text" class="form-control" name="spouseTIN" id="spouseTIN">

                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label class="control-label" for="spouse-sss">SSS</label>
                                        <input type="text" class="form-control" name="spouseSSS" id="spouseSSS">

                                    </div>
                                </div>
                            </div>
                        </fieldset><!-- Spouse  -->

                        <fieldset class="fieldset-border" id="children">
                            <legend class="fieldset-border">
                                Children
                            </legend>
                            <div class="form-row">
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label class="control-label" for="child1">Name</label>
                                        <input type="text" class="form-control" id="child1" name="child1">
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label class="control-label" for="child1Birthdate">Birthdate</label>
                                        <input type="date" class="form-control" id="child1Birthdate"
                                            name="child1Birthdate">
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label class="control-label" for="child1Gender">Gender</label>
                                        <select class="form-control" id="child1Gender" name="child1Gender">
                                            <option>Male</option>
                                            <option>Female</option>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label class="control-label" for="child2">Name</label>
                                        <input type="text" class="form-control" id="child2" name="child2">
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label class="control-label" for="child2Birthdate">Birthdate</label>
                                        <input type="date" class="form-control" id="child2Birthdate"
                                            name="child2Birthdate">
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label class="control-label" for="child2Gender">Gender</label>
                                        <select class="form-control" id="child2Gender" name="child2Birthdate">
                                            <option>Male</option>
                                            <option>Female</option>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label class="control-label" for="child3">Name</label>
                                        <input type="text" class="form-control" id="child3" name="child3">
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label class="control-label" for="child3-birthdate">Birthdate</label>
                                        <input type="date" class="form-control" name="child3Birthdate"
                                            id="child3Birthdate">
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label class="control-label" for="child3Gender">Gender</label>
                                        <select class="form-control" id="child3Gender">
                                            <option>Male</option>
                                            <option>Female</option>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label class="control-label" for="child4">Name</label>
                                        <input type="text" class="form-control" id="child4" name="child4">
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label class="control-label" for="child4Birthdate">Birthdate</label>
                                        <input type="date" class="form-control" name="child4Birthdate"
                                            id="child4Birthdate">
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label class="control-label" for="child4Gender">Gender</label>
                                        <select class="form-control" id="child4Gender" name="child4Gender">
                                            <option>Male</option>
                                            <option>Female</option>
                                        </select>

                                    </div>
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label class="control-label" for="child5">Name</label>
                                        <input type="text" class="form-control" id="child5" name="child5">
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label class="control-label" for="child5Birthdate">Birthdate</label>
                                        <input type="date" class="form-control" id="child5Birthdate"
                                            name="child5Birthdate">
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label class="control-label" for="child5Gender">Gender</label>
                                        <select class="form-control" id="child5Gender" name="child5Gender">
                                            <option>Male</option>
                                            <option>Female</option>
                                        </select>
                                    </div>
                                </div>
                            </div>

                        </fieldset><!-- Children  -->

                        <fieldset class="fieldset-border">
                            <legend class="fieldset-border">
                                Incase of Emergency
                            </legend>
                            <div class="form-row">
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label class="control-label" for="contactPerson">Contact Person</label>
                                        <input type="text" class="form-control inputtext" id="contactPerson"
                                            name="contactPerson" placeholder="Required">
                                    </div>
                                </div>

                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label class="control-label" for="contactNumber">Contact Number</label>
                                        <input type="text" class="form-control inputnumber" id="contactNumber"
                                            name="contactNumber" placeholder="Required">
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label class="control-label" for="contactAddress">Address</label>
                                        <input type="text" class="form-control inputtext" id="contactAddress"
                                            name="contactAddress" placeholder="Required">
                                    </div>
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label class="control-label" for="contactPerson1">Contact Person</label>
                                        <input type="text" class="form-control inputtext" id="contactPerson1"
                                            name="contactPerson1" placeholder="Required">
                                    </div>
                                </div>

                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label class="control-label" for="contactNumber1">Contact Number</label>
                                        <input type="text" class="form-control inputnumber" id="contactNumber1"
                                            name="contactNumber1" placeholder="Required">
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label class="control-label" for="contactAddress1">Address</label>
                                        <input type="text" class="form-control inputtext" id="contactAddress1"
                                            name="contactAddress1" placeholder="Required">
                                    </div>
                                </div>
                            </div>

                        </fieldset><!-- Incase of Emergency  -->

                        <fieldset class="fieldset-border">
                            <legend class="fieldset-border">
                                Relatives employed in PMI
                            </legend>
                            <div class="form-row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label class="control-label" for="companyPersonel">Name</label>
                                        <input type="text" class="form-control" id="companyPersonel"
                                            name="companyPersonel">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label class="control-label"
                                            for="companyPersonelRelationship">Relationship</label>
                                        <input type="text" class="form-control" name="companyPersonelRelationship"
                                            id="companyPersonelRelationship">
                                    </div>
                                </div>
                            </div>
                        </fieldset><!-- Company Personel  -->

                    </div>

                    <div class="tab-pane fade" id="education" role="tabpanel" aria-labelledby="education-tab">

                        <br>
                        <div class="form-row">
                            <div class="col-lg-12">
                                <h3 class="display-5">Education Information</h3>
                            </div>
                        </div>
                        <br>
                        <fieldset class="fieldset-border">
                            <legend class="fieldset-border">
                                Master's
                            </legend>
                            <div class="form-row">
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label class="control-label" for="higherstudies">School Name</label>
                                        <input type="text" class="form-control" id="higherstudies" name="higherstudies">
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label class="control-label" for="higherstudiesCourse">Course Taken</label>
                                        <input type="text" class="form-control" id="higherstudiesCourse"
                                            name="higherstudiesCourse">
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label class="control-label" for="higherstudiesDate">Graduation Date</label>
                                        <input type="date" class="form-control" id="higherstudiesDate"
                                            name="higherstudiesDate">
                                    </div>
                                </div>
                            </div>
                        </fieldset><!-- HigherStudies  -->
                        <fieldset class="fieldset-border">
                            <legend class="fieldset-border">
                                College
                            </legend>
                            <div class="form-row">
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label class="control-label" for="college">School Name</label>
                                        <input type="text" class="form-control" id="college" name="college">
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label class="control-label" for="collegeCourse">Course Taken</label>
                                        <input type="text" class="form-control" id="collegeCourse" name="collegeCourse">
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label class="control-label" for="collegeDate">Graduation Date</label>
                                        <input type="date" class="form-control" name="collegeDate" id="collegeDate">
                                    </div>
                                </div>
                            </div>
                        </fieldset><!-- College  -->
                        <fieldset class="fieldset-border">
                            <legend class="fieldset-border">
                                Highschool
                            </legend>
                            <div class="form-row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label class="control-label" for="highschool">School Name</label>
                                        <input type="text" class="form-control" id="highschool" name="highschool">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label class="control-label" for="highschoolDate">Graduation Date</label>
                                        <input type="date" class="form-control" name="highschoolDate"
                                            id="highschoolDate">
                                    </div>
                                </div>
                            </div>
                        </fieldset><!-- Highschool  -->
                        <fieldset class="fieldset-border">
                            <legend class="fieldset-border">
                                Elementary
                            </legend>
                            <div class="form-row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label class="control-label" for="elementary">School Name</label>
                                        <input type="text" class="form-control" id="elementary" name="elementary">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label class="control-label" for="elementaryDate">Graduation Date</label>
                                        <input type="date" class="form-control" name="elementaryDate"
                                            id="elementaryDate">
                                    </div>
                                </div>
                            </div>
                        </fieldset><!-- Elementary  -->
                    </div>

                    <div class="tab-pane fade" id="job" role="tabpanel" aria-labelledby="job-tab">

                        <br>
                        <div class="form-row">
                            <div class="col-lg-12">
                                <h3 class="display-5">Employment Information</h3>
                            </div>
                        </div>
                        <br>

                        <fieldset class="fieldset-border">
                            <legend class="fieldset-border">
                                Job History
                            </legend>
                            <div class="form-row">
                                <div class="col-lg-2">
                                    <div class="form-group">
                                        <label class="control-label" for="employer1">Employer Name</label>
                                        <input type="text" class="form-control inputtext" id="employer1"
                                            name="employer1" placeholder="Required">
                                    </div>
                                </div>

                                <div class="col-lg-2">
                                    <div class="form-group">
                                        <label class="control-label" for="employerContanctNo1">Contact No.</label>
                                        <input type="text" class="form-control inputtext" id="employerContanctNo1"
                                            name="employerContanctNo1" placeholder="Required">
                                    </div>
                                </div>

                                <div class="col-lg-2">
                                    <div class="form-group">
                                        <label class="control-label" for="positionHeld1">Position Held</label>
                                        <input type="text" class="form-control inputtext" id="positionHeld1"
                                            name="positionHeld1" placeholder="Required">
                                    </div>
                                </div>

                                <div class="col-lg-2">
                                    <div class="form-group">
                                        <label class="control-label" for="salary1">Salary</label>
                                        <input type="text" class="form-control inputnumber" id="salary1" name="salary1"
                                            placeholder="Required">
                                    </div>
                                </div>

                                <div class="col-lg-2">
                                    <div class="form-group">
                                        <label class="control-label" for="monthsofservice1">Months in Service</label>
                                        <input type="number" class="form-control inputnumber" id="monthsOfService1"
                                            name="monthsOfService1" placeholder="Required">
                                    </div>
                                </div>

                                <div class="col-lg-2">
                                    <div class="form-group">
                                        <label class="control-label" for="reasonForLeaving1">Reason for Leaving</label>
                                        <input type="text" class="form-control inputtext" id="reasonForLeaving1"
                                            name="reasonForLeaving1" placeholder="Required">
                                    </div>
                                </div>
                            </div> <!-- employer1  -->

                            <div class="form-row">
                                <div class="col-lg-2">
                                    <div class="form-group">
                                        <label class="control-label" for="employer2">Employer Name</label>
                                        <input type="text" class="form-control" id="employer2" name="employer2">
                                    </div>
                                </div>

                                <div class="col-lg-2">
                                    <div class="form-group">
                                        <label class="control-label" for="employerContanctNo2">Contact No.</label>
                                        <input type="text" class="form-control" id="employerContanctNo2"
                                            name="employerContanctNo2">
                                    </div>
                                </div>

                                <div class="col-lg-2">
                                    <div class="form-group">
                                        <label class="control-label" for="positionHeld2">Position Held</label>
                                        <input type="text" class="form-control" id="positionHeld2" name="positionHeld2">
                                    </div>
                                </div>

                                <div class="col-lg-2">
                                    <div class="form-group">
                                        <label class="control-label" for="salary2">Salary</label>
                                        <input type="text" class="form-control" id="salary2" name="salary2">
                                    </div>
                                </div>

                                <div class="col-lg-2">
                                    <div class="form-group">
                                        <label class="control-label" for="monthsOfService2">Months in Service</label>
                                        <input type="number" class="form-control" id="monthsOfService2"
                                            name="monthsOfService2">
                                    </div>
                                </div>

                                <div class="col-lg-2">
                                    <div class="form-group">
                                        <label class="control-label" for="reasonForLeaving2">Reason for Leaving</label>
                                        <input type="text" class="form-control" id="reasonForLeaving2"
                                            name="reasonForLeaving2">
                                    </div>
                                </div>
                            </div> <!-- employer2  -->

                            <div class="form-row">
                                <div class="col-lg-2">
                                    <div class="form-group">
                                        <label class="control-label" for="employer3">Employer Name</label>
                                        <input type="text" class="form-control" id="employer3" name="employer3">
                                    </div>
                                </div>

                                <div class="col-lg-2">
                                    <div class="form-group">
                                        <label class="control-label" for="employerContanctNo3">Contact No.</label>
                                        <input type="text" class="form-control" id="employerContanctNo3"
                                            name="employerContanctNo3">
                                    </div>
                                </div>

                                <div class="col-lg-2">
                                    <div class="form-group">
                                        <label class="control-label" for="positionHeld3">Position Held</label>
                                        <input type="text" class="form-control" id="positionHeld3" name="positionHeld3">
                                    </div>
                                </div>

                                <div class="col-lg-2">
                                    <div class="form-group">
                                        <label class="control-label" for="salary3">Salary</label>
                                        <input type="text" class="form-control" id="salary3" name="salary3">
                                    </div>
                                </div>

                                <div class="col-lg-2">
                                    <div class="form-group">
                                        <label class="control-label" for="monthsOfService3">Months in Service</label>
                                        <input type="number" class="form-control" id="monthsOfService3"
                                            name="monthsOfService3">
                                    </div>
                                </div>

                                <div class="col-lg-2">
                                    <div class="form-group">
                                        <label class="control-label" for="reasonForLeaving3">Reason for Leaving</label>
                                        <input type="text" class="form-control" id="reasonForLeaving3"
                                            name="reasonForLeaving3">
                                    </div>
                                </div>
                            </div> <!-- employer3  -->
                        </fieldset><!-- JobHistory  -->

                        <fieldset class="fieldset-border">
                            <legend class="fieldset-border">
                                References <small>(Not Relatives)</small>
                            </legend>

                            <div class="form-row">
                                <div class="col-lg-2">
                                    <div class="form-group">
                                        <label class="control-label" for="refName1">Name</label>
                                        <input type="text" class="form-control inputtext" id="refName1" name="refName1"
                                            placeholder="Required">
                                    </div>
                                </div>
                                <div class="col-lg-2">
                                    <div class="form-group">
                                        <label class="control-label" for="refContactNo1">Contact No.</label>
                                        <input type="text" class="form-control inputnumber" id="refContactNo1"
                                            name="refContactNo1" placeholder="Required">
                                    </div>
                                </div>
                                <div class="col-lg-2">
                                    <div class="form-group">
                                        <label class="control-label" for="refEmail1">Email</label>
                                        <input type="text" class="form-control inputtext" id="refEmail1"
                                            name="refEmail1" placeholder="Required">
                                    </div>
                                </div>
                                <div class="col-lg-2">
                                    <div class="form-group">
                                        <label class="control-label" for="refCompany1">Company</label>
                                        <input type="text" class="form-control inputtext" id="refCompany1"
                                            name="refCompany1" placeholder="Required">
                                    </div>
                                </div>
                                <div class="col-lg-2">
                                    <div class="form-group">
                                        <label class="control-label" for="refPosition1">Position</label>
                                        <input type="text" class="form-control inputtext" id="refPosition1"
                                            name="refPosition1" placeholder="Required">
                                    </div>
                                </div>
                            </div><!-- Reference1  -->

                            <div class="form-row">
                                <div class="col-lg-2">
                                    <div class="form-group">
                                        <label class="control-label" for="refName2">Name</label>
                                        <input type="text" class="form-control inputtext" id="refName2" name="refName2"
                                            placeholder="Required">
                                    </div>
                                </div>
                                <div class="col-lg-2">
                                    <div class="form-group">
                                        <label class="control-label" for="refContactNo2">Contact No.</label>
                                        <input type="text" class="form-control inputnumber" id="refContactNo2"
                                            name="refContactNo2" placeholder="Required">
                                    </div>
                                </div>
                                <div class="col-lg-2">
                                    <div class="form-group">
                                        <label class="control-label" for="refEmail2">Email</label>
                                        <input type="text" class="form-control inputtext" id="refEmail2"
                                            name="refEmail2" placeholder="Required">
                                    </div>
                                </div>
                                <div class="col-lg-2">
                                    <div class="form-group">
                                        <label class="control-label" for="refCompany2">Company</label>
                                        <input type="text" class="form-control inputtext" id="refCompany2"
                                            name="refCompany2" placeholder="Required">
                                    </div>
                                </div>
                                <div class="col-lg-2">
                                    <div class="form-group">
                                        <label class="control-label" for="refPosition2">Position</label>
                                        <input type="text" class="form-control inputtext" id="refPosition2"
                                            name="refPosition2" placeholder="Required">
                                    </div>
                                </div>
                            </div><!-- Reference2  -->

                            <div class="form-row">
                                <div class="col-lg-2">
                                    <div class="form-group">
                                        <label class="control-label" for="refName3">Name</label>
                                        <input type="text" class="form-control inputtext" id="refName3" name="refName3"
                                            placeholder="Required">
                                    </div>
                                </div>
                                <div class="col-lg-2">
                                    <div class="form-group">
                                        <label class="control-label" for="refContactNo3">Contact No.</label>
                                        <input type="text" class="form-control inputnumber" id="refContactNo3"
                                            name="refContactNo3" placeholder="Required">
                                    </div>
                                </div>
                                <div class="col-lg-2">
                                    <div class="form-group">
                                        <label class="control-label" for="refEmail3">Email</label>
                                        <input type="text" class="form-control inputtext" id="refEmail3"
                                            name="refEmail3" placeholder="Required">
                                    </div>
                                </div>
                                <div class="col-lg-2">
                                    <div class="form-group">
                                        <label class="control-label" for="refCompany3">Company</label>
                                        <input type="text" class="form-control inputtext" id="refCompany3"
                                            name="refCompany3" placeholder="Required">
                                    </div>
                                </div>
                                <div class="col-lg-2">
                                    <div class="form-group">
                                        <label class="control-label" for="refPosition3">Position</label>
                                        <input type="text" class="form-control inputtext" id="refPosition3"
                                            name="refPosition3" placeholder="Required">
                                    </div>
                                </div>
                            </div><!-- Reference3  -->

                        </fieldset><!-- References  -->

                    </div>

                    <div class="tab-pane fade" id="others" role="tabpanel" aria-labelledby="others-tab">
                        <br>
                        <div class="form-row">
                            <div class="col-lg-12">
                                <h3 class="display-5">Other Information</h3>
                            </div>
                        </div>
                        <br>

                        <div class="form-row mb-2">
                            <div class="col-lg-12">
                                <label class="control-label" for="skillset">Technical and Non-Technical Skils</label>
                                <small>(<strong>Note : </strong>Skills should be comma seperated.)</small>
                                <textarea class="form-control" id="skillset" name="skillset" rows="10"
                                    cols="90"></textarea>
                            </div>
                        </div> <!-- skillset -->

                        <div class="form-row mb-2">
                            <div class="col-lg-4">
                                <label class="control-label" for="convictedToCrimes">Have you ever been convicted of any
                                    crimes?</label>
                            </div>
                            <div class="col-lg-2">
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input convictedToCrimes" type="radio"
                                        name="convictedToCrimes" id="convictedToCrimes" value="yes">
                                    <label class="form-check-label" for="inlineRadio1">Yes</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input convictedToCrimes" type="radio"
                                        name="convictedToCrimes" id="convictedToCrimes" value="no">
                                    <label class="form-check-label" for="inlineRadio2">No</label>
                                </div>
                            </div>
                            <div class="col-lg-6 d-flex align-items-center" id="crimeDetails">
                                <label class="control-label d-inline pr-2" for="crime">Details</label>
                                <input type="text" class="form-control d-inline" id="crime" name="crime">
                            </div>
                        </div> <!-- convictedToCrimes -->

                        <div class="form-row">
                            <div class="col-lg-4">
                                <label class="control-label" for="hospitalized">Have you ever been hospitalized?</label>
                            </div>
                            <div class="col-lg-2">
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input hospitalized" type="radio" name="hospitalized"
                                        id="hospitalized" value="yes">
                                    <label class="form-check-label" for="inlineRadio1">Yes</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input hospitalized" type="radio" name="hospitalized"
                                        id="hospitalized" value="no">
                                    <label class="form-check-label" for="inlineRadio2">No</label>
                                </div>
                            </div>
                            <div class="col-lg-6 d-flex align-items-center" id="illnessDetails">
                                <label class="control-label pr-2" for="crime">Details</label>
                                <input type="text" class="form-control" id="illness" name="crime">
                            </div>
                        </div> <!-- hospitalized -->

                        <div class="form-row">
                            <div class="col-lg-12">
                                <label class="control-label" for="explanationText">Explain why you should be considered
                                    for
                                    the position.</label>
                                <textarea class="form-control" id="explanationText" name="explanationText" rows="10"
                                    cols="90"></textarea>
                            </div>
                        </div> <!-- explanationText -->

                    </div>

                </div>

                <div class="mt-3 mb-5">
                    <input class="btn btn-primary submit" id="submit" type="submit" value="Submit">
                </div>
            </form>


            <div class="modal fade" id="popUpModal" tabindex="-1" role="dialog" aria-labelledby="informationModalTitle"
                aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="popUpModalTitle"></h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <p>Please make sure all information are true and correct.</p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-primary" id="OK">OK</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <footer class="fixed-bottom">
        <div class="container">
            <label for="">Copyright &copy; <?php echo date("Y");?> System Development</label>
            <label for="">All Rights Reserved. </label>
        </div>
    </footer>
</body>

</html>