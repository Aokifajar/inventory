
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="assets/css/plugins/dataTables/datatables.min.css" rel="stylesheet">
</head>
<body>
    <div id="wrapper">
        <div class="row wrapper border-bottom white-bg page-heading">
            <div class="col-lg-10">
                <h2>Master Barang</h2>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="?page=<?=sha1('dashboard')?>">Home</a>
                    </li>
                    <li class="breadcrumb-item">
                        <a href="?page=<?=sha1('master_barang')?>">Master Barang</a>
                    </li>
                    <li class="breadcrumb-item">
                        <strong>Edit Barang</strong>
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
                        <?php
                        $kode=$_GET['kode'];
                        $ambil=sqlsrv_query($koneksi,"SELECT * FROM Tbarang WHERE kode='$kode'");
                        $data=sqlsrv_fetch_array($ambil);
                        ?>
                        <form method="post" action="?page=<?=sha1('proses_barang')?>&kode=<?php echo $data['kode'];?>" >
                            <div class="tab-content">
                                <div role="tabpanel" id="tab-1" class="tab-pane active">
                                    <div class="panel-body">
                                        <!--body form-->
                                        <div class="ibox-content">
                                            <div class="form-group row">
                                                <label class="col-sm-1 col-form-label">Kode Barang <font color="red">*</font></label>
                                                <div class="col-sm-5">
                                                    <input type="text" class="form-control form-control-sm" name="kode" disabled="" value="<?php echo $data['kode'];?>">
                                                </div>
                                                <label class="col-sm-1 col-form-label">Nama Barang <font color="red">*</font></label>
                                                <div class="col-sm-5"><input type="text" class="form-control form-control-sm" name="nama" value="<?php echo $data['nama'];?>"> 
                                                </div>
                                            </div>
                                            <div class="form-group row"><label class="col-sm-1 col-form-label">Kelas <font color="red">*</font></label>
                                                <div class="col-sm-11"><select class="form-control m-b form-control-sm" name="kelas">
                                                    <option>Pilih Kelas</option>
                                                    <?php
                                                    $query =sqlsrv_query($koneksi,"select * from Tkelas");
                                                    while ($kelas = sqlsrv_fetch_array($query)) {
                                                        if ($data['kelas']==$kelas['kelas']) {
                                                            $select="selected";
                                                        }else{
                                                            $select="";
                                                        }
                                                        echo "<option $select value=".$kelas['kelas'].">".$kelas['nama']."</option>";
                                                     }
                                                      ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group row"><label class="col-sm-1 col-form-label">Divisi <font color="red">*</font></label>
                                            <div class="col-sm-11"><select class="form-control m-b form-control-sm" name="divisi">
                                                <option>Pilih Divisi</option>
                                                <?php
                                                $query =sqlsrv_query($koneksi,"select * from Tdivisi");
                                                while ($divisi = sqlsrv_fetch_array($query)) {
                                                    if ($data['divisi']==$divisi['divisi']) {
                                                        $select="selected";
                                                    }else{
                                                        $select="";
                                                    }
                                                    echo "<option $select value=".$divisi['divisi'].">".$divisi['nama']."</option>";
                                                }
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row"><label class="col-sm-1 col-form-label">Kategori <font color="red">*</font></label>
                                        <div class="col-sm-11">
                                            <select class="form-control m-b form-control-sm" name="kategori">
                                            <option>Pilih Kategori</option>
                                            <?php
                                            $query =sqlsrv_query($koneksi,"select * from Tkategori");
                                            while ($kategori = sqlsrv_fetch_array($query)) {
                                             if ($data['kategori']==$kategori['kategori']) {
                                                $select="selected";
                                            }else{
                                                $select="";
                                            }
                                            echo "<option $select value=".$kategori['kategori'].">".$kategori['nama']."</option>";
                                        }
                                        ?>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group row"><label class="col-sm-1 col-form-label">Satuan <font color="red">*</font></label>
                                    <div class="col-sm-11"><select class="form-control m-b form-control-sm" name="satuan" id="ajax_satuan"  >
                                        <option value="">Pilih Satuan</option>
                                        <?php
                                        $query =sqlsrv_query($koneksi,"select * from TSatuan");
                                        while ($satuan = sqlsrv_fetch_array($query)) {
                                        if ($data['satuan']==$satuan['nama']) {
                                                $select="selected";
                                            }else{
                                                $select="";
                                            }
                                            echo "<option $select value=".$satuan['nama'].">".$satuan['nama']."</option>";
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row"><label class="col-sm-1 col-form-label">konversi</label>
                                <div class="col-sm-11"><select class="form-control m-b form-control-sm" name="konversi"  id="konversi">
                                    <option value="">Pilih </option>
                                    <?php
                                    $versi=$data['satuan'];
                                    $query =sqlsrv_query($koneksi,"SELECT * FROM TKonversisatuan WHERE satuan='$versi'");
                                        while ($konversi = sqlsrv_fetch_array($query)) {
                                        $value=$konversi['nilai'].'-'.$konversi['konversi'];
                                        if ($data['konversisatuan']==$konversi['konversi']) {
                                                $select="selected";
                                            }else{
                                                $select="";
                                            }
                                            echo "<option $select value=".$value.">".$konversi['konversi']."</option>";
                                        }
                                        ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row"><label class="col-sm-1 col-form-label">Nilai</label>
                            <div class="col-sm-2"><input style="width: 80px" type="number" class="form-control form-control-sm" id="nilai" name="nilai" readonly="" value="<?php echo $data['niaikonversisatuan'];?>"> 
                            </div>
                        </div>
                        <div class="form-group row"><label class="col-sm-1 col-form-label">Jenis Usaha <font color="red">*</font></label>
                            <div class="col-sm-11"><select class="form-control m-b form-control-sm" name="usaha" >
                                <option>Pilih Jenis Usaha</option>
                             <?php
                             $query =sqlsrv_query($koneksi,"select * from Tjenisusaha");
                             while ($usaha = sqlsrv_fetch_array($query)) {
                                if ($data['jenisusaha']==$usaha['kodejenisusaha']) {
                                    $select="selected";
                                }else{
                                    $select="";
                                }
                                echo "<option $select value=".$usaha['kodejenisusaha'].">".$usaha['nama']."</option>";
                            }
                            ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row"><label class="col-sm-1 col-form-label">Stock Minimal <font color="red">*</font></label>
                        <div class="col-sm-5"><input  type="number" class="form-control form-control-sm" name="stok" value="<?php echo $data['stockminimal'];?>"> 
                        </div>
                        <label class="col-sm-1 col-form-label">PPnBM <font color="red">*</font></label>
                        <div class="col-sm-5"><input type="number" class="form-control form-control-sm" name="ppnbm" value="<?php echo $data['PPnBM'];?>" > 
                        </div>
                    </div>
                    <div class="form-group row"><label class="col-sm-1 col-form-label">Toleransi fix <font color="red">*</font></label>
                        <div class="col-sm-5"><input type="text" class="form-control form-control-sm" name="fix" value="<?php echo $data['toleransifix'];?>"> 
                        </div>
                        <label class="col-sm-1 col-form-label">Toleransi % <font color="red">*</font></label>
                        <div class="col-sm-5"><input type="text" class="form-control form-control-sm" name="persen" value="<?php echo $data['toleransipersen'];?>"> 
                        </div>
                    </div>
                    <div class="form-group row"><label class="col-sm-1 col-form-label">Timbangan <font color="red">*</font></label>
                        <div class="col-sm-11"><select class="form-control m-b form-control-sm" name="timbangan" >
                            <option>Pilih Status Timbangan</option>
                            <?php
                            $query =sqlsrv_query($koneksi,"select * from Tststimbangan");
                            while ($timbangan = sqlsrv_fetch_array($query)) {
                             if ($data['ststimbangan']==$timbangan['kode']) {
                                    $select="selected";
                                }else{
                                    $select="";
                                }
                                echo "<option $select value=".$timbangan['kode'].">".$timbangan['ket']."</option>";
                            }
                            ?>
                        </select>
                    </div>
                </div>
                <div class="form-group row"><label class="col-sm-1 col-form-label">Status<font color="red">*</font></label>
                    <div class="col-sm-2"><input style="width: 50px" type="text" class="form-control form-control-sm" name="status" value="<?php echo $data['status'];?>"> 
                    </div>
                </div>
                <div class="form-group row"><label class="col-sm-1 col-form-label">Keterangan<font color="red">*</font></label>
                    <div class="col-sm-11"><input type="text" class="form-control form-control-sm" name="keterangan" value="<?php echo $data['keterangan'];?>"> 
                    </div>
                </div>

            </div>
        </div>
    </div>
    <!--tabs detail kedua-->
    <div role="tabpanel" id="tab-2" class="tab-pane">
        <div class="panel-body">
         <div class="ibox-content">
            <div class="form-group  row"><label class="col-sm-1 col-form-label">APmajor</label>
                <div class="col-sm-4"><input type="text" class="form-control form-control-sm" name="apmajor" id="inputApMajor" readonly="" value="<?php echo $data['APmajor'];?>"></div>
                <a style="height: 25px" data-toggle="modal" href="#apmajor" class="btn btn-primary btn-sm fa fa-search"></a>
            </div>
            <div class="form-group row"><label class="col-sm-1 col-form-label">APRef</label>
                <div class="col-sm-4"><input type="text" class="form-control form-control-sm" name="apref" id="inputAPRef" readonly="" value="<?php echo $data['APRef'];?>"></div>
                <a style="height: 25px" data-toggle="modal" href="#apref" class="btn btn-primary btn-sm fa fa-search"></a>
            </div>
            <div class="form-group row"><label class="col-sm-1 col-form-label">ARmajor</label>
                <div class="col-sm-4"><input type="text" class="form-control form-control-sm" name="armajor" id="inputARmajor" readonly="" value="<?php echo $data['ARmajor'];?>"></div>
                <a style="height: 25px" data-toggle="modal" href="#armajor" class="btn btn-primary btn-sm fa fa-search"></a>
            </div>
            <div class="form-group row"><label class="col-sm-1 col-form-label">ARRef</label>
                <div class="col-sm-4"><input type="text" class="form-control form-control-sm" name="arref" id="inputARRef" readonly="" value="<?php echo $data['ARRef'];?>"></div>
                <a style="height: 25px" data-toggle="modal" href="#arref" class="btn btn-primary btn-sm fa fa-search"></a>
            </div>
            <div class="form-group row"><label class="col-sm-1 col-form-label">PSDmajor</label>
                <div class="col-sm-4"><input type="text" class="form-control form-control-sm" name="psdmajor"  id="inputPSDmajor" readonly="" value="<?php echo $data['PSDmajor'];?>"></div>
                <a style="height: 25px" data-toggle="modal" href="#psdmajor" class="btn btn-primary btn-sm fa fa-search"></a>
            </div>
            <div class="form-group row"><label class="col-sm-1 col-form-label">PSDRef</label>
                <div class="col-sm-4"><input type="text" class="form-control form-control-sm" name="psdref" id="inputPSDRef" readonly="" value="<?php echo $data['PSDRef'];?>"></div>
                <a style="height: 25px" data-toggle="modal" href="#psdref" class="btn btn-primary btn-sm fa fa-search"></a>
            </div>
            <div class="form-group row">
                <div class="col-sm-4 col-sm-offset-2">
                    <button class="btn btn-primary btn-sm" type="submit" name="edit">Simpan</button>
                    <a href="?page=<?=sha1('master_barang');?>" class="btn btn-sm btn-warning">Kembali</a>
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
<div id="apmajor" class="modal fade bd-example-modal-lg bd-example-modal-sm" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-sm">
        <div class="modal-content">
            <div class="wrapper wrapper-content animated fadeInRight">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="table-responsive">
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
<!--modal apref-->
<div id="apref" class="modal fade bd-example-modal-lg bd-example-modal-sm" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-sm">
        <div class="modal-content">
            <div class="wrapper wrapper-content animated fadeInRight">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="table-responsive">
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
                                         <td><a href="#" class="btn btn-success btn-sm fa fa-check-square-o" onclick="APRef('<?php echo $d['Major'];?>')"> Pilih</a></td>
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
<!--akhir modal apref-->
<!--modal armajor-->
<div id="armajor" class="modal fade bd-example-modal-lg bd-example-modal-sm" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-sm">
        <div class="modal-content">
            <div class="wrapper wrapper-content animated fadeInRight">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="table-responsive">
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
                                         <td><a href="#" class="btn btn-success btn-sm fa fa-check-square-o" onclick="ARmajor('<?php echo $d['Major'];?>')"> Pilih</a></td>
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
<!--akhir modal armajor-->
<!--modal arref-->
<div id="arref" class="modal fade bd-example-modal-lg bd-example-modal-sm" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-sm">
        <div class="modal-content">
            <div class="wrapper wrapper-content animated fadeInRight">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="table-responsive">
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
                                         <td><a href="#" class="btn btn-success btn-sm fa fa-check-square-o" onclick="ARRef('<?php echo $d['Major'];?>')"> Pilih</a></td>
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
<!--akhir modal arref-->
<!--modal psdmajor-->
<div id="psdmajor" class="modal fade bd-example-modal-lg bd-example-modal-sm" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-sm">
        <div class="modal-content">
            <div class="wrapper wrapper-content animated fadeInRight">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="table-responsive">
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
                                         <td><a href="#" class="btn btn-success btn-sm fa fa-check-square-o" onclick="PSDmajor('<?php echo $d['Major'];?>')"> Pilih</a></td>
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
<!--akhir modal psdmajor-->
<!--modal psdref-->
<div id="psdref" class="modal fade bd-example-modal-lg bd-example-modal-sm" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-sm">
        <div class="modal-content">
            <div class="wrapper wrapper-content animated fadeInRight">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="table-responsive">
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
                                         <td><a href="#" class="btn btn-success btn-sm fa fa-check-square-o" onclick="PSDRef('<?php echo $d['Major'];?>')"> Pilih</a></td>
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
<!--akhir modal psdref-->
</div>
<!-- Mainly scripts -->
<script src="assets/js/jquery-3.1.1.min.js"></script>
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
        $('#inputApMajor').val(Major);
        $('#apmajor').modal('hide');
    }
     //function mengambil data APRef
     function APRef(Major){
        $('#inputAPRef').val(Major);
        $('#apref').modal('hide');
    }
    //function mengambil data ARmajor
    function ARmajor(Major){
        $('#inputARmajor').val(Major);
        $('#armajor').modal('hide');
    }
    //function mengambil data ARRef
    function ARRef(Major){
        $('#inputARRef').val(Major);
        $('#arref').modal('hide');
    }
     //function mengambil data PSDmajor
     function PSDmajor(Major){
        $('#inputPSDmajor').val(Major);
        $('#psdmajor').modal('hide');
    }
     //function mengambil data PSDRef
     function PSDRef(Major){
        $('#inputPSDRef').val(Major);
        $('#psdref').modal('hide');
    }
</script>
<script type="text/javascript">
 $(document).ready(function(){
    $('#ajax_satuan').change(function(){
        var id_satuan = $(this).val();
        $('#nilai').val('');
        $.ajax({
            type: 'POST',
            url: 'master_barang/get_konversi.php',
            data: 'satuan='+id_satuan,
            success: function(response){
              $('#konversi').html(response);
          }
      });
    });
    $('#konversi').change(function(){
        var nilai_id = $(this).val().split("-");
        $('#nilai').val(nilai_id[0]);
    })

});
</script>
</body>
</html>
