<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Contact_model extends CI_Model
{
	function __construct()
    {
        parent::__construct();
    }
	function insert_contact($data)
	{
	return $this->db->insert('contact', $data);
	}
	function insert_contact_band($data)
	{
	return $this->db->insert('contact_band', $data);
	}
}?>
