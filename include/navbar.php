
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

  <!-- Sidebar - Brand -->
  <a class="sidebar-brand d-flex align-items-center justify-content-center" href="dashboard.php">
    <div class="sidebar-brand-icon rotate-n-0">
      <img src="images/logo_kepuharjo.png" height="40">
    </div>
    <div class="sidebar-brand-text mx-2">S-Kepuharjo <sup></sup></div>
  </a>

  <!-- Divider -->
  <hr class="sidebar-divider my-0">

  <!-- Nav Item - Dashboard -->
  <li class="nav-item active">
    <a class="nav-link" href="dashboard.php">
      <i class="fas fa-fw fa-tachometer-alt"></i>
      <span>Dashboard</span></a>
  </li>

  <!-- Divider -->
  <hr class="sidebar-divider">

  <!-- Heading -->
  <div class="sidebar-heading">
    MENU UTAMA
  </div>

  <!-- Nav Item - Pages Collapse Menu -->
  <li class="nav-item">
    <a class="nav-link collapsed" href="" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
      <i class="fas fa-fw fa-cog"></i>
      <span>Pengajuan Surat </span>
    </a>
    
    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
      <div class="bg-white py-2 collapse-inner rounded">
        <h6 class="collapse-header">Status Surat:</h6>
        <?php if($_SESSION['hak_akses']=='2'){ ?>
        <a class="collapse-item" href="surat-masuk-SKTM.php">Surat Masuk
        <span class="badge badge-danger badge-counter">
        <?php 
          include_once('Api/oopkoneksi.php');
          include_once("Api/lihatdatamaster.php");
          
          $obj = new readsmdash;
          $data = $obj->sumsmdash();
          // $nomor = 1;
          if ($data->rowCount() > 0) {
              while ($row = $data->fetch(PDO::FETCH_ASSOC)) {

                echo $row['total'];
              }
          }
        
          ?>
          </span>
        </a>
        <a class="collapse-item" href="surat-diproses.php">Surat Diproses 
        <span class="badge badge-danger badge-counter">
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
      </span>
        </a>
        <a class="collapse-item" href="surat-ditolak.php">Surat Ditolak 
        <span class="badge badge-danger badge-counter">
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
      </span>
        </a>
        <a class="collapse-item" href="surat-selesai.php">Surat Selesai
        <span class="badge badge-danger badge-counter">
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
          </span>

          <?php }elseif($_SESSION['hak_akses']=='3'){?>
            <a class="collapse-item" href="surat-masuk-SKTM.php">Surat Masuk
        <span class="badge badge-danger badge-counter">
        <?php 
          include_once('Api/oopkoneksi.php');
          include_once("Api/lihatdatamaster.php");
          
          $obj = new readsmdash;
          $data = $obj->sumsmdash();
          // $nomor = 1;
          if ($data->rowCount() > 0) {
              while ($row = $data->fetch(PDO::FETCH_ASSOC)) {

                echo $row['total'];
              }
          }
        
          ?>
          </span>
        </a>
        <a class="collapse-item" href="surat-diproses.php">Surat Diproses 
        <span class="badge badge-danger badge-counter">
          
        <?php
        if($_SESSION['hak_akses']=='3'){
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
    }elseif($_SESSION['hak_akses']=='2'){
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
    }elseif($_SESSION['hak_akses']=='1'){
      include_once('Api/oopkoneksi.php');
          include_once("Api/lihatdatamaster.php");
          
          $obj = new readssdashadmin;
          $data = $obj->sumssdash();
          // $nomor = 1;
          if ($data->rowCount() > 0) {
              while ($row = $data->fetch(PDO::FETCH_ASSOC)) {

                echo $row['total'];
              }
          }
    }else {
      
    }
      ?>
      </span>
        </a>
        <a class="collapse-item" href="surat-ditolak.php">Surat Ditolak 
        <span class="badge badge-danger badge-counter">
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
      </span>
        </a>
        <a class="collapse-item" href="surat-selesai.php">Surat Selesai
        <span class="badge badge-danger badge-counter">
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
          </span>
          <?php }elseif($_SESSION['hak_akses']=='1'){ ?>
            <a class="collapse-item" href="surat-masuk-SKTM.php">Surat Masuk
        <span class="badge badge-danger badge-counter">
        <?php 
          include_once('Api/oopkoneksi.php');
          include_once("Api/lihatdatamaster.php");
          
          $obj = new readsmdash;
          $data = $obj->sumsmdash();
          // $nomor = 1;
          if ($data->rowCount() > 0) {
              while ($row = $data->fetch(PDO::FETCH_ASSOC)) {

                echo $row['total'];
              }
          }
        
          ?>
          </span>
        </a>
        <a class="collapse-item" href="surat-diproses.php">Surat Diproses
        <span class="badge badge-danger badge-counter">
        <?php
        if($_SESSION['hak_akses']== '2'){
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
    }elseif($_SESSION['hak_akses']== '3'){
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
    }elseif($_SESSION['hak_akses']=='1'){
      require_once 'Api/oopkoneksi.php';
      require_once 'Api/lihatdatamaster.php';


      $obj = new readssdashadmin;
      $data = $obj->sumssdash();


      $nomor = 1;
      if ($data->rowCount() > 0) {
        while ($row = $data->fetch(PDO::FETCH_ASSOC)) {

          echo $row['total'];
        }
      }
    }
      ?>
      </span>
      <a class="collapse-item" href="surat-selesai.php">Surat Selesai
        <span class="badge badge-danger badge-counter">
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
          </span>
      <?php }else{} ?>
        </a>
        </a>
      </div>
    </div>
  </li>


  <!-- Heading -->
  <?php
  if ($_SESSION['hak_akses'] == "1") {
    echo '<div class="sidebar-heading">';
    echo 'MENU LAINNYA';
    echo '</div>';
    echo '';
    echo '<!-- Nav Item - Charts -->';
    echo '<li class="nav-item">';
    echo '<a class="nav-link" href="master-dataRTRW.php">';
    echo '<i class="fas fa-fw fa-chart-area"></i>';
    echo '<span>Data Akun RT RW</span></a>';
    echo '</li>';
    echo '';
    echo '<!-- Nav Item - Charts -->';
    echo '<li class="nav-item">';
    echo '<a class="nav-link" href="master-data.php">';
    echo '<i class="fas fa-fw fa-chart-area"></i>';
    echo '<span>Data Akun User</span></a>';
    echo '</li>';
    echo '<li class="nav-item">';
    echo '<a class="nav-link" href="berita.php">';
    echo '<i class="fas fa-fw fa-table"></i>';
    echo '<span>Berita</span></a>';
    echo '</li>';
  } elseif ($_SESSION['hak_akses'] == "2") {
    echo "";
  } elseif ($_SESSION['hak_akses'] == "3") {
    echo "";
  } else {
    echo "";
  }
  ?>


  <!-- Nav Item - Tables -->
  <li class="nav-item">
    <a class="nav-link" href="tentang.php">
      <i class="fas fa-fw fa-table"></i>
      <span>Tentang</span></a>
  </li>


  <!-- Sidebar Toggler (Sidebar) -->
  <div class="text-center d-none d-md-inline">
    <button class="rounded-circle border-0" id="sidebarToggle"></button>
  </div>

</ul>
<!-- End of Sidebar -->


</body>
</html>
        
        
