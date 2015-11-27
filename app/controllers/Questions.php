<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Questions extends CI_Publics
{
	function index()
	{
		$this->_render('public/question/index');
	}
}
