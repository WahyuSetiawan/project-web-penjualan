<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Frontend extends MY_Controller
{

    
    public function __construct()
    {
        parent::__construct();

        $this->load->model('kategoriModel');
        
        $this->data['head']['kategori'] = $this->kategoriModel->get();
        $this->data['head']['cart'] = $this->cart;
    }
    

    public function index()
    {

    }

    public function pagination($num_rows, $limit)
    {
        $config['base_url'] = site_url() . 'home/produk_list';
        $config['total_rows'] = $num_rows;
        $config['per_page'] = $limit;
        $config['uri_segment'] = 3;
        $config['full_tag_open'] = '<ul class="pagination">';
        $config['full_tag_close'] = '</ul>';
        $config['first_tag_open'] = '<li class="prev page">';
        $config['first_tag_close'] = '</li>';
        $config['last_tag_open'] = '<li class="next page">';
        $config['last_tag_close'] = '</li>';
        $config['next_tag_open'] = '<li class="next page">';
        $config['next_tag_close'] = '</li>';
        $config['prev_tag_open'] = '<li class="prev page">';
        $config['prev_tag_close'] = '</li>';
        $config['cur_tag_open'] = '<li class="current"><a href="">';
        $config['cur_tag_close'] = '</a></li>';
        $config['num_tag_open'] = '<li class="page">';
        $config['num_tag_close'] = '</li>';
        $this->pagination->initialize($config);

        return $this->pagination->create_links();

    }
}

/* End of file Public.php */