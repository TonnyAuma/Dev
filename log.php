<?php  
session_start();
include('dbconfig.php');
$output = '';  
try
{ 

 if(isset($_POST["uname"]) && isset($_POST["pass"]) && isset($_POST["logas"]))  
 { 
   $user=$_POST["uname"];
   $password=$_POST["pass"];
   $log=$_POST["logas"]; 

   $sql = $db_con->prepare("SELECT * FROM login WHERE username =:uname and password=:pass and logas=:log");
   $sql->execute(array(':uname' => $user,'pass'=> $password,'log'=> $log));
   $row = $sql->fetchAll(PDO::FETCH_ASSOC);
   if(count($row)>0)
   {
    $_SESSION['user_session'] = $user;
      echo 1;

   }else{
    echo "User Credentials are not valid";
  }

  echo $output;  

}else{
  echo "Field Name Not Set";
}
}
catch(PDOException $e){
 echo $e->getMessage();
}  
?> 

