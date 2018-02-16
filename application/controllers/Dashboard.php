<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {
	
	public function __construct()
	{
		parent::__construct();
		//$this->load->model('package_model','mPackage');
	}

	// Main Page
	public function index() {
		
		$site 	= $this->mConfig->list_config();
		$logged = $this->session->userdata('user_id');
		$user   = $this->users_model->detail($logged);		

		$data = array(	'title'		=> 'Dashboard - '.$site['nameweb'],
						'site'		=> $site, 
						'user'		=> $user, 
						'isi'		=> 'dashboard/content');
		$this->load->view('layout/wrapper_dashboard',$data);
	}
}