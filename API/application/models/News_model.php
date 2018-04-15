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

	public function deleteCate($id_category)
	{
		$this->db->where('id_category', $id_category);
		$this->db->delete('category');
		return 1;
	}

	public function editCateById($id_category,$name,$code_name)
	{
		$this->db->set('name', $name);
		$this->db->set('code_name', $code_name);
		$this->db->where('id_category', $id_category);
		return $this->db->update('category');
	}

	public function addArticle($title,$image,$brief_content,$content,$id_category)
	{
		$data = array(
			'title' => $title,
			'image' => $image,
			'brief_content' => $brief_content,
			'content' => $content,
			'id_category' => $id_category
		);
		$this->db->insert('article', $data);
		return $this->db->insert_id();
	}

	public function getArticle()
	{
		$this->db->select('*');
		$data = $this->db->get('article');
		$data = $data->result_array();
		return $data;
	}
}

/* End of file News_model.php */
/* Location: ./application/models/News_model.php */