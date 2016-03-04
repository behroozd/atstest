<?php
//----------------------------------------------------
class User extends CI_Model{
	//------------------------------------------------
	function login($username, $password){
		$this->db->select('*');
		$this->db->from('users');
		$this->db->where('username', $username);
		$this->db->where('password', MD5($password));
		$this->db->limit(1);
	
		$query = $this->db->get();
	
		if($query->num_rows() == 1){
			return $query->result();
		}else{
			return false;
		}
	}
	//------------------------------------------------
	public function emailIsDuplicate($email){     
		$this->db->get_where('users', array('email' => $email), 1);
		return $this->db->affected_rows();
	}
	//------------------------------------------------
	public function userIsDuplicate($user){     
		$this->db->get_where('users', array('username' => $user), 1);
		return $this->db->affected_rows();
	}
	//------------------------------------------------
	function setUserData($userData){
		$q = $this->db->insert_string('users',$userData);             
		$this->db->query($q);
		return $this->db->insert_id();
	}
	//------------------------------------------------
}
//----------------------------------------------------
