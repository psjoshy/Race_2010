<?php
class Participant extends Model {

    
    function Participant()
    {
        // Call the Model constructor
        parent::Model();
    }
    
	
	function get_name_by_race($id)
	{
		$this->db->where("race_id",$id);
		$query=$this->db->get("participants2");
		$name="";
		if($query->num_rows()>0)
		{
			foreach($query->result() as $row)
			{
				$name=$row->fullname;
			}
		}
		
		return $name;
	}
	
	function get_id_by_race($id)
	{
		$this->db->where("race_id",$id);
		$query=$this->db->get("participants2");
		$id="";
		if($query->num_rows()>0)
		{
			foreach($query->result() as $row)
			{
				$id=$row->S_N;
			}
		}
		
		return $id;
	}
	
	function get_collectit_by_race($id)
	{
		$this->db->where("race_id",$id);
		$query=$this->db->get("participants2");
		$id=0;
		if($query->num_rows()>0)
		{
			foreach($query->result() as $row)
			{
				$id=$row->collect_it;
			}
		}
		
		return $id;
	}
	
	
	function get_collected_by_race ($id)
	{
		$this->db->where("race_id",$id);
		$query=$this->db->get("participants2");
		$name="";
		if($query->num_rows()>0)
		{
			foreach($query->result() as $row)
			{
				$name=$row->created_by;
			}
		}
		
		return $name;
	}
	
	/**
	 * get_collected_by_mrace
	 * 
	 * Get merchandise_created_by
	 *
	 * @author saturngod
	 */
	function get_collected_by_mrace ($id)
	{
		$this->db->where("race_id",$id);
		$query=$this->db->get("participants2");
		$name="";
		if($query->num_rows()>0)
		{
			foreach($query->result() as $row)
			{
				$name=$row->merchandise_created_by;
			}
		}
		
		return $name;
	}
	
	/**
	 * get_collectit_by_mrace
	 * 
	 * get merchandise_collectit
	 *
	 * @author saturngod
	 */
	function get_collectit_by_mrace($id)
	{
		$this->db->where("race_id",$id);
		$query=$this->db->get("participants2");
		$id=0;
		if($query->num_rows()>0)
		{
			foreach($query->result() as $row)
			{
				$id=$row->merchandise_collectit;
				if($id == ''){
				$id=$row->merchandise_selfcollect ;
				}
			}
		}
		
		return $id;
	}
	
	function get_raceid_by_email($email)
	{
		$this->db->where('email',$email);
		$this->db->select("race_id");
		$query=$this->db->get("participants2");
		$id="";
		if($query->num_rows()>0)
		{
			foreach($query->result() as $row)
			{
				$id=$row->race_id;
			}
		}
		
		return $id;
	}
	function get_name_by_nric($id)
	{
		$this->db->where("nric",$id);
		$query=$this->db->get("participants2");
		$name="";
		if($query->num_rows()>0)
		{
			foreach($query->result() as $row)
			{
				$name=$row->fullname;
			}
		}
		
		return $name;
	}
	
	
	
	function get_collected_by_nric ($id)
	{
		$this->db->where("nric",$id);
		$query=$this->db->get("participants2");
		$name="";
		if($query->num_rows()>0)
		{
			foreach($query->result() as $row)
			{
				$name=$row->created_by;
			}
		}
		
		return $name;
	}
	
	function get_id_by_nric($id)
	{
		$this->db->where("nric",$id);
		$query=$this->db->get("participants2");
		$id="";
		if($query->num_rows()>0)
		{
			foreach($query->result() as $row)
			{
				$id=$row->S_N;
			}
		}
		
		return $id;
	}
	
	function get_collectit_by_nric($id)
	{
		$this->db->where("nric",$id);
		$query=$this->db->get("participants2");
		$id="";
		if($query->num_rows()>0)
		{
			foreach($query->result() as $row)
			{
				$id=$row->collect_it;
			}
		}
		
		return $id;
	}
	
	function get_collectit_by_mnric($id)
	{
		$this->db->where("nric",$id);
		$query=$this->db->get("participants2");
		$id="";
		if($query->num_rows()>0)
		{
			foreach($query->result() as $row)
			{
				$id=$row->merchandise_collectit;
			}
		}
		
		return $id;
	}
	
	function get_participant($id)
	{
		$this->db->where("S_N",$id);
		$query=$this->db->get("participants2");
		return $query->result();
	}
	
	function get_participant_merchandise($id,$itemid )
	{
		$this->db->where("participants2.S_N",$id);
		$this->db->where("merchandise_details1.item_id",$itemid);
		$this->db->where("merchandise_details1.participant_id",$id);
		$this->db->select('*');
		$this->db->from('participants2');
		$this->db->join('merchandise_details1', 'merchandise_details1.participant_id = participants2.S_N ');
		//$query=$this->db->get("participants2");
		$query = $this->db->get();
		return $query->result();
	}
	
	function get_participant_merchandise_details2($id){
		$this->db->where("participants2.S_N",$id);
		 
		$this->db->where("merchandise_details2.participant_id",$id);
		$this->db->select('*');
		$this->db->from('participants2');
		$this->db->join('merchandise_details2', 'merchandise_details2.participant_id = participants2.S_N ');
		//$query=$this->db->get("participants2");
		$query = $this->db->get();
		return $query->result();
	
	}
	
	function part_del($id)
	{ 
		$this->db->where("S_N",$id);
		$this->db->delete('participants2'); 
	}
	
	function addnew($data)
	{
		
		$this->db->where("race_id",$data['race_id']);
		$query=$this->db->get("participants2");
		if($query->num_rows() == 0 )
		{
			$this->db->insert("participants2",$data);
			return true;
		}
		else
		{
			return false;
		}
		
	}
	
	function edit($data,$id)
	{
		$this->db->where("S_N",$id);
		$this->db->update("participants2",$data);
		
	}
	
	function get_query_collected()
	{
		$this->db->where("collect_it","1");
		$this->db->order_by('created_date','desc');
		$query=$this->db->get("participants2");
		return $query->result();
	}
	
	function get_merchandise_collectit($id)
	{
	
	$query = $this->db->query("SELECT * from participants2 WHERE race_id=$id AND (merchandise_selfcollect=1 OR merchandise_collectit=1) ");

		if ($query->num_rows() > 0)
		{
		return 1 ;
		}
		
		 
		
		
	}
}
?>