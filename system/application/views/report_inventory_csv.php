<?	
	//error_reporting(0);
	header('Content-type: application/octet-stream');
	header('Content-Disposition: attachment; filename="report_inventory.csv"');
$tr="\n";
$two_col=",
,";	   
		$query=$this->db->query("Select count(*) as ID from `participants2` where `tshirt_size` = 'XS' ");
		foreach($query->result() as $row)
		{
			$data['tshirt_XS']= $row->ID;
		}
		
		
		$query=$this->db->query("Select count(*) as ID from `participants2` where `tshirt_size` = 'S'");
		foreach($query->result() as $row)
		{
			$data['tshirt_S']= $row->ID;
		}
		
		
		$query=$this->db->query("Select count(*) as ID from `participants2` where `tshirt_size` = 'M'");
		foreach($query->result() as $row)
		{
			$data['tshirt_M']= $row->ID;
		}
		
		
		$query=$this->db->query("Select count(*) as ID from `participants2` where `tshirt_size` = 'L'");
		foreach($query->result() as $row)
		{
			$data['tshirt_L']= $row->ID;
		}
		
		
		$query=$this->db->query("Select count(*) as ID from `participants2` where `tshirt_size` = 'XL'");
		foreach($query->result() as $row)
		{
			$data['tshirt_XL']= $row->ID;
		}
		
		
		$query=$this->db->query("Select count(*) as ID from `participants2` where `tshirt_size` = 'XXL'");
		foreach($query->result() as $row)
		{
			$data['tshirt_XXL']= $row->ID;
		}
		
		$query=$this->db->query("Select count(*) as ID from `participants2` where `women10k_series_cap` = '1' ");

		foreach($query->result() as $row)
		{
			$data['caps']= $row->ID;
		}
		
		$query=$this->db->query("Select count(*) as ID from `participants2` where `women10k_series_shorts` = 'XS'");

		foreach($query->result() as $row)
		{
			$data['shorts_XS']= $row->ID;
		}
		
		$query=$this->db->query("Select count(*) as ID from `participants2` where `women10k_series_shorts` = 'S'");

		foreach($query->result() as $row)
		{
			$data['shorts_S']= $row->ID;
		}
		
		$query=$this->db->query("Select count(*) as ID from `participants2` where `women10k_series_shorts` = 'M'");

		foreach($query->result() as $row)
		{
			$data['shorts_M']= $row->ID;
		}
		
		$query=$this->db->query("Select count(*) as ID from `participants2` where `women10k_series_shorts` = 'L'");

		foreach($query->result() as $row)
		{
			$data['shorts_L']= $row->ID;
		}
		
		$query=$this->db->query("Select count(*) as ID from `participants2` where `women10k_series_shorts` = 'XL'");

		foreach($query->result() as $row)
		{
			$data['shorts_XL']= $row->ID;
		}
		
		$query=$this->db->query("Select count(*) as ID from `participants2` where `women10k_series_shorts` = 'XXL'");

		foreach($query->result() as $row)
		{
			$data['shorts_XXL']= $row->ID;
		}
		
		$query=$this->db->query("Select count(*) as ID from `participants2` where `women10k_series_shorts` = 'XL'");

		foreach($query->result() as $row)
		{
			$data['shorts_XL']= $row->ID;
		}
		
		$query=$this->db->query("Select count(*) as ID from `participants2` where `women10k_skorts` = 'XS'");

		foreach($query->result() as $row)
		{
			$data['skorts_XS']= $row->ID;
		}
		
		$query=$this->db->query("Select count(*) as ID from `participants2` where `women10k_skorts` = 'S'");

		foreach($query->result() as $row)
		{
			$data['skorts_S']= $row->ID;
		}
		
		$query=$this->db->query("Select count(*) as ID from `participants2` where `women10k_skorts` = 'M'");

		foreach($query->result() as $row)
		{
			$data['skorts_M']= $row->ID;
		}
		
		$query=$this->db->query("Select count(*) as ID from `participants2` where `women10k_skorts` = 'L'");

		foreach($query->result() as $row)
		{
			$data['skorts_L']= $row->ID;
		}
		
		$query=$this->db->query("Select count(*) as ID from `participants2` where `women10k_skorts` = 'XL'");

		foreach($query->result() as $row)
		{
			$data['skorts_XL']= $row->ID;
		}
		
		$query=$this->db->query("Select count(*) as ID from `participants2` where `women10k_skorts` = 'XXL'");

		foreach($query->result() as $row)
		{
			$data['skorts_XXL']= $row->ID;
		}
		
		$query = $this->db->query("select distinct(`created_date`) from `participants2` where ( `collect_it` = '1'  OR 	merchandise_collectit='1') Order By `created_date` ASC");
		 
		
		
		echo "Item,";
		echo "Confirmed,";
	$i=0;
	$tmp="";
	foreach($query->result() as $row)
	{
		$day=split(" ",$row->created_date);
		
		
		if($tmp!=trim($day[0]))			
		{	
		
			echo $day[0].",";
			echo " ,";
			$i=$i+1;
			$coll_date[$i]=$day[0];
			$tmp=$day[0];
		}
	}
	
	echo $tr;
	echo $two_col;
	for($k=0;$k<$i;$k++)
	{
	echo "Collected,";
    echo "UnCollected,";
	
	}
	echo $tr;
	echo "Event T,";
	echo ",";
	
  
  	for($k=0;$k<$i;$k++)
	{
		echo $two_col;

	}
	echo $tr;
	echo "XS,";
	echo $data['tshirt_XS'].",";
	
	for($k=1;$k<=$i;$k++)
	{			
			$sql="select count(*) as ID from `participants2` 
				where `created_date` >= '$coll_date[$k] 00:00:00' and `created_date` <= '$coll_date[$k] 23:59:00'
				and collect_it ='1' and tshirt_size='XS';
				";
		
			$query=$this->db->query($sql);
			foreach($query->result() as $row)
			{
				echo $row->ID.",";
				$tot_date[$k][1]=$row->ID;
			}
			
	
		$this->db->where("date",$coll_date[$k]);
		$query=$this->db->get("report");
		
		$query1=$this->db->get("tshirts");
		if($query->num_rows ==0 ){
		
		  foreach($query1->result() as $row1){
		   echo $row1->size_XS."," ;
		  }
		
		}
		
		foreach($query->result() as $row)
		{
			 
			 echo $row->tshirt_XS."," ;
			  
			 
		}
	
	}
	echo $tr;
	echo "S,";
	echo $data['tshirt_S'].",";
	
	for($k=1;$k<=$i;$k++)
	{		
			$sql="select count(*) as ID from `participants2` 
				where `created_date` >= '$coll_date[$k] 00:00:00' and `created_date` <= '$coll_date[$k] 23:59:00'
				and collect_it ='1' and tshirt_size='S';
				";
		
			$query=$this->db->query($sql);
			foreach($query->result() as $row)
			{
				echo $row->ID.",";
				$tot_date[$k][2]=$row->ID;
			}
			
		$this->db->where("date",$coll_date[$k]);
		$query=$this->db->get("report");
		
		$query1=$this->db->get("tshirts");
		if($query->num_rows ==0 ){
		
		  foreach($query1->result() as $row1){
		   echo $row1->size_S."," ;
		  }
		
		}
		
		foreach($query->result() as $row)
		{
			echo $row->tshirt_S."," ;
		}
	 } 
	 
	 echo $tr;
	 echo "M,";
	 echo $data['tshirt_M'].",";
	 
	for($k=1;$k<=$i;$k++)
	{	
			$sql="select count(*) as ID from `participants2` 
				where `created_date` >= '$coll_date[$k] 00:00:00' and `created_date` <= '$coll_date[$k] 23:59:00'
				and collect_it ='1' and tshirt_size='M';
				";
		
			$query=$this->db->query($sql);
			foreach($query->result() as $row)
			{
				echo $row->ID.",";
				$tot_date[$k][3]=$row->ID;
			}
			
	
		$this->db->where("date",$coll_date[$k]);
		$query=$this->db->get("report");
		
				$query1=$this->db->get("tshirts");
		if($query->num_rows ==0 ){
		
		  foreach($query1->result() as $row1){
		   echo $row1->size_M."," ;
		  }
		
		}
		
		foreach($query->result() as $row)
		{
			echo $row->tshirt_M."," ;
		}
	} 
	echo $tr;
	echo "L,";
	echo $data['tshirt_L'].",";
	
	for($k=1;$k<=$i;$k++)
	{
		
			$sql="select count(*) as ID from `participants2` 
				where `created_date` >= '$coll_date[$k] 00:00:00' and `created_date` <= '$coll_date[$k] 23:59:00'
				and collect_it ='1' and tshirt_size='L';
				";
		
			$query=$this->db->query($sql);
			foreach($query->result() as $row)
			{
				echo $row->ID.",";
				$tot_date[$k][4]=$row->ID;
			}
		
		$this->db->where("date",$coll_date[$k]);
		$query=$this->db->get("report");
		
				$query1=$this->db->get("tshirts");
		if($query->num_rows ==0 ){
		
		  foreach($query1->result() as $row1){
		   echo $row1->size_L."," ;
		  }
		
		}
		
		foreach($query->result() as $row)
		{
			echo $row->tshirt_L."," ;
		}
	
	} 
	echo $tr;
	echo "XL,";
	echo $data['tshirt_XL'].",";
	
	for($k=1;$k<=$i;$k++)
	{
		
			$sql="select count(*) as ID from `participants2` 
				where `created_date` >= '$coll_date[$k] 00:00:00' and `created_date` <= '$coll_date[$k] 23:59:00'
				and collect_it ='1' and tshirt_size='XL';
				";
		
			$query=$this->db->query($sql);
			foreach($query->result() as $row)
			{
				echo $row->ID.",";
				$tot_date[$k][5]=$row->ID;
			}
		
	
		$this->db->where("date",$coll_date[$k]);
		$query=$this->db->get("report");
		
		$query1=$this->db->get("tshirts");
		if($query->num_rows ==0 ){
		
		  foreach($query1->result() as $row1){
		   echo $row1->size_XL."," ;
		  }
		
		}
		foreach($query->result() as $row)
		{
			echo $row->tshirt_XL."," ;
		}
	} 
	echo $tr;
	echo "XXL,";
	echo $data['tshirt_XXL'].",";
	for($k=1;$k<=$i;$k++)
	{
		
			$sql="select count(*) as ID from `participants2` 
				where `created_date` >= '$coll_date[$k] 00:00:00' and `created_date` <= '$coll_date[$k] 23:59:00'
				and collect_it ='1' and tshirt_size='XXL';
				";
		
			$query=$this->db->query($sql);
			foreach($query->result() as $row)
			{
				echo $row->ID.",";
				$tot_date[$k][6]=$row->ID;
			}
		
	
		$this->db->where("date",$coll_date[$k]);
		$query=$this->db->get("report");
		
				$query1=$this->db->get("tshirts");
		if($query->num_rows ==0 ){
		
		  foreach($query1->result() as $row1){
		   echo $row1->size_XXL."," ;
		  }
		
		}
		foreach($query->result() as $row)
		{
			echo $row->tshirt_XXL."," ;
		}
	 } 
	 echo $tr;
	 echo "Total,";
	 echo $data['tshirt_XS']+$data['tshirt_S']+$data['tshirt_M']+$data['tshirt_L']+$data['tshirt_XL']+$data['tshirt_XXL'].",";
	 for($k=1;$k<=$i;$k++)
	{

		
			echo $tot_date[$k][1]+$tot_date[$k][2]+$tot_date[$k][3]+$tot_date[$k][4]+$tot_date[$k][5]+$tot_date[$k][6].",";
			echo " ,";
   
	} 
	
	echo $tr;
	echo "Supportive Parents T,";
	echo ",";
	
	for($k=0;$k<$i;$k++)
	{
		echo ",";
		echo ",";
	}
	echo $tr;
	echo "XS,";
	
	echo $psize_XS."," ; 
	 
	for($k=1;$k<=$i;$k++)
	{
	
		//echo $pcsize_XS."," ;  
		//echo $pusize_XS.",";
		$query=$this->db->query("Select SUM(`size_XS`) as sizecount  from `merchandise_details1` where  item_id=1 AND behalf_collect=1 AND `merchandise_date` >= '$coll_date[$k] 00:00:00' and `merchandise_date` <= '$coll_date[$k] 23:59:00'  ");
		foreach($query->result() as $row)
		{
		   
			if( $row->sizecount ==''){
			echo "0,";
			}else{
			 echo $row->sizecount.",";
			}
			$tot_date_item1[$k][1]=$row->sizecount ; 
		}
		
		
		if($k >= 1){
	   
		   $count_total1_XS =0;
		   for($j=1;$j<=$k;$j++){
		   $count_total1_XS = $count_total1_XS + $tot_date_item1[$j][1] ;
		   
		   }
	   
	  $count_total1_XS = $pusize_XS  -   $count_total1_XS ;
	  echo $count_total1_XS."," ;
	 } 
		
		
	}
	
	echo $tr;
	echo "S,";
	echo $psize_S.",";
	
	for($k=1;$k<=$i;$k++)
	{
		//echo $pcsize_S."," ;
	
		//echo $pusize_S.",";
		$query=$this->db->query("Select SUM(`size_S`) as sizecount  from `merchandise_details1` where  item_id=1 AND behalf_collect=1 AND `merchandise_date` >= '$coll_date[$k] 00:00:00' and `merchandise_date` <= '$coll_date[$k] 23:59:00'  ");
		foreach($query->result() as $row)
		{
		    
			if($row->sizecount == ''){
			echo "0,";
			}else{
			echo $row->sizecount.",";
			}
			
			$tot_date_item1[$k][2]=$row->sizecount ; 
		}
		
		if($k >= 1){
	   
		   $count_total1_S =0;
		   for($j=1;$j<=$k;$j++){
		   $count_total1_S = $count_total1_S + $tot_date_item1[$j][2] ;
		   
		   }
	   
		  $count_total1_S = $pusize_S  -   $count_total1_S ;
		  echo $count_total1_S."," ;
		  
		  
		} 
	
	

	 } 
	 
	 echo $tr;
	 echo "M,";
	 echo $psize_M.",";
	

  	for($k=1;$k<=$i;$k++)
	{
		//echo $pcsize_M."," ;
		//echo $pusize_M.",";
		
		$query=$this->db->query("Select SUM(`size_M`) as sizecount  from `merchandise_details1` where  item_id=1 AND behalf_collect=1 AND `merchandise_date` >= '$coll_date[$k] 00:00:00' and `merchandise_date` <= '$coll_date[$k] 23:59:00'  ");
		foreach($query->result() as $row)
		{
		    
			
			if($row->sizecount == ''){
			echo "0,";
			}else{
			echo $row->sizecount.",";
			}
			
			$tot_date_item1[$k][3]=$row->sizecount ; 
		}
		
		
		 //  $pusize_M 
		 if($k >= 1){
	   
		   $count_total1_M =0;
		   for($j=1;$j<=$k;$j++){
		   $count_total1_M = $count_total1_M + $tot_date_item1[$j][3] ;
		   
		   }
	   
		  $count_total1_M = $pusize_M  -   $count_total1_M ;
		  echo $count_total1_M."," ;
		  
		  
		 } 
	
	
	
	
	
	
	}
	
	echo $tr;
	echo "L,";
	echo $psize_L.",";
	
	for($k=1;$k<=$i;$k++)
	{
	
		//echo $pcsize_XL."," ;
		//echo $pusize_L.",";  
		
		
		$query=$this->db->query("Select SUM(`size_XL`) as sizecount  from `merchandise_details1` where  item_id=1 AND behalf_collect=1 AND `merchandise_date` >= '$coll_date[$k] 00:00:00' and `merchandise_date` <= '$coll_date[$k] 23:59:00'  ");
		foreach($query->result() as $row)
		{
		    
			if($row->sizecount==''){
			echo "0,";
			}else{
			echo $row->sizecount.",";
			}
			
			$tot_date_item1[$k][4]=$row->sizecount ; 
		}
		
		
		 if($k >= 1){
	   
		   $count_total1_L =0;
		   for($j=1;$j<=$k;$j++){
		   $count_total1_L = $count_total1_L + $tot_date_item1[$j][4] ;
		   
		   }
	   
		  $count_total1_L = $pusize_L  -   $count_total1_L ;
		  echo $count_total1_L."," ;
		  
		  
		 } 
		
	
	 } 
	 echo $tr;
	 echo "XL,";
	 echo $psize_XL.",";
	
	for($k=1;$k<=$i;$k++)
	{
		//echo $pcsize_XL.",";
		//echo $pusize_XL.",";
		
		$query=$this->db->query("Select SUM(`size_XL`) as sizecount  from `merchandise_details1` where  item_id=1 AND behalf_collect=1 AND `merchandise_date` >= '$coll_date[$k] 00:00:00' and `merchandise_date` <= '$coll_date[$k] 23:59:00'  ");
		foreach($query->result() as $row)
		{
		    if($row->sizecount==''){
			echo "0,";
			}else{
			echo $row->sizecount.",";
			}
			$tot_date_item1[$k][5]=$row->sizecount ; 
		}
		
		
		if($k >= 1){
	   
		   $count_total1_XL =0;
		   for($j=1;$j<=$k;$j++){
		   $count_total1_XL = $count_total1_XL + $tot_date_item1[$j][5] ;
		   
		   }
	   
		  $count_total1_XL = $pusize_XL  -   $count_total1_XL ;
		  echo $count_total1_XL."," ;
		  
		  
		 } 
	
	
		
		
	}
	
	echo $tr;
	echo "Total,";
	
	for($k=1;$k<=$i;$k++)
	{
		echo $pctotal.",";
		echo " ,";

	} 
	echo $tr;
	echo "Looney Tunes Kids Festive T,";
	echo ",";
	
	for($k=0;$k<$i;$k++)
	{
	
    	echo " ,";
		echo " ,";
	
	}
	echo $tr;
	echo "XS,";
	echo $lsize_XS."," ;
  
  	for($k=1;$k<=$i;$k++)
	{
		//echo $lcsize_XS.",";
		//echo $lusize_XS.",";
		
		$query=$this->db->query("Select SUM(`size_XS`) as sizecount  from `merchandise_details1` where  item_id=2 AND behalf_collect=1 AND `merchandise_date` >= '$coll_date[$k] 00:00:00' and `merchandise_date` <= '$coll_date[$k] 23:59:00'  ");
		foreach($query->result() as $row)
		{
		    if($row->sizecount==''){
			echo "0,";
			}else{
			echo $row->sizecount.",";
			}
			$tot_date_item2[$k][1]=$row->sizecount ; 
		}
		
		
		 if($k >= 1){
	   
		   $count_total2_XS =0;
		   for($j=1;$j<=$k;$j++){
		   $count_total2_XS = $count_total2_XS + $tot_date_item2[$j][1] ;
		   
		   }
	   
		  $count_total2_XS = $lusize_XS  -   $count_total2_XS ;
		  echo $count_total2_XS."," ;
		  
		  
		 } 	
	


	}
	
	echo $tr;
	echo "S,";
	echo $lsize_S.",";
	
	for($k=1;$k<=$i;$k++)
	{
		//echo $lcsize_S."," ;
		//echo $lusize_S.",";
		
		$query=$this->db->query("Select SUM(`size_S`) as sizecount  from `merchandise_details1` where  item_id=2 AND behalf_collect=1 AND `merchandise_date` >= '$coll_date[$k] 00:00:00' and `merchandise_date` <= '$coll_date[$k] 23:59:00'  ");
		foreach($query->result() as $row)
		{
		   	if($row->sizecount==''){
			echo "0,";
			}else{
			echo $row->sizecount.",";
			}
			$tot_date_item2[$k][2]=$row->sizecount ; 
		}
		
		
		 if( $k >= 1){
	   
		   $count_total2_S =0;
		   
		   for($j=1;$j<=$k;$j++){
		   $count_total2_S = $count_total2_S + $tot_date_item2[$j][2] ;
		   
		   }
	   
		  $count_total2_S = $lusize_S  -   $count_total2_S ;
		  echo $count_total2_S."," ;
		  
		  
		 } 	
			
		
		
	} 
	
	echo $tr;
	echo "M,";
	echo $lsize_M.",";
	
	for($k=1;$k<=$i;$k++)
	{
		//echo $lcsize_M."," ;  
		//echo $lusize_M.",";
		
			$query=$this->db->query("Select SUM(`size_M`) as sizecount  from `merchandise_details1` where  item_id=2 AND behalf_collect=1 AND `merchandise_date` >= '$coll_date[$k] 00:00:00' and `merchandise_date` <= '$coll_date[$k] 23:59:00'  ");
		foreach($query->result() as $row)
		{
		    if($row->sizecount==''){
			echo "0,";
			}else{
			echo $row->sizecount.",";
			}
			$tot_date_item2[$k][3]=$row->sizecount ; 
		}
		
		
		 if($k >= 1){
	   
		   $count_total2_M =0;
		   for($j=1;$j<=$k;$j++){
		   $count_total2_M = $count_total2_M + $tot_date_item2[$j][3] ;
		   
		   }
	   
		  $count_total2_M = $lusize_M -   $count_total2_M ;
		  echo $count_total2_M."," ;
		  
		  
		 } 
		
		
		
	
	} 
	
	echo $tr;
	echo "L,";
	echo $lsize_L.",";
	
  
  	for($k=1;$k<=$i;$k++)
	{
		//echo $lcsize_XL."," ;  
		
		//echo $lusize_L.",";
		
			
		  	$query=$this->db->query("Select SUM(`size_L`) as sizecount  from `merchandise_details1` where  item_id=2 AND behalf_collect=1 AND `merchandise_date` >= '$coll_date[$k] 00:00:00' and `merchandise_date` <= '$coll_date[$k] 23:59:00'  ");
		foreach($query->result() as $row)
		{
		   	if($row->sizecount==''){
			echo "0,";
			}else{
			echo $row->sizecount.",";
			}
			$tot_date_item2[$k][4]=$row->sizecount ; 
		}
		
		
		 if($k >= 1){
	   
		   $count_total2_L =0;
		   for($j=1;$j<=$k;$j++){
		   $count_total2_L = $count_total2_L + $tot_date_item2[$j][4] ;
		   
		   }
	   
		  $count_total2_L = $lusize_L -   $count_total2_L ;
		  echo $count_total2_L."," ;
		  
		  
		 } 	
		
		
		
	}
	echo $tr;
	echo "XL,";
	echo $lsize_XL.",";
	
  	for($k=1;$k<=$i;$k++)
	{
		//echo $lcsize_XL."," ;  
		//echo $lusize_XL.","; 
		
		
		
		
		
		
		
		$query=$this->db->query("Select SUM(`size_XL`) as sizecount  from `merchandise_details1` where  item_id=2 AND behalf_collect=1 AND `merchandise_date` >= '$coll_date[$k] 00:00:00' and `merchandise_date` <= '$coll_date[$k] 23:59:00'  ");
		foreach($query->result() as $row)
		{
		    if($row->sizecount==''){
			echo "0,";
			}else{
			echo $row->sizecount.",";
			}
			$tot_date_item2[$k][5]=$row->sizecount ; 
		}
		
		
		 if($k >= 1){
	   
		   $count_total2_XL =0;
		   for($j=1;$j<=$k;$j++){
		   $count_total2_XL = $count_total2_XL + $tot_date_item2[$j][5] ;
		   
		   }
	   
		  $count_total2_XL = $lusize_XL -   $count_total2_XL ;
		  echo $count_total2_XL."," ;
		  
		  
		 } 		
		
		
		
	}
	
	echo $tr;
	echo "XXL,";
	echo $lsize_XXL.",";
	
	for($k=1;$k<=$i;$k++)
	{
		//echo $lcsize_XXL."," ;  
		//echo $lusize_XXL."," ;
		
			$query=$this->db->query("Select SUM(`size_XXL`) as sizecount  from `merchandise_details1` where  item_id=2 AND behalf_collect=1 AND `merchandise_date` >= '$coll_date[$k] 00:00:00' and `merchandise_date` <= '$coll_date[$k] 23:59:00'  ");
		foreach($query->result() as $row)
		{
		   	if($row->sizecount==''){
			echo "0,";
			}else{
			echo $row->sizecount.",";
			}
			$tot_date_item2[$k][6]=$row->sizecount ; 
		}
		
		
		
		 if($k >= 1){
	   
		   $count_total2_XXL =0;
		   for($j=1;$j<=$k;$j++){
		   $count_total2_XXL = $count_total2_XXL + $tot_date_item2[$j][6] ;
		   
		   }
	   
		  $count_total2_XXL = $lusize_XXL -   $count_total2_XXL ;
		  echo $count_total2_XXL."," ;
		  
		  
		 } 	
	
		
		

	}
	
	echo $tr;
	echo "Total,";
	echo  $ltotal.",";
	
	for($k=1;$k<=$i;$k++)
	{
		echo $lctotal.",";
		echo " ,";

	}
	
	echo $tr;
	echo "Carnival Ticket,";
	echo ",";
	
	
  	for($k=0;$k<$i;$k++)
	{
		echo ",";
		echo ",";
	}
	
	echo $tr;
	echo "XS,";
	echo $item1_c."," ;
	
	for($k=1;$k<=$i;$k++)
	{
		//echo $item1_co."," ;  
		//echo $item1_uc."," ;
		
		  	$query=$this->db->query("Select SUM(`item_1`) as sizecount  from `merchandise_details2` where    behalf_collect=1 AND `merchandise_date` >= '$coll_date[$k] 00:00:00' and `merchandise_date` <= '$coll_date[$k] 23:59:00'  ");
		foreach($query->result() as $row)
		{
		    if($row->sizecount==''){
			echo "0,";
			}else{
			echo $row->sizecount.",";
			}
			$date_item_1[$k] =$row->sizecount."," ; 
		}
	
	
	 if($k >= 1){
	   
		   $count_item1_uc =0;
		   for($j=1;$j<=$k;$j++){
		   $count_item1_uc = $count_item1_uc + $date_item_1[$j] ;
		   
		   }
	   
		  $count_item1_uc = $item1_uc - $count_item1_uc ;
		  echo $count_item1_uc."," ;
		  
		  
		 } 	
		
		
	}
	
	echo $tr;
	echo "Looney Tunes Stationery Set,";
	echo ",";
	 
 	for($k=0;$k<$i;$k++)
	{
		echo " ,";
		echo " ,";
	}
	
	echo $tr;
	echo "XS,";
	echo $item2_c.",";
	for($k=1;$k<=$i;$k++)
	{
		//echo $item2_co."," ;  
		//echo $item2_uc."," ;
		
			$query=$this->db->query("Select SUM(`item_2`) as sizecount  from `merchandise_details2` where    behalf_collect=1 AND `merchandise_date` >= '$coll_date[$k] 00:00:00' and `merchandise_date` <= '$coll_date[$k] 23:59:00'  ");
		foreach($query->result() as $row)
		{
		   	if($row->sizecount==''){
			echo "0,";
			}else{
			echo $row->sizecount.",";
			}
			$date_item_2[$k] =$row->sizecount ; 
		}
		
		
			 if($k >= 1){
	   
		   $count_item2_uc =0;
		   for($j=1;$j<=$k;$j++){
		   $count_item2_uc = $count_item2_uc + $date_item_2[$j] ;
		   
		   }
	   
		  $count_item2_uc = $item2_uc - $count_item2_uc ;
		  echo $count_item2_uc."," ;
		  
		  
		 } 	
		 
		 
		
		
	}
	echo $tr;
	echo "Tweety Shoulder Bag,";
	echo ",";
	
	for($k=0;$k<$i;$k++)
	{
		echo " ,";
		echo " ,";
	}
	
	echo $tr;
	echo "XS,";
	echo $item3_c.",";
	
	for($k=1;$k<=$i;$k++)
	{
		//echo $item3_co."," ; 
		//echo $item3_uc."," ;
		
			$query=$this->db->query("Select SUM(`item_3`) as sizecount  from `merchandise_details2` where    behalf_collect=1 AND `merchandise_date` >= '$coll_date[$k] 00:00:00' and `merchandise_date` <= '$coll_date[$k] 23:59:00'  ");
		foreach($query->result() as $row)
		{
		   	if($row->sizecount==''){
			echo "0,";
			}else{
			echo $row->sizecount.",";
			}
			$date_item_3[$k] =$row->sizecount ; 
		}
		
		 if($k >= 1){
	   
		   $count_item3_uc =0;
		   for($j=1;$j<=$k;$j++){
		   $count_item3_uc = $count_item3_uc + $date_item_3[$j] ;
		   
		   }
	   
		  $count_item3_uc = $item3_uc - $count_item3_uc ;
		  echo $count_item3_uc."," ;
		  
		  
		 } 	
		
		
		
		
		
	}
	
	echo $tr;
	echo "Bugs Bunny Shopping Bag,";
	echo ",";
	for($k=0;$k<$i;$k++)
	{
		echo ",";
		echo ",";
	}
	
	echo $tr;
	echo "XS,";
	echo $item4_c.",";
	
	for($k=1;$k<=$i;$k++)
	{
		//echo $item4_co.",";
		//echo $item4_uc.",";
		
		 	$query=$this->db->query("Select SUM(`item_4`) as sizecount  from `merchandise_details2` where    behalf_collect=1 AND `merchandise_date` >= '$coll_date[$k] 00:00:00' and `merchandise_date` <= '$coll_date[$k] 23:59:00'  ");
		foreach($query->result() as $row)
		{
		   	if($row->sizecount==''){
			echo "0,";
			}else{
			echo $row->sizecount.",";
			}
			$date_item_4[$k] =$row->sizecount ; 
		}
		
		
		 if($k >= 1){
	   
		   $count_item4_uc =0;
		   for($j=1;$j<=$k;$j++){
		   $count_item4_uc = $count_item4_uc + $date_item_4[$j] ;
		   
		   }
	   
		  $count_item4_uc = $item4_uc - $count_item4_uc ;
		  echo $count_item4_uc."," ;
		  
		  
		 } 	
		
		
		
		
	}
	
	echo $tr;
	echo "Looney Tunes Frosted Glass Mug,";
	echo ",";
	
	for($k=0;$k<$i;$k++)
	{
		echo ",";
		echo ",";
	}
	
	echo $tr;
	echo "XS,";
	echo $item5_c."," ;
	
	for($k=1;$k<=$i;$k++)
	{
		//echo $item5_co."," ;  
		//echo $item5_uc.",";
			$query=$this->db->query("Select SUM(`item_5`) as sizecount  from `merchandise_details2` where    behalf_collect=1 AND `merchandise_date` >= '$coll_date[$k] 00:00:00' and `merchandise_date` <= '$coll_date[$k] 23:59:00'  ");
		foreach($query->result() as $row)
		{
		   	if($row->sizecount==''){
			echo "0,";
			}else{
			echo $row->sizecount.",";
			}
			$date_item_5[$k] =$row->sizecount ; 
		}
		
		
		 if($k >= 1){
	   
		   $count_item5_uc =0;
		   for($j=1;$j<=$k;$j++){
		   $count_item5_uc = $count_item5_uc + $date_item_5[$j] ;
		   
		   }
	   
		  $count_item5_uc = $item5_uc - $count_item5_uc ;
		  echo $count_item5_uc."," ;
		  
		  
		 } 	
		
		
	}
	
	echo $tr;
	echo "Looney Tunes Clear Glass Mug,";
	echo ",";

  	for($k=0;$k<$i;$k++)
	{
		echo ",";
		echo ",";
	}
	
	echo $tr;
	echo "XS,";
	echo $item6_c.",";
	
	for($k=1;$k<=$i;$k++)
	{
		//echo $item6_co.",";
		//echo $item6_uc.",";
		
		$query=$this->db->query("Select SUM(`item_6`) as sizecount  from `merchandise_details2` where    behalf_collect=1 AND `merchandise_date` >= '$coll_date[$k] 00:00:00' and `merchandise_date` <= '$coll_date[$k] 23:59:00'  ");
		foreach($query->result() as $row)
		{
		    if($row->sizecount==''){
			echo "0,";
			}else{
			echo $row->sizecount.",";
			}
			$date_item_6[$k] =$row->sizecount ; 
		}
		
		
		 if($k >= 1){
	   
		   $count_item6_uc =0;
		   for($j=1;$j<=$k;$j++){
		   $count_item6_uc = $count_item6_uc + $date_item_6[$j] ;
		   
		   }
	   
		  $count_item6_uc = $item6_uc - $count_item6_uc ;
		  echo $count_item6_uc."," ;
		  
		  
		 } 	
		
		
	}
	
	echo $tr;
	echo "Tweety Mug in Savings Tin,";
	echo ",";
	
	for($k=0;$k<$i;$k++)
	{
		echo ",";
		echo ",";
	}
	
	echo $tr;
	echo "XS,";
	echo $item7_c."," ;

 	for($k=1;$k<=$i;$k++)
	{
		//echo $item7_co."," ; 
		//echo $item7_uc.",";
		
		$query=$this->db->query("Select SUM(`item_7`) as sizecount  from `merchandise_details2` where    behalf_collect=1 AND `merchandise_date` >= '$coll_date[$k] 00:00:00' and `merchandise_date` <= '$coll_date[$k] 23:59:00'  ");
		foreach($query->result() as $row)
		{
		    if($row->sizecount==''){
			echo "0,";
			}else{
			echo $row->sizecount.",";
			}
			$date_item_7[$k] =$row->sizecount ; 
		}
		
		
		 if($k >= 1){
	   
		   $count_item7_uc =0;
		   for($j=1;$j<=$k;$j++){
		   $count_item7_uc = $count_item7_uc + $date_item_7[$j] ;
		   
		   }
	   
		  $count_item7_uc = $item7_uc - $count_item7_uc ;
		  echo $count_item7_uc."," ;
		  
		  
		 } 	
		
		
	}
	echo $tr;
?>	   