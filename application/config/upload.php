<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$config['upload_path']          = 'images/meals';
$config['allowed_types']        = 'gif|jpg|png|jpeg';
$config['max_size']             = 10000;
$config['file_name']			= time();
$config['encrypt_name']			= TRUE;
$config['remove_spaces']		= TRUE;
		