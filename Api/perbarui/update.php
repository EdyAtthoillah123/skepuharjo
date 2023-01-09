<?php
include_once 'Api/oopkoneksi.php';
//setujui RT surat Masuk
class updatert extends koneksii{
public function idRTsktm($idsp, $id, $nomorsp)
{
    try {
        $sql = "UPDATE surat_tidak_mampu SET status_surat =:statuss, no_pengantar = :nosurat WHERE id_surat =:idsurat";
        $result = $this->koneksi->prepare($sql);
        $result->bindParam(":statuss", $idsp);
        $result->bindParam(":idsurat", $id);
        $result->bindParam(":nosurat", $nomorsp);
        $result->execute();
        // if ($result->rowCount() > 0) {
        //     return true;
        // } else {
        //     return false;
        // }
    } catch (PDOException $e) {
        echo $e->getMessage();
        return false;
    }
}

public function idRTDomisili($idsp, $id, $nomorsp)
{
    try {
        $sql = "UPDATE domisili SET status_surat =:statuss, no_pengantar = :nosurat WHERE id_surat =:idsurat";
        $result = $this->koneksi->prepare($sql);
        $result->bindParam(":statuss", $idsp);
        $result->bindParam(":idsurat", $id);
        $result->bindParam(":nosurat", $nomorsp);
        $result->execute();
        // if ($result->rowCount() > 0) {
        //     return true;
        // } else {
        //     return false;
        // }
    } catch (PDOException $e) {
        echo $e->getMessage();
        return false;
    }
}

public function idRTAkta($idsp, $id, $nomorsp)
{
    try {
        $sql = "UPDATE surat_akta_kelahiran SET status_surat =:statuss, no_pengantar=:nosurat WHERE id_surat =:idsurat";
        $result = $this->koneksi->prepare($sql);
        $result->bindParam(":statuss", $idsp);
        $result->bindParam(":idsurat", $id);
        $result->bindParam(":nosurat", $nomorsp);
        $result->execute();
        // if ($result->rowCount() > 0) {
        //     return true;
        // } else {
        //     return false;
        // }
    } catch (PDOException $e) {
        echo $e->getMessage();
        return false;
    }
}

public function idRTBelumnikah($idsp, $id, $nomorsp)
{
    try {
        $sql = "UPDATE surat_ket_belum_menikah SET status_surat =:statuss, no_pengantar = :nosurat WHERE id_surat =:idsurat";
        $result = $this->koneksi->prepare($sql);
        $result->bindParam(":statuss", $idsp);
        $result->bindParam(":idsurat", $id);
        $result->bindParam(":nosurat", $nomorsp);
        $result->execute();
        // if ($result->rowCount() > 0) {
        //     return true;
        // } else {
        //     return false;
        // }
    } catch (PDOException $e) {
        echo $e->getMessage();
        return false;
    }
}

public function idRTkematian($idsp, $id, $nomorsp)
{
    try {
        $sql = "UPDATE surat_kematian SET status_surat =:statuss, no_pengantar = :nosurat WHERE id_surat =:idsurat";
        $result = $this->koneksi->prepare($sql);
        $result->bindParam(":statuss", $idsp);
        $result->bindParam(":idsurat", $id);
        $result->bindParam(":nosurat", $nomorsp);
        $result->execute();
        // if ($result->rowCount() > 0) {
        //     return true;
        // } else {
        //     return false;
        // }
    } catch (PDOException $e) {
        echo $e->getMessage();
        return false;
    }
}

public function idRTUsaha($idsp, $id, $nomorsp)
{
    try {
        $sql = "UPDATE surat_usaha SET status_surat =:statuss , no_pengantar =:nosurat WHERE id_surat =:idsurat";
        $result = $this->koneksi->prepare($sql);
        $result->bindParam(":statuss", $idsp);
        $result->bindParam(":idsurat", $id);
        $result->bindParam(":nosurat", $nomorsp);
        $result->execute();
        // if ($result->rowCount() > 0) {
        //     return true;
        // } else {
        //     return false;
        // }
    } catch (PDOException $e) {
        echo $e->getMessage();
        return false;
    }
}

public function idRTkelakuanBaik($idsp, $id, $nomorsp)
{
    try {
        $sql = "UPDATE surat_berkelakuan_baik SET status_surat =:statuss, no_pengantar = :nosurat WHERE id_surat =:idsurat";
        $result = $this->koneksi->prepare($sql);
        $result->bindParam(":statuss", $idsp);
        $result->bindParam(":idsurat", $id);
        $result->bindParam(":nosurat", $nomorsp);
        $result->execute();
        // if ($result->rowCount() > 0) {
        //     return true;
        // } else {
        //     return false;
        // }
    } catch (PDOException $e) {
        echo $e->getMessage();
        return false;
    }
}
}


