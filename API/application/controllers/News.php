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

	public function getArticleByID()
	{
		$id = $this->input->post('article_id');
		$data = json_encode($this->News_model->getArticleByID($id));
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

	public function deleteArticle()
	{
		$aritcle_id = $this->input->post('id_article');
		echo $this->News_model->deleteArticle($aritcle_id);
	}

	public function editArticleByID()
	{
		$id_article = $this->input->post('id_article');
		$title = $this->input->post('title');
		$image = $this->input->post('image');
		$brief_content = $this->input->post('brief_content');
		$content = $this->input->post('content');
		$id_category = $this->input->post('id_category');
	
		echo $this->News_model->editArticleByID($id_article,$title,$image,$brief_content,$content,$id_category);
	}

	public function setHotArticle()
	{
		$array_id = $this->input->post('array_id');
		// $array_id = json_encode($array_id);
		// echo $array_id;
		echo $this->News_model->setHotArticle($array_id);
	}

	public function getSession()
	{
		if(isset($_SESSION['Username'])) {
	    	echo $_SESSION['Username'];
	    } else {
	    	echo "";
	    }
	}

	public function getAllComment()
	{
		echo json_encode($this->News_model->getAllComment());
	}

	public function toggleComment()
	{
		$id_comment = $this->input->post('id_comment');
		$block = $this->input->post('block');
		echo $this->News_model->toggleComment($id_comment, $block);
	}

	public function getAllLog()
	{
		echo $this->News_model->getAllLog();
	}

	public function addLog()
	{
		$content = $this->input->post('log_content');
		$id_user = $this->input->post('log_iduser');
		echo $this->News_model->addLog($content, $id_user);
	}

	public function addAccount()
	{
		$username = $this->input->post('username');
		$email = $this->input->post('email');
		$password = $this->input->post('password');
		$id_usertype = $this->input->post('id_usertype');

		echo $this->News_model->addAccount($username, $email, $password, $id_usertype);
		
	}

}

/* End of file News.php */
/* Location: ./application/controllers/News.php */