<?php
class koneksii{
    private $host = "localhost";
    private $user = "root";
    private $db="Kepuharjo";
    private $pass="";
    protected $koneksi;

    public function __construct()
    {
        try{
            $this->koneksi = new PDO("mysql:host=$this->host;dbname=$this->db", $this->user, $this->pass);
            $this->koneksi->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }catch(PDOException $e){
            echo $e->getMessage();
        }
        return $this->koneksi;
    }
}

?>