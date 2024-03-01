<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        is_login();
    }

    public function index()
    {

        // config
        $table = 'tbl_buat_pesanan';
        $tabelUlasan = 'tbl_ulasan';

        $config['base_url'] = base_url('Admin/index');

        $rowPesanan = $this->HomePage_Model->hitungBaris($table);
        $rowUlasan = $this->HomePage_Model->hitungBaris($tabelUlasan);

        if ($rowPesanan >= $rowUlasan) {
            $config['total_rows'] = $this->HomePage_Model->hitungBaris($table);
        } else {
            $config['total_rows'] = $this->HomePage_Model->hitungBaris($tabelUlasan);
        }

        $config['per_page'] = 5;

        // styling
        $config['full_tag_open'] = '<nav><ul class="pagination justify-content-center">';
        $config['full_tag_close'] = '</ul></nav>';

        $config['first_link'] = 'First';
        $config['first_tag_open'] = '<li class="page-item">';
        $config['first_tag_close'] = '</li>';

        $config['last_link'] = 'Last';
        $config['last_tag_open'] = '<li class="page-item">';
        $config['last_tag_close'] = '</li>';

        $config['next_link'] = '&raquo';
        $config['next_tag_open'] = '<li class="page-item">';
        $config['next_tag_close'] = '</li>';

        $config['prev_link'] = '&laquo';
        $config['prev_tag_open'] = '<li class="page-item">';
        $config['prev_tag_close'] = '</li>';

        $config['cur_tag_open'] = '<li class="page-item active"><a class="page-link" href="#">';
        $config['cur_tag_close'] = '</a></li>';

        $config['num_tag_open'] = '<li class="page-item">';
        $config['num_tag_close'] = '</li>';

        $config['attributes'] = array('class' => 'page-link');


        // initialize
        $this->pagination->initialize($config);

        $data['start'] = $this->uri->segment(3);
        $data['pesanan'] = $this->HomePage_Model->ambilData($table, $config['per_page'], $data['start']);

        $data['ulasan'] = $this->HomePage_Model->ambilData($tabelUlasan, $config['per_page'], $data['start']);

        $data['title'] = 'Dashboard';
        $email = $this->session->userdata('email');
        $data['user'] = $this->db->get_where('tbl_akun', ['email' => $email])->row_array();
        $this->load->view('Template_admin/header', $data);
        $this->load->view('Template_admin/navbar');
        $this->load->view('Template_admin/sidebar');
        $this->load->view('Admin/index', $data);
        $this->load->view('Template_admin/footer');
    }

    public function header()
    {
        $data['title'] = 'Header';
        $email = $this->session->userdata('email');
        $data['user'] = $this->db->get_where('tbl_akun', ['email' => $email])->row_array();
        $data['informasi_web'] = $this->db->get_where('tbl_info_yagami', ['id_info_yagami' => 1])->row_array();

        $this->load->view('Template_admin/header', $data);
        $this->load->view('Template_admin/navbar');
        $this->load->view('Template_admin/sidebar');
        $this->load->view('Admin/header_web', $data);
        $this->load->view('Template_admin/footer');
    }

    public function editInfoWeb()
    {

        $data['informasi_web'] = $this->db->get_where('tbl_info_yagami', ['id_info_yagami' => 1])->row_array();

        // cek jika ada logo
        // cek gambar
        $upload_logo = $_FILES['logo']['name'];
        if ($upload_logo) {
            $config['allowed_types'] = 'gif|jpg|png';
            $config['upload_path']   = './assets/images/';

            $this->load->library('upload', $config);

            if ($this->upload->do_upload('logo')) {

                $old_gambar = $data['informasi_web']['logo'];
                unlink(FCPATH . 'assets/images/' . $old_gambar);

                $new_image = $this->upload->data('file_name');
                $this->db->set('logo', $new_image);
            } else {
                echo $this->upload->display_errors();
            }
        }

        $no_telepon = $this->input->post('no_telepon');
        $email = $this->input->post('email');
        $facebook = $this->input->post('facebook');
        $twitter = $this->input->post('twitter');
        $instagram = $this->input->post('instagram');
        $alamat = $this->input->post('alamat');


        $id_info_yagami = 1;

        $this->db->set('no_telepon', $no_telepon);
        $this->db->set('email', $email);
        $this->db->set('facebook', $facebook);
        $this->db->set('twitter', $twitter);
        $this->db->set('instagram', $instagram);
        $this->db->set('alamat', $alamat);
        $this->db->where('id_info_yagami', $id_info_yagami);
        $this->db->update('tbl_info_yagami');


        $this->session->set_flashdata(
            'pesan',
            '<div class="alert alert-warning alert-dismissible fade show col-md-6 mx-auto" role="alert">
                    Informasi web berhasil di perbarui.
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
            </div>'
        );
        redirect('Admin/header');
    }

    public function produk()
    {
        // config
        $table = 'tbl_produk';

        $config['base_url'] = base_url('Admin/produk');
        $config['total_rows'] = $this->HomePage_Model->hitungBaris($table);
        $config['per_page'] = 5;

        // styling
        $config['full_tag_open'] = '<nav><ul class="pagination justify-content-center">';
        $config['full_tag_close'] = '</ul></nav>';

        $config['first_link'] = 'First';
        $config['first_tag_open'] = '<li class="page-item">';
        $config['first_tag_close'] = '</li>';

        $config['last_link'] = 'Last';
        $config['last_tag_open'] = '<li class="page-item">';
        $config['last_tag_close'] = '</li>';

        $config['next_link'] = '&raquo';
        $config['next_tag_open'] = '<li class="page-item">';
        $config['next_tag_close'] = '</li>';

        $config['prev_link'] = '&laquo';
        $config['prev_tag_open'] = '<li class="page-item">';
        $config['prev_tag_close'] = '</li>';

        $config['cur_tag_open'] = '<li class="page-item active"><a class="page-link" href="#">';
        $config['cur_tag_close'] = '</a></li>';

        $config['num_tag_open'] = '<li class="page-item">';
        $config['num_tag_close'] = '</li>';

        $config['attributes'] = array('class' => 'page-link');


        // initialize
        $this->pagination->initialize($config);

        $data['start'] = $this->uri->segment(3);
        $data['produk'] = $this->HomePage_Model->ambilData($table, $config['per_page'], $data['start']);

        $data['title'] = 'Produk';
        $email = $this->session->userdata('email');
        $data['user'] = $this->db->get_where('tbl_akun', ['email' => $email])->row_array();

        $this->load->view('Template_admin/header', $data);
        $this->load->view('Template_admin/navbar');
        $this->load->view('Template_admin/sidebar');
        $this->load->view('Admin/tampil_produk', $data);
        $this->load->view('Template_admin/footer');
    }

    public function tambahDataProduk()
    {

        $this->form_validation->set_rules('nama_produk', 'nama', 'required|trim', [
            'required' => 'Nama produk harus diisi.'
        ]);
        $this->form_validation->set_rules('harga_produk', 'harga', 'required|trim', [
            'required' => 'Harga produk harus diisi.'
        ]);
        $this->form_validation->set_rules('stok_produk', 'stok', 'required|trim', [
            'required' => 'Stok produk harus diisi.'
        ]);


        if ($this->form_validation->run() == false) {
            $data['title'] = 'Produk';
            $email = $this->session->userdata('email');
            $data['user'] = $this->db->get_where('tbl_akun', ['email' => $email])->row_array();

            $this->load->view('Template_admin/header', $data);
            $this->load->view('Template_admin/navbar');
            $this->load->view('Template_admin/sidebar');
            $this->load->view('Admin/tambah_produk');
            $this->load->view('Template_admin/footer');
        } else {


            // cek gambar
            $upload_gambar_produk = $_FILES['gambar_produk']['name'];
            if ($upload_gambar_produk) {
                $config['allowed_types'] = 'gif|jpg|png';
                $config['upload_path']   = './assets/images/';

                $this->load->library('upload', $config);

                if (!$this->upload->do_upload('gambar_produk')) {
                    echo $this->upload->display_errors();
                }
            }

            $nama_produk = $this->input->post('nama_produk');
            $harga_produk = $this->input->post('harga_produk');
            $stok_produk = $this->input->post('stok_produk');

            $data = [
                'nama_produk' => $nama_produk,
                'harga_produk' => $harga_produk,
                'stok_produk' => $stok_produk,
                'gambar_produk' => $upload_gambar_produk
            ];

            $this->HomePage_Model->tambah_data_produk($data);

            $this->session->set_flashdata(
                'pesan',
                '<div class="alert alert-warning alert-dismissible fade show col-md-10 mx-auto" role="alert">
                        Data produk berhasil ditambahkan.
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                </div>'
            );
            redirect('Admin/produk');
        }
    }

    public function hapusDataProduk($id_produk)
    {
        $where = ['id_produk' => $id_produk];


        $data['produk'] = $this->db->get_where('tbl_produk', ['id_produk' => $id_produk])->row_array();
        // hapus data gambar
        $old_gambar_produk = $data['produk']['gambar_produk'];
        unlink(FCPATH . 'assets/images/' . $old_gambar_produk);
        $this->HomePage_Model->hapus_produk($where, 'tbl_produk');
        $this->session->set_flashdata(
            'pesan',
            '<div class="alert alert-warning alert-dismissible fade show col-md-10 mx-auto" role="alert">
                    Data produk berhasil dihapus.
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
            </div>'
        );
        redirect('Admin/produk');
    }
    public function ubahDataProduk($id_produk)
    {
        $data['title'] = 'Produk';
        $email = $this->session->userdata('email');
        $data['user'] = $this->db->get_where('tbl_akun', ['email' => $email])->row_array();
        $data['produk'] = $this->db->get_where('tbl_produk', ['id_produk' => $id_produk])->row_array();

        $this->load->view('Template_admin/header', $data);
        $this->load->view('Template_admin/navbar');
        $this->load->view('Template_admin/sidebar');
        $this->load->view('Admin/ubah_produk', $data);
        $this->load->view('Template_admin/footer');
    }

    public function ubahDataProdukAksi()
    {
        $this->form_validation->set_rules('nama_produk', 'nama', 'required|trim', [
            'required' => 'Nama produk harus diisi.'
        ]);
        $this->form_validation->set_rules('harga_produk', 'harga', 'required|trim', [
            'required' => 'Harga produk harus diisi.'
        ]);
        $this->form_validation->set_rules('stok_produk', 'stok', 'required|trim', [
            'required' => 'Stok produk harus diisi.'
        ]);

        $data['title'] = 'Produk';
        $email = $this->session->userdata('email');
        $data['user'] = $this->db->get_where('tbl_akun', ['email' => $email])->row_array();
        $id_produk = $this->input->post('id_produk');
        $data['produk'] = $this->db->get_where('tbl_produk', ['id_produk' => $id_produk])->row_array();

        if ($this->form_validation->run() == false) {
            $this->load->view('Template_admin/header', $data);
            $this->load->view('Template_admin/navbar');
            $this->load->view('Template_admin/sidebar');
            $this->load->view('Admin/ubah_produk', $data);
            $this->load->view('Template_admin/footer');
        } else {

            // cek gambar
            $upload_gambar_produk = $_FILES['gambar_produk']['name'];
            if ($upload_gambar_produk) {
                $config['allowed_types'] = 'gif|jpg|png';
                $config['upload_path']   = './assets/images/';

                $this->load->library('upload', $config);

                if ($this->upload->do_upload('gambar_produk')) {

                    $old_gambar = $data['produk']['gambar_produk'];
                    unlink(FCPATH . 'assets/images/' . $old_gambar);

                    $new_image = $this->upload->data('file_name');
                    $this->db->set('gambar_produk', $new_image);
                } else {
                    echo $this->upload->display_errors();
                }
            }

            $id_produk = $this->input->post('id_produk');
            $nama_produk = $this->input->post('nama_produk');
            $harga_produk = $this->input->post('harga_produk');
            $stok_produk = $this->input->post('stok_produk');

            $this->db->set('nama_produk', $nama_produk);
            $this->db->set('harga_produk', $harga_produk);
            $this->db->set('stok_produk', $stok_produk);
            $this->db->where('id_produk', $id_produk);
            $this->db->update('tbl_produk');

            $this->session->set_flashdata(
                'pesan',
                '<div class="alert alert-warning alert-dismissible fade show col-md-10 mx-auto" role="alert">
                        Data produk berhasil diubah.
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                </div>'
            );
            redirect('Admin/produk');
        }
    }
    public function tampilAkun()
    {
        // config
        $table = 'tbl_akun';

        $config['base_url'] = base_url('Admin/tampilAkun');
        $config['total_rows'] = $this->HomePage_Model->hitungBaris($table);
        $config['per_page'] = 5;

        // styling
        $config['full_tag_open'] = '<nav><ul class="pagination justify-content-center">';
        $config['full_tag_close'] = '</ul></nav>';

        $config['first_link'] = 'First';
        $config['first_tag_open'] = '<li class="page-item">';
        $config['first_tag_close'] = '</li>';

        $config['last_link'] = 'Last';
        $config['last_tag_open'] = '<li class="page-item">';
        $config['last_tag_close'] = '</li>';

        $config['next_link'] = '&raquo';
        $config['next_tag_open'] = '<li class="page-item">';
        $config['next_tag_close'] = '</li>';

        $config['prev_link'] = '&laquo';
        $config['prev_tag_open'] = '<li class="page-item">';
        $config['prev_tag_close'] = '</li>';

        $config['cur_tag_open'] = '<li class="page-item active"><a class="page-link" href="#">';
        $config['cur_tag_close'] = '</a></li>';

        $config['num_tag_open'] = '<li class="page-item">';
        $config['num_tag_close'] = '</li>';

        $config['attributes'] = array('class' => 'page-link');


        // initialize
        $this->pagination->initialize($config);

        $data['start'] = $this->uri->segment(3);
        $data['akun'] = $this->HomePage_Model->ambilData($table, $config['per_page'], $data['start']);

        $data['title'] = 'List Akun';
        $email = $this->session->userdata('email');
        $data['user'] = $this->db->get_where('tbl_akun', ['email' => $email])->row_array();

        $this->load->view('Template_admin/header', $data);
        $this->load->view('Template_admin/navbar');
        $this->load->view('Template_admin/sidebar');
        $this->load->view('Admin/tampil_akun', $data);
        $this->load->view('Template_admin/footer');
    }

    public function hapusAkunUser($id_akun)
    {

        $where = ['id_akun' => $id_akun];
        $this->HomePage_Model->hapus_akun_user($where, 'tbl_akun');

        $this->session->set_flashdata(
            'pesan',
            '<div class="alert alert-warning alert-dismissible fade show col-md-12 mx-auto" role="alert">
                    Data akun berhasil dihapus.
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
            </div>'
        );
        redirect('Admin/tampilAkun');
    }

    public function masukan()
    {
        // config
        $table = 'tbl_hubungi_kami';

        $config['base_url'] = base_url('Admin/masukan');
        $config['total_rows'] = $this->HomePage_Model->hitungBaris($table);
        $config['per_page'] = 5;

        // styling
        $config['full_tag_open'] = '<nav><ul class="pagination justify-content-center">';
        $config['full_tag_close'] = '</ul></nav>';

        $config['first_link'] = 'First';
        $config['first_tag_open'] = '<li class="page-item">';
        $config['first_tag_close'] = '</li>';

        $config['last_link'] = 'Last';
        $config['last_tag_open'] = '<li class="page-item">';
        $config['last_tag_close'] = '</li>';

        $config['next_link'] = '&raquo';
        $config['next_tag_open'] = '<li class="page-item">';
        $config['next_tag_close'] = '</li>';

        $config['prev_link'] = '&laquo';
        $config['prev_tag_open'] = '<li class="page-item">';
        $config['prev_tag_close'] = '</li>';

        $config['cur_tag_open'] = '<li class="page-item active"><a class="page-link" href="#">';
        $config['cur_tag_close'] = '</a></li>';

        $config['num_tag_open'] = '<li class="page-item">';
        $config['num_tag_close'] = '</li>';

        $config['attributes'] = array('class' => 'page-link');


        // initialize
        $this->pagination->initialize($config);

        $data['start'] = $this->uri->segment(3);
        $data['bantuan'] = $this->HomePage_Model->ambilData($table, $config['per_page'], $data['start']);

        $data['title'] = 'Masukan dan Saran';
        $email = $this->session->userdata('email');
        $data['user'] = $this->db->get_where('tbl_akun', ['email' => $email])->row_array();
        $this->load->view('Template_admin/header', $data);
        $this->load->view('Template_admin/navbar');
        $this->load->view('Template_admin/sidebar');
        $this->load->view('Admin/bantuan', $data);
        $this->load->view('Template_admin/footer');
    }

    public function detailPesanan($id_bayar)
    {
        $data['title'] = 'Detail Pesanan';
        $email = $this->session->userdata('email');
        $data['user'] = $this->db->get_where('tbl_akun', ['email' => $email])->row_array();
        $data['detail'] = $this->db->get_where('tbl_buat_pesanan', ['id_bayar' => $id_bayar])->row_array();
        $this->load->view('Template_admin/header', $data);
        $this->load->view('Template_admin/navbar');
        $this->load->view('Template_admin/sidebar');
        $this->load->view('Admin/detail-pesanan', $data);
        $this->load->view('Template_admin/footer');
    }

    public function updatePesanan()
    {
        $id_bayar   = $this->input->post('id_bayar');
        $dikirim    = $this->input->post('dikirim');
        $diterima    = $this->input->post('diterima');
        $kurir      = $this->input->post('kurir');
        $no_resi    = $this->input->post('no_resi');
        $this->db->set('dikirim', $dikirim);
        $this->db->set('diterima', $diterima);
        $this->db->set('kurir', $kurir);
        $this->db->set('no_resi', $no_resi);
        $this->db->where('id_bayar', $id_bayar);
        $this->db->update('tbl_buat_pesanan');
        $this->session->set_flashdata(
            'pesan',
            '<div class="alert alert-warning alert-dismissible fade show col-md-12 mx-auto" role="alert">
                    Detail pesanan berhasil di update.
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
            </div>'
        );
        redirect('Admin');
    }

    public function hapusPesanan($id_bayar)
    {

        $where = ['id_bayar' => $id_bayar];
        $this->HomePage_Model->hapus_pesanan($where, 'tbl_buat_pesanan');

        $this->session->set_flashdata(
            'pesan',
            '<div class="alert alert-warning alert-dismissible fade show col-md-12 mx-auto" role="alert">
                    Data berhasil dihapus.
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
            </div>'
        );
        redirect('Admin');
    }

    public function hapusUlasan($id_ulasan)
    {
        $this->db->delete('tbl_ulasan', ['id_ulasan' => $id_ulasan]);
        $this->session->set_flashdata(
            'pesan',
            '<div class="alert alert-warning alert-dismissible fade show" role="alert">
                    Ulasan berhasil dihapus.
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
            </div>'
        );
        redirect('Admin');
    }
}