//setujui RT Surat Diproses
class updatertsetujui extends koneksii{
    public function idRTsktm($idsp, $id)
{
    try {
        $sql = "UPDATE surat_tidak_mampu SET status_surat =:statuss WHERE id_surat =:idsurat";
        $result = $this->koneksi->prepare($sql);
        $result->bindParam(":statuss", $idsp);
        $result->bindParam(":idsurat", $id);
        $result->execute();
        // if ($result->rowCount() > 0) {
        //     return true;
        // } else {
        //     return false;
        // }
    } catch (PDOException $e) {
        echo $e->getMessage();
        return false;
    }
}

public function idRTDomisili($idsp, $id)
{
    try {
        $sql = "UPDATE domisili SET status_surat =:statuss WHERE id_surat =:idsurat";
        $result = $this->koneksi->prepare($sql);
        $result->bindParam(":statuss", $idsp);
        $result->bindParam(":idsurat", $id);
        $result->execute();
        // if ($result->rowCount() > 0) {
        //     return true;
        // } else {
        //     return false;
        // }
    } catch (PDOException $e) {
        echo $e->getMessage();
        return false;
    }
}

public function idRTAkta($idsp, $id)
{
    try {
        $sql = "UPDATE surat_akta_kelahiran SET status_surat =:statuss WHERE id_surat =:idsurat";
        $result = $this->koneksi->prepare($sql);
        $result->bindParam(":statuss", $idsp);
        $result->bindParam(":idsurat", $id);
        $result->execute();
        // if ($result->rowCount() > 0) {
        //     return true;
        // } else {
        //     return false;
        // }
    } catch (PDOException $e) {
        echo $e->getMessage();
        return false;
    }
}

public function idRTBelumnikah($idsp, $id)
{
    try {
        $sql = "UPDATE surat_ket_belum_menikah SET status_surat =:statuss WHERE id_surat =:idsurat";
        $result = $this->koneksi->prepare($sql);
        $result->bindParam(":statuss", $idsp);
        $result->bindParam(":idsurat", $id);
        $result->execute();
        // if ($result->rowCount() > 0) {
        //     return true;
        // } else {
        //     return false;
        // }
    } catch (PDOException $e) {
        echo $e->getMessage();
        return false;
    }
}

public function idRTkematian($idsp, $id)
{
    try {
        $sql = "UPDATE surat_kematian SET status_surat =:statuss WHERE id_surat =:idsurat";
        $result = $this->koneksi->prepare($sql);
        $result->bindParam(":statuss", $idsp);
        $result->bindParam(":idsurat", $id);
        $result->execute();
        // if ($result->rowCount() > 0) {
        //     return true;
        // } else {
        //     return false;
        // }
    } catch (PDOException $e) {
        echo $e->getMessage();
        return false;
    }
}

public function idRTUsaha($idsp, $id)
{
    try {
        $sql = "UPDATE surat_usaha SET status_surat =:statuss WHERE id_surat =:idsurat";
        $result = $this->koneksi->prepare($sql);
        $result->bindParam(":statuss", $idsp);
        $result->bindParam(":idsurat", $id);
        $result->execute();
        // if ($result->rowCount() > 0) {
        //     return true;
        // } else {
        //     return false;
        // }
    } catch (PDOException $e) {
        echo $e->getMessage();
        return false;
    }
}

public function idRTkelakuanBaik($idsp, $id)
{
    try {
        $sql = "UPDATE surat_berkelakuan_baik SET status_surat =:statuss WHERE id_surat =:idsurat";
        $result = $this->koneksi->prepare($sql);
        $result->bindParam(":statuss", $idsp);
        $result->bindParam(":idsurat", $id);
        $result->execute();
        // if ($result->rowCount() > 0) {
        //     return true;
        // } else {
        //     return false;
        // }
    } catch (PDOException $e) {
        echo $e->getMessage();
        return false;
    }
}
}

