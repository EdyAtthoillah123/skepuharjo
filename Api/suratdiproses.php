<?php
require_once 'Api/oopkoneksi.php';
class readsm extends koneksii
{
    public function suratdiproses()
    {
        $sql = "SELECT id_akun,nama, tgl_surat_pengantar, status_surat from domisili WHERE status_surat = 'diproses'";
        $result = $this->koneksi->prepare($sql);
        $result->execute();
        return $result;
    }
}


class sktm extends koneksii
{
    public function suratdiproses()
    {
        $_SESSION['hak_akses'];
        if($_SESSION['hak_akses']=='2'){
           $row = "Diproses RT";
           $rt= $_SESSION['rt'];
           $rw = $_SESSION['rw'];
               $sql = "SELECT surat_tidak_mampu.id_akun as id_akun,surat_tidak_mampu.RT,surat_tidak_mampu.RW, id_surat, no_surat, nama,tempat_lahir,tanggal_lahir, jenis_kelamin, kebangsaan, agama, status, pekerjaan,nik, alamat, no_pengantar, tgl_pengajuan, keterangan, keperluan, tgl_dibuat, status_surat,surat_tidak_mampu.image, akun.no_hp as no_hp from akun JOIN surat_tidak_mampu on akun.id_akun = surat_tidak_mampu.id_akun WHERE surat_tidak_mampu.status_surat = '$row' AND surat_tidak_mampu.RT = '$rt' AND surat_tidak_mampu.RW = '$rw'";
               $result = $this->koneksi->prepare($sql);
               $result->execute();
               return $result;
        }elseif($_SESSION['hak_akses']=='3'){
         $row = "Diproses RW";
         $rt= $_SESSION['rt'];
         $rw = $_SESSION['rw'];
             $sql = "SELECT surat_tidak_mampu.id_akun as id_akun,surat_tidak_mampu.RT,surat_tidak_mampu.RW, id_surat, no_surat, nama,tempat_lahir,tanggal_lahir, jenis_kelamin, kebangsaan, agama, status, pekerjaan,nik, alamat, no_pengantar, tgl_pengajuan, keterangan, keperluan, tgl_dibuat, status_surat,surat_tidak_mampu.image, akun.no_hp as no_hp from akun JOIN surat_tidak_mampu on akun.id_akun = surat_tidak_mampu.id_akun WHERE surat_tidak_mampu.status_surat = '$row' AND surat_tidak_mampu.RW = '$rw'";
             $result = $this->koneksi->prepare($sql);
             $result->execute();
             return $result;
        }elseif($_SESSION['hak_akses']=='1'){
         $rt= $_SESSION['rt'];
         $rw = $_SESSION['rw'];
           $row = "Selesai";
           $sql = "SELECT surat_tidak_mampu.id_akun as id_akun,surat_tidak_mampu.RT,surat_tidak_mampu.RW, id_surat, no_surat, nama,tempat_lahir,tanggal_lahir, jenis_kelamin, kebangsaan, agama, status, pekerjaan,nik, alamat, no_pengantar, tgl_pengajuan, keterangan, keperluan, tgl_dibuat, status_surat,surat_tidak_mampu.image, akun.no_hp as no_hp from akun JOIN surat_tidak_mampu on akun.id_akun = surat_tidak_mampu.id_akun WHERE surat_tidak_mampu.status_surat = '$row' or status_surat = 'Diproses Kelurahan'";
               $result = $this->koneksi->prepare($sql);
               $result->execute();
               return $result;
        }else{
            
        }
     
    }

}

