<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function __construct()
	{
	   parent::__construct();
	   $this->load->model('user_model','',TRUE);
	   $this->load->model('masalah_model');
	}

	public function index()
	{	
		if($this->session->userdata('logged_in')){

		   	$this->load->view('admin/themes/header');
		    $this->load->view('admin/home');
		   	$this->load->view('admin/themes/footer'); 
		}
		else
		{
			redirect('welcome','refresh');
		}  		 
	}

 	public function pie_data(){
		echo json_encode($this->masalah_model->pieChart());
	 }
	 
	 public function line_data(){
		echo json_encode($this->masalah_model->lineChart());
 	}
	
	public function login()
	{

	   	$this->load->view('admin/themes/header');
	    $this->load->view('admin/login');
	   	$this->load->view('admin/themes/footer');
	    	 
	} 

	public function logout()
	{
		session_destroy();
		redirect('welcome');
	}
	 
}
