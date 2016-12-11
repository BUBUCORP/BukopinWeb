<?php
class Hubunganinvestor extends CI_Controller
{

  public function __construct()
  {
    parent::__construct();
    $this->load->helper(array('form','language'));
    $this->load->library(array('ion_auth','form_validation','upload'));
    $this->load->database();
		$this->form_validation->set_error_delimiters($this->config->item('error_start_delimiter', 'ion_auth'), $this->config->item('error_end_delimiter', 'ion_auth'));
		$this->lang->load('auth');
  }

  function simpan()
  {
    if (!$this->ion_auth->logged_in() || (!$this->ion_auth->is_admin()))
    {
      redirect('admincms', 'refresh');
    }
    else
    {
      $this->form_validation->set_rules('title','title','required');  
      $this->form_validation->set_rules('image', 'image');
      $this->form_validation->set_rules('file', 'file'); 	  
      $this->form_validation->set_rules('status', 'status');
      if ($this->form_validation->run() == FALSE)
      {
         header('location:'.base_url('admincms/product'));
      }
      else
      {
          $status = $this->input->post('status'); 
          $id_post = $this->input->post('id'); 
          if ($status=="")
          {
            $data = array( 
                'title' => $this->input->post('title'),
                'image' => $this->input->post('image'), 
                'file' => $this->input->post('file'), 
                'status' => $this->input->post('status')
            );
            if ($this->blog_model->insert_product($data))
            {
                $this->session->set_flashdata('msg','<div class="alert alert-success text-center alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>Success!</div>');
                header('location:'.base_url()."admincms/productlist");
            }
            else
            {
                $this->session->set_flashdata('msg','<div class="alert alert-danger text-center alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>Oops! Error.  Please try again later!!!</div>');
                header('location:'.base_url()."admincms/productlist");
            }
          }
          else
          {
            $data = array(
                'title' => $this->input->post('title'),
                'image' => $this->input->post('image'), 
                'file' => $this->input->post('file'), 
                'status' => $this->input->post('status')
            );
            if ($this->blog_model->update_post('hub_investor',$data,array('id' => $id_post)))
            {
                $this->session->set_flashdata('msg','<div class="alert alert-success text-center alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>Success!</div>');
                header('location:'.base_url()."admincms/productlist");
            }
            else
            {
                $this->session->set_flashdata('msg','<div class="alert alert-danger text-center alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>Oops! Error.  Please try again later!!!</div>');
                header('location:'.base_url()."admincms/productlist");
            }
          }
      }
    }
  }
 


  /*=====  delete =====*/

  function delete ($code = 1)
  {
    if (!$this->ion_auth->logged_in())
    {
      redirect('admincms/login','refresh');
    }
    elseif (!$this->ion_auth->is_admin())
    {
      return show_error('You must be an administrator to view this page.');
    }
    else
    {
  		$result = $this->blog_model->delete_data('hub_investor',array('id' => $code));
  		if($result == 1){
        $this->session->set_flashdata('msg','<div class="alert alert-success text-center alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>Success!</div>');
  			header('location:'.base_url().'admincms/productlist');
  		}else{
        $this->session->set_flashdata('msg','<div class="alert alert-warning text-center alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>Gagal!</div>');
  			header('location:'.base_url().'admincms/productlist');
  		}
    }
	}




}
?>
