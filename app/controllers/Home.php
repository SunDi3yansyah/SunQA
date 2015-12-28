<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * @package		Question Answer (https://github.com/SunDi3yansyah/FinalProjectPWL)
 * @author		Cahyadi Triyansyah (https://sundi3yansyah.com)
 * @version		1.0
 * @license		MIT
 * @copyright		Copyright (c) 2015 SunDi3yansyah
 */

class Home extends QA_Publics
{
	function index()
	{
		$data = array(
			'latest_question' => $this->_latest_question(),
			'question_tag' => $this->_question_tag(),
			);
		$this->_render('independent/home', $data);
	}

	function _latest_question()
	{
        $var = $this->qa_model->join2_ajax('question', 'user', 'category', 'question.user_id=user.id_user', 'question.category_id=category.id_category', 'question.id_question DESC', 5, 0);
        return ($var == FALSE)?array():$var;
	}

    function _question_tag()
    {
        $var = $this->qa_model->join2('question_tag', 'question', 'tag', 'question_tag.question_id=question.id_question', 'question_tag.tag_id=tag.id_tag', 'question_tag.id_qt');
        return ($var == FALSE)?array():$var;
    }
}
