
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
        <h2>Master Customer</h2>
        <ol class="breadcrumb">
          <li class="breadcrumb-item">
            <a href="?page=<?=sha1('dashboard')?>">Home</a>
          </li>
          <li class="breadcrumb-item">
            <a href="?page=<?=sha1('master_barang')?>">Master Customer</a>
          </li>
        </ol>
      </div>
    </div>
    <div class="wrapper wrapper-content animated fadeIn">
      <div class="row">
        <div class="col-lg-12">
          <div class="tabs-container">
            <ul class="nav nav-tabs" role="tablist">
              <li><a class="nav-link active" data-toggle="tab" href="#tab-1">Master Customer</a></li>
              <li><a class="nav-link" data-toggle="tab" href="#tab-2">Detail Customer</a></li>
            </ul>
            <form method="post" action="?page=<?=sha1('proses_barang')?>" >
              <div class="tab-content">
                <div role="tabpanel" id="tab-1" class="tab-pane active">
                  <div class="panel-body">
                    <!--body form-->

                      <div class="row">
                        <div class="col-md-12">
                            <div class="ibox-title">
                              <h5>Master Customer</h5>
                              <a href="?page=<?=sha1('customer')?>" style="float: right;" type="button" class="btn btn-sm btn-primary">+Tambah</a>
                            </div>
                            <div class="ibox-content">
                              <div class="table-responsive-sm">
                                <table class="table table-sm table-striped table-bordered table-hover dataTables-example" >
                                  <thead>
                                    <tr>
                                      <th>No</th>
                                      <th>Kode Master</th>
                                      <th>Nama Customer</th>
                                      <th>Aksi</th>
                                    </tr>
                                  </thead>
                                  <tbody>
                                    <?php 
                                    $no = 1;
                                    $data = sqlsrv_query($koneksi,"SELECT * FROM tmastercustomer");
                                    while($d = sqlsrv_fetch_array($data)){
                                      ?>
                                      <tr>
                                       <td width="5"><?php echo $no++; ?></td>
                                       <td ><?php echo $d['kode_master']; ?></td>
                                       <td ><?php echo $d['Customer']; ?></td>
                                       <td width="80">
                                         <a href="?page=<?=sha1('edit_customer')?>&kode=<?php echo $d['kode_master'];?>" class="btn btn-success btn-sm fa fa-edit"></a>
                                         <a href="?page=<?=sha1('proses_customer')?>&hapus=<?php echo $d['kode_master'];?>" class="btn btn-danger btn-sm fa fa-trash"></a>
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
               <!--tabs detail kedua-->
               <div role="tabpanel" id="tab-2" class="tab-pane">
                <div class="panel-body">
                      <div class="row">
                        <div class="col-md-12">
                            <div class="ibox-title">
                              <h5>Master Detail Customer</h5>
                              <a href="?page=<?=sha1('detail_customer')?>" style="float: right;" type="button" class="btn btn-sm btn-primary">+Tambah</a>
                            </div>
                            <div class="ibox-content">

                              <div class="table-responsive-sm">
                                <table class="table table-sm table-striped table-bordered table-hover dataTables-example" >
                                  <thead>
                                    <tr>
                                      <th>No</th>
                                      <th>Kode</th>
                                      <th>Nama Usaha</th>
                                       <th>Alamat</th>
                                      <th>Aksi</th>
                                    </tr>
                                  </thead>
                                  <tbody>
                                    <?php 
                                    $no = 1;
                                    $data = sqlsrv_query($koneksi,"SELECT * FROM tcustomer");
                                    while($d = sqlsrv_fetch_array($data)){
                                      ?>
                                      <tr>
                                       <td width="5"><?php echo $no++; ?></td>
                                       <td ><?php echo $d['Kode']; ?></td>
                                       <td ><?php echo $d['Nama']; ?></td>
                                        <td ><?php echo $d['Alamat1']; ?></td>
                                       <td width="80">
                                         <a href="?page=<?=sha1('edit_detail')?>&kode=<?php echo $d['Kode'];?>" class="btn btn-success btn-sm fa fa-edit"></a>
                                         <a href="?page=<?=sha1('proses_customer')?>&delete=<?php echo $d['Kode'];?>" class="btn btn-danger btn-sm fa fa-trash"></a>
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
            </div>
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
    </script>
  </body>
  </html>
