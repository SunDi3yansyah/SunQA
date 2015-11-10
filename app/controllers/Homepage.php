<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Homepage extends CI_Controller
{
	function index()
	{
		$this->load->view('homepage');
	}
}
