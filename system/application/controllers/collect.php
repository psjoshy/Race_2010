<?php
class Collect extends Controller {

	function Collect()
	{
		parent::Controller();	
		$base=$this->config->item('base_url');	
		if(($this->session->userdata('type') != 'collector') and ($this->session->userdata('type') != 'admin'))  header("Location:".$base);
		
	}
	
	
	function index()
	{
		$data['base']=$this->config->item('base_url');		
		$this->load->view('header.php',$data);
		$this->load->view('collect_home.php',$data);
		$this->load->view('footer.php');	
	}
	
	function collectpage()
	{
		$data['base']=$this->config->item('base_url');		
		$this->load->view('header.php',$data);
		$data['id']=$this->uri->segment(3);
		$this->load->model("Participant");
		$data['query']=$this->Participant->get_participant($data['id']);
		$this->load->model("Collecter");
		$this->load->view('collect_home.php',$data);
		$this->load->view('footer.php');
	}
	
	function collect_merchandisepage_completed(){
	
	$data['base']=$this->config->item('base_url');		
		$this->load->view('header.php',$data);
		$data['id']=$this->uri->segment(3);

		$this->load->model("Participant");
		$data['query']=$this->Participant->get_participant_merchandise($data['id'],1);
		$data['query2']=$this->Participant->get_participant_merchandise($data['id'],2);
		$data['query3']=$this->Participant->get_participant_merchandise_details2($data['id']);
		
		 
		$this->load->model("Collecter");
		$this->load->view('merchandise_home_completed.php',$data);
		$this->load->view('footer.php');
	
	}
	
	function collect_merchandisepage()
	{
		$data['base']=$this->config->item('base_url');		
		$this->load->view('header.php',$data);
		$data['id']=$this->uri->segment(3);

		$this->load->model("Participant");
		$data['query']=$this->Participant->get_participant_merchandise($data['id'],1);
		 
		$data['query2']=$this->Participant->get_participant_merchandise($data['id'],2);
		$data['query3']=$this->Participant->get_participant_merchandise_details2($data['id']);
		if(isset($_POST['merchandise_remarks']))
		{
			if(isset($_POST['merchandise_selfcollect']) && $_POST['merchandise_selfcollect'] ==1){
			$_POST['merchandise_collectit'] = '' ;
			}else{
			$_POST['merchandise_selfcollect'] ='' ;
			}
			
		$id=$this->uri->segment(3);
		$this->load->model("Collecter");
		$this->Collecter->collect_merchandise($_POST,$id);
		//$this->load->model("Report");
		//$this->Report->make_inventory($_POST);	
		?>
		<script>
window.location="<?= $this->config->item('base_url') ?>/index.php/collect/search/2/mcompleted";
</script>
	<?	 
		}
		 
		$this->load->model("Collecter");
		$this->load->view('merchandise_home.php',$data);
		$this->load->view('footer.php');
	}
	
	
		
	function collectit_merchandise()
	{
		
		$id=$this->uri->segment(3);
		$this->load->model("Collecter");
		$this->Collecter->collect_it($_POST,$id);
		$this->load->model("Report");
		$this->Report->make_inventory($_POST);
		$data['base']=$this->config->item('base_url');		
		$this->load->view('header',$data);
		$data['message']="Complete Collect";
		$this->load->view('collect_participant',$data);
		$this->load->view('footer');	
	}
	
	function search()
	{
		
		$data['base']=$this->config->item('base_url');
		
		$this->load->view('header.php',$data);
	//	$this->load->view('collect_participant.php',$data);
	    $type = $this->uri->segment(3);
		if($type == 1){
		$this->load->view('collect_participant.php',$data);
		}else if($type == 2){
		$mcompleted = $this->uri->segment(4);
			
		    if(isset($mcompleted) && $mcompleted == 'mcompleted' ){
			
			$data['msg'] = "Merchandise Collection Completed" ;
			  
			}else{
			$data['msg'] = '';
             }			
		$this->load->view('collect_mparticipant.php',$data);
		
			
		}else{
		$this->load->view('choose_type.php',$data);
		}
		$this->load->view('footer.php');
	}
	
	function race_finder()
	{
		$race_id=$this->uri->segment(3);
				
		if($race_id=="")
		{
			echo "Enter Race ID ";
			exit;
		}
		
		$this->load->model("Participant");
		$data['name']=$this->Participant->get_name_by_race($race_id);
		$data['id']=$this->Participant->get_id_by_race($race_id);
		$data['base']=$this->config->item('base_url');
		$data['collect_it']=$this->Participant->get_collectit_by_race($race_id);
		$data['collected_by']= $this->Participant->get_collected_by_race($race_id);
		$data['race_id']=$race_id;
		
		$this->load->view('collect_race_find',$data);	
	}
	
