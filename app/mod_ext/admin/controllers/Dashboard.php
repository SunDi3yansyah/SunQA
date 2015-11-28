<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * @package		Question Answer (https://github.com/SunDi3yansyah/FinalProjectPWL)
 * @author		Cahyadi Triyansyah (https://sundi3yansyah.com)
 * @version		1.0
 * @license		MIT
 * @copyright	Copyright (c) 2015 SunDi3yansyah
 */
class Dashboard extends CI_Privates
{
	function index()
	{
		$data = array(
			'count_questions' => $this->qa_model->count('question'),
			'count_answers' => $this->qa_model->count('answer'),
			'count_users' => $this->qa_model->count('user'),
			'count_comments' => $this->qa_model->count('comment'),
			'count_category' => $this->qa_model->count('category'),
			'count_role' => $this->qa_model->count('role'),
			'count_session' => $this->qa_model->count('session'),
			'count_tag' => $this->qa_model->count('tag'),
			'count_vote' => $this->qa_model->count('vote'),
			'morrisjs' => TRUE,
            'dataTables' => TRUE,
            'dtFields' => array(
                'id',
                'ip_address',
                'timestamp',
                ),
            'param_ajax' => 'ajax_session',
			);
		$this->_render('dashboard/index', $data);
	}

	function ajax_session()
	{
        if (!$this->input->is_ajax_request()) {
            exit('No direct script access allowed');
        } else {
            $this->load->library('datatables');
            $this->datatables->from('session')
                             ->select('id, ip_address, timestamp')
                             ->add_column('action', '<a href="' . base_url(''.$this->uri->segment(1).'/'.$this->uri->segment(2).'/delete') . '/$1" class="btn btn-danger btn-sm">Delete</a>', 'id');
            echo $this->datatables->generate();
        }
	}
}