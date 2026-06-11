<!-- ════════════════════════════════════════════════════════════════════════════
     TOP HEADER BAR — Enterprise Logistics Dashboard
     Job 4 (Controller / Driver): Header navigasi dengan status DB, judul halaman, dan datetime
     
     Variabel yang harus didefinisikan sebelum include:
       - $page_title       : Judul halaman (string)
       - $page_subtitle    : Subjudul halaman (string)
       - $is_db_connected  : Status koneksi database (boolean)
     ════════════════════════════════════════════════════════════════════════════ -->

<header class="topbar">
    <!-- Hamburger Menu (Mobile) -->
    <button id="sidebar-open-btn" class="topbar-hamburger d-lg-none" onclick="openSidebar()" title="Buka Menu" aria-label="Buka Menu">
        <i class="bi bi-list"></i>
    </button>

    <!-- Page Title -->
    <div class="topbar-title-group">
        <h2 class="topbar-title"><?= $page_title ?? 'Dashboard' ?></h2>
        <p class="topbar-subtitle"><?= $page_subtitle ?? 'Sistem Manajemen Reservasi & Tarif Cargo Ekspedisi Logistik' ?></p>
    </div>

    <!-- Right Side: DB Status + Date -->
    <div class="topbar-actions">
        <?php if ($is_db_connected): ?>
            <span class="topbar-badge topbar-badge-success">
                <span class="topbar-badge-dot bg-success"></span>
                DB Terhubung
            </span>
        <?php else: ?>
            <span class="topbar-badge topbar-badge-danger">
                <span class="topbar-badge-dot bg-danger"></span>
                DB Terputus
            </span>
        <?php endif; ?>
        <span class="topbar-datetime">
            <i class="bi bi-calendar3 me-1"></i><?= date('d M Y — H:i') ?>
        </span>
    </div>
</header>