//tolak RT Surat Diproses
class updaterttolak extends koneksii{
    public function idRTsktm($idsp, $id)
{
    try {
        $sql = "UPDATE surat_tidak_mampu SET status_surat =:statuss WHERE id_surat =:idsurat";
        $result = $this->koneksi->prepare($sql);
        $result->bindParam(":statuss", $idsp);
        $result->bindParam(":idsurat", $id);
        $result->execute();
        // if ($result->rowCount() > 0) {
        //     return true;
        // } else {
        //     return false;
        // }
    } catch (PDOException $e) {
        echo $e->getMessage();
        return false;
    }
}

public function idRTDomisili($idsp, $id)
{
    try {
        $sql = "UPDATE domisili SET status_surat =:statuss WHERE id_surat =:idsurat";
        $result = $this->koneksi->prepare($sql);
        $result->bindParam(":statuss", $idsp);
        $result->bindParam(":idsurat", $id);
        $result->execute();
        // if ($result->rowCount() > 0) {
        //     return true;
        // } else {
        //     return false;
        // }
    } catch (PDOException $e) {
        echo $e->getMessage();
        return false;
    }
}

public function idRTAkta($idsp, $id)
{
    try {
        $sql = "UPDATE surat_akta_kelahiran SET status_surat =:statuss WHERE id_surat =:idsurat";
        $result = $this->koneksi->prepare($sql);
        $result->bindParam(":statuss", $idsp);
        $result->bindParam(":idsurat", $id);
        $result->execute();
        // if ($result->rowCount() > 0) {
        //     return true;
        // } else {
        //     return false;
        // }
    } catch (PDOException $e) {
        echo $e->getMessage();
        return false;
    }
}

public function idRTBelumnikah($idsp, $id)
{
    try {
        $sql = "UPDATE surat_ket_belum_menikah SET status_surat =:statuss WHERE id_surat =:idsurat";
        $result = $this->koneksi->prepare($sql);
        $result->bindParam(":statuss", $idsp);
        $result->bindParam(":idsurat", $id);
        $result->execute();
        // if ($result->rowCount() > 0) {
        //     return true;
        // } else {
        //     return false;
        // }
    } catch (PDOException $e) {
        echo $e->getMessage();
        return false;
    }
}

public function idRTkematian($idsp, $id)
{
    try {
        $sql = "UPDATE surat_kematian SET status_surat =:statuss WHERE id_surat =:idsurat";
        $result = $this->koneksi->prepare($sql);
        $result->bindParam(":statuss", $idsp);
        $result->bindParam(":idsurat", $id);
        $result->execute();
        // if ($result->rowCount() > 0) {
        //     return true;
        // } else {
        //     return false;
        // }
    } catch (PDOException $e) {
        echo $e->getMessage();
        return false;
    }
}

public function idRTUsaha($idsp, $id)
{
    try {
        $sql = "UPDATE surat_usaha SET status_surat =:statuss WHERE id_surat =:idsurat";
        $result = $this->koneksi->prepare($sql);
        $result->bindParam(":statuss", $idsp);
        $result->bindParam(":idsurat", $id);
        $result->execute();
        // if ($result->rowCount() > 0) {
        //     return true;
        // } else {
        //     return false;
        // }
    } catch (PDOException $e) {
        echo $e->getMessage();
        return false;
    }
}

public function idRTkelakuanBaik($idsp, $id)
{
    try {
        $sql = "UPDATE surat_berkelakuan_baik SET status_surat =:statuss WHERE id_surat =:idsurat";
        $result = $this->koneksi->prepare($sql);
        $result->bindParam(":statuss", $idsp);
        $result->bindParam(":idsurat", $id);
        $result->execute();
        // if ($result->rowCount() > 0) {
        //     return true;
        // } else {
        //     return false;
        // }
    } catch (PDOException $e) {
        echo $e->getMessage();
        return false;
    }
}
}


