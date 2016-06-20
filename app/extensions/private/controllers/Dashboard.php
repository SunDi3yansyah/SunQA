<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * @package     Question Answer (https://github.com/SunDi3yansyah/SunQA)
 * @author      Cahyadi Triyansyah (http://sundi3yansyah.com)
 * @version     Watch in Latest Tag
 * @license     MIT
 * @copyright   Copyright (c) 2015 SunDi3yansyah
 */

class Dashboard extends QA_Privates
{
	function index()
	{
		$data = array(
			'count_questions' => $this->qa_model->count('question'),
			'count_answers' => $this->qa_model->count('answer'),
			'count_users' => $this->qa_model->count('user'),
			'count_comments' => $this->qa_model->count('comment'),
			'count_categories' => $this->qa_model->count('category'),
            'count_tags' => $this->qa_model->count('tag'),
            'count_votes' => $this->qa_model->count('vote'),
			'count_sessions' => $this->qa_model->count('session'),
			'morrisjs' => TRUE,
            'dataTables' => TRUE,
            'dtFields' => array(
                'id',
                'ip_address',
                'timestamp',
                ),
            'param_ajax' => 'sessions_ajax',
			);
		$this->_render('dashboard/index', $data);
	}

	function sessions_ajax()
	{
        if (!$this->input->is_ajax_request())
        {
            exit('No direct script access allowed');
        }
        else
        {
            $table = ''.DBPREFIX.'session';

            $primaryKey = 'id';

            $columns = array(
                array('db' => 'id', 'dt' => 'id'),
                array('db' => 'ip_address', 'dt' => 'ip_address'),
                array(
                    'db' => 'timestamp',
                    'dt' => 'timestamp',
                    'formatter' => function($str)
                    {
                        return dateHourIconPrivate(date('Y-m-d H:i:s', $str));
                    }
                ),
                array(
                    'db' => 'id',
                    'dt' => 'action',
                    'formatter' => function($id)
                    {
                        return '<a href="' . base_url(''.$this->uri->segment(1).'/sessions/delete/' . $id) . '" class="btn btn-danger btn-xs">Delete</a>';
                    }
                ),
            );

            $sql_details = array(
                'user' => $this->db->username,
                'pass' => $this->db->password,
                'db' => $this->db->database,
                'host' => $this->db->hostname
                );

            $this->output
                 ->set_content_type('application/json')
                 ->set_output(json_encode(Datatables::simple($_GET, $sql_details, $table, $primaryKey, $columns), JSON_PRETTY_PRINT));
        }
	}
}