<?php
defined('BASEPATH') OR exit('No direct script access allowed');
//----------------------------------------------------
class Login extends CI_Controller{
	//------------------------------------------------
	public $pageName = 'Login';
	//------------------------------------------------
	function __construct(){
		parent::__construct();
	}
	//------------------------------------------------
 	public function index(){
		$this->load->helper(array('form'));
		$this->load->view('login');
   	}
	//------------------------------------------------
}
//----------------------------------------------------
