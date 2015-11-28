<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * @package     Question Answer (https://github.com/SunDi3yansyah/FinalProjectPWL)
 * @author      Cahyadi Triyansyah (https://sundi3yansyah.com)
 * @version     1.0
 * @license     MIT
 * @copyright   Copyright (c) 2015 SunDi3yansyah
 */
class Tag extends CI_Privates
{
	function index()
	{
        $data = array(
            'dataTables' => TRUE,
            'dtFields' => array(
                'id_tag',
                'tag_name',
                ),
            );
		$this->_render('tag/index', $data);
	}

	function ajax()
	{
        if (!$this->input->is_ajax_request()) {
            exit('No direct script access allowed');
        } else {
            $this->load->library('datatables');
            $this->datatables->from('tag')
                             ->select('id_tag, tag_name')
                             ->add_column('action', '<a href="' . base_url(''.$this->uri->segment(1).'/'.$this->uri->segment(2).'/view') . '/$1" class="btn btn-info btn-sm">View</a> <a href="' . base_url(''.$this->uri->segment(1).'/'.$this->uri->segment(2).'/update') . '/$1" class="btn btn-primary btn-sm">Update</a> <a href="' . base_url(''.$this->uri->segment(1).'/'.$this->uri->segment(2).'/delete') . '/$1" class="btn btn-danger btn-sm">Delete</a>', 'id_tag');
            echo $this->datatables->generate();
        }
	}

    function create()
    {
        $this->form_validation->set_rules('tag_name', 'Tag', 'trim|required|min_length[2]|max_length[50]|xss_clean|is_unique[tag.tag_name]|callback__AlphaNumberSpace');
        $this->form_validation->set_error_delimiters('', '<br>');
        if ($this->form_validation->run() == TRUE) {
            $insert = array(
                'tag_name' => $this->input->post('tag_name', TRUE),
                );
            $this->qa_model->insert('tag', $insert);
            redirect($this->uri->segment(1) .'/'. $this->uri->segment(2));
        } else {
            $this->_render('tag/create');
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
                    redirect('tag/' . uri_encode($get->tag_name));
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
                'count_question' => $this->qa_model->count_join_where('question_tag', 'question', 'question_tag.question_id=question.id_question', array('tag_id' => $str)),
                );
            if (!empty($data['record'])) {
                $this->form_validation->set_rules('tag_name', 'Tag', 'trim|required|min_length[2]|max_length[50]|xss_clean|callback__AlphaNumberSpace');
                $this->form_validation->set_error_delimiters('', '<br>');
                if ($this->form_validation->run() == TRUE) {
                    foreach ($data['record'] as $row) {
                        $tag_name = array(
                            'tag_name' => $this->input->post('tag_name', TRUE)
                            );
                        $check = $this->qa_model->get('tag', $tag_name);
                        if ($row->tag_name === $tag_name['tag_name']) {
                            $update = array(
                                'tag_name' => $this->input->post('tag_name', TRUE),
                                );
                            $this->qa_model->update('tag', $update, array('id_tag' => $str));
                            redirect($this->uri->segment(1) .'/'. $this->uri->segment(2));
                        } elseif ($check != FALSE) {
                            $data['errors'] = 'Error! Nama Tag <b>'. $this->input->post('tag_name', TRUE) .'</b> sudah ada sebelumnya dalam basis data.';
                            $this->_render('tag/update', $data);
                        } else {
                            $update = array(
                                'tag_name' => $this->input->post('tag_name', TRUE),
                                );
                            $this->qa_model->update('tag', $update, array('id_tag' => $str));
                            redirect($this->uri->segment(1) .'/'. $this->uri->segment(2));
                        }
                    }
                } else {
                    $this->_render('tag/update', $data);
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
                $this->qa_model->delete('tag', array('id_tag' => $str));
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
        $var = $this->qa_model->get('tag', array('id_tag' => $str));
        return ($var == FALSE)?array():$var;
    }
}