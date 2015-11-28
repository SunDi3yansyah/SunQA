<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * @package     Question Answer (https://github.com/SunDi3yansyah/FinalProjectPWL)
 * @author      Cahyadi Triyansyah (https://sundi3yansyah.com)
 * @version     1.0
 * @license     MIT
 * @copyright   Copyright (c) 2015 SunDi3yansyah
 */
class Category extends CI_Privates
{
	function index()
	{
        $data = array(
            'dataTables' => TRUE,
            'dtFields' => array(
                'id_category',
                'category_name',
                ),
            );
		$this->_render('category/index', $data);
	}

	function ajax()
	{
        if (!$this->input->is_ajax_request()) {
            exit('No direct script access allowed');
        } else {
            $this->load->library('datatables');
            $this->datatables->from('category')
                             ->select('id_category, category_name')
                             ->add_column('action', '<a href="' . base_url(''.$this->uri->segment(1).'/'.$this->uri->segment(2).'/view') . '/$1" class="btn btn-info btn-sm">View</a> <a href="' . base_url(''.$this->uri->segment(1).'/'.$this->uri->segment(2).'/update') . '/$1" class="btn btn-primary btn-sm">Update</a> <a href="' . base_url(''.$this->uri->segment(1).'/'.$this->uri->segment(2).'/delete') . '/$1" class="btn btn-danger btn-sm">Delete</a>', 'id_category');
            echo $this->datatables->generate();
        }
	}

    function create()
    {
        $this->form_validation->set_rules('category_name', 'Tag', 'trim|required|min_length[2]|max_length[50]|xss_clean|callback__AlphaNumberSpace');
        $this->form_validation->set_error_delimiters('', '<br>');
        if ($this->form_validation->run() == TRUE) {
            $category_name = array(
                'category_name' => $this->input->post('category_name', TRUE)
                );
            $check = $this->qa_model->get('category', $category_name);
            if ($check != FALSE) {
                $data = array(
                    'errors' => 'Error! Nama Category <b>'. $this->input->post('category_name', TRUE) .'</b> sudah ada sebelumnya dalam basis data.',
                    );
                $this->_render('category/create', $data);
            } else {
                $insert = array(
                    'category_name' => $this->input->post('category_name', TRUE),
                    );
                $this->qa_model->insert('category', $insert);
                redirect($this->uri->segment(1) .'/'. $this->uri->segment(2));
            }
        } else {
            $this->_render('category/create');
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
                    redirect('category/' . uri_encode($get->category_name));
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
                'count_question' => $this->qa_model->count_where('question', array('category_id' => $str))
                );
            if (!empty($data['record'])) {
                $this->form_validation->set_rules('category_name', 'Category', 'trim|required|min_length[2]|max_length[50]|xss_clean');
                $this->form_validation->set_error_delimiters('', '<br>');
                if ($this->form_validation->run() == TRUE) {
                    foreach ($data['record'] as $row) {
                        $category_name = array(
                            'category_name' => $this->input->post('category_name', TRUE)
                            );
                        $check = $this->qa_model->get('category', $category_name);
                        if ($row->category_name === $category_name['category_name']) {
                            $update = array(
                                'category_name' => $this->input->post('category_name', TRUE),
                                );
                            $this->qa_model->update('category', $update, array('id_category' => $str));
                            redirect($this->uri->segment(1) .'/'. $this->uri->segment(2));
                        } elseif ($check != FALSE) {
                            $data['errors'] = 'Error! Nama Category <b>'. $this->input->post('category_name', TRUE) .'</b> sudah ada sebelumnya dalam basis data.';
                            $this->_render('category/update', $data);
                        } else {
                            $update = array(
                                'category_name' => $this->input->post('category_name', TRUE),
                                );
                            $this->qa_model->update('category', $update, array('id_category' => $str));
                            redirect($this->uri->segment(1) .'/'. $this->uri->segment(2));
                        }
                    }
                } else {
                    $this->_render('category/update', $data);
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
                $this->qa_model->delete('category', array('id_category' => $str));
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
        $var = $this->qa_model->get('category', array('id_category' => $str));
        return ($var == FALSE)?array():$var;
    }
}