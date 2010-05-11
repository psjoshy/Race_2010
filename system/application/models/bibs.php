<?php
class Bibs extends Model {

    function Bibs()
    {
        // Call the Model constructor
        parent::Model();
    }
    
	function get_id()
	{
		$query=$this->db->get('bibs');
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
	
	function init_bibs($data)
	{
		$query=$this->db->get('bibs');
		if($query->num_rows() > 0)
		{
			return "Already Confirm";
		}
		else
		{
			$this->db->insert('bibs',$data);
			return "Completed Confirm";
		}
	}
	
	function get_bibs()
	{
		$query=$this->db->get('bibs');
		return $query->result();
	}
	
	function edit_bibs($data,$id)
	{
		$this->db->where("id",$id);
		$this->db->update("bibs",$data);
		return "Completed Updated";
	}
	
	
}
?>