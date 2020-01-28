<?php
date_default_timezone_set("Asia/Jakarta");
if (isset($_POST['submit'])) {
	$kode=$_POST['kode'];
	$nama=$_POST['nama'];
	$kelas=$_POST['kelas'];
	$divisi=$_POST['divisi'];
	$kategori=$_POST['kategori'];
	$satuan=$_POST['satuan'];
	@$konversi=$_POST['konversi'];
	$explode=explode("-", $konversi);
	@$konversi2=$explode[1];
	$nilai=$_POST['nilai'];
	$usaha=$_POST['usaha'];
	$stok=$_POST['stok'];
	$ppnbm=$_POST['ppnbm'];
	$fix=$_POST['fix'];
	$persen=$_POST['persen'];
	$timbangan=$_POST['timbangan'];
	$status=$_POST['status'];
	$keterangan=$_POST['keterangan'];
	$tanggal = date('Y-m-d H:i:s'); 
	$apmajor=$_POST['apmajor'];
	$apref=$_POST['apref'];
	$armajor=$_POST['armajor'];
	$arref=$_POST['arref'];
	$psdmajor=$_POST['psdmajor'];
	$psdref=$_POST['psdref'];
	//cek kode barang
	$result="SELECT * FROM Tbarang WHERE kode='$kode'";
	$query =sqlsrv_query($koneksi,$result,array(),array("Scrollable" =>'static'));
	$num =sqlsrv_num_rows($query);
	if ($num==0) {
		$query= sqlsrv_query($koneksi,"INSERT INTO Tbarang (kode,nama,kelas,divisi,kategori,satuan,konversisatuan,jenisusaha,stockminimal,PPnBM,
			toleransifix,toleransipersen,APmajor,APRef,ARmajor,ARRef,PSDmajor,PSDRef,ststimbangan,status,keterangan,entrydate,iduser,niaikonversisatuan)
			VALUES ('$kode','$nama','$kelas','$divisi','$kategori','$satuan','$konversi2','$usaha',
			'$stok','$ppnbm','$fix','$persen','$apmajor','$apref','$armajor','$arref','$psdmajor',
			'$psdref','$timbangan','$status','$keterangan','$tanggal','1','$nilai')");
			if ($query){ ?>
				<?php
				$tmp=sqlsrv_query($koneksi,"INSERT INTO THistorymaster (tanggal,kode,action,keterangan,iduser)
				VALUES ('$tanggal','$kode','New','master barang','1')");?>
				<script>alert('Data Berhasil disimpan..!');document.location="?page=<?=sha1('master_barang')?>";</script>
			<?php }else{
				//alert ketika data gagal simpan
				echo "<script>alert('Data Gagal Disimpan');window.history.back();</script>";	
			}
		}else{
			//alert ketika kode sudah ada
			echo "<script>alert('Gagal, Kode Barang sudah ada..!');window.history.back();</script>";
		}

	}
//hapus master barang
	if (isset($_GET['hapus'])) {
		$kode=$_GET['hapus'];
		$tanggal = date('Y-m-d H:i:s'); 
		$query=sqlsrv_query($koneksi,"DELETE FROM Tbarang WHERE kode='$kode'");
		if ($query){ ?>
			<?php
			$tmp=sqlsrv_query($koneksi,"INSERT INTO THistorymaster (tanggal,kode,action,keterangan,iduser)
			VALUES ('$tanggal','$kode','Delete','master barang','1')");?>
			<script>alert('Data Berhasil dihapus');document.location="?page=<?=sha1('master_barang')?>";</script>
		<?php }
	}
	//edit master barang
	if (isset($_POST['edit'])) {
		$kode=$_GET['kode'];
		$nama=$_POST['nama'];
		$kelas=$_POST['kelas'];
		$divisi=$_POST['divisi'];
		$kategori=$_POST['kategori'];
		$satuan=$_POST['satuan'];
		@$konversi=$_POST['konversi'];
		$explode=explode("-", $konversi);
		@$konversi2=$explode[1];
		$nilai=$_POST['nilai'];
		$usaha=$_POST['usaha'];
		$stok=$_POST['stok'];
		$ppnbm=$_POST['ppnbm'];
		$fix=$_POST['fix'];
		$persen=$_POST['persen'];
		$timbangan=$_POST['timbangan'];
		$status=$_POST['status'];
		$keterangan=$_POST['keterangan'];
		$apmajor=$_POST['apmajor'];
		$apref=$_POST['apref'];
		$armajor=$_POST['armajor'];
		$arref=$_POST['arref'];
		$psdmajor=$_POST['psdmajor'];
		$psdref=$_POST['psdref'];
		$tanggal = date('Y-m-d H:i:s'); 
		$query= sqlsrv_query($koneksi,"UPDATE  Tbarang set nama='$nama',kelas='$kelas',divisi='$divisi',kategori='$kategori',satuan='$satuan',konversisatuan='$konversi2',jenisusaha='$usaha',stockminimal='$stok',PPnBM='$ppnbm',
			toleransifix='$fix',toleransipersen='$persen',APmajor='$apmajor',APRef='$apref',ARmajor='$armajor',ARRef='$arref',PSDmajor='$psdmajor',PSDRef='$psdref',ststimbangan='$timbangan',status='$status',keterangan='$keterangan',niaikonversisatuan='$nilai' WHERE kode='$kode'");
			if ($query){ ?>
				<!--ketika data berhasil diedit-->
				<?php
				$tmp=sqlsrv_query($koneksi,"INSERT INTO THistorymaster (tanggal,kode,action,keterangan,iduser)
				VALUES ('$tanggal','$kode','Edit','master barang','1')");?>
				<script>alert('Data Berhasil Diedit..!');document.location="?page=<?=sha1('master_barang')?>";</script>
			<?php }

		}
		?>
