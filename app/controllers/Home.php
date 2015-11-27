<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Publics
{
	function index()
	{
		if ($this->qa_libs->logged_in()) {
			$this->_render('public/independent/home');
		} else {
			$this->_render('public/independent/home');
		}		
	}
}
