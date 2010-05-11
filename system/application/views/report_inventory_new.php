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
		<table width="100%" border="1" cellpadding="1" cellspacing="0">
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
	
	<?=   $pcsize_XS ;  ?>
	
	</td>
    <td align="center">
	<?=  $pusize_XS ?>
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
	<?=$pcsize_S ;  ?>
	
	</td>
    <td align="center">
		<?=  $pusize_S ?>
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
	
	<?=$pcsize_M ;  ?>
	
	</td>
    <td align="center">	<?=  $pusize_M ?></td>
	<? } ?>
  </tr>
  <tr>
    <td>L</td>
    <td align="center"><?= $psize_L ?></td>
	<? for($k=1;$k<=$i;$k++)
	{
	?>
    <td align="center">
	<?= $pcsize_XL ;  ?>
	
	</td>
    <td align="center">	<?=  $pusize_L ?></td>
	<? } ?>
  </tr>
  <tr>
    <td>XL</td>
    <td align="center"><?= $psize_XL ?></td>
	<? for($k=1;$k<=$i;$k++)
	{
	?>
    <td align="center">
	
		<?= $pcsize_XL ;  ?>
	
	</td>
    <td align="center">	<?=  $pusize_XL ?></td>
	<? } ?>
  </tr>
 
  <tr>
    <td>Total</td>
    <td align="center"><?= $ptotal ?></td>
	<? for($k=1;$k<=$i;$k++)
	{
	?>
    <td align="center"><?= $pctotal ?></td>
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
	
	<?=   $lcsize_XS ;  ?>
	
	</td>
    <td align="center">
	<?=  $lusize_XS ?>
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
	<?=$lcsize_S ;  ?>
	
	</td>
    <td align="center">
		<?=  $lusize_S ?>
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
	
	<?=$lcsize_M ;  ?>
	
	</td>
    <td align="center">	<?=  $lusize_M ?></td>
	<? } ?>
  </tr>
  <tr>
    <td>L</td>
    <td align="center"><?= $lsize_L ?></td>
	<? for($k=1;$k<=$i;$k++)
	{
	?>
    <td align="center">
	<?= $lcsize_XL ;  ?>
	
	</td>
    <td align="center">	<?=  $lusize_L ?></td>
	<? } ?>
  </tr>
  <tr>
    <td>XL</td>
    <td align="center"><?= $lsize_XL ?></td>
	<? for($k=1;$k<=$i;$k++)
	{
	?>
    <td align="center">
	
		<?= $lcsize_XL ;  ?>
	
	</td>
    <td align="center">	<?=  $lusize_XL ?></td>
	<? } ?>
  </tr>
  
    <tr>
    <td>XXL</td>
    <td align="center"><?= $lsize_XXL ?></td>
	<? for($k=1;$k<=$i;$k++)
	{
	?>
    <td align="center">
	
		<?= $lcsize_XXL ;  ?>
	
	</td>
    <td align="center">	<?=  $lusize_XXL ?></td>
	<? } ?>
  </tr>
 
  <tr>
    <td>Total</td>
    <td align="center"><?= $ltotal ?></td>
	<? for($k=1;$k<=$i;$k++)
	{
	?>
    <td align="center"><?= $lctotal ?></td>
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
    <td>XS</td>
    <td align="center"> <?=  $item1_c ;  ?> </td>
	<? for($k=1;$k<=$i;$k++)
	{
	?>
    <td align="center">
	
	<?=   $item1_co ;  ?>
	
	</td>
    <td align="center">
	<?=  $item1_uc ?>
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
    <td>XS</td>
    <td align="center"> <?=  $item2_c ;  ?> </td>
	<? for($k=1;$k<=$i;$k++)
	{
	?>
    <td align="center">
	
	<?=   $item2_co ;  ?>
	
	</td>
    <td align="center">
	<?=  $item2_uc ?>
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
    <td>XS</td>
    <td align="center"> <?=  $item3_c ;  ?> </td>
	<? for($k=1;$k<=$i;$k++)
	{
	?>
    <td align="center">
	
	<?=   $item3_co ;  ?>
	
	</td>
    <td align="center">
	<?=  $item3_uc ?>
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
    <td>XS</td>
    <td align="center"> <?=  $item4_c ;  ?> </td>
	<? for($k=1;$k<=$i;$k++)
	{
	?>
    <td align="center">
	
	<?=   $item4_co ;  ?>
	
	</td>
    <td align="center">
	<?=  $item4_uc ?>
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
    <td>XS</td>
    <td align="center"> <?=  $item5_c ;  ?> </td>
	<? for($k=1;$k<=$i;$k++)
	{
	?>
    <td align="center">
	
	<?=   $item5_co ;  ?>
	
	</td>
    <td align="center">
	<?=  $item5_uc ?>
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
    <td>XS</td>
    <td align="center"> <?=  $item6_c ;  ?> </td>
	<? for($k=1;$k<=$i;$k++)
	{
	?>
    <td align="center">
	
	<?=   $item6_co ;  ?>
	
	</td>
    <td align="center">
	<?=  $item6_uc ?>
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
    <td>XS</td>
    <td align="center"> <?=  $item7_c ;  ?> </td>
	<? for($k=1;$k<=$i;$k++)
	{
	?>
    <td align="center">
	
	<?=   $item7_co ;  ?>
	
	</td>
    <td align="center">
	<?=  $item7_uc ?>
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
  
	   