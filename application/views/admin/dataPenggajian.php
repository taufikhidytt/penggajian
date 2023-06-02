    <div class="container-fluid">
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"><?=$title?></h1>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header bg-gradient-info text-white font-weight-bold">
                        Filter Data Gaji Pegawai
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

                            <button type="submit" class="btn btn-primary btn-md ml-lg-auto mr-lg-3">
                                <i class="fa fa-eye"></i> Tampilkan Data
                            </button> <br><br>

                            <?php if (count($gaji) > 0) {?>
                                <a href="<?= base_url('admin/dataPenggajian/cetakGaji?bulan='.$bulan),'&tahun='.$tahun?>" class="btn btn-success btn-md">
                                    <i class="fa fa-print"></i> Cetak Daftar Gaji
                                </a>
                            <?php }else{?>
                                <button type="button" class="btn btn-success btn-md" data-toggle="modal" data-target="#exampleModal">
                                    <i class="fa fa-print"></i> Cetak Daftar Gaji
                                </button>
                            <?php }?>
                            
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
                    Menampilkan Data Gaji Pegawai Bulan : <span class="font-weight-bold"><?= $bulan?></span> Tahun : <span class="font-weight-bold"><?= $tahun?></span>
                </div>

                <?php 

                $jmldata = count($gaji);
                if($jmldata > 0 ){?>

                <table class="table table-bordered table-lg-responsive text-center">
                    <tr>
                        <th>No</th>
                        <th>NIK</th>
                        <th>Nama Pegawai</th>
                        <th>Jenis Kelamin</th>
                        <th>Jabatan</th>
                        <th>Gaji Pokok</th>
                        <th>Tunjangan Transport</th>
                        <th>Uang Makan</th>
                        <th>Potongan</th>
                        <th>Total Gaji</th>
                    </tr>


                    <!-- Potongan Gaji Belum Dinamis -->

                    <?php foreach($potongan as $p){
                        $alpha = $p->jml_potongan;
                    }
                    ?>

                    <?php $no=1; foreach($gaji as $g):?>
                    <?php $potongan = $g->alpha * $alpha;?>
                    <tr>
                        <td><?= $no++;?></td>
                        <td><?= $g->nik?></td>
                        <td><?= $g->nama_pegawai?></td>
                        <td><?= $g->jenis_kelamin?></td>
                        <td><?= $g->nama_jabatan?></td>
                        <td>Rp. <?= number_format($g->gaji_pokok,0,',','.')?></td>
                        <td>Rp. <?= number_format($g->tj_transport,0,',','.')?></td>
                        <td>Rp. <?= number_format($g->uang_makan,0,',','.')?></td>
                        <td>Rp. <?= number_format($potongan,0,',','.')?></td>
                        <td>Rp. <?= number_format($g->gaji_pokok + $g->tj_transport + $g->uang_makan - $potongan,0,',','.')?></td>
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

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Informasi</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        Data Gaji Masih Kosong
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
