
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link href="assets/css/plugins/dataTables/datatables.min.css" rel="stylesheet">
	<link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/select2-bootstrap-theme/0.1.0-beta.10/select2-bootstrap.min.css'>
	<link rel="stylesheet" href="assets/style1.css">
</head>
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
						<strong>Input Detail Customer</strong>
					</li>
				</ol>
			</div>
		</div>
		<div class="wrapper wrapper-content animated fadeIn">
			<div class="row">
				<div class="col-lg-12">
					<div class="tabs-container">
						<ul class="nav nav-tabs" role="tablist">
							<li><a class="nav-link active" data-toggle="tab" href="#tab-1">Detail 1</a></li>
							<li><a class="nav-link" data-toggle="tab" href="#tab-2">Detail 2</a></li>
						</ul>
						<form method="post" action="?page=<?=sha1('proses_customer')?>" >
							<div class="tab-content">
								<div role="tabpanel" id="tab-1" class="tab-pane active">
									<div class="panel-body">
										<!--body form-->
										<div class="ibox-content">
											<div class="form-group row"><label class="col-sm-1 col-form-label">Customer <font color="red">*</font></label>
												<div class="col-sm-11"><select class="form-control m-b form-control-sm selectpicker" name="kodemaster" data-live-search="true" id="state_list" data-width="100%" required="">
													<option>Pilih Customer</option>
													<?php
													$query =sqlsrv_query($koneksi,"SELECT * FROM tmastercustomer");
													while ($kodemaster = sqlsrv_fetch_array($query)) {
														?>
														<option value="<?php echo $kodemaster['kode_master']?>"><?php echo $kodemaster['Customer']?></option>
													<?php } ?>
												</select>
											</div>
										</div>

										<div class="form-group row">
											<label class="col-sm-1 col-form-label">Kode <font color="red">*</font></label>
											<div class="col-sm-5">
												<input type="text" maxlength="12" class="form-control form-control-sm" name="kode" required="">
											</div>
											<label class="col-sm-1 col-form-label">Nama <font color="red">*</font></label>
											<div class="col-sm-5"><input maxlength="75" type="text" class="form-control form-control-sm" name="nama" required=""> 
											</div>
										</div>
										<div class="form-group row">
											<label class="col-sm-1 col-form-label">NPWP <font color="red">*</font></label>
											<div class="col-sm-5"><input maxlength="30" type="number" class="form-control form-control-sm" name="npwp" required=""> 
											</div>
											<label class="col-sm-1 col-form-label">KTP <font color="red">*</font></label>
											<div class="col-sm-5"><input maxlength="30" type="number" class="form-control form-control-sm" name="ktp" required=""> 
											</div>
										</div>
										<div class="form-group row">
											<label class="col-sm-1 col-form-label">Contact 1<font color="red">*</font></label>
											<div class="col-sm-5">
												<input type="text" maxlength="50" class="form-control form-control-sm" name="contact1" required=""> 
											</div>
											<label class="col-sm-1 col-form-label">Contact 2</label>
											<div class="col-sm-5">
												<input maxlength="50" type="text" class="form-control form-control-sm" name="contact2"> 
											</div>
										</div>
										<div class="form-group row">
											<label class="col-sm-1 col-form-label">Contact 3</label>
											<div class="col-sm-5">
												<input maxlength="50" type="text" class="form-control form-control-sm" name="contact3"> 
											</div>
											<label class="col-sm-1 col-form-label">Contact 4</label>
											<div class="col-sm-5">
												<input maxlength="50" type="text" class="form-control form-control-sm" name="contact4" > 
											</div>
										</div>
										<div class="form-group row">
											<label class="col-sm-1 col-form-label">Kode Usaha<font color="red">*</font></label>
											<div class="col-sm-5">
												<input type="text" maxlength="12" class="form-control form-control-sm" name="kodeusaha" required=""> 
											</div>
											<label class="col-sm-1 col-form-label">Kode Area<font color="red">*</font></label>
											<div class="col-sm-5">
												<input type="text" maxlength="20" class="form-control form-control-sm" name="kodearea" required=""> 
											</div>
										</div>
										<div class="form-group row">
											<label class="col-sm-1 col-form-label">Kode Sales<font color="red">*</font></label>
											<div class="col-sm-5">
												<input type="text" maxlength="12" class="form-control form-control-sm" name="kodesales" required=""> 
											</div>
											<label class="col-sm-1 col-form-label">PPN<font color="red">*</font></label>
											<div class="col-sm-5">
												<input type="text" class="form-control form-control-sm" name="ppn" required=""> 
											</div>
										</div>
										<div class="form-group row"><label class="col-sm-1 col-form-label">Syarat<font color="red">*</font></label>
											<div class="col-sm-11"><input type="text" class="form-control form-control-sm" name="syarat" required=""> 
											</div>
										</div>
										<div class="form-group row">
											<label class="col-sm-1 col-form-label">Alamat 1<font color="red">*</font></label>
											<div class="col-sm-5">
												<input maxlength="50" type="text" class="form-control form-control-sm" name="alamat1" required=""> 
											</div>
											<label class="col-sm-1 col-form-label">Alamat 2</label>
											<div class="col-sm-5">
												<input maxlength="50" type="text" class="form-control form-control-sm" name="alamat2"> 
											</div>
										</div>
										<div class="form-group row"><label class="col-sm-1 col-form-label">Provinsi <font color="red">*</font></label>
											<div class="col-sm-11"><select data-size="8"  class="form-control m-b form-control-sm selectpicker" name="provinsi" data-live-search="true" data-width="100%" id="provinsi" required="">
												<option>Pilih provinsi</option>
												<?php
												$query =sqlsrv_query($koneksi3,"SELECT * FROM t_provinsi");
												while ($provinsi = sqlsrv_fetch_array($query)) {
													?>
													<option value="<?php echo $provinsi['nama_provinsi']?>"><?php echo $provinsi['nama_provinsi']?></option>
												<?php } ?>
											</select>
										</div>
									</div>
									<div class="form-group row"><label class="col-sm-1 col-form-label">Kota<font color="red">*</font></label>
										<div class="col-sm-11"><select class="form-control m-b form-control-sm" name="kota"  id="kabupaten" required="">
											<option value="">Pilih Kabupaten/Kota</option>
										</select>
									</div>
								</div>
								<div class="form-group row"><label class="col-sm-1 col-form-label">Kode Pos<font color="red">*</font></label>
									<div class="col-sm-2"><input maxlength="50" type="text" class="form-control form-control-sm" name="kodepos" required="">
									</div>
								</div>
								<div class="form-group row">
									<label class="col-sm-1 col-form-label">Telepon 1<font color="red">*</font></label>
									<div class="col-sm-5">
										<input maxlength="50" type="text" class="form-control form-control-sm" name="tlp1" required=""> 
									</div>
									<label class="col-sm-1 col-form-label">Telepon 2</label>
									<div class="col-sm-5">
										<input maxlength="50" type="text" class="form-control form-control-sm" name="tlp2"> 
									</div>
								</div>
								<div class="form-group row">
									<label class="col-sm-1 col-form-label">Fax 1<font color="red">*</font></label>
									<div class="col-sm-5">
										<input type="text" maxlength="50" class="form-control form-control-sm" name="fax1" required=""> 
									</div>
									<label class="col-sm-1 col-form-label">Fax 2</label>
									<div class="col-sm-5">
										<input type="text" maxlength="50" class="form-control form-control-sm" name="fax2"> 
									</div>
								</div>
								<div class="form-group">
									<div class="form-check">
										<input class="form-check-input" type="checkbox" name="nonaktif" value="1" id="nonaktif">
										<label class="form-check-label" for="nonaktif">
											Non Aktif
										</label>
									</div>
								</div>
								<div class="form-group">
									<div class="form-check">
										<input class="form-check-input" type="checkbox" name="nonaktifjual" value="2" id="nonaktifjual">
										<label class="form-check-label" for="nonaktifjual">
											Non Aktif Jual
										</label>
									</div>
								</div>
							</div>
						</div>
					</div>
					<!--tabs detail kedua-->
					<div role="tabpanel" id="tab-2" class="tab-pane">
						<div class="panel-body">
							<div class="ibox-content">
								<div class="form-group  row"><label class="col-sm-1 col-form-label">Major</label>
									<div class="col-sm-4"><input type="text" class="form-control form-control-sm" name="major" id="inputMajor" readonly=""></div>
									<a style="height: 25px" data-toggle="modal" href="#major" class="btn btn-primary btn-sm fa fa-search"></a>
								</div>
								<div class="form-group row"><label class="col-sm-1 col-form-label">Reference</label>
									<div class="col-sm-4"><input type="text" class="form-control form-control-sm" name="reference" id="inputReference" readonly=""></div>
									<a style="height: 25px" data-toggle="modal" href="#reference" class="btn btn-primary btn-sm fa fa-search"></a>
								</div>
								<div class="form-group row">
									<div class="col-sm-4 col-sm-offset-2">
										<button class="btn btn-primary btn-sm" type="submit" name="new">Simpan</button>
									</div>
								</div>
							</div>
						</form>
						<!--akhir form-->
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
</div>
<!--modal apmajor-->
<div id="major" class="modal fade bd-example-modal-lg bd-example-modal-sm" aria-hidden="true">
	<div class="modal-dialog modal-lg modal-sm">
		<div class="modal-content">
			<div class="wrapper wrapper-content animated fadeInRight">
				<div class="row">
					<div class="col-sm-12">
						<div class="table-responsive-sm">
							<table class="table table-sm table-striped table-bordered table-hover dataTables-example" >
								<thead>
									<tr>
										<th>No</th>
										<th>Major</th>
										<th>Nama Major</th>
										<th>Kategori</th>
										<th>Aksi</th>
									</tr>
								</thead>
								<tbody>
									<?php 
									$no = 1;
									$data = sqlsrv_query($koneksi2,"SELECT GL.Major,GL.Nama,CategoryA.Nama AS Financial
										FROM CategoryA INNER JOIN GL ON CategoryA.Category = GL.CategoryA
										ORDER BY GL.Major");
									while($d = sqlsrv_fetch_array($data)){
										?>
										<tr>
											<td width="5"><?php echo $no++; ?></td>
											<td ><?php echo $d['Major']; ?></td>
											<td ><?php echo $d['Nama']; ?></td>
											<td ><?php echo $d['Financial']; ?></td>
											<td><a href="#" class="btn btn-success btn-sm fa fa-check-square-o" onclick="ApMajor('<?php echo $d['Major'];?>')"> Pilih</a></td>
										</tr>
										<?php 
									}
									?>
								</tbody>
							</table>
						</div>
					</div>
				</div>                               
			</div>
		</div>
	</div>
</div>
<!--akhir modal apmajor-->
<!--modal apmajor-->
<div id="reference" class="modal fade bd-example-modal-lg bd-example-modal-sm" aria-hidden="true">
	<div class="modal-dialog modal-lg modal-sm">
		<div class="modal-content">
			<div class="wrapper wrapper-content animated fadeInRight">
				<div class="row">
					<div class="col-sm-12">
						<div class="table-responsive-sm">
							<table class="table table-sm table-striped table-bordered table-hover dataTables-example" >
								<thead>
									<tr>
										<th>No</th>
										<th>Major</th>
										<th>Reference</th>
										<th>Nama</th>
										<th>Aksi</th>
									</tr>
								</thead>
								<tbody>
									<?php 
									$no = 1;
									$data = sqlsrv_query($koneksi2,"SELECT * FROM Reference ORDER BY Major");
									while($d = sqlsrv_fetch_array($data)){
										?>
										<tr>
											<td width="5"><?php echo $no++; ?></td>
											<td ><?php echo $d['Major']; ?></td>
											<td ><?php echo $d['Reference']; ?></td>
											<td ><?php echo $d['Nama']; ?></td>
											<td><a href="#" class="btn btn-success btn-sm fa fa-check-square-o" onclick="Reference('<?php echo $d['Reference'];?>')"> Pilih</a></td>
										</tr>
										<?php 
									}
									?>
								</tbody>
							</table>
						</div>
					</div>
				</div>                               
			</div>
		</div>
	</div>
</div>
<!--akhir modal apmajor-->
</div>
<!-- Mainly scripts -->
<script src="assets/js/jquery-3.1.1.min.js"></script>
<script  src="assets/script.js"></script>
<!--javascript for data tables-->
<script>
	$(document).ready(function(){
		$('.dataTables-example').DataTable({
			pageLength: 6,
			responsive: true,
			dom: '<"html5buttons"B>lTfgitp',
			buttons: [

			]

		});
	});
       //function mengambil data APmajor
       function ApMajor(Major){
       	$('#inputMajor').val(Major);
       	$('#major').modal('hide');
       }
        //function mengambil data APmajor
        function Reference(Reference){
        	$('#inputReference').val(Reference);
        	$('#reference').modal('hide');
        }
    </script>
    <script type="text/javascript">
    	$(document).ready(function(){
    		$('#provinsi').change(function(){
    			var id_prov = $(this).val();
    			$.ajax({
    				type: 'POST',
    				url: 'master_customer/get_kabupaten.php',
    				data: 'nama_provinsi='+id_prov,
    				success: function(response){
    					$('#kabupaten').html(response);

    				}
    			});

    		});

    	});
    </script>
</body>
</html>
