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
                <h2>Master</h2>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="?page=<?=sha1('dashboard')?>">Home</a>
                    </li>
                    <li class="breadcrumb-item active">
                        <strong>Master Barang</strong>
                    </li>
                </ol>
            </div>
        </div>
        <div class="wrapper wrapper-content animated fadeInRight">
            <div class="row">
                <div class="col-md-12">
                    <div class="ibox ">
                        <div class="ibox-title">
                            <h5>Master Barang</h5>
                            <a href="?page=<?=sha1('barang')?>" style="float: right;" type="button" class="btn btn-sm btn-primary">+Tambah</a>
                            <div class="ibox-tools">
                                <a class="collapse-link">
                                    <i class="fa fa-chevron-up"></i>
                                </a>
                            </div>
                        </div>
                        <div class="ibox-content">

                            <div class="table-responsive-sm">
                                <table class="table table-sm table-striped table-bordered table-hover dataTables-example" >
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Kode Barang</th>
                                            <th>Nama Barang</th>
                                            <th>Jenis Usaha</th>
                                            <th>Kelas</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php 
                                        $no = 1;
                                        $data = sqlsrv_query($koneksi,"SELECT a.kode,a.nama,b.nama AS usaha,c.nama AS kelas
                                           FROM (Tbarang a left join Tjenisusaha b ON a.jenisusaha=b.kodejenisusaha)
                                           left join TKelas c on a.kelas=c.kelas");
                                        while($d = sqlsrv_fetch_array($data)){
                                          ?>
                                          <tr>
                                           <td width="5"><?php echo $no++; ?></td>
                                           <td ><?php echo $d['kode']; ?></td>
                                           <td ><?php echo $d['nama']; ?></td>
                                           <td ><?php echo $d['usaha']; ?></td>
                                           <td ><?php echo $d['kelas']; ?></td>
                                           <td width="80">
                                               <a href="?page=<?=sha1('edit_barang')?>&kode=<?php echo $d['kode'];?>" class="btn btn-success btn-sm fa fa-edit"></a>
                                               <a href="?page=<?=sha1('proses_barang')?>&hapus=<?php echo $d['kode'];?>" class="btn btn-danger btn-sm fa fa-trash"></a>
                                           </td>
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
<!-- Mainly scripts -->
<script src="assets/js/jquery-3.1.1.min.js"></script>
<!-- Page-Level Scripts -->
<!--javascript for data tables-->
<script>
    $(document).ready(function(){
        $('.dataTables-example').DataTable({
            pageLength: 10,
            responsive: true,
            dom: '<"html5buttons"B>lTfgitp',
            buttons: [
          
        ]

    });

    });

</script>

</body>

</html>
