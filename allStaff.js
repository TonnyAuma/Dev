$(document).ready(function(){
    $.post("allStaffs.php",function(data){
    $("#employee").append(data);
    });
});