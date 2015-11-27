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
			);
		$this->_render('dashboard/index', $data);
	}
}