//setujui RW Surat Masuk
class updaterw extends koneksii{
    public function idRWsktm($idsp, $id)
{
    try {
        $sql = "UPDATE surat_tidak_mampu SET status_surat =:statuss WHERE id_surat =:idsurat";
        $result = $this->koneksi->prepare($sql);
        $result->bindParam(":statuss", $idsp);
        $result->bindParam(":idsurat", $id);
        $result->execute();
        // if ($result->rowCount() > 0) {
        //     return true;
        // } else {
        //     return false;
        // }
    } catch (PDOException $e) {
        echo $e->getMessage();
        return false;
    }
}

public function idRWDomisili($idsp, $id)
{
    try {
        $sql = "UPDATE domisili SET status_surat =:statuss WHERE id_surat =:idsurat";
        $result = $this->koneksi->prepare($sql);
        $result->bindParam(":statuss", $idsp);
        $result->bindParam(":idsurat", $id);
        $result->execute();
        // if ($result->rowCount() > 0) {
        //     return true;
        // } else {
        //     return false;
        // }
    } catch (PDOException $e) {
        echo $e->getMessage();
        return false;
    }
}

public function idRWAkta($idsp, $id)
{
    try {
        $sql = "UPDATE surat_akta_kelahiran SET status_surat =:statuss WHERE id_surat =:idsurat";
        $result = $this->koneksi->prepare($sql);
        $result->bindParam(":statuss", $idsp);
        $result->bindParam(":idsurat", $id);
        $result->execute();
        // if ($result->rowCount() > 0) {
        //     return true;
        // } else {
        //     return false;
        // }
    } catch (PDOException $e) {
        echo $e->getMessage();
        return false;
    }
}

public function idRWBelumnikah($idsp, $id)
{
    try {
        $sql = "UPDATE surat_ket_belum_menikah SET status_surat =:statuss WHERE id_surat =:idsurat";
        $result = $this->koneksi->prepare($sql);
        $result->bindParam(":statuss", $idsp);
        $result->bindParam(":idsurat", $id);
        $result->execute();
        // if ($result->rowCount() > 0) {
        //     return true;
        // } else {
        //     return false;
        // }
    } catch (PDOException $e) {
        echo $e->getMessage();
        return false;
    }
}

public function idRWkematian($idsp, $id)
{
    try {
        $sql = "UPDATE surat_kematian SET status_surat =:statuss WHERE id_surat =:idsurat";
        $result = $this->koneksi->prepare($sql);
        $result->bindParam(":statuss", $idsp);
        $result->bindParam(":idsurat", $id);
        $result->execute();
        // if ($result->rowCount() > 0) {
        //     return true;
        // } else {
        //     return false;
        // }
    } catch (PDOException $e) {
        echo $e->getMessage();
        return false;
    }
}

public function idRWUsaha($idsp, $id)
{
    try {
        $sql = "UPDATE surat_usaha SET status_surat =:statuss WHERE id_surat =:idsurat";
        $result = $this->koneksi->prepare($sql);
        $result->bindParam(":statuss", $idsp);
        $result->bindParam(":idsurat", $id);
        $result->execute();
        // if ($result->rowCount() > 0) {
        //     return true;
        // } else {
        //     return false;
        // }
    } catch (PDOException $e) {
        echo $e->getMessage();
        return false;
    }
}

public function idRWkelakuanBaik($idsp, $id)
{
    try {
        $sql = "UPDATE surat_berkelakuan_baik SET status_surat =:statuss WHERE id_surat =:idsurat";
        $result = $this->koneksi->prepare($sql);
        $result->bindParam(":statuss", $idsp);
        $result->bindParam(":idsurat", $id);
        $result->execute();
        // if ($result->rowCount() > 0) {
        //     return true;
        // } else {
        //     return false;
        // }
    } catch (PDOException $e) {
        echo $e->getMessage();
        return false;
    }
}
}


