<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * @package		Question Answer (https://github.com/SunDi3yansyah/FinalProjectPWL)
 * @author		Cahyadi Triyansyah (https://sundi3yansyah.com)
 * @version		1.0
 * @license		MIT
 * @copyright	Copyright (c) 2015 SunDi3yansyah
 */
// $config['base_url'] = '';
// $config['per_page'] = 5;
$config['uri_segment'] = 3;
// $config['num_links'] = 9;
// $config['page_query_string'] = TRUE; # Ini yang menghasilkan jadi <li class="page">...</li>
// $config['use_page_numbers'] = TRUE;
$config['query_string_segment'] = 'page';
// $config['display_pages'] = FALSE;
// $config['anchor_class'] = '';

$config['full_tag_open'] = '<div class="ui pagination menu">';
$config['full_tag_close'] = '</div>';

$config['first_link'] = '<i class="angle double left icon"></i>';
$config['first_tag_open'] = '<div class="icon item popup-t-c" data-content="First Page">';
$config['first_tag_close'] = '</div>';

$config['last_link'] = '<i class="angle double right icon"></i>';
$config['last_tag_open'] = '<div class="icon item popup-t-c" data-content="Last Page">';
$config['last_tag_close'] = '</div>';

$config['next_link'] = '<i class="angle right icon"></i>';
$config['next_tag_open'] = '<div class="icon item popup-t-c" data-content="Next Page">';
$config['next_tag_close'] = '</div>';

$config['prev_link'] = '<i class="angle left icon"></i>';
$config['prev_tag_open'] = '<div class="icon item popup-t-c" data-content="Previous Page">';
$config['prev_tag_close'] = '</div>';

$config['cur_tag_open'] = '<div class="active item">';
$config['cur_tag_close'] = '</div>';

$config['num_tag_open'] = '<div class="item">';
$config['num_tag_close'] = '</div>';