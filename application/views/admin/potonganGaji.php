<div class="container-fluid">
<div class="d-sm-flex align-items-center justify-content-between mb-4">
  <h1 class="h3 mb-0 text-gray-800"><?=$title?></h1>
</div>
<!-- Content Row -->

<a href="<?= base_url('admin/potonganGaji/tambahData')?>" class="btn btn-success btn-md mb-2 mt-2">
    <i class="fa fa-plus"></i> Tambah Data
</a>
<?= $this->session->flashdata('pesan')?>

<table class="table table-bordered table-striped table-lg-responsive text-center">
    <tr>
        <th>No</th>
        <th>Jenis Potongan</th>
        <th>Jumlah Potongan</th>
        <th>Action</th>
    </tr>
    <?php $no=1; foreach($potongan as $p):?>
        <tr>
            <td><?= $no++;?></td>
            <td><?= $p->potongan?></td>
            <td>Rp. <?= $p->jml_potongan?></td>
            <td>
                <a href="<?= base_url('admin/potonganGaji/updateData/'.$p->id)?>" class="btn btn-primary btn-sm">
                    <i class="fa fa-edit"></i>
                </a>    |
                <a href="<?= base_url('admin/potonganGaji/deleteData/'.$p->id)?>" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda Ingin Menghapus Data Ini?')">
                    <i class="fa fa-trash"></i>
                </a>
            </td>
        </tr>
    <?php endforeach;?>
</table>

</div>
</div>
