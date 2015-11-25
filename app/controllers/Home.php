<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Publics
{
	function index()
	{
		$this->load->view('public/independent/home');
	}
}
