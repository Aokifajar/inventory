<?php
$serverName = "PC"; 
$connectionInfo = array( "Database"=>"WJK", "UID"=>"sa", "PWD"=>"Intelwjk2020");//koneksi db wjk
$connectionInfo2 = array( "Database"=>"WKY2016GL", "UID"=>"sa", "PWD"=>"Intelwjk2020"); //koneksi db WKY
$koneksi = sqlsrv_connect( $serverName, $connectionInfo);
$koneksi2 = sqlsrv_connect( $serverName, $connectionInfo2);

if( $koneksi && $koneksi2 === false ) {//ketika koneksi ke db gagal
	echo "koneksi gagal.<br />";
	die( print_r( sqlsrv_errors(), true));
}
?>