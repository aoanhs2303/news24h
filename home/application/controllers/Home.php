<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller {
	private $perPage = 5;
	public function __construct()
	{
		parent::__construct();
		$this->load->model('News_model');
	}

	public function index()
	{
		$cate = $this->News_model->getCate();
		$hot_article = $this->News_model->getHotArticle();
		$latest_article = $this->News_model->getLatestArticle();
		$nb_article = $this->News_model->getNBArticle();
		$other_article = $this->News_model->getOtherArticle();
		$xemnhieu = $this->News_model->getXNArticle();
		$data_header = array(
			'danhmuc' => $cate
		);
		$data_main = array(
			'hot_article'    => $hot_article,
			'latest_article' => $latest_article,
			'nb_article'     => $nb_article,
			'ts_article'     => $this->News_model->getCateArticle(1), //Thoi su = 1
			'tg_article'     => $this->News_model->getCateArticle(2), //The gioi = 2
			'cn_article'     => $this->News_model->getCateArticle(5), //Cong nghe = 5
			'gd_article'     => $this->News_model->getCateArticle(6),  //Giao duc = 6
			'other_article'  => $other_article,
			'xemnhieu'		 => $xemnhieu
		);

		$this->load->view('include/header', $data_header);
		$this->load->view('home_view', $data_main);
		$this->load->view('include/footer');
		
	}

	public function detail($id)
	{
		/*View + 1*/
		$this->News_model->viewCounter($id);

		$cate = $this->News_model->getCate();
		$detail = $this->News_model->getArticleByID($id);
		$relate = $this->News_model->getCateArticle($detail[0]["id_category"]);
		$xemnhieu = $this->News_model->getXNArticle();
		$comment = $this->News_model->getCommentByAricleId($id);

		$data_header = array('danhmuc' => $cate );
		$data_main = array(
			'detail'   => $detail,
			'relate'   => $relate,
			'xemnhieu' => $xemnhieu,
			'comment'  => $comment
		);
		$this->load->view('include/header', $data_header);
		$this->load->view('detail_view', $data_main);
		$this->load->view('include/footer');
	}

	public function addComment()
	{
		$content = $this->input->post('content');
		$id_article = $this->input->post('id_article');
		$id_user = $this->input->post('id_user');
		$this->News_model->addComment($content, $id_article, $id_user);
	}

	public function login()
	{
		$this->load->view('login_view');
	}

	public function loadmore()
	{
		$this->load->database();
		$count = $this->db->get('article')->num_rows();
		if(!empty($this->input->get("page"))){
			$start = ceil($this->input->get("page") * $this->perPage);
			if(!empty($this->input->get("id_category"))) {
				$this->db->where('id_category', (int)$this->input->get("id_category"));
			}
			$query = $this->db->limit($this->perPage, $start)->get("article");
			$data['posts'] = $query->result_array();
			$result = $this->load->view('loadmore_view', $data, TRUE);
			echo $result;
		}
	}

	public function category($id_category)
	{
		$cate = $this->News_model->getCate();
		$last_news = $this->News_model->getLatestCate($id_category);
		$hot_article = $this->News_model->getHotArticleCate($id_category);
		$xemnhieu = $this->News_model->getXNArticle();
		$other_article = $this->News_model->getOtherArticleCate($id_category);

		$data_header = array('danhmuc' => $cate );
		$data_main = array(
			'nb_article'    => $hot_article,
			'latest_article' => $last_news,
			'xemnhieu'		 => $xemnhieu,
			'other_article'  => $other_article

		);
		$this->load->view('include/header', $data_header);
		$this->load->view('category_view', $data_main);
		$this->load->view('include/footer');		
	}

	public function search()
	{
		$query = $this->input->get('query');
		$cate = $this->News_model->getCate();
		$xemnhieu = $this->News_model->getXNArticle();
		$search = $this->News_model->searchArticle($query);
		$num_res = count($this->News_model->searchArticle($query));

		$data_header = array('danhmuc' => $cate );
		$data_main = array(
			'xemnhieu'   => $xemnhieu,
			'search_res' => $search,
			'num_res'    => $num_res,
			'query'      => $query
		);
		$this->load->view('include/header', $data_header);
		$this->load->view('search_view', $data_main);
		$this->load->view('include/footer');		
	}

	public function contact()
	{
		$cate = $this->News_model->getCate();
		
		$xemnhieu = $this->News_model->getXNArticle();
		

		$data_header = array('danhmuc' => $cate );
		$data_main = array(
			
		);
		$this->load->view('include/header', $data_header);
		$this->load->view('contact_view', $data_main);
		$this->load->view('include/footer');	
	}

	public function send()
	{
		$name = $this->input->post('contact_name');
		$email = $this->input->post('contact_email');
		$subject = $this->input->post('contact_subject');
		$content = $this->input->post('contact_content');

		$config = Array(
		    'protocol' => 'smtp',
		    'smtp_host' => 'ssl://smtp.googlemail.com',
		    'smtp_port' => 465,
		    'smtp_user' => 'trannhulucs2303@gamil.com',
		    'smtp_pass' => 'jwxiksinsogpmzcm',
		    'mailtype'  => 'html', 
		    'charset'   => 'utf-8'
		);

		$this->load->library('email');
		
		$this->email->from($email, $name);
		$this->email->to('trannhulucs2303@gmail.com');
		$this->email->cc($email);
		
		$this->email->subject($subject);
		$this->email->message($content);
		
		if($this->email->send()) {
			$cate = $this->News_model->getCate();
			$data_header = array('danhmuc' => $cate );
			$this->load->view('include/header', $data_header);
			$this->load->view('success_view');
			$this->load->view('include/footer');
		} else {
			echo $this->email->print_debugger();	
		}
	}

}

/* End of file Home.php */
/* Location: ./application/controllers/Home.php */