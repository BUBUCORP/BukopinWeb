<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Setting extends CI_Controller
{

  public function __construct()
	{
    parent::__construct();
		$this->load->database();
		$this->load->library(array('ion_auth','form_validation'));
		$this->load->helper(array('url','language'));
		$this->form_validation->set_error_delimiters($this->config->item('error_start_delimiter','ion_auth'), $this->config->item('error_end_delimiter', 'ion_auth'));
		$this->lang->load('auth');
	}

	function save()
  {
    if (!$this->ion_auth->logged_in() || (!$this->ion_auth->is_admin()))
    {
      redirect('admincms', 'refresh');
    }
    else
    {
  		if($_POST)
        {
    			$title = $_POST['title'];
          $phone = $_POST['phone'];
          $info = $_POST['info'];
    			$email = $_POST['email'];
          $owner = $_POST['owner'];
          $analytics = $_POST['analytics'];
          $fbscript = $_POST['fbscript'];
          $twscript = $_POST['twscript'];
          $description = $_POST['description'];
          $keyword = $_POST['keyword'];

    			$data = array(
    				'title' => $title,
            'owner' => $owner,
    				'email' => $email,
            'phone' => $phone,
            'info' => $info,
            'fbscript' => $fbscript,
            'twscript' => $twscript,
            'analytics' => $analytics,
            'description' => $description,
            'keyword' => $keyword
    			);
    			$result = $this->blog_model->update_data('setting',$data,array('id' => '1'));
    			if($result == 1){
            $this->session->set_flashdata('msg','<div class="alert alert-success text-center alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>Success!</div>');
    				header('location:'.base_url().'index.php/admincms/setting');
    			}else{
            $this->session->set_flashdata('msg','<div class="alert alert-warning text-center alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>Gagal!</div>');
    				header('location:'.base_url().'index.php/admincms/setting');
    			}
    		}else{
    			header('location:'.base_url('admincms/setting'));
    		}
    }
	}



}
