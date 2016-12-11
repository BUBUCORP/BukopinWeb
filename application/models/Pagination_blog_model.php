<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

  class Pagination_blog_model extends CI_Model
  {
    public function __construct() {
        parent::__construct();
    }
    public function record_count() {
        return $this->db->count_all("post");
    }
    public function fetch_blog($limit, $start) {
        $this->db->limit($limit, $start);
        $query = $this->db->get("post");
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }
        return false;
   }
}
