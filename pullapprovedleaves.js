$(document).ready(function(){
    $.post("approvedemployeeleave.php",function(data){
    $("#employee").append(data);
    });
});