//setujui RW Surat Diproses
class updaterwsetujui extends koneksii{
    public function idRWsktm($idsp, $id)
{
    try {
        $sql = "UPDATE surat_tidak_mampu SET status_surat =:statuss WHERE id_surat =:idsurat";
        $result = $this->koneksi->prepare($sql);
        $result->bindParam(":statuss", $idsp);
        $result->bindParam(":idsurat", $id);
        $result->execute();
        // if ($result->rowCount() > 0) {
        //     return true;
        // } else {
        //     return false;
        // }
    } catch (PDOException $e) {
        echo $e->getMessage();
        return false;
    }
}

public function idRWDomisili($idsp, $id)
{
    try {
        $sql = "UPDATE domisili SET status_surat =:statuss WHERE id_surat =:idsurat";
        $result = $this->koneksi->prepare($sql);
        $result->bindParam(":statuss", $idsp);
        $result->bindParam(":idsurat", $id);
        $result->execute();
        // if ($result->rowCount() > 0) {
        //     return true;
        // } else {
        //     return false;
        // }
    } catch (PDOException $e) {
        echo $e->getMessage();
        return false;
    }
}

public function idRWAkta($idsp, $id)
{
    try {
        $sql = "UPDATE surat_akta_kelahiran SET status_surat =:statuss WHERE id_surat =:idsurat";
        $result = $this->koneksi->prepare($sql);
        $result->bindParam(":statuss", $idsp);
        $result->bindParam(":idsurat", $id);
        $result->execute();
        // if ($result->rowCount() > 0) {
        //     return true;
        // } else {
        //     return false;
        // }
    } catch (PDOException $e) {
        echo $e->getMessage();
        return false;
    }
}

public function idRWBelumnikah($idsp, $id)
{
    try {
        $sql = "UPDATE surat_ket_belum_menikah SET status_surat =:statuss WHERE id_surat =:idsurat";
        $result = $this->koneksi->prepare($sql);
        $result->bindParam(":statuss", $idsp);
        $result->bindParam(":idsurat", $id);
        $result->execute();
        // if ($result->rowCount() > 0) {
        //     return true;
        // } else {
        //     return false;
        // }
    } catch (PDOException $e) {
        echo $e->getMessage();
        return false;
    }
}

public function idRWkematian($idsp, $id)
{
    try {
        $sql = "UPDATE surat_kematian SET status_surat =:statuss WHERE id_surat =:idsurat";
        $result = $this->koneksi->prepare($sql);
        $result->bindParam(":statuss", $idsp);
        $result->bindParam(":idsurat", $id);
        $result->execute();
        // if ($result->rowCount() > 0) {
        //     return true;
        // } else {
        //     return false;
        // }
    } catch (PDOException $e) {
        echo $e->getMessage();
        return false;
    }
}

public function idRWUsaha($idsp, $id)
{
    try {
        $sql = "UPDATE surat_usaha SET status_surat =:statuss WHERE id_surat =:idsurat";
        $result = $this->koneksi->prepare($sql);
        $result->bindParam(":statuss", $idsp);
        $result->bindParam(":idsurat", $id);
        $result->execute();
        // if ($result->rowCount() > 0) {
        //     return true;
        // } else {
        //     return false;
        // }
    } catch (PDOException $e) {
        echo $e->getMessage();
        return false;
    }
}

public function idRWkelakuanBaik($idsp, $id)
{
    try {
        $sql = "UPDATE surat_berkelakuan_baik SET status_surat =:statuss WHERE id_surat =:idsurat";
        $result = $this->koneksi->prepare($sql);
        $result->bindParam(":statuss", $idsp);
        $result->bindParam(":idsurat", $id);
        $result->execute();
        // if ($result->rowCount() > 0) {
        //     return true;
        // } else {
        //     return false;
        // }
    } catch (PDOException $e) {
        echo $e->getMessage();
        return false;
    }
}
}