class domisili extends koneksii
{
    public function suratdiproses()
    {
        $_SESSION['hak_akses'];
        if($_SESSION['hak_akses']=='2'){
           $row = "Diproses RT";
           $rt= $_SESSION['rt'];
           $rw = $_SESSION['rw'];
               $sql = "SELECT id_surat,no_pengantar, no_surat, nama, tempat_lahir, tanggal_lahir, jenis_kelamin, kebangsaan, agama, status_perkawinan, pekerjaan, nik, alamat, domisili.RT, domisili.RW, no_pengantar, tgl_surat_pengantar, alamat_domisili_kel_kepu, surat_digunakan_untuk, tgl_surat_dibuat, tgl_pengajuan, status_surat, domisili.images, akun.no_hp, domisili.id_akun, domisili.tgl_pengajuan FROM domisili JOIN akun ON domisili.id_akun = akun.id_akun WHERE domisili.status_surat = '$row' AND domisili.RT = '$rt' AND domisili.RW = '$rw'";
               $result = $this->koneksi->prepare($sql);
               $result->execute();
               return $result;
        }elseif($_SESSION['hak_akses']=='3'){
           $row = "Diproses RW";
           $rt= $_SESSION['rt'];
    $rw = $_SESSION['rw'];
        $sql = "SELECT id_surat, no_surat,no_pengantar, nama, tempat_lahir, tanggal_lahir, jenis_kelamin, kebangsaan, agama, status_perkawinan, pekerjaan, nik, alamat, domisili.RT, domisili.RW, no_pengantar, tgl_surat_pengantar, alamat_domisili_kel_kepu, surat_digunakan_untuk, tgl_surat_dibuat, tgl_pengajuan, status_surat, domisili.images, akun.no_hp, domisili.id_akun, domisili.tgl_pengajuan FROM domisili JOIN akun ON domisili.id_akun = akun.id_akun WHERE domisili.status_surat = '$row' AND domisili.RW = '$rw'";
        $result = $this->koneksi->prepare($sql);
        $result->execute();
        return $result;
        }elseif($_SESSION['hak_akses']=='1'){
           $row = "Selesai";
           $rt= $_SESSION['rt'];
    $rw = $_SESSION['rw'];
        $sql = "SELECT id_surat, no_surat,no_pengantar, nama, tempat_lahir, tanggal_lahir, jenis_kelamin, kebangsaan, agama, status_perkawinan, pekerjaan, nik, alamat, domisili.RT, domisili.RW, no_pengantar, tgl_surat_pengantar, alamat_domisili_kel_kepu, surat_digunakan_untuk, tgl_surat_dibuat, tgl_pengajuan, status_surat, domisili.images, akun.no_hp, domisili.id_akun, domisili.tgl_pengajuan FROM domisili JOIN akun ON domisili.id_akun = akun.id_akun WHERE domisili.status_surat = '$row'";
        $result = $this->koneksi->prepare($sql);
        $result->execute();
        return $result;
        }else{
            
        }
     
    }
}


