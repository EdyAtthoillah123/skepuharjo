<?php
require_once 'Api/oopkoneksi.php';
class read extends koneksii
{
    public function lihatdata()
    {
        $sql = "SELECT akun.id_akun as id_akun , nama_lengkap,password,no_hp,akun.rt,akun.rw FROM akun where hak_akses = '4'";
        $result = $this->koneksi->prepare($sql);
        $result->execute();
        return $result;
    }
}

class readrtrw extends koneksii
{
    public function lihatdata()
    {
        $sql = "SELECT akun.id_akun as id_akun , nama_lengkap,password,no_hp,akun.rt,akun.rw FROM akun where hak_akses = '3' or hak_akses='2' ";
        $result = $this->koneksi->prepare($sql);
        $result->execute();
        return $result;
    }
}


class readberita extends koneksii
{
    public function lihatberita()
    {
        $sql = "SELECT berita.id_berita as id_berita , judul,sub_title,dekripsi FROM berita
        ";
        $result = $this->koneksi->prepare($sql);
        $result->execute();
        return $result;
    }

    public function insertberita($judull, $bagann, $deskripsii)
    {
        try {
            $sql = "INSERT INTO `berita`(`judul`, `sub_title`, `dekripsi`) VALUES (:judul, :sub_title, :dekripsi)";
            $result = $this->koneksi->prepare($sql);
            $result->bindParam(":judul", $judull);
            $result->bindParam(":sub_title", $bagann);
            $result->bindParam(":dekripsi", $deskripsii);
            $result->execute();
            return true;
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
            //throw $th;
        }
    }
}

class updateidsuratpengantar extends koneksii{
    public function idspsktm($idsp, $id)
{
    try {
        $sql = "UPDATE surat_tidak_mampu SET no_surat =:idspengantar WHERE id_surat =:idsurat";
        $result = $this->koneksi->prepare($sql);
        $result->bindParam(":idspengantar", $idsp);
        $result->bindParam(":idsurat", $id);
        $result->execute();
        if ($result->rowCount() > 0) {
            return true;
        } else {
            return false;
        }
    } catch (PDOException $e) {
        echo $e->getMessage();
        return false;
    } finally {
        $result->close();
        $this->koneksi->close();
    }
}

}



class readdata extends koneksii
{
    // public function lihatdata()
    // {
    //     $sql = "SELECT berita.id_berita as id_berita , judul,sub_title,dekripsi FROM berita
    //     ";
    //     $result = $this->koneksi->prepare($sql);
    //     $result->execute();
    //     return $result;
    // }

    public function insertdata($idAkun, $nama_lengkapp, $password, $noHP, $HakAkses, $rt, $rw)
    {
        try {
            $sql = "INSERT INTO `akun`(`id_akun`,`nama_lengkap`, `password`, `no_hp`, `hak_akses`, `rt`, `rw`) VALUES (:id_akun,:nama_lengkap, :password, :no_hp, :hak_akses, :rt, :rw)";
            $result = $this->koneksi->prepare($sql);
            $result->bindParam(":id_akun", $idAkun);
            $result->bindParam(":nama_lengkap", $nama_lengkapp);
            $result->bindParam(":password", $password);
            $result->bindParam(":no_hp", $noHP);
            $result->bindParam(":hak_akses", $HakAkses);
            $result->bindParam(":rt", $rt);
            $result->bindParam(":rw", $rw);
            $result->execute();
            return true;
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
            //throw $th;
        }
    }
}


class readprofile extends koneksii
{
    public function lihatprofile()
    {
        $id = $_SESSION['id_akun'];
        $sql = "SELECT image FROM akun WHERE id_akun = '$id'";
        $result = $this->koneksi->prepare($sql);
        $result->execute();
        return $result;
    }
}

