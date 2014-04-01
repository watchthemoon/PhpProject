<?php
session_start();

$login = array(
	'email'  => 'johndoe',
	'logged_in' => TRUE
);

$this->session->set_userdata($login);