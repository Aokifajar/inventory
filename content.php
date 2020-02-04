<?php
@$page=htmlentities($_GET['page']);
$halaman="$page.php";
//url
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
}elseif ($page == sha1('master_customer')) {
	include "master_customer/master_customer.php";
}elseif ($page == sha1('customer')) {
	include "master_customer/customer.php";
}elseif ($page == sha1('proses_customer')) {
	include "master_customer/proses_customer.php";
}elseif ($page == sha1('detail_customer')) {
	include "master_customer/detail_customer.php";
}elseif ($page == sha1('edit_customer')) {
	include "master_customer/edit_customer.php";
}elseif ($page == sha1('edit_detail')) {
	include "master_customer/edit_detail.php";
}else {
	include"$halaman";
}
?>