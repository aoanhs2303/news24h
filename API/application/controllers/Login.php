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

	public function logout()
	{
		if(isset($_SESSION['Username'])) {
	        session_destroy(); 
	    }
	    redirect(base_url().'login');
	}

	public function authentication()
	{
		$user = $this->input->post('username');
		$pass = $this->input->post('password');
		
		$data = $this->News_model->authenticationAdmin($user, md5($pass));
		if ($data) {
            $_SESSION["Username"] = $data[0]["username"];
            $this->session->unset_userdata("ErrorMessage");
            // echo $_SESSION["Username"];
            redirect('http://localhost/news24h/');
        } else {
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