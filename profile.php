<?php
session_start();
// require_once 'Api/oopkoneksi.php';
// require_once 'Api/suratdiproses.php';
// $obj = new readprofile;
// $data = $obj->lihatprofile();
// $nomor = 1;
// if ($data->rowCount() > 0) {
//     while ($row = $data->fetch(PDO::FETCH_ASSOC)) {
//         $row['image'];
//     }};
// 
?>
        
<?php
$akun = $_SESSION['id_akun'];
$msg = "";

// check if the user has clicked the button "UPLOAD" 

if(isset($_POST['uploadfile'])){}

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
  <link rel="stylesheet" href="css/profil.css">
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
            <div class="container">
            <?php
                require_once 'Api/oopkoneksi.php';
                require_once 'Api/lihatdatamaster.php';


                $obj = new readprofile;
                $data = $obj->lihatprofile();

                if ($data->rowCount() > 0) {
                    while ($row = $data->fetch(PDO::FETCH_ASSOC)) {

                ?>
                <form method="POST" action="" enctype="multipart/form-data">
                    <h1 class="judul">Profil</h1>
                    <div class="lingkaran1">
                        <img class="img-profile rounded-circle" src="Api/uploads/<?php echo $row['image']; ?> ">
                
                    </div>
                </form>


                <form method="POST" action="" enctype="multipart/form-data">

                    <input type="file" name="choosefile" value="" />

                    <div>

                        <button type="submit" name="uploadfile">

                            UPLOAD

                        </button>

                    </div>

                </form>

                

                <?php }
                } ?>
                <form>
                    <div class="field-box">
                        <div class="form-group">
                            <label>Nama</label>
                            <input type="text" name="username" class="form-control" required>
                        </div>
                        <div class=form-group>
                            <label>Email</label>
                            <input type="email" name="email" class="form-control" required>
                        </div>
                        <div class=form-group>
                            <label>Status</label>
                            <input type="text" name="status" class="form-control" required>
                        </div>
                        <div class="button">
                            <input type="submit" value="Edit Profil">
                        </div>
                    </div>
                    <div class="col-lg-6 mb-4">

                    </div>
                </form>
            </div>
        </div> 
        <!--end id content -->
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