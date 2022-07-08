$(function(){

    // function XLSXExport(){
    //     $("#empDtrList").tableExport({
    //         headers: true,
    //         footers: true,
    //         formats: ['xlsx'],
    //         filename: 'employeedtr',
    //         bootstrap: false,
    //         exportButtons: true,
    //         position: 'top',
    //         ignoreRows: null,
    //         ignoreCols: null,
    //         trimWhitespace: true,
    //         RTL: false,
    //         sheetname: 'Attendance List'
    //     });
    // }

$('#search').click(function(e){
    e.preventDefault();
     document.getElementById("myDiv").style.display="block";

    param = {
        "Action":"GetEmployeeAttendannce",
        "dateFrom":$('#dateFrom').val(),
        "dateTo":$('#dateTo').val(),
        "empCodeParam":$('#empCode').val()

    };
    
    param = JSON.stringify(param);
    
    $.ajax({
        type: "POST",
        url: "../dtr/dtr-viewing-process.php",
        data: {data:param} ,
        success: function (data){
            // console.log("success: "+ data);
            // console.log("success: "+ data);
            $('#empDtrList').remove();      
            $('#btnExport').remove();
            $('#dtrViewList').append(data);  
             document.getElementById("myDiv").style.display="none";
        },
        error: function (data){
            // console.log("error: "+ data);	
             document.getElementById("myDiv").style.display="none";
        }
    });//ajax


});
    
});