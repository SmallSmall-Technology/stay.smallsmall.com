<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Stayone extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function __construct()
	{
			parent::__construct();
	}

	public function index(){

		$data['title'] = 'Stayone Home';

		if($this->session->has_userdata('loggedIn')){

			$data['userID'] = $this->session->userdata('userID');			

			$data['fname'] = $this->session->userdata('fname');			

			$data['lname'] = $this->session->userdata('lname');			

			$data['loggedIn'] = $this->session->userdata('loggedIn');	

		}
		
		$data['cities'] = $this->stayone_model->getCities();

		$this->load->view('templates/header', $data);

		$this->load->view('index', $data);
		
		$this->load->view('templates/footer', $data);
	}
	
	public function about_us(){

		$data['title'] = 'About Us';

		if($this->session->has_userdata('loggedIn')){

			$data['userID'] = $this->session->userdata('userID');			

			$data['fname'] = $this->session->userdata('fname');			

			$data['lname'] = $this->session->userdata('lname');			

			$data['loggedIn'] = $this->session->userdata('loggedIn');	

		}
		
		//$data['cities'] = $this->stayone_model->getCities();

		$this->load->view('templates/header', $data);

		$this->load->view('about-us', $data);
		
		$this->load->view('templates/pages-footer', $data);
	}
	
	public function faq(){

		$data['title'] = 'FAQ';

		if($this->session->has_userdata('loggedIn')){

			$data['userID'] = $this->session->userdata('userID');			

			$data['fname'] = $this->session->userdata('fname');			

			$data['lname'] = $this->session->userdata('lname');			

			$data['loggedIn'] = $this->session->userdata('loggedIn');	

		}
		
		//$data['cities'] = $this->stayone_model->getCities();b

		$this->load->view('templates/header', $data);

		$this->load->view('faq', $data);
		
		$this->load->view('templates/pages-footer', $data);
	}

	public function login(){	
		
		if(!$this->session->has_userdata('loggedIn')){

			$data['userID'] = $this->session->userdata('userID');			

			$data['fname'] = $this->session->userdata('fname');			

			$data['lname'] = $this->session->userdata('lname');		

			$data['loggedIn'] = $this->session->userdata('loggedIn');
		
			$this->load->view('templates/header');

			$this->load->view('login');

			$this->load->view('templates/footer');

		}else{

			redirect( base_url() ,'refresh');

		}
	}

	public function signup(){	
		
		if(!$this->session->has_userdata('loggedIn')){

			$data['userID'] = $this->session->userdata('userID');			

			$data['fname'] = $this->session->userdata('fname');			

			$data['lname'] = $this->session->userdata('lname');	

			$data['loggedIn'] = $this->session->userdata('loggedIn');	
		
			$this->load->view('templates/header');

			$this->load->view('signup');

			$this->load->view('templates/footer');
			
		}else{

			redirect( base_url() ,'refresh');

		}
	}
	
	public function payment_page($id){	
		
		if(!$this->session->has_userdata('loggedIn')){

			$data['userID'] = $this->session->userdata('userID');			

			$data['fname'] = $this->session->userdata('fname');			

			$data['lname'] = $this->session->userdata('lname');	

			$data['loggedIn'] = $this->session->userdata('loggedIn');
			
			$data['details'] = $this->stayone_model->get_booking_details($id);
		
			$this->load->view('templates/header', $data);

			$this->load->view('payment-page', $data);

			$this->load->view('templates/footer', $data);
			
		}else{

			redirect( base_url() ,'refresh');

		}
	}
	
	public function payment_result($id){	
		
		if(!$this->session->has_userdata('loggedIn')){

			$data['userID'] = $this->session->userdata('userID');			

			$data['fname'] = $this->session->userdata('fname');			

			$data['lname'] = $this->session->userdata('lname');	

			$data['loggedIn'] = $this->session->userdata('loggedIn');
			
			$data['details'] = $this->stayone_model->get_booking_details($id);
		
			$this->load->view('templates/header', $data);

			$this->load->view('payment-result', $data);

			$this->load->view('templates/footer', $data);
			
		}else{

			redirect( base_url() ,'refresh');

		}
	}

	public function login_user(){

		$username = $this->input->post("username");

		$password = md5($this->input->post("password"));

		$user = $this->stayone_model->login_user($username, $password);

		if($user){

			$userdata = array('userID' => $user['userID'], 'loggedIn' => 'yes', 'fname' => $user['firstName'], 'lname' => $user['lastName'], 'email' => $user['email'], 'verified' => $user['verified'], 'phone' => $user['phone']);
			//Set session
			$this->session->set_userdata($userdata);				
			echo 1;

		}else{

			echo 0;

		}

	}

	public function register_user(){

		$fname = $this->input->post('fname');

		$lname = $this->input->post('lname');

		$email = strtolower($this->input->post('email'));

	    $password = md5($this->input->post('password'));

		$phone = $this->input->post('phone');

		$income = 0;
				
		$gender = $this->input->post('gender');

		$referral = $this->input->post('referral');

		$user_type = 'tenant';

		//$referred_by = strtoupper($this->input->post('referred_by'));

		$interest = 'Stayone';
		
		$confirmationCode = md5(date('d-m-Y h:i:s'));
		
		$code = substr($confirmationCode, -5);
	            
	    $rc = strtoupper(substr($lname, 0, 3).$code);

		//Check to see if email exists already

		$email_res = $this->stayone_model->check_email($email);

		if($email_res){

			echo "Email already exists in our database!";
			
			exit;

		}else{			

			$registration = $this->stayone_model->register($fname, $lname, $email, $password, $phone, $income, $confirmationCode, $referral, $user_type, $interest, $rc, $gender);		

			if($registration){				

				$data['confirmationLink'] = base_url().'confirm/'.$confirmationCode;

				$data['name'] = $fname;	
				
				$data['email'] = $email;

				$this->email->from('donotreply@stayone.smallsmall.com', 'Stayone');

				$this->email->to($email);

				$this->email->subject("Email Confirmation Stayone");	
				
				$this->email->set_mailtype("html");

				$message = $this->load->view('email/header.php', $data, TRUE);

				$message .= $this->load->view('email/confirmationemail.php', $data, TRUE);

				$message .= $this->load->view('email/footer.php', $data, TRUE);

				$this->email->message($message);

				$emailRes = $this->email->send();
				
				if($emailRes){
					
					echo 1; 
						
				}else{
					
					echo 0;
					
				}

			}

		}
	}

	public function apartment($id)
	{
	    if($this->session->has_userdata('loggedIn')){

			$data['userID'] = $this->session->userdata('userID');			

			$data['fname'] = $this->session->userdata('fname');			

			$data['lname'] = $this->session->userdata('lname');		

			$data['loggedIn'] = $this->session->userdata('loggedIn');

		}
	    $views = 0;
	    //Fetch properties for homepage
	    $data['apartment'] = $this->stayone_model->getApartment($id);
	    
	    $views = $data['apartment']['views'] + 1;
	    
	    $this->stayone_model->updateViews($views, $data['apartment']['apartmentID']);
	    
	    $data['title'] = $data['apartment']['apartmentName'];
	    
	    $this->load->view('templates/header', $data);

		$this->load->view('apartment', $data);

	    $this->load->view('templates/footer', $data);
	}

	public function apartments(){	
		
		$data['title'] = "Stayone Apartments";
		
		if($this->session->has_userdata('loggedIn')){

			$data['userID'] = $this->session->userdata('userID');			

			$data['fname'] = $this->session->userdata('fname');			

			$data['lname'] = $this->session->userdata('lname');		

			$data['loggedIn'] = $this->session->userdata('loggedIn');

		}

		$s_data['location'] = $this->input->post("location");

		$s_data['dates'] = $this->input->post("dates");
		
		if($s_data['dates']){

			$checks = explode("-", $this->input->post("dates"));

			$s_data['from'] = date('Y-m-d', strtotime($checks[0]));

			$s_data['to'] = date('Y-m-d', strtotime($checks[1]));

		}

		$s_data['guests'] = $this->input->post("guests");


		if ($s_data['location'] === null && $s_data['dates'] === null && $s_data['guests'] === null){ 
		
			$s_data = $this->session->userdata('search');
		
		}else{ 
			
			$this->session->set_userdata('search', $s_data);
			
		}

		$config['total_rows'] = $this->stayone_model->apartmentCount($s_data);

		$data['total_count'] = $config['total_rows'];

		$config['suffix'] = '';

		if ($config['total_rows'] > 0) {

			$page_number = $this->uri->segment(3);

			$config['base_url'] = base_url() . 'apartments';

			if (empty($page_number))
				$page_number = 1;

			$offset = ($page_number - 1) * $this->pagination->per_page;

			$this->stayone_model->setPageNumber($this->pagination->per_page);

			$this->stayone_model->setOffset($offset);

			$this->pagination->cur_page = $offset;

			$this->pagination->initialize($config);

			$data['page_links'] = $this->pagination->create_links();

			$data['apartments'] = $this->stayone_model->getApartments($s_data);
		}

		//print_r($data['apartments']);

		//exit;
	
		$this->load->view('templates/header', $data);

		$this->load->view('apartments', $data);

		$this->load->view('templates/footer', $data);

		
	}

	public function booking_confirmation($id)
	{
		if($this->session->has_userdata('loggedIn')){

			$data['userID'] = $this->session->userdata('userID');			

			$data['fname'] = $this->session->userdata('fname');			

			$data['lname'] = $this->session->userdata('lname');	
			
			$data['loggedIn'] = $this->session->userdata('loggedIn');

			//Fetch properties for homepage
			$data['apartment'] = $this->stayone_model->getApartment($id);
			
			$data['title'] = $data['apartment']['apartmentName'];
			
			$this->load->view('templates/header', $data);

			$this->load->view('booking-confirmation', $data);

			$this->load->view('templates/footer', $data);

		}else{

			redirect( base_url('login') ,'refresh');

		}
	}

	public function insert_booking(){
	    
	    $result = "error";
	    
	    $digits = 12;

		$randomNumber = '';

		$count = 0;

		while($count < $digits){

			$randomDigit = mt_rand(0, 9);

			$randomNumber .= $randomDigit;

			$count++;

		}

		$id = $randomNumber;
	    
	    $firstname = $this->input->post('firstname');
	    
	    $lastname = $this->input->post('lastname');
	    
	    $email = $this->input->post('email');
	    
	    $phone = $this->input->post('phone');
	    
	    $address = $this->input->post('address');
	    
	    $comment = $this->input->post('comment');
	    
	    $pickup_option = $this->input->post('pickup_option');
	    
	    $pickup_location = $this->input->post('pickup_location');
	    
	    $pickup_cost = $this->input->post('pickup_cost');
	    
	    $payment_option = $this->input->post('payment_option');
	    
	    $aptID = $this->input->post('aptID');
	    
	    $reserve = $this->input->post('reserve');
	    
	    $checkout = $reserve['endDate'];
	    
	    $cost = $reserve['cost'];
	    
	    $checkin = $reserve['startDate'];
	    
	    $num_of_days = $reserve['no_of_days'];
	    
	    $guests = $reserve['guests'];
	    
	    $userID = $this->session->userdata('userID');
	    
	    $result = $this->stayone_model->insertBooking($id, $userID, $firstname, $lastname, $email, $phone, $address, $comment, $checkin, $checkout, $num_of_days, $guests, $aptID, $cost, $pickup_option, $pickup_location, $pickup_cost, $payment_option);
	    
	    if($result){
	        
	        $res = $this->stayone_model->getApartment($aptID);
	        
	        $data['guestName'] = $firstname.' '.$lastname; 
	        
	        $data['name'] = $lastname;
	        
	        $data['email'] = $email;
	        
	        $data['phone'] = $phone;
	        
	        $data['checkin'] = $checkin;
	        
	        $data['checkout'] = $checkout;

			$data['guests'] = $guests; 

			$data['duration'] = $num_of_days." night(s)";

			$data['cost'] = $cost;
			
			$data['comment'] = $comment;
			
			$data['aptName'] = $res['apartmentName'];

			$this->email->from('noreply@stayone.com', 'Stayone Booking');

			$this->email->to('bookings@stayone.com'); 

			//$this->email->cc('');

			//$this->email->bcc(''); 

			$this->email->subject($res['apartmentName']." booked.");   
			
			$this->email->set_mailtype("html");         

			$message = $this->load->view('email/header.php', $data, TRUE);     

			$message .= $this->load->view('email/booking-email.php', $data, TRUE);            

			$message .= $this->load->view('email/footer.php', $data, TRUE);            

			$this->email->message($message);            

			$emailRes = $this->email->send();
			
			if($emailRes){
			   
			    $this->email->to($email); 
			    
			    $this->email->subject("Booking Confirmation."); 
			    
			    $this->email->set_mailtype("html");
			    
			    $message = $this->load->view('email/header.php', $data, TRUE); 

			    $message .= $this->load->view('email/booking-confirmation-email.php', $data, TRUE);            

			    $message .= $this->load->view('email/footer.php', $data, TRUE);

			    $this->email->message($message);
			    
			    $this->email->send();
			    
			    $result = "success";
			    
			}
			
			$result = "success";
			
	    }
	    
	    echo json_encode(array("result" => $result, "booking" => $id));
	}
	public function logout(){

		$this->session->sess_destroy();

		$url = @$_SERVER['HTTP_REFERER'];
		
		if($url){
			redirect($url);
		}else{
			redirect( base_url() ,'refresh');
		}		

   	}
}
