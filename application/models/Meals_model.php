<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Meals_model extends CI_Model {
	
	public function __construct() {
		parent::__construct();
	}
	
	public function fetchMeals () {
		# select * meals from the database
		
	}
	
	public function setMenu () {
		$user 	= $_SESSION['user'];
		$day 	= $_POST['day'];
		$batch 	= array();
		
		foreach($_POST['ids'] as $post) {
			$batch[] = array(
				'chef' => "{$user->id}",
				'meal' => "{$post}",
				'day'  => "{$day}",
			);
		}
		
		# clear everything in the database that has that day
		$sql = "DELETE FROM `menus` WHERE `day`='{$day}' AND `chef`='{$user->id}'";
		$this->db->query($sql);
		$this->db->insert_batch('menus', $batch);
	}
	
	public function fetchAllMyMeal () {
		$user = $_SESSION['user'];
		$sql = "SELECT 
			m.id as meal_id, m.owner, m.name, m.ingredients, m.comment, m.activated, m.price, m.type, m.start_time, m.end_time, 
			mi.meal, mi.image_url, mi.id as mi_id, mi.date 
		FROM
			meals AS m, meal_images AS mi
		WHERE 
			m.owner = '{$user->id}' AND m.id = mi.meal
		ORDER BY mi.date DESC
		";
		
		$query = $this->db->query($sql);
		#var_dump($query->result());
		return $query->result();
	}
	
	public function deleteMeal($id) {
		$user = $_SESSION['user'];
		$sql = "DELETE FROM `meals` WHERE `id`='{$id}' AND `owner`='{$user->id}'";
		
		$this->db->query($sql);
	}

    
	public function fetchMeal($id) {
		$user = $_SESSION['user'];
		$sql = "SELECT 
			m.id as meal_id, m.owner, m.name, m.ingredients, m.comment, m.activated, m.price, m.type, m.start_time, m.end_time, 
			mi.meal, mi.image_url, mi.id as mi_id, mi.date 
		FROM
			meals AS m, meal_images AS mi
		WHERE 
			m.owner = '{$user->id}' AND m.id = mi.meal AND m.id = '{$id}'
		ORDER BY mi.date DESC
		";
		$query = $this->db->query($sql);
		return $query->row();
	}
	
	public function getMeal ($id) {
		$sql = "SELECT 
			m.id as meal_id, m.owner, m.name, m.ingredients, m.comment, m.activated, m.price, m.type, m.start_time, m.end_time, 
			mi.meal, mi.image_url, mi.id as mi_id, mi.date, u.image_url as chef_image, u.username as chef_username
		FROM
			meals AS m, meal_images AS mi, users as u
		WHERE 
			m.id = mi.meal AND m.id = '{$id}' AND m.owner = u.id
		ORDER BY mi.date DESC
		";
		$query = $this->db->query($sql);
		return $query->row();
	}
	
	public function saveMeal ($image_details) {
		$user = $_SESSION['user'];
		$meal 				= new stdClass();
		$meal->owner 		= "{$user->id}";
		$meal->name 		= $this->input->post('mealname');
		$meal->ingredients 	= $this->input->post('ingridients');
		$meal->comment 		= base64_encode($this->input->post('comment'));
		
		$meal->price 		= $this->input->post('servings_price');
		$meal->type			= $this->input->post('meal_type');
		$meal->start_time 	= $this->input->post('start_time');
		$meal->end_time 	= $this->input->post('end_time');
		
		$this->db->insert('meals', $meal);
		$id = $this->db->insert_id();
		
		$meal_images = new stdClass();
		$meal_images->meal = $id;
		$meal_images->image_url = base_url("images/meals/{$image_details['file_name']}");
		$this->db->insert('meal_images', $meal_images);
	}

	public function addToCart ($id, $servings) {

		# get the cookies in volved if there is a saved cookies, if there isnt then create one
		if ($_SESSION['cart'] === NULL) {
			$_SESSION['cart'][$id] = array(
				'meal' 		=> $this->getMeal($id),
				'status' 	=> 0,
				'time'		=> time(),
				'servings'	=> $servings,
			);
		} else {
			# get the cookie and add the servings
			if (isset($_SESSION['cart'][$id])) {
				$_SESSION['cart'][$id]['servings'] += 1;
				if ($_SESSION['cart'][$id]['meal'] === NULL) 
					$_SESSION['cart'][$id]['meal'] = $this->getMeal($id);
			} else {
				# item is not in the cart
				$_SESSION['cart'][$id] = array(
					'meal' 		=> $this->getMeal($id),
					'status' 	=> 0,
					'time'		=> time(),
					'servings'	=> $servings,
				);
			}
		}
	}	
	
	public function get_meals_for_meal_plan ($x, $y) {
		
		$this->db
			->select("m.id, m.name, mi.image_url, m.start_time, m.end_time, u.fullname, m.comment, m.ingredients, m.price")
			->from("meals as m, meal_images as mi, users as u")
			->where("u.id = m.owner")
			->where("mi.meal = m.id")
			->where("m.id in (select meal from menus where day = {$x})")
			->where("((m.start_time <=  {$y}) or (m.start_time = ''))")
			->where("((m.end_time >= {$y}) or (m.end_time = ''))");
			
			
		$result = $this->db->get()->result_array();
		#echo "<hr>{$this->db->last_query()}<hr>";
		return $result;	
	} 
	
	public function getAllNewPlaces () {
		$this->db
			->select("*")
			->from("new_places")
			->order_by('date_added', 'DESC');
		$data = $this->db->get()->result();
		foreach($data as $result) {
			$result->description 	= base64_decode($result->description);
			$result->title			= base64_decode($result->title);
			$result->image_url		= base64_decode($result->image_url);
		}
		return $data;
	}
	
	public function getNewPlace () {
		$id = $this->input->post('id');
		$this->db
			->select("*")
			->from("new_places")
			->where('id', $id);
		$result =  $this->db->get()->row();
		if ($result !== null) {
			$result->description 	= base64_decode($result->description);
			$result->title			= base64_decode($result->title);
			$result->image_url		= base64_decode($result->image_url);
		}
		return $result;
	}
	
	public function saveNewPlace () {
		$save = array(
			'image_url' 	=> base64_encode($this->input->post('image_url')),
			'title'			=> base64_encode($this->input->post('title')),
			'description'	=> base64_encode($this->input->post('description')),
			);
		$this->db->insert('new_places', $save);
	}
	
	public function deleteNewPlace ($id) {
		$delete = array('id' => $id,);
		$this->db->delete('new_places', $delete);
	}
	
	public function updateNewPlace () {
		$param = $_POST;
		$update = array(
			'image_url' 	=> base64_encode($param['image_url']),
			'title'			=> base64_encode($param['title']),
			'description'	=> base64_encode($param['description']),
			);
		$id = array('id'=>$param['id']);
		$this->db->update('new_places', $update, $id);
	}
	
	public function getCookingTips() {
		$this->db
			->select("*")
			->from("cooking_tips")
			->order_by('posted_date', 'DESC');
		$data = $this->db->get()->result();
		foreach($data as $result) {
			$result->description 	= base64_decode($result->description);
			$result->title			= base64_decode($result->title);
			$result->img			= base64_decode($result->img);
		}
		return $data;
	}
	
	public function getCookingtTip() {
		$id = $this->input->post('id');
		$this->db
			->select("*")
			->from("cooking_tips")
			->where('id', $id);
		$result =  $this->db->get()->row();
		if ($result !== null) {
			$result->description 	= base64_decode($result->description);
			$result->title			= base64_decode($result->title);
			$result->img			= base64_decode($result->img);
		}
		return $result;
	}
	
	public function deleteCookingTip () {
		$cookingTip = array(
			'id' => $this->input->post('id'),
			);
		$this->db->delete('cooking_tips', $cookingTip);
	}
	
	public function saveCookingTip () {
		$cookingTip = array(
			'img' 	=> base64_encode($this->input->post('img')),
			'title'	=> base64_encode($this->input->post('title')),
			'description'	=> base64_encode($this->input->post('description')),
			);
		$this->db->insert('cooking_tips', $cookingTip);
	}
	
	public function updateCookingTip () {
		$cookingTip = array(
			'img' 	=> base64_encode($this->input->post('img')),
			'title'	=> base64_encode($this->input->post('title')),
			'description'	=> base64_encode($this->input->post('description')),
			);
		$id 		= array('id'=>$this->input->post('id'));
		$this->db->update('cooking_tips', $cookingTip, $id);
	}
	
	
	/**
	 * shopping markets
	 */
	 
	public function saveShoppingMkts () {
		$lat[] = $this->input->post('lat'); 
		$lat[] = $this->input->post('lat_1'); 
		$long[] = $this->input->post('long'); 
		$long[] = $this->input->post('long_1');
		 
		
		$data = array(
			'title' 	=> base64_encode($this->input->post('title')),
			'description'	=> base64_encode($this->input->post('description')),
			'url'		=> base64_encode($this->input->post('url')),
			'address'	=> base64_encode($this->input->post('address')),
			
		);
		$this->db->insert("shopping_markets", $data);
	}
	
	public function deleteShoppingMkts () {
		$id = array(
			'id'	=> $this->input->post('id'),
		);
		$this->db->delete('shopping_markets', $id);
	}
	
	public function updateShoppingMkts () {
		$data = array(
			'title' 	=> base64_decode($this->input->post('title')),
			'description'	=> base64_decode($this->input->post('description')),
			'url'		=> base64_decode($this->input->post('url')),
			'address'	=> base64_decode($this->input->post('address')),
		);
		$id = array(
			'id'	=> $this->input->post('id'),
		);
		$this->db->update("shopping_markets", $data, $id);
	}
	
	public function getAllShoppingMkts () {
		$this->db
			->select('*')
			->from('shopping_markets')
			->order_by('dateTime', 'DESC');
		$r = $this->db->get()->result();
		foreach ($r as $x) {
			$x->title 		= base64_decode($x->title);
			$x->description	= base64_decode($x->description);
			$x->url 		= base64_decode($x->url);
			$x->address		= base64_decode($x->address);
		}
		return $r;
		
	}
	
	public function getSingleShoppingMkts () {
		$id	= array('id'=>$this->input->post('id'));
		$x = $this->db->get_where("shopping_markets", $id)->row;
		if ($x != null) {
			$x->title 		= base64_decode($x->title);
			$x->description	= base64_decode($x->description);
			$x->url 		= base64_decode($x->url);
			$x->address		= base64_decode($x->address);
		}
		return $x;
	}
	
	/**
	 * new ingredients
	 */
	 
	public function getAllNewIngridients () {
		$this->db
			->select('*')
			->from('ingredients_of_the_month')
			->order_by('post_date', 'DESC');
		$r = $this->db->get()->result();
		
		foreach($r as $x) {
			$x->name 		= base64_decode($x->name);
			$x->image_url 	= base64_decode($x->image_url);
			$x->comments	= base64_decode($x->comments);
		} 
		return $r;
	}
	
	public function getSingleNewIngridients () {
		$id	= array('id'=>$this->input->post('id'));
		$x = $this->db->get_where('ingredients_of_the_month', $id)->row();
		if ($x !== null) {
			$x->name 		= base64_decode($x->name);
			$x->image_url 	= base64_decode($x->image_url);
			$x->comments	= base64_decode($x->comments);
		}
		return $x;
	}
	
	public function deleteNewIngridients () {
		$id	= array('id'=>$this->input->post('id'));
		$this->db->delete('ingredients_of_the_month', $id);
	}
	
	public function updateNewIngridients () {
		$id	= array('id'=>$this->input->post('id'));
		$data = array(
			'name'		=> base64_encode($this->input->post('name')),
			'image_url'	=> base64_encode($this->input->post('image_url')),
			'comments'	=> base64_encode($this->input->post('comments')),
		);
		
		$this->db->update('ingredients_of_the_month', $data, $id);
	}
	
	public function saveNewIngridients () {
		$data = array(
			'name'		=> base64_encode($this->input->post('name')),
			'image_url'	=> base64_encode($this->input->post('image_url')),
			'comments'	=> base64_encode($this->input->post('comments')),
		);
		$this->db->insert('ingredients_of_the_month', $data);
	}
	
	
	/**
	 * chef of the month
	 */
	 
	public function saveChefOfTheMonth () {
		
		$save = array(
			'name' => base64_encode($this->input->post('name')),
			'year' => date('Y', $this->input->post('date')),
			'month' => date('M', $this->input->post('date')),
			'description' => base64_encode($this->input->post('description')),
			'main_picture' => base64_encode($this->input->post('main_picture')),
			'photos'		=> base64_encode($this->input->post('photos')),
		);
		
		$this->db->insert('chef_of_the_month', $save);
	}
	
	public function getAllChefofTheMonth () {
		$this->db
			->select("*")
			->from("chef_of_the_month")
			->order_by('year', 'DESC')
			->order_by('year', 'DESC');
		$result = $this->db->get()->result();
		foreach($result as $x) {
			$x->name 			= base64_decode($x->name);
			$x->description 	= base64_decode($x->description);
			$x->main_picture	= base64_decode($x->main_picture);
			$x->photos			= base64_decode($x->photos);
		}
		return $result;
	}
	
	public function deleteChefOfTheMonth () {
		$id = array('id'=>$this->input->post('id'));
		$this->db->delete('chef_of_the_month', $id);
	}
	
	public function updateChefOfTheMonth () {
		 $date = strtotime($this->input->post('date'));
		$update = array(
			'name' => base64_encode($this->input->post('name')),
			'year' => date('Y', $date),
			'month' => date('m', $date),
			'description' => base64_encode($this->input->post('description')),
			'main_picture' => base64_encode($this->input->post('main_picture')),
			'photos' => base64_encode($this->input->post('photos')),
		);
		$id = array('id'=>$this->input->post('id'));

		$this->db->update('chef_of_the_month', $update, $id);
		echo $this->db->last_query();

	}
	
	
	/**
	 * new Meals
	 */
	
	public function getNewMeals () {
		$this->db
			->select("*")
			->from("new_meals")
			->order_by('date', 'DESC');
		$result = $this->db->get()->result();
		return $result;
	}
	
	public function getNewMeal ($id) {
		$this->db
			->select("*")
			->from("new_meals")
			->where(array('id'=>$id));
		$result = $this->db->get()->row();
		return $result;
	}
	
	public function saveNewMeal ($meal) {
		$sql = "INSERT INTO `new_meals` (heading, substring, image, comment) VALUES ('{$meal->Heading}', '{$meal->substring}', '{$meal->image}', '{$meal->comment}')";
		$this->db->query($sql);
		echo $sql;
	}
	
	public function updateNewMeal () {
		$param = array(
			'image' 	=> base64_encode($this->input->post('image')),
			'title' 	=> base64_encode($this->input->post('title')),
			'comment'	=> base64_encode($this->input->post('comment')),
		);
		$this->db->update("new_meals", $param, array('id'=>$this->input->post('id')));
	}
	
	public function deleteNewMeal ($id) {
		$sql = "DELETE FROM `new_meals` WHERE `id`='{$id}'";
		$this->db->query($sql);
	}
	
	public function fetch_ings () {
		$this->db
			->select('*')
			->from('ingredients_of_the_month');
			
		return $this->db->get()->result();
	}
}
