<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Blog_model extends CI_Model {
	/*GET*/
	function get_page($where = ''){
		return $this->db->query("select * from page_static $where;");
	}
	function get_post($where = ''){
		return $this->db->query("select * from post $where;");
	}
	function get_career($where = ''){
		return $this->db->query("select * from career $where;");
	}
	function get_gallery($where = ''){
		return $this->db->query("select * from gallery $where;");
	}
	function get_product($where = ''){
		return $this->db->query("select * from product $where;");
	}
 	function get_product_category ($where = ''){
		return $this->db->query("select * from product_category $where;");
	}
 	function get_hubunganinvestor_category ($where = ''){
		return $this->db->query("select * from hubinvestor_category $where;");
	}	
 	function get_post_category ($where = ''){
		return $this->db->query("select * from post_category $where;");
	}
	function get_user($where = ''){
		return $this->db->query("select * from users $where;");
	}
	function get_setting(){
		return $this->db->query("select * from setting;");
	}
	function get_data_menu(){
		return $this->db->query("select * from menus;");
	}	
	function get_visitor($where = ""){
		return $this->db->query("select * from visitor $where");
	}
	function get_kalender($where = ""){
		return $this->db->query("select * from calender_event $where");
	}

	function get_contact ($where = ''){
		return $this->db->query("select * from contact $where;");
	}
	function get_registrasi_online ($where = ''){
		return $this->db->query("select * from registrasi_online $where;");
	}	
	function get_subscribe ($where = ''){
		return $this->db->query("select * from subscribe $where;");
	}
	function get_menu ($where = ''){
		return $this->db->query("select * from menus $where;");
	}
	function get_jaringan($where = ''){
		return $this->db->query("select * from jaringan $where;");
	}	
	function get_provinsi($where = ''){
		return $this->db->query("select * from provinsi $where;");
	}	
	function get_kabupaten($where = ''){
		return $this->db->query("select * from kabupaten $where;");
	}	
	function get_creditcard($where = ''){
		return $this->db->query("select * from creditcard $where order by ordering ASC;");
	}
	function get_hubinvestor($where = ''){
		return $this->db->query("select * from hub_investor $where;");
	}
	function get_slider($where = ''){
		return $this->db->query("select * from slider $where;");
	}	

	/*INSERT*/
	function insert_page($data)
	{	
		return $this->db->insert('page_static', $data);
	}
	function insert_post($data)
	{
		return $this->db->insert('post', $data);
	}
	function insert_gallery($data)
	{
		return $this->db->insert('gallery', $data);
	}
	function insert_career($data)
	{
		return $this->db->insert('career', $data);
	}
	function insert_product($data)
	{
		return $this->db->insert('product', $data);
	}
	function insert_hubinvestor($data)
	{
		return $this->db->insert('hub_investor', $data);
	}	
	function insert_jaringan($data)
	{
		return $this->db->insert('jaringan', $data);
	}	
	function update_post($table,$data,$where){
		return $this->db->update($table,$data,$where);
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

	function select_data($table,$where, $limit="", $offset=""){	
		$query = $this->db->get_where($table, $where, $limit, $offset);			
		return (OBJECT) $query->row();		
	}
	function search($keyword){
		$this->db->like('title',$keyword);
		$query = $this->db->get('post');
		return $query->result();
	}
	function get_parent_menu(){
		$sql="SELECT * from menus WHERE parent_menu=0";
		$query = $this->db->query($sql);
		return $query->result();
	}
	function get_menu_level($lvl=0){
		if($lvl==0){
			$sql="SELECT * from menus WHERE parent_menu=0 AND `status` =1 ORDER BY `order` ASC";
		}elseif ($lvl==1) {
			$sql="SELECT * from menus WHERE parent_menu in (SELECT id_menu from menus WHERE parent_menu=0) AND `status` =1 ORDER BY `order` ASC";
		}elseif ($lvl==2) {
			$sql="SELECT * from menus where parent_menu in (SELECT id_menu from menus WHERE parent_menu in (SELECT id_menu from menus WHERE parent_menu=0)) AND `status` =1 ORDER BY `order` ASC";
		}elseif ($lvl==3) {
			$sql="SELECT * from menus where parent_menu in (SELECT id_menu from menus where parent_menu in (SELECT id_menu from menus WHERE parent_menu in (SELECT id_menu from menus WHERE parent_menu=0))) AND `status` =1 ORDER BY `order` ASC";
		}else{
			$sql="SELECT * from menus WHERE parent_menu=0 AND `status` =1 ORDER BY `order` ASC";
		}
		$query = $this->db->query($sql);
		return $query->result_array();
	}
	function get_menu_by_id($id='1',$lvl=0){
		if($lvl==0){
			$sql="SELECT * from menus WHERE id_menu='$id' AND `status` =1 ORDER BY `order` ASC";
		}elseif ($lvl==1) {
			$sql="SELECT * from menus WHERE parent_menu='$id' AND `status` =1 ORDER BY `order` ASC";
		}elseif ($lvl==2) {
			$sql="SELECT * from menus where parent_menu in (SELECT id_menu from menus WHERE parent_menu='$id') AND `status` =1 ORDER BY `order` ASC";
		}elseif ($lvl==3) {
			$sql="SELECT * from menus where parent_menu in (SELECT id_menu from menus where parent_menu in (SELECT id_menu from menus WHERE parent_menu='$id')) AND `status` =1 ORDER BY `order` ASC";
		}else{
			$sql="SELECT * from menus WHERE id_menu='$id' AND `status` =1 ORDER BY `order` ASC";
		}
		$query = $this->db->query($sql);
		return $query->result_array();		
	}
	function select_max($table,$idx){
		$this->db->select_max($idx);
		$query = $this->db->get($table);		
		$row = $query->row();
		return $row->id_contact;
	}
	function select_max_data($table,$idx){
		$this->db->select_max($idx);
		$query = $this->db->get($table);		
		$row = $query->row();
		return $row->id_data;
	}
	function get_count($table, $where){
		$sql = "select COUNT(0) as idx from $table $where";		
		$query = $this->db->query($sql);
		return $query->result_array();			
	}
	function select_distinct($table, $field,$where){
		$sql = "SELECT DISTINCT($field) as label from $table where $field<>'' and $field > 0 $where";		
		$query = $this->db->query($sql);
		return $query->result_array();	
	}

	function insert_return_id($table,$data){
		$data =$this->db->insert($table, $data);
		return $this->db->insert_id();
	}
}
?>
