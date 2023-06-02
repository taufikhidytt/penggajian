    <div class="container-fluid">
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"><?=$title?></h1>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header bg-gradient-info text-white font-weight-bold">
                        Filter Absensi Pegawai
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
                                    for($i = 2018; $i<$tahun+5; $i++){ ?>
                                        <option value="<?= $i?>"><?= $i?></option>
                                    <?php }?>
                                </select>
                            </div>
                            <button type="submit" class="btn btn-primary btn-md ml-lg-auto mr-lg-3">
                                <i class="fa fa-eye"></i> Tampilkan Data
                            </button> <br><br>
                            <a href="<?= base_url('admin/dataAbsensi/tambahDataAbsensi')?>" class="btn btn-success btn-md">
                                <i class="fa fa-plus"></i> Tambah Data Kehadiran
                            </a>
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
                    Menampilkan Data Kehadiran Pegawai Bulan : <span class="font-weight-bold"><?= $bulan?></span> Tahun : <span class="font-weight-bold"><?= $tahun?></span>
                </div>

                <?php 

                $jmldata = count($absensi);
                if($jmldata > 0 ){?>
                <?= $this->session->flashdata('pesan')?>
                    <table class="table table-bordered table-responsive-lg table-striped text-center">
                        <tr class="bg-gradient-primary text-white">
                            <th>No</th>
                            <th>NIK</th>
                            <th>Nama Pegawai</th>
                            <th>Jenis Kelamin</th>
                            <th>Nama Jabatan</th>
                            <th>Hadir</th>
                            <th>Sakit</th>
                            <th>Alpha</th>
                            <th>Action</th>
                        </tr>
                        <?php $no=1; foreach($absensi as $a):?>
                            <tr>
                                <td><?= $no++ ?></td>
                                <td><?= $a->nik?></td>
                                <td><?= $a->nama_pegawai?></td>
                                <td><?= $a->jenis_kelamin?></td>
                                <td><?= $a->nama_jabatan?></td>
                                <td><?= $a->hadir?></td>
                                <td><?= $a->sakit?></td>
                                <td><?= $a->alpha?></td>
                                <td>
                                    <a href="<?= base_url('admin/DataAbsensi/ubahData/'.$a->id_kehadiran)?>" class="btn btn-primary btn-sm">
                                        <i class="fa fa-edit"></i>
                                    </a>    |
                                    <a href="" class="btn btn-danger btn-sm">
                                        <i class="fa fa-trash"></i>
                                    </a>
                                </td>
                            </tr>
                        <?php endforeach;?>
                    </table>
                    <?php }else{?>

                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <strong>Data Masih Kosong.</strong>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>

                    <?php }?>
            </div>
        </div>
    </div>
</div>
