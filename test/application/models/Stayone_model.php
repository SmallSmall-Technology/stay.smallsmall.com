<?php

class Stayone_model extends CI_Model {

	public function __construct()
	{

		parent::__construct();

		$this->load->database();

	}

    private $_limit;

	private $_pageNumber;

	private $_offset;

	// setter getter functionf

	public function setLimit($limit) {

		$this->_limit = $limit;

	}

	public function setPageNumber($pageNumber) {

		$this->_pageNumber = $pageNumber;

	}

	public function setOffset($offset) {

		$this->_offset = $offset;

	}
    public function updateViews($views, $id){
	    
	    $updates = array("views" => $views);
	    
	    $this->db->where("apartmentID", $id);
	    
	    $this->db->update("stayone_apartments", $updates);
	    
	}
    public function apartmentCount($s_data){
        
        $this->db->select('a.id as apt_id, c.id as b_id');

        $this->db->from('stayone_apartments as a');

		if($s_data){

			if(@$s_data['location'] && !is_null(@$s_data['location']) && @$s_data['location'] !== 'any'){

				$this->db->like('a.city', $s_data['location']);

			}

			if(@$s_data['guests'] && @$s_data['guests'] > 0){

				$this->db->where('a.guests', $s_data['guests']);

			}
			
			if(@$s_data['from'] && @$s_data['to']){

				$this->db->where("'c.checkin' NOT BETWEEN  '".$s_data['from']."'  AND '".$s_data['to']."'");

			}
			
		} 

        $this->db->join('stayone_booking as c', 'c.aptID = a.apartmentID', 'RIGHT');
        
        $this->db->group_by('a.apartmentID');

        return $this->db->count_all_results();
    }
    
    public function getCities(){
        
        $this->db->select('city');
        
        $this->db->from('stayone_apartments');
        
        $this->db->group_by('city');
        
        $this->db->order_by('city', 'ASC');
        
        $query = $this->db->get();
        
        return $query->result_array();
    }

    public function check_email($email){

		$this->db->select('email');

		$this->db->from('user_tbl');

		$this->db->where('email', $email);

		$this->db->limit(1);

		$query = $this->db->get();

		if($query->num_rows() > 0){

			return 1;

		}else{

			return 0;
			
		}

	}

    public function login_user($username, $password){

        $this->db->select('*');

        $this->db->from('user_tbl');

        $this->db->where('email', $username);

        $this->db->where('password', $password);

        $query = $this->db->get();

        return $query->row_array();

    }

    public function register($fname, $lname, $email, $password, $phone, $income, $confirmationCode, $referral, $user_type, $interest, $rc, $gender){

        $digits = 12;

        $randomNumber = '';

        $count = 0;

        while($count < $digits){

            $randomDigit = mt_rand(0, 9);

            $randomNumber .= $randomDigit;

            $count++;

        }

        $id = $randomNumber;

        $this->userID = $id;

        $this->firstName = $fname; // please read the below note

        $this->lastName = $lname;

        $this->email = $email;

        $this->password = $password;

        $this->phone = $phone;

        $this->income = $income;

        $this->referral = $referral;
        
        $this->gender = $gender;
        
        //$this->referred_by = $referred_by;
        
        $this->referral_code = $rc;

        $this->user_type = $user_type;

        $this->interest = $interest;

        $this->verified = 'no';

        $this->points = 0;

        $this->status = 'Active';

        $this->regDate = date('Y-m-d H:i:s');

        if($this->db->insert('user_tbl', $this)){

            $lastlog = date('Y-m-d H:i:s');

            $res = $this->db->insert('login_tbl', array('email' => $email, 'password' => $password, 'userID' => $id, 'lastLogin' => $lastlog, 'confirmation' => $confirmationCode));
            
            if($res){

                return 1;
                
            }else{

                return "Error inserting in Login table.";

            }
        }else{
            
            return "Profile insertion error!";
        }

    }
    
    public function getApartments($s_data){
	    
	    $this->db->select('a.*, b.*, c.*');
	    
	    $this->db->from('stayone_apartments as a');

		if($s_data){

			if(@$s_data['location'] && @$s_data['location'] !== 'any'){

				$this->db->like('a.city', $s_data['location']);

			}

			if(@$s_data['guests'] && @$s_data['guests'] > 0){

				$this->db->where('a.guests', $s_data['guests']);

			}
			
			if(@$s_data['from'] && @$s_data['to']){

				$this->db->where("'c.checkin' NOT BETWEEN  '".$s_data['from']."'  AND '".$s_data['to']."'");

			}
		}
	    
	    $this->db->join('apt_type_tbl as b', 'b.id = a.apartmentType', 'LEFT');

        $this->db->join('stayone_booking as c', 'c.aptID = a.apartmentID', 'RIGHT');
        
        $this->db->group_by('a.apartmentID');
	    
	    $this->db->limit($this->_pageNumber, $this->_offset);

		$query = $this->db->get();

		return $query->result_array(); 
	}

    public function getApartment($id){

	    $this->db->select('a.*, b.*, c.name as state_name');
	    
	    $this->db->from('stayone_apartments as a');
	    
	    $this->db->join('apt_type_tbl as b', 'b.id = a.apartmentType');

        $this->db->join('states as c', 'c.id = a.state');
	    
	    $this->db->where('a.apartmentID', $id);

		$query = $this->db->get();

		return $query->row_array();
	}

    public function insertBooking($id, $userID, $firstname, $lastname, $email, $phone, $address, $comment, $checkin, $checkout, $num_of_days, $guests, $aptID, $cost, $pickup_option, $pickup_location, $pickup_cost, $payment_option){
	    
	    $total_cost = $cost + $pickup_cost;
	    
	    $this->bookingID = $id;
	    
	    $this->aptID = $aptID;
	    
	    $this->userID = $userID;
	    
	    $this->firstname = $firstname;
	    
	    $this->lastname = $lastname;
	    
	    $this->guests = $guests;
	    
	    $this->checkin = $checkin;
	    
	    $this->cost = $cost;
	    
	    $this->checkout = $checkout;
	    
	    $this->phone = $phone;
	    
	    $this->email = $email;
	    
	    $this->address = $address;
	    
	    $this->comment = $comment;
	    
	    $this->pickup_option = $pickup_option;
	    
	    $this->pickup_location = $pickup_location;
	    
	    $this->pickup_cost = $pickup_cost;
	    
	    $this->no_of_nights = $num_of_days;
	    
	    $this->date_of_booking = date("Y-m-d H:i:s");
	    
	    if($this->db->insert("stayone_booking", $this)){
	        //Insert transaction details
	        
	        return $this->db->insert('stayone_transactions', array("booking_id" => $id, "user_id" => $userID, "amount" => $total_cost, "status" => 'pending', "payment_option" => $payment_option, "date_of_transaction" => date('Y-m-d H:i:s')));
	    }
	}
	
	public function get_booking_details($id){
	    
	    $this->db->select('a.*, a.address as stayer_address, b.*, b.status as payment_status, c.*');
	    
	    $this->db->from('stayone_booking as a');
	    
	    $this->db->where('a.bookingID', $id);
	    
	    $this->db->join('stayone_transactions as b', 'b.booking_id = a.bookingID');
	    
	    $this->db->join('stayone_apartments as c', 'c.apartmentID = a.aptID');
	    
	    $query = $this->db->get();
	    
	    return $query->row_array();
	}

}