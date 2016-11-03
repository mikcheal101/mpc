<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Administrator extends CI_Controller {
	
	private $data = array(
		'title' => 'MPC',
		'sub_title' => '',
		'page' => 'user',
		'type' => 'Chefs',
		'description' => 'chef meals',
		'keywords' => 'chef, meals',
	);
		
	public function __construct() {
		parent::__construct();
		$this->data['user'] = (isset($_SESSION['user'])) ? $_SESSION['user']:array();
		$this->data['sub_title'] = "Admin Portal";
	}
	
	public function index () {
		$this->verifyUser();
		$this->data['sub_title'] = "Home";
		$this->load->view ('admin/head', $this->data);
		$this->load->view ('admin/side', $this->data);
		$this->load->view ('admin/footer', $this->data);
	}
	
	public function verifyUser () {
		if (!isset($_SESSION['user'])) {
			redirect('user/logout');
		}
	}
	
	public function signOut () {
		redirect('user/logout');
	}
	
	public function new_dishes () {
		$this->verifyUser();
		$this->loadPage ("admin/dishes");
	}
	
	public function new_places () {
		$this->verifyUser ();
		$this->loadPage ('admin/places');
	}
	
	public function chef_of_the_month () {
		$this->verifyUser ();
		$this->loadPage ('admin/chef_of_the_month');
	}
	
	public function ingredients_of_the_month () {
		$this->verifyUser ();
		$this->loadPage ('admin/ingredients');
	}
	
	public function shopping_and_markets () {
		$this->verifyUser ();
		$this->loadPage ('admin/shopping_markets');
	}
	
	public function cooking_tips () {
		$this->verifyUser ();
		$this->loadPage ('admin/cooking_tips');
	}
	
	private function loadPage ($uri) {
		$this->load->view ('admin/head', $this->data);
		$this->load->view ('admin/side', $this->data);
		$this->load->view ($uri, $this->data);
		$this->load->view ('admin/footer', $this->data);
	}
	
	private function result ($object) {
		echo json_encode (array (
			'result'=>$object,
			'status'=> is_null ($object) ? 400 : 200
		));
	}
	
	# angular calls for loading
	public function loadNewDishes () {
		$this->result ($this->admin_model->loadNewDishes ());
	}
	
	public function loadNewPlaces () {
		$this->result ($this->admin_model->loadNewPlaces ());
	}
	
	public function loadChefOfTheMonth () {
		$this->result ($this->admin_model->loadChefOfTheMonth ());
	}
	
	public function loadIngredientsOfTheMonth () {
		$this->result ($this->admin_model->loadIngredientsOfTheMonth ());
	}
	
	public function loadShoppingMarkets () {
		$this->result ($this->admin_model->loadShoppingMarkets ());
	}
	
	public function loadCookingTips () {
		$this->result ($this->admin_model->loadCookingTips ());
	}
	
	public function loadChefs () {
		$this->result ($this->admin_model->loadChefs ());
	}
	
	public function loadMeals () {
		$this->result ($this->admin_model->loadMeals ());
	}
	
	public function loadUsers () {
		$this->result ($this->admin_model->loadUsers ());
	}
	
	# angular calls for update commits
	public function commitNewDishes () {
		if ($this->upload->do_upload ('files')) 
			$this->result ($this->admin_model->commitNewDishes ($this->upload->data ()));
	}
	
	public function commitNewPlaces () {
		if ($this->upload->do_upload ('files')) {
			$this->result ($this->admin_model->commitNewPlaces ($this->upload->data ()));
		} 
	}
	
	public function commitChefOfTheMonth () {
		if ($this->upload->do_upload ('files')) {
			$this->result ($this->admin_model->commitChefOfTheMonth ($this->upload->data ()));
		} 
	}
	
	public function commitIngOfTheMonth () {
		if ($this->upload->do_upload ('files')) {
			$this->result ($this->admin_model->commitIngOfTheMonth ($this->upload->data ()));
		} 
	}
	
	public function commitShoppingMarkets () {
		if ($this->upload->do_upload ('files'))
		$this->result ($this->admin_model->commitShoppingMarkets ($this->upload->data ()));
	}
	
	public function commitCookingTips () {
		if ($this->upload->do_upload ('files')) {
			$this->result ($this->admin_model->commitCookingTips ($this->upload->data ()));
		} 
	}
	
	public function commitChefs () {
		if ($this->upload->do_upload ('files')) {
			$this->result ($this->admin_model->commitChefs ($this->upload->data ()));
		} 
	}
	
	public function commitMeals () {
		if ($this->upload->do_upload ('files')) {
			$this->result ($this->admin_model->commitMeals ($this->upload->data ()));
		} 
	}
	
	public function commitUsers  () {
		if ($this->upload->do_upload ('files')) {
			$this->result ($this->admin_model->commitUsers ($this->upload->data ()));
		} 
	}
	
	# angular calls for dropings
	public function dropNewDishes () {
		$this->result ($this->admin_model->dropNewDishes () );
	}
	
	public function dropNewPlaces () {
		$this->result ($this->admin_model->dropNewPlaces ());
	}
	
	public function dropChefOfTheMonth () {
		$this->result ($this->admin_model->dropChefOfTheMonth ());
	}
	
	public function dropIngOfTheMonth () {
		$this->result ($this->admin_model->dropIngOfTheMonth ());
	}
	
	public function dropShoppingMarkets () {
		$this->result ($this->admin_model->dropShoppingMarkets ());
	}
	
	public function dropCookingTips () {
		$this->result ($this->admin_model->dropCookingTips ());
	}
	
	public function dropChefs () {
		$this->result ($this->admin_model->dropChefs ());
	}
	
	public function dropMeals () {
		$this->result ($this->admin_model->dropMeals ());
	}
	
	public function dropUsers () {
		$this->result ($this->admin_model->dropUsers ());
	}
	
	
}

?>