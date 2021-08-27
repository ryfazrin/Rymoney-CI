<?= $this->extend('Templates\adminTemplate') ?>

<?= $this->section('content') ?>

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"><?= isset($title)? $title : "Halaman Ryris" ?></h1>
        <button class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"  onclick="add()" title="Add">
            <i class="fas fa-download fa-sm text-white-50"></i> Laporan
        </button>
    </div>

    <div class="row">

      <div class="col-xl-4 col-md-6 mb-4">
          <div class="card border-left-primary shadow h-100 py-2">
              <div class="card-body">
                  <div class="row no-gutters align-items-center">
                      <div class="col mr-2">
                          <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                              Semua Saldo</div>
                          <div class="h5 mb-0 font-weight-bold text-gray-800">Rp. 10.000.000,00</div>
                      </div>
                      <div class="col-auto">
                          <i class="fas fa-money-bill-alt fa-2x text-gray-300"></i>
                      </div>
                  </div>
              </div>
          </div>
      </div>

      <div class="col-xl-4 col-md-6 mb-4">
          <div class="card border-left-success shadow h-100 py-2">
              <div class="card-body">
                  <div class="row no-gutters align-items-center">
                      <div class="col mr-2">
                          <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                              Saldo Bulan ini</div>
                          <div class="h5 mb-0 font-weight-bold text-gray-800">Rp. 10.000.000,00</div>
                      </div>
                      <div class="col-auto">
                          <i class="fas fa-money-bill-alt fa-2x text-gray-300"></i>
                      </div>
                  </div>
              </div>
          </div>
      </div>

      <div class="col-xl-4 col-md-6 mb-4">
          <div class="card border-left-info shadow h-100 py-2">
              <div class="card-body">
                  <div class="row no-gutters align-items-center">
                      <div class="col mr-2">
                          <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                              Saldo Bulan lalu</div>
                          <div class="h5 mb-0 font-weight-bold text-gray-800">Rp. 10.000.000,00</div>
                      </div>
                      <div class="col-auto">
                          <i class="fas fa-money-bill-alt fa-2x text-gray-300"></i>
                      </div>
                  </div>
              </div>
          </div>
      </div>

    </div>

<?= $this->endSection() ?>

<?= $this->section('css') ?>
  <?php // Your Custom CSS here ?>
<?= $this->endSection() ?>

<?= $this->section('javascript') ?>
<script></script>
<?= $this->endSection() ?>