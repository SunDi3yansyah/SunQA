<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * @package     Question Answer (https://github.com/SunDi3yansyah/FinalProjectPWL)
 * @author      Cahyadi Triyansyah (https://sundi3yansyah.com)
 * @version     1.0
 * @license     MIT
 * @copyright   Copyright (c) 2015 SunDi3yansyah
 */
class Comment extends CI_Privates
{
	function index()
	{
        $data = array(
            'dataTables' => TRUE,
            'dtFields' => array(
                'id_comment',
                'username',
                'comment_in',
                'comment_date',
                ),
            );
		$this->_render('comment/index', $data);
	}

	function ajax()
	{
        if (!$this->input->is_ajax_request())
        {
            exit('No direct script access allowed');
        }
        else
        {
            $table = ''.DBPREFIX.'comment';

            $primaryKey = 'id_comment';

            $columns = array(
                array('db' => 'id_comment', 'dt' => 'id_comment'),
                array('db' => 'username', 'dt' => 'username'),
                array('db' => 'comment_in', 'dt' => 'comment_in'),
                array(
                    'db' => 'comment_date',
                    'dt' => 'comment_date',
                    'formatter' => function($date)
                    {
                        return dateHourIconPrivate($date);
                    }
                ),
                array(
                    'db' => 'id_comment',
                    'dt' => 'action',
                    'formatter' => function($id)
                    {
                        return '<a href="' . base_url(''.$this->uri->segment(1).'/'.$this->uri->segment(2).'/view/' . $id) . '" target="_blank" class="btn btn-info btn-xs">View</a> <a href="' . base_url(''.$this->uri->segment(1).'/'.$this->uri->segment(2).'/update/' . $id) . '" class="btn btn-primary btn-xs">Update</a> <a href="' . base_url(''.$this->uri->segment(1).'/'.$this->uri->segment(2).'/delete/' . $id) . '" class="btn btn-danger btn-xs">Delete</a>';
                    }
                ),
            );

            $joinQuery = "FROM `".DBPREFIX."comment` JOIN `".DBPREFIX."user` ON `".DBPREFIX."comment`.`user_id`=`".DBPREFIX."user`.`id_user`";

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

    function view($str = NULL)
    {
        if (isset($str))
        {
            $data = array(
                'record' => $this->_get($str)
                );
            if (!empty($data['record']))
            {
                foreach ($data['record'] as $get)
                {
                    if ($get->comment_in == 'Question')
                    {
                        $data['record_join'] = $this->qa_model->join2_where('comment', 'user', 'question', 'comment.user_id=user.id_user', 'comment.question_id=question.id_question', array('comment.id_comment' => $str), 'comment.id_comment');
                        foreach ($data['record_join'] as $row)
                        {
                            redirect('question/' . $row->url_question . '#comment-' . $row->id_comment);
                        }
                    }
                    else
                    {
                        $data['record_join'] = $this->qa_model->join3_where('comment', 'user', 'answer', 'question', 'comment.user_id=user.id_user', 'comment.answer_id=answer.id_answer', 'answer.question_id=question.id_question', array('comment.id_comment' => $str), 'comment.id_comment');
                        foreach ($data['record_join'] as $row)
                        {
                            redirect('question/' . $row->url_question . '#comment-' . $row->id_comment);
                        }
                    }
                }
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

    function update($str = NULL)
    {
        if (isset($str))
        {
            $data = array(
                'record' => $this->_get($str),
                );
            if (!empty($data['record']))
            {
                $this->form_validation->set_rules('description_comment', 'Description', 'trim|required|min_length[25]|max_length[5000]|xss_clean');
                $this->form_validation->set_error_delimiters('', '<br>');
                if ($this->form_validation->run() == TRUE)
                {
                    $update = array(
                        'description_comment' => $this->input->post('description_comment', TRUE),
                        );
                    $this->qa_model->update('comment', $update, array('id_comment' => $str));
                    redirect($this->uri->segment(1) .'/'. $this->uri->segment(2));
                }
                else
                {
                    foreach ($data['record'] as $get)
                    {
                        if ($get->comment_in === 'Question')
                        {
                            $data['record_join'] = $this->qa_model->join2_where('comment', 'user', 'question', 'comment.user_id=user.id_user', 'comment.question_id=question.id_question', array('comment.id_comment' => $str), 'comment.id_comment');
                            $this->_render('comment/update', $data);
                        }
                        else
                        {
                            $data['record_join'] = $this->qa_model->join3_where('comment', 'user', 'answer', 'question', 'comment.user_id=user.id_user', 'comment.answer_id=answer.id_answer', 'answer.question_id=question.id_question', array('comment.id_comment' => $str), 'comment.id_comment');
                            $this->_render('comment/update', $data);
                        }
                    }
                }
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

    function delete($str = NULL)
    {
        if (isset($str))
        {
            $data = $this->_get($str);
            if (!empty($data))
            {
                $this->qa_model->delete('comment', array('id_comment' => $str));
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
        $var = $this->qa_model->get('comment', array('id_comment' => $str));
        return ($var == FALSE)?array():$var;
    }
}