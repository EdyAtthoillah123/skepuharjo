<?php
include 'koneksi/koneksi.php';
$query = mysqli_query($conn,"SELECT id_surat,no_surat,nama,tempat_lahir,tanggal_lahir,jenis_kelamin,kebangsaan,agama,status_perkawinan,pekerjaan,nik,alamat,RT,RW,no_pengantar_surat,
tgl_surat_pengantar,alamat_domisili_kel_kepu,surat_digunakan_untuk,tgl_surat_dibuat,id_image FROM domisili WHERE id_surat = 'IDS0003'");
$data = mysqli_fetch_assoc($query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Simple Registration Form in PHP - Tutsmake.com</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-offset-2">
                <div class="page-header">
                    <h2>Preview data Syarat Surat</h2>
                </div>
                
                <form action="pdfdomisili.php" method="post">

                    <div class="form-group">
                        <label>Nomor Surat</label>
                        <input type="text" name="nomor" class="form-control" value="<?php echo $data['no_surat']; ?>" maxlength="50" required="">
                    </div>
                    <div class="form-group">
                        <label>Nama</label>
                        <input type="text" name="nama" class="form-control" value="<?php echo $data['nama']; ?>" maxlength="50" required="">
                    </div>
                    <div class="form-group">
                        <label>Tempat, Tanggal Lahir</label>
                        <input type="text" name="ttl" class="form-control" value="<?php echo $data['tempat_lahir'] ;  echo ", ";  echo $data['tanggal_lahir'] ?>" maxlength="50" required="">
                    </div>
                    <div class="form-group">
                        <label>Jenis kelamin</label>
                        <input type="text" name="kelamin" class="form-control" value="<?php echo $data['jenis_kelamin']; ?>" maxlength="50" required="">
                    </div>
                    <div class="form-group ">
                        <label>Kebangsaan / Agama</label>
                        <input type="text" name="kebangsaan" class="form-control" value="<?php echo $data['kebangsaan']; ?>" maxlength="30" required="">
                    </div>

                    <div class="form-group">
                        <label>Status</label>
                        <input type="text" name="status" class="form-control" value="<?php echo $data['status_perkawinan']; ?>" maxlength="50" required="">
                        <span class="text-danger">
                    </div>
                    <div class="form-group">
                        <label>Pekerjaan</label>
                        <input type="text" name="pekerjaan" class="form-control" value="<?php echo $data['pekerjaan']; ?>" maxlength="50" required="">
                        <span class="text-danger">
                    </div>
                    <div class="form-group">
                        <label>NIK</label>
                        <input type="text" name="nik" class="form-control" value="<?php echo $data['nik']; ?>" maxlength="50" required="">
                        <span class="text-danger">
                    </div>
                    <div class="form-group">
                        <label>Alamat</label>
                        <input type="text" name="alamat" class="form-control" value="<?php echo $data['alamat']; ?>" maxlength="50" required="">
                        <span class="text-danger">
                    </div>
                    <div class="form-group">
                        <label>RT</label>
                        <input type="text" name="rt" class="form-control" value="<?php echo $data['RT']; ?>" maxlength="50" required="">
                        <span class="text-danger">
                    </div>
                    <div class="form-group">
                        <label>RW</label>
                        <input type="text" name="rw" class="form-control" value="<?php echo $data['RW']; ?>" maxlength="50" required="">
                        <span class="text-danger">
                    </div>
                    <div class="form-group">
                        <label>No Pengantar Surat</label>
                        <input type="text" name="no_pengantar_surat" class="form-control" value="<?php echo $data['no_pengantar_surat']; ?>" maxlength="50" required="">
                        <span class="text-danger">
                    </div>
                    <div class="form-group">
                        <label>Tgl Surat Pengantar</label>
                        <input type="text" name="tgl_pengantar_surat" class="form-control" value="<?php echo $data['tgl_surat_pengantar']; ?>" maxlength="50" required="">
                        <span class="text-danger">
                    </div>
                    <div class="form-group">
                        <label>Alamat Domisili Kelurahan Kepuharjo</label>
                        <input type="text" name="alamat_domisili_kel_kepu" class="form-control" value="<?php echo $data['alamat_domisili_kel_kepu']; ?>" maxlength="50" required="">
                        <span class="text-danger">
                    </div>
                    <div class="form-group">
                        <label>Surat Digunakan Untuk</label>
                        <input type="text" name="surat_digunakan_untuk" class="form-control" value="<?php echo $data['surat_digunakan_untuk']; ?>" maxlength="50" required="">
                        <span class="text-danger">
                    </div>
                    <div class="form-group">
                        <label>Tanggal Surat Dibuat</label>
                        <input type="text" name="tgl_surat_dibuat" class="form-control" value="<?php echo $data['tgl_surat_dibuat']; ?>" maxlength="50" required="">
                        <span class="text-danger">
                    </div>                
                    <input type="submit" class="btn btn-primary" name="signup" value="submit">
                    <input type= "" onclick="location.href='<?php echo "https://wa.me/62"; echo $data['no_hp'];?>'"" class="btn btn-primary" name="" value="Kirim">
                    <a href="<?php echo "https://wa.me/62"; echo $data['no_hp'];?>">kirim</a>
                    
                </form>
            </div>
        </div>    
    </div>
</body>
</html>