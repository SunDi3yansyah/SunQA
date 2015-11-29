<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * @package		Question Answer (https://github.com/SunDi3yansyah/FinalProjectPWL)
 * @author		Cahyadi Triyansyah (https://sundi3yansyah.com)
 * @version		1.0
 * @license		MIT
 * @copyright	Copyright (c) 2015 SunDi3yansyah
 */
class Home extends CI_Publics
{
	function index()
	{
		if ($this->qa_libs->logged_in())
		{
			$this->_render('public/independent/home');
		}
		else
		{
			$this->_render('public/independent/home');
		}		
	}
}
