<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

	Class Profiles extends CI_Controller{

		public function __construct(){
			parent::__construct();
			$this->load->model('rent_model');
			$this->load->library('form_validation');
			$this->load->library('session');
			$this->load->helper(array('form', 'url'));
		}

		public function do_upload(){

	        $this->load->helper('form');

	        //Configure
	        //set the path where the files uploaded will be copied. NOTE if using linux, set the folder to permission 777
	        $config['upload_path'] = 'assets/profiles';

	    	// set the filter image types
	        $config['allowed_types'] = 'gif|jpg|png';

	        //load the upload library
	        $this->load->library('upload', $config);

	        $this->upload->initialize($config);

	        $this->upload->set_allowed_types('*');

	        $data['upload_data'] = '';

	        //if not successful, set the error message
	        if (!$this->upload->do_upload('userfile')) {
	            $data = array('error' => $this->upload->display_errors());

	        } else { //else, set the success message
	            $data1 = $this->upload->data();
	            $id = $this->input->post('user_id');
	            $filepath = $data1['full_path'];
	            $data = array(
	            	'name' => ucwords($this->input->post('name',true)),
					'email' => $this->input->post('email',true),
					'contact' => $this->input->post('contact',true),
	                'address' => ucwords($this->input->post('address', true)),
	                'images' => $filepath
	            );
	            $session_data = $this->session->userdata('logged_in');
	            $confirm = $this->rent_model->updateProfile($data,$id);
	            }

	           if ($confirm) {
	            	$this->flashMessages(array(
	                'msg' => '<div class="alert alert-success text-center" style="font-size: 13px; margin-left: 300px; margin-right: 300px;" role="alert">Profile successfully updated!</div>',
	                'url' => base_url('member-page')
	            	));
				} else {
		           	$this->flashMessages(array(
	                'msg' => '<div class="alert alert-danger text-center" style="font-size: 13px; margin-left: 300px; margin-right: 300px;" role="alert">Profile failed to update!</div>',
	                'url' => base_url('my-profile')
	            	));
	           	}
			}

		public function check_database($password){
       //Field validation succeeded.  Validate against database
       $username = $this->input->post('username');

       //query the database/*
       $result1 = $this->rent_model->login($username, $password);

       if($result1)
       {
         $sess_array = array();
         foreach($result1 as $row)
         {
            $path = $this->rent_model->retrievePic($row->user_id);
            $img = explode('C:/wamp/www/',$path);
            $path_url = "http://localhost/".$img[1];
            $sess_array = array(
                 'id' => $row->user_id,
                 'email' => $row->email,
                 'username' => $row->username,
                 'password' => $row->password,
                 'name' => $row->name,
                 'contact' => $row->contact,
                 'address' => $row->address,
                 'images' => $row->images,
                 'path'     => $path_url
               );
           $this->session->set_userdata('logged_in', $sess_array);
         }
         return TRUE;
       }
       else
       {
         $this->form_validation->set_message('check_database', '<div class="alert alert-danger text-center" style="font-size: 12px;"><strong>The username or password you entered is incorrect.</strong></div>');
         return false;
       }
     }

     private function flashMessages($data){
        $this->session->set_flashdata('notify', $data['msg']);
        $this->output->set_header("Location:".$data['url']);
    	}
	}
?>