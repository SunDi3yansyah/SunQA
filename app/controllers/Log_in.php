<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Log_in extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
	}

	function index()
	{
		if ($this->qa_libs->logged_in()) {
			show_404();
			return FALSE;
		} else {
			$this->form_validation->set_rules('username', 'Username', 'trim|required|min_length[3]|max_length[25]');
			$this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[6]|max_length[200]');
			$this->form_validation->set_error_delimiters('<p>', '</p>');
			if ($this->form_validation->run() == TRUE) {
				$username = $this->input->post('username');
				$password = sha1($this->input->post('password'));
				$check = $this->qa_model->login('user', array('username' => $username), array('password' => $password));
				if ($check == TRUE) {
					$loop_user = $this->qa_model->looping_login('user', array('username' => $username), array('password' => $password));
					foreach ($loop_user as $user) {
						$this->session->set_userdata(array(
							'id_user'	=> $user->id_user,
							'username'	=> $user->username,
							'activated'	=> ($user->activated == 1) ? STATUS_ACTIVATED : STATUS_NOT_ACTIVATED,
							'email'		=> $user->email,
							'role_id'	=> $user->role_id,
						));
						redirect();
					}
				} else {
					$data = array(
						'error' => 'Gagal login, silakan ulang kembali.'
						);
					$this->load->view('public/auth/log_in', $data);
				}
			} else {
				$this->load->view('public/auth/log_in');
			}			
		}		
	}
}
