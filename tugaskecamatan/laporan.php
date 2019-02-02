<?php require_once('../tugaskecamatan/Connections/kecamatan.php'); ?>
<?php
$maxRows_Recordset1 = 10;
$pageNum_Recordset1 = 0;
if (isset($_GET['pageNum_Recordset1'])) {
  $pageNum_Recordset1 = $_GET['pageNum_Recordset1'];
}
$startRow_Recordset1 = $pageNum_Recordset1 * $maxRows_Recordset1;

$colname_Recordset1 = "-1";
if (isset($_GET['No KK'])) {
  $colname_Recordset1 = (get_magic_quotes_gpc()) ? $_GET['No KK'] : addslashes($_GET['No KK']);
}
mysql_select_db($database_kecamatan, $kecamatan);
$query_Recordset1 = sprintf("SELECT `No KK`, NIK, Nama, Pekerjaan, `Penghasilan Perbulan` FROM `input` WHERE `No KK` = '%s'", $colname_Recordset1);
$query_limit_Recordset1 = sprintf("%s LIMIT %d, %d", $query_Recordset1, $startRow_Recordset1, $maxRows_Recordset1);
$Recordset1 = mysql_query($query_limit_Recordset1, $kecamatan) or die(mysql_error());
$row_Recordset1 = mysql_fetch_assoc($Recordset1);

if (isset($_GET['totalRows_Recordset1'])) {
  $totalRows_Recordset1 = $_GET['totalRows_Recordset1'];
} else {
  $all_Recordset1 = mysql_query($query_Recordset1);
  $totalRows_Recordset1 = mysql_num_rows($all_Recordset1);
}
$totalPages_Recordset1 = ceil($totalRows_Recordset1/$maxRows_Recordset1)-1;
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Untitled Document</title>
<style type="text/css">
<!--
body {
	background-color: #0099CC;
}
-->
</style></head>

<body>
<form id="form1" name="form1" method="post" action="">
</form>

<table border="1">
  <tr bgcolor="#00CCCC">
    <td width="48">No KK</td>
    <td width="122">NIK</td>
    <td width="130">Nama</td>
    <td width="154">Pekerjaan</td>
    <td width="127">Penghasilan Perbulan</td>
    <td width="97"><div align="center">Status</div></td>
  </tr>
  <?php do 
	if ($Penghasilan Perbulan>2300000)
	{
	$Status="Sangat Mampu";
	}
	elseif ($Penghasilan Perbulan>1700000)
	{
	$Status="Mampu";
	}
	elseif ($Penghasilan Perbulan>1300000)
	{
	$Status="Kurang Mampu";
	}
	elseif ($Penghasilan Perbulan<1000000)
	{
	$Status="Kurang mampu";
	}
	elseif ($Penghasilan Perbulan<0)
	{
	$Status="Belum Mampu";
	}
	?>
    <tr bgcolor="#00CCCC">
      <td><?php echo $row_Recordset1['No KK']; ?></td>
      <td><?php echo $row_Recordset1['NIK']; ?></td>
      <td><?php echo $row_Recordset1['Nama']; ?></td>
      <td><?php echo $row_Recordset1['Pekerjaan']; ?></td>
      <td><?php echo $Penghasilan Perbulan; ?></td>
	  <td><?php echo $Status; ?></td>
      <td>&nbsp;</td>
    </tr>
    <?php } while ($row_Recordset1 = mysql_fetch_assoc($Recordset1)); ?>
</table>
</body>
</html>
<?php
mysql_free_result($Recordset1);
?>
