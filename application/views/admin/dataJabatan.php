    <div class="container-fluid">
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"><?=$title?></h1>
        </div>
        <a class="btn btn-success btn-md" href="<?=base_url('admin/dataJabatan/tambahData')?>">
            <i class="fa fa-plus"></i> Tambah Data Jabatan
        </a>
        <br><br>
        <div class="row">
            <div class="col-lg-12">
                <?= $this->session->flashdata('pesan') ?>
                    <table class="table table-bordered text-center table-responsive-lg">
                        <tr class="bg-gradient-primary text-white">
                            <th>No</th>
                            <th>Nama Jabatan</th>
                            <th>Gaji Pokok</th>
                            <th>Tunjangan Transport</th>
                            <th>Uang Makan</th>
                            <th>Total</th>
                            <th>Action</th>
                        </tr>
                        <?php $no=1; foreach($jabatan as $j):?>
                            <tr>
                                <td><?= $no++ ?></td>
                                <td><?= $j->nama_jabatan?></td>
                                <td>Rp. <?= $j->gaji_pokok?></td>
                                <td>Rp. <?= $j->tj_transport?></td>
                                <td>Rp. <?= $j->uang_makan?></td>
                                <td>Rp. <?= $j->gaji_pokok + $j->tj_transport + $j->uang_makan?></td>
                                <td>
                                    <a class="btn btn-primary btn-sm" href="<?=base_url('admin/dataJabatan/updateData/'.$j->id_jabatan)?>">
                                        <i class="fa fa-edit"></i>
                                    </a>    |
                                    <a class="btn btn-danger btn-sm" href="<?=base_url('admin/dataJabatan/deleteData/'.$j->id_jabatan)?>" onclick="return confirm('Apakah Anda Ingin Menghapus Data Ini?')">
                                        <i class="fa fa-trash"></i>
                                    </a>
                                </td>
                            </tr>
                        <?php endforeach;?>
                    </table>
            </div>
        </div>
    </div>
</div>
