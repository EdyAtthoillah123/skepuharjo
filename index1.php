<!-- <!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;500;600;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../Web_Kelurahan_Kepuharjo/view/stylee.css">
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
    <title>Document</title>
</head>

<body>
    <input type="checkbox" id="check">
    <label for="check">
        <i id="btn"> <img src="../Web_Kelurahan_Kepuharjo/images/bars.png" alt=""></i>
        <i id="cancel"> <img src="../Web_Kelurahan_Kepuharjo/images/bars.png" alt=""></i>
    </label>
    <div class="sidebar">
        <header>S-Kepuharjo</header>
        <ul>
            <li><a href="#">
                    <img src="../Web_Kelurahan_Kepuharjo/images/icon1.png" alt="" class="icon">
                    <span class="deskription">Dashboard</span>
                </a></li>
        </ul>
        <ul>
            <li><a href="#">
                    <img src="../Web_Kelurahan_Kepuharjo/images/icon2.png" alt="" class="icon">
                    <span class="deskription">Pengajuan Surat</span>

                </a></li>
            <div class="sub-sidebar">
                <ul>
                    <li><a href="#">
                            <img src="../Web_Kelurahan_Kepuharjo/images/icon3.png" alt="" class="icon">
                            <span class="deskription">Surat Masuk</span>
                        </a></li>
                </ul>
                <ul>
                    <li><a href="#">
                            <img src="../Web_Kelurahan_Kepuharjo/images/icon4.png" alt="" class="icon">
                            <span class="deskription">Surat Diproses</span>
                        </a></li>
                </ul>
                <ul>
                    <li><a href="#">
                            <img src="../Web_Kelurahan_Kepuharjo/images/icon5.png" alt="" class="icon">
                            <span class="deskription">Surat Dapat Diambil</span>
                        </a></li>
                </ul>
                <ul>
                    <li><a href="#">
                            <img src="../Web_Kelurahan_Kepuharjo/images/icon6.png" alt="" class="icon">
                            <span class="deskription">Surat Ditolak</span>
                        </a></li>
                </ul>
                <ul>
                    <li><a href="#">
                            <img src="../Web_Kelurahan_Kepuharjo/images/icon7.png" alt="" class="icon">
                            <span class="deskription">Surat Selesai</span>
                        </a></li>
                </ul>
            </div>
        </ul>
        <ul>
            <li><a href="#">
                    <img src="../Web_Kelurahan_Kepuharjo/images/icon8.png" alt="" class="icon">
                    <span class="deskription">Master Data</span>
                </a></li>
        </ul>
        <ul>
            <li><a href="#">
                    <img src="../Web_Kelurahan_Kepuharjo/images/icon9.png" alt="" class="icon">
                    <span class="deskription">Tentang</span>
                </a></li>
        </ul>
        <h2 class="version-text">Version 1.0</h2>
    </div>

</body>

</html> -->
<?php
require_once 'Api/oopkoneksi.php';
require_once 'Api/lihatdatamaster.php';
$obj = new readdata;
if ($_SERVER['REQUEST_METHOD'] == 'POST') :
    $idAkun = $_POST['id_akun'];
    $nama_lengkapp = $_POST['nama_lengkap'];
    $password = md5($_POST['password']);
    $noHP = $_POST['no_hp'];
    $HakAkses = $_POST['hak_akses'];
    $rt = $_POST['rt'];
    $rw = $_POST['rw'];
    if ($obj->insertdata($idAkun, $nama_lengkapp, $password, $noHP, $HakAkses, $rt, $rw)) :

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

    <title>Coba CRUD</title>

    <!-- Custom fonts for this template-->
    <link href="fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

    <!-- buat tabelnya -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.1/css/jquery.dataTables.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>

