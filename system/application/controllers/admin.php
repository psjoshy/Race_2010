<?php
class Admin extends Controller {

	function Admin()
	{
		parent::Controller();	
		$base=$this->config->item('base_url');	
		if($this->session->userdata('type') != 'admin') header("Location:".$base);
		
	}
	
	function index()
	{
		$data['base']=$this->config->item('base_url');		
		$this->load->view('header.php',$data);
		$this->load->view('admin_home.php',$data);
		$this->load->view('footer.php');		
	}
	
	function manage()
	{
		$data['base']=$this->config->item('base_url');		
		$this->load->view('header.php',$data);
		$this->load->model("Dashboard");
		$data['query']=$this->Dashboard->get_all_admin();
		$this->load->view('admin_manage.php',$data);
		$this->load->view('footer.php');		
	}
	
	function inventory()
	{
		$data['base']=$this->config->item('base_url');		
		$this->load->view('header',$data);
		$this->load->view('admin_inventory',$data);
		$this->load->view('footer');	
	}
	
	function merchandise()
	{
		$data['base']=$this->config->item('base_url');		
		$this->load->view('header',$data);
		$this->load->view('admin_merchandise',$data);
		$this->load->view('footer');	
	}
	
	function add_admin()
	{
		$data['base']=$this->config->item('base_url');		
		$this->load->view('header.php',$data);
		$this->load->view("admin_add.php",$data);
		$this->load->view('footer.php');		
	}
	
	function chkusr()
	{
		$usr=$this->uri->segment(3);
		$this->load->model("Dashboard");
		$res=$this->Dashboard->chkusrname($usr);
		if($res) echo "<font color='green'>&nbsp;OK</font>";
		else	echo "<font color='red'>&nbsp;Already Exist</font>";		
	}
	
	function addnew()
	{
		$this->load->model("Dashboard");
		$this->Dashboard->addadmin($_POST);
		echo "Completed. Do You want to add another ?";		
	}	
	
	function editname()
	{
	
		$usrid=$this->uri->segment(3);
		
		$data['base']=$this->config->item('base_url');		
		$this->load->view('header.php',$data);
		
		
		$this->load->model("Dashboard");
		$data['username']=$this->Dashboard->getusername($usrid);
		$data['userid']=$usrid;
		$this->load->view("admin_editname",$data);
		$this->load->view("footer.php");
	}
	
	function editit()
	{
		$name=$_POST['name'];
		$id=$_POST['id'];
		$this->load->model("Dashboard");
		$this->Dashboard->changename($id,$name);
		header("Location:".$this->config->item('base_url')."/index.php/admin/manage");
	}
	
	function editpwd()
	{
		$data['usrid']=$this->uri->segment(3);
		
		$data['base']=$this->config->item('base_url');
		$this->load->view('header.php',$data);
		
		$this->load->model("Dashboard");
		$data['username']=$this->Dashboard->getusername($data['usrid']);
		$this->load->view('admin_changepwd.php',$data);
		$this->load->view("footer.php");
	}
	
	function editpwd_it()
	{
		$id=$this->uri->segment(3);
		$pwd=$_POST['pwd'];
		$this->load->model("Dashboard");
		$this->Dashboard->changepwd($id,$pwd);
		echo "Completed Change Password";
	}
	
	function del()
	{
		$id=$this->uri->segment(3);
		$this->load->model("Dashboard");
		$this->Dashboard->deladmin($id);
	}
	
	
	///////// Participant //////////////////
	
	function manparticipant()
	{
		$data['base']=$this->config->item('base_url');		
		$this->load->view('header.php',$data);
		$this->load->view('admin_participant.php',$data);
		$this->load->view('footer.php');
	}
	
	function manMparticipant()
	{
		$data['base']=$this->config->item('base_url');		
		$this->load->view('header.php',$data);
		$this->load->view('admin_mparticipant.php',$data);
		$this->load->view('footer.php');
	}
	
	function part_add()
	{
		$data['base']=$this->config->item('base_url');		
		$this->load->view('header.php',$data);
		$this->load->view('part_add.php',$data);
		$this->load->view('footer.php');
	}
	
	function race_finder()
	{
		$race_id=$this->uri->segment(3);
		$this->load->model("Participant");
		$data['name']=$this->Participant->get_name_by_race($race_id);
		$data['id']=$this->Participant->get_id_by_race($race_id);
		$data['collect_it']=$this->Participant->get_collectit_by_race($race_id);
		$data['base']=$this->config->item('base_url');
		$data['race_id']=$race_id;
		
		$this->load->view('admin_race_find',$data);	
	
	}
	
	function race_mfinder()
	{
		$race_id=$this->uri->segment(3);
		$this->load->model("Participant");
		$data['name']=$this->Participant->get_name_by_race($race_id);
		$data['id']=$this->Participant->get_id_by_race($race_id);
		$data['collect_it']=$this->Participant->get_collectit_by_mrace($race_id);
		$data['base']=$this->config->item('base_url');
		$data['race_id']=$race_id;
		$data['m']=true;
		$this->load->view('admin_race_find',$data);	
	
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
		$this->load->view('admin_race_find',$data);		
	}
	
	function nric_finder()
	{
		$nric=$this->uri->segment(3);
		$this->load->model("Participant");
		$data['name']=$this->Participant->get_name_by_nric($nric);
		$data['id']=$this->Participant->get_id_by_nric($nric);	
		$data['collect_it']=$this->Participant->get_collectit_by_nric($nric);		
		$data['base']=$this->config->item('base_url');
		$data['nric']=$nric;
		
		$this->load->view('admin_race_find',$data);	
	
	}
	
	function nric_mfinder()
	{
		$nric=$this->uri->segment(3);
		$this->load->model("Participant");
		$data['name']=$this->Participant->get_name_by_nric($nric);
		$data['id']=$this->Participant->get_id_by_nric($nric);	
		$data['collect_it']=$this->Participant->get_collectit_by_mnric($nric);		
		$data['base']=$this->config->item('base_url');
		$data['nric']=$nric;
		$data['m']=true;
		$this->load->view('admin_race_find',$data);	
	
	}
			
