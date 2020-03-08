<?php 
defined('BASEPATH') OR exit('No direct Script access allowed');

class checkout extends CI_Controller{
	public function __construct(){
		parent::__construct();
		$this->load->model('Model_1');
        $this->load->helper(array('form', 'url'));
	}
	public function index(){
		$data['user'] = $this->db->get_where('admin', ['email' => $this->session->userdata('email')])->row_array();
		$data['js'] = $this->load->view('include/javascript2.php',NULL, TRUE);
		$data['css'] = $this->load->view('include/css.php',NULL, TRUE);
		$data['header'] = $this->load->view('pages/header.php', $data, TRUE);
		$data['footer'] = $this->load->view('pages/footer.php',NULL, TRUE);
		$data['list'] = $this->Model_1->get_cart($data['user']);
		$this->load->view('pages/checkout.php',$data);
	}
	public function done(){
		$id = $this->input->post('id');
		$adrs = $this->input->post('alamat');
		$x = $this->Model_1->done_cart($id,$adrs);
		echo json_encode($x);
	}
}
?>