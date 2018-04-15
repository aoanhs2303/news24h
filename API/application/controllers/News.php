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

	public function uploadFile()
	{
		$target_dir = "./uploads/";
		$name = $_POST['name'];
		print_r($_FILES);
		$target_file = $target_dir . basename($_FILES["file"]["name"]);
		move_uploaded_file($_FILES["file"]["tmp_name"], $target_file);
	}

	public function getArticle()
	{
		$data = json_encode($this->News_model->getArticle());
		echo $data;
	}

	public function addArticle()
	{
		$title = $this->input->post('title');
		$image = $this->input->post('image');
		$brief_content = $this->input->post('brief_content');
		$content = $this->input->post('content');
		$id_category = $this->input->post('id_category');

		echo $this->News_model->addArticle($title,$image,$brief_content,$content,$id_category);
	}

}

/* End of file News.php */
/* Location: ./application/controllers/News.php */