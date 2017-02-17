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

?>
<!DOCTYPE html>
<html>
<head> 
 <meta charset="utf-8">
 <title>Login Form</title>

 <link rel="stylesheet" type="text/css" href="index.css">
 <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
 <link rel="stylesheet" type="text/css" href="js/jquery-ui.css">
 <script type="text/javascript" src="jquery.js"></script>
 <script src="js/jquery-ui.js"></script>
 <script type="text/javascript" src="index.js"></script>
</head>
<body>
  <div id="title">
    <nav>
      <a href="index.php">Add Employee</a> 
      <a  href="employee.php">View All Employees</a> 
      <a href="approveleave.php">Aprrove Leaves</a> 
      <a href="EmployeesOnLeave.php">Employees on Leave</a>
      <a href="signout.php">Sign Out</a>
    </nav>
  </div>
  <div class="wrapper"> 
    <form class="form-style-9" id="myForm" action="" method="post" enctype="multipart/form-data">
      <fieldset><br/>
        <legend>Personal Information:</legend>
        <ul>
          <li>
            <input type="text" id="name" name="name" class="field-style field-split align-left" placeholder="Name" />
            <input type="email" id="email" name="email" class="field-style field-split align-right" placeholder="Email" />
          </li>
          <li>
            <input type="text" id="phone" name="phone" class="field-style field-split align-left" placeholder="Phone" />
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<select name="status" id="status" name="status" class="field-style field-split align-right"><option>Marital Status</option><option>Single</option><option>Married</option></select>
          </li>
          <li>
            <input type="text" id="residence" name="residence"  class="field-style field-split align-left" placeholder="Residence" />
            <input type="file" id="image" name="image" class="field-style field-split align-right" />
          </li>
          <li>
            <input type="text" id="dob" name="dob" class="field-style field-split align-left" placeholder="Date of Birth" />
            <input type="text" id="djoin" name="djoin" class="field-style field-split align-right" placeholder="Date of Joining" />
          </li>
        </ul>
      </fieldset>
      <hr/>
      <fieldset><br/>
        <legend>Employment Information:</legend>
        <ul>
          <li>
            <input type="text" id="staffno" name="staffno" class="field-style field-split align-left" placeholder="Employment Number Assigned" />
            <input type="text" name="title" id="titles" class="field-style field-split align-right" placeholder="Job Title" />

          </li>
          <li>
            <input type="text" id="dpt" name="dpt" class="field-style field-split align-left" placeholder="Department" />
            <input type="text" id="to"  name="to" class="field-style field-split align-right" placeholder="Reporting to" />
          </li>
          <li>
           <input type="text" id="nssf" name="nssf" class="field-style field-split align-left" placeholder="Nssf" />
           <input type="text" id="nhif" name="nhif"  class="field-style field-split align-right" placeholder="Nhif" />
         </li>
         <li>
           <input type="text" id="kra" name="kra" class="field-style field-split align-left" placeholder="KRA Pin" />
           <input type="text" id="id" name="id" class="field-style field-split align-right" placeholder="National Id" />
         </li>
         <li>
          <select id="active" name="active"  class="field-style field-split align-right"> <option>Employment Status</option><option>Active</option><option>Dismissed</option><option>Retired</option></select>
        </li>
        <li>
        <input type="submit" id="view" value="Add Employee" />
          <input type="reset" id="btnsubmit"  value="Reset"/>
        </li>
        <li>
          <div id="error"></div>
        </li>
      </ul>
    </fieldset>
  </form>
</div>

</body>
</html>

