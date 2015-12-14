<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * @package     Question Answer (https://github.com/SunDi3yansyah/FinalProjectPWL)
 * @author      Cahyadi Triyansyah (https://sundi3yansyah.com)
 * @version     1.0
 * @license     MIT
 * @copyright   Copyright (c) 2015 SunDi3yansyah
 */
class Qa_libs
{
	function __construct()
	{
		$this->ci =& get_instance();
	}

    function user()
    {
		return $this->ci->qa_model->join_where('user', 'role', 'user.role_id=role.id_role', array('id_user' => $this->id_user()), 'user.id_user');
    }

	function log_out()
	{
		$session = array('id_user', 'username', 'activated', 'email', 'role_id');
		return $this->ci->session->unset_userdata($session);
	}

	function logged_in($activated = TRUE)
	{
		return $this->ci->session->userdata('activated') === ($activated ? STATUS_ACTIVATED : STATUS_NOT_ACTIVATED);
	}

	function id_user()
	{
		return $this->ci->session->userdata('id_user');
	}

	function username()
	{
		return $this->ci->session->userdata('username');
	}

    function is_admin()
    {
		return $this->ci->session->userdata('role_id') === '1';
    }

    function is_user()
    {
		return $this->ci->session->userdata('role_id') === '2';
    }

    function count_admin()
    {
    	$return = $this->ci->qa_model->count_where('user', array('role_id' => 1));
    	if ($return == 0)
        {
    		return 0;
    	}
        else
        {
    		return $return;
    	}    	
    }

    function count_user()
    {
    	$return = $this->ci->qa_model->count_where2('user', array('activated' => STATUS_ACTIVATED), array('role_id' => 2));
    	if ($return == 0)
        {
    		return 0;
    	}
        else
        {
    		return $return;
    	}    
    }

    function count_not_activated()
    {
    	$return = $this->ci->qa_model->count_where('user', array('activated' => 0));
    	if ($return == 0)
        {
    		return 0;
    	}
        else
        {
    		return $return;
    	}    
    }

    function comment_in_answer($param)
    {
        $data = $this->ci->qa_model->join2_where('comment', 'user', 'answer', 'comment.user_id=user.id_user', 'comment.answer_id=answer.id_answer', array('comment.answer_id' => $param), 'comment.id_comment');
        if ($data != FALSE)
        {
            return $data;
        }
        else
        {
            return array();
        }        
    }

    function last_question()
    {
        foreach ($this->ci->qa_model->firt_or_last('question', 'id_question DESC') as $q)
        {
            return $q->id_question + 1;
        }
    }
}