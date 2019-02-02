<?php require_once('Connections/kecamatan.php'); ?>
<?php
function GetSQLValueString($theValue, $theType, $theDefinedValue = "", $theNotDefinedValue = "") 
{
  $theValue = (!get_magic_quotes_gpc()) ? addslashes($theValue) : $theValue;

  switch ($theType) {
    case "text":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;    
    case "long":
    case "int":
      $theValue = ($theValue != "") ? intval($theValue) : "NULL";
      break;
    case "double":
      $theValue = ($theValue != "") ? "'" . doubleval($theValue) . "'" : "NULL";
      break;
    case "date":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;
    case "defined":
      $theValue = ($theValue != "") ? $theDefinedValue : $theNotDefinedValue;
      break;
  }
  return $theValue;
}

$editFormAction = $_SERVER['PHP_SELF'];
if (isset($_SERVER['QUERY_STRING'])) {
  $editFormAction .= "?" . htmlentities($_SERVER['QUERY_STRING']);
}

if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "form2")) {
  $insertSQL = sprintf("INSERT INTO input (`No KK`, NIK, Nama, `Tempat Tanggal Lahir`, `Jenis Kelamin`, `Golongan Darah`, Alamat, RT/RW, Kel/Desa, Kecamatan, Agama, `Status Perkawinan`, Kewarganegaraan, `Status Keluarga`, Pekerjaan, `Penghasilan Perbulan`) VALUES (%s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s)",
                       GetSQLValueString($_POST['No_KK'], "text"),
                       GetSQLValueString($_POST['NIK'], "text"),
                       GetSQLValueString($_POST['Nama'], "text"),
                       GetSQLValueString($_POST['Tempat_Tanggal_Lahir'], "date"),
                       GetSQLValueString($_POST['Jenis_Kelamin'], "text"),
                       GetSQLValueString($_POST['Golongan_Darah'], "text"),
                       GetSQLValueString($_POST['Alamat'], "text"),
                       GetSQLValueString($_POST['RTRW'], "text"),
                       GetSQLValueString($_POST['KelDesa'], "text"),
                       GetSQLValueString($_POST['Kecamatan'], "text"),
                       GetSQLValueString($_POST['Agama'], "text"),
                       GetSQLValueString($_POST['Status_Perkawinan'], "text"),
                       GetSQLValueString($_POST['Kewarganegaraan'], "text"),
                       GetSQLValueString($_POST['Status_Keluarga'], "text"),
                       GetSQLValueString($_POST['Pekerjaan'], "text"),
                       GetSQLValueString($_POST['Penghasilan_Perbulan'], "text"));

  mysql_select_db($database_kecamatan, $kecamatan);
  $Result1 = mysql_query($insertSQL, $kecamatan) or die(mysql_error());
}

if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "form3")) {
  $insertSQL = sprintf("INSERT INTO input (`No KK`, NIK, Nama, `Tempat Tanggal Lahir`, `Jenis Kelamin`, `Golongan Darah`, Alamat, `RT RW`, Kelurahan, Kecamatan, Agama, `Status Perkawinan`, Kewarganegaraan, `Status Keluarga`, Pekerjaan, `Penghasilan Perbulan`) VALUES (%s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s)",
                       GetSQLValueString($_POST['No_KK'], "text"),
                       GetSQLValueString($_POST['NIK'], "text"),
                       GetSQLValueString($_POST['Nama'], "text"),
                       GetSQLValueString($_POST['Tempat_Tanggal_Lahir'], "text"),
                       GetSQLValueString($_POST['Jenis_Kelamin'], "text"),
                       GetSQLValueString($_POST['Golongan_Darah'], "text"),
                       GetSQLValueString($_POST['Alamat'], "text"),
                       GetSQLValueString($_POST['RT_RW'], "text"),
                       GetSQLValueString($_POST['Kelurahan'], "text"),
                       GetSQLValueString($_POST['Kecamatan'], "text"),
                       GetSQLValueString($_POST['Agama'], "text"),
                       GetSQLValueString($_POST['Status_Perkawinan'], "text"),
                       GetSQLValueString($_POST['Kewarganegaraan'], "text"),
                       GetSQLValueString($_POST['Status_Keluarga'], "text"),
                       GetSQLValueString($_POST['Pekerjaan'], "text"),
                       GetSQLValueString($_POST['Penghasilan_Perbulan'], "text"));

  mysql_select_db($database_kecamatan, $kecamatan);
  $Result1 = mysql_query($insertSQL, $kecamatan) or die(mysql_error());
}

