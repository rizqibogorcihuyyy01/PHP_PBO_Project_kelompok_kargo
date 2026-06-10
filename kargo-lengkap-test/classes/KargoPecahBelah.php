<?php
require_once 'Kargo.php';

class KargoPecahBelah extends Kargo {
    private $ketebalan_bubble_wrap;
    private $biaya_asuransi_wajib;

    public function __construct($id_resi, $pengirim, $kota_tujuan, $berat_barang, 
                                $tarif_dasar_per_kg, $ketebalan_bubble_wrap, $biaya_asuransi_wajib) {
        parent::__construct($id_resi, $pengirim, $kota_tujuan, $berat_barang, $tarif_dasar_per_kg);
        $this->ketebalan_bubble_wrap = $ketebalan_bubble_wrap;
        $this->biaya_asuransi_wajib = $biaya_asuransi_wajib;
    }

    // Polymorphism Overriding - Rumus Kargo Pecah Belah
    public function hitungTarifPengiriman() {
        $tarif_berat = $this->berat_barang * $this->tarif_dasar_per_kg;
        $surcharge_fragile = 0.05 * $tarif_berat;  // 5% dari tarif berat
        
        return $tarif_berat + $this->biaya_asuransi_wajib + $surcharge_fragile;
    }

    public function validasiSOPPacking() {
        return "SOP Packing Pecah Belah: Bungkus dengan bubble wrap minimal {$this->ketebalan_bubble_wrap}mm + stiker FRAGILE!";
    }

    public function getKetebalanBubbleWrap() { return $this->ketebalan_bubble_wrap; }
    public function getBiayaAsuransi() { return $this->biaya_asuransi_wajib; }
}
?>