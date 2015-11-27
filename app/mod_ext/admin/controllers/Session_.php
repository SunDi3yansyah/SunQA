<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * @package     Question Answer (https://github.com/SunDi3yansyah/FinalProjectPWL)
 * @author      Cahyadi Triyansyah (https://sundi3yansyah.com)
 * @version     1.0
 * @license     MIT
 * @copyright   Copyright (c) 2015 SunDi3yansyah
 */
class Session_ extends CI_Privates
{
	function index()
	{
        $data = array(
            'dataTables' => TRUE,
            'dtFields' => array(
                'id',
                'ip_address',
                'timestamp',
                'data',
                ),
            );
		$this->_render('session/index', $data);
	}

	function ajax()
	{
        if (!$this->input->is_ajax_request()) {
            exit('No direct script access allowed');
        } else {
            $this->load->library('datatables');
            $this->datatables->from('session')
                             ->select('id, ip_address, timestamp, data')
                             ->add_column('action', '<a href="' . base_url(''.$this->uri->segment(1).'/'.$this->uri->segment(2).'/delete') . '/$1" class="btn btn-danger btn-sm">Delete</a>', 'id');
            echo $this->datatables->generate();
        }
	}
}