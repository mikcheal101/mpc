<?php

class SampleData extends CI_Model {
	
	private $new_meals;
	private $chef_of_the_month;
	
	
	public function __construct () {
		parent::__construct();
		
		
	}
	
	private function loadNewMeals () {
		$this->new_meals = array(
			array('arako meshi', 'http://i2.cdn.turner.com/cnnnext/dam/assets/160701154210-1-kibo---harako-meshi-exlarge-169.jpg', "U2FsbW9uIGhhcyBhbHdheXMgcGxheWVkIGFuIGltcG9ydGFudCByb2xlIGluIFRvaG9rdSBjdWlzaW5lIGFuZCBoYXJha28gbWVzaGkgKGxpdGVyYWxseSAic2FsbW9uIGNoaWxkIHJpY2UiKSBpcyBhICJzaWduYXR1cmUgZGlzaCIgb2YgdGhlIHJlZ2lvbi4gT2Z0ZW4gZmVhdHVyZWQgYXQgZmFtaWx5IGdhdGhlcmluZ3MsIGV2ZXJ5IGhvdXNlaG9sZCBzZWVtcyB0byBoYXZlIGl0cyBvd24gcmVuZGl0aW9uLg=="),
			array("Matsu no mi shira ae, kaki utsuwa", "", ""),
			array("Onigiri", "", ""),
			array("Hittsumi-jiru", "", ""),
			array("Kaki no dote nabe", "", ""),
			array("Michinoku kokeshi bento", "", ""),
			array("Kobu maki", "", ""),
			array("Shiso maki", "", ""),
			array("Hittsumi-jiru: Pinched noodle soup with pork", "", ""),
			array("Onigiri: Pressed rice \"sandwiches\"", "", ""),
			array("Liquid gold", "", ""),
			array("Say Queijo", "", ""),
			array("", "", ""),
			array("", "", ""),
			array("", "", ""),
			array("", "", ""),
			array("", "", ""),
			array("", "", ""),
			array("", "", ""),
			array("", "", ""),
			array("", "", ""),
			array("", "", ""),
			array("", "", ""),
			array("", "", ""),
			array("", "", ""),
			array("", "", ""),
			array("", "", ""),
			array("", "", ""),
			array("", "", ""),
			array("", "", ""),
			array("", "", ""),
			array("", "", ""),
			array("", "", ""),
			array("", "", ""),
			array("", "", ""),
			array("", "", ""),
			
		);
	}
	
	
	public function getMeals () {
		
	}
	
	public function getNewMeal ($id) {
		
	}
	
}
?>