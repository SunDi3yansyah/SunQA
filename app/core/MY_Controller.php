<?php
defined('BASEPATH') OR exit('No direct script access allowed');

define('STATUS_ACTIVATED', '1');
define('STATUS_NOT_ACTIVATED', '0');

class CI_Publics extends CI_Controller
{
	function __construct()
	{
		parent::__construct();

		$array = array(
			'current_url' => $this->uri->uri_string(),
		);		
		$this->session->set_userdata($array);
	}

	function _render($content, $data=NULL)
	{
		$data = array(
			'head'		=> $this->load->view('public/must/head', $data, TRUE),
			'content'	=> $this->load->view($content, $data, TRUE),
			'foot'		=> $this->load->view('public/must/foot', $data, TRUE),
			);
		$this->load->view('public/main', $data);
    }
}

class CI_Privates extends CI_Controller
{
	function __construct()
	{
		parent::__construct();

		if ($this->qa_libs->logged_in()) {
			if ($this->qa_libs->is_admin()) {
				return TRUE;
			} else {
				show_404();
				return FALSE;
			}
		} else {
			show_404();
			return FALSE;
		}
	}

	function _render($content, $data=NULL)
	{
		$data = array(
			'head'		=> $this->load->view('must/head', $data, TRUE),
			'content'	=> $this->load->view($content, $data, TRUE),
			'foot'		=> $this->load->view('must/foot', $data, TRUE),
			);
		$this->load->view('main', $data);
    }
}