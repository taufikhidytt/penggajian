<div class="container-fluid">
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <div class="pull-left">
        <h1 class="h3 mb-0 text-gray-800"><?=$title?></h1>
    </div>
    <div class="pull-right">
        <a href="<?=base_url('admin/dataPegawai')?>" class="btn btn-secondary btn-md">
            <i class="fa fa-reply-all"></i> Back
        </a>
    </div>
</div>
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <form action="<?=base_url('admin/dataPegawai/tambahDataAksi')?>" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="nik">NIK :</label>
                        <input type="number" name="nik" id="nik" class="form-control" value="<?= set_value('nik')?>">
                        <?= form_error('nik')?>
                    </div>
                    <div class="form-group">
                        <label for="nama_pegawai">Nama Pegawai :</label>
                        <input type="text" name="nama_pegawai" id="nama_pegawai" class="form-control" value="<?= set_value('nama_pegawai')?>">
                        <?= form_error('nama_pegawai')?>
                    </div>
                    <div class="form-group">
                        <label for="username">Username :</label>
                        <input type="text" name="username" id="username" class="form-control" value="<?= set_value('username')?>">
                        <?= form_error('username')?>
                    </div>
                    <div class="form-group">
                        <label for="password">Password :</label>
                        <input type="password" name="password" id="password" class="form-control">
                        <?= form_error('password')?>
                    </div>
                    <div class="form-group">
                        <label for="jenis_kelamin">Jenis Kelamin :</label>
                        <select name="jenis_kelamin" id="jenis_kelamin" class="form-control">
                            <option value="">--Pilih--</option>
                            <option value="Laki laki">Laki Laki</option>
                            <option value="Perempuan">Perempuan</option>
                        </select>
                        <?= form_error('jenis_kelamin')?>
                    </div>
                    <div class="form-group">
                        <label for="jabatan">Nama Jabatan :</label>
                        <select name="jabatan" id="jabatan" class="form-control">
                            <option value="">--Pilih--</option>
                            <?php foreach($jabatan as $j):?>
                                <option value="<?= $j->nama_jabatan?>"><?= $j->nama_jabatan?></option>
                            <?php endforeach;?>
                        </select>
                        <?= form_error('jabatan')?>
                    </div>
                    <div class="form-group">
                        <label for="tanggal_masuk">Tanggal Masuk :</label>
                        <input type="date" name="tanggal_masuk" id="tanggal_masuk" class="form-control" value="<?= set_value('tanggal_masuk')?>">
                        <?= form_error('tanggal_masuk')?>
                    </div>
                    <div class="form-group">
                        <label for="status">Status Pegawai :</label>
                        <select name="status" id="status" class="form-control">
                            <option value="">--Pilih--</option>
                            <option value="Pegawai Tetap">Pegawai Tetap</option>
                            <option value="Pegawai Tidak Tetap">Pegawai Tidak Tetap</option>
                            <option value="Pegawai Harian Lepas">Pegawai Harian Lepas</option>
                        </select>
                        <?= form_error('status')?>
                    </div>
                    <div class="form-group">
                        <label for="photo">Photo Pegawai :</label>
                        <input type="file" name="photo" id="photo" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="hak_akses">Hak Akses :</label>
                        <select name="hak_akses" id="hak_akses" class="form-control">
                            <option value="">--Pilih--</option>
                            <option value="1">Admin</option>
                            <option value="2">Pegawai</option>
                        </select>
                        <?= form_error('hak_akses')?>
                    </div>
                    <button class="btn btn-success btn-md" type="submit" name="submit">
                        <i class="fa fa-check"></i> Save
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
</div>
