<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Member_model extends CI_Model
{
	function __construct()
    {
        parent::__construct();
    }

 	// insert
 	function insert_band($data)
	{
		return $this->db->insert('band', $data);
	}
	function insert_event($data)
	{
		return $this->db->insert('band_event', $data);
	}
	function update_data($table,$data,$where){
		return $this->db->update($table,$data,$where);
	}
	function delete_data($table,$where){
		return $this->db->delete($table,$where);
	}
	function get_band_category($where = ""){
		return $this->db->query("select * from band_category $where");
	}
	function get_city($where = ""){
		return $this->db->query("select * from city $where");
	}
	function get_province($where = ""){
		return $this->db->query("select * from province $where");
	}
	function get_country($where = ""){
		return $this->db->query("select * from country $where");
	}
	function get_band($where = ""){
 			return $this->db->query("select * from band $where");
 	}
 	function get_event_by_id($where = ""){
			return $this->db->query("select * from band_event $where");
	}
	function get_band_by_id($where = ''){
		return $this->db->query("select * from band $where;");
	}
	function get_contact_band($where = ''){
		return $this->db->query("select * from contact_band $where;");
	}
	function get_event_band($where = ''){
		return $this->db->query("select * from band_event $where;");
	}
	function lihat($sampai,$dari){
	return $query = $this->db->get('band',$sampai,$dari)->result();
	}
	function jumlah(){
		return $this->db->get('band')->num_rows();
	}

}?>
