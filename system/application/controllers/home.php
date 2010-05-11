<?php

class Home extends Controller {

	function Home()
	{
		parent::Controller();	
	}
	
	function index()
	{
		$data['base']=$this->config->item('base_url');
		$this->load->view('header.php',$data);
		$this->load->view('home.php',$data);
		$this->load->view('footer.php');
	}
}

/* End of file welcome.php */
/* Location: ./system/application/controllers/welcome.php */