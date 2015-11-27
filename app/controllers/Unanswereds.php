<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Unanswereds extends CI_Publics
{
	function index()
	{
		$this->_render('public/independent/unanswered');
	}
}
