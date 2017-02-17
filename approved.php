<?php

require_once 'dbconfig.php';

if(isset($_POST['id']) && isset($_POST['leave']) && isset($_POST['staffno']))
{
  $leave = $_POST['leave'];
  $no= $_POST['staffno'];
  $me = $_POST['id'];

if(strcmp($me,"Approve")==0){
  $stmt = $db_con->prepare("UPDATE leaves SET ApprovedHr='Approved'  WHERE StaffNo=:no AND Type=:type");       
  $stmt->bindParam(":no",$no);
  $stmt->bindParam(":type",$leave);
  if($stmt->execute())
  {
   echo "Leave Has been Approved";
 }
 else
 {
   echo "Error Updating Data !";
 }
}else if(strcmp($me,"Reject")==0){
   $stmt = $db_con->prepare("UPDATE leaves SET ApprovedHr='Rejected'  WHERE StaffNo=:no AND Type=:type");       
  $stmt->bindParam(":no",$no);
  $stmt->bindParam(":type",$leave);
  if($stmt->execute())
  {
   echo "Leave Has been Rejected";
 }
 else
 {
   echo "Error Updating Data !";
 } 
}
}else{
  echo "data not well captured";
}

?>
