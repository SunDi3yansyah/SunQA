<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Question extends CI_Publics
{
	function index($str=NULL, $answer=NULL)
	{
		$this->_render('public/question/talk');
	}

	function create()
	{
		if ($this->qa_libs->logged_in()) {
			$this->_render('public/question/create');
		} else {
			# code...
		}		
	}
}
