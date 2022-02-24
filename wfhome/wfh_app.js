 var pdfFile;

function GetWfhFile() {
    var selectedfile = document.getElementById("attachment").files;
    if (selectedfile.length > 0) {
        var uploadedFile = selectedfile[0];
        var fileReader = new FileReader();
        var fl = uploadedFile.name;

        fileReader.onload = function (fileLoadedEvent) {
            var srcData = fileLoadedEvent.target.result;
            pdfFile =  fl;
        }
        fileReader.readAsDataURL(uploadedFile);
    }
}


function uploadFile() {

   var files = document.getElementById("attachment").files;

   if(files.length > 0 ){

      var formData = new FormData();
      formData.append("file", files[0]);

      var xhttp = new XMLHttpRequest();


      xhttp.open("POST", "ajaxfile.php", true);

      xhttp.onreadystatechange = function() {
         if (this.readyState == 4 && this.status == 200) {

           var response = this.responseText;
           if(response == 1){
              alert("Upload successfully.");
           }else{
              alert("File not uploaded.");
           }
         }
      };

      // Send request with data
      xhttp.send(formData);

   }else{
      // alert("Please select a file");
   }

}


 $(function(){

   
    function CheckInput() {

        var inputValues = [];

        inputValues = [
            
            $('#remarks'),
            
        ];

        var result = (CheckInputValue(inputValues) === '0') ? true : false;
        return result;
    }


            $('#wfhdateto').change(function(){

                if($('#wfhdateto').val() < $('#wfhdate').val()){

                    alert('`WFH Date To` must be greater than `WFH Date From`');

                    var input2 = document.getElementById('wfhdateto');
                    input2.value = $('#wfhdate').val();
                }else{
                    // alert('Error');
                }   


            });

$('#Submit').click(function(){

 
            var dte = $('#wfhdate').val();
            var dte_to = $('#wfhdateto').val();

            dateArr = []; 

            var start = new Date(dte);
            var date = new Date(dte_to);
            var end = date.setDate(date.getDate() + 1);

            while(start < end){
               dateArr.push(moment(start).format('MM-DD-YYYY'));
               var newDate = start.setDate(start.getDate() + 1);
               start = new Date(newDate);  
            }

            const ite_date = dateArr.length === 0  ? dte : dateArr ;


            if (CheckInput() === true) {

                param = {
                    "Action":"ApplyWfhApp",
                    "wfhdate": ite_date,
                    "remarks": $('#remarks').val(),
                    "attachment": pdfFile
                };
                
                param = JSON.stringify(param);

                    
                    if($('#wfhdateto').val() >= $('#wfhdate').val()){
                        
                        swal({
                          title: "Are you sure?",
                          text: "You want to apply this work from home?",
                          icon: "success",
                          buttons: true,
                          dangerMode: true,
                        })
                        .then((applyWfh) => {
                          if (applyWfh) {
                                    $.ajax({
                                        type: "POST",
                                        url: "../wfhome/wfh_app_process.php",
                                        data: {data:param} ,
                                        success: function (data){
                                            console.log("success: "+ data);
                                            $('#popUpModal').modal('toggle');
                                            location.reload();
                                        },
                                        error: function (data){
                                            swal('error');
                                        }
                                    });//ajax
                          } else {
                            swal("Your cancel your work from home!");
                          }
                        });

                    }else{
                        swal({text:"WFH Date TO must be greater than WFH Date From!",icon:"error"});
                    }
 
            }

      
    });



 $('#applyWfh').click(function(e){
        e.preventDefault();
        $('#popUpModal').modal('toggle');

    });

});
