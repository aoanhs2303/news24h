<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
include("Function.php");

class Login extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('News_model');
	}

	public function index()
	{
		$this->load->view('login_view');
	}

	public function register()
	{
		$this->load->view('register_view');
	}

	public function do_register()
	{
		$username = $this->input->post('username');
		$email = $this->input->post('email');
		$pass_1 = $this->input->post('password_1');
		$pass_2 = $this->input->post('password_2');
		if($pass_1 == $pass_2) {
			$this->News_model->addUser($username, $email, md5($pass_1));
			// $data['login'] = 'Đăng ký thành công';
			// $this->load->view('login_view', $data);
			$this->load->view('login_view');

		} else {
			$this->load->view('register_view');
		}
	}

	public function logout()
	{
		
	    session_destroy(); 
	    
	    redirect(base_url().'login');
	}

	public function authentication()
	{
		$user = $this->input->post('username');
		$pass = $this->input->post('password');
		
		$data = $this->News_model->authenticationAdmin($user, md5($pass));
		if ($data && $data[0]['id_usertype'] == 1) {
            $_SESSION["Username"] = $data[0]["username"];
            $this->session->unset_userdata("ErrorMessage");
            redirect('http://localhost/news24h/');
        }
        else if ($data && $data[0]['id_usertype'] == 3) {
            $_SESSION["user"] = $data[0]["username"];
            $_SESSION["id_user"] = $data[0]["id_user"];
            $this->session->unset_userdata("ErrorMessage");
            redirect('http://localhost/news24h/API/home');
		
        }
        else {
        	$_SESSION["ErrorMessage"] = "Incorrect username or password";
        	redirect(base_url().'login');
        }

	}

	// public function getSession()
	// {
	// 	if(isset($_SESSION['Username'])) {
	//     	echo $_SESSION['Username'];
	//     } else {
	//     	echo $_SESSION['Username'];
	//     }
	// }
}

/* End of file Login.php */
/* Location: ./application/controllers/Login.php */