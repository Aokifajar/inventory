<?php
//untuk mengambil data konversi satuan
include '../config/koneksi.php';
$satuan=$_POST['satuan'];
$result="SELECT * FROM TKonversisatuan WHERE satuan='$satuan'";
$query =sqlsrv_query($koneksi,$result,array(),array("Scrollable" =>'static'));
$num =sqlsrv_num_rows($query);
	if ($num>0) {
		echo "<option>Pilih konversi</option>";
		while ($konversi = sqlsrv_fetch_array($query)) {
			$value=$konversi['nilai'].'-'.$konversi['konversi'];
			?>
			<option value="<?php echo $value;?>"><?php echo $konversi['konversi']?></option>
		<?php }
	}else{
		echo "<script>alert('Satuan Konversi Tidak Ada..!');</script>";
	}

?>