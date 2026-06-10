<?php
require_once 'Kargo.php';

class KargoBahanKimia extends Kargo {
    private $tingkat_bahaya;  // Class 1-9
    private $jenis_sertifikasi_sandi;
    private $biaya_penanganan_khusus;

    public function __construct($id_resi, $pengirim, $kota_tujuan, $berat_barang, 
                                $tarif_dasar_per_kg, $tingkat_bahaya, $jenis_sertifikasi_sandi, 
                                $biaya_penanganan_khusus) {
        parent::__construct($id_resi, $pengirim, $kota_tujuan, $berat_barang, $tarif_dasar_per_kg);
        $this->tingkat_bahaya = $tingkat_bahaya;
        $this->jenis_sertifikasi_sandi = $jenis_sertifikasi_sandi;
        $this->biaya_penanganan_khusus = $biaya_penanganan_khusus;
    }

    // Polymorphism Overriding - Rumus Kargo Bahan Kimia
    public function hitungTarifPengiriman() {
        // (Berat * tarifDasarPerKg) + Biaya Penanganan Khusus Sesuai Tingkat Bahaya
        return ($this->berat_barang * $this->tarif_dasar_per_kg) + 
               ($this->tingkat_bahaya * 100000);
    }

    public function validasiSOPPacking() {
        return "SOP Packing Bahan Kimia: Gunakan kemasan kedap udara dan label bahaya!";
    }

    public function getTingkatBahaya() { return $this->tingkat_bahaya; }
    public function getJenisSertifikasi() { return $this->jenis_sertifikasi_sandi; }
    public function getBiayaPenanganan() { return $this->biaya_penanganan_khusus; }
}
?>