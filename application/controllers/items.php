<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); header('Access-Control-Allow-Origin: *'); 

	Class Items extends CI_Controller{

		public function __construct(){
			parent::__construct();
			$this->load->model('rent_model');
			$this->load->library('form_validation', 'pagination');
			$this->load->helper('date');
		}

		
		public function comment()
		{
			$data = array(
				'post_id' => $this->input->post('id'),
				'content' => $this->input->post('content'),
				'commented_on'	=> Date('Y-m-d H:m:s'),
				'user_id'	=> $this->input->post('user_id')
				);
			$this->rent_model->add_comment($data);
			$res = $this->rent_model->get_comment($data);
			echo json_encode($res);
		}

		public function postItem(){
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
				$validateFullName['record'] = $this->rent_model->fillUpValidationFullName($data['user_id']);

				foreach ($validateFullName as $fullName) {
					if($fullName->name == true && $fullName->email == true && $fullName->contact == true && $fullName->address == true){
					$this->load->view('layouts/upload-header',array(
					'title' => 'RentStreet.ph'
						));
					$this->load->view('items/upload-items',$data);
					$this->load->view('layouts/upload-footer');
			
				} else {
		            $this->flashMessages(array(
		            'msg' => '<div class="alert alert-danger text-center" style="font-size: 13px; margin-right: 300px; margin-left: 300px;" role="alert">Please fill up your personal information!</div>',
		            'url' => base_url('my-profile')
		            ));
				}
			}
			}
		}

		public function addItem(){
			$this->load->helper('form');

	        //Configure
	        //set the path where the files uploaded will be copied. NOTE if using linux, set the folder to permission 777
	        $config['upload_path'] = 'assets/uploads';

	    	// set the filter image types
	        $config['allowed_types'] = 'gif|jpg|png|jpeg';

	        //load the upload library
	        $this->load->library('upload', $config);

	        $this->upload->initialize($config);

	        $this->upload->set_allowed_types('*');

	        $this->form_validation->set_rules('location','Ad Location','trim|required|xss_clean|min_length[6]');
			$this->form_validation->set_rules('price','Price','trim|required|xss_clean|min_length[2]');
			$this->form_validation->set_rules('title','Ad Title','trim|required|xss_clean|min_length[6]');
			$this->form_validation->set_rules('description','Ad Description','trim|required|xss_clean|min_length[10]');

			if($this->form_validation->run()){

		        $id = $this->input->post('user_id');
	            $data = array(
	            	'cat_id' => $this->input->post('category',true),
	            	'location' => ucwords($this->input->post('location',true)),
	            	'price' => $this->input->post('price',true),
	            	'daily' => $this->input->post('daily',true),
	            	'title' => ucwords($this->input->post('title',true)),
	            	'description' => $this->input->post('description',true),
	            	'status'	  => $this->input->post('status',true),
	            	'created_on'  => date('Y-m-d'),
	        	    'user_id' 	  => $id
	            );
	            print_r($data);
	            $confirm = $this->rent_model->uploadItem($data);
	        	
	           if($confirm)
	           {
	              /*redirect('profile/profileView/'.$id);*/
	              for($i=0 ; $i<=6 ; $i++){
		        	if (!$this->upload->do_upload('userfile'.$i)) {
		            	//$data = array('error' => $this->upload->display_errors());
		        
		        	} else { //else, set the success message
		        		$post_id = $this->db->where($data)->get('items')->result();
		            	$data1 = $this->upload->data();
		            	$img = array(
		            		'post_id' 	=> $post_id[0]->id,
		            		'img_path'		=> $data1['full_path']
		            		);
		        		$this->db->insert('images',$img);
		        	}
		    	}
	              redirect('my-ads');
	           }else{
	           	
	              redirect('my-ads');
	           }
	        } else {
	        	$this->postItem();
	        }
	    }


		public function deleteItem($id){

	        $confirm = $this->rent_model->deleteItem(
	            array('id' => $id)
	        );

				$session_data = $this->session->userdata('logged_in');
	         if($confirm) {
	            redirect('my-ads');
	        } else {
	        	redirect('landing-page');
	        }
		}

		public function viewDetails($id){
			$searchKey = $this->input->post('search', true);
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
					'searchKey' => $searchKey
					);
				
				$this->load->view('layouts/view-header',array(
				'title' => 'RentStreet.ph',
				'categories' => $this->rent_model->getCategories(),
				'details' => $this->rent_model->getDetails($id)
				));
				$this->load->view('items/view-details',$data);
				$this->load->view('layouts/view-footer');
				// var_dump($data);
			}
			
			
		}

		public function searchOutput(){
			// $itemSearch = $this->input->post('search',true);
			// $post = json_decode(file_get_contents('php://input'))
			$post = $_POST['search_item'];
			$data = $this->rent_model->getSearchItems($post);
			
			echo json_encode($data);

			// echo json_encode($itemSearch);
		}
		public function searchOutputPage(){
			$searchKey = $_GET["search"];
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
					'searchKey' => $searchKey
					);
				
				$this->load->view('layouts/search-header',array(
					'title' => 'RentStreet.ph'
						));
				$this->load->view('items/search-results',$data);
				$this->load->view('layouts/search-footer');
				// var_dump($data);
			}
			}

		public function getCatOnly(){
			$post = json_decode(file_get_contents('php://input'));
			$data = $this->rent_model->getCategories();

			echo json_encode($data);
		}

		public function countNotification(){
			$post = json_decode(file_get_contents('php://input'));
			$data = $this->rent_model->getCountNotification($post);
			echo json_encode($data);
		}

		public function notifications(){

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
					
					);
				
				$this->load->view('layouts/request-header',array(
				'title' => 'RentStreet.ph'
				));
				$this->load->view('items/item-request',$data);
				$this->load->view('layouts/request-footer');
		}

		public function getNotificationInfo(){
			$post = json_decode(file_get_contents('php://input'));
			$data = $this->rent_model->getNotification($post);
			echo json_encode($data);
		}

		public function getOtherInfo(){
			$post = json_decode(file_get_contents('php://input'));
			$data = $this->rent_model->getSingleInfo($post);
			echo json_encode($data);
		}

		public function getMyAds(){
			$post = json_decode(file_get_contents('php://input'));
			$data = $this->rent_model->getAds($post);
			echo json_encode($data);
		}

		public function getMyRentedAds(){
			$post = json_decode(file_get_contents('php://input'));
			$data = $this->rent_model->getMyRented($post);
			echo json_encode($data);
		}

		public function acceptRequest(){

			$status = 'Approved';

			$post = json_decode(file_get_contents('php://input'));
			$updateStatus = $this->rent_model->updateStatusRequest($post, $status);
			$queryNotification = $this->rent_model->selectNotification($post);

			$clientInfo = array(
				'owners_id' => $queryNotification[0]->owners_id, 
				'borrowers_id' => $queryNotification[0]->borrowers_id,
				'items_id' => $queryNotification[0]->items_id,
				'date_from' => $queryNotification[0]->date_from,
				'date_to' => $queryNotification[0]->date_to,
				'date_accepted' => date('Y-m-d')
				);
			$insertToRented = $this->rent_model->insertToMyRented($clientInfo);
			$deleteRequest = $this->rent_model->itemRequestCancel($post);

			echo json_encode($clientInfo);
	

		}

		private function flashMessages($data){
        $this->session->set_flashdata('notify', $data['msg']);
        $this->output->set_header("Location:".$data['url']);
        echo json_encode($data);
    	}
	}
?>