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
		$this->db->join('category', 'category.id_category = article.id_category', 'left');
		$data = $this->db->get('article');
		$data = $data->result_array();
		return $data;
	}

	public function get5Article()
	{
		$this->db->select('*');
		$this->db->order_by('id_article', 'desc');
		$this->db->join('category', 'category.id_category = article.id_category', 'left');
		$data = $this->db->get('article', 5);
		$data = $data->result_array();
		return $data;
	}

	public function getArticleByID($id)
	{
		$this->db->select('*');
		$this->db->join('category', 'category.id_category = article.id_category', 'left');
		$this->db->where('id_article', $id);
		$data = $this->db->get('article');
		$data = $data->result_array();
		return $data;
	}

	public function deleteArticle($aritcle_id)
	{
		$this->db->where('id_article', $aritcle_id);
		return $this->db->delete('article');
	}

	public function editArticleByID($id_article,$title,$brief_content,$content,$id_category)
	{
		$this->db->set('title', $title);
		$this->db->set('brief_content', $brief_content);
		$this->db->set('content', $content);
		$this->db->set('id_category', $id_category);

		$this->db->where('id_article', $id_article);
		$this->db->update('article');		
		return 1;
	}

	public function getHotArticle()
	{
		$this->db->select('*');
		$this->db->order_by('id_article', 'desc');
		$this->db->where('hot', 'true');
		$data = $this->db->get('article');
		$data = $data->result_array();
		return $data;
	}

	public function getLatestArticle()
	{
		$this->db->select('*');
		$this->db->order_by('created_date', 'desc');
		$data = $this->db->get('article', 6);
		$data = $data->result_array();
		return $data;
	}

	public function getLatestCate($id_category)
	{
		$this->db->select('*');
		$this->db->order_by('created_date', 'desc');
		$this->db->where('id_category', $id_category);
		$data = $this->db->get('article', 6);
		$data = $data->result_array();
		return $data;
	}


	public function getNBArticle()
	{
		$this->db->select('*');
		$this->db->where('hot', 'nb');
		$data = $this->db->get('article', 6);
		$data = $data->result_array();
		return $data;
	}

	public function getCateArticle($cate)
	{
		$this->db->select('*');
		$this->db->where('id_category', $cate);
		$data = $this->db->get('article', 3);
		$data = $data->result_array();
		return $data;
	}

	public function getXNArticle()
	{
		$this->db->select('*');
		$this->db->order_by('view', 'desc');
		$this->db->where('view !=', 0);
		$data = $this->db->get('article', 6);
		$data = $data->result_array();
		return $data;
	}

	public function getOtherArticle()
	{
		$this->db->select('*');
		$this->db->order_by('id_article', 'desc');
		$condition = array('hot !=' => 'hot', 'hot !=' => 'nb');
		$this->db->where($condition);
		$data = $this->db->get('article', 5);
		$data = $data->result_array();
		return $data;
	}

	public function getOtherArticleCate($id_category)
	{
		$this->db->select('*');
		$this->db->order_by('id_article', 'desc');
		$condition = array('hot !=' => 'hot', 'hot !=' => 'nb', 'id_category' => $id_category);
		$this->db->where($condition);
		$data = $this->db->get('article', 5);
		$data = $data->result_array();
		return $data;
	}

	public function getHotArticleCate($id_category)
	{
		$this->db->select('*');
		$this->db->order_by('view', 'desc');
		$this->db->where('id_category', $id_category);
		$data = $this->db->get('article', 6);
		return $data = $data->result_array();
	}

	public function setHotArticle($array_id)
	{
		$this->db->set('hot', '');
		$this->db->where('hot', 'true');
		$this->db->update('article');

		foreach ($array_id as $value) {
			$this->db->set('hot', 'true');
			$this->db->where('id_article', $value);
			$this->db->update('article');
		}
		return 1;
	}

	public function authenticationAdmin($user, $pass)
	{
		$this->db->select('*');
		$px = md5($pass);
		$dieukien = array('username	' => $user, 'password' => $pass);
		$this->db->where($dieukien);
		$data = $this->db->get('user');

		$data = $data->result_array();

		if(count($data) == 1) {
			return $data;
		} else {
			return null;
		}
	}

	public function addUser($username,$email,$password)
	{
		$user = array(
			'username' => $username, 
			'password' => $password,
			'email'	   => $email,
			'id_usertype' => 3
		);
		$this->db->insert('user', $user);
	}

	public function getAllComment()
	{
		$this->db->select('comment.*, user.username, article.title');
		$this->db->order_by('id_comment', 'desc');
		$this->db->join('user', 'user.id_user = comment.id_user', 'left');
		$this->db->join('article', 'article.id_article = comment.id_article', 'left');
		$data = $this->db->get('comment');
		$data = $data->result_array();
		return $data;
	}

	public function getCommentByAricleId($id_article)
	{
		$this->db->select('*');
		$this->db->order_by('id_comment', 'desc');
		$this->db->join('user', 'user.id_user = comment.id_user', 'left');
		$dieukien = array('id_article' => $id_article, 'block' => 0);
		$this->db->where($dieukien);
		$data = $this->db->get('comment');
		$data = $data->result_array();
		return $data;
	}

	public function addComment($content, $id_article, $id_user)
	{
		$data = array(
			'content' => $content,
			'id_article' => $id_article,
			'id_user' => $id_user
		);
		$this->db->insert('comment', $data);
		return $this->db->insert_id();
	}

	public function toggleComment($id_comment, $block)
	{
		$this->db->set('block', $block);
		$this->db->where('id_comment', $id_comment);
		return $this->db->update('comment');
	}

	public function getAllLog()
	{
		$this->db->select('*');
		$this->db->order_by('id_systemlog', 'desc');
		$this->db->join('user', 'user.id_user = systemlog.id_user', 'left');
		$data = $this->db->get('systemlog');
		$data = $data->result_array();
		return json_encode($data);
	}

	public function get5Log()
	{
		$this->db->select('*');
		$this->db->order_by('id_systemlog', 'desc');
		$this->db->join('user', 'user.id_user = systemlog.id_user', 'left');
		$data = $this->db->get('systemlog', 5);
		$data = $data->result_array();
		return json_encode($data);
	}

	public function addLog($content, $id_user)
	{
		$data = array('content' => $content, 'id_user' => $id_user);
		$this->db->insert('systemlog', $data);
		return $this->db->insert_id();
	}

	public function addAccount($username, $email, $password, $id_usertype)
	{
		$data = array(
			'username' => $username,
			'email' => $email,
			'password' => $password,
			'id_usertype' => $id_usertype
		);
		$this->db->insert('user', $data);
		return $this->db->insert_id();
	}

	public function getUserById($id_user)
	{
		$this->db->select('*');
		$this->db->where('id_user', $id_user);
		$data = $this->db->get('user');
		$data = $data->result_array();
		return json_encode($data);
	}

	public function editUserById($id_user, $fullname, $email, $sdt)
	{
		$this->db->set('fullname', $fullname);
		$this->db->set('email', $email);
		$this->db->set('sdt', $sdt);
		$this->db->where('id_user', $id_user);
		return $this->db->update('user');
	}

	public function changePass($id_user, $newPass)
	{
		$this->db->set('password', md5($newPass));
		$this->db->where('id_user', $id_user);
		return $this->db->update('user');
	}

	public function countView()
	{
		$this->db->select_sum('view');
		$result = $this->db->get('article')->row();  
		return $result->view;
	}

	public function searchArticle($query)
	{
		$this->db->select('*');
		$this->db->from('article');
		$this->db->or_like('article.title', $query);
		$data = $this->db->get();
		$data = $data->result_array();
		return $data;
	}

	public function viewCounter($id_article)
	{
		$sql = "UPDATE article SET view = view + 1 WHERE id_article = ".$id_article ;
      	if($this->db->query($sql)) {
      		return 1;
      	}
      	return -1;

	}

}

/* End of file News_model.php */
/* Location: ./application/models/News_model.php */