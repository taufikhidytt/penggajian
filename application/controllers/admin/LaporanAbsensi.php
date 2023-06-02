<?php 

class LaporanAbsensi extends CI_Controller{

    public function __construct()
    {
        parent:: __construct();
        if ($this->session->userdata('hak_akses') != '1') {
            $this->session->set_flashdata('pesan', 
				'<div class="alert alert-danger alert-dismissible fade show" role="alert">
					<p style="font-size:12px;">
                    <strong>Anda Belum Login!!</strong> Silahkan Login Terlebih Dahulu.
					</p>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>');
                redirect('welcome');
        }
    }

    public function index(){
        $data ['title'] = "Laporan Absensi Pegawai";
        $this->load->view('templates_admin/header', $data);
        $this->load->view('templates_admin/sidebar');
        $this->load->view('admin/filterLaporanAbsensi', $data);
        $this->load->view('templates_admin/footer');
    }

    public function cetakLaporanAbsensi(){
        $data ['title'] = "Cetak Laporan Absensi";

        if((isset ($_POST['bulan']) && $_POST['bulan'] !='') && (isset ($_POST['tahun']) && $_POST ['tahun'] !='')){
                        $bulan = $_POST['bulan'];
                        $tahun = $_POST['tahun'];
                        $bulantahun = $bulan.$tahun;
        }else{
            $bulan = date('m');
            $tahun = date('Y');
            $bulantahun = $bulan.$tahun;
        }

        $bulantahun = $bulan.$tahun;
        $data ['laporanKehadiran']  =   $this->db->query("SELECT * FROM data_kehadiran 
                                                            WHERE bulan = '$bulantahun'
                                                            ORDER BY nama_pegawai ASC")->result();

        $this->load->view('templates_admin/header', $data);
        $this->load->view('admin/cetakLaporanAbsensi', $data);
    }
}

?>