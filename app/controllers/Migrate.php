<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * @package     Question Answer (https://github.com/SunDi3yansyah/SunQA)
 * @author      Cahyadi Triyansyah (http://sundi3yansyah.com)
 * @version     Watch in Latest Tag
 * @license     MIT
 * @copyright   Copyright (c) 2015 SunDi3yansyah
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
			echo '<p>Successfully install schema database '.$this->config->item('web_name').'</p>
				  <code>This App Version : '.$this->migration->current().'</code>
				  <p><strong>First Account</strong></p>
				  <ul>
				  	<li>Username: '.get_current_user().'</li>
				  	<li>Password: '.get_current_user().'</li>
				  </ul>
				  ';
		}
	}
}