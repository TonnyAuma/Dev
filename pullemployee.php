<?php  

  include('dbconfig.php');
 $output = '<table class="table table-hover"  border="1"><tr><th>Full Name</th><th>Email</th><th>Phone Number</th><th>Employment Status</th><th>Department</th><th>Staff Number</th></tr>';  

           $sql = "SELECT FullName,Email,Phone,EmploymentStatus,Department,StaffNo FROM Employee";  
     $stmt = $db_con->query($sql);
    while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
    
     //$output .= '<div class="col-md-3"><div style="border:3px solid #ccc; padding:20px; margin-bottom:20px;">'.$row["UnitName"].'</div></div>';
     $output .='<tr><td>'.$row["FullName"].'</td><td>'.$row["Email"].'</td><td>'.$row["Phone"].'</td><td>'.$row["EmploymentStatus"].'</td><td>'.$row["Department"].'</td><td>'.$row["StaffNo"].'</td></tr>';
     }
      echo $output.'</table>';
 ?> 
 