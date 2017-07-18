<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Artikel_model extends CI_Model{

  public function __construct()
  {
    parent::__construct();
    //Codeigniter : Write Less Do More
  }
  public function get_all($per_page = '', $offset = '')
  {
    return $this->db->limit($per_page, $offset)->get('artikel')->result();
  }
  public function detail($id = null)
  {
    return $this->db->get_where('artikel', array('id' => $id))->row();
  }
  public function delete($id = null)
  {
    return $this->db->delete('artikel', array('id' => $id));
  }
  public function insert_data($data = array())
  {
    return $this->db->insert('artikel', $data);
  }
  public function edit($data_id = array(), $id_artikel = NULL )
  {
    return $this->db->update('artikel', $data_id , array('id' => $id_artikel));
  }
  public function get_page()
  {
    return $this->db->get('artikel')->num_rows();
  }
}
