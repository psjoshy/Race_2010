<?php
class Dashboard extends Model {

    
    function Dashboard()
    {
        // Call the Model constructor
        parent::Model();
    }
    
    function login($usr,$pwd)
	{
		$this->db->where("username",$usr);
		$this->db->where("password",$pwd);
		$query=$this->db->get("admins");
		if($query->num_rows()>0)
		{
			foreach($query->result() as $row)
			{
				$data = array(
						   'type'  => 'admin',
						   'name'=>$row->name,
						   'id'=>$row->id
					   );
			}
				$this->session->set_userdata($data);
			return true;
		}
		return false;
	}
	
		function logout()
	{
		$data = array(
						   'type'  => '',
						   'name'=>'',
						   'counter' => '',
						   'id'=>''
					   );
		$this->session->unset_userdata($data);
		$base=$this->config->item('base_url');
		header("Location:".$base);
	}
	
	function get_all_admin()
	{
		$query=$this->db->get("admins");
		return $query->result();
	}
	
	function chkusrname($usr)
	{
		$this->db->where("username",$usr);
		$query=$this->db->get("admins");
		if ($query->num_rows() > 0)
		{
			return false;
		}
		return true;
	}
	
	function addadmin($data)
	{
		$data['password']=MD5($data['password']);
		$this->db->insert('admins',$data);
	}
	
	function getusername($id)
	{
		$this->db->where("id",$id);
		$query=$this->db->get("admins");
		if ($query->num_rows() > 0)
		{
			foreach($query->result() as $row)
			{
				$usrname=$row->username;
			}
			return $usrname;
		}
		else
		{
			return "";
		}
	}
	
	function changename($id,$name)
	{
		$data = array(
               'name' => $name,
			   'modified_date' => date("Y-m-d h:i:s"),
			   'modified_by' => $this->session->userdata('id')
            );
			
		$this->db->where("id",$id);
		$this->db->update('admins',$data);
	}
	
	function changepwd($id,$pwd)
	{
		$data = array(
               'password' => MD5($pwd),
			   'modified_date' => date("Y-m-d h:i:s"),
			   'modified_by' => $this->session->userdata('id')
            );
			
		$this->db->where("id",$id);
		$this->db->update('admins',$data);
	}
	
	function deladmin($id)
	{
		$this->db->where('id', $id);
		$this->db->delete('admins'); 
	}
	
	function init_tshirts()
	{
		
	}

}
?>