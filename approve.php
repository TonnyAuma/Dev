<!DOCTYPE html>
<html>
<head>
	<script>
		$(document).ready(function(){
			$("#clickme").change(function(){
				var id=$("#clickme").val();
				var leave=document.getElementById("t").innerHTML;
				var staffno=document.getElementById("no").innerHTML;

				if (id==="Leave Status") {
				
					window.location.href = "hrleavestatus.php?no="+staffno;
				}

				$.post($("#myForm").attr("action"),{id:id,leave:leave,staffno:staffno},function(info){
					$("#res").html(info).fadeIn();
					
				});
			});
		}); 
	</script>
</head>
<body>

</body>
</html>

<?php  
 //load_data.php  
include('dbconfig.php');
$output = '<form method="post" id="myForm" action="approved.php"><table class="table table-hover"  border="1"><tr><th>Staff Number</th><th>Staff Name</th><th>Leave Type</th><th>From</th><th>Till</th><th>Days</th><th>Reason</th><th>Date Created</th><th>Actions</th></tr>';  

$sql = "SELECT StaffNo,StaffName,Type,FromDate,TillDate,Days,Reason,datecreated FROM leaves WHERE ApprovedHr='0'";  
$stmt = $db_con->query($sql);
//if ($stmt->fetchColumn() > 0){

while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {

     //$output .= '<div class="col-md-3"><div style="border:3px solid #ccc; padding:20px; margin-bottom:20px;">'.$row["UnitName"].'</div></div>';
	$output .='<tr><td id="no">'.$row["StaffNo"].'</td><td id="name">'.$row["StaffName"].'</td><td id="t">'.$row["Type"].'</td><td>'.$row["FromDate"].'</td><td>'.$row["TillDate"].'</td><td>'.$row["Days"].'</td><td>'.$row["Reason"].'</td><td>'.$row["datecreated"].'</td><td><select id="clickme"><option>Select Option</option><option>Approve</option><option>Reject</option><option>Edit</option><option>Leave Status</option></select></td></tr>';
}
echo $output.'</table></form>';
?> 
