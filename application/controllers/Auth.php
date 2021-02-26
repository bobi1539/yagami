<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
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
        $data['title'] = 'Login';
        $this->load->view('Template_Biasa/header', $data);
        $this->load->view('Auth/login');
        $this->load->view('Template_Biasa/footer');
    }

    public function login()
    {
        if ($this->session->userdata('email')) {
            redirect('User');
        }

        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email', [
            'required' => 'Email harus di isi.',
            'valid_email' => 'Email tidak valid.'
        ]);
        $this->form_validation->set_rules('password', 'Password', 'required|trim', [
            'required' => 'Password harus di isi.'
        ]);

        if ($this->form_validation->run() == false) {
            $data['title'] = 'Login';
            $this->load->view('Template_Biasa/header', $data);
            $this->load->view('Auth/login');
            $this->load->view('Template_Biasa/footer');
        } else {
            // validasi sukses
            $email = $this->input->post('email');
            $password = $this->input->post('password');

            $user = $this->db->get_where('tbl_akun', ['email' => $email])->row_array();

            // jika user ada
            if ($user) {
                // jika user aktif
                if ($user['is_aktif'] == 1) {

                    // cek password
                    if (password_verify($password, $user['password'])) {
                        $data = [
                            'email' => $user['email'],
                            'role_id' => $user['role_id']
                        ];
                        $this->session->set_userdata($data);
                        if ($user['role_id'] == 1) {
                            redirect('Admin');
                        } else {
                            redirect('User');
                        }
                    } else {
                        $this->session->set_flashdata(
                            'pesan',
                            '<div class="alert alert-warning alert-dismissible fade show" role="alert">
                                    Password Salah.
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                            </div>'
                        );
                        redirect('Auth/login');
                    }
                } else {
                    $this->session->set_flashdata(
                        'pesan',
                        '<div class="alert alert-warning alert-dismissible fade show" role="alert">
                                Email ini belum di aktivasi.
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                        </div>'
                    );
                    redirect('Auth/login');
                }
            } else {
                $this->session->set_flashdata(
                    'pesan',
                    '<div class="alert alert-warning alert-dismissible fade show" role="alert">
                            Email ini tidak terdaftar.
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                    </div>'
                );
                redirect('Auth/login');
            }
        }
    }

    public function logout()
    {
        $this->session->unset_userdata('email');
        $this->session->unset_userdata('role_id');

        redirect('HomePage');
    }

    public function buatAkun()
    {
        if ($this->session->userdata('email')) {
            redirect('User');
        }
        $data['title'] = 'Buat Akun';
        $this->load->view('Template_Biasa/header', $data);
        $this->load->view('Auth/buat_akun');
        $this->load->view('Template_Biasa/footer');
    }

    public function buatAkunAksi()
    {
        $this->form_validation->set_rules('nama_depan', 'Nama Depan', 'required|trim', [
            'required' => 'Nama Depan harus di isi.'
        ]);
        $this->form_validation->set_rules('nama_belakang', 'Nama Belakang', 'required|trim', [
            'required' => 'Nama Belakang harus di isi.'
        ]);
        $this->form_validation->set_rules('no_telepon', 'No Telepon', 'required|trim', [
            'required' => 'No Telepon harus di isi.'
        ]);
        $this->form_validation->set_rules('jenis_kelamin', 'Jenis Kelamin', 'required|trim', [
            'required' => 'Jenis Kelamin harus di isi.'
        ]);
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[tbl_akun.email]', [
            'required' => 'Email harus di isi.',
            'valid_email' => 'Email tidak valid.',
            'is_unique' => 'Email ini sudah terdaftar.'
        ]);
        $this->form_validation->set_rules('password', 'Password', 'required|trim|min_length[8]|matches[konfirmasi_password]', [
            'required' => 'Password harus di isi.',
            'matches' => 'Password tidak sama.',
            'min_length' => 'Password telalu pendek.'
        ]);
        $this->form_validation->set_rules('konfirmasi_password', 'Password', 'required|trim|matches[password]');

        if ($this->form_validation->run() == false) {
            $data['title'] = 'Buat Akun';
            $this->load->view('Template_Biasa/header', $data);
            $this->load->view('Auth/buat_akun');
            $this->load->view('Template_Biasa/footer');
        } else {
            $email = $this->input->post('email', true);
            $data = [
                'nama_depan' => $this->input->post('nama_depan', true),
                'nama_belakang' => $this->input->post('nama_belakang', true),
                'no_telepon' => $this->input->post('no_telepon', true),
                'jenis_kelamin' => $this->input->post('jenis_kelamin', true),
                'email' => $email,
                'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
                'role_id' => 2,
                'is_aktif' => 0,
                'tgl_dibuat' => time(),
                'gambar' => 'profil.jpg'
            ];

            // siapkan token
            $token = base64_encode(random_bytes(32));
            $user_token = [
                'email'         => $email,
                'token'         => $token,
                'date_created'  => time()
            ];

            $this->HomePage_Model->tambah_data_akun($data);
            $this->db->insert('tbl_token', $user_token);

            $this->_sendEmail($token, 'verifikasi');

            $this->session->set_flashdata(
                'pesan',
                '<div class="alert alert-warning alert-dismissible fade show" role="alert">
                        Akun berhasil dibuat, silahkan aktivasi dahulu melalui link yang dikirim ke email.
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                </div>'
            );
            redirect('Auth/login');
        }
    }

    private function _sendEmail($token, $tipe)
    {
        $config = [
            'protocol'      => 'smtp',
            'smtp_host'     => 'ssl://smtp.googlemail.com',
            'smtp_user'     => 'yagami20store@gmail.com',
            'smtp_pass'     => 'yagami@147light',
            'smtp_port'     => 465,
            'mailtype'      => 'html',
            'charset'       => 'utf-8',
            'newline'       => "\r\n"
        ];

        $this->load->library('email', $config);
        $this->email->initialize($config);

        $this->email->from('yagami20store@gmail.com', 'Yagami Store');
        $this->email->to($this->input->post('email'));

        if ($tipe == 'verifikasi') {
            $this->email->subject('Verifikasi Akun Anda');
            $this->email->message('Klik link ini untuk verifikasi akun anda : <a href="' . base_url() . 'Auth/verify?email=' . $this->input->post('email') . '&token=' . urlencode($token) . '" >Aktivasi</a>');
        } else if ($tipe == 'lupa_password') {
            $this->email->subject('Reset Password');
            $this->email->message('Klik link ini untuk reset password anda : <a href="' . base_url() . 'Auth/resetPassword?email=' . $this->input->post('email') . '&token=' . urlencode($token) . '" >Reset Password</a>');
        }

        if ($this->email->send()) {
            return true;
        } else {
            $eror = $this->email->print_debugger();
            var_dump($eror);
            die;
        }
    }

    public function verify()
    {

        $email = $this->input->get('email');
        $token = $this->input->get('token');


        $user = $this->db->get_where('tbl_akun', ['email' => $email])->row_array();

        if ($user) {

            $user_token = $this->db->get_where('tbl_token', ['token' => $token])->row_array();
            if ($user_token) {

                if (time() - $user_token['date_created'] < 86400) {

                    $this->db->set('is_aktif', 1);
                    $this->db->where('email', $email);
                    $this->db->update('tbl_akun');

                    $this->db->delete('tbl_token', ['email' => $email]);

                    $this->session->set_flashdata(
                        'pesan',
                        '<div class="alert alert-warning alert-dismissible fade show" role="alert">
                                ' . $email . ' berhasil diaktivasi, silahkan login.
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                        </div>'
                    );
                    redirect('Auth/login');
                } else {

                    $this->db->delete('tbl_akun', ['email' => $email]);
                    $this->db->delete('tbl_token', ['email' => $email]);

                    $this->session->set_flashdata(
                        'pesan',
                        '<div class="alert alert-warning alert-dismissible fade show" role="alert">
                                Aktivaasi akun gagal, token sudah hangus.
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                        </div>'
                    );
                    redirect('Auth/login');
                }
            } else {
                $this->session->set_flashdata(
                    'pesan',
                    '<div class="alert alert-warning alert-dismissible fade show" role="alert">
                            Aktivasi akun gagal, token tidak sah.
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                    </div>'
                );
                redirect('Auth/login');
            }
        } else {
            $this->session->set_flashdata(
                'pesan',
                '<div class="alert alert-warning alert-dismissible fade show" role="alert">
                        Aktivasi akun gagal, email salah.
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                </div>'
            );
            redirect('Auth/login');
        }
    }

    public function lupaPassword()
    {
        $this->form_validation->set_rules(
            'email',
            'Email',
            'trim|required|valid_email',
            [
                'required'      => 'email harus di isi',
                'valid_email'   => 'format email tidak sah'
            ]
        );

        if ($this->form_validation->run() == false) {
            $data['title'] = 'Lupa Password';
            $this->load->view('Template_Biasa/header', $data);
            $this->load->view('Auth/lupa-password');
            $this->load->view('Template_Biasa/footer');
        } else {
            $email  = $this->input->post('email');
            $user   = $this->db->get_where('tbl_akun', ['email' => $email, 'is_aktif' => 1])->row_array();
            if ($user) {

                $token      = base64_encode(random_bytes(32));
                $user_token = [
                    'email'         => $email,
                    'token'         => $token,
                    'date_created'  => time()
                ];
                $this->db->insert('tbl_token', $user_token);
                $this->_sendEmail($token, 'lupa_password');
                $this->session->set_flashdata(
                    'pesan',
                    '<div class="alert alert-warning alert-dismissible fade show" role="alert">
                            Mohon cek email anda untuk reset password.
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                    </div>'
                );
                redirect('Auth/lupaPassword');
            } else {
                $this->session->set_flashdata(
                    'pesan',
                    '<div class="alert alert-warning alert-dismissible fade show" role="alert">
                            Email belum terdaftar atau belum di aktivasi.
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                    </div>'
                );
                redirect('Auth/lupaPassword');
            }
        }
    }

    public function resetPassword()
    {
        $email = $this->input->get('email');
        $token = $this->input->get('token');

        $user       = $this->db->get_where('tbl_akun', ['email' => $email])->row_array();

        if ($user) {
            $user_token = $this->db->get_where('tbl_token', ['token' => $token])->row_array();
            if ($user_token) {

                $this->session->set_userdata('reset_email', $email);
                $this->gantiPassword();
            } else {
                $this->session->set_flashdata(
                    'pesan',
                    '<div class="alert alert-warning alert-dismissible fade show" role="alert">
                            Reset password gagal, token salah.
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                    </div>'
                );
                redirect('Auth/login');
            }
        } else {
            $this->session->set_flashdata(
                'pesan',
                '<div class="alert alert-warning alert-dismissible fade show" role="alert">
                        Reset password gagal, email salah.
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                </div>'
            );
            redirect('Auth/login');
        }
    }

    public function gantiPassword()
    {

        if (!$this->session->userdata('reset_email')) {
            redirect('Auth');
        }

        $this->form_validation->set_rules('password1', 'Password', 'trim|required|min_length[8]|matches[password2]', [
            'required'      => 'password harus di isi',
            'min_length'    => 'password terlalu pendek, minimal 8 karakter',
            'matches'       => 'password tidak sama'
        ]);
        $this->form_validation->set_rules('password2', 'Password2', 'matches[password1]');

        if ($this->form_validation->run() == false) {
            $data['title'] = 'Ganti Password';
            $this->load->view('Template_Biasa/header', $data);
            $this->load->view('Auth/ganti-password');
            $this->load->view('Template_Biasa/footer');
        } else {
            $password   = password_hash($this->input->post('password1'), PASSWORD_DEFAULT);
            $email      = $this->session->userdata('reset_email');

            $this->db->set('password', $password);
            $this->db->where('email', $email);
            $this->db->update('tbl_akun');

            $this->session->unset_userdata('reset_email');
            $this->db->delete('tbl_token', ['email' => $email]);

            $this->session->set_flashdata(
                'pesan',
                '<div class="alert alert-warning alert-dismissible fade show" role="alert">
                        Password berhasil diubah, silahkan login.
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                </div>'
            );
            redirect('Auth/login');
        }
    }

    public function tidakDitemukan()
    {
        $this->load->view('errors/error_akses');
    }
}
