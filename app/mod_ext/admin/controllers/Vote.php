<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * @package     Question Answer (https://github.com/SunDi3yansyah/FinalProjectPWL)
 * @author      Cahyadi Triyansyah (https://sundi3yansyah.com)
 * @version     1.0
 * @license     MIT
 * @copyright   Copyright (c) 2015 SunDi3yansyah
 */
class Vote extends CI_Privates
{
	function index()
	{
        $data = array(
            'dataTables' => TRUE,
            'dtFields' => array(
                'id_vote',
                'username',
                'vote_in',
                ),
            );
		$this->_render('vote/index', $data);
	}

	function ajax()
	{
        if (!$this->input->is_ajax_request()) {
            exit('No direct script access allowed');
        } else {
            $this->load->library('datatables');
            $this->datatables->from('vote')
                             ->join('user', 'vote.user_id=user.id_user')
                             ->select('id_vote, username, vote_in')
                             ->add_column('action', '<a href="' . base_url(''.$this->uri->segment(1).'/'.$this->uri->segment(2).'/view') . '/$1" class="btn btn-info btn-sm">View</a> <a href="' . base_url(''.$this->uri->segment(1).'/'.$this->uri->segment(2).'/update') . '/$1" class="btn btn-primary btn-sm">Update</a> <a href="' . base_url(''.$this->uri->segment(1).'/'.$this->uri->segment(2).'/delete') . '/$1" class="btn btn-danger btn-sm">Delete</a>', 'id_vote');
            echo $this->datatables->generate();
        }
	}
}