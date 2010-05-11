<?php
class Collecter extends Model {

    
    function Collecter()
    {
        // Call the Model constructor
        parent::Model();
    }
	
		
	function add($data)
	{
		$userdata= array(
			'counter' => $data['counter'],
			'name' => $data['name'] ,
			'type'  => 'collector',
			);
		$this->session->set_userdata($userdata);
	}
	
	function get_query($id)
	{
		$this->db->where("S_N",$id);
		$query=$this->db->get("participants2");
		return $query->result();
	}
	
	function collect_merchandise($data,$id)
	{

		$data['merchandise_date']=date("Y-m-d H:i");
		//$data['merchandise_created_by']    =date("Y-m-d H:i");

		/*$this->db->where("S_N",$id);
		$myquery=$this->db->get("participants2");
		*/
		$this->db->where("S_N",$id);		
		$this->db->update("participants2",$data);
		 
		$data1 = array() ;
		$data1['self_collect']     = $data['merchandise_selfcollect'] ;
		$data1['behalf_collect']   = $data['merchandise_collectit'] ;
		$data1['merchandise_date'] = $data['merchandise_date'] ;
		
		$this->db->where("participant_id",$id);		
		$this->db->update("merchandise_details1",$data1);
		
		$this->db->where("participant_id",$id);		
		$this->db->update("merchandise_details2",$data1);
		
	}
	
	
	function collect_it($data,$id)
	{
		
		/*if($data['women10k_series_cap']=='Yes')
		{
			$data['women10k_series_cap']='1';
		}
		else
		{
			$data['women10k_series_cap']='0';
		}
		
		*/

		$data['created_date']=date("Y-m-d H:i");

		$this->db->where("S_N",$id);
		$myquery=$this->db->get("participants2");
		foreach($myquery->result() as $row)
		{
			$remark=$row->remark;
		}
		$data['remark_tmp']=$remark;
		
		
		$this->db->where("S_N",$id);		
		$this->db->update("participants2",$data);
	}
	
