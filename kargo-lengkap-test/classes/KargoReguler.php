<?php
require_once 'Kargo.php';

class KargoReguler extends Kargo {
    private $jenis_paket;  // Koli/Dus
    private $estimasi_hari;

    public function __construct($id_resi, $pengirim, $kota_tujuan, $berat_barang, 
                                $tarif_dasar_per_kg, $jenis_paket, $estimasi_hari) {
        parent::__construct($id_resi, $pengirim, $kota_tujuan, $berat_barang, $tarif_dasar_per_kg);
        $this->jenis_paket = $jenis_paket;
        $this->estimasi_hari = $estimasi_hari;
    }

    // Polymorphism Overriding - Rumus Kargo Reguler
    public function hitungTarifPengiriman() {
        return $this->berat_barang * $this->tarif_dasar_per_kg;
    }

    public function validasiSOPPacking() {
        return "SOP Packing Reguler: Gunakan lakban dan segel keamanan standar.";
    }

    public function getJenisPaket() { return $this->jenis_paket; }
    public function getEstimasiHari() { return $this->estimasi_hari; }
}
?>