	function participants_show()
	{
		$id=$this->uri->segment(3);
		$data['base']=$this->config->item('base_url');	
		$this->load->view('header.php',$data);
		$this->load->model("Participant");
		$data['query']=$this->Participant->get_participant($id);
		$data['id']=$id;
		
		$this->load->view("participant_show",$data);
		$this->load->view('footer.php');
	}
	
	function part_del()
	{
		$id=$this->uri->segment(3);
		$this->load->model("Participant");
		$this->Participant->part_del($id);
		header("Location:".$this->config->item('base_url')."/index.php/admin/manparticipant");
	}
	
	function participants_add()
	{
		$this->load->model("Participant");
		/*$pardate=$_POST['participants_year']."-".$_POST['participants_month']."-".$_POST['participants_day'];
		$gdate= $_POST['participants_gyear']."-".$_POST['participants_gmonth']."-".$_POST['participants_gday'];
		$rdate=$_POST['participants_ryear']."-".$_POST['participants_rmonth']."-".$_POST['participants_rday'];
		$pdate=$_POST['participants_pyear']."-".$_POST['participants_pmonth']."-".$_POST['participants_pday'];
		
		$data=array
		(
		'participant_type' => $_POST['participant_type'] ,
		'participant_nric'=> $_POST['participant_nric'],
		'participant_date_of_birth' => $pardate,
		'participant_first_name' => $_POST['participant_first_name'],
		'participant_last_name' => $_POST['participant_last_name'],
		'bib_name' => $_POST['bib_name'],
		'participant_email' => $_POST['participant_email'],
		'participant_age' => $_POST['participant_age'],
		'participant_gender' => $_POST['participant_gender'],
		'participant_nationality' => $_POST['participant_nationality'],
		'residing_in_singapore' =>$_POST['residing_in_singapore'],
		'residing_place' => $_POST['residing_place'],
		'school' => $_POST['school'],
		'sports_participation' => $_POST['sports_participation'],
		'participant_tshirt_size' => $_POST['participant_tshirt_size'],
		'allergies' => $_POST['allergies'],
		'allergy_type' => $_POST['allergy_type'],
		'medical_condition' => $_POST['medical_condition'],
		'medical_condition_type' => $_POST['medical_condition_type'],
		'relation' => $_POST['relation'],
		'guardian_first_name' => $_POST['guardian_first_name'],
		'guardian_last_name' => $_POST['guardian_last_name'],
		'guardian_date_of_birth' => $gdate,
		'guardian_nationality' => $_POST['guardian_nationality'],
		'occupation' => $_POST['occupation'],
		'designation' => $_POST['designation'],
		'reason_others' => $_POST['reason_others'],
		'mailing_address' => $_POST['mailing_address'],
		'city' => $_POST['city'],
		'postal_code' => $_POST['postal_code'],
		'country' => $_POST['country'],
		'home_number' => $_POST['home_number'],
		'mobile_number' => $_POST['mobile_number'],
		'categories' => $_POST['categories'],
		'promo_code' => $_POST['promo_code'],
		'carnival_item' => $_POST['carnival_item'],
		'number_of_tickets' => $_POST['number_of_tickets'],
		'amount' => $_POST['amount'],
		'newsletters' => $_POST['newsletters'],
		'payment_mode' => $_POST['payment_mode'],
		'registration_date' => $rdate,
		'registration_type' => $_POST['registration_type'],
		'guardian_nric' => $_POST['guardian_nric'],
		'cheque_number' => $_POST['cheque_number'],
		'bank_name' => $_POST['bank_name'],
		'guardian_shirt_size' => $_POST['guardian_shirt_size'],
		'guardian_shirt_quantity' => $_POST['guardian_shirt_quantity'],
		'race_id' => $_POST['race_id'],
		'date_of_payment' => $pdate,
		'payment_reference' => $_POST['payment_reference'],
		//'collected_race_pack' => $_POST['collected_race_pack'],
		//'collection_type' => $_POST['collection_type'],
		//'remarks' => $_POST['remarks'],
		//'pack_collected_date' => $_POST['pack_collected_date'],
		//'pack_collected_counter' => $_POST['pack_collected_counter'],
		//'counter_assistant' => $_POST['counter_assistant'],
		'created_date' => $_POST['created_date'],
		'created_by' => $_POST['created_by'],
		'modified_date' => $_POST['modified_date'],
		'modified_by' => $_POST['modified_by']
		);
		*/
		
		$res=$this->Participant->addnew($_POST);
		if($res)
		{
			header("Location:".$this->config->item('base_url')."/index.php/admin/manparticipant");
		}
		else
		{
			$data['base']=$this->config->item('base_url');		
			$this->load->view('header.php',$data);
			$data['err']="Sorry! Race ID already Exist";
			$this->load->view('part_add.php',$data);
			$this->load->view('footer.php');
		}
		
	}
	
	function part_edit()
	{
		$id=$this->uri->segment(3);
		$data['base']=$this->config->item('base_url');	
		$this->load->view('header.php',$data);
		$this->load->model("Participant");
		$data['query']=$this->Participant->get_participant($id);
		$data['id']=$id;
		
		$this->load->view("participant_edit",$data);
		$this->load->view('footer.php');
		
	}
	
