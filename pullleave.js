$(document).ready(function(){
    $.post("pullpendingleave.php",function(data){
    $("#employee").append(data);
    });
});