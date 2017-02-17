<?php

$valid_extensions = array('png', 'jpeg', 'jpg', 'gif'); // valid extensions that are allowed
$path = 'uploads/'; // upload directory

if(isset($_FILES['image']))
{
 $img = $_FILES['image']['name'];
 $tmp = $_FILES['image']['tmp_name'];

 // get uploaded file's extension
 $ext = strtolower(pathinfo($img, PATHINFO_EXTENSION));
 
 // can upload same image using rand function
 $final_image =$img;
 
 // check's valid format
 if(in_array($ext, $valid_extensions)) 
 {     
  $path = $path.strtolower($final_image); 

  if(move_uploaded_file($tmp,$path)) 
  {

  }
} 
else 
{
  echo 'invalid file';
}

}

require_once 'dbconfig.php';
if(isset($_POST['name']) &&  isset($_POST['email']) && isset($_POST['phone']) && isset($_POST['status']) && isset($_POST['residence']) && isset($_POST['dob']) && isset($_POST['djoin']) && isset($_POST['staffno']) && isset($_POST['title']) && isset($_POST['dpt']) && isset($_POST['to']) && isset($_POST['nssf'])&& isset($_POST['nhif']) && isset($_POST['kra']) && isset($_POST['id']) && isset($_POST['active']))
{
  $name = $_POST['name'];
  $email = $_POST['email'];
  $phone =$_POST['phone'];
  $mstatus = $_POST['status'];
  $residence = $_POST['residence'];
  $dob =$_POST['dob'];
  $djoin = $_POST['djoin'];
  $staffno = $_POST['staffno'];
  $title =$_POST['title'];
  $dpt = $_POST['dpt'];
  $to = $_POST['to'];
  $nssf =$_POST['nssf'];
  $nhif = $_POST['nhif'];
  $kra = $_POST['kra'];
  $id =$_POST['id'];
  $active = $_POST['active'];
  $pass="12345";
  $as="Employee";


  $stmt = $db_con->prepare("INSERT INTO Employee(Fullname,Email,Phone,MaritalStatus,Residence,DOB,JoiningDate,StaffNo,JobTitle,Department,ReportTo,NSSF,NHIF,KRA,NationalID,EmploymentStatus,Photo) VALUES(:fname, :email, :phone, :mstatus, :res, :dob, :jdate, :sno, :jt, :dpt, :Rto, :nssf, :nhif, :kra, :nid, :estatus, :photo)");       
  $stmt->bindParam(":fname",$name);
  $stmt->bindParam(":email",$email);
  $stmt->bindParam(":phone",$phone);
  $stmt->bindParam(":mstatus",$mstatus);
  $stmt->bindParam(":res",$residence);
  $stmt->bindParam(":dob",$dob);
  $stmt->bindParam(":jdate",$djoin);
  $stmt->bindParam(":sno",$staffno);
  $stmt->bindParam(":jt",$title);

  $stmt->bindParam(":dpt",$dpt);
  $stmt->bindParam(":Rto",$to);
  $stmt->bindParam(":nssf",$nssf);
  $stmt->bindParam(":nhif",$nhif);

  $stmt->bindParam(":kra",$kra);
  $stmt->bindParam(":nid",$id);
  $stmt->bindParam(":estatus",$active);
  $stmt->bindParam(":photo",$path);

  if($stmt->execute())
  {

  $stmt = $db_con->prepare("INSERT INTO login(Username,password,logas) VALUES(:u,:p,:l)");       
  $stmt->bindParam(":u",$staffno);
  $stmt->bindParam(":p",$pass);
  $stmt->bindParam(":l",$as);

  if($stmt->execute())
  {

   echo "Data Uploaded";
 }
 }
 else
 {
   echo "Error Uploading Data !";
 }
}else{
  echo "fill the damn things";
}

?>
