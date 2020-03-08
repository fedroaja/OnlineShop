<?php 
defined('BASEPATH') or exit('No direct Script access allowed');

class Customer extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Model_1');
	}
	public function index()
	{
		$data['title'] = 'Transaction';
		$data['user'] = $this->db->get_where('admin', ['email' => $this->session->userdata('email')])->row_array();
		$data['orderan'] = $this->Model_1->get_order();
		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		//$this->load->view('admin/products', $data);
		$this->load->view('pages/customer.php', $data);
		//$this->load->view('templates/footer');
	}
}

?>