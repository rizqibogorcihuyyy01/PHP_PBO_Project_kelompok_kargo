<?php
abstract class Kargo {
    // Encapsulation: protected attributes
    protected $id_resi;
    protected $pengirim;
    protected $kota_tujuan;
    protected $berat_barang;
    protected $tarif_dasar_per_kg;

    // Constructor
    public function __construct($id_resi, $pengirim, $kota_tujuan, $berat_barang, $tarif_dasar_per_kg) {
        $this->id_resi = $id_resi;
        $this->pengirim = $pengirim;
        $this->kota_tujuan = $kota_tujuan;
        $this->berat_barang = $berat_barang;
        $this->tarif_dasar_per_kg = $tarif_dasar_per_kg;
    }

    // Getter methods (Encapsulation)
    public function getIdResi() { return $this->id_resi; }
    public function getPengirim() { return $this->pengirim; }
    public function getKotaTujuan() { return $this->kota_tujuan; }
    public function getBeratBarang() { return $this->berat_barang; }
    public function getTarifDasar() { return $this->tarif_dasar_per_kg; }

    // Abstract methods (Abstraction)
    public abstract function hitungTarifPengiriman();
    public abstract function validasiSOPPacking();
}
?>