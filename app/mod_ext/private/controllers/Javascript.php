<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * @package		Question Answer (https://github.com/SunDi3yansyah/FinalProjectPWL)
 * @author		Cahyadi Triyansyah (https://sundi3yansyah.com)
 * @version		1.0
 * @license		MIT
 * @copyright		Copyright (c) 2015 SunDi3yansyah
 */

class Javascript extends QA_Privates
{
	function jsmorris_data()
	{
        $this->output->set_content_type('application/x-javascript');
        $this->load->view('javascript/jsmorris-data');
	}
}