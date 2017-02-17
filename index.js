$(document).ready(function (e) {

  $("#error").hide();
  $("#myForm").on('submit',(function(e) {
    e.preventDefault();
    $.ajax({
     url: "inndex.php",
     type: "POST",
     data:  new FormData(this),
     contentType: false,
     cache: false,
     processData:false,
     beforeSend : function()
     {
    //$("#preview").fadeOut();
    $("#error").fadeOut();
    $("error").hide();
  },
  success: function(data)
  {
    $("#error").html(data).fadeIn();

    if(data=='Data Uploaded')
    {
     // invalid file format.
     $("#error").html().fadeIn();
   }
   else
   {
     /* view uploaded file.
     $("#preview").html(data).fadeIn();
     $("#myForm")[0].reset(); */
   }
 },
 error: function(e) 
 {
  $("#error").html(e).fadeIn();
}          
});
    return false;
  }));
  /*date picker js

  $( "#from" ).datepicker({
   beforeShowDay : function (date)
   {
    var dayOfWeek = date.getDay ();
                  // 0 : Sunday, 1 : Monday, ...
                  if (dayOfWeek == 0 || dayOfWeek == 6) return [false];
                  else return [true];
                }
              });


  $( "#till" ).datepicker({
   beforeShowDay : function (date)
   {
    var dayOfWeek = date.getDay ();
                  // 0 : Sunday, 1 : Monday, ...
                  if (dayOfWeek == 0 || dayOfWeek == 6) return [false];
                  else return [true];
                  var start = $("#from").get("getDate");
                  var end = $("#till").datepicker("getDate");
                  var days = (end - start) / (1000 * 60 * 60 * 24);
                  alert(days);
                  $("#days").val(days);
                }
              });*/




              /*date picker getting the differences between dates */

 $( function() {
    $( "#dob" ).datepicker();
  } );
$("#djoin").datepicker({
  minDate: 0,
  maxDate: '+1Y+6M',
  onSelect: function (dateStr) {
        var min = $(this).datepicker('getDate'); // Get selected date
        $("#till").datepicker('option', 'minDate', min || '0'); // Set other min, default to today
      }
    });


$("#from").datepicker({
  minDate: 0,
  maxDate: '+1Y+6M',
  onSelect: function (dateStr) {
        var min = $(this).datepicker('getDate'); // Get selected date
        $("#till").datepicker('option', 'minDate', min || '0'); // Set other min, default to today
      }
    });

$("#till").datepicker({
  minDate: '0',
  maxDate: '+1Y+6M',
  onSelect: function (dateStr) {
        var max = $(this).datepicker('getDate'); // Get selected date
        $('#datepicker').datepicker('option', 'maxDate', max || '+1Y+6M'); // Set other max, default to +18 months
        var start = $("#from").datepicker("getDate");
        var end = $("#till").datepicker("getDate");
        var days = (end - start) / (1000 * 60 * 60 * 24);
        $("#days").val(days);
      }
    });

});
$("#view").click(function(){
  alert("nope");
  $("employee").show();
  $.post("pullemployee.php")
  .done(function(data){
    $('#employee').html(data);

  });
});


