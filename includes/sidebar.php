<!-- ════════════════════════════════════════════════════════════════════════════
     SIDEBAR NAVIGASI — Enterprise Logistics Dashboard
     Job 4 (Controller / Driver): Komponen navigasi modular untuk semua halaman
     ════════════════════════════════════════════════════════════════════════════ -->

<!-- Mobile Backdrop Overlay -->
<div id="sidebar-overlay" class="sidebar-overlay" onclick="closeSidebar()"></div>

<!-- Sidebar Drawer -->
<aside id="sidebar" class="sidebar">

    <!-- ── Logo & Brand ── -->
    <div class="sidebar-brand">
        <div class="sidebar-logo-group">
            <div class="sidebar-logo-icon">
                <i class="bi bi-truck"></i>
            </div>
            <div>
                <h1 class="sidebar-brand-name">LogiCargo</h1>
                <p class="sidebar-brand-sub">PBO Cargo System</p>
            </div>
        </div>
        <!-- Close button (mobile only) -->
        <button id="sidebar-close-btn" class="sidebar-close-btn d-lg-none" onclick="closeSidebar()" title="Tutup Menu" aria-label="Tutup Menu">
            <i class="bi bi-x-lg"></i>
        </button>
    </div>

    <!-- ── Navigasi Links ── -->
    <nav class="sidebar-nav">
        <p class="sidebar-nav-label">Menu Utama</p>

        <a href="dashboard.php" class="sidebar-nav-link <?= basename($_SERVER['PHP_SELF']) === 'dashboard.php' ? 'active' : '' ?>" id="nav-dashboard">
            <i class="bi bi-speedometer2 sidebar-nav-icon text-accent"></i>
            <span>Dashboard</span>
        </a>
        <a href="reservasi_baru.php" class="sidebar-nav-link <?= basename($_SERVER['PHP_SELF']) === 'reservasi_baru.php' ? 'active' : '' ?>" id="nav-reservasi">
            <i class="bi bi-plus-circle-fill sidebar-nav-icon text-success"></i>
            <span>Reservasi Baru</span>
        </a>

        <p class="sidebar-nav-label mt-4">Manajemen Kargo</p>

        <a href="kargo_reguler.php" class="sidebar-nav-link <?= basename($_SERVER['PHP_SELF']) === 'kargo_reguler.php' ? 'active' : '' ?>" id="nav-reguler">
            <i class="bi bi-box-seam-fill sidebar-nav-icon" style="color: var(--clr-success)"></i>
            <span>Kargo Reguler</span>
        </a>
        <a href="kargo_bahan_kimia.php" class="sidebar-nav-link <?= basename($_SERVER['PHP_SELF']) === 'kargo_bahan_kimia.php' ? 'active' : '' ?>" id="nav-kimia">
            <i class="bi bi-exclamation-triangle-fill sidebar-nav-icon" style="color: var(--clr-danger)"></i>
            <span>Kargo Bahan Kimia</span>
        </a>
        <a href="kargo_pecah_belah.php" class="sidebar-nav-link <?= basename($_SERVER['PHP_SELF']) === 'kargo_pecah_belah.php' ? 'active' : '' ?>" id="nav-pecah">
            <i class="bi bi-shield-exclamation sidebar-nav-icon" style="color: var(--clr-warning)"></i>
            <span>Kargo Pecah Belah</span>
        </a>
    </nav>

    <!-- ── Footer: Operator Info ── -->
    <div class="sidebar-footer">
        <div class="sidebar-user">
            <div class="sidebar-user-avatar">OP</div>
            <div>
                <p class="sidebar-user-name">Operator Admin</p>
                <p class="sidebar-user-role">Controller Driver</p>
            </div>
        </div>
    </div>
</aside>
