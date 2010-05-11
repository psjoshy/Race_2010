<?php

class Usr extends Controller {

	function Usr()
	{
		parent::Controller();	
	}
	
	function index()
	{
		/*$data['base']=$this->config->item('base_url');
		$this->load->view('header.php',$data);
		$this->load->view('home.php',$data);
		$this->load->view('footer.php');
		*/
	}
	
	function login()
	{
		$this->load->model("Dashboard");
		$usr=$_POST['username'];
		$pwd=MD5($_POST['password']);
		$result=$this->Dashboard->login($usr,$pwd);
		$base=$this->config->item('base_url');
		if($result)
		{
			header("Location:".$base."/index.php/admin/");
		}	
		else
		{
			$data['base']=$this->config->item('base_url');
			$this->load->view('header.php',$data);
			$data['err']="Can't Login";
			$this->load->view('home.php',$data);
			$this->load->view('footer.php');
		}
	}
	
		function logout()
	{
		$this->load->model("Dashboard");
		$this->Dashboard->logout();
	}
	
	function ass_login()
	{
		$base=$this->config->item('base_url');
		$this->load->model("Collecter");
		$this->Collecter->add($_POST);
		header("Location:".$base."/index.php/collect/search");
		
		
	}
	
	function ass_logout()
	{
	
	}

	
}

/* End of file welcome.php */
/* Location: ./system/application/controllers/welcome.php */