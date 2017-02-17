$(document).ready(function(){
    $.post("approve.php",function(data){
    $("#employee").append(data);
    });
   $("#clickme").change(function(){
       alert("clicked");
    });
    }); 
