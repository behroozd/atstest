<?php
defined('BASEPATH') OR exit('No direct script access allowed');
//----------------------------------------------------
class Verify extends CI_Controller{
	//------------------------------------------------
//	public $pageName = 'Login';
	//------------------------------------------------
	function __construct(){
		parent::__construct();
		$this->load->model('user','',TRUE);
	}
	//------------------------------------------------
 	public function index(){
	}
	//------------------------------------------------
	function login(){
		$username = $this->input->post('username');
		$password = $this->input->post('password');

		$username = trim( $username );
		$password = trim( $password );

		$username = $this->security->xss_clean( $username );
		$password = $this->security->xss_clean( $password );
		
		if( $username=='' || !preg_match("/^[a-zA-Z0-9_]*$/",$username) ){
			print_r( json_encode( array( 'result'=>0, 'msg'=>'Please enter a valid username' ) ) );
			return;
		}

		if( $password=='' ){
			print_r( json_encode( array( 'result'=>0, 'msg'=>'Password required' ) ) );
			return;
		}
		
		$result = $this->user->login($username, $password);
		if($result){
			$sess_array = array();
			foreach($result as $row){
				$sess_array = array(
					'id'        => $row->id       ,
					'username'  => $row->username ,
					'firstname' => $row->firstname,
					'lastname'  => $row->lastname ,
					'email'     => $row->email
				);
				$this->session->set_userdata('logged_in', $sess_array);
			}
			print_r( json_encode( array( 'result'=>1 ) ) );
			return;
		}else{
			print_r( json_encode( array( 'result'=>0, 'msg'=>'Invalid username or password' ) ) );
			return;
		}
	}
	//------------------------------------------------
	function register(){
		$username  = $this->input->post('username' );
		$firstname = $this->input->post('firstname');
		$lastname  = $this->input->post('lastname' );
		$email     = $this->input->post('email'    );
		$password  = $this->input->post('password' );
		$vpassword = $this->input->post('vpassword');

		$username  = trim( $username  );
		$firstname = trim( $firstname );
		$lastname  = trim( $lastname  );
		$email     = trim( $email     );
		$password  = trim( $password  );
		$vpassword = trim( $vpassword );

		$username  = $this->security->xss_clean( $username  );
		$firstname = $this->security->xss_clean( $firstname );
		$lastname  = $this->security->xss_clean( $lastname  );
		$email     = $this->security->xss_clean( $email     );
		$password  = $this->security->xss_clean( $password  );
		$vpassword = $this->security->xss_clean( $vpassword );
		
		if( $password!=$vpassword ){
			print_r( json_encode( array( 'result'=>0, 'msg'=>'Please enter password again.' ) ) );
			return;
		}

		if( $username=='' || !preg_match("/^[a-zA-Z0-9_]*$/",$username) ){
			print_r( json_encode( array( 'result'=>0, 'msg'=>'Please enter a valid username' ) ) );
			return;
		}

		if( $firstname=='' || !preg_match("/^[a-zA-Z]*$/",$firstname) ){
			print_r( json_encode( array( 'result'=>0, 'msg'=>'Please enter a valid first name' ) ) );
			return;
		}

		if( $lastname=='' || !preg_match("/^[a-zA-Z ]*$/",$lastname) ){
			print_r( json_encode( array( 'result'=>0, 'msg'=>'Please enter a valid last name' ) ) );
			return;
		}

		if( $email=='' || !filter_var($email, FILTER_VALIDATE_EMAIL) || !preg_match("/^[a-zA-Z0-9@._-]*$/",$email) ){
			print_r( json_encode( array( 'result'=>0, 'msg'=>'Please enter a valid email address.' ) ) );
			return;
		}

		if( $password=='' ){
			print_r( json_encode( array( 'result'=>0, 'msg'=>'Password required' ) ) );
			return;
		}
		
		if( $this->user->emailIsDuplicate( $this->security->xss_clean( $email ) )!=0 ){
			print_r( json_encode( array( 'result'=>0, 'msg'=>'Email in use.' ) ) );
			return;
		}

		if( $this->user->userIsDuplicate($this->security->xss_clean( $username ) )!=0 ){
			print_r( json_encode( array( 'result'=>0, 'msg'=>'Username in use.' ) ) );
			return false;
		}

		$userData = array(
			'username'  => $username ,
			'firstname' => $firstname,
			'lastname'  => $lastname ,
			'email'     => $email    ,
			'password'  => md5($password)
		);
		
		if( $this->user->setUserData( $userData ) ){
			print_r( json_encode( array( 'result'=>1 ) ) );
			return;
		}else{
			print_r( json_encode( array( 'result'=>0, 'msg'=>'Error on user' ) ) );
			return;
		}
	}
	//------------------------------------------------
}
//----------------------------------------------------
