<?php  
 //load_data.php  
include('dbconfig.php');
$output = '<table class="table table-hover" border="1"><tr><th>Employee Name</th><th>Posting/Department</th><th>Leave Type</th><th>From</th><th>Till</th><th>Status</th></tr>';  

$sql = 'SELECT e.FullName,e.Department,Type,FromDate,TillDate,ApprovedHr FROM leaves l  JOIN employee e WHERE l.StaffNo=e.StaffNo';  
$stmt = $db_con->query($sql);
//if ($stmt->fetchColumn() > 0){

while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
	$Status="";
	if($row["ApprovedHr"]==1){
		$Status="Approved";
	}else{
		$Status="Waiting Approval";
	}

     //$output .= '<div class="col-md-3"><div style="border:3px solid #ccc; padding:20px; margin-bottom:20px;">'.$row["UnitName"].'</div></div>';
	$output .='<tr><td>'.$row["FullName"].'</td><td>'.$row["Department"].'</td><td>'.$row["Type"].'</td><td>'.$row["FromDate"].'</td><td>'.$row["TillDate"].'</td><td>'.$Status.'</td></tr></table>';
}
echo $output;
?> 
