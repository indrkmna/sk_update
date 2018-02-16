<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profile extends CI_Controller {
	
	public function __construct()
	{
		parent::__construct();
		$this->load->model('users_model','mUsers');
		$this->load->model('upload_model','mUpload');
	}

	// Main Page
	public function view($username) {
		
		$site 	= $this->mConfig->list_config();
		$logged = $this->session->userdata('user_id');
		$user   = $this->users_model->detail($logged);		
		$kode   = $this->mUpload->listUploadUser($logged);			
		$review 	= $this->mUpload->listRate($logged);

		$data = array(	'title'		=> $user['username'].' - '.$site['nameweb'],
						'site'		=> $site, 
						'user'		=> $user, 
						'kode'		=> $kode, 
						'review'	=> $review, 
						'isi'		=> 'profile/detail');
		$this->load->view('layout/wrapper',$data);
	}

	// Profile Setting
	public function setting() {

		$site 	= $this->mConfig->list_config();
		$logged = $this->session->userdata('user_id');
		$user   = $this->users_model->detail($logged);	 
		
		$v = $this->form_validation;
		
		$v->set_rules('username','Username','required',
		array(	'Username'	=> 'Username harus diisi'));

		$v->set_rules('email','Email','required',
		array(	'Email'	=> 'Email harus diisi'));

		$v->set_rules('first_name','Nama depan','required',
		array(	'Nama depan'	=> 'Nama depan harus diisi'));

		$v->set_rules('last_name','Nama belakang','required',
		array(	'Nama belakang'	=> 'Nama belakang harus diisi'));

		$v->set_rules('gender','Jenis kelamin','required',
		array(	'Jenis kelamin'	=> 'Jenis kelamin harus diisi'));
		
		$v->set_rules('phone','Nomer telepon','required',
		array(	'Nomer telepon'	=> 'Nomer telepon harus diisi'));						
		
		if($v->run()) {
			
			$config['upload_path'] 		= './assets/upload/image/';
			$config['allowed_types'] 	= 'gif|jpg|png';
			$config['max_size']			= '1000'; // KB			
			$this->load->library('upload', $config);
			if(! $this->upload->do_upload('photo')) {
				
		$data = array(	'title'	=> 'Pengaturan Akun',
						'site'	=> $site,
						'user'	=> $user,
						'error'	=> $this->upload->display_errors(),
						'isi'	=> 'profile/setting');
		$this->load->view('layout/wrapper_dashboard',$data);
		}else{
				$upload_data				= array('uploads' =>$this->upload->data());
				// Image Editor
				$config['image_library']	= 'gd2';
				$config['source_image'] 	= './assets/upload/image/'.$upload_data['uploads']['file_name']; 
				$config['new_image'] 		= './assets/upload/image/thumbs/';
				$config['create_thumb'] 	= TRUE;
				$config['maintain_ratio'] 	= TRUE;
				$config['width'] 			= 166; // Pixel
				$config['height'] 			= 120; // Pixel
				$config['thumb_marker'] 	= '';
				$this->load->library('image_lib', $config);
				$this->image_lib->resize();

				unlink('./assets/upload/image/'.$user['photo']);
				unlink('./assets/upload/image/thumbs/'.$user['photo']);

				$i = $this->input;
				$data = array(	'user_id'		=> $user['user_id'],
								'username'		=> $i->post('username'),
								'email'			=> $i->post('email'),
								'first_name'	=> $i->post('first_name'),
								'last_name'		=> $i->post('last_name'),
								'gender'		=> $i->post('gender'),
								'phone'			=> $i->post('phone'),
								'company'		=> $i->post('company'),
								'address'		=> $i->post('address'),
								'facebook_url'	=> $i->post('facebook_url'),
								'gplus_url'		=> $i->post('gplus_url'),
								'instagram_url'	=> $i->post('instagram_url'),
								'twitter_url'	=> $i->post('twitter_url'),
								'photo'			=> $upload_data['uploads']['file_name']
							);
				$this->mUsers->edit($data);
				$this->session->set_flashdata('sukses','Pengaturan berhasil dirubah');
				redirect(base_url('profile/setting/'.$user['username']));
		}}
		// Default page
		$data = array(	'title'	=> 'Pengaturan Akun',
						'site'	=> $site,
						'user'	=> $user,
						'isi'	=> 'profile/setting');
		$this->load->view('layout/wrapper_dashboard',$data);
	}	
}