<?php

function is_login()
{
    $ci = get_instance();
    if (!$ci->session->userdata('email')) {
        redirect('HomePage');
    } else {
        $role_id = $ci->session->userdata('role_id');
        $menu = $ci->uri->segment(1);

        $query_menu = $ci->db->get_where('tbl_user_menu', ['menu' => $menu])->row_array();

        $menu_id = $query_menu['id'];
        $query_user_akses = $ci->db->get_where('tbl_user_akses_menu', [
            'role_id' => $role_id, 'menu_id' => $menu_id
        ]);

        if ($query_user_akses->num_rows() < 1) {
            redirect('Auth/tidakDitemukan');
        }
    }
}
