<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * @package		Question Answer (https://github.com/SunDi3yansyah/FinalProjectPWL)
 * @author		Cahyadi Triyansyah (https://sundi3yansyah.com)
 * @version		1.0
 * @license		MIT
 * @copyright	Copyright (c) 2015 SunDi3yansyah
 */
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
