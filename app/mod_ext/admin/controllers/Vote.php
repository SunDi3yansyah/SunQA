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
        if (!$this->input->is_ajax_request())
        {
            exit('No direct script access allowed');
        }
        else
        {
            $table = 'pwl_vote';

            $primaryKey = 'id_vote';

            $columns = array(
                array('db' => 'id_vote', 'dt' => 'id_vote'),
                array('db' => 'username', 'dt' => 'username'),
                array('db' => 'vote_in', 'dt' => 'vote_in'),
                array(
                    'db' => 'id_vote',
                    'dt' => 'action',
                    'formatter' => function($id)
                    {
                        return '<a href="' . base_url(''.$this->uri->segment(1).'/'.$this->uri->segment(2).'/view/' . $id) . '" class="btn btn-info btn-sm">View</a> <a href="' . base_url(''.$this->uri->segment(1).'/'.$this->uri->segment(2).'/delete/' . $id) . '" class="btn btn-danger btn-sm">Delete</a>';
                    }
                ),
            );

            $joinQuery = "FROM `pwl_vote` JOIN `pwl_user` ON `pwl_vote`.`user_id`=`pwl_user`.`id_user`";

            $sql_details = array(
                'user' => $this->db->username,
                'pass' => $this->db->password,
                'db' => $this->db->database,
                'host' => $this->db->hostname
                );

            $this->output
                 ->set_content_type('application/json')
                 ->set_output(json_encode(Datatables_join::simple($_GET, $sql_details, $table, $primaryKey, $columns, $joinQuery), JSON_PRETTY_PRINT));
        }
	}

    function delete($str = NULL)
    {
        if (isset($str))
        {
            $data = $this->_get($str);
            if (!empty($data))
            {
                $this->qa_model->delete('vote', array('id_vote' => $str));
                redirect($this->uri->segment(1) .'/'. $this->uri->segment(2));
            }
            else
            {
                show_404();
                return FALSE;
            }
        }
        else
        {
            show_404();
            return FALSE;
        }
    }

    function _get($str)
    {
        $var = $this->qa_model->get('vote', array('id_vote' => $str));
        return ($var == FALSE)?array():$var;
    }
}