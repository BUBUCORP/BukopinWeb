<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Excel extends CI_Controller {

  public function __construct()
  {
    parent::__construct();
  	$this->load->database();
  	$this->load->library(array('ion_auth','form_validation'));
  	$this->load->helper(array('url','language'));
  	$this->form_validation->set_error_delimiters($this->config->item('error_start_delimiter','ion_auth'), $this->config->item('error_end_delimiter', 'ion_auth'));
  	$this->lang->load('auth');
  }


  function subscribe()
  {
    if (!$this->ion_auth->logged_in()) {
      redirect('admincms/login', 'refresh');
    }
    elseif (!$this->ion_auth->is_admin())
    {
      return show_error('You must be an administrator to view this page.');
    }
    else
    {
      $data = array(
         'list' => $this->blog_model->get_subscribe("order by id_subscribe desc")->result_array()
      );
      $this->load->view('admincms/excel/excelsubscribe',$data);
    }
  }

  function contact()
  {
    if (!$this->ion_auth->logged_in()) {
      redirect('admincms/login', 'refresh');
    }
    elseif (!$this->ion_auth->is_admin())
    {
      return show_error('You must be an administrator to view this page.');
    }
    else
    {
      $data = array(
         'list' => $this->blog_model->get_contact("order by id_contact desc")->result_array()
      );
      $this->load->view('admincms/excel/excelcontact',$data);
    }
  }


}
