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
}