class belum_menikah extends koneksii
{
    public function suratdiproses()
    {
        $_SESSION['hak_akses'];
        if($_SESSION['hak_akses']=='2'){
           $row = "Diproses RT";
           $rt= $_SESSION['rt'];
           $rw = $_SESSION['rw'];
               $sql = "SELECT `id_surat`, `no_surat`,no_pengantar, `nama`, `tempat_lahir`, `tanggal_lahir`, `jenis_kelamin`, `kebangsaan`, `agama`, `status`, `pekerjaan`, `nik`, `alamat`, `status_surat`, `tgl_pengajuan`, surat_ket_belum_menikah.RT, surat_ket_belum_menikah.RW, `surat_digunakan`, tgl_surat_dibuat, surat_ket_belum_menikah.image, akun.id_akun, akun.no_hp FROM `surat_ket_belum_menikah` JOIN akun ON akun.id_akun = surat_ket_belum_menikah.id_akun WHERE status_surat='$row' AND surat_ket_belum_menikah.RT = '$rt' AND surat_ket_belum_menikah.RW = '$rw'";
               $result = $this->koneksi->prepare($sql);
               $result->execute();
               return $result;
        }elseif($_SESSION['hak_akses']=='3'){
           $row = "Diproses RW";
           $rt= $_SESSION['rt'];
           $rw = $_SESSION['rw'];
               $sql = "SELECT `id_surat`, `no_surat`,no_pengantar, `nama`, `tempat_lahir`, `tanggal_lahir`, `jenis_kelamin`, `kebangsaan`, `agama`, `status`, `pekerjaan`, `nik`, `alamat`, `status_surat`, `tgl_pengajuan`, surat_ket_belum_menikah.RT, surat_ket_belum_menikah.RW, `surat_digunakan`, tgl_surat_dibuat, surat_ket_belum_menikah.image, akun.id_akun, akun.no_hp FROM `surat_ket_belum_menikah` JOIN akun ON akun.id_akun = surat_ket_belum_menikah.id_akun WHERE status_surat='$row' AND surat_ket_belum_menikah.RW = '$rw'";
               $result = $this->koneksi->prepare($sql);
               $result->execute();
               return $result;
        }elseif($_SESSION['hak_akses']=='1'){
           $row = "Selesai";
           $rt= $_SESSION['rt'];
           $rw = $_SESSION['rw'];
               $sql = "SELECT `id_surat`, `no_surat`,no_pengantar, `nama`, `tempat_lahir`, `tanggal_lahir`, `jenis_kelamin`, `kebangsaan`, `agama`, `status`, `pekerjaan`, `nik`, `alamat`, `status_surat`, `tgl_pengajuan`, surat_ket_belum_menikah.RT, surat_ket_belum_menikah.RW, `surat_digunakan`, tgl_surat_dibuat, surat_ket_belum_menikah.image, akun.id_akun, akun.no_hp FROM `surat_ket_belum_menikah` JOIN akun ON akun.id_akun = surat_ket_belum_menikah.id_akun WHERE status_surat='$row'";
               $result = $this->koneksi->prepare($sql);
               $result->execute();
               return $result;
        }else{
            
        }
    
    }
}
class ket_usaha extends koneksii
{
    public function suratdiproses()
    {
        $_SESSION['hak_akses'];
        if($_SESSION['hak_akses']=='2'){
           $row = "Diproses RT";
           $rt= $_SESSION['rt'];
           $rw = $_SESSION['rw'];
               $sql = "SELECT `id_surat`, `no_surat`, `nama`,no_pengantar, `tempat_lahir`, `tanggal_lahir`, `jenis_kelamin`, `kebangsaan`, `agama`, `status`, `pekerjaan`, `nik`, `alamat`, `nama_usaha`, thn_usaha_dibuat, `keperluan`, `tgl_surat_dibuat`, surat_usaha.image, `status_surat`, surat_usaha.RT, surat_usaha.RW, `tgl_pengajuan`, surat_usaha.id_akun, akun.id_akun, akun.no_hp FROM `surat_usaha` JOIN akun ON surat_usaha.id_akun=akun.id_akun WHERE status_surat='$row' AND surat_usaha.RT = '$rt' AND surat_usaha.RW = '$rw'";
               $result = $this->koneksi->prepare($sql);
               $result->execute();
               return $result;
        }elseif($_SESSION['hak_akses']=='3'){
           $row = "Diproses RW";
           $rt= $_SESSION['rt'];
           $rw = $_SESSION['rw'];
               $sql = "SELECT `id_surat`, `no_surat`, `nama`,no_pengantar, `tempat_lahir`, `tanggal_lahir`, `jenis_kelamin`, `kebangsaan`, `agama`, `status`, `pekerjaan`, `nik`, `alamat`, `nama_usaha`, thn_usaha_dibuat, `keperluan`, `tgl_surat_dibuat`, surat_usaha.image, `status_surat`, surat_usaha.RT, surat_usaha.RW, `tgl_pengajuan`, surat_usaha.id_akun, akun.id_akun, akun.no_hp FROM `surat_usaha` JOIN akun ON surat_usaha.id_akun=akun.id_akun WHERE status_surat='$row' AND surat_usaha.RW = '$rw'";
               $result = $this->koneksi->prepare($sql);
               $result->execute();
               return $result;
        }elseif($_SESSION['hak_akses']=='1'){
           $row = "Selesai";
           $rt= $_SESSION['rt'];
           $rw = $_SESSION['rw'];
               $sql = "SELECT `id_surat`, `no_surat`, `nama`,no_pengantar, `tempat_lahir`, `tanggal_lahir`, `jenis_kelamin`, `kebangsaan`, `agama`, `status`, `pekerjaan`, `nik`, `alamat`, `nama_usaha`, thn_usaha_dibuat, `keperluan`, `tgl_surat_dibuat`, surat_usaha.image, `status_surat`, surat_usaha.RT, surat_usaha.RW, `tgl_pengajuan`, surat_usaha.id_akun, akun.id_akun, akun.no_hp FROM `surat_usaha` JOIN akun ON surat_usaha.id_akun=akun.id_akun WHERE status_surat='$row'";
               $result = $this->koneksi->prepare($sql);
               $result->execute();
               return $result;
        }else{
            
        }
    
    }
}

