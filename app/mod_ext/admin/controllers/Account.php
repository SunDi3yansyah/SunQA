<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * @package		Question Answer (https://github.com/SunDi3yansyah/FinalProjectPWL)
 * @author		Cahyadi Triyansyah (https://sundi3yansyah.com)
 * @version		1.0
 * @license		MIT
 * @copyright	Copyright (c) 2015 SunDi3yansyah
 */

class Account extends CI_Privates
{
	function index()
	{
		$this->_render('account/index');
	}

    function settings($str = NULL)
    {
        if (!empty($str))
        {
            if ($str === 'unique')
            {
                $this->form_validation->set_rules('username', 'Username', 'trim|required|min_length[3]|max_length[25]|xss_clean');
                $this->form_validation->set_rules('email', 'E-Mail', 'trim|required|min_length[6]|max_length[100]|xss_clean|valid_email');
                $this->form_validation->set_error_delimiters('', '<br>');
                if ($this->form_validation->run() == TRUE)
                {
                    foreach ($this->qa_libs->user() as $user) {
                        $username = $this->qa_model->get('user', array('username' => $this->input->post('username', TRUE)));
                        $email = $this->qa_model->get('user', array('email' => $this->input->post('email', TRUE)));
                        if (strtolower($user->username) == strtolower($this->input->post('username', TRUE)) || strtolower($user->email) == strtolower($this->input->post('email', TRUE)))
                        {
                            $update = array(
                                'username' => $this->input->post('username', TRUE),
                                'email' => $this->input->post('email', TRUE),
                                );
                            $this->qa_model->update('user', $update, array('id_user' => $this->qa_libs->id_user()));
                            redirect($this->uri->segment(1) .'/'. $this->uri->segment(2));
                        }
                        elseif ($username != FALSE)
                        {
                            $data['errors'] = 'Error! Username <b>'. $this->input->post('username', TRUE) .'</b> sudah ada sebelumnya dalam basis data.';
                            $this->_render('account/unique', $data);
                        }
                        elseif ($email != FALSE)
                        {
                            $data['errors'] = 'Error! E-Mail <b>'. $this->input->post('email', TRUE) .'</b> sudah ada sebelumnya dalam basis data.';
                            $this->_render('account/unique', $data);
                        }
                    }
                }
                else
                {
                    $this->_render('account/unique');
                }
            }
            elseif ($str === 'passwd')
            {
                $this->form_validation->set_rules('old_passwd', 'Old Password', 'trim|required|min_length[6]|max_length[200]|xss_clean');
                $this->form_validation->set_rules('new_passwd', 'New Password', 'trim|required|min_length[6]|max_length[200]|xss_clean');
                $this->form_validation->set_rules('passwd_conf', 'Password Confirmation', 'trim|required|min_length[6]|max_length[200]|xss_clean|matches[new_passwd]');
                $this->form_validation->set_error_delimiters('', '<br>');
                if ($this->form_validation->run() == TRUE)
                {
                    foreach ($this->qa_libs->user() as $user)
                    {
                        $this->load->library('phpass');
                        $check_password = $this->phpass->check_password($this->input->post('old_passwd', TRUE), $user->password);
                        if ($check_password == TRUE)
                        {
                            if ($this->input->post('old_passwd', TRUE) === $this->input->post('passwd_conf', TRUE))
                            {
                                $data = array(
                                    'errors' => 'Password yang akan anda ganti tidak boleh sama dengan password sebelumnya.'
                                    );
                                $this->_render('account/passwd', $data);
                            }
                            else
                            {
                                $update = array(
                                    'password' => $this->phpass->hash_password($this->input->post('passwd_conf', TRUE)),
                                    );
                                $this->qa_model->update('user', $update, array('id_user' => $this->qa_libs->id_user()));
                                redirect($this->uri->segment(1) .'/'. $this->uri->segment(2));
                            }
                        } else {
                            $data = array(
                                'errors' => 'Password lama yang anda masukkan salah.'
                                );
                            $this->_render('account/passwd', $data);
                        }
                    }
                }
                else
                {
                    $this->_render('account/passwd');
                }
            }
            else
            {
                show_404();
                return FALSE;
            }
        } else {
            $data = array(
                'record' => $this->qa_libs->user(),
                'role' => $this->qa_model->all('role', 'id_role ASC'),
                'record_join' => $this->qa_model->join_where('user', 'role', 'user.role_id=role.id_role', array('user.id_user' => $this->qa_libs->id_user()), 'user.id_user'),
                );
            if (!empty($data['record']))
            {
                $this->form_validation->set_rules('nama', 'nama', 'trim|required|min_length[5]|max_length[100]|xss_clean');
                $this->form_validation->set_rules('activated', 'activated', 'trim|required|min_length[1]|max_length[4]|xss_clean');
                $this->form_validation->set_rules('web', 'web', 'trim|required|min_length[5]|max_length[50]|xss_clean');
                $this->form_validation->set_rules('lokasi', 'lokasi', 'trim|required|min_length[3]|max_length[50]|xss_clean');
                $this->form_validation->set_rules('role_id', 'role_id', 'trim|required|min_length[1]|max_length[11]|xss_clean');
                $this->form_validation->set_rules('bio', 'bio', 'trim|required|min_length[1]|max_length[500]|xss_clean');
                $this->form_validation->set_error_delimiters('', '<br>');
                if ($this->form_validation->run() == TRUE)
                {
                    $update = array(
                        'nama' => $this->input->post('nama', TRUE),
                        'activated' => $this->input->post('activated', TRUE),
                        'web' => qa_domain($this->input->post('web', TRUE)),
                        'lokasi' => $this->input->post('lokasi', TRUE),
                        'role_id' => $this->input->post('role_id', TRUE),
                        'bio' => $this->input->post('bio', TRUE),
                        );
                    $this->qa_model->update('user', $update, array('id_user' => $this->qa_libs->id_user()));
                    redirect($this->uri->segment(1) .'/'. $this->uri->segment(2));
                }
                else
                {
                    $this->_render('account/settings', $data);
                }
            }
            else
            {
                show_404();
                return FALSE;
            }
        }
    }

    function question()
    {
        // code
    }

    function answer()
    {
        // code
    }

    function comment()
    {
        // code
    }

    function vote()
    {
        // code
    }
}