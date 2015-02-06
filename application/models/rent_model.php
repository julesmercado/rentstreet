<?php 

	class Rent_model extends CI_Model{
	public function itemlist(){
		return $this->db->select('*')
						->from('search_results')
						->get()
						->result();
	}

	public function getLogin(){
        $query = $this->db->select('user_id,last_login')
                          ->from('clients')
                          ->limit(1)
                          ->get();
        
        return $query->result();
   	}

 	public function getCategories(){
      $query = $this->db->select('id, category')
      				  ->from('category')
      				  ->order_by('category','asc')
      				  ->get();

      return $query->result();
 	}

  public function getModePayment(){
      $query = $this->db->select()
                ->from('mode')
                ->get();

      return $query->result();
  }

	public function add_comment($data) {
		$this->db->insert('comments',$data);
	}
	public function get_comment($data) {
		return $this->db->query("SELECT * from comments LEFT JOIN clients on clients.user_id = comments.user_id where comments.user_id=".$data['user_id']." AND comments.post_id=".$data['post_id']." AND comments.content=\"".$data['content']."\" order by id desc")->result();
	}
	 public function login($username, $password)
	 {
	 	
	   $query = $this->db->select('*')
	   					 ->from('clients')
	   					 ->where('username',$username)
	   					 ->where('password',$password)
	   					 ->limit(1)
	   					 ->get();

	   if($query->num_rows()==1)
	   {
	     foreach($query->result() as $row){
	     	$data = array(
	     		'user_id' => $row->user_id,
	     		'email' => $row->email,
		        'username' => $row->username,
		        'password' => $row->password,
		        'name' => $row->name,
		        'contact' => $row->contact,
		        'images' => $row->images,
		        'address' => $row->address
		         );
	     	return $data;
	     }
	   }
	   else
	   {
	     return false;
	   }
	 }

		public function accountVerify($data){
			$this->db->insert('clients',$data);

			if($this->db->affected_rows() > 0){
				return true;
			} else {
				return false;
			}
		}

		public function uploadItem($data){
			$this->db->insert('items',$data);

			if($this->db->affected_rows() > 0){
				return true;
			} else {
				return false;
			}
		}

		public function uploadProfile($data){
			$this->db->insert('clients',$data);

			if($this->db->affected_rows() > 0){
				return true;
			} else {
				return false;
			}
		}

		public function retrieveItem($id){
	        $this->db->where('user_id', $id)
	        		 ->order_by('id', 'desc');
	        $query = $this->db->get('items');

	            return $query->result();
	    }

	    public function retrieveDetails(){
	       $query = $this->db->select('*')
	    					  ->from('items')
	    					  ->order_by('id','desc')
	    					  ->limit(8)
	    					  ->get();
	    	return $query->result();
	    }

	    public function getProfile($id){

		$query = $this->db->select("name, email, contact, address, images, user_id")
                      ->from('clients')
                      ->where('user_id',$id)
                      ->limit(1)
                      ->get();

    	return $query->result();
    	}

    	public function updateProfile($data,$id){
    		$this->db->where('user_id',$id);
    		$this->db->update('clients',$data);

    		if($this->db->affected_rows() > 0){
    			return true;
    		} else {
    			return false;
    		}
    	}
    	public function deleteItem($data){
    		
    		$this->db->delete('items', $data);

	        if ($this->db->affected_rows() > 0) {
	            return true;
	        } else {
	            return false;
	        }

    	}

    	public function getDetails($id){

		$query = $this->db->select()
                      ->from('view_items')
                      ->where('id',$id)
                      ->limit(1)
                      ->get();

    	return $query->row();
    	}

    	public function viewItems(){
    		
        	$query = $this->db->select('*')
        				  ->from('images')
        				  ->order_by('post_id','asc')
        				  ->limit(8)
        				  ->get();

        	return $query->result();
    	}

    	public function fillUpValidationFullName($id){
    	
    		$query = $this->db->select('name,email,contact,address')
    						  ->from('clients')
    						  ->where('user_id',$id)
    						  ->get();

    		return $query->row();
    	}

    	public function validateLogin($data,$id){
    		$this->db->update('clients',$data);
    		$this->db->select('last_login');
			$this->db->where('user_id',$id);
			
    		if($this->db->affected_rows() > 0){
    			return true;
    		} else {
    			return false;
    		}
    	}

 //  ====================== ITEMS QUERY =================================== //

    	public function getSearchItems($itemKey){
    		 $query = $this->db->select("*")
                          ->from('view_items')
                          ->like('title', $itemKey)
                          ->group_by('id')
                          ->get();
        
 	        return $query->result();
    	}
    	public function getSearchItemsLanding(){
    		$query = $this->db->select()
                          ->from('view_items')
                          ->limit(8)
                          ->get();
             return $query->result();
    	}


    	public function itemRequest($data){

    		$parsedData = array(
    			"owners_id" => $data->owners_id,
    			"date_from" => strtok($data->date_from, "T"),
    			"date_to" => strtok($data->date_to, "T"),
    			"request_date" => strtok($data->request_date, "T"),
    			"items_id" => $data->items_id,
          "status" => 3,
    			"borrowers_id" => $data->borrowers_id
    		);
    		
    		$this->db->insert('notification', $parsedData);
    		return $parsedData;

    	}

      public function itemRequestCancel($data){
          $this->db->where('borrowers_id', $data->borrowers_id);
          $this->db->where('items_id', $data->items_id);
          $this->db->delete('notification');
      }

      public function deleteRentedItems($id){
        $this->db->where('items_id', $id);
        $this->db->delete('my_rented_items');
      }

      public function updateStatusRequest($data, $status){

          $this->db->set('status', $status);
          $this->db->where('items_id', $data->items_id);
          $this->db->where('borrowers_id', $data->borrowers_id);
          $this->db->update('notification');
        

      }

      public function updateItemStatus($data, $status){

          $this->db->set('status', $status);
          $this->db->where('id', $data->items_id);
          $this->db->update('items');
        

      }

      public function updateItemStatusFromRented($id, $status){

          $this->db->set('status', $status);
          $this->db->where('id', $id);
          $this->db->update('items');
        

      }

      public function selectNotification($data){
          $query = $this->db->select()
                          ->from('notification')
                          ->where('borrowers_id', $data->borrowers_id)
                          ->where('items_id', $data->items_id)
                          ->get();
             return $query->result();
      }

      public function insertToMyRented($data){
        $this->db->insert('my_rented_items',$data);
      }

    	public function getCountNotification($id){
    	
    		 $query = $this->db->select('*')
	   					 ->from('notification')
	   					 ->where('owners_id', $id);
			
			$query = $this->db->get();
			$rowcount = $query->num_rows();

			return $rowcount;

    	}

    	public function getNotification($id){
    		$query = $this->db->select()
                          ->from('view_info_request')
                          ->where('owners_id', $id)
                          ->get();
             return $query->result();

    	}

      public function getSingleInfo($id){
        $query = $this->db->select()
                          ->from('clients')
                          ->where('user_id', $id)
                          ->get();
             return $query->result();
      }

      public function getAds($id){
        $query =  $this->db->select()
                          ->from('view_items')
                          ->where('user_id', $id)
                          ->where('status', 'Available')
                          ->group_by('id', 'asc')
                          ->get();
                        
              return $query->result(); 

      }

      public function getMyRented($id){
        $query =  $this->db->select()
                          ->from('view_my_rented_ads')
                          ->where('owners_id', $id)
                          ->group_by('items_id')
                          ->get();
                        
              return $query->result(); 

      }

       public function getRateAfterReturnInfor($id){
        $query =  $this->db->select()
                          ->from('view_rate_after_return')
                          ->where('id', $id)
                          ->group_by('items_id')
                          ->get();
                        
              return $query->result(); 

      }

      public function getBorrowedFromOther($id){
        $query =  $this->db->select()
                          ->from('view_my_rented_ads')
                          ->where('borrowers_id', $id)
                          ->group_by('items_id')
                          ->get();
                        
              return $query->result(); 

      }

      public function getOwnersInfo($id){
        $query =  $this->db->select('name')
                          ->from('clients')
                          ->where('user_id', $id)
                          ->get();
                        
              return $query->result(); 
      }

      public function getMyReturned($id){
        $query =  $this->db->select()
                          ->from('view_my_returned_ads')
                          ->where('owners_id', $id)
                          ->get();
                        
              return $query->result(); 

      }

      public function acceptRequestMod($id){
        $query =  $this->db->select()
                          ->from('notification')
                          ->where('borrowers_id', $id)
                          ->get();
                        
              return $query->result();  
          
        }


        public function deleteNotification($id){
          $this->db->where('id',$id);
          $this->db->delete('notification');
        }
	}
?>