	function participants_edit()
	{
		$id=$this->uri->segment(3);
		$this->load->model("Participant");
		/*$pardate=$_POST['participants_year']."-".$_POST['participants_month']."-".$_POST['participants_day'];
		$gdate= $_POST['participants_gyear']."-".$_POST['participants_gmonth']."-".$_POST['participants_gday'];
		$rdate=$_POST['participants_ryear']."-".$_POST['participants_rmonth']."-".$_POST['participants_rday'];
		$pdate=$_POST['participants_pyear']."-".$_POST['participants_pmonth']."-".$_POST['participants_pday'];
		
		$data=array
		(
		'participant_type' => $_POST['participant_type'] ,
		'participant_nric'=> $_POST['participant_nric'],
		'participant_date_of_birth' => $pardate,
		'participant_first_name' => $_POST['participant_first_name'],
		'participant_last_name' => $_POST['participant_last_name'],
		'bib_name' => $_POST['bib_name'],
		'participant_email' => $_POST['participant_email'],
		'participant_age' => $_POST['participant_age'],
		'participant_gender' => $_POST['participant_gender'],
		'participant_nationality' => $_POST['participant_nationality'],
		'residing_in_singapore' =>$_POST['residing_in_singapore'],
		'residing_place' => $_POST['residing_place'],
		'school' => $_POST['school'],
		'sports_participation' => $_POST['sports_participation'],
		'participant_tshirt_size' => $_POST['participant_tshirt_size'],
		'allergies' => $_POST['allergies'],
		'allergy_type' => $_POST['allergy_type'],
		'medical_condition' => $_POST['medical_condition'],
		'medical_condition_type' => $_POST['medical_condition_type'],
		'relation' => $_POST['relation'],
		'guardian_first_name' => $_POST['guardian_first_name'],
		'guardian_last_name' => $_POST['guardian_last_name'],
		'guardian_date_of_birth' => $gdate,
		'guardian_nationality' => $_POST['guardian_nationality'],
		'occupation' => $_POST['occupation'],
		'designation' => $_POST['designation'],
		'reason_others' => $_POST['reason_others'],
		'mailing_address' => $_POST['mailing_address'],
		'city' => $_POST['city'],
		'postal_code' => $_POST['postal_code'],
		'country' => $_POST['country'],
		'home_number' => $_POST['home_number'],
		'mobile_number' => $_POST['mobile_number'],
		'categories' => $_POST['categories'],
		'promo_code' => $_POST['promo_code'],
		'carnival_item' => $_POST['carnival_item'],
		'number_of_tickets' => $_POST['number_of_tickets'],
		'amount' => $_POST['amount'],
		'newsletters' => $_POST['newsletters'],
		'payment_mode' => $_POST['payment_mode'],
		'registration_date' => $rdate,
		'registration_type' => $_POST['registration_type'],
		'guardian_nric' => $_POST['guardian_nric'],
		'cheque_number' => $_POST['cheque_number'],
		'bank_name' => $_POST['bank_name'],
		'guardian_shirt_size' => $_POST['guardian_shirt_size'],
		'guardian_shirt_quantity' => $_POST['guardian_shirt_quantity'],
		'race_id' => $_POST['race_id'],
		'date_of_payment' => $pdate,
		'payment_reference' => $_POST['payment_reference'],
		//'collected_race_pack' => $_POST['collected_race_pack'],
		//'collection_type' => $_POST['collection_type'],
		//'remarks' => $_POST['remarks'],
		//'pack_collected_date' => $_POST['pack_collected_date'],
		//'pack_collected_counter' => $_POST['pack_collected_counter'],
		//'counter_assistant' => $_POST['counter_assistant'],
		'created_date' => $_POST['created_date'],
		'created_by' => $_POST['created_by'],
		'modified_date' => $_POST['modified_date'],
		'modified_by' => $_POST['modified_by']
		);
		*/
		$this->Participant->edit($_POST,$id);
		header("Location:".$this->config->item('base_url')."/index.php/admin/manparticipant");
	}
	
	function man_tshirt_racepack()
	{
		$data['base']=$this->config->item('base_url');	
		$this->load->view('header.php',$data);
		$this->load->model('Tshirt');
		$data['id']=$this->Tshirt->get_id();
		$data['racid']=$this->Tshirt->get_racepackid();
		$this->load->view('tshirt_manage',$data);
		$this->load->view('footer.php');
	}
	
	function init_tshirts()
	{
		$data['base']=$this->config->item('base_url');	
		$this->load->view('header.php',$data);
		
		$this->load->view('tshirt_init',$data);
		$this->load->view('footer.php');
	}
	
	function tshirt_init()
	{
		$data['base']=$this->config->item('base_url');	
		$this->load->view('header.php',$data);
		$this->load->model('Tshirt');
		$data['res']=$this->Tshirt->init_tshirt($_POST);
		$this->load->view('tshirt_init',$data);
		$this->load->view('footer.php');
	}
	
	function tshirts_edit()
	{
		$id=$this->uri->segment(3);
		$data['base']=$this->config->item('base_url');	
		$this->load->view('header.php',$data);
		$data['id']=$id;
		$this->load->model('Tshirt');
		$data['query']=$this->Tshirt->get_tshirt();
		$this->load->view('tshirt_edit',$data);
		$this->load->view('footer.php');
	}
	
	function edit_merchandise_page()
	{
		$id=$this->uri->segment(3);
		$data['base']=$this->config->item('base_url');	
		$this->load->view('header.php',$data);
		$data['id']=$id;
		$this->load->model('Merchandise');
		
		
		if(isset($_POST['size_XS']) && $_POST['size_XS']!="")
		{
			$this->Merchandise->edit_tshirt($_POST,$id);
		}
		$data['query']=$this->Merchandise->get_tshirt($id);
		$this->load->view('edit_merchandise_page',$data);
		$this->load->view('footer.php');
	}
	
	
	function edit_merchandise_page1()
	{
		$id=$this->uri->segment(3);
		$data['base']=$this->config->item('base_url');	
		$this->load->view('header.php',$data);
		$data['id']=$id;
		$this->load->model('Merchandise');
		if(isset($_POST['cap_qty']) && $_POST['cap_qty']!="")
		{
			$this->Merchandise->edit_merchandise_item2($_POST,$id);
		}
		
		$data['query']=$this->Merchandise->get_caps($id);
		$this->load->view('edit_merchandise_page1',$data);
		$this->load->view('footer.php');
	}
	
