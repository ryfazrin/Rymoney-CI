    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
        <!-- Sidebar - Brand -->
        <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
            <div class="sidebar-brand-icon rotate-n-15">
                <i class="fas fa-laugh-wink"></i>
            </div>
            <div class="sidebar-brand-text mx-3">Admin Ryris</div>
        </a>

        <!-- Divider -->
        <hr class="sidebar-divider my-0">

        <!-- Nav Item - Dashboard -->
        <li class="nav-item active">
            <a class="nav-link" href="index.html">
                <i class="fas fa-fw fa-tachometer-alt"></i>
                <span>Dashboard</span></a>
        </li>

        <!-- Divider -->
        <hr class="sidebar-divider my-0">

        <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseDebit"
                aria-expanded="true" aria-controls="collapseDebit">
                <i class="fas fa-fw fa-money-bill-alt"></i>
                <span>Uang Masuk</span>
            </a>
            <div id="collapseDebit" class="collapse" aria-labelledby="headingUtilities"
                data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <h6 class="collapse-header">Uang Masuk :</h6>
                    <a class="collapse-item" href="<?= base_url('CategoriesDebit') ?>">Kategori</a>
                    <a class="collapse-item" href="<?= base_url('debit') ?>">Uang Masuk</a>
                </div>
            </div>
        </li>

        <!-- Divider -->
        <hr class="sidebar-divider my-0">

        <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseKredit"
                aria-expanded="true" aria-controls="collapseKredit">
                <i class="fas fa-fw fa-money-check"></i>
                <span>Uang Keluar</span>
            </a>
            <div id="collapseKredit" class="collapse" aria-labelledby="headingUtilities"
                data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <h6 class="collapse-header">Uang Keluar :</h6>
                    <a class="collapse-item" href="<?= base_url('CategoriesCredit') ?>">Kategori</a>
                    <a class="collapse-item" href="<?= base_url('credit') ?>">Uang Keluar</a>
                </div>
            </div>
        </li>

        <!-- Divider -->
        <hr class="sidebar-divider my-0">

        <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseLaporan"
                aria-expanded="true" aria-controls="collapseLaporan">
                <i class="fas fa-fw fa-chart-pie"></i>
                <span>Laporan</span>
            </a>
            <div id="collapseLaporan" class="collapse" aria-labelledby="headingUtilities"
                data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <h6 class="collapse-header">Laporan :</h6>
                    <a class="collapse-item" href="utilities-color.html">
                      <i class="fas fa-fw fa-chart-line"></i>Uang Masuk
                    </a>
                    <a class="collapse-item" href="<?= base_url() ?>">
                      <i class="fas fa-fw fa-chart-area"></i>Uang Keluar
                    </a>
                    <a class="collapse-item" href="<?= base_url() ?>">
                      <i class="fas fa-fw fa-chart-pie"></i>Semua
                    </a>
                </div>
            </div>
        </li>

        <!-- Divider -->
        <hr class="sidebar-divider my-0">

        <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities"
                aria-expanded="true" aria-controls="collapseUtilities">
                <i class="fas fa-fw fa-wrench"></i>
                <span>Pengaturan</span>
            </a>
            <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities"
                data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <h6 class="collapse-header">Pengaturan :</h6>
                    <a class="collapse-item" href="utilities-color.html">Status Order</a>
                </div>
            </div>
        </li>

        <!-- Divider -->
        <hr class="sidebar-divider d-none d-md-block">

        <!-- Sidebar Toggler (Sidebar) -->
        <div class="text-center d-none d-md-inline">
            <button class="rounded-circle border-0" id="sidebarToggle"></button>
        </div>

    </ul>