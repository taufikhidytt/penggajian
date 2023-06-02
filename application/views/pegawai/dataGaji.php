<div class="container-fluid">
<div class="d-sm-flex align-items-center justify-content-between mb-4">
  <h1 class="h3 mb-0 text-gray-800"><?=$title?></h1>
</div>
    <table class="table table-bordered table-striped text-center">
        <tr>
            <th>Bulan/Tahum</th>
            <th>Gaji Pokok</th>
            <th>Tunjangan Transport</th>
            <th>Uang Makan</th>
            <th>Potongan</th>
            <th>Total Gaji</th>
            <th>Cetak Slip Gaji</th>
        </tr>
        <?php foreach($potongan as $p):?>
        <?php $potongan = $p->jml_potongan; ?>
        <?php endforeach;?>

        <?php foreach($gaji as $g):?>
        <?php $pot_gaji = $g->alpha * $potongan?>
            <tr>
                <td><?= $g->bulan?></td>
                <td>Rp. <?= number_format($g->gaji_pokok,0,',','.')?></td>
                <td>Rp. <?= number_format($g->tj_transport,0,',','.')?></td>
                <td>Rp. <?= number_format($g->uang_makan,0,',','.')?></td>
                <td>Rp. <?= number_format($pot_gaji,0,',','.')?></td>
                <td>Rp. <?= number_format($g->gaji_pokok + $g->tj_transport + $g->uang_makan - $pot_gaji,0,',','.')?></td>
                <td>
                    <a href="<?= base_url('pegawai/dataGaji/cetakSlip/'.$g->id_kehadiran)?>" class="btn btn-primary btn-sm">
                        <i class="fa fa-print"></i>
                    </a>
                </td>
            </tr>
        <?php endforeach;?>
    </table>
</div>
</div>