	function tshirt_editit()
	{
		$id=$this->uri->segment(3);
		$data['base']=$this->config->item('base_url');	
		$this->load->view('header.php',$data);
		$this->load->model('Tshirt');
		$data['res']=$this->Tshirt->edit_tshirt($_POST,$id);
		$data['id']=$id;
		$data['query']=$this->Tshirt->get_tshirt();
		$this->load->view('tshirt_edit',$data);
		$this->load->view('footer.php');
	}
	
	function tshirt_racepack_confrim()
	{
		$data['base']=$this->config->item('base_url');	
		$this->load->view('header.php',$data);
		$this->load->model('Tshirt');
		$data['query']=$this->Tshirt->get_racepack();
		$this->load->view("tshirt_race_confirm",$data);
		$this->load->view('footer.php');
	}
	
	function confrim_racepack()
	{
		$data['base']=$this->config->item('base_url');	
		$this->load->view('header.php',$data);
		
		$this->load->model('Tshirt');
		$data['res']=$this->Tshirt->confirm_racepack($_POST);		
		$data['query']=$this->Tshirt->get_racepack();
		$this->load->view("tshirt_race_confirm",$data);
		
		$this->load->view('footer.php');
		
	}
	
	function tshirt_racepack_edit()
	{
		$data['base']=$this->config->item('base_url');	
		$this->load->view('header.php',$data);
		$this->load->model('Tshirt');
		$data['query']=$this->Tshirt->get_racepack();
		$data['id']=$this->Tshirt->get_racepackid();
		$this->load->view("tshirt_race_edit",$data);
		$this->load->view('footer.php');
	}
	
	function edit_racepack()
	{
		
		$data['base']=$this->config->item('base_url');	
		$this->load->view('header.php',$data);
		$id=$this->uri->segment(3);
		$this->load->model('Tshirt');
		$data['res']=$this->Tshirt->edit_racepack($_POST,$id);
		$data['query']=$this->Tshirt->get_racepack();
		$data['id']=$this->Tshirt->get_racepackid();
		$this->load->view("tshirt_race_edit",$data);
		$this->load->view('footer.php');
	}
	
	function man_caps()
	{
		$data['base']=$this->config->item('base_url');	
		$this->load->view('header.php',$data);
		$this->load->model('Caps');
		$data['id']=$this->Caps->get_id();
		$data['racid']=$this->Caps->get_racepackid();
		$this->load->view('caps_manage',$data);
		$this->load->view('footer.php');
	}
	
	function init_caps()
	{
		$data['base']=$this->config->item('base_url');	
		$this->load->view('header.php',$data);
		
		$this->load->view('caps_init',$data);
		$this->load->view('footer.php');
	}
	
	function caps_init()
	{
		$data['base']=$this->config->item('base_url');	
		$this->load->view('header.php',$data);
		$this->load->model('Caps');
		$data['res']=$this->Caps->init_caps($_POST);
		$this->load->view('caps_init',$data);
		$this->load->view('footer.php');
	}
	
	function caps_edit()
	{
		$id=$this->uri->segment(3);
		$data['base']=$this->config->item('base_url');	
		$this->load->view('header.php',$data);
		$data['id']=$id;
		$this->load->model('Caps');
		$data['query']=$this->Caps->get_caps();
		$this->load->view('caps_edit',$data);
		$this->load->view('footer.php');
	}
	
	
	
	function caps_editit()
	{
		$id=$this->uri->segment(3);
		$data['base']=$this->config->item('base_url');	
		$this->load->view('header.php',$data);
		$this->load->model('Caps');
		$data['res']=$this->Caps->edit_caps($_POST,$id);
		$data['id']=$id;
		$data['query']=$this->Caps->get_caps();
		$this->load->view('caps_edit',$data);
		$this->load->view('footer.php');
	}
	
	function caps_racepack_confrim()
	{
		$data['base']=$this->config->item('base_url');	
		$this->load->view('header.php',$data);
		$this->load->model('Caps');
		$data['query']=$this->Caps->get_racepack();
		$this->load->view("caps_race_confirm",$data);
		$this->load->view('footer.php');
	}
	
	function caps_confrim_racepack()
	{
		$data['base']=$this->config->item('base_url');	
		$this->load->view('header.php',$data);
		$this->load->model('Caps');
		$data['res']=$this->Caps->confirm_racepack($_POST);		
		$data['query']=$this->Caps->get_racepack();
		$this->load->view("Caps_race_confirm",$data);
		
		$this->load->view('footer.php');
	}
	
	
	function caps_racepack_edit()
	{
		$data['base']=$this->config->item('base_url');	
		$this->load->view('header.php',$data);
		$this->load->model('Caps');
		$data['query']=$this->Caps->get_racepack();
		$data['id']=$this->Caps->get_racepackid();
		$this->load->view("Caps_race_edit",$data);
		$this->load->view('footer.php');
	}
	
	function caps_edit_racepack()
	{
		
		$data['base']=$this->config->item('base_url');	
		$this->load->view('header.php',$data);
		$id=$this->uri->segment(3);
		$this->load->model('Caps');
		$data['res']=$this->Caps->edit_racepack($_POST,$id);
		$data['query']=$this->Caps->get_racepack();
		$data['id']=$this->Caps->get_racepackid();
		$this->load->view("Caps_race_edit",$data);
		$this->load->view('footer.php');
	}
	
	////////////// Start Shorts ////////////////
	
	function man_shorts()
	{
		$data['base']=$this->config->item('base_url');	
		$this->load->view('header.php',$data);
		$this->load->model('Shorts');
		$data['id']=$this->Shorts->get_id();
		$data['racid']=$this->Shorts->get_racepackid();
		$this->load->view('shorts_manage',$data);
		$this->load->view('footer.php');
	}
	
	function init_shorts()
	{
		$data['base']=$this->config->item('base_url');	
		$this->load->view('header.php',$data);
		
		$this->load->view('shorts_init',$data);
		$this->load->view('footer.php');
	}
	
