<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * @package     Question Answer (https://github.com/SunDi3yansyah/FinalProjectPWL)
 * @author      Cahyadi Triyansyah (https://sundi3yansyah.com)
 * @version     1.0
 * @license     MIT
 * @copyright   Copyright (c) 2015 SunDi3yansyah
 */
class Answer extends CI_Privates
{
	function index()
	{
        $data = array(
            'dataTables' => TRUE,
            'dtFields' => array(
                'id_answer',
                'username',
                'subject',
                'answer_date',
                ),
            );
		$this->_render('answer/index', $data);
	}

	function ajax()
	{
        if (!$this->input->is_ajax_request()) {
            exit('No direct script access allowed');
        } else {
            $this->load->library('datatables');
            $this->datatables->from('answer')
                             ->join('user', 'answer.user_id=user.id_user')
                             ->join('question', 'answer.question_id=question.id_question')
                             ->select('id_answer, username, subject, answer_date')
                             ->add_column('action', '<a href="' . base_url(''.$this->uri->segment(1).'/'.$this->uri->segment(2).'/view') . '/$1" class="btn btn-info btn-sm">View</a> <a href="' . base_url(''.$this->uri->segment(1).'/'.$this->uri->segment(2).'/update') . '/$1" class="btn btn-primary btn-sm">Update</a> <a href="' . base_url(''.$this->uri->segment(1).'/'.$this->uri->segment(2).'/delete') . '/$1" class="btn btn-danger btn-sm">Delete</a>', 'id_answer');
            echo $this->datatables->generate();
        }
	}
}