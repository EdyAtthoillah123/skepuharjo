<?php
session_start();
if($_SESSION['hak_akses']=='2'){
require_once 'Api/oopkoneksi.php';
require_once 'Api/perbarui/update.php';
$obj = new updatert;
if ($_SERVER['REQUEST_METHOD'] == 'POST') :
    $id = $_POST['idsurat'];
    $idsp = 'Diproses RT';
    if(isset($_POST['idsurat'])){
        $datenow = date("m");
        if($datenow == "1"){
            $datenow = "I";
        }elseif($datenow == "2"){
            $datenow = "II";
        }elseif($datenow == "3"){
            $datenow = "III";
        }elseif($datenow == "4"){
            $datenow = "IV";
        }elseif($datenow == "5"){
            $datenow = "V";
        }elseif($datenow == "6"){
            $datenow = "VI";
        }elseif($datenow == "7"){
            $datenow = "VII";
        }elseif($datenow == "8"){
            $datenow = "VIII";
        }elseif($datenow == "9"){
            $datenow = "IX";
        }elseif($datenow == "10"){
            $datenow = "X";
        }elseif($datenow == "11"){
            $datenow = "XI";
        }elseif($datenow == "12"){
            $datenow = "XII";
        }else{

        }
        $tahunnow = date("Y");
        $rtses = $_SESSION['rt'];
        $rwses = $_SESSION['rw'];
    }
    $nomorsp = "$id / $rwses.$rtses / $datenow / $tahunnow";
    if ($obj->idRTUsaha($idsp, $id, $nomorsp)) :

    else :
        
    endif;
endif;
}elseif($_SESSION['hak_akses']=='3'){
?>

<?php
require_once 'Api/oopkoneksi.php';
require_once 'Api/perbarui/update.php';
$obj = new updaterw;
if ($_SERVER['REQUEST_METHOD'] == 'POST') :
    $id = $_POST['idsurat'];
    $idsp = 'Diproses RW';
    
    if ($obj->idRWUsaha($idsp, $id)) :

    else :
        
    endif;
endif;
}elseif($_SESSION['hak_akses']=='1'){

    require_once 'Api/oopkoneksi.php';
    require_once 'Api/perbarui/update.php';
    $obj = new updatekelurahan;
    if ($_SERVER['REQUEST_METHOD'] == 'POST') :
        $id = $_POST['idsurat'];
        $idsp = 'Selesai';
        
        if ($obj->idkelUsaha($idsp, $id)) :
    
        else :
            
        endif;
    endif;
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
          <div class="container-fluid">

            <!-- Page Heading -->
            <div class="d-sm-flex align-items-center justify-content-between mb-4">
                <h1 class="h3 mb-4 text-gray-800">Pengajuan Surat Usaha</h1>
                <form class="d-grid gap-2 d-md-flex justify-content-md-end navbar-search">
                    <button class="btn btn-info dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Jenis Pengajuan
                        <span class="badge badge-danger badge-counter">
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
                                ?></span>
                    </button>
                    <div class="dropdown-menu animated--fade-in" aria-labelledby="dropdownMenuButton">
                        <a class="dropdown-item" href="surat-masuk-SKTM.php">SKTM <?php $value = 1?>
                            <span class="badge badge-danger badge-counter">
                                <?php
                                require_once 'Api/oopkoneksi.php';
                                require_once 'Api/lihatdatamaster.php';


                                $obj = new readsktm;
                                $data = $obj->sumsktm();


                                $nomor = 1;
                                if ($data->rowCount() > 0) {
                                    while ($row = $data->fetch(PDO::FETCH_ASSOC)) {

                                        echo $row['sumid'];
                                    }
                                }
                                ?></span>
                        </a>
                        <a class="dropdown-item" href="surat-masuk-domisili.php">Domisili <?php $value = 2?>
                            <span class="badge badge-danger badge-counter">
                                <?php
                                require_once 'Api/oopkoneksi.php';
                                require_once 'Api/lihatdatamaster.php';


                                $obj = new readdomisili;
                                $data = $obj->sumdomisili();


                                $nomor = 1;
                                if ($data->rowCount() > 0) {
                                    while ($row = $data->fetch(PDO::FETCH_ASSOC)) {

                                        echo $row['sumid'];
                                    }
                                }
                                ?></span>
                        </a>
                        <a class="dropdown-item" href="surat-masuk-akta.php">Akta Kelahiran <?php $value = 3?>
                            <span class="badge badge-danger badge-counter">
                                <?php
                                require_once 'Api/oopkoneksi.php';
                                require_once 'Api/lihatdatamaster.php';


                                $obj = new readakta;
                                $data = $obj->sumakta();


                                $nomor = 1;
                                if ($data->rowCount() > 0) {
                                    while ($row = $data->fetch(PDO::FETCH_ASSOC)) {

                                        echo $row['sumid'];
                                    }
                                }
                                ?></span>
                        </a>
                        <!-- <a class="dropdown-item" href="surat-masuk-pindah.php">Keterangan Pindah <?php $value = 4?>
                            <span class="badge badge-danger badge-counter">
                                <?php
                                // require_once 'Api/oopkoneksi.php';
                                // require_once 'Api/lihatdatamaster.php';


                                // $obj = new readpindah;
                                // $data = $obj->sumpindah();


                                // $nomor = 1;
                                // if ($data->rowCount() > 0) {
                                //     while ($row = $data->fetch(PDO::FETCH_ASSOC)) {

                                //         echo $row['sumid'];
                                //     }
                                // }
                                ?></span>
                        </a> -->
                        <a class="dropdown-item" href="surat-masuk-belummenikah.php">Belum menikah <?php $value = 5?>
                            <span class="badge badge-danger badge-counter">
                                <?php
                                require_once 'Api/oopkoneksi.php';
                                require_once 'Api/lihatdatamaster.php';


                                $obj = new readbelumnikah;
                                $data = $obj->sumbelumnikah();


                                $nomor = 1;
                                if ($data->rowCount() > 0) {
                                    while ($row = $data->fetch(PDO::FETCH_ASSOC)) {

                                        echo $row['sumid'];
                                    }
                                }
                                ?></span>
                        </a>
                        <a class="dropdown-item" href="surat-masuk-kematian.php">Kematian <?php $value = 6?>
                            <span class="badge badge-danger badge-counter">
                                <?php
                                require_once 'Api/oopkoneksi.php';
                                require_once 'Api/lihatdatamaster.php';


                                $obj = new readkematian;
                                $data = $obj->sumkematian();


                                $nomor = 1;
                                if ($data->rowCount() > 0) {
                                    while ($row = $data->fetch(PDO::FETCH_ASSOC)) {

                                        echo $row['sumid'];
                                    }
                                }
                                ?></span>
                        </a>
                        <a class="dropdown-item" href="surat-masuk-usaha.php">Surat Usaha <?php $value = 6?>
                            <span class="badge badge-danger badge-counter">
                                <?php
                                require_once 'Api/oopkoneksi.php';
                                require_once 'Api/lihatdatamaster.php';


                                $obj = new readusaha;
                                $data = $obj->sumusaha();


                                $nomor = 1;
                                if ($data->rowCount() > 0) {
                                    while ($row = $data->fetch(PDO::FETCH_ASSOC)) {

                                        echo $row['sumid'];
                                    }
                                }
                                ?></span>
                        </a>
                        <a class="dropdown-item" href="surat-masuk-berkelakuanbaik.php">Surat Berkelakuan Baik <?php $value = 7?>
                            <span class="badge badge-danger badge-counter">
                                <?php
                                require_once 'Api/oopkoneksi.php';
                                require_once 'Api/lihatdatamaster.php';


                                $obj = new readkelakuanbaik;
                                $data = $obj->sumkelakuanbaik();


                                $nomor = 1;
                                if ($data->rowCount() > 0) {
                                    while ($row = $data->fetch(PDO::FETCH_ASSOC)) {

                                        echo $row['sumid'];
                                    }
                                }
                                ?></span>
                        </a>
                    </div>
                </form>
            </div>
            <div class="row">
                <div class="col-lg-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Surat Masuk Usaha</h4>
                            <p class="card-description">
                                Menampilkan data surat masuk untuk disetujui
                            </p>
                            <div class="table-responsive">
                                <table class="table table-striped">
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
                                        <?php
                                        require_once 'Api/oopkoneksi.php';
                                        require_once 'Api/suratmasuk.php';


                                        $obj = new suratmasukusaha;
                                        $data = $obj->lihatsuratmasuk();
                                        $nomor = 1;
                                        if ($data->rowCount() > 0) {
                                            while ($row = $data->fetch(PDO::FETCH_ASSOC)) {
                                            


                                        ?>
                                        <form action="surat-masuk-usaha.php" method="post">
                                                <tr>
                                                    <td scope="col"><?php echo $nomor++; ?></td>
                                                    <td scope="col"><?php echo $row['nik']; ?></td>
                                                    <td scope="col"><?php echo $row['nama']; ?></td>
                                                    <td scope="col"><?php echo 'Surat Usaha'; ?></td>
                                                    <td scope="col"><?php echo $row['tgl_pengajuan']; ?></td>
                                                    <td scope="col"><span class="badge badge-secondary"><?php echo $row['status_surat']; ?></span></td>
                                                    <td><?php if($_SESSION['hak_akses']== '2'){ ?>
                                                        <input class="btn btn-primary" type="submit" value="Proses Surat RT">
                                                        <td scope="col" ><input type="hidden"name ="idsurat" id="idsurat" value="<?php echo $row['id_surat']; ?>" /></td>
                                                    <?php }elseif($_SESSION['hak_akses']=='3'){?>
                                                    <a class="btn btn-primary" href="Api/update/updateRWusaha.php?kode=<?php echo $row['id_surat']?>">Proses Surat RW</a>
                                                    <?php }elseif($_SESSION['hak_akses']=='1'){?>
                                                        <input class="btn btn-primary" type="submit" value="Proses Surat Kelurahan">
                                                        <td scope="col" ><input type="hidden"name ="idsurat" id="idsurat" value="<?php echo $row['id_surat']; ?>" /></td>
                                                    <?php }else{} ?>
                                                    </td>
                                                </tr>
                                                </form>
                                        <?php }
                                        } ?>
                                    
                                    </tbody>

                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 mb-4"></div>
                    <button type="button" class="btn btn-info">SETUJUI SEMUA</button>
                </div>
                <div class="col-lg-6 mb-4">

                </div>
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