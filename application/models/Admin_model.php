<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_model extends CI_Model {
	# angular calls for loading
	public function loadNewDishes () {
		$this->db->order_by ('date', 'desc');
		$data = $this->db->get ('new_meals')->result ();
		foreach ($data as $x) {
			$x->Heading = base64_decode ($x->Heading);
			$x->comment = base64_decode ($x->comment);
		}
		return $data;
	}
	
	public function loadNewPlaces () {
		$this->db->order_by ('date_added', 'desc');
		$data = $this->db->get ('new_places')->result ();
		foreach ($data as $x) {
			$x->title = base64_decode ($x->title);
			$x->description = base64_decode ($x->description);
		}
		return $data;
	}
	
	public function loadChefOfTheMonth () {
		$this->db->where (array (
			'year' =>date ('Y'),
			'month'=>date ('n', strtotime ('-1 month'))
		));
		$data = $this->db->get ('chef_of_the_month')->row ();
		$chef = array(
			'id' => 0,
			'name' => '',
			'description' => '',
			'main_picture' => '',
			'year' => 0,
			'month' => 0
		);
				
		if (isset($data)) {
			$data->name = base64_decode ($data->name);
			$data->description = base64_decode ($data->description);
			$data->main_picture = base64_decode ($data->main_picture);
		} else {
			$data = $chef;
		}
		return $data;
	}
	
	public function loadIngredientsOfTheMonth () {
		$this->db->order_by ('id', 'desc');
		$data = $this->db->get ('ingredients_of_the_month')->result ();
		foreach ($data as $x) {
			$x->name = base64_decode ($x->name);
			$x->image_url = base64_decode ($x->image_url);
			$x->comments = base64_decode ($x->comments);
		}
		return $data;
	}
	
	public function loadShoppingMarkets () {
		$this->db->order_by ('id', 'desc');
		$data = $this->db->get ('shopping_markets')->result ();
		
		foreach ($data as $x) {
			$x->title = base64_decode ($x->title);
			$x->description = base64_decode ($x->description);
			$x->url = $x->url;
			$x->address = base64_decode ($x->address);
		}
		
		return $data;
	}
	
	public function loadCookingTips () {
		$data = $this->db->get ('cooking_tips')->result ();
		foreach ($data as $x) {
			$x->img = base64_decode ($x->img);
			$x->title = base64_decode ($x->title);
			$x->description = base64_decode ($x->description);
		}
		return $data;
	}
	
	public function loadChefs () {
		$data = $this->db->get_where ('users', array ('type'=>CHEF))->result ();
		return $data;
	}
	
	public function loadMeals () {
		$data = $this->db->get ('meals')->result ();
		foreach ($data as $x) {
			$x->comment = base64_decode ($x->comment);
			$x->owner = $this->db->get_where ('users', array ('id'=>$x->owner))->row ();
			$x->image = $this->db->get_where ('meal_images', array ('meal'=>$x->id));
		}
		return $data;
	}
	
	public function loadUsers () {
		$data = $this->db->get_where ('users', array ('type'=>USER))->result ();
		return $data;
	}
	
	# angular calls for update commits
	public function commitNewDishes (array $image) {
		$post = $this->input->post ('post');
		$data = array ();
		$data['Heading'] = base64_encode ($post['Heading']);
		$data['image'] =  base_url ('images/meals')."/".$image['file_name'];
		$data['comment'] = base64_encode ($post['comment']);
		
		if ((int)$post['id'] === 0) {
			$type = 'save';
			$this->db->insert ('new_meals', $data);
			$post['id'] = $this->db->insert_id ();
		} else {
			$type = 'update';
			$this->db->update ('new_meals', $data, array ('id'=>$post['id']));
		}
		return array ('id'=>$post['id'], 'type'=>$type, 'img'=>$data['image']);
	}
	
	public function commitNewPlaces (array $image) {
		$post = $this->input->post ('post');
		$data = array ();
		$data['title'] = base64_encode ($post['title']);
		$data['description'] = base64_encode ($post['description']);
		$data['image_url'] = base_url ('images/meals')."/".$image['file_name'];
		
		if ((int)$post['id'] === 0) {
			$type = 'save';
			$this->db->insert ('new_places', $data);
			$post['id'] = $this->db->insert_id ();
		} else {
			$type = 'update';
			$this->db->update ('new_places', $data, array ('id'=>$post['id']));
		}
		return array ('id'=>$post['id'], 'type'=>$type, 'img'=>$data['image_url']);
	}
	
	public function commitChefOfTheMonth (array $image) {
		$post = $this->input->post ('post');
		$data = array ();
		$data['name'] = base64_encode ($post['name']);
		$data['main_picture'] = base64_encode (base_url ('images/meals')."/".$image['file_name']);
		$data['description'] = base64_encode ($post['description']);
		$data['year'] = $post['year'];
		$data['month'] = $post['month'];
		
		if ((int)$post['id'] === 0) {
			$type = 'save';
			$this->db->insert ('chef_of_the_month', $data);
			$post['id'] = $this->db->insert_id ();
		} else {
			$type = 'update';
			$this->db->update ('chef_of_the_month', $data, array ('id'=>$post['id']));
		}
		return array ('id'=>$post['id'], 'type'=>$type);
	}
	
	public function commitIngOfTheMonth (array $image) {
		$post = $this->input->post ('post');
		$data = array ();
		$data['name'] = base64_encode ($post['name']);
		$post['image_url'] = base_url ('images/meals')."/".$image['file_name'];
		$data['image_url'] = base64_encode ($post['image_url']);
		$data['comments'] = base64_encode ($post['comments']);
		
		if ((int)$post['id'] === 0) {
			$type = 'save';
			$this->db->insert ('ingredients_of_the_month', $data);
			$post['id'] = $this->db->insert_id ();
		} else {
			$type = 'update';
			$this->db->update ('ingredients_of_the_month', $data, array ('id'=>$post['id']));
		}
		return array ('id'=>$post['id'], 'type'=>$type, 'img'=>$post['image_url']);
	}
	
	public function commitShoppingMarkets (array $image) {
		$post = $this->input->post ('post');
		$data = array ();
		$data['title'] = base64_encode ($post['title']);
		$data['description'] = base64_encode ($post['description']);
		$data['url'] =  base_url ('images/meals')."/".$image['file_name'];
		$data['address'] = base64_encode ($post['address']);
		
		if ((int)$post['id'] === 0) {
			$type = 'save';
			$this->db->insert ('shopping_markets', $data);
			$post['id'] = $this->db->insert_id ();
		} else {
			$type = 'update';
			$this->db->update ('shopping_markets', $data, array ('id'=>$post['id']));
		}
		return array ('id'=>$post['id'], 'type'=>$type);
	}
	
	public function commitCookingTips (array $image) {
		$post = $this->input->post ('post');
		$data = array ();
		$data['img'] = base64_encode (base_url ()."/{$image['file_name']}");
		$data['title'] = base64_encode ($post['title']);
		$data['description'] = base64_encode ($post['description']);
		
		if ((int)$post['id'] === 0) {
			$type = 'save';
			$this->db->insert ('cooking_tips', $data);
			$post['id'] = $this->db->insert_id ();
		} else {
			$type = 'update';
			$this->db->update ('cooking_tips', $data, array ('id'=>$post['id']));
		}
		return array ('id'=>$post['id'], 'type'=>$type);
	}
	
	public function commitChefs (array $image) {
		$post = $this->input->post ('post');
		$data = array ();
		$data['address'] = base64_encode ($post['address']);
		$data['email'] = $post['email'];
		$data['username'] = $post['username'];
		$data['type'] = CHEF;
		$data['image_url'] = base_url ()."/{$image['file_name']}";
		$data['activated'] = $post['activated'];
		$data['tel'] = $post['tel'];
		$data['fullname'] = $post['fullname'];
		$data['open_time'] = $post['open_time'];
		$data['close_time'] = $post['close_time'];
		$data['delivery_time'] = $post['delivery_time'];
		
		if ((int)$post['id'] === 0) {
			$data['password'] = md5 ($post['password']);
			$type = 'save';
			$this->db->insert ('users', $data);
			$post['id'] = $this->db->insert_id ();
		} else {
			$type = 'update';
			$this->db->update ('users', $data, array ('id'=>$post['id']));
		}
		return array ('id'=>$post['id'], 'type'=>$type);
	}
	
	public function commitMeals (array $image) {
		$post = $this->input->post ('post');
		$data = array ();
		$data['comment'] = base64_encode ($post['comment']);
		$data['owner'] = $post['owner']['id'];
		$data['ingredients'] = $post['ingredients'];
		$data['activated'] = $post['activated'];
		$data['price'] = $post['price'];
		$data['type'] = $post['type']; # no idea what this is yet
		$data['start_time'] = $post['start_time'];
		$data['end_time'] = $post['end_time'];
		
		$post['image_url'] = base_url ()."/{$images['file_name']}";
		
		if ((int)$post['id'] === 0) {
			$type = 'save';
			$this->db->insert ('meals', $data);
			$post['id'] = $this->db->insert_id ();
			$this->db->insert ('meal_images', array (
				'meal' => $post['id'],
				'image_url' => $post['image_url'],
			));
		} else {
			$type = 'update';
			$this->db->update ('meals', $data, array ('id'=>$post['id']));
		}
		return array ('id'=>$post['id'], 'type'=>$type);
	}
	
	public function commitUsers  (array $image) {
		$post = $this->input->post ('post');
		$data = array ();
		$data['address'] = base64_encode ($post['address']);
		$data['email'] = $post['email'];
		$data['username'] = $post['username'];
		$data['type'] = USER;
		$data['image_url'] = base_url ()."/{$image['file_name']}";
		$data['activated'] = $post['activated'];
		$data['tel'] = $post['tel'];
		$data['fullname'] = $post['fullname'];
		$data['open_time'] = $post['open_time'];
		$data['close_time'] = $post['close_time'];
		$data['delivery_time'] = $post['delivery_time'];
		
		if ((int)$post['id'] === 0) {
			$data['password'] = md5 ($post['password']);
			$type = 'save';
			$this->db->insert ('users', $data);
			$post['id'] = $this->db->insert_id ();
		} else {
			$type = 'update';
			$this->db->update ('users', $data, array ('id'=>$post['id']));
		}
		return array ('id'=>$post['id'], 'type'=>$type);
	}
	
	# angular calls for dropings
	public function dropNewDishes () {
		$id = $this->input->post ('id');
		$this->db->delete ('new_meals', array ('id'=>$id));
		return $id;
	}
	
	public function dropNewPlaces () {
		$id = $this->input->post ('id');
		$this->db->delete ('new_places', array ('id'=>$id));
	}
	
	public function dropChefOfTheMonth () {
		$id = $this->input->post ('id');
		$this->db->delete ('chef_of_the_month', array ('id'=>$id));
	}
	
	public function dropIngOfTheMonth () {
		$id = $this->input->post ('id');
		$this->db->delete ('ingredients_of_the_month', array ('id'=>$id));
	}
	
	public function dropShoppingMarkets () {
		$id = $this->input->post ('id');
		$this->db->delete ('shopping_markets', array ('id'=>$id));
	}
	
	public function dropCookingTips () {
		$id = $this->input->post ('id');
		$this->db->delete ('cooking_tips', array ('id'=>$id));
	}
	
	public function dropChefs () {
		$id = $this->input->post ('id');
		$this->db->delete ('users', array ('id'=>$id));
	}
	
	public function dropMeals () {
		$id = $this->input->post ('id');
		$this->db->delete ('meals', array ('id'=>$id));
	}
	
	public function dropUsers () {
		$id = $this->input->post ('id');
		$this->db->delete ('users', array ('id'=>$id));
	}
}