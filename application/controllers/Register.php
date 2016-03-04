<?php
defined('BASEPATH') OR exit('No direct script access allowed');
//----------------------------------------------------
class Register extends CI_Controller{
	//------------------------------------------------
	public $pageName = 'Register';
	//------------------------------------------------
	function __construct(){
		parent::__construct();
	}
	//------------------------------------------------
 	public function index(){
		$data['username' ] = '';
		$data['firstname'] = '';
		$data['lastname' ] = '';
		$data['email'    ] = '';
		$this->load->helper(array('form'));
		$this->load->view('register', $data);
   	}
	//------------------------------------------------
}
//----------------------------------------------------
