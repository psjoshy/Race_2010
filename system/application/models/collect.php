<?php
class Collecter extends Model {

    
    function Collecter()
    {
        // Call the Model constructor
        parent::Model();
    }
	
		
	function add($data)
	{
		$this->db->insert($data);
	}
}
?>