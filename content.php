<?php
@$page=htmlentities($_GET['page']);
$halaman="$page.php";

if(empty($page)){
	include "home/dashboard.php";
}elseif ($page == sha1('master_barang')) {
	include "master_barang/master_barang.php";
}elseif ($page == sha1('dashboard')) {
	include "home/dashboard.php";
}elseif ($page == sha1('barang')) {
	include "master_barang/barang.php";
}elseif ($page == sha1('edit_barang')) {
	include "master_barang/edit_barang.php";
}elseif ($page == sha1('proses_barang')) {
	include "master_barang/proses_barang.php";
}else {
	include"$halaman";
}
?>