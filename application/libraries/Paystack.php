<?php
/**
 * Copyright 2016 Hirekaan Micheal Hemen.
 *
 * Licensed under the Apache License, Version 2.0 (the "License"); you may
 * not use this file except in compliance with the License. You may obtain
 * a copy of the License at
 *
 *     http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS, WITHOUT
 * WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied. See the
 * License for the specific language governing permissions and limitations
 * under the License.
 */

defined('BASEPATH') OR exit('No direct script access allowed');
 
if (!function_exists('curl_init')) {
  throw new Exception('Paystack API needs the CURL PHP extension.');
}
if (!function_exists('json_decode')) {
  throw new Exception('Paystack API needs the JSON PHP extension.');
}

/**
 * Thrown when an API call returns an exception.
 *
 * @author Hirekaan Micheal Hemen <hirekaanmicheal@gmail.com>;
 * @author Hirekaan Micheal Hemen <hirekaanmicheal@mypersonalchef.com.ng>;
 */
 
require_once('Curl.php');

class Paystack {
	/**
	 * Version
	 */
	const version = '1.0.0';
	
	private $init_params 	= array();
	private $curl			= NULL;
	
	private $reference		= '';
	private $amount			= '';
	private $email			= '';
	private $plan			= '';
	private $callback_url	= '';
	private $secret_key 	= '';
	private $public_key		= '';
	private $url 			= "";
	
	
	public function __construct (array $params = array()) {
		if (empty ($params)) exit();
		else {
			$this->init_params = $params;
			$this->curl = new Curl();
		}
	}
	
	public function authenticate () {}
	
	public function initializeTransaction (array $data = array()) {
		$this->secret_key 	= $this->init_params['secret_key'];
		
		$this->amount		= $data['amount'];
		$this->email		= $data['email'];
		$this->callback_url	= $data['callback_url'];
		$this->url 			= $data['url'];
		
		$this->curl->setUrl($this->url);
		$this->curl->setHeaders(
			array (
				'Authorization'	=> $this->init_params['bearer'],
				'Content-Type'	=> 'application/json',
			)
		);
		$this->curl->setParams(
			array(
				'reference' => $data['reference'], # a unique generated code for each transaction
				'amount'	=> $data['amount'], # amount in kobo
				'email'		=> $data['email'], # email address provided by the user
			)
		);
		$this->curl->execute();
		var_dump($this->curl->getResult());
	}
	
	public function verifyTransaction () {}
	
	public function listTransactions () {}
	
	public function chargeAuthourization () {}
	
	public function chargeToken () {}
	
}

 
?>