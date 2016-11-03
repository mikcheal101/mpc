<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

	public $data = array(
		'title' => 'MPC',
		'sub_title' => '',
		'email' => '',
		'myOrders' => array(),
		'plan_login_url' => "",
		'session'=>null,
		'level' => 0,
		'page' => 'user',
		'type' => 'Chefs',
		'description' => 'chef meals',
		'keywords' => 'chef, meals',
	);

	public $fb;

	public function __construct() {
		parent::__construct();
		$this->data['myOrders'] 	= $this->users_model->fetchMyOrders();
		$this->data['sub_title'] 	= "";
		$this->data['isUser'] 		= false;
		$this->data['session'] 		= $_SESSION['user'] ?? null;
	}
	
	public function logout () {
		$_SESSION['user'] = array ();
		unset ($_SESSION['user']);
		redirect ();
	}

	private function getFb (
		$url="http://mypersonalchef.com.ng",
		$title="Gourmet Meals",
		$image="http://mypersonalchef.com.ng/assets/assets/img/logo-light.png",
		$description = "Whatever You Choose Your Stomach Will Thank You. We bring food from the best Chef's in Nigeria to you, cooked uniquely for you. Just browse through your favourite dishes or search through Chefs by their specialties, create a meal plan and have the meals delivered to you at home or at the office. Invite a Chef to come cook at your home or get a great lesson. Whatever you choose, your stomach will thank you",
		$keywords = array("chef", "meals", "My Personal Chef", "Gourmet", "meals", "food", "Nigeria")
		) {
		$this->fb = $this->fb ?? new stdClass ();
		
		$this->fb->url 			= $url;
		$this->fb->title 		= $title;
		$this->fb->image 		= $image;
		$this->fb->description	= $description;
		$this->fb->keywords		= implode(',', $keywords);
	}

	public function chefProfile($id) {
		$this->data['chef'] = $this->users_model->fetchChefById($id);

		if (isset($_SESSION['user'])){
			$this->data['location'] = 3;
			$this->load->view('chef/header', $this->data);
		}
		else {
			$this->load->view('user/header', $this->data);
		}
		$this->load->view('user/chef', $this->data);
		$this->load->view('user/footer', $this->data);
	}

	public function index () {
		$this->data['sub_title'] = "Home";
		$this->data['meals'] = $this->users_model->fetchMeals();
		#var_dump ($_SESSION['user']); return;
		#var_dump ($this->data);
		$this->load->view('home', $this->data);
	}

	public function facebookLogin ($redirectUrl = '') {
		$user = $this->facebook->getUser();
		$this->data['session'] = isset($_SESSION['user'])?$_SESSION['user']:null;

		if ($user) {
			try {
				$this->data['user_profile'] = $this->facebook->api('/me?fields=friends,about,age_range,bio,birthday,email,name');
			} catch (FacebookApiException $e) {
				$user = null;
			}
		} else {
			# $this->facebook->destroySession(); # log user out
		}

		if ($user) {
			$this->data['logout_url'] 		= site_url('user/facebookLogout');
			$this->data['geo']				= $this->getGeoLocation();
			$_SESSION['profile_id']			= $this->users_model->authenticateFacebook($this->data['user_profile']);
			$_SESSION['addedToCart'] 		= 'Meal Added to Cart Successfully!';
		} else {
			$_SESSION['profile_id']			= $this->users_model->authenticateGuest(NULL);
			$_SESSION['addedToCart'] 		= 'Meal Added to Cart Successfully!';
		}

	}

	public function verifyUserFb () {
		$this->data['user_profile'] = array(
			'name' => 'heen'
		);

	}
	
	public function myProfile () {
		
		$this->data['sub_title'] = "My Profile";
		# load meals
		
		$this->data['meals']= $this->users_model->fetchMeals();
		$session = $this->data['session']['user'] ?? null;
		if ($session !== null) {
			$mealplan			= $this->users_model->fetchMealPlan($this->data['user_profile']);
			$this->data['mealPlan'] = array();
			$arr = array();

			$this->load->view('header', $this->data);
			$this->load->view('user/profile', $this->data);
			$this->load->view('user/footer', $this->data);
		} else show_404 ();
		
	}

	public function checkout () {
		$this->users_model->checkout($this->input->post('ids'));
	}

	public function viewChefs () {
		$this->data['chefs'] 		= $this->users_model->loadChefs();

		$chef_name 					= $this->data['chefs'];
		$this->data['sub_title'] 	= "Chef Gallery";

		$this->data['level'] = 2;
		$this->load->view('user/header', $this->data);
		$this->load->view('user/chefs', $this->data);
		$this->load->view('user/footer', $this->data);
	}

	# to be reviewed
	public function make_a_meal_plan () {
		redirect ("");
		$this->data['sub_title'] = "Create a meal plan";
		$this->load->view('user/header', $this->data);
		$this->load->view('user/meal_plan', $this->data);
		$this->load->view('user/footer', $this->data);
	}

	public function ajax_get_meals_for_meal_plan ($x = '', $y = '') {
		if (strlen($y) < 1 || strlen($x) < 1) show_404();
		# get all the meals that fall within that time line
		$data = $this->meals_model->get_meals_for_meal_plan($x, $y);


		$result = array();
		foreach ($data as $x) {
			$x['comment'] = json_decode($x['comment']);
			$result[$x['fullname']][] = $x;
		}


		$sample = array();
		foreach ($result as $key=>$item) {
			$dirty = new Branch();
			$dirty->title = $key;

			foreach($item as $value)
				$dirty->seeds[] = $value;

			$sample[] = $dirty;
		}

		echo json_encode(array($sample));
	}

	
	public function addToSession () {
		$_SESSION['user'] = $this->input->post ('session');
	}
	
	public function redirectUser () {
		$session = $_SESSION['user'] ?? array ();
		if (count ($session) > 0) {
			# get the usertype 
			$type = (int) $session['type'];
			switch ($type) {
				case 1:
					redirect ('administrator/');
				break;
				case 2:
					redirect ('user/');
				break;
				case 3:
					redirect ('chef/myProfile');
				break;
			}
		}
	}
	
	public function forumBoard () {
		$this->data['sub_title'] = "Forum Board";
		$this->load->view('user/header', $this->data);
		$this->load->view('forum/forum_board', $this->data);
		$this->load->view("user/footer", $this->data);
	}

	public function toChefsWithLove () {
		$this->data['sub_title'] = "To Chefs With Love";
		$this->load->view('user/header', $this->data);
		$this->load->view('user/to_chefs_with_love', $this->data);
		$this->load->view('user/footer', $this->data);
	}

	public function shoppingCart () {
		$this->data['level'] = 4;
		$this->data['sub_title'] = "Shopping Cart";
		$this->load->view('user/header', $this->data);
		$this->load->view('user/shopping_cart', $this->data);
		$this->load->view('user/footer', $this->data);
	}

	public function newDishes () {
		$this->data['dishes'] = $this->meals_model->getNewMeals();

		$this->data['sub_title'] = "New Dishes";
		$this->load->view('user/header', $this->data);
		$this->load->view('user/new_dishes', $this->data);
		$this->load->view('user/footer', $this->data);
	}

	public function newDishesSub ($id = 0) {
		if ($id === 0) show_404();
		else {
			$this->data['dish'] = $dish = $this->meals_model->getNewMeal($id);
			if (count($this->data['dish']) < 1) show_404();
			else {
				#var_dump($dish);
				$this->data['sub_title'] = $dish->Heading;
				$this->load->view('user/header', $this->data);
				$this->load->view('user/new_dishes_sub', $this->data);
				$this->load->view('user/footer', $this->data);
			}
		}
	}

	public function newPlaces () {
		$this->data['sub_title'] = "New Places";
		$this->load->view('user/header', $this->data);
		$this->load->view('user/new_places', $this->data);
		$this->load->view('user/footer', $this->data);
	}

	public function newPlacesSub () {
		$this->load->view('user/header', $this->data);
		$this->load->view('user/new_places_sub', $this->data);
		$this->load->view('user/footer', $this->data);
	}

	public function chefOfTheMonth () {

		# fetch the data from the users_model
		$chef = $this->users_model->getChefOfTheMonth();
		if ($chef === NULL) {
			show_404();
		} else {
			$this->data['chef'] = $chef;
			$this->data['sub_title'] = "Chef of the month";
			$this->load->view('user/header', $this->data);
			$this->load->view('user/chef_of_the_month', $this->data);
			$this->load->view('user/footer', $this->data);
		}
	}

	public function ingredientsOfTheMonth () {
		$this->data['ings'] = $this->meals_model->fetch_ings ();
		$this->data['sub_title'] = "Ingridients of the month";
		$this->load->view('user/header', $this->data);
		$this->load->view('user/ingredients_of_the_month', $this->data);
		$this->load->view('user/footer', $this->data);
	}

	public function shoppingMarkets () {
		$this->data['sub_title'] = "Shopping & Markets";
		$this->load->view('user/header', $this->data);
		$this->load->view('user/shopping_markets', $this->data);
		$this->load->view('user/footer', $this->data);
	}

	public function shoppingMarketsSub ($id=0) {
		$this->data['sub_title'] = "Shopping & Markets";
		$this->load->view('user/header', $this->data);
		$this->load->view('user/shopping_markets_sub', $this->data);
		$this->load->view('user/footer', $this->data);
	}

	public function cookingTips () {
		$this->data['user_profile'] = NULL;
		if (isset($_SESSION['fb_profile_id']))
			$this->data['user_profile'] = $this->facebook->api('/me?fields=friends,about,age_range,bio,birthday,email,name');

		$data = $this->meals_model->getCookingTips();
		if ($data !== NULL) {
			$this->data['cookingTips'] = $data;
			$this->data['sub_title'] = "Cooking Tips";
			$this->load->view('user/header', $this->data);
			$this->load->view('user/cooking_tips', $this->data);
			$this->load->view('user/footer', $this->data);
		} else {
			show_404();
		}
	}

	public function cookingTipsSub ( $id = 0) {
		$cookingTip = $this->meals_model->getCookingtTip();
		if ($cookingTip !== NULL) {
			$this->data['cookingTip'] = $cookingTip;
			$this->data['sub_title'] = "Cooking Tip";
			$this->load->view('user/header', $this->data);
			$this->load->view('user/cooking_tips_Sub', $this->data);
			$this->load->view('user/footer', $this->data);
		} else {
			show_404();
		}


	}

	public function addMeal () {

		# day:day, time:time, meal:meal, servings:servings
		$meal = array(
			'day'	=> $this->input->post('day'),
			'time'	=> $this->input->post('time'),
			'meal'	=> $this->input->post('meal'),
			'servings'=> $this->input->post('servings'),
		);

		$this->users_model->saveToTable($meal, $this->data['user_profile']);
	}

	public function viewMeals () {
		#load all the meals here
		$this->data['level'] = 3;
		$this->data['meals'] = $this->users_model->fetchMeals();
		$this->data['sub_title'] = "Meal Gallery";
		$this->load->view('user/header', $this->data);
		$this->load->view('user/meals', $this->data);
		$this->load->view('user/footer', $this->data);
	}

	public function meal ($id = 0) {
		if ($id == null || $id == 0) show_404();

		else {
			$this->data['level'] = 3;
			$food = $this->meals_model->getMeal($id);
			$this->data['meal'] = $food;
			
			
			$this->getFb(
				base_url("user/meal/{$food->meal_id}"),
				$food->name." by Chef ".$food->chef_username,
				$food->image_url,
				base64_decode($food->comment),
				array(
					"Chef ".$food->chef_username,
					$food->name,
					"MPC", "Nigeria"
					)
				);
			$this->data['sub_title'] = $food->name." by Chef ".$food->chef_username;
			$this->load->view('user/header', $this->data);
			$this->load->view('user/view_meal', $this->data);
			$this->load->view('user/footer', $this->data);
		}
	}


	public function clearCart () {
		unset($_SESSION['cart']);
	}

	public function addToCart (int $id, $servings, $url = '') {
		# add this to the cart database
		#$this->facebookLogin();

		if (!isset($_SESSION['cart'])) {
			$cart = new stdClass();
			$cart->mealId 	= (int) $id;
			$cart->servings	= (int) $servings;
			$_SESSION['cart'][] = $cart;
		} else {
			$found = FALSE;
			foreach ($_SESSION['cart'] as $cart) {
				if ($cart->mealId === $id) {
					$cart->servings += $servings;
					$found = TRUE;
					break;
				}
			}

			if (!$found) {
				$cart = new stdClass();
				$cart->mealId 	= (int) $id;
				$cart->servings	= (int) $servings;
				$_SESSION['cart'][] = $cart;
			}
		}

		unset($_POST);
		echo json_encode($_SESSION['cart']);
	}

	public function myOrders () {
		# this is where all the orders for this user for the day is displayed with teir payment status
		$this->facebookLogin();
		$this->verifyUserFb("myOrders");

		$this->details['myOrders'] = $this->users_model->fetchMyOrders ();

		$this->loadView('user/myOrders');
		$this->load->view('user/footer', $this->data);
	}

	# under review
	public function facebookLogout() {
		unset($_SESSION['fb_profile_id']);
		$this->facebook->destroySession(); # log user out
		# website session also has to be destroyed
		redirect('user/index');
	}

	private function loadView($file){
		$this->load->view('header', $this->data);
		$this->load->view($file, $this->data);
		$this->load->view('user/footer', $this->data);
	}

	/**
	 * methods that are called by ajax
	 */

	public function ajaxAuthenticateUser () {
		$result = $this->users_model->ajaxAuthenticateUser ();
		echo json_encode (
			array (
				'status'	=> ($result) ? 200 : 400,
				'message' 	=> ($result) ? 'User Found!' : 'No such User!',
				'object'	=> $result,
			)
		);
	}
	
	
	public function ajaxCall_fetchChefs () {
		echo json_encode($this->users_model->loadChefs());
	}

	public function ajaxCall_fetchMeals () {
		echo json_encode($this->users_model->fetchMeals());
	}

	public function ajaxCall_fetchOrders () {
		# get all the orders

		echo json_encode(isset($_SESSION['cart'])?$_SESSION['cart']:array());
		# echo json_encode($this->users_model->fetchMyOrders());
	}

	public function ajaxCall_initPayment () {
		$payment 			= new stdClass();
		$payment->ccn 		= $this->input->post('ccn');
		$payment->cvv 		= $this->input->post('cvv');
		$payment->exp 		= $this->input->post('exp');
		$payment->amount 	= $this->input->post('amount');
		$payment->email		= $this->input->post('email');
		$payment->tel		= $this->input->post('tel');
		$payment->tCode 	= md5(time()."-".$this->input->post('email'));
		$payment->orders	= $this->input->post('orders');

		# get the price to pad to the total sum
		$this->getPricePadding($payment->orders);

		# use the api created for sending this to the payment gateway

		# make payment
		$this->makePayment();

		# send email to delivery agency
		$this->sendEmailToDeliveryAgency();

		# send email to client about delivery
		$this->sendEmailToClient();

		# send details to database
		$this->sendDetailsToDatabase();
	}

	public function ajaxCall_initPod () {
		$payment 			= new stdClass();
		$payment->amount 	= $this->input->post('amount');
		$payment->email		= $this->input->post('email');
		$payment->tel		= $this->input->post('tel');
		$payment->tCode 	= md5(time()."-".$this->input->post('email'));
		$payment->orders	= $this->input->post('orders');

		# get the price to pad to the total sum
		$this->getPricePadding($payment->orders);

		# send email to delivery agency
		$this->sendEmailToDeliveryAgency();

		# send email to client about delivery
		$this->sendEmailToClient();

		# send details to database
		$this->sendDetailsToDatabase();

	}

	private function makePayment () {}

	private function sendEmailToDeliveryAgency () {}

	private function sendEmailToClient () {}

	private function sendDetailsToDatabase () {
		# required items
		# - transaction code
		# - email address
		# - tel number
		# - delivery address
		# - order
		# - total amount

	}

	private function getPricePadding ($meal = NULL) {
		if ($meal === NULL) return 0;

		$padding = $this->meal_model->getMealCharges($meal);
		return $padding->serviceCharge + $padding->deliveryCharge;
	}

	private function getGeoLocation () {
		$ip 	= $_SERVER['REMOTE_ADDR'];
		$geo 	= json_decode(file_get_contents("http://ipinfo.io/"));
		$loc	= explode(",", $geo->loc);

		$address= new stdClass();
		$address->ip = $ip;
		$address->latitude 	= $loc[0];
		$address->longitude = $loc[1];
		return $address;
	}

    public function registerGuest () {
    	$guest = new stdClass();
    	$guest->email = $this->input->post('email');
		$guest->name = $this->input->post('email');
		$this->users_model->saveGuest($guest);
    }
	
	

}



class Branch {

	public $title;
	public $seeds;

	public function __construct () {
		$this->title = "";
		$this->seeds = array();
	}

}
