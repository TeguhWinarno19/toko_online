<?php


function is_logged_in()
{
    $ci =& get_instance();
    if(!$ci->session->userdata('email'))
    {
        redirect('auth');
    }
    else
    {
        $role_id = $ci->session->userdata('role_id');
        $menu = $ci->uri->segment(1);
        if($role_id == "2")
        {
            if($menu=="admin")
            {
                redirect('auth/blocked');
            }
        }
        if($role_id == "1")
        {
            if($menu !="admin")
            {
                redirect('auth/blocked');
            }
        }
    }
}
function is_logged_in2()
{
    $ci =& get_instance();
    $role_id = $ci->session->userdata('role_id');
    $menu = $ci->uri->segment(1);
    if($role_id == "1")
    {
        if($menu !="admin")
        {
            redirect('auth/blocked');
        }
    }
}