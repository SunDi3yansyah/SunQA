<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * @package		Question Answer (https://github.com/SunDi3yansyah/FinalProjectPWL)
 * @author		Cahyadi Triyansyah (https://sundi3yansyah.com)
 * @version		1.0
 * @license		MIT
 * @copyright	Copyright (c) 2015 SunDi3yansyah
 */

class Question extends CI_Publics
{
	function a302344c485385d66b3c1736be5213fb07e7fbb8($str = NULL, $action = NULL)
	{
		if (!empty($str))
		{
			$data = array(
				'question' => $this->_get($str),
				'question_tag' => $this->_question_tag($str),
				'category' => $this->qa_model->all('category', 'id_category ASC'),
				'tag' => $this->qa_model->all('tag', 'id_tag ASC'),
				);
			if (!empty($data['question']))
			{
				if (!empty($str) && empty($action))
				{
					foreach ($data['question'] as $q)
					{
						$this->qa_model->viewers('question', 'viewers', array('id_question' => $q->id_question));
						$this->_render('question/get', $data);
					}
				}
				elseif (!empty($str && $action))
				{
					if ($this->qa_libs->logged_in())
					{
						if ($action === 'answer')
						{
							$this->form_validation->set_rules('description_answer', 'Description', 'trim|required|xss_clean');
							if ($this->form_validation->run() == TRUE)
							{
								foreach ($data['question'] as $question)
								{
									$insert = array(
										'user_id' => $this->qa_libs->id_user(),
										'question_id' => $question->id_question,
										'description_answer' => $this->input->post('description_answer', TRUE),
										'answer_date' => date('Y-m-d H:i:s'),
										);
									$this->qa_model->insert('answer', $insert);
									redirect($this->uri->segment(1) .'/'.$question->url_question);
								}
							}
							else
							{
								$this->_render('question/answer', $data);
							}
						}
						elseif ($action === 'update')
						{
							foreach ($data['question'] as $question)
							{
								if ($question->user_id != $this->qa_libs->id_user())
								{
									show_404();
									return FALSE;
								}
								else
								{
									$this->form_validation->set_rules('subject', 'Description', 'trim|required|xss_clean');
									$this->form_validation->set_rules('category_id', 'Description', 'trim|required|xss_clean');
									$this->form_validation->set_rules('description_question', 'Description', 'trim|required|xss_clean');
									if ($this->form_validation->run() == TRUE)
									{
											$update = array(
												'subject' => $this->input->post('subject', TRUE),
												'category_id' => $this->input->post('category_id', TRUE),
												'description_question' => $this->input->post('description_question', TRUE),
												'question_update' => date('Y-m-d H:i:s'),
												'url_question' => qa_url($question->id_question, $this->input->post('subject', TRUE)),
												);
											$this->qa_model->update('question', $update, array('id_question' => $question->id_question));
											$this->qa_model->delete('question_tag', array('question_id' => $question->id_question));
											$loop_question = $this->qa_model->get('question', array('id_question' => $question->id_question));
											foreach ($loop_question as $lq) {
												foreach ($this->input->post('id_tag', TRUE) as $tag)
												{
													$tags = array(
														'question_id' => $lq->id_question,
														'tag_id' => $tag,
														);
													$this->qa_model->insert('question_tag', $tags);
												}
											}
											redirect($this->uri->segment(1) .'/'.$update['url_question']);
									}
									else
									{
										$this->_render('question/update', $data);
									}
								}
							}
						}
						elseif ($action === 'delete')
						{
							foreach ($data['question'] as $question)
							{
								if ($question->user_id != $this->qa_libs->id_user())
								{
									show_404();
									return FALSE;
								}
								else
								{
									$this->qa_model->delete('question', array('url_question' => $str));
									redirect();
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
		else
		{
			show_404();
			return FALSE;
		}		
	}

	function _get($str)
	{
        $var = $this->qa_model->join2_where('question', 'user', 'category', 'question.user_id=user.id_user', 'question.category_id=category.id_category', array('url_question' => $str), 'question.id_question DESC');
        return ($var == FALSE)?array():$var;
	}

    function _question_tag($str)
    {
        $var = $this->qa_model->join2_where('question_tag', 'question', 'tag', 'question_tag.question_id=question.id_question', 'question_tag.tag_id=tag.id_tag', array('url_question' => $str), 'question_tag.id_qt');
        return ($var == FALSE)?array():$var;
    }
}
