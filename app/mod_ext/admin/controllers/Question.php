<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * @package     Question Answer (https://github.com/SunDi3yansyah/FinalProjectPWL)
 * @author      Cahyadi Triyansyah (https://sundi3yansyah.com)
 * @version     1.0
 * @license     MIT
 * @copyright   Copyright (c) 2015 SunDi3yansyah
 */
class Question extends CI_Privates
{
	function index()
	{
        $data = array(
            'dataTables' => TRUE,
            'dtFields' => array(
                'id_question',
                'username',
                'subject',
                'category_name',
                'answer_id',
                'question_date',
                ),
            );
		$this->_render('question/index', $data);
	}

    function ajax()
    {
        if (!$this->input->is_ajax_request()) {
            exit('No direct script access allowed');
        } else {
            $this->load->library('datatables');
            $this->datatables->from('question')
                             ->join('user', 'question.user_id=user.id_user')
                             ->join('category', 'question.category_id=category.id_category')
                             ->select('id_question, username, subject, category_name, answer_id, question_date')
                             ->add_column('action', '<a href="' . base_url(''.$this->uri->segment(1).'/'.$this->uri->segment(2).'/view') . '/$1" class="btn btn-info btn-sm">View</a> <a href="' . base_url(''.$this->uri->segment(1).'/'.$this->uri->segment(2).'/update') . '/$1" class="btn btn-primary btn-sm">Update</a> <a href="' . base_url(''.$this->uri->segment(1).'/'.$this->uri->segment(2).'/delete') . '/$1" class="btn btn-danger btn-sm">Delete</a>', 'id_question');
            echo $this->datatables->generate();
        }
    }
}