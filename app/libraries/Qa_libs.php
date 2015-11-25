<?php
defined('BASEPATH') OR exit('No direct script access allowed');

define('STATUS_ACTIVATED', '1');
define('STATUS_NOT_ACTIVATED', '0');

class Qa_libs
{
	function __construct()
	{
		$this->ci =& get_instance();
	}

	function destroy()
	{
		$this->ci->session->sess_destroy();
		$this->ci->session->sess_create();
	}

	function log_in()
	{
		$this->ci->session->set_userdata(array(
			'id_user'	=> $user->id_user,
			'username'	=> $user->username,
			'activated'	=> ($user->activated == 1) ? STATUS_ACTIVATED : STATUS_NOT_ACTIVATED,
			'email'		=> $user->email,
			'role_id'	=> $user->role_id,
		));
	}

	function log_out()
	{
		$this->delete_autologin();
		$session = array(
			'id_user'	=> '',
			'username'	=> '',
			'activated'	=> '',
			'email'		=> '',
			'role_id'	=> '',
			);
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
}