<?php 
session_start();
$user=$_SESSION['user_session']; 
 //load_data.php  
  include('dbconfig.php');
 $output = '<table class="table table-hover"  border="1"><tr><th>Staff Name</th><th>Leave Type</th><th>From</th><th>Till</th><th>Days</th><th>Reason</th><th>Status</th></tr>';  

           $sql = "SELECT StaffName,Type,FromDate,TillDate,Days,Reason,ApprovedHr FROM leaves WHERE ApprovedHr='Approved'";  
     $stmt = $db_con->query($sql);
//if ($stmt->fetchColumn() > 0){
    
    while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
    
     //$output .= '<div class="col-md-3"><div style="border:3px solid #ccc; padding:20px; margin-bottom:20px;">'.$row["UnitName"].'</div></div>';
     $output .='<tr><td>'.$row["StaffName"].'</td><td>'.$row["Type"].'</td><td>'.$row["FromDate"].'</td><td>'.$row["TillDate"].'</td><td>'.$row["Days"].'</td><td>'.$row["Reason"].'</td><td>'.$row["ApprovedHr"].'</td></tr>';
     }
      echo $output.'</table>';
 ?> 
 