<?php 

class DataAbsensi extends CI_Controller{

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
        $data["title"] = "Data Absensi Pegawai";

        if((isset ($_GET['bulan']) && $_GET['bulan'] !='') && (isset ($_GET['tahun']) && $_GET ['tahun'] !='')){
                        $bulan = $_GET['bulan'];
                        $tahun = $_GET['tahun'];
                        $bulantahun = $bulan.$tahun;
        }else{
            $bulan = date('m');
            $tahun = date('Y');
            $bulantahun = $bulan.$tahun;
        }

        $data['absensi'] = $this->db->query("SELECT data_kehadiran.*, data_pegawai.nama_pegawai, data_pegawai.jenis_kelamin, 
            data_pegawai.jabatan
            FROM data_kehadiran
            INNER JOIN data_pegawai ON data_kehadiran.nik = data_pegawai.nik
            INNER JOIN data_jabatan ON data_pegawai.jabatan = data_jabatan.nama_jabatan
            WHERE data_kehadiran.bulan = '$bulantahun'
            ORDER BY data_pegawai.nama_pegawai ASC")->result();

        $this->load->view('templates_admin/header', $data);
        $this->load->view('templates_admin/sidebar');
        $this->load->view('admin/dataAbsensi', $data);
        $this->load->view('templates_admin/footer');
    }

    public function tambahDataAbsensi(){

        if($this->input->post('submit', TRUE) == 'submit'){
            
            $post = $this->input->post();

            foreach($post['bulan'] as $p => $value){

                if($post['bulan'][$p] != '' || $post['nik'][$p] != ''){

                    $simpan[] = array(
                        'bulan'         => $post['bulan'][$p],
                        'nik'           => $post['nik'][$p],
                        'nama_pegawai'  => $post['nama_pegawai'][$p],
                        'jenis_kelamin' => $post['jenis_kelamin'][$p],
                        'nama_jabatan'  => $post['nama_jabatan'][$p],
                        'hadir'         => $post['hadir'][$p],
                        'sakit'         => $post['sakit'][$p],
                        'alpha'         => $post['alpha'][$p],
                    );
                }
            }

            $this->penggajianModel->insert_batch('data_kehadiran', $simpan);
            $this->session->set_flashdata('pesan', 
                '<div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>Selamatt!</strong> Anda Berhasil Menambahkan Data baru.
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>'
            );
            redirect('admin/dataAbsensi');
        }

        $data["title"] = "Tambah Data Absensi Pegawai";

        if((isset ($_GET['bulan']) && $_GET['bulan'] !='') && (isset ($_GET['tahun']) && $_GET ['tahun'] !='')){
                        $bulan = $_GET['bulan'];
                        $tahun = $_GET['tahun'];
                        $bulantahun = $bulan.$tahun;
        }else{
            $bulan = date('m');
            $tahun = date('Y');
            $bulantahun = $bulan.$tahun;
        }

        $data["inputAbsensi"] = $this->db->query("SELECT data_pegawai.*, data_jabatan.nama_jabatan FROM data_pegawai
                                        INNER JOIN data_jabatan ON data_pegawai.jabatan = data_jabatan.nama_jabatan
                                        WHERE NOT EXISTS 
                                        (SELECT * FROM data_kehadiran WHERE bulan = '$bulantahun' AND data_pegawai.nik = data_kehadiran.nik)
                                        ORDER BY data_pegawai.nama_pegawai ASC")->result();
        $this->load->view('templates_admin/header', $data);
        $this->load->view('templates_admin/sidebar');
        $this->load->view('admin/tambahDataAbsensi', $data);
        $this->load->view('templates_admin/footer');
    }

    public function ubahData($id){
        $data ["title"] = "Update Data Absensi";
        $where = array('id_kehadiran'  => $id);
        $data['absensi'] = $this->db->query("SELECT data_kehadiran.*, data_pegawai.nama_pegawai, data_pegawai.jenis_kelamin, 
            data_pegawai.jabatan
            FROM data_kehadiran
            INNER JOIN data_pegawai ON data_kehadiran.nik = data_pegawai.nik
            INNER JOIN data_jabatan ON data_pegawai.jabatan = data_jabatan.nama_jabatan
            WHERE id_kehadiran = '$id'")->result();
        $this->load->view('templates_admin/header', $data);
        $this->load->view('templates_admin/sidebar');
        $this->load->view('admin/ubahDataAbsensi', $data);
        $this->load->view('templates_admin/footer');
    }

    // public function ubahDataAksi(){
    //     $this->_rules();

    //     if($this->form_validation->run() == FALSE){
    //         $this->ubahData();
    //     }
    // }

    public function _rules(){
        $this->form_validation->set_rules('hadir', 'hadir', 'required');
        $this->form_validation->set_rules('sakit', 'sakit', 'required');
        $this->form_validation->set_rules('alpha', 'alpha', 'required');
    }
}

?>