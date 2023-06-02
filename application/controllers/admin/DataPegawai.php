<?php 

class DataPegawai extends CI_Controller{

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
        $data["title"] = "Data Pegawai";
        $data["pegawai"] = $this->penggajianModel->get_data('data_pegawai')->result();
        $this->load->view('templates_admin/header', $data);
        $this->load->view('templates_admin/sidebar');
        $this->load->view('admin/dataPegawai', $data);
        $this->load->view('templates_admin/footer');
    }

    public function tambahData(){
        $data["title"] = "Tambah Data Pegawai";
        $data["jabatan"] = $this->penggajianModel->get_data('data_jabatan')->result();
        $this->load->view('templates_admin/header', $data);
        $this->load->view('templates_admin/sidebar');
        $this->load->view('admin/tambahDataPegawai', $data);
        $this->load->view('templates_admin/footer');
    }

    public function tambahDataAksi(){
        $this->rules();

        if($this->form_validation->run() == FALSE){
            $this->tambahData();
        }else{
            $nik            = $this->input->post('nik');
            $namaPegawai    = $this->input->post('nama_pegawai');
            $jenisKelamin   = $this->input->post('jenis_kelamin');
            $jabatan        = $this->input->post('jabatan');
            $tanggalMasuk   = $this->input->post('tanggal_masuk');
            $status         = $this->input->post('status');
            $hak_akses      = $this->input->post('hak_akses');
            $username       = $this->input->post('username');
            $password       = md5($this->input->post('password'));
            $photo          = $_FILES['photo']['name'];

            if($photo=''){

            }else{
                $config ['upload_path']     =   './assets/photo';
                $config ['allowed_types']   =   'jpg|jpeg|png';
                $config ['encrypt_name']    =   'True';

                $this->load->library('upload', $config);

                if(!$this->upload->do_upload('photo')){
                    echo "Photo Gagal Di Upload";
                }else{
                    $photo = $this->upload->data('file_name');
                }
            }

            $data = array(
                'nik'           =>  $nik,
                'nama_pegawai'  =>  $namaPegawai,
                'jenis_kelamin' =>  $jenisKelamin,
                'jabatan'       =>  $jabatan,
                'tanggal_masuk' =>  $tanggalMasuk,
                'status'        =>  $status,
                'photo'         =>  $photo,
                'hak_akses'     =>  $hak_akses,
                'username'      =>  $username,
                'password'      =>  $password
            );

            $this->penggajianModel->insert_data($data, 'data_pegawai');
            $this->session->set_flashdata('pesan', 
                '<div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>Selamatt!</strong> Anda Berhasil Menambahkan Data baru.
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>'
            );
            redirect('admin/dataPegawai');
        }
    }

    public function updateData($id){
        $where = array('id_pegawai' => $id);
        $data["pegawai"] = $this->db->query("SELECT * FROM data_pegawai WHERE id_pegawai = '$id'")->result();
        $data["title"] = "Update Data Pegawai";
        $data["jabatan"] = $this->penggajianModel->get_data('data_jabatan')->result();
        $data['hak_akses'] = $this->db->query("SELECT * FROM hak_akses")->result();
        $this->load->view('templates_admin/header', $data);
        $this->load->view('templates_admin/sidebar');
        $this->load->view('admin/ubahDataPegawai', $data);
        $this->load->view('templates_admin/footer');
    }

    public function updateDataAksi(){
        $this->rules();

        if($this->form_validation->run() == FALSE){
            $this->updateData();
        }else{
            $id             = $this->input->post('id_pegawai');
            $nik            = $this->input->post('nik');
            $namaPegawai    = $this->input->post('nama_pegawai');
            $jenisKelamin   = $this->input->post('jenis_kelamin');
            $jabatan        = $this->input->post('jabatan');
            $tanggalMasuk   = $this->input->post('tanggal_masuk');
            $status         = $this->input->post('status');
            $photo          = $_FILES['photo']['name'];
            $hak_akses      = $this->input->post('hak_akses');
            $username       = $this->input->post('username');
            $password       = md5($this->input->post('password'));

            if($photo){
                $config ['upload_path']     =   './assets/photo';
                $config ['allowed_types']   =   'jpg|jpeg|png';

                $this->load->library('upload', $config);

                if($this->upload->do_upload('photo')){
                    $photo = $this->upload->data('file_name');
                    $this->db->set('photo', $photo);
                }else{
                    echo $this->upload->display_errors();
                }
            }

            $data = array(
                'nik'           =>  $nik,
                'nama_pegawai'  =>  $namaPegawai,
                'jenis_kelamin' =>  $jenisKelamin,
                'jabatan'       =>  $jabatan,
                'tanggal_masuk' =>  $tanggalMasuk,
                'status'        =>  $status,
                'hak_akses'     =>  $hak_akses,
                'username'      =>  $username,
                'password'      =>  $password
            );

            $where = array(
                'id_pegawai' => $id
            );

            $this->penggajianModel->update_data('data_pegawai', $data, $where);
            $this->session->set_flashdata('pesan', 
                '<div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>Selamatt!</strong> Anda Berhasil Mengupdate Data Ini.
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>'
            );
            redirect('admin/dataPegawai');
        }
    }

    public function rules(){
        $this->form_validation->set_rules('nik', 'nik', 'required');
        $this->form_validation->set_rules('nama_pegawai', 'nama pegawai', 'required');
        $this->form_validation->set_rules('jenis_kelamin', 'jenis kelamin', 'required');
        $this->form_validation->set_rules('jabatan', 'jabatan', 'required');
        $this->form_validation->set_rules('tanggal_masuk', 'tanggal masuk', 'required');
        $this->form_validation->set_rules('status', 'status', 'required');
        $this->form_validation->set_rules('hak_akses', 'hak akses', 'required');
        $this->form_validation->set_rules('username', 'username', 'required');
        $this->form_validation->set_rules('password', 'password', 'required');
    }

    public function deleteData($id){
        $where = array('id_pegawai' => $id);

        $this->penggajianModel->deleteData($where, 'data_pegawai');

        $this->session->set_flashdata('pesan', 
                '<div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>Selamatt!</strong> Anda Berhasil Menghapus Data Ini.
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>'
            );
            redirect('admin/dataPegawai');
    }
}


?>