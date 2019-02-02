<?php require_once('Connections/kecamatan.php'); ?>
<?php
$maxRows_Recordset1 = 10;
$pageNum_Recordset1 = 0;
if (isset($_GET['pageNum_Recordset1'])) {
  $pageNum_Recordset1 = $_GET['pageNum_Recordset1'];
}
$startRow_Recordset1 = $pageNum_Recordset1 * $maxRows_Recordset1;

mysql_select_db($database_kecamatan, $kecamatan);
$query_Recordset1 = "SELECT * FROM `input`";
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
<table border="1">
  <tr bgcolor="#0099FF">
    <td>No KK</td>
    <td>NIK</td>
    <td>Nama</td>
    <td>Tempat Tanggal Lahir</td>
    <td>Jenis Kelamin</td>
    <td>Golongan Darah</td>
    <td>Alamat</td>
    <td>RT RW</td>
    <td>Kelurahan</td>
    <td>Kecamatan</td>
    <td>Agama</td>
    <td>Status Perkawinan</td>
    <td>Kewarganegaraan</td>
    <td>Status Keluarga</td>
    <td>Pekerjaan</td>
    <td>Penghasilan Perbulan</td>
  </tr>
  <?php do { ?>
    <tr bgcolor="#0099FF">
      <td><div align="center"><?php echo $row_Recordset1['No KK']; ?></div></td>
      <td><div align="center"><?php echo $row_Recordset1['NIK']; ?></div></td>
      <td><div align="center"><?php echo $row_Recordset1['Nama']; ?></div></td>
      <td><div align="center"><?php echo $row_Recordset1['Tempat Tanggal Lahir']; ?></div></td>
      <td><div align="center"><?php echo $row_Recordset1['Jenis Kelamin']; ?></div></td>
      <td><div align="center"><?php echo $row_Recordset1['Golongan Darah']; ?></div></td>
      <td><div align="center"><?php echo $row_Recordset1['Alamat']; ?></div></td>
      <td><div align="center"><?php echo $row_Recordset1['RT RW']; ?></div></td>
      <td><div align="center"><?php echo $row_Recordset1['Kelurahan']; ?></div></td>
      <td><div align="center"><?php echo $row_Recordset1['Kecamatan']; ?></div></td>
      <td><div align="center"><?php echo $row_Recordset1['Agama']; ?></div></td>
      <td><div align="center"><?php echo $row_Recordset1['Status Perkawinan']; ?></div></td>
      <td><div align="center"><?php echo $row_Recordset1['Kewarganegaraan']; ?></div></td>
      <td><div align="center"><?php echo $row_Recordset1['Status Keluarga']; ?></div></td>
      <td><div align="center"><?php echo $row_Recordset1['Pekerjaan']; ?></div></td>
      <td><div align="center"><?php echo $row_Recordset1['Penghasilan Perbulan']; ?></div></td>
    </tr>
    <?php } while ($row_Recordset1 = mysql_fetch_assoc($Recordset1)); ?>
</table>
</body>
</html>
<?php
mysql_free_result($Recordset1);
?>
