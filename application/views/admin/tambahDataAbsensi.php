    <div class="container-fluid">
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"><?=$title?></h1>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header bg-gradient-info text-white font-weight-bold">
                        Input Absensi Pegawai
                    </div>
                    <div class="card-body">
                        <form action="" class="form-inline">
                            <div class="form-group">
                                <label for="bulan">Bulan :</label>
                                <select name="bulan" id="bulan" class="form-control ml-3">
                                    <option value="">--Pilih Bulan--</option>
                                    <option value="01">Januari</option>
                                    <option value="02">Februari</option>
                                    <option value="03">Maret</option>
                                    <option value="04">April</option>
                                    <option value="05">Mei</option>
                                    <option value="06">Juni</option>
                                    <option value="07">July</option>
                                    <option value="08">Agustus</option>
                                    <option value="09">September</option>
                                    <option value="10">Oktober</option>
                                    <option value="11">November</option>
                                    <option value="12">Desember</option>
                                </select>
                            </div>
                            <div class="form-group ml-lg-3">
                                <label for="tahun">Tahun :</label>
                                <select name="tahun" id="tahun" class="form-control ml-3">
                                    <option value="">--Pilih Tahun--</option>
                                    <?php $tahun = date('Y');
                                    for($i = 2020; $i<$tahun+5; $i++){ ?>
                                    <option value="<?= $i?>"><?= $i?></option>
                                    <?php }?>
                                </select>
                            </div>
                            <button type="submit" class="btn btn-primary btn-md ml-lg-auto ml-3">
                                <i class="fa fa-eye"></i> Generate
                            </button>
                        </form>
                    </div>
                </div>
                <?php 
                    if((isset ($_GET['bulan']) && $_GET['bulan'] !='') && (isset ($_GET['tahun']) && $_GET ['tahun'] !='')){
                        $bulan = $_GET['bulan'];
                        $tahun = $_GET['tahun'];
                        $bulantahun = $bulan.$tahun;
                    }else{
                        $bulan = date('m');
                        $tahun = date('Y');
                        $bulantahun = $bulan.$tahun;
                    }
                ?>
                <div class="alert alert-info">
                    Menampilkan Data Kehadiran Pegawai Bulan : <span class="font-weight-bold"><?= $bulan?></span> 
                    Tahun : <span class="font-weight-bold"><?= $tahun?></span>
                </div>
                <form action="" method="post">
                    <button class="btn btn-success btn-md mb-3" type="submit" name="submit" value="submit">
                        <i class="fa fa-check"></i> Save
                    </button>
                    
                    <a href="<?= base_url('admin/dataAbsensi')?>" class="btn btn-secondary btn-md mb-3 ml-4">
                        <i class="fa fa-reply-all"></i> Back
                    </a>
                        <table class="table table-bordered table-responsive-lg table-striped text-center">
                            <tr class="bg-gradient-primary text-white">
                                <th>No</th>
                                <th>NIK</th>
                                <th>Nama Pegawai</th>
                                <th>Jenis Kelamin</th>
                                <th>Nama Jabatan</th>
                                <th width="10%">Hadir</th>
                                <th width="10%">Sakit</th>
                                <th width="10%">Alpha</th>
                            </tr>
                            <?php $no=1; foreach($inputAbsensi as $a):?>
                                <tr>
                                    <input type="hidden" name="bulan[]" class="form-control" value="<?= $bulantahun?>">
                                    <input type="hidden" name="nik[]" class="form-control" value="<?= $a->nik?>">
                                    <input type="hidden" name="nama_pegawai[]" class="form-control" value="<?= $a->nama_pegawai?>">
                                    <input type="hidden" name="jenis_kelamin[]" class="form-control" value="<?= $a->jenis_kelamin?>">
                                    <input type="hidden" name="nama_jabatan[]" class="form-control" value="<?= $a->nama_jabatan?>">
                                    <td><?= $no++ ?></td>
                                    <td><?= $a->nik?></td>
                                    <td><?= $a->nama_pegawai?></td>
                                    <td><?= $a->jenis_kelamin?></td>
                                    <td><?= $a->nama_jabatan?></td>
                                    <td><input type="number" name="hadir[]" class="form-control" value="0"></td>
                                    <td><input type="number" name="sakit[]" class="form-control" value="0"></td>
                                    <td><input type="number" name="alpha[]" class="form-control" value="0"></td>
                                </tr>
                            <?php endforeach;?>
                        </table>
                </form>
            </div>
        </div>
    </div>
</div>
