<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users_model extends CI_Model {
	
	public function __construct() {
		parent::__construct();
	}
	
	public function ajaxSaveChef ($image_data) {
		#$image_url = "images/chef/".$image_data['file_name'];
		var_dump ($_POST); return ;
		$this->db->insert ('users', array (
			'fullname' 	=> $_POST['fullname']['val'],
			'email'		=> $_POST['']['val'],
			'tel'		=> $_POST['']['val'],
			'password'	=> $_POST['']['val'],
			'username'	=> $_POST['']['val'],
			'image_url'	=> $_POST['']['val'],
			'address'	=> $_POST['']['val'],
			'open_time'	=> $_POST['']['val'],
			'close_time'=> $_POST['']['val'],
			'activation_code' => $_POST['']['val'],
			'delivery_time'	=> $_POST['']['val'],
		)); 
	}
	
	public function checkUsername ($username = '') {
		$sql = "SELECT * FROM `users` WHERE `username`='{$username}' LIMIT 1";	
		$row = $this->db->query($sql)->row();
		return array('result'=>isset($row));
	}
	
	public function checkEmail ($email = '') {
		$sql = "SELECT * FROM `users` WHERE `email`='{$email}' LIMIT 1";
		$row = $this->db->query($sql)->row();
		return array('result'=>isset($row));
	}
	
	public function fetchChefMenu () {
		$owner = $_SESSION['user'];
		$sql = "SELECT * FROM `menus` WHERE `chef`='{$owner->id}'";
		$query = $this->db->query($sql);
		return $query->result();
	}
	
	public function fetchChefByUsername ($username= '') {
		$chef 		= new stdClass();
		$chef->chef = new stdClass();
		$chef->meals = array();
		$chef->menus = array();
		
		$sql 	= "SELECT * FROM `users` WHERE `username`='{$username}' AND `type`='3' AND `activated`= 1 LIMIT 1";
		$query 	= $this->db->query($sql);
		$chef->chef = $query->row();
		$chef->meals = new stdClass();
		$chef->menus = new stdClass();
		
		if ($query->num_rows() > 0) {
			$sql = "SELECT 
				m.id as mid, m.owner, m.name, m.ingredients, m.comment, m.activated, m.price, m.type, m.start_time, m.end_time,
				mi.image_url, mi.meal, (select count(*) from buyer_cart as bc where bc.meal = m.id AND bc.status=1) as orders  
			FROM `meals` AS `m`, `meal_images` AS `mi` 
			WHERE `m`.`id`=`mi`.`meal` AND `m`.`owner`='{$chef->chef->id}'";
			
			
			$query 			= $this->db->query($sql);
			$chef->meals 	= $query->result();
			$today 			= date('w');
			$sql 			= "SELECT 
			m.id as mid, m.owner, m.name, m.ingredients, m.comment, m.activated, m.price, m.type, m.start_time, m.end_time, mi.image_url, mi.meal, mm.day,
		    (select count(*) from buyer_cart as bc where bc.meal = m.id AND bc.status=1) as orders,
		    (select `username` from users as us where us.id = m.owner LIMIT 1) as owner_name  
			FROM `menus` as `mm`, `meals` AS `m`, `meal_images` AS `mi` 
			WHERE `m`.`id`=`mi`.`meal` AND `m`.`owner`='{$chef->chef->id}' AND `mm`.`chef`='{$chef->chef->id}' AND `mm`.`meal`=`m`.`id` AND `mm`.`day`='{$today}'";
			$query 			= $this->db->query($sql);
			$chef->menus 	= $query->result();
			 
		}
		
		return $chef;
	}
	
	public function fetchChefById ($id= '') {
		$chef 		= new stdClass();
		$chef->chef = new stdClass();
		$chef->meals = array();
		$chef->menus = array();
		
		$sql 	= "SELECT * FROM `users` WHERE `id`='{$id}' AND `type`='3' AND `activated`= 1 LIMIT 1";
		$query 	= $this->db->query($sql);
		$chef->chef = $query->row();
		$chef->meals = new stdClass();
		$chef->menus = new stdClass();
		
		if ($query->num_rows() > 0) {
			$sql = "SELECT 
				m.id as mid, m.owner, m.name, m.ingredients, m.comment, m.activated, m.price, m.type, m.start_time, m.end_time,
				mi.image_url, mi.meal, (select count(*) from buyer_cart as bc where bc.meal = m.id AND bc.status=1) as orders  
			FROM `meals` AS `m`, `meal_images` AS `mi` 
			WHERE `m`.`id`=`mi`.`meal` AND `m`.`owner`='{$chef->chef->id}'";
			
			
			$query 			= $this->db->query($sql);
			$chef->meals 	= $query->result();
			$today 			= date('w');
			$sql 			= "SELECT 
			m.id as mid, m.owner, m.name, m.ingredients, m.comment, m.activated, m.price, m.type, m.start_time, m.end_time, mi.image_url, mi.meal, mm.day,
		    (select count(*) from buyer_cart as bc where bc.meal = m.id AND bc.status=1) as orders,
		    (select `username` from users as us where us.id = m.owner LIMIT 1) as owner_name  
			FROM `menus` as `mm`, `meals` AS `m`, `meal_images` AS `mi` 
			WHERE `m`.`id`=`mi`.`meal` AND `m`.`owner`='{$chef->chef->id}' AND `mm`.`chef`='{$chef->chef->id}' AND `mm`.`meal`=`m`.`id` AND `mm`.`day`='{$today}'";
			$query 			= $this->db->query($sql);
			$chef->menus 	= $query->result();
			 
		}
		
		return $chef;
	}
	
	public function checkTel ($tel = '') {
		$row = $this->db->query("SELECT * FROM `users` WHERE `tel`='{$tel}' LIMIT 1")->row();
		return array('result'=>isset($row));
	}
	
	public function ajaxAuthenticateUser () {
		$username 	= $this->input->post ('username');
		$pwd		= md5 ($this->input->post ('pwd'));
		return $this->db->get_where ('users', 
			array (
				'username'=>$username, 
				'password'=>$pwd, 
				'activated'=>1
			)
		)->row ();
	}
	
	
	# to be re looked upon
	public function authenticate ($username = '', $password = '') {
		$sql = "SELECT type, image_url, open_time, close_time, email, username, fullname, address, tel, id FROM 
		`users` WHERE `username`='{$username}' AND `password`='{$password}' AND `activated`='1'  LIMIT 1";
		$row = $this->db->query($sql)->row();
		return array('result'=>isset($row), 'data'=>$row);
	}
	
	public function authenticateFacebook(array $details = array()) {
		# check if the user already exists if not add to the buyers table
		
		$select = "SELECT * FROM `buyers` WHERE `auth_id` = '{$details['id']}' AND `auth_type`= 'FACEBOOK' LIMIT 1";
		$query = $this->db->query($select);
		if($query->num_rows() < 1) {
			$sql = "INSERT INTO `buyers` (`auth_id`, `auth_type`, `email`) VALUES ('{$details['id']}', 'FACEBOOK', '{$details['email']}')";
			$this->db->query($sql);	
			return $this->db->insert_id();
		} else {			
			$row = $query->row();
			return $row->id;
		}		
	}
	
	public function authenticateGuest ($details = array()) {
		# check if the user already exists if not add to the buyers table
		
		$select = "SELECT * FROM `buyers` WHERE `auth_id` = '{$_SERVER['REMOTE_ADDR']}' AND `auth_type`= 'GUEST' LIMIT 1";
		# echo $select."<hr>";
		$query = $this->db->query($select);
		if($query->num_rows() < 1) {
			$sql = "INSERT INTO `buyers` (`auth_id`, `auth_type`) VALUES ('{$_SERVER['REMOTE_ADDR']}', 'GUEST')";
			#echo $sql;
			$this->db->query($sql);	
			return $this->db->insert_id();
		} else {			
			$row = $query->row();
			return $row->id;
		}		
	}
	
	public function confirm_verification_code () : boolean {
		$cipher = html_entity_decode (trim ($this->input->get ('code')));
		
		$plaintext 	= $this->encryption->decrypt ($cipher);
		$plainarray = explode (';', $plaintext);
		$time		= $plainarray[0];
		$fullname	= $plainarray[1];
		$email 		= $plainarray[2];
		$row = $this->db->get_where ('users', array ('activation_code' => $plaintext, 'email' => trim ($email))) ->row ();
		if ($row) 
			$this->db->update ('users', array ('activated'=>1), array ('id'=>$row->id));
		return $row ?? false;
	}
	
	# obsulate soon
	public function getMe() {
		$user = $_SESSION['user'];
		$sql = "SELECT image_url, open_time, close_time, email, username, fullname, address, tel, id FROM `users` WHERE `id`='{$user['id']}' AND `activated`=1 LIMIT 1";
		$row = $this->db->query($sql)->row();
		return $row;
	}	
	
	public function fetchMeals () {
		# this function is to get meals that are close to the user
		$data = new stdClass();
		$sql = "SELECT  
			(select count(*) from buyer_cart as bc where bc.meal = m.id AND bc.status=1) as orders,  
			m.id, m.name, m.owner, m.price, m.comment, u.id as user_id, u.email, u.username, m.likes, mi.image_url, m.start_time, m.end_time
			FROM `meals` AS `m`, users as u, meal_images as mi where m.owner = u.id AND u.type='3' AND mi.meal=m.id AND u.`activated`=1";
		
		$query = $this->db->query($sql);
		$data = $query->result();
		
		foreach ($data as $meal) {
			$sql = "SELECT * FROM `menus` WHERE `meal`= '{$meal->id}'";
			$query = $this->db->query($sql);
			$meal->menu = $query->result();
		}
		
		return $data;
	}
	
	public function checkout ($ids) {
		$sql = "";
		if(isset($_SESSION['user_profile_id'])) {
			$user = $_SESSION['user_profile_id'];
			$data = array(
				'status'=>1
			);
			foreach ($ids as $id) {
				$sql = "UPDATE `buyer_cart` SET `status`='1' WHERE `id`='{$id}' AND `buyer`='{$user}'; ";
				$this->db->query($sql);
			}
		}
	}
	
	public function fetchMyOrders () {
		# load from database the orders placed by this user
		
		$sql = "SELECT 
			`bc`.`id`, `bc`.`servings`, `m`.`name`, `m`.`price` 
		FROM `buyer_cart` AS `bc`, `meals` AS `m`  
		WHERE `bc`.`buyer`=(SELECT `id` FROM `buyers` WHERE `auth_id`='{$_SERVER['REMOTE_ADDR']}' LIMIT 1) AND `bc`.`meal`=`m`.`id` AND `bc`.`status` = '0' ORDER BY `bc`.`time` DESC";
		$query = $this->db->query($sql);
		return $query->result();
		
		return array();
	}
	
	public function fetchChefOrders() {
		$owner = $_SESSION['user'];
		$sql = "SELECT m.id as mid, m.name, bc.servings, bc.id as bcid 
		FROM  buyer_cart as bc, meals as m 
		WHERE m.owner = '{$owner->id}' AND m.id = bc.meal AND bc.status=1 ORDER BY time DESC";
		
		$query = $this->db->query($sql);
		return $query->result();
	}
	
	public function loadChefs () {
		# load all the chefs close to the user for now load all the chefs
		$sql = "SELECT * FROM `users` WHERE `type`='3' AND activated = 1";
		$query = $this->db->query($sql);
		$chefs = array();
		
		foreach ($query->result() as $row) {
			$chef = new stdClass();
			$sql = "SELECT *, 
			(SELECT COUNT(*) FROM `buyer_cart` AS `bc` WHERE `bc`.`meal`=`m`.`id` AND `bc`.`status`='1') AS `orders`,
			(SELECT image_url FROM `meal_images` WHERE `meal_images`.`meal` = `m`.`id`) as `image_url`  
			FROM meals AS m WHERE `m`.`owner` = '{$row->id}'";
			$meals = $this->db->query($sql);
			
			$chef->chef = $row;
			$chef->meals = $meals->result();
			
			foreach ($chef->meals as $meal) {
				$sql = "SELECT * FROM `menus` WHERE `meal`= '{$meal->id}'";
				$query = $this->db->query($sql);
				$meal->menu = $query->result();
			}
			$chefs[] = $chef;
		}
		return $chefs;
	}
	
	public function fetchMealPlan($profile) {
		$sql = "SELECT 
			mp.id, mp.servings, mp.day_time, b.id AS bid, b.auth_id, m.id AS mid, m.name, m.price, m.owner 
		FROM 
			mealplan AS mp, buyers AS b, meals AS m 
		WHERE 
			mp.buyer = b.id AND m.id = mp.meal";
		$query = $this->db->query($sql);
		return $query->result();
	}
	
	public function saveToTable($meal, $user) {
		$sql = "SELECT * FROM `mealplan` WHERE `buyer`='".$_SESSION['user_profile_id']."' AND `meal`='".$meal['meal']."' LIMIT 1";
		$query = $this->db->query($sql);
		
		# var_dump($query->row());
		if ($query->row() === NULL) {
			$sql = "INSERT INTO `mealplan` (`day_time`, `buyer`, `meal`, `servings`) VALUES ('".$meal['day'].",".$meal['time']."', '".$_SESSION['user_profile_id']."', '".$meal['meal']."', '".$meal['servings']."')";
			$query = $this->db->query($sql);
		}
	}
    
    public function saveGuest ($guest) {
    	$sql = "INSERT INTO `guests` (`name`, `email`) VALUES ('{$guest->name}', '{$guest->email}')";
		$query = $this->db->query($sql);
    }
	
	public function getChefOfTheMonth () {
		$sql = "SELECT * FROM `chef_of_the_month` WHERE `year`='". date('Y') ."' AND `month`='". date('m') ."' LIMIT 1";
		$query = $this->db->query($sql)->row();
		
		
		if ($query !== NULL) {
			// the extra images 
			$sql = "SELECT * FROM `chef_images` WHERE `chef`='{$query->id}'";
			$query->images = $this->db->query($sql)->result();
			#var_dump($query);	
			
		}
		
		return $query;
	}
	
	public function addChefOfTheMonth () {}
	
	public function viewAllChefsOfTheMonth () {
		
	}
}

