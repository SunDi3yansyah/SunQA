<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Log_in extends CI_Publics
{
	function index()
	{
		$this->load->view('public/auth/log_in');
	}
}
