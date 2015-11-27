<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Activities extends CI_Publics
{
	function index()
	{
		$this->_render('public/independent/activities');
	}
}
