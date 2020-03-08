<?php

defined('BASEPATH') or exit('No direct Script access allowed');

class Details extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Model_1');
		$this->load->helper(array('form', 'url'));
	}
	public function index()
	{
		$data['title'] = 'Detail';
		$data['user'] = $this->db->get_where('admin', ['email' => $this->session->userdata('email')])->row_array();
		$id = $this->session->userdata('Pid');
		$data['js'] = $this->load->view('include/javascript.php', NULL, TRUE);
		$data['css'] = $this->load->view('include/css.php', NULL, TRUE);
		$data['header'] = $this->load->view('pages/header.php', $data, TRUE);
		$data['product'] = $this->Model_1->get_product_detail($id);
		$this->load->view('pages/detail.php', $data);
	}
	public function detail_barang()
	{
		$data = $this->input->post('id');
		$this->session->set_userdata('Pid', $data);
		return "ok";
	}
	public function add_cart()
	{
		$B_I = $this->input->post('B_I');
		$C_I = $this->input->post('C_I');
		$price = $this->input->post('price');
		$jumlah = $this->input->post('jumlah');
		$data = array(			
			'ID_User' 	=> $C_I,
			'ID_Barang' => $B_I,
			'C_Jumlah' 	=> $jumlah,
			'harga'		=> $price,
			'done'		=> '0'
		);
		$this->Model_1->insert_cart('cart', $data);
		redirect('home');
	}
}