</head>
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="col-lg-6 mb-4">

    </div>
    <h1 class="h3 mb-4 text-gray-800">Percobaan CRUD</h1>

    <div class="row">
        <div class="col-lg-4">

            <!-- Circle Buttons -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Form Tambah Data</h6>
                </div>
                <div class="card-body">
                    <form action="index1.php" method="post">
                        <div class="user-details">
                            <div class="input-box">
                                <span class="details">NIK</span>
                                <input type="text" name="id_akun" placeholder="Silahkan Diisi" required>
                            </div>
                            <div class="input-box">
                                <span class="details">Nama Lengkap</span>
                                <input type="text" name="nama_lengkap" placeholder="Silahkan Diisi" required>
                            </div>
                            <div class="input-box">
                                <span class="details">Password</span>
                                <input type="text" name="password" placeholder="Silahkan Diisi" required>
                            </div>
                            <div class="input-box">
                                <span class="details">Nomer HP</span>
                                <input type="text" name="no_hp" placeholder="Silahkan Diisi" required>
                            </div>
                            <div class="input-box">
                                <span class="details">Hak Akses</span>
                                <input type="text" name="hak_akses" placeholder="Silahkan Diisi" required>
                            </div>
                            <div class="input-box">
                                <span class="details">RT</span>
                                <input type="text" name="rt" placeholder="Silahkan Diisi" required>
                            </div>
                            <div class="input-box">
                                <span class="details">RW</span>
                                <input type="text" name="rw" placeholder="Silahkan Diisi" required>
                            </div>
                        </div>
                        <div class="button">
                            <input type="submit" value="Tambah Buku">
                        </div>
                    </form>
                    <style>
                        form .user-details .input-box {
                            margin: 20px 0 12px 0;
                            width: 100%;
                        }

                        .user-details .input-box .details {
                            display: block;
                            font-weight: 500;
                            margin-bottom: 5px;
                        }

                        .user-details .input-box input {
                            height: 45px;
                            width: 100%;
                            outline: none;
                            border-radius: 5px;
                            border: 1px solid #ccc;
                            padding-left: 15px;
                            font-size: 16px;
                            border-bottom-width: 2px;
                            transition: all 0.3s ease;
                        }

                        /* biar saat ngisi text langsung pindah ke line bawah */
                        form .user-details .input-box-2 {
                            margin: 20px 0 12px 0;
                            width: calc(100% / 2 - 20px);
                        }

                        .user-details .input-box-2 .details {
                            display: block;
                            font-weight: 500;
                            margin-bottom: 5px;
                        }

                        .user-details .input-box-2 input {
                            height: 90px;
                            width: 100%;
                            outline: none;
                            border-radius: 5px;
                            border: 1px solid #ccc;
                            padding-left: 15px;
                        }

                        /* biar saat di klik muncul warna di line kotak */
                        .user-details .input-box input:focus,
                        .user-details .input-box input:valid {
                            border-color: #00789D;
                        }

                        form .button {
                            height: 45px;
                            margin: 45px 0;
                        }

                        form .button input {
                            height: 100%;
                            width: 100%;
                            outline: none;
                            color: #fff;
                            border: none;
                            font-size: 18px;
                            font-weight: 500;
                            border-radius: 5px;
                            letter-spacing: 1px;
                            background: linear-gradient(135deg, #00AAAA, #0FA8EA);
                        }

                        /* biar saat kursor mengarah kesini warna jadi berubah */
                        form .button input:hover {
                            background: linear-gradient(-135deg, #00AAAA, #0FA8EA);
                        }

                        /* biar responsiv */
                        @media (max-width: 584px) {
                            .container {
                                max-width: 100%;
                            }

                            form .user-details .input-box {
                                margin-bottom: 15px;
                                width: 100%;
                            }

                            form .user-details .input-box-2 {
                                margin-bottom: 15px;
                                width: 100%;
                            }

                            form .user-details .input-box-2 {
                                margin-bottom: 15px;
                                width: 100%;
                            }

                            form .user-details .input-box-3 {
                                margin-bottom: 15px;
                                width: 100%;
                            }

                            form .user-details .input-box-3 {
                                margin-bottom: 15px;
                                width: 100%;
                            }

                            .container form .user-details {
                                max-height: 300px;
                                overflow-y: scroll;
                            }

                            .user-details::-webkit-scrollbar {
                                width: 0;
                            }
                        }
                    </style>
                </div>
            </div>
        </div>
        <div class="col-lg-8">

            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Data Kelurahan</h6>
                </div>
                <div class="col-lg-6 mb-4">

                </div>

                <div class="table-responsive">
                    <table id="example" class="display" style="width:100%">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Lengkap</th>
                                <th>Nomer telepon</th>
                                <th>Hak Akses</th>
                                <th>RT</th>
                                <th>RW</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $conn = mysqli_connect("localhost", "root", "", "kepuharjo");
                            $q = mysqli_query($conn, "SELECT * FROM akun where hak_akses = '1' OR hak_akses = '2' OR hak_akses = '3'");
                            $no = 0;
                            while ($data = mysqli_fetch_array($q)) {
                                $no++;
                            ?>
                                <tr>
                                    <td><?= $data['id_akun'] ?></td>
                                    <td><?= $data['nama_lengkap'] ?></td>
                                    <td><?= $data['no_hp'] ?></td>
                                    <td><?= $data['hak_akses'] ?></td>
                                    <td><?= $data['rt'] ?></td>
                                    <td><?= $data['rw'] ?></td>
                                    <td>
                                        <button type="button" class="btn btn-success">Edit</button>
                                        <button type="button" class="btn btn-danger">Hapus</button>
                                    </td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                    <script>
                        $(document).ready(function() {
                            $('#example').DataTable();
                        });
                    </script>
                </div>
            </div>
        </div>
    </div>
</div>

</html>