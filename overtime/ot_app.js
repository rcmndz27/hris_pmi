 $(function(){

   
    function CheckInput() {

        var inputValues = [];

        inputValues = [
            
            $('#remarks'),
            
        ];

        var result = (CheckInputValue(inputValues) === '0') ? true : false;
        return result;
    }


            $('#otdateto').change(function(){

                if($('#otdateto').val() < $('#otdate').val()){

                    swal({text:"OT date TO must be greater than OT Date From!",icon:"error"});

                    var input2 = document.getElementById('otdateto');
                    input2.value = $('#otdate').val();
                }else{
                    // alert('Error');
                }   


            });

$('#Submit').click(function(){

    

            var dte = $('#otdate').val();
            var dte_to = $('#otdateto').val();
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                  
            dateArr = []; //Array where rest of the dates will be stored

            //creating JS date objects
            var start = new Date(dte);
            var date = new Date(dte_to);
            var end = date.setDate(date.getDate() + 1);

            //Logic for getting rest of the dates between two dates("FromDate" to "EndDate")
            while(start < end){
               dateArr.push(moment(start).format('MM-DD-YYYY'));
               var newDate = start.setDate(start.getDate() + 1);
               start = new Date(newDate);  
            }

            const ite_date = dateArr.length === 0  ? dte : dateArr ;


            if (CheckInput() === true) {

                param = {
                    "Action":"ApplyOtApp",
                    "otdate": ite_date,
                    "otstartdtime": $('#otstartdtime').val(),
                    "otenddtime": $('#otenddtime').val(),
                    "otreqhrs": $('#otreqhrs').val(),
                    "remarks": $('#remarks').val()
                };
                
                param = JSON.stringify(param);

                    if($('#otdateto').val() >= $('#otdate').val()){

                            swal({
                              title: "Are you sure?",
                              text: "You want to apply this overtime?",
                              icon: "info",
                              buttons: true,
                              dangerMode: true,
                            })
                            .then((applyOT) => {
                              if (applyOT) {
                                        $.ajax({
                                        type: "POST",
                                        url: "../overtime/ot_app_process.php",
                                        data: {data:param} ,
                                        success: function (data){
                                            console.log("success: "+ data);
                                            $('#popUpModal').modal('toggle');
                                            location.reload();
                                        },
                                        error: function (data){
                                            alert('error');
                                        }
                                    });//ajax

                              } else {
                                swal("Your cancel your overtime!");
                              }
                            });
                        }else{
                            swal({text:"OT date TO must be greater than OT Date From!",icon:"error"});
                        }
                 
            }
                        
      
        
    });



 $('#applyOvertime').click(function(e){
        e.preventDefault();
        $('#popUpModal').modal('toggle');

    });

});