	function shorts_init()
	{
		$data['base']=$this->config->item('base_url');	
		$this->load->view('header.php',$data);
		$this->load->model('Shorts');
		$data['res']=$this->Shorts->init_skorts($_POST);
		$this->load->view('shorts_init',$data);
		$this->load->view('footer.php');
	}
	
	function shorts_edit()
	{
		$id=$this->uri->segment(3);
		$data['base']=$this->config->item('base_url');	
		$this->load->view('header.php',$data);
		$data['id']=$id;
		$this->load->model('Shorts');
		$data['query']=$this->Shorts->get_skorts();
		$this->load->view('shorts_edit',$data);
		$this->load->view('footer.php');
	}
	
	function shorts_editit()
	{
		$id=$this->uri->segment(3);
		$data['base']=$this->config->item('base_url');	
		$this->load->view('header.php',$data);
		$this->load->model('Shorts');
		$data['res']=$this->Shorts->edit_skorts($_POST,$id);
		$data['id']=$id;
		$data['query']=$this->Shorts->get_skorts();
		$this->load->view('shorts_edit',$data);
		$this->load->view('footer.php');
	}
	
	function shorts_racepack_confrim()
	{
		$data['base']=$this->config->item('base_url');	
		$this->load->view('header.php',$data);
		$this->load->model('Shorts');
		$data['query']=$this->Shorts->get_racepack();
		$this->load->view("shorts_race_confirm",$data);
		$this->load->view('footer.php');
	}
	
	function shorts_confrim_racepack()
	{
		$data['base']=$this->config->item('base_url');	
		$this->load->view('header.php',$data);
		$this->load->model('Shorts');
		$data['res']=$this->Shorts->confirm_racepack($_POST);		
		$data['query']=$this->Shorts->get_racepack();
		$this->load->view("Shorts_race_confirm",$data);
		
		$this->load->view('footer.php');
	}
	
	
	function shorts_racepack_edit()
	{
		$data['base']=$this->config->item('base_url');	
		$this->load->view('header.php',$data);
		$this->load->model('Shorts');
		$data['query']=$this->Shorts->get_racepack();
		$data['id']=$this->Shorts->get_racepackid();
		$this->load->view("shorts_race_edit",$data);
		$this->load->view('footer.php');
	}
	
	function shorts_edit_racepack()
	{
		
		$data['base']=$this->config->item('base_url');	
		$this->load->view('header.php',$data);
		$id=$this->uri->segment(3);
		$this->load->model('Shorts');
		$data['res']=$this->Shorts->edit_racepack($_POST,$id);
		$data['query']=$this->Shorts->get_racepack();
		$data['id']=$this->Shorts->get_racepackid();
		$this->load->view("shorts_race_edit",$data);
		$this->load->view('footer.php');
	}
	
	////////////// End Shorts /////////////////
	
	function man_skorts()
	{
		$data['base']=$this->config->item('base_url');	
		$this->load->view('header.php',$data);
		$this->load->model('Skorts');
		$data['id']=$this->Skorts->get_id();
		$data['racid']=$this->Skorts->get_racepackid();
		$this->load->view('skorts_manage',$data);
		$this->load->view('footer.php');
	}
	
	function init_skorts()
	{
		$data['base']=$this->config->item('base_url');	
		$this->load->view('header.php',$data);
		
		$this->load->view('skorts_init',$data);
		$this->load->view('footer.php');
	}
	
	function skorts_init()
	{
		$data['base']=$this->config->item('base_url');	
		$this->load->view('header.php',$data);
		$this->load->model('skorts');
		$data['res']=$this->skorts->init_skorts($_POST);
		$this->load->view('skorts_init',$data);
		$this->load->view('footer.php');
	}
	
	function skorts_edit()
	{
		$id=$this->uri->segment(3);
		$data['base']=$this->config->item('base_url');	
		$this->load->view('header.php',$data);
		$data['id']=$id;
		$this->load->model('skorts');
		$data['query']=$this->skorts->get_skorts();
		$this->load->view('skorts_edit',$data);
		$this->load->view('footer.php');
	}
	
	function skorts_editit()
	{
		$id=$this->uri->segment(3);
		$data['base']=$this->config->item('base_url');	
		$this->load->view('header.php',$data);
		$this->load->model('skorts');
		$data['res']=$this->skorts->edit_skorts($_POST,$id);
		$data['id']=$id;
		$data['query']=$this->skorts->get_skorts();
		$this->load->view('skorts_edit',$data);
		$this->load->view('footer.php');
	}
	
	function skorts_racepack_confrim()
	{
		$data['base']=$this->config->item('base_url');	
		$this->load->view('header.php',$data);
		$this->load->model('Skorts');
		$data['query']=$this->Skorts->get_racepack();
		$this->load->view("skorts_race_confirm",$data);
		$this->load->view('footer.php');
	}
	
	function skorts_confrim_racepack()
	{
		$data['base']=$this->config->item('base_url');	
		$this->load->view('header.php',$data);
		$this->load->model('Skorts');
		$data['res']=$this->Skorts->confirm_racepack($_POST);		
		$data['query']=$this->Skorts->get_racepack();
		$this->load->view("Skorts_race_confirm",$data);
		
		$this->load->view('footer.php');
	}
	
	
	function skorts_racepack_edit()
	{
		$data['base']=$this->config->item('base_url');	
		$this->load->view('header.php',$data);
		$this->load->model('Skorts');
		$data['query']=$this->Skorts->get_racepack();
		$data['id']=$this->Skorts->get_racepackid();
		$this->load->view("skorts_race_edit",$data);
		$this->load->view('footer.php');
	}
	
	function skorts_edit_racepack()
	{
		
		$data['base']=$this->config->item('base_url');	
		$this->load->view('header.php',$data);
		$id=$this->uri->segment(3);
		$this->load->model('Skorts');
		$data['res']=$this->Skorts->edit_racepack($_POST,$id);
		$data['query']=$this->Skorts->get_racepack();
		$data['id']=$this->Skorts->get_racepackid();
		$this->load->view("skorts_race_edit",$data);
		$this->load->view('footer.php');
	}
	
