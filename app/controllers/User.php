<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * @package		Question Answer (https://github.com/SunDi3yansyah/FinalProjectPWL)
 * @author		Cahyadi Triyansyah (https://sundi3yansyah.com)
 * @version		1.0
 * @license		MIT
 * @copyright	Copyright (c) 2015 SunDi3yansyah
 */

class User extends CI_Publics
{
	function index($str = NULL)
	{
		if (!empty($str))
		{
			if (!empty($this->_get($str)))
			{
				$data = array(
					'user' => $this->_get($str),
		            'question' => $this->_question($str),
		            'question_tag' => $this->_question_tag($str),
		            'answer' => $this->_answer($str),
		            'comment_question' => $this->_comment_question($str),
		            'comment_answer' => $this->_comment_answer($str),
		            'vote_question' => $this->_vote_question($str),
		            'vote_answer' => $this->_vote_answer($str),
					);
				$this->_render('user/get', $data);
			}
			else
			{
				show_404();
				return FALSE;
			}
		}
		else
		{
			$data = array(
				'user' => $this->qa_model->join('user', 'role', 'user.role_id=role.id_role', 'user.id_user ASC'),
				);
			$this->_render('user/list', $data);
		}
	}

    function _get($str)
    {
        $var = $this->qa_model->join_where('user', 'role', 'user.role_id=role.id_role', array('username' => $str), 'user.id_user');
        return ($var == FALSE)?array():$var;
    }

    function _question($str)
    {
        $var = $this->qa_model->join2_where('question', 'user', 'category', 'question.user_id=user.id_user', 'question.category_id=category.id_category', array('username' => $str), 'question.id_question DESC');
        return ($var == FALSE)?array():$var;
    }

    function _question_tag($str)
    {
        $var = $this->qa_model->join3_where('question_tag', 'question', 'tag', 'user', 'question_tag.question_id=question.id_question', 'question_tag.tag_id=tag.id_tag', 'question.user_id=user.id_user', array('username' => $str), 'question_tag.id_qt');
        return ($var == FALSE)?array():$var;
    }

    function _answer($str)
    {
    	$var = $this->qa_model->join3_where('answer', 'user', 'question', 'category', 'answer.user_id=user.id_user', 'answer.question_id=question.id_question', 'question.category_id=category.id_category', array('username' => $str), 'answer.id_answer DESC');
        return ($var == FALSE)?array():$var;
    }

    function _comment_question($str)
    {
    	$var = $this->qa_model->join2_where('comment', 'user', 'question', 'comment.user_id=user.id_user', 'comment.question_id=question.id_question', array('username' => $str), 'comment.id_comment DESC');
        return ($var == FALSE)?array():$var;
    }

    function _comment_answer($str)
    {
    	$var = $this->qa_model->join3_where('comment', 'user', 'answer', 'question', 'comment.user_id=user.id_user', 'comment.answer_id=answer.id_answer', 'answer.question_id=question.id_question', array('username' => $str), 'comment.id_comment DESC');
        return ($var == FALSE)?array():$var;
    }

    function _vote_question($str)
    {
    	$var = $this->qa_model->join2_where('vote', 'user', 'question', 'vote.user_id=user.id_user', 'vote.question_id=question.id_question', array('username' => $str), 'vote.id_vote DESC');
        return ($var == FALSE)?array():$var;
    }

    function _vote_answer($str)
    {
    	$var = $this->qa_model->join3_where('vote', 'user', 'answer', 'question', 'vote.user_id=user.id_user', 'vote.answer_id=answer.id_answer', 'answer.question_id=question.id_question', array('username' => $str), 'vote.id_vote DESC');
        return ($var == FALSE)?array():$var;
    }
}
