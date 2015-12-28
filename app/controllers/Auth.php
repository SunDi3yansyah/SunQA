<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * @package     Question Answer (https://github.com/SunDi3yansyah/SunQA)
 * @author      Cahyadi Triyansyah (https://sundi3yansyah.com)
 * @version     0.0.1
 * @license     MIT
 * @copyright   Copyright (c) 2015 SunDi3yansyah
 */

class Auth extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		
		$this->load->library('session');
	}

	function _render($content, $data = NULL)
	{
		$data['head'] = $this->load->view('must/head', $data, TRUE);
		$data['content'] = $this->load->view($content, $data, TRUE);
		$data['foot'] = $this->load->view('must/foot', $data, TRUE);
		$this->load->view('main', $data);
    }

	function sign_up()
	{
		if ($this->qa_libs->logged_in())
		{
			show_404();
			return FALSE;
		}
		else
		{
			$this->form_validation->set_rules('username', 'Username', 'trim|required|min_length[3]|max_length[25]|xss_clean|is_unique[user.username]');
			$this->form_validation->set_rules('email', 'E-Mail', 'trim|required|min_length[6]|max_length[100]|xss_clean|valid_email|is_unique[user.email]');
			$this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[6]|max_length[200]|xss_clean');
			$this->form_validation->set_rules('passconf', 'Password Confirmation', 'trim|required|min_length[6]|max_length[200]|xss_clean|matches[password]');
			$this->form_validation->set_rules('nama', 'Nama', 'trim|required|min_length[6]|max_length[100]|xss_clean');
			$this->form_validation->set_error_delimiters('<p>', '</p>');
			if ($this->form_validation->run() == TRUE)
			{
				$this->load->library('phpass');
				
				$insert = array(
					'username' => $this->input->post('username', TRUE),
					'email' => $this->input->post('email', TRUE),
					'password' => $this->phpass->hash_password($this->input->post('passconf', TRUE)),
					'nama' => $this->input->post('nama', TRUE),
					'user_date' => date('Y-m-d H:i:s'),
					'last_ip' => $this->input->ip_address(),
					'activated_hash' => sha1(microtime()),
					);
				$this->qa_model->insert('user', $insert);

				$data = array('messages' => 'Registrasi sukses, silakan periksa alamat email anda.');
				$this->_render('independent/messages', $data);

				$this->load->library('email');
				$this->email->from($this->config->item('webmaster_email'), $this->config->item('web_name'));
				$this->email->reply_to($this->config->item('webmaster_email'), $this->config->item('web_name'));
				$this->email->to($insert['email']);
				$this->email->subject('Activation - '.$this->config->item('web_name').'');
				$this->email->message('Untuk mengaktifkan akun anda silakan kunjungi alamat URL berikut '.base_url('auth/activated/'. $insert['activated_hash']).'');
				$this->email->send();
			}
			else
			{
				$this->_render('auth/sign_up');
			}
		}
	}

	function activated($str = NULL)
	{
		if (!empty($str)) {
			$checking = $this->qa_model->get('user', array('activated_hash' => $str));
			if ($checking != FALSE) {
				foreach ($checking as $user)
				{
					$update = array(
						'activated' => 1,
						'last_ip' => $this->input->ip_address(),
						'activated_hash' => NULL
						);
					$this->qa_model->update('user', $update, array('id_user' => $user->id_user));
					
					$data = array('messages' => 'Akun anda berhasil diaktifkan.');
					$this->_render('independent/messages', $data);
				}
			} else {
				show_404();
				return FALSE;
			}
		} else {
			show_404();
			return FALSE;
		}		
	}

	function forgot($str = NULL)
	{
		if ($this->qa_libs->logged_in())
		{
			show_404();
			return FALSE;
		}
		else
		{
			if (!empty($str))
			{
				$checking = $this->qa_model->get('user', array('lost_password' => $str));
				if ($checking != FALSE) {
					foreach ($checking as $user)
					{
						$this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[6]|max_length[200]|xss_clean');
						$this->form_validation->set_rules('passconf', 'Password Confirmation', 'trim|required|min_length[6]|max_length[200]|xss_clean|matches[password]');
						$this->form_validation->set_error_delimiters('<p>', '</p>');
						if ($this->form_validation->run() == TRUE)
						{
							$this->load->library('phpass');
							
							$update = array(
								'password' => $this->phpass->hash_password($this->input->post('passconf', TRUE)),
								'lost_password' => NULL,
								);
							$this->qa_model->update('user', $update, array('id_user' => $user->id_user));
							
							$data = array('messages' => 'Perubahan password sukses dilakukan, silakan masuk kembali dengan password baru anda.');
							$this->_render('independent/messages', $data);
						}
						else
						{
							$this->_render('auth/forgot_setup_password');
						}						
					}
				}
				else
				{
					show_404();
					return FALSE;
				}
			}
			else
			{
				$this->form_validation->set_rules('email', 'E-Mail', 'trim|required|min_length[6]|max_length[100]|xss_clean|valid_email');
				$this->form_validation->set_error_delimiters('<p>', '</p>');
				if ($this->form_validation->run() == TRUE)
				{
					$checking = $this->qa_model->get('user', array('email' => $this->input->post('email', TRUE)));
					if ($checking != FALSE)
					{
						foreach ($checking as $user)
						{
							$update = array(
								'lost_password' => sha1(microtime()),
								);
							$this->qa_model->update('user', $update, array('id_user' => $user->id_user));
							
							$data = array('messages' => 'Permintaan lupa password anda sukses, untuk melanjutkan silakan periksa alamat email anda.');
							$this->_render('independent/messages', $data);

							$this->load->library('email');
							$this->email->from($this->config->item('webmaster_email'), $this->config->item('web_name'));
							$this->email->reply_to($this->config->item('webmaster_email'), $this->config->item('web_name'));
							$this->email->to($update['email']);
							$this->email->subject('Activation - '.$this->config->item('web_name').'');
							$this->email->message('Untuk mengaktifkan akun anda silakan kunjungi alamat URL berikut '.base_url('auth/forgot/'. $update['lost_password']).'');
							$this->email->send();
						}
					}
					else
					{
						$data = array('errors' => '<p>E-Mail yang anda masukkan tidak ada dalam database kami.</p>');
						$this->_render('auth/forgot_request_password', $data);
					}
				}
				else
				{
					$this->_render('auth/forgot_request_password');
				}
			}
		}
	}

	function account()
	{
		if ($this->qa_libs->logged_in())
		{
			$this->_render('auth/account');
		}
		else
		{
			show_404();
			return FALSE;
		}		
	}

	function settings()
	{
		if ($this->qa_libs->logged_in())
		{
			$this->form_validation->set_rules('nama', 'Nama', 'trim|required|xss_clean');
			$this->form_validation->set_rules('bio', 'Bio', 'trim|required|xss_clean');
			$this->form_validation->set_rules('web', 'Web', 'trim|required|xss_clean');
			$this->form_validation->set_rules('lokasi', 'Lokasi', 'trim|required|xss_clean');
			$this->form_validation->set_error_delimiters('<p>', '</p>');
			if ($this->form_validation->run() == TRUE)
			{
				$update = array(
					'nama' => $this->input->post('nama'),
					'bio' => $this->input->post('bio'),
					'web' => $this->input->post('web'),
					'lokasi' => $this->input->post('lokasi'),
					);
				if (!empty($_FILES['userfile']['tmp_name']))
				{
				    $config_upload = array(
				        'upload_path'   => $this->config->item('pic_user'),
				        'allowed_types' => 'jpg|jpeg|png|gif',
				        'encrypt_name'  => TRUE,
				    );
				    $this->load->library('upload', $config_upload);
				    if (!$this->upload->do_upload()) {
				        $data['errors'] = $this->upload->display_errors('', '<br>');
				        $this->_render('auth/settings', $data);
				    } else {
				    	foreach ($this->qa_libs->user() as $user)
				    	{
							if (!empty($user->image))
							{
							    unlink($this->config->item('pic_user') . $user->image);
							}
				    	}
				        $update['image'] = $this->upload->data('file_name');
				        $this->qa_model->update('user', $update, array('id_user' => $this->qa_libs->id_user()));
				    }
				}
				else
				{
				    $this->qa_model->update('user', $update, array('id_user' => $this->qa_libs->id_user()));
				}
				redirect('auth/account');
			}
			else
			{
				$this->_render('auth/settings');
			}
		}
		else
		{
			show_404();
			return FALSE;
		}
	}
}
