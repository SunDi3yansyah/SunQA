<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * @package     Question Answer (https://github.com/SunDi3yansyah/SunQA)
 * @author      Cahyadi Triyansyah (https://sundi3yansyah.com)
 * @version     0.0.1
 * @license     MIT
 * @copyright   Copyright (c) 2015 SunDi3yansyah
 */

class Account extends QA_Privates
{
    function index()
    {
        $this->_render('account/index');
    }
}