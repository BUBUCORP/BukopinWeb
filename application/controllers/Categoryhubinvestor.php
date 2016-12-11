<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Categoryhubinvestor extends CI_Controller
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
		if (!$this->ion_auth->logged_in() || !$this->ion_auth->is_admin())
		{
		  redirect('admincms', 'refresh');
		}
		else
		{
			if($_POST)
			{
				$status = $_POST['status'];
				$id = $_POST['id'];
				$name = $_POST['name'];
				if ($status == ""){
					$data = array(
						'name' => $name
					);
					$result = $this->blog_model->insert_data('hubinvestor_category',$data);
					if($result == 1)
					{
						$this->data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');
						header('location:'.base_url().'admincms/categoryhubunganinvestor');
					}
					else
					{
						$this->data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');
						header('location:'.base_url().'admincms/categoryhubunganinvestor');
					}
				}else{
					$data = array
						(
						'id' => $id,
						'name' => $name
						);
					$result = $this->blog_model->update_data('hubinvestor_category',$data,array('id' => $id));
					if($result == 1){
						$this->session->flashdata('msg','<div class="alert alert-success text-center alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>Success!</div>');
						header('location:'.base_url().'admincms/categoryhubunganinvestor');
					}else{
						$this->session->flashdata('msg','<div class="alert alert-warning text-center alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>Gagal!</div>');
						header('location:'.base_url().'admincms/categoryhubunganinvestor');
					}
				}
			}
			else
			{
				redirect('admincms/categoryhubunganinvestor', 'refresh');
			}
		}
	}
		
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
			$result = $this->blog_model->delete_data('hubinvestor_category',array('id' => $code));
			if($result == 1)
			{
				$this->session->set_flashdata('msg','<div class="alert alert-success text-center alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>Success!</div>');
				header('location:'.base_url().'admincms/categoryhubunganinvestor');
			}
			else
			{
				$this->session->set_flashdata('msg','<div class="alert alert-warning text-center alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>Gagal!</div>');
				header('location:'.base_url().'admincms/categoryhubunganinvestor');
			}
		}
	}
}