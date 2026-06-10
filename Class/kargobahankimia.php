<?php
require_once 'kargo.php';

class KargoBahanKimia extends kargo
{
    private $tingkatBahaya;          // Class 1-9
    private $jenisSertifikasiSandi;

    // Constructor memanggil parent + atribut tambahan
    public function __construct($id_resi, $pengirim, $kota_tujuan, $berat_barang, $tingkatBahaya, $jenisSertifikasiSandi)
    {
        parent::__construct($id_resi, $pengirim, $kota_tujuan, $berat_barang);
        $this->tingkatBahaya         = $tingkatBahaya;
        $this->jenisSertifikasiSandi = $jenisSertifikasiSandi;
    }

    // ============ Getter & Setter ============

    public function getTingkatBahaya()
    {
        return $this->tingkatBahaya;
    }

    public function setTingkatBahaya($tingkatBahaya)
    {
        $this->tingkatBahaya = $tingkatBahaya;
    }

    public function getJenisSertifikasiSandi()
    {
        return $this->jenisSertifikasiSandi;
    }

    public function setJenisSertifikasiSandi($jenisSertifikasiSandi)
    {
        $this->jenisSertifikasiSandi = $jenisSertifikasiSandi;
    }

    // ============ Overriding Polimorfisme ============

    /**
     * hitungTarif() — Kargo Bahan Kimia
     * Rumus: (Berat * tarifDasarPerKg) + Biaya Penanganan Khusus
     * Biaya Penanganan Khusus = Tingkat Bahaya * Rp100.000
     */
    public function hitungTarif()
    {
        $tarifBerat             = $this->berat_barang * $this->tarif;
        $biayaPenangananKhusus  = $this->tingkatBahaya * 100000;

        return $tarifBerat + $biayaPenangananKhusus;
    }

    /**
     * ValidasiSopPacking() — Kargo Bahan Kimia
     * Validasi khusus sesuai tingkat bahaya dan sertifikasi
     */
    public function ValidasiSopPacking()
    {
        $pesan = "🧪 SOP Packing Bahan Kimia (Tingkat Bahaya: {$this->tingkatBahaya}):\n";

        if ($this->tingkatBahaya >= 7) {
            $pesan .= "⚠️ BAHAYA TINGGI — Wajib kontainer tahan bocor, label GHS, dan dokumen MSDS.\n";
        } elseif ($this->tingkatBahaya >= 4) {
            $pesan .= "⚠️ BAHAYA SEDANG — Wajib kemasan sekunder anti-tumpah dan label peringatan.\n";
        } else {
            $pesan .= "✅ BAHAYA RENDAH — Kemasan standar dengan label identifikasi bahan kimia.\n";
        }

        $pesan .= "📄 Sertifikasi Sandi: {$this->jenisSertifikasiSandi}";

        return $pesan;
    }
}
?>
