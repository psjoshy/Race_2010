<?php
class Report extends Model {

    function Report()
    {
        // Call the Model constructor
        parent::Model();
    }
    
	function tee()
	{
		$query=$this->db->get("tshirts");
		return $query->result();
	}
	
	function caps()
	{
		$query=$this->db->get("caps");
		return $query->result();
	}
	
	function bibs()
	{
		$query=$this->db->get("bibs");
		return $query->result();
	}
	
	function get_query_top_date()
	{
		$this->db->where("collect_it","1");
		$this->db->orderby("created_date","desc");
		$query=$this->db->get("participants2",1);
		foreach($query->result() as $row)
		{
			$date=split(" ",$row->created_date);
		}
		if($query->num_rows() > 0)
		{
			/*$this->db->where("collect_it","1");
			$this->db->where("created_date > ",$date[0]." 00:00:00");
			$this->db->orderby("created_date","asc");
			$query=$this->db->get("participants2");*/
			$query=$this->db->query("select * from `participants2` where `collect_it`=1 and `created_date` > '$date[0] 00:00:00' Order By `created_date` ASC");
			
			return $query->result();
		}
		else
		{
			return "";
		}
		
	}
	
	
	function get_counter_count($startdate,$enddate,$counter)
	{
	//SELECT count(*) as ID  FROM `participants2` WHERE `created_date` >= '2010-05-09 10:10:00' and `created_date` <= '2010-07-09 10:15:00' and counter = '1'
	$sql="select count(*) as ID From `participants2` WHERE `created_date` >= '$startdate' and `created_date` <= '$enddate' and counter = '$counter' and collect_it=1";
	$query=$this->db->query($sql);
	$count=0;
	foreach($query->result() as $row)
	{
		$count=$row->ID;
	}
	return $count;
	
	}
	
	function get_query_by_date($date)
	{
		$this->db->where("collect_it","1");
		$this->db->where("created_date > ",$date." 00:00:00");
		$this->db->orderby("created_date","asc");
		$query=$this->db->get("participants2");
		return $query->result();
	}
	
