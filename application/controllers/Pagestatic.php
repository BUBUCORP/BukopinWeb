<?php
class Pagestatic extends CI_Controller
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
      $this->form_validation->set_rules('title_en','title en','required');
      $this->form_validation->set_rules('tag', 'tag');
      $this->form_validation->set_rules('status', 'status');
      $this->form_validation->set_rules('images', 'images');
      $this->form_validation->set_rules('content', 'content');
      $this->form_validation->set_rules('content_en', 'content en');
      $this->form_validation->set_rules('meta_description', 'description');
      $this->form_validation->set_rules('meta_keyword', 'meta keyword');
      $this->form_validation->set_rules('active', 'active');
      if ($this->form_validation->run() == FALSE)
      {
         header('location:'.base_url('admincms/pagelist'));
      }
      else
      {
          $status = $this->input->post('status');
          $id_page = $this->input->post('id_page');
          $datepost = $this->input->post('datepost');
          if ($status=="")
          {
            $data = array(
                'date'=> date("Y-m-d H:i:s"),
                'datepost'=> $this->input->post('datepost'),
                'title' => $this->input->post('title'),
                'title_en' => $this->input->post('title_en'),
                'seotitle'=> strtolower(str_replace(' ', '-', $this->input->post('title'))),
                'seotitle_en'=> strtolower(str_replace(' ', '-', $this->input->post('title_en'))),
                'images' => $this->input->post('images'),
                'tag' => $this->input->post('tag'),
                'datepost' => $this->input->post('datepost'),
                'content' => $this->input->post('content'),
                'content_en' => $this->input->post('content_en'),
                'meta_description' => $this->input->post('meta_description'),
                'meta_keyword' => $this->input->post('meta_keyword'),
                'editor' => $this->input->post('editor'),
                'active' => $this->input->post('active')
            );
            if ($this->blog_model->insert_page($data))
            {
                $this->session->set_flashdata('msg','<div class="alert alert-success text-center alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>Success!</div>');
                header('location:'.base_url()."admincms/pagelist");
            }
            else
            {
                $this->session->set_flashdata('msg','<div class="alert alert-danger text-center alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>Oops! Error.  Please try again later!!!</div>');
                header('location:'.base_url()."admincms/pagelist");
            }
          }
          else
          {
            $data = array(
                'id_page'=> $this->input->post('id_page'),
                'datepost'=> $datepost,
                'title' => $this->input->post('title'),
                'title_en' => $this->input->post('title_en'),
                'seotitle'=> strtolower(str_replace(' ', '-', $this->input->post('title'))),
                'seotitle_en'=> strtolower(str_replace(' ', '-', $this->input->post('title_en'))),
                'tag' => $this->input->post('tag'),
                'datepost' => $this->input->post('datepost'),
                'content' => $this->input->post('content'),
                'content_en' => $this->input->post('content_en'),
                'meta_description' => $this->input->post('meta_description'),
                'meta_keyword' => $this->input->post('meta_keyword'),
                'editor' => $this->input->post('editor'),
                'active' => $this->input->post('active')
            );
            if ($this->blog_model->update_post('page_static',$data,array('id_page' => $id_page)))
            {
                $this->session->set_flashdata('msg','<div class="alert alert-success text-center alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>Success!</div>');
                header('location:'.base_url()."admincms/pagelist");
            }
            else
            {
                $this->session->set_flashdata('msg','<div class="alert alert-danger text-center alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>Oops! Error.  Please try again later!!!</div>');
                header('location:'.base_url()."admincms/pagelist");
            }
          }
      }
    }
  }



  function setactive()
  {
    if (!$this->ion_auth->logged_in() || (!$this->ion_auth->is_admin()))
    {
      redirect('admincms', 'refresh');
    }
    else
    {
          $id_page = $this->input->post('id_page');
          $active = $this->input->post('active');
          $data = array(
              'id_page'=> $id_page,
              'active' => $active
          );
          if ($this->blog_model->update_post('page_static',$data,array('id_page' => $id_page)))
          {
              $this->session->set_flashdata('msg','<div class="alert alert-success text-center alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>Success!</div>');
              header('location:'.base_url()."admincms/pagestatic");
          }
          else
          {
              $this->session->set_flashdata('msg','<div class="alert alert-danger text-center alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>Oops! Error.  Please try again later!!!</div>');
              header('location:'.base_url()."admincms/pagestatic");
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
  		$result = $this->blog_model->delete_data('page_static',array('id_page' => $code));
  		if($result == 1){
        $this->session->set_flashdata('msg','<div class="alert alert-success text-center alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>Success!</div>');
  			header('location:'.base_url().'admincms/pagelist');
  		}else{
        $this->session->set_flashdata('msg','<div class="alert alert-warning text-center alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>Gagal!</div>');
  			header('location:'.base_url().'admincms/pagelist');
  		}
    }
	}




}
?>
