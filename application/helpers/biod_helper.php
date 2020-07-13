<?php

function is_logged_in()
{
    $ci = get_instance();

    if (!$ci->session->userdata('username')) {
        redirect('auth');
    }
}

function is_after_logged_in()
{
    $ci = get_instance();
    // if ($ci->session->unset_userdata('username')) {
    //     redirect('auth');
    // } else if (!$ci->session->unset_userdata('username')) {
    //     redirect('dashboard');
    // }
    if ($ci->session->userdata('username')) {
        redirect('dashboard');
    } else if ($ci->session->unset_userdata('username')) {
        redirect('auth');
    }
}
