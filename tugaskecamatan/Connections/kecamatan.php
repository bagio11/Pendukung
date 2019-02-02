<?php
# FileName="Connection_php_mysql.htm"
# Type="MYSQL"
# HTTP="true"
$hostname_kecamatan = "localhost";
$database_kecamatan = "camat";
$username_kecamatan = "root";
$password_kecamatan = "";
$kecamatan = mysql_pconnect($hostname_kecamatan, $username_kecamatan, $password_kecamatan) or trigger_error(mysql_error(),E_USER_ERROR); 
?>