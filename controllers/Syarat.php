<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Syarat extends CI_Controller {

	public function __construct()
	{
	   parent::__construct();
	   $this->load->model('syarat_model','',TRUE);
	}

	public function index()
	{		
   		 
	}
 
	public function sy_pelapor()
	{
		//Field validation failed.  User redirected to login page
	   	$this->load->view('public/themes/header');
	    $this->load->view('public/sy_pelapor');
	   	$this->load->view('public/themes/footer');
	    	 
	}


	public function sy_terkait()
	{
		//Field validation failed.  User redirected to login page
	   	$this->load->view('public/themes/header');
	    $this->load->view('public/sy_terkait');
	   	$this->load->view('public/themes/footer');
	    	 
	}

	public function sy_gcg()
	{
		//Field validation failed.  User redirected to login page
	   	$this->load->view('public/themes/header');
	    $this->load->view('public/sy_gcg');
	   	$this->load->view('public/themes/footer');
	    	 
	}
 	
 	public function sy_khusus()
	{
		//Field validation failed.  User redirected to login page
	   	$this->load->view('public/themes/header');
	    $this->load->view('public/sy_khusus');
	   	$this->load->view('public/themes/footer');
	    	 
	}
	public function check()
	{
	   //Field validation succeeded.  Validate against database
	   $email = $this->input->post('email');
	 
	   //query the database
	   $result = $this->user_model->login($email, $password);
	 
	   if($result)
	   {
	     $sess_array = array();
	     foreach($result as $row)
	     {
	       $sess_array = array(
	         'id' => $row->ID_USER,
	         'nama' => $row->NAMA_USER,
	         'id_group' => $row->ID_GROUP,
	         'email' => $row->EMAIL,
	          'logged_in' =>TRUE
	       );
	       $this->session->set_userdata($sess_array);
	     }
	     return TRUE;
	   }
	   else
	   {
	     $this->form_validation->set_message('check_database', 'Invalid email or password');
	     return false;
	   }
	} 
}
