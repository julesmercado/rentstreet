<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
session_start(); //we need to call PHP's session object to access it through CI
	Class Accounts extends CI_Controller{

		public function __construct(){
			parent::__construct();
			$this->load->model('rent_model');
			$this->load->library('form_validation');
			$this->load->library('session');	
		}

		public function index(){
			$this->landingPage();
		}

		public function landingPage(){
			$this->load->view('layouts/landing-header');
			$this->load->view('clients/landing-page');
			$this->load->view('layouts/landing-footer');

			
		}

		public function landingPageAngular(){
			// $data = array('title' => 'RentStreet.ph',
			// 	'categories' => $this->rent_model->getCategories(),
			// 	'path' => $this->rent_model->viewItems(),
			// 	'details' => $this->rent_model->retrieveDetails()
			// 	);
			$data = array(
				'items'    	 =>$this->rent_model->getSearchItemsLanding(),
				'categories' => $this->rent_model->getCategories()
				);
			echo json_encode($data);
			// json_encode("fsadfsaf000");
		}

		public function mainPage(){
			if($this->session->userdata('logged_in')){
				$session_data = $this->session->userdata('logged_in');
				$data = array(
					'user_id' => $session_data['user_id'],
					'email' => $session_data['email'],
					'username' => $session_data['username'],
					'password' => $session_data['password'],
					'name' => $session_data['name'],
					'contact' => $session_data['contact'],
					'address' => $session_data['address'],
					'images' => $session_data['images'],
					'path' => $this->rent_model->retrieveDetails(),
					'categories' => $this->rent_model->getCategories(),
					'details' => $this->rent_model->viewItems()
					);
				$this->load->view('layouts/main-header',array(
					'title' => 'RentStreet.ph'
					));
				$this->load->view('clients/main-page',$data);
				$this->load->view('layouts/main-footer');
			} else {
				redirect('landing-page');
			}
		}

		public function createAccountView(){
			$this->load->view('layouts/create-account-header',array(
				'title' => 'RentStreet.ph'
				));
			$this->load->view('clients/create-account');
			$this->load->view('layouts/create-account-footer');
		}

		public function registerAccount(){
			$this->form_validation->set_rules('email','Email Address','trim|required|xss_clean|valid_email|is_unique[clients.email]');
			$this->form_validation->set_rules('username','Username','trim|required|xss_clean|min_length[6]|max_length[12]|is_unique[clients.username]');
			$this->form_validation->set_rules('password','Password','trim|required|xss_clean|min_length[6]|max_length[12]');
			if($this->form_validation->run()){
			$data = array(
				'email' => $this->input->post('email',true),
				'username' => $this->input->post('username',true),
                'password' => md5($this->input->post('password', true)),
                'registered_on' => date('Y-m-d')
				);

				$confirm = $this->rent_model->accountVerify($data);

				if ($confirm) {
	            	$this->flashMessages(array(
	                'msg' => '<div class="alert alert-success text-center" style="font-size: 13px;" role="alert">Successfully Registered! <br/> You can now login your account.</div>',
	                'url' => base_url('login-account')
	            	));
				} else {
					redirect('landing-page');
				}
			} else {
				$this->createAccountView();
			}
		}

		public function loginView(){
			$this->load->view('layouts/login-header',array(
				'title' => 'RentStreet.ph',
				'record' => $this->rent_model->getLogin()
				));
			$this->load->view('clients/login-account');
			$this->load->view('layouts/login-footer');
		}

		public function clientLogin(){
			$this->form_validation->set_rules('username', 'Username', 'trim|required|xss_clean');
		   	$this->form_validation->set_rules('password', 'Password', 'trim|required|xss_clean|callback_check_database');

		   if($this->form_validation->run()){
		   	$id = $this->input->post('user_id');
		   	$data = array(
		   		'last_login' => date('Y-m-d H:i:s')
		   		);

		   	$confirm = $this->rent_model->validateLogin($data,$id);

		   	if($confirm){	
		   //Go to private area
		    redirect('member-page');
		   } else {
		   	var_dump($confirm);
		   }
		} else {
		     $this->loginView();
		   }
		}

		public function memberPage(){
			if($this->session->userdata('logged_in')){
				$session_data = $this->session->userdata('logged_in');
				$data = array(
					'user_id' => $session_data['user_id'],
					'email' => $session_data['email'],
					'username' => $session_data['username'],
					'password' => $session_data['password'],
					'name' => $session_data['name'],
					'contact' => $session_data['contact'],
					'address' => $session_data['address'],
					'images' => $session_data['images'],
					'categories' => $this->rent_model->getCategories()
					);
				$this->load->view('layouts/member-header',array(
					'title' => 'RentStreet.ph'
					));
				$this->load->view('clients/member-page',$data);
				$this->load->view('layouts/member-footer');	
			} else {
				redirect('landing-page');
			}
		}

		public function myProfileView(){
			if($this->session->userdata('logged_in')){
				$session_data = $this->session->userdata('logged_in');
				$data = array(
					'user_id' => $session_data['user_id'],
					'email' => $session_data['email'],
					'username' => $session_data['username'],
					'password' => $session_data['password'],
					'name' => $session_data['name'],
					'contact' => $session_data['contact'],
					'address' => $session_data['address'],
					'images' => $session_data['images'],
					'record' =>  $this->rent_model->getProfile($session_data['user_id']),
					'categories' => $this->rent_model->getCategories()
					);
				
				$this->load->view('layouts/profile-header',array(
					'title' => 'RentStreet.ph'
					));
				$this->load->view('profiles/my-profile',$data);
				$this->load->view('layouts/profile-footer');
			} else {
				redirect('landing-page');
			}
		}

		public function otherProfileView(){
			if($this->session->userdata('logged_in')){
				$session_data = $this->session->userdata('logged_in');
				$data = array(
					'user_id' => $session_data['user_id'],
					'email' => $session_data['email'],
					'username' => $session_data['username'],
					'password' => $session_data['password'],
					'name' => $session_data['name'],
					'contact' => $session_data['contact'],
					'address' => $session_data['address'],
					'images' => $session_data['images']
					);
				$this->load->view('layouts/other-header',array(
					'title' => 'RentStreet.ph'
					));
				$this->load->view('profiles/other-profile',$data);
				$this->load->view('layouts/other-footer');
			} else {
				redirect('landing-page');
			}
		}

		public function myAdsView(){
			if($this->session->userdata('logged_in')){
				$session_data = $this->session->userdata('logged_in');
				$path = $this->rent_model->retrieveItem($session_data['user_id']);
				$data = array(
					'user_id' => $session_data['user_id'],
					'email' => $session_data['email'],
					'username' => $session_data['username'],
					'password' => $session_data['password'],
					'name' => $session_data['name'],
					'contact' => $session_data['contact'],
					'address' => $session_data['address'],
					'images' => $session_data['images'],
					'path' => $path,
					'categories' => $this->rent_model->getCategories()
					);
				$this->load->view('layouts/my-ads-header');
				$this->load->view('items/my-ads',$data);
				$this->load->view('layouts/my-ads-footer');
			} else {
				redirect('landing-page');
			}
		}

		public function viewItem($id){
			if($this->session->userdata('logged_in')){
				$session_data = $this->session->userdata('logged_in');
				$queryDetails = $this->rent_model->getDetails($id);
				$data = array(
					'user_id' => $session_data['user_id'],
					'email' => $session_data['email'],
					'username' => $session_data['username'],
					'password' => $session_data['password'],
					'name' => $session_data['name'],
					'contact' => $session_data['contact'],
					'address' => $session_data['address'],
					'images' => $session_data['images'],
					'details' => $queryDetails,
					'categories' => $this->rent_model->getCategories()
					);
				$data['comments'] = $this->db->query("SELECT * from comments LEFT JOIN clients on clients.user_id = comments.user_id where post_id=".$id." order by id desc")->result();
				$this->load->view('layouts/view-header',array(
					'title' => 'RentStreet.ph',
					));
				$this->load->view('items/view-items',$data);
				$this->load->view('layouts/view-footer');
			} else {
				redirect('landing-page');
			}
		}

		public function borrowedItems(){
			if($this->session->userdata('logged_in')){
				$session_data = $this->session->userdata('logged_in');
				$data = array(
					'user_id' => $session_data['user_id'],
					'email' => $session_data['email'],
					'username' => $session_data['username'],
					'password' => $session_data['password'],
					'name' => $session_data['name'],
					'contact' => $session_data['contact'],
					'address' => $session_data['address'],
					'images' => $session_data['images'],
					'categories' => $this->rent_model->getCategories()
					);
				$this->load->view('layouts/borrowed-header',array(
					'title' => 'RentStreet.ph'
					));
				$this->load->view('items/borrowed-items',$data);
				$this->load->view('layouts/borrowed-footer');
			} else {
				redirect('landing-page');
			}
		}

		public function itemRequest(){
			if($this->session->userdata('logged_in')){
				$session_data = $this->session->userdata('logged_in');
				$data = array(
					'user_id' => $session_data['user_id'],
					'email' => $session_data['email'],
					'username' => $session_data['username'],
					'password' => $session_data['password'],
					'name' => $session_data['name'],
					'contact' => $session_data['contact'],
					'address' => $session_data['address'],
					'images' => $session_data['images']
					);
				$this->load->view('layouts/request-header',array(
					'title' => 'RentStreet.ph'
					));
				$this->load->view('items/item-request',$data);
				$this->load->view('layouts/request-footer');
			} else {
				redirect('landing-page');
			}
		}

		public function myRentedItems(){
			if($this->session->userdata('logged_in')){
				$session_data = $this->session->userdata('logged_in');
				$data = array(
					'user_id' => $session_data['user_id'],
					'email' => $session_data['email'],
					'username' => $session_data['username'],
					'password' => $session_data['password'],
					'name' => $session_data['name'],
					'contact' => $session_data['contact'],
					'address' => $session_data['address'],
					'images' => $session_data['images'],
					'categories' => $this->rent_model->getCategories()
					);
				$this->load->view('layouts/myrented-header',array(
					'title' => 'RentStreet.ph'
					));
				$this->load->view('items/myrented-items',$data);
				$this->load->view('layouts/myrented-footer');
			} else {
				redirect('landing-page');
			}
		}

		public function returnedItems(){
			if($this->session->userdata('logged_in')){
				$session_data = $this->session->userdata('logged_in');
				$data = array(
					'user_id' => $session_data['user_id'],
					'email' => $session_data['email'],
					'username' => $session_data['username'],
					'password' => $session_data['password'],
					'name' => $session_data['name'],
					'contact' => $session_data['contact'],
					'address' => $session_data['address'],
					'images' => $session_data['images'],
					'categories' => $this->rent_model->getCategories()
					);
				$this->load->view('layouts/returned-header',array(
					'title' => 'RentStreet.ph'
					));
				$this->load->view('items/returned-items',$data);
				$this->load->view('layouts/returned-footer');
			} else {
				redirect('landing-page');
			}
		}

		public function searchResults(){
			if($this->session->userdata('logged_in')){
				$session_data = $this->session->userdata('logged_in');
				$data = array(
					'user_id' => $session_data['user_id'],
					'email' => $session_data['email'],
					'username' => $session_data['username'],
					'password' => $session_data['password'],
					'name' => $session_data['name'],
					'contact' => $session_data['contact'],
					'address' => $session_data['address'],
					'images' => $session_data['images'],
					'categories' => $this->rent_model->getCategories()
					);
				$this->load->view('layouts/search-header',array(
					'title' => 'RentStreet.ph'
					));
				$this->load->view('items/search-results',$data);
				$this->load->view('layouts/search-footer');
			} else {
				redirect('landing-page');
			}
		}

		public function check_database($password)
		 {
		   //Field validation succeeded.  Validate against database
		   $username = $this->input->post('username');

		   //query the database
		   $result = $this->rent_model->login($username, md5($password));

		   if($result)
		   {
		     $sess_array = array(
		         'user_id' => $result['user_id'],
		         'email' => $result['email'],
		         'username' => $result['username'],
		         'password' => $result['password'],
		         'name' => $result['name'],
		         'contact' => $result['contact'],
		         'address' => $result['address'],
		         'images' => $result['images'] 
		       );
		       $this->session->set_userdata('logged_in', $sess_array);
		     return TRUE;
		   }
		   else
		   {
		     $this->form_validation->set_message('check_database', 'The username or password you entered is incorrect.');
		     return false;
		   }
		 }

		private function flashMessages($data){
        $this->session->set_flashdata('notify', $data['msg']);
        $this->output->set_header("Location:".$data['url']);
    	}

    	public function logout(){
			$this->session->unset_userdata('logged_in');
   			session_destroy();
			redirect('landing-page','refresh');
		}


		public function itemRequestRent(){

			$post = json_decode(file_get_contents('php://input'));
			$status = $this->rent_model->itemRequest($post);

			echo json_encode( $post );

		}

		public function cancelRequest(){

			$status = 'Canceled';

			$post = json_decode(file_get_contents('php://input'));
			$updateStatus = $this->rent_model->updateStatusRequest($post, $status);
			$deleteRequest = $this->rent_model->itemRequestCancel($post);

			echo json_encode( $updateStatus );

		}

		public function viewOtherProfile($borrowers_id){
			if($this->session->userdata('logged_in')){
				$session_data = $this->session->userdata('logged_in');
				$data = array(
					'user_id' => $session_data['user_id'],
					'email' => $session_data['email'],
					'username' => $session_data['username'],
					'password' => $session_data['password'],
					'name' => $session_data['name'],
					'contact' => $session_data['contact'],
					'address' => $session_data['address'],
					'images' => $session_data['images'],
					'categories' => $this->rent_model->getCategories(),
					'borrowers_id' => $borrowers_id
					);
				$this->load->view('layouts/view-other-profile-header');
				$this->load->view('profiles/other-profile',$data);
				$this->load->view('layouts/view-other-profile-footer');
		}
	}
}
?>