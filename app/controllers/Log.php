<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * @package		Question Answer (https://github.com/SunDi3yansyah/FinalProjectPWL)
 * @author		Cahyadi Triyansyah (https://sundi3yansyah.com)
 * @version		1.0
 * @license		MIT
 * @copyright	Copyright (c) 2015 SunDi3yansyah
 */
class Log extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->model('qa_model_login');
	}

	function in()
	{
		if ($this->qa_libs->logged_in()) {
			show_404();
			return FALSE;
		} else {
			$this->form_validation->set_rules('username', 'Username', 'trim|required|min_length[3]|max_length[25]|xss_clean');
			$this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[6]|max_length[200]|xss_clean');
			$this->form_validation->set_error_delimiters('<p>', '</p>');
			if ($this->form_validation->run() == TRUE) {
				$check_username = $this->qa_model_login->login('user', array('username' => $this->input->post('username', TRUE)));
				if ($check_username == TRUE) {
					foreach ($check_username as $check_hash) {
						$check_password = $this->phpass->check_password($this->input->post('password', TRUE), $check_hash->password);
						if ($check_password == TRUE) {
							$looping_user = $this->qa_model_login->looping_login('user', array('username' => $check_hash->username), array('password' => $check_hash->password));
							foreach ($looping_user as $user) {
								if ($user->activated === STATUS_NOT_ACTIVATED) {
									$data = array(
										'error' => 'Status akun anda belum aktif, silakan periksa alamat email anda.'
										);
									$this->_render('public/auth/log_in', $data);
								} else {
									$this->session->set_userdata(array(
										'id_user'	=> $user->id_user,
										'username'	=> $user->username,
										'activated'	=> ($user->activated == 1) ? STATUS_ACTIVATED : STATUS_NOT_ACTIVATED,
										'email'		=> $user->email,
										'role_id'	=> $user->role_id,
									));
									$update = array(
										'last_login' => date('Y-m-d H:i:s'),
										'last_ip' => $this->input->ip_address(),
										);
									$this->qa_model->update('user', $update, array('id_user' => $user->id_user));
									redirect($this->session->userdata('current_url'));
								}
							}
						} else {
							$data = array(
								'error' => 'Password yang anda masukkan salah.'
								);
							$this->_render('public/auth/log_in', $data);
						}						
					}
				} else {
					$data = array(
						'error' => 'Username tidak ada dalam database.'
						);
					$this->_render('public/auth/log_in', $data);
				}
			} else {
				$this->_render('public/auth/log_in');
			}			
		}		
	}

	function out()
	{
		if ($this->qa_libs->logged_in()) {
			$this->qa_libs->log_out();
			redirect();
		} else {
			show_404();
			return FALSE;
		}		
	}

	function _render($content, $data=NULL)
	{
		$data['head'] = $this->load->view('public/must/head', $data, TRUE);
		$data['content'] = $this->load->view($content, $data, TRUE);
		$data['foot'] = $this->load->view('public/must/foot', $data, TRUE);
		$this->load->view('public/main', $data);
    }
}
