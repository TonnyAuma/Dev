
$("#btnlogin").click(function(){
	var uname = $("#uname").val();
	var pass = $("#pass").val();
	var logas = $("#logas").val();
	
	$.post("log.php",{uname:uname,pass:pass,logas:logas})
	.done(function(data){
		
		if(data=1 && logas==="Employee"){
			setTimeout('window.location.href = "employees.php";',3000);
		}else if(data=1 && logas==="Hr"){
			setTimeout('window.location.href = "index.php";',3000);
		}else{
			$('#result').html(data);
		}
	});
});