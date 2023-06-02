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
    <h1>PT.Belajar Bersama</h1>
    <h3>Laporan Kehadiran Pegawai</h3>
    </center>

        <?php 
        if((isset ($_POST['bulan']) && $_POST['bulan'] !='') && (isset ($_POST['tahun']) && $_POST ['tahun'] !='')){
                        $bulan = $_POST['bulan'];
                        $tahun = $_POST['tahun'];
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
    <table class="table table-bordered table-striped table-responsive-lg text-center">
        <tr>
            <th>No</th>
            <th>Nama Pegawai</th>
            <th>NIK</th>
            <th>Jabatan</th>
            <th>Hadir</th>
            <th>Sakit</th>
            <th>Alpha</th>
        </tr>

        <?php $no = 1; foreach($laporanKehadiran as $lk):?>
            <tr>
                <td><?= $no++?></td>
                <td><?= $lk->nama_pegawai?></td>
                <td><?= $lk->nik?></td>
                <td><?= $lk->nama_jabatan?></td>
                <td><?= $lk->hadir?></td>
                <td><?= $lk->sakit?></td>
                <td><?= $lk->alpha?></td>
            </tr>
        <?php endforeach;?>
    </table>
</body>
<script type="text/javascript">
    window.print();
</script>
</html>