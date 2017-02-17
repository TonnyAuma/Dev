<!DOCTYPE html>
<html>
<head> 
 <meta charset="utf-8">
<title>Login Form</title>
    <link rel="stylesheet" type="text/css" href="css/styles.css">
</head>
<body>
<div class="wrapper">

  <div class="imgcontainer">
    <img src="images/login.png" alt="Login" class="avatar">
  </div>

  <div class="container">
    <label><b>Username</b></label>
    <input type="text" placeholder="Enter Username" name="uname" id="uname" required>

    <label><b>Password</b></label>
    <input type="password" placeholder="Enter Password" name="pass" id="pass" required>

    <label><b>Login As</b></label>
    <select name="logas" id="logas">
        <option>Employee</option>
        <option>Manager</option>
        <option>Hr</option>
    </select>
        
    <button type="submit" id="btnlogin" name="btnlogin">Login</button>
    <input type="checkbox" checked="checked"> Remember me
  </div>
  <div class="container" style="background-color:#f1f1f1">
  <div id="result">
    <!--<button type="button" class="cancelbtn">Cancel</button>
    </div><span class="psw">Forgot <a href="#">password?</a></span>-->
  </div>
</div>
<script type="text/javascript" src="jquery.js"></script>
 <script type="text/javascript" src="login.js"> </script>
</body>
</html>