class readsktm extends koneksii
{
    public function sumsktm()
    {
        $_SESSION['hak_akses'];
        if ($_SESSION['hak_akses'] == '2') {
            $row = "Diajukan";
        } elseif ($_SESSION['hak_akses'] == '3') {
            $row = "Disetujui RT";
        } elseif ($_SESSION['hak_akses'] == '1') {
            $row = "Disetujui RW";
        } else {
        }
        $rt = $_SESSION['rt'];
        $rw = $_SESSION['rw'];
        $sql = "SELECT COUNT(id_surat) as sumid from surat_tidak_mampu WHERE status_surat = '$row' AND RT = '$rt' AND RW = '$rw'";
        $result = $this->koneksi->prepare($sql);
        $result->execute();
        return $result;
    }
}
class readdomisili extends koneksii
{
    public function sumdomisili()
    {
        $_SESSION['hak_akses'];
        if ($_SESSION['hak_akses'] == '2') {
            $row = "Diajukan";
        } elseif ($_SESSION['hak_akses'] == '3') {
            $row = "Disetujui RT";
        } elseif ($_SESSION['hak_akses'] == '1') {
            $row = "Disetujui RW";
        } else {
        }
        $rt = $_SESSION['rt'];
        $rw = $_SESSION['rw'];
        $sql = "SELECT COUNT(domisili.id_surat) as sumid from domisili WHERE status_surat = '$row' AND RT = '$rt' AND RW = '$rw'";
        $result = $this->koneksi->prepare($sql);
        $result->execute();
        return $result;
    }
}

class readusaha extends koneksii
{
    public function sumusaha()
    {
        $_SESSION['hak_akses'];
        if ($_SESSION['hak_akses'] == '2') {
            $row = "Diajukan";
        } elseif ($_SESSION['hak_akses'] == '3') {
            $row = "Disetujui RT";
        } elseif ($_SESSION['hak_akses'] == '1') {
            $row = "Disetujui RW";
        } else {
        }
        $rt = $_SESSION['rt'];
        $rw = $_SESSION['rw'];
        $sql = "SELECT COUNT(surat_usaha.id_surat) as sumid from surat_usaha WHERE status_surat = '$row' AND RT = '$rt' AND RW = '$rw'";
        $result = $this->koneksi->prepare($sql);
        $result->execute();
        return $result;
    }
}

class readakta extends koneksii
{
    public function sumakta()
    {
        $_SESSION['hak_akses'];
        if ($_SESSION['hak_akses'] == '2') {
            $row = "Diajukan";
        } elseif ($_SESSION['hak_akses'] == '3') {
            $row = "Disetujui RT";
        } elseif ($_SESSION['hak_akses'] == '1') {
            $row = "Disetujui RW";
        } else {
        }
        $rt = $_SESSION['rt'];
        $rw = $_SESSION['rw'];
        $sql = "SELECT COUNT(surat_akta_kelahiran.id_surat) as sumid from surat_akta_kelahiran WHERE status_surat = '$row' AND RT = '$rt' AND RW = '$rw'";
        $result = $this->koneksi->prepare($sql);
        $result->execute();
        return $result;
    }
}
class readpindah extends koneksii
{
    public function sumpindah()
    {
        $_SESSION['hak_akses'];
        if ($_SESSION['hak_akses'] == '2') {
            $row = "Diajukan";
        } elseif ($_SESSION['hak_akses'] == '3') {
            $row = "Disetujui RT";
        } elseif ($_SESSION['hak_akses'] == '1') {
            $row = "Disetujui RW";
        } else {
        }
        $rt = $_SESSION['rt'];
        $rw = $_SESSION['rw'];
        $sql = "SELECT COUNT(surat_berkelakuan_baik.id_surat) as sumid from surat_berkelakuan_baik WHERE status_surat = '$row' AND RT = '$rt' AND RW = '$rw'";
        $result = $this->koneksi->prepare($sql);
        $result->execute();
        return $result;
    }
}
class readkematian extends koneksii
{
    public function sumkematian()
    {
        $_SESSION['hak_akses'];
        if ($_SESSION['hak_akses'] == '2') {
            $row = "Diajukan";
        } elseif ($_SESSION['hak_akses'] == '3') {
            $row = "Disetujui RT";
        } elseif ($_SESSION['hak_akses'] == '1') {
            $row = "Disetujui RW";
        } else {
        }
        $rt = $_SESSION['rt'];
        $rw = $_SESSION['rw'];
        $sql = "SELECT COUNT(surat_kematian.id_surat) as sumid from surat_kematian WHERE status_surat = '$row' AND RT = '$rt' AND RW = '$rw'";
        $result = $this->koneksi->prepare($sql);
        $result->execute();
        return $result;
    }
}
class readbelumnikah extends koneksii
{
    public function sumbelumnikah()
    {
        $_SESSION['hak_akses'];
        if ($_SESSION['hak_akses'] == '2') {
            $row = "Diajukan";
        } elseif ($_SESSION['hak_akses'] == '3') {
            $row = "Disetujui RT";
        } elseif ($_SESSION['hak_akses'] == '1') {
            $row = "Disetujui RW";
        } else {
        }
        $rt = $_SESSION['rt'];
        $rw = $_SESSION['rw'];
        $sql = "SELECT COUNT(surat_ket_belum_menikah.id_surat) as sumid from surat_ket_belum_menikah WHERE status_surat = '$row' AND RT = '$rt' AND RW = '$rw'";
        $result = $this->koneksi->prepare($sql);
        $result->execute();
        return $result;
    }
}

