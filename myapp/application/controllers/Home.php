<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function index()
	{

		$data['produk'] = $this->db
		->select('*,tbl_produk_kategori.nama_kategori')
		->join('tbl_produk_kategori', 'tbl_produk.id_kategori=tbl_produk_kategori.id_kategori')
		->get('tbl_produk')->result();	
		$tmp['content'] = $this->load->view('homepage', $data, true);
		$this->load->view('template', $tmp);
	}

	public function produk_list($offset = 0)
	{

		$data['categori'] = $this->db->get('tbl_produk_kategori')->result();
		$data['related'] = $this->db
		->select('*,tbl_produk_kategori.nama_kategori')
		->join('tbl_produk_kategori', 'tbl_produk.id_kategori=tbl_produk_kategori.id_kategori')
		->order_by('rand()')
		->limit(6)
		->get('tbl_produk')->result();

		$page=$this->uri->segment(3);
		$limit=12;
		if(!$page):
			$offset = 0;
		else:
			$offset = $page;
		endif;
		$num_rows= $this->db->get('tbl_produk')->num_rows();
		$config['base_url'] = site_url().'home/produk_list';
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
		$data["paginator"] =$this->pagination->create_links();
		$data['produk'] = $this->db->get('tbl_produk', $limit, $offset)->result();
		$tmp['content'] = $this->load->view('produk_list', $data, true);
		$this->load->view('template', $tmp);
	}

	public function kategori($id_kategori='',$offset = 0)
	{

		$data['categori'] = $this->db->get('tbl_produk_kategori')->result();
		$data['related'] = $this->db
		->select('*,tbl_produk_kategori.nama_kategori')
		->join('tbl_produk_kategori', 'tbl_produk.id_kategori=tbl_produk_kategori.id_kategori')
		->order_by('rand()')
		->limit(6)
		->get('tbl_produk')->result();

		$page=$this->uri->segment(4);
		$limit=12;
		if(!$page):
			$offset = 0;
		else:
			$offset = $page;
		endif;
		$num_rows= $this->db->where('id_kategori', $id_kategori)->get('tbl_produk')->num_rows();
		$config['base_url'] = site_url().'home/kategori/'.$id_kategori.'/';
		$config['total_rows'] = $num_rows;
		$config['per_page'] = $limit;
		$config['uri_segment'] = 4;
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
		$data["paginator"] =$this->pagination->create_links();
		$data['produk'] = $this->db->where('id_kategori', $id_kategori)->get('tbl_produk', $limit, $offset)->result();
		$tmp['content'] = $this->load->view('produk_list', $data, true);
		$this->load->view('template', $tmp);
	}

	public function detail($id_produk)
	{
		$data['produk'] = $this->db
		->select('*,tbl_produk_kategori.nama_kategori')
		->where('id_produk', $id_produk)
		->join('tbl_produk_kategori', 'tbl_produk.id_kategori=tbl_produk_kategori.id_kategori')
		->get('tbl_produk')->result();	
		$data['related'] = $this->db
		->select('*,tbl_produk_kategori.nama_kategori')
		->join('tbl_produk_kategori', 'tbl_produk.id_kategori=tbl_produk_kategori.id_kategori')
		->order_by('rand()')
		->get('tbl_produk')->result();
		$tmp['content'] = $this->load->view('detail', $data, true);
		$this->load->view('template', $tmp);
	}
}
