<?php
require_once 'kargo.php';

class KargoPecahBelah extends kargo
{
    private $ketebalanBubbleWrap;
    private $biayaAsuransiWajib;

    // Constructor memanggil parent + atribut tambahan
    public function __construct($id_resi, $pengirim, $kota_tujuan, $berat_barang, $ketebalanBubbleWrap, $biayaAsuransiWajib)
    {
        parent::__construct($id_resi, $pengirim, $kota_tujuan, $berat_barang);
        $this->ketebalanBubbleWrap = $ketebalanBubbleWrap;
        $this->biayaAsuransiWajib  = $biayaAsuransiWajib;
    }

    // ============ Getter & Setter ============

    public function getKetebalanBubbleWrap()
    {
        return $this->ketebalanBubbleWrap;
    }

    public function setKetebalanBubbleWrap($ketebalanBubbleWrap)
    {
        $this->ketebalanBubbleWrap = $ketebalanBubbleWrap;
    }

    public function getBiayaAsuransiWajib()
    {
        return $this->biayaAsuransiWajib;
    }

    public function setBiayaAsuransiWajib($biayaAsuransiWajib)
    {
        $this->biayaAsuransiWajib = $biayaAsuransiWajib;
    }

    // ============ Overriding Polimorfisme ============

    /**
     * hitungTarif() — Kargo Pecah Belah
     * Rumus: (Berat * tarifDasarPerKg) + biayaAsuransiWajib + Surcharge Fragile (5% dari tarif berat)
     */
    public function hitungTarif()
    {
        $tarifBerat      = $this->berat_barang * $this->tarif;
        $surchargeFragile = $tarifBerat * 0.05; // 5% dari tarif berat

        return $tarifBerat + $this->biayaAsuransiWajib + $surchargeFragile;
    }

    /**
     * ValidasiSopPacking() — Kargo Pecah Belah
     * Validasi packing fragile berdasarkan ketebalan bubble wrap
     */
    public function ValidasiSopPacking()
    {
        $pesan = "📦 SOP Packing Pecah Belah (Bubble Wrap: {$this->ketebalanBubbleWrap} lapis):\n";

        if ($this->ketebalanBubbleWrap >= 4) {
            $pesan .= "✅ Packing PREMIUM — Bubble wrap tebal, box kayu/peti, dan label FRAGILE di semua sisi.\n";
        } elseif ($this->ketebalanBubbleWrap >= 2) {
            $pesan .= "✅ Packing STANDAR — Bubble wrap cukup, dus karton tebal, dan label FRAGILE.\n";
        } else {
            $pesan .= "❌ Packing KURANG — Ketebalan bubble wrap tidak memenuhi standar minimum (min. 2 lapis).\n";
        }

        $pesan .= "🛡️ Biaya Asuransi Wajib: Rp " . number_format($this->biayaAsuransiWajib, 0, ',', '.');

        return $pesan;
    }
}
?>
