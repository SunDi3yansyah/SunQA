<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Publics
{
	function sign_up()
	{
		$this->_render('public/auth/sign_up');
	}

	function forgot()
	{
		$this->_render('public/auth/forgot');
	}

	function settings()
	{
		$this->_render('public/auth/settings');
	}

	function answer()
	{
		$this->_render('public/auth/answer');
	}

	function question()
	{
		$this->_render('public/auth/question');
	}

	function comment()
	{
		$this->_render('public/auth/comment');
	}

	function vote()
	{
		$this->_render('public/auth/vote');
	}
}