	function reports()
	{
		$data['base']=$this->config->item('base_url');	
		$this->load->view('header.php',$data);
		$this->load->view('reports',$data);
		$this->load->view('footer.php');
	}

	function report_collection_rate_15()
	{
		$data['base']=$this->config->item('base_url');	
		$this->load->view('header.php',$data);
		$this->load->model('Participant');
		$data['query']=$this->Participant->get_query_collected();
		$this->load->model("Report");
		$data['query2']=$this->Report->get_query_top_date();
		$this->load->view('reports_crate_15',$data);
		$this->load->view('footer.php');
	}
	
	function report_collection_rate_hourly()
	{
		$data['base']=$this->config->item('base_url');	
		$this->load->view('header.php',$data);
		$this->load->model('Participant');
		$data['query']=$this->Participant->get_query_collected();
		$this->load->model("Report");
		$data['query2']=$this->Report->get_query_top_date();
		$this->load->view('reports_crate_hour',$data);
		$this->load->view('footer.php');
	}
	
	function report_inventory()
	{
		$data['base']=$this->config->item('base_url');	
		$this->load->view('header.php',$data);
		$this->load->model("Report");
		// 	size_M 	size_L 	size_XL 	size_XXL 	
		$data['psize_XS']=$this->Report->getSizecount('size_XS',1);
		$data['psize_S']=$this->Report->getSizecount('size_S',1);
		$data['psize_M']=$this->Report->getSizecount('size_M',1);
		$data['psize_L']=$this->Report->getSizecount('size_L',1);
		$data['psize_XL']=$this->Report->getSizecount('size_XL',1);
		$data['ptotal'] = $data['psize_XS']+$data['psize_S']+$data['psize_M']+$data['psize_L']+$data['psize_XL'] ;
		
		$data['pcsize_XS']= $this->Report->getSizecount_collected('size_XS',1);
		$data['pcsize_S'] = $this->Report->getSizecount_collected('size_S',1);
		$data['pcsize_M'] = $this->Report->getSizecount_collected('size_M',1);
		$data['pcsize_L'] = $this->Report->getSizecount_collected('size_L',1);
		$data['pcsize_XL']= $this->Report->getSizecount_collected('size_XL',1);
		$data['pctotal'] = $data['pcsize_XS'] + $data['pcsize_S'] + $data['pcsize_M'] + $data['pcsize_L'] + $data['pcsize_XL'] ;
		/* 
		$data['pusize_XS']= $this->Report->getSizecount_uncollected('size_XS',1) - $data['pcsize_XS'];
		$data['pusize_S'] = $this->Report->getSizecount_uncollected('size_S',1) - $data['pcsize_S']  ;
		$data['pusize_M'] = $this->Report->getSizecount_uncollected('size_M',1) - $data['pcsize_M'] ;
		$data['pusize_L'] = $this->Report->getSizecount_uncollected('size_L',1) - $data['pcsize_L'] ;
		$data['pusize_XL']= $this->Report->getSizecount_uncollected('size_XL',1) - $data['pcsize_XL'] ;
		 */
		
		$data['pusize_XS']= $this->Report->getSizecount_uncollected('size_XS',1)  ;
		$data['pusize_S'] = $this->Report->getSizecount_uncollected('size_S',1)    ;
		$data['pusize_M'] = $this->Report->getSizecount_uncollected('size_M',1)   ;
		$data['pusize_L'] = $this->Report->getSizecount_uncollected('size_L',1)   ;
		$data['pusize_XL']= $this->Report->getSizecount_uncollected('size_XL',1)   ;
		
		
		
		
		
		$data['lsize_XS']=$this->Report->getSizecount('size_XS',2);
		$data['lsize_S']=$this->Report->getSizecount('size_S',2);
		$data['lsize_M']=$this->Report->getSizecount('size_M',2);
		$data['lsize_L']=$this->Report->getSizecount('size_L',2);
		$data['lsize_XL']=$this->Report->getSizecount('size_XL',2);
		$data['lsize_XXL']=$this->Report->getSizecount('size_XXL',2);
		$data['ltotal'] = $data['lsize_XS']+$data['lsize_S']+$data['lsize_M']+$data['lsize_L']+$data['lsize_XL']+$data['lsize_XXL'] ;
		
		$data['lcsize_XS']= $this->Report->getSizecount_collected('size_XS',2);
		$data['lcsize_S'] = $this->Report->getSizecount_collected('size_S',2);
		$data['lcsize_M'] = $this->Report->getSizecount_collected('size_M',2);
		$data['lcsize_L'] = $this->Report->getSizecount_collected('size_L',2);
		$data['lcsize_XL']= $this->Report->getSizecount_collected('size_XL',2);
		$data['lcsize_XXL']= $this->Report->getSizecount_collected('size_XXL',2);
		$data['lctotal'] = $data['lcsize_XS'] + $data['lcsize_S'] + $data['lcsize_M'] + $data['lcsize_L'] + $data['lcsize_XL']+$data['lcsize_XXL'] ;
		/* 
		$data['lusize_XS']= $this->Report->getSizecount_uncollected('size_XS',2) - $data['lcsize_XS'];
		$data['lusize_S'] = $this->Report->getSizecount_uncollected('size_S',2) - $data['lcsize_S']  ;
		$data['lusize_M'] = $this->Report->getSizecount_uncollected('size_M',2) - $data['lcsize_M'] ;
		$data['lusize_L'] = $this->Report->getSizecount_uncollected('size_L',2) - $data['lcsize_L'] ;
		$data['lusize_XL']= $this->Report->getSizecount_uncollected('size_XL',2) - $data['lcsize_XL'] ;
		$data['lusize_XXL']= $this->Report->getSizecount_uncollected('size_XXL',2) - $data['lcsize_XXL'] ;
		*/


		$data['lusize_XS']= $this->Report->getSizecount_uncollected('size_XS',2)  ;
		$data['lusize_S'] = $this->Report->getSizecount_uncollected('size_S',2)    ;
		$data['lusize_M'] = $this->Report->getSizecount_uncollected('size_M',2)   ;
		$data['lusize_L'] = $this->Report->getSizecount_uncollected('size_L',2)   ;
		$data['lusize_XL']= $this->Report->getSizecount_uncollected('size_XL',2)   ;
		$data['lusize_XXL']= $this->Report->getSizecount_uncollected('size_XXL',2)   ;		
		
		$data['item1_c'] = $this->Report->getSizecount_item2('item_1');
		$data['item1_co']= $this->Report->getSizecount_collected_item2('item_1');
		$data['item1_uc']= $this->Report->getSizecount_uncollected_item2(1);
		
		
		$data['item2_c'] = $this->Report->getSizecount_item2('item_2');
		$data['item2_co']= $this->Report->getSizecount_collected_item2('item_2');
		$data['item2_uc']= $this->Report->getSizecount_uncollected_item2(2);
		
		
		$data['item3_c'] = $this->Report->getSizecount_item2('item_3');
		$data['item3_co']= $this->Report->getSizecount_collected_item2('item_3');
		$data['item3_uc']= $this->Report->getSizecount_uncollected_item2(3);
		
		
		
		$data['item4_c'] = $this->Report->getSizecount_item2('item_4');
		$data['item4_co']= $this->Report->getSizecount_collected_item2('item_4');
		$data['item4_uc']= $this->Report->getSizecount_uncollected_item2(4);
		
		
		
		$data['item5_c'] = $this->Report->getSizecount_item2('item_5');
		$data['item5_co']= $this->Report->getSizecount_collected_item2('item_5');
		$data['item5_uc']= $this->Report->getSizecount_uncollected_item2(5);
		
		
		
		$data['item6_c'] = $this->Report->getSizecount_item2('item_6');
		$data['item6_co']= $this->Report->getSizecount_collected_item2('item_6');
		$data['item6_uc']= $this->Report->getSizecount_uncollected_item2(6);
		
		
		
		$data['item7_c'] = $this->Report->getSizecount_item2('item_7');
		$data['item7_co']= $this->Report->getSizecount_collected_item2('item_7');
		$data['item7_uc']= $this->Report->getSizecount_uncollected_item2(7);
		
		
		$this->load->view('report_inventory',$data );
		$this->load->view('footer.php');

		
	}
	function report_15()
	{
		$date=$_POST['date'];
		$data['base']=$this->config->item('base_url');	
		$this->load->view('header.php',$data);
		$this->load->model('Participant');
		$data['query']=$this->Participant->get_query_collected();
		$this->load->model("Report");
		$data['query2']=$this->Report->get_query_by_date($date);
		$data['curr_date']=$date;
		$this->load->view('reports_crate_15',$data);
		$this->load->view('footer.php');
	}
	
