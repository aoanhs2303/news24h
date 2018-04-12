<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class News extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('News_model');
	}

	public function index()
	{
		echo "<pre>";
		var_dump("hello");
		echo "</pre>";
	}

	public function addCate()
	{
		$name = $this->input->post('name');
		$code_name = $this->input->post('code_name');
		echo $this->News_model->addCate($name,$code_name);
	}

	public function deleteCate()
	{
		$id_category = $this->input->post('id_category');
		echo $this->News_model->deleteCate($id_category);
	}

	public function editCate()
	{
		$id_category = $this->input->post('id_category');
		$name = $this->input->post('name');
		$code_name = $this->input->post('code_name');
		$this->News_model->editCateById($id_category,$name,$code_name);
	}

	public function getAllCate()
	{
		$data = json_encode($this->News_model->getCate());
		echo $data;
	}
}

/* End of file News.php */
/* Location: ./application/controllers/News.php */