$colname_Recordset1 = "-1";
if (isset($_GET['Jenis Kelamin'])) {
  $colname_Recordset1 = (get_magic_quotes_gpc()) ? $_GET['Jenis Kelamin'] : addslashes($_GET['Jenis Kelamin']);
}
mysql_select_db($database_kecamatan, $kecamatan);
$query_Recordset1 = sprintf("SELECT * FROM `input` WHERE `Jenis Kelamin` = '%s'", $colname_Recordset1);
$Recordset1 = mysql_query($query_Recordset1, $kecamatan) or die(mysql_error());
$row_Recordset1 = mysql_fetch_assoc($Recordset1);
$totalRows_Recordset1 = mysql_num_rows($Recordset1);
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Untitled Document</title>
<style type="text/css">
<!--
.style1 {
	font-size: 24px;
	font-weight: bold;
}
body {
	background-color: #0099CC;
}
-->
</style>
</head>

<body>
<form id="form1" name="form1" method="post" action="">
  <div align="center" class="style1">INPUT DATA</div>
</form>

<p>&nbsp;</p>

<form method="post" name="form3" action="<?php echo $editFormAction; ?>">
  <table align="center">
    <tr valign="baseline">
      <td nowrap align="right">No KK:</td>
      <td><input type="text" name="No_KK" value="" size="32"></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right">NIK:</td>
      <td><input type="text" name="NIK" value="" size="32"></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right">Nama:</td>
      <td><input type="text" name="Nama" value="" size="32"></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right">Tempat Tanggal Lahir:</td>
      <td><input type="text" name="Tempat_Tanggal_Lahir" value="" size="32"></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right">Jenis Kelamin:</td>
      <td><input type="text" name="Jenis_Kelamin" value="" size="32"></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right">Golongan Darah:</td>
      <td><input type="text" name="Golongan_Darah" value="" size="32"></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right">Alamat:</td>
      <td><input type="text" name="Alamat" value="" size="32"></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right">RT RW:</td>
      <td><input type="text" name="RT_RW" value="" size="32"></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right">Kelurahan:</td>
      <td><input type="text" name="Kelurahan" value="" size="32"></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right">Kecamatan:</td>
      <td><input type="text" name="Kecamatan" value="" size="32"></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right">Agama:</td>
      <td><input type="text" name="Agama" value="" size="32"></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right">Status Perkawinan:</td>
      <td><input type="text" name="Status_Perkawinan" value="" size="32"></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right">Kewarganegaraan:</td>
      <td><input type="text" name="Kewarganegaraan" value="" size="32"></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right">Status Keluarga:</td>
      <td><input type="text" name="Status_Keluarga" value="" size="32"></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right">Pekerjaan:</td>
      <td><input type="text" name="Pekerjaan" value="" size="32"></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right">Penghasilan Perbulan:</td>
      <td><input type="text" name="Penghasilan_Perbulan" value="" size="32"></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right">&nbsp;</td>
      <td><input type="submit" value="Insert record">
      <label></label></td>
    </tr>
  </table>
  <input type="hidden" name="MM_insert" value="form3">
  <a href="frm3.php">BACK HOME </a>
</form>
</body>
</html>
<?php
mysql_free_result($Recordset1);
?>
