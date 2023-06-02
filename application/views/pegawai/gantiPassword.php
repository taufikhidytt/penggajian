    <div class="container-fluid">
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"><?=$title?></h1>
        </div>
        <div class="card">
            <div class="card-header bg-primary">
                <h5 class="text-center text-white">Ubah Password Anda Di Sini</h5>
            </div>
            <div class="card-body">
                <form action="<?= base_url('pegawai/gantiPassword/gantiPasswordAksi')?>" method="post">
                    <div class="form-group">
                        <label for="password_baru">Password Baru Anda</label>
                        <input type="password" name="password_baru" id="password_baru" class="form-control" autocomplete="off" placeholder="Masukan Password Baru Anda">
                        <?= form_error('password_baru', '<small class="text-danger pl-3">', '</small>');?>
                    </div>
                    <div class="form-group">
                        <label for="password_baru2">Konfirmasi Password Baru</label>
                        <input type="password" name="password_baru2" id="password_baru2" class="form-control" autocomplete="off" placeholder="Konfirmasi Password Baru Anda">
                        <?= form_error('password_baru2', '<small class="text-danger pl-3">', '</small>');?>
                    </div>
                    <button type="submit" name="submit" class="btn btn-success btn-md">
                        <i class="fa fa-check"></i> Save
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
