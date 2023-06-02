    <div class="container-fluid">
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"><?=$title?></h1>
        <div class="pull-right">
            <a href="<?= base_url('admin/dataAbsensi')?>" class="btn btn-secondary btn-md">
                <i class="fa fa-reply-all"></i> Back
            </a>
        </div>
        </div>
        <div class="row">
            <div class="col-12">
            <?php foreach($absensi as $a):?>
                <form action="<?= base_url('admin/dataAbsensi/ubahDataAksi')?>" method="post">
                    <div class="form-group">
                        <input type="hidden" name="id_kehadiran" id="id_kehadiran" value="<?= $a->id_kehadiran?>">
                        <label for="nik">NIK :</label>
                        <input type="text" name="nik" id="nik" class="form-control" disabled value="<?= $a->nik?>">
                        <?= form_error('nik')?>
                    </div>
                    <div class="form-group">
                        <label for="nama_pegawai">Nama Pegawai :</label>
                        <input type="text" name="nama_pegawai" id="nama_pegawai" class="form-control" disabled value="<?= $a->nama_pegawai?>">
                        <?= form_error('nama_pegawai')?>
                    </div>
                    <div class="form-group">
                        <label for="jenis_kelamin">Jenin Kelamin :</label>
                        <input type="text" name="jenis_kelamin" id="jenis_kelamin" class="form-control" disabled value="<?= $a->jenis_kelamin?>">
                        <?= form_error('jenis_kelamin')?>
                    </div>
                    <div class="form-group">
                        <label for="nama_jabatan">Nama Jabatan :</label>
                        <input type="text" name="nama_jabatan" id="nama_jabatan" class="form-control" disabled value="<?= $a->nama_jabatan?>">
                        <?= form_error('nama_jabatan')?>
                    </div>
                    <div class="form-group">
                        <label for="hadir">Hadir :</label>
                        <input type="number" name="hadir" id="hadir" class="form-control" value="<?= $a->hadir?>">
                        <?= form_error('hadir')?>
                    </div>
                    <div class="form-group">
                        <label for="sakit">Sakit :</label>
                        <input type="number" name="sakit" id="sakit" class="form-control" value="<?= $a->sakit?>">
                        <?= form_error('sakit')?>
                    </div>
                    <div class="form-group">
                        <label for="alpha">Alpha :</label>
                        <input type="number" name="alpha" id="alpha" class="form-control" value="<?= $a->alpha?>">
                        <?= form_error('alpha')?>
                    </div>
                    <button class="btn btn-success btn-md" type="submit">
                        <i class="fa fa-check"></i> Save
                    </button>
                </form>
            <?php endforeach;?>
            </div>
        </div>
    </div>
</div>
