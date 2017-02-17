<?php

require_once 'dbconfig.php';
if(isset($_POST['no']) &&  isset($_POST['status']) && isset($_POST['from']) && isset($_POST['till']) && isset($_POST['days']) && isset($_POST['reason']))
{
  $no = $_POST['no'];
  $leave = $_POST['status'];
  $from =$_POST['from'];
  $till = $_POST['till'];
  $days = $_POST['days'];
  $reason =$_POST['reason'];
  


  $stmt = $db_con->prepare("INSERT INTO leaves(StaffNo,FromDate,TillDate,Type,Reason,Days) VALUES(:no, :frdate, :to, :type, :reason, :days)");       
  $stmt->bindParam(":no",$no);
  $stmt->bindParam(":frdate",$from);
  $stmt->bindParam(":to",$till);
  $stmt->bindParam(":type",$leave);
  $stmt->bindParam(":reason",$reason);
 $stmt->bindParam(":days",$days);

  if($stmt->execute())
  {
   echo "Data Uploaded";
 }
 else
 {
   echo "Error Uploading Data !";
 }
}else{
  echo "fill the damn things";
}

?>
