<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * @package     Question Answer (https://github.com/SunDi3yansyah/SunQA)
 * @author      Cahyadi Triyansyah (http://sundi3yansyah.com)
 * @version     0.0.1
 * @license     MIT
 * @copyright   Copyright (c) 2015 SunDi3yansyah
 */
class User extends QA_Privates
{
	function index()
	{
        $data = array(
            'dataTables' => TRUE,
            'dtFields' => array(
                'id_user',
                'username',
                'role_name',
                'nama',
                'email',
                ),
            );
		$this->_render('user/index', $data);
	}

	function ajax()
	{
        if (!$this->input->is_ajax_request())
        {
            exit('No direct script access allowed');
        }
        else
        {
            $table = ''.DBPREFIX.'user';

            $primaryKey = 'id_user';

            $columns = array(
                array('db' => 'id_user', 'dt' => 'id_user'),
                array('db' => 'username', 'dt' => 'username'),
                array('db' => 'role_name', 'dt' => 'role_name'),
                array('db' => 'nama', 'dt' => 'nama'),
                array('db' => 'email', 'dt' => 'email'),
                array(
                    'db' => 'id_user',
                    'dt' => 'action',
                    'formatter' => function($id)
                    {
                        return '<a href="' . base_url(''.$this->uri->segment(1).'/'.$this->uri->segment(2).'/view/' . $id) . '" target="_blank" class="btn btn-info btn-xs">View</a> <a href="' . base_url(''.$this->uri->segment(1).'/'.$this->uri->segment(2).'/update/' . $id) . '" class="btn btn-primary btn-xs">Update</a> <a href="' . base_url(''.$this->uri->segment(1).'/'.$this->uri->segment(2).'/delete/' . $id) . '" class="btn btn-danger btn-xs">Delete</a>';
                    }
                ),
            );

            $joinQuery = "FROM `".DBPREFIX."user` JOIN `".DBPREFIX."role` ON `".DBPREFIX."user`.`role_id`=`".DBPREFIX."role`.`id_role`";

            $sql_details = array(
                'user' => $this->db->username,
                'pass' => $this->db->password,
                'db' => $this->db->database,
                'host' => $this->db->hostname
                );

            $this->output
                 ->set_content_type('application/json')
                 ->set_output(json_encode(Datatables_join::simple($_GET, $sql_details, $table, $primaryKey, $columns, $joinQuery), JSON_PRETTY_PRINT));
        }
	}

    function create()
    {
        $data = array(
            'role' => $this->qa_model->all('role', 'id_role ASC'),
            );
        $this->form_validation->set_rules('username', 'Username', 'trim|required|min_length[3]|max_length[25]|xss_clean|is_unique[user.username]');
        $this->form_validation->set_rules('role_id', 'role_id', 'trim|required|min_length[1]|max_length[11]|xss_clean');
        $this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[6]|max_length[200]|xss_clean');
        $this->form_validation->set_rules('email', 'E-mail', 'trim|required|min_length[6]|max_length[100]|xss_clean|valid_email|is_unique[user.email]');
        $this->form_validation->set_rules('nama', 'nama', 'trim|required|min_length[5]|max_length[100]|xss_clean');
        $this->form_validation->set_rules('activated', 'activated', 'trim|required|min_length[1]|max_length[4]|xss_clean');
        $this->form_validation->set_rules('web', 'web', 'trim|required|min_length[5]|max_length[50]|xss_clean');
        $this->form_validation->set_rules('lokasi', 'lokasi', 'trim|required|min_length[3]|max_length[50]|xss_clean');
        $this->form_validation->set_rules('bio', 'bio', 'trim|required|min_length[1]|max_length[500]|xss_clean');
        $this->form_validation->set_error_delimiters('', '<br>');
        if ($this->form_validation->run() == TRUE)
        {
            $this->load->library('phpass');
            $insert = array(
                'username' => $this->input->post('username', TRUE),
                'bio' => $this->input->post('bio', TRUE),
                'password' => $this->phpass->hash_password($this->input->post('password', TRUE)),
                'email' => $this->input->post('email', TRUE),
                'nama' => $this->input->post('nama', TRUE),
                'activated' => $this->input->post('activated', TRUE),
                'web' => qa_domain($this->input->post('web', TRUE)),
                'lokasi' => $this->input->post('lokasi', TRUE),
                'role_id' => $this->input->post('role_id', TRUE),
                'user_date' => date('Y-m-d H:i:s'),
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
                    $this->_render('user/create', $data);
                } else {
                    $insert['image'] = $this->upload->data('file_name');
                    $this->qa_model->insert('user', $insert);
                }
            }
            else
            {
                $this->qa_model->insert('user', $insert);
            }
            $this->load->library('email');
            $this->email->from($this->config->item('webmaster_email'), $this->config->item('web_name'));
            $this->email->reply_to($this->config->item('webmaster_email'), $this->config->item('web_name'));
            $this->email->to($insert['email']);
            $this->email->subject('Account on '.$this->config->item('web_name').'');
            $this->email->message('Akun anda berhasil dibuat, silakan masuk dengan data berikut <br>Username : '.$insert['username'].' <br>Password : '.$insert['password'].'');
            $this->email->send();
            redirect($this->uri->segment(1) .'/'. $this->uri->segment(2));
        }
        else
        {
            $this->_render('user/create', $data);
        }
    }

    function view($str = NULL)
    {
        if (isset($str))
        {
            $data = $this->_get($str);
            if (!empty($data))
            {
                foreach ($data as $get)
                {
                    redirect('user/' . $get->username);
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
            show_404();
            return FALSE;
        }
    }

    function update($str = NULL, $str2nd = NULL)
    {
        if (!empty($str))
        {
            $data = array(
                'record' => $this->_get($str),
                'role' => $this->qa_model->all('role', 'id_role ASC'),
                'record_join' => $this->qa_model->join_where('user', 'role', 'user.role_id=role.id_role', array('user.id_user' => $str), 'user.id_user'),
                );
            if (!empty($data['record']))
            {
                if (empty($str2nd))
                {
                    foreach ($data['record'] as $get)
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
                                    $this->_render('user/update', $data);
                                } else {
                                    if (!empty($get->image))
                                    {
                                        unlink($this->config->item('pic_user') . $get->image);
                                    }
                                    $update['image'] = $this->upload->data('file_name');
                                    $this->qa_model->update('user', $update, array('id_user' => $str));
                                }
                            }
                            else
                            {
                                $this->qa_model->update('user', $update, array('id_user' => $str));
                            }
                            if ($get->activated != $update['activated'] || $get->role_id != $update['role_id'])
                            {
                                $this->qa_libs->log_out();
                                redirect();
                            }
                            else
                            {
                                redirect($this->uri->segment(1) .'/'. $this->uri->segment(2));
                            }
                        }
                        else
                        {
                            $this->_render('user/update', $data);
                        }
                    }
                }
                else
                {
                    if ($str2nd === 'username')
                    {
                        $this->form_validation->set_rules('username', 'Username', 'trim|required|min_length[3]|max_length[25]|xss_clean');
                        $this->form_validation->set_error_delimiters('', '<br>');
                        if ($this->form_validation->run() == TRUE)
                        {
                            foreach ($this->_get($str) as $user)
                            {
                                $check_username = $this->qa_model->get('user', array('username' => $this->input->post('username', TRUE)));
                                if (strtolower($user->username) === strtolower($this->input->post('username', TRUE)))
                                {
                                    $update = array(
                                        'username' => $this->input->post('username', TRUE),
                                        );
                                    $this->qa_model->update('user', $update, array('id_user' => $str));
                                    redirect($this->uri->segment(1) .'/'. $this->uri->segment(2));
                                }
                                elseif ($check_username != FALSE)
                                {
                                    $data['errors'] = 'Error! Username <b>'. $this->input->post('username', TRUE) .'</b> sudah ada sebelumnya dalam basis data.';
                                    $this->_render('user/username', $data);
                                }
                                else
                                {
                                    $update = array(
                                        'username' => $this->input->post('username', TRUE),
                                        );
                                    $this->qa_model->update('user', $update, array('id_user' => $str));
                                    redirect($this->uri->segment(1) .'/'. $this->uri->segment(2));
                                }
                            }
                        }
                        else
                        {
                            $this->_render('user/username', $data);
                        }
                    }
                    elseif ($str2nd === 'email')
                    {
                        $this->form_validation->set_rules('email', 'E-Mail', 'trim|required|min_length[6]|max_length[100]|xss_clean|valid_email');
                        $this->form_validation->set_error_delimiters('', '<br>');
                        if ($this->form_validation->run() == TRUE)
                        {
                            foreach ($this->_get($str) as $user) {
                                $check_email = $this->qa_model->get('user', array('email' => $this->input->post('email', TRUE)));
                                if (strtolower($user->email) === strtolower($this->input->post('email', TRUE)))
                                {
                                    $update = array(
                                        'email' => $this->input->post('email', TRUE),
                                        );
                                    $this->qa_model->update('user', $update, array('id_user' => $str));
                                    redirect($this->uri->segment(1) .'/'. $this->uri->segment(2));
                                }
                                elseif ($check_email != FALSE)
                                {
                                    $data['errors'] = 'Error! E-mail <b>'. $this->input->post('email', TRUE) .'</b> sudah ada sebelumnya dalam basis data.';
                                    $this->_render('user/email', $data);
                                }
                                else
                                {
                                    $update = array(
                                        'email' => $this->input->post('email', TRUE),
                                        );
                                    $this->qa_model->update('user', $update, array('id_user' => $str));
                                    redirect($this->uri->segment(1) .'/'. $this->uri->segment(2));
                                }
                            }
                        }
                        else
                        {
                            $this->_render('user/email', $data);
                        }
                    }
                    elseif ($str2nd === 'passwd')
                    {
                        $this->form_validation->set_rules('old_passwd', 'Old Password', 'trim|required|min_length[6]|max_length[200]|xss_clean');
                        $this->form_validation->set_rules('new_passwd', 'New Password', 'trim|required|min_length[6]|max_length[200]|xss_clean');
                        $this->form_validation->set_rules('passwd_conf', 'Password Confirmation', 'trim|required|min_length[6]|max_length[200]|xss_clean|matches[new_passwd]');
                        $this->form_validation->set_error_delimiters('', '<br>');
                        if ($this->form_validation->run() == TRUE)
                        {
                            foreach ($this->_get($str) as $user)
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
                                        $this->_render('user/passwd', $data);
                                    }
                                    else
                                    {
                                        $update = array(
                                            'password' => $this->phpass->hash_password($this->input->post('passwd_conf', TRUE)),
                                            );
                                        $this->qa_model->update('user', $update, array('id_user' => $str));
                                        redirect($this->uri->segment(1) .'/'. $this->uri->segment(2));
                                    }
                                } else {
                                    $data = array(
                                        'errors' => 'Password lama yang anda masukkan salah.'
                                        );
                                    $this->_render('user/passwd', $data);
                                }
                            }
                        }
                        else
                        {
                            $this->_render('user/passwd', $data);
                        }
                    }
                    else
                    {
                        show_404();
                        return FALSE;
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
            show_404();
            return FALSE;
        }
    }

    function delete($str = NULL)
    {
        if (isset($str))
        {
            $data = $this->_get($str);
            if (!empty($data))
            {
                foreach ($data as $user) {
                    if ($user->id_user == 1)
                    {
                        $data = array('message' => 'User ID ke 1 tidak dapat dihapus');
                        $this->_render('dep/message', $data);
                    }
                    else
                    {
                        if (!empty($user->image))
                        {
                            unlink($this->config->item('pic_user') . $user->image);
                        }
                        $this->qa_model->delete('user', array('id_user' => $str));
                        redirect($this->uri->segment(1) .'/'. $this->uri->segment(2));
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
            show_404();
            return FALSE;
        }
    }

    function _get($str)
    {
        $var = $this->qa_model->get('user', array('id_user' => $str));
        return ($var == FALSE)?array():$var;
    }
}