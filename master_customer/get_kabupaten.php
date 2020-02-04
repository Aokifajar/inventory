<?php
//untuk mengambil data konversi satuan
include '../config/koneksi.php';
$nama_provinsi=$_POST['nama_provinsi'];
$result=sqlsrv_query($koneksi3,"SELECT * FROM t_kabupaten WHERE nama_provinsi='$nama_provinsi'");
		echo "<option>Pilih Kabupaten/Kota</option>";
		while ($konversi = sqlsrv_fetch_array($result)) {
			?>
			<option value="<?php echo $konversi['nama_kabupaten'];?>"><?php echo $konversi['nama_kabupaten']?></option>
		<?php }

?>