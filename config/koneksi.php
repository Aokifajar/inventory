<?php
$serverName = "PC"; 
$connectionInfo = array( "Database"=>"WJK", "UID"=>"sa", "PWD"=>"Intelwjk2020");//koneksi db wjk
$connectionInfo2 = array( "Database"=>"WKY2016GL", "UID"=>"sa", "PWD"=>"Intelwjk2020"); //koneksi db WKY
$connectionInfo3 = array( "Database"=>"Wilayah", "UID"=>"sa", "PWD"=>"Intelwjk2020"); //koneksi db ambil wilayah
$koneksi = sqlsrv_connect( $serverName, $connectionInfo);
$koneksi2 = sqlsrv_connect( $serverName, $connectionInfo2);
$koneksi3 = sqlsrv_connect( $serverName, $connectionInfo3);

if( $koneksi && $koneksi2 && $koneksi3 === false ) {//ketika koneksi ke db gagal
	echo "koneksi gagal.<br />";
	die( print_r( sqlsrv_errors(), true));
}
?>