<?php
defined('BASEPATH') or exit('No direct script access allowed');

class HomePage extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data['info_yagami'] = $this->HomePage_Model->tampil_data_info_yagami();
        $data['produk'] = $this->HomePage_Model->tampil_produk();
        $data['ulasan'] = $this->db->get('tbl_ulasan')->result_array();
        $data['title'] = 'Home Page';
        $this->load->view('Template/header', $data);
        $this->load->view('HomePage/home_page', $data);
        $this->load->view('Template/footer');
    }

    public function hubungiKami()
    {
        $data = [
            'nama' => $this->input->post('nama'),
            'email' => $this->input->post('email'),
            'pesan' => $this->input->post('pesan')
        ];

        $this->HomePage_Model->tambah_hubungi_kami($data);
        $this->session->set_flashdata(
            'pesan',
            '<div class="alert alert-warning alert-dismissible fade show" role="alert">
                    Terima kasih atas masukannya.
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
            </div>'
        );
        redirect('HomePage');
    }
}
