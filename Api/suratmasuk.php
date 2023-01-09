<?php
    require_once 'Api/oopkoneksi.php';
    class suratmasuk extends koneksii{
    public function lihatsuratmasuk(){
        $_SESSION['hak_akses'];
        if($_SESSION['hak_akses']=='2'){
            $row = "Diajukan";
            $rt= $_SESSION['rt'];
            $rw = $_SESSION['rw'];
            $sql = "SELECT * from domisili WHERE status_surat = '$row'  AND RT = '$rt' AND  RW = '$rw'";
            $result= $this->koneksi->prepare($sql);
            $result->execute();
            return $result; 
        }elseif($_SESSION['hak_akses']=='3'){
            $row = "Disetujui RT";
            $rt= $_SESSION['rt'];
            $rw = $_SESSION['rw'];
            $sql = "SELECT * from domisili WHERE status_surat = '$row' AND  RW = '$rw'";
            $result= $this->koneksi->prepare($sql);
            $result->execute();
            return $result; 
        }elseif($_SESSION['hak_akses']=='1'){
            $row = "Disetujui RW";
            $rt= $_SESSION['rt'];
            $rw = $_SESSION['rw'];
            $sql = "SELECT * from domisili WHERE status_surat = '$row'";
            $result= $this->koneksi->prepare($sql);
            $result->execute();
            return $result;
        }else{
            
        }
                   
        }  
    }

    class suratmasuksktm extends koneksii{
        public function lihatsuratmasuk(){
            $_SESSION['hak_akses'];
            if($_SESSION['hak_akses']=='2'){
               $row = "Diajukan";
               $rt= $_SESSION['rt'];
               $rw = $_SESSION['rw'];
               $sql = "SELECT * from surat_tidak_mampu WHERE status_surat = '$row'  AND RT = '$rt' AND  RW = '$rw'";
               $result= $this->koneksi->prepare($sql);
               $result->execute();
               return $result; 
            }elseif($_SESSION['hak_akses']=='3'){
                $row = "Disetujui RT";
                $rt= $_SESSION['rt'];
                $rw = $_SESSION['rw'];
                $sql = "SELECT * from surat_tidak_mampu WHERE status_surat = '$row' AND  RW = '$rw'";
                $result= $this->koneksi->prepare($sql);
                $result->execute();
                return $result; 
            }elseif($_SESSION['hak_akses']=='1'){
                $row = "Disetujui RW";
                $rt= $_SESSION['rt'];
                $rw = $_SESSION['rw'];
                $sql = "SELECT * from surat_tidak_mampu WHERE status_surat = '$row'";
                $result= $this->koneksi->prepare($sql);
                $result->execute();
                return $result;
            }else{  
            }                             
            }  
        }

        class suratmasukdomisili extends koneksii{
            public function lihatsuratmasuk(){
                $_SESSION['hak_akses'];
                if($_SESSION['hak_akses']=='2'){
                    $row = "Diajukan";
                    $rt= $_SESSION['rt'];
                    $rw = $_SESSION['rw'];
                    $sql = "SELECT * from domisili WHERE status_surat = '$row'  AND RT = '$rt' AND  RW = '$rw'";
                    $result= $this->koneksi->prepare($sql);
                    $result->execute();
                    return $result; 
                }elseif($_SESSION['hak_akses']=='3'){
                    $row = "Disetujui RT";
                    $rt= $_SESSION['rt'];
                    $rw = $_SESSION['rw'];
                    $sql = "SELECT * from domisili WHERE status_surat = '$row' AND  RW = '$rw'";
                    $result= $this->koneksi->prepare($sql);
                    $result->execute();
                    return $result; 
                }elseif($_SESSION['hak_akses']=='1'){
                    $row = "Disetujui RW";
                    $rt= $_SESSION['rt'];
                    $rw = $_SESSION['rw'];
                    $sql = "SELECT * from domisili WHERE status_surat = '$row'";
                    $result= $this->koneksi->prepare($sql);
                    $result->execute();
                    return $result;
                }else{
                    
                }                   
                }  
            }

            class suratmasukakta extends koneksii{
                public function lihatsuratmasuk(){
                    $_SESSION['hak_akses'];
                    if($_SESSION['hak_akses']=='2'){
                        $row = "Diajukan";
                        $rt= $_SESSION['rt'];
                        $rw = $_SESSION['rw'];
                        $sql = "SELECT * from surat_akta_kelahiran WHERE status_surat = '$row'  AND RT = '$rt' AND  RW = '$rw'";
                        $result= $this->koneksi->prepare($sql);
                        $result->execute();
                        return $result; 
                    }elseif($_SESSION['hak_akses']=='3'){
                        $row = "Disetujui RT";
                        $rt= $_SESSION['rt'];
                        $rw = $_SESSION['rw'];
                        $sql = "SELECT * from surat_akta_kelahiran WHERE status_surat = '$row' AND  RW = '$rw'";
                        $result= $this->koneksi->prepare($sql);
                        $result->execute();
                        return $result; 
                    }elseif($_SESSION['hak_akses']=='1'){
                        $row = "Disetujui RW";
                        $rt= $_SESSION['rt'];
                        $rw = $_SESSION['rw'];
                        $sql = "SELECT * from surat_akta_kelahiran WHERE status_surat = '$row'";
                        $result= $this->koneksi->prepare($sql);
                        $result->execute();
                        return $result;
                    }else{
                        
                    }                        
                    }  
                }

                class suratmasukpindah extends koneksii{
                    public function lihatsuratmasuk(){
                        $_SESSION['hak_akses'];
                        if($_SESSION['hak_akses']=='2'){
                            $row = "Diajukan";
                            $rt= $_SESSION['rt'];
                            $rw = $_SESSION['rw'];
                            $sql = "SELECT * from surat_pindah WHERE status_surat = '$row'  AND RT = '$rt' AND  RW = '$rw'";
                            $result= $this->koneksi->prepare($sql);
                            $result->execute();
                            return $result; 
                        }elseif($_SESSION['hak_akses']=='3'){
                            $row = "Disetujui RT";
                            $rt= $_SESSION['rt'];
                            $rw = $_SESSION['rw'];
                            $sql = "SELECT * from surat_pindah WHERE status_surat = '$row' AND  RW = '$rw'";
                            $result= $this->koneksi->prepare($sql);
                            $result->execute();
                            return $result; 
                        }elseif($_SESSION['hak_akses']=='1'){
                            $row = "Disetujui RW";
                            $rt= $_SESSION['rt'];
                            $rw = $_SESSION['rw'];
                            $sql = "SELECT * from surat_pindah WHERE status_surat = '$row'";
                            $result= $this->koneksi->prepare($sql);
                            $result->execute();
                            return $result;
                        }else{
                            
                        }                     
                        }  
                    }

                    class suratmasukbelumnikah extends koneksii{
                        public function lihatsuratmasuk(){
                            $_SESSION['hak_akses'];
                            if($_SESSION['hak_akses']=='2'){
                                $row = "Diajukan";
                                $rt= $_SESSION['rt'];
                                $rw = $_SESSION['rw'];
                                $sql = "SELECT * from surat_ket_belum_menikah WHERE status_surat = '$row'  AND RT = '$rt' AND  RW = '$rw'";
                                $result= $this->koneksi->prepare($sql);
                                $result->execute();
                                return $result; 
                            }elseif($_SESSION['hak_akses']=='3'){
                                $row = "Disetujui RT";
                                $rt= $_SESSION['rt'];
                                $rw = $_SESSION['rw'];
                                $sql = "SELECT * from surat_ket_belum_menikah WHERE status_surat = '$row' AND  RW = '$rw'";
                                $result= $this->koneksi->prepare($sql);
                                $result->execute();
                                return $result; 
                            }elseif($_SESSION['hak_akses']=='1'){
                                $row = "Disetujui RW";
                                $rt= $_SESSION['rt'];
                                $rw = $_SESSION['rw'];
                                $sql = "SELECT * from surat_ket_belum_menikah WHERE status_surat = '$row'";
                                $result= $this->koneksi->prepare($sql);
                                $result->execute();
                                return $result;
                            }else{
                                
                            }                         
                            }  
                        }

                        class suratmasukkematian extends koneksii{
                            public function lihatsuratmasuk(){
                                $_SESSION['hak_akses'];
                                if($_SESSION['hak_akses']=='2'){
                                    $row = "Diajukan";
                                    $rt= $_SESSION['rt'];
                                    $rw = $_SESSION['rw'];
                                    $sql = "SELECT * from surat_kematian WHERE status_surat = '$row'  AND RT = '$rt' AND  RW = '$rw'";
                                    $result= $this->koneksi->prepare($sql);
                                    $result->execute();
                                    return $result; 
                                }elseif($_SESSION['hak_akses']=='3'){
                                    $row = "Disetujui RT";
                                    $rt= $_SESSION['rt'];
                                    $rw = $_SESSION['rw'];
                                    $sql = "SELECT * from surat_kematian WHERE status_surat = '$row' AND  RW = '$rw'";
                                    $result= $this->koneksi->prepare($sql);
                                    $result->execute();
                                    return $result; 
                                }elseif($_SESSION['hak_akses']=='1'){
                                    $row = "Disetujui RW";
                                    $rt= $_SESSION['rt'];
                                    $rw = $_SESSION['rw'];
                                    $sql = "SELECT * from surat_kematian WHERE status_surat = '$row'";
                                    $result= $this->koneksi->prepare($sql);
                                    $result->execute();
                                    return $result;
                                }else{
                                    
                                }                           
                                }  
                            }

                            class suratmasukusaha extends koneksii{
                                public function lihatsuratmasuk(){
                                    $_SESSION['hak_akses'];
                                    if($_SESSION['hak_akses']=='2'){
                                        $row = "Diajukan";
                                        $rt= $_SESSION['rt'];
                                        $rw = $_SESSION['rw'];
                                        $sql = "SELECT * from surat_usaha WHERE status_surat = '$row'  AND RT = '$rt' AND  RW = '$rw'";
                                        $result= $this->koneksi->prepare($sql);
                                        $result->execute();
                                        return $result; 
                                    }elseif($_SESSION['hak_akses']=='3'){
                                        $row = "Disetujui RT";
                                        $rt= $_SESSION['rt'];
                                        $rw = $_SESSION['rw'];
                                        $sql = "SELECT * from surat_usaha WHERE status_surat = '$row' AND  RW = '$rw'";
                                        $result= $this->koneksi->prepare($sql);
                                        $result->execute();
                                        return $result; 
                                    }elseif($_SESSION['hak_akses']=='1'){
                                        $row = "Disetujui RW";
                                        $rt= $_SESSION['rt'];
                                        $rw = $_SESSION['rw'];
                                        $sql = "SELECT * from surat_usaha WHERE status_surat = '$row'";
                                        $result= $this->koneksi->prepare($sql);
                                        $result->execute();
                                        return $result;
                                    }else{
                                        
                                    }                           
                                    }  
                                }


                                class suratmasukkelakuanbaik extends koneksii{
                                    public function lihatsuratmasuk(){
                                        $_SESSION['hak_akses'];
                                        if($_SESSION['hak_akses']=='2'){
                                            $row = "Diajukan";
                                            $rt= $_SESSION['rt'];
                                            $rw = $_SESSION['rw'];
                                            $sql = "SELECT * from surat_berkelakuan_baik WHERE status_surat = '$row'  AND RT = '$rt' AND  RW = '$rw'";
                                            $result= $this->koneksi->prepare($sql);
                                            $result->execute();
                                            return $result; 
                                        }elseif($_SESSION['hak_akses']=='3'){
                                            $row = "Disetujui RT";
                                            $rt= $_SESSION['rt'];
                                            $rw = $_SESSION['rw'];
                                            $sql = "SELECT * from surat_berkelakuan_baik WHERE status_surat = '$row' AND  RW = '$rw'";
                                            $result= $this->koneksi->prepare($sql);
                                            $result->execute();
                                            return $result; 
                                        }elseif($_SESSION['hak_akses']=='1'){
                                            $row = "Disetujui RW";
                                            $rt= $_SESSION['rt'];
                                            $rw = $_SESSION['rw'];
                                            $sql = "SELECT * from surat_berkelakuan_baik WHERE status_surat = '$row'";
                                            $result= $this->koneksi->prepare($sql);
                                            $result->execute();
                                            return $result;
                                        }else{
                                            
                                        }                          
                                        }  
                                    }
    
?>