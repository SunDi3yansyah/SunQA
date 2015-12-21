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
				'user' => $this->qa_model->join('user', 'role', 'user.role_id=role.id_role', 'user.id_user DESC'),
				);
			$this->_render('user/list', $data);
		}
	}

    function _get($str)
    {
        $var = $this->qa_model->join_where('user', 'role', 'user.role_id=role.id_role', array('username' => $str), 'user.id_user');
        return ($var == FALSE)?array():$var;
    }
}
