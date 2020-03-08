<?php

defined('BASEPATH') or exit('No direct Script access allowed');

class Product extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Model_1');
    }
     public function index()
    {
        $data['title'] = 'Products';
        $data['Psearch'] = $this->session->userdata('Psearch');
        $data['Pcategory'] = $this->session->userdata('Pcategory');
        $data['js2'] = $this->load->view('include/javascript2.php', NULL, TRUE);
        $data['css'] = $this->load->view('include/css.php', NULL, TRUE);
        $data['user'] = $this->db->get_where('admin', ['email' => $this->session->userdata('email')])->row_array();
        $data['header'] = $this->load->view('pages/header.php', $data, TRUE);
        $data['product'] = $this->Model_1->get_product();
        $this->load->view('pages/product.php', $data);
    }
    public function filter_data()
    {
        $minPrice = $this->input->post('min_price');
        $maxPrice = $this->input->post('max_price');
        $brand = $this->input->post('brand');
        $color = $this->input->post('color');
        $search = $this->input->post('search');
        $genre = $this->input->post('genre');
        $output = $this->Model_1->filter_data_barang($minPrice, $maxPrice, $brand, $color, $search, $genre);
        echo json_encode($output);
    }
    public function brand_menu()
    {
        $data = $this->input->post('brand');
        $this->session->set_userdata('Psearch', $data);
        return "ok";
    }
    public function category_menu()
    {
        $data = $this->input->post('category');
        $this->session->set_userdata('Pcategory',$data);
        return "ok";
    }
}
