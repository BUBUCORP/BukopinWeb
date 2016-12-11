<?php

if (!defined('BASEPATH')) exit('No direct script access allowed');
class Page extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
		$this->load->helper(array(
			'form',
			'url',
			'html'
		));
		$this->load->library(array(
			'ion_auth',
			'pagination',
			'session',
			'form_validation'
		));
		$this->load->model(array(
			'member_model',
			
			'pagination_blog_model'
		));
		$this->form_validation->set_error_delimiters($this->config->item('error_start_delimiter', 'ion_auth') , $this->config->item('error_end_delimiter', 'ion_auth'));
		$this->lang->load('auth');
		$this->lang->load('message', 'indonesian');
	}

	public function error()
	{
		$data_setting = $this->blog_model->get_setting()->result_array();
		$data = array(
			'site_title' => $data_setting[0]['title'] . ' - 404 ',
		);
		$menu_id 			= "1"; //tentang bukopin
		$d['data'] 			= $data;
		$d['head'] 			= $this->load->view('page/head',$data,TRUE);
		$d['navbar']		= $this->get_nav();
		$d['sidebar']		= $this->get_sidebar($menu_id);		
		$d['breadcrumb'] 	= $this->load->view('page/breadcrumb','',TRUE);
		$d['footer'] 		= $this->load->view('page/footer','',TRUE);

		$this->load->view('page/404',$d);	
	}

	public function index()
	{
		$data_setting = $this->blog_model->get_setting()->result_array();
		$data = array(
			'site_title' => $data_setting[0]['title'],
			'recent_post' => $this->blog_model->get_post("where active='Y' AND category='1' order by datepost desc limit 4")->result_array(),
			'siaran_pers' => $this->blog_model->get_post("where active='Y' AND category='2' order by datepost desc limit 4")->result_array(),
			
			'frecent_post' => $this->blog_model->get_post("where active='Y' AND category='1' order by datepost desc limit 2")->result_array(),
			'fsiaran_pers' => $this->blog_model->get_post("where active='Y' AND category='2' order by datepost desc limit 2")->result_array()
		);
		$d['kurs'] 			= $this->blog_model->get_page("where id_page ='25'")->result_array();
		$d['sbdk'] 			= $this->blog_model->get_page("where id_page ='26'")->result_array();
		$d['data'] 			= $data;
		$d['head'] 			= $this->load->view('page/head',$data,TRUE);
		$d['navbar']		= $this->get_nav();
		$s['content'] 		= $this->blog_model->get_slider(" where status='Y'")->result_array();
		$d['slider']		= $this->load->view('page/slider',$s,TRUE);		
		$d['footer'] 		= $this->load->view('page/footer','',TRUE);

		$this->load->view('page/index',$d);		
	}

 	/*=====  TENTANG BUKOPIN =====*/
	public function pembukaanrekeningonline()
	{
		// if($_SERVER['REQUEST_METHOD']=='POST'){
		// 	print_r($_POST);
		// 	die();
		// }

		$this->form_validation->set_rules('nama_lengkap','nama_lengkap','required');
		$this->form_validation->set_rules('nama_panggilan','nama_panggilan','required');
		$this->form_validation->set_rules('nama_sesuai_ktp','nama_sesuai_ktp','required');
		$this->form_validation->set_rules('jenis_kelamin','jenis_kelamin','required');
		// $this->form_validation->set_rules('gelar_depan','gelar_depan','required');
		// $this->form_validation->set_rules('gelar_belakang','gelar_belakang','required');
		$this->form_validation->set_rules('tmpt_lahir','tmpt_lahir','required');
		$this->form_validation->set_rules('tgl_lahir','tgl_lahir','required');
		$this->form_validation->set_rules('bln_lahir','bln_lahir','required');
		$this->form_validation->set_rules('thn_lahir','thn_lahir','required');
		$this->form_validation->set_rules('usia','usia','required');
		$this->form_validation->set_rules('kewarganegaraan','kewarganegaraan','required');
		$this->form_validation->set_rules('identitas','identitas','required');
		$this->form_validation->set_rules('no_identitas','no_identitas','required');
		$this->form_validation->set_rules('tgl_berlaku','tgl_berlaku','required');
		$this->form_validation->set_rules('bln_berlaku','bln_berlaku','required');
		$this->form_validation->set_rules('thn_berlaku','thn_berlaku','required');
		// $this->form_validation->set_rules('no_ijin_tinggal','no_ijin_tinggal','required');
		// $this->form_validation->set_rules('no_pajak_tinggal','no_pajak_tinggal','required');
		// $this->form_validation->set_rules('no_jaminan_tinggal','no_jaminan_tinggal','required');
		$this->form_validation->set_rules('agama','agama','required');
		$this->form_validation->set_rules('status_nikah','status_nikah','required');
		$this->form_validation->set_rules('jml_anak','jml_anak','required');
		$this->form_validation->set_rules('pendidikan','pendidikan','required');
		$this->form_validation->set_rules('ibu_kandung','ibu_kandung','required');
		// $this->form_validation->set_rules('telepon','telepon','required');
		// $this->form_validation->set_rules('fax','fax','required');
		$this->form_validation->set_rules('handphone','handphone','required');
		$this->form_validation->set_rules('email','email','required');
		// $this->form_validation->set_rules('hobby','hobby','required');
		$this->form_validation->set_rules('alamat_rmh','alamat_rmh','required');
		$this->form_validation->set_rules('status_tmpt_tinggal','status_tmpt_tinggal','required');
		$this->form_validation->set_rules('kode_pos','kode_pos','required');
		$this->form_validation->set_rules('alamat_rt','alamat_rt','required');
		$this->form_validation->set_rules('alamat_rw','alamat_rw','required');
		$this->form_validation->set_rules('alamat_kelurahan','alamat_kelurahan','required');
		$this->form_validation->set_rules('alamat_domisili','alamat_domisili','required');
		$this->form_validation->set_rules('domisili_kode_pos','domisili_kode_pos','required');
		$this->form_validation->set_rules('domisili_rt','domisili_rt','required');
		$this->form_validation->set_rules('domisili_rw','domisili_rw','required');
		$this->form_validation->set_rules('domisili_kelurahan','domisili_kelurahan','required');
		$this->form_validation->set_rules('domisili_kecamatan','domisili_kecamatan','required');
		$this->form_validation->set_rules('domisili_kota','domisili_kota','required');
		$this->form_validation->set_rules('domisili_provinsi','domisili_provinsi','required');
		$this->form_validation->set_rules('emergency_name','emergency_name','required');
		$this->form_validation->set_rules('emergency_hubungan','emergency_hubungan','required');
		$this->form_validation->set_rules('emergency_telepon','emergency_telepon','required');
		$this->form_validation->set_rules('emergency_kode_pos','emergency_kode_pos','required');
		$this->form_validation->set_rules('emergency_rt','emergency_rt','required');
		$this->form_validation->set_rules('emergency_rw','emergency_rw','required');
		$this->form_validation->set_rules('emergency_kelurahan','emergency_kelurahan','required');
		$this->form_validation->set_rules('emergency_kecamatan','emergency_kecamatan','required');
		$this->form_validation->set_rules('emergency_kota','emergency_kota','required');
		$this->form_validation->set_rules('emergency_provinsi','emergency_provinsi','required');
		$this->form_validation->set_rules('jenis_pekerjaan','jenis_pekerjaan','required');
		// $this->form_validation->set_rules('nama_kantor','nama_kantor','required');
		// $this->form_validation->set_rules('bidang_pekerjaan','bidang_pekerjaan','required');
		// $this->form_validation->set_rules('jabatan','jabatan','required');
		// $this->form_validation->set_rules('lama_bekerja','lama_bekerja','required');
		// $this->form_validation->set_rules('bekerja_hingga','bekerja_hingga','required');
		// $this->form_validation->set_rules('alamat_pekerjaan','alamat_pekerjaan','required');
		// $this->form_validation->set_rules('kantor_kode_pos','kantor_kode_pos','required');
		// $this->form_validation->set_rules('kantor_rt','kantor_rt','required');
		// $this->form_validation->set_rules('kantor_rw','kantor_rw','required');
		// $this->form_validation->set_rules('kantor_kelurahan','kantor_kelurahan','required');
		// $this->form_validation->set_rules('kantor_kecamatan','kantor_kecamatan','required');
		// $this->form_validation->set_rules('kantor_kota','kantor_kota','required');
		// $this->form_validation->set_rules('kantor_provinsi','kantor_provinsi','required');
		// $this->form_validation->set_rules('kantor_telepon','kantor_telepon','required');
		// $this->form_validation->set_rules('kantor_fax','kantor_fax','required');
		$this->form_validation->set_rules('alamat_surat_menyurat','alamat_surat_menyurat','required');
		$this->form_validation->set_rules('tujuan_buka_rek','tujuan_buka_rek','required');
		$this->form_validation->set_rules('penghasilan_bulanan','penghasilan_bulanan','required');
		$this->form_validation->set_rules('penghasilan_sumber','penghasilan_sumber','required');
		$this->form_validation->set_rules('punya_cc_bukopin','punya_cc_bukopin','required');
		$this->form_validation->set_rules('lokasi_pembukaan_rek','lokasi_pembukaan_rek','required');
		
		// $this->form_validation->set_rules('no_sms_banking','no_sms_banking','required');
		// $this->form_validation->set_rules('no_sms_notifikasi','no_sms_notifikasi','required');

      	if ($this->form_validation->run() == FALSE) 
      	{
			$data_setting = $this->blog_model->get_setting()->result_array();
			$data = array(
				'site_title' => $data_setting[0]['title'] . ' - Pembukaan Rekening Online',
				'frecent_post' => $this->blog_model->get_post("where active='Y' AND category='1' order by date desc limit 2")->result_array(),
				'fsiaran_pers' => $this->blog_model->get_post("where active='Y' AND category='2' order by date desc limit 2")->result_array()
			);

			$menu_id 			= "15"; //produk dana
			$d['provinsi'] 		= $this->blog_model->get_provinsi()->result_array();			
			$d['data'] 			= $data;
			$d['formaction']	= "";	
			$d['head'] 			= $this->load->view('page/head',$data,TRUE);
			$d['navbar']		= $this->get_nav();
			$d['sidebar']		= $this->get_sidebar($menu_id);		
			$d['breadcrumb'] 	= $this->load->view('page/breadcrumb','',TRUE);
			$d['footer'] 		= $this->load->view('page/footer','',TRUE);

			$this->load->view('page/pembukaan-rekening-online',$d);		
		}else{
  			$max = $this->blog_model->select_max_data('registrasi_online','id_data');
      		$max = $max+1;
			$data = array(
				'nama_lengkap' => $this->input->post('nama_lengkap'),
				'nama_panggilan' => $this->input->post('nama_panggilan'),
				'nama_sesuai_ktp' => $this->input->post('nama_sesuai_ktp'),
				'jenis_kelamin' => $this->input->post('jenis_kelamin'),
				'gelar_depan' => $this->input->post('gelar_depan'),
				'gelar_belakang' => $this->input->post('gelar_belakang'),
				'tmpt_lahir' => $this->input->post('tmpt_lahir'),
				'tgl_lahir' => $this->input->post('tgl_lahir'),
				'bln_lahir' => $this->input->post('bln_lahir'),
				'thn_lahir' => $this->input->post('thn_lahir'),
				'usia' => $this->input->post('usia'),
				'kewarganegaraan' => $this->input->post('kewarganegaraan'),
				'identitas' => $this->input->post('identitas'),
				'no_identitas' => $this->input->post('no_identitas'),
				'tgl_berlaku' => $this->input->post('tgl_berlaku'),
				'bln_berlaku' => $this->input->post('bln_berlaku'),
				'thn_berlaku' => $this->input->post('thn_berlaku'),
				'no_ijin_tinggal' => $this->input->post('no_ijin_tinggal'),
				'no_pajak_tinggal' => $this->input->post('no_pajak_tinggal'),
				'no_jaminan_tinggal' => $this->input->post('no_jaminan_tinggal'),
				'agama' => $this->input->post('agama'),
				'status_nikah' => $this->input->post('status_nikah'),
				'jml_anak' => $this->input->post('jml_anak'),
				'pendidikan' => $this->input->post('pendidikan'),
				'ibu_kandung' => $this->input->post('ibu_kandung'),
				'telepon' => $this->input->post('telepon'),
				'fax' => $this->input->post('fax'),
				'handphone' => $this->input->post('handphone'),
				'email' => $this->input->post('email'),
				'hobby' => $this->input->post('hobby'),
				'alamat_rmh' => $this->input->post('alamat_rmh'),
				'status_tmpt_tinggal' => $this->input->post('status_tmpt_tinggal'),
				'kode_pos' => $this->input->post('kode_pos'),
				'alamat_rt' => $this->input->post('alamat_rt'),
				'alamat_rw' => $this->input->post('alamat_rw'),
				'alamat_kelurahan' => $this->input->post('alamat_kelurahan'),
				'alamat_kecamatan' => $this->input->post('alamat_kecamatan'),
				'alamat_kota' => $this->input->post('alamat_kota'),
				'alamat_provinsi' => $this->input->post('alamat_provinsi'),								
				'alamat_domisili' => $this->input->post('alamat_domisili'),
				'domisili_kode_pos' => $this->input->post('domisili_kode_pos'),
				'domisili_rt' => $this->input->post('domisili_rt'),
				'domisili_rw' => $this->input->post('domisili_rw'),
				'domisili_kelurahan' => $this->input->post('domisili_kelurahan'),
				'domisili_kecamatan' => $this->input->post('domisili_kecamatan'),
				'domisili_kota' => $this->input->post('domisili_kota'),
				'domisili_provinsi' => $this->input->post('domisili_provinsi'),
				'emergency_name' => $this->input->post('emergency_name'),
				'emergency_hubungan' => $this->input->post('emergency_hubungan'),
				'emergency_telepon' => $this->input->post('emergency_telepon'),
				'emergency_kode_pos' => $this->input->post('emergency_kode_pos'),
				'emergency_rt' => $this->input->post('emergency_rt'),
				'emergency_rw' => $this->input->post('emergency_rw'),
				'emergency_kelurahan' => $this->input->post('emergency_kelurahan'),
				'emergency_kecamatan' => $this->input->post('emergency_kecamatan'),
				'emergency_kota' => $this->input->post('emergency_kota'),
				'emergency_provinsi' => $this->input->post('emergency_provinsi'),
				'jenis_pekerjaan' => $this->input->post('jenis_pekerjaan'),
				'nama_kantor' => $this->input->post('nama_kantor'),
				'bidang_pekerjaan' => $this->input->post('bidang_pekerjaan'),
				'jabatan' => $this->input->post('jabatan'),
				'lama_bekerja' => $this->input->post('lama_bekerja'),
				'bekerja_hingga' => $this->input->post('bekerja_hingga'),
				'alamat_pekerjaan' => $this->input->post('alamat_pekerjaan'),
				'kantor_kode_pos' => $this->input->post('kantor_kode_pos'),
				'kantor_rt' => $this->input->post('kantor_rt'),
				'kantor_rw' => $this->input->post('kantor_rw'),
				'kantor_kelurahan' => $this->input->post('kantor_kelurahan'),
				'kantor_kecamatan' => $this->input->post('kantor_kecamatan'),
				'kantor_kota' => $this->input->post('kantor_kota'),
				'kantor_provinsi' => $this->input->post('kantor_provinsi'),
				'kantor_telepon' => $this->input->post('kantor_telepon'),
				'kantor_fax' => $this->input->post('kantor_fax'),
				'alamat_surat_menyurat' => $this->input->post('alamat_surat_menyurat'),
				'tujuan_buka_rek' => $this->input->post('tujuan_buka_rek'),
				'penghasilan_bulanan' => $this->input->post('penghasilan_bulanan'),
				'penghasilan_sumber' => $this->input->post('penghasilan_sumber'),
				'punya_cc_bukopin' => $this->input->post('punya_cc_bukopin'),
				'lokasi_pembukaan_rek' => $this->input->post('lokasi_pembukaan_rek'),
				
				'no_sms_banking' => $this->input->post('no_sms_banking'),
				'no_sms_notifikasi' => $this->input->post('no_sms_notifikasi'),
				'no_tiket_rek' => "B0".sprintf("%05d",$max)
			);
			$date = date('Y-m-d');			
			$expiredate = date('d F Y', strtotime("+14 days"));

	      	//todo insert DB
	      	if($this->blog_model->insert_data('registrasi_online',$data)){
	      		//todo email
				//---------------- send email verification -----------------------------
				      $subject="Terima kasih atas kepercayaan anda menggunakan Produk dan Layanan Bank Bukopin";
				      $message='<div style=" position: relative;padding: 30px;font-size: 13px;"><p>
								Kepada Yth,<br>
								Bapak/Ibu '.$data["nama_lengkap"].'<br><br><br>
								Terima kasih atas kepercayaan anda untuk membuka rekening di Bank Bukopin.<br>Kami menunggu kedatangan Bapak/Ibu di kantor Bank Bukopin terdekat dengan membawa/menunjukan kode referensi di bawah ini atau staff kami akan menghubungi Bapak/Ibu pada kesempatan Pertama.<br>
								</p>
								<h3 style="text-align: center;">'.$data["no_tiket_rek"].'</h3><br>
								<p style="text-align: center;">
									Tanggal Terbit : '.date("d F Y").' <br>
									Tanggal Kadaluarsa : '.$expiredate.' <br>
								</p>
								Persyaratan pembukaan rekening<br><br>
								1. Identitas Diri(KTP Elektronik)<br>
								2. Identitas Pendukung(NPWP/SIM)<br>
								3. Untuk Identitas Diri(KTP Elektronik) yang tidak sesuai dengan domisili, maka pemohonan wajib melengkapi dengan surat keterangan kerja atau surat keterangan domisili dari kelurahan setempat.<br>
								<br>
								<br>
								<br>
								<br>
								Hormat Kami,<br>
								<br>								
								PT Bank Bukopin, Tbk<br>
								</p></div>';
						$config = $this->config->item("configmail");
						$from =$this->config->item("mailfrom");
						$to = $this->input->post('email');
						$bcc = $this->config->item("mailbcc");
						//$this->load->library('email');	 
						//$this->email->initialize($config);

						// $this->email->from($from, 'Bank Bukopin');
						// $this->email->to($to);
						// //$this->email->cc('another@another-example.com');
						// $this->email->bcc($bcc);
						// $this->email->subject($subject);
						// $this->email->message($message);

						// $this->email->send();

						// $result = $this->email
						// 	->from($from)
						// 	->reply_to($from)
						// 	->to($to)
						// 	->subject($subject)
						// 	->message($message)
						// 	->send();
			    //---------------- End send email verification -----------------------------

	      		$this->load->view('page/pembukaan_result',$data);	
	      	}   

		}
	}
 	
 	/* =============== BANK Koresponden ===================== */
 	public function bankkoresponden()
 	{
		$data_setting = $this->blog_model->get_setting()->result_array();
		$data = array(
		'site_title' => $data_setting[0]['title'] . ' - Pembukaan Rekening Online',
		'frecent_post' => $this->blog_model->get_post("where active='Y' AND category='1' order by date desc limit 2")->result_array(),
		'fsiaran_pers' => $this->blog_model->get_post("where active='Y' AND category='2' order by date desc limit 2")->result_array()
		);

		$menu_id 			= "1"; //Tentang Bukopin
		$d['data'] 			= $data;
		$d['head'] 			= $this->load->view('page/head',$data,TRUE);
		$d['navbar']		= $this->get_nav();
		$d['sidebar']		= $this->get_sidebar($menu_id);		
		$d['breadcrumb'] 	= $this->load->view('page/breadcrumb','',TRUE);
		$d['footer'] 		= $this->load->view('page/footer','',TRUE);

		$this->load->view('page/tentang-bukopin-bank-koresponden',$d);	
 	}

 	/* =============== Kredit Card ===================== */
 	public function creditcard()
 	{
		$data_setting = $this->blog_model->get_setting()->result_array();
		$data = array(
			'site_title' => $data_setting[0]['title'] . ' - Pembukaan Rekening Online',
			'frecent_post' => $this->blog_model->get_post("where active='Y' AND category='1' order by date desc limit 2")->result_array(),
			'fsiaran_pers' => $this->blog_model->get_post("where active='Y' AND category='2' order by date desc limit 2")->result_array()
		);

		$menu_id 			= "46"; //Produk kredit
		$d['kartukredit'] 	= $this->blog_model->get_creditcard()->result_array();
		$d['data'] 			= $data;
		$d['head'] 			= $this->load->view('page/head',$data,TRUE);
		$d['navbar']		= $this->get_nav();
		$d['sidebar']		= $this->get_sidebar($menu_id);		
		$d['breadcrumb'] 	= $this->load->view('page/breadcrumb','',TRUE);
		$d['footer'] 		= $this->load->view('page/footer','',TRUE);

		$this->load->view('page/creditcard',$d);	
 	}

 	/* =============== Jaringan Kantor Bukopin ===================== */
 	public function jaringankantor()
 	{
		$data_setting = $this->blog_model->get_setting()->result_array();
		$data = array(
			'site_title' => $data_setting[0]['title'] . ' - Jaringan Kantor Bukopin',
			'frecent_post' => $this->blog_model->get_post("where active='Y' AND category='1' order by date desc limit 2")->result_array(),
			'fsiaran_pers' => $this->blog_model->get_post("where active='Y' AND category='2' order by date desc limit 2")->result_array(),			
		);

		$menu_id 			= "95"; //Jaringan Bukopin
		$d['provinsi'] 		= $this->blog_model->get_provinsi()->result_array();
		$d['kabupaten']		= $this->blog_model->get_kabupaten("where idprovinsi='6'")->result_array();		
		$d['content'] 		= $this->blog_model->get_jaringan("where type_jaringan='KANTOR' and idprovinsi='6' and idkabupaten='147' and lat<>'' and lng<>''")->result_array();
		$d['data'] 			= $data;
		$d['head'] 			= $this->load->view('page/head',$data,TRUE);
		$d['navbar']		= $this->get_nav();
		$d['sidebar']		= $this->get_sidebar($menu_id);		
		$d['breadcrumb'] 	= $this->load->view('page/breadcrumb','',TRUE);
		$d['footer'] 		= $this->load->view('page/footer','',TRUE);

		$this->load->view('page/jaringankantor',$d);	
 	}


 	/* ===============  Kantor Pemasaran Bukopin ===================== */
 	public function kantorpemasaran()
 	{
		$data_setting = $this->blog_model->get_setting()->result_array();
		$data = array(
			'site_title' => $data_setting[0]['title'] . ' - Kantor Pemasaran',
			'frecent_post' => $this->blog_model->get_post("where active='Y' AND category='1' order by date desc limit 2")->result_array(),
			'fsiaran_pers' => $this->blog_model->get_post("where active='Y' AND category='2' order by date desc limit 2")->result_array(),			
		);

		$menu_id 			= "46"; //Produk kredit
		$d['provinsi'] 		= $this->blog_model->get_provinsi()->result_array();
		$d['kabupaten']		= $this->blog_model->get_kabupaten("where idprovinsi='6'")->result_array();		
		$d['content'] 		= $this->blog_model->get_jaringan("where type_jaringan='PEMASARAN' and idprovinsi='6' and idkabupaten='147' and lat<>'' and lng<>''")->result_array();
		$d['data'] 			= $data;
		$d['head'] 			= $this->load->view('page/head',$data,TRUE);
		$d['navbar']		= $this->get_nav();
		$d['sidebar']		= $this->get_sidebar($menu_id);		
		$d['breadcrumb'] 	= $this->load->view('page/breadcrumb','',TRUE);
		$d['footer'] 		= $this->load->view('page/footer','',TRUE);

		$this->load->view('page/kantor-pemasaran',$d);	
 	}

 	/* =============== Jaringan ATM Bukopin ===================== */
 	public function jaringanatm()
 	{
		$data_setting = $this->blog_model->get_setting()->result_array();
		$data = array(
			'site_title' => $data_setting[0]['title'] . ' - Jaringan ATM Bukopin',
			'frecent_post' => $this->blog_model->get_post("where active='Y' AND category='1' order by date desc limit 2")->result_array(),
			'fsiaran_pers' => $this->blog_model->get_post("where active='Y' AND category='2' order by date desc limit 2")->result_array()
		);

		$menu_id 			= "95"; //Jaringan Bukopin
		$d['provinsi'] 		= $this->blog_model->get_provinsi()->result_array();
		$d['kabupaten']		= $this->blog_model->get_kabupaten("where idprovinsi='6'")->result_array();		
		$d['content'] 		= $this->blog_model->get_jaringan("where type_jaringan='ATM' and idprovinsi='6' and idkabupaten='147' and lat<>'' and lng<>''")->result_array();
		$d['data'] 			= $data;
		$d['head'] 			= $this->load->view('page/head',$data,TRUE);
		$d['navbar']		= $this->get_nav();
		$d['sidebar']		= $this->get_sidebar($menu_id);		
		$d['breadcrumb'] 	= $this->load->view('page/breadcrumb','',TRUE);
		$d['footer'] 		= $this->load->view('page/footer','',TRUE);

		$this->load->view('page/jaringanatm',$d);	
 	}

 	/* =============== tanggung-jawab-sosial ===================== */
 	public function tanggungjawab($num=0)
 	{
		$data_setting = $this->blog_model->get_setting()->result_array();
		$data = array(
			'site_title' => $data_setting[0]['title'] . ' - Pembukaan Rekening Online',
			'frecent_post' => $this->blog_model->get_post("where active='Y' AND category='1' order by date desc limit 2")->result_array(),
			'fsiaran_pers' => $this->blog_model->get_post("where active='Y' AND category='2' order by date desc limit 2")->result_array()
		);
		$content = $this->blog_model->get_gallery("where type_gallery=2 limit $num, 15");
		$count = $this->blog_model->get_count("gallery","where type_gallery=2");
		
		//pagination
		$this->load->library('pagination');
		$config['base_url'] = base_url('tentang-bukopin/tanggung-jawab-sosial/');
		$config['total_rows'] = $count[0]['idx'];
		$config['per_page'] = 15;
		$config['use_page_numbers'] = TRUE;
		$config['cur_tag_open'] = '<a>';
		$config['cur_tag_close'] = '</a>';
		$config['next_link'] = 'Next';
		$config['prev_link'] = 'Previous';
		$this->pagination->initialize($config);

		$menu_id 			= "1"; //Tentang Bukopin
		$d['content'] 		= $content->result_array();
		$d['data'] 			= $data;
		$d['pagination'] 	= $this->pagination->create_links();
		$d['head'] 			= $this->load->view('page/head',$data,TRUE);
		$d['navbar']		= $this->get_nav();
		$d['sidebar']		= $this->get_sidebar($menu_id);		
		$d['breadcrumb'] 	= $this->load->view('page/breadcrumb','',TRUE);
		$d['footer'] 		= $this->load->view('page/footer','',TRUE);

		$this->load->view('page/tentang-bukopin-tanggung-jawab-sosial',$d);	
 	}

	/*=====  Hubungi Kami =====*/
	public function hubungikami()
	{

	  $this->form_validation->set_rules('cat_contact','Kategori','required');
      $this->form_validation->set_rules('nama_lengkap','nama lengkap','required');
      $this->form_validation->set_rules('no_identitas','No. Identitas','required');
      $this->form_validation->set_rules('no_identitas_bank','No. Identitas di Bank','required');
      $this->form_validation->set_rules('alamat','Alamat','required');
      $this->form_validation->set_rules('phone','phone','required');
      $this->form_validation->set_rules('email','email','required');
      $this->form_validation->set_rules('topik','topik','required');
      $this->form_validation->set_rules('jenis_masalah','jenis masalah','required');
      $this->form_validation->set_rules('pesan','pesan','required');

      if ($this->form_validation->run() == FALSE) {
		$data_setting = $this->blog_model->get_setting()->result_array();
		$data = array(
			'site_title' => $data_setting[0]['title'] . ' - Hubungi Kami',		
			'frecent_post' => $this->blog_model->get_post("where active='Y' AND category='1' order by date desc limit 2")->result_array(),
			'fsiaran_pers' => $this->blog_model->get_post("where active='Y' AND category='2' order by date desc limit 2")->result_array(),
			);
		$menu_id 			= "73"; //hubungi kami
		$d['actionform'] 	= base_url('hubungi-kami');
		$d['data'] 			= $data;
		$d['head'] 			= $this->load->view('page/head',$data,TRUE);
		$d['navbar']		= $this->get_nav();
		$d['sidebar']		= $this->load->view('page/sidebarnomenu','',TRUE);//$this->get_sidebar($menu_id);		
		$d['breadcrumb'] 	= $this->load->view('page/breadcrumb','',TRUE);
		$d['footer'] 		= $this->load->view('page/footer','',TRUE);
		$this->load->view('page/contact',$d);	
      }else{
      	$max = $this->blog_model->select_max('contact','id_contact');
      	$max = $max+1;
      	$data = array(
			  'cat_contact' => $this->input->post('cat_contact'),
		      'nama_lengkap' => $this->input->post('nama_lengkap'),
		      'no_identitas' => $this->input->post('no_identitas'),
		      'no_identitas_bank' => $this->input->post('no_identitas_bank'),
		      'alamat' => $this->input->post('alamat'),
		      'phone' => $this->input->post('phone'),
		      'email' => $this->input->post('email'),
		      'topik' => $this->input->post('topik'),
		      'subject' => $this->input->post('topik'),
		      'produk' => $this->input->post('produk'),
		      'jenis_masalah' => $this->input->post('jenis_masalah'),
		      'pesan' => $this->input->post('pesan'),
		      'tanggal' => date("Y-m-d H:i:s"),
		      'no_tiket' => "KMP".date("Y").sprintf("%05d",$max)

      		);
      	//todo insert DB
      	if($this->blog_model->insert_data('contact',$data)){
      		//todo email
			//---------------- send email verification -----------------------------
			      $subject="Terima kasih atas kepercayaan anda menggunakan Produk dan Layanan Bank Bukopin";
			      $message='<p style=" position: relative;padding: 30px;font-size: 13px;">
							Kepada Yth,<br>
							Bapak/Ibu '.$data["nama_lengkap"].'<br><br><br>
							Terima kasih atas kepercayaan anda menggunakan Produk dan Layanan Bank Bukopin.<br>
							Pengaduan/Permohonan anda telah kami terima dan tercatat pada sistem kami dengan nomor tiket:<br></p>
							<h3 style="text-align: center; color: #0088c9;">'.$data["no_tiket"].'</h3><br><p style=" position: relative;padding: 30px;font-size: 13px;">
							Mohon kesediaan Bapak/Ibu untuk menunggu sementara pengaduan/permohonan sedang kami proses.<br>
							<small><i>*Mohon untuk mencatat nomor tiket yang kami berikan. Nomor tiket telah kami kirim ke alamat email anda.</i></small><br>
							<br>
							<br>
							<br>
							Hormat Kami,<br>
							<br>
							Customer Care Center<br>
							PT Bank Bukopin, Tbk<br>
							</p>';
					$config = $this->config->item("configmail");
					$from =$this->config->item("mailfrom");
					$to = $this->input->post('email');
					$bcc = $this->config->item("mailbcc");
					//$this->load->library('email');	 
					//$this->email->initialize($config);

					// $this->email->from($from, 'Bank Bukopin');
					// $this->email->to($to);
					// //$this->email->cc('another@another-example.com');
					// $this->email->bcc($bcc);
					// $this->email->subject($subject);
					// $this->email->message($message);

					// $this->email->send();

					// $result = $this->email
					// 	->from($from)
					// 	->reply_to($from)
					// 	->to($to)
					// 	->subject($subject)
					// 	->message($message)
					// 	->send();
		    //---------------- End send email verification -----------------------------

      		$this->load->view('page/contact_result',$data);	
      	}      
      }
	}

	/*===== THANK YOU =====*/
	public function thankyou()
		{
		$data_setting = $this->blog_model->get_setting()->result_array();
		if ($this->ion_auth->logged_in())
			{
			$user = $this->ion_auth->user()->row();
			$id_reg = $user->id_reg;
			$data = array(
				'site_title' => $data_setting[0]['title'] . ' - Thank You',
				'id_reg' => $id_reg,
				'username' => $user->username,
				'frecent_post' => $this->blog_model->get_post("where active='Y' AND category='1' order by date desc limit 2")->result_array(),
				'fsiaran_pers' => $this->blog_model->get_post("where active='Y' AND category='2' order by date desc limit 2")->result_array()
			);
			}
		  else
			{
			$data = array(
				'site_title' => $data_setting[0]['title'] . ' - Thank You',
				'frecent_post' => $this->blog_model->get_post("where active='Y' AND category='1' order by date desc limit 2")->result_array(),
				'fsiaran_pers' => $this->blog_model->get_post("where active='Y' AND category='2' order by date desc limit 2")->result_array()
			);
			}

		$this->load->view('page/head', $data);
		$this->load->view('page/navbar', $data);
		$this->load->view('page/thank-you', $data);
		$this->load->view('page/footer', $data);
		}

	/*===== BLOG =====*/
	public function siaranpers($num=0)
	{
		$config = array();
		$content = $this->blog_model->get_post("where category=2 limit $num, 50")->result_array();
		$count = $this->blog_model->get_count("post","where category=2");
		$tahun = $this->blog_model->select_distinct('post','YEAR(datepost)','and category=2 order by YEAR(datepost) DESC');
		$data_setting = $this->blog_model->get_setting()->result_array();
		//pagination
		$this->load->library('pagination');
		$config['base_url'] = base_url('page/siaranpers/');
		$config['total_rows'] = $count[0]['idx'];
		$config['per_page'] = 50;
		$config['use_page_numbers'] = TRUE;
		$config['cur_tag_open'] = '<a>';
		$config['cur_tag_close'] = '</a>';
		$config['next_link'] = 'Next';
		$config['prev_link'] = 'Previous';
		$this->pagination->initialize($config);
		
		$data = array(
			'site_title' => $data_setting[0]['title'] . ' - Siaran Pers',
			'links' => $this->pagination->create_links() ,
			'content' => $content,
			'tahun' => $tahun,
			'frecent_post' => $this->blog_model->get_post("where active='Y' AND category='1' order by date desc limit 2")->result_array(),
			'fsiaran_pers' => $this->blog_model->get_post("where active='Y' AND category='2' order by date desc limit 2")->result_array()
		);
		$menu_id 			= "119"; //INFO TERBARU
		$d['data'] 			= $content;
		$d['head'] 			= $this->load->view('page/head',$data,TRUE);
		$d['navbar']		= $this->get_nav();
		$d['sidebar']		= $this->get_sidebar($menu_id);		
		$d['breadcrumb'] 	= $this->load->view('page/breadcrumb','',TRUE);
		$d['footer'] 		= $this->load->view('page/footer','',TRUE);				
		$this->load->view('page/blog',$d);		
	}

	/*===== BERITA =====*/
	public function berita($num=0)
	{
		$config = array();
		$content = $this->blog_model->get_post("where category=1 limit $num, 50")->result_array();
		$count = $this->blog_model->get_count("post","where category=1");
		$tahun = $this->blog_model->select_distinct('post','YEAR(datepost)','and category=1 order by YEAR(datepost) DESC');
		$data_setting = $this->blog_model->get_setting()->result_array();
		//pagination
		$this->load->library('pagination');
		$config['base_url'] = base_url('page/siaranpers/');
		$config['total_rows'] = $count[0]['idx'];
		$config['per_page'] = 50;
		$config['use_page_numbers'] = TRUE;
		$config['cur_tag_open'] = '<a>';
		$config['cur_tag_close'] = '</a>';
		$config['next_link'] = 'Next';
		$config['prev_link'] = 'Previous';
		$this->pagination->initialize($config);
		
		$data = array(
			'site_title' => $data_setting[0]['title'] . ' - Berita',
			'links' => $this->pagination->create_links() ,
			'content' => $content,
			'tahun' => $tahun,
			'frecent_post' => $this->blog_model->get_post("where active='Y' AND category='1' order by date desc limit 2")->result_array(),
			'fsiaran_pers' => $this->blog_model->get_post("where active='Y' AND category='2' order by date desc limit 2")->result_array()
		);
		$menu_id 			= "119"; //INFO TERBARU
		$d['data'] 			= $content;
		$d['head'] 			= $this->load->view('page/head',$data,TRUE);
		$d['navbar']		= $this->get_nav();
		$d['sidebar']		= $this->get_sidebar($menu_id);		
		$d['breadcrumb'] 	= $this->load->view('page/breadcrumb','',TRUE);
		$d['footer'] 		= $this->load->view('page/footer','',TRUE);	
		$this->load->view('page/berita',$d);
	}		

	/*===== LOWONGAN KERJA =====*/
	public function lowonganpekerjaan()
	{
		$data_setting = $this->blog_model->get_setting()->result_array();
		$data = array(
			'site_title' => $data_setting[0]['title'] . ' - Lowongan Pekerjaan',
			'page_title' => 'Lowongan Pekerjaan',			
			'career' => $this->blog_model->get_career("where active='Y' order by date")->result_array(),
			'frecent_post' => $this->blog_model->get_post("where active='Y' AND category='1' order by date desc limit 2")->result_array(),
			'fsiaran_pers' => $this->blog_model->get_post("where active='Y' AND category='2' order by date desc limit 2")->result_array()
		);
		$menu_id 			= "129"; //INFO TERBARU
		$d['data'] 			= $data;
		$d['head'] 			= $this->load->view('page/head',$data,TRUE);
		$d['navbar']		= $this->get_nav();
		$d['sidebar']		= $this->get_sidebar($menu_id);	
		$d['breadcrumb'] 	= $this->load->view('page/breadcrumb','',TRUE);
		$d['footer'] 		= $this->load->view('page/footer','',TRUE);				
		$this->load->view('page/career',$d);
	}			
	
	function jobsubmit(){
		if($_SERVER['REQUEST_METHOD']=='POST'){
			//print_r($_POST);die();
			$this->form_validation->set_rules('jobid','jobid','required');
			$this->form_validation->set_rules('nama_lengkap','nama_lengkap','required');
			$this->form_validation->set_rules('no_tlp','no_tlp','required');
			$this->form_validation->set_rules('no_hp','no_hp','required');
			$this->form_validation->set_rules('email','email','required');
	      	if ($this->form_validation->run() == FALSE) {
	      		$d['post_data']=array();
	      		$this->load->view('page/career_result',$d);
	      	}else{
	      		
				$kegiatan_sosial = $this->input->post('kegiatan_sosial');
				$kegiatan_sosial = implode(", ",$kegiatan_sosial);
				$bahasa = $this->input->post('bahasa');
				$bahasa_kategori = $this->input->post('bahasa_kategori');

				$komputer = $this->input->post('komputer_skill');
				$komputer_skill_kategori = $this->input->post('komputer_skill_kategori');
				$faktor_penghambat_keberhasilan = $this->input->post('faktor_penghambat_keberhasilan');
				$faktor_penghambat_keberhasilan = implode(", ",$faktor_penghambat_keberhasilan);
				$faktor_pendukung_keberhasilan = $this->input->post('faktor_pendukung_keberhasilan');
				$faktor_pendukung_keberhasilan = implode(", ",$faktor_pendukung_keberhasilan);				
				
				$bahasa_skill ="";
				for ($i=0; $i <count($bahasa) ; $i++) { 
					$bahasa_skill = $bahasa_skill .", ".$bahasa[$i]." kategori ".$bahasa_kategori[$i];
				}

				$komputer_skill = "";
				for ($i=0; $i <count($komputer) ; $i++) { 
					$komputer_skill = $komputer_skill .", ".$komputer[$i]." kategori ".$komputer_skill_kategori[$i];
				}				

	      		$data = array(
	      			'jobid' => $this->input->post('jobid'),
					'nama_lengkap' => $this->input->post('nama_lengkap'),
					'jenis_kelamin' => $this->input->post('jenis_kelamin'),
					'agama' => $this->input->post('agama'),
					'tempat_lahir' => $this->input->post('tempat_lahir'),
					'tgl_lahir' => $this->input->post('tgl_lahir'),
					'usia' => $this->input->post('usia'),
					'tinggi_bdn' => $this->input->post('tinggi_bdn'),
					'berat_bdn' => $this->input->post('berat_bdn'),
					'gol_darah' => $this->input->post('gol_darah'),
					'suku_bangsa' => $this->input->post('suku_bangsa'),
					'ktp' => $this->input->post('ktp_p1').'-'.$this->input->post('ktp_p2').'-'.$this->input->post('ktp_p3').'-'.$this->input->post('ktp_p4'),
					'npwp' => $this->input->post('npwp_1').'-'.$this->input->post('npwp_2').'-'.$this->input->post('npwp_3').'-'.$this->input->post('npwp_4'),
					'alamat' => $this->input->post('alamat'),
					'status_alamat' => $this->input->post('status_alamat'),
					'no_tlp' => $this->input->post('no_tlp'),
					'no_hp' => $this->input->post('no_hp'),
					'email' => $this->input->post('email'),
					'nama_darurat' => $this->input->post('nama_darurat'),
					'hubungan_darurat' => $this->input->post('hubungan_darurat'),
					'no_hp_darurat' => $this->input->post('no_hp_darurat'),
					'alamat_darutat' => $this->input->post('alamat_darutat'),
					'akun_facebook' => $this->input->post('akun_facebook'),
					'url_facebook' => $this->input->post('url_facebook'),
					'akun_twitter' => $this->input->post('akun_twitter'),
					'url_twitter' => $this->input->post('url_twitter'),
					'akun_instagram' => $this->input->post('akun_instagram'),
					'url_instagram' => $this->input->post('url_instagram'),
					'akun_path' => $this->input->post('akun_path'),
					'url_path' => $this->input->post('url_path'),
					'pernah_kredit' => $this->input->post('pernah_kredit'),
					'riwayat_sakit' => $this->input->post('riwayat_sakit'),
					'riwayat_sakit_desc' => $this->input->post('riwayat_sakit_desc'),
					'riwayat_bawaan' => $this->input->post('riwayat_bawaan'),
					'riwayat_bawaan_desc' => $this->input->post('riwayat_bawaan_desc'),
					'lingkungan' => $this->input->post('lingkungan'),
					'lingkungan_desc' => $this->input->post('lingkungan_desc'),
					'rencana_nikah_thn' => $this->input->post('rencana_nikah_thn'),
					'status_nikah' => $this->input->post('status_nikah'),
					'nikah_bulan' => $this->input->post('nikah_bulan'),
					'nikah_tahun' => $this->input->post('nikah_tahun'),
					'ditempatkan_wilayah' => $this->input->post('ditempatkan_wilayah'),
					'ditempatkan_wilayah_desc' => $this->input->post('ditempatkan_wilayah_desc'),
					'ditempatkan_bagian' => $this->input->post('ditempatkan_bagian'),
					'ditempatkan_bagian_desc' => $this->input->post('ditempatkan_bagian_desc'),
					'pernah_tes' => $this->input->post('pernah_tes'),
					'pernah_tes_desc' => $this->input->post('pernah_tes_desc'),
					'terikat_kontrak' => $this->input->post('terikat_kontrak'),
					'terikat_kontrak_desc' => $this->input->post('terikat_kontrak_desc'),
					'pernah_tes_lain' => $this->input->post('pernah_tes_lain'),
					'pernah_tes_lain_desc' => $this->input->post('pernah_tes_lain_desc'),
					'bantuan_finansial' => $this->input->post('bantuan_finansial'),
					'bantuan_finansial_desc' => $this->input->post('bantuan_finansial_desc'),
					'kegiatan_sosial' => $kegiatan_sosial,
					'kegiatan_mingguan' => $this->input->post('kegiatan_mingguan'),
					'kegiatan_bulanan' => $this->input->post('kegiatan_bulanan'),
					'pendapat_pekerjaan' => $this->input->post('pendapat_pekerjaan'),
					'faktor_pendukung_keberhasilan' => $faktor_pendukung_keberhasilan,
					'faktor_penghambat_keberhasilan' => $faktor_penghambat_keberhasilan,
					'peluang_penghambat' => $this->input->post('peluang_penghambat'),
					'kesulitan_dlm_kerja' => $this->input->post('kesulitan_dlm_kerja'),
					'alasan_masih_bekerja' => $this->input->post('alasan_masih_bekerja'),
					'manfaat_kerja_skrg' => $this->input->post('manfaat_kerja_skrg'),
					'penyebab_resign' => $this->input->post('penyebab_resign'),
					'kegiatan_luang' => $this->input->post('kegiatan_luang'),
					'hobby' => $this->input->post('hobby'),
					'last_job_name' => $this->input->post('last_job_name'),
					'last_job_alamat' => $this->input->post('last_job_alamat'),
					'last_job_jabatan' => $this->input->post('last_job_jabatan'),
					'last_job_laporke' => $this->input->post('last_job_laporke'),
					'last_job_dari_bulan' => $this->input->post('last_job_dari_bulan'),
					'last_job_dari_tahun' => $this->input->post('last_job_dari_tahun'),
					'last_job_sampai_bulan' => $this->input->post('last_job_sampai_bulan'),
					'last_job_sampai_tahun' => $this->input->post('last_job_sampai_tahun'),
					'last_job_desc' => $this->input->post('last_job_desc'),
					'last_job_jenis_usaha' => $this->input->post('last_job_jenis_usaha'),
					'last_job_gaji' => $this->input->post('last_job_gaji'),
					'last_job_atasan' => $this->input->post('last_job_atasan'),
					'last_job_no_tlp' => $this->input->post('last_job_no_tlp'),
					'last_job_alasan_resign' => $this->input->post('last_job_alasan_resign'),
					'job_sblmnya_name' => $this->input->post('job_sblmnya_name'),
					'job_sblmnya_alamat' => $this->input->post('job_sblmnya_alamat'),
					'job_sblmnya_jabatan' => $this->input->post('job_sblmnya_jabatan'),
					'job_sblmnya_laporke' => $this->input->post('job_sblmnya_laporke'),
					'job_sblmnya_dari_bulan' => $this->input->post('job_sblmnya_dari_bulan'),
					'job_sblmnya_dari_tahun' => $this->input->post('job_sblmnya_dari_tahun'),
					'job_sblmnya_sampai_bulan' => $this->input->post('job_sblmnya_sampai_bulan'),
					'job_sblmnya_sampai_tahun' => $this->input->post('job_sblmnya_sampai_tahun'),
					'job_sblmnya_desc' => $this->input->post('job_sblmnya_desc'),
					'job_sblmnya_jenis_usaha' => $this->input->post('job_sblmnya_jenis_usaha'),
					'job_sblmnya_gaji' => $this->input->post('job_sblmnya_gaji'),
					'job_sblmnya_atasan' => $this->input->post('job_sblmnya_atasan'),
					'job_sblmnya_no_tlp' => $this->input->post('job_sblmnya_no_tlp'),
					'job_sblmnya_alasan_resign' => $this->input->post('job_sblmnya_alasan_resign'),
					'gambaran_karir' => $this->input->post('gambaran_karir'),
					'harapan_gaji' => $this->input->post('harapan_gaji'),
					'harapan_posisi' => $this->input->post('harapan_posisi'),
					'deskripsi_diri' => $this->input->post('deskripsi_diri'),
					'chk_faq' => $this->input->post('chk_faq'),
					'chk_setuju' => $this->input->post('chk_setuju'),
					'chk_setuju2' => $this->input->post('chk_setuju2'),
					'bahasa_skill' =>  $bahasa_skill,
					'komputer_skill' => $komputer_skill
	      			);

                $this->load->library('upload');
                $path = './assets/photo/';
                $config['upload_path'] = $path;
                $config['allowed_types'] = 'jpg|png|jpeg';
                $config['max_size'] = 0;
                $this->upload->initialize($config);
                // print_r($_FILES);die();
                if (!$this->upload->do_upload('userfile')) {
                    // Handle upload errors              
                    // If an error occurs jump to the next file
                    $err = true;
                    $error = $this->upload->display_errors();
                    
                } else {

                    $fupload = $this->upload->data();
                    $err = false;
                    $data['photo'] = $fupload['file_name'];                    
                    // Successfull file upload                            
                }

				$aplication_id = $this->blog_model->insert_return_id('job_aplication',$data);
				if($aplication_id){
					if($this->input->post('pernah_kredit')=='Y'){
						$kredit_jenis = $this->input->post('kredit_jenis');
						$kredit_dimana = $this->input->post('kredit_dimana');
						$kredit_sejak = $this->input->post('kredit_sejak');
						$kredit_proses = $this->input->post('kredit_proses');
						for ($i=0; $i <count($kredit_jenis) ; $i++) {
								$da=array(
									'aplication_id' => $aplication_id ,
									'kredit_jenis' => $kredit_jenis[$i],
									'kredit_dimana' => $kredit_dimana[$i],
									'kredit_sejak' => $kredit_sejak[$i],
									'kredit_proses' => $kredit_proses[$i]
									);
							 $this->blog_model->insert_data('job_kredit',$da);
							
						}
					}

					$keluarga_nama 		= $this->input->post('keluarga_nama');
					$keluarga_tgl_lahir = $this->input->post('keluarga_tgl_lahir');
					$keluarga_jk 		= $this->input->post('keluarga_jk');
					$keluarga_job 		= $this->input->post('keluarga_job');
					$keluarga_no_tlp 	= $this->input->post('keluarga_no_tlp');
					$keluarga_pendidikan = $this->input->post('keluarga_pendidikan');

					for ($i=0; $i <count($keluarga_nama) ; $i++) { 
						$da=array(
							'aplication_id' 	=> $aplication_id ,
							'keluarga_nama' 	=> $keluarga_nama[$i],
							'keluarga_tgl_lahir' => $keluarga_tgl_lahir[$i],
							'keluarga_jk' 		=> $keluarga_jk[$i],
							'keluarga_job' 		=> $keluarga_job[$i],
							'keluarga_no_tlp'	=> $keluarga_no_tlp[$i],
							'keluarga_pendidikan'	=> $keluarga_pendidikan[$i]
							);
						$this->blog_model->insert_data('job_keluarga',$da);
					}

					$ortu_name 		= $this->input->post('ortu_name');
					$ortu_tgl_lahir = $this->input->post('ortu_tgl_lahir');
					$ortu_jk 		= $this->input->post('ortu_jk');
					$ortu_job 		= $this->input->post('ortu_job');
					$ortu_job_kantor = $this->input->post('ortu_job_kantor');
					$ortu_no_tlp 	= $this->input->post('ortu_no_tlp');
					$ortu_pendidikan = $this->input->post('ortu_pendidikan');

					for ($i=0; $i <count($ortu_name) ; $i++) { 
						$da=array(
							'aplication_id'	=> $aplication_id ,
							'ortu_name' 	=> $ortu_name[$i],
							'ortu_tgl_lahir' => $ortu_tgl_lahir[$i],
							'ortu_jk' 		=> $ortu_jk[$i],
							'ortu_job' 		=> $ortu_job[$i],
							'ortu_job_kantor'	=> $ortu_job_kantor[$i],
							'ortu_no_tlp'	=> $ortu_no_tlp[$i],
							'ortu_pendidikan'	=> $ortu_pendidikan[$i]
							);
						$this->blog_model->insert_data('job_ortu',$da);
					}

					$saudara_name 			= $this->input->post('saudara_name');
					$saudara_tgl_lahir 		= $this->input->post('saudara_tgl_lahir');
					$saudara_status_nikah	= $this->input->post('saudara_status_nikah');
					$saudara_jk 			= $this->input->post('saudara_jk');
					$saudara_job 			= $this->input->post('saudara_job');
					$saudara_job_kantor 	= $this->input->post('saudara_job_kantor');
					$saudara_no_tlp 		= $this->input->post('saudara_no_tlp');
					$saudara_pendidikan 	= $this->input->post('saudara_pendidikan');

					for ($i=0; $i <count($saudara_name) ; $i++) { 
						$da=array(
							'aplication_id'		=> $aplication_id ,
							'saudara_name' 		=> $saudara_name[$i],
							'saudara_tgl_lahir' => $saudara_tgl_lahir[$i],
							'saudara_status_nikah'	=> $saudara_status_nikah[$i],
							'saudara_jk' 		=> $saudara_jk[$i],
							'saudara_job'		=> $saudara_job[$i],
							'saudara_job_kantor'=> $saudara_job_kantor[$i],
							'saudara_no_tlp'	=> $saudara_no_tlp[$i],
							'saudara_pendidikan'=> $saudara_pendidikan[$i]
							);
						$this->blog_model->insert_data('job_saudara',$da);
					}

					$pendidikan_name 			= $this->input->post('pendidikan_name');
					$pendidikan_sekolah 		= $this->input->post('pendidikan_sekolah');
					$pendidikan_jurusan	= $this->input->post('pendidikan_jurusan');
					$pendidikan_thn_masuk 			= $this->input->post('pendidikan_thn_masuk');
					$pendidikan_thn_lulus 			= $this->input->post('pendidikan_thn_lulus');
					$pendidikan_ipk 	= $this->input->post('pendidikan_ipk');

					for ($i=0; $i <count($pendidikan_name) ; $i++) { 
						$da=array(
							'aplication_id'			=> $aplication_id ,
							'pendidikan_name' 		=> $pendidikan_name[$i],
							'pendidikan_sekolah' 	=> $pendidikan_sekolah[$i],
							'pendidikan_jurusan'	=> $pendidikan_jurusan[$i],
							'pendidikan_thn_masuk'	=> $pendidikan_thn_masuk[$i],
							'pendidikan_thn_lulus'	=> $pendidikan_thn_lulus[$i],
							'pendidikan_ipk' 		=> $pendidikan_ipk[$i]
							);
						$this->blog_model->insert_data('job_pendidikan',$da);
					}

					$kursus_jenis		= $this->input->post('kursus_jenis');
					$kursus_name 		= $this->input->post('kursus_name');
					$kursus_thn_masuk	= $this->input->post('kursus_thn_masuk');
					$kursus_thn_lulus	= $this->input->post('kursus_thn_lulus');				

					for ($i=0; $i <count($kursus_name) ; $i++) { 
						$da=array(
							'aplication_id'		=> $aplication_id ,
							'kursus_jenis' 		=> $kursus_jenis[$i],
							'kursus_name' 		=> $kursus_name[$i],
							'kursus_thn_masuk'	=> $kursus_thn_masuk[$i],
							'kursus_thn_lulus'	=> $kursus_thn_lulus[$i]							
							);
						$this->blog_model->insert_data('job_kursus',$da);
					}

					$kegiatan_name		= $this->input->post('kegiatan_name');
					$kegiatan_organisasi= $this->input->post('kegiatan_organisasi');
					$kegiatan_jabatan	= $this->input->post('kegiatan_jabatan');
					$kegiatan_lamanya	= $this->input->post('kegiatan_lamanya');				

					for ($i=0; $i <count($kursus_name) ; $i++) { 
						$da=array(
							'aplication_id'		=> $aplication_id ,
							'kegiatan_name'		=> $kegiatan_name[$i],
							'kegiatan_organisasi'	=> $kegiatan_organisasi[$i],
							'kegiatan_jabatan'	=> $kegiatan_jabatan[$i],
							'kegiatan_lamanya'	=> $kegiatan_lamanya[$i]							
							);
						$this->blog_model->insert_data('job_kegiatan',$da);
					}

					$relasi_bukopin_name		= $this->input->post('relasi_bukopin_name');
					$relasi_bukopin_jabatan= $this->input->post('relasi_bukopin_jabatan');
					$relasi_bukopin_hubungan	= $this->input->post('relasi_bukopin_hubungan');
					
					for ($i=0; $i <count($kursus_name) ; $i++) { 
						$da=array(
							'aplication_id'				=> $aplication_id ,
							'relasi_bukopin_name'		=> $relasi_bukopin_name[$i],
							'relasi_bukopin_jabatan'	=> $relasi_bukopin_jabatan[$i],
							'relasi_bukopin_hubungan'	=> $relasi_bukopin_hubungan[$i]													
							);
						$this->blog_model->insert_data('job_relasi_bukopin',$da);
					}

					$relasi_kantor_name		= $this->input->post('relasi_kantor_name');
					$relasi_kantor_jabatan= $this->input->post('relasi_kantor_jabatan');
					$relasi_kantor_hubungan	= $this->input->post('relasi_kantor_hubungan');
					
					for ($i=0; $i <count($kursus_name) ; $i++) { 
						$da=array(
							'aplication_id'				=> $aplication_id ,
							'relasi_kantor_name'		=> $relasi_kantor_name[$i],
							'relasi_kantor_jabatan'	=> $relasi_kantor_jabatan[$i],
							'relasi_kantor_hubungan'	=> $relasi_kantor_hubungan[$i]													
							);
						$this->blog_model->insert_data('job_relasi_kantor',$da);
					}

					$d['post_data']=$_POST;
					$this->load->view('page/career_result',$d);
				}
	      	}


			//print_r($_POST);
		}
	}

	/*===== KATALOG BELANJA =====*/
	public function katalogbelanja()
	{
		$data_setting = $this->blog_model->get_setting()->result_array();
		$data = array(
			'site_title' => $data_setting[0]['title'] . ' - Katalog Belanja',
			'page_title' => 'Katalog Belanja',
			'category' => $this->blog_model->get_product_category()->result_array(),				
			'product' => $this->blog_model->get_product("where active='Y' and menu='catalog' order by date")->result_array(),
			'frecent_post' => $this->blog_model->get_post("where active='Y' AND category='1' order by date desc limit 2")->result_array(),
			'fsiaran_pers' => $this->blog_model->get_post("where active='Y' AND category='2' order by date desc limit 2")->result_array()
		);
		$menu_id 			= "46";  
		$d['data'] 			= $data;
		$d['head'] 			= $this->load->view('page/head',$data,TRUE);
		$d['navbar']		= $this->get_nav();
		$d['sidebar']		= $this->get_sidebar($menu_id);	
		$d['breadcrumb'] 	= $this->load->view('page/breadcrumb','',TRUE);
		$d['footer'] 		= $this->load->view('page/footer','',TRUE);				
		$this->load->view('page/product',$d);
	}	

	/*===== KATALOG PROMO =====*/
	public function promo()
	{
		$data_setting = $this->blog_model->get_setting()->result_array();
		$data = array(
			'site_title' => $data_setting[0]['title'] . ' - Promo',
			'page_title' => 'Promo Belanja',
			'category' => $this->blog_model->get_product_category()->result_array(),				
			'product' => $this->blog_model->get_product("where active='Y' and menu='promo' and category='4' order by date desc")->result_array(),
			'product2' => $this->blog_model->get_product("where active='Y' and menu='promo' and category='13' order by date desc")->result_array(),
			'product3' => $this->blog_model->get_product("where active='Y' and menu='promo' and category='14' order by date desc")->result_array(),
			'product4' => $this->blog_model->get_product("where active='Y' and menu='promo' and category='15' order by date desc")->result_array(),
			'product5' => $this->blog_model->get_product("where active='Y' and menu='promo' and category='16' order by date desc")->result_array(),
			'product6' => $this->blog_model->get_product("where active='Y' and menu='promo' and category='17' order by date desc")->result_array(),
			'product7' => $this->blog_model->get_product("where active='Y' and menu='promo' and category='19' order by date desc")->result_array(),
			'product8' => $this->blog_model->get_product("where active='Y' and menu='promo' and category='20' order by date desc")->result_array(),		
			'product9' => $this->blog_model->get_product("where active='Y' and menu='promo' and category='21' order by date desc")->result_array(),	
			'product10' => $this->blog_model->get_product("where active='Y' and menu='promo' and category='3' order by date desc")->result_array(),									
			'frecent_post' => $this->blog_model->get_post("where active='Y' AND category='1' order by date desc limit 2")->result_array(),
			'fsiaran_pers' => $this->blog_model->get_post("where active='Y' AND category='2' order by date desc limit 2")->result_array()
		);
		$menu_id 			= "46";  
		$d['data'] 			= $data;
		$d['head'] 			= $this->load->view('page/head',$data,TRUE);
		$d['navbar']		= $this->get_nav();
		$d['sidebar']		= $this->get_sidebar($menu_id);	
		$d['breadcrumb'] 	= $this->load->view('page/breadcrumb','',TRUE);
		$d['footer'] 		= $this->load->view('page/footer','',TRUE);				
		$this->load->view('page/promo',$d);
	}	

	/*===== Laporan Tahunan =====*/
	public function laporantahunan($num=0)
	{
		$data_setting = $this->blog_model->get_setting()->result_array();
		$data = array(
			'site_title' => $data_setting[0]['title'] . ' - Laporan Tahunan',
			'page_title' => 'Laporan Tahunan',			
			'product' => $this->blog_model->get_hubinvestor("where category='4' order by `year` desc")->result_array(),
			'product_lanjut' => $this->blog_model->get_hubinvestor("where category='1' order by `year` desc")->result_array(),
			'frecent_post' => $this->blog_model->get_post("where active='Y' AND category='1' order by date desc limit 2")->result_array(),
			'fsiaran_pers' => $this->blog_model->get_post("where active='Y' AND category='2' order by date desc limit 2")->result_array()
		);
		$menu_id 			= "98";  //Hubungan investor
		$d['data'] 			= $data;
		$d['head'] 			= $this->load->view('page/head',$data,TRUE);
		$d['navbar']		= $this->get_nav();
		$d['sidebar']		= $this->get_sidebar($menu_id);	
		$d['breadcrumb'] 	= $this->load->view('page/breadcrumb','',TRUE);
		$d['footer'] 		= $this->load->view('page/footer','',TRUE);				
		$this->load->view('page/laporan-tahunan',$d);
	}	

	/*===== Laporan Keuangan Tahunan =====*/
	public function laporankeutahun($num=0)
	{
		$config = array();
		$content = $this->blog_model->get_hubinvestor("where category=1 ")->result_array();
		$count = $this->blog_model->get_count("hub_investor","where category=1");
		$tahun = $this->blog_model->select_distinct('hub_investor','`year`','and category=1 order by `year` DESC');
		$data_setting = $this->blog_model->get_setting()->result_array();
		//pagination
		// $this->load->library('pagination');
		// $config['base_url'] = base_url('page/laporan-keuangan-tahunan/');
		// $config['total_rows'] = $count[0]['idx'];
		// $config['per_page'] = 50;
		// $config['use_page_numbers'] = TRUE;
		// $config['cur_tag_open'] = '<a>';
		// $config['cur_tag_close'] = '</a>';
		// $config['next_link'] = 'Next';
		// $config['prev_link'] = 'Previous';
		// $this->pagination->initialize($config);
		
		$data = array(
			'site_title' => $data_setting[0]['title'] . ' - Laporan Keuangan Tahunan',
			'links' => $this->pagination->create_links() ,
			'content' => $content,
			'tahun' => $tahun,
			'frecent_post' => $this->blog_model->get_post("where active='Y' AND category='1' order by date desc limit 2")->result_array(),
			'fsiaran_pers' => $this->blog_model->get_post("where active='Y' AND category='2' order by date desc limit 2")->result_array()
		);
		$menu_id 			= "98"; //Hubungan investor
		$d['data'] 			= $content;
		$d['head'] 			= $this->load->view('page/head',$data,TRUE);
		$d['navbar']		= $this->get_nav();
		$d['sidebar']		= $this->get_sidebar($menu_id);		
		$d['breadcrumb'] 	= $this->load->view('page/breadcrumb','',TRUE);
		$d['footer'] 		= $this->load->view('page/footer','',TRUE);				
			
		$this->load->view('page/laporan-keuangan',$d);
	}	

	/*===== Laporan Keuangan triwulan =====*/
	public function laporankeutriwulan($num=0)
	{
		$config = array();
		$content = $this->blog_model->get_hubinvestor("where category=2 ")->result_array();
		$count = $this->blog_model->get_count("hub_investor","where category=2");
		$tahun = $this->blog_model->select_distinct('hub_investor','`year`','and category=2 order by `year` DESC');
		$data_setting = $this->blog_model->get_setting()->result_array();
		//pagination
		// $this->load->library('pagination');
		// $config['base_url'] = base_url('page/laporan-keuangan-triwulan/');
		// $config['total_rows'] = $count[0]['idx'];
		// $config['per_page'] = 50;
		// $config['use_page_numbers'] = TRUE;
		// $config['cur_tag_open'] = '<a>';
		// $config['cur_tag_close'] = '</a>';
		// $config['next_link'] = 'Next';
		// $config['prev_link'] = 'Previous';
		// $this->pagination->initialize($config);
		
		$data = array(
			'site_title' => $data_setting[0]['title'] . ' - Laporan Keuangan Triwulan',
			'links' => $this->pagination->create_links() ,
			'content' => $content,
			'tahun' => $tahun,
			'frecent_post' => $this->blog_model->get_post("where active='Y' AND category='1' order by date desc limit 2")->result_array(),
			'fsiaran_pers' => $this->blog_model->get_post("where active='Y' AND category='2' order by date desc limit 2")->result_array()
		);
		$menu_id 			= "98"; //Hubungan investor
		$d['data'] 			= $content;

		$d['head'] 			= $this->load->view('page/head',$data,TRUE);
		$d['navbar']		= $this->get_nav();
		$d['sidebar']		= $this->get_sidebar($menu_id);		
		$d['breadcrumb'] 	= $this->load->view('page/breadcrumb','',TRUE);
		$d['footer'] 		= $this->load->view('page/footer','',TRUE);				
			
		$this->load->view('page/laporan-keuangan-triwulan',$d);
	}	

	/*===== Laporan Keuangan triwulan =====*/
	public function laporankeutriwulankonsolidasi($num=0)
	{
		$config = array();
		$content = $this->blog_model->get_hubinvestor("where category=6 ")->result_array();
		$count = $this->blog_model->get_count("hub_investor","where category=6");
		$tahun = $this->blog_model->select_distinct('hub_investor','`year`','and category=6 order by `year` DESC');
		$data_setting = $this->blog_model->get_setting()->result_array();
		//pagination
		// $this->load->library('pagination');
		// $config['base_url'] = base_url('page/laporan-keuangan-triwulan-konsolidasi/');
		// $config['total_rows'] = $count[0]['idx'];
		// $config['per_page'] = 50;
		// $config['use_page_numbers'] = TRUE;
		// $config['cur_tag_open'] = '<a>';
		// $config['cur_tag_close'] = '</a>';
		// $config['next_link'] = 'Next';
		// $config['prev_link'] = 'Previous';
		// $this->pagination->initialize($config);
		
		$data = array(
			'site_title' => $data_setting[0]['title'] . ' - Laporan Keuangan Triwulan Konsolidasi',
			'links' => $this->pagination->create_links() ,
			'content' => $content,
			'tahun' => $tahun,
			'frecent_post' => $this->blog_model->get_post("where active='Y' AND category='1' order by date desc limit 2")->result_array(),
			'fsiaran_pers' => $this->blog_model->get_post("where active='Y' AND category='2' order by date desc limit 2")->result_array()
		);
		$menu_id 			= "98"; //Hubungan investor
		$d['data'] 			= $content;

		$d['head'] 			= $this->load->view('page/head',$data,TRUE);
		$d['navbar']		= $this->get_nav();
		$d['sidebar']		= $this->get_sidebar($menu_id);		
		$d['breadcrumb'] 	= $this->load->view('page/breadcrumb','',TRUE);
		$d['footer'] 		= $this->load->view('page/footer','',TRUE);				
			
		$this->load->view('page/laporan-keuangan-triwulan-konsolidasi',$d);
	}

	/*===== Laporan Keuangan triwulan =====*/
	public function laporankeutriwulanlikuiditas($num=0)
	{
		$config = array();
		$content = $this->blog_model->get_hubinvestor("where category=7 ")->result_array();
		$count = $this->blog_model->get_count("hub_investor","where category=7");
		$tahun = $this->blog_model->select_distinct('hub_investor','`year`','and category=7 order by `year` DESC');
		$data_setting = $this->blog_model->get_setting()->result_array();
		//pagination
		// $this->load->library('pagination');
		// $config['base_url'] = base_url('page/laporan-keuangan-triwulan-likuiditas/');
		// $config['total_rows'] = $count[0]['idx'];
		// $config['per_page'] = 50;
		// $config['use_page_numbers'] = TRUE;
		// $config['cur_tag_open'] = '<a>';
		// $config['cur_tag_close'] = '</a>';
		// $config['next_link'] = 'Next';
		// $config['prev_link'] = 'Previous';
		// $this->pagination->initialize($config);
		
		$data = array(
			'site_title' => $data_setting[0]['title'] . ' - Laporan Keuangan Triwulan Likuiditas',
			'links' => $this->pagination->create_links() ,
			'content' => $content,
			'tahun' => $tahun,
			'frecent_post' => $this->blog_model->get_post("where active='Y' AND category='1' order by date desc limit 2")->result_array(),
			'fsiaran_pers' => $this->blog_model->get_post("where active='Y' AND category='2' order by date desc limit 2")->result_array()
		);
		$menu_id 			= "98"; //Hubungan investor
		$d['data'] 			= $content;

		$d['head'] 			= $this->load->view('page/head',$data,TRUE);
		$d['navbar']		= $this->get_nav();
		$d['sidebar']		= $this->get_sidebar($menu_id);		
		$d['breadcrumb'] 	= $this->load->view('page/breadcrumb','',TRUE);
		$d['footer'] 		= $this->load->view('page/footer','',TRUE);				
			
		$this->load->view('page/laporan-keuangan-triwulan-likuiditas',$d);
	}

	/*===== Laporan Keuangan bulanan =====*/
	public function laporankeubulanan($num=0)
	{
		$config = array();
		$content = $this->blog_model->get_hubinvestor("where category=3 ")->result_array();
		$count = $this->blog_model->get_count("hub_investor","where category=3");
		$tahun = $this->blog_model->select_distinct('hub_investor','`year`','and category=3 order by `year` DESC');
		$data_setting = $this->blog_model->get_setting()->result_array();
		//pagination
		// $this->load->library('pagination');
		// $config['base_url'] = base_url('page/laporan-keuangan-bulanan/');
		// $config['total_rows'] = $count[0]['idx'];
		// $config['per_page'] = 50;
		// $config['use_page_numbers'] = TRUE;
		// $config['cur_tag_open'] = '<a>';
		// $config['cur_tag_close'] = '</a>';
		// $config['next_link'] = 'Next';
		// $config['prev_link'] = 'Previous';
		// $this->pagination->initialize($config);
		
		$data = array(
			'site_title' => $data_setting[0]['title'] . ' - Laporan Keuangan Bulanan',
			'links' => $this->pagination->create_links() ,
			'content' => $content,
			'tahun' => $tahun,
			'frecent_post' => $this->blog_model->get_post("where active='Y' AND category='1' order by date desc limit 2")->result_array(),
			'fsiaran_pers' => $this->blog_model->get_post("where active='Y' AND category='2' order by date desc limit 2")->result_array()
		);
		$menu_id 			= "98"; //Hubungan investor
		$d['data'] 			= $content;

		$d['head'] 			= $this->load->view('page/head',$data,TRUE);
		$d['navbar']		= $this->get_nav();
		$d['sidebar']		= $this->get_sidebar($menu_id);		
		$d['breadcrumb'] 	= $this->load->view('page/breadcrumb','',TRUE);
		$d['footer'] 		= $this->load->view('page/footer','',TRUE);				
			
		$this->load->view('page/laporan-keuangan-bulanan',$d);
	}

	/*===== temuanalis =====*/
	public function temuanalis($num=0)
	{
		$data_setting = $this->blog_model->get_setting()->result_array();
		$data = array(
			'site_title' => $data_setting[0]['title'] . ' - Temu Analis',
			'page_title' => 'Temu Analis',			
			'product' => $this->blog_model->get_hubinvestor("where category='9' order by `year` desc")->result_array(),
			'frecent_post' => $this->blog_model->get_post("where active='Y' AND category='1' order by date desc limit 2")->result_array(),
			'fsiaran_pers' => $this->blog_model->get_post("where active='Y' AND category='2' order by date desc limit 2")->result_array()
		);
		$menu_id 			= "98";  //Hubungan investor
		$d['data'] 			= $data;
		$d['head'] 			= $this->load->view('page/head',$data,TRUE);
		$d['navbar']		= $this->get_nav();
		$d['sidebar']		= $this->get_sidebar($menu_id);	
		$d['breadcrumb'] 	= $this->load->view('page/breadcrumb','',TRUE);
		$d['footer'] 		= $this->load->view('page/footer','',TRUE);				
		$this->load->view('page/temu-analis',$d);
	}	
	/*===== Public Expose =====*/
	public function publicexpose($num=0)
	{
		$data_setting = $this->blog_model->get_setting()->result_array();
		$data = array(
			'site_title' => $data_setting[0]['title'] . ' - Public Expose',
			'page_title' => 'Public Expose',			
			'product' => $this->blog_model->get_hubinvestor("where category='8' order by `year` desc")->result_array(),
			'frecent_post' => $this->blog_model->get_post("where active='Y' AND category='1' order by date desc limit 2")->result_array(),
			'fsiaran_pers' => $this->blog_model->get_post("where active='Y' AND category='2' order by date desc limit 2")->result_array()
		);
		$menu_id 			= "98";  //Hubungan investor
		$d['data'] 			= $data;
		$d['head'] 			= $this->load->view('page/head',$data,TRUE);
		$d['navbar']		= $this->get_nav();
		$d['sidebar']		= $this->get_sidebar($menu_id);	
		$d['breadcrumb'] 	= $this->load->view('page/breadcrumb','',TRUE);
		$d['footer'] 		= $this->load->view('page/footer','',TRUE);				
		$this->load->view('page/public-expose',$d);
	}	
	/*===== PAGES =====*/
	public function pages($code = 0)
	{
		
		$data_setting = $this->blog_model->get_setting()->result_array();
		$data_content = $this->blog_model->get_page("where id_page ='$code'")->result_array();
		$data = array(
			'site_title' => $data_setting[0]['title'] . ' - ' . $data_content[0]['title'],
			'content' => $data_content,
			'frecent_post' => $this->blog_model->get_post("where active='Y' AND category='1' order by date desc limit 2")->result_array(),
			'fsiaran_pers' => $this->blog_model->get_post("where active='Y' AND category='2' order by date desc limit 2")->result_array()
		);
		$d['data'] 			= $data;
		$d['head'] 			= $this->load->view('page/head',$data,TRUE);
		$d['navbar']		= $this->get_nav();
		$d['sidebar']		= $this->get_sidebar($data_content[0]['id_menu']);		
		$d['breadcrumb'] 	= $this->load->view('page/breadcrumb','',TRUE);
		$d['footer'] 		= $this->load->view('page/footer','',TRUE);

		$this->load->view('page/pages',$d);	
	}

	/*===== READ =====*/
	public function read($code = 0)
	{
		$this->cookiesetter($code);
		$data_setting = $this->blog_model->get_setting()->result_array();
		$data_content = $this->blog_model->get_post("where post.id_post ='$code'")->result_array();
		$page_config = array(
			'full_tag_open' => '<ul class="pager">',
			'full_tag_close' => '</ul>'
		);
		$data = array(
			'site_title' => $data_setting[0]['title'] . ' - ' . $data_content[0]['title'],
			'editor' => $data_content[0]['editor'],
			'titlecontent' => $data_content[0]['title'],
			'popular_post' => $this->blog_model->get_post("WHERE active='Y' ORDER BY hits DESC LIMIT 5")->result_array() ,
			'recent_post' => $this->blog_model->get_post("WHERE active='Y' ORDER BY date DESC LIMIT 5")->result_array() ,
			'content' => $data_content,
			'frecent_post' => $this->blog_model->get_post("where active='Y' AND category='1' order by date desc limit 2")->result_array(),
			'fsiaran_pers' => $this->blog_model->get_post("where active='Y' AND category='2' order by date desc limit 2")->result_array()
		);
		$menu_id 			= "119"; //INFO TERBARU
		$d['data'] 			= $data;
		$d['head'] 			= $this->load->view('page/head',$data,TRUE);
		$d['navbar']		= $this->get_nav();
		$d['sidebar']		= $this->get_sidebar($menu_id);		
		$d['breadcrumb'] 	= $this->load->view('page/breadcrumb','',TRUE);
		$d['footer'] 		= $this->load->view('page/footer','',TRUE);				
		$this->load->view('page/read',$d);		
	}

	public function searchresult()
	{
		$config = array();
		$config["base_url"] = base_url() . "page/seachresult";
		$total_row = $this->pagination_blog_model->record_count();
		$config["total_rows"] = $total_row;
		$config["per_page"] = 4;
		$config['use_page_numbers'] = TRUE;
		$config['num_links'] = $total_row;
		$config['cur_tag_open'] = '<a>';
		$config['cur_tag_close'] = '</a>';
		$config['next_link'] = 'Next';
		$config['prev_link'] = 'Previous';
		$config["uri_segment"] = 3;
		$this->pagination->initialize($config);
		$page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
		$data_setting = $this->blog_model->get_setting()->result_array();
		$keyword = $this->input->post('keyword');
		
		$data = array(
			'nama_band' => $this->blog_model->get_post()->result_array() , 
			'site_title' => $data_setting[0]['title'] . ' - Search Result',
			'links' => $this->pagination->create_links(),
			'results' => $this->pagination_blog_model->fetch_blog($config["per_page"], $page) ,
			'seachresult' => $this->blog_model->search($keyword),
			'frecent_post' => $this->blog_model->get_post("where active='Y' AND category='1' order by date desc limit 2")->result_array(),
			'fsiaran_pers' => $this->blog_model->get_post("where active='Y' AND category='2' order by date desc limit 2")->result_array()
		);

		$menu_id 			= "1"; //TENTANG BUKOPIN
		$d['data'] 			= $data;
		$d['head'] 			= $this->load->view('page/head',$data,TRUE);
		$d['navbar']		= $this->get_nav();
		$d['sidebar']		= $this->get_sidebar($menu_id);		
		$d['breadcrumb'] 	= $this->load->view('page/breadcrumb','',TRUE);
		$d['footer'] 		= $this->load->view('page/footer','',TRUE);		
	
		$this->load->view('page/searchresult',$d);	
	}

	function aplikasionline()
	{
		if($_SERVER['REQUEST_METHOD']=='POST'){
			//Array ( [id_post] => 29 [images] => http://dgwhost.com/bukopin/assets/images/samsung-j5.png [title] => Samsung Galaxy J5 [price] => 2400000 [discount] => [kode] => [full_name] => Nama Lengkap [birthdate] => 10/01/2016 [phone_cell] => 12345 [phone] => 12345 [sex] => male [button] => )
			$birthdate = date("Y-m-d",strtotime($_POST['birthdate']));
			$tiket = generateRandomString(10);
     		$data = array(
			  'id_post' => $this->input->post('id_post'),
		      'images' => $this->input->post('images'),
		      'title' => $this->input->post('title'),		      
		      'price' => $this->input->post('price'),
		      'discount' => $this->input->post('discount'),
		      'kode' => $this->input->post('kode'),
		      'full_name' => $this->input->post('full_name'),
		      'birthdate' => $birthdate,
		      'phone_cell' => $this->input->post('phone_cell'),
		      'phone' => $this->input->post('phone'),
		      'sex' => $this->input->post('sex'),
		      'tanggal' => date("Y-m-d H:i:s"),
		      'email' => $this->input->post('email'),
		      'notiket' => $tiket
      		);
      		//todo insert DB
      		if($this->blog_model->insert_data('aplikasi_online',$data)){
      			redirect(site_url('page/thanks/'.$tiket),'refresh');
      		}else{
      			redirect(site_url('page/aplikasionline'),'refresh');      			
      		}
				

		}else{
			$data_setting = $this->blog_model->get_setting()->result_array();
			$data = array(
				'site_title' => $data_setting[0]['title'] . ' - Pembukaan Rekening Online',
				'frecent_post' => $this->blog_model->get_post("where active='Y' AND category='1' order by date desc limit 2")->result_array(),
				'fsiaran_pers' => $this->blog_model->get_post("where active='Y' AND category='2' order by date desc limit 2")->result_array()
			);

			$c['id_post'] = $this->session->userdata('id_post');
			$c['images'] = $this->session->userdata('images');
			$c['title'] = $this->session->userdata('title');
			$c['price'] = $this->session->userdata('price');
			$c['discount'] = $this->session->userdata('discount');
			$c['kode'] = $this->session->userdata('kode');		
			
			$menu_id 			= "46"; //Produk kredit
			$d['data'] 			= $data;
			$d['content'] 		= $c;
			$d['head'] 			= $this->load->view('page/head',$data,TRUE);
			$d['navbar']		= $this->get_nav();
			$d['sidebar']		= $this->get_sidebar($menu_id);		
			$d['breadcrumb'] 	= $this->load->view('page/breadcrumb','',TRUE);
			$d['footer'] 		= $this->load->view('page/footer','',TRUE);

			$this->load->view('page/aplikasi-online',$d);					
		}
			
	}

	function thanks($tiket=""){
		$data_setting = $this->blog_model->get_setting()->result_array();
		$data = array(
			'site_title' => $data_setting[0]['title'] . ' - Terimakasih ',
			'frecent_post' => $this->blog_model->get_post("where active='Y' AND category='1' order by date desc limit 2")->result_array(),
			'fsiaran_pers' => $this->blog_model->get_post("where active='Y' AND category='2' order by date desc limit 2")->result_array(),
			'tiket' => $tiket
		);	
		
		$menu_id 			= "46"; //Produk kredit
		$d['data'] 			= $data;
		$d['tiket'] 		= $tiket;
		$d['head'] 			= $this->load->view('page/head',$data,TRUE);
		$d['navbar']		= $this->get_nav();
		$d['sidebar']		= $this->get_sidebar($menu_id);		
		$d['breadcrumb'] 	= $this->load->view('page/breadcrumb','',TRUE);
		$d['footer'] 		= $this->load->view('page/footer','',TRUE);

		$this->load->view('page/thanks',$d);										
	}

	function thanksbelanja(){
		$data_setting = $this->blog_model->get_setting()->result_array();
		$data = array(
			'site_title' => $data_setting[0]['title'] . ' - Terimakasih ',
			'frecent_post' => $this->blog_model->get_post("where active='Y' AND category='1' order by date desc limit 2")->result_array(),
			'fsiaran_pers' => $this->blog_model->get_post("where active='Y' AND category='2' order by date desc limit 2")->result_array()
		);	
		
		$menu_id 			= "46"; //Produk kredit
		$d['data'] 			= $data;
		$d['head'] 			= $this->load->view('page/head',$data,TRUE);
		$d['navbar']		= $this->get_nav();
		$d['sidebar']		= $this->get_sidebar($menu_id);		
		$d['breadcrumb'] 	= $this->load->view('page/breadcrumb','',TRUE);
		$d['footer'] 		= $this->load->view('page/footer','',TRUE);

		$this->load->view('page/thanks-belanja',$d);	
	}

	function submitproduct()
	{
		if($_SERVER['REQUEST_METHOD']=='POST'){	
			$this->load->helper('captcha');
			$ses['id_post'] = $this->input->post('id_post');
			$ses['images'] = $this->input->post('images');
			$ses['title'] = $this->input->post('title');
			$ses['price'] = $this->input->post('price');
			$ses['discount'] = $this->input->post('discount');
			$ses['kode'] = $this->input->post('kode');			
			$this->session->set_userdata($ses);
			// numeric random number for captcha
			$random_number = substr(number_format(time() * rand(),0,'',''),0,6);
			// setting up captcha config
			$vals = array(
			        'word'          => $random_number,
			        'img_path'      => 'assets/img/captcha/',
			        'img_url'       => site_url('assets/img/captcha'),			        
			        'img_width'     => '150',
			        'img_height'    => 30,
			        'expiration'    => 7200,
			        'word_length'   => 8,
			        'font_size'     => 16,
			        'img_id'        => 'Imageid',
			        'pool'          => '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ',

			        // White background and border, black text and red grid
			        'colors'        => array(
			                'background' => array(255, 255, 255),
			                'border' => array(255, 255, 255),
			                'text' => array(0, 0, 0),
			                'grid' => array(255, 40, 40)
			        )
			);
			$captcha = create_captcha($vals);
			$this->session->set_userdata('captchaWord',$captcha['word']);      
			$data_setting = $this->blog_model->get_setting()->result_array();
			$data = array(
				'site_title' => $data_setting[0]['title'] . ' - Terimakasih ',
				'frecent_post' => $this->blog_model->get_post("where active='Y' AND category='1' order by date desc limit 2")->result_array(),
				'fsiaran_pers' => $this->blog_model->get_post("where active='Y' AND category='2' order by date desc limit 2")->result_array(),
				'content' => $ses,
				'captcha' => $captcha
			);			
			$menu_id 			= "46"; //Produk kredit
			$d['data'] 			= $data;
			$d['head'] 			= $this->load->view('page/head',$data,TRUE);
			$d['navbar']		= $this->get_nav();
			$d['sidebar']		= $this->get_sidebar($menu_id);		
			$d['breadcrumb'] 	= $this->load->view('page/breadcrumb','',TRUE);
			$d['footer'] 		= $this->load->view('page/footer','',TRUE);
			$this->load->view('page/aplikasi-katalog',$d);	
		}else{
			redirect(site_url('page/katalog-belanja'),'refresh');
		}
	}

	function prosespesanan(){
		if($_SERVER['REQUEST_METHOD']=='POST'){	
			//print_r($_POST);die();
			//Array ( [price] => 3000000 [kd_brg] => LNVK4N [title] => Lenovo K4 Note [jumlah] => 1 [cicilan] => 0 [ccno1] => 1231 [ccno2] => 1231 [ccno3] => 1231 [ccno4] => 1231 [berlakumm] => 11 [berlakuyy] => 2099 [full_name] => 123 [email] => 123123@asd.com [alamat] => asda [kota] => assd [kodepos] => 1233 [phone_home] => 123132 [phone_office] => 1231 [phone_mobile] => 312 [info_lain] => 123123 )

			$nomor_cc = $this->input->post('ccno1').'-'.$this->input->post('ccno2').'-'.$this->input->post('ccno3').'-'.$this->input->post('ccno4');
			$data['title'] = $this->input->post('title');
			$data['kd_brg'] = $this->input->post('kd_brg');
			$data['price'] = $this->input->post('price');
			$data['jumlah'] = $this->input->post('jumlah');
			$data['cicilan'] = $this->input->post('cicilan');
			$data['nomor_kartu'] = $nomor_cc;
			$data['bulan_berlaku'] = $this->input->post('berlakumm');	
			$data['tahun_berlaku'] = $this->input->post('berlakuyy');
			$data['nama'] = $this->input->post('full_name');
			$data['email'] = $this->input->post('email');
			$data['alamat'] = $this->input->post('alamat');
			$data['kota'] = $this->input->post('kota');
			$data['kode_pos'] = $this->input->post('kodepos');
			$data['telp_rmh'] = $this->input->post('phone_home');
			$data['telp_kantor'] = $this->input->post('phone_office');
			$data['telp_hp'] = $this->input->post('phone_mobile');
			$data['info_lain'] = $this->input->post('info_lain');
			
			$savedb = $this->blog_model->insert_data('pemesanan_barang',$data);
			redirect(site_url('page/thanksbelanja'),'refresh');
		}else{
			redirect(site_url('page/katalog-belanja'),'refresh');
		}
	}

 	/* =============== Event kalender ===================== */
 	public function kalenderacara()
 	{
		$data_setting = $this->blog_model->get_setting()->result_array();
		$date = date('Y-m-d H:i:s');
		$data = array(
		'site_title' => $data_setting[0]['title'] . ' - Kalender Acara',
		'frecent_post' => $this->blog_model->get_post("where active='Y' AND category='1' order by date desc limit 2")->result_array(),
		'fsiaran_pers' => $this->blog_model->get_post("where active='Y' AND category='2' order by date desc limit 2")->result_array(),
		'content' => $this->blog_model->get_kalender("where start_date>='$date' limit 5 ")->result_array()
		);

		$menu_id 			= "98"; //Tentang Bukopin
		$d['data'] 			= $data;
		$d['head'] 			= $this->load->view('page/head',$data,TRUE);
		$d['navbar']		= $this->get_nav();
		$d['sidebar']		= $this->get_sidebar($menu_id);		
		$d['breadcrumb'] 	= $this->load->view('page/breadcrumb','',TRUE);
		$d['footer'] 		= $this->load->view('page/footer','',TRUE);

		$this->load->view('page/calender-event',$d);	
 	}

	function getkalender($code=1){
		$content = $this->blog_model->get_kalender("order by id_event desc limit 50 ")->result_array();
  		// $data['monthly'] = array();
  		foreach ($content as $key => $val) {
  			if(!empty($val['start_date'])){
  				$sp1 = explode(" ", $val['start_date']);  				
  				$startdate = $sp1[0];
  				$starttime = $sp1[1];
  			}else{
  				$startdate = "";
  				$starttime = "";
  			}

  			if(!empty($val['end_date'])){
  				$sp2 = explode(" ", $val['end_date']);  
  				$enddate = $sp2[0];
  				$endtime = $sp2[1];		
  			}else{
  				$enddate = "";
  				$endtime = "";	
  			}


  			$data[] =array(
	  				'id' => $val['id_event'],
	  				'name' => $val['name'],
	  				'startdate' => $startdate,
	  				'enddate' => $enddate,
	  				'starttime' => $starttime,
	  				'endtime' => $endtime,
	  				'color' => $val['color'],
	  				'url' => $val['url']
  				 );

  		}
    	$dat['monthly'] = $data;

		print_r(json_encode($dat));
	}


	function getproduct($code=1,$type=1, $refpage="")
	{
		$d['content'] = $this->blog_model->get_product("where id_post = '$code'")->result_array();
                $d['refpage']   = $refpage;
//print_r($d['content']);

		if($type==1){
			$this->load->view('page/product_result',$d);
		}else{
			$this->load->view('page/promo_result',$d);			
		}
		//print_r($d['content']);
	}

	function getkabupaten($code=1){
		$content = $this->blog_model->get_kabupaten("where idprovinsi = '$code'")->result_array();
		print_r(json_encode($content));
	}

	function getPage($code=109){
		$content = $this->blog_model->get_page("where id_page = '$code'")->result_array();
		if(!empty($content)){
			$data = array('content'=>$content[0]['content']);
		}
		print_r(json_encode($data));
	}

	function getjaringan($code=1,$idjaringan=0,$idkota=0){
		if($code==1){
			$code="KANTOR";
		}elseif($code==3){
			$code="PEMASARAN";
		}else{
			$code="ATM";
		}

		if($idjaringan==0){
			$idjaringan =6;
		}
		if($idkota==0){
			$where ="where idprovinsi='$idjaringan' and type_jaringan = '$code' and lat<>'' and lng<>''";
		}else{
			$where ="where idprovinsi='$idjaringan' and type_jaringan = '$code' and idkabupaten= '$idkota' and lat<>'' and lng<>''";
		}
		$content = $this->blog_model->get_jaringan($where)->result_array();
		print_r(json_encode($content));
	}

	function get_sidebar($id='1'){
		$m1 = $this->blog_model->get_menu_by_id($id,0);
		$m2 = $this->blog_model->get_menu_by_id($id,1);
		$m3 = $this->blog_model->get_menu_by_id($id,2);
		$m4 = $this->blog_model->get_menu_by_id($id,3);

		$c1 = array();
		$c2 = array();
		$c3 = array();
		$c4 = array();

		$d['menu'] = $m1;
		$d['submenu'] = $m2;
		$d['submenulv2'] = $m3;
		$d['submenulv3'] = $m4;	

		foreach ($m1 as $k1 => $v1) {
			$c1[$v1['parent_menu']] = 
				array('ind_name'=>$v1['ind_name'],
						'eng_name' => $v1['eng_name'],
						'menu_link' => $v1['menu_link'],
						'id_menu'=> $v1['id_menu'],
						'status'=> $v1['status']
						); 
		}
		foreach ($m2 as $k2 => $v2) {
			$c2[$v2['parent_menu']] = 
				array('ind_name'=>$v2['ind_name'],
						'eng_name' => $v2['eng_name'],
						'menu_link' => $v2['menu_link'],
						'id_menu'=> $v2['id_menu'],
						'status'=> $v2['status']
						); 
		}
		foreach ($m3 as $k3 => $v3) {
			$c3[$v3['parent_menu']] = 
				array('ind_name'=>$v3['ind_name'],
						'eng_name' => $v3['eng_name'],
						'menu_link' => $v3['menu_link'],
						'id_menu'=> $v3['id_menu'],
						'status'=> $v3['status']
						); 
		}				
		foreach ($m4 as $k4 => $v4) {
			$c4[$v4['parent_menu']] = 
				array('ind_name'=>$v4['ind_name'],
						'eng_name' => $v4['eng_name'],
						'menu_link' => $v4['menu_link'],
						'id_menu'=> $v4['id_menu'],
						'status'=> $v4['status']
						); 
		}	

		$d['c1'] = $c1;
		$d['c2'] = $c2;
		$d['c3'] = $c3;
		$d['c4'] = $c4;		

		$data = $this->load->view('page/sidebarmenu', $d,TRUE);
		return $data;
	}

	function get_nav()
	{
		$m1 = $this->blog_model->get_menu_level(0);
		$m2 = $this->blog_model->get_menu_level(1);
		$m3 = $this->blog_model->get_menu_level(2);
		$m4 = $this->blog_model->get_menu_level(3);
		$c1 = array();
		$c2 = array();
		$c3 = array();
		$c4 = array();

		$d['menu'] = $m1;
		$d['submenu'] = $m2;
		$d['submenulv2'] = $m3;
		$d['submenulv3'] = $m4;

		foreach ($m1 as $k1 => $v1) {
			$c1[$v1['parent_menu']] = 
				array('ind_name'=>$v1['ind_name'],
						'eng_name' => $v1['eng_name'],
						'menu_link' => $v1['menu_link'],
						'id_menu'=> $v1['id_menu'],
						'status'=> $v1['status']
						); 
		}
		foreach ($m2 as $k2 => $v2) {
			$c2[$v2['parent_menu']] = 
				array('ind_name'=>$v2['ind_name'],
						'eng_name' => $v2['eng_name'],
						'menu_link' => $v2['menu_link'],
						'id_menu'=> $v2['id_menu'],
						'status'=> $v2['status']
						); 
		}
		foreach ($m3 as $k3 => $v3) {
			$c3[$v3['parent_menu']] = 
				array('ind_name'=>$v3['ind_name'],
						'eng_name' => $v3['eng_name'],
						'menu_link' => $v3['menu_link'],
						'id_menu'=> $v3['id_menu'],
						'status'=> $v3['status']
						); 
		}				
		foreach ($m4 as $k4 => $v4) {
			$c4[$v4['parent_menu']] = 
				array('ind_name'=>$v4['ind_name'],
						'eng_name' => $v4['eng_name'],
						'menu_link' => $v4['menu_link'],
						'id_menu'=> $v4['id_menu'],
						'status'=> $v4['status']
						); 
		}

		$d['c1'] = $c1;
		$d['c2'] = $c2;
		$d['c3'] = $c3;
		$d['c4'] = $c4;						
		// foreach ($menu as $key => $val) {
		// 	$submenu[$val['id_menu']]=array("ID"=>$val['ind_name'],"EN"=>$val['eng_name'],"menu_link"=>$val['menu_link']);			
		// }
		// $d['submenu']=$submenu;
		$data = $this->load->view('page/navmenu', $d,TRUE);
		return $data;
	}


	private function cookiesetter($code = 0)
		{
		if (!isset($_COOKIE[$code]))
			{
			$baseurl = $_SERVER['REMOTE_ADDR'];
			$content = $this->blog_model->get_post("where id_post = '$code'")->result_array();
			$result = $this->blog_model->update_data('post', array(
				'hits' => ($content[0]['hits'] + 1)
			) , array(
				'id_post' => $code
			));
			if ($result == 1)
				{
				setcookie($code, $baseurl, time() + 3600);
				}
			}
		}

	private function countervisitor()
		{
		if ($this->agent->is_browser())
			{
			$agent = $this->agent->browser() . ' ' . $this->agent->version();
			}
		elseif ($this->agent->is_robot())
			{
			$agent = $this->agent->robot();
			}
		elseif ($this->agent->is_mobile())
			{
			$agent = $this->agent->mobile();
			}
		  else
			{
			$agent = 'Unidentified User Agent';
			}

		$data_visitor = $this->blog_model->get_visitor("where ip = '" . $_SERVER['REMOTE_ADDR'] . "'")->result_array();
		if ($data_visitor == NULL)
			{
			$data = array(
				'ip' => $_SERVER['REMOTE_ADDR'],
				'os' => $this->agent->platform() ,
				'browser' => $agent,
				'tanggal' => date("Y-m-d H:i:s")
			);
			$this->blog_model->insert_data('visitor', $data);
			$this->session->set_userdata('vasola', "vasola");
			setcookie("vasola", 'vasola', time() + 3600 * 24);
			}
		  else
			{
			if (!isset($_COOKIE['vasola']))
				{
				$data_visitor = $this->blog_model->get_visitor("where ip = '" . $_SERVER['REMOTE_ADDR'] . "' and tanggal = '" . date("Y-m-d H:i:s") . "'");
				if ($data_visitor != NULL)
					{
					if (!$this->session->userdata('vasola'))
						{
						$data = array(
							'ip' => $_SERVER['REMOTE_ADDR'],
							'os' => $this->agent->platform() ,
							'browser' => $agent,
							'tanggal' => date("Y-m-d H:i:s")
						);
						$this->blog_model->insert_data('visitor', $data);
						$this->session->set_userdata('vasola', "vasola website");
						setcookie("vasola", 'vasola website', time() + 3600 * 24);
						}
					  else
						{
						setcookie("vasola", 'vasola website', time() + 3600 * 24);
						}
					}
				  else
					{
					$data = array(
						'ip' => $_SERVER['REMOTE_ADDR'],
						'os' => $this->agent->platform() ,
						'browser' => $agent,
						'tanggal' => date("Y-m-d H:i:s")
					);
					$this->blog_model->insert_data('visitor', $data);
					$this->session->set_userdata('vasola', "vasola website");
					setcookie("vasola", 'vasola website', time() + 3600 * 24);
					}
				}
			}
		}

	  public function check_captcha($str){
	    $word = $this->session->userdata('captchaWord');
	    if(strcmp(strtoupper($str),strtoupper($word)) == 0){
	      return true;
	    }else{	      
	      return false;
	    }
	  }

}
