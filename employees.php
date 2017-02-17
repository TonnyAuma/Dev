<?php

session_start();

if(!isset($_SESSION['user_session']))
{
 header("Location: login.php");
}

include_once 'dbconfig.php';

$stmt = $db_con->prepare("SELECT * FROM login WHERE username=:uid");
$stmt->execute(array(":uid"=>$_SESSION['user_session']));
$row=$stmt->fetch(PDO::FETCH_ASSOC);

$stmt1 = $db_con->prepare("SELECT FullName FROM employee WHERE StaffNo=:uid");
$stmt1->execute(array(":uid"=>$_SESSION['user_session']));
$row1=$stmt1->fetch(PDO::FETCH_ASSOC);


?>
<!DOCTYPE html>
<html>
<head>
 <meta charset="utf-8">
 <title>Login Form</title>

 <link rel="stylesheet" type="text/css" href="index.css">
 
 <link rel="stylesheet" type="text/css" href="js/jquery-ui.css">
 <script type="text/javascript" src="jquery.js"></script>
 <script src="js/jquery-ui.js"></script>
 <script type="text/javascript" src="applyleave.js"></script>
</head>
<body>
  <div id="title">
    <nav>
      <a href="employees.php">Apply Leave</a> 
      <a  href="leavestatus.php">Leave Status</a> 
      <a href="employeeapprovedleave.php">Approved Leaves History</a> 
      <a href="pendingleave.php">Leaves Due for Approval</a>
       <a href="staffonleave.php">Staff on Leave</a>
       <a href="signout.php">Sign Out</a>
    </nav>
  </div>
  <div class="wrapper"> 
    <form class="form-style-9" id="myForm" action="" method="post" enctype="multipart/form-data">
      <fieldset><br/>
        <legend>Apply For Leave:</legend>
        <ul>
        <li>
            <div id="fullname" class="field-style"><?php echo $row1['FullName']; ?> </div>
          </li>
          <li>
            <input type="text" id="no" name="no" value=<?php echo $row['username']; ?> class="field-style field-split align-left" placeholder="Employee Number"  readonly="true" />
         
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<select name="status" id="leave"  class="field-style field-split align-right">
            <option>Leave Type</option>
            <option>Annual Leave</option>
            <option>Compasionate Leave</option>
            <option>Forgot Leave</option>
            <option>Offsite Leave</option>
            <option>Paternity Leave</option>
            <option>Sick Leave</option>
            <option>Unpaid Leave</option>

            </select>
          </li>
          <li>
           <input type="text" id="from" name="from" class="field-style field-split align-left" placeholder="Leave From" />
          <input type="text" id="till" name="till" class="field-style field-split align-right" placeholder="Leave Till" />
          </li>
          <li>
            <input type="text" id="days" name="days"  class="field-style field-split align-left" placeholder="Days" readonly="true" />
          
          </li>
          <li>
            <textarea name="reason" class="field-style" placeholder="Reason or Remarks"></textarea>
          </li>
          <li>
          <div id="error" class="field-style field-split align-left"></div>
        <input type="submit" id="view" class="field-style field-split align-right size" value="Apply Leave" />&nbsp;&nbsp;&nbsp;
        <input type="reset" id="view" class="field-style field-split align-right size" value="Reset" />
        </li>
       
        </ul>
      </fieldset>
      <hr/>
  </form>
</div>

</body>
</html>

