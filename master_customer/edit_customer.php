
<!DOCTYPE html>
<html>
<body>
	<div id="wrapper">
		<div class="row wrapper border-bottom white-bg page-heading">
			<div class="col-lg-10">
				<h2>Master Customer</h2>
				<ol class="breadcrumb">
					<li class="breadcrumb-item">
						<a href="?page=<?=sha1('dashboard')?>">Home</a>
					</li>
					<li class="breadcrumb-item">
						<a href="?page=<?=sha1('master_customer')?>">Master Customer</a>
					</li>
					<li class="breadcrumb-item">
						<strong>Input Master Customer</strong>
					</li>
				</ol>
			</div>
		</div>
		<div class="wrapper wrapper-content animated fadeIn">
			<div class="row">
				<div class="col-lg-12">
					<div class="tabs-container">
						 <?php
                        $kode=$_GET['kode'];
                        $ambil=sqlsrv_query($koneksi,"SELECT * FROM tmastercustomer WHERE kode_master='$kode'");
                        $data=sqlsrv_fetch_array($ambil);
                        ?>
						<form method="post" action="?page=<?=sha1('proses_customer')?>&kode=<?php echo $data['kode_master'];?>" >
							<!--body form-->
							<div class="ibox-content">
								<div class="form-group row">
									<label class="col-sm-1 col-form-label">Kode Master Customer<font color="red">*</font></label>
									<div class="col-sm-5">
										<input type="text" class="form-control form-control-sm" name="kode" value="<?php echo $data['kode_master']?>" disabled="">
									</div>
									<label class="col-sm-1 col-form-label">Nama Customer <font color="red">*</font></label>
									<div class="col-sm-5"><input type="text" class="form-control form-control-sm" name="nama" value="<?php echo $data['Customer']?>"> 
									</div>
								</div>
								<div class="form-group row">
									<div class="col-sm-4 col-sm-offset-2">
										<button class="btn btn-primary btn-sm" type="submit" name="edit">Simpan</button>
									</div>
								</div>
							</div>
						</form>
					</div>
				</div>
			</body>
			</html>
