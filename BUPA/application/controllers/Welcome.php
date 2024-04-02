<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {
    
    
    
    function __construct() {
        parent::__construct();
        $this->load->model('Operations');
    }


	public function index()
	{
	    $this->load->view('header');
		$this->load->view('index');
		$this->load->view('footer');
        
	}
	
	public function about()
	{
	    $this->load->view('header');
		$this->load->view('about');
		$this->load->view('footer');
	}
	
	public function constitution()
	{
	    $this->load->view('header');
		$this->load->view('constitution');
		$this->load->view('footer');
	}
	
	public function membership()
	{
	    $this->load->view('header');
		$this->load->view('membership');
		$this->load->view('footer');
	}
		public function newsletter()
	{
	    $this->load->view('header');
		$this->load->view('newsletter');
		$this->load->view('footer');
	}
		public function busia()
	{
	    $this->load->view('header');
		$this->load->view('busia');
		$this->load->view('footer');
	}
	
	public function Join()
	{
	    $firstname = $this->input->post('firstname');
	    $lastname = $this->input->post('lastname');
	    $surname = $this->input->post('surname');
	    $date = date('Y-m-d H:i:s');
	    $profession = $this->input->post('profession');
	    $tel = $this->input->post('telephone');
	    $telephone = preg_replace('/^(?:\?254|0)?/','254', $tel);
	    $address = $this->input->post('address');
	    $code = $this->input->post('code');
	    $city = $this->input->post('city');
	    $email = $this->input->post('email');
	    $company = $this->input->post('company');
	    $street = $this->input->post('street');
	    $businesscode = $this->input->post('businesscode');
	    $businessbox = $this->input->post('businessbox');
	    $businesscity = $this->input->post('businesscity');
	    $constituency = $this->input->post('constituency');
	    $agegroup = $this->input->post('agegroup');
	    
	    $table = 'members';
    	$u_id = $this->Operations->get_user_id_from_email($email,$table);
    	$use    = $this->Operations->get_user($u_id,$table);
    	
    	$p_id = $this->Operations->get_user_id_from_phone($telephone,$table);
        $ph   = $this->Operations->get_user($p_id,$table);
        
            if(empty($firstname) || empty($lastname) || empty($surname)|| empty($profession)|| empty($telephone)|| empty($address)|| empty($code)|| empty($city) || empty($email)|| empty($company)|| empty($street)|| empty($businessbox) || empty($businesscode)|| empty($businesscity)|| empty($constituency)|| empty($agegroup))
            {
                	$this->session->set_flashdata('msg','All inputs required');
    			
    			redirect(base_url()); 
            }
            elseif($use)
			{
				$this->session->set_flashdata('msg','email address already exists');
			
			redirect(base_url()); 
			}
			elseif($ph)
			{
				$this->session->set_flashdata('msg','phone number already exists');
					redirect(base_url()); 
			}
			else
			{
			    
			 $phone_no = $telephone;
			 
			 if($agegroup == 1)
			 {
			     $amount = 1;
			 }
			 if($agegroup == 2)
			 {
			     $amount = 100;
			 }
			 
        
               
        
        //some of this params may need to be populated by a post payload
        $mpesa_consumer_key = "8A32sLlceBRxQH9sCbj1xGOhJ80uKvkW";
        $mpesa_consumer_secret = "mkIbtRAQX6r6FGBH";
        $mpesapass = "bb003c8ec42d4f6c65a632bc5638991ef016f7cfc5edefe1337bc3e982ffb5a1"; //mpesa key
    
        $invoice_number = "BUPA REGISTRATION";
        $shortcode = "4085389"; //shortcode to pay to eg paybill/store number/head office no.
        $systemUrl = base_url().'Welcome/Pay';
        $identifierType ="CustomerPayBillOnline";
        
        //do the checkout and get the feedback
        $feedback = $this->check_transaction_api($firstname,$lastname,$surname,$date,$profession,$address,$code,$city,$email,$company,$street,$businessbox,$businesscode,$businesscity,$constituency,$agegroup,$mpesa_consumer_key,$mpesa_consumer_secret,$mpesapass,$amount,$phone_no,$shortcode,$systemUrl,$identifierType, $invoice_number);

			    
			}
	    
	 
	}
	
	
	   public function Pay()
      {
                
       
        
        
                
                  $stkCallbackResponse = file_get_contents('php://input');
                //   file_put_contents("leo.txt", $stkCallbackResponse);
        
        $decode = json_decode($stkCallbackResponse,true);
        $MerchantRequestID = $decode['Body']['stkCallback']['MerchantRequestID'];
        $CheckoutRequestID = $decode['Body']['stkCallback']['CheckoutRequestID'];
        $Amount = $decode['Body']['stkCallback']['CallbackMetadata']['Item'][0]['Value'];
        $MpesaReceiptNumber = $decode['Body']['stkCallback']['CallbackMetadata']['Item'][1]['Value'];
        $TransactionDate = $decode['Body']['stkCallback']['CallbackMetadata']['Item'][3]['Value'];
        $phoned = $decode['Body']['stkCallback']['CallbackMetadata']['Item'][4]['Value'];
        $ResultCode = $decode['Body']['stkCallback']['ResultCode'];
        
        $CustomerMessage = $decode['Body']['stkCallback']['ResultDesc'];
        
        if($ResultCode == 0)
        {
            file_put_contents("ch.txt", $stkCallbackResponse);
             $data = array(
                'ResultCode'        =>0,
                'MerchantRequestID' =>$MerchantRequestID,
                'CheckoutRequestID' =>$CheckoutRequestID,
                'MpesaReceiptNumbe'=>$MpesaReceiptNumber,
                'TransactionDate'   =>$TransactionDate,
                'Amount'            =>$Amount,
                'Phone'             =>$phoned,
                'CustomerMessage'   =>$CustomerMessage,
                'date'              =>date('Y-m-d'),
                );
                
                
                $table = 'mpesa';
                
                $res = $this->Operations->Create($table,$data);
                
                $condition = array
                (
                    'MerchantRequestID' =>$MerchantRequestID,
                    'CheckoutRequestID' =>$CheckoutRequestID,
                );
                
                $updatedata = array
                ('paid'=>1,'amount'=>$Amount,'status'=>1);
                
                $update = $this->Operations->UpdateData('members',$condition,$updatedata);

        }
        else
        {
            echo json_encode(array('result'=>'fail','message'=>$CustomerMessage));
        }
        
        //let's log until until further interaction with db, avoid this for production
        // file_put_contents("logs_checkout.txt", $feedback);
        
        }


    
        public function checkout_query($mpesa_consumer_key,$mpesa_consumer_secret,$mpesapass,$shortcode,$CheckoutRequestID){
        //set system time to Nairobi
        //date_default_timezone_set("Africa/Nairobi");
        $timestamp = date("Ymdhis");
        //set pass
        $password = base64_encode($shortcode.$mpesapass.$timestamp);
        
        $curl = curl_init();
        $url = 'https://api.safaricom.co.ke/oauth/v1/generate?grant_type=client_credentials';
        curl_setopt($curl, CURLOPT_URL, $url);
        $credentials = base64_encode($mpesa_consumer_key.':'.$mpesa_consumer_secret);
        curl_setopt($curl, CURLOPT_HTTPHEADER, array('Authorization: Basic '.$credentials)); //setting a custom header
        curl_setopt($curl, CURLOPT_HEADER, false); //set false to allow json decode
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true); //very important
        $curl_response = curl_exec($curl);
        $cred_password_raw = json_decode($curl_response, true); 
        $cred_password = $cred_password_raw['access_token']; 
        
        
        $url = 'https://api.safaricom.co.ke/mpesa/stkpushquery/v1/query';
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type:application/json','Authorization:Bearer '.$cred_password)); //setting custom header
        
        $curl_post_data = array(
          //Fill in the request parameters with valid values
          'BusinessShortCode' => $shortcode,
          'Password' => $password,
          'Timestamp' => $timestamp,
          'CheckoutRequestID' => $CheckoutRequestID
        );
    
        
        $data_string = json_encode($curl_post_data);
        
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_POST, true);
        curl_setopt($curl, CURLOPT_POSTFIELDS, $data_string);
        
        $curl_response = curl_exec($curl);
        $resultStatus_raw = json_decode($curl_response, true); ;
        $resultStatus = $resultStatus_raw['ResultCode'];
        
        if ($resultStatus === "0"){
            $success_on = "yes#";
            $success_combination = $success_on.$MerchantRequestID."#".$CheckoutRequestID;
            //return $success_combination;
            foreach($resultStatus_raw as $key=>$value){
                $parte .= $key."=>".$value."\n";
            }
            return $parte;
        }
        else{
            $error_on = "error#";
            $error = $error_on.$resultStatus_raw['ResultDesc'];
            return $error;
        }
    }
    	     
     public function check_transaction_api($firstname,$lastname,$surname,$date,$profession,$address,$code,$city,$email,$company,$street,$businessbox,$businesscode,$businesscity,$constituency,$agegroup,$mpesa_consumer_key,$mpesa_consumer_secret,$mpesapass,$amount,$phone_no,$shortcode,$systemUrl,$identifierType, $invoice_number)
    {
        //set system time to Nairobi
        //date_default_timezone_set("Africa/Nairobi");
        $timestamp = date("Ymdhis");
        //set pass
        $password = base64_encode($shortcode.$mpesapass.$timestamp);
        
        $curl = curl_init();
        $url = 'https://api.safaricom.co.ke/oauth/v1/generate?grant_type=client_credentials';
        curl_setopt($curl, CURLOPT_URL, $url);
        $credentials = base64_encode($mpesa_consumer_key.':'.$mpesa_consumer_secret);
        curl_setopt($curl, CURLOPT_HTTPHEADER, array('Authorization: Basic '.$credentials)); //setting a custom header
        curl_setopt($curl, CURLOPT_HEADER, false); //set false to allow json decode
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true); //very important
        $curl_response = curl_exec($curl);
        $cred_password_raw = json_decode($curl_response, true); 
        $cred_password = $cred_password_raw['access_token']; 
        
        
        $url = 'https://api.safaricom.co.ke/mpesa/stkpush/v1/processrequest';
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type:application/json','Authorization:Bearer '.$cred_password)); //setting custom header
        
        $curl_post_data = array(
          //Fill in the request parameters with valid values
          'BusinessShortCode' => $shortcode,
          'Password' => $password,
          'Timestamp' => $timestamp,
          'TransactionType' => $identifierType,
          'Amount' => $amount,
          'PartyA' => $phone_no,
          'PartyB' => $shortcode,
          'PhoneNumber' => $phone_no,
          'CallBackURL' => $systemUrl,
          'AccountReference' => $invoice_number,
          'TransactionDesc' => 'not applicable'
        );
    
        
        $data_string = json_encode($curl_post_data);
        
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_POST, true);
        curl_setopt($curl, CURLOPT_POSTFIELDS, $data_string);
        
        $curl_response = curl_exec($curl);
        //echo json_decode($curl_response); /*avoid json_decoding twice */
        $resultStatus_raw = json_decode($curl_response, true); ;
        $resultStatus = $resultStatus_raw['ResponseCode'];
        $MerchantRequestID = $resultStatus_raw['MerchantRequestID'];
        $CheckoutRequestID = $resultStatus_raw['CheckoutRequestID'];
        

        
        if ($resultStatus === "0"){
            $success_on = "yes#";
          
              $telephone =  $phone_no;
            
                 $data = array(
    	        'firstname' =>$firstname,
    	        'lastname'  =>$lastname,
    	        'surname'   =>$surname,
    	        'date'      =>$date,
    	        'profession'=>$profession,
    	        'telephone' =>$telephone,
    	        'address'   =>$address,
    	        'code'      =>$code,
    	        'city'      =>$city,
    	        'email'     =>$email,
    	        'company'   =>$company,
    	        'street'    =>$street,
    	        'businessbox' => $businessbox,
    	        'businesscode'=>$businesscode,
    	        'businesscity'=>$businesscity,
    	        'constituency'=>$constituency,
    	        'agegroup'   =>$agegroup,
    	        'paid'       => 0,
    	        'amount'     => 0,
    	        'status'     => 0,
    	        'MerchantRequestID' => $MerchantRequestID,
    	        'CheckoutRequestID'=>$CheckoutRequestID
    	        );
    	        
    	        $table = 'members';
    	        
	        
        	   $insert = $this->Operations->Create($table,$data);
        	   if($insert == 1)
        	   {
        	       
        	       $subject = 'Member Registration';
        	       $message = 'Success Registered waiting for payment confirmation...';
        	       
        	       $sendmail = $this->Operations->SendEmail($email,$subject,$message);
        	       	$this->session->set_flashdata('msg',$message);
        			redirect(base_url()); 
        	   }
        	   else
        	   {
        	        $this->session->set_flashdata('msg','Unable to register now, try again later');
        			redirect(base_url()); 
        	       
        	   }
        }
        else{
            $error_on = "error#";
            $error = $error_on.$resultStatus_raw['errorMessage'];
            return $error;
        }
    }
    
    

    public function Confirm()
    {
        $mpesa_consumer_key ="8A32sLlceBRxQH9sCbj1xGOhJ80uKvkW";
                //replace this  key from Daraja Portal
        $mpesa_consumer_secret = "mkIbtRAQX6r6FGBH"; //replace this also
        $mpesapass = "bb003c8ec42d4f6c65a632bc5638991ef016f7cfc5edefe1337bc3e982ffb5a1";
        $shortcode = "4085389";
        $CheckoutRequestID = $this->session->set_userdata('CheckoutRequestID'); /*normally this cannot be static, it changes per transaction */
        
        //do the checkout query and get the feedback
        $feedback = $this->checkout_query($mpesa_consumer_key,$mpesa_consumer_secret,$mpesapass,$shortcode,$CheckoutRequestID);

    }
    
    
    public function ContactUs()
    {
        $name =  $this->input->post('name');
        $email =  $this->input->post('email');
        $subject = $this->input->post('subject');
        $message = $this->input->post('message');
        
        if(empty($name) || empty($email) || empty($subject) || empty($message))
        {
            $this->session->set_flashdata('msg','Name ,email , subject and message should not be empty');
			
			redirect(base_url()); 
        }
        

        // use wordwrap() if lines are longer than 70 characters
        $message = wordwrap($message,100);

        $to = "samson@mzawadi.com";
        $headers = "From: '.$email.'" . "\r\n";
        
        $send = mail($to,$subject,$message,$headers);
        if($send)
        {
    	$this->session->set_flashdata('msg','Success we have received your email');
			
			redirect(base_url()); 
        }
        else
        {
        $this->session->set_flashdata('msg','Unable to send now, try later');
			
			redirect(base_url()); 
            
        }

        
    }
}