class readkelakuanbaik extends koneksii
{
    public function sumkelakuanbaik()
    {
        $_SESSION['hak_akses'];
        if ($_SESSION['hak_akses'] == '2') {
            $row = "Diajukan";
        } elseif ($_SESSION['hak_akses'] == '3') {
            $row = "Disetujui RT";
        } elseif ($_SESSION['hak_akses'] == '1') {
            $row = "Disetujui RW";
        } else {
        }
        $rt = $_SESSION['rt'];
        $rw = $_SESSION['rw'];
        $sql = "SELECT COUNT(surat_berkelakuan_baik.id_surat) as sumid from surat_berkelakuan_baik WHERE status_surat = '$row' AND RT = '$rt' AND RW = '$rw'";
        $result = $this->koneksi->prepare($sql);
        $result->execute();
        return $result;
    }
}


class readsmdash extends koneksii
{
    public function sumsmdash()
    {
        $_SESSION['hak_akses'];
        if ($_SESSION['hak_akses'] == '2') {
            $row = "Diajukan";
        } elseif ($_SESSION['hak_akses'] == '3') {
            $row = "Disetujui RT";
        } elseif ($_SESSION['hak_akses'] == '1') {
            $row = "Disetujui RW";
        } else {
        }
        $rt = $_SESSION['rt'];
        $rw = $_SESSION['rw'];

        $sql = "SELECT (SELECT COUNT(*) from domisili WHERE status_surat = '$row'  AND RT = '$rt' AND  RW = '$rw')+ 
        (SELECT COUNT(*) from surat_tidak_mampu WHERE status_surat = '$row'  AND RT = '$rt' AND  RW = '$rw') + 
        (SELECT COUNT(*) from surat_akta_kelahiran WHERE status_surat = '$row'  AND RT = '$rt' AND  RW = '$rw') + 
        (SELECT COUNT(*) from surat_kematian WHERE status_surat = '$row'  AND RT = '$rt' AND  RW = '$rw')+ 
        (SELECT COUNT(*) from surat_ket_belum_menikah WHERE status_surat = '$row'  AND RT = '$rt' AND  RW = '$rw') +  
        (SELECT COUNT(*) from surat_berkelakuan_baik WHERE status_surat = '$row'  AND RT = '$rt' AND  RW = '$rw') + 
        (SELECT COUNT(*) FROM surat_usaha WHERE status_surat = '$row'  AND RT = '$rt' AND  RW = '$rw')  
        as total ";
        $result = $this->koneksi->prepare($sql);
        $result->execute();
        return $result;
    }
}


class lihatsuratselesaiRT extends koneksii{
    public function suratselesai(){
        $_SESSION['hak_akses'];
        if ($_SESSION['hak_akses'] == '2') {
            $row = "Diajukan";
        } elseif ($_SESSION['hak_akses'] == '3') {
            $row = "Disetujui RT";
        } elseif ($_SESSION['hak_akses'] == '1') {
            $row = "Disetujui RW";
        } else {
        }
        $rt = $_SESSION['rt'];
        $rw = $_SESSION['rw'];

        $sql = "SELECT COUNT(id_surat) AS total FROM surat_tidak_mampu WHERE 
        status_surat != '$row' OR status_surat != 'Diproses RT' 
        AND RT = '$rt' AND RW = '$rw' ";
        $result = $this->koneksi->prepare($sql);
        $result->execute();
        return $result;
    }
}


