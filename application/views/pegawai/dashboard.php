<div class="container-fluid">
<div class="d-sm-flex align-items-center justify-content-between mb-4">
  <h1 class="h3 mb-0 text-gray-800"><?=$title?></h1>
</div>
<div class="alert alert-success alert-dismissible fade show" role="alert">
    <p style="font-size:15px;">
    <strong>Selamat Anda Berhasil Login Sebagai Pegawai</strong>
    </p>
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
<!-- Content Row -->
<div class="row">
  <!-- Earnings (Monthly) Card Example -->
  <div class="col-xl-3 col-md-6 mb-4">
    <div class="card border-left-primary shadow h-100 py-2">
      <div class="card-body">
        <div class="row no-gutters align-items-center">
          <div class="col mr-2">
            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Data Pegawai</div>
            <div class="h5 mb-0 font-weight-bold text-gray-800">asas</div>
          </div>
          <div class="col-auto">
            <i class="fas fa-users fa-2x text-gray-300"></i>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Earnings (Monthly) Card Example -->
  <div class="col-xl-3 col-md-6 mb-4">
    <div class="card border-left-success shadow h-100 py-2">
      <div class="card-body">
        <div class="row no-gutters align-items-center">
          <div class="col mr-2">
            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Data Admin</div>
            <div class="h5 mb-0 font-weight-bold text-gray-800">asas</div>
          </div>
          <div class="col-auto">
            <i class="fas fa-user-cog fa-2x text-gray-300"></i>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Earnings (Monthly) Card Example -->
  <div class="col-xl-3 col-md-6 mb-4">
    <div class="card border-left-info shadow h-100 py-2">
      <div class="card-body">
        <div class="row no-gutters align-items-center">
          <div class="col mr-2">
            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Data Jabatan</div>
            <div class="h5 mb-0 font-weight-bold text-gray-800">asas</div>
          </div>
          <div class="col-auto">
            <i class="fas fa-briefcase fa-2x text-gray-300"></i>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Pending Requests Card Example -->
  <div class="col-xl-3 col-md-6 mb-4">
    <div class="card border-left-warning shadow h-100 py-2">
      <div class="card-body">
        <div class="row no-gutters align-items-center">
          <div class="col mr-2">
            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Data Kehadiran</div>
            <div class="h5 mb-0 font-weight-bold text-gray-800">asas</div>
          </div>
          <div class="col-auto">
            <i class="fas fa-book-reader fa-2x text-gray-300"></i>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="card">
    <div class="card-header bg-primary text-center text-white">
        <h5>Data Pegawai</h5>
    </div>
    <?php foreach($pegawai as $p):?>
    <div class="card-body">
        <div class="row">
            <div class="col-4">
                <img src="<?= base_url('assets/photo/'.$p->photo)?>" alt="photo pegawai" width="70%" style="margin-left: auto; margin-right:auto;">
            </div>
            <div class="col-8">
                <table class="table table-bordered-table-striped">
                    <tr>
                        <td>Nama Pegawai</td>
                        <td><?= $p->nama_pegawai?></td>
                    </tr>
                    <tr>
                        <td>Jabatan</td>
                        <td><?= $p->jabatan?></td>
                    </tr>
                    <tr>
                        <td>Tanggal Masuk</td>
                        <td><?= $p->tanggal_masuk?></td>
                    </tr>
                    <tr>
                        <td>Status</td>
                        <td><?= $p->status?></td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
</div>
<?php endforeach;?>
</div>
</div>
