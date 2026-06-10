<?php
require_once 'kargo.php';

class KargoReguler extends kargo
{
    private $jenisPaket;    // Koli atau Dus
    private $estimasiHari;

    // Constructor memanggil parent + atribut tambahan
    public function __construct($id_resi, $pengirim, $kota_tujuan, $berat_barang, $jenisPaket, $estimasiHari)
    {
        parent::__construct($id_resi, $pengirim, $kota_tujuan, $berat_barang);
        $this->jenisPaket  = $jenisPaket;
        $this->estimasiHari = $estimasiHari;
    }

    // ============ Getter & Setter ============

    public function getJenisPaket()
    {
        return $this->jenisPaket;
    }

    public function setJenisPaket($jenisPaket)
    {
        $this->jenisPaket = $jenisPaket;
    }

    public function getEstimasiHari()
    {
        return $this->estimasiHari;
    }

    public function setEstimasiHari($estimasiHari)
    {
        $this->estimasiHari = $estimasiHari;
    }

    // ============ Overriding Polimorfisme ============

    /**
     * hitungTarif() — Kargo Reguler
     * Rumus: Berat * tarifDasarPerKg
     */
    public function hitungTarif()
    {
        return $this->berat_barang * $this->tarif;
    }

    /**
     * ValidasiSopPacking() — Kargo Reguler
     * Validasi standar packing untuk paket reguler
     */
    public function ValidasiSopPacking()
    {
        if ($this->jenisPaket === 'Koli') {
            return "✅ SOP Packing Reguler (Koli): Barang diikat rapi dengan tali dan dibungkus plastik wrapping.";
        } elseif ($this->jenisPaket === 'Dus') {
            return "✅ SOP Packing Reguler (Dus): Barang dimasukkan ke dalam dus karton dengan pengisi (styrofoam/kertas).";
        } else {
            return "❌ Jenis paket tidak valid. Harus 'Koli' atau 'Dus'.";
        }
    }
}
?>
