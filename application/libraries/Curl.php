<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Curl {
	private $headers 		= array();
	private $params 		= array();
	private $url 			= "";
	private $sendOption		= array('POST', 'GET');
	private $selectedOpt	= 0;
	private $curl			= NULL;
	
	public function __construct() {}
	
	public function execute () {
		$ch = curl_init();
		if ($this->selectedOpt === 0) {
			curl_setopt($ch, CURLOPT_URL, $this->url);
			curl_setopt($ch, CURLOPT_POST, 1);
			curl_setopt($ch, CURLOPT_POSTFIELDST, $this->params);
		} else {
			curl_setopt($ch, CURLOPT_URL, $this->url.htmlentities($this->decodeArray($this->params)));
		}
		
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch, CURLOPT_TIMEOUT, 3);
		$this->curl = trim(curl_exec($ch));
		curl_close($ch);
	}
	
	private function decodeArray (array $param = array()) {
		$str = "";
		$counter = 0;
		foreach ($param as $key=>$value) {
			++$counter;
			if ($counter < count($param)) {
				$str.="{$key}={$value}&";	
			} else {
				$str.="{$key}={$value}";
			}
		}
		return $str;
	}
	
	public function getHeaders () {
		return $this->headers;
	}
	
	public function setHeaders (array $headers = array()) {
		$this->headers = $headers;
	}
	
	public function setParams (array $parameters = array()) {
		$this->params = $parameters;
	}
	
	public function getParams () {
		return $this->params;
	}
	
	public function setUrl ($url = '') {
		$this->url = $url;
	}
	
	public function getUrl () {
		return $this->url;
	}
	
	public function setSendOption ($option = 0) {
		$this->sendOption = $option;
	}
	
	public function getSendOption () {
		return $this->sendOption[$this->selectedOpt];
	}
	
	public function getResult () {
		return $this->curl;
	}
}
?>