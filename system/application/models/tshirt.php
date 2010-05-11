<?php
class Tshirt extends Model {

    
    function Tshirt()
    {
        // Call the Model constructor
        parent::Model();
    }
    
	function get_id()
	{
		$query=$this->db->get('tshirts');
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
	
	function init_tshirt($data)
	{
		$query=$this->db->get('tshirts');
		if($query->num_rows() > 0)
		{
			return "Already Confirm";
		}
		else
		{
			$this->db->insert('tshirts',$data);
			return "Completed Confirm";
		}
	}
	
	function get_tshirt()
	{
		$query=$this->db->get('tshirts');
		return $query->result();
	}
	
	function edit_tshirt($data,$id)
	{
		$this->db->where("id",$id);
		$this->db->update("tshirts",$data);
		return "Completed Updated";
	}
	
	function confirm_racepack($data)
	{
		$this->db->where("type","shirts");
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
		$this->db->where("type","shirts");
		$query=$this->db->get('race_packs');
		return $query->result();
	}
	
	function get_racepackid()
	{
		$this->db->where("type","shirts");
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