	function report_hour()
	{
		$date=$_POST['date'];
		$data['base']=$this->config->item('base_url');	
		$this->load->view('header.php',$data);
		$this->load->model('Participant');
		$data['query']=$this->Participant->get_query_collected();
		$this->load->model("Report");
		$data['query2']=$this->Report->get_query_by_date($date);
		$data['curr_date']=$date;
		$this->load->view('reports_crate_hour',$data);
		$this->load->view('footer.php');
	}
	
	function report_export_15()
	{
		$date=$this->uri->segment(3);
		$this->load->model("Report");
		$data['query']=$this->Report->get_query_by_date($date);
		$data['base']=$this->config->item('base_url');	
		$data['curr_date']=$date;
		$this->load->view("report_15",$data);
	}
	
	function report_export_hour()
	{
		$date=$this->uri->segment(3);
		$this->load->model("Report");
		$data['query']=$this->Report->get_query_by_date($date);
		$data['base']=$this->config->item('base_url');	
		$data['curr_date']=$date;
		$this->load->view("report_hour",$data);
	}
	
	function report_export_inventory()
	{
		$data['base']=$this->config->item('base_url');	
		$this->load->model("Report");
		// 	size_M 	size_L 	size_XL 	size_XXL 	
		$data['psize_XS']=$this->Report->getSizecount('size_XS',1);
		$data['psize_S']=$this->Report->getSizecount('size_S',1);
		$data['psize_M']=$this->Report->getSizecount('size_M',1);
		$data['psize_L']=$this->Report->getSizecount('size_L',1);
		$data['psize_XL']=$this->Report->getSizecount('size_XL',1);
		$data['ptotal'] = $data['psize_XS']+$data['psize_S']+$data['psize_M']+$data['psize_L']+$data['psize_XL'] ;
		
		$data['pcsize_XS']= $this->Report->getSizecount_collected('size_XS',1);
		$data['pcsize_S'] = $this->Report->getSizecount_collected('size_S',1);
		$data['pcsize_M'] = $this->Report->getSizecount_collected('size_M',1);
		$data['pcsize_L'] = $this->Report->getSizecount_collected('size_L',1);
		$data['pcsize_XL']= $this->Report->getSizecount_collected('size_XL',1);
		$data['pctotal'] = $data['pcsize_XS'] + $data['pcsize_S'] + $data['pcsize_M'] + $data['pcsize_L'] + $data['pcsize_XL'] ;
		/* 
		$data['pusize_XS']= $this->Report->getSizecount_uncollected('size_XS',1) - $data['pcsize_XS'];
		$data['pusize_S'] = $this->Report->getSizecount_uncollected('size_S',1) - $data['pcsize_S']  ;
		$data['pusize_M'] = $this->Report->getSizecount_uncollected('size_M',1) - $data['pcsize_M'] ;
		$data['pusize_L'] = $this->Report->getSizecount_uncollected('size_L',1) - $data['pcsize_L'] ;
		$data['pusize_XL']= $this->Report->getSizecount_uncollected('size_XL',1) - $data['pcsize_XL'] ;
		 */
		
		$data['pusize_XS']= $this->Report->getSizecount_uncollected('size_XS',1)  ;
		$data['pusize_S'] = $this->Report->getSizecount_uncollected('size_S',1)    ;
		$data['pusize_M'] = $this->Report->getSizecount_uncollected('size_M',1)   ;
		$data['pusize_L'] = $this->Report->getSizecount_uncollected('size_L',1)   ;
		$data['pusize_XL']= $this->Report->getSizecount_uncollected('size_XL',1)   ;
		
		
		
		
		
		$data['lsize_XS']=$this->Report->getSizecount('size_XS',2);
		$data['lsize_S']=$this->Report->getSizecount('size_S',2);
		$data['lsize_M']=$this->Report->getSizecount('size_M',2);
		$data['lsize_L']=$this->Report->getSizecount('size_L',2);
		$data['lsize_XL']=$this->Report->getSizecount('size_XL',2);
		$data['lsize_XXL']=$this->Report->getSizecount('size_XXL',2);
		$data['ltotal'] = $data['lsize_XS']+$data['lsize_S']+$data['lsize_M']+$data['lsize_L']+$data['lsize_XL']+$data['lsize_XXL'] ;
		
		$data['lcsize_XS']= $this->Report->getSizecount_collected('size_XS',2);
		$data['lcsize_S'] = $this->Report->getSizecount_collected('size_S',2);
		$data['lcsize_M'] = $this->Report->getSizecount_collected('size_M',2);
		$data['lcsize_L'] = $this->Report->getSizecount_collected('size_L',2);
		$data['lcsize_XL']= $this->Report->getSizecount_collected('size_XL',2);
		$data['lcsize_XXL']= $this->Report->getSizecount_collected('size_XXL',2);
		$data['lctotal'] = $data['lcsize_XS'] + $data['lcsize_S'] + $data['lcsize_M'] + $data['lcsize_L'] + $data['lcsize_XL']+$data['lcsize_XXL'] ;
		/* 
		$data['lusize_XS']= $this->Report->getSizecount_uncollected('size_XS',2) - $data['lcsize_XS'];
		$data['lusize_S'] = $this->Report->getSizecount_uncollected('size_S',2) - $data['lcsize_S']  ;
		$data['lusize_M'] = $this->Report->getSizecount_uncollected('size_M',2) - $data['lcsize_M'] ;
		$data['lusize_L'] = $this->Report->getSizecount_uncollected('size_L',2) - $data['lcsize_L'] ;
		$data['lusize_XL']= $this->Report->getSizecount_uncollected('size_XL',2) - $data['lcsize_XL'] ;
		$data['lusize_XXL']= $this->Report->getSizecount_uncollected('size_XXL',2) - $data['lcsize_XXL'] ;
		*/


		$data['lusize_XS']= $this->Report->getSizecount_uncollected('size_XS',2)  ;
		$data['lusize_S'] = $this->Report->getSizecount_uncollected('size_S',2)    ;
		$data['lusize_M'] = $this->Report->getSizecount_uncollected('size_M',2)   ;
		$data['lusize_L'] = $this->Report->getSizecount_uncollected('size_L',2)   ;
		$data['lusize_XL']= $this->Report->getSizecount_uncollected('size_XL',2)   ;
		$data['lusize_XXL']= $this->Report->getSizecount_uncollected('size_XXL',2)   ;		
		
		$data['item1_c'] = $this->Report->getSizecount_item2('item_1');
		$data['item1_co']= $this->Report->getSizecount_collected_item2('item_1');
		$data['item1_uc']= $this->Report->getSizecount_uncollected_item2(1);
		
		
		$data['item2_c'] = $this->Report->getSizecount_item2('item_2');
		$data['item2_co']= $this->Report->getSizecount_collected_item2('item_2');
		$data['item2_uc']= $this->Report->getSizecount_uncollected_item2(2);
		
		
		$data['item3_c'] = $this->Report->getSizecount_item2('item_3');
		$data['item3_co']= $this->Report->getSizecount_collected_item2('item_3');
		$data['item3_uc']= $this->Report->getSizecount_uncollected_item2(3);
		
		
		
		$data['item4_c'] = $this->Report->getSizecount_item2('item_4');
		$data['item4_co']= $this->Report->getSizecount_collected_item2('item_4');
		$data['item4_uc']= $this->Report->getSizecount_uncollected_item2(4);
		
		
		
		$data['item5_c'] = $this->Report->getSizecount_item2('item_5');
		$data['item5_co']= $this->Report->getSizecount_collected_item2('item_5');
		$data['item5_uc']= $this->Report->getSizecount_uncollected_item2(5);
		
		
		
		$data['item6_c'] = $this->Report->getSizecount_item2('item_6');
		$data['item6_co']= $this->Report->getSizecount_collected_item2('item_6');
		$data['item6_uc']= $this->Report->getSizecount_uncollected_item2(6);
		
		
		
		$data['item7_c'] = $this->Report->getSizecount_item2('item_7');
		$data['item7_co']= $this->Report->getSizecount_collected_item2('item_7');
		$data['item7_uc']= $this->Report->getSizecount_uncollected_item2(7);
		
		$this->load->view('report_inventory_csv',$data);
		
	}
	
	function uncollect()
	{
		$data['base']=$this->config->item('base_url');	
		//$this->load->view('header.php',$data);
		$id=$this->uri->segment(3);
		$this->load->model("Collecter");
		$this->Collecter->un_collect($id);
		$data['message']="Completed Uncollect";
		//$this->load->view('admin_participant.php',$data);
		//$this->load->view('footer.php');
		echo "Completed";
		
	}
	
	function muncollect()
	{
		$data['base']=$this->config->item('base_url');	
		//$this->load->view('header.php',$data);
		$id=$this->uri->segment(3);
		$this->load->model("Collecter");
		$this->Collecter->un_mcollect($id);
		$data['message']="Completed Uncollect";
		//$this->load->view('admin_participant.php',$data);
		//$this->load->view('footer.php');
		echo "Completed";
		
	}
	
		
	
}