$(document).ready(function(){
    $.post("pullemployee.php",function(data){
    $("#employee").append(data);
    });
});