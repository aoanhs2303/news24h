<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class News_model extends CI_Model {

	public $variable;

	public function __construct()
	{
		parent::__construct();
	}

	public function getCate()
	{
		$this->db->select('*');
		$data = $this->db->get('category');
		$data = $data->result_array();
		return $data;
	}

	public function addCate($name,$code_name)
	{
		$data = array(
			'name' => $name,
			'code_name' => $code_name
		);
		$this->db->insert('category', $data);
		return $this->db->insert_id();
	}

}

/* End of file News_model.php */
/* Location: ./application/models/News_model.php */