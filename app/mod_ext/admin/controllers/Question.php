<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * @package     Question Answer (https://github.com/SunDi3yansyah/FinalProjectPWL)
 * @author      Cahyadi Triyansyah (https://sundi3yansyah.com)
 * @version     1.0
 * @license     MIT
 * @copyright   Copyright (c) 2015 SunDi3yansyah
 */
class Question extends CI_Privates
{
	function index()
	{
        $data = array(
            'dataTables' => TRUE,
            'dtFields' => array(
                'id_question',
                'username',
                'subject',
                'category_name',
                'answer_id',
                'question_date',
                ),
            );
		$this->_render('question/index', $data);
	}

    function ajax()
    {
        if (!$this->input->is_ajax_request()) {
            exit('No direct script access allowed');
        } else {
            $this->load->library('datatables');
            $this->datatables->from('question')
                             ->join('user', 'question.user_id=user.id_user')
                             ->join('category', 'question.category_id=category.id_category')
                             ->select('id_question, username, subject, category_name, answer_id, question_date')
                             ->add_column('action', '<a href="' . base_url(''.$this->uri->segment(1).'/'.$this->uri->segment(2).'/view') . '/$1" class="btn btn-info btn-sm">View</a> <a href="' . base_url(''.$this->uri->segment(1).'/'.$this->uri->segment(2).'/update') . '/$1" class="btn btn-primary btn-sm">Update</a> <a href="' . base_url(''.$this->uri->segment(1).'/'.$this->uri->segment(2).'/delete') . '/$1" class="btn btn-danger btn-sm">Delete</a>', 'id_question');
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
                    redirect('question/' . $get->url_question);
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
                $this->form_validation->set_rules('subject', 'Subject', 'trim|required|min_length[10]|max_length[100]|xss_clean');
                $this->form_validation->set_rules('category_id', 'Category', 'trim|required|min_length[1]|max_length[11]|xss_clean');
                $this->form_validation->set_rules('description_question', 'Description', 'trim|required|min_length[25]|max_length[5000]|xss_clean');
                $this->form_validation->set_rules('answer_id', 'Answer', 'trim|min_length[1]|max_length[11]|xss_clean');
                $this->form_validation->set_error_delimiters('', '<br>');
                if ($this->form_validation->run() == TRUE) {
                    $update = array(
                        'subject' => $this->input->post('subject'),
                        'category_id' => $this->input->post('category_id'),
                        'description_question' => $this->input->post('description_question'),
                        'answer_id' => $this->input->post('answer_id'),
                        'question_update' => date('Y-m-d H:i:s'),
                        );
                    $this->qa_model->update('question', $update, array('id_question' => $str));
                    $this->qa_model->delete('question_tag', array('question_id' => $str));
                    foreach ($this->input->post('question_tag', TRUE) as $qt) {
                        $update_qt = array(
                            'question_id' => $str,
                            'tag_id' => $qt
                            );
                        $this->qa_model->insert('question_tag', $update_qt);
                    }
                    redirect($this->uri->segment(1) .'/'. $this->uri->segment(2));
                } else {
                    $data['category'] = $this->qa_model->all('category', 'id_category ASC');
                    foreach ($data['record'] as $row) {
                        $data['qt_current'] = $this->qa_model->join2_where('question_tag', 'question', 'tag', 'question_tag.question_id=question.id_question', 'question_tag.tag_id=tag.id_tag', array('question_tag.question_id' => $row->id_question), 'question_tag.id_qt');
                        $data['qt_all'] = $this->qa_model->all('tag', 'id_tag ASC');
                        if ($row->answer_id != NULL) {
                            $data['record_join'] = $this->qa_model->join3_where('question', 'user', 'category', 'answer', 'question.user_id=user.id_user', 'question.category_id=category.id_category', 'question.answer_id=answer.id_answer', array('question.id_question' => $str), 'question.id_question');
                            $data['count_answer'] = $this->qa_model->count_where('answer', array('question_id' => $row->id_question));
                            $data['count_comment'] = $this->qa_model->count_where('comment', array('question_id' => $row->id_question));
                            $this->_render('question/update', $data);
                        } else {
                            $data['record_join'] = $this->qa_model->join2_where('question', 'user', 'category', 'question.user_id=user.id_user', 'question.category_id=category.id_category', array('question.id_question' => $str), 'question.id_question');
                            $data['count_answer'] = $this->qa_model->count_where('answer', array('question_id' => $row->id_question));
                            $data['count_comment'] = $this->qa_model->count_where('comment', array('question_id' => $row->id_question));
                            $this->_render('question/update', $data);
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

    function delete($str=NULL)
    {
        if (isset($str)) {
            $data = array(
                'record' => $this->_get($str)
                );
            if (!empty($data['record'])) {
                $this->qa_model->delete('question', array('id_question' => $str));
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
        $var = $this->qa_model->get('question', array('id_question' => $str));
        return ($var == FALSE)?array():$var;
    }
}