class sumsuratmasuk extends koneksii{
    public function suratmasuk(){
        $_SESSION['hak_akses'];
        if ($_SESSION['hak_akses'] == '2') {
            $row = "Diajukan";
        } elseif ($_SESSION['hak_akses'] == '3') {
            $row = "Disetujui RT";
        } elseif ($_SESSION['hak_akses'] == '1') {
            $row = "Disetujui RW";
        } else {
        }
        $rt = $_SESSION['rt'];
        $rw = $_SESSION['rw'];

        $sql = "SELECT (SELECT COUNT(*) from domisili WHERE status_surat = '$row'  AND RT = '$rt' AND  RW = '$rw')+ 
        (SELECT COUNT(*) from surat_tidak_mampu WHERE status_surat = '$row'  AND RT = '$rt' AND  RW = '$rw') + 
        (SELECT COUNT(*) from surat_akta_kelahiran WHERE status_surat = '$row'  AND RT = '$rt' AND  RW = '$rw') + 
        (SELECT COUNT(*) from surat_kematian WHERE status_surat = '$row'  AND RT = '$rt' AND  RW = '$rw')+ 
        (SELECT COUNT(*) from surat_ket_belum_menikah WHERE status_surat = '$row'  AND RT = '$rt' AND  RW = '$rw') +  
        (SELECT COUNT(*) from surat_berkelakuan_baik WHERE status_surat = '$row'  AND RT = '$rt' AND  RW = '$rw') + 
        (SELECT COUNT(*) FROM surat_usaha WHERE status_surat = '$row'  AND RT = '$rt' AND  RW = '$rw')  
        as total ";
        $result = $this->koneksi->prepare($sql);
        $result->execute();
        return $result;
    }
}

class readspdash extends koneksii
{
    public function sumspdash()
    {
        $_SESSION['hak_akses'];
        if ($_SESSION['hak_akses'] == '2') {
            $row = "Diproses RT";
        } elseif ($_SESSION['hak_akses'] == '3') {
            $row = "Diproses RW";
        } elseif ($_SESSION['hak_akses'] == '1') {
            $row = "Diproses Kelurahan";
        } else {
        }
        $rt = $_SESSION['rt'];
        $rw = $_SESSION['rw'];
        $sql = "SELECT (SELECT COUNT(*) from domisili WHERE status_surat = '$row' AND RT = '$rt' AND RW ='$rw')+ 
        (SELECT COUNT(*) from surat_tidak_mampu WHERE status_surat = '$row' AND RT = '$rt' AND RW ='$rw') + 
        (SELECT COUNT(*) from surat_akta_kelahiran WHERE status_surat = '$row' AND RT = '$rt' AND RW ='$rw') + 
        (SELECT COUNT(*) from surat_kematian WHERE status_surat = '$row' AND RT = '$rt' AND RW ='$rw')+ 
        (SELECT COUNT(*) from surat_ket_belum_menikah WHERE status_surat = '$row' AND RT = '$rt' AND RW ='$rw') +  
        (SELECT COUNT(*) from surat_berkelakuan_baik WHERE status_surat = '$row' AND RT = '$rt' AND RW ='$rw') + 
        (SELECT COUNT(*) FROM surat_usaha WHERE status_surat = '$row'  AND RT = '$rt' AND  RW = '$rw')  
        as total ";
        $result = $this->koneksi->prepare($sql);
        $result->execute();
        return $result;
    }
}

