<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * @package     Question Answer (https://github.com/SunDi3yansyah/FinalProjectPWL)
 * @author      Cahyadi Triyansyah (https://sundi3yansyah.com)
 * @version     1.0
 * @license     MIT
 * @copyright   Copyright (c) 2015 SunDi3yansyah
 */
class User extends CI_Privates
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
                'lokasi',
                ),
            );
		$this->_render('user/index', $data);
	}

	function ajax()
	{
        if (!$this->input->is_ajax_request()) {
            exit('No direct script access allowed');
        } else {
            $this->load->library('datatables');
            $this->datatables->from('user')
                             ->join('role', 'user.role_id=role.id_role')
                             ->select('id_user, username, role_name, nama, email, lokasi')
                             ->add_column('action', '<a href="' . base_url(''.$this->uri->segment(1).'/'.$this->uri->segment(2).'/view') . '/$1" class="btn btn-info btn-sm">View</a> <a href="' . base_url(''.$this->uri->segment(1).'/'.$this->uri->segment(2).'/update') . '/$1" class="btn btn-primary btn-sm">Update</a> <a href="' . base_url(''.$this->uri->segment(1).'/'.$this->uri->segment(2).'/delete') . '/$1" class="btn btn-danger btn-sm">Delete</a>', 'id_user');
            echo $this->datatables->generate();
        }
	}

    function view($str=NULL)
    {
        if (isset($str)) {
            $data = array(
                'record' => $this->_get($str)
                );
            if (!empty($data['record'])) {
                foreach ($data['record'] as $get) {
                    redirect('user/' . $get->username);
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

    function update($str=NULL)
    {
        if (isset($str)) {
            $data = array(
                'record' => $this->_get($str),
                );
            if (!empty($data['record'])) {
                foreach ($data['record'] as $get) {                    
                    $this->form_validation->set_rules('nama', 'nama', 'trim|required|min_length[5]|max_length[100]|xss_clean');
                    $this->form_validation->set_rules('activated', 'activated', 'trim|required|min_length[1]|max_length[4]|xss_clean');
                    $this->form_validation->set_rules('web', 'web', 'trim|required|min_length[5]|max_length[50]|xss_clean');
                    $this->form_validation->set_rules('role_id', 'role_id', 'trim|required|min_length[1]|max_length[11]|xss_clean');
                    $this->form_validation->set_rules('bio', 'bio', 'trim|required|min_length[1]|max_length[500]|xss_clean');
                    $this->form_validation->set_error_delimiters('', '<br>');
                    if ($this->form_validation->run() == TRUE) {
                        $update = array(
                            'nama' => $this->input->post('nama'),
                            'activated' => $this->input->post('activated'),
                            'web' => $this->input->post('web'),
                            'role_id' => $this->input->post('role_id'),
                            'bio' => $this->input->post('bio'),
                            );
                        $this->qa_model->update('user', $update, array('id_user' => $str));
                        if ($get->activated != $update['activated'] || $get->role_id != $update['role_id']) {
                            $this->qa_libs->log_out();
                            redirect();
                        } else {
                            redirect($this->uri->segment(1) .'/'. $this->uri->segment(2));
                        }
                    } else {
                        $data['role'] = $this->qa_model->all('role', 'id_role ASC');
                        $data['record_join'] = $this->qa_model->join_where('user', 'role', 'user.role_id=role.id_role', array('user.id_user' => $str), 'user.id_user');
                        $this->_render('user/update', $data);
                    }
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

    function delete($str=NULL)
    {
        if (isset($str)) {
            $data = array(
                'record' => $this->_get($str)
                );
            if (!empty($data['record'])) {
                $this->qa_model->delete('user', array('id_user' => $str));
                redirect($this->uri->segment(1) .'/'. $this->uri->segment(2));
            } else {
                show_404();
                return FALSE;
            }
        } else {
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