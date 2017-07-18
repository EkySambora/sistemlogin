<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Artikel extends CI_Controller{

  public function __construct()
  {
    parent::__construct();
    $this->load->model('artikel_model');
  }

  public function index()
  {
    $data['title'] = 'Artikel';
    $config['base_url'] = site_url('artikel/index/');
    $config['total_rows'] = $this->artikel_model->get_page();
    $config['per_page'] = $per_page = 2;
    $config['full_tag_open'] = '<ul class="pagination" style="float:right">';
    $config['full_tag_close'] = '</ul>';

    $config['first_link'] = 'First';
    $config['first_tag_open'] = '<li>';
    $config['first_tag_close'] = '</li>';

    $config['last_link'] = 'Last';
    $config['last_tag_open'] = '<li>';
    $config['last_tag_close'] = '</li>';

    $config['next_link'] = 'Next &gt;';
    $config['next_tag_open'] = '<li>';
    $config['next_tag_close'] = '</li>';

    $config['prev_link'] = '&lt; Prev';
    $config['prev_tag_open'] = '<li>';
    $config['prev_tag_close'] = '</li>';

    $config['cur_tag_open'] = '<li class="active"><a href="#">';
    $config['cur_tag_close'] = '</a></li>';

    $config['num_tag_open'] = '<li>';
    $config['num_tag_close'] = '</li>';

    $this->pagination->initialize($config);
    $data['pagination'] = $this->pagination->create_links();
    $offset = $this->uri->segment(3) ? $this->uri->segment(3) : 0;
    $artikel = $this->artikel_model->get_all($per_page, $offset);
    $data['artikel'] = $artikel;
    $this->load->view('artikel/index', $data);
  }
  public function detail($id)
  {
    $data['title'] = 'Detail';
    $artikel = $this->artikel_model->detail($id);
    $data['artikel_detail'] = $artikel;
    $this->load->view('artikel/detail', $data);
  }
  public function delete($id)
  {
    $artikel = $this->artikel_model->delete($id);
    redirect('artikel/index');
  }
  public function add()
  {
    $data['title'] = 'Add';
    date_default_timezone_set('Asia/Jakarta');
    if(isset($_POST['kirim'])){
      $data_artikel = array(
        'judul' => $this->input->post('judul'),
        'detail' => $this->input->post('detail'),
        'tanggal' => date('Y-m-d H:i:s')
      );
      $this->artikel_model->insert_data($data_artikel);
      redirect('artikel');
    }
    $this->load->view('artikel/add', $data);
  }
  public function edit($id)
  {
    $data['title'] = 'Edit';
    $artikel = $this->artikel_model->detail($id);
    $data['artikel_detail'] = $artikel;
    if(isset($_POST['update'])){
      $data_id = array(
        'judul' => $this->input->post('judul'),
        'detail' => $this->input->post('detail')
      );
      $id_artikel = $this->input->post('id');
      $this->artikel_model->edit($data_id, $id_artikel);
      redirect('artikel');
    }
    $this->load->view('artikel/edit', $data);
  }

}
