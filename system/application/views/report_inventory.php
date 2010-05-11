<?

	   
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
		 
		
		
		
?>
 <div id="content-wrapper">
    <div id="main">
		<div class="main_content">
	<br>
		<table width="100%" border="1" cellpadding="5" cellspacing="0">
  <tr>
    <td ><strong>Item</strong></td>
    <td ><strong>Confirmed</strong></td>
	<?
	$i=0;
	$tmp="";
	foreach($query->result() as $row)
	{
		$day=split(" ",$row->created_date);
		
		
		if($tmp!=trim($day[0]))			
		{	
		
			echo "<td><strong>".$day[0]."</strong></td>";
			echo "<td>&nbsp;</td>";
			$i=$i+1;
			$coll_date[$i]=$day[0];
			$tmp=$day[0];
		}
	}
	?>
    
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
	<? for($k=0;$k<$i;$k++)
	{
	?>
    <td><em>Collected</em></td>
    <td><em>UnCollected</em></td>
	<?
	}
	?>
  </tr>
  <tr>
    <td COLSPAN="2" align="centre"><strong>Event T</strong></td>
   
	<? for($k=0;$k<$i;$k++)
	{
	?>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
	<?
	}
	?>
  </tr>
  <tr>
    <td>XS</td>
    <td align="center"><?= $data['tshirt_XS'] ?></td>
	<? for($k=1;$k<=$i;$k++)
	{
	?>
    <td align="center">
	
	<?
		
		
			$sql="select count(*) as ID from `participants2` 
				where `created_date` >= '$coll_date[$k] 00:00:00' and `created_date` <= '$coll_date[$k] 23:59:00'
				and collect_it ='1' and tshirt_size='XS';
				";
		
			$query=$this->db->query($sql);
			foreach($query->result() as $row)
			{
				echo $row->ID;
				$tot_date[$k][1]=$row->ID;
			}
			
		
	?>
	
	</td>
    <td align="center">
	<?
	
		$this->db->where("date",$coll_date[$k]);
		$query=$this->db->get("report");
		
		$query1=$this->db->get("tshirts");
		if($query->num_rows ==0 ){
		
		  foreach($query1->result() as $row1){
		   echo $row1->size_XS ;
		  }
		
		}
		
		foreach($query->result() as $row)
		{
			 
			 echo $row->tshirt_XS ;
			  
			 
		}
	?>
	</td>
	<?
	}
	?>
  </tr>
  <tr>
    <td>S</td>
    <td align="center"><?= $data['tshirt_S'] ?></td>
	<? for($k=1;$k<=$i;$k++)
	{
	?>
    <td align="center">
	<?
		
			$sql="select count(*) as ID from `participants2` 
				where `created_date` >= '$coll_date[$k] 00:00:00' and `created_date` <= '$coll_date[$k] 23:59:00'
				and collect_it ='1' and tshirt_size='S';
				";
		
			$query=$this->db->query($sql);
			foreach($query->result() as $row)
			{
				echo $row->ID;
				$tot_date[$k][2]=$row->ID;
			}
			
	?>
	
	</td>
    <td align="center">
	<?
		$this->db->where("date",$coll_date[$k]);
		$query=$this->db->get("report");
		
				$query1=$this->db->get("tshirts");
		if($query->num_rows ==0 ){
		
		  foreach($query1->result() as $row1){
		   echo $row1->size_S ;
		  }
		
		}
		
		foreach($query->result() as $row)
		{
			echo $row->tshirt_S ;
		}
	?>
	</td>
	<? } ?>
  </tr>
  <tr>
    <td>M</td>
    <td align="center"><?= $data['tshirt_M'] ?></td>
	<? for($k=1;$k<=$i;$k++)
	{
	?>
    <td align="center">
	
	<?
		
			$sql="select count(*) as ID from `participants2` 
				where `created_date` >= '$coll_date[$k] 00:00:00' and `created_date` <= '$coll_date[$k] 23:59:00'
				and collect_it ='1' and tshirt_size='M';
				";
		
			$query=$this->db->query($sql);
			foreach($query->result() as $row)
			{
				echo $row->ID;
				$tot_date[$k][3]=$row->ID;
			}
			
		
	?>
	
	</td>
    <td align="center"><?
		$this->db->where("date",$coll_date[$k]);
		$query=$this->db->get("report");
		
				$query1=$this->db->get("tshirts");
		if($query->num_rows ==0 ){
		
		  foreach($query1->result() as $row1){
		   echo $row1->size_M ;
		  }
		
		}
		
		foreach($query->result() as $row)
		{
			echo $row->tshirt_M ;
		}
	?></td>
	<? } ?>
  </tr>
  <tr>
    <td>L</td>
    <td align="center"><?= $data['tshirt_L'] ?></td>
	<? for($k=1;$k<=$i;$k++)
	{
	?>
    <td align="center">
	<?
		
			$sql="select count(*) as ID from `participants2` 
				where `created_date` >= '$coll_date[$k] 00:00:00' and `created_date` <= '$coll_date[$k] 23:59:00'
				and collect_it ='1' and tshirt_size='L';
				";
		
			$query=$this->db->query($sql);
			foreach($query->result() as $row)
			{
				echo $row->ID;
				$tot_date[$k][4]=$row->ID;
			}
		
	?>
	
	</td>
    <td align="center"><?
		$this->db->where("date",$coll_date[$k]);
		$query=$this->db->get("report");
		
				$query1=$this->db->get("tshirts");
		if($query->num_rows ==0 ){
		
		  foreach($query1->result() as $row1){
		   echo $row1->size_L ;
		  }
		
		}
		
		foreach($query->result() as $row)
		{
			echo $row->tshirt_L ;
		}
	?></td>
	<? } ?>
  </tr>
  <tr>
    <td>XL</td>
    <td align="center"><?= $data['tshirt_XL'] ?></td>
	<? for($k=1;$k<=$i;$k++)
	{
	?>
    <td align="center">
	
		<?
		
			$sql="select count(*) as ID from `participants2` 
				where `created_date` >= '$coll_date[$k] 00:00:00' and `created_date` <= '$coll_date[$k] 23:59:00'
				and collect_it ='1' and tshirt_size='XL';
				";
		
			$query=$this->db->query($sql);
			foreach($query->result() as $row)
			{
				echo $row->ID;
				$tot_date[$k][5]=$row->ID;
			}
		
	?>
	
	</td>
    <td align="center"><?
		$this->db->where("date",$coll_date[$k]);
		$query=$this->db->get("report");
		
		$query1=$this->db->get("tshirts");
		if($query->num_rows ==0 ){
		
		  foreach($query1->result() as $row1){
		   echo $row1->size_XL ;
		  }
		
		}
		foreach($query->result() as $row)
		{
			echo $row->tshirt_XL ;
		}
	?></td>
	<? } ?>
  </tr>
  <tr>
    <td>XXL</td>
    <td align="center"><?= $data['tshirt_XXL'] ?></td>
	<? for($k=1;$k<=$i;$k++)
	{
	?>
    <td align="center"><?
		
			$sql="select count(*) as ID from `participants2` 
				where `created_date` >= '$coll_date[$k] 00:00:00' and `created_date` <= '$coll_date[$k] 23:59:00'
				and collect_it ='1' and tshirt_size='XXL';
				";
		
			$query=$this->db->query($sql);
			foreach($query->result() as $row)
			{
				echo $row->ID;
				$tot_date[$k][6]=$row->ID;
			}
		
	?></td>
    <td align="center"><?
		$this->db->where("date",$coll_date[$k]);
		$query=$this->db->get("report");
		
				$query1=$this->db->get("tshirts");
		if($query->num_rows ==0 ){
		
		  foreach($query1->result() as $row1){
		   echo $row1->size_XXL ;
		  }
		
		}
		foreach($query->result() as $row)
		{
			echo $row->tshirt_XXL ;
		}
	?></td>
	<? } ?>
  </tr>
  <tr>
    <td>Total</td>
    <td align="center"><?= $data['tshirt_XS']+$data['tshirt_S']+$data['tshirt_M']+$data['tshirt_L']+$data['tshirt_XL']+$data['tshirt_XXL'] ?></td>
	<? for($k=1;$k<=$i;$k++)
	{
	?>
    <td align="center"><?
		
			echo $tot_date[$k][1]+$tot_date[$k][2]+$tot_date[$k][3]+$tot_date[$k][4]+$tot_date[$k][5]+$tot_date[$k][6];
		
	?></td>
    <td>&nbsp;</td>
	<? } ?>
  </tr>
  
  
  
  
  
  
  
  
  
   
  
   <tr>
    <td COLSPAN="2" align="centre"><strong>Supportive Parents T</strong></td>
   
	<? for($k=0;$k<$i;$k++)
	{
	?>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
	<?
	}
	?>
  </tr>
  
  
   <tr>
    <td>XS</td>
    <td align="center"> <?=  $psize_XS ;  ?> </td>
	<? for($k=1;$k<=$i;$k++)
	{
	?>
    <td align="center">
	
	<?   //$pcsize_XS ;
		$query=$this->db->query("Select SUM(`size_XS`) as sizecount  from `merchandise_details1` where  item_id=1 AND behalf_collect=1 AND `merchandise_date` >= '$coll_date[$k] 00:00:00' and `merchandise_date` <= '$coll_date[$k] 23:59:00'  ");
		foreach($query->result() as $row)
		{
		   
			if( $row->sizecount ==''){
			echo "-";
			}else{
			 echo $row->sizecount;
			}
			$tot_date_item1[$k][1]=$row->sizecount ; 
		}
	
	  ?>
	
	</td>
    <td align="center">
	 
	
	<?
	
	 if($k >= 1){
	   
		   $count_total1_XS =0;
		   for($j=1;$j<=$k;$j++){
		   $count_total1_XS = $count_total1_XS + $tot_date_item1[$j][1] ;
		   
		   }
	   
	  $count_total1_XS = $pusize_XS  -   $count_total1_XS ;
	  echo $count_total1_XS ;
	 } 
	
	
	
	?>
	
	</td>
	<?
	}
	?>
  </tr>
  <tr>
    <td>S</td>
    <td align="center"><?= $psize_S ?></td>
	<? for($k=1;$k<=$i;$k++)
	{
	?>
    <td align="center">
	<? //$pcsize_S ;  
	$query=$this->db->query("Select SUM(`size_S`) as sizecount  from `merchandise_details1` where  item_id=1 AND behalf_collect=1 AND `merchandise_date` >= '$coll_date[$k] 00:00:00' and `merchandise_date` <= '$coll_date[$k] 23:59:00'  ");
		foreach($query->result() as $row)
		{
		    
			if($row->sizecount == ''){
			echo "-";
			}else{
			echo $row->sizecount;
			}
			
			$tot_date_item1[$k][2]=$row->sizecount ; 
		}
	
	
	
	?>
	
	</td>
    <td align="center">
		<? // $pusize_S
		
		 if($k >= 1){
	   
		   $count_total1_S =0;
		   for($j=1;$j<=$k;$j++){
		   $count_total1_S = $count_total1_S + $tot_date_item1[$j][2] ;
		   
		   }
	   
		  $count_total1_S = $pusize_S  -   $count_total1_S ;
		  echo $count_total1_S ;
		  
		  
		 } 
				
		
		 ?>
	</td>
	<? } ?>
  </tr>
  <tr>
    <td>M</td>
    <td align="center"><?= $psize_M ?></td>
	<? for($k=1;$k<=$i;$k++)
	{
	?>
    <td align="center">
	
	<? //$pcsize_M ;
	
	$query=$this->db->query("Select SUM(`size_M`) as sizecount  from `merchandise_details1` where  item_id=1 AND behalf_collect=1 AND `merchandise_date` >= '$coll_date[$k] 00:00:00' and `merchandise_date` <= '$coll_date[$k] 23:59:00'  ");
		foreach($query->result() as $row)
		{
		    
			
			if($row->sizecount == ''){
			echo "-";
			}else{
			echo $row->sizecount;
			}
			
			$tot_date_item1[$k][3]=$row->sizecount ; 
		}
	
	
	  ?>
	
	</td>
    <td align="center">	<? //  $pusize_M 
		 if($k >= 1){
	   
		   $count_total1_M =0;
		   for($j=1;$j<=$k;$j++){
		   $count_total1_M = $count_total1_M + $tot_date_item1[$j][3] ;
		   
		   }
	   
		  $count_total1_M = $pusize_M  -   $count_total1_M ;
		  echo $count_total1_M ;
		  
		  
		 } 
	
	
	
	
	?></td>
	<? } ?>
  </tr>
  <tr>
    <td>L</td>
    <td align="center"><?= $psize_L ?></td>
	<? for($k=1;$k<=$i;$k++)
	{
	?>
    <td align="center">
	<?  // $pcsize_XL ; 
	$query=$this->db->query("Select SUM(`size_XL`) as sizecount  from `merchandise_details1` where  item_id=1 AND behalf_collect=1 AND `merchandise_date` >= '$coll_date[$k] 00:00:00' and `merchandise_date` <= '$coll_date[$k] 23:59:00'  ");
		foreach($query->result() as $row)
		{
		    
			if($row->sizecount==''){
			echo "-";
			}else{
			echo $row->sizecount;
			}
			
			$tot_date_item1[$k][4]=$row->sizecount ; 
		}
	
	
	 ?>
	
	</td>
    <td align="center">	<? //  $pusize_L
	
		 if($k >= 1){
	   
		   $count_total1_L =0;
		   for($j=1;$j<=$k;$j++){
		   $count_total1_L = $count_total1_L + $tot_date_item1[$j][4] ;
		   
		   }
	   
		  $count_total1_L = $pusize_L  -   $count_total1_L ;
		  echo $count_total1_L ;
		  
		  
		 } 
	
	
	
	 ?></td>
	<? } ?>
  </tr>
  <tr>
    <td>XL</td>
    <td align="center"><?= $psize_XL ?></td>
	<? for($k=1;$k<=$i;$k++)
	{
	?>
    <td align="center">
	
		<? // $pcsize_XL ;
		
		$query=$this->db->query("Select SUM(`size_XL`) as sizecount  from `merchandise_details1` where  item_id=1 AND behalf_collect=1 AND `merchandise_date` >= '$coll_date[$k] 00:00:00' and `merchandise_date` <= '$coll_date[$k] 23:59:00'  ");
		foreach($query->result() as $row)
		{
		    if($row->sizecount==''){
			echo "-";
			}else{
			echo $row->sizecount;
			}
			$tot_date_item1[$k][5]=$row->sizecount ; 
		}
	
		
		
		  ?>
	
	</td>
    <td align="center">	<? //  $pusize_XL

		 if($k >= 1){
	   
		   $count_total1_XL =0;
		   for($j=1;$j<=$k;$j++){
		   $count_total1_XL = $count_total1_XL + $tot_date_item1[$j][5] ;
		   
		   }
	   
		  $count_total1_XL = $pusize_XL  -   $count_total1_XL ;
		  echo $count_total1_XL ;
		  
		  
		 } 
	
	
	
	 ?></td>
	<? } ?>
  </tr>
 
  <tr>
    <td>Total</td>
    <td align="center"><?= $ptotal ?></td>
	<? for($k=1;$k<=$i;$k++)
	{
	?>
    <td align="center"> 
	<?
		//$pctotal
			echo $tot_date_item1[$k][1]+$tot_date_item1[$k][2]+$tot_date_item1[$k][3]+$tot_date_item1[$k][4]+$tot_date_item1[$k][5] ;
		
	?>
	</td>
    <td>&nbsp;</td>
	<? } ?>
  </tr>
  
  
  
  
  
  
  
  
  
   
  
   <tr>
    <td COLSPAN="2" align="centre"><strong>Looney Tunes Kids Festive T</strong></td>
   
	<? for($k=0;$k<$i;$k++)
	{
	?>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
	<?
	}
	?>
  </tr>
  
  
   <tr>
    <td>XS</td>
    <td align="center"> <?=  $lsize_XS ;  ?> </td>
	<? for($k=1;$k<=$i;$k++)
	{
	?>
    <td align="center">
	
	<? //  $lcsize_XS ; 
	$query=$this->db->query("Select SUM(`size_XS`) as sizecount  from `merchandise_details1` where  item_id=2 AND behalf_collect=1 AND `merchandise_date` >= '$coll_date[$k] 00:00:00' and `merchandise_date` <= '$coll_date[$k] 23:59:00'  ");
		foreach($query->result() as $row)
		{
		    if($row->sizecount==''){
			echo "-";
			}else{
			echo $row->sizecount;
			}
			$tot_date_item2[$k][1]=$row->sizecount ; 
		}
	
	
	  ?>
	
	</td>
    <td align="center">
	<? //$lusize_XS 
	
		 if($k >= 1){
	   
		   $count_total2_XS =0;
		   for($j=1;$j<=$k;$j++){
		   $count_total2_XS = $count_total2_XS + $tot_date_item2[$j][1] ;
		   
		   }
	   
		  $count_total2_XS = $lusize_XS  -   $count_total2_XS ;
		  echo $count_total2_XS ;
		  
		  
		 } 	
	
	
	?>
	</td>
	<?
	}
	?>
  </tr>
  <tr>
    <td>S</td>
    <td align="center"><?= $lsize_S ?></td>
	<? for($k=1;$k<=$i;$k++)
	{
	?>
    <td align="center">
	<? //$lcsize_S ; 
	
	$query=$this->db->query("Select SUM(`size_S`) as sizecount  from `merchandise_details1` where  item_id=2 AND behalf_collect=1 AND `merchandise_date` >= '$coll_date[$k] 00:00:00' and `merchandise_date` <= '$coll_date[$k] 23:59:00'  ");
		foreach($query->result() as $row)
		{
		   	if($row->sizecount==''){
			echo "-";
			}else{
			echo $row->sizecount;
			}
			$tot_date_item2[$k][2]=$row->sizecount ; 
		}
	
	 ?>
	
	</td>
    <td align="center">
		<? //  $lusize_S
		
		 if( $k >= 1){
	   
		   $count_total2_S =0;
		   
		   for($j=1;$j<=$k;$j++){
		   $count_total2_S = $count_total2_S + $tot_date_item2[$j][2] ;
		   
		   }
	   
		  $count_total2_S = $lusize_S  -   $count_total2_S ;
		  echo $count_total2_S ;
		  
		  
		 } 	
			
		
		
		 ?>
	</td>
	<? } ?>
  </tr>
  <tr>
    <td>M</td>
    <td align="center"><?= $lsize_M ?></td>
	<? for($k=1;$k<=$i;$k++)
	{
	?>
    <td align="center">
	
	<? // $lcsize_M ; 
	
	  	$query=$this->db->query("Select SUM(`size_M`) as sizecount  from `merchandise_details1` where  item_id=2 AND behalf_collect=1 AND `merchandise_date` >= '$coll_date[$k] 00:00:00' and `merchandise_date` <= '$coll_date[$k] 23:59:00'  ");
		foreach($query->result() as $row)
		{
		    if($row->sizecount==''){
			echo "-";
			}else{
			echo $row->sizecount;
			}
			$tot_date_item2[$k][3]=$row->sizecount ; 
		}
		
		
	  ?>
	
	</td>
    <td align="center">	<? //  $lusize_M 
	
	
		 if($k >= 1){
	   
		   $count_total2_M =0;
		   for($j=1;$j<=$k;$j++){
		   $count_total2_M = $count_total2_M + $tot_date_item2[$j][3] ;
		   
		   }
	   
		  $count_total2_M = $lusize_M -   $count_total2_M ;
		  echo $count_total2_M ;
		  
		  
		 } 
			
	
	
	
	?></td>
	<? } ?>
  </tr>
  <tr>
    <td>L</td>
    <td align="center"><?= $lsize_L ?></td>
	<? for($k=1;$k<=$i;$k++)
	{
	?>
    <td align="center">
	<? // $lcsize_L ;
	
		  	$query=$this->db->query("Select SUM(`size_L`) as sizecount  from `merchandise_details1` where  item_id=2 AND behalf_collect=1 AND `merchandise_date` >= '$coll_date[$k] 00:00:00' and `merchandise_date` <= '$coll_date[$k] 23:59:00'  ");
		foreach($query->result() as $row)
		{
		   	if($row->sizecount==''){
			echo "-";
			}else{
			echo $row->sizecount;
			}
			$tot_date_item2[$k][4]=$row->sizecount ; 
		}
		
	
	  ?>
	
	</td>
    <td align="center">	<? // $lusize_L
	
		 if($k >= 1){
	   
		   $count_total2_L =0;
		   for($j=1;$j<=$k;$j++){
		   $count_total2_L = $count_total2_L + $tot_date_item2[$j][4] ;
		   
		   }
	   
		  $count_total2_L = $lusize_L -   $count_total2_L ;
		  echo $count_total2_L ;
		  
		  
		 } 	
	
	
	
	 ?></td>
	<? } ?>
  </tr>
  <tr>
    <td>XL</td>
    <td align="center"><?= $lsize_XL ?></td>
	<? for($k=1;$k<=$i;$k++)
	{
	?>
    <td align="center">
	
		<? // $lcsize_XL ; 
		
			$query=$this->db->query("Select SUM(`size_XL`) as sizecount  from `merchandise_details1` where  item_id=2 AND behalf_collect=1 AND `merchandise_date` >= '$coll_date[$k] 00:00:00' and `merchandise_date` <= '$coll_date[$k] 23:59:00'  ");
		foreach($query->result() as $row)
		{
		    if($row->sizecount==''){
			echo "-";
			}else{
			echo $row->sizecount;
			}
			$tot_date_item2[$k][5]=$row->sizecount ; 
		}
		
		
		
		  ?>
	
	</td>
    <td align="center">	<? // $lusize_XL 
	
	
		 if($k >= 1){
	   
		   $count_total2_XL =0;
		   for($j=1;$j<=$k;$j++){
		   $count_total2_XL = $count_total2_XL + $tot_date_item2[$j][5] ;
		   
		   }
	   
		  $count_total2_XL = $lusize_XL -   $count_total2_XL ;
		  echo $count_total2_XL ;
		  
		  
		 } 		
	
	
	
	
	?></td>
	<? } ?>
  </tr>
  
    <tr>
    <td>XXL</td>
    <td align="center"><?= $lsize_XXL ?></td>
	<? for($k=1;$k<=$i;$k++)
	{
	?>
    <td align="center">
	
		<? // $lcsize_XXL ; 
			  	$query=$this->db->query("Select SUM(`size_XXL`) as sizecount  from `merchandise_details1` where  item_id=2 AND behalf_collect=1 AND `merchandise_date` >= '$coll_date[$k] 00:00:00' and `merchandise_date` <= '$coll_date[$k] 23:59:00'  ");
		foreach($query->result() as $row)
		{
		   	if($row->sizecount==''){
			echo "-";
			}else{
			echo $row->sizecount;
			}
			$tot_date_item2[$k][6]=$row->sizecount ; 
		}
		
		
		 ?>
	
	</td>
    <td align="center">	<? //  $lusize_XXL 
	
	
		 if($k >= 1){
	   
		   $count_total2_XXL =0;
		   for($j=1;$j<=$k;$j++){
		   $count_total2_XXL = $count_total2_XXL + $tot_date_item2[$j][6] ;
		   
		   }
	   
		  $count_total2_XXL = $lusize_XXL -   $count_total2_XXL ;
		  echo $count_total2_XXL ;
		  
		  
		 } 	
	
	
	
	
	?></td>
	<? } ?>
  </tr>
 
  <tr>
    <td>Total</td>
    <td align="center"><?= $ltotal ?></td>
	<? for($k=1;$k<=$i;$k++)
	{
	?>
    <td align="center"> 
	<?
		//$lctotal
			echo $tot_date_item2[$k][1]+$tot_date_item2[$k][2]+$tot_date_item2[$k][3]+$tot_date_item2[$k][4]+$tot_date_item2[$k][5] ;
		
	?>
	</td>
    <td>&nbsp;</td>
	<? } ?>
  </tr>
  
  
  
  
  
  <tr>
    <td COLSPAN="2" align="centre"><strong>Carnival Ticket</strong></td>
   
	<? for($k=0;$k<$i;$k++)
	{
	?>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
	<?
	}
	?>
  </tr>
  
  
   <tr>
    <td>Qty</td>
    <td align="center"> <?=  $item1_c ;  ?> </td>
	<? for($k=1;$k<=$i;$k++)
	{
	?>
    <td align="center">
	
	<? //   $item1_co ; 
	
		  	$query=$this->db->query("Select SUM(`item_1`) as sizecount  from `merchandise_details2` where    behalf_collect=1 AND `merchandise_date` >= '$coll_date[$k] 00:00:00' and `merchandise_date` <= '$coll_date[$k] 23:59:00'  ");
		foreach($query->result() as $row)
		{
		    if($row->sizecount==''){
			echo "-";
			}else{
			echo $row->sizecount;
			}
			$date_item_1[$k] =$row->sizecount ; 
		}
	
	 ?>
	
	</td>
    <td align="center">
	<? //  $item1_uc  
	

		 if($k >= 1){
	   
		   $count_item1_uc =0;
		   for($j=1;$j<=$k;$j++){
		   $count_item1_uc = $count_item1_uc + $date_item_1[$j] ;
		   
		   }
	   
		  $count_item1_uc = $item1_uc - $count_item1_uc ;
		  echo $count_item1_uc ;
		  
		  
		 } 	
		
	
	
	?>
	</td>
	<?
	}
	?>
  </tr>
  
  
  
  
  
    
  <tr>
    <td COLSPAN="2" align="centre"><strong>Looney Tunes Stationery Set</strong></td>
   
	<? for($k=0;$k<$i;$k++)
	{
	?>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
	<?
	}
	?>
  </tr>
  
  
   <tr>
    <td>Qty</td>
    <td align="center"> <?=  $item2_c ;  ?> </td>
	<? for($k=1;$k<=$i;$k++)
	{
	?>
    <td align="center">
	
	<? //   $item2_co ;
	
	  	$query=$this->db->query("Select SUM(`item_2`) as sizecount  from `merchandise_details2` where    behalf_collect=1 AND `merchandise_date` >= '$coll_date[$k] 00:00:00' and `merchandise_date` <= '$coll_date[$k] 23:59:00'  ");
		foreach($query->result() as $row)
		{
		   	if($row->sizecount==''){
			echo "-";
			}else{
			echo $row->sizecount;
			}
			$date_item_2[$k] =$row->sizecount ; 
		}
	  ?>
	
	</td>
    <td align="center">
 
	
<? //  $item2_uc  
	

		 if($k >= 1){
	   
		   $count_item2_uc =0;
		   for($j=1;$j<=$k;$j++){
		   $count_item2_uc = $count_item2_uc + $date_item_2[$j] ;
		   
		   }
	   
		  $count_item2_uc = $item2_uc - $count_item2_uc ;
		  echo $count_item2_uc ;
		  
		  
		 } 	
		
	
	
	?>	
	
	
	</td>
	<?
	}
	?>
  </tr>
  
  
  
  
  
    
  <tr>
    <td COLSPAN="2" align="centre"><strong>Tweety Shoulder Bag</strong></td>
   
	<? for($k=0;$k<$i;$k++)
	{
	?>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
	<?
	}
	?>
  </tr>
  
  
   <tr>
    <td>Qty</td>
    <td align="center"> <?=  $item3_c ;  ?> </td>
	<? for($k=1;$k<=$i;$k++)
	{
	?>
    <td align="center">
	
	<? //   $item3_co ;
	  	$query=$this->db->query("Select SUM(`item_3`) as sizecount  from `merchandise_details2` where    behalf_collect=1 AND `merchandise_date` >= '$coll_date[$k] 00:00:00' and `merchandise_date` <= '$coll_date[$k] 23:59:00'  ");
		foreach($query->result() as $row)
		{
		   	if($row->sizecount==''){
			echo "-";
			}else{
			echo $row->sizecount;
			}
			$date_item_3[$k] =$row->sizecount ; 
		}
	
	  ?>
	
	</td>
    <td align="center">
	<? // $item3_uc
	

		 if($k >= 1){
	   
		   $count_item3_uc =0;
		   for($j=1;$j<=$k;$j++){
		   $count_item3_uc = $count_item3_uc + $date_item_3[$j] ;
		   
		   }
	   
		  $count_item3_uc = $item3_uc - $count_item3_uc ;
		  echo $count_item3_uc ;
		  
		  
		 } 	
		
		
	
	
	 ?>
	</td>
	<?
	}
	?>
  </tr>
  
  
  
  
  
  
     
  <tr>
    <td COLSPAN="2" align="centre"><strong>Bugs Bunny Shopping Bag</strong></td>
   
	<? for($k=0;$k<$i;$k++)
	{
	?>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
	<?
	}
	?>
  </tr>
  
  
   <tr>
    <td>Qty</td>
    <td align="center"> <?=  $item4_c ;  ?> </td>
	<? for($k=1;$k<=$i;$k++)
	{
	?>
    <td align="center">
	
	<? //  $item4_co ; 
	
	  	$query=$this->db->query("Select SUM(`item_4`) as sizecount  from `merchandise_details2` where    behalf_collect=1 AND `merchandise_date` >= '$coll_date[$k] 00:00:00' and `merchandise_date` <= '$coll_date[$k] 23:59:00'  ");
		foreach($query->result() as $row)
		{
		   	if($row->sizecount==''){
			echo "-";
			}else{
			echo $row->sizecount;
			}
			$date_item_4[$k] =$row->sizecount ; 
		}
	
	 ?>
	
	</td>
    <td align="center">
	<? // $item4_uc 
	
	
		 if($k >= 1){
	   
		   $count_item4_uc =0;
		   for($j=1;$j<=$k;$j++){
		   $count_item4_uc = $count_item4_uc + $date_item_4[$j] ;
		   
		   }
	   
		  $count_item4_uc = $item4_uc - $count_item4_uc ;
		  echo $count_item4_uc ;
		  
		  
		 } 	
		
		
		
	
	
	
	?>
	</td>
	<?
	}
	?>
  </tr>
  
  
  
     
  <tr>
    <td COLSPAN="2" align="centre"><strong>Looney Tunes Frosted Glass Mug</strong></td>
   
	<? for($k=0;$k<$i;$k++)
	{
	?>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
	<?
	}
	?>
  </tr>
  
  
   <tr>
    <td>Qty</td>
    <td align="center"> <?=  $item5_c ;  ?> </td>
	<? for($k=1;$k<=$i;$k++)
	{
	?>
    <td align="center">
	
	<? //   $item5_co ; 
	  	$query=$this->db->query("Select SUM(`item_5`) as sizecount  from `merchandise_details2` where    behalf_collect=1 AND `merchandise_date` >= '$coll_date[$k] 00:00:00' and `merchandise_date` <= '$coll_date[$k] 23:59:00'  ");
		foreach($query->result() as $row)
		{
		   	if($row->sizecount==''){
			echo "-";
			}else{
			echo $row->sizecount;
			}
			$date_item_5[$k] =$row->sizecount ; 
		}
	
	 ?>
	
	</td>
    <td align="center">
	<? //$item5_uc 
	
	
		 if($k >= 1){
	   
		   $count_item5_uc =0;
		   for($j=1;$j<=$k;$j++){
		   $count_item5_uc = $count_item5_uc + $date_item_5[$j] ;
		   
		   }
	   
		  $count_item5_uc = $item5_uc - $count_item5_uc ;
		  echo $count_item5_uc ;
		  
		  
		 } 	
		
			
	
	
	?>
	</td>
	<?
	}
	?>
  </tr>
  
  
     
  <tr>
    <td COLSPAN="2" align="centre"><strong>Looney Tunes Clear Glass Mug</strong></td>
   
	<? for($k=0;$k<$i;$k++)
	{
	?>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
	<?
	}
	?>
  </tr>
  
  
   <tr>
    <td>Qty</td>
    <td align="center"> <?=  $item6_c ;  ?> </td>
	<? for($k=1;$k<=$i;$k++)
	{
	?>
    <td align="center">
	
	<? //$item6_co ; 
	  	$query=$this->db->query("Select SUM(`item_6`) as sizecount  from `merchandise_details2` where    behalf_collect=1 AND `merchandise_date` >= '$coll_date[$k] 00:00:00' and `merchandise_date` <= '$coll_date[$k] 23:59:00'  ");
		foreach($query->result() as $row)
		{
		    if($row->sizecount==''){
			echo "-";
			}else{
			echo $row->sizecount;
			}
			$date_item_6[$k] =$row->sizecount ; 
		}
	
	  ?>
	
	</td>
    <td align="center">
	<? //  $item6_uc 
	
	
		 if($k >= 1){
	   
		   $count_item6_uc =0;
		   for($j=1;$j<=$k;$j++){
		   $count_item6_uc = $count_item6_uc + $date_item_6[$j] ;
		   
		   }
	   
		  $count_item6_uc = $item6_uc - $count_item6_uc ;
		  echo $count_item6_uc ;
		  
		  
		 } 	
			
	
	
	
	?>
	</td>
	<?
	}
	?>
  </tr>
  
  
     
  <tr>
    <td COLSPAN="2" align="centre"><strong>Tweety Mug in Savings Tin</strong></td>
   
	<? for($k=0;$k<$i;$k++)
	{
	?>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
	<?
	}
	?>
  </tr>
  
  
   <tr>
    <td>Qty</td>
    <td align="center"> <?=  $item7_c ;  ?> </td>
	<? for($k=1;$k<=$i;$k++)
	{
	?>
    <td align="center">
	
	<? // $item7_co ;
	
	  	$query=$this->db->query("Select SUM(`item_7`) as sizecount  from `merchandise_details2` where    behalf_collect=1 AND `merchandise_date` >= '$coll_date[$k] 00:00:00' and `merchandise_date` <= '$coll_date[$k] 23:59:00'  ");
		foreach($query->result() as $row)
		{
		    if($row->sizecount==''){
			echo "-";
			}else{
			echo $row->sizecount;
			}
			$date_item_7[$k] =$row->sizecount ; 
		}
	
	  ?>
	
	</td>
    <td align="center">
	<? //  $item7_uc
	
	
		 if($k >= 1){
	   
		   $count_item7_uc =0;
		   for($j=1;$j<=$k;$j++){
		   $count_item7_uc = $count_item7_uc + $date_item_7[$j] ;
		   
		   }
	   
		  $count_item7_uc = $item7_uc - $count_item7_uc ;
		  echo $count_item7_uc ;
		  
		  
		 } 	
			
		
	
	 ?>
	</td>
	<?
	}
	?>
  </tr>
  
  
  
  
 
 
</table>
<a href="<?= $base ?>/index.php/admin/report_export_inventory/">Export To Excel</a>
		</div>
	</div>
</div>
  
	   