class akta_kelahiran extends koneksii
{
    public function suratdiproses()
    {   
        $_SESSION['hak_akses'];
        if($_SESSION['hak_akses']=='2'){
           $row = "Diproses RT";
           $rt= $_SESSION['rt'];
           $rw = $_SESSION['rw'];
               $sql = "SELECT `id_surat`, `nomor_surat`, `nama_anak`,no_pengantar, `tempat_lahir`, `tanggal_lahir`, `jenis_kelamin`, `kebangsaan`, `agama`, `status`, `pekerjaan`, `nik`, `alamat`, `nama_ayah`, `umur_ayah`, `kebangsaan_ayah`, `agama_ayah`, `pekerjaan_ayah`, `alamat_ayah`, `nama_ibu`, `umur_ibu`, `kebangsaan_ibu`, `agama_ibu`, `pekerjaan_ibu`, `alamat_ibu`, surat_akta_kelahiran.RT, surat_akta_kelahiran.RW, `status_surat`, `tgl_pengajuan`, keperluan, tgl_surat_dibuat, surat_akta_kelahiran.image, surat_akta_kelahiran.id_akun, akun.no_hp FROM `surat_akta_kelahiran` JOIN akun ON surat_akta_kelahiran.id_akun=akun.id_akun WHERE status_surat='$row' AND surat_akta_kelahiran.RT = '$rt' AND surat_akta_kelahiran.RW = '$rw'";
               $result = $this->koneksi->prepare($sql);
               $result->execute();
               return $result;
        }elseif($_SESSION['hak_akses']=='3'){
           $row = "Diproses RW";
           $rt= $_SESSION['rt'];
    $rw = $_SESSION['rw'];
        $sql = "SELECT `id_surat`, `nomor_surat`, `nama_anak`, `tempat_lahir`,no_pengantar, `tanggal_lahir`, `jenis_kelamin`, `kebangsaan`, `agama`, `status`, `pekerjaan`, `nik`, `alamat`, `nama_ayah`, `umur_ayah`, `kebangsaan_ayah`, `agama_ayah`, `pekerjaan_ayah`, `alamat_ayah`, `nama_ibu`, `umur_ibu`, `kebangsaan_ibu`, `agama_ibu`, `pekerjaan_ibu`, `alamat_ibu`, surat_akta_kelahiran.RT, surat_akta_kelahiran.RW, `status_surat`, `tgl_pengajuan`, keperluan, tgl_surat_dibuat, surat_akta_kelahiran.image, surat_akta_kelahiran.id_akun, akun.no_hp FROM `surat_akta_kelahiran` JOIN akun ON surat_akta_kelahiran.id_akun=akun.id_akun WHERE status_surat='$row' AND surat_akta_kelahiran.RW = '$rw'";
        $result = $this->koneksi->prepare($sql);
        $result->execute();
        return $result;
        }elseif($_SESSION['hak_akses']=='1'){
           $row = "Selesai";
           $rt= $_SESSION['rt'];
    $rw = $_SESSION['rw'];
        $sql = "SELECT `id_surat`, `nomor_surat`, `nama_anak`, `tempat_lahir`,no_pengantar, `tanggal_lahir`, `jenis_kelamin`, `kebangsaan`, `agama`, `status`, `pekerjaan`, `nik`, `alamat`, `nama_ayah`, `umur_ayah`, `kebangsaan_ayah`, `agama_ayah`, `pekerjaan_ayah`, `alamat_ayah`, `nama_ibu`, `umur_ibu`, `kebangsaan_ibu`, `agama_ibu`, `pekerjaan_ibu`, `alamat_ibu`, surat_akta_kelahiran.RT, surat_akta_kelahiran.RW, `status_surat`, `tgl_pengajuan`, keperluan, tgl_surat_dibuat, surat_akta_kelahiran.image, surat_akta_kelahiran.id_akun, akun.no_hp FROM `surat_akta_kelahiran` JOIN akun ON surat_akta_kelahiran.id_akun=akun.id_akun WHERE status_surat='$row'";
        $result = $this->koneksi->prepare($sql);
        $result->execute();
        return $result;
        }else{
            
        }

    }
}

