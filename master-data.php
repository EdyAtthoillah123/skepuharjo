<?php
session_start();
use LDAP\Result;

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
                <h1 class="h3 mb-4 text-gray-800">Master Data</h1>
                <form class="d-grid gap-2 d-md-flex justify-content-md-end navbar-search">
                    <div class="input-group">
                        <input type="text" id="searchInput" onkeyup="searchTable()" class="form-control bg-light border-2 small" placeholder="Cari Akun..." >
                    </div>
                </form>
            </div>

            <div class="row">

                <div class="col-lg-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Data Masyarakat</h4>
                            <p class="card-description">
                                Menampilkan data masyarakat
                            </p>
                            <div class="table-responsive">
                            
                                <table id="myTable" class="table">

                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>NIK</th>
                                            <th>Nama Lengkap</th>
                                            <th>No Hp</th>
                                            <th>RT</th>
                                            <th>RW</th>

                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        require_once 'Api/oopkoneksi.php';
                                        require_once 'Api/lihatdatamaster.php';


                                        $obj = new read;
                                        $data = $obj->lihatdata();


                                        $nomor = 1;
                                        if ($data->rowCount() > 0) {
                                            while ($row = $data->fetch(PDO::FETCH_ASSOC)) {


                                        ?>

                                                <tr>
                                                    <td scope="col"><?php echo $nomor++; ?></td>
                                                    <td scope="col"><?php echo $row['id_akun']; ?></td>
                                                    <td scope="col"><?php echo $row['nama_lengkap']; ?></td>
                                                    <td scope="col"><?php echo $row['no_hp']; ?></td>
                                                    <td scope="col"><?php echo $row['rt']; ?></td>
                                                    <td scope="col"><?php echo $row['rw']; ?></td>


                                                    <td>
                                                    <button type="button" class="btn btn-danger btn-sm btn-icon-text mr-3">
                                                            Hapus
                                                            <i class="typcn typcn-edit btn-icon-append"></i>
                                                        </button>  
                                                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                                    Edit
                                  </button>

                                  <!-- Modal -->
                                  <form action="master-dataRTRW.php" method="post">
                                  <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                      <div class="modal-content">
                                        <div class="modal-header">
                                          <h5 class="modal-title" id="exampleModalLabel">Edit Data akun</h5>
                                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                          </button>
                                        </div>
                                        <div class="modal-body">
                                        <div class="form-group">
                                        <div  class="form-group">
                                <span class="details">Username RT RW</span>
                                <input type="text" name="id_akun" class="form-control" value='<?php echo $row['id_akun']; ?>' required>
                            </div>
                            <div  class="form-group">
                                <span class="details">Nama Lengkap</span>
                                <input type="text" class="form-control" name="nama_lengkap" value='<?php echo $row['nama_lengkap']; ?>' required>
                            </div>
                            <div  class="form-group">
                                <span class="details">Password</span>
                                <input type="text" class="form-control" name="password" value='<?php echo $row['password']; ?>' required>
                            </div>
                            <div  class="form-group">
                                <span class="details">Nomer HP</span>
                                <input type="text"  class="form-control" name="no_hp" value='<?php echo $row['no_hp']; ?>' required>
                            </div>
                            
                            <div  class="form-group">
                                <span class="details">RT</span>
                                <input type="text" class="form-control" name="rt" value='<?php echo $row['rt']; ?>' required>
                            </div>
                            <div  class="form-group">
                                <span class="details">RW</span>
                                <input type="text" class="form-control" name="rw" value='<?php echo $row['rw']; ?>' required>
                            </div>
                                        </div>
                                        <div class="modal-footer">
                                        <div class="button">
                            <input class="btn btn-primary" type="submit" value="Simpan">
                        </div>
                        </form>
                                                        
                                                    </td>
                                                    

                                                </tr>
                                                
                                        <?php }
                                        } ?>
                                    </tbody>
                                </table>

                                <script>
                                function searchTable() {
                                // Get the input field value
                                var input = document.getElementById("searchInput").value;
                                // Get the table
                                var table = document.getElementById("myTable");
                                // Get the rows of the table
                                var rows = table.getElementsByTagName("tr");
                                // Loop through the rows
                                for (var i = 0; i < rows.length; i++) {
                                    // Get the cells of the current row
                                    var cells = rows[i].getElementsByTagName("td");
                                    // Set found to false
                                    var found = false;
                                    // Loop through the cells
                                    for (var j = 0; j < cells.length; j++) {
                                    // If the cell's text content contains the input value, set found to true
                                    if (cells[j].textContent.toLowerCase().indexOf(input.toLowerCase()) > -1) {
                                        found = true;
                                    }
                                    }
                                    // If found is true, show the row, otherwise hide it
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