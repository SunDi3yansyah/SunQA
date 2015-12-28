<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * @package     Question Answer (https://github.com/SunDi3yansyah/SunQA)
 * @author      Cahyadi Triyansyah (https://sundi3yansyah.com)
 * @version     0.0.1
 * @license     MIT
 * @copyright   Copyright (c) 2015 SunDi3yansyah
 */
class Vote extends QA_Privates
{
	function index()
	{
        $data = array(
            'dataTables' => TRUE,
            'dtFields' => array(
                'id_vote',
                'username',
                'vote_in',
                'vote_for',
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
            $table = ''.DBPREFIX.'vote';

            $primaryKey = 'id_vote';

            $columns = array(
                array('db' => 'id_vote', 'dt' => 'id_vote'),
                array('db' => 'username', 'dt' => 'username'),
                array('db' => 'vote_in', 'dt' => 'vote_in'),
                array(
                    'db' => 'vote_for',
                    'dt' => 'vote_for',
                    'formatter' => function($vote)
                    {
                        if ($vote === 'Up')
                        {
                            return '<i class="fa fa-thumbs-o-up"></i>';
                        }
                        else
                        {
                            return '<i class="fa fa-thumbs-o-down"></i>';
                        }
                    }
                ),
                array(
                    'db' => 'id_vote',
                    'dt' => 'action',
                    'formatter' => function($id)
                    {
                        return '<a href="' . base_url(''.$this->uri->segment(1).'/'.$this->uri->segment(2).'/delete/' . $id) . '" class="btn btn-danger btn-xs">Delete</a>';
                    }
                ),
            );

            $joinQuery = "FROM `".DBPREFIX."vote` JOIN `".DBPREFIX."user` ON `".DBPREFIX."vote`.`user_id`=`".DBPREFIX."user`.`id_user`";

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