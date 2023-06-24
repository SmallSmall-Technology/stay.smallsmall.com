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
	public function __construct(){

		header('Access-Control-Allow-Origin: *');
		
    	header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
        
	   	parent::__construct();
	}

	public function index(){

		$data['title'] = 'Stayone Home';

		if($this->session->has_userdata('loggedIn')){

			$data['userID'] = $this->session->userdata('userID');			

			$data['fname'] = $this->session->userdata('fname');			

			$data['lname'] = $this->session->userdata('lname');	

			$data['user_type'] = $this->session->userdata('user_type');	

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

			$data['user_type'] = $this->session->userdata('user_type');			

			$data['loggedIn'] = $this->session->userdata('loggedIn');	

		}
		
		//$data['cities'] = $this->stayone_model->getCities();

		$this->load->view('templates/header', $data);

		$this->load->view('about-us', $data);
		
// 		$this->load->view('templates/pages-footer', $data);
		$this->load->view('templates/footer', $data);
	}
	
	public function faq(){

		$data['title'] = 'FAQ';

		if($this->session->has_userdata('loggedIn')){

			$data['userID'] = $this->session->userdata('userID');			

			$data['fname'] = $this->session->userdata('fname');			

			$data['lname'] = $this->session->userdata('lname');	

			$data['user_type'] = $this->session->userdata('user_type');			

			$data['loggedIn'] = $this->session->userdata('loggedIn');	

		}
		
		//$data['cities'] = $this->stayone_model->getCities();b

		$this->load->view('templates/header', $data);

		$this->load->view('faq', $data);
		
		$this->load->view('templates/pages-footer', $data);
	}
	
	public function terms_and_conditions(){

		$data['title'] = 'Terms and Conditions';

		if($this->session->has_userdata('loggedIn')){

			$data['userID'] = $this->session->userdata('userID');			

			$data['fname'] = $this->session->userdata('fname');			

			$data['lname'] = $this->session->userdata('lname');	

			$data['user_type'] = $this->session->userdata('user_type');			

			$data['loggedIn'] = $this->session->userdata('loggedIn');	

		}
		
		//$data['cities'] = $this->stayone_model->getCities();b

		$this->load->view('templates/header', $data);

		$this->load->view('terms-and-conditions', $data);
		
		$this->load->view('templates/pages-footer', $data);
	}

	public function login(){	
		
		if(!$this->session->has_userdata('loggedIn')){

			$data['userID'] = $this->session->userdata('userID');			

			$data['fname'] = $this->session->userdata('fname');			

			$data['lname'] = $this->session->userdata('lname');	

			$data['user_type'] = $this->session->userdata('user_type');		

			$data['loggedIn'] = $this->session->userdata('loggedIn');
		
			$this->load->view('templates/header');

			$this->load->view('login');

			$this->load->view('templates/footer');

		}else{

			redirect( base_url() ,'refresh');

		}
	}
	public function forgot_password(){	
		
		if(!$this->session->has_userdata('loggedIn')){

			$data['userID'] = $this->session->userdata('userID');			

			$data['fname'] = $this->session->userdata('fname');			

			$data['lname'] = $this->session->userdata('lname');	

			$data['user_type'] = $this->session->userdata('user_type');		

			$data['loggedIn'] = $this->session->userdata('loggedIn');
		
			$this->load->view('templates/header');

			$this->load->view('forgot-password');

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

			$data['user_type'] = $this->session->userdata('user_type');	

			$data['loggedIn'] = $this->session->userdata('loggedIn');	
		
			$this->load->view('templates/header');

			$this->load->view('signup');

			$this->load->view('templates/footer');
			
		}else{

			redirect( base_url() ,'refresh');

		}
	}
	
	public function payment_page($id){	
		
		if($this->session->has_userdata('loggedIn')){

			$data['userID'] = $this->session->userdata('userID');			

			$data['fname'] = $this->session->userdata('fname');			

			$data['lname'] = $this->session->userdata('lname');	

			$data['user_type'] = $this->session->userdata('user_type');	

			$data['loggedIn'] = $this->session->userdata('loggedIn');
			
			$data['details'] = $this->stayone_model->get_booking_details($id);
		
			$this->load->view('templates/header', $data);

			$this->load->view('payment-page', $data);

			$this->load->view('templates/footer', $data);
			
		}else{

			redirect( base_url() ,'refresh');

		}
	}
	
	public function paystack_payment_result($id){	
		
		if(!$this->session->has_userdata('loggedIn')){

			$data['userID'] = $this->session->userdata('userID');			

			$data['fname'] = $this->session->userdata('fname');			

			$data['lname'] = $this->session->userdata('lname');	

			$data['user_type'] = $this->session->userdata('user_type');	

			$data['loggedIn'] = $this->session->userdata('loggedIn');
			
			//$data['details'] = $this->stayone_model->get_booking_details($id);
			
			$data['payment_status'] = "Successful";
    				
			$data['status_text'] = "Your payment was successful, enjoy your stay with us.";
			
			$data['color'] = 'green';
		
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

			$userdata = array('userID' => $user['userID'], 'loggedIn' => 'yes', 'fname' => $user['firstName'], 'lname' => $user['lastName'], 'email' => $user['email'], 'verified' => $user['verified'], 'phone' => $user['phone'], 'user_type' => $user['user_type'], 'referral_code' => $user['referral_code'], 'rss_points' => $user['points']);
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

		$email = strtolower($this->input->post('username'));

	    $password = md5($this->input->post('password'));

		$phone = $this->input->post('phone');

		$income = 0;
				
		$gender = '';

		$referral = '';

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

				$this->email->from('donotreply@smallsmall.com', 'Stayone');

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
					
					echo "Error sending comfirmation email";
					
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

			$data['user_type'] = $this->session->userdata('user_type');		

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
	
	public function payment_result()
	{
	    if($this->session->has_userdata('loggedIn')){

			$data['userID'] = $this->session->userdata('userID');			

			$data['fname'] = $this->session->userdata('fname');			

			$data['lname'] = $this->session->userdata('lname');	

			$data['user_type'] = $this->session->userdata('user_type');		

			$data['loggedIn'] = $this->session->userdata('loggedIn');

		}
	    
	    $data['payment_status'] = "Congratulations!";
    				
		$data['status_text'] = "You are almost done! Apartment will only be booked on the reciept of payment. Payment can be made into the account details below.";
		
		$data['transferDets'] = 1;
		
		$data['color'] = 'green';
	    
	    $data['title'] = "Successful";
	    
	    $this->load->view('templates/header', $data);

		$this->load->view('payment-result', $data);

	    $this->load->view('templates/footer', $data);
	}

	public function apartments(){	
		
		$data['title'] = "Stayone Apartments";
		
		if($this->session->has_userdata('loggedIn')){

			$data['userID'] = $this->session->userdata('userID');			

			$data['fname'] = $this->session->userdata('fname');			

			$data['lname'] = $this->session->userdata('lname');			

			$data['user_type'] = $this->session->userdata('user_type');		

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
		
		$data['cities'] = $this->stayone_model->getCities();

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
	public function stay_types($stay_type, $apartment_type){	
		
		if($this->session->has_userdata('loggedIn')){

			$data['userID'] = $this->session->userdata('userID');			

			$data['fname'] = $this->session->userdata('fname');			

			$data['lname'] = $this->session->userdata('lname');	

			$data['user_type'] = $this->session->userdata('user_type');		

			$data['loggedIn'] = $this->session->userdata('loggedIn');

		}

		$config['total_rows'] = $this->stayone_model->stayTypeCount($stay_type, $apartment_type);

		$data['total_count'] = $config['total_rows'];

		$config['suffix'] = '';

		if ($config['total_rows'] > 0) {

			$page_number = $this->uri->segment(5);

			$config['base_url'] = base_url() . 'apartments';

			if (empty($page_number))
				$page_number = 1;

			$offset = ($page_number - 1) * $this->pagination->per_page;

			$this->stayone_model->setPageNumber($this->pagination->per_page);

			$this->stayone_model->setOffset($offset);

			$this->pagination->cur_page = $offset;

			$this->pagination->initialize($config);

			$data['page_links'] = $this->pagination->create_links();

			$data['apartments'] = $this->stayone_model->getStayTypes($stay_type, $apartment_type);
		}
		$data['cities'] = $this->stayone_model->getCities();
        
        $data['title'] = "Stayone Apartments";
	
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

			$data['user_type'] = $this->session->userdata('user_type');	
			
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
	    
	    $response = 0;
	    
	    $details = '';
	    
	    $digits = 12;

		$randomNumber = '';

		$count = 0;

		while($count < $digits){

			$randomDigit = mt_rand(0, 9);

			$randomNumber .= $randomDigit;

			$count++;

		}
		
		$data = '';

		$id = $randomNumber;
	    
	    $firstname = $this->input->post('firstname');
	    
	    $lastname = $this->input->post('lastname');
	    
	    $email = $this->input->post('email');
	    
	    $phone = $this->input->post('phone');
	    
	    $address = $this->input->post('address');
	    
	    $nok_name = $this->input->post('nok-fullname');
	    
	    $nok_email = $this->input->post('nok-email');
	    
	    $nok_phone = $this->input->post('nok-phone');
	    
	    $nok_address = $this->input->post('nok-address');
	    
	    $comment = $this->input->post('comment');
	    
	    $pickup_option = $this->input->post('pickup_option');
	    
	    $pickup_location = $this->input->post('pickup_location');
	    
	    $pickup_cost = $this->input->post('pickup_cost');
	    
	    $discount = $this->input->post('discount');
	    
	    $vat = $this->input->post('vat');
	    
	    $payment_option = $this->input->post('payment-method');
	    
	    $aptID = $this->input->post('aptID');
	    
	    $checkin = $this->input->post('startDate');
	    
	    $checkout = $this->input->post('endDate');
	    
	    $num_of_days = $this->input->post('no_of_days');
	    
	    $guests = $this->input->post('guests');
	    
	    $cost = $this->input->post('cost');
	    
	    $actual_cost = $this->input->post('actual_cost');
	    
	    //$checkout = $reserve['endDate'];
	    
	    //$cost = $reserve['cost'];
	    
	    //$checkin = $reserve['startDate'];
	    
	    //$num_of_days = $reserve['no_of_days'];
	    
	    //$guests = $reserve['guests'];
	    
	    $userID = $this->session->userdata('userID');
	    
	    if (!is_dir('./uploads/identification/'.$userID)) {

			mkdir('./uploads/identification/'.$userID , 0777, TRUE);
		}
		
		$output = '';

		$config["upload_path"] = './uploads/identification/'.$userID;

		$config["allowed_types"] = 'jpg|jpeg|png';

		$config['encrypt_name'] = TRUE;

		$config['max_size'] = 10 * 1024;

		$this->load->library('upload', $config);

		$this->upload->initialize($config);

		$_FILES["file"]["name"] = $_FILES["input-file"]["name"];

		$_FILES["file"]["type"] = $_FILES["input-file"]["type"];

		$_FILES["file"]["tmp_name"] = $_FILES["input-file"]["tmp_name"];

		$_FILES["file"]["error"] = $_FILES["input-file"]["error"];

		$_FILES["file"]["size"] = $_FILES["input-file"]["size"];

		if($this->upload->do_upload('file')){
		    
			$data = $this->upload->data();
			
			$response = $this->stayone_model->insertBooking($id, $userID, $firstname, $lastname, $email, $phone, $address, $comment, $checkin, $checkout, $num_of_days, $guests, $aptID, $cost, $pickup_option, $pickup_location, $pickup_cost, $payment_option, $nok_name, $nok_email, $nok_phone, $nok_address, $data['file_name'], $actual_cost, $discount, $vat);

		}
	    
	    if($response){
	        
	        $res = $this->stayone_model->getApartment($aptID);
	        
	        $data['bookingID'] = $id;
	        
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
			
			$data['aptAddress'] = $res['address'];

			$this->email->from('noreply@smallsmall.com', 'Stayone Booking');

			$this->email->to($email); 

			//$this->email->cc('');

			//$this->email->bcc('hello@smallsmall.com'); 

			$this->email->subject($res['apartmentName']." booked.");   
			
			$this->email->set_mailtype("html");         

			$message = $this->load->view('email/header.php', $data, TRUE);     

			$message .= $this->load->view('email/booking-email.php', $data, TRUE);            

			$message .= $this->load->view('email/footer.php', $data, TRUE);            

			$this->email->message($message);            

			$emailRes = $this->email->send();
			
			if($emailRes){
			   
			    $this->email->to('hello@smallsmall.com'); 
			   
			    $this->email->cc('customerexperience@smallsmall.com');
			    
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
			
	    }else{
	        
	        $details = "You need to upload a valid Identification";
	        
	    }
	    
	    echo json_encode(array("result" => $result, "booking" => $id, "details" => $details));
	}
	public function updatePayment(){
	    
	    $bookingID = $this->input->post('bookingID');
	    
	    $amount = $this->input->post('amount');
	    
	    $result = $this->stayone_model->updatePaymentStatus($bookingID, 'Approved');
	    
	    if($result){
	        
	        echo 1;
	        
	    }else{
	        
	        echo 0;
	        
	    }
	}
	public function get_dates(){
	    
	    $all_dates = array();
	    
	    $period = array();
	    
	    $aptID = $this->input->post("aptID"); 
	    
	    $result = $this->stayone_model->getDates($aptID);
	    
	    foreach($result as $key){
	        
	        $period = new DatePeriod(
                         new DateTime($key['checkin']),
                         new DateInterval('P1D'),
                         new DateTime($key['checkout'])
                    );
                    
            foreach ($period as $key => $value) {
                //echo $value->format('Y-m-d'); 
                array_push($all_dates, $value->format('m/d/Y'));
            }
	    }
        
        
	    echo json_encode(array($all_dates));
	    
	}
	public function checkin(){
	    
	    $bookingID = $this->input->post('bookingID');
	    
	    $checkin_time = $this->input->post('checkin_time');
	    
	    //Confirm booking ID
	    $result = $this->stayone_model->checkBookingDetails($bookingID);
	    
	    if(!empty($result)){
	    
    	    $response = $this->stayone_model->checkin($bookingID, $checkin_time);
    	    
    	    if($response){
    	        //Send email to customer experience
    	        $data['guestName'] = $result['firstname'].' '.$result['lastname'];
    	        
    	        $data['email'] = $result['email'];
    	        
    	        $data['phone'] = $result['phone'];
    	        
    	        $data['aptName'] = $result['apartmentName'];
    	        
    	        $data['aptAddress'] = $result['apt_address'];
    	        
    	        $data['checkin_time'] = $checkin_time;
    	        
    	        $this->email->from('donotreply@smallsmall.com', 'Stayone');

				$this->email->to('customerexperience@smallsmall.com');

				$this->email->subject("Guest Checkin Notification");	
				
				$this->email->set_mailtype("html");

				$message = $this->load->view('email/header.php', $data, TRUE);

				$message .= $this->load->view('email/checkin-email.php', $data, TRUE);

				$message .= $this->load->view('email/footer.php', $data, TRUE);

				$this->email->message($message);

				$emailRes = $this->email->send();
				
				if($emailRes){
				    
				    echo 1;
				    
				}else{
				    
				    echo "Please notify our customer experience team as soon as possible. As the auto-email service is down";
				    
				}
    	        
    	    }else{
    	        
    	        echo "Error logging details";
    	        
    	    }
	    }else{
	        
	        echo "This booking does not exist or is expired.";
	        
	    }
	    
	}
	
	public function passReset(){
		
		$email = $this->input->post('username');
		
		//Check if email exists the create onetime code for password reset
		$res = $this->stayone_model->check_reset_email($email);
		
		if($res){
			
			//If email exists insert create reset row in DB
			$code = md5(date('Y-m-d H:i:s'));
			
			$result = $this->stayone_model->insertResetDetails($res['userID'], $code);
			
			if($result){
				
				$data['resetLink'] = base_url().'reset/'.$res['userID'].'/'.$code;
				
				$names = explode(" ", $res['name']);

				$data['name'] = $names[0];	

				$this->email->from('donotreply@smallsmall.com', 'SmallSmall Password Reset');

				$this->email->to($email);

				$this->email->subject("Password Reset Instructions");	
				
				$this->email->set_mailtype("html");

				$message = $this->load->view('email/header.php', $data, TRUE);

				$message .= $this->load->view('email/emailreset.php', $data, TRUE);

				$message .= $this->load->view('email/footer.php', $data, TRUE);

				$this->email->message($message);

				$emailRes = $this->email->send();
				
				if($emailRes){
					
					echo 1;
					
				}else{
					
					echo 0;
					
				}
			}else{
				
				echo "Error inserting reset data";
				
			}
			
		}else{
			
			echo "Email does not exist!";
			
		}
	}
	public function user_reset($userID, $reset_code){
		
		$res = $this->stayone_model->reset_password($userID, $reset_code);
		
		if($res){
			//echo $res['expiry_date'];
			
			$data['tempID'] = $res['userID'];
			
			if(!$this->session->has_userdata('userID')){
			    
			    $userdata = array('tempID' => $res['userID']);				

				$this->session->set_userdata($userdata);
				
				$this->load->view('templates/header', $data);

				$data['title'] = "Reset Password SmallSmall";

				$this->load->view('reset-page', $data);
				
				$this->load->view('templates/footer');

			}else{

				redirect( base_url() ,'refresh');

			}
		}else{
		    
			$data['status'] = '<span style="color:#F00">Unsuccessful!</span>';

			$data['reason'] = 'This reset link is expired or already used, you can request another reset link by clicking on "Forgot Password"';

			$this->load->view('templates/header', $data);

			$this->load->view('confirmation-result', $data);

			$this->load->view('templates/footer');
			
		}
		
		
	}
	public function confirmation_page(){
	    
        $this->load->view('templates/header');

		$this->load->view('confirmation-result');

		$this->load->view('templates/footer');
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
