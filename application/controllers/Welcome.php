<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	public function index()
	{	
		$this->rules();

		if ($this->form_validation->run() == FALSE) {

			$data['title'] = "Sign In | AppPenggajian";
			$this->load->view('templates_admin/header', $data);
			$this->load->view('login');
		}else{
			$username = htmlspecialchars($this->input->post('username'));
			$password = $this->input->post('password');

			$cek = $this->penggajianModel->cek_login($username, $password);

			if ($cek == FALSE) {
				$this->session->set_flashdata('pesan', 
				'<div class="alert alert-danger alert-dismissible fade show" role="alert">
					<p style="font-size:12px;">
                    <strong>Akun Tidak Di Temukan</strong> Periksa Kembali Username Dan Password Anda.
					</p>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>');
				redirect('welcome');
			}else{
				$this->session->set_userdata('hak_akses', $cek->hak_akses);
				$this->session->set_userdata('nama_pegawai', $cek->nama_pegawai);
				$this->session->set_userdata('photo', $cek->photo);
				$this->session->set_userdata('id_pegawai', $cek->id_pegawai);
				$this->session->set_userdata('nik', $cek->nik);
				switch ($cek->hak_akses) {
					case 1 : redirect('admin/dashboard');
						break;
					case 2 : redirect('pegawai/dashboard');
						break;
					default:
						break;
				}
			}
		}
	}

	public function rules(){
		$this->form_validation->set_rules('username', 'username', 'required');
		$this->form_validation->set_rules('password', 'password', 'required');
	}

	public function logout(){
		$this->session->unset_userdata('hak_akses');
		$this->session->unset_userdata('nama_pegawai');
		$this->session->unset_userdata('photo');
		$this->session->set_flashdata('pesan',
			'<div class="alert alert-success alert-dismissible fade show" role="alert">
				<p style="font-size:12px;">
				<strong>Anda Berhasil Logout</strong> Semoga Hari Anda Menyenangkan.
				</p>
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>'
		);
		redirect('welcome');
	}
}
