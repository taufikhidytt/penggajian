<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title?></title>
    <style>
        body{
            font-family: Arial, Helvetica, sans-serif;
            color: #000000;
        }
    </style>
</head>
<body>
    <center>
        <h1>PT. Belajar Bersama</h1>
        <h3>Slip Gaji Pegawai</h3>
        <hr style="width:50%; border-width:5px; color:#000000;">
    </center>

    <?php foreach($potongan as $p){
        $potongan = $p->jml_potongan;
        }
    ?>

    <?php $no = 1; foreach($printSlip as $s):?>

    <?php $potonganGaji = $s->alpha * $potongan;?>
    <table style="width: 100%;">
        <tr>
            <td style="width: 20%;">Nama Pegawai</td>
            <td style="width: 2%;">:</td>
            <td><?= $s->nama_pegawai?></td>
        </tr>
        <tr>
            <td>NIK</td>
            <td>:</td>
            <td><?= $s->nik?></td>
        </tr>
        <tr>
            <td>Nama Jabatan</td>
            <td>:</td>
            <td><?= $s->nama_jabatan?></td>
        </tr>
        <tr>
            <td>Bulan</td>
            <td>:</td>
            <td><?= substr($s->bulan,0,2) ?></td>
        </tr>
        <tr>
            <td>Tahun</td>
            <td>:</td>
            <td><?= substr($s->bulan,2,4) ?></td>
        </tr>
    </table>

    <table class="table table-bordered table-striped table-responsive-lg text-center">
        <tr>
            <th style="width: 5%;">No</th>
            <th>Keterangan</th>
            <th>Jumlah</th>
        </tr>
        <tr>
            <td><?= $no++?></td>
            <td>Gaji Pokok</td>
            <td>Rp. <?= number_format($s->gaji_pokok,0,',','.')?></td>
        </tr>
        <tr>
            <td><?= $no++?></td>
            <td>Tunjangan Transport</td>
            <td>Rp. <?= number_format($s->tj_transport,0,',','.')?></td>
        </tr>
        <tr>
            <td><?= $no++?></td>
            <td>Uang Makan</td>
            <td>Rp. <?= number_format($s->uang_makan,0,',','.')?></td>
        </tr>
        <tr>
            <td><?= $no++?></td>
            <td>Potongan</td>
            <td>Rp. <?= number_format($potonganGaji,0,',','.')?></td>
        </tr>
        <tr>
            <th colspan="2" style="text-align: right;">Total Gaji</th>
            <th>Rp. <?= number_format($s->gaji_pokok + $s->tj_transport + $s->uang_makan - $potonganGaji,0,',','.')?></th>
        </tr>
    </table>

    <table style="width: 100%;">
        <tr>
            <td>
                <p>Nama Pegawai</p>
                <br><br>
                <p class="font-weight-bold"><?= $s->nama_pegawai?></p>
            </td>
            <td style="text-align: right;">
                <p>Tangerang, <?= date('d M Y')?>
                <br>Finance
                <br><br><br>
                ____________________
                </p>
            </td>
        </tr>
    </table>

    <?php endforeach;?>
</body>
</html>

<script type="text/javascript">
    window.print();
</script>