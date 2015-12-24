<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * @package		Question Answer (https://github.com/SunDi3yansyah/FinalProjectPWL)
 * @author		Cahyadi Triyansyah (https://sundi3yansyah.com)
 * @version		1.0
 * @license		MIT
 * @copyright	Copyright (c) 2015 SunDi3yansyah
 */

class Migrate extends CI_Controller
{
	function install()
	{
		$this->load->library('migration');

		if ($this->migration->current() === FALSE)
		{
			show_error($this->migration->error_string());
		}
		else
		{
			echo '<h1>Successfully install schema database '.$this->config->item('web_name').'</h1><br>
				  <code>Version : '.$this->migration->current().'</code>';
		}
	}
}