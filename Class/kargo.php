abstract class kargo
{
    private $id_resi;
    protected $pengirim;
    protected $kota_tujuan;
    protected $berat_barang;
    protected $tarif;

    public function __construct($id_resi, $pengirim, $kota_tujuan, $berat_barang)
    {
        $this->id_resi = $id_resi;
        $this->pengirim = $pengirim;
        $this->kota_tujuan = $kota_tujuan;
        $this->berat_barang = $berat_barang;
    }

    public function setResi($id_resi)
    {
        $this->id_resi = $id_resi;
    }

    public function getIdResi()
    {
        return $this->id_resi;
    }
    
    abstract public function hitungTarif();
    abstract public function ValidasiSopPacking();
}
