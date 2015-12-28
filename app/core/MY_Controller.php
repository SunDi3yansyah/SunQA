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

		$sess = array(
			'current_url' => $this->uri->uri_string(),
			'platform' => $this->agent->platform(),
			);
		if (!empty($this->agent->is_browser()))
		{
			$sess['browser'] = $this->agent->browser();
		}
		if (!empty($this->agent->is_mobile()))
		{
			$sess['mobile'] = $this->agent->mobile();
		}
		if (!empty($this->agent->is_robot()))
		{
			$sess['robot'] = $this->agent->robot();
		}
		$this->session->set_userdata($sess);
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
}