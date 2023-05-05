<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Alaporan extends CI_Controller {

	public function __construct()
	{
	   parent::__construct();
	   $this->load->model('user_model','',TRUE);
	   $this->load->model('laporan_model','',TRUE);
	   $this->load->model('masalah_model','',TRUE);
	   $this->load->model('user_model','',TRUE);
	   $this->load->library('pdf');
	   //$this->load->model('progress_model','',TRUE);

	}

	public function index()
	{		
	   			 
	}
	public function l_user()
	{	
		$data['users'] = $this->user_model->get_all_user();
		//Field validation failed.  User redirected to login page
	   	$this->load->view('admin/themes/header');
	    $this->load->view('admin/l_users',$data);
	   	$this->load->view('admin/themes/footer');
	    	 
	}
	public function l_laporan()
	{	
		$data['masalah'] = $this->masalah_model->get_all_masalah()->result();
		$data['progress'] = $this->masalah_model->get_all_progress()->result();
		//Field validation failed.  User redirected to login page
	   	$this->load->view('admin/themes/header');
	    $this->load->view('admin/l_laporan',$data);
	   	$this->load->view('admin/themes/footer');
	    	 
	}
	public function detailLaporan_pdf(){
		
		$data['data']=$this->laporan_model->get_all_laporan($_GET['id'])->row_array();
		$data['direksi']=$this->user_model->get_direksi_one();
		$this->pdf->setPaper('A4', 'potrait');
   	    $this->pdf->filename = $data['data']['id_laporan']."_saved_at_".date('d_m_Y-H_i').".pdf";
		$this->pdf->load_view('admin/_detail_lap_pdf', $data);
	}

	public function detailLaporan(){
		// echo $_GET['id'];
		$data['data']=$this->laporan_model->get_all_laporan($_GET['id'])->row_array();
	    $this->load->view('admin/_detail_lap',$data);
	}
	public function detailPelapor(){
		// echo $_GET['id'];
		$this->db->from('identitas_pelapor',false);
		$this->db->where('id_identitas_pelapor',$_GET['id'],false);
		$query = $this->db->get();
		$data['data']=$query->row_array();   
	    $this->load->view('admin/_detail_pelapor',$data);
	}
	public function laporan_filter(){
		$data['listlaporan'] = $this->laporan_model->get_all_laporan();
	    $this->load->view('admin/_laporan',$data);
	}

	public function l_masalah()
	{	
		$data['mmasalah'] = $this->masalah_model->get_all_masalah();
		//Field validation failed.  User redirected to login page
	   	$this->load->view('admin/themes/header');
	    $this->load->view('admin/l_masalah',$data);
	   	$this->load->view('admin/themes/footer');
	    	 
	}

	public function insert_masalah()
    {

			$data = array(
				'id_masalah'		=>	$this->db->escape($this->input->post('id_masalah')),
				'jenis_masalah'		=>	$this->db->escape($this->input->post('masalah_desc')),
				// 'id_masalah_lapor' 	=> 	$this->db->escape('1'),
				// 'created_by'		=> 	$this->db->escape('ADMIN'),
				// 'created_date'		=>	$this->db->escape(date('d-M-Y'))	
			);
				
            $this->masalah_model->insert_masalah($data);
            redirect('admin/Alaporan/l_masalah',$data);
                
	}
	public function insert_user()
    {

			$data = array(
				'username'		=>	$this->db->escape($this->input->post('username')),
				'password'		=>	sha1($this->db->escape($this->input->post('password'))),
				'email'		=>	$this->db->escape($this->input->post('email')),
				'name'		=>	$this->db->escape($this->input->post('fullname')),
				'jabatan'		=>	$this->db->escape($this->input->post('jabatan')),
				'level'		=>	$this->db->escape($this->input->post('level')),
			);
			$this->db->insert('users',$data,FALSE);
            redirect('admin/Alaporan/l_user',$data);
                
    }

	public function approving_progress($id_laporan)
	{
		$laporan = $this->laporan_model->get_laporan($this->db->escape($id_laporan));

		$laporan_token =  $laporan->password_id_laporan;
		/*foreach ($laporan as $lap) {
		}*/

		$data['laporan'] = $laporan;
		$data['progress'] = $this->laporan_model->get_all_progress();
		$result = $this->laporan_model->check_laporan($this->db->escape($id_laporan),$this->db->escape($laporan_token));
		   foreach ($result->result() as $key) {
		   	$id_laporan 	= $key->id_laporan;
		   } 
	   	$data['result'] = $result;
	   	$data['pro1']	= $this->laporan_model->check_progress_laporan($this->db->escape($id_laporan), $this->db->escape($laporan_token), $this->db->escape('PRO1'));
	   	$data['pro2']	= $this->laporan_model->check_progress_laporan($this->db->escape($id_laporan), $this->db->escape($laporan_token), $this->db->escape('PRO2'));
	   	$data['pro3']	= $this->laporan_model->check_progress_laporan($this->db->escape($id_laporan), $this->db->escape($laporan_token), $this->db->escape('PRO3'));
	   	$data['pro4']	= $this->laporan_model->check_progress_laporan($this->db->escape($id_laporan), $this->db->escape($laporan_token), $this->db->escape('PRO4'));
	   	$data['pro5']	= $this->laporan_model->check_progress_laporan($this->db->escape($id_laporan), $this->db->escape($laporan_token), $this->db->escape('PRO5'));
	   	$data['pro6']	= $this->laporan_model->check_progress_laporan($this->db->escape($id_laporan), $this->db->escape($laporan_token), $this->db->escape('PRO6'));
	   	$data['pro7']	= $this->laporan_model->check_progress_laporan($this->db->escape($id_laporan), $this->db->escape($laporan_token), $this->db->escape('PRO7'));


		$this->load->view('admin/themes/header');
		$this->load->view('admin/progress_laporan_approve',$data);
		$this->load->view('admin/themes/footer');
	}

	public function progress($id_laporan)
	{
		$laporan = $this->laporan_model->get_laporan($this->db->escape($id_laporan));

		$laporan_token =  $laporan->password_id_laporan;
		/*foreach ($laporan as $lap) {
		}*/

		$data['laporan'] = $laporan;
		$data['progress'] = $this->laporan_model->get_all_progress();
		$result = $this->laporan_model->check_laporan($this->db->escape($id_laporan),$this->db->escape($laporan_token));
		   foreach ($result->result() as $key) {
		   	$id_laporan 	= $key->id_laporan;
		   } 
	   	$data['result'] = $result;
	   	$data['pro1']	= $this->laporan_model->check_progress_laporan($this->db->escape($id_laporan), $this->db->escape($laporan_token), $this->db->escape('PRO1'));
	   	$data['pro2']	= $this->laporan_model->check_progress_laporan($this->db->escape($id_laporan), $this->db->escape($laporan_token), $this->db->escape('PRO2'));
	   	$data['pro3']	= $this->laporan_model->check_progress_laporan($this->db->escape($id_laporan), $this->db->escape($laporan_token), $this->db->escape('PRO3'));
	   	$data['pro4']	= $this->laporan_model->check_progress_laporan($this->db->escape($id_laporan), $this->db->escape($laporan_token), $this->db->escape('PRO4'));
	   	$data['pro5']	= $this->laporan_model->check_progress_laporan($this->db->escape($id_laporan), $this->db->escape($laporan_token), $this->db->escape('PRO5'));
	   	$data['pro6']	= $this->laporan_model->check_progress_laporan($this->db->escape($id_laporan), $this->db->escape($laporan_token), $this->db->escape('PRO6'));
	   	$data['pro7']	= $this->laporan_model->check_progress_laporan($this->db->escape($id_laporan), $this->db->escape($laporan_token), $this->db->escape('PRO7'));


		$this->load->view('admin/themes/header');
		$this->load->view('admin/progress_laporan',$data);
		$this->load->view('admin/themes/footer');
	}

	public function update_progress()
	{
		$id_laporan 	= $this->input->post('id_laporan');
		$progress 		= $this->input->post('progress');
		$tanggal 		= date('Y-m-d',strtotime($this->input->post('tanggal_progress')));
		$laporan_token 	= $this->input->post('laporan_token');
		$email_pelapor 	= $this->input->post('email_pelapor');

		$config['upload_path'] 		= './uploads/';
		$config['allowed_types'] 	= 'gif|jpg|jpeg|png|pdf';
		$config['max_size']  		= '2048';
		$config['file_name']  		= $id_laporan;
		$config['file_ext_tolower'] = TRUE;
		
		$this->load->library('upload', $config);

		$this->upload->do_upload('attachment');						
		$uploaded_path = '/uploads/'.$this->upload->data('file_name'); 

		$data_progress_laporan = array(
			'id_laporan'	=>  $this->db->escape($id_laporan),
			'id_progress'	=>  $this->db->escape($progress),
			// 'created_by'	=>  $this->db->escape('admin'),
			'tanggal_pembuatan'	=>	$this->db->escape($tanggal),
			// 'laporan_token'	=>	$this->db->escape($laporan_token),
			'file_url'	 	=>	$this->db->escape( $uploaded_path )
		);

		$this->laporan_model->insert_progress_laporan($data_progress_laporan);
		if ($this->input->post('email_dir')) { 

			
			$this->send_mail_direksi($email_pelapor,$id_laporan);

		}
		$this->send_mail_progress($email_pelapor,$id_laporan);

        redirect('admin/Alaporan/l_laporan',$data);
	}

	public function send_mail_progress($email,$id_laporan)
	{
		$this->load->library('phpmailer_library');
		$mail = $this->phpmailer_library->load();

		//$debug = $mail->SMTPDebug = 3;                               // Enable verbose debug output

		$mail->isSMTP();                                      // Set mailer to use SMTP
		$mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
		$mail->SMTPAuth = true;                               // Enable SMTP authentication
		//$mail->AuthType = 'LOGIN';
		$mail->Username = 'wbsalp@gmail.com';                 // SMTP username
		$mail->Password = 'petroindustry';                           // SMTP password
		$mail->SMTPSecure = 'ssl';                            // Enable TLS encryption, `ssl` also accepted
		$mail->Port = 465;                                    // TCP port to connect to	
		$mail->isHTML(true); 	
		
		//custom code
		$mail->SMTPOptions = array(
			'ssl' => array(
				'verify_peer' => false,
				'verify_peer_name' => false,
				'allow_self_signed' => true
			)
		);
		//end custom code

		$mail->setFrom('wbsalp@gmail.com','Tim WBS');
		$mail->addAddress($email); 
	

		$mail->Subject 	= 'Perkembangan Laporan : '.$id_laporan.' | PT. ALP Petro Industry Blowing System';
		$mail->Body 	= 'Yth. Bpk/Ibu </br>Nomor aduan anda : '.$id_laporan.' telah diproses lebih lanjut. </br>'.'</br>
			Untuk selanjutnya Bpk/Ibu dapat memantau perkembangan laporan melalui link <a href="">berikut</a> .</br>'.'</br></br>
			Demikian, atas perhatian dan kerja samanya kami sampaikan terima kasih. </br>';

		if(!$mail->Send()) {
	        //echo "Mailer Error: " . $mail->ErrorInfo;
	        //echo $debug;
	     } else {
	        //echo "Message has been sent";
	        //echo $debug;
	    }
		 
	}
	public function progress_approved($id_progress_laporan){
		//echo $id_progress_laporan;
		$this->db->set('is_approved', 1, FALSE);
		$this->db->set('approved_at', 'now()', FALSE);
		$this->db->where('id_progress_laporan', $id_progress_laporan);
		if($this->db->update('progress_laporan')){
			$query = $this->db->get_where('progress_laporan', ['id_progress_laporan' => $id_progress_laporan])->row();
			$laporan = $this->laporan_model->get_laporan($this->db->escape($query->id_laporan));
			
			if($this->send_mail_wbs($laporan->id_laporan,$laporan->last_progress)){
				redirect(base_url().'?q='.$laporan->id_laporan);
			}
		}
		
	}
	public function send_mail_wbs($id_laporan,$progress_text)
	{
		$this->load->library('phpmailer_library');
		$mail = $this->phpmailer_library->load();

		//$debug = $mail->SMTPDebug = 3;                               // Enable verbose debug output

		// $mail->isSMTP();                                      // Set mailer to use SMTP
		// $mail->Host = 'mail.teluklamong.co.id';  // Specify main and backup SMTP servers
		// $mail->SMTPAuth = true;                               // Enable SMTP authentication
		// //$mail->AuthType = 'LOGIN';
		// $mail->Username = 'it@teluklamong.co.id';                 // SMTP username
		// $mail->Password = 'ictl4m0ng';                           // SMTP password
		// $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
		// $mail->Port = 587;                                    // TCP port to connect to	
		// $mail->isHTML(true); 	
		$mail->isSMTP();                                      // Set mailer to use SMTP
		$mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
		$mail->SMTPAuth = true;                               // Enable SMTP authentication
		//$mail->AuthType = 'LOGIN';
		$mail->Username = 'wbsalp@gmail.com';                 // SMTP username
		$mail->Password = 'petroindustry';                           // SMTP password
		$mail->SMTPSecure = 'ssl';                            // Enable TLS encryption, `ssl` also accepted
		$mail->Port = 465;                                    // TCP port to connect to	
		$mail->isHTML(true); 	
		
		//custom code
		$mail->SMTPOptions = array(
			'ssl' => array(
				'verify_peer' => false,
				'verify_peer_name' => false,
				'allow_self_signed' => true
			)
		);
		//end custom code

		$mail->setFrom('wbsalp@gmail.com','WBS System');
		//$mail->addAddress('joe@example.net', 'Joe User');     // Add a recipient 
		$mail->addAddress('dekfiral@gmail.com'); 
		$mail->addReplyTo('dekfiral@gmail.com','Tim WBS');

		// $mail->addAddress('rijalboy98@gmail.com'); 
		// $mail->addReplyTo('rijalboy98@gmail.com','Tim WBS');
		

		$mail->Subject = $id_laporan.' : '.$progress_text.' telah Disetujui | PT. ALP Petro Industry Whistle Blowing System ';
		$mail->Body    = 'Progress: <b>'.$progress_text.'</b>, pada Laporan : <b>'.$id_laporan.'</b>, Telah disetujui direksi. </br>'.'Harap segera ditindak lanjuti melalui aplikasi WBS ALP Petro Industry. </br></br>
			Demikian, atas perhatian dan kerja samanya kami sampaikan terima kasih. </br>' ;

		if(!$mail->Send()) {
	        //echo "Mailer Error: " . $mail->ErrorInfo;
	        //echo $debug;
	     } else {
	        //echo "Message has been sent";
	        //echo $debug;
		 }
		 return true;
	}

	public function send_mail_direksi($email,$id_laporan)
	{
		$this->load->library('phpmailer_library');
		$mail = $this->phpmailer_library->load();

		$mail->isSMTP();                                      // Set mailer to use SMTP
		$mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
		$mail->SMTPAuth = true;                               // Enable SMTP authentication
		//$mail->AuthType = 'LOGIN';
		$mail->Username = 'wbsalp@gmail.com';                 // SMTP username
		$mail->Password = 'petroindustry';                           // SMTP password
		$mail->SMTPSecure = 'ssl';                            // Enable TLS encryption, `ssl` also accepted
		$mail->Port = 465;                                    // TCP port to connect to	
		$mail->isHTML(true); 	
		
		//custom code
		$mail->SMTPOptions = array(
			'ssl' => array(
				'verify_peer' => false,
				'verify_peer_name' => false,
				'allow_self_signed' => true
			)
		);
		//end custom code

		$mail->setFrom('wbsalp@gmail.com','Tim WBS');

		foreach ($this->user_model->getAll_direksi() as $user) {
			$mail->addAddress($user->email); 
		}
		$url=base_url("admin/Alaporan/approving_progress/".$id_laporan);
		$mail->Subject 	= 'Perkembangan Laporan : '.$id_laporan.' | PT. ALP Petro Industry Blowing System';
		$mail->Body 	= 'Yth. Bpk/Ibu Direksi, </br>Nomor aduan : '.$id_laporan.' telah diproses lebih lanjut. </br>'.'</br>
			Untuk selanjutnya Bpk/Ibu mohon berkenan <b>menyetujui perkembangan laporan</b> melalui link <a href="'.$url.'">berikut</a> .</br>'.'</br></br>
			Demikian, atas perhatian dan kerja samanya kami sampaikan terima kasih. </br>';


		if(!$mail->Send()) {
	        //echo "Mailer Error: " . $mail->ErrorInfo;
	        //echo $debug;
	     } else {
	        //echo "Message has been sent";
	        //echo $debug;
	    }
		 
	}
}
