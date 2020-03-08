<?php

defined('BASEPATH') or exit('No direct Script access allowed');

class Cart extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Model_1');
		$this->load->helper(array('form', 'url'));
	}
	public function index()
	{
		$data['title'] = 'My Cart';
		$data['user'] = $this->db->get_where('admin', ['email' => $this->session->userdata('email')])->row_array();
		$data['js'] = $this->load->view('include/javascript.php', NULL, TRUE);
		$data['css'] = $this->load->view('include/css.php', NULL, TRUE);
		$data['header'] = $this->load->view('pages/header.php', $data, TRUE);
		$data['list'] = $this->Model_1->get_cart($data['user']);
		//$data['product'] = $this->Model_1->get_product_detail($id);
		$this->load->view('pages/cart.php', $data);
	}
	public function del()
	{
		$id = $this->input->post('id');
		$this->Model_1->delete_cart($id);
	}
	 public function update()
 	{
 	 	$id = $this->input->post('id');
 	 	$st = $this->input->post('st');
 	 	$this->Model_1->update_cart($st,$id);
	
 	}
	
}
