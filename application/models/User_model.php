<?php 

class User_model extends CI_Model{
	public function get_by_email_password($email = '', $password ='')
	{
		return $this->db->get_where('user', 
			array(
				'email' => $email,
				'password' => sha1($password)
			)
		)->row();
	}
	public function insert_user($data = array())
	{
		return $this->db->insert('user', $data);
	}
	public function create_captcha()
	{
		$vals = array(
	        //'word'          => 'Random word', //katayg tercetak
	        'img_path'      => './captcha/', //letak folder
	        'img_url'       => base_url().'captcha/',
	        // 'font_path'     => './path/to/fonts/texb.ttf',
	        'img_width'     => '150',
	        'img_height'    => 30,
	        'expiration'    => 10, //waktu berdasarkan detik
	        'word_length'   => 8, //jumlah karakter
	        'font_size'     => 25,
	        'img_id'        => 'Imageid',
	        'pool'          => '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ',

	        // White background and border, black text and red grid
	        'colors' => array(
	                'background' => array(255, 255, 255),
	                'border' => array(255, 255, 255),
	                'text' => array(0, 0, 0),
	                'grid' => array(255, 40, 40)
        )
	);

	$cap = create_captcha($vals);

	return $cap;
		}
}