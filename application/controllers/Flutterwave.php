<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Flutter Wave Library for CodeIgniter 3.X.X
 *
 * Library for Flutter Wave payment gateway. It helps to integrate Flutter Wave payment gateway's Standard Method
 * in the CodeIgniter application.
 *
 * It requires Flutterwave configuration file and it should be placed in the config directory.
 *
 * @package     CodeIgniter
 * @category    Libraries
 * @author      Jaydeep Goswami
 * @link        https://infinitietech.com
 * @GITHUB link https://github.com/jaydeepgiri/Flutterwave-Payments-CodeIgniter-3.X.X-Library
 * @license     https://github.com/jaydeepgiri/Flutterwave-Payments-CodeIgniter-3.X.X-Library/blob/master/LICENSE
 * @version     1.0
 */

class Flutterwave extends CI_Controller {
	
	protected $response = '';
	public function __construct(){
		parent::__construct();
		$this->load->helper('url');
		$this->load->library(['flutterwave_lib','session']);
		
	}
	public function index()
	{
		$this->load->view('flutterwave/payment_form');
	}
	
	public function create_transaction()
	{
		$data = $this->input->post();
		
		$bookingID = $data['bookingID'];
    	    
    	    
		
		$data = array(
			'amount'=>$data['cost_amount'],
			'customer_email' => $data['customer_email'],
			'redirect_url'=>base_url("flutterwave/payment_status/")
		);
		
		$this->response = $this->flutterwave_lib->create_payment($data);
		
		//print_r($this->response);
		
		if(!empty($this->response) || $this->response != ''){
		    
			$this->response = json_decode($this->response,1);
			
			if(isset($this->response['status']) && $this->response['status'] == 'success'){
			    
			    //Set sessions for data
			    $payment_details = array("bookingID" => $bookingID);
			    
			    $this->session->set_userdata($payment_details);
				
				redirect($this->response['data']['link']);
				
			}else{
			    
				$this->session->set_flashdata('message_type', 'danger');
				$this->session->set_flashdata('message', 'API returned error >> '.$this->response['message']);
				redirect(base_url('flutterwave/'));
				
			}
		}
		// $this->load->view('flutterwave/payment_form');
	}
	public function payment_status()
	{
		$params = $this->input->get();
		if(empty($params)){
			$data['status'] = 'error';
			$data['message'] = "No parameters found.";
			$this->load->view('payment_status',$data);
			
		}elseif(isset($params['txref']) && !empty($params['txref'])){
			$response = $this->flutterwave_lib->verify_transaction($params['txref']);
			if(!empty($response)){
				$response = json_decode($response,1);
				if($response['status'] == 'success' && isset($response['data']['chargecode']) && ( $response['data']['chargecode'] == '00' || $response['data']['chargecode'] == '0') ){
					
					//$data['payment_plan'] = $response['data']['paymentplan'];
					$data['customer_email'] = $response['data']['custemail'];
					$data['txn_id'] = $response['data']['txref'];
					$data['amount'] = $response['data']['amount'];
					$data['currency_code']  = $response['data']['currency'];
					$data['status'] = $response['data']['status'];
					$data['message'] = $response['message'];
					$data['full_data'] = $response;
					
					/* 
						Perform Database Operations here 
						Add your custom code here for any other operation like 
						selling good / inserting / update transaction record in database / anything else
							Or 
						to make payment system more secure you can make use of Webhook for one extra layer of security.  
					*/
					$data['bookingID'] = $this->session->userdata("bookingID");
					
					//Update payment status
					$update_res = $this->stayone_model->updatePaymentStatus($bookingID, 'Approved');
					
    				$data['payment_status'] = "Successful";
    				
    				$data['status_text'] = "Your payment was successful, enjoy your stay with us.";
    				
    				$data['color'] = 'green';
					
					
				}elseif( (isset($params['cancelled']) && $params['cancelled'] == true)){
				    
				    //Update payment status
					$update_res = $this->stayone_model->updatePaymentStatus($bookingID, 'Cancelled');
					
					$data['payment_status'] = "Cancelled";
    				
    				$data['status_text'] = "There was an error paying for the apartment, please try again.";
    				
    				$data['color'] = 'orange';
					
					//print_r($data);
					//$this->load->view('flutterwave/payment_status',$data);
				}elseif( $response['status'] == 'error'){
				    
					//Update payment status
					$update_res = $this->stayone_model->updatePaymentStatus($bookingID, 'Declined');
					
					$data['payment_status'] = "Declined";
    				
    				$data['status_text'] = "Payment declined, please try again or select another mode of payment";
    				
    				$data['color'] = 'red';
					
					//$this->load->view('flutterwave/payment_status',$data);
				}
				if($this->session->has_userdata('loggedIn')){

        			$data['userID'] = $this->session->userdata('userID');			
        
        			$data['fname'] = $this->session->userdata('fname');			
        
        			$data['lname'] = $this->session->userdata('lname');	
        
        			$data['user_type'] = $this->session->userdata('user_type');	
        			
        			$data['loggedIn'] = $this->session->userdata('loggedIn');
				}
				
				$this->load->view('templates/header', $data);
				
				$this->load->view('payment_result', $data);
				
				$this->load->view('templates/footer', $data);
			}else{
			    
				//Update payment status
					$update_res = $this->stayone_model->updatePaymentStatus($bookingID, 'Failed');
				
				if($this->session->has_userdata('loggedIn')){

        			$data['userID'] = $this->session->userdata('userID');			
        
        			$data['fname'] = $this->session->userdata('fname');			
        
        			$data['lname'] = $this->session->userdata('lname');	
        
        			$data['user_type'] = $this->session->userdata('user_type');	
        			
        			$data['loggedIn'] = $this->session->userdata('loggedIn');
				}
				
				$data['payment_status'] = "Failed";
    				
				$data['status_text'] = "Transaction failed while processing, please try again or select another mode of payment";
				
				$data['color'] = 'red';
				
				$this->load->view('templates/header', $data);
				
				$this->load->view('payment_result', $data);
				
				$this->load->view('templates/footer', $data);
			}
		}
	}/* end of payment_status() */
	
	
	/* 
		Flutter wave webhook 
		-------------------------------------------------------------
		You can give this URL in flutter wave dashboard as webhook URL 
		Ex: yourdomain.com/flutterwave/webhook
	*/
    public function webhook(){
        $this->config->load('flutterwave');
        
        $local_secret_hash = $this->config->item('secret_hash');
        
        $body = @file_get_contents("php://input");
        
        $response = json_decode($body,1);
        
		/* 
			to store the flutter wave response and server response into the log file, 
			which can be found under 'application/logs/' folder
			Make a note many times codeIgniter cannot directly read the values of '$_SERVER' variable therefore if such problem arises 
			you can add the following line in your root .htaccess file
			
			SetEnvIf Authorization "(.*)" HTTP_AUTHORIZATION=$1 
			
		*/
        log_message('debug', 'Flutter Wave Webhook - Normal Response - JSON DATA --> ' . var_export($response, true));
        log_message('debug', 'Server Variable --> '.var_export($_SERVER,true));
        
		/* Reading the signature sent by flutter wave webhook */
        $signature = (isset($_SERVER['HTTP_VERIF_HASH']))?$_SERVER['HTTP_VERIF_HASH']:'';
        
		/* comparing our local signature with received signature */
        if(empty($signature) || $signature != $local_secret_hash ){
            log_message('error', 'Flutter Wave Webhook - Invalid Signature - JSON DATA --> ' . var_export($response, true));
            log_message('error', 'Server Variable --> '.var_export($_SERVER,true));
            exit();
        }
		
        if(strtolower($response['status']) == 'successful') {
            // TIP: you may still verify the transaction
            // before giving value.
            $response = $this->flutterwave->verify_transaction($response['txRef']);
            
            $response = json_decode($response,1);
            
            if(!empty($response) && isset($response['data']['status']) && strtolower($response['data']['status']) == 'successful' 
                && isset($response['data']['chargecode']) && ( $response['data']['chargecode'] == '00' || $response['data']['chargecode'] == '0')
            ){
                
                $payer_email = $response['data']['custemail'];
                $paymentplan = $response['data']['paymentplan'];
                
                /* 
					Perform Database Operations here 
					Add your custom code here for any other operation like 
					selling good / inserting / update transaction record in database / anything else
				*/
                
            }else{
                /* Transaction failed */
                log_message('error', 'Flutter Wave Webhook - Inner Verification Failed --> ' . var_export($response, true));
                log_message('error', 'Server Variable -->  '.var_export($_SERVER,true));
            }
            
        }else{
            /* Transaction failed */
            log_message('error', 'Flutter Wave Webhook - Outter Verification Failed --> ' . var_export($response, true));
            log_message('error', 'Server Variable -->  '.var_export($_SERVER,true));
        }
        
    }
}