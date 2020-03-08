<?php

defined('BASEPATH') or exit('No direct Script access allowed');

class Home extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Model_1');
	}

	public function index()
	{
		$data['title'] = 'Kickshop';
		$this->session->unset_userdata('Pcategory');
		$this->session->unset_userdata('Psearch');
		$data['user'] = $this->db->get_where('admin', ['email' => $this->session->userdata('email')])->row_array();
		$data['header'] = $this->load->view('pages/header.php', $data, TRUE);
		$data['js'] = $this->load->view('include/javascript2.php', NULL, TRUE);
		$data['css'] = $this->load->view('include/css.php', NULL, TRUE);
		$data['barang'] = $this->Model_1->get_product_home();
		$this->load->view('pages/home.php', $data);
	}
	
	 
}