	function make_inventory($data)
	{
		//$mydate=split(" ",$data['created_date']);
		$created_date=date("Y-m-d");
		$query=$this->db->query("select * from report where `date` = '$created_date'");
		
		$process['date']=$created_date.' 00:00:00';
		if($query->num_rows() == 0 )
		{
			//Get TShirt Inventor
			
			
			$tshirt_query=$this->db->get("tshirts");
			if($tshirt_query->num_rows() > 0 )
			{
				
				foreach($tshirt_query->result() as $row)
				{
					$process['tshirt_XS']=$row->size_XS ;
					$process['tshirt_S']=$row->size_S;
					$process['tshirt_M']=$row->size_M;
					$process['tshirt_L']=$row->size_L;
					$process['tshirt_XL']=$row->size_XL;
					$process['tshirt_XXL']=$row->size_XXL;
				}
				
				if(strtoupper($data['tshirt_size'])=='XS')
				{
					$process['tshirt_XS']=$process['tshirt_XS']-1;
				}
				elseif(strtoupper($data['tshirt_size'])=='S')
				{
					$process['tshirt_S']=$process['tshirt_S']-1;
				}
				elseif(strtoupper($data['tshirt_size'])=='M')
				{
					$process['tshirt_M']=$process['tshirt_M']-1;
				}
				elseif(strtoupper($data['tshirt_size'])=='L')
				{
					$process['tshirt_L']=$process['tshirt_L']-1;
				}
				elseif(strtoupper($data['tshirt_size'])=='XL')
				{
					$process['tshirt_XL']=$process['tshirt_XL']-1;
				}
				elseif(strtoupper($data['tshirt_size'])=='XXL')
				{
					$process['tshirt_XXL']=$process['tshirt_XXL']-1;
				}	
			}
			
			//Get Cap QTY
			
			$cap_query=$this->db->get("caps");
			if($cap_query->num_rows() > 0 )
			{
				foreach($cap_query->result() as $row)
				{
					$process['cap'] =$row->cap_qty;
				
				}
				
				
				if($data['women10k_series_cap']=='Yes')
				{
					$process['cap']=$process['cap']-1;
					
					
				}
			}
			
			//Get Shorts
			
			$shorts_query=$this->db->get("shorts");
			if($shorts_query->num_rows() > 0 )
			{
				
				foreach($shorts_query->result() as $row)
				{
					$process['shorts_XS']=$row->size_XS;
					$process['shorts_S']=$row->size_S;
					$process['shorts_M']=$row->size_M;
					$process['shorts_L']=$row->size_L;
					$process['shorts_XL']=$row->size_XL;
					$process['shorts_XXL']=$row->size_XXL;
					
				}
				
				if(strtoupper($data['women10k_series_shorts'])=='XS')
				{
					$process['shorts_XS']=$process['shorts_XS']-1;
				}
				elseif(strtoupper($data['women10k_series_shorts'])=='S')
				{
					$process['shorts_S']=$process['shorts_S']-1;
				}
				elseif(strtoupper($data['women10k_series_shorts'])=='M')
				{
					$process['shorts_M']=$process['shorts_M']-1;
				}
				elseif(strtoupper($data['women10k_series_shorts'])=='L')
				{
					$process['shorts_L']=$process['shorts_L']-1;
				}
				elseif($data['women10k_series_shorts']=='XL')
				{
					$process['shorts_XL']=$process['shorts_XL']-1;
				}
				
				elseif(strtoupper($data['women10k_series_shorts'])=='XXL')
				{
					$process['shorts_XXL']=$process['shorts_XXL']-1;
				}
				
			}
			
			//Get Shorts
			
			$skorts_query=$this->db->get("skorts");
			if($skorts_query->num_rows() > 0 )
			{
				
				foreach($skorts_query->result() as $row)
				{
					$process['skorts_XS']=$row->size_XS ;
					$process['skorts_S']=$row->size_S ;
					$process['skorts_M']=$row->size_M;
					$process['skorts_L']=$row->size_L;
					$process['skorts_XL']=$row->size_XL;
					$process['skorts_XXL']=$row->size_XXL;
					
				}
				
				if(strtoupper($data['women10k_skorts'])=='XS')
				{
					$process['skorts_XS']=$process['skorts_XS']-1;
				}
				elseif(strtoupper($data['women10k_skorts'])=='S')
				{
					$process['skorts_S']=$process['skorts_S']-1;
				}
				elseif(strtoupper($data['women10k_skorts'])=='M')
				{
					$process['skorts_M']=$process['skorts_M']-1;
				}
				elseif(strtoupper($data['women10k_skorts'])=='L')
				{
					$process['skorts_L']=$process['skorts_L']-1;
				}
				elseif(strtoupper($data['women10k_skorts'])=='XL')
				{
					$process['skorts_XL']=$process['skorts_XL']-1;
				}
				elseif(strtoupper($data['women10k_skorts'])=='XXL')
				{
					$process['skorts_XXL']=$process['skorts_XXL']-1;
				}
			}
			
			$this->db->insert("report",$process);
		}
		else
		{
			$query=$this->db->query("select * from report where `date` = '$created_date'");
			//Report to update
			foreach($query->result() as $row)
			{
				$update_id=$row->id;
				$process['tshirt_XS']=(int)$row->tshirt_XS;
				$process['tshirt_S']=(int)$row->tshirt_S;
				$process['tshirt_M']=(int)$row->tshirt_M;
				$process['tshirt_L']=(int)$row->tshirt_L;
				$process['tshirt_XL']=(int)$row->tshirt_XL;
				$process['tshirt_XXL']=(int)$row->tshirt_XXL;
			
				$process['cap']=(int)$row->cap;
				
				$process['shorts_XS']=(int)$row->shorts_XS;
				$process['shorts_S']=(int)$row->shorts_S;
				$process['shorts_M']=(int)$row->shorts_M;
				$process['shorts_L']=(int)$row->shorts_L;
				$process['shorts_XL']=(int)$row->shorts_XL;
				$process['shorts_XXL']=(int)$row->shorts_XXL;
				
				$process['skorts_XS']=(int)$row->skorts_XS;
    			$process['skorts_S']=(int)$row->skorts_S;
				$process['skorts_M']=(int)$row->skorts_M;
				$process['skorts_L']=(int)$row->skorts_L;
				$process['skorts_XL']=(int)$row->skorts_XL;
				$process['skorts_XXL']=(int)$row->skorts_XXL;
			
				if(strtoupper($data['tshirt_size'])=='XS')
				{
					$process['tshirt_XS']=$process['tshirt_XS']-1;
				}
				elseif(strtoupper($data['tshirt_size'])=='S')
				{
					$process['tshirt_S']=$process['tshirt_S']-1;
				}
				elseif(strtoupper($data['tshirt_size'])=='M')
				{
					$process['tshirt_M']=$process['tshirt_M']-1;
				}
				elseif(strtoupper($data['tshirt_size'])=='L')
				{
					$process['tshirt_L']=$process['tshirt_L']-1;
				}
				elseif(strtoupper($data['tshirt_size'])=='XL')
				{
					$process['tshirt_XL']=$process['tshirt_XL']-1;
				}
				elseif(strtoupper($data['tshirt_size'])=='XXL')
				{
					$process['tshirt_XXL']=$process['tshirt_XXL']-1;
				}
				
				
				//Cap
				if($data['women10k_series_cap']=='Yes')
				{
					$process['cap']=$process['cap']-1;
				}
				
				///Shorts
				
				if(strtoupper($data['women10k_series_shorts'])=='XS')
				{
					$process['shorts_XS']=$process['shorts_XS']-1;
				}
				elseif(strtoupper($data['women10k_series_shorts'])=='S')
				{
					$process['shorts_S']=$process['shorts_S']-1;
				}
				elseif(strtoupper($data['women10k_series_shorts'])=='M')
				{
					$process['shorts_M']=$process['shorts_M']-1;
				}
				elseif(strtoupper($data['women10k_series_shorts'])=='L')
				{
					$process['shorts_L']=$process['shorts_L']-1;
				}
				elseif(strtoupper($data['women10k_series_shorts'])=='XL')
				{
					$process['shorts_XL']=$process['shorts_XL']-1;
				}
				elseif(strtoupper($data['women10k_series_shorts'])=='XXL')
				{
					$process['shorts_XXL']=$process['shorts_XXL']-1;
				}
				
				//Skorts
				if(strtoupper($data['women10k_skorts'])=='XS')
				{
					$process['skorts_XS']=$process['skorts_XS']-1;
				}
				elseif(strtoupper($data['women10k_skorts'])=='S')
				{
					$process['skorts_S']=$process['skorts_S']-1;
				}
				elseif(strtoupper($data['women10k_skorts'])=='M')
				{
					$process['skorts_M']=$process['skorts_M']-1;
				}
				elseif(strtoupper($data['women10k_skorts'])=='L')
				{
					$process['skorts_L']=$process['skorts_L']-1;
				}
				elseif(strtoupper($data['women10k_skorts'])=='XL')
				{
					$process['skorts_XL']=$process['skorts_XL']-1;
				}
				elseif(strtoupper($data['women10k_skorts'])=='XXL')
				{
					$process['skorts_XXL']=$process['skorts_XXL']-1;
				}
			}
			
			$this->db->where("id",$update_id);
			$this->db->update("report",$process);
		}
		
		/////////// Inventory ////////////////
		/////////// Tshirt Inventory /////////
		$inventory_query=$this->db->get("tshirts");
		foreach($inventory_query->result() as $row)
		{
			$inven_id=$row->id;
			$process2['size_XS']=$row->size_XS;
			$process2['size_S']=$row->size_S;
			$process2['size_M']=$row->size_M;
			$process2['size_L']=$row->size_L;
			$process2['size_XL']=$row->size_XL;
			$process2['size_XXL']=$row->size_XXL;
		}
		
		if(strtoupper($data['tshirt_size'])=='XS')
		{
			$process2['size_XS']=$process2['size_XS']-1;
		}
		elseif(strtoupper($data['tshirt_size'])=='S')
		{
			$process2['size_S']=$process2['size_S']-1;
		}
		elseif(strtoupper($data['tshirt_size'])=='M')
		{
			$process2['size_M']=$process2['size_M']-1;
		}
		elseif(strtoupper($data['tshirt_size'])=='L')
		{
			$process2['size_L']=$process2['size_L']-1;
		}
		elseif(strtoupper($data['tshirt_size'])=='XL')
		{
			$process2['size_XL']=$process2['size_XL']-1;
		}
		elseif(strtoupper($data['tshirt_size'])=='XXL')
		{
			$process2['size_XXL']=$process2['size_XXL']-1;
		}
		
		$this->db->where("id",$inven_id);
		$this->db->update("tshirts",$process2);
		
		
		
		/////////// Cap Inventory /////////
		$inventory_query=$this->db->get("caps");
		foreach($inventory_query->result() as $row)
		{
			$inven_id=$row->id;
			$process3['cap_qty']=$row->cap_qty ;
		}
		
		
		if($data['women10k_series_cap']=='Yes')
		{
			$process3['cap_qty']=$process3['cap_qty']-1;
		}
				
		$this->db->where("id",$inven_id);
		$this->db->update("caps",$process3);
		
		///////////// Shorts Inventory ///////////
		$inventory_query=$this->db->get("shorts");
		foreach($inventory_query->result() as $row)
		{
			$inven_id=$row->id;
			
			$process4['size_XS']=$row->size_XS;
			$process4['size_S']=$row->size_S;
			$process4['size_M']=$row->size_M;
			$process4['size_L']=$row->size_L;
			$process4['size_XL']=$row->size_XL;
			$process4['size_XXL']=$row->size_XXL;
		}
			if(strtoupper($data['women10k_series_shorts'])=='XS')
			{
				$process4['size_XS']=$process4['size_XS']-1;
			}
			elseif(strtoupper($data['women10k_series_shorts'])=='S')
			{
				$process4['size_S']=$process4['size_S']-1;
			}
			elseif(strtoupper($data['women10k_series_shorts'])=='M')
			{
				$process4['size_M']=$process4['size_M']-1;
			}
			elseif(strtoupper($data['women10k_series_shorts'])=='L')
			{
				$process4['size_L']=$process4['size_L']-1;
			}
			elseif(strtoupper($data['women10k_series_shorts'])=='XL')
			{
				$process4['size_XL']=$process4['size_XL']-1;
			}
			elseif(strtoupper($data['women10k_series_shorts'])=='XXL')
			{
				$process4['size_XXL']=$process4['size_XXL']-1;
			}
		
		$this->db->where("id",$inven_id);
		$this->db->update("shorts",$process4);
		
		
		///////////// Skorts Inventory ///////////
		$inventory_query=$this->db->get("skorts");
		foreach($inventory_query->result() as $row)
		{
			$inven_id=$row->id;
			
			$process5['size_XS']=$row->size_XS;
			$process5['size_S']=$row->size_S;
			$process5['size_M']=$row->size_M;
			$process5['size_L']=$row->size_L;
			$process5['size_XL']=$row->size_XL;
			$process5['size_XXL']=$row->size_XXL;
		}
		
			if(strtoupper($data['women10k_skorts'])=='XS')
			{
				$process5['size_XS']=$process5['size_XS']-1;
			}
			elseif(strtoupper($data['women10k_skorts'])=='S')
			{
				$process5['size_S']=$process5['size_S']-1;
			}
			elseif(strtoupper($data['women10k_skorts'])=='M')
			{
				$process5['size_M']=$process5['size_M']-1;
			}
			elseif(strtoupper($data['women10k_skorts'])=='L')
			{
				$process5['size_L']=$process5['size_L']-1;
			}
			elseif(strtoupper($data['women10k_skorts'])=='XL')
			{
				$process5['size_XL']=$process5['size_XL']-1;
			}
			elseif(strtoupper($data['women10k_skorts'])=='XXL')
			{
				$process5['size_XXL']=$process5['size_XXL']-1;
			}
		
		$this->db->where("id",$inven_id);
		$this->db->update("skorts",$process5);
		
	}
	
	
	function getSizecount($type='',$item=''){
	
		$query=$this->db->query("Select SUM($type) as sizecount  from `merchandise_details1` where  item_id=$item   ");
		foreach($query->result() as $row)
		{
			return $row->sizecount; 
		}
			   
	   }
	   
