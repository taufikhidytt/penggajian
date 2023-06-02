<?php 

class PotonganGaji extends CI_Controller{

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
        $data ["title"] = "Potongan Gaji";
        $data ["potongan"] = $this->penggajianModel->get_data('potongan_gaji')->result();
        $this->load->view('templates_admin/header', $data);
        $this->load->view('templates_admin/sidebar');
        $this->load->view('admin/potonganGaji', $data);
        $this->load->view('templates_admin/footer');
    }

    public function tambahData(){

        $data ["title"] = "Tambah Potongan Gaji";
        $this->load->view('templates_admin/header', $data);
        $this->load->view('templates_admin/sidebar');
        $this->load->view('admin/tambahDataPotongan', $data);
        $this->load->view('templates_admin/footer');
    }

    public function tambahDataAksi(){
        $this->_rules();

        if($this->form_validation->run() == FALSE){
            $this->tambahData();
        }else{
            $potongan          =   $this->input->post('potongan');
            $jmlPotongan       =   $this->input->post('jml_potongan');

            $data = array(
                'potongan'     => $potongan,
                'jml_potongan' => $jmlPotongan
            );

            $this->penggajianModel->insert_data($data, 'potongan_gaji');

            $this->session->set_flashdata('pesan',
                '<div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>Selamatt!</strong> Anda Berhasil Menambahkan Data baru.
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>'
            );
            redirect('admin/potonganGaji');
        }
    }

    public function updateData($id){
        $data = array('id' => $id);
        $data ["title"] =  "Update Potongan Gaji";
        $data ["potongan"]  =  $this->db->query("SELECT * FROM potongan_gaji WHERE id = '$id'")->result();
        $this->load->view('templates_admin/header', $data);
        $this->load->view('templates_admin/sidebar');
        $this->load->view('admin/ubahDataPotongan', $data);
        $this->load->view('templates_admin/footer');
    }

    public function updateDataAksi(){
        $this->_rules();

        if($this->form_validation->run() == FALSE){
            $this->updateData();
        }else{
            $id  =  $this->input->post('id');
            $potongan = $this->input->post('potongan');
            $jmlPotongan = $this->input->post('jml_potongan');

            $data = array(
                'potongan'     => $potongan,
                'jml_potongan' => $jmlPotongan
            );

            $where = array(
                'id' => $id
            );

            $this->penggajianModel->update_data('potongan_gaji', $data, $where);

            $this->session->set_flashdata('pesan',
                '<div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>Selamatt!</strong> Anda Berhasil Mengupdate Data Ini.
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>'
            );
            redirect('admin/potonganGaji');
        }
    }

    public function _rules(){
        $this->form_validation->set_rules('potongan', 'potongan', 'required');
        $this->form_validation->set_rules('jml_potongan', 'jumlah potongan', 'required');
    }

    public function deleteData($id){
        $where = array(
            'id' => $id
        );
        $this->penggajianModel->deleteData($where, 'potongan_gaji');

        $this->session->set_flashdata('pesan',
            '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Selamatt!</strong> Anda Berhasil Menghapus Data Ini.
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>'
        );
        redirect('admin/potonganGaji');
    }
}

?>