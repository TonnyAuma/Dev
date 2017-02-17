<?php  


session_start();

if(!isset($_SESSION['user_session']))
{
 header("Location: login.php");
}

include_once 'dbconfig.php';

$stmts = $db_con->prepare("SELECT * FROM login WHERE username=:uid");
$stmts->execute(array(":uid"=>$_SESSION['user_session']));
$row8=$stmts->fetch(PDO::FETCH_ASSOC);

$staffno=$_GET['no'];


$sql = "SELECT *  FROM leavetypes";  
$stmt = $db_con->query($sql);
//if ($stmt->fetchColumn() > 0){
$annual=0;
$comp=0;
$patternity=0;
$sick=0;
$unpaid=0;
while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {


	$type=$row["Type"];
	if($type=="Annual Leave"){
		$annual=$row["Days"];
	}else if($type=="Compassion Leave"){
		$comp=$row["Days"];
	}else if($type=="Patternity Leave"){
		$patternity=$row["Days"];
	}else if($type=="Sick Leave"){
		$sick=$row["Days"];
	}else if($type=="Unpaid Leave"){
		$unpaid=$row["Days"];
	}


}

$annualcons=0;
$sqla = "SELECT sum(Days) AS SUMANN  FROM leaves where Type='Annual Leave' AND StaffNo='$staffno' and ApprovedHr='Approved'";  
$stmta = $db_con->query($sqla);
while ($row = $stmta->fetch(PDO::FETCH_ASSOC)) {
	$annualcons=$row["SUMANN"];
}

$compa=0;
$sqlb = "SELECT sum(Days) AS SUMANN  FROM leaves where Type='Compassion Leave' AND StaffNo='$staffno' and ApprovedHr='Approved'";  
$stmtb = $db_con->query($sqlb);
while ($row = $stmtb->fetch(PDO::FETCH_ASSOC)) {
	$compa=$row["SUMANN"];
}

$pat=0;
$sqlc = "SELECT sum(Days) AS SUMANN  FROM leaves where Type='Patternity Leave' AND StaffNo='$staffno' and ApprovedHr='Approved'";  
$stmtc = $db_con->query($sqlc);
while ($row = $stmtc->fetch(PDO::FETCH_ASSOC)) {
	$pat=$row["SUMANN"];
}
$sic=0;
$sqld = "SELECT sum(Days) AS SUMANN  FROM leaves where Type='Sick Leave' AND StaffNo='$staffno' and ApprovedHr='Approved'";  
$stmtd = $db_con->query($sqld);
while ($row = $stmtd->fetch(PDO::FETCH_ASSOC)) {
	$sic=$row["SUMANN"];
}
$un=0;
$sqle = "SELECT sum(Days) AS SUMANN  FROM leaves where Type='Unpaid Leave' AND StaffNo='$staffno' and ApprovedHr='Approved'";  
$stmte = $db_con->query($sqle);
while ($row = $stmte->fetch(PDO::FETCH_ASSOC)) {
	$un=$row["SUMANN"];
}

$annualbal=$annual-$annualcons;
$compassionbal=$comp-$compa;
$patbal=$patternity-$pat;
$sicbal=$sick-$sic;
$unpaidbal=$unpaid-$un;

?>
<!DOCTYPE html>
<html>
<head>
	<title>Leave Status</title>
	<link rel="stylesheet" type="text/css" href="index.css">
	<style>
		table, th, td {
			border: 1px solid black;
			border-collapse: collapse;
		}
		th, td {
			padding: 15px;
		}
	</style>
</head>
<body>
	<div id="title">
  <nav>
      <a href="employees.php">Apply Leave</a> 
      <a  href="leavestatus.php">Leave Status</a> 
      <a href="">Approved Leaves History</a> 
      <a href="pendingleave.php">Leaves Due for Approval</a>
       <a href="">Staff on Leave</a>
       <a href="signout.php">Sign Out</a>
    </nav>
	</div>
	<div class="wrapper"> 


		<table border="1" style="width:100%">
			<tr><th>Leave Type</th><th>Total Leave</th><th>Consumed Leaves</th><th>Balance</th></tr>

			<tr>
				<td>Annual Leave</td>
				<td><?php echo $annual;?></td>
				<td><?php echo $annualcons;?></td>
				<td><?php echo $annualbal; ?></td>
			</tr>

			<tr>

				<td>Compassion Leave</td>
				<td><?php echo $comp;?></td>
				<td><?php echo $compa;?></td>
				<td><?php echo $compassionbal; ?></td>

			</tr>


			<tr>

				<td>Patternity Leave</td>
				<td><?php echo $patternity;?></td>
				<td><?php echo $pat;?></td>
				<td><?php echo $patbal; ?></td>

			</tr>


			<tr>

				<td>Sick Leave</td>
				<td><?php echo $sick;?></td>
				<td><?php echo $sic;?></td>
				<td><?php echo $sicbal; ?></td>

			</tr>


			<tr>

				<td>Unpaid Leave</td>
				<td><?php echo $unpaid;?></td>
				<td><?php echo $un;?></td>
				<td><?php echo $unpaidbal; ?></td>

			</tr>

		</table>
	</body>
	</html>