	function getSizecount_collected($type='',$item=''){
	
		$query=$this->db->query("Select SUM($type) as sizecount  from `merchandise_details1` where  item_id=$item AND behalf_collect=1   ");
		foreach($query->result() as $row)
		{
			return $row->sizecount; 
		}
			   
	 }
	 
	function getSizecount_uncollected($type='',$item=''){
	
		$query=$this->db->query("Select $type as sizecount  from `merchandise_item1` where  id=$item ");
		foreach($query->result() as $row)
		{
			return $row->sizecount; 
		}
			   
	 }
	 
	 
	 function getSizecount_item2($item=''){
	
		$query=$this->db->query("Select SUM($item) as sizecount  from `merchandise_details2` ");
		foreach($query->result() as $row)
		{
			return $row->sizecount; 
		}
			   
	 }
	 
	 
	 function getSizecount_collected_item2($item=''){
	
		$query=$this->db->query("Select SUM($item) as sizecount  from `merchandise_details2` where   behalf_collect=1   ");
		foreach($query->result() as $row)
		{
			return $row->sizecount; 
		}
			   
	 }
	 
	 function getSizecount_uncollected_item2($item=''){
	
		$query=$this->db->query("Select cap_qty as sizecount  from `merchandise_item2` where  id=$item ");
		foreach($query->result() as $row)
		{
			return $row->sizecount; 
		}
			   
	 }
  	 
  

}
?>