//setujui RW Surat Ditolak
class updaterwtolak extends koneksii{
    public function idRWsktm($idsp, $id)
{
    try {
        $sql = "UPDATE surat_tidak_mampu SET status_surat =:statuss WHERE id_surat =:idsurat";
        $result = $this->koneksi->prepare($sql);
        $result->bindParam(":statuss", $idsp);
        $result->bindParam(":idsurat", $id);
        $result->execute();
        // if ($result->rowCount() > 0) {
        //     return true;
        // } else {
        //     return false;
        // }
    } catch (PDOException $e) {
        echo $e->getMessage();
        return false;
    }
}

public function idRWDomisili($idsp, $id)
{
    try {
        $sql = "UPDATE domisili SET status_surat =:statuss WHERE id_surat =:idsurat";
        $result = $this->koneksi->prepare($sql);
        $result->bindParam(":statuss", $idsp);
        $result->bindParam(":idsurat", $id);
        $result->execute();
        // if ($result->rowCount() > 0) {
        //     return true;
        // } else {
        //     return false;
        // }
    } catch (PDOException $e) {
        echo $e->getMessage();
        return false;
    }
}

public function idRWAkta($idsp, $id)
{
    try {
        $sql = "UPDATE surat_akta_kelahiran SET status_surat =:statuss WHERE id_surat =:idsurat";
        $result = $this->koneksi->prepare($sql);
        $result->bindParam(":statuss", $idsp);
        $result->bindParam(":idsurat", $id);
        $result->execute();
        // if ($result->rowCount() > 0) {
        //     return true;
        // } else {
        //     return false;
        // }
    } catch (PDOException $e) {
        echo $e->getMessage();
        return false;
    }
}

public function idRWBelumnikah($idsp, $id)
{
    try {
        $sql = "UPDATE surat_ket_belum_menikah SET status_surat =:statuss WHERE id_surat =:idsurat";
        $result = $this->koneksi->prepare($sql);
        $result->bindParam(":statuss", $idsp);
        $result->bindParam(":idsurat", $id);
        $result->execute();
        // if ($result->rowCount() > 0) {
        //     return true;
        // } else {
        //     return false;
        // }
    } catch (PDOException $e) {
        echo $e->getMessage();
        return false;
    }
}

public function idRWkematian($idsp, $id)
{
    try {
        $sql = "UPDATE surat_kematian SET status_surat =:statuss WHERE id_surat =:idsurat";
        $result = $this->koneksi->prepare($sql);
        $result->bindParam(":statuss", $idsp);
        $result->bindParam(":idsurat", $id);
        $result->execute();
        // if ($result->rowCount() > 0) {
        //     return true;
        // } else {
        //     return false;
        // }
    } catch (PDOException $e) {
        echo $e->getMessage();
        return false;
    }
}

public function idRWUsaha($idsp, $id)
{
    try {
        $sql = "UPDATE surat_usaha SET status_surat =:statuss WHERE id_surat =:idsurat";
        $result = $this->koneksi->prepare($sql);
        $result->bindParam(":statuss", $idsp);
        $result->bindParam(":idsurat", $id);
        $result->execute();
        // if ($result->rowCount() > 0) {
        //     return true;
        // } else {
        //     return false;
        // }
    } catch (PDOException $e) {
        echo $e->getMessage();
        return false;
    }
}

public function idRWkelakuanBaik($idsp, $id)
{
    try {
        $sql = "UPDATE surat_berkelakuan_baik SET status_surat =:statuss WHERE id_surat =:idsurat";
        $result = $this->koneksi->prepare($sql);
        $result->bindParam(":statuss", $idsp);
        $result->bindParam(":idsurat", $id);
        $result->execute();
        // if ($result->rowCount() > 0) {
        //     return true;
        // } else {
        //     return false;
        // }
    } catch (PDOException $e) {
        echo $e->getMessage();
        return false;
    }
}
}

