<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Admincms extends CI_Controller {

    public function __construct() {
        parent::__construct();

        $this->load->library(array('ion_auth', 'form_validation', 'upload'));
        $this->load->helper(array('url', 'language'));
        $this->form_validation->set_error_delimiters($this->config->item('error_start_delimiter', 'ion_auth'), $this->config->item('error_end_delimiter', 'ion_auth'));
        $this->lang->load('auth');
    }

    // log the user in
    public function login() {
        $this->data['site_title'] = $this->lang->line('login_heading');
        $this->form_validation->set_rules('identity', str_replace(':', '', $this->lang->line('login_identity_label')), 'required');
        $this->form_validation->set_rules('password', str_replace(':', '', $this->lang->line('login_password_label')), 'required');

        if ($this->form_validation->run() == true) {
            $remember = (bool) $this->input->post('remember');

            if ($this->ion_auth->login($this->input->post('identity'), $this->input->post('password'), $remember)) {
                $this->session->set_flashdata('message', '<div class="alert alert-success text-center alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>LOGIN SUCCESS!</div>');
                redirect('admincms/index', 'refresh');
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-warning text-center alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>LOGIN UN SUCCESSFULL!</div>');
                redirect('admincms/login', 'refresh'); // use redirects instead of loading views for compatibility with MY_Controller libraries
            }
        } else {
            $this->data['message'] = '<div class="alert alert-warning">' . (validation_errors()) ? validation_errors() : $this->session->flashdata('message') . '</div>';
            $this->data['identity'] = array('name' => 'identity',
                'id' => 'identity',
                'type' => 'text',
                'value' => $this->form_validation->set_value('identity'),
            );
            $this->data['password'] = array('name' => 'password',
                'id' => 'password',
                'type' => 'password',
            );

            $this->_render_page('admincms/login', $this->data);
        }
    }

    // redirect if needed, otherwise display the user list
    public function index() {
        if (!$this->ion_auth->logged_in() || !$this->ion_auth->is_admin()) {
            redirect('admincms/login', 'refresh');
            $this->session->set_flashdata('message', 'You must be an administrator to view this page.');
        } else {
            $this->data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message', '<div class="alert alert-warning text-center alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>ERROR!</div>');
            $data_setting = $this->blog_model->get_setting()->result_array();
            $data_users = $this->ion_auth->user()->row();
            $data = array(
                'site_title' => 'Login',
                'message' => $this->data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message', '<div class="alert alert-success text-center alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>SUCCESS! WELCOME</div>'),
                'namelogin' => $data_users->username,
                'site_title' => $data_setting[0]['title'] . "- Admin",
                'total_contact' => $this->db->count_all('contact'),
                'total_article' => $this->db->count_all('post')
            );
            $this->load->view('admincms/head', $data);
            $this->load->view('admincms/navbar');
            $this->load->view('admincms/sidebar');
            $this->load->view('admincms/index');
            $this->load->view('admincms/footer');
        }
    }

    /* ===== List Post ===== */

    public function pagelist() {
        if (!$this->ion_auth->logged_in() || !$this->ion_auth->is_admin()) {
            redirect('admincms/login', 'refresh');
            $this->session->set_flashdata('message', 'You must be an administrator to view this page.');
        } else {
            $this->data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');
            $data_setting = $this->blog_model->get_setting()->result_array();
            $post = $this->blog_model->get_post()->result_array();
            $data_users = $this->ion_auth->user()->row();
            $data = array(
                'namelogin' => $data_users->username,
                'site_title' => $data_setting[0]['title'] . "- POST",
                'content' => $this->blog_model->get_page('order by id_page desc')->result_array()
            );
            $this->load->view('admincms/head', $data);
            $this->load->view('admincms/navbar');
            $this->load->view('admincms/sidebar');
            $this->load->view('admincms/pagelist');
            $this->load->view('admincms/footer');
        }
    }

    /* ===== New Post ===== */

    public function pagestatic() {
        if (!$this->ion_auth->logged_in() || !$this->ion_auth->is_admin()) {
            redirect('admincms/login', 'refresh');
            $this->session->set_flashdata('message', 'You must be an administrator to view this page.');
        } else {
            $this->form_validation->set_rules('title', 'title', 'required');
            $this->form_validation->set_rules('title_en', 'title en', 'required');
            $this->form_validation->set_rules('tag', 'tag');
            $this->form_validation->set_rules('status', 'status');
            $this->form_validation->set_rules('images', 'images');
            $this->form_validation->set_rules('content', 'content');
            $this->form_validation->set_rules('content_en', 'content en');
            $this->form_validation->set_rules('meta_description', 'description');
            $this->form_validation->set_rules('meta_keyword', 'meta keyword');
            $this->form_validation->set_rules('active', 'active');
            if ($this->form_validation->run() == FALSE) {
                $this->data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');
                $data_setting = $this->blog_model->get_setting()->result_array();
                $menu = $this->blog_model->get_menu_level(0);
                $data_users = $this->ion_auth->user()->row();
                $data = array(
                    'site_title' => $data_setting[0]['title'] . "- Article",
                    'namelogin' => $data_users->username,
                    'maillogin' => $this->session->userdata("email"),
                    'title' => "",
                    'title_en' => "",
                    'images' => "",
                    'id_page' => "",
                    'content' => "",
                    'content_en' => "",
                    'tag' => "",
                    'description' => "",
                    'keyword' => "",
                    'datepost' => "",
                    'active' => "",
                    'sidemenu' => '',
                    'menu' => $menu,
                    'formaction' => base_url('admincms/pagestatic')
                );
                $this->load->view('admincms/head', $data);
                $this->load->view('admincms/navbar', $data);
                $this->load->view('admincms/sidebar', $data);
                $this->load->view('admincms/pagestatic', $data);
                $this->load->view('admincms/footer', $data);
            } else {

                $id_page = $this->input->post('id_page');
                $datepost = $this->input->post('datepost');

                $data = array(
                    'date' => date("Y-m-d H:i:s"),
                    'datepost' => $this->input->post('datepost'),
                    'title' => $this->input->post('title'),
                    'title_en' => $this->input->post('title_en'),
                    'seotitle' => strtolower(clean($this->input->post('title'))),
                    'seotitle_en' => strtolower(clean($this->input->post('title_en'))),
                    'images' => $this->input->post('images'),
                    'tag' => $this->input->post('tag'),
                    'datepost' => $this->input->post('datepost'),
                    'content' => $this->input->post('content'),
                    'content_en' => $this->input->post('content_en'),
                    'meta_description' => $this->input->post('meta_description'),
                    'meta_keyword' => $this->input->post('meta_keyword'),
                    'editor' => $this->input->post('editor'),
                    'id_menu' => $this->input->post('id_menu'),
                    'active' => $this->input->post('active')
                );
                if ($this->blog_model->insert_page($data)) {
                    $this->session->set_flashdata('msg', '<div class="alert alert-success text-center alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>Success!</div>');
                    header('location:' . base_url("admincms/pagelist"));
                } else {
                    $this->session->set_flashdata('msg', '<div class="alert alert-danger text-center alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>Oops! Error.  Please try again later!!!</div>');
                    header('location:' . base_url("admincms/pagelist"));
                }
            }
        }
    }

    /* ===== EDIT PAGE ===== */

    public function pageedit($code = 0) {
        if (!$this->ion_auth->logged_in() || !$this->ion_auth->is_admin()) {
            redirect('admincms/login', 'refresh');
            $this->session->set_flashdata('message', 'You must be an administrator to view this page.');
        } else {

            $this->form_validation->set_rules('title', 'title', 'required');
            $this->form_validation->set_rules('title_en', 'title en', 'required');
            $this->form_validation->set_rules('tag', 'tag');
            $this->form_validation->set_rules('status', 'status');
            $this->form_validation->set_rules('images', 'images');
            $this->form_validation->set_rules('content', 'content');
            $this->form_validation->set_rules('content_en', 'content en');
            $this->form_validation->set_rules('meta_description', 'description');
            $this->form_validation->set_rules('meta_keyword', 'meta keyword');
            $this->form_validation->set_rules('active', 'active');
            if ($this->form_validation->run() == FALSE) {
                $this->data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');
                $data_setting = $this->blog_model->get_setting()->result_array();
                $data_page = $this->blog_model->get_page("where id_page = '$code'")->result_array();
                $menu = $this->blog_model->get_menu_level(0);
                $data_users = $this->ion_auth->user()->row();
                $data = array(
                    'status' => "Edit",
                    'namelogin' => $data_users->username,
                    'maillogin' => $this->session->userdata("email"),
                    'site_title' => $data_setting[0]['title'] . "- Edit Page",
                    'id_page' => $data_page[0]['id_page'],
                    'images' => $data_page[0]['images'],
                    'title' => $data_page[0]['title'],
                    'title_en' => $data_page[0]['title_en'],
                    'content' => $data_page[0]['content'],
                    'content_en' => $data_page[0]['content_en'],
                    'tag' => $data_page[0]['tag'],
                    'description' => $data_page[0]['meta_description'],
                    'keyword' => $data_page[0]['meta_keyword'],
                    'datepost' => $data_page[0]['datepost'],
                    'active' => $data_page[0]['active'],
                    'sidemenu' => $data_page[0]['id_menu'],
                    'menu' => $menu,
                    'formaction' => base_url('admincms/pageedit')
                );
                $this->load->view('admincms/head', $data);
                $this->load->view('admincms/navbar', $data);
                $this->load->view('admincms/sidebar', $data);
                $this->load->view('admincms/pagestatic', $data);
                $this->load->view('admincms/footer', $data);
            } else {
                $id_page = $this->input->post('id_page');
                $datepost = $this->input->post('datepost');
                $data = array(
                    'id_page' => $this->input->post('id_page'),
                    'datepost' => $datepost,
                    'title' => $this->input->post('title'),
                    'title_en' => $this->input->post('title_en'),
                    'seotitle' => strtolower(clean($this->input->post('title'))),
                    'seotitle_en' => strtolower(clean($this->input->post('title_en'))),
                    'tag' => $this->input->post('tag'),
                    'datepost' => $this->input->post('datepost'),
                    'images' => $this->input->post('images'),
                    'content' => $this->input->post('content'),
                    'content_en' => $this->input->post('content_en'),
                    'meta_description' => $this->input->post('meta_description'),
                    'meta_keyword' => $this->input->post('meta_keyword'),
                    'editor' => $this->input->post('editor'),
                    'active' => $this->input->post('active'),
                    'id_menu' => $this->input->post('id_menu')
                );
                if ($this->blog_model->update_post('page_static', $data, array('id_page' => $id_page))) {
                    $this->session->set_flashdata('msg', '<div class="alert alert-success text-center alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>Success!</div>');
                    header('location:' . base_url("admincms/pagelist"));
                } else {
                    $this->session->set_flashdata('msg', '<div class="alert alert-danger text-center alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>Oops! Error.  Please try again later!!!</div>');
                    header('location:' . base_url("admincms/pagelist"));
                }
            }
        }
    }

    /* ===== List Post ===== */

    public function postlist() {
        if (!$this->ion_auth->logged_in() || !$this->ion_auth->is_admin()) {
            redirect('admincms/login', 'refresh');
            $this->session->set_flashdata('message', 'You must be an administrator to view this page.');
        } else {
            $this->data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');
            $data_setting = $this->blog_model->get_setting()->result_array();
            $post = $this->blog_model->get_post()->result_array();
            $data_users = $this->ion_auth->user()->row();
            $data = array(
                'namelogin' => $data_users->username,
                'maillogin' => $this->session->userdata("email"),
                'site_title' => $data_setting[0]['title'] . "- POST",
                'content' => $this->blog_model->get_post('order by id_post desc')->result_array()
            );
            $this->load->view('admincms/head', $data);
            $this->load->view('admincms/navbar');
            $this->load->view('admincms/sidebar');
            $this->load->view('admincms/postlist');
            $this->load->view('admincms/footer');
        }
    }

    /* ===== List Product ===== */

    public function productlist() {
        if (!$this->ion_auth->logged_in() || !$this->ion_auth->is_admin()) {
            redirect('admincms/login', 'refresh');
            $this->session->set_flashdata('message', 'You must be an administrator to view this page.');
        } else {
            $this->data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');
            $data_setting = $this->blog_model->get_setting()->result_array();
            $data_users = $this->ion_auth->user()->row();
            $data = array(
                'namelogin' => $data_users->username,
                'maillogin' => $this->session->userdata("email"),
                'site_title' => $data_setting[0]['title'] . " - PRODUCT",
                'content' => $this->blog_model->get_product('order by id_post desc')->result_array()
            );
            $this->load->view('admincms/head', $data);
            $this->load->view('admincms/navbar');
            $this->load->view('admincms/sidebar');
            $this->load->view('admincms/productlist');
            $this->load->view('admincms/footer');
        }
    }

    /* ===== List Hubungan Investor ===== */

    public function hubunganinvestor() {
        if (!$this->ion_auth->logged_in() || !$this->ion_auth->is_admin()) {
            redirect('admincms/login', 'refresh');
            $this->session->set_flashdata('message', 'You must be an administrator to view this page.');
        } else {
            $this->data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');
            $data_setting = $this->blog_model->get_setting()->result_array();
            $data_users = $this->ion_auth->user()->row();
            $data = array(
                'namelogin' => $data_users->username,
                'maillogin' => $this->session->userdata("email"),
                'site_title' => $data_setting[0]['title'] . " - Hubungan Investor",
                'content' => $this->blog_model->get_hubinvestor('order by id desc')->result_array()
            );
            $this->load->view('admincms/head', $data);
            $this->load->view('admincms/navbar');
            $this->load->view('admincms/sidebar');
            $this->load->view('admincms/hubunganinvestorlist');
            $this->load->view('admincms/footer');
        }
    }
   /* ===== New product ===== */

    public function hubunganinvestoradd() {
        if (!$this->ion_auth->logged_in() || !$this->ion_auth->is_admin()) {
            redirect('admincms/login', 'refresh');
            $this->session->set_flashdata('message', 'You must be an administrator to view this page.');
        } else {
            $this->form_validation->set_rules('title', 'title', 'required'); 
            $this->form_validation->set_rules('image', 'image');
            $this->form_validation->set_rules('files', 'files');
			$this->form_validation->set_rules('year', 'year');
            $this->form_validation->set_rules('active', 'active'); 

            if ($this->form_validation->run() == FALSE) {
                $this->data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');
                $data_setting = $this->blog_model->get_setting()->result_array(); 
                $data_users = $this->ion_auth->user()->row();
                $data = array(
                    'site_title' => $data_setting[0]['title'] . " - Hubungan Investor", 
                    'namelogin' => $data_users->username, 
                    'status' => "",
					'title' => "",
                    'id_post' => "",
                    'image' => "", 
					'files' => "",
					'year' => "",	
					'active' => "",
                    'subcategory' => "",
					'category' => $this->blog_model->get_hubunganinvestor_category()->result_array(),
                    'formaction' => base_url('admincms/hubunganinvestoradd')
                );
                $this->load->view('admincms/head', $data);
                $this->load->view('admincms/navbar', $data);
                $this->load->view('admincms/sidebar', $data);
                $this->load->view('admincms/hubunganinvestor', $data);
                $this->load->view('admincms/footer', $data);
            } else {
                $id_post = $this->input->post('id');
                $data = array(
                    'date' => date("Y-m-d H:i:s"), 
					'title' => $this->input->post('title'),
					'image' => $this->input->post('image'),					
					'year' => $this->input->post('year'),
					'category' => $this->input->post('category'),
                    'subcategory' => $this->input->post('subcategory'),
					'active' => $this->input->post('active')
                );
                            
                $this->load->library('upload');
                $path = './assets/files/';
                $config['upload_path'] = $path;
                $config['allowed_types'] = 'pdf';
                $config['max_size'] = 0;
                $this->upload->initialize($config);
                // print_r($_FILES);die();
                if (!$this->upload->do_upload('files')) {
                    // Handle upload errors              
                    // If an error occurs jump to the next file
                    $err = true;
                    $error = $this->upload->display_errors();
                    print_r($error);die();
                } else {

                    $fupload = $this->upload->data();
                    $err = false;
                    $data['files'] = $fupload['file_name'];                    
                    // Successfull file upload                            
                }
                

                if ($this->blog_model->insert_hubinvestor($data)) {
                    $this->session->set_flashdata('msg', '<div class="alert alert-success text-center alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>Success!</div>');
                    header('location:' . base_url() . "admincms/hubunganinvestor");
                } else {
                    $this->session->set_flashdata('msg', '<div class="alert alert-danger text-center alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>Oops! Error.  Please try again later!!!</div>');
                    header('location:' . base_url() . "admincms/hubunganinvestor");
                }
            }
        }
    }
    /* ===== EDIT Hubungan Investor ===== */

    public function hubunganinvestoredit($code = 0) {
        if (!$this->ion_auth->logged_in() || !$this->ion_auth->is_admin()) {
            redirect('admincms/login', 'refresh');
            $this->session->set_flashdata('message', 'You must be an administrator to view this page.');
        } else {
            $this->form_validation->set_rules('title', 'title', 'required');
            $this->form_validation->set_rules('image', 'image');
            $this->form_validation->set_rules('files', 'files');
            $this->form_validation->set_rules('year', 'year');
            $this->form_validation->set_rules('active', 'active');
            $data_users = $this->ion_auth->user()->row();
            if ($this->form_validation->run() == FALSE) {
                $this->data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');
                $data_setting = $this->blog_model->get_setting()->result_array();
                $data_post = $this->blog_model->get_hubinvestor("where id = '$code'")->result_array();
                $data_users = $this->ion_auth->user()->row();
                $data = array(				
                    'site_title' => $data_setting[0]['title'] . " - Edit Hubungan Investor", 
                    'status' => "Edit",
                    'namelogin' => $data_users->username,
                    'site_title' => $data_setting[0]['title'] . " - Edit Hubungan Investor",
                    'id_post' => $data_post[0]['id'],
                    'title' => $data_post[0]['title'],
                    'image' => $data_post[0]['image'],
                    'files' => $data_post[0]['files'],
                    'year' => $data_post[0]['year'],
					'categorys' => $data_post[0]['category'],
                    'subcategory' => $data_post[0]['subcategory'],
					'category' => $this->blog_model->get_hubunganinvestor_category()->result_array(),
                    'active' => $data_post[0]['active'],
                    'formaction' => base_url('admincms/hubunganinvestoredit')
                );
                $this->load->view('admincms/head', $data);
                $this->load->view('admincms/navbar', $data);
                $this->load->view('admincms/sidebar', $data);
                $this->load->view('admincms/hubunganinvestor', $data);
                $this->load->view('admincms/footer', $data);
            } else {
                $id_post = $this->input->post('id');
                $data = array(
					'id' => $this->input->post('id'),
 					'title' => $this->input->post('title'),
					'image' => $this->input->post('image'),
					'year' => $this->input->post('year'),
					'category' => $this->input->post('category'),
                    'subcategory' => $this->input->post('subcategory'),
					'active' => $this->input->post('active')
                );
                
                $this->load->library('upload');
                $path = APPPATH . '../assets/files/';
                $config['upload_path'] = $path;
                $config['allowed_types'] = 'pdf';
                $config['max_size'] = '0';
                $this->upload->initialize($config);
                //print_r($_FILES);die();
                if (!$this->upload->do_upload('files')) {
                    // Handle upload errors              
                    // If an error occurs jump to the next file
                    $err = true;
                    $error = $this->upload->display_errors();
                } else {
                    $fupload = $this->upload->data();
                    $err = false;
                    $data['files'] = $fupload['file_name'];                    
                    // Successfull file upload
                }

                if ($this->blog_model->update_post('hub_investor', $data, array('id' => $id_post))) {
                    $this->session->set_flashdata('msg', '<div class="alert alert-success text-center alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>Success!</div>');
                    header('location:' . base_url() . "admincms/hubunganinvestor");
                } else {
                    $this->session->set_flashdata('msg', '<div class="alert alert-danger text-center alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>Oops! Error.  Please try again later!!!</div>');
                    header('location:' . base_url() . "admincms/hubunganinvestor");
                }
            }
        }
    }

    /* ===== List Career ===== */

    public function careerlist() {
        if (!$this->ion_auth->logged_in() || !$this->ion_auth->is_admin()) {
            redirect('admincms/login', 'refresh');
            $this->session->set_flashdata('message', 'You must be an administrator to view this page.');
        } else {
            $this->data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');
            $data_setting = $this->blog_model->get_setting()->result_array();
            $post = $this->blog_model->get_post()->result_array();
            $data_users = $this->ion_auth->user()->row();
            $data = array(
                'namelogin' => $data_users->username,
                'maillogin' => $this->session->userdata("email"),
                'site_title' => $data_setting[0]['title'] . " - CAREER",
                'content' => $this->blog_model->get_career('order by id_post desc')->result_array()
            );
            $this->load->view('admincms/head', $data);
            $this->load->view('admincms/navbar');
            $this->load->view('admincms/sidebar');
            $this->load->view('admincms/careerlist');
            $this->load->view('admincms/footer');
        }
    }

    /* ===== New Career ===== */

    public function career() {
        if (!$this->ion_auth->logged_in() || !$this->ion_auth->is_admin()) {
            redirect('admincms/login', 'refresh');
            $this->session->set_flashdata('message', 'You must be an administrator to view this page.');
        } else {
            $this->form_validation->set_rules('title', 'title', 'required');
            $this->form_validation->set_rules('title_en', 'title en', 'required');
            $this->form_validation->set_rules('status', 'status');
            $this->form_validation->set_rules('content', 'content');
            $this->form_validation->set_rules('content_en', 'content en');
            $this->form_validation->set_rules('meta_description', 'description');
            $this->form_validation->set_rules('meta_keyword', 'meta keyword');
            $this->form_validation->set_rules('active', 'active');
            if ($this->form_validation->run() == FALSE) {
                $this->data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');
                $data_setting = $this->blog_model->get_setting()->result_array();
                $cats = $this->blog_model->get_post_category()->result_array();
                $data_users = $this->ion_auth->user()->row();
                $data = array(
                    'site_title' => $data_setting[0]['title'] . " - Career",
                    'category' => $this->blog_model->get_post_category()->result_array(),
                    'namelogin' => $data_users->username,
                    'maillogin' => $this->session->userdata("email"),
                    'title' => "",
                    'title_en' => "",
                    'status' => "",
                    'id_post' => "",
                    'content' => "",
                    'content_en' => "",
                    'description' => "",
                    'keyword' => "",
                    'active' => "",
                    'formaction' => base_url('admincms/career')
                );
                $this->load->view('admincms/head', $data);
                $this->load->view('admincms/navbar', $data);
                $this->load->view('admincms/sidebar', $data);
                $this->load->view('admincms/career', $data);
                $this->load->view('admincms/footer', $data);
            } else {
                $id_post = $this->input->post('id_post');
                $datepost = $this->input->post('datepost');
                $data = array
                    (
                    'date' => date("Y-m-d H:i:s"),
                    'title' => $this->input->post('title'),
                    'title_en' => $this->input->post('title_en'),
                    'seotitle' => strtolower(clean($this->input->post('title'))),
                    'seotitle_en' => strtolower(clean($this->input->post('title_en'))),
                    'content' => $this->input->post('content'),
                    'content_en' => $this->input->post('content_en'),
                    'meta_description' => $this->input->post('meta_description'),
                    'meta_keyword' => $this->input->post('meta_keyword'),
                    'editor' => $this->input->post('editor'),
                    'active' => $this->input->post('active')
                );
                if ($this->blog_model->insert_career($data)) {
                    $this->session->set_flashdata('msg', '<div class="alert alert-success text-center alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>Success!</div>');
                    header('location:' . base_url() . "admincms/careerlist");
                } else {
                    $this->session->set_flashdata('msg', '<div class="alert alert-danger text-center alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>Oops! Error.  Please try again later!!!</div>');
                    header('location:' . base_url() . "admincms/careerlist");
                }
            }
        }
    }

    public function careeredit($code = 0) {
        if (!$this->ion_auth->logged_in() || !$this->ion_auth->is_admin()) {
            redirect('admincms/login', 'refresh');
            $this->session->set_flashdata('message', 'You must be an administrator to view this page.');
        } else {
            $this->form_validation->set_rules('title', 'title', 'required');
            $this->form_validation->set_rules('title_en', 'title en', 'required');
            $this->form_validation->set_rules('status', 'status');
            $this->form_validation->set_rules('content', 'content');
            $this->form_validation->set_rules('content_en', 'content en');
            $this->form_validation->set_rules('meta_description', 'description');
            $this->form_validation->set_rules('meta_keyword', 'meta keyword');
            $this->form_validation->set_rules('active', 'active');
            if ($this->form_validation->run() == FALSE) {

                // set the flash data error message if there is one
                $this->data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');
                $data_setting = $this->blog_model->get_setting()->result_array();
                $data_post = $this->blog_model->get_career("where id_post = '$code'")->result_array();
                $post = $this->blog_model->get_post()->result_array();
                $data_users = $this->ion_auth->user()->row();
                $data = array(
                    'status' => "Edit",
                    'namelogin' => $data_users->username,
                    'maillogin' => $this->session->userdata("email"),
                    'site_title' => $data_setting[0]['title'] . "- Edit Career",
                    'id_post' => $data_post[0]['id_post'],
                    'title' => $data_post[0]['title'],
                    'title_en' => $data_post[0]['title_en'],
                    'content' => $data_post[0]['content'],
                    'content_en' => $data_post[0]['content_en'],
                    'description' => $data_post[0]['meta_description'],
                    'keyword' => $data_post[0]['meta_keyword'],
                    'active' => $data_post[0]['active'],
                    'formaction' => base_url('admincms/careeredit')
                );
                $this->load->view('admincms/head', $data);
                $this->load->view('admincms/navbar', $data);
                $this->load->view('admincms/sidebar', $data);
                $this->load->view('admincms/career', $data);
                $this->load->view('admincms/footer', $data);
            } else {
                $id_post = $this->input->post('id_post');
                $data = array(
                    'title' => $this->input->post('title'),
                    'title_en' => $this->input->post('title_en'),
                    'seotitle' => strtolower(clean($this->input->post('title'))),
                    'seotitle_en' => strtolower(clean($this->input->post('title_en'))),
                    'content' => $this->input->post('content'),
                    'content_en' => $this->input->post('content_en'),
                    'meta_description' => $this->input->post('meta_description'),
                    'meta_keyword' => $this->input->post('meta_keyword'),
                    'editor' => $this->input->post('editor'),
                    'active' => $this->input->post('active')
                );
                if ($this->blog_model->update_post('career', $data, array('id_post' => $id_post))) {
                    $this->session->set_flashdata('msg', '<div class="alert alert-success text-center alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>Success!</div>');
                    header('location:' . base_url() . "admincms/careerlist");
                } else {
                    $this->session->set_flashdata('msg', '<div class="alert alert-danger text-center alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>Oops! Error.  Please try again later!!!</div>');
                    header('location:' . base_url() . "admincms/careerlist");
                }
            }
        }
    }

    /* ===== jaringan ===== */

    public function jaringan() {
        if (!$this->ion_auth->logged_in() || !$this->ion_auth->is_admin()) {
            redirect('admincms/login', 'refresh');
            $this->session->set_flashdata('message', 'You must be an administrator to view this page.');
        } else {
            $this->data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');
            $data_setting = $this->blog_model->get_setting()->result_array();
            $post = $this->blog_model->get_post()->result_array();
            $data_users = $this->ion_auth->user()->row();
            $data = array(
                'namelogin' => $data_users->username,
                'maillogin' => $this->session->userdata("email"),
                'site_title' => $data_setting[0]['title'] . " - Jaringan",
                'content' => $this->blog_model->get_jaringan('order by id_jaringan desc')->result_array()
            );
            $this->load->view('admincms/head', $data);
            $this->load->view('admincms/navbar');
            $this->load->view('admincms/sidebar');
            $this->load->view('admincms/jaringan');
            $this->load->view('admincms/footer');
        }
    }

    /* ===== New Jaringan ===== */

    public function newjaringan() {
        if (!$this->ion_auth->logged_in() || !$this->ion_auth->is_admin()) {
            redirect('admincms/login', 'refresh');
            $this->session->set_flashdata('message', 'You must be an administrator to view this page.');
        } else {
            $this->form_validation->set_rules('title', 'title', 'required');

            $this->form_validation->set_rules('alamat', 'alamat', 'required');
            $this->form_validation->set_rules('lat', 'lat', 'required');
            $this->form_validation->set_rules('lng', 'lng', 'required');
            if ($this->form_validation->run() == FALSE) {
                $this->data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');
                $data_setting = $this->blog_model->get_setting()->result_array();
                $data_users = $this->ion_auth->user()->row();
                $data = array(
                    'site_title' => $data_setting[0]['title'] . " - Career",
                    'category' => $this->blog_model->get_post_category()->result_array(),
                    'namelogin' => $data_users->username,
                    'maillogin' => $this->session->userdata("email"),
                    'provinsi' => $this->blog_model->get_provinsi()->result_array(),
                    'kabupaten' => $this->blog_model->get_kabupaten()->result_array(),
                    'id_jaringan' => "",
                    'type_jaringan' => "",
                    'idprovinsi' => "",
                    'idkabupaten' => "",
                    'title' => "",
                    'alamat' => "",
                    'map' => "",
                    'lat' => "",
                    'lng' => "",
                    'formaction' => base_url('admincms/newjaringan')
                );
                $this->load->view('admincms/head', $data);
                $this->load->view('admincms/navbar', $data);
                $this->load->view('admincms/sidebar', $data);
                $this->load->view('admincms/jaringannew', $data);
                $this->load->view('admincms/footer', $data);
            } else {

                $data = array
                    (
                    'type_jaringan' => $this->input->post('type_jaringan'),
                    'idprovinsi' => $this->input->post('provinsi'),
                    'idkabupaten' => $this->input->post('kabupaten'),
                    'title' => $this->input->post('title'),
                    'alamat' => $this->input->post('alamat'),
                    'map' => $this->input->post('map'),
                    'lat' => $this->input->post('lat'),
                    'lng' => $this->input->post('lng')
                );
                if ($this->blog_model->insert_data('jaringan', $data)) {
                    $this->session->set_flashdata('msg', '<div class="alert alert-success text-center alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>Success!</div>');
                    header('location:' . base_url() . "admincms/jaringan");
                } else {
                    $this->session->set_flashdata('msg', '<div class="alert alert-danger text-center alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>Oops! Error.  Please try again later!!!</div>');
                    header('location:' . base_url() . "admincms/jaringan");
                }
            }
        }
    }

    /* ===== New Jaringan ===== */

    public function editjaringan($code = 0) {
        if (!$this->ion_auth->logged_in() || !$this->ion_auth->is_admin()) {
            redirect('admincms/login', 'refresh');
            $this->session->set_flashdata('message', 'You must be an administrator to view this page.');
        } else {
            $this->form_validation->set_rules('title', 'title', 'required');

            $this->form_validation->set_rules('alamat', 'alamat', 'required');
            $this->form_validation->set_rules('lat', 'lat', 'required');
            $this->form_validation->set_rules('lng', 'lng', 'required');
            if ($this->form_validation->run() == FALSE) {
                $this->data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');
                $data_setting = $this->blog_model->get_setting()->result_array();
                $data_post = $this->blog_model->get_jaringan("where id_jaringan = '$code'")->result_array();
                $data_users = $this->ion_auth->user()->row();
                $data = array(
                    'site_title' => $data_setting[0]['title'] . " - Career",
                    'category' => $this->blog_model->get_post_category()->result_array(),
                    'namelogin' => $data_users->username,
                    'maillogin' => $this->session->userdata("email"),
                    'provinsi' => $this->blog_model->get_provinsi()->result_array(),
                    'kabupaten' => $this->blog_model->get_kabupaten()->result_array(),
                    'id_jaringan' => $data_post[0]['id_jaringan'],
                    'type_jaringan' => $data_post[0]['type_jaringan'],
                    'idprovinsi' => $data_post[0]['idprovinsi'],
                    'idkabupaten' => $data_post[0]['idkabupaten'],
                    'title' => $data_post[0]['title'],
                    'alamat' => $data_post[0]['alamat'],
                    'map' => $data_post[0]['map'],
                    'lat' => $data_post[0]['lat'],
                    'lng' => $data_post[0]['lng'],
                    'formaction' => ''
                );
                $this->load->view('admincms/head', $data);
                $this->load->view('admincms/navbar', $data);
                $this->load->view('admincms/sidebar', $data);
                $this->load->view('admincms/jaringannew', $data);
                $this->load->view('admincms/footer', $data);
            } else {
                $id_post = $this->input->post('id_jaringan');

                $data = array
                    (
                    'type_jaringan' => $this->input->post('type_jaringan'),
                    'idprovinsi' => $this->input->post('provinsi'),
                    'idkabupaten' => $this->input->post('kabupaten'),
                    'title' => $this->input->post('title'),
                    'alamat' => $this->input->post('alamat'),
                    'map' => $this->input->post('map'),
                    'lat' => $this->input->post('lat'),
                    'lng' => $this->input->post('lng')
                    );
                if ($this->blog_model->update_post('jaringan', $data, array('id_jaringan' => $id_post))) {
                    $this->session->set_flashdata('msg', '<div class="alert alert-success text-center alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>Success!</div>');
                    header('location:' . base_url() . "admincms/jaringan");
                } else {
                    $this->session->set_flashdata('msg', '<div class="alert alert-danger text-center alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>Oops! Error.  Please try again later!!!</div>');
                    header('location:' . base_url() . "admincms/jaringan");
                }
            }
        }
    }

    /* ====== Delete Jaringan ========= */
    function deletejaringan($code = 0){
        if (!$this->ion_auth->logged_in())
        {
            redirect('admincms/login', 'refresh');
        }
        else
        {
            $result = $this->blog_model->delete_data('jaringan',array('id_jaringan' => $code));
            if($result == 1)
            {
                $this->session->set_flashdata('msg','<div class="alert alert-success text-center alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>Success!</div>');
                header('location:'.base_url().'admincms/jaringan');
            }
            else
            {
                $this->session->set_flashdata('msg','<div class="alert alert-warning text-center alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>Gagal!</div>');
                header('location:'.base_url().'admincms/jaringan');
            }
        }        
    }

    /* kalender event */


    /* ===== jaringan ===== */

    public function kalender() {
        if (!$this->ion_auth->logged_in() || !$this->ion_auth->is_admin()) {
            redirect('admincms/login', 'refresh');
            $this->session->set_flashdata('message', 'You must be an administrator to view this page.');
        } else {
            $this->data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');
            $data_setting = $this->blog_model->get_setting()->result_array();
            $post = $this->blog_model->get_post()->result_array();
            $data_users = $this->ion_auth->user()->row();
            $data = array(
                'namelogin' => $data_users->username,
                'maillogin' => $this->session->userdata("email"),
                'site_title' => $data_setting[0]['title'] . " - Kalender",
                'content' => $this->blog_model->get_kalender('order by id_event desc')->result_array()
            );
            $this->load->view('admincms/head', $data);
            $this->load->view('admincms/navbar');
            $this->load->view('admincms/sidebar');
            $this->load->view('admincms/kalender');
            $this->load->view('admincms/footer');
        }
    }

    /* ===== New kalender event ===== */

    public function newkalender() {
        if (!$this->ion_auth->logged_in() || !$this->ion_auth->is_admin()) {
            redirect('admincms/login', 'refresh');
            $this->session->set_flashdata('message', 'You must be an administrator to view this page.');
        } else {
            $this->form_validation->set_rules('name', 'name', 'required');
            $this->form_validation->set_rules('start_date', 'start_date', 'required');
            if ($this->form_validation->run() == FALSE) {
                $this->data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');
                $data_setting = $this->blog_model->get_setting()->result_array();
                $data_users = $this->ion_auth->user()->row();
                $data = array(
                    'site_title' => $data_setting[0]['title'] . " - Kalender",
                    'namelogin' => $data_users->username,
                    'maillogin' => $this->session->userdata("email"),
                    'id_event' => "",
                    'start_date' => "",
                    'end_date' => "",
                    'name' => "",
                    'color' => "",
                    'url' => "",
                    'formaction' => base_url('admincms/newkalender')
                );
                $this->load->view('admincms/head', $data);
                $this->load->view('admincms/navbar', $data);
                $this->load->view('admincms/sidebar', $data);
                $this->load->view('admincms/kalendernew', $data);
                $this->load->view('admincms/footer', $data);
            } else {

                $data = array
                    (
                    'start_date' => $this->input->post('start_date'),
                    'end_date' => $this->input->post('end_date'),
                    'name' => $this->input->post('name'),
                    'color' => $this->input->post('color'),
                    'url' => $this->input->post('url')
                );
                if ($this->blog_model->insert_data('calender_event', $data)) {
                    $this->session->set_flashdata('msg', '<div class="alert alert-success text-center alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>Success!</div>');
                    header('location:' . base_url() . "admincms/kalender");
                } else {
                    $this->session->set_flashdata('msg', '<div class="alert alert-danger text-center alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>Oops! Error.  Please try again later!!!</div>');
                    header('location:' . base_url() . "admincms/kalender");
                }
            }
        }
    }

    /* ===== New kalender event ===== */

    public function editkalender($code = 0) {
        if (!$this->ion_auth->logged_in() || !$this->ion_auth->is_admin()) {
            redirect('admincms/login', 'refresh');
            $this->session->set_flashdata('message', 'You must be an administrator to view this page.');
        } else {
            $this->form_validation->set_rules('name', 'name', 'required');
            $this->form_validation->set_rules('start_date', 'start_date', 'required');
            if ($this->form_validation->run() == FALSE) {
                $this->data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');
                $data_setting = $this->blog_model->get_setting()->result_array();
                $data_post = $this->blog_model->get_kalender("where id_event = '$code'")->result_array();
                $data_users = $this->ion_auth->user()->row();
                $data = array(
                    'site_title' => $data_setting[0]['title'] . " - Kalender",
                    'namelogin' => $data_users->username,
                    'maillogin' => $this->session->userdata("email"),
                    'id_event' => $data_post[0]['id_event'],
                    'start_date' => $data_post[0]['start_date'],
                    'end_date' => $data_post[0]['end_date'],
                    'name' => $data_post[0]['name'],
                    'color' => $data_post[0]['color'],
                    'url' => $data_post[0]['url'],
                    'formaction' => ''
                );
                $this->load->view('admincms/head', $data);
                $this->load->view('admincms/navbar', $data);
                $this->load->view('admincms/sidebar', $data);
                $this->load->view('admincms/kalendernew', $data);
                $this->load->view('admincms/footer', $data);
            } else {
                $id_post = $this->input->post('id_event');

                $data = array
                    (
                    'start_date' => $this->input->post('start_date'),
                    'end_date' => $this->input->post('end_date'),
                    'name' => $this->input->post('name'),
                    'color' => $this->input->post('color'),
                    'url' => $this->input->post('url')
                    );
                if ($this->blog_model->update_post('calender_event', $data, array('id_event' => $id_post))) {
                    $this->session->set_flashdata('msg', '<div class="alert alert-success text-center alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>Success!</div>');
                    header('location:' . base_url() . "admincms/kalender");
                } else {
                    $this->session->set_flashdata('msg', '<div class="alert alert-danger text-center alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>Oops! Error.  Please try again later!!!</div>');
                    header('location:' . base_url() . "admincms/kalender");
                }
            }
        }
    }

    /* ====== Delete kalender event ========= */
    function deletekalender($code = 0){
        if (!$this->ion_auth->logged_in())
        {
            redirect('admincms/login', 'refresh');
        }
        else
        {
            $result = $this->blog_model->delete_data('calender_event',array('id_event' => $code));
            if($result == 1)
            {
                $this->session->set_flashdata('msg','<div class="alert alert-success text-center alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>Success!</div>');
                header('location:'.base_url().'admincms/kalender');
            }
            else
            {
                $this->session->set_flashdata('msg','<div class="alert alert-warning text-center alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>Gagal!</div>');
                header('location:'.base_url().'admincms/kalender');
            }
        }        
    }


    /* ===== New Post ===== */

    public function post() {
        if (!$this->ion_auth->logged_in() || !$this->ion_auth->is_admin()) {
            redirect('admincms/login', 'refresh');
            $this->session->set_flashdata('message', 'You must be an administrator to view this page.');
        } else {
            $this->form_validation->set_rules('title', 'title', 'required');
            $this->form_validation->set_rules('title_en', 'title en', 'required');
            $this->form_validation->set_rules('category', 'category');
            $this->form_validation->set_rules('tag', 'tag');
            $this->form_validation->set_rules('status', 'status');
            $this->form_validation->set_rules('images', 'images');
            $this->form_validation->set_rules('content', 'content');
            $this->form_validation->set_rules('content_en', 'content en');
            $this->form_validation->set_rules('meta_description', 'description');
            $this->form_validation->set_rules('meta_keyword', 'meta keyword');
            $this->form_validation->set_rules('active', 'active');
            if ($this->form_validation->run() == FALSE) {
                $this->data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');
                $data_setting = $this->blog_model->get_setting()->result_array();
                $cats = $this->blog_model->get_post_category()->result_array();
                $data_users = $this->ion_auth->user()->row();
                $data = array(
                    'site_title' => $data_setting[0]['title'] . "- Article",
                    'category' => $this->blog_model->get_post_category()->result_array(),
                    'namelogin' => $data_users->username,
                    'maillogin' => $this->session->userdata("email"),
                    'title' => "",
                    'title_en' => "",
                    'status' => "",
                    'images' => "",
                    'id_cat' => "",
                    'id_post' => "",
                    'id_cat' => "",
                    'content' => "",
                    'content_en' => "",
                    'tag' => "",
                    'description' => "",
                    'keyword' => "",
                    'datepost' => "",
                    'active' => "",
                    'formaction' => base_url('admincms/post')
                );
                $this->load->view('admincms/head', $data);
                $this->load->view('admincms/navbar', $data);
                $this->load->view('admincms/sidebar', $data);
                $this->load->view('admincms/post', $data);
                $this->load->view('admincms/footer', $data);
            } else {
                $id_post = $this->input->post('id_post');
                $datepost = $this->input->post('datepost');
                //print_r($_POST);die();
                $data = array(
                    'date' => date("Y-m-d H:i:s"),
                    'title' => $this->input->post('title'),
                    'title_en' => $this->input->post('title_en'),
                    'seotitle' => strtolower(clean($this->input->post('title'))),
                    'seotitle_en' => strtolower(clean($this->input->post('title_en'))),
                    'category' => $this->input->post('category'),
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
                if ($this->blog_model->insert_post($data)) {
                    $this->session->set_flashdata('msg', '<div class="alert alert-success text-center alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>Success!</div>');
                    header('location:' . base_url() . "admincms/postlist");
                } else {
                    $this->session->set_flashdata('msg', '<div class="alert alert-danger text-center alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>Oops! Error.  Please try again later!!!</div>');
                    header('location:' . base_url() . "admincms/postlist");
                }
            }
        }
    }

    /* ===== EDIT POST ===== */

    public function postedit($code = 0) {
        if (!$this->ion_auth->logged_in() || !$this->ion_auth->is_admin()) {
            redirect('admincms/login', 'refresh');
            $this->session->set_flashdata('message', 'You must be an administrator to view this page.');
        } else {
            $this->form_validation->set_rules('title', 'title', 'required');
            $this->form_validation->set_rules('title_en', 'title en', 'required');
            $this->form_validation->set_rules('category', 'category');
            $this->form_validation->set_rules('tag', 'tag');
            $this->form_validation->set_rules('status', 'status');
            $this->form_validation->set_rules('images', 'images');
            $this->form_validation->set_rules('content', 'content');
            $this->form_validation->set_rules('content_en', 'content en');
            $this->form_validation->set_rules('meta_description', 'description');
            $this->form_validation->set_rules('meta_keyword', 'meta keyword');
            $this->form_validation->set_rules('active', 'active');
            if ($this->form_validation->run() == FALSE) {

                // set the flash data error message if there is one
                $this->data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');
                $data_setting = $this->blog_model->get_setting()->result_array();
                $data_post = $this->blog_model->get_post("where id_post = '$code'")->result_array();
                $post = $this->blog_model->get_post()->result_array();
                $data_users = $this->ion_auth->user()->row();
                $data = array(
                    'status' => "Edit",
                    'namelogin' => $data_users->username,
                    'maillogin' => $this->session->userdata("email"),
                    'site_title' => $data_setting[0]['title'] . "- Edit Post",
                    'category' => $this->blog_model->get_post_category()->result_array(),
                    'id_cat' => $data_post[0]['category'],
                    'id_post' => $data_post[0]['id_post'],
                    'images' => $data_post[0]['images'],
                    'title' => $data_post[0]['title'],
                    'title_en' => $data_post[0]['title_en'],
                    'id_cat' => $data_post[0]['category'],
                    'content' => $data_post[0]['content'],
                    'content_en' => $data_post[0]['content_en'],
                    'tag' => $data_post[0]['tag'],
                    'description' => $data_post[0]['meta_description'],
                    'keyword' => $data_post[0]['meta_keyword'],
                    'datepost' => $data_post[0]['datepost'],
                    'active' => $data_post[0]['active'],
                    'formaction' => base_url('admincms/postedit')
                );
                $this->load->view('admincms/head', $data);
                $this->load->view('admincms/navbar', $data);
                $this->load->view('admincms/sidebar', $data);
                $this->load->view('admincms/post', $data);
                $this->load->view('admincms/footer', $data);
            } else {
                $id_post = $this->input->post('id_post');
                $data = array(
                    'title' => $this->input->post('title'),
                    'title_en' => $this->input->post('title_en'),
                    'seotitle' => strtolower(clean($this->input->post('title'))),
                    'seotitle_en' => strtolower(clean($this->input->post('title_en'))),
                    'category' => $this->input->post('category'),
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
                if ($this->blog_model->update_post('post', $data, array('id_post' => $id_post))) {
                    $this->session->set_flashdata('msg', '<div class="alert alert-success text-center alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>Success!</div>');
                    header('location:' . base_url() . "admincms/postlist");
                } else {
                    $this->session->set_flashdata('msg', '<div class="alert alert-danger text-center alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>Oops! Error.  Please try again later!!!</div>');
                    header('location:' . base_url() . "admincms/postlist");
                }
            }
        }
    }

    /* ===== New product ===== */

    public function productadd() {
        if (!$this->ion_auth->logged_in() || !$this->ion_auth->is_admin()) {
            redirect('admincms/login', 'refresh');
            $this->session->set_flashdata('message', 'You must be an administrator to view this page.');
        } else {
            $this->form_validation->set_rules('title', 'title', 'required');
            $this->form_validation->set_rules('title_en', 'title en');
            $this->form_validation->set_rules('category', 'category');
            $this->form_validation->set_rules('discount', 'discount');
            $this->form_validation->set_rules('status', 'status');
            $this->form_validation->set_rules('images', 'images');
            $this->form_validation->set_rules('price', 'price');
            $this->form_validation->set_rules('content', 'content', 'required');
            $this->form_validation->set_rules('content_en', 'content en');

            if ($this->form_validation->run() == FALSE) {
                $this->data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');
                $data_setting = $this->blog_model->get_setting()->result_array();
                $cats = $this->blog_model->get_product_category()->result_array();
                $data_users = $this->ion_auth->user()->row();
                $data = array(
                    'site_title' => $data_setting[0]['title'] . " - Product",
                    'datacategory' => $this->blog_model->get_product_category()->result_array(),
                    'namelogin' => $data_users->username,
                    'maillogin' => $this->session->userdata("email"),
                    'title' => "",
                    'id_post' => "",
                    'status' => "",
                    'title_en' => "",
                    'content' => "",
                    'content_en' => "",
                    'seotitle' => "",
                    'seotitle_en' => "",
                    'category' => "",
                    'discount' => "",
                    'price' => "",
                    'images' => "",
                    'active' => "",
                    'menu' => "",
                    'kode' => "",
                    'formaction' => base_url('admincms/productadd')
                );
                $this->load->view('admincms/head', $data);
                $this->load->view('admincms/navbar', $data);
                $this->load->view('admincms/sidebar', $data);
                $this->load->view('admincms/product', $data);
                $this->load->view('admincms/footer', $data);
            } else {
                $id_post = $this->input->post('id_post');
                //'kode' => generateRandomString(8);
                $data = array(
                    'date' => date("Y-m-d H:i:s"),
                    'title' => $this->input->post('title'),
                    'title_en' => $this->input->post('title_en'),
                    'seotitle' => strtolower(clean($this->input->post('title'))),
                    'seotitle_en' => strtolower(clean($this->input->post('title_en'))),
                    'category' => $this->input->post('category'),
                    'images' => $this->input->post('images'),
                    'price' => $this->input->post('price'),
                    'discount' => $this->input->post('discount'),
                    'content' => $this->input->post('content'),
                    'content_en' => $this->input->post('content_en'),
                    'editor' => $this->input->post('editor'),
                    'active' => $this->input->post('active'),
                    'menu' => $this->input->post('menu'),
                    'summary' => $this->input->post('summary'),
                    'kode' => $this->input->post('kode')                    
                );
                if ($this->blog_model->insert_product($data)) {
                    $this->session->set_flashdata('msg', '<div class="alert alert-success text-center alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>Success!</div>');
                    header('location:' . base_url() . "admincms/productlist");
                } else {
                    $this->session->set_flashdata('msg', '<div class="alert alert-danger text-center alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>Oops! Error.  Please try again later!!!</div>');
                    header('location:' . base_url() . "admincms/productlist");
                }
            }
        }
    }

    /* ===== EDIT PRODUCT ===== */

    public function productedit($code = 0) {
        if (!$this->ion_auth->logged_in() || !$this->ion_auth->is_admin()) {
            redirect('admincms/login', 'refresh');
            $this->session->set_flashdata('message', 'You must be an administrator to view this page.');
        } else {
            $this->form_validation->set_rules('title', 'title', 'required');
            $this->form_validation->set_rules('title_en', 'title en');
            $this->form_validation->set_rules('category', 'category');
            $this->form_validation->set_rules('discount', 'discount');
            $this->form_validation->set_rules('status', 'status');
            $this->form_validation->set_rules('images', 'images');
            $this->form_validation->set_rules('price', 'price');
            $this->form_validation->set_rules('content', 'content', 'required');
            $this->form_validation->set_rules('content_en', 'content en');
            if ($this->form_validation->run() == FALSE) {
                $this->data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');
                $data_setting = $this->blog_model->get_setting()->result_array();
                $data_post = $this->blog_model->get_product("where id_post = '$code'")->result_array();
                $post = $this->blog_model->get_product()->result_array();
                $data_users = $this->ion_auth->user()->row();
                $data = array(
                    'status' => "Edit",
                    'namelogin' => $data_users->username,
                    'maillogin' => $this->session->userdata("email"),
                    'site_title' => $data_setting[0]['title'] . " - Edit Product",
                    'datacategory' => $this->blog_model->get_product_category()->result_array(),
                    'category' => $data_post[0]['category'],
                    'id_post' => $data_post[0]['id_post'],
                    'images' => $data_post[0]['images'],
                    'title' => $data_post[0]['title'],
                    'title_en' => $data_post[0]['title_en'],
                    'price' => $data_post[0]['price'],
                    'discount' => $data_post[0]['discount'],
                    'content' => $data_post[0]['content'],
                    'content_en' => $data_post[0]['content_en'],
                    'active' => $data_post[0]['active'],
                    'summary' => $data_post[0]['summary'],
                    'kode' => $data_post[0]['kode'],
                    'formaction' => base_url('admincms/productedit')
                );
                $this->load->view('admincms/head', $data);
                $this->load->view('admincms/navbar', $data);
                $this->load->view('admincms/sidebar', $data);
                $this->load->view('admincms/product', $data);
                $this->load->view('admincms/footer', $data);
            } else {
                $id_post = $this->input->post('id_post');
                $data = array(
                    'title' => $this->input->post('title'),
                    'title_en' => $this->input->post('title_en'),
                    'seotitle' => strtolower(clean($this->input->post('title'))),
                    'seotitle_en' => strtolower(clean($this->input->post('title_en'))),
                    'category' => $this->input->post('category'),
                    'images' => $this->input->post('images'),
                    'price' => $this->input->post('price'),
                    'discount' => $this->input->post('discount'),
                    'content' => $this->input->post('content'),
                    'content_en' => $this->input->post('content_en'),
                    'editor' => $this->input->post('editor'),
                    'active' => $this->input->post('active'),
                    'kode' => $this->input->post('kode'),
                    'summary' => $this->input->post('summary'),
                    'menu' => $this->input->post('menu')
                );
                if ($this->blog_model->update_post('product', $data, array('id_post' => $id_post))) {
                    $this->session->set_flashdata('msg', '<div class="alert alert-success text-center alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>Success!</div>');
                    header('location:' . base_url() . "admincms/productlist");
                } else {
                    $this->session->set_flashdata('msg', '<div class="alert alert-danger text-center alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>Oops! Error.  Please try again later!!!</div>');
                    header('location:' . base_url() . "admincms/productlist");
                }
            }
        }
    }

    /* ===== Category ===== */

    function category() {
        if (!$this->ion_auth->logged_in() || !$this->ion_auth->is_admin()) {
            redirect('admincms/login', 'refresh');
            $this->session->set_flashdata('message', 'You must be an administrator to view this page.');
        } else {
            $this->data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');
            $data_setting = $this->blog_model->get_setting()->result_array();
            $cats = $this->blog_model->get_post_category()->result_array();
            $data_users = $this->ion_auth->user()->row();
            $data = array(
                'namelogin' => $data_users->username,
                'maillogin' => $this->session->userdata("email"),
                'site_title' => $data_setting[0]['title'] . "- Category",
                'labeltitle' => 'Tambah kategori',
                'status' => '',
                'label' => $this->blog_model->get_post_category("order by id desc")->result_array(),
                'name' => '',
                'id' => '',
                'category' => $cats[0]['name']
            );
            $this->load->view('admincms/head', $data);
            $this->load->view('admincms/navbar');
            $this->load->view('admincms/sidebar');
            $this->load->view('admincms/category');
            $this->load->view('admincms/footer');
        }
    }

    /* ===== Product Category ===== */

    function categoryproduct() {
        if (!$this->ion_auth->logged_in() || !$this->ion_auth->is_admin()) {
            redirect('admincms/login', 'refresh');
            $this->session->set_flashdata('message', 'You must be an administrator to view this page.');
        } else {
            $this->data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');
            $data_setting = $this->blog_model->get_setting()->result_array();
            $cats = $this->blog_model->get_product_category()->result_array();
            $data_users = $this->ion_auth->user()->row();
            $data = array(
                'namelogin' => $data_users->username,
                'maillogin' => $this->session->userdata("email"),
                'site_title' => $data_setting[0]['title'] . "- Category Product",
                'labeltitle' => 'Tambah kategori Product',
                'status' => '',
                'label' => $this->blog_model->get_product_category("order by id desc")->result_array(),
                'name' => '',
                'id' => '',
                'category' => $cats[0]['name']
            );
            $this->load->view('admincms/head', $data);
            $this->load->view('admincms/navbar');
            $this->load->view('admincms/sidebar');
            $this->load->view('admincms/categoryproduct');
            $this->load->view('admincms/footer');
        }
    }

   /* ===== Category ===== */

    function categoryhubunganinvestor() {
        if (!$this->ion_auth->logged_in() || !$this->ion_auth->is_admin()) {
            redirect('admincms/login', 'refresh');
            $this->session->set_flashdata('message', 'You must be an administrator to view this page.');
        } else {
            $this->data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');
            $data_setting = $this->blog_model->get_setting()->result_array();
            $cats = $this->blog_model->get_hubunganinvestor_category()->result_array();
            $data_users = $this->ion_auth->user()->row();
            $data = array(
                'namelogin' => $data_users->username,
                'maillogin' => $this->session->userdata("email"),
                'site_title' => $data_setting[0]['title'] . "- Category Hubungan Investor",
                'labeltitle' => 'Tambah kategori',
                'status' => '',
                'label' => $this->blog_model->get_hubunganinvestor_category("order by id desc")->result_array(),
                'name' => '',
                'id' => '',
                'category' => $cats[0]['name']
            );
            $this->load->view('admincms/head', $data);
            $this->load->view('admincms/navbar');
            $this->load->view('admincms/sidebar');
            $this->load->view('admincms/categoryhubunganinvestor');
            $this->load->view('admincms/footer');
        }
    }	
	
    /* ===== Gallery ===== */

    function Gallery() {
        if (!$this->ion_auth->logged_in() || !$this->ion_auth->is_admin()) {
            redirect('admincms/login', 'refresh');
            $this->session->set_flashdata('message', 'You must be an administrator to view this page.');
        } else {
            $this->data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');
            $data_setting = $this->blog_model->get_setting()->result_array();
            $data = array
                (
                'no' => '1',
                'namelogin' => $data_users->username,
                'maillogin' => $this->session->userdata("email"),
                'site_title' => $data_setting[0]['title'] . "- List Contact",
                'gallery' => $this->blog_model->get_gallery("order by id_gallery desc")->result_array(),
            );
            $this->load->view('admincms/head', $data);
            $this->load->view('admincms/navbar');
            $this->load->view('admincms/sidebar');
            $this->load->view('admincms/gallery');
            $this->load->view('admincms/footer');
        }
    }

    public function gallerypost() {
        if (!$this->ion_auth->logged_in() || !$this->ion_auth->is_admin()) {
            redirect('admincms/login', 'refresh');
            $this->session->set_flashdata('message', 'You must be an administrator to view this page.');
        } else {
            if (!empty($_POST['name'])) {
                $this->form_validation->set_rules('name[]', "name", "trim|xss_clean|required");
            }
            if (!empty($_POST['picture'])) {
                $this->form_validation->set_rules('picture[]', "picture", "trim|xss_clean|required");
            }
            if (!empty($_POST['type_gallery'])) {
                $this->form_validation->set_rules('type_gallery[]', "type_gallery", "trim|xss_clean|required");
            }
            if ($this->form_validation->run() == FALSE) {
                $this->data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');
                $data_setting = $this->blog_model->get_setting()->result_array();
                $data_users = $this->ion_auth->user()->row();
                $data = array(
                    'site_title' => $data_setting[0]['title'] . " - Gallery",
                    'namelogin' => $data_users->username,
                    'maillogin' => $this->session->userdata("email"),
                    'id_gallery' => "",
                    'name' => "",
                    'picture' => "",
                    'formaction' => base_url('admincms/gallerypost')
                );
                $this->load->view('admincms/head', $data);
                $this->load->view('admincms/navbar', $data);
                $this->load->view('admincms/sidebar', $data);
                $this->load->view('admincms/gallerypost', $data);
                $this->load->view('admincms/footer', $data);
            } else {
                $name = $this->input->post('name');
                //$picture = $this->input->post('picture');
                $type_gallery = $this->input->post('type_gallery');
                // to make the $_FILES array consumable by the upload library
                //print_r($_FILES);die();
                $files = $_FILES;
                $file_count = count($_FILES['picture']['name']);
                $this->load->library('upload');
                $path = APPPATH . '../assets/images/gallery';
                $config['upload_path'] = $path;
                $config['allowed_types'] = 'gif|jpg|jpeg|jpe|png';
                $config['max_size'] = '5000';
                $config['overwrite'] = TRUE;
                $this->upload->initialize($config);
                //print_r($_FILES);die();
                for ($i = 0; $i < $file_count; $i++) {

                    $_FILES['tmpl']['name'] = $files['picture']['name'][$i];
                    $_FILES['tmpl']['type'] = $files['picture']['type'][$i];
                    $_FILES['tmpl']['tmp_name'] = $files['picture']['tmp_name'][$i];
                    $_FILES['tmpl']['error'] = $files['picture']['error'][$i];
                    $_FILES['tmpl']['size'] = $files['picture']['size'][$i];

                    if (!$this->upload->do_upload('tmpl')) {
                        // Handle upload errors              
                        // If an error occurs jump to the next file
                        $err = true;
                        $error = $this->upload->display_errors();
                    } else {
                        $fupload = $this->upload->data();
                        $err = false;
                        $data = array(
                            'type_gallery' => $type_gallery[$i],
                            'name' => $name[$i],
                            'picture' => $fupload['file_name']
                        );
                        $this->blog_model->insert_gallery($data);
                        // Successfull file upload
                    }
                }

                //print_r($_POST);die();
                if (!$err) {
                    $this->session->set_flashdata('msg', '<div class="alert alert-success text-center alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>Success!</div>');
                    header('location:' . base_url() . "admincms/gallery");
                } else {

                    $this->session->set_flashdata('msg', '<div class="alert alert-danger text-center alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>Oops! Error.  Please try again later!!!</div>');
                    header('location:' . base_url() . "admincms/gallery");
                }
            }
        }
    }

    /* ===== Contact ===== */

    function Contact() {
        if (!$this->ion_auth->logged_in() || !$this->ion_auth->is_admin()) {
            redirect('admincms/login', 'refresh');
            $this->session->set_flashdata('message', 'You must be an administrator to view this page.');
        } else {
            $this->data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');
            $data_setting = $this->blog_model->get_setting()->result_array();
            $data_users = $this->ion_auth->user()->row();
            $data = array(
                'no' => '1',
                'namelogin' => $data_users->username,
                'maillogin' => $this->session->userdata("email"),
                'site_title' => $data_setting[0]['title'] . "- List Contact",
                'contact' => $this->blog_model->get_contact("order by id_contact desc")->result_array(),
            );
            $this->load->view('admincms/head', $data);
            $this->load->view('admincms/navbar');
            $this->load->view('admincms/sidebar');
            $this->load->view('admincms/contact');
            $this->load->view('admincms/footer');
        }
    }

    /* ===== Edit category ===== */

    function Editcategory($code = 0) {
        if (!$this->ion_auth->logged_in() || !$this->ion_auth->is_admin()) {
            redirect('admincms/login', 'refresh');
            $this->session->set_flashdata('message', 'You must be an administrator to view this page.');
        } else {
            $this->data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');
            $data_setting = $this->blog_model->get_setting()->result_array();
            $cats = $this->blog_model->get_post_category()->result_array();
            $temp = $this->blog_model->get_post_category("where id = '$code'")->result_array();
            $data_users = $this->ion_auth->user()->row();
            $data = array(
                'namelogin' => $data_users->username,
                'maillogin' => $this->session->userdata("email"),
                'site_title' => $data_setting[0]['title'] . "- Edit Category",
                'labeltitle' => 'Edit kategori',
                'status' => 'Edit',
                'label' => $this->blog_model->get_post_category("order by id desc")->result_array(),
                'id' => $temp[0]['id'],
                'name' => $temp[0]['name']
            );
            $this->load->view('admincms/head', $data);
            $this->load->view('admincms/navbar');
            $this->load->view('admincms/sidebar');
            $this->load->view('admincms/category');
            $this->load->view('admincms/footer');
        }
    }

    /* ===== Edit category ===== */

    function editcategoryproduct($code = 0) {
        if (!$this->ion_auth->logged_in() || !$this->ion_auth->is_admin()) {
            redirect('admincms/login', 'refresh');
            $this->session->set_flashdata('message', 'You must be an administrator to view this page.');
        } else {
            $this->data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');
            $data_setting = $this->blog_model->get_setting()->result_array();
            $cats = $this->blog_model->get_product_category()->result_array();
            $temp = $this->blog_model->get_product_category("where id = '$code'")->result_array();
            $data_users = $this->ion_auth->user()->row();
            $data = array
                (
                'namelogin' => $data_users->username,
                'maillogin' => $this->session->userdata("email"),
                'site_title' => $data_setting[0]['title'] . "- Edit Category Product",
                'labeltitle' => 'Edit kategori Product',
                'status' => 'Edit',
                'label' => $this->blog_model->get_product_category("order by id desc")->result_array(),
                'id' => $temp[0]['id'],
                'name' => $temp[0]['name']
            );
            $this->load->view('admincms/head', $data);
            $this->load->view('admincms/navbar');
            $this->load->view('admincms/sidebar');
            $this->load->view('admincms/categoryproduct');
            $this->load->view('admincms/footer');
        }
    }

	/* ===== Edit category ===== */

    function editcategoryhubunganinvestor($code = 0) {
        if (!$this->ion_auth->logged_in() || !$this->ion_auth->is_admin()) {
            redirect('admincms/login', 'refresh');
            $this->session->set_flashdata('message', 'You must be an administrator to view this page.');
        } else {
            $this->data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');
            $data_setting = $this->blog_model->get_setting()->result_array();
            $cats = $this->blog_model->get_hubunganinvestor_category()->result_array();
            $temp = $this->blog_model->get_hubunganinvestor_category("where id = '$code'")->result_array();
            $data_users = $this->ion_auth->user()->row();
            $data = array
                (
                'namelogin' => $data_users->username,
                'maillogin' => $this->session->userdata("email"),
                'site_title' => $data_setting[0]['title'] . "- Edit Category Hubungan Investor",
                'labeltitle' => 'Edit kategori Hubungan Investor',
                'status' => 'Edit',
                'label' => $this->blog_model->get_hubunganinvestor_category("order by id desc")->result_array(),
                'id' => $temp[0]['id'],
                'name' => $temp[0]['name']
            );
            $this->load->view('admincms/head', $data);
            $this->load->view('admincms/navbar');
            $this->load->view('admincms/sidebar');
            $this->load->view('admincms/categoryhubunganinvestor');
            $this->load->view('admincms/footer');
        }
    }

    /* ===== subscribe ===== */

    function subscribe() {
        if (!$this->ion_auth->logged_in() || !$this->ion_auth->is_admin()) {
            redirect('admincms/login', 'refresh');
            $this->session->set_flashdata('message', 'You must be an administrator to view this page.');
        } else {
            $this->data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');
            $data_setting = $this->blog_model->get_setting()->result_array();
            $data_users = $this->ion_auth->user()->row();
            $data = array(
                'no' => '1',
                'namelogin' => $data_users->username,
                'maillogin' => $this->session->userdata("email"),
                'site_title' => $data_setting[0]['title'] . "- List Subscribe",
                'subscribe' => $this->blog_model->get_subscribe("order by id_subscribe desc")->result_array(),
            );
            $this->load->view('admincms/head', $data);
            $this->load->view('admincms/navbar');
            $this->load->view('admincms/sidebar');
            $this->load->view('admincms/subscribe');
            $this->load->view('admincms/footer');
        }
    }

    function editsubscribe($code = 0) {
        if (!$this->ion_auth->logged_in() || !$this->ion_auth->is_admin()) {
            redirect('admincms/login', 'refresh');
            $this->session->set_flashdata('message', 'You must be an administrator to view this page.');
        } else {
            $this->data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');
            $data_setting = $this->blog_model->get_setting()->result_array();
            $temp = $this->blog_model->get_subscribe("where id_subscribe = '$code'")->result_array();
            $data_users = $this->ion_auth->user()->row();
            $data = array(
                'namelogin' => $data_users->username,
                'maillogin' => $this->session->userdata("email"),
                'no' => '1',
                'site_title' => $data_setting[0]['title'] . "- Edit Subscribe",
                'status' => $temp[0]['status'],
                'email' => $temp[0]['email'],
                'name' => $temp[0]['name'],
                'id_subscribe' => $temp[0]['id_subscribe'],
                'subscribe' => $this->blog_model->get_subscribe("where id_subscribe != '$code' order by id_subscribe desc")->result_array()
            );
            $this->load->view('admincms/head', $data);
            $this->load->view('admincms/navbar');
            $this->load->view('admincms/sidebar');
            $this->load->view('admincms/subscribe-edit');
            $this->load->view('admincms/footer');
        }
    }

    /* ===== Viewcontact ===== */

    function Viewcontact($code = 0) {
        if (!$this->ion_auth->logged_in() || !$this->ion_auth->is_admin()) {
            redirect('admincms/login', 'refresh');
            $this->session->set_flashdata('message', 'You must be an administrator to view this page.');
        } else {
            $this->data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');
            $data_setting = $this->blog_model->get_setting()->result_array();
            $temp = $this->blog_model->get_contact("where id_contact = '$code'")->result_array();
            $data_users = $this->ion_auth->user()->row();
            $data = array(
                'namelogin' => $data_users->username,
                'maillogin' => $this->session->userdata("email"),
                'no' => '1',
                'site_title' => $data_setting[0]['title'] . "- Read Contact",
                'contact' => $temp
            );
            $this->load->view('admincms/head', $data);
            $this->load->view('admincms/navbar');
            $this->load->view('admincms/sidebar');
            $this->load->view('admincms/contact-view');
            $this->load->view('admincms/footer');
        }
    }

    /* ===== Rekening online ===== */

    function rekening() {
        if (!$this->ion_auth->logged_in() || !$this->ion_auth->is_admin()) {
            redirect('admincms/login', 'refresh');
            $this->session->set_flashdata('message', 'You must be an administrator to view this page.');
        } else {
            $this->data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');
            $data_setting = $this->blog_model->get_setting()->result_array();
            $data_users = $this->ion_auth->user()->row();
            $data = array(
                'no' => '1',
                'namelogin' => $data_users->username,
                'maillogin' => $this->session->userdata("email"),
                'site_title' => $data_setting[0]['title'] . "- List Contact",
                'contact' => $this->blog_model->get_registrasi_online("order by id_data desc")->result_array(),
            );
            $this->load->view('admincms/head', $data);
            $this->load->view('admincms/navbar');
            $this->load->view('admincms/sidebar');
            $this->load->view('admincms/rekeningonline');
            $this->load->view('admincms/footer');
        }
    }

    /* ===== Rekening online ===== */

    function viewrekonline($code = 0) {
        if (!$this->ion_auth->logged_in() || !$this->ion_auth->is_admin()) {
            redirect('admincms/login', 'refresh');
            $this->session->set_flashdata('message', 'You must be an administrator to view this page.');
        } else {
            $this->data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');
            $data_setting = $this->blog_model->get_setting()->result_array();
            $temp = $this->blog_model->get_registrasi_online("where id_data = '$code'")->result_array();
            $data_users = $this->ion_auth->user()->row();
            $data = array(
                'namelogin' => $data_users->username,
                'maillogin' => $this->session->userdata("email"),
                'no' => '1',
                'site_title' => $data_setting[0]['title'] . "- Read Contact",
                'contact' => $temp
            );
            $this->load->view('admincms/head', $data);
            $this->load->view('admincms/navbar');
            $this->load->view('admincms/sidebar');
            $this->load->view('admincms/rekening-view');
            $this->load->view('admincms/footer');
        }
    }

    /* ===== Users ===== */

    function Users() {
        if (!$this->ion_auth->logged_in() || !$this->ion_auth->is_admin()) {
            redirect('admincms/login', 'refresh');
            $this->session->set_flashdata('message', 'You must be an administrator to view this page.');
        } else {
            $this->data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');
            $data_setting = $this->blog_model->get_setting()->result_array();
            $this->data['users'] = $this->ion_auth->users()->result();
            $data_users = $this->ion_auth->user()->row();
            foreach ($this->data['users'] as $k => $user) {
                $this->data['users'][$k]->groups = $this->ion_auth->get_users_groups($user->id)->result();
            }
            $this->data['no'] = 1;
            $this->data['title'] = $data_setting[0]['title'] . "- List Users";
            $this->data['namelogin'] = $this->session->userdata("email");

            $this->_render_page('admincms/head', $this->data);
            $this->load->view('admincms/navbar');
            $this->load->view('admincms/sidebar');
            $this->load->view('admincms/user');
            $this->load->view('admincms/footer');
        }
    }

    /* ===== Statistik post ===== */

    function Statistikpost() {
        if (!$this->ion_auth->logged_in() || !$this->ion_auth->is_admin()) {
            redirect('admincms/login', 'refresh');
            $this->session->set_flashdata('message', 'You must be an administrator to view this page.');
        } else {
            $this->data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');
            $data = array(
                'post' => $this->blog_model->get_post("where active = 'Y order by counter")->result_array(),
                'session' => $this->session->userdata('loginadmin'),
                'title' => 'Statistik'
            );
            $this->load->view('admincms/statistik_post', $data);
        }
    }



   /* ===== Slider ===== */

    public function slider() {
        if (!$this->ion_auth->logged_in() || !$this->ion_auth->is_admin()) {
            redirect('admincms/login', 'refresh');
            $this->session->set_flashdata('message', 'You must be an administrator to view this page.');
        } else {
            $this->data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');
            $data_setting = $this->blog_model->get_setting()->result_array();
            $data_users = $this->ion_auth->user()->row();
            $data = array(
                'namelogin' => $data_users->username,
                'maillogin' => $this->session->userdata("email"),
                'site_title' => $data_setting[0]['title'] . " - Slider",
                'content' => $this->blog_model->get_slider('where status="Y" ')->result_array()
            );
            $this->load->view('admincms/head', $data);
            $this->load->view('admincms/navbar');
            $this->load->view('admincms/sidebar');
            $this->load->view('admincms/sliderlist');
            $this->load->view('admincms/footer');
        }
    }

    function slideradd(){

        if (!$this->ion_auth->logged_in() || !$this->ion_auth->is_admin()) {
            redirect('admincms/login', 'refresh');
            $this->session->set_flashdata('message', 'You must be an administrator to view this page.');
        } else {
            $this->form_validation->set_rules('image', 'image','required');
            $this->form_validation->set_rules('status', 'status'); 

            if ($this->form_validation->run() == FALSE) {
                $this->data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');
                $data_setting = $this->blog_model->get_setting()->result_array(); 
                $data_users = $this->ion_auth->user()->row();
                $data = array(
                    'site_title' => $data_setting[0]['title'] . " - Slider", 
                    'namelogin' => $data_users->username, 
                    'id' => "",
                    'image' => "", 
                    'status' => "",
                    'formaction' => base_url('admincms/slideradd')
                );
                $this->load->view('admincms/head', $data);
                $this->load->view('admincms/navbar', $data);
                $this->load->view('admincms/sidebar', $data);
                $this->load->view('admincms/slider', $data);
                $this->load->view('admincms/footer', $data);
            } else {
                $id = $this->input->post('id');
                $data = array(
                    'date' => date("Y-m-d H:i:s"), 
                    'image' => $this->input->post('image'),                 
                    'status' => $this->input->post('status')
                );
                                            
                if ($this->blog_model->insert_data('slider',$data)) {
                    $this->session->set_flashdata('msg', '<div class="alert alert-success text-center alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>Success!</div>');
                    header('location:' . base_url() . "admincms/slider");
                } else {
                    $this->session->set_flashdata('msg', '<div class="alert alert-danger text-center alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>Oops! Error.  Please try again later!!!</div>');
                    header('location:' . base_url() . "admincms/slider");
                }
            }
        }        
    }

    function slideredit($code=0){
        if (!$this->ion_auth->logged_in() || !$this->ion_auth->is_admin()) {
            redirect('admincms/login', 'refresh');
            $this->session->set_flashdata('message', 'You must be an administrator to view this page.');
        } else {
            $this->form_validation->set_rules('image', 'image','required' );
            $this->form_validation->set_rules('status', 'status');
            $data_users = $this->ion_auth->user()->row();
            if ($this->form_validation->run() == FALSE) {
                $this->data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');
                $data_setting = $this->blog_model->get_setting()->result_array();
                $data_post = $this->blog_model->get_slider("where id = '$code'")->result_array();
                $data_users = $this->ion_auth->user()->row();
                $data = array(              
                    'site_title' => $data_setting[0]['title'] . " - Edit Slider", 
                    'namelogin' => $data_users->username,
                    'id' => $data_post[0]['id'],
                    'image' => $data_post[0]['image'],
                    'status' => $data_post[0]['status'],
                    'formaction' => base_url('admincms/slideredit')
                );
                $this->load->view('admincms/head', $data);
                $this->load->view('admincms/navbar', $data);
                $this->load->view('admincms/sidebar', $data);
                $this->load->view('admincms/slider', $data);
                $this->load->view('admincms/footer', $data);
            } else {
                $id = $this->input->post('id');
                $data = array(
                    'id' => $this->input->post('id'),
                    'image' => $this->input->post('image'),
                    'status' => $this->input->post('status')
                );            

                if ($this->blog_model->update_post('slider', $data, array('id' => $id))) {
                    $this->session->set_flashdata('msg', '<div class="alert alert-success text-center alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>Success!</div>');
                    header('location:' . base_url() . "admincms/slider");
                } else {
                    $this->session->set_flashdata('msg', '<div class="alert alert-danger text-center alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>Oops! Error.  Please try again later!!!</div>');
                    header('location:' . base_url() . "admincms/slider");
                }
            }
        }        
    }

    /* ===== Statistik visitor ===== */

    function Statistikvisitor() {
        if (!$this->ion_auth->logged_in() || !$this->ion_auth->is_admin()) {
            redirect('admincms/login', 'refresh');
            $this->session->set_flashdata('message', 'You must be an administrator to view this page.');
        } else {
            $this->data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');
            //page view hari ini, kemarin, bulan ini dan sepanjang waktu
            //visitor OS, browser, lokasi
            $tanggal_wingi = date("d");
            $view_stat = array(
                'day' => $this->blog_model->get_visitor("where SUBSTRING(tanggal,1,10) = '" . date("Y-m-d") . "'")->num_rows(),
                'yesterday' => $this->blog_model->get_visitor("where SUBSTRING(tanggal,1,10) = '" . date("Y-m-d", strtotime("yesterday")) . "'")->num_rows(),
                'mounth' => $this->blog_model->get_visitor("where SUBSTRING(tanggal,1,7) = '" . date("Y-m") . "'")->num_rows(),
                'year' => $this->blog_model->get_visitor("where SUBSTRING(tanggal,1,4) = '" . date("Y") . "'")->num_rows(),
                'sepanjang_waktu' => $this->blog_model->get_visitor()->num_rows(),
            );
            $data = array(
                'session' => $this->session->userdata('loginadmin'),
                'post' => $this->blog_model->get_post("where active = 'Y order by counter desc limit 5")->result_array(),
                'visitor' => $view_stat,
                'title' => 'Dasboard admin - statistik'
            );
            $this->load->view('admincms/statistik_visitor', $data);
        }
    }

    /* ===== Setting ===== */

    function Setting() {
        if (!$this->ion_auth->logged_in() || !$this->ion_auth->is_admin()) {
            redirect('admincms/login', 'refresh');
            $this->session->set_flashdata('message', 'You must be an administrator to view this page.');
        } else {
            $this->data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');
            $data_setting = $this->blog_model->get_setting()->result_array();
            $data_users = $this->ion_auth->user()->row();
            $data = array(
                'namelogin' => $data_users->username,
                'maillogin' => $this->session->userdata("email"),
                'site_title' => $data_setting[0]['title'] . "- Setting",
                'setting' => $this->blog_model->get_setting()->result_array()
            );
            $this->load->view('admincms/head', $data);
            $this->load->view('admincms/navbar', $data);
            $this->load->view('admincms/sidebar', $data);
            $this->load->view('admincms/setting', $data);
            $this->load->view('admincms/footer', $data);
        }
    }

    // log the user out
    public function logout() {
        $this->data['title'] = "Logout";
        $logout = $this->ion_auth->logout();
        $this->session->set_flashdata('message', $this->ion_auth->messages());
        redirect('./', 'refresh');
    }

    // change password
    public function change_password() {
        $this->form_validation->set_rules('old', $this->lang->line('change_password_validation_old_password_label'), 'required');
        $this->form_validation->set_rules('new', $this->lang->line('change_password_validation_new_password_label'), 'required|min_length[' . $this->config->item('min_password_length', 'ion_auth') . ']|max_length[' . $this->config->item('max_password_length', 'ion_auth') . ']|matches[new_confirm]');
        $this->form_validation->set_rules('new_confirm', $this->lang->line('change_password_validation_new_password_confirm_label'), 'required');

        if (!$this->ion_auth->logged_in()) {
            redirect('admincms/login', 'refresh');
        }
        $user = $this->ion_auth->user()->row();
        if ($this->form_validation->run() == false) {
            // display the form
            // set the flash data error message if there is one
            $this->data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');

            $this->data['min_password_length'] = $this->config->item('min_password_length', 'ion_auth');
            $this->data['old_password'] = array(
                'name' => 'old',
                'id' => 'old',
                'type' => 'password',
            );
            $this->data['new_password'] = array(
                'name' => 'new',
                'id' => 'new',
                'type' => 'password',
                'pattern' => '^.{' . $this->data['min_password_length'] . '}.*$',
            );
            $this->data['new_password_confirm'] = array(
                'name' => 'new_confirm',
                'id' => 'new_confirm',
                'type' => 'password',
                'pattern' => '^.{' . $this->data['min_password_length'] . '}.*$',
            );
            $this->data['user_id'] = array(
                'name' => 'user_id',
                'id' => 'user_id',
                'type' => 'hidden',
                'value' => $user->id,
            );

            // render
            $this->_render_page('admincms/change_password', $this->data);
        } else {
            $identity = $this->session->userdata('identity');
            $change = $this->ion_auth->change_password($identity, $this->input->post('old'), $this->input->post('new'));

            if ($change) {
                //if the password was successfully changed
                $this->session->set_flashdata('message', $this->ion_auth->messages());
                $this->logout();
            } else {
                $this->session->set_flashdata('message', $this->ion_auth->errors());
                redirect('admincms/change_password', 'refresh');
            }
        }
    }

    // forgot password
    public function forgotpassword() {
        $this->data['title'] = "Forgot Password";
        // setting validation rules by checking whether identity is username or email
        if ($this->config->item('identity', 'ion_auth') != 'email') {
            $this->form_validation->set_rules('identity', $this->lang->line('forgot_password_identity_label'), 'required');
        } else {
            $this->form_validation->set_rules('identity', $this->lang->line('forgot_password_validation_email_label'), 'required|valid_email');
        }

        if ($this->form_validation->run() == false) {

            $this->data['type'] = $this->config->item('identity', 'ion_auth');
            // setup the input
            $this->data['identity'] = array('name' => 'identity',
                'id' => 'identity',
            );

            if ($this->config->item('identity', 'ion_auth') != 'email') {
                $this->data['identity_label'] = $this->lang->line('forgot_password_identity_label');
            } else {
                $this->data['identity_label'] = $this->lang->line('forgot_password_email_identity_label');
            }

            // set any errors and display the form
            $this->data['message'] = '<div class="alert alert-warning">' . (validation_errors()) ? validation_errors() : $this->session->flashdata('message') . '</div>';

            $this->_render_page('admincms/forgotpassword', $this->data);
        } else {
            $identity_column = $this->config->item('identity', 'ion_auth');
            $identity = $this->ion_auth->where($identity_column, $this->input->post('identity'))->users()->row();

            if (empty($identity)) {

                if ($this->config->item('identity', 'ion_auth') != 'email') {
                    $this->ion_auth->set_error('forgot_password_identity_not_found');
                } else {
                    $this->ion_auth->set_error('forgot_password_email_not_found');
                }
                //$this->session->set_flashdata('message', $this->ion_auth->errors());
                $this->session->set_flashdata('message', '<div class="alert alert-info">' . $this->ion_auth->errors() . '</div>');
                redirect("admincms/forgotpassword", 'refresh');
            }

            // run the forgotten password method to email an activation code to the user
            $forgotten = $this->ion_auth->forgotten_password($identity->{$this->config->item('identity', 'ion_auth')});

            if ($forgotten) {
                // if there were no errors
                //$this->session->set_flashdata('message', $this->ion_auth->messages());
                $this->session->set_flashdata('message', '<div class="alert alert-warning">' . $this->ion_auth->messages() . '</div>');
                redirect("admincms/login", 'refresh'); //we should display a confirmation page here instead of the login page
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-warning">' . $this->ion_auth->errors() . '</div>');
                redirect("admincms/forgotpassword", 'refresh');
            }
        }
    }

    // reset password - final step for forgotten password
    public function resetpassword($code = NULL) {
        if (!$code) {
            show_404();
        }

        $user = $this->ion_auth->forgotten_password_check($code);

        if ($user) {
            $this->form_validation->set_rules('new', $this->lang->line('reset_password_validation_new_password_label'), 'required|min_length[' . $this->config->item('min_password_length', 'ion_auth') . ']|max_length[' . $this->config->item('max_password_length', 'ion_auth') . ']|matches[new_confirm]');
            $this->form_validation->set_rules('new_confirm', $this->lang->line('reset_password_validation_new_password_confirm_label'), 'required');

            if ($this->form_validation->run() == false) {
                // display the form
                // set the flash data error message if there is one
                $this->data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');

                $this->data['min_password_length'] = $this->config->item('min_password_length', 'ion_auth');
                $this->data['new_password'] = array(
                    'name' => 'new',
                    'id' => 'new',
                    'type' => 'password',
                    'pattern' => '^.{' . $this->data['min_password_length'] . '}.*$',
                );
                $this->data['new_password_confirm'] = array(
                    'name' => 'new_confirm',
                    'id' => 'new_confirm',
                    'type' => 'password',
                    'pattern' => '^.{' . $this->data['min_password_length'] . '}.*$',
                );
                $this->data['user_id'] = array(
                    'name' => 'user_id',
                    'id' => 'user_id',
                    'type' => 'hidden',
                    'value' => $user->id,
                );
                $this->data['csrf'] = $this->_get_csrf_nonce();
                $this->data['code'] = $code;

                // render
                $this->_render_page('admincms/resetpassword', $this->data);
            } else {
                // do we have a valid request?
                if ($this->_valid_csrf_nonce() === FALSE || $user->id != $this->input->post('user_id')) {
                    // something fishy might be up
                    $this->ion_auth->clear_forgotten_password_code($code);
                    show_error($this->lang->line('error_csrf'));
                } else {
                    // finally change the password
                    $identity = $user->{$this->config->item('identity', 'ion_auth')};

                    $change = $this->ion_auth->reset_password($identity, $this->input->post('new'));

                    if ($change) {
                        // if the password was successfully changed
                        $this->session->set_flashdata('message', $this->ion_auth->messages());
                        redirect("admincms/login", 'refresh');
                    } else {
                        $this->session->set_flashdata('message', $this->ion_auth->errors());
                        redirect('admincms/resetpassword/' . $code, 'refresh');
                    }
                }
            }
        } else {
            // if the code is invalid then send them back to the forgot password page
            $this->session->set_flashdata('message', $this->ion_auth->errors());
            redirect("admincms/resetpassword", 'refresh');
        }
    }

    // activate the user
    public function activate($id, $code = false) {
        if ($code !== false) {
            $activation = $this->ion_auth->activate($id, $code);
        } else if ($this->ion_auth->is_admin()) {
            $activation = $this->ion_auth->activate($id);
        }

        if ($activation) {
            // redirect them to the auth page
            $this->session->set_flashdata('message', $this->ion_auth->messages());
            redirect("auth", 'refresh');
        } else {
            // redirect them to the forgot password page
            $this->session->set_flashdata('message', $this->ion_auth->errors());
            redirect("admincms/forgot_password", 'refresh');
        }
    }

    // deactivate the user
    public function deactivate($id = NULL) {
        if (!$this->ion_auth->logged_in() || !$this->ion_auth->is_admin()) {
            // redirect them to the home page because they must be an administrator to view this
            return show_error('You must be an administrator to view this page.');
        }
        $this->data['title'] = 'DEACTIVATE';
        $this->data['namelogin'] = $this->session->userdata("email");

        $id = (int) $id;
        $this->load->library('form_validation');
        $this->form_validation->set_rules('confirm', $this->lang->line('deactivate_validation_confirm_label'), 'required');
        $this->form_validation->set_rules('id', $this->lang->line('deactivate_validation_user_id_label'), 'required|alpha_numeric');

        if ($this->form_validation->run() == FALSE) {
            // insert csrf check
            $this->data['csrf'] = $this->_get_csrf_nonce();
            $this->data['user'] = $this->ion_auth->user($id)->row();

            $this->_render_page('admincms/head', $this->data);
            $this->load->view('admincms/navbar');
            $this->load->view('admincms/sidebar');
            $this->load->view('admincms/user-deactive');
            $this->load->view('admincms/footer');
        } else {
            // do we really want to deactivate?
            if ($this->input->post('confirm') == 'yes') {
                // do we have a valid request?
                if ($this->_valid_csrf_nonce() === FALSE || $id != $this->input->post('id')) {
                    show_error($this->lang->line('error_csrf'));
                }

                // do we have the right userlevel?
                if ($this->ion_auth->logged_in() && $this->ion_auth->is_admin()) {
                    $this->ion_auth->deactivate($id);
                }
            }
            // redirect them back to the auth page
            redirect('admincms/users', 'refresh');
        }
    }

    // create a new user
    public function createuser() {
        $this->data['title'] = $this->lang->line('create_user_heading');
        $this->data['namelogin'] = $this->session->userdata("email");

        if (!$this->ion_auth->logged_in() || !$this->ion_auth->is_admin()) {
            redirect('admincms', 'refresh');
        }

        $tables = $this->config->item('tables', 'ion_auth');
        $identity_column = $this->config->item('identity', 'ion_auth');
        $this->data['identity_column'] = $identity_column;

        // validate form input
        $this->form_validation->set_rules('first_name', $this->lang->line('create_user_validation_fname_label'), 'required');
        $this->form_validation->set_rules('last_name', $this->lang->line('create_user_validation_lname_label'), 'required');
        if ($identity_column !== 'email') {
            $this->form_validation->set_rules('identity', $this->lang->line('create_user_validation_identity_label'), 'required|is_unique[' . $tables['users'] . '.' . $identity_column . ']');
            $this->form_validation->set_rules('email', $this->lang->line('create_user_validation_email_label'), 'required|valid_email');
        } else {
            $this->form_validation->set_rules('email', $this->lang->line('create_user_validation_email_label'), 'required|valid_email|is_unique[' . $tables['users'] . '.email]');
        }
        $this->form_validation->set_rules('phone', $this->lang->line('create_user_validation_phone_label'), 'trim');
        $this->form_validation->set_rules('company', $this->lang->line('create_user_validation_company_label'), 'trim');
        $this->form_validation->set_rules('password', $this->lang->line('create_user_validation_password_label'), 'required|min_length[' . $this->config->item('min_password_length', 'ion_auth') . ']|max_length[' . $this->config->item('max_password_length', 'ion_auth') . ']|matches[password_confirm]');
        $this->form_validation->set_rules('password_confirm', $this->lang->line('create_user_validation_password_confirm_label'), 'required');

        if ($this->form_validation->run() == true) {
            $email = strtolower($this->input->post('email'));
            $identity = ($identity_column === 'email') ? $email : $this->input->post('identity');
            $password = $this->input->post('password');

            $additional_data = array(
                'first_name' => $this->input->post('first_name'),
                'last_name' => $this->input->post('last_name'),
                'company' => $this->input->post('company'),
                'phone' => $this->input->post('phone'),
            );
        }
        if ($this->form_validation->run() == true && $this->ion_auth->register($identity, $password, $email, $additional_data)) {
            // check to see if we are creating the user
            // redirect them back to the admin page
            $this->session->set_flashdata('message', $this->ion_auth->messages());
            redirect("admincms/users", 'refresh');
        } else {
            // display the create user form
            // set the flash data error message if there is one
            $this->data['message'] = (validation_errors() ? validation_errors() : ($this->ion_auth->errors() ? $this->ion_auth->errors() : $this->session->flashdata('message')));

            $this->data['first_name'] = array(
                'name' => 'first_name',
                'id' => 'first_name',
                'type' => 'text',
                'class' => 'form-control',
                'value' => $this->form_validation->set_value('first_name'),
            );
            $this->data['last_name'] = array(
                'name' => 'last_name',
                'id' => 'last_name',
                'type' => 'text',
                'class' => 'form-control',
                'value' => $this->form_validation->set_value('last_name'),
            );
            $this->data['identity'] = array(
                'name' => 'identity',
                'id' => 'identity',
                'type' => 'text',
                'class' => 'form-control',
                'value' => $this->form_validation->set_value('identity'),
            );
            $this->data['email'] = array(
                'name' => 'email',
                'id' => 'email',
                'type' => 'text',
                'class' => 'form-control',
                'value' => $this->form_validation->set_value('email'),
            );
            $this->data['company'] = array(
                'name' => 'company',
                'id' => 'company',
                'type' => 'text',
                'class' => 'form-control',
                'value' => $this->form_validation->set_value('company'),
            );
            $this->data['phone'] = array(
                'name' => 'phone',
                'id' => 'phone',
                'type' => 'text',
                'class' => 'form-control',
                'value' => $this->form_validation->set_value('phone'),
            );
            $this->data['password'] = array(
                'name' => 'password',
                'id' => 'password',
                'type' => 'password',
                'class' => 'form-control',
                'value' => $this->form_validation->set_value('password'),
            );
            $this->data['password_confirm'] = array(
                'name' => 'password_confirm',
                'id' => 'password_confirm',
                'type' => 'password',
                'class' => 'form-control',
                'value' => $this->form_validation->set_value('password_confirm'),
            );

            $this->_render_page('admincms/head', $this->data);
            $this->load->view('admincms/navbar');
            $this->load->view('admincms/sidebar');
            $this->load->view('admincms/user-create');
            $this->load->view('admincms/footer');
        }
    }

    // edit a user
    public function edituser($id = NULL) {

        $this->data['title'] = 'Edit User';
        $this->data['namelogin'] = $this->session->userdata("email");

        if (!$this->ion_auth->logged_in() || (!$this->ion_auth->is_admin() && !($this->ion_auth->user()->row()->id == $id))) {
            redirect('admincms', 'refresh');
        }

        $id = $this->input->post('id') ? $this->input->post('id') : $id;
        $user = $this->ion_auth->user($id)->row();
        $groups = $this->ion_auth->groups()->result_array();
        $currentGroups = $this->ion_auth->get_users_groups($id)->result();

        // validate form input
        $this->form_validation->set_rules('first_name', $this->lang->line('edit_user_validation_fname_label'), 'required');
        $this->form_validation->set_rules('last_name', $this->lang->line('edit_user_validation_lname_label'), 'required');
        $this->form_validation->set_rules('phone', $this->lang->line('edit_user_validation_phone_label'), 'required');
        $this->form_validation->set_rules('company', $this->lang->line('edit_user_validation_company_label'), 'required');

        if (isset($_POST) && !empty($_POST)) {
            // do we have a valid request?
            if ($this->_valid_csrf_nonce() === FALSE || $id != $this->input->post('id')) {
                show_error($this->lang->line('error_csrf'));
            }
            // update the password if it was posted
            if ($this->input->post('password')) {
                $this->form_validation->set_rules('password', $this->lang->line('edit_user_validation_password_label'), 'required|min_length[' . $this->config->item('min_password_length', 'ion_auth') . ']|max_length[' . $this->config->item('max_password_length', 'ion_auth') . ']|matches[password_confirm]');
                $this->form_validation->set_rules('password_confirm', $this->lang->line('edit_user_validation_password_confirm_label'), 'required');
            }

            if ($this->form_validation->run() === TRUE) {
                $data = array(
                    'first_name' => $this->input->post('first_name'),
                    'last_name' => $this->input->post('last_name'),
                    'company' => $this->input->post('company'),
                    'phone' => $this->input->post('phone'),
                );

                // update the password if it was posted
                if ($this->input->post('password')) {
                    $data['password'] = $this->input->post('password');
                }
                // Only allow updating groups if user is admin
                if ($this->ion_auth->is_admin()) {
                    //Update the groups user belongs to
                    $groupData = $this->input->post('groups');

                    if (isset($groupData) && !empty($groupData)) {

                        $this->ion_auth->remove_from_group('', $id);

                        foreach ($groupData as $grp) {
                            $this->ion_auth->add_to_group($grp, $id);
                        }
                    }
                }

                // check to see if we are updating the user
                if ($this->ion_auth->update($user->id, $data)) {
                    // redirect them back to the admin page if admin, or to the base url if non admin
                    $this->session->set_flashdata('message', $this->ion_auth->messages());
                    if ($this->ion_auth->is_admin()) {
                        redirect('admincms/users', 'refresh');
                    } else {
                        redirect('admincms/users', 'refresh');
                    }
                } else {
                    // redirect them back to the admin page if admin, or to the base url if non admin
                    $this->session->set_flashdata('message', $this->ion_auth->errors());
                    if ($this->ion_auth->is_admin()) {
                        redirect('admincms/users', 'refresh');
                    } else {
                        redirect('admincms/users', 'refresh');
                    }
                }
            }
        }

        // display the edit user form
        $this->data['csrf'] = $this->_get_csrf_nonce();
        // set the flash data error message if there is one
        $this->data['message'] = (validation_errors() ? validation_errors() : ($this->ion_auth->errors() ? $this->ion_auth->errors() : $this->session->flashdata('message')));
        // pass the user to the view
        $this->data['user'] = $user;
        $this->data['groups'] = $groups;
        $this->data['currentGroups'] = $currentGroups;

        $this->data['first_name'] = array(
            'name' => 'first_name',
            'id' => 'first_name',
            'type' => 'text',
            'class' => 'form-control',
            'value' => $this->form_validation->set_value('first_name', $user->first_name),
        );
        $this->data['last_name'] = array(
            'name' => 'last_name',
            'id' => 'last_name',
            'type' => 'text',
            'class' => 'form-control',
            'value' => $this->form_validation->set_value('last_name', $user->last_name),
        );
        $this->data['company'] = array(
            'name' => 'company',
            'id' => 'company',
            'type' => 'text',
            'class' => 'form-control',
            'value' => $this->form_validation->set_value('company', $user->company),
        );
        $this->data['phone'] = array(
            'name' => 'phone',
            'id' => 'phone',
            'type' => 'text',
            'class' => 'form-control',
            'value' => $this->form_validation->set_value('phone', $user->phone),
        );
        $this->data['password'] = array(
            'name' => 'password',
            'id' => 'password',
            'class' => 'form-control',
            'type' => 'password'
        );
        $this->data['password_confirm'] = array(
            'name' => 'password_confirm',
            'id' => 'password_confirm',
            'class' => 'form-control',
            'type' => 'password'
        );
        $this->_render_page('admincms/head', $this->data);
        $this->load->view('admincms/navbar');
        $this->load->view('admincms/sidebar');
        $this->load->view('admincms/user-edit');
        $this->load->view('admincms/footer');
    }

    // create a new group
    public function creategroup() {
        $this->data['title'] = $this->lang->line('create_group_title');
        $this->data['namelogin'] = $this->session->userdata("email");
        if (!$this->ion_auth->logged_in() || !$this->ion_auth->is_admin()) {
            redirect('admincms', 'refresh');
        }
        // validate form input
        $this->form_validation->set_rules('group_name', $this->lang->line('create_group_validation_name_label'), 'required|alpha_dash');
        if ($this->form_validation->run() == TRUE) {
            $new_group_id = $this->ion_auth->create_group($this->input->post('group_name'), $this->input->post('description'));
            if ($new_group_id) {
                $this->session->set_flashdata('message', '<div class="alert alert-success text-center">' . $this->ion_auth->messages() . '</div>');
                redirect("admincms/creategroup", 'refresh');
            }
        } else {
            $this->data['message'] = (validation_errors() ? validation_errors() : ($this->ion_auth->errors() ? $this->ion_auth->errors() : $this->session->flashdata('message')));
            $this->data['group_name'] = array(
                'name' => 'group_name',
                'id' => 'group_name',
                'type' => 'text',
                'class' => 'form-control',
                'value' => $this->form_validation->set_value('group_name'),
            );
            $this->data['description'] = array(
                'name' => 'description',
                'id' => 'description',
                'type' => 'text',
                'class' => 'form-control',
                'value' => $this->form_validation->set_value('description'),
            );
            $this->_render_page('admincms/head', $this->data);
            $this->load->view('admincms/navbar');
            $this->load->view('admincms/sidebar');
            $this->load->view('admincms/group-create');
            $this->load->view('admincms/footer');
        }
    }

    /* ===== Group ===== */

    function grouplist() {
        if (!$this->ion_auth->logged_in() || !$this->ion_auth->is_admin()) {
            redirect('admincms/login', 'refresh');
            $this->session->set_flashdata('message', 'You must be an administrator to view this page.');
        } else {
            $this->data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');
            $data_setting = $this->blog_model->get_setting()->result_array();
            $data_users = $this->ion_auth->user()->row();
            $data = array(
                'no' => '1',
                'namelogin' => $data_users->username,
                'maillogin' => $this->session->userdata("email"),
                'site_title' => $data_setting[0]['title'],
                'groups' => $this->ion_auth->groups()->result_array()
            );
            $this->load->view('admincms/head', $data);
            $this->load->view('admincms/navbar');
            $this->load->view('admincms/sidebar');
            $this->load->view('admincms/group-list');
            $this->load->view('admincms/footer');
        }
    }

    // edit a group
    public function editgroup($id) {

        $this->data['title'] = $this->lang->line('edit_group_title');
        $this->data['namelogin'] = $this->session->userdata("email");
        // bail if no group id given
        if (!$id || empty($id)) {
            redirect('admin', 'refresh');
        }
        if (!$this->ion_auth->logged_in() || !$this->ion_auth->is_admin()) {
            redirect('admincms', 'refresh');
        }
        $group = $this->ion_auth->group($id)->row();
        // validate form input
        $this->form_validation->set_rules('group_name', $this->lang->line('edit_group_validation_name_label'), 'required|alpha_dash');
        if (isset($_POST) && !empty($_POST)) {
            if ($this->form_validation->run() === TRUE) {
                $group_update = $this->ion_auth->update_group($id, $_POST['group_name'], $_POST['group_description']);
                if ($group_update) {
                    $this->session->set_flashdata('message', $this->lang->line('edit_group_saved'));
                } else {
                    $this->session->set_flashdata('message', $this->ion_auth->errors());
                }
                redirect("admincms/users", 'refresh');
            }
        }

        // set the flash data error message if there is one
        $this->data['message'] = (validation_errors() ? validation_errors() : ($this->ion_auth->errors() ? $this->ion_auth->errors() : $this->session->flashdata('message')));

        // pass the user to the view
        $this->data['group'] = $group;

        $readonly = $this->config->item('admin_group', 'ion_auth') === $group->name ? 'readonly' : '';

        $this->data['group_name'] = array(
            'name' => 'group_name',
            'id' => 'group_name',
            'type' => 'text',
            'class' => 'form-control',
            'value' => $this->form_validation->set_value('group_name', $group->name),
            $readonly => $readonly,
        );
        $this->data['group_description'] = array(
            'name' => 'group_description',
            'id' => 'group_description',
            'type' => 'text',
            'class' => 'form-control',
            'value' => $this->form_validation->set_value('group_description', $group->description),
        );
        $this->_render_page('admincms/head', $this->data);
        $this->load->view('admincms/navbar');
        $this->load->view('admincms/sidebar');
        $this->load->view('admincms/group-edit');
        $this->load->view('admincms/footer');
    }

    public function deleteuser($user_id = NULL) {
        if (is_null($user_id)) {
            $this->session->set_flashdata('message', 'There\'s no user to delete');
        } else {
            $this->ion_auth->delete_user($user_id);
            $this->session->set_flashdata('message', $this->ion_auth->messages());
        }
        redirect('admincms/users', 'refresh');
    }

    public function deletegroup($group_id = NULL) {
        if (is_null($group_id)) {
            $this->session->set_flashdata('message', 'There\'s no user to delete');
        } else {
            $this->ion_auth->delete_group($group_id);
            $this->session->set_flashdata('message', $this->ion_auth->messages());
        }
        redirect('admincms/users', 'refresh');
    }

    /* ===== menus ===== */

    function menus() {
        if (!$this->ion_auth->logged_in() || !$this->ion_auth->is_admin()) {
            redirect('admincms/login', 'refresh');
            $this->session->set_flashdata('message', 'You must be an administrator to view this page.');
        } else {
            $this->data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');
            $data_setting = $this->blog_model->get_setting()->result_array();
            $data_users = $this->ion_auth->user()->row();
            $menu = $this->blog_model->get_data_menu()->result_array();
            $menukey[0] = "";
            foreach ($menu as $key => $val) {
                $menukey[$val['id_menu']] = $val['ind_name'];
            }
            $data = array(
                'namelogin' => $data_users->username,
                'maillogin' => $this->session->userdata("email"),
                'site_title' => $data_setting[0]['title'] . "- Menu",
                'labeltitle' => 'Tambah Menu',
                'label' => $menu,
                'menukey' => $menukey
            );
            $this->load->view('admincms/head', $data);
            $this->load->view('admincms/navbar');
            $this->load->view('admincms/sidebar');
            $this->load->view('admincms/menus');
            $this->load->view('admincms/footer');
        }
    }

    function createmenu() {
        if (!$this->ion_auth->logged_in() || !$this->ion_auth->is_admin()) {
            redirect('admincms/login', 'refresh');
            $this->session->set_flashdata('message', 'You must be an administrator to view this page.');
        } else {
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                $data['ind_name'] = $this->input->post('ind_name');
                $data['eng_name'] = $this->input->post('eng_name');
                $data['menu_link'] = $this->input->post('menu_link');
                $data['parent_menu'] = $this->input->post('parent_menu');
                $data['status'] = $this->input->post('status');

                $result = $this->blog_model->insert_data('menus', $data);
                if ($result) {
                    redirect('admincms/menus', 'refresh');
                    $this->session->set_flashdata('message', 'Save Success');
                } else {
                    redirect('admincms/menus', 'refresh');
                    $this->session->set_flashdata('message', 'Failed');
                }
            } else {
                $this->data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');
                $data_setting = $this->blog_model->get_setting()->result_array();
                $menu = $this->blog_model->get_data_menu()->result_array();
                $data_users = $this->ion_auth->user()->row();
                $EDIT = new stdClass();
                $data = array(
                    'site_title' => $data_setting[0]['title'] . "- Menu",
                    'namelogin' => $data_users->username,
                    'maillogin' => $this->session->userdata("email"),
                    'ind_name' => "",
                    'eng_name' => "",
                    'menu_link' => "",
                    'id_menu' => "",
                    'parent_menu' => "",
                    'status' => "",
                    'formaction' => base_url('admincms/createmenu'),
                    'menu' => $menu,
                    'EDIT' => $EDIT
                );
                $this->load->view('admincms/head', $data);
                $this->load->view('admincms/navbar', $data);
                $this->load->view('admincms/sidebar', $data);
                $this->load->view('admincms/createmenu', $data);
                $this->load->view('admincms/footer', $data);
            }
        }
    }

    function editmenus($id_menu = 0) {
        if (!$this->ion_auth->logged_in() || !$this->ion_auth->is_admin()) {
            redirect('admincms/login', 'refresh');
            $this->session->set_flashdata('message', 'You must be an administrator to view this page.');
        } else {
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                $id_menu = $this->input->post('id_menu');
                $data['ind_name'] = $this->input->post('ind_name');
                $data['eng_name'] = $this->input->post('eng_name');
                $data['menu_link'] = $this->input->post('menu_link');
                $data['parent_menu'] = $this->input->post('parent_menu');
                $data['status'] = $this->input->post('status');

                $result = $this->blog_model->update_data('menus', $data, array('id_menu' => $id_menu));
                if ($result) {
                    redirect('admincms/menus', 'refresh');
                    $this->session->set_flashdata('message', 'Save Success');
                } else {
                    redirect('admincms/menus', 'refresh');
                    $this->session->set_flashdata('message', 'Failed');
                }
            } else {
                $this->data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');
                $data_setting = $this->blog_model->get_setting()->result_array();
                $menu = $this->blog_model->get_data_menu()->result_array();
                $EDIT = $this->blog_model->select_data('menus', array('id_menu' => $id_menu));
                $data_users = $this->ion_auth->user()->row();
                //print_r($EDIT);die();
                $data = array(
                    'site_title' => $data_setting[0]['title'] . "- Menu",
                    'namelogin' => $data_users->username,
                    'maillogin' => $this->session->userdata("email"),
                    'formaction' => base_url('admincms/editmenus'),
                    'menu' => $menu,
                    'EDIT' => $EDIT
                );
                $this->load->view('admincms/head', $data);
                $this->load->view('admincms/navbar', $data);
                $this->load->view('admincms/sidebar', $data);
                $this->load->view('admincms/createmenu', $data);
                $this->load->view('admincms/footer', $data);
            }
        }
    }

    function deletemenu($id_menu) {
        if (!$this->ion_auth->logged_in() || !$this->ion_auth->is_admin()) {
            redirect('admincms/login', 'refresh');
            $this->session->set_flashdata('message', 'You must be an administrator to view this page.');
        } else {

            if (is_null($id_menu)) {
                $this->session->set_flashdata('message', 'There\'s no Menus to delete');
            } else {
                $this->blog_model->delete_data('menus', array('id_menu' => $id_menu));
                $this->session->set_flashdata('message', 'Delete success');
            }
        }
        redirect('admincms/menus', 'refresh');
    }

    public function _get_csrf_nonce() {
        $this->load->helper('string');
        $key = random_string('alnum', 8);
        $value = random_string('alnum', 20);
        $this->session->set_flashdata('csrfkey', $key);
        $this->session->set_flashdata('csrfvalue', $value);
        return array($key => $value);
    }

    public function _valid_csrf_nonce() {
        if ($this->input->post($this->session->flashdata('csrfkey')) !== FALSE &&
                $this->input->post($this->session->flashdata('csrfkey')) == $this->session->flashdata('csrfvalue')) {
            return TRUE;
        } else {
            //return FALSE;
            return TRUE;
        }
    }

    public function _render_page($view, $data = null, $returnhtml = false) {//I think this makes more sense
        $this->viewdata = (empty($data)) ? $this->data : $data;
        $view_html = $this->load->view($view, $this->viewdata, $returnhtml);

        if ($returnhtml)
            return $view_html; //This will return html on 3rd argument being true
    }

}
