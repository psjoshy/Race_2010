<?php
class Caps extends Model {

    function Caps()
    {
        // Call the Model constructor
        parent::Model();
    }
    
	function get_id()
	{
		$query=$this->db->get('caps');
		if($query->num_rows() > 0)
		{
			foreach($query->result() as $row)
			{
				$id=$row->id;
			}
		}
		else
		{
			$id=0;
		}
		return $id;
	}
	
	function init_caps($data)
	{
		$query=$this->db->get('caps');
		if($query->num_rows() > 0)
		{
			return "Already Confirm";
		}
		else
		{
			$this->db->insert('caps',$data);
			return "Completed Confirm";
		}
	}
	
	function get_caps()
	{
		$query=$this->db->get('caps');
		return $query->result();
	}
	
	function edit_caps($data,$id)
	{
		$this->db->where("id",$id);
		$this->db->update("caps",$data);
		return "Completed Updated";
	}
	
	function confirm_racepack($data)
	{
		$this->db->where("type","caps");
		$query=$this->db->get('race_packs');
		if($query->num_rows() > 0)
		{
			return "Already Confirm";
		}
		else
		{
			$this->db->insert('race_packs',$data);
			return "Completed Confirm";
		}
	}
	
	function get_racepack()
	{
		$this->db->where("type","caps");
		$query=$this->db->get('race_packs');
		return $query->result();
	}
	
	function get_racepackid()
	{
		$this->db->where("type","caps");
		$query=$this->db->get('race_packs');
		$id=0;
		foreach($query->result() as $row)
		{
			$id=$row->id;
		}
		return $id;
	}
	
	function edit_racepack($data,$id)
	{
		$this->db->where("id",$id);
		$this->db->update("race_packs",$data);
		return "Completed Updated";
	}
	
	
}
?>