class updatekelurahan extends koneksii{
    public function idkelsktm($idsp, $id)
    {
        try {
            $sql = "UPDATE surat_tidak_mampu SET status_surat =:statuss, file_pdf = 'sktm$id.pdf' WHERE id_surat =:idsurat";
            $result = $this->koneksi->prepare($sql);
            $result->bindParam(":statuss", $idsp);
            $result->bindParam(":idsurat", $id);
            $result->execute();
            // if ($result->rowCount() > 0) {
            //     return true;
            // } else {
            //     return false;
            // }
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }
    
    public function idkelDomisili($idsp, $id)
    {
        try {
            $sql = "UPDATE domisili SET status_surat =:statuss, file_pdf = 'domisili$id.pdf' WHERE id_surat =:idsurat";
            $result = $this->koneksi->prepare($sql);
            $result->bindParam(":statuss", $idsp);
            $result->bindParam(":idsurat", $id);
            $result->execute();
            // if ($result->rowCount() > 0) {
            //     return true;
            // } else {
            //     return false;
            // }
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }
    
    public function idkelAkta($idsp, $id)
    {
        try {
            $sql = "UPDATE surat_akta_kelahiran SET status_surat =:statuss, file_pdf = 'akta$id.pdf' WHERE id_surat =:idsurat";
            $result = $this->koneksi->prepare($sql);
            $result->bindParam(":statuss", $idsp);
            $result->bindParam(":idsurat", $id);
            $result->execute();
            // if ($result->rowCount() > 0) {
            //     return true;
            // } else {
            //     return false;
            // }
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }
    
    public function idkelBelumnikah($idsp, $id)
    {
        try {
            $sql = "UPDATE surat_ket_belum_menikah SET status_surat =:statuss, file_pdf = 'belumnikah$id.pdf' WHERE id_surat =:idsurat";
            $result = $this->koneksi->prepare($sql);
            $result->bindParam(":statuss", $idsp);
            $result->bindParam(":idsurat", $id);
            $result->execute();
            // if ($result->rowCount() > 0) {
            //     return true;
            // } else {
            //     return false;
            // }
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }
    
    public function idkelkematian($idsp, $id)
    {
        try {
            $sql = "UPDATE surat_kematian SET status_surat =:statuss, file_pdf = 'kematian$id.pdf' WHERE id_surat =:idsurat";
            $result = $this->koneksi->prepare($sql);
            $result->bindParam(":statuss", $idsp);
            $result->bindParam(":idsurat", $id);
            $result->execute();
            // if ($result->rowCount() > 0) {
            //     return true;
            // } else {
            //     return false;
            // }
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }
    
    public function idkelUsaha($idsp, $id)
    {
        try {
            $sql = "UPDATE surat_usaha SET status_surat =:statuss, file_pdf = 'usaha$id.pdf' WHERE id_surat =:idsurat";
            $result = $this->koneksi->prepare($sql);
            $result->bindParam(":statuss", $idsp);
            $result->bindParam(":idsurat", $id);
            $result->execute();
            // if ($result->rowCount() > 0) {
            //     return true;
            // } else {
            //     return false;
            // }
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }
    
    public function idkelkelakuanBaik($idsp, $id)
    {
        try {
            $sql = "UPDATE surat_berkelakuan_baik SET status_surat =:statuss, file_pdf = 'baik$id.pdf' WHERE id_surat =:idsurat";
            $result = $this->koneksi->prepare($sql);
            $result->bindParam(":statuss", $idsp);
            $result->bindParam(":idsurat", $id);
            $result->execute();
            // if ($result->rowCount() > 0) {
            //     return true;
            // } else {
            //     return false;
            // }
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }
    }

    class deleteberita extends koneksii{
    public function delberita($idbrt)
{
    try {
        $sql = "DELETE FROM berita WHERE id_berita = :idberita";
        $result = $this->koneksi->prepare($sql);
        $result->bindParam(":idberita", $idbrt);
        $result->execute();
        // if ($result->rowCount() > 0) {
        //     return true;
        // } else {
        //     return false;
        // }
    } catch (PDOException $e) {
        echo $e->getMessage();
        return false;
    // } finally {
    //     $result->close();
    //     $this->koneksi->close();
    // }
}}
    }
?>