<?php
date_default_timezone_set("Asia/Jakarta");
//input data master
if (isset($_POST['submit'])) {
	$kode=$_POST['kode'];
	$nama=$_POST['nama'];
	$tanggal = date('Y-m-d H:i:s'); 
	//cek kode customer
	$result="SELECT * FROM tmastercustomer WHERE kode_master='$kode'";
	$query =sqlsrv_query($koneksi,$result,array(),array("Scrollable" =>'static'));
	$num =sqlsrv_num_rows($query);
	if ($num==0) {
		$query= sqlsrv_query($koneksi,"INSERT INTO tmastercustomer (kode_master,Customer)
			VALUES ('$kode','$nama')");
			if ($query){ ?>
				<?php
				$tmp=sqlsrv_query($koneksi,"INSERT INTO THistorymaster (tanggal,kode,action,keterangan,iduser)
				VALUES ('$tanggal','$kode','New','Master Customer','1')");?>
				<script>alert('Data Berhasil disimpan..!');document.location="?page=<?=sha1('master_customer')?>";</script>
			<?php }else{
				//alert ketika data gagal simpan
				echo "<script>alert('Data Gagal Disimpan');window.history.back();</script>";	
			}
		}else{
			//alert ketika kode sudah ada
			echo "<script>alert('Gagal, Kode Master Customer sudah ada..!');window.history.back();</script>";
		}

	}
//hapus master customer
	if (isset($_GET['hapus'])) {
		$kode=$_GET['hapus'];
		$tanggal = date('Y-m-d H:i:s'); 
		$query=sqlsrv_query($koneksi,"DELETE FROM tmastercustomer WHERE kode_master='$kode'");
		if ($query){ ?>
			<?php
			$tmp=sqlsrv_query($koneksi,"INSERT INTO THistorymaster (tanggal,kode,action,keterangan,iduser)
			VALUES ('$tanggal','$kode','Delete','Master Customer','1')");?>
			<script>alert('Data Berhasil dihapus');document.location="?page=<?=sha1('master_customer')?>";</script>
		<?php }
	}
	//edit master cuastomer
	if (isset($_POST['edit'])) {
		$kode=$_GET['kode'];
		$nama=$_POST['nama'];
		$tanggal = date('Y-m-d H:i:s'); 
		$query= sqlsrv_query($koneksi,"UPDATE  tmastercustomer set Customer='$nama' WHERE kode_master='$kode'");
			if ($query){ ?>
				<!--ketika data berhasil diedit-->
				<?php
				$tmp=sqlsrv_query($koneksi,"INSERT INTO THistorymaster (tanggal,kode,action,keterangan,iduser)
				VALUES ('$tanggal','$kode','Edit','Master Customer','1')");?>
				<script>alert('Data Berhasil Diedit..!');document.location="?page=<?=sha1('master_customer')?>";</script>
			<?php }else{
				echo "<script>alert('Gagal, Diedit..!');window.history.back();</script>";
			}

		}
	//new detail customer
	if (isset($_POST['new'])) {
	$kodemaster=$_POST['kodemaster'];
	$kode=$_POST['kode'];
	$nama=$_POST['nama'];
	$npwp=$_POST['npwp'];
	$ktp=$_POST['ktp'];
	$contact1=$_POST['contact1'];
	$contact2=$_POST['contact2'];
	$contact3=$_POST['contact3'];
	$contact4=$_POST['contact4'];
	$kodeusaha=$_POST['kodeusaha'];
	$kodearea=$_POST['kodearea'];
	$kodesales=$_POST['kodesales'];
	$ppn=$_POST['ppn'];
	$syarat=$_POST['syarat'];
	$alamat1=$_POST['alamat1'];
	$alamat2=$_POST['alamat2'];
	$provinsi=$_POST['provinsi'];
	$kota=$_POST['kota'];
	$kodepos=$_POST['kodepos'];
	$tlp1=$_POST['tlp1'];
	$tlp2=$_POST['tlp2'];
	$fax1=$_POST['fax1'];
	$fax2=$_POST['fax2'];
	$nonaktif=$_POST['nonaktif'];
	$nonaktifjual=$_POST['nonaktifjual'];
	$major=$_POST['major'];
	$reference=$_POST['reference'];
	$tanggal = date('Y-m-d H:i:s'); 
	//cek kode detail customer
	$result="SELECT * FROM tcustomer WHERE kode='$kode'";
	$query =sqlsrv_query($koneksi,$result,array(),array("Scrollable" =>'static'));
	$num =sqlsrv_num_rows($query);
	if ($num==0) {
		$query= sqlsrv_query($koneksi,"INSERT INTO tcustomer (Kode,Nama,NPWP,KTP,Contact1,Contact2,Contact3,Contact4,Kode_master,Kode_Usaha,
			Kode_Area,Kode_Sales,Syarat,PPN,Major,Reference,Alamat1,Alamat2,Kota,Provinsi,KodePos,Telepon1,Fax1,Telepon2,
			Fax2,UserID,EntryDate,NonAktif,NonAktifJual)
			VALUES ('$kode','$nama','$npwp','$ktp','$contact1','$contact2','$contact3','$contact4',
			'$kodemaster','$kodeusaha','$kodearea','$kodesales','$syarat','$ppn','$major','$reference','$alamat1',
			'$alamat2','$kota','$provinsi','$kodepos','$tlp1','$fax1','$tlp2','$fax2','1','$tanggal','$nonaktif','$nonaktifjual')");
			if ($query){ ?>
				<?php
				$tmp=sqlsrv_query($koneksi,"INSERT INTO THistorymaster (tanggal,kode,action,keterangan,iduser)
				VALUES ('$tanggal','$kode','New','Master Detail Customer','1')");?>
				<script>alert('Data Berhasil Disimpan...!');document.location="?page=<?=sha1('master_customer')?>";</script>
			<?php }else{
				echo "<script>alert('Gagal, Disimpan..!');window.history.back();</script>";
			}
		}else{
			//alert ketika kode sudah ada
			echo "<script>alert('Gagal, Kode Detail sudah ada..!');window.history.back();</script>";
		}

	}
	//hapus master detail customer
	if (isset($_GET['delete'])) {
		$kode=$_GET['delete'];
		$tanggal = date('Y-m-d H:i:s'); 
		$query=sqlsrv_query($koneksi,"DELETE FROM tcustomer WHERE kode='$kode'");
		if ($query){ ?>
			<?php
			$tmp=sqlsrv_query($koneksi,"INSERT INTO THistorymaster (tanggal,kode,action,keterangan,iduser)
			VALUES ('$tanggal','$kode','Delete','Master Detail Customer','1')");?>
			<script>alert('Data Berhasil dihapus');document.location="?page=<?=sha1('master_customer')?>";</script>
		<?php }
	}
	//edit detail customer
	if (isset($_POST['ubah'])) {
	$kode=$_GET['kode'];
	$kodemaster=$_POST['kodemaster'];
	$nama=$_POST['nama'];
	$npwp=$_POST['npwp'];
	$ktp=$_POST['ktp'];
	$contact1=$_POST['contact1'];
	$contact2=$_POST['contact2'];
	$contact3=$_POST['contact3'];
	$contact4=$_POST['contact4'];
	$kodeusaha=$_POST['kodeusaha'];
	$kodearea=$_POST['kodearea'];
	$kodesales=$_POST['kodesales'];
	$ppn=$_POST['ppn'];
	$syarat=$_POST['syarat'];
	$alamat1=$_POST['alamat1'];
	$alamat2=$_POST['alamat2'];
	$provinsi=$_POST['provinsi'];
	$kota=$_POST['kota'];
	$kodepos=$_POST['kodepos'];
	$tlp1=$_POST['tlp1'];
	$tlp2=$_POST['tlp2'];
	$fax1=$_POST['fax1'];
	$fax2=$_POST['fax2'];
	@$nonaktif=$_POST['nonaktif'];
	@$nonaktifjual=$_POST['nonaktifjual'];
	$major=$_POST['major'];
	$reference=$_POST['reference'];
	$tanggal = date('Y-m-d H:i:s'); 
		$query= sqlsrv_query($koneksi,"UPDATE tcustomer set Nama='$nama',NPWP='$npwp',KTP='$ktp',Contact1='$contact1',Contact2='$contact2',Contact3='$contact3',Contact4='$contact4',Kode_master='$kodemaster',Kode_Usaha='$kodeusaha',
			Kode_Area='$kodearea',Kode_Sales='$kodesales',Syarat='$syarat',PPN='$ppn',Major='$major',Reference='$reference',Alamat1='$alamat1',Alamat2='$alamat2',Kota='$kota',Provinsi='$provinsi',KodePos='$kodepos',Telepon1='$tlp1',Fax1='$fax1',Telepon2='$tlp2',
			Fax2='$fax2',EntryDate='$tanggal',NonAktif='$nonaktif',NonAktifJual='$nonaktifjual' WHERE Kode='$kode'");
			if ($query){ ?>
				<?php
				$tmp=sqlsrv_query($koneksi,"INSERT INTO THistorymaster (tanggal,kode,action,keterangan,iduser)
				VALUES ('$tanggal','$kode','Edit','Master Detail Customer','1')");?>
				<script>alert('Data Berhasil diedit..!');document.location="?page=<?=sha1('master_customer')?>";</script>
			<?php }else{
				echo "<script>alert('Gagal, diedit..!');window.history.back();</script>";
			}
	}
		?>
