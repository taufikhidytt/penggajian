    <div class="container-fluid">
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"><?=$title?></h1>
        </div>
        <a class="btn btn-success btn-md" href="<?=base_url('admin/dataPegawai/tambahData')?>">
            <i class="fa fa-plus"></i> Tambah Data Pegawai
        </a>
        <br><br>
        <?= $this->session->flashdata('pesan') ?>
            <table class="table table-bordered text-center table-responsive-lg">
                <tr class="bg-gradient-primary text-white">
                    <th>No</th>
                    <th>NIK</th>
                    <th>Nama Pegawai</th>
                    <th>Jenis Kelamin</th>
                    <th>Jabatan</th>
                    <th>Tanggal Masuk</th>
                    <th>Status</th>
                    <th>Photo</th>
                    <th>Hak Akses</th>
                    <th>Action</th>
                </tr>
                <?php $no=1; foreach($pegawai as $p):?>
                    <tr>
                        <td><?= $no++ ?></td>
                        <td><?= $p->nik?></td>
                        <td><?= $p->nama_pegawai?></td>
                        <td><?= $p->jenis_kelamin?></td>
                        <td><?= $p->jabatan?></td>
                        <td><?= $p->tanggal_masuk?></td>
                        <td><?= $p->status?></td>
                        <td>
                            <img src="<?= base_url().'assets/photo/'.$p->photo?>" alt="Photo Pegawai" width="50px" class="rounded-circle">
                        </td>
                        <?php if($p->hak_akses == '1'){?>
                            <td>Admin</td>
                        <?php }else{?>
                            <td>Pegawai</td>
                        <?php }?>
                        <td>
                            <a class="btn btn-primary btn-sm" href="<?=base_url('admin/dataPegawai/updateData/'.$p->id_pegawai)?>">
                                <i class="fa fa-edit"></i>
                            </a>    |
                            <a class="btn btn-danger btn-sm" href="<?=base_url('admin/dataPegawai/deleteData/'.$p->id_pegawai)?>" onclick="return confirm('Apakah Anda Ingin Menghapus Data Ini?')">
                                <i class="fa fa-trash"></i>
                            </a>
                        </td>
                    </tr>
                <?php endforeach;?>
            </table>
    </div>
</div>