class readssdash extends koneksii
{
    public function sumssdash()
    {
        $_SESSION['hak_akses'];
        if ($_SESSION['hak_akses'] == '2') {
            $row = "Disetujui RT";
        } elseif ($_SESSION['hak_akses'] == '3') {
            $row = "Disetujui RW";
        } elseif ($_SESSION['hak_akses'] == '1') {
            $row = "Selesai";
        } else {
        }
        $rt = $_SESSION['rt'];
        $rw = $_SESSION['rw'];
        $sql = "SELECT (SELECT COUNT(*) from domisili WHERE status_surat = '$row' AND RT = '$rt' AND RW ='$rw')+ 
        (SELECT COUNT(*) from surat_tidak_mampu WHERE status_surat = '$row' AND RT = '$rt' AND RW ='$rw') + 
        (SELECT COUNT(*) from surat_akta_kelahiran WHERE status_surat = '$row' AND RT = '$rt' AND RW ='$rw') + 
        (SELECT COUNT(*) from surat_kematian WHERE status_surat = '$row' AND RT = '$rt' AND RW ='$rw')+ 
        (SELECT COUNT(*) from surat_ket_belum_menikah WHERE status_surat = '$row' AND RT = '$rt' AND RW ='$rw') +  
        (SELECT COUNT(*) from surat_berkelakuan_baik WHERE status_surat = '$row' AND RT = '$rt' AND RW ='$rw') + 
        (SELECT COUNT(*) FROM surat_usaha WHERE status_surat = '$row' AND RT = '$rt' AND  RW = '$rw')  
        as total ";
        $result = $this->koneksi->prepare($sql);
        $result->execute();
        return $result;
    }
}

class readssdashadmin extends koneksii
{
    public function sumssdash()
    {
        $_SESSION['hak_akses'];
        if ($_SESSION['hak_akses'] == '2') {
            $row = "Disetujui RT";
        } elseif ($_SESSION['hak_akses'] == '3') {
            $row = "Disetujui RW";
        } elseif ($_SESSION['hak_akses'] == '1') {
            $row = "Selesai";
        } else {
        }
        
        $sql = "SELECT (SELECT COUNT(*) from domisili WHERE status_surat = '$row')+ 
        (SELECT COUNT(*) from surat_tidak_mampu WHERE status_surat = '$row') + 
        (SELECT COUNT(*) from surat_akta_kelahiran WHERE status_surat = '$row') + 
        (SELECT COUNT(*) from surat_kematian WHERE status_surat = '$row')+ 
        (SELECT COUNT(*) from surat_ket_belum_menikah WHERE status_surat = '$row') +  
        (SELECT COUNT(*) from surat_berkelakuan_baik WHERE status_surat = '$row') + 
        (SELECT COUNT(*) FROM surat_usaha WHERE status_surat = '$row')  
        as total ";
        $result = $this->koneksi->prepare($sql);
        $result->execute();
        return $result;
    }
}

class readstolakdash extends koneksii
{
    public function sumstolakdash()
    {
        $_SESSION['hak_akses'];
        if ($_SESSION['hak_akses'] == '2') {
            $row = "Ditolak RT";
        } elseif ($_SESSION['hak_akses'] == '3') {
            $row = "Ditolak RW";
        } elseif ($_SESSION['hak_akses'] == '1') {
            $row = "Ditolak Kelurahan";
        } else {
        }
        $rt = $_SESSION['rt'];
        $rw = $_SESSION['rw'];
        $sql = "SELECT (SELECT COUNT(*) from domisili WHERE status_surat = '$row' AND RT = '$rt' AND RW ='$rw')+ 
        (SELECT COUNT(*) from surat_tidak_mampu WHERE status_surat = '$row' AND RT = '$rt' AND RW ='$rw') + 
        (SELECT COUNT(*) from surat_akta_kelahiran WHERE status_surat = '$row' AND RT = '$rt' AND RW ='$rw') + 
        (SELECT COUNT(*) from surat_kematian WHERE status_surat = '$row' AND RT = '$rt' AND RW ='$rw')+ 
        (SELECT COUNT(*) from surat_ket_belum_menikah WHERE status_surat = '$row' AND RT = '$rt' AND RW ='$rw') +  
        (SELECT COUNT(*) from surat_berkelakuan_baik WHERE status_surat = '$row' AND RT = '$rt' AND RW ='$rw') + 
        (SELECT COUNT(*) FROM surat_usaha WHERE status_surat = '$row'  AND RT = '$rt' AND  RW = '$rw')  
        as total ";
        $result = $this->koneksi->prepare($sql);
        $result->execute();
        return $result;
    }
}
