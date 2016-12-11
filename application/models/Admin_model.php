<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin_model extends CI_Model
{
  function get_users($username, $pwd)
	{
		$this->db->where('username', $username);
		$this->db->where('password', md5($pwd));
		$query = $this->db->get('users');
		return $query->result();
	}
  function get_users_by_id($id_user)
	{
		$this->db->where('id_user', $id_user);
		$query = $this->db->get('users');
		return $query->result();
	}
  function insert_data($table,$data){
		return $this->db->insert($table,$data);
	}
	function update_data($table,$data,$where){
		return $this->db->update($table,$data,$where);
	}
	function delete_data($table,$where){
		return $this->db->delete($table,$where);
	}
}
?>
