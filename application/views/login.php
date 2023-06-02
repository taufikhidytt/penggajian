<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title></title>
    <link href="<?=base_url()?>assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

	<link rel="stylesheet" href="<?= base_url('assets/css/sb-admin-2.css')?>">
	<link rel="stylesheet" href="<?= base_url('assets/css/login.css')?>">
</head>
<body>
    <div class="box text-center">
        <h2>Sign In <br> AppPenggajian</h2><br><br>
        <form id="login" method="post" name="login" action="<?= base_url('welcome'); ?>">
            <?= $this->session->flashdata('pesan');?>
            <div class="Inputbox">
                <input type="text" id="username" name="username" autocomplete="off" value="<?= set_value('username'); ?>">
                <label style="color: #ffffff; font-size:15px;">Username</label>
                <?= form_error('username', '<small class="text-danger pl-3">', '</small>'); ?>
            </div>
            <div class="Inputbox">
                <input type="password" id="password" name="password" autocomplete="off">
                <label style="color: #ffffff; font-size:15px;">Password</label>
                <?= form_error('password', '<small class="text-danger pl-3">', '</small>'); ?>
            </div>
            <button type="submit" class="btn btn-success btn-md ">
                <i class="fa fa-sign-in-alt"></i> Sign In
            </button><br><br>
            <!-- <a href="<?= base_url(); ?>backend/admin/auth/registration">belum mempunyai akun?</a>
            <br><br> -->
            <a href="">forgot password</a>
        </form>
    </div>
    <!-- Bootstrap core JavaScript-->
  <script src="<?=base_url()?>assets/vendor/jquery/jquery.min.js"></script>
  <script src="<?=base_url()?>assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="<?=base_url()?>assets/vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="<?=base_url()?>assets/js/sb-admin-2.min.js"></script>

  <!-- Page level plugins -->
  <script src="<?=base_url()?>assets/vendor/chart.js/Chart.min.js"></script>

  <!-- Page level custom scripts -->
  <script src="<?=base_url()?>assets/js/demo/chart-area-demo.js"></script>
  <script src="<?=base_url()?>assets/js/demo/chart-pie-demo.js"></script>

</body>
</html>