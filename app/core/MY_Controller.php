<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * @package		Question Answer (https://github.com/SunDi3yansyah/FinalProjectPWL)
 * @author		Cahyadi Triyansyah (https://sundi3yansyah.com)
 * @version		1.0
 * @license		MIT
 * @copyright	Copyright (c) 2015 SunDi3yansyah
 */

define('STATUS_ACTIVATED', '1');
define('STATUS_NOT_ACTIVATED', '0');

class CI_Publics extends CI_Controller
{
	function __construct()
	{
		parent::__construct();

		$this->load->library('session');

		$array = array(
			'current_url' => $this->uri->uri_string(),
		);
		$this->session->set_userdata($array);
	}

	function _render($content, $data = NULL)
	{
		$data = array(
			'head'		=> $this->load->view('must/head', $data, TRUE),
			'content'	=> $this->load->view($content, $data, TRUE),
			'foot'		=> $this->load->view('must/foot', $data, TRUE),
			);
		$this->load->view('main', $data);
    }
	
	function _AlphaNumberSpace($str)
	{
		if (preg_match('/^[a-zA-Z0-9\s]+$/', $str))
		{
			return TRUE;
		}
		else
		{
			$this->form_validation->set_message('_AlphaNumberSpace', 'Error!');
			return FALSE;
		}
	}
}

class CI_Privates extends CI_Controller
{
	function __construct()
	{
		parent::__construct();

		define('DBPREFIX', !empty($this->db->dbprefix)?$this->db->dbprefix:'');

		$this->load->library('session');

		if ($this->qa_libs->logged_in())
		{
			if ($this->qa_libs->is_admin())
			{
				return TRUE;
			}
			else
			{
				show_404();
				return FALSE;
			}
		}
		else
		{
			show_404();
			return FALSE;
		}
	}

	function _render($content, $data = NULL)
	{
		$data = array(
			'head'		=> $this->load->view('must/head', $data, TRUE),
			'content'	=> $this->load->view($content, $data, TRUE),
			'foot'		=> $this->load->view('must/foot', $data, TRUE),
			);
		$this->load->view('main', $data);
    }
	
	function _AlphaNumberSpace($str)
	{
		if (preg_match('/^[a-zA-Z0-9\s]+$/', $str))
		{
			return TRUE;
		}
		else
		{
			$this->form_validation->set_message('_AlphaNumberSpace', 'Error!');
			return FALSE;
		}
	}

	function generator()
	{
		$count = 100;
		for ($i=0; $i < $count; $i++)
		{ 
			$insert = array(
				'user_id' => 1,
				'subject' => ''.$i.' Lorem ipsum dolor sit amet, consectetur adipisicing elit.',
				'category_id' => 1,
				'description_question' => ''.$i.'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.',
				'question_date' => date('Y-m-d H:i:s'),
				'question_update' => date('Y-m-d H:i:s'),

				);
			$insert['url_question'] = qa_url($i, $insert['subject']);
			$this->qa_model->insert('question', $insert);
		}
	}
}