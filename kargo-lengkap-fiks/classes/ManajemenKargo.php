<?php
require_once 'Kargo.php';
require_once 'KargoReguler.php';
require_once 'KargoBahanKimia.php';
require_once 'KargoPecahBelah.php';

class ManajemenKargo {
    private $conn;
    private $polymorphic_collection = [];

    public function __construct($db_connection) {
        $this->conn = $db_connection;
    }

    // Method untuk mengambil semua data kargo dari database
    public function loadAllKargo() {
        $this->polymorphic_collection = [];
        
        // 1. Load Kargo Reguler - perhatikan nama kolom: tarif_dasar_perKg (bukan per_kg)
        $query_reguler = "SELECT k.*, r.jenis_paket, r.estimasi_hari 
                          FROM kargo k 
                          JOIN kargo_reguler r ON k.id_resi = r.id_resi";
        $stmt = $this->conn->prepare($query_reguler);
        $stmt->execute();
        
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $kargo = new KargoReguler(
                $row['id_resi'],
                $row['pengirim'],
                $row['kota_tujuan'],
                $row['berat_barang'],
                $row['tarif_dasar_perKg'],  // ← PERUBAHAN: perKg bukan per_kg
                $row['jenis_paket'],
                $row['estimasi_hari']
            );
            $this->polymorphic_collection[] = $kargo;
        }

        // 2. Load Kargo Bahan Kimia
        $query_kimia = "SELECT k.*, b.tingkat_bahaya, b.jenis_sertifikasi_sandi, b.biaya_penanganan_khusus 
                        FROM kargo k 
                        JOIN kargo_bahan_kimia b ON k.id_resi = b.id_resi";
        $stmt = $this->conn->prepare($query_kimia);
        $stmt->execute();
        
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $kargo = new KargoBahanKimia(
                $row['id_resi'],
                $row['pengirim'],
                $row['kota_tujuan'],
                $row['berat_barang'],
                $row['tarif_dasar_perKg'],  // ← PERUBAHAN: perKg bukan per_kg
                $row['tingkat_bahaya'],
                $row['jenis_sertifikasi_sandi'],
                $row['biaya_penanganan_khusus']
            );
            $this->polymorphic_collection[] = $kargo;
        }

        // 3. Load Kargo Pecah Belah
        $query_pecah = "SELECT k.*, p.ketebalan_bubbleWrap, p.biaya_asuransiWajib 
                        FROM kargo k 
                        JOIN kargo_pecah_belah p ON k.id_resi = p.id_resi";
        $stmt = $this->conn->prepare($query_pecah);
        $stmt->execute();
        
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $kargo = new KargoPecahBelah(
                $row['id_resi'],
                $row['pengirim'],
                $row['kota_tujuan'],
                $row['berat_barang'],
                $row['tarif_dasar_perKg'],  // ← PERUBAHAN: perKg bukan per_kg
                $row['ketebalan_bubbleWrap'],
                $row['biaya_asuransiWajib']
            );
            $this->polymorphic_collection[] = $kargo;
        }

        return $this->polymorphic_collection;
    }

    // Polymorphic method: Dynamic Binding terjadi di sini
    public function getAllWithTarif() {
        $results = [];
        foreach ($this->polymorphic_collection as $kargo) {
            // Dynamic Binding! PHP otomatis memanggil method sesuai subclass asli
            $tarif = $kargo->hitungTarifPengiriman();
            $sop = $kargo->validasiSOPPacking();
            
            $results[] = [
                'kargo' => $kargo,
                'tarif' => $tarif,
                'sop' => $sop,
                'jenis' => $this->getJenisKargo($kargo)
            ];
        }
        return $results;
    }

    private function getJenisKargo($kargo) {
        if ($kargo instanceof KargoReguler) return "📦 Reguler";
        if ($kargo instanceof KargoBahanKimia) return "⚠️ Bahan Kimia";
        if ($kargo instanceof KargoPecahBelah) return "🥚 Pecah Belah";
        return "Unknown";
    }
}
?>