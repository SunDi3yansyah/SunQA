<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Unanswered extends CI_Publics
{
	function index()
	{
		$this->load->view('public/activities');
	}
}