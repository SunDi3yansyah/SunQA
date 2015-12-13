<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * @package		Question Answer (https://github.com/SunDi3yansyah/FinalProjectPWL)
 * @author		Cahyadi Triyansyah (https://sundi3yansyah.com)
 * @version		1.0
 * @license		MIT
 * @copyright	Copyright (c) 2015 SunDi3yansyah
 */

class Create extends CI_Publics
{
	function index()
	{
		$data = array(
			'category' => $this->qa_model->all('category', 'id_category ASC'),
			'tag' => $this->qa_model->all('tag', 'id_tag ASC'),
			);
		if ($this->qa_libs->logged_in())
		{
			$this->form_validation->set_rules('subject', 'Description', 'trim|required|xss_clean');
			$this->form_validation->set_rules('category_id', 'Description', 'trim|required|xss_clean');
			$this->form_validation->set_rules('description_question', 'Description', 'trim|required|xss_clean');
			if ($this->form_validation->run() == TRUE)
			{				
				$insert = array(
					'user_id' => $this->qa_libs->id_user(),
					'subject' => $this->input->post('subject', TRUE),
					'category_id' => $this->input->post('category_id', TRUE),
					'description_question' => $this->input->post('description_question', TRUE),
					'question_date' => date('Y-m-d H:i:s'),
					'url_question' => qa_url($this->qa_libs->last_question(), $this->input->post('subject', TRUE)),
					);			
				$this->qa_model->insert('question', $insert);
				$question = $this->qa_model->firt_or_last('question', 'id_question DESC');
				foreach ($question as $q) {
					foreach ($this->input->post('id_tag', TRUE) as $tag)
					{
						$tags = array(
							'question_id' => $q->id_question,
							'tag_id' => $tag,
							);
						$this->qa_model->insert('question_tag', $tags);
					}
				}
				redirect('question/'. $insert['url_question']);
			}
			else
			{
				$this->_render('create/index', $data);
			}
		}
		else
		{
			$this->_render('create/index', $data);
		}		
	}
}