class kematian extends koneksii
{
    public function suratdiproses()
    {
      $_SESSION['hak_akses'];
      if($_SESSION['hak_akses']=='2'){
         $row = "Diproses RT";
         $rt= $_SESSION['rt'];
         $rw = $_SESSION['rw'];
               $sql = "SELECT `id_surat`, `no_surat`, `nama_almarhum`,no_pengantar, `saksi_kematian`, `hubungan`, `hari`, `tanggal`, `alamat`, `nik_almarhum`, `penyebab_kematian`, `surat_digunakan`, `tanggal_dibuat`, `status_surat`, `tgl_pengajuan`, surat_kematian.RT, surat_kematian.RW, surat_kematian.image, akun.id_akun, akun.no_hp  FROM `surat_kematian` JOIN akun ON akun.id_akun = surat_kematian.id_akun WHERE status_surat='$row' AND surat_kematian.RT = '$rt' AND surat_kematian.RW = '$rw'";
               $result = $this->koneksi->prepare($sql);
               $result->execute();
               return $result;
      }elseif($_SESSION['hak_akses']=='3'){
         $row = "Diproses RW";
         $rt= $_SESSION['rt'];
         $rw = $_SESSION['rw'];
               $sql = "SELECT `id_surat`, `no_surat`, `nama_almarhum`,no_pengantar, `saksi_kematian`, `hubungan`, `hari`, `tanggal`, `alamat`, `nik_almarhum`, `penyebab_kematian`, `surat_digunakan`, `tanggal_dibuat`, `status_surat`, `tgl_pengajuan`, surat_kematian.RT, surat_kematian.RW, surat_kematian.image, akun.id_akun, akun.no_hp  FROM `surat_kematian` JOIN akun ON akun.id_akun = surat_kematian.id_akun WHERE status_surat='$row' AND surat_kematian.RW = '$rw'";
               $result = $this->koneksi->prepare($sql);
               $result->execute();
               return $result;
      }elseif($_SESSION['hak_akses']=='1'){
         $row = "Selesai";
         $rt= $_SESSION['rt'];
         $rw = $_SESSION['rw'];
               $sql = "SELECT `id_surat`, `no_surat`, `nama_almarhum`,no_pengantar, `saksi_kematian`, `hubungan`, `hari`, `tanggal`, `alamat`, `nik_almarhum`, `penyebab_kematian`, `surat_digunakan`, `tanggal_dibuat`, `status_surat`, `tgl_pengajuan`, surat_kematian.RT, surat_kematian.RW, surat_kematian.image, akun.id_akun, akun.no_hp  FROM `surat_kematian` JOIN akun ON akun.id_akun = surat_kematian.id_akun WHERE status_surat='$row'";
               $result = $this->koneksi->prepare($sql);
               $result->execute();
               return $result;
      }else{
          
      }
    }
}

class berkelakuanbaik extends koneksii
{
    public function suratdiproses()
    {   
        $_SESSION['hak_akses'];
        if($_SESSION['hak_akses']=='2'){
           $row = "Diproses RT";
           $rt= $_SESSION['rt'];
           $rw = $_SESSION['rw'];
               $sql = "SELECT `id_surat`, `no_surat`, `nama`, `tempat_lahir`,no_pengantar, `tanggal_lahir`, `jenis_kelamin`, `kebangsaan`, `agama`, `status`, `pekerjaan`, `nik`, `alamat`, `status_surat`, `tgl_pengajuan`, surat_berkelakuan_baik.RT, surat_berkelakuan_baik.RW, `surat_digunakan`, `tgl_surat_dibuat`, `file_pdf`, surat_berkelakuan_baik.image, akun.id_akun, akun.no_hp FROM `surat_berkelakuan_baik` JOIN akun ON surat_berkelakuan_baik.id_akun=akun.id_akun WHERE status_surat='$row' AND surat_berkelakuan_baik.RT = '$rt' AND surat_berkelakuan_baik.RW = '$rw'";
               $result = $this->koneksi->prepare($sql);
               $result->execute();
               return $result;
        }elseif($_SESSION['hak_akses']=='3'){
           $row = "Diproses RW";
           $rt= $_SESSION['rt'];
    $rw = $_SESSION['rw'];
        $sql = "SELECT `id_surat`, `no_surat`, `nama`, `tempat_lahir`,no_pengantar, `tanggal_lahir`, `jenis_kelamin`, `kebangsaan`, `agama`, `status`, `pekerjaan`, `nik`, `alamat`, `status_surat`, `tgl_pengajuan`, surat_berkelakuan_baik.RT, surat_berkelakuan_baik.RW, `surat_digunakan`, `tgl_surat_dibuat`, `file_pdf`, surat_berkelakuan_baik.image, akun.id_akun, akun.no_hp FROM `surat_berkelakuan_baik` JOIN akun ON surat_berkelakuan_baik.id_akun=akun.id_akun WHERE status_surat='$row' AND surat_berkelakuan_baik.RW = '$rw'";
        $result = $this->koneksi->prepare($sql);
        $result->execute();
        return $result;
        }elseif($_SESSION['hak_akses']=='1'){
           $row = "Selesai";
           $rt= $_SESSION['rt'];
    $rw = $_SESSION['rw'];
        $sql = "SELECT `id_surat`, `no_surat`, `nama`, `tempat_lahir`,no_pengantar, `tanggal_lahir`, `jenis_kelamin`, `kebangsaan`, `agama`, `status`, `pekerjaan`, `nik`, `alamat`, `status_surat`, `tgl_pengajuan`, surat_berkelakuan_baik.RT, surat_berkelakuan_baik.RW, `surat_digunakan`, `tgl_surat_dibuat`, `file_pdf`, surat_berkelakuan_baik.image, akun.id_akun, akun.no_hp FROM `surat_berkelakuan_baik` JOIN akun ON surat_berkelakuan_baik.id_akun=akun.id_akun WHERE status_surat='$row'";
        $result = $this->koneksi->prepare($sql);
        $result->execute();
        return $result;
        }else{
            
        }
     
    }
}