	function email_mfinder()
	{
		$email=$this->uri->segment(3);
		if($email=="")
		{
			echo "Enter Email Address";
			exit;
		}
		$this->load->model("Participant");
		$race_id=$this->Participant->get_raceid_by_email($email);
		
		$data['email']=$email;
		$data['name']=$this->Participant->get_name_by_race($race_id);
		$data['id']=$this->Participant->get_id_by_race($race_id);
		$data['base']=$this->config->item('base_url');
		$data['collect_it']=$this->Participant->get_collectit_by_mrace($race_id);
		$data['collected_by']= $this->Participant->get_collected_by_race($race_id);
		$data['race_id']=$race_id;
		
		$this->load->view('collect_race_find',$data);
	}
	function mrace_finder()
	{
		$race_id=$this->uri->segment(3);
		
		if($race_id=="")
		{
			echo "Enter ID ";
			exit;
		}
		
		$this->load->model("Participant");
		$data['name']=$this->Participant->get_name_by_race($race_id);
		$data['id']=$this->Participant->get_id_by_race($race_id);
		$data['base']=$this->config->item('base_url');
		$data['collect_it']=$this->Participant->get_collectit_by_mrace($race_id);
		if($data['collect_it']=="")
		{
			$data['collect_it']=0;
		}
		//$data['collected_by']= $this->Participant->get_collected_by_race($race_id);
		$data['race_id']=$race_id;
		
		$this->load->view('collect_mrace_find',$data);	
	
	}
	
	
	function nric_finder()
	{
		$nric=$this->uri->segment(3);
		if($nric=="")
		{
			echo "Enter NRIC number";
			exit;
		}
		$this->load->model("Participant");
		$data['name']=$this->Participant->get_name_by_nric($nric);
		$data['id']=$this->Participant->get_id_by_nric($nric);
		$data['collect_it']=$this->Participant->get_collectit_by_nric($nric);		
		$data['collected_by']= $this->Participant->get_collected_by_nric($nric);
		$data['base']=$this->config->item('base_url');
		$data['nric']=$nric;
		
		$this->load->view('collect_race_find',$data);	
	
	}
	
	function nric_mfinder()
	{
		$nric=$this->uri->segment(3);
		if($nric=="")
		{
			echo "Enter NRIC number";
			exit;
		}
		$this->load->model("Participant");
		$data['name']=$this->Participant->get_name_by_nric($nric);
		$data['id']=$this->Participant->get_id_by_nric($nric);
		$data['collect_it']=$this->Participant->get_collectit_by_mnric($nric);		
		$data['collected_by']= $this->Participant->get_collected_by_nric($nric);
		$data['base']=$this->config->item('base_url');
		$data['nric']=$nric;
		
		$this->load->view('collect_mrace_find',$data);	
	
	}
	
	
	function collectit()
	{
		
		$id=$this->uri->segment(3);
		$this->load->model("Collecter");
		$this->Collecter->collect_it($_POST,$id);
		$this->load->model("Report");
		$this->Report->make_inventory($_POST);
		$data['base']=$this->config->item('base_url');		
		$this->load->view('header',$data);
		$data['message']="Complete Collect";
		$this->load->view('collect_participant',$data);
		$this->load->view('footer');	
	}
	
	function collectlst()
	{
		$data['base']=$this->config->item('base_url');		
		$this->load->view('header',$data);
		$this->load->model("Collecter");
		$data['query']=$this->Collecter->get_collect_lst();
		$this->load->view("collect_list",$data);
		$this->load->view("footer");
	}
	
	function mcollectlst()
	{
		$data['base']=$this->config->item('base_url');		
		$this->load->view('header',$data);
		$this->load->model("Collecter");
		$data['query']=$this->Collecter->get_mcollect_lst();
		$data['m']=true;
		$this->load->view("collect_list",$data);
		$this->load->view("footer");
	}
	
	function showdetail()
	{
		$data['base']=$this->config->item('base_url');		
		$id=$this->uri->segment(3);
		$this->load->view('header',$data);
		$this->load->model("Collecter");
		$data['query']=$this->Collecter->get_query($id);
		$this->load->view("collect_list_detail",$data);
		$this->load->view("footer");		
	}
	
	function uncollect()
	{
		$data['base']=$this->config->item('base_url');	
		$this->load->view('header.php',$data);
		$id=$this->uri->segment(3);
		$this->load->model("Collecter");
		$this->Collecter->un_collect($id);
		$data['message']="Completed Uncollect";
		$this->load->view('collect_participant.php',$data);
		$this->load->view('footer.php');
		
	}
	
		
}
?>