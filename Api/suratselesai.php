<?php
    require_once 'Api/oopkoneksi.php';
    class suratselesai extends koneksii{
    public function lihatsuratselesaidomisili(){
        $_SESSION['hak_akses'];
        if($_SESSION['hak_akses']=='2'){
           $row = "Disetujui RT";
           $rt= $_SESSION['rt'];
           $rw = $_SESSION['rw'];
           $sql = "SELECT * FROM domisili WHERE status_surat = '$row' AND RT = '$rt' AND RW = '$rw'";
           $result= $this->koneksi->prepare($sql);
           $result->execute();
           return $result; 
        }elseif($_SESSION['hak_akses']=='3'){
            $row = "Disetujui RW";
            $rt= $_SESSION['rt'];
            $rw = $_SESSION['rw'];
            $sql = "SELECT * FROM domisili WHERE status_surat ='$row' AND RW = '$rw'";
            $result= $this->koneksi->prepare($sql);
            $result->execute();
            return $result; 
        }elseif($_SESSION['hak_akses']=='1'){
            $row = "Selesai";
            $rt= $_SESSION['rt'];
            $rw = $_SESSION['rw'];
            $sql = "SELECT id_akun, nama, tgl_pengajuan,status_surat FROM domisili WHERE status_surat = '$row'";
            $result= $this->koneksi->prepare($sql);
            $result->execute();
            return $result; 
        }else{ 
        }                             
    } 

        public function lihatsuratselesaiSKTM(){
            $_SESSION['hak_akses'];
        if($_SESSION['hak_akses']=='2'){
           $row = "Disetujui RT";
           $rt= $_SESSION['rt'];
           $rw = $_SESSION['rw'];
           $sql = "SELECT * FROM surat_tidak_mampu WHERE status_surat = '$row' AND RT = '$rt' AND RW = '$rw'";
           $result= $this->koneksi->prepare($sql);
           $result->execute();
           return $result; 
        }elseif($_SESSION['hak_akses']=='3'){
            $row = "Disetujui RW";
            $rt= $_SESSION['rt'];
            $rw = $_SESSION['rw'];
            $sql = "SELECT * FROM surat_tidak_mampu WHERE status_surat = '$row' AND RW = '$rw'";
            $result= $this->koneksi->prepare($sql);
            $result->execute();
            return $result; 
        }elseif($_SESSION['hak_akses']=='1'){
            $row = "Selesai";
            $rt= $_SESSION['rt'];
            $rw = $_SESSION['rw'];
            $sql = "SELECT id_akun, nama, tgl_pengajuan,status_surat FROM surat_tidak_mampu WHERE status_surat = '$row'";
            $result= $this->koneksi->prepare($sql);
            $result->execute();
            return $result; 
        }else{ 
        } 
    }
            
        public function lihatsuratselesaiakta(){
            $_SESSION['hak_akses'];
        if($_SESSION['hak_akses']=='2'){
           $row = "Disetujui RT";
           $rt= $_SESSION['rt'];
           $rw = $_SESSION['rw'];
           $sql = "SELECT * FROM surat_akta_kelahiran WHERE status_surat = '$row' AND RT = '$rt' AND RW = '$rw'";
           $result= $this->koneksi->prepare($sql);
           $result->execute();
           return $result; 
        }elseif($_SESSION['hak_akses']=='3'){
            $row = "Disetujui RW";
            $rt= $_SESSION['rt'];
            $rw = $_SESSION['rw'];
            $sql = "SELECT * FROM surat_akta_kelahiran WHERE status_surat = '$row' AND RW = '$rw'";
            $result= $this->koneksi->prepare($sql);
            $result->execute();
            return $result; 
        }elseif($_SESSION['hak_akses']=='1'){
            $row = "Selesai";
            $rt= $_SESSION['rt'];
            $rw = $_SESSION['rw'];
            $sql = "SELECT surat_akta_kelahiran.id_akun, surat_akta_kelahiran.nama_anak, surat_akta_kelahiran.tgl_pengajuan, surat_akta_kelahiran.status_surat FROM surat_akta_kelahiran WHERE status_surat = '$row'";
            $result= $this->koneksi->prepare($sql);
            $result->execute();
            return $result; 
        }else{ 
        } 
          
    } 
        
    //     public function lihatsuratselesaipindah(){
    //         $_SESSION['hak_akses'];
    //         if($_SESSION['hak_akses']=='2'){
    //            $row = "Disetujui RT";
    //            $rt= $_SESSION['rt'];
    //            $rw = $_SESSION['rw'];
    //            $sql = "SELECT surat_pindah.id_akun, surat_pindah.nama, surat_pindah.tgl_pengajuan, surat_pindah.status_surat from surat_pindah WHERE status_surat = '$row' AND RT = '$rt' AND RW = '$rw'";
    //            $result= $this->koneksi->prepare($sql);
    //            $result->execute();
    //            return $result; 
    //         }elseif($_SESSION['hak_akses']=='3'){
    //             $row = "Disetujui RW";
    //             $rt= $_SESSION['rt'];
    //             $rw = $_SESSION['rw'];
    //             $sql = "SELECT surat_pindah.id_akun, surat_pindah.nama, surat_pindah.tgl_pengajuan, surat_pindah.status_surat from surat_pindah WHERE status_surat = '$row' AND RT = '$rt' AND RW = '$rw'";
    //             $result= $this->koneksi->prepare($sql);
    //             $result->execute();
    //             return $result; 
    //         }elseif($_SESSION['hak_akses']=='1'){
    //             $row = "Disetujui Kelurahan";
    //             $rt= $_SESSION['rt'];
    //             $rw = $_SESSION['rw'];
    //             $sql = "SELECT surat_pindah.id_akun, surat_pindah.nama, surat_pindah.tgl_pengajuan, surat_pindah.status_surat from surat_pindah WHERE status_surat = '$row' AND RT = '$rt' AND RW = '$rw'";
    //             $result= $this->koneksi->prepare($sql);
    //             $result->execute();
    //             return $result; 
    //         }else{ 
    //         }  
    //   } 
                    
            public function lihatsuratselesaikematian(){
                $_SESSION['hak_akses'];
            if($_SESSION['hak_akses']=='2'){
               $row = "Selesai";
               $rt= $_SESSION['rt'];
               $rw = $_SESSION['rw'];
               $sql = "SELECT * FROM surat_kematian WHERE status_surat = '$row' AND RT = '$rt' AND RW = '$rw'";
               $result= $this->koneksi->prepare($sql);
               $result->execute();
               return $result; 
            }elseif($_SESSION['hak_akses']=='3'){
                $row = "Disetujui RW";
                $rt= $_SESSION['rt'];
                $rw = $_SESSION['rw'];
                $sql = "SELECT * FROM surat_kematian WHERE status_surat = '$row' AND RW = '$rw'";
                $result= $this->koneksi->prepare($sql);
                $result->execute();
                return $result; 
            }elseif($_SESSION['hak_akses']=='1'){
                $row = "Selesai";
                $rt= $_SESSION['rt'];
                $rw = $_SESSION['rw'];
                $sql = "SELECT surat_kematian.id_akun, surat_kematian.nama_almarhum, surat_kematian.tgl_pengajuan, surat_kematian.status_surat from surat_kematian WHERE status_surat = '$row'";
                $result= $this->koneksi->prepare($sql);
                $result->execute();
                return $result; 
            }else{ 
            } 
           
    } 

        public function lihatsuratselesaiusaha(){
            $_SESSION['hak_akses'];
            if($_SESSION['hak_akses']=='2'){
               $row = "Disetujui RT";
               $rt= $_SESSION['rt'];
               $rw = $_SESSION['rw'];
               $sql = "SELECT * FROM surat_usaha WHERE status_surat = 'Disetujui RT' OR status_surat = '$row' AND RT = '$rt' AND RW = '$rw'";
               $result= $this->koneksi->prepare($sql);
               $result->execute();
               return $result; 
            }elseif($_SESSION['hak_akses']=='3'){
                $row = "Disetujui RW";
                $rt= $_SESSION['rt'];
                $rw = $_SESSION['rw'];
                $sql = "SELECT * FROM surat_usaha WHERE status_surat = '$row' AND RW = '$rw'";
                $result= $this->koneksi->prepare($sql);
                $result->execute();
                return $result; 
            }elseif($_SESSION['hak_akses']=='1'){
                $row = "Selesai";
                $rt= $_SESSION['rt'];
                $rw = $_SESSION['rw'];
                $sql = "SELECT surat_usaha.id_akun, surat_usaha.nama, surat_usaha.tgl_pengajuan, surat_usaha.status_surat FROM surat_usaha WHERE status_surat = '$row'";
                $result= $this->koneksi->prepare($sql);
                $result->execute();
                return $result; 
            }else{ 
            }         
    } 
        public function lihatsuratselesaibelumnikah(){
            $_SESSION['hak_akses'];
            if($_SESSION['hak_akses']=='2'){
               $row = "Disetujui RT";
               $rt= $_SESSION['rt'];
               $rw = $_SESSION['rw'];
               $sql = "SELECT * FROM surat_ket_belum_menikah WHERE status_surat = '$row' AND RT = '$rt' AND RW = '$rw'";
               $result= $this->koneksi->prepare($sql);
               $result->execute();
               return $result; 
            }elseif($_SESSION['hak_akses']=='3'){
                $row = "Disetujui RW";
                $rt= $_SESSION['rt'];
                $rw = $_SESSION['rw'];
                $sql = "SELECT * FROM surat_ket_belum_menikah WHERE status_surat = '$row' AND RW = '$rw'";
                $result= $this->koneksi->prepare($sql);
                $result->execute();
                return $result; 
            }elseif($_SESSION['hak_akses']=='1'){
                $row = "Selesai";
                $rt= $_SESSION['rt'];
                $rw = $_SESSION['rw'];
                $sql = "SELECT id_akun, nama, tgl_pengajuan, status_surat from surat_ket_belum_menikah WHERE status_surat = '$row'";
                $result= $this->koneksi->prepare($sql);
                $result->execute();
                return $result; 
            }else{ 
            }                                                     
    }
    public function lihatsuratselesaiberkelakuanbaik(){
        $_SESSION['hak_akses'];
        if($_SESSION['hak_akses']=='2'){
           $row = "Disetujui RT";
           $rt= $_SESSION['rt'];
           $rw = $_SESSION['rw'];
           $sql = "SELECT * FROM surat_berkelakuan_baik WHERE status_surat = '$row' AND RT = '$rt' AND RW = '$rw'";
           $result= $this->koneksi->prepare($sql);
           $result->execute();
           return $result; 
        }elseif($_SESSION['hak_akses']=='3'){
            $row = "Disetujui RW";
            $rt= $_SESSION['rt'];
            $rw = $_SESSION['rw'];
            $sql = "SELECT * FROM surat_berkelakuan_baik WHERE status_surat = '$row' AND RW = '$rw'";
            $result= $this->koneksi->prepare($sql);
            $result->execute();
            return $result; 
        }elseif($_SESSION['hak_akses']=='1'){
            $row = "Selesai";
            $rt= $_SESSION['rt'];
            $rw = $_SESSION['rw'];
            $sql = "SELECT id_akun, nama, tgl_pengajuan, status_surat from surat_berkelakuan_baik WHERE status_surat = '$row'";
            $result= $this->koneksi->prepare($sql);
            $result->execute();
            return $result; 
        }else{ 
        }                                                     
}  
    }
?>