// class pindah extends koneksii
// {
//     public function suratdiproses()
//     {   
//         $_SESSION['hak_akses'];
//         if($_SESSION['hak_akses']=='2'){
//            $row = "Diproses RT";
//            $rt= $_SESSION['rt'];
//            $rw = $_SESSION['rw'];
//                $sql = "SELECT `id_surat`, `tgl_dibuat`, `no_surat`, `sifat`, `lampiran`, `perihal`, `nama`, `tempat_lahir`, `tanggal_lahir`, `jenis_kelamin`, `status`, `agama`, `alamat_asal`, `alamat_tujuan`, `kelurahan`, `kecamatan`, `kabupaten`, `provinsi`, `alasan_pindah`, `pengikut`, `status_surat`, `tgl_pengajuan`, surat_pindah.RT, surat_pindah.RW, surat_pindah.image as image, surat_pindah.id_akun, no_hp FROM `surat_pindah` JOIN akun ON surat_pindah.id_akun=akun.id_akun WHERE status_surat='$row' AND surat_pindah.RT = '$rt' AND surat_pindah.RW = '$rw'";
//                $result = $this->koneksi->prepare($sql);
//                $result->execute();
//                return $result;
//         }elseif($_SESSION['hak_akses']=='3'){
//            $row = "Diproses RW";
//            $rt= $_SESSION['rt'];
//     $rw = $_SESSION['rw'];
//         $sql = "SELECT `id_surat`, `tgl_dibuat`, `no_surat`, `sifat`, `lampiran`, `perihal`, `nama`, `tempat_lahir`, `tanggal_lahir`, `jenis_kelamin`, `status`, `agama`, `alamat_asal`, `alamat_tujuan`, `kelurahan`, `kecamatan`, `kabupaten`, `provinsi`, `alasan_pindah`, `pengikut`, `status_surat`, `tgl_pengajuan`, surat_pindah.RT, surat_pindah.RW, surat_pindah.image as image, surat_pindah.id_akun, no_hp FROM `surat_pindah` JOIN akun ON surat_pindah.id_akun=akun.id_akun WHERE status_surat='$row' AND surat_pindah.RT = '$rt' AND surat_pindah.RW = '$rw'";
//         $result = $this->koneksi->prepare($sql);
//         $result->execute();
//         return $result;
//         }elseif($_SESSION['hak_akses']=='1'){
//            $row = "Diproses Kelurahan";
//            $rt= $_SESSION['rt'];
//     $rw = $_SESSION['rw'];
//         $sql = "SELECT `id_surat`, `tgl_dibuat`, `no_surat`, `sifat`, `lampiran`, `perihal`, `nama`, `tempat_lahir`, `tanggal_lahir`, `jenis_kelamin`, `status`, `agama`, `alamat_asal`, `alamat_tujuan`, `kelurahan`, `kecamatan`, `kabupaten`, `provinsi`, `alasan_pindah`, `pengikut`, `status_surat`, `tgl_pengajuan`, surat_pindah.RT, surat_pindah.RW, surat_pindah.image as image, surat_pindah.id_akun, no_hp FROM `surat_pindah` JOIN akun ON surat_pindah.id_akun=akun.id_akun WHERE status_surat='$row'";
//         $result = $this->koneksi->prepare($sql);
//         $result->execute();
//         return $result;
//         }else{
            
//         }
     
//     }
// }
        // class suratbelumnikah extends koneksii{
        //     public function suratdiproses(){
        //         $sql = "SELECT id_akun,nama, tgl_pengajuan, status_surat from surat_ket_belum_nikah WHERE status_surat = 'diproses'";
        //         $result= $this->koneksi->prepare($sql);
        //         $result->execute();
        //         return $result; 
                                              
        //         }  
        //     }