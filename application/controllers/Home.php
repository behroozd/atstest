<?php
defined('BASEPATH') OR exit('No direct script access allowed');
//----------------------------------------------------
class Home extends CI_Controller{
	//------------------------------------------------
	public $pageName  = 'Home';
	//------------------------------------------------
	function __construct(){
		parent::__construct();
	}
	//------------------------------------------------
 	public function index(){
		if($this->session->userdata('logged_in')){
			$session_data = $this->session->userdata('logged_in');
			$data['username' ] = $session_data['username' ];
			$data['firstname'] = $session_data['firstname'];
			$data['lastname' ] = $session_data['lastname' ];
			$data['email'    ] = $session_data['email'    ];
			$this->load->view('home', $data);
		}else{
			redirect('login', 'refresh');
		}
   	}
	//------------------------------------------------
	function logout(){
		$this->session->unset_userdata('logged_in');
		session_destroy();
		redirect('home', 'refresh');
	}
	//------------------------------------------------
}
//----------------------------------------------------
