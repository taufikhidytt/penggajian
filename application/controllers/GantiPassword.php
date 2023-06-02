<?php 

class GantiPassword extends CI_Controller{

    public function index(){
        $data['title'] = "Ubah Password";
        $this->load->view('templates_admin/header', $data);
        $this->load->view('templates_admin/sidebar');
        $this->load->view('gantiPassword', $data);
        $this->load->view('templates_admin/footer');
    }

    public function gantiPasswordAksi(){
        $password_baru = $this->input->post('password_baru');
        $password_baru2 = $this->input->post('password_baru2');

        $this->form_validation->set_rules('password_baru', 'password baru', 'required|matches[password_baru2]');
        $this->form_validation->set_rules('password_baru2', 'konfirmasi password baru', 'required');

        if ($this->form_validation->run() != FALSE) {

            $data = array(
                'password' => md5($password_baru)
            );

            $id = array(
                'id_pegawai' => $this->session->userdata('id_pegawai')
            );

            $this->penggajianModel->update_data('data_pegawai', $data, $id);
            $this->session->set_flashdata('pesan',
                '<div class="alert alert-success alert-dismissible fade show" role="alert">
					<p style="font-size:12px;">
                    <strong>Anda Berhasil Mengubah Password!!</strong> Silahkan Login Kembali.
					</p>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>'
            );
            redirect('welcome');
        }else{
            $this->index();
        }
    }
}

?>