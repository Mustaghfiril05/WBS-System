<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

	public function __construct()
	{
	   parent::__construct();
	   $this->load->model('user_model','',TRUE);
	}

	public function index()
	{		
   		 
	}
 
	public function login()
	{
		//Field validation failed.  User redirected to login page
	   	$this->load->view('public/themes/header');
	    $this->load->view('public/login');
	   	$this->load->view('public/themes/footer');
	    	 
	}
 	public function check()
	{
	   	$email = $this->input->post('username');
	   	$password = $this->input->post('password'); 
	 
	   //query the database
	   	$result = $this->user_model->login($email); 
		$sess_array = array();
	 
	   if($result)
	   {
	   	// echo "<pre>";
	   	// print_r($result);
	   	if($result->password===sha1($password)){
			$sess_array = array(
	         	'userid' => $row->USER_ID,
	         	'username' => $row->USERNAME,
	         	'role' => $row->ROLE, 
	          	'logged_in' =>TRUE
	       	);
	       	$this->session->set_userdata($sess_array);

	       	redirect('admin/home');
	   	}else{
	   		redirect('user/login');
	   	}
	   	   	// $sess_array = array();
	    	// if($result)
		   	// $sess_array = array(
				  //        'userid' => $row->USER_ID,
				  //        'username' => $row->USERNAME,
				  //        'role' => $row->ROLE, 
				  //         'logged_in' =>TRUE
				  //      	);
				  //      	$this->session->set_userdata($sess_array);
		    //  			redirect('admin/home');
	   }else
	   {
	     //$this->form_validation->set_message('check_database', 'Invalid email or password');
	     redirect('user/login');
	   }
	} 
	// public function check()
	// {
	//    $email = $this->input->post('email');
	//    $password = $this->input->post('password'); 
	//    $ldapconn	= 	ldap_connect("dc1.teluklamong.co.id") or die("Connection Failed");
	 
	//    //query the database
	//    $result = $this->user_model->login($email); 

	//    $ldaprdn 	=	$this->input->post('email');
	//    $ldappass	=	$this->input->post('password');
	 
	//    if($result)
	//    {
	//      $sess_array = array();
	//      foreach($result as $row)
	//      {
	//      	if ($ldapconn) {
	//    			$ldapbind	=	ldap_bind($ldapconn,$ldaprdn,$ldappass);

	//      		if ($ldapbind) {
	//      			$sess_array = array(
	// 		         'userid' => $row->USER_ID,
	// 		         'username' => $row->USERNAME,
	// 		         'role' => $row->ROLE, 
	// 		          'logged_in' =>TRUE
	// 		       	);
	// 		       	$this->session->set_userdata($sess_array);
	//      			redirect('admin/home');
	//      		}
	// 	     	else
	// 	     		{redirect('user/login');}
	//      	}
	//      	else
	//      		{redirect('user/login');}
	       
	//      } 
	//    }
	//    else
	//    {
	//      //$this->form_validation->set_message('check_database', 'Invalid email or password');
	//      redirect('user/login');
	//    }
	// } 
}
