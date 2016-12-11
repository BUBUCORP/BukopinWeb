<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Api extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		
		$this->load->model('blog_model');
	}

	// ------------------------------------------------------------------------

	/**
	 * Index page
	 */
	public function index()
	{
		echo "This is Api";exit();
		$this->output->set_status_header(401);
	}

	// ------------------------------------------------------------------------

	function getsetting(){
		$data = $this->blog_model->get_setting()->result_array();
		echo json_encode($data[0]);
	}

	function getpage($page_id){		
		$data = $this->blog_model->get_page("where id_page ='$page_id'")->result_array();
		if(!$data){
			echo json_encode(array('status'=>'404'));			
		}else{
			echo json_encode($data[0]);			
		}		

	}

	function getmenu(){
		$data = $this->blog_model->get_menu("where status ='1'")->result_array();		
		echo json_encode($data);
	}

}
