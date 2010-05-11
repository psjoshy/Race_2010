<?php
class Shorts extends Model {

    function Shorts()
    {
        // Call the Model constructor
        parent::Model();
    }
    
	function get_id()
	{
		$query=$this->db->get('shorts');
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
	
	function init_skorts($data)
	{
		$query=$this->db->get('shorts');
		if($query->num_rows() > 0)
		{
			return "Already Confirm";
		}
		else
		{
			$this->db->insert('shorts',$data);
			return "Completed Confirm";
		}
	}
	
	function get_skorts()
	{
		$query=$this->db->get('shorts');
		return $query->result();
	}
	
	function edit_skorts($data,$id)
	{
		$this->db->where("id",$id);
		$this->db->update("shorts",$data);
		return "Completed Updated";
	}
	
	function confirm_racepack($data)
	{
		$this->db->where("type","shorts");
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
		$this->db->where("type","shorts");
		$query=$this->db->get('race_packs');
		return $query->result();
	}
	
	function get_racepackid()
	{
		$this->db->where("type","shorts");
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