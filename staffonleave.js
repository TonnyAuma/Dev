$(document).ready(function(){
    $.post("staffsonleave.php",function(data){
    $("#employee").append(data);
    });
});