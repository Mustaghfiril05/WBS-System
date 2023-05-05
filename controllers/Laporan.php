<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Laporan extends CI_Controller {

	
	public function __construct()
	{
	   parent::__construct();
	   $this->load->library('form_validation');
	   $this->load->model('laporan_model');
	   $this->load->model('masalah_model');
	   $this->load->model('identitas_model');
	}

	public function index()
	{		
		redirect('laporan/create','refresh');   		 
	}
 
	public function create()
	{
		$data['optionmasalah'] = $this->masalah_model->get_all_masalah();

	   	$this->load->view('public/themes/header');
	   	$this->load->view('public/create_laporan_pvt',$data);
	    //$this->load->view('public/create_laporan',$data);
	   	$this->load->view('public/themes/footer');	    	 
	}

	public function insert()
	{ 
		$data = array();
		
		$this->form_validation->set_rules('masalah', 'Masalah', 'required',
                        array('required' => '%s wajib diisi.'));

		$get_id_laporan = $this->laporan_model->get_last_id_laporan($this->db->escape($this->input->post('masalah')));
		$seq 			= substr(time(),-3);
		// $seq 			= substr(time(),0,3);
		$id_laporan 	= $this->input->post('masalah').str_pad($seq, 4,0,STR_PAD_LEFT ).date('Y');
		$laporan_token	= substr(md5(rand()),0,6);
		$email_pelapor	= $this->input->post('email_pelapor');

		if($this->form_validation->run() == TRUE){

			$config['upload_path'] 		= './uploads/';
			$config['allowed_types'] 	= 'gif|jpg|png|pdf|jpeg';
			$config['max_size']  		= '2048';
			$config['file_name']  		= $id_laporan;
			$config['file_ext_tolower'] = TRUE;

			
			$this->load->library('upload', $config);

			// $this->upload->do_upload('attachment');						
			
			$uploaded_path='';
			if ( ! $this->upload->do_upload('attachment'))
            {
                $error = array('error' => $this->upload->display_errors());
            }else{
            	$uploaded_path = '/uploads/'.$this->upload->data('file_name');  
            }
                

			if($this->input->post('data_show') == 'Y' ){
				$data_pelapor = array(
					'id_laporan'   			=>  $this->db->escape($id_laporan),
					'nama_pelapor' 			=>	$this->db->escape($this->input->post('nama_pelapor')),
					// 'nomor_telepon'			=>  $this->db->escape($this->input->post('nomor_telepon')),
					'alamat_pelapor'		=>  $this->db->escape($this->input->post('alamat_pelapor')),
					'jabatan_pelapor'		=>  $this->db->escape($this->input->post('sub_directorate')),
					'email_pelapor' 			=>	$this->db->escape($email_pelapor),
					// 'created_date'			=>	$this->db->escape(date('Y-m-d H:i:s'))
				);

				$this->identitas_model->insert_identitas($data_pelapor);					
	
				$data_laporan = array(
					'id_laporan'   			=>  $this->db->escape($id_laporan),
					'lapor_sebelum' 		=>	$this->db->escape($this->input->post('lapor_sebelum')),
					'lapor_sebelum_ke' 		=>	$this->db->escape($this->input->post('lapor_sebelum_ke')),
					//'pengulangan' 			=>	$this->db->escape($this->input->post('pengulangan')),
					// 'email_pelapor' 		=>	$this->db->escape($email_pelapor),
					'id_masalah'		=>	$this->db->escape($this->input->post('masalah')),
					'jumlah_kerugian' 		=>	$this->db->escape($this->input->post('jumlah_kerugian')),
					'pihak_terlapor' 		=>	$this->db->escape($this->input->post('pihak_terlapor')),
					'lokasi_kejadian' 		=>	$this->db->escape($this->input->post('lokasi_kejadian')),
					'tanggal_kejadian' 	=>	$this->db->escape( date('Y-m-d', strtotime($this->input->post('waktu_awal_kejadian')))),
					'estimasi' 	=>	$this->db->escape($this->input->post('waktu_akhir_kejadian')),
					'kronologis' 			=>	$this->db->escape($this->input->post('kronologis')),
					'keterangan' 			=>	$this->db->escape($this->input->post('keterangan_tambahan')),
					'file_url'	 			=>	$this->db->escape( $uploaded_path ),
					'password_id_laporan'			=>	$this->db->escape($laporan_token),
					// 'created_by' 			=>	$this->db->escape($email_pelapor),
					// 'created_date'			=>	$this->db->escape(date('Y-m-d H:i:s'))
	
				);
	
				$this->laporan_model->insert_laporan($data_laporan); 

				$data_progress_laporan = array(
					'id_laporan'	=>  $this->db->escape($id_laporan),
					'id_progress'	=>  $this->db->escape('PRO1'),
					'di_buat_oleh'	=>  $this->db->escape($email_pelapor),
					'tanggal_pembuatan'	=>	$this->db->escape(date('Y-m-d H:i:s')),
					'is_approved'	=>	1,
					'approved_at'	=>		$this->db->escape(date('Y-m-d H:i:s')),
					// 'laporan_token'	=>	$this->db->escape($laporan_token)
				);

				$this->laporan_model->insert_progress_laporan($data_progress_laporan);

				// $update_data = array(
				// 	'id_masalah_lapor'		=> $seq
				// );

				// $this->masalah_model->update_id_masalah($this->db->escape($this->input->post('masalah')),$update_data);
				$this->send_mail($email_pelapor,$id_laporan,$laporan_token);
				$this->notify_mail($id_laporan);

				$success['id_laporan'] 		= $id_laporan;
				$success['laporan_token'] 	= $laporan_token;
				$success['email_pelapor']	= $email_pelapor;


				$this->load->view('public/themes/header');
				$this->load->view('public/success_laporan',$success);
				$this->load->view('public/themes/footer');  
			
		}
 			else {
 				$data_laporan = array(
					'id_laporan'   			=>  $this->db->escape($id_laporan),
					'lapor_sebelum' 		=>	$this->db->escape($this->input->post('lapor_sebelum')),
					'lapor_sebelum_ke' 		=>	$this->db->escape($this->input->post('lapor_sebelum_ke')),
					//'pengulangan' 			=>	$this->db->escape($this->input->post('pengulangan')),
					// 'email_pelapor' 		=>	$this->db->escape($email_pelapor),
					'id_masalah'		=>	$this->db->escape($this->input->post('masalah')),
					'jumlah_kerugian' 		=>	$this->db->escape($this->input->post('jumlah_kerugian')),
					'pihak_terlapor' 		=>	$this->db->escape($this->input->post('pihak_terlapor')),
					'lokasi_kejadian' 		=>	$this->db->escape($this->input->post('lokasi_kejadian')),
					'tanggal_kejadian' 	=>	$this->db->escape( date('Y-m-d', strtotime($this->input->post('waktu_awal_kejadian')))),
					'estimasi' 	=>	$this->db->escape($this->input->post('waktu_akhir_kejadian')),
					'kronologis' 			=>	$this->db->escape($this->input->post('kronologis')),
					'keterangan' 			=>	$this->db->escape($this->input->post('keterangan_tambahan')),
					'file_url'	 			=>	$this->db->escape( $uploaded_path ),
					'password_id_laporan'			=>	$this->db->escape($laporan_token),
					// 'created_by' 			=>	$this->db->escape($email_pelapor),
					// 'created_date'			=>	$this->db->escape(date('Y-m-d H:i:s'))
	
				);
 			// 	$data_laporan = array(
				// 	'id_laporan'   			=>  $this->db->escape($id_laporan),
				// 	'lapor_sebelum' 		=>	$this->db->escape($this->input->post('lapor_sebelum')),
				// 	'lapor_sebelum_ke' 		=>	$this->db->escape($this->input->post('lapor_sebelum_ke')),
				// 	//'pengulangan' 			=>	$this->db->escape($this->input->post('pengulangan')),
				// 	//'email_pelapor' 		=>	$this->db->escape($email_pelapor),
				// 	'masalah_pelaporan'		=>	$this->db->escape($this->input->post('masalah')),
				// 	'jumlah_kerugian' 		=>	$this->db->escape($this->input->post('jumlah_kerugian')),
				// 	'pihak_terlapor' 		=>	$this->db->escape($this->input->post('pihak_terlapor')),
				// 	'lokasi_kejadian' 		=>	$this->db->escape($this->input->post('lokasi_kejadian')),
				// 	'waktu_awal_kejadian' 	=>	$this->db->escape( date('Y-m-d', strtotime($this->input->post('waktu_awal_kejadian')))),
				// 	'estimasi_jam_a' 	=>	$this->db->escape($this->input->post('waktu_akhir_kejadian')),
				// 	'kronologis' 			=>	$this->db->escape($this->input->post('kronologis')),
				// 	'keterangan' 			=>	$this->db->escape($this->input->post('keterangan_tambahan')),
				// 	'file_url'	 			=>	$this->db->escape( $uploaded_path ),
				// 	'laporan_token'			=>	$this->db->escape($laporan_token),
				// 	'created_by' 			=>	$this->db->escape($email_pelapor),
				// 	// 'created_date'			=>	$this->db->escape(date('Y-m-d H:i:s'))
	
				// );
	
				$this->laporan_model->insert_laporan($data_laporan); 

				$data_progress_laporan = array(
					'id_laporan'	=>  $this->db->escape($id_laporan),
					'id_progress'	=>  $this->db->escape('PRO1'),
					'di_buat_oleh'	=>  $this->db->escape($email_pelapor),
					'tanggal_pembuatan'	=>	$this->db->escape(date('Y-m-d H:i:s')),
					'is_approved'	=>	1,
					'approved_at'	=>		$this->db->escape(date('Y-m-d H:i:s')),

					// 'laporan_token'	=>	$this->db->escape($laporan_token)
				);
				// $data_progress_laporan = array(
				// 	'id_laporan'	=>  $this->db->escape($id_laporan),
				// 	'id_progress'	=>  $this->db->escape('PRO1'),
				// 	'created_by'	=>  $this->db->escape($email_pelapor),
				// 	// 'created_date'	=>	$this->db->escape(date('Y-m-d H:i:s')),
				// 	'laporan_token'	=>	$this->db->escape($laporan_token)
				// );

				$this->laporan_model->insert_progress_laporan($data_progress_laporan);

				// $update_data = array(
				// 	'id_masalah_lapor'		=> $seq
				// );

				// $this->masalah_model->update_id_masalah($this->db->escape($this->input->post('masalah')),$update_data);
				//$this->send_mail($email_pelapor,$id_laporan,$laporan_token);
				$this->notify_mail($id_laporan);

				$success['id_laporan'] 		= $id_laporan;
				$success['laporan_token'] 	= $laporan_token;
				//$success['email_pelapor']	= $email_pelapor;
				

				$this->load->view('public/themes/header');
				$this->load->view('public/success_laporan_pvt',$success);
				$this->load->view('public/themes/footer');

 			}
				

				
		}


		else {		 
			redirect('laporan/create') ;
		}
	}

	public function success()
	{


		$this->load->view('public/themes/header');
		$this->load->view('public/success_laporan');
		$this->load->view('public/themes/footer'); 	 	    
	} 
 
	public function check($show=null)
	{
		$data=[];
		if($show==1) $data['msg'] = "Laporan Tidak ditemukan, Mohon periksa kembali nomor & password laporan.";
   		$this->load->view('public/themes/header');
		$this->load->view('public/check_laporan',$data);
		$this->load->view('public/themes/footer'); 
	    
	} 

	public function check_laporan()
	{
		
	   $id_laporan 		= $this->db->escape(trim($this->input->post('no_laporan')));
	   $laporan_token 	= $this->db->escape($this->input->post('password_laporan'));
	 	
	   //query the database
	   $result = $this->laporan_model->check_laporan($id_laporan, $laporan_token);
	   $data=[];
	   if(count($result->result())>0){
		   foreach ($result->result() as $key) {
		   	$id_laporan 	= $key->id_laporan;
		   } 

			$data['result'] = $result;
			$data['pro1']	= $this->laporan_model->check_progress_laporan($this->db->escape($id_laporan), $laporan_token, $this->db->escape('PRO1'));
			$data['pro2']	= $this->laporan_model->check_progress_laporan($this->db->escape($id_laporan), $laporan_token, $this->db->escape('PRO2'));
			$data['pro3']	= $this->laporan_model->check_progress_laporan($this->db->escape($id_laporan), $laporan_token, $this->db->escape('PRO3'));
			$data['pro4']	= $this->laporan_model->check_progress_laporan($this->db->escape($id_laporan), $laporan_token, $this->db->escape('PRO4'));
			$data['pro5']	= $this->laporan_model->check_progress_laporan($this->db->escape($id_laporan), $laporan_token, $this->db->escape('PRO5'));
			$data['pro6']	= $this->laporan_model->check_progress_laporan($this->db->escape($id_laporan), $laporan_token, $this->db->escape('PRO6'));
			$data['pro7']	= $this->laporan_model->check_progress_laporan($this->db->escape($id_laporan), $laporan_token, $this->db->escape('PRO7'));

			$this->load->view('public/themes/header');
			$this->load->view('public/check_laporan_result',$data);
			$this->load->view('public/themes/footer');
		}
	   else
	   	{
	   		 
	   		redirect('laporan/check/1','refresh',$data);
		}
	 
	    
	}
	public function send_gmail()
	{
		$email='rijalboy98@gmail.com';
		$id_laporan='123';
		$laporan_token='12334234';

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
		//$mail->addAddress('joe@example.net', 'Joe User');     // Add a recipient 
		$mail->addAddress($email); 
		// $mail->addBCC('chanif.samsyir@teluklamong.co.id'); 
		// $mail->addAddress('timwbs@teluklamong.co.id');
		// $mail->addReplyTo('timwbs@teluklamong.co.id','Tim WBS');

		$mail->Subject 	= 'No. Aduan Anda : '.$id_laporan.' | PT. Terminal Teluk Lamong Whistle Blowing System';
		$mail->Body 	= 'Yth. Bpk/Ibu </br>Terima kasih telah menyampaikan aduan ke sistem WBS TTL.'.'</br>
			Laporan anda telah kami terima dan akan kami analisa terlebih dahulu apakah bukti-bukti yang disampaikan sesuai untuk kami lakukan investigasi lebih lanjut.</br>
			Data yang disampaikan akan kami jaga kerahasiaannya dan hanya kami buka untuk klarifikasi ulang jika diperlukan. </br>
			Untuk selanjutnya Bpk/Ibu dapat memantau perkembangan laporan melalui link <a href="https://wbs.teluklamong.co.id/index.php/laporan/check">berikut</a> .</br>'.
			'Nomor aduan anda : '.$id_laporan.' </br>'.'Password laporan anda : '.$laporan_token.'</br></br>
			Demikian, atas perhatian dan kerja samanya kami sampaikan terima kasih. </br>';


		 

		if(!$mail->Send()) {
	        echo "Mailer Error: " . $mail->ErrorInfo;
	        //echo $debug;
	     } else {
	        echo "Message has been sent";
	        //echo $debug;
	    }
		 
	}

	public function send_mail($email,$id_laporan,$laporan_token)
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

		//$mail->addAddress('joe@example.net', 'Joe User');     // Add a recipient 
		// $mail->addBCC('chanif.samsyir@teluklamong.co.id'); 
		// $mail->addAddress('timwbs@teluklamong.co.id');
		// $mail->addReplyTo('timwbs@teluklamong.co.id','Tim WBS');

		$mail->setFrom('wbsalp@gmail.com','WBS System');
		$mail->addAddress($email); 

		//$mail->addAddress('joe@example.net', 'Joe User');     // Add a recipient 
		// $mail->addBCC('chanif.samsyir@teluklamong.co.id'); 
		// $mail->addAddress('wbsalp@gmail.com'); 
		// $mail->addAddress('wbsalp@gmail.com'); 
		// $mail->addReplyTo('wbsalp@gmail.com','Tim WBS');
		
		// $mail->addAddress('dekfiral@gmail.com'); 
		// $mail->addReplyTo('dekfiral@gmail.com','Tim WBS');

		$mail->Subject 	= 'No. Aduan Anda : '.$id_laporan.' | PT. ALP Petro Industry Whistle Blowing System';
		$mail->Body 	= 'Yth. Bpk/Ibu </br>Terima kasih telah menyampaikan aduan ke sistem WBS ALP.'.'</br>
			Laporan anda telah kami terima dan akan kami analisa terlebih dahulu apakah bukti-bukti yang disampaikan sesuai untuk kami lakukan investigasi lebih lanjut.</br>
			Data yang disampaikan akan kami jaga kerahasiaannya dan hanya kami buka untuk klarifikasi ulang jika diperlukan. </br>
			Untuk selanjutnya Bpk/Ibu dapat memantau perkembangan laporan melalui link <a href="">berikut</a> .</br>'.
			'Nomor aduan anda : '.$id_laporan.' </br>'.'Password laporan anda : '.$laporan_token.'</br></br>
			Demikian, atas perhatian dan kerja samanya kami sampaikan terima kasih. </br>';

		if(!$mail->Send()) {
	        //echo "Mailer Error: " . $mail->ErrorInfo;
	        //echo $debug;
	     } else {
	        //echo "Message has been sent";
	        //echo $debug;
	    }
		 
	}

	// public function send_mail($email,$id_laporan,$laporan_token)
	// {
	// 	$this->load->library('phpmailer_library');
	// 	$mail = $this->phpmailer_library->load();

	// 	//$debug = $mail->SMTPDebug = 3;                               // Enable verbose debug output

	// 	$mail->isSMTP();                                      // Set mailer to use SMTP
	// 	$mail->Host = 'ssl://smtp.gmail.com';  // Specify main and backup SMTP servers
	// 	$mail->SMTPAuth = true;                               // Enable SMTP authentication
	// 	//$mail->AuthType = 'LOGIN';
	// 	$mail->Username = 'hackerunyil05@gmail.com';                 // SMTP username
	// 	$mail->Password = 'uy4kuy4xx';                           // SMTP password
	// 	$mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
	// 	$mail->Port = 587;                                    // TCP port to connect to	
	// 	$mail->isHTML(true); 	
		
	// 	//custom code
	// 	$mail->SMTPOptions = array(
	// 		'ssl' => array(
	// 			'verify_peer' => false,
	// 			'verify_peer_name' => false,
	// 			'allow_self_signed' => true
	// 		)
	// 	);
	// 	//end custom code

	// 	$mail->setFrom('it@teluklamong.co.id','Tim WBS');
	// 	//$mail->addAddress('joe@example.net', 'Joe User');     // Add a recipient 
	// 	$mail->addAddress($email); 
	// 	// $mail->addBCC('chanif.samsyir@teluklamong.co.id'); 
	// 	$mail->addReplyTo('timwbs@teluklamong.co.id','Tim WBS');

	// 	$mail->Subject 	= 'PT. Terminal Teluk Lamong Whistle Blowing System';
	// 	$mail->Body 	= 'Yth. Bpk/Ibu </br>Terima kasih telah menyampaikan aduan ke sistem WBS TTL.'.'</br>
	// 		Laporan anda telah kami terima dan akan kami analisa terlebih dahulu apakah bukti-bukti yang disampaikan sesuai untuk kami lakukan investigasi lebih lanjut.</br>
	// 		Data yang disampaikan akan kami jaga kerahasiaannya dan hanya kami buka untuk klarifikasi ulang jika diperlukan. </br>
	// 		Untuk selanjutnya Bpk/Ibu dapat memantau perkembangan laporan melalui link <a href="https://wbs.teluklamong.co.id/index.php/laporan/check">berikut</a> .</br>'.
	// 		'Nomor aduan anda : '.$id_laporan.' </br>'.'Password laporan anda : '.$laporan_token.'</br></br>
	// 		Demikian, atas perhatian dan kerja samanya kami sampaikan terima kasih. </br>';

	// 	if(!$mail->Send()) {
	//         //echo "Mailer Error: " . $mail->ErrorInfo;
	//         //echo $debug;
	//      } else {
	//         //echo "Message has been sent";
	//         //echo $debug;
	//     }
		 
	// }

	public function notify_mail($id_laporan)
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
		

		$mail->Subject = 'Laporan nomor : '.$id_laporan.' | PT. ALP Petro Industry Whistle Blowing System ';
		$mail->Body    = 'Laporan nomor : '.$id_laporan.' telah dibuat. </br>'.'Harap segera ditindak lanjuti melalui aplikasi WBS ALP Petro Industry. </br></br>
			Demikian, atas perhatian dan kerja samanya kami sampaikan terima kasih. </br>' ;

		if(!$mail->Send()) {
	        //echo "Mailer Error: " . $mail->ErrorInfo;
	        //echo $debug;
	     } else {
	        //echo "Message has been sent";
	        //echo $debug;
	     }
		 
	}
	
	public function xls(){
		// $this->db->select("*");
		// $this->db->select("
  //                               IFNULL(identitas_pelapor.email_pelapor,'Anonim') pelapor,
  //                               laporan.* 
  //                       ");
		// if($this->input->get('STATUS') != '' && $this->input->get('STATUS') != null ){
  //           $this->db->where('STATUS_ID',$this->input->get('STATUS'));
  //       }

  //       if($this->input->get('LOKASI') != '' && $this->input->get('LOKASI') != null ){
  //           $this->db->where('LOKASI_ID',$this->input->get('LOKASI'));
  //       }

  //       if($this->input->get('START') != '' && $this->input->get('START') != null ){
  //           $this->db->where("(DATE_ORDER BETWEEN '".date('Y-m-d',strtotime($this->input->get('START')))."' AND '".date('Y-m-d',strtotime($this->input->get('END')))."')");
  //       }

		$this->db->select("DISTINCT
                        IFNULL( identitas_pelapor.nama_pelapor, 'Anonim' ) pelapor,
						masalah.jenis_masalah,
                        lap.* 
                ");
        $this->db->from('laporan as lap',FALSE);
        $this->db->join('identitas_pelapor', 'identitas_pelapor.id_laporan = lap.id_laporan', 'left');
        $this->db->join('masalah', 'masalah.id_masalah=lap.id_masalah','inner');
        $this->db->order_by("lap.tanggal_pembuatan", "DESC");
		$laporans=$this->db->get('laporan')->result();

		$spreadsheet = new Spreadsheet;

		$spreadsheet->setActiveSheetIndex(0)
		          ->setCellValue('A1', 'ID LAPORAN')
		          ->setCellValue('B1', 'PELAPOR')
		          ->setCellValue('C1', 'TERLAPOR')
		          ->setCellValue('D1', 'JENIS MASALAH')
		          ->setCellValue('E1', 'TANGGAL PEMBUATAN')
		          ->setCellValue('F1', 'TANGGAL KEJADIAN')
		          ->setCellValue('G1', 'LOKASI KEJADIAN')
		          ->setCellValue('H1', 'KRONOLOGIS')
		          ->setCellValue('I1', 'JUMLAH KERUGIAN');

		$kolom = 2;
		$nomor = 1;
		foreach($laporans as $laporan) {
			$spreadsheet->setActiveSheetIndex(0)
			// ->setCellValue('A' . $kolom, $nomor)
			->setCellValue('A' . $kolom, '#'.$laporan->id_laporan)
			->setCellValue('B' . $kolom, $laporan->pelapor)
			->setCellValue('C' . $kolom, $laporan->pihak_terlapor)
			->setCellValue('D' . $kolom, $laporan->jenis_masalah)
			->setCellValue('E' . $kolom, $laporan->tanggal_pembuatan)
			->setCellValue('F' . $kolom, $laporan->tanggal_pembuatan)
			->setCellValue('G' . $kolom, $laporan->lokasi_kejadian)
			->setCellValue('H' . $kolom, $laporan->kronologis)
			->setCellValue('I' . $kolom, $laporan->jumlah_kerugian);

		   $kolom++;
		   $nomor++;
		}

		$writer = new Xlsx($spreadsheet);

		header('Content-Type: application/vnd.ms-excel');
		header('Content-Disposition: attachment;filename="laporan_'.date('Y_m_d_H_i_s').'_.xlsx"');
		header('Cache-Control: max-age=0');
		$writer->save('php://output');
	}
}
