<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller {


	function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
	}

	public function index()
	{
		$email	=	$_POST['email'];
		$spwd 	=	md5($_POST['spwd']);
		
		$this->db->from('user')->where(array('email'=>$email,'spwd'=>$spwd));
		$query=$this->db->get();
		if($query->num_rows()>0)
		{
			$_SESSION['uid']=$query->row()->uid;
			$_SESSION['email']=$query->row()->email;
			var_dump($_SESSION);
			header('Location: '.base_url());
		} else {
			$error['error']='Email or password error';
			$this->load->view('index',$error);
		}
	}
	
	public function logout()
	{
		session_unset();
		session_destroy();
		header('Location: '.base_url());
	}
}
/* End of file login.php */
/* Location: ./application/controllers/login.php */