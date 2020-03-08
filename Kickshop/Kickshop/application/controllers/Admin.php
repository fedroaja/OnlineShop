<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
        $this->load->model('Model_1');
    }

    public function index()
    {
        $data['title'] = 'Dashboard';
        $data['user'] = $this->db->get_where('admin', ['email' => $this->session->userdata('email')])->row_array();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/index', $data);
        $this->load->view('templates/footer');
    }


    public function role()
    {
        $data['title'] = 'Role';
        $data['user'] = $this->db->get_where('admin', ['email' => $this->session->userdata('email')])->row_array();

        $data['role'] = $this->db->get('user_role')->result_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/role', $data);
        $this->load->view('templates/footer');
    }

    public function roleAccess($role_id)
    {
        $data['title'] = 'Role Access';
        $data['user'] = $this->db->get_where('admin', ['email' => $this->session->userdata('email')])->row_array();

        $data['role'] = $this->db->get_where('user_role', ['id' => $role_id])->row_array();

        $this->db->where('id !=', 1);
        $data['menu'] = $this->db->get('user_menu')->result_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/role-access', $data);
        $this->load->view('templates/footer');
    }


    public function changeAccess()
    {
        $menu_id = $this->input->post('menuId');
        $role_id = $this->input->post('roleId');

        $data = [
            'role_id' => $role_id,
            'menu_id' => $menu_id
        ];

        $result = $this->db->get_where('user_access_menu', $data);

        if ($result->num_rows() < 1) {
            $this->db->insert('user_access_menu', $data);
        } else {
            $this->db->delete('user_access_menu', $data);
        }

        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Access Changed!</div>');
    }

    public function products()
    {
        $data['title'] = 'Products';
        $data['user'] = $this->db->get_where('admin', ['email' => $this->session->userdata('email')])->row_array();
        $data['product'] = $this->Model_1->get_product();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        //$this->load->view('admin/products', $data);
        $this->load->view('pages/admin.php', $data);
        //$this->load->view('templates/footer');
    }

    public function tambah_barang()
    {
        $id = $this->input->post('Pid');
        $name = $this->input->post('Pname');
        $brand = $this->input->post('Pbrand');
        $price = $this->input->post('Pprice');
        $desc = $this->input->post('Pdesc');
        $stock = $this->input->post('Pstock');
        $clr = "";
        foreach ($_POST['Pcolor'] as $key) {
            $clr .= $key . "_";
        }

        $clr = substr($clr, 0, -1);
        $ctg = "";
        foreach ($_POST['Pctg'] as $key) {
            $ctg .= $key . "_";
        }
        $ctg = substr($ctg, 0, -1);
        $size = "";
        foreach ($_POST['Psize'] as $key) {
            $size .= $key . "_";
        }
        $size = substr($size, 0, -1);


        $config['upload_path']          = './assets/foto/';
        $config['allowed_types']        = 'gif|jpg|png';
        $config['max_size']             = 0;
        $config['max_width']            = 0;
        $config['max_height']           = 0;

        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('Pphoto1')) {
            echo $this->upload->display_errors();
        } else {
            $file_name1 = $this->upload->file_name;
        }
        if (!$this->upload->do_upload('Pphoto2')) {
            echo $this->upload->display_errors();
        } else {
            $file_name2 = $this->upload->file_name;
        }
        if (!$this->upload->do_upload('Pphoto3')) {
            echo $this->upload->display_errors();
        } else {
            $file_name3 = $this->upload->file_name;
        }
        $data = array(
            'ID_Barang' => $id,
            'B_name' => $name,
            'B_Brand' => $brand,
            'B_size' => $size,
            'B_price' => $price,
            'B_color' => $clr,
            'B_category' => $ctg,
            'B_description' => $desc,
            'B_stock' => $stock,
            'B_photo' => $file_name1,
            'B_photo2' => $file_name2,
            'B_photo3' => $file_name3
        );
        $this->Model_1->insert_data_barang($data, 'barang');
        redirect('admin/products');
    }
    public function update_barang()
    {
        $id = $this->input->post('Pid');
        $name = $this->input->post('Pname');
        $brand = $this->input->post('Pbrand');
        $price = $this->input->post('Pprice');
        $desc = $this->input->post('Pdesc');
        $stock = $this->input->post('Pstock');
        $clr = "";
        foreach ($_POST['Pcolor'] as $key) {
            $clr .= $key . "_";
        }

        $clr = substr($clr, 0, -1);
        $ctg = "";
        foreach ($_POST['Pctg'] as $key) {
            $ctg .= $key . "_";
        }
        $ctg = substr($ctg, 0, -1);
        $size = "";
        foreach ($_POST['Psize'] as $key) {
            $size .= $key . "_";
        }
        $size = substr($size, 0, -1);

        if (file_exists($_FILES['Pphoto1']['tmp_name']) && file_exists($_FILES['Pphoto2']['tmp_name']) && file_exists($_FILES['Pphoto3']['tmp_name']) || is_uploaded_file($_FILES['Pphoto1']['tmp_name']) && is_uploaded_file($_FILES['Pphoto2']['tmp_name']) && is_uploaded_file($_FILES['Pphoto3']['tmp_name'])) {
            echo "kosong";
            $config['upload_path']          = './assets/foto/';
            $config['allowed_types']        = 'gif|jpg|png';
            $config['max_size']             = 0;
            $config['max_width']            = 0;
            $config['max_height']           = 0;

            $this->load->library('upload', $config);

            if (!$this->upload->do_upload('Pphoto1')) {
                echo $this->upload->display_errors();
            } else {
                $file_name1 = $this->upload->file_name;
            }
            if (!$this->upload->do_upload('Pphoto2')) {
                echo $this->upload->display_errors();
            } else {
                $file_name2 = $this->upload->file_name;
            }
            if (!$this->upload->do_upload('Pphoto3')) {
                echo $this->upload->display_errors();
            } else {
                $file_name3 = $this->upload->file_name;
            }
            $data = array(
                'B_name' => $name,
                'B_Brand' => $brand,
                'B_size' => $size,
                'B_price' => $price,
                'B_color' => $clr,
                'B_category' => $ctg,
                'B_description' => $desc,
                'B_stock' => $stock,
                'B_photo' => $file_name1,
                'B_photo2' => $file_name2,
                'B_photo3' => $file_name3
            );
            $where = array(
                'ID_Barang' => $id
            );
            $this->Model_1->update_data_barang($where, $data, 'barang');
            redirect('admin/products');
        }


        if (file_exists($_FILES['Pphoto1']['tmp_name']) && file_exists($_FILES['Pphoto2']['tmp_name']) || is_uploaded_file($_FILES['Pphoto1']['tmp_name']) && is_uploaded_file($_FILES['Pphoto2']['tmp_name'])) {
            echo "kosong";
            $config['upload_path']          = './assets/foto/';
            $config['allowed_types']        = 'gif|jpg|png';
            $config['max_size']             = 0;
            $config['max_width']            = 0;
            $config['max_height']           = 0;

            $this->load->library('upload', $config);

            if (!$this->upload->do_upload('Pphoto1')) {
                echo $this->upload->display_errors();
            } else {
                $file_name1 = $this->upload->file_name;
            }
            if (!$this->upload->do_upload('Pphoto2')) {
                echo $this->upload->display_errors();
            } else {
                $file_name2 = $this->upload->file_name;
            }
            $data = array(
                'B_name' => $name,
                'B_Brand' => $brand,
                'B_size' => $size,
                'B_price' => $price,
                'B_color' => $clr,
                'B_description' => $desc,
                'B_category' => $ctg,
                'B_stock' => $stock,
                'B_photo' => $file_name1,
                'B_photo2' => $file_name2
            );
            $where = array(
                'ID_Barang' => $id
            );
            $this->Model_1->update_data_barang($where, $data, 'barang');
            redirect('admin/products');
        }

        if (file_exists($_FILES['Pphoto1']['tmp_name']) && file_exists($_FILES['Pphoto3']['tmp_name']) || is_uploaded_file($_FILES['Pphoto1']['tmp_name']) && is_uploaded_file($_FILES['Pphoto3']['tmp_name'])) {
            echo "kosong";
            $config['upload_path']          = './assets/foto/';
            $config['allowed_types']        = 'gif|jpg|png';
            $config['max_size']             = 0;
            $config['max_width']            = 0;
            $config['max_height']           = 0;

            $this->load->library('upload', $config);

            if (!$this->upload->do_upload('Pphoto1')) {
                echo $this->upload->display_errors();
            } else {
                $file_name1 = $this->upload->file_name;
            }
            if (!$this->upload->do_upload('Pphoto3')) {
                echo $this->upload->display_errors();
            } else {
                $file_name3 = $this->upload->file_name;
            }
            $data = array(
                'B_name' => $name,
                'B_Brand' => $brand,
                'B_size' => $size,
                'B_price' => $price,
                'B_color' => $clr,
                'B_description' => $desc,
                'B_stock' => $stock,
                'B_category' => $ctg,
                'B_photo' => $file_name1,
                'B_photo3' => $file_name3
            );
            $where = array(
                'ID_Barang' => $id
            );
            $this->Model_1->update_data_barang($where, $data, 'barang');
            redirect('admin/products');
        }

        if (file_exists($_FILES['Pphoto2']['tmp_name']) && file_exists($_FILES['Pphoto3']['tmp_name']) || is_uploaded_file($_FILES['Pphoto2']['tmp_name']) && is_uploaded_file($_FILES['Pphoto3']['tmp_name'])) {
            echo "kosong";
            $config['upload_path']          = './assets/foto/';
            $config['allowed_types']        = 'gif|jpg|png';
            $config['max_size']             = 0;
            $config['max_width']            = 0;
            $config['max_height']           = 0;

            $this->load->library('upload', $config);

            if (!$this->upload->do_upload('Pphoto2')) {
                echo $this->upload->display_errors();
            } else {
                $file_name2 = $this->upload->file_name;
            }
            if (!$this->upload->do_upload('Pphoto3')) {
                echo $this->upload->display_errors();
            } else {
                $file_name3 = $this->upload->file_name;
            }
            $data = array(
                'B_name' => $name,
                'B_Brand' => $brand,
                'B_size' => $size,
                'B_price' => $price,
                'B_description' => $desc,
                'B_stock' => $stock,
                'B_color' => $clr,
                'B_category' => $ctg,
                'B_photo2' => $file_name2,
                'B_photo3' => $file_name3
            );
            $where = array(
                'ID_Barang' => $id
            );
            $this->Model_1->update_data_barang($where, $data, 'barang');
            redirect('admin/products');
        }



        if (file_exists($_FILES['Pphoto1']['tmp_name']) || is_uploaded_file($_FILES['Pphoto1']['tmp_name'])) {
            echo "kosong";
            $config['upload_path']          = './assets/foto/';
            $config['allowed_types']        = 'gif|jpg|png';
            $config['max_size']             = 0;
            $config['max_width']            = 0;
            $config['max_height']           = 0;

            $this->load->library('upload', $config);

            if (!$this->upload->do_upload('Pphoto1')) {
                echo $this->upload->display_errors();
            } else {
                $file_name1 = $this->upload->file_name;
            }
            $data = array(
                'B_name' => $name,
                'B_Brand' => $brand,
                'B_size' => $size,
                'B_price' => $price,
                'B_description' => $desc,
                'B_stock' => $stock,
                'B_color' => $clr,
                'B_category' => $ctg,
                'B_photo' => $file_name1
            );
            $where = array(
                'ID_Barang' => $id
            );
            $this->Model_1->update_data_barang($where, $data, 'barang');
            redirect('admin/products');
        }
        if (file_exists($_FILES['Pphoto2']['tmp_name']) || is_uploaded_file($_FILES['Pphoto2']['tmp_name'])) {
            echo "kosong";
            $config['upload_path']          = './assets/foto/';
            $config['allowed_types']        = 'gif|jpg|png';
            $config['max_size']             = 0;
            $config['max_width']            = 0;
            $config['max_height']           = 0;

            $this->load->library('upload', $config);

            if (!$this->upload->do_upload('Pphoto2')) {
                echo $this->upload->display_errors();
            } else {
                $file_name2 = $this->upload->file_name;
            }
            $data = array(
                'B_name' => $name,
                'B_Brand' => $brand,
                'B_size' => $size,
                'B_price' => $price,
                'B_color' => $clr,
                'B_description' => $desc,
                'B_category' => $ctg,
                'B_stock' => $stock,
                'B_photo2' => $file_name2
            );
            $where = array(
                'ID_Barang' => $id
            );
            $this->Model_1->update_data_barang($where, $data, 'barang');
            redirect('admin/products');
        }
        if (file_exists($_FILES['Pphoto3']['tmp_name']) || is_uploaded_file($_FILES['Pphoto3']['tmp_name'])) {
            echo "kosong";
            $config['upload_path']          = './assets/foto/';
            $config['allowed_types']        = 'gif|jpg|png';
            $config['max_size']             = 0;
            $config['max_width']            = 0;
            $config['max_height']           = 0;

            $this->load->library('upload', $config);

            if (!$this->upload->do_upload('Pphoto3')) {
                echo $this->upload->display_errors();
            } else {
                $file_name3 = $this->upload->file_name;
            }
            $data = array(
                'B_name' => $name,
                'B_Brand' => $brand,
                'B_size' => $size,
                'B_price' => $price,
                'B_description' => $desc,
                'B_color' => $clr,
                'B_stock' => $stock,
                'B_category' => $ctg,
                'B_photo3' => $file_name3
            );
            $where = array(
                'ID_Barang' => $id
            );
            $this->Model_1->update_data_barang($where, $data, 'barang');
            redirect('admin/products');
        } else {
            $data = array(
                'B_name' => $name,
                'B_Brand' => $brand,
                'B_size' => $size,
                'B_price' => $price,
                'B_description' => $desc,
                'B_color' => $clr,
                'B_stock' => $stock,
                'B_category' => $ctg
            );
            $where = array(
                'ID_Barang' => $id
            );
            $this->Model_1->update_data_barang($where, $data, 'barang');
            redirect('admin/products');
        }
    }
    public function delete_barang()
    {
        $id = $this->uri->segment(3);
        $this->Model_1->delete_data_barang($id);
        redirect('admin/products');
    }
}
