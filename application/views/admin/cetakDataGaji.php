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
        <h3>Pt Maju Bersama</h3>
        <h5>Daftar Data Gaji Pegawai</h5>
    </center>

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

    <table>
        <tr>
            <td>Bulan</td>
            <td>:</td>
            <td><?= $bulan?></td>
        </tr>
        <tr>
            <td>Tahun</td>
            <td>:</td>
            <td><?= $tahun?></td>
        </tr>
    </table>
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

        <?php $no=1; foreach($cetakgaji as $g):?>
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
    <table width="100%">
        <tr>
            <td></td>
            <td width="200px">
                <p>
                    Jakarta, <?= date('d M Y')?><br>
                    Finance <br><br>
                    ____________________
                </p>
            </td>
        </tr>
    </table>
</body>
</html>

<script type="text/javascript">
    window.print();
</script>