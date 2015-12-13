<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * @package		Question Answer (https://github.com/SunDi3yansyah/FinalProjectPWL)
 * @author		Cahyadi Triyansyah (https://sundi3yansyah.com)
 * @version		1.0
 * @license		MIT
 * @copyright	Copyright (c) 2015 SunDi3yansyah
 */

class Questions extends CI_Publics
{
	function index($str = NULL)
	{
		if (!empty($str)) {
			$data = array(
				'questions' => $this->qa_model->join2_ajax('question', 'user', 'category', 'question.user_id=user.id_user', 'question.category_id=category.id_category', 'question.id_question DESC', 5, $str),
				);
			if (!empty($data['questions']))
			{
				$this->load->view('questions/ajax', $data);
			}
			else
			{
				show_404();
				return FALSE;
			}
		} else {
			$data = array(
				'questions' => $this->qa_model->join2_ajax('question', 'user', 'category', 'question.user_id=user.id_user', 'question.category_id=category.id_category', 'question.id_question DESC', 5, 0),
				);
			if (!empty($data['questions']))
			{
				$this->_render('questions/index', $data);
			}
			else
			{
				show_404();
				return FALSE;
			}
		}
	}
}
