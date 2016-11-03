<?php

require_once 'Pusher.php';

class MY_Pusher extends Pusher {
	
	public function __construct ($params) {
		parent::__construct (
			$params['auth_key'],
			$params['secret'],
			$params['app_id'],
			$params['options']
		);
	}

}

?>