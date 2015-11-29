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
        if (!$this->input->is_ajax_request())
        {
            exit('No direct script access allowed');
        }
        else
        {
            $table = 'pwl_category';

            $primaryKey = 'id_category';

            $columns = array(
                array('db' => 'id_category', 'dt' => 'id_category'),
                array('db' => 'category_name', 'dt' => 'category_name'),
                array(
                    'db' => 'id_category',
                    'dt' => 'action',
                    'formatter' => function($id)
                    {
                        return '<a href="' . base_url(''.$this->uri->segment(1).'/'.$this->uri->segment(2).'/view/' . $id) . '" class="btn btn-info btn-sm">View</a> <a href="' . base_url(''.$this->uri->segment(1).'/'.$this->uri->segment(2).'/update/' . $id) . '" class="btn btn-primary btn-sm">Update</a> <a href="' . base_url(''.$this->uri->segment(1).'/'.$this->uri->segment(2).'/delete/' . $id) . '" class="btn btn-danger btn-sm">Delete</a>';
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

    function create()
    {
        $this->form_validation->set_rules('category_name', 'Category', 'trim|required|min_length[2]|max_length[50]|xss_clean|is_unique[category.category_name]|callback__AlphaNumberSpace');
        $this->form_validation->set_error_delimiters('', '<br>');
        if ($this->form_validation->run() == TRUE)
        {
            $insert = array(
                'category_name' => $this->input->post('category_name', TRUE),
                );
            $this->qa_model->insert('category', $insert);
            redirect($this->uri->segment(1) .'/'. $this->uri->segment(2));
        }
        else
        {
            $this->_render('category/create');
        }
    }

    function view($str = NULL)
    {
        if (isset($str))
        {
            $data = $this->_get($str);
            if (!empty($data))
            {
                foreach ($data as $get)
                {
                    redirect('category/' . uri_encode($get->category_name));
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
                'count_question' => $this->qa_model->count_where('question', array('category_id' => $str))
                );
            if (!empty($data['record']))
            {
                $this->form_validation->set_rules('category_name', 'Category', 'trim|required|min_length[2]|max_length[50]|xss_clean');
                $this->form_validation->set_error_delimiters('', '<br>');
                if ($this->form_validation->run() == TRUE)
                {
                    foreach ($data['record'] as $row)
                    {
                        $category_name = array(
                            'category_name' => $this->input->post('category_name', TRUE)
                            );
                        $check = $this->qa_model->get('category', $category_name);
                        if ($row->category_name === $category_name['category_name'])
                        {
                            $update = array(
                                'category_name' => $this->input->post('category_name', TRUE),
                                );
                            $this->qa_model->update('category', $update, array('id_category' => $str));
                            redirect($this->uri->segment(1) .'/'. $this->uri->segment(2));
                        }
                        elseif ($check != FALSE)
                        {
                            $data['errors'] = 'Error! Nama Category <b>'. $this->input->post('category_name', TRUE) .'</b> sudah ada sebelumnya dalam basis data.';
                            $this->_render('category/update', $data);
                        }
                        else
                        {
                            $update = array(
                                'category_name' => $this->input->post('category_name', TRUE),
                                );
                            $this->qa_model->update('category', $update, array('id_category' => $str));
                            redirect($this->uri->segment(1) .'/'. $this->uri->segment(2));
                        }
                    }
                }
                else
                {
                    $this->_render('category/update', $data);
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
                $this->qa_model->delete('category', array('id_category' => $str));
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
        $var = $this->qa_model->get('category', array('id_category' => $str));
        return ($var == FALSE)?array():$var;
    }
}