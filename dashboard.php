<?php session_start();
if ($_SESSION['nama_lengkap'] == "") {
  // header('location:login.php');
  echo "<script>alert('Anda Belum Login');window.location='login.php';</script>";
} else {
}
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
         
          <!-- Begin Page Content -->
          <div class="container-fluid">

            <!-- Page Heading -->
            <div class="d-sm-flex align-items-center justify-content-between mb-4">
              <h1 class="h3 mb-0 text-gray-800">Dashboard <?php 
              
              ?></h1>
              <!-- Topbar Search -->
              <form class="d-grid gap-2 d-md-flex justify-content-md-end navbar-search">
                <!-- <a class="dropdown-item"><input type="datetime-local" class=""></a>

                <h2>to</h2><a class="dropdown-item"><input type="datetime-local" class=""></a> -->
                <div class="container">
                  <div class="row">
                    <div class="container-fluid">
                      <div class="form-group row">
                        <label for="date" class="col-form-label col-sm-2">Laporan</label>
                        <div class="col-sm-3">
                          <input type="date" class="form-control input-sm" id="fromDate" name="fromDate" required />
                        </div>
                        <label for="date" class="col-form-label col-sm-2">Laporan</label>
                        <div class="col-sm-3">
                          <input type="date" class="form-control input-sm" id="fromDate" name="fromDate" required />
                        </div>
                        <div class="col-sm-2">
                          <button type="submit" class="btn" name="search" title="Search"><img src="https://img.icons8.com/search" width="25px" height="25"></button>
                        </div>
                      </div>
                    </div>
                  </div>
              </form>
            </div>
            <!-- Content Row -->
          </div>
          <div class="row">
            <!-- kartu surat masuk -->
              <div class="col-xl-3 col-md-6 mb-2">
                <div class="card border-left-primary shadow h-100 py-2">
                  <div class="card-body">
                    <div class="row no-gutters align-items-center">
                      <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                          Surat Masuk</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">
                          <?php
                          require_once 'Api/oopkoneksi.php';
                          require_once 'Api/lihatdatamaster.php';


                          $obj = new readsmdash;
                          $data = $obj->sumsmdash();


                          $nomor = 1;
                          if ($data->rowCount() > 0) {
                            while ($row = $data->fetch(PDO::FETCH_ASSOC)) {

                              echo $row['total'];
                            }
                          }
                          ?>
                        </div>
                      </div>
                      <div class="col-auto">
                        <img src="images/icon-masuk.png" height="40">
                      </div>
                    </div>
                  </div>
                </div>
              </div>

              <!-- kartu surat diproses -->
              <div class="col-xl-3 col-md-6 mb-2">
                <div class="card border-left-warning shadow h-100 py-2">
                  <div class="card-body">
                    <div class="row no-gutters align-items-center">
                      <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                          Surat Diproses</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">
                          <?php
                          require_once 'Api/oopkoneksi.php';
                          require_once 'Api/lihatdatamaster.php';


                          $obj = new readspdash;
                          $data = $obj->sumspdash();


                          $nomor = 1;
                          if ($data->rowCount() > 0) {
                            while ($row = $data->fetch(PDO::FETCH_ASSOC)) {

                              echo $row['total'];
                            }
                          }
                          ?>
                        </div>
                      </div>
                      <div class="col-auto">
                        <img src="images/icon-diproses.png" height="40">
                      </div>
                    </div>
                  </div>
                </div>
              </div>

              <!-- kartu surat ditolak -->
              <div class="col-xl-3 col-md-6 mb-2">
                <div class="card border-left-danger shadow h-100 py-2">
                  <div class="card-body">
                    <div class="row no-gutters align-items-center">
                      <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">
                          Surat Ditolak</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">
                          <?php
                          require_once 'Api/oopkoneksi.php';
                          require_once 'Api/lihatdatamaster.php';


                          $obj = new readstolakdash;
                          $data = $obj->sumstolakdash();


                          $nomor = 1;
                          if ($data->rowCount() > 0) {
                            while ($row = $data->fetch(PDO::FETCH_ASSOC)) {

                              echo $row['total'];
                            }
                          }
                          ?>
                        </div>
                      </div>
                      <div class="col-auto">
                        <img src="images/icon-ditolak.png" height="40">
                      </div>
                    </div>
                  </div>
                </div>
              </div>

              <!-- kartu surat selesai -->
              <div class="col-xl-3 col-md-6 mb-2">
                <div class="card border-left-success shadow h-100 py-2">
                  <div class="card-body">
                    <div class="row no-gutters align-items-center">
                      <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                          Surat Selesai</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">
                        <?php 
                              include_once('Api/oopkoneksi.php');
                              include_once("Api/lihatdatamaster.php");
                              
                              $obj = new readssdash;
                              $data = $obj->sumssdash();
                              // $nomor = 1;
                              if ($data->rowCount() > 0) {
                                  while ($row = $data->fetch(PDO::FETCH_ASSOC)) {

                                    echo $row['total'];
                                  }
                              }
                            
                              ?>
                        </div>
                      </div>
                      <div class="col-auto">
                        <img src="images/icon-selesai.png" height="40">
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <div class="row">
              <!-- Area Chart -->
              <div class="col-xl-12 col-lg-7">
                <div class="col-lg-12 grid-margin stretch-card">
                  <div class="card">
                    <div class="card-body">
                      <h4 class="card-title">Jenis Pengajuan Surat</h4>
                      <p class="card-description">
                        Menampilkan data jenis pengajuan
                      </p>
                      <div class="table-responsive">
                        <table class="table">
                          <thead>
                            <tr>
                              <th>No</th>
                              <th>Jenis Pengajuan Surat</th>
                            </tr>
                          </thead>
                          <tbody>
                            <tr>
                              <td>1</td>
                              <td>Keterangan Usaha</td>
                            </tr>
                            <tr>
                              <td>2</td>
                              <td>Keterangan Pindah</td>
                            </tr>
                            <tr>
                              <td>3</td>
                              <td>Keterangan Belum Menikah</td>
                            </tr>
                            <tr>
                              <td>4</td>
                              <td>Keterangan Kematian</td>
                            </tr>
                            <tr>
                              <td>5</td>
                              <td>Keterangan Domisili</td>
                            </tr>
                            <tr>
                              <td>6</td>
                              <td>Keterangan Tidak Mampu</td>
                            </tr>
                            <tr>
                              <td>7</td>
                              <td>Keterangan Berkelakuan Baik</td>
                            </tr>
                          </tbody>
                        </table>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
        </div> 
        <!--end id content -->
      </div>

      <!-- End of Content Wrapper -->
      <?php include('include/footer.php');?>
    </div>
    <!-- End of Page Wrapper -->
    

<!-- /.container-fluid -->


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