	function un_mcollect($id)
	{
		$this->db->where("S_N",$id);
		$data=array(
		"merchandise_created_by" => "" ,
		"merchandise_remarks" => "",
		"merchandise_selfcollect" => "",
		"merchandise_collectit" => "",
		"merchandise_counter" => "",
		"merchandise_date" => ""
		);
		
		$this->db->update("participants2",$data);

		$this->db->where("participant_id",$id);
		$data=array(
		"self_collect"=>"",
		"behalf_collect"=>""
		);
		$this->db->update("merchandise_details1",$data);
		
		$this->db->where("participant_id",$id);
		
		$this->db->update("merchandise_details2",$data);
		
		
	}
	function un_collect($id)
	{
		$this->db->where("S_N",$id);
		$data=array(
		"collect_it" => "" ,
		"self_collect" => "",
		"remark" => ""
		);
		$this->db->update("participants2",$data);
		
		$this->db->where("S_N",$id);
		$myquery=$this->db->get("participants2");
		foreach($myquery->result() as $row)
		{
			$remark_tmp=$row->remark_tmp;
		}
		
		$data=array(
		"remark" => $remark_tmp
		);
		
		$this->db->where("S_N",$id);
		$this->db->update("participants2",$data);
		
		///////////////////////////////////
		
		
		$this->db->where("S_N",$id);
		$query=$this->db->get("participants2");
		
		foreach($query->result() as $row)
		{
			$date=split(" ",$row->created_date);
			$tshirt_size=$row->tshirt_size;
			$cap=$row->women10k_series_cap;
			$shorts_size=$row->women10k_series_shorts;
			$skorts_size=$row->women10k_skorts;
		}
		
	
		
		$query=$this->db->query("select * from report where `date` = '$date[0]'");
		
		foreach($query->result() as $row)
		{
			$report_id=$row->id;
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
		}
		
		
		
		if(strtoupper($tshirt_size)=='XS')
		{
			$process['tshirt_XS']=$process['tshirt_XS']+1;
			
			$tshirt_query=$this->db->query("select * from report where `date` >= '$date[0]'");
			
			foreach($tshirt_query->result() as $row)
			{
				$txs_update['tshirt_XS']=(int)$row->tshirt_XS+1;
				$this->db->where("id",$row->id);
				$this->db->update("report",$txs_update);
				
				$this->db->where("id",3);
				$ts_main_xs['size_XS']  = (int)$row->tshirt_XS+1; 
				$this->db->update("tshirts",$ts_main_xs);
			}
			
		}
		elseif(strtoupper($tshirt_size)=='S')
		{
			$process['tshirt_S']=$process['tshirt_S']+1;
			$tshirt_query=$this->db->query("select * from report where `date` >= '$date[0]'");
			//echo "select * from report where `date` >= '$date[0]'" ;
			//print_r($tshirt_query) ;
			
			foreach($tshirt_query->result() as $row)
			{
			   
				$ts_update['tshirt_S']=(int)$row->tshirt_S+1;
				 
				$this->db->where("id",$row->id);
				
				$this->db->update("report",$ts_update);
				
				$this->db->where("id",3);
				$ts_mains['size_S']  = (int)$row->tshirt_S+1; 
				$this->db->update("tshirts",$ts_mains);
			}
			
		}
		elseif(strtoupper($tshirt_size)=='M')
		{
			$process['tshirt_M']=$process['tshirt_M']+1;
			$tshirt_query=$this->db->query("select * from report where `date` >= '$date[0]'");
			
			foreach($tshirt_query->result() as $row)
			{
				$tm_update['tshirt_M']=(int)$row->tshirt_M+1;
				$this->db->where("id",$row->id);
				$this->db->update("report",$tm_update);
				
				$this->db->where("id",3);
				$ts_main_m['size_M']  = (int)$row->tshirt_M+1; 
				$this->db->update("tshirts",$ts_main_m);
			}
		}
		elseif(strtoupper($tshirt_size)=='L')
		{
			$process['tshirt_L']=$process['tshirt_L']+1;
			$tshirt_query=$this->db->query("select * from report where `date` >= '$date[0]'");
			
			foreach($tshirt_query->result() as $row)
			{
				$tL_update['tshirt_L']=(int)$row->tshirt_L+1;
				$this->db->where("id",$row->id);
				$this->db->update("report",$tL_update);
				
				$this->db->where("id",3);
				$ts_main_l['size_L']  = (int)$row->tshirt_L+1; 
				$this->db->update("tshirts",$ts_main_l);
			}
			
		}
		elseif(strtoupper($tshirt_size)=='XL')
		{
			$process['tshirt_XL']=$process['tshirt_XL']+1;
			$tshirt_query=$this->db->query("select * from report where `date` >= '$date[0]'");
			
			foreach($tshirt_query->result() as $row)
			{
				$txl_update['tshirt_XL']=(int)$row->tshirt_XL+1;
				$this->db->where("id",$row->id);
				$this->db->update("report",$txl_update);
				
				$this->db->where("id",3);
				$ts_main_xl['size_XL']  = (int)$row->tshirt_XL+1; 
				$this->db->update("tshirts",$ts_main_xl);
			}
		}
		elseif(strtoupper($tshirt_size)=='XXL')
		{
			$process['tshirt_XXL']=$process['tshirt_XXL']+1;
			
			$tshirt_query=$this->db->query("select * from report where `date` >= '$date[0]'");
			
			foreach($tshirt_query->result() as $row)
			{
				$txxl_update['tshirt_XXL']=(int)$row->tshirt_XXL+1;
				$this->db->where("id",$row->id);
				$this->db->update("report",$txxl_update);
				
				$this->db->where("id",3);
				$ts_main_xxl['size_XXL']  = (int)$row->tshirt_XXL+1; 
				$this->db->update("tshirts",$ts_main_xxl);
			}
		}
		///////// End Tshirpt Report ////////////
		
		//// Caps ///
		if($cap=='1')
		{
			$process['cap']=$process['cap']+1;
			
			
			$cap_query=$this->db->query("select * from report where `date` >= '$date[0]'");
			foreach($cap_query->result() as $row)
			{
				$cap_update['cap']=(int)$row->cap+1;
				$this->db->where("id",$row->id);
				$this->db->update("report",$cap_update);
			}
			
			
		}
		/////////// End Caps Report ///////
		
		////// Shorts /////
		if($shorts_size=='XS')
		{
			$process['shorts_XS']=$process['shorts_XS']+1;
			
			$shorts_query=$this->db->query("select * from report where `date` > '$date[0]'");
			foreach($shorts_query->result() as $row)
			{
				$shortsxs_update['shorts_XS']=(int)$row->shorts_XS+1;
				$this->db->where("id",$row->id);
				$this->db->update("report",$shortsxs_update);
			}
			
		}
		
		elseif($shorts_size=='S')
		{
			$process['shorts_S']=$process['shorts_S']+1;
			
			$shorts_query=$this->db->query("select * from report where `date` > '$date[0]'");
			foreach($shorts_query->result() as $row)
			{
				$shortsS_update['shorts_S']=(int)$row->shorts_S+1;
				$this->db->where("id",$row->id);
				$this->db->update("report",$shortsS_update);
			}
			
		}
		
		elseif($shorts_size=='M')
		{
			$process['shorts_M']=$process['shorts_M']+1;
			
			$shorts_query=$this->db->query("select * from report where `date` > '$date[0]'");
			foreach($shorts_query->result() as $row)
			{
				$shortsM_update['shorts_M']=(int)$row->shorts_M+1;
				$this->db->where("id",$row->id);
				$this->db->update("report",$shortsM_update);
			}
		}
		
		elseif($shorts_size=='L')
		{
			$process['shorts_L']=$process['shorts_L']+1;
			
			$shorts_query=$this->db->query("select * from report where `date` > '$date[0]'");
			foreach($shorts_query->result() as $row)
			{
				$shortsL_update['shorts_L']=(int)$row->shorts_L+1;
				$this->db->where("id",$row->id);
				$this->db->update("report",$shortsL_update);
			}
			
		}
		elseif($shorts_size=='XL')
		{
			$process['shorts_XL']=$process['shorts_XL']+1;
			
			$shorts_query=$this->db->query("select * from report where `date` > '$date[0]'");
			foreach($shorts_query->result() as $row)
			{
				$shortsXL_update['shorts_XL']=(int)$row->shorts_XL+1;
				$this->db->where("id",$row->id);
				$this->db->update("report",$shortsXL_update);
			}
			
		}
		elseif($shorts_size=='XXL')
		{
			$process['shorts_XXL']=$process['shorts_XXL']+1;
			
			$shorts_query=$this->db->query("select * from report where `date` > '$date[0]'");
			foreach($shorts_query->result() as $row)
			{
				$shortsXXL_update['shorts_XXL']=(int)$row->shorts_XXL+1;
				$this->db->where("id",$row->id);
				$this->db->update("report",$shortsXXL_update);
			}
			
			
		}
		///////////// End Shorts Report //////////
		
		/////// Skorts ////
		if($skorts_size=='XS')
		{
			$process['skorts_XS']=$process['skorts_XS']+1;
			
			$skorts_query=$this->db->query("select * from report where `date` > '$date[0]'");
			foreach($skorts_query->result() as $row)
			{
				$skortsXS_update['skorts_XS']=(int)$row->shorts_XS+1;
				$this->db->where("id",$row->id);
				$this->db->update("report",$skortsXS_update);
			}
			
			
		}
		elseif($skorts_size=='S')
		{
			$process['skorts_S']=$process['skorts_S']+1;
			
			$skorts_query=$this->db->query("select * from report where `date` > '$date[0]'");
			foreach($skorts_query->result() as $row)
			{
				$skortsS_update['skorts_S']=(int)$row->shorts_S+1;
				$this->db->where("id",$row->id);
				$this->db->update("report",$skortsS_update);
			}
			
		}
		elseif($skorts_size=='M')
		{
			$process['skorts_M']=$process['skorts_M']+1;
			
			$skorts_query=$this->db->query("select * from report where `date` > '$date[0]'");
			foreach($skorts_query->result() as $row)
			{
				$skortsM_update['skorts_M']=(int)$row->shorts_M+1;
				$this->db->where("id",$row->id);
				$this->db->update("report",$skortsM_update);
			}
		}
		elseif($skorts_size=='L')
		{
			$process['skorts_L']=$process['skorts_L']+1;
			
			$skorts_query=$this->db->query("select * from report where `date` > '$date[0]'");
			foreach($skorts_query->result() as $row)
			{
				$skortsL_update['skorts_L']=(int)$row->shorts_L+1;
				$this->db->where("id",$row->id);
				$this->db->update("report",$skortsL_update);
			}
		}
		elseif($skorts_size=='XL')
		{
			$process['skorts_XL']=$process['skorts_XL']+1;
			
			$skorts_query=$this->db->query("select * from report where `date` > '$date[0]'");
			foreach($skorts_query->result() as $row)
			{
				$skortsXL_update['skorts_XL']=(int)$row->shorts_XL+1;
				$this->db->where("id",$row->id);
				$this->db->update("report",$skortsXL_update);
			}
			
		}
		elseif($skorts_size=='XXL')
		{
			$process['skorts_XXL']=$process['skorts_XXL']+1;
			
			$skorts_query=$this->db->query("select * from report where `date` > '$date[0]'");
			foreach($skorts_query->result() as $row)
			{
				$skortsM_update['skorts_XXL']=(int)$row->shorts_XXL+1;
				$this->db->where("id",$row->id);
				$this->db->update("report",$skortsXXL_update);
			}
		}
		
		$this->db->where("id",$report_id);
		$this->db->update("report",$process);
		////////// End Skorts Report ///////////
		
		///////// Tshirt Inventory ////
		
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
		
		if($tshirt_size=='XS')
		{
			$process2['size_XS']=$process2['size_XS']+1;
		}
		elseif($tshirt_size=='S')
		{
			$process2['size_S']=$process2['size_S']+1;
		}
		elseif($tshirt_size=='M')
		{
			$process2['size_M']=$process2['size_M']+1;
		}
		elseif($tshirt_size=='L')
		{
			$process2['size_L']=$process2['size_L']+1;
		}
		elseif($tshirt_size=='XL')
		{
			$process2['size_XL']=$process2['size_XL']+1;
		}
		elseif($tshirt_size=='XXL')
		{
			$process2['size_XXL']=$process2['size_XXL']+1;
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
		
		if($cap=='1')
		{
			$process3['cap_qty']=$process3['cap_qty']+1;
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
		
		if($shorts_size=='XS')
		{
			$process4['size_XS']=$process4['size_XS']+1;
		}		
		elseif($shorts_size=='S')
		{
			$process4['size_S']=$process4['size_S']+1;
		}
		elseif($shorts_size=='M')
		{
			$process4['size_M']=$process4['size_M']+1;
		}
		elseif($shorts_size=='L')
		{
			$process4['size_L']=$process4['size_L']+1;
		}
		elseif($shorts_size=='XL')
		{
			$process4['size_XL']=$process4['size_XL']+1;
		}
		elseif($shorts_size=='XXL')
		{
			$process4['size_XXL']=$process4['size_XXL']+1;
		}
		
		$this->db->where("id",$inven_id);
		$this->db->update("shorts",$process4);
		
		
		//// Skorts Inventory /////
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
		
		if($skorts_size=='XS')
		{
			$process5['size_XS']=$process5['size_XS']+1;
		}
		elseif($skorts_size=='S')
		{
			$process5['size_S']=$process5['size_S']+1;
		}
		elseif($skorts_size=='M')
		{
			$process5['size_M']=$process5['size_M']+1;
		}
		elseif($skorts_size=='L')
		{
			$process5['size_L']=$process5['size_L']+1;
		}
		elseif($skorts_size=='XL')
		{
			$process5['size_XL']=$process5['size_XL']+1;
		}
		elseif($skorts_size=='XXL')
		{
			$process5['size_XXL']=$process5['size_XXL']+1;
		}
		
		$this->db->where("id",$inven_id);
		$this->db->update("skorts",$process5);
		
		$this->db->where("collect_it","1");
		$report_query=$this->db->get("participants2");
		if($report_query->num_rows() == 0)
		{
			$this->db->query("TRUNCATE TABLE `report`");
		}
		
	}
	
	function get_collect_lst()
	{
		$this->db->where("collect_it",1);
		$query=$this->db->get("participants2");
		return $query->result();
	}
	
	function get_mcollect_lst()
	{
		$this->db->where("merchandise_collectit",1);
		$query=$this->db->get("participants2");
		return $query->result();
	}
	
}
?>