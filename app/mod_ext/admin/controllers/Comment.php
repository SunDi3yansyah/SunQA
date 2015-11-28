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
        if (!$this->input->is_ajax_request()) {
            exit('No direct script access allowed');
        } else {
            $this->load->library('datatables');
            $this->datatables->from('comment')
                             ->join('user', 'comment.user_id=user.id_user')
                             ->select('id_comment, username, comment_in, comment_date')
                             ->add_column('action', '<a href="' . base_url(''.$this->uri->segment(1).'/'.$this->uri->segment(2).'/view') . '/$1" class="btn btn-info btn-sm">View</a> <a href="' . base_url(''.$this->uri->segment(1).'/'.$this->uri->segment(2).'/update') . '/$1" class="btn btn-primary btn-sm">Update</a> <a href="' . base_url(''.$this->uri->segment(1).'/'.$this->uri->segment(2).'/delete') . '/$1" class="btn btn-danger btn-sm">Delete</a>', 'id_comment');
            echo $this->datatables->generate();
        }
	}

    function view($str=NULL)
    {
        if (isset($str)) {
            $data = array(
                'record' => $this->_get($str)
                );
            if (!empty($data['record'])) {
                foreach ($data['record'] as $get) {
                    if ($get->comment_in == 'Question') {
                        $data['record_Question'] = $this->qa_model->join2_where('comment', 'user', 'question', 'comment.user_id=user.id_user', 'comment.question_id=question.id_question', array('comment.id_comment' => $get->id_comment), 'comment.id_comment');
                        foreach ($data['record_Question'] as $row) {
                            echo 'question/' . $row->url_question . '#comment-' . $row->id_comment;
                            // redirect('question/' . $row->url_question . '#comment-' . $row->id_comment);
                        }
                    } else {
                        $data['record_Answer'] = $this->qa_model->join4_where('comment', 'user', 'question', 'answer', 'comment.user_id=user.id_user', 'comment.question_id=question.id_question', 'answer.question_id=question.id_question', array('comment.id_comment' => $get->id_comment), 'comment.id_comment');
                        foreach ($data['record_Answer'] as $row) {
                            echo 'question/' . $row->url_question . '#comment-' . $row->id_comment;
                            // redirect('question/' . $row->url_question . '#comment-' . $row->id_comment);
                        }
                    }
                }
            } else {
                show_404();
                return FALSE;
            }
        } else {
            show_404();
            return FALSE;
        }
    }

    function update($str=NULL)
    {
        if (isset($str)) {
            $data = array(
                'record' => $this->_get($str),
                );
            if (!empty($data['record'])) {
                $this->form_validation->set_rules('description_answer', 'Description', 'trim|required|min_length[25]|max_length[5000]|xss_clean');
                $this->form_validation->set_error_delimiters('', '<br>');
                if ($this->form_validation->run() == TRUE) {
                    $update = array(
                        'description_answer' => $this->input->post('description_answer'),
                        'answer_update' => date('Y-m-d H:i:s'),
                        );
                    $this->qa_model->update('comment', $update, array('id_answer' => $str));
                    redirect($this->uri->segment(1) .'/'. $this->uri->segment(2));
                } else {
                    foreach ($data['record'] as $get) {
                        if ($get->comment_in === 'Question') {
                            $data['record_Question'] = $this->qa_model->join2_where('comment', 'user', 'question', 'comment.user_id=user.id_user', 'comment.question_id=question.id_question', array('comment.question_id' => $str), 'comment.id_comment');
                        } else {
                            $data['record_Answer'] = $this->qa_model->join2_where('comment', 'user', 'answer', 'comment.user_id=user.id_user', 'comment.answer_id=answer.id_answer', array('comment.answer_id' => $str), 'comment.id_comment');
                            redirect('question/' . $get->url_question . '#comment' . $get->id_comment);
                        }
                    }
                    $this->_render('comment/update', $data);
                }
            } else {
                show_404();
                return FALSE;
            }
        } else {
            show_404();
            return FALSE;
        }
    }

    function delete($str=NULL)
    {
        if (isset($str)) {
            $data = array(
                'record' => $this->_get($str)
                );
            if (!empty($data['record'])) {
                $this->qa_model->delete('comment', array('id_comment' => $str));
                redirect($this->uri->segment(1) .'/'. $this->uri->segment(2));
            } else {
                show_404();
                return FALSE;
            }
        } else {
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