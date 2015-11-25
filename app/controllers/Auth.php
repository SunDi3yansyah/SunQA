<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Publics
{
	function sign_up()
	{
		$this->load->view('public/auth/sign_up');
	}
}
