<?php
session_start();
require_once 'Api/oopkoneksi.php';
require_once 'Api/lihatdatamaster.php';
$obj = new updateidsuratpengantar;
if ($_SERVER['REQUEST_METHOD'] == 'POST') :
    $id = $_POST['nomor'];
    $idsp = $_POST['idsurat'];
    
    if ($obj->idspsktm($id, $idsp)) :

    else :
        echo ' <div class="alert alert-danger">Data Gagal Ditambahkan</div>';
    endif;
endif;
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>S-Kepuharjo boss</title>

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="css/sb-admin-2.min.css" rel="stylesheet">
  <link href="css/sb-admin-2.css" rel="stylesheet">
  <link rel="shortcut icon" href="images/logo_kepuharjo.png" />
</head>
<body>
<?php
// include('include/header.php');
// include('include/navbar.php');
?>
<body id="page-top">
    <div id="wrapper">
      <?php
      include 'include/navbar.php';
      ?>


      <div id="content-wrapper" class="d-flex flex-column">
      <!-- Main Content -->
        <div id="content">
          <!-- Topbar -->
          <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

            <!-- Sidebar Toggle (Topbar) -->
            <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
              <i class="fa fa-bars"></i>
            </button>

            <!-- Topbar Navbar -->
            <ul class="navbar-nav ml-auto">

              <div class="topbar-divider d-none d-sm-block"></div>

              <!-- Nav Item - User Information -->
              <li class="nav-item dropdown no-arrow">
                <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?php echo $_SESSION['nama_lengkap']; ?>
                  </span>

                  <?php
                  include_once 'Api/oopkoneksi.php';
                  include_once 'Api/lihatdatamaster.php';


                  $obj = new readprofile;
                  $data = $obj->lihatprofile();

                  if ($data->rowCount() > 0) {
                    while ($row = $data->fetch(PDO::FETCH_ASSOC)) {

                  ?>
                      <img class="img-profile rounded-circle" src="Api/uploads/<?php echo $row['image'] ?> ">
                  <?php }
                  } ?>

                </a>
                <!-- Dropdown - User Information -->
                <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                  <a class="dropdown-item" href="profile.php">
                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                    Profile
                  </a>
                  <?php if ($_SESSION['hak_akses'] == "1") { ?>
                    <a class="dropdown-item" href="kelurahan.php">
                      <i class="fa fa-building fa-sm fa-fw mr-2 text-gray-400"></i>
                      Kelurahan
                    </a>
                  <?php } elseif ($_SESSION['hak_akses'] != "1") {
                  } else {
                  } ?>
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                    Logout
                  </a>
                </div>
              </li>
            </ul>
          </nav>
          <!-- End of Topbar -->
          <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Apakah Anda Ingin keluar?</h5>
                  <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                  </button>
                </div>
                <div class="modal-body">Maka anda akan diarahkan ke halaman landing page.</div>
                <div class="modal-footer">
                  <button class="btn btn-secondary" type="button" data-dismiss="modal">Tidak</button>
                  <a class="btn btn-primary" href="logout.php">Iya</a>
                </div>
              </div>
            </div>
          </div>
          <div class="container-fluid">

            <!-- Page Heading -->
            <div class="d-sm-flex align-items-center justify-content-between mb-4">
                <h1 class="h3 mb-4 text-gray-800">Surat Diproses</h1>
                <!-- Topbar Search -->
                <form class="d-grid gap-2 d-md-flex justify-content-md-end navbar-search">
                    <div class="input-group">
                    <input type="text" id="searchInput" onkeyup="searchTable()" class="form-control bg-light border-2 small" placeholder="Cari Surat Diproses..." >
                    
                    </div>
                </form>
            </div>
            <div class="row">
                <div class="col-lg-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Surat Diproses</h4>
                            <p class="card-description">
                                Menampilkan data surat yang diproses
                            </p>
                            <div class="table-responsive">
                            <table id="myTable" class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>
                                                No
                                            </th>
                                            <th>
                                                NIK
                                            </th>
                                            <th>
                                                Nama Lengkap
                                            </th>
                                            <th>
                                                Jenis Surat
                                            </th>
                                            <th>
                                                Tanggal
                                            </th>
                                            <th>
                                                Status
                                            </th>
                                            <th>
                                                Aksi
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody> 
                                        <!-- suratsktm -->
                                        <?php
                                        require_once 'Api/oopkoneksi.php';
                                        require_once 'Api/suratdiproses.php';


                                        $obj = new sktm;
                                        $data = $obj->suratdiproses();
                                        $nomor = 1;
                                        if ($data->rowCount() > 0) {
                                            while ($row = $data->fetch(PDO::FETCH_ASSOC)) {
                                                $row['no_surat'];
                                                $row['tempat_lahir'];
                                                $row['tanggal_lahir'];
                                                $row['jenis_kelamin'];
                                                $row['kebangsaan'];
                                                $row['agama'];
                                                $row['status'];
                                                $row['pekerjaan'];
                                                $row['nik'];
                                                $row['alamat'];
                                                $row['no_pengantar'];
                                                $row['tgl_pengajuan'];
                                                $row['keperluan'];
                                                $row['tgl_dibuat'];
                                                $row['image'];
                                                $row['no_hp'];
                                                $row['RW'];
                                                $row['RT'];
                                                $row['id_surat'];
                                        ?>

                                                <tr>
                                                    <td scope="col"><?php echo $nomor++; ?></td>
                                                    <td scope="col"><?php echo $row['id_akun']; ?></td>
                                                    <td scope="col"><?php echo $row['nama']; ?></td>
                                                    <td scope="col"><?php echo 'Surat SKTM'; ?></td>
                                                    <td scope="col"><?php echo $row['tgl_pengajuan']; ?></td>
                                                    <td scope="col"><span class="badge badge-warning"><?php echo $row['status_surat']; ?></span></td>

                                                    <td>
                                                        <?php //Dibagian Ini Modalnya Oke
                                                        ?>
                                                        <form action="pdfsktm.php" method="post">
                                                            <a class="btn btn-success btn-sm btn-icon-text mr-3" href="" data-toggle="modal" data-target="#PreviewsktmModal<?php echo $row['id_akun']; ?>">
                                                                Preview Data
                                                            </a>
                                                            <div class="modal fade" id="PreviewsktmModal<?php echo $row['id_akun']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                                <div class="modal-dialog modal-dialog modal-lg modal-dialog-centered" role="document">
                                                                    <div class="modal-content">
                                                                        <div class="modal-header">
                                                                            <h5 class="modal-title" id="exampleModalLabel">Preview Surat </h5>
                                                                            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                                                                <span aria-hidden="true">x</span>
                                                                            </button>
                                                                        </div>
                                                                        <style>
                                                                            .form-group {
                                                                                margin-left: 10%;
                                                                                margin-right: 10%;
                                                                            }
                                                                        </style>
                                                                        <!-- <form action="pdfsktm.php" method="post"> -->
                                                                            <div class="form-group">
                                                                            <form action="Api/update/setujuiRTSKTM.php" method="post">   
                                                                                
                                                                            <?php if($_SESSION['hak_akses']=='1'){?>
                                                                                <div class="form-group">
                                                                            <label>Nomor Surat </label>
                                                                            <input type="text" name="nomor" class="form-control" value="<?php echo $row['no_surat']; ?>" maxlength="50" required="">
                                                                            <span class="text-danger">
                                                                            </div>
                                                                            <div class="form-group">
                                                                            <label>Tanggal Surat Dibuat</label>
                                                                            <input type="text" name="tanggalsurat" class="form-control" value="<?php echo $tgl_dibuat = date("d "); $bulan = date("F"); 
                                                                            if($bulan=="January"){
                                                                                echo "Januari";
                                                                            }elseif($bulan=="February"){
                                                                                echo "Februari";
                                                                            }elseif($bulan=="March"){
                                                                                echo "Maret";
                                                                            }elseif($bulan=="April"){
                                                                                echo "April";
                                                                            }elseif($bulan=="May"){
                                                                                echo "Mei";
                                                                            }elseif($bulan=="June"){
                                                                                echo "Juni";
                                                                            }elseif($bulan=="July"){
                                                                                echo "Juli";
                                                                            }elseif($bulan=="August"){
                                                                                echo "Agustus";
                                                                            }elseif($bulan=="September"){
                                                                                echo "September";
                                                                            }elseif($bulan=="october"){
                                                                                echo "Oktober";
                                                                            }elseif($bulan=="November"){
                                                                                echo "November";
                                                                            }elseif($bulan=="December"){
                                                                                echo "Desember";
                                                                            }else{}
                                                                            echo $tahun = date(" Y");
                                                                            ?>" maxlength="50" required="">
                                                                            <span class="text-danger">
                                                                        </div>
                                                                            <?php }elseif($_SESSION['hak_akses']== '2'){
                                                                                }elseif($_SESSION['hak_akses']== '3'){
                                                                                }else{} ?>
                                                                                <div class="form-group">
                                                                            <label>Nomor Surat Pengantar</label>
                                                                              
                                                                                <input type="text" name="nopengantarsurat" class="form-control" value="<?php echo $row['no_pengantar'];?> " maxlength="50" required="">
                                                                            </div>
                                                                            </form>
                                                                            <div class="form-group">
                                                                                <label>NIK</label>
                                                                                <input type="text" name="nik" class="form-control" value="<?php echo $row['nik']; ?>" maxlength="50" required="">
                                                                                <span class="text-danger">
                                                                            </div>
                                                                            <div class="form-group">
                                                                                <label>Nama </label>
                                                                                <input type="text" name="nama" class="form-control" value="<?php echo $row['nama']; ?>" maxlength="50" required="">
                                                                            </div>
                                                                            <div class="form-group">
                                                                                <label>Tempat, Tanggal Lahir </label>
                                                                                <input type="text" name="ttl" class="form-control" value="<?php echo $row['tempat_lahir']; ?> <?php echo ", "; ?> <?php echo $row['tanggal_lahir']; ?>" maxlength="50" required="">
                                                                            </div>
                                                                            <div class="form-group">
                                                                                <label>Jenis kelamin</label>
                                                                                <input type="text" name="kelamin" class="form-control" value="<?php echo $row['jenis_kelamin']; ?>" maxlength="50" required="">
                                                                            </div>
                                                                            <div class="form-group ">
                                                                                <label>Kebangsaan/Agama</label>
                                                                                <input type="text" name="kebangsaan" class="form-control" value="<?php echo  $row['kebangsaan']; ?> <?php echo "/"; ?>  <?php echo  $row['agama']; ?>" maxlength="30" required="">
                                                                            </div>
                                                                            <div class="form-group">
                                                                                <label>Status</label>
                                                                                <input type="text" name="status" class="form-control" value="<?php echo $row['status']; ?>" maxlength="50" required="">
                                                                                <span class="text-danger">
                                                                            </div>
                                                                            <div class="form-group">
                                                                                <label>Pekerjaan</label>
                                                                                <input type="text" name="pekerjaan" class="form-control" value="<?php echo $row['pekerjaan']; ?>" maxlength="50" required="">
                                                                                <span class="text-danger">
                                                                            </div>
                                                                            <div class="form-group">
                                                                                <label>Alamat</label>
                                                                                <input type="text" name="alamat" class="form-control" value="<?php echo $row['alamat']; ?>" maxlength="50" required="">
                                                                                <span class="text-danger">
                                                                            </div>
                                                                            <div class="form-group">
                                                                                <label>Tanggal Pengajuan</label>
                                                                                <input type="text" name="tglpengajuan" class="form-control" value="<?php echo $row['tgl_pengajuan'] ?>" maxlength="50" required="">
                                                                                <span class="text-danger">
                                                                            </div>
                                                                            <div class="form-group">
                                                                                <label>Keperluan Surat</label>
                                                                                <input type="text" name="keperluan" class="form-control" value="<?php echo $row['keperluan']; ?>" maxlength="50" required="">
                                                                                
                                                                            </div>
                                                                            
                                                                            <div class="form-group">
                                                                                <label>Kartu Keluarga</label>
                                                                                <input type="hidden" name="surattt" class="form-control" value="<?php echo $row['id_surat']; ?>" maxlength="50" required="">
                                                                                <span class="text-danger">
                                                                            </div>
                                                                            <div class="form-group">
                                                                                <img src="Api/uploads/<?php echo $row['image'];?>" class="img-thumbnail" alt="Responsive image">
                                                                                
                                                                            </div>
                                                                            <?php
                                                                    if ($_SESSION['hak_akses'] == "1") {
                                                                    ?>
                                                                    
                                                                    <div class="modal-footer">
                                                                    <input type="submit" class="btn btn-primary" name="download" value="Download">
                                                                    <input type="submit" class="btn btn-primary" name="kirim" value="Kirim">
                                                                    <button class="btn btn-secondary" type="button" data-dismiss="modal" onClick="window.open('https://wa.me/62<?php echo $row['no_hp']; ?>');" target="_blank">Kirim Via WhatsApp</button>
                                                                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Kembali</button>
                                                                    </div>
                                                                    <?php 
                                                                    }elseif($_SESSION['hak_akses'] == "2"){
                                                                        ?>
                                                                        <form action="surat-diproses.php" method="post">
                                                                    <div class="modal-footer">
                                                                    <a class="btn btn-primary" href="Api/update/setujuiRTSKTM.php?kode=<?php echo $row['id_surat']?>">Setujui</a>
                                                                    <a class="btn btn-danger" href="Api/update/updatetolaksktm.php?kode=<?php echo $row['id_surat']?>">Tolak</a>
                                                                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Kembali</button>
                                                                    </div>
                                                                    </form>
                                                                        <?php
                                                                    }elseif($_SESSION['hak_akses'] == "3"){
                                                                        ?>
                                                                    <div class="modal-footer">
                                                                    <a class="btn btn-primary" href="Api/update/setujuiRWSKTM.php?kode=<?php echo $row['id_surat']?>">Setujui</a>
                                                                    <a class="btn btn-danger" href="Api/update/RWupdatetolaksktm.php?kode=<?php echo $row['id_surat']?>">Tolak</a>
                                                                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Kembali</button>
                                                                    </div>
                                                                        <?php

                                                                    }else{
                                                                        echo "";
                                                                    }
                                                                    ?>
                                                                        </form>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <?php //Sampai Sini 
                                                            ?>
                                                    </td>
                                                </tr>
                                        <?php  }
                                        } ?>

                                        <!-- suratdomisili -->
                                        <?php
                                        require_once 'Api/oopkoneksi.php';
                                        require_once 'Api/suratdiproses.php';


                                        $obj = new domisili;
                                        $data = $obj->suratdiproses();
                                        $nomor = 1;
                                        if ($data->rowCount() > 0) {
                                            while ($row = $data->fetch(PDO::FETCH_ASSOC)) {
                                                $row['no_surat'];
                                                $row['tempat_lahir'];
                                                $row['tanggal_lahir'];
                                                $row['jenis_kelamin'];
                                                $row['kebangsaan'];
                                                $row['agama'];
                                                $row['status_perkawinan'];
                                                $row['pekerjaan'];
                                                $row['nik'];
                                                $row['alamat'];
                                                $row['RT'];
                                                $row['RW'];
                                                $row['no_pengantar'];
                                                $row['tgl_surat_pengantar'];
                                                $row['alamat_domisili_kel_kepu'];
                                                $row['surat_digunakan_untuk'];
                                                $row['tgl_surat_dibuat'];
                                                $row['tgl_pengajuan'];
                                                $row['images'];
                                                $row['no_hp'];
                                                $row['status_surat'];
                                        ?>
                                                <tr>
                                                    <td scope="col"><?php echo $nomor++; ?></td>
                                                    <td scope="col"><?php echo $row['id_akun']; ?></td>
                                                    <td scope="col"><?php echo $row['nama']; ?></td>
                                                    <td scope="col"><?php echo 'Surat Domisili'; ?></td>
                                                    <td scope="col"><?php echo $row['tgl_surat_pengantar']; ?></td>
                                                    <td scope="col"><span class="badge badge-warning"><?php echo $row['status_surat']; ?></span></td>

                                                    <td>
                                                        <?php //Dibagian Ini Modalnya Oke
                                                        ?>
                                                        <form action="pdfdomisili.php" method="post">
                                                            <a class="btn btn-success btn-sm btn-icon-text mr-3" href="" data-toggle="modal" data-target="#PreviewdomisiliModal<?php echo $row['id_akun']; ?>">
                                                                Preview Data
                                                            </a>
                                                            <div class="modal fade" id="PreviewdomisiliModal<?php echo $row['id_akun']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                                <div class="modal-dialog modal-dialog modal-lg modal-dialog-centered" role="document">
                                                                    <div class="modal-content">
                                                                        <div class="modal-header">
                                                                            <h5 class="modal-title" id="exampleModalLabel">Preview Surat </h5>
                                                                            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                                                                <span aria-hidden="true">x</span>
                                                                            </button>
                                                                        </div>
                                                                        <style>
                                                                            .form-group {
                                                                                margin-left: 10%;
                                                                                margin-right: 10%;
                                                                            }
                                                                        </style>
                                                                        <div class="form-group">
                                                                            
                                                                                <?php if($_SESSION['hak_akses']=='1'){?>
                                                                                <div class="form-group">
                                                                                <label>Nomor Surat</label>
                                                                            <input type="text" name="nomor" class="form-control" value="<?php echo $row['no_surat']; ?>" maxlength="50" required="">
                                                                            <span class="text-danger">
                                                                            </div>
                                                                            <div class="form-group">
                                                                            <label>Tanggal Surat Dibuat</label>
                                                                            <input type="text" name="tanggalsurat" class="form-control" value="<?php echo $tgl_dibuat = date("d "); $bulan = date("F"); 
                                                                            if($bulan=="January"){
                                                                                echo "Januari";
                                                                            }elseif($bulan=="February"){
                                                                                echo "Februari";
                                                                            }elseif($bulan=="March"){
                                                                                echo "Maret";
                                                                            }elseif($bulan=="April"){
                                                                                echo "April";
                                                                            }elseif($bulan=="May"){
                                                                                echo "Mei";
                                                                            }elseif($bulan=="June"){
                                                                                echo "Juni";
                                                                            }elseif($bulan=="July"){
                                                                                echo "Juli";
                                                                            }elseif($bulan=="August"){
                                                                                echo "Agustus";
                                                                            }elseif($bulan=="September"){
                                                                                echo "September";
                                                                            }elseif($bulan=="october"){
                                                                                echo "Oktober";
                                                                            }elseif($bulan=="November"){
                                                                                echo "November";
                                                                            }elseif($bulan=="December"){
                                                                                echo "Desember";
                                                                            }else{}
                                                                            echo $tahun = date(" Y");
                                                                            ?>" maxlength="50" required="">
                                                                            <span class="text-danger">
                                                                        </div>
                                                                            <?php }elseif($_SESSION['hak_akses']== '2'){
                                                                                }elseif($_SESSION['hak_akses']== '3'){
                                                                                }else{} ?>
                                                                                <div class="form-group">
                                                                            <label>Nomor Surat Pengantar</label>
                                                                              
                                                                                <input type="text" name="nopengantarsurat" class="form-control" value="<?php echo $row['no_pengantar'];?> " maxlength="50" required="">
                                                                            </div>
                                                                            </form>
                                                                        <div class="form-group">
                                                                            <label>Nama</label>
                                                                            <input type="text" name="nama" class="form-control" value="<?php echo $row['nama']; ?>" maxlength="50" required="">
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label>Tempat, Tanggal Lahir</label>
                                                                            <input type="text" name="ttl" class="form-control" value="<?php echo $row['tempat_lahir']; ?> <?php echo $row['tanggal_lahir']; ?>" maxlength="50" required="">
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label>Jenis kelamin</label>
                                                                            <input type="text" name="kelamin" class="form-control" value="<?php echo $row['jenis_kelamin']; ?>" maxlength="50" required="">
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label>Kebangsaan/Agama</label>
                                                                            <input type="text" name="kebangsaan" class="form-control" value="<?php echo  $row['kebangsaan']; ?> <?php echo "/"; ?>  <?php echo  $row['agama']; ?>" maxlength="50" required="">
                                                                        </div>
                                                                        <div class="form-group ">
                                                                            <label>Status</label>
                                                                            <input type="text" name="status" class="form-control" value="<?php echo $row['status_perkawinan']; ?>" maxlength="30" required="">
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label>Pekerjaan</label>
                                                                            <input type="text" name="pekerjaan" class="form-control" value="<?php echo $row['pekerjaan']; ?>" maxlength="50" required="">
                                                                            <span class="text-danger">
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label>NIK</label>
                                                                            <input type="text" name="nik" class="form-control" value="<?php echo $row['nik']; ?>" maxlength="50" required="">
                                                                            <span class="text-danger">
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label>Alamat</label>
                                                                            <input type="text" name="alamat" class="form-control" value="<?php echo $row['alamat']; ?>" maxlength="50" required="">
                                                                            <span class="text-danger">
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label>Surat Pengantar</label>
                                                                            <input type="text" name="rtrw" class="form-control" value="<?php echo "RT. " ?><?php echo  $row['RT']; ?><?php echo " RW."; ?> <?php echo  $row['RW']; ?>" maxlength="50" required="">
                                                                            <span class="text-danger">
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label>Tanggal Surat Pengantar</label>
                                                                            <input type="text" name="tglpengantarsurat" class="form-control" value="<?php echo $row['tgl_surat_pengantar']; ?>" maxlength="50" required="">
                                                                            <span class="text-danger">
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label>Alamat Domisili</label>
                                                                            <input type="text" name="alamat" class="form-control" value="<?php echo $row['alamat_domisili_kel_kepu']; ?>" maxlength="50" required="">
                                                                            <span class="text-danger">
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label>Tanggal Pengajuan</label>
                                                                            <input type="text" name="tglpengajuan" class="form-control" value="<?php echo $row['tgl_pengajuan']; ?>" maxlength="50" required="">
                                                                            <span class="text-danger">
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label>Keperluan Surat</label>
                                                                            <input type="text" name="ketsurat" class="form-control" value="<?php echo $row['surat_digunakan_untuk']; ?>" maxlength="50" required="">
                                                                            <span class="text-danger">
                                                                        </div>
                                                                       
                                                                        <div class="form-group">
                                                                            <label>Kartu Keluarga</label>
                                                                            <input type="hidden" name="surattt" class="form-control" value="<?php echo $row['id_surat']; ?>" maxlength="50" required="">
                                                                                <span class="text-danger">
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <img src="Api/uploads/<?php echo $row['images']; ?>" class="img-thumbnail" alt="Responsive image">
                                                                        </div>
                                                                        <?php
                                                                    if ($_SESSION['hak_akses'] == "1") {
                                                                    ?>
                                                                    
                                                                    <div class="modal-footer">
                                                                    <input type="submit" class="btn btn-primary" name="download" value="Download">
                                                                    <input type="submit" class="btn btn-primary" name="kirim" value="Kirim">
                                                                    <button class="btn btn-secondary" type="button" data-dismiss="modal" onClick="window.open('https://wa.me/62<?php echo $row['no_hp']; ?>');" target="_blank">Kirim Via WhatsApp</button>
                                                                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Kembali</button>
                                                                    </div>
                                                                    <?php 
                                                                    }elseif($_SESSION['hak_akses'] == "2"){
                                                                        ?>
                                                                    <div class="modal-footer">
                                                                    <a class="btn btn-primary" href="Api/update/setujuiRTDomisili.php?kode=<?php echo $row['id_surat']?>">Setujui</a>
                                                                    <a class="btn btn-danger" href="Api/update/updatetolakdomisili.php?kode=<?php echo $row['id_surat']?>">Tolak</a>
                                                                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Kembali</button>
                                                                    </div>
                                                                        <?php
                                                                    }elseif($_SESSION['hak_akses'] == "3"){
                                                                        ?>
                                                                    <div class="modal-footer">
                                                                    <a class="btn btn-primary" href="Api/update/setujuiRWDomisili.php?kode=<?php echo $row['id_surat']?>">Setujui</a>
                                                                    <a class="btn btn-danger" href="Api/update/RWupdatetolakdomisili.php?kode=<?php echo $row['id_surat']?>">Tolak</a>
                                                                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Kembali</button>
                                                                    </div>
                                                                        <?php

                                                                    }else{
                                                                        echo "";
                                                                    }
                                                                    ?>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            </form>
                                                            <?php //Sampai Sini 
                                                            ?>
                                                    </td>
                                                </tr>
                                        <?php  }
                                        } ?>

                                        <!-- suratbelumnikah -->
                                        <?php
                                        require_once 'Api/oopkoneksi.php';
                                        require_once 'Api/suratdiproses.php';


                                        $obj = new belum_menikah;
                                        $data = $obj->suratdiproses();
                                        $nomor = 1;
                                        if ($data->rowCount() > 0) {
                                            while ($row = $data->fetch(PDO::FETCH_ASSOC)) {

                                                $row['nama'];
                                                $row['no_surat'];
                                                $row['tempat_lahir'];
                                                $row['tanggal_lahir'];
                                                $row['jenis_kelamin'];
                                                $row['kebangsaan'];
                                                $row['agama'];
                                                $row['status'];
                                                $row['pekerjaan'];
                                                $row['nik'];
                                                $row['alamat'];
                                                $row['tgl_pengajuan'];
                                                $row['surat_digunakan'];
                                                $row['tgl_surat_dibuat'];
                                                $row['no_pengantar'];
                                                $row['no_hp'];

                                        ?>
                                                <tr>
                                                    <td scope="col"><?php echo $nomor++; ?></td>
                                                    <td scope="col"><?php echo $row['id_akun']; ?></td>
                                                    <td scope="col"><?php echo $row['nama']; ?></td>
                                                    <td scope="col"><?php echo 'Surat Belum Nikah'; ?></td>
                                                    <td scope="col"><?php echo $row['tgl_pengajuan']; ?></td>
                                                    <td scope="col"><span class="badge badge-warning"><?php echo $row['status_surat']; ?></span></td>

                                                    <td>
                                                        <?php //Dibagian Ini Modalnya Oke
                                                        ?>
                                                        <form action="pdfbelumnikah.php" method="post">
                                                        <a class="btn btn-success btn-sm btn-icon-text mr-3" href="" data-toggle="modal" data-target="#PreviewbelumnikahModal<?php echo $row['id_akun']; ?>">
                                                            Preview Data
                                                        </a>
                                                        <div class="modal fade" id="PreviewbelumnikahModal<?php echo $row['id_akun']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                            <div class="modal-dialog modal-dialog modal-lg modal-dialog-centered" role="document">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h5 class="modal-title" id="exampleModalLabel">Preview Surat </h5>
                                                                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                                                            <span aria-hidden="true">x</span>
                                                                        </button>
                                                                    </div>
                                                                    <style>
                                                                        .form-group {
                                                                            margin-left: 10%;
                                                                            margin-right: 10%;
                                                                        }
                                                                    </style>
                                                                    <div class="form-group"><?php if($_SESSION['hak_akses']=='1'){?>
                                                                                <div class="form-group">
                                                                                <label>Nomor Surat</label>
                                                                            <input type="text" name="nomor" class="form-control" value="<?php echo $row['no_surat']; ?>" maxlength="50" required="">
                                                                            <span class="text-danger">
                                                                            </div>
                                                                            <div class="form-group">
                                                                            <label>Tanggal Surat Dibuat</label>
                                                                            <input type="text" name="tanggalsurat" class="form-control" value="<?php echo $tgl_dibuat = date("d "); $bulan = date("F"); 
                                                                            if($bulan=="January"){
                                                                                echo "Januari";
                                                                            }elseif($bulan=="February"){
                                                                                echo "Februari";
                                                                            }elseif($bulan=="March"){
                                                                                echo "Maret";
                                                                            }elseif($bulan=="April"){
                                                                                echo "April";
                                                                            }elseif($bulan=="May"){
                                                                                echo "Mei";
                                                                            }elseif($bulan=="June"){
                                                                                echo "Juni";
                                                                            }elseif($bulan=="July"){
                                                                                echo "Juli";
                                                                            }elseif($bulan=="August"){
                                                                                echo "Agustus";
                                                                            }elseif($bulan=="September"){
                                                                                echo "September";
                                                                            }elseif($bulan=="october"){
                                                                                echo "Oktober";
                                                                            }elseif($bulan=="November"){
                                                                                echo "November";
                                                                            }elseif($bulan=="December"){
                                                                                echo "Desember";
                                                                            }else{}
                                                                            echo $tahun = date(" Y");
                                                                            ?>" maxlength="50" required="">
                                                                            <span class="text-danger">
                                                                        </div>
                                                                            <?php }elseif($_SESSION['hak_akses']== '2'){
                                                                                }elseif($_SESSION['hak_akses']== '3'){
                                                                                }else{} ?>
                                                                                <div class="form-group">
                                                                            <label>Nomor Surat Pengantar</label>
                                                                            
                                                                                
                                                                                <input type="text" name="nopengantarsurat" class="form-control" value="<?php echo $row['no_pengantar'];?>" maxlength="50" required="">
                                                                            </div>
                                                                    <div class="form-group">
                                                                        <label>Nama</label>
                                                                        <input type="text" name="nama" class="form-control" value="<?php echo $row['nama']; ?>" maxlength="50" required="">
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label>Tempat, Tanggal Lahir</label>
                                                                        <input type="text" name="ttl" class="form-control" value="<?php echo $row['tempat_lahir']; ?>, <?php echo $row['tanggal_lahir']; ?>" maxlength="50" required="">
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label>Jenis kelamin</label>
                                                                        <input type="text" name="kelamin" class="form-control" value="<?php echo $row['jenis_kelamin']; ?>" maxlength="50" required="">
                                                                    </div>
                                                                    <div class="form-group ">
                                                                        <label>Kebangsaan/Agama</label>
                                                                        <input type="text" name="kebangsaan" class="form-control" value="<?php echo $row['kebangsaan']; ?> / <?php echo $row['agama']; ?>" maxlength="30" required="">
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label>Status</label>
                                                                        <input type="text" name="status" class="form-control" value="<?php echo $row['status']; ?>" maxlength="50" required="">
                                                                        <span class="text-danger">
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label>Pekerjaan</label>
                                                                        <input type="text" name="pekerjaan" class="form-control" value="<?php echo $row['pekerjaan']; ?>" maxlength="50" required="">
                                                                        <span class="text-danger">
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label>NIK</label>
                                                                        <input type="text" name="nik" class="form-control" value="<?php echo $row['nik']; ?>" maxlength="50" required="">
                                                                        <span class="text-danger">
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label>Alamat</label>
                                                                        <input type="text" name="alamat" class="form-control" value="<?php echo $row['alamat']; ?>" maxlength="50" required="">
                                                                        <span class="text-danger">
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label>Tanggal Pengajuan</label>
                                                                        <input type="text" name="tglpengajuan" class="form-control" value="<?php echo $row['tgl_pengajuan']; ?>" maxlength="50" required="">
                                                                        <span class="text-danger">
                                                                    </div>
                                                                    <div class="form-group">
                                                                            <label>Keperluan Surat</label>
                                                                            <input type="text" name="ketsurat" class="form-control" value="<?php echo $row['surat_digunakan']; ?>" maxlength="50" required="">
                                                                            <span class="text-danger">
                                                                        </div>
                                                                        
                                                                        <div class="form-group">
                                                                            <label>Kartu Keluarga</label>
                                                                            <input type="hidden" name="surattt" class="form-control" value="<?php echo $row['id_surat']; ?>" maxlength="50" required="">
                                                                                <span class="text-danger">
                                                                        </div>
                                                                    <div class="form-group">
                                                                            <img src="Api/uploads/<?php echo $row['image']; ?>" class="img-thumbnail" alt="Responsive image">
                                                                        </div>
                                                                        <?php
                                                                    if ($_SESSION['hak_akses'] == "1") {
                                                                    ?>
                                                                    
                                                                    <div class="modal-footer">
                                                                    <input type="submit" class="btn btn-primary" name="download" value="Download">
                                                                    <input type="submit" class="btn btn-primary" name="kirim" value="Kirim">
                                                                    <button class="btn btn-secondary" type="button" data-dismiss="modal" onClick="window.open('https://wa.me/62<?php echo $row['no_hp']; ?>');" target="_blank">Kirim Via WhatsApp</button>
                                                                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Kembali</button>
                                                                    </div>
                                                                    <?php 
                                                                    }elseif($_SESSION['hak_akses'] == "2"){
                                                                        ?>
                                                                    <div class="modal-footer">
                                                                    <a class="btn btn-primary" href="Api/update/setujuiRTBelumnikah.php?kode=<?php echo $row['id_surat']?>">Setujui</a>
                                                                    <a class="btn btn-danger" href="Api/update/updatetolakbelummenikah.php?kode=<?php echo $row['id_surat']?>">Tolak</a>
                                                                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Kembali</button>
                                                                    </div>
                                                                        <?php
                                                                    }elseif($_SESSION['hak_akses'] == "3"){
                                                                        ?>
                                                                    <div class="modal-footer">
                                                                    <a class="btn btn-primary" href="Api/update/setujuiRWBelumnikah.php?kode=<?php echo $row['id_surat']?>">Setujui</a>
                                                                    <a class="btn btn-danger" href="Api/update/RWupdatetolakbelummenikah.php?kode=<?php echo $row['id_surat']?>">Tolak</a>
                                                                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Kembali</button>
                                                                    </div>
                                                                        <?php

                                                                    }else{
                                                                        echo "";
                                                                    }
                                                                    ?>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        </form>
                                                        <?php //Sampai Sini 
                                                        ?>
                                                    </td>
                                                </tr>
                                        <?php  }
                                        } ?>

                                        <!-- suratkematian -->
                                        <?php
                                        require_once 'Api/oopkoneksi.php';
                                        require_once 'Api/suratdiproses.php';


                                        $obj = new kematian;
                                        $data = $obj->suratdiproses();
                                        $nomor = 1;
                                        if ($data->rowCount() > 0) {
                                            while ($row = $data->fetch(PDO::FETCH_ASSOC)) {

                                                $row['no_surat'];
                                                $row['nama_almarhum'];
                                                $row['saksi_kematian'];
                                                $row['hubungan'];
                                                $row['hari'];
                                                $row['tanggal'];
                                                $row['alamat'];
                                                $row['no_pengantar'];
                                                $row['nik_almarhum'];
                                                $row['penyebab_kematian'];
                                                $row['surat_digunakan'];
                                                $row['tgl_pengajuan'];
                                                $row['tanggal_dibuat'];
                                                $row['no_hp'];
                                        ?>
                                                <tr>
                                                    <td scope="col"><?php echo $nomor++; ?></td>
                                                    <td scope="col"><?php echo $row['id_akun']; ?></td>
                                                    <td scope="col"><?php echo $row['nama_almarhum']; ?></td>
                                                    <td scope="col"><?php echo 'Surat Kematian'; ?></td>
                                                    <td scope="col"><?php echo $row['tgl_pengajuan']; ?></td>
                                                    <td scope="col"><span class="badge badge-warning"><?php echo $row['status_surat']; ?></span></td>

                                                    <td>
                                                        <?php //Dibagian Ini Modalnya Oke
                                                        ?>
                                                        <form action="pdfkematian.php" method="post">
                                                        <a class="btn btn-success btn-sm btn-icon-text mr-3" href="" data-toggle="modal" data-target="#PreviewkematianModal<?php echo $row['id_akun']; ?>">
                                                            Preview Data
                                                        </a>
                                                        <div class="modal fade" id="PreviewkematianModal<?php echo $row['id_akun']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                            <div class="modal-dialog modal-dialog modal-lg modal-dialog-centered" role="document">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h5 class="modal-title" id="exampleModalLabel">Preview Surat </h5>
                                                                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                                                            <span aria-hidden="true">x</span>
                                                                        </button>
                                                                    </div>
                                                                    <style>
                                                                        .form-group {
                                                                            margin-left: 10%;
                                                                            margin-right: 10%;
                                                                        }
                                                                    </style>
                                                                    <div class="form-group"><?php if($_SESSION['hak_akses']=='1'){?>
                                                                                <div class="form-group">
                                                                                <label>Nomor Surat</label>
                                                                            <input type="text" name="nomor" class="form-control" value="<?php echo $row['no_surat']; ?>" maxlength="50" required="">
                                                                            <span class="text-danger">
                                                                            </div>
                                                                            <div class="form-group">
                                                                            <label>Tanggal Surat Dibuat</label>
                                                                            <input type="text" name="tanggalsurat" class="form-control" value="<?php echo $tgl_dibuat = date("d "); $bulan = date("F"); 
                                                                            if($bulan=="January"){
                                                                                echo "Januari";
                                                                            }elseif($bulan=="February"){
                                                                                echo "Februari";
                                                                            }elseif($bulan=="March"){
                                                                                echo "Maret";
                                                                            }elseif($bulan=="April"){
                                                                                echo "April";
                                                                            }elseif($bulan=="May"){
                                                                                echo "Mei";
                                                                            }elseif($bulan=="June"){
                                                                                echo "Juni";
                                                                            }elseif($bulan=="July"){
                                                                                echo "Juli";
                                                                            }elseif($bulan=="August"){
                                                                                echo "Agustus";
                                                                            }elseif($bulan=="September"){
                                                                                echo "September";
                                                                            }elseif($bulan=="october"){
                                                                                echo "Oktober";
                                                                            }elseif($bulan=="November"){
                                                                                echo "November";
                                                                            }elseif($bulan=="December"){
                                                                                echo "Desember";
                                                                            }else{}
                                                                            echo $tahun = date(" Y");
                                                                            ?>" maxlength="50" required="">
                                                                            <span class="text-danger">
                                                                        </div>
                                                                            <?php }elseif($_SESSION['hak_akses']== '2'){
                                                                                }elseif($_SESSION['hak_akses']== '3'){
                                                                                }else{} ?>
                                                                                <div class="form-group">
                                                                            <label>Nomor Surat Pengantar</label>
                                                                                
                                                                                <input type="text" name="nopengantarsurat" class="form-control" value="<?php echo $row['no_pengantar'];?>" maxlength="50" required="">
                                                                            </div>
                                                                    <div class="form-group">
                                                                        <label>Nama Mendiang</label>
                                                                        <input type="text" name="namamendiang" class="form-control" value="<?php echo $row['nama_almarhum']; ?>" maxlength="50" required="">
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label>Saksi</label>
                                                                        <input type="text" name="saksi" class="form-control" value="<?php echo $row['saksi_kematian']; ?>" maxlength="50" required="">
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label>Hubungan Saksi</label>
                                                                        <input type="text" name="hubungan" class="form-control" value="<?php echo $row['hubungan']; ?>" maxlength="50" required="">
                                                                    </div>
                                                                    <div class="form-group ">
                                                                        <label>Hari Kematian</label>
                                                                        <input type="text" name="harikematian" class="form-control" value="<?php echo $row['hari']; ?>" maxlength="30" required="">
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label>Tanggal/Bulan/Tahun</label>
                                                                        <input type="text" name="tglkematian" class="form-control" value="<?php echo $row['tanggal']; ?>" maxlength="50" required="">
                                                                        <span class="text-danger">
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label>Alamat Terakhir</label>
                                                                        <input type="text" name="alamat" class="form-control" value="<?php echo $row['alamat']; ?>" maxlength="50" required="">
                                                                        <span class="text-danger">
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label>NIK</label>
                                                                        <input type="text" name="nik" class="form-control" value="<?php echo $row['nik_almarhum']; ?>" maxlength="50" required="">
                                                                        <span class="text-danger">
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label>Penyebab Kematian</label>
                                                                        <input type="text" name="penyebabkematian" class="form-control" value="<?php echo $row['penyebab_kematian']; ?>" maxlength="50" required="">
                                                                        <span class="text-danger">
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label>Keterangan Pengajuan</label>
                                                                        <input type="text" name="ketpengajuan" class="form-control" value="<?php echo $row['surat_digunakan']; ?>" maxlength="50" required="">
                                                                        <span class="text-danger">
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label>Tanggal Pengajuan</label>
                                                                        <input type="text" name="tglpengajuan" class="form-control" value="<?php echo $row['tgl_pengajuan']; ?>" maxlength="50" required="">
                                                                        <span class="text-danger">
                                                                    </div>
                                                                    
                                                                    <div class="form-group">
                                                                            <label>Kartu Keluarga</label>
                                                                            <input type="hidden" name="surattt" class="form-control" value="<?php echo $row['id_surat']; ?>" maxlength="50" required="">
                                                                                <span class="text-danger">
                                                                        </div>
                                                                    <div class="form-group">
                                                                            <img src="Api/uploads/<?php echo $row['image']; ?>" class="img-thumbnail" alt="Responsive image">
                                                                        </div>
                                                                        <?php
                                                                    if ($_SESSION['hak_akses'] == "1") {
                                                                    ?>
                                                                    
                                                                    <div class="modal-footer">
                                                                    <input type="submit" class="btn btn-primary" name="download" value="Download">
                                                                    <input type="submit" class="btn btn-primary" name="kirim" value="Kirim">
                                                                    <button class="btn btn-secondary" type="button" data-dismiss="modal" onClick="window.open('https://wa.me/62<?php echo $row['no_hp']; ?>');" target="_blank">Kirim Via WhatsApp</button>
                                                                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Kembali</button>
                                                                    </div>
                                                                    <?php 
                                                                    }elseif($_SESSION['hak_akses'] == "2"){
                                                                        ?>
                                                                    <div class="modal-footer">
                                                                    <a class="btn btn-primary" href="Api/update/setujuiRTKematian.php?kode=<?php echo $row['id_surat']?>">Setujui</a>
                                                                    <a class="btn btn-danger" href="Api/update/updatetolakkematian.php?kode=<?php echo $row['id_surat']?>">Tolak</a>
                                                                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Kembali</button>
                                                                    </div>
                                                                        <?php
                                                                    }elseif($_SESSION['hak_akses'] == "3"){
                                                                        ?>
                                                                    <div class="modal-footer">
                                                                    <a class="btn btn-primary" href="Api/update/setujuiRWKematian.php?kode=<?php echo $row['id_surat']?>">Setujui</a>
                                                                    <a class="btn btn-danger" href="Api/update/RWupdatetolakkematian.php?kode=<?php echo $row['id_surat']?>">Tolak</a>
                                                                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Kembali</button>
                                                                    </div>
                                                                        <?php

                                                                    }else{
                                                                        echo "";
                                                                    }
                                                                    ?>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        </form>
                                                        <?php //Sampai Sini 
                                                        ?>
                                                    </td>
                                                </tr>
                                        <?php  }
                                        } ?>

                                        <!-- suratakta -->
                                        <?php
                                        require_once 'Api/oopkoneksi.php';
                                        require_once 'Api/suratdiproses.php';


                                        $obj = new akta_kelahiran;
                                        $data = $obj->suratdiproses();
                                        $nomor = 1;
                                        if ($data->rowCount() > 0) {
                                            while ($row = $data->fetch(PDO::FETCH_ASSOC)) {
                                                $row['nomor_surat'];
                                                $row['nama_anak'];
                                                $row['tempat_lahir'];
                                                $row['tanggal_lahir'];
                                                $row['jenis_kelamin'];
                                                $row['kebangsaan'];
                                                $row['agama'];
                                                $row['status'];
                                                $row['pekerjaan'];
                                                $row['nik'];
                                                $row['alamat'];
                                                $row['nama_ayah'];
                                                $row['umur_ayah'];
                                                $row['kebangsaan_ayah'];
                                                $row['agama_ayah'];
                                                $row['pekerjaan_ayah'];
                                                $row['alamat_ayah'];
                                                $row['nama_ibu'];
                                                $row['no_pengantar'];
                                                $row['umur_ibu'];
                                                $row['kebangsaan_ibu'];
                                                $row['agama_ibu'];
                                                $row['pekerjaan_ibu'];
                                                $row['alamat_ibu'];
                                                $row['tgl_pengajuan'];
                                                $row['keperluan'];
                                                $row['tgl_surat_dibuat'];
                                                $row['no_hp'];
                                        ?>
                                                <tr>
                                                    <td scope="col"><?php echo $nomor++; ?></td>
                                                    <td scope="col"><?php echo $row['id_akun']; ?></td>
                                                    <td scope="col"><?php echo $row['nama_anak']; ?></td>
                                                    <td scope="col"><?php echo 'Surat Akta'; ?></td>
                                                    <td scope="col"><?php echo $row['tgl_pengajuan']; ?></td>
                                                    <td scope="col"><span class="badge badge-warning"><?php echo $row['status_surat']; ?></span></td>

                                                    <td>
                                                        <?php //Dibagian Ini Modalnya Oke
                                                        ?>
                                                        <form action="pdfakta.php" method="post">
                                                        <a class="btn btn-success btn-sm btn-icon-text mr-3" href="" data-toggle="modal" data-target="#PreviewaktaModal<?php echo $row['id_akun']; ?>">
                                                            Preview Data
                                                        </a>
                                                        <div class="modal fade" id="PreviewaktaModal<?php echo $row['id_akun']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                            <div class="modal-dialog modal-dialog modal-lg modal-dialog-centered" role="document">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h5 class="modal-title" id="exampleModalLabel">Preview Surat </h5>
                                                                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                                                            <span aria-hidden="true">x</span>
                                                                        </button>
                                                                    </div>
                                                                    <style>
                                                                        .form-group {
                                                                            margin-left: 10%;
                                                                            margin-right: 10%;
                                                                        }
                                                                    </style>
                                                                    <div class="form-group"><?php if($_SESSION['hak_akses']=='1'){?>
                                                                                <div class="form-group">
                                                                                <label>Nomor Surat</label>
                                                                            <input type="text" name="nomor" class="form-control" value="" maxlength="50" required="">
                                                                            <span class="text-danger">
                                                                            </div>
                                                                            <div class="form-group">
                                                                            <label>Tanggal Surat Dibuat</label>
                                                                            <input type="text" name="tanggalsurat" class="form-control" value="<?php echo $tgl_dibuat = date("d "); $bulan = date("F"); 
                                                                            if($bulan=="January"){
                                                                                echo "Januari";
                                                                            }elseif($bulan=="February"){
                                                                                echo "Februari";
                                                                            }elseif($bulan=="March"){
                                                                                echo "Maret";
                                                                            }elseif($bulan=="April"){
                                                                                echo "April";
                                                                            }elseif($bulan=="May"){
                                                                                echo "Mei";
                                                                            }elseif($bulan=="June"){
                                                                                echo "Juni";
                                                                            }elseif($bulan=="July"){
                                                                                echo "Juli";
                                                                            }elseif($bulan=="August"){
                                                                                echo "Agustus";
                                                                            }elseif($bulan=="September"){
                                                                                echo "September";
                                                                            }elseif($bulan=="october"){
                                                                                echo "Oktober";
                                                                            }elseif($bulan=="November"){
                                                                                echo "November";
                                                                            }elseif($bulan=="December"){
                                                                                echo "Desember";
                                                                            }else{}
                                                                            echo $tahun = date(" Y");
                                                                            ?>" maxlength="50" required="">
                                                                            <span class="text-danger">
                                                                        </div>
                                                                            <?php }elseif($_SESSION['hak_akses']== '2'){
                                                                                }elseif($_SESSION['hak_akses']== '3'){
                                                                                }else{} ?>
                                                                                <div class="form-group">
                                                                            <label>Nomor Surat Pengantar</label>
                                                                                                                                                               
                                                                                <input type="text" name="nopengantarsurat" class="form-control" value="<?php echo $row['no_pengantar'];?>" maxlength="50" required="">
                                                                            </div>
                                                                    <div class="form-group">
                                                                        <label>Nama</label>
                                                                        <input type="text" name="namaanak" class="form-control" value="<?php echo $row['nama_anak']; ?>" maxlength="50" required="">
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label>Tempat, Tanggal Lahir</label>
                                                                        <input type="text" name="ttl" class="form-control" value="<?php echo $row['tempat_lahir']; ?>, <?php echo $row['tanggal_lahir']; ?>" maxlength="50" required="">
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label>Jenis kelamin</label>
                                                                        <input type="text" name="kelamin" class="form-control" value="<?php echo $row['jenis_kelamin']; ?>" maxlength="50" required="">
                                                                    </div>
                                                                    <div class="form-group ">
                                                                        <label>Kebangsaan/Agama</label>
                                                                        <input type="text" name="kebangsaan" class="form-control" value="<?php echo $row['kebangsaan']; ?> / <?php echo $row['agama']; ?>" maxlength="30" required="">
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label>Status</label>
                                                                        <input type="text" name="status" class="form-control" value="<?php echo $row['status']; ?>" maxlength="50" required="">
                                                                        <span class="text-danger">
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label>Pekerjaan</label>
                                                                        <input type="text" name="pekerjaan" class="form-control" value="<?php echo $row['pekerjaan']; ?>" maxlength="50" required="">
                                                                        <span class="text-danger">
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label>NIK</label>
                                                                        <input type="text" name="nik" class="form-control" value="<?php echo $row['nik']; ?>" maxlength="50" required="">
                                                                        <span class="text-danger">
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label>Alamat</label>
                                                                        <input type="text" name="alamat" class="form-control" value="<?php echo $row['alamat']; ?>" maxlength="50" required="">
                                                                        <span class="text-danger">
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label>Nama Ayah</label>
                                                                        <input type="text" name="namaayah" class="form-control" value="<?php echo $row['nama_ayah']; ?>" maxlength="50" required="">
                                                                        <span class="text-danger">
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label>Umur Ayah</label>
                                                                        <input type="text" name="umurayah" class="form-control" value="<?php echo $row['umur_ayah']; ?>" maxlength="50" required="">
                                                                        <span class="text-danger">
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label>Bangsa/Agama Ayah</label>
                                                                        <input type="text" name="bangsaayah" class="form-control" value="<?php echo $row['kebangsaan_ayah']; ?> / <?php echo $row['agama_ayah']; ?>" maxlength="50" required="">
                                                                        <span class="text-danger">
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label>Pekerjaan Ayah</label>
                                                                        <input type="text" name="pekerjaanayah" class="form-control" value="<?php echo $row['pekerjaan_ayah']; ?>" maxlength="50" required="">
                                                                        <span class="text-danger">
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label>Alamat Ayah</label>
                                                                        <input type="text" name="alamatayah" class="form-control" value="<?php echo $row['alamat_ayah']; ?>" maxlength="50" required="">
                                                                        <span class="text-danger">
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label>Nama Ibu</label>
                                                                        <input type="text" name="namaibu" class="form-control" value="<?php echo $row['nama_ibu']; ?>" maxlength="50" required="">
                                                                        <span class="text-danger">
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label>Umur Ibu</label>
                                                                        <input type="text" name="umuribu" class="form-control" value="<?php echo $row['umur_ibu']; ?>" maxlength="50" required="">
                                                                        <span class="text-danger">
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label>Bangsa/Agama Ibu</label>
                                                                        <input type="text" name="bangsaibu" class="form-control" value="<?php echo $row['kebangsaan_ibu']; ?> / <?php echo $row['agama_ibu']; ?>" maxlength="50" required="">
                                                                        <span class="text-danger">
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label>Pekerjaan Ibu</label>
                                                                        <input type="text" name="pekerjaanibu" class="form-control" value="<?php echo $row['pekerjaan_ibu']; ?>" maxlength="50" required="">
                                                                        <span class="text-danger">
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label>Alamat Ibu</label>
                                                                        <input type="text" name="alamatibu" class="form-control" value="<?php echo $row['alamat_ibu']; ?>" maxlength="50" required="">
                                                                        <span class="text-danger">
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label>Tanggal Pengajuan</label>
                                                                        <input type="text" name="tglpengajuan" class="form-control" value="<?php echo $row['tgl_pengajuan']; ?>" maxlength="50" required="">
                                                                        <span class="text-danger">
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label>Keperluan Surat</label>
                                                                        <input type="text" name="ketsurat" class="form-control" value="<?php echo $row['keperluan']; ?>" maxlength="50" required="">
                                                                        <span class="text-danger">
                                                                    </div>
                                                                    
                                                                    <div class="form-group">
                                                                            <label>Kartu Keluarga</label>
                                                                            <input type="hidden" name="surattt" class="form-control" value="<?php echo $row['id_surat']; ?>" maxlength="50" required="">
                                                                                <span class="text-danger">
                                                                        </div>
                                                                    <div class="form-group">
                                                                            <img src="Api/uploads/<?php echo $row['image']; ?>" class="img-thumbnail" alt="Responsive image">
                                                                        </div>
                                                                        <?php
                                                                    if ($_SESSION['hak_akses'] == "1") {
                                                                    ?>
                                                                    
                                                                    <div class="modal-footer">
                                                                    <input type="submit" class="btn btn-primary" name="download" value="Download">
                                                                    <input type="submit" class="btn btn-primary" name="kirim" value="Kirim">
                                                                    <button class="btn btn-secondary" type="button" data-dismiss="modal" onClick="window.open('https://wa.me/62<?php echo $row['no_hp']; ?>');" target="_blank">Kirim Via WhatsApp</button>
                                                                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Kembali</button>
                                                                    </div>
                                                                    <?php 
                                                                    }elseif($_SESSION['hak_akses'] == "2"){
                                                                        ?>
                                                                    <div class="modal-footer">
                                                                    <a class="btn btn-primary" href="Api/update/setujuiRTAkta.php?kode=<?php echo $row['id_surat']?>">Setujui</a>
                                                                    <a class="btn btn-danger" href="Api/update/updatetolakakta.php?kode=<?php echo $row['id_surat']?>">Tolak</a>
                                                                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Kembali</button>
                                                                    </div>
                                                                        <?php
                                                                    }elseif($_SESSION['hak_akses'] == "3"){
                                                                        ?>
                                                                    <div class="modal-footer">
                                                                    <a class="btn btn-primary" href="Api/update/setujuiRWAkta.php?kode=<?php echo $row['id_surat']?>">Setujui</a>
                                                                    <a class="btn btn-danger" href="Api/update/RWupdatetolakakta.php?kode=<?php echo $row['id_surat']?>">Tolak</a>
                                                                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Kembali</button>
                                                                    </div>
                                                                        <?php

                                                                    }else{
                                                                        echo "";
                                                                    }
                                                                    ?>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        </form>
                                                        <?php //Sampai Sini 
                                                        ?>
                                                    </td>
                                                </tr>
                                        <?php  }
                                        } ?>
                                        
                                        <!-- suratusaha -->
                                        <?php
                                        require_once 'Api/oopkoneksi.php';
                                        require_once 'Api/suratdiproses.php';


                                        $obj = new ket_usaha;
                                        $data = $obj->suratdiproses();
                                        $nomor = 1;
                                        if ($data->rowCount() > 0) {
                                            while ($row = $data->fetch(PDO::FETCH_ASSOC)) {

                                                $row['no_surat'];
                                                $row['nama'];
                                                $row['tempat_lahir'];
                                                $row['tanggal_lahir'];
                                                $row['jenis_kelamin'];
                                                $row['kebangsaan'];
                                                $row['agama'];
                                                $row['status'];
                                                $row['pekerjaan'];
                                                $row['nik'];
                                                $row['alamat'];
                                                $row['tgl_pengajuan'];
                                                $row['nama_usaha'];
                                                $row['thn_usaha_dibuat'];
                                                $row['keperluan'];
                                                $row['no_pengantar'];
                                                $row['no_hp'];

                                        ?>
                                                <tr>
                                                    <td scope="col"><?php echo $nomor++; ?></td>
                                                    <td scope="col"><?php echo $row['id_akun']; ?></td>
                                                    <td scope="col"><?php echo $row['nama']; ?></td>
                                                    <td scope="col"><?php echo 'Surat Usaha'; ?></td>
                                                    <td scope="col"><?php echo $row['tgl_pengajuan']; ?></td>
                                                    <td scope="col"><span class="badge badge-warning"><?php echo $row['status_surat']; ?></span></td>

                                                    <td>
                                                        <?php //Dibagian Ini Modalnya Oke
                                                        ?>
                                                        <form action="pdfusaha.php" method="post">
                                                        <a class="btn btn-success btn-sm btn-icon-text mr-3" href="" data-toggle="modal" data-target="#PreviewusahaModal<?php echo $row['id_akun']; ?>">
                                                            Preview Data
                                                        </a>
                                                        <div class="modal fade" id="PreviewusahaModal<?php echo $row['id_akun']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                            <div class="modal-dialog modal-dialog modal-lg modal-dialog-centered" role="document">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h5 class="modal-title" id="exampleModalLabel">Preview Surat </h5>
                                                                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                                                            <span aria-hidden="true">x</span>
                                                                        </button>
                                                                    </div>
                                                                    <style>
                                                                        .form-group {
                                                                            margin-left: 10%;
                                                                            margin-right: 10%;
                                                                        }
                                                                    </style>
                                                                    <div class="form-group"><?php if($_SESSION['hak_akses']=='1'){?>
                                                                                <div class="form-group">
                                                                                <label>Nomor Surat</label>
                                                                            <input type="text" name="nomor" class="form-control" value="<?php echo $row['no_surat']; ?>" maxlength="50" required="">
                                                                            <span class="text-danger">
                                                                            </div>
                                                                            <div class="form-group">
                                                                            <label>Tanggal Surat Dibuat</label>
                                                                            <input type="text" name="tanggalsurat" class="form-control" value="<?php echo $tgl_dibuat = date("d "); $bulan = date("F"); 
                                                                            if($bulan=="January"){
                                                                                echo "Januari";
                                                                            }elseif($bulan=="February"){
                                                                                echo "Februari";
                                                                            }elseif($bulan=="March"){
                                                                                echo "Maret";
                                                                            }elseif($bulan=="April"){
                                                                                echo "April";
                                                                            }elseif($bulan=="May"){
                                                                                echo "Mei";
                                                                            }elseif($bulan=="June"){
                                                                                echo "Juni";
                                                                            }elseif($bulan=="July"){
                                                                                echo "Juli";
                                                                            }elseif($bulan=="August"){
                                                                                echo "Agustus";
                                                                            }elseif($bulan=="September"){
                                                                                echo "September";
                                                                            }elseif($bulan=="october"){
                                                                                echo "Oktober";
                                                                            }elseif($bulan=="November"){
                                                                                echo "November";
                                                                            }elseif($bulan=="December"){
                                                                                echo "Desember";
                                                                            }else{}
                                                                            echo $tahun = date(" Y");
                                                                            ?>" maxlength="50" required="">
                                                                            <span class="text-danger">
                                                                        </div>
                                                                            <?php }elseif($_SESSION['hak_akses']== '2'){
                                                                                }elseif($_SESSION['hak_akses']== '3'){
                                                                                }else{} ?>
                                                                                <div class="form-group">
                                                                            <label>Nomor Surat Pengantar</label>
                                                                                
                                                                                <input type="text" name="nopengantarsurat" class="form-control" value="<?php echo $row['no_pengantar'];?>" maxlength="50" required="">
                                                                            </div>
                                                                    <div class="form-group">
                                                                        <label>Nama</label>
                                                                        <input type="text" name="nama" class="form-control" value="<?php echo $row['nama']; ?>" maxlength="50" required="">
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label>Tempat, Tanggal Lahir</label>
                                                                        <input type="text" name="ttl" class="form-control" value="<?php echo $row['tempat_lahir']; ?>, <?php echo $row['tanggal_lahir']; ?>" maxlength="50" required="">
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label>Jenis kelamin</label>
                                                                        <input type="text" name="kelamin" class="form-control" value="<?php echo $row['jenis_kelamin']; ?>" maxlength="50" required="">
                                                                    </div>
                                                                    <div class="form-group ">
                                                                        <label>Kebangsaan / Agama</label>
                                                                        <input type="text" name="kebangsaan" class="form-control" value="<?php echo $row['kebangsaan']; ?> / <?php echo $row['agama']; ?>" maxlength="30" required="">
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label>Status</label>
                                                                        <input type="text" name="status" class="form-control" value="<?php echo $row['status']; ?>" maxlength="50" required="">
                                                                        <span class="text-danger">
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label>Pekerjaan</label>
                                                                        <input type="text" name="pekerjaan" class="form-control" value="<?php echo $row['pekerjaan']; ?>" maxlength="50" required="">
                                                                        <span class="text-danger">
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label>NIK</label>
                                                                        <input type="text" name="nik" class="form-control" value="<?php echo $row['nik']; ?>" maxlength="50" required="">
                                                                        <span class="text-danger">
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label>Alamat</label>
                                                                        <input type="text" name="alamat" class="form-control" value="<?php echo $row['alamat']; ?>" maxlength="50" required="">
                                                                        <span class="text-danger">
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label>Nama Usaha</label>
                                                                        <input type="text" name="namausaha" class="form-control" value="<?php echo $row['nama_usaha']; ?>" maxlength="50" required="">
                                                                        <span class="text-danger">
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label>Tahun Usaha Dibuat</label>
                                                                        <input type="text" name="tahunusaha" class="form-control" value="<?php echo $row['thn_usaha_dibuat']; ?>" maxlength="50" required="">
                                                                        <span class="text-danger">
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label>Keperluan Surat</label>
                                                                        <input type="text" name="ketsurat" class="form-control" value="<?php echo $row['keperluan']; ?>" maxlength="50" required="">
                                                                        <span class="text-danger">
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label>Tanggal Pengajuan</label>
                                                                        <input type="text" name="tglpengajuan" class="form-control" value="<?php echo $row['tgl_pengajuan']; ?>" maxlength="50" required="">
                                                                        <span class="text-danger">
                                                                    </div>
                                                            
                                                                    <div class="form-group">
                                                                            <label>Kartu Keluarga</label>
                                                                            <input type="hidden" name="surattt" class="form-control" value="<?php echo $row['id_surat']; ?>" maxlength="50" required="">
                                                                                <span class="text-danger">
                                                                        </div>
                                                                    <div class="form-group">
                                                                            <img src="Api/uploads/<?php echo $row['image']; ?>" class="img-thumbnail" alt="Responsive image">
                                                                        </div>
                                                                        <?php
                                                                    if ($_SESSION['hak_akses'] == "1") {
                                                                    ?>
                                                                    
                                                                    <div class="modal-footer">
                                                                    <input type="submit" class="btn btn-primary" name="download" value="Download">
                                                                    <input type="submit" class="btn btn-primary" name="kirim" value="Kirim">
                                                                    <button class="btn btn-secondary" type="button" data-dismiss="modal" onClick="window.open('https://wa.me/62<?php echo $row['no_hp']; ?>');" target="_blank">Kirim Via WhatsApp</button>
                                                                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Kembali</button>
                                                                    </div>
                                                                    <?php 
                                                                    }elseif($_SESSION['hak_akses'] == "2"){
                                                                        ?>
                                                                    <div class="modal-footer">
                                                                    <a class="btn btn-primary" href="Api/update/setujuiRTusaha.php?kode=<?php echo $row['id_surat']?>">Setujui</a>
                                                                    <a class="btn btn-danger" href="Api/update/updatetolakusaha.php?kode=<?php echo $row['id_surat']?>">Tolak</a>
                                                                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Kembali</button>
                                                                    </div>
                                                                        <?php
                                                                    }elseif($_SESSION['hak_akses'] == "3"){
                                                                        ?>
                                                                    <div class="modal-footer">
                                                                    <a class="btn btn-primary" href="Api/update/setujuiRWusaha.php?kode=<?php echo $row['id_surat']?>">Setujui</a>
                                                                    <a class="btn btn-danger" href="Api/update/RWupdatetolakusaha.php?kode=<?php echo $row['id_surat']?>">Tolak</a>
                                                                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Kembali</button>
                                                                    </div>
                                                                        <?php

                                                                    }else{
                                                                        echo "";
                                                                    }
                                                                    ?>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        </form>
                                                        <?php //Sampai Sini 
                                                        ?>
                                                    </td>
                                                </tr>
                                            
                                        <?php  }
                                        } ?>

                                        <!-- suratberkelakuanbaik -->
                                        <?php
                                        require_once 'Api/oopkoneksi.php';
                                        require_once 'Api/suratdiproses.php';


                                        $obj = new berkelakuanbaik;
                                        $data = $obj->suratdiproses();
                                        $nomor = 1;
                                        if ($data->rowCount() > 0) {
                                            while ($row = $data->fetch(PDO::FETCH_ASSOC)) {

                                                $row['nama'];
                                                $row['no_surat'];
                                                $row['tempat_lahir'];
                                                $row['tanggal_lahir'];
                                                $row['jenis_kelamin'];
                                                $row['no_pengantar'];
                                                $row['kebangsaan'];
                                                $row['agama'];
                                                $row['status'];
                                                $row['pekerjaan'];
                                                $row['nik'];
                                                $row['alamat'];
                                                $row['tgl_pengajuan'];
                                                $row['surat_digunakan'];
                                                $row['tgl_surat_dibuat'];
                                                $row['surat_digunakan'];
                                                $row['no_hp'];

                                        ?>
                                                <tr>
                                                    <td scope="col"><?php echo $nomor++; ?></td>
                                                    <td scope="col"><?php echo $row['id_akun']; ?></td>
                                                    <td scope="col"><?php echo $row['nama']; ?></td>
                                                    <td scope="col"><?php echo 'Surat Berkelakuan Baik'; ?></td>
                                                    <td scope="col"><?php echo $row['tgl_pengajuan']; ?></td>
                                                    <td scope="col"><span class="badge badge-warning"><?php echo $row['status_surat']; ?></span></td>

                                                    <td>
                                                        <?php //Dibagian Ini Modalnya Oke
                                                        ?>
                                                        <form action="pdfberkelakuanbaik.php" method="post">
                                                        <a class="btn btn-success btn-sm btn-icon-text mr-3" href="" data-toggle="modal" data-target="#PreviewberkelakuanbaikModal<?php echo $row['id_akun']; ?>">
                                                            Preview Data
                                                        </a>
                                                        <div class="modal fade" id="PreviewberkelakuanbaikModal<?php echo $row['id_akun']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                            <div class="modal-dialog modal-dialog modal-lg modal-dialog-centered" role="document">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h5 class="modal-title" id="exampleModalLabel">Preview Surat </h5>
                                                                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                                                            <span aria-hidden="true">x</span>
                                                                        </button>
                                                                    </div>
                                                                    <style>
                                                                        .form-group {
                                                                            margin-left: 10%;
                                                                            margin-right: 10%;
                                                                        }
                                                                    </style>
                                                                    <div class="form-group"><?php if($_SESSION['hak_akses']=='1'){?>
                                                                                <div class="form-group">
                                                                                <label>Nomor Surat</label>
                                                                            <input type="text" name="nomor" class="form-control" value="<?php echo $row['no_surat']; ?>" maxlength="50" required="">
                                                                            <span class="text-danger">
                                                                            </div>
                                                                            <div class="form-group">
                                                                            <label>Tanggal Surat Dibuat</label>
                                                                            <input type="text" name="tanggalsurat" class="form-control" value="<?php echo $tgl_dibuat = date("d "); $bulan = date("F"); 
                                                                            if($bulan=="January"){
                                                                                echo "Januari";
                                                                            }elseif($bulan=="February"){
                                                                                echo "Februari";
                                                                            }elseif($bulan=="March"){
                                                                                echo "Maret";
                                                                            }elseif($bulan=="April"){
                                                                                echo "April";
                                                                            }elseif($bulan=="May"){
                                                                                echo "Mei";
                                                                            }elseif($bulan=="June"){
                                                                                echo "Juni";
                                                                            }elseif($bulan=="July"){
                                                                                echo "Juli";
                                                                            }elseif($bulan=="August"){
                                                                                echo "Agustus";
                                                                            }elseif($bulan=="September"){
                                                                                echo "September";
                                                                            }elseif($bulan=="october"){
                                                                                echo "Oktober";
                                                                            }elseif($bulan=="November"){
                                                                                echo "November";
                                                                            }elseif($bulan=="December"){
                                                                                echo "Desember";
                                                                            }else{}
                                                                            echo $tahun = date(" Y");
                                                                            ?>" maxlength="50" required="">
                                                                            <span class="text-danger">
                                                                        </div>
                                                                            <?php }elseif($_SESSION['hak_akses']== '2'){
                                                                                }elseif($_SESSION['hak_akses']== '3'){
                                                                                }else{} ?>
                                                                                <div class="form-group">
                                                                            <label>Nomor Surat Pengantar</label>
                                                                                
                                                                                <input type="text" name="nopengantarsurat" class="form-control" value="<?php echo $row['no_pengantar'];?>" maxlength="50" required="">
                                                                            </div>
                                                                    <div class="form-group">
                                                                        <label>Nama</label>
                                                                        <input type="text" name="nama" class="form-control" value="<?php echo $row['nama']; ?>" maxlength="50" required="">
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label>Tempat, Tanggal Lahir</label>
                                                                        <input type="text" name="ttl" class="form-control" value="<?php echo $row['tempat_lahir']; ?>, <?php echo $row['tanggal_lahir']; ?>" maxlength="50" required="">
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label>Jenis kelamin</label>
                                                                        <input type="text" name="kelamin" class="form-control" value="<?php echo $row['jenis_kelamin']; ?>" maxlength="50" required="">
                                                                    </div>
                                                                    <div class="form-group ">
                                                                        <label>Kebangsaan/Agama</label>
                                                                        <input type="text" name="kebangsaan" class="form-control" value="<?php echo $row['kebangsaan']; ?> / <?php echo $row['agama']; ?>" maxlength="30" required="">
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label>Status</label>
                                                                        <input type="text" name="status" class="form-control" value="<?php echo $row['status']; ?>" maxlength="50" required="">
                                                                        <span class="text-danger">
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label>Pekerjaan</label>
                                                                        <input type="text" name="pekerjaan" class="form-control" value="<?php echo $row['pekerjaan']; ?>" maxlength="50" required="">
                                                                        <span class="text-danger">
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label>NIK</label>
                                                                        <input type="text" name="nik" class="form-control" value="<?php echo $row['nik']; ?>" maxlength="50" required="">
                                                                        <span class="text-danger">
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label>Alamat</label>
                                                                        <input type="text" name="alamat" class="form-control" value="<?php echo $row['alamat']; ?>" maxlength="50" required="">
                                                                        <span class="text-danger">
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label>Tanggal Pengajuan</label>
                                                                        <input type="text" name="tglpengajuan" class="form-control" value="<?php echo $row['tgl_pengajuan']; ?>" maxlength="50" required="">
                                                                        <span class="text-danger">
                                                                    </div>
                                                                    <div class="form-group">
                                                                            <label>Keperluan Surat</label>
                                                                            <input type="text" name="ketsurat" class="form-control" value="<?php echo $row['surat_digunakan']; ?>" maxlength="50" required="">
                                                                            <span class="text-danger">
                                                                        </div>
                                                                        
                                                                        <div class="form-group">
                                                                            <label>Kartu Keluarga</label>
                                                                            <input type="hidden" name="surattt" class="form-control" value="<?php echo $row['id_surat']; ?>" maxlength="50" required="">
                                                                                <span class="text-danger">
                                                                        </div>
                                                                    <div class="form-group">
                                                                            <img src="Api/uploads/<?php echo $row['image']; ?>" class="img-thumbnail" alt="Responsive image">
                                                                        </div>
                                                                        <?php
                                                                    if ($_SESSION['hak_akses'] == "1") {
                                                                    ?>
                                                                    
                                                                    <div class="modal-footer">
                                                                    <input type="submit" class="btn btn-primary" name="download" value="Download">
                                                                    <input type="submit" class="btn btn-primary" name="kirim" value="Kirim">
                                                                    <button class="btn btn-secondary" type="button" data-dismiss="modal" onClick="window.open('https://wa.me/62<?php echo $row['no_hp']; ?>');" target="_blank">Kirim Via WhatsApp</button>
                                                                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Kembali</button>
                                                                    </div>
                                                                    <?php 
                                                                    }elseif($_SESSION['hak_akses'] == "2"){
                                                                        ?>
                                                                    <div class="modal-footer">
                                                                    <a class="btn btn-primary" href="Api/update/setujuiRTberkelakuanbaik.php?kode=<?php echo $row['id_surat']?>">Setujui</a>
                                                                    <a class="btn btn-danger" href="Api/update/updatetolakberkelakuanbaik.php?kode=<?php echo $row['id_surat']?>">Tolak</a>
                                                                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Kembali</button>
                                                                    </div>
                                                                        <?php
                                                                    }elseif($_SESSION['hak_akses'] == "3"){
                                                                        ?>
                                                                    <div class="modal-footer">
                                                                    <a class="btn btn-primary" href="Api/update/setujuiRWberkelakuanbaik.php?kode=<?php echo $row['id_surat']?>">Setujui</a>
                                                                    <a class="btn btn-danger" href="Api/update/RWupdatetolakberkelakuanbaik.php?kode=<?php echo $row['id_surat']?>">Tolak</a>
                                                                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Kembali</button>
                                                                    </div>
                                                                        <?php

                                                                    }else{
                                                                        echo "";
                                                                    }
                                                                    ?>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        </form>
                                                        <?php //Sampai Sini 
                                                        ?>
                                                    </td>
                                                </tr>
                                        <?php  }
                                        } ?>
                                    </tbody>
                                </table>

                                <script>
                                function searchTable() {
                                var input = document.getElementById("searchInput").value;
                                var table = document.getElementById("myTable");
                                var rows = table.getElementsByTagName("tr");
                                for (var i = 0; i < rows.length; i++) {
                                    var cells = rows[i].getElementsByTagName("td");
                                    var found = false;
                                    for (var j = 0; j < cells.length; j++) {
                                    if (cells[j].textContent.toLowerCase().indexOf(input.toLowerCase()) > -1) {
                                        found = true;
                                    }
                                    }
                                    if (found) {
                                    rows[i].style.display = "";
                                    } else {
                                    rows[i].style.display = "none";
                                    }
                                }
                                }
                                </script>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 mb-4"></div>
            </div>
        </div> 
        <!--end id content -->
      </div>
      <!-- End of Content Wrapper -->
      <?php include('include/footer.php');?>
    </div>
    <!-- End of Page Wrapper -->
    
<?php
// include('include/scripts.php');

?>
</body>
  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="js/sb-admin-2.min.js"></script>

  <!-- Page level plugins -->
  <script src="vendor/chart.js/Chart.min.js"></script>

  <!-- Page level custom scripts -->
  <script src="js/demo/chart-area-demo.js"></script>
  <script src="js/demo/chart-pie-demo.js"></script>
</html>