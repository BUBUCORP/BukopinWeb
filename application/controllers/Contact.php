<?php
class Contact extends CI_Controller
{

  public function __construct()
	{
    parent::__construct();
		$this->load->database();
		$this->load->library(array('ion_auth','form_validation'));
		$this->load->helper(array('url','language'));
		$this->form_validation->set_error_delimiters($this->config->item('error_start_delimiter', 'ion_auth'), $this->config->item('error_end_delimiter', 'ion_auth'));
		$this->lang->load('auth');
	}

  /*===== Delete contact =====*/

  function delete($code = 1)
  {
    if (!$this->ion_auth->logged_in())
    {
      redirect('admincms/login', 'refresh');
    }
    elseif (!$this->ion_auth->is_admin())
    {
      return show_error('You must be an administrator to view this page.');
    }
    else
    {
  		$result = $this->blog_model->delete_data('contact',array('id_contact' => $code));
  		if($result == 1){
        $this->session->set_flashdata('msg','<div class="alert alert-success text-center alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>Success!</div>');
  			header('location:'.base_url().'admincms/contact');
  		}else{
        $this->session->set_flashdata('msg','<div class="alert alert-warning text-center alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>Gagal!</div>');
  			header('location:'.base_url().'admincms/contact');
  		}
    }
	}

}
?>
