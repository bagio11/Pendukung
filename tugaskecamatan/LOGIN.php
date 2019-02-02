<?php require_once('Connections/kecamatan.php'); ?><?php
// *** Validate request to login to this site.
if (!isset($_SESSION)) {
  session_start();
}

$loginFormAction = $_SERVER['PHP_SELF'];
if (isset($_GET['accesscheck'])) {
  $_SESSION['PrevUrl'] = $_GET['accesscheck'];
}

if (isset($_POST['textfield'])) {
  $loginUsername=$_POST['textfield'];
  $password=$_POST['textfield2'];
  $MM_fldUserAuthorization = "";
  $MM_redirectLoginSuccess = "satu.php";
  $MM_redirectLoginFailed = "LOGIN.php";
  $MM_redirecttoReferrer = false;
  mysql_select_db($database_kecamatan, $kecamatan);
  
  $LoginRS__query=sprintf("SELECT NIK, Nama FROM input WHERE NIK='%s' AND Nama='%s'",
    get_magic_quotes_gpc() ? $loginUsername : addslashes($loginUsername), get_magic_quotes_gpc() ? $password : addslashes($password)); 
   
  $LoginRS = mysql_query($LoginRS__query, $kecamatan) or die(mysql_error());
  $loginFoundUser = mysql_num_rows($LoginRS);
  if ($loginFoundUser) {
     $loginStrGroup = "";
    
    //declare two session variables and assign them
    $_SESSION['MM_Username'] = $loginUsername;
    $_SESSION['MM_UserGroup'] = $loginStrGroup;	      

    if (isset($_SESSION['PrevUrl']) && false) {
      $MM_redirectLoginSuccess = $_SESSION['PrevUrl'];	
    }
    header("Location: " . $MM_redirectLoginSuccess );
  }
  else {
    header("Location: ". $MM_redirectLoginFailed );
  }
}
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Untitled Document</title>
<style type="text/css">
<!--
body {
	background-color: #003399;
}
-->
</style></head>

<body>
<form id="form1" name="form1" method="POST" action="<?php echo $loginFormAction; ?>">
  <p align="center">LOGIN</p>
  <p align="center"><img src="KotaBandung.png" width="285" height="184" /></p>
  <p align="center">USERNAME 
    <label>
    <input type="text" name="textfield" />
    </label>
  </p>
  <p align="center">PASSWORD  
    <label>
    <input type="text" name="textfield2" />
    </label>
  </p>
  <p align="center">
    <label>
    <input type="submit" name="Submit" value="LOGIN" />
    </label>
  </p>
</form>
</body>
</html>
