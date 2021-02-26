<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        is_login();
    }

    public function index()
    {
        $data['info_yagami'] = $this->HomePage_Model->tampil_data_info_yagami();
        $data['title'] = 'Profil';

        $email = $this->session->userdata('email');
        $data['user'] = $this->db->get_where('tbl_akun', ['email' => $email])->row_array();
        $data['keranjang'] = $this->db->get_where('tbl_keranjang', ['email' => $email])->result_array();
        $data['buat_pesanan'] = $this->db->get_where('tbl_buat_pesanan', ['email' => $email])->result_array();

        $this->load->view('Template/header2', $data);
        $this->load->view('User/home_page_user', $data);
        $this->load->view('Template/sidebar_user');
        $this->load->view('Template/footer');
    }

    public function informasiPribadi()
    {
        $data['info_yagami'] = $this->HomePage_Model->tampil_data_info_yagami();
        $data['title'] = 'Informasi Pribadi User';
        $data['user'] = $this->db->get_where('tbl_akun', ['email' => $this->session->userdata('email')])->row_array();
        $this->load->view('Template/header2', $data);
        $this->load->view('User/informasi_pribadi_user', $data);
        $this->load->view('Template/sidebar_user');
        $this->load->view('Template/footer');
    }

    public function ubahDataAkun()
    {
        $this->form_validation->set_rules('nama_depan', 'nama depan', 'required|trim', [
            'required' => 'Nama depan harus diisi.'
        ]);
        $this->form_validation->set_rules('nama_belakang', 'nama belakang', 'required|trim', [
            'required' => 'Nama belakang harus diisi.'
        ]);
        $this->form_validation->set_rules('no_telepon', 'no telepon', 'required|trim', [
            'required' => 'No telepon harus diisi.'
        ]);

        $data['info_yagami'] = $this->HomePage_Model->tampil_data_info_yagami();
        $data['title'] = 'Informasi Pribadi User';
        $data['user'] = $this->db->get_where('tbl_akun', ['email' => $this->session->userdata('email')])->row_array();

        if ($this->form_validation->run() == false) {
            $this->load->view('Template/header2', $data);
            $this->load->view('User/informasi_pribadi_user', $data);
            $this->load->view('Template/sidebar_user');
            $this->load->view('Template/footer');
        } else {

            // cek gambar
            $upload_gambar = $_FILES['gambar']['name'];
            if ($upload_gambar) {
                $config['allowed_types'] = 'gif|jpg|png';
                $config['upload_path']   = './assets/images/profil/';

                $this->load->library('upload', $config);

                if ($this->upload->do_upload('gambar')) {

                    $old_gambar = $data['user']['gambar'];
                    if ($old_gambar != 'profil.jpg') {
                        unlink(FCPATH . 'assets/images/profil/' . $old_gambar);
                    }
                    $new_image = $this->upload->data('file_name');
                    $this->db->set('gambar', $new_image);
                } else {
                    echo $this->upload->display_errors();
                }
            }

            $email = $this->input->post('email');
            $nama_depan = $this->input->post('nama_depan');
            $nama_belakang = $this->input->post('nama_belakang');
            $no_telepon = $this->input->post('no_telepon');
            $jenis_kelamin = $this->input->post('jenis_kelamin');

            $this->db->set('nama_depan', $nama_depan);
            $this->db->set('nama_belakang', $nama_belakang);
            $this->db->set('no_telepon', $no_telepon);
            $this->db->set('jenis_kelamin', $jenis_kelamin);
            $this->db->where('email', $email);
            $this->db->update('tbl_akun');

            $this->session->set_flashdata(
                'pesan',
                '<div class="alert alert-warning alert-dismissible fade show" role="alert">
                    Informasi berhasil di perbarui.
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
            </div>'
            );
            redirect('User/informasiPribadi');
        }
    }

    public function gantiPassword()
    {
        $this->form_validation->set_rules('password1', 'Password1', 'required|trim|min_length[8]|matches[password2]', [
            'required' => 'Password harus di isi.',
            'matches' => 'Password tidak sama.',
            'min_length' => 'Password telalu pendek minimal 8 karakter.'
        ]);
        $this->form_validation->set_rules('password2', 'Password2', 'required|trim|matches[password1]');

        $data['info_yagami']    = $this->HomePage_Model->tampil_data_info_yagami();
        $data['title']          = 'Informasi Pribadi User';
        $data['user']           = $this->db->get_where('tbl_akun', ['email' => $this->session->userdata('email')])->row_array();

        if ($this->form_validation->run() == false) {
            $this->load->view('Template/header2', $data);
            $this->load->view('User/informasi_pribadi_user', $data);
            $this->load->view('Template/sidebar_user');
            $this->load->view('Template/footer');
        } else {

            $email = $this->input->post('email');
            $password1 = password_hash($this->input->post('password1'), PASSWORD_DEFAULT);

            $this->db->set('password', $password1);
            $this->db->where('email', $email);
            $this->db->update('tbl_akun');

            $this->session->set_flashdata(
                'pesan',
                '<div class="alert alert-warning alert-dismissible fade show" role="alert">
                    Password berhasil diganti.
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
            </div>'
            );
            redirect('User/informasiPribadi');
        }
    }

    public function daftarAlamat()
    {
        $data['info_yagami'] = $this->HomePage_Model->tampil_data_info_yagami();
        $data['title'] = 'Daftar Alamat';
        $data['user'] = $this->db->get_where('tbl_akun', ['email' => $this->session->userdata('email')])->row_array();

        $where = array('email' => $this->session->userdata('email'));
        $data['alamat_user'] = $this->HomePage_Model->tampil_alamat_user($where, 'tbl_alamat_user');

        $this->load->view('Template/header2', $data);
        $this->load->view('User/daftar_alamat', $data);
        $this->load->view('Template/sidebar_user');
        $this->load->view('Template/footer');
    }

    public function tambahAlamat()
    {
        $this->form_validation->set_rules('nama_depan', 'Nama Depan', 'required|trim', [
            'required' => 'Nama depan harus di isi.'
        ]);
        $this->form_validation->set_rules('nama_belakang', 'Nama Belakang', 'required|trim', [
            'required' => 'Nama belakang harus di isi.'
        ]);
        $this->form_validation->set_rules('no_telepon', 'Nomor Telepon', 'required|trim', [
            'required' => 'Nomor telepon harus di isi.'
        ]);
        $this->form_validation->set_rules('nama_jalan1', 'Nama Jalan', 'required|trim', [
            'required' => 'Nama jalan harus di isi.'
        ]);
        $this->form_validation->set_rules('provinsi', 'Provinsi', 'required|trim', [
            'required' => 'Nama provinsi harus di isi.'
        ]);
        $this->form_validation->set_rules('kota', 'Kota', 'required|trim', [
            'required' => 'Nama kab/kota harus di isi.'
        ]);
        $this->form_validation->set_rules('kecamatan', 'Kecamatan', 'required|trim', [
            'required' => 'Nama kecamatan harus di isi.'
        ]);
        $this->form_validation->set_rules('kelurahan', 'Kelurahan', 'required|trim', [
            'required' => 'Nama kelurahan harus di isi.'
        ]);

        if ($this->form_validation->run() == false) {
            $data['info_yagami'] = $this->HomePage_Model->tampil_data_info_yagami();
            $data['title'] = 'Tambah Alamat';
            $data['user'] = $this->db->get_where('tbl_akun', ['email' => $this->session->userdata('email')])->row_array();
            $this->load->view('Template/header2', $data);
            $this->load->view('User/tambah_alamat', $data);
            $this->load->view('Template/sidebar_user');
            $this->load->view('Template/footer');
        } else {
            // validasi sukses
            $data = [
                'email' => $this->input->post('email', true),
                'nama_depan' => $this->input->post('nama_depan', true),
                'nama_belakang' => $this->input->post('nama_belakang', true),
                'no_telepon' => $this->input->post('no_telepon', true),
                'nama_jalan1' => $this->input->post('nama_jalan1', true),
                'nama_jalan2' => $this->input->post('nama_jalan2', true),
                'negara' => $this->input->post('negara', true),
                'provinsi' => $this->input->post('provinsi', true),
                'kota' => $this->input->post('kota', true),
                'kecamatan' => $this->input->post('kecamatan', true),
                'kelurahan' => $this->input->post('kelurahan', true)
            ];
            $this->HomePage_Model->tambah_alamat_user($data);
            $this->session->set_flashdata(
                'pesan',
                '<div class="alert alert-warning alert-dismissible fade show" role="alert">
                        Alamat berhasil disimpan.
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                </div>'
            );
            redirect('User/daftarAlamat');
        }
    }

    public function hapusAlamat($id_alamat)
    {
        $where = array('id_alamat' => $id_alamat);
        $this->HomePage_Model->hapus_alamat_user($where, 'tbl_alamat_user');
        $this->session->set_flashdata(
            'pesan',
            '<div class="alert alert-warning alert-dismissible fade show" role="alert">
                    Alamat berhasil dihapus.
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
            </div>'
        );
        redirect('User/daftarAlamat');
    }

    public function ubahAlamat()
    {

        $data = [
            'email' => $this->session->userdata('email'),
            'nama_depan' => $this->input->post('nama_depan'),
            'nama_belakang' => $this->input->post('nama_belakang'),
            'no_telepon' => $this->input->post('no_telepon'),
            'nama_jalan1' => $this->input->post('nama_jalan1'),
            'nama_jalan2' => $this->input->post('nama_jalan2'),
            'negara' => $this->input->post('negara'),
            'provinsi' => $this->input->post('provinsi'),
            'kota' => $this->input->post('kota'),
            'kecamatan' => $this->input->post('kecamatan'),
            'kelurahan' => $this->input->post('kelurahan')
        ];
        $where = [
            'id_alamat' => $this->input->post('id_alamat')
        ];
        $this->HomePage_Model->ubah_alamat_user($where, $data, 'tbl_alamat_user');
        $this->session->set_flashdata(
            'pesan',
            '<div class="alert alert-warning alert-dismissible fade show" role="alert">
                    Alamat berhasil diubah.
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
            </div>'
        );
        redirect('User/daftarAlamat');
    }

    public function tambahKeranjang()
    {
        $data = [
            'id_produk' => $this->input->post('id_produk'),
            'nama_produk' => $this->input->post('nama_produk'),
            'harga_produk' => $this->input->post('harga_produk'),
            'ukuran_produk' => $this->input->post('ukuran_produk'),
            'gambar_produk' => $this->input->post('gambar_produk'),
            'email' => $this->session->userdata('email'),
            'jumlah_beli' => $this->input->post('jumlah_beli')
        ];

        $this->HomePage_Model->tambah_keranjang($data);
        redirect('User');
    }

    public function hapusKeranjang($id_keranjang)
    {
        $where = array('id_keranjang' => $id_keranjang);
        $this->HomePage_Model->hapus_keranjang($where, 'tbl_keranjang');
        redirect('User');
    }

    public function checkout()
    {
        $data['info_yagami'] = $this->HomePage_Model->tampil_data_info_yagami();
        $data['title'] = 'Checkout';

        $email = $this->session->userdata('email');
        $data['user'] = $this->db->get_where('tbl_akun', ['email' => $email])->row_array();
        $data['keranjang'] = $this->db->get_where('tbl_keranjang', ['email' => $email])->result_array();

        $where = array('email' => $this->session->userdata('email'));
        $data['alamat_user'] = $this->HomePage_Model->tampil_alamat_user($where, 'tbl_alamat_user');



        $this->load->view('Template/header2', $data);
        $this->load->view('User/detail_pesanan', $data);
        $this->load->view('Template/sidebar_detail_pesanan');
        $this->load->view('Template/footer');
    }

    public function checkoutAlamat($id_alamat)
    {
        $data['info_yagami'] = $this->HomePage_Model->tampil_data_info_yagami();
        $data['title'] = 'Checkout';

        $email = $this->session->userdata('email');
        $data['user'] = $this->db->get_where('tbl_akun', ['email' => $email])->row_array();
        $data['keranjang'] = $this->db->get_where('tbl_keranjang', ['email' => $email])->result_array();

        $data['alamat_user'] = $this->db->get_where('tbl_alamat_user', ['email' => $email, 'id_alamat' => $id_alamat])->row_array();

        $this->load->view('Template/header2', $data);
        $this->load->view('User/detail_pesanan2', $data);
        $this->load->view('Template/sidebar_detail_pesanan');
        $this->load->view('Template/footer');
    }

    public function buatPesanan()
    {
        $email = $this->session->userdata('email');
        $id_alamat = $this->input->post('id_alamat');
        $id_keranjang = $this->input->post('id_keranjang');
        $id_produk = $this->input->post('id_produk');
        $ukuran_produk = $this->input->post('ukuran_produk');
        $jumlah_beli = $this->input->post('jumlah_beli');
        $nama = $this->input->post('nama');
        $jalan1 = $this->input->post('jalan1');
        $jalan2 = $this->input->post('jalan2');
        $kota = $this->input->post('kota');
        $telepon = $this->input->post('telepon');

        for ($i = 0; $i < count($id_keranjang); $i++) {
            $data[] = [
                'email'         => $email,
                'id_alamat'     => $id_alamat,
                'id_keranjang'  => $id_keranjang[$i],
                'id_produk'     => $id_produk[$i],
                'ukuran_produk' => $ukuran_produk[$i],
                'jumlah_beli'   => $jumlah_beli[$i],
                'waktu'         => time(),
                'dikirim'       => 'belum',
                'diterima'      => 'belum',
                'nama'          => $nama,
                'jalan1'        => $jalan1,
                'jalan2'        => $jalan2,
                'kota'          => $kota,
                'telepon'       => $telepon
            ];
        }
        $this->HomePage_Model->tambah_buat_pesanan($data);
        redirect('User/statusPesanan');
    }

    public function statusPesanan()
    {
        $data['info_yagami'] = $this->HomePage_Model->tampil_data_info_yagami();
        $data['title'] = 'Profil';

        $email = $this->session->userdata('email');
        $data['user'] = $this->db->get_where('tbl_akun', ['email' => $email])->row_array();
        $data['status_pesanan'] = $this->db->get_where('tbl_buat_pesanan', ['email' => $email])->result_array();

        $this->load->view('Template/header2', $data);
        $this->load->view('User/status_pesanan', $data);
        $this->load->view('Template/sidebar_user');
        $this->load->view('Template/footer');
    }

    public function update_jml_beli($id_alamat)
    {
        $data = [
            'jumlah_beli' => $this->input->post('jumlah_beli')
        ];
        $where = [
            'id_keranjang' => $id_alamat
        ];
        $this->HomePage_Model->ubah_jumlah_beli($where, $data, 'tbl_keranjang');
        redirect('User');
    }

    public function testimoni()
    {
        $email = $this->session->userdata('email');
        $data['info_yagami'] = $this->HomePage_Model->tampil_data_info_yagami();
        $data['title'] = 'Ulasan Produk';
        $data['user'] = $this->db->get_where('tbl_akun', ['email' => $email])->row_array();
        $data['ulasan'] = $this->db->get_where('tbl_ulasan', ['email' => $email])->result_array();

        $this->load->view('Template/header2', $data);
        $this->load->view('User/ulasan-produk', $data);
        $this->load->view('Template/sidebar_user');
        $this->load->view('Template/footer');
    }

    public function tambahUlasan()
    {
        $this->form_validation->set_rules('ulasan', 'Ulasan', 'required|trim', [
            'required' => 'Ulasan harus di isi.'
        ]);

        $data['info_yagami'] = $this->HomePage_Model->tampil_data_info_yagami();
        $data['title'] = 'Ulasan';
        $data['user'] = $this->db->get_where('tbl_akun', ['email' => $this->session->userdata('email')])->row_array();
        if ($this->form_validation->run() == false) {
            $this->load->view('Template/header2', $data);
            $this->load->view('User/ulasan-produk', $data);
            $this->load->view('Template/sidebar_user');
            $this->load->view('Template/footer');
        } else {
            $data = [
                'email' => $this->input->post('email'),
                'nama_depan' => $this->input->post('nama_depan'),
                'nama_belakang' => $this->input->post('nama_belakang'),
                'gambar' => $this->input->post('gambar'),
                'ulasan' => $this->input->post('ulasan')
            ];
            $this->db->insert('tbl_ulasan', $data);
            $this->session->set_flashdata(
                'pesan',
                '<div class="alert alert-warning alert-dismissible fade show" role="alert">
                        Ulasan berhasil ditambahkan.
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                </div>'
            );
            redirect('User/testimoni');
        }
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
        redirect('User/testimoni');
    }
}
