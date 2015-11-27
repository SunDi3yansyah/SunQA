<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Qa_libs
{
	function __construct()
	{
		$this->ci =& get_instance();
	}

    function user()
    {
		return $this->ci->qa_model->join_where('user', 'role', 'user.role_id=role.id_role', array('id_user' => $this->id_user()), 'user.id_user');
    }

	function destroy()
	{
		$this->ci->session->sess_destroy();
		$this->ci->session->sess_create();
	}

	function log_out()
	{
		$session = array('id_user', 'username', 'activated', 'email', 'role_id');
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

    function count_admin()
    {
    	$return = $this->ci->qa_model->count_where('user', array('role_id' => 1));
    	if ($return == 0) {
    		return 0;
    	} else {
    		return $return;
    	}    	
    }

    function count_user()
    {
    	$return = $this->ci->qa_model->count_where('user', array('role_id' => 2));
    	if ($return == 0) {
    		return 0;
    	} else {
    		return $return;
    	}    
    }

    function count_not_activated()
    {
    	$return = $this->ci->qa_model->count_where('user', array('activated' => 0));
    	if ($return == 0) {
    		return 0;
    	} else {
    		return $return;
    	}    
    }
}