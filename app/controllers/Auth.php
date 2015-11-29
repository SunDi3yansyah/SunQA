<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * @package		Question Answer (https://github.com/SunDi3yansyah/FinalProjectPWL)
 * @author		Cahyadi Triyansyah (https://sundi3yansyah.com)
 * @version		1.0
 * @license		MIT
 * @copyright	Copyright (c) 2015 SunDi3yansyah
 */
class Auth extends CI_Publics
{
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
					'password' => $this->phpass->hash_password($this->input->post('password', TRUE)),
					'nama' => $this->input->post('nama', TRUE),
					'user_date' => date('Y-m-d H:i:s'),
					'last_ip' => $this->input->ip_address(),
					);
				$this->qa_model->insert('user', $insert);
				$this->_render('public/auth/sign_up_success');
			}
			else
			{
				$this->_render('public/auth/sign_up');
			}
		}
	}

	function forgot()
	{
		$this->_render('public/auth/forgot');
	}

	function settings()
	{
		$this->_render('public/auth/settings');
	}

	function answer()
	{
		$this->_render('public/auth/answer');
	}

	function question()
	{
		$this->_render('public/auth/question');
	}

	function comment()
	{
		$this->_render('public/auth/comment');
	}

	function vote()
	{
		$this->_render('public/auth/vote');
	}
}
