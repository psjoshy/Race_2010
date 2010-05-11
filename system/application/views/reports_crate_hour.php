<div id="content-wrapper">
    		<div id="main">
				<div class="main_content">
	<h2>Collection Rate (Hourly) Report</h2>
	<form action="<?= $base ?>/index.php/admin/report_hour" method="post"><span>
	
	
	<?	
	
	$this->db->where("collect_it","1");
	$myquery=$this->db->get("participants2");
	if($myquery->num_rows() == 0 )
	{
		echo "There is no collect";
	
	}
	else
	{
		echo '<select name="date">';
		$datechk="";
		if(isset($curr_date))
		{
			$datechk=$curr_date;
		}
		foreach($query as $row)
		{
			$date=split(" ",$row->created_date);
			
			if(!(isset($curr_date)))
			{
				$curr_date=$date[0];
			}
		
			if($tmp!=$date[0])
			{
				$tmp=$date[0];
				$chk="";
				if($date[0]==$datechk)
				{
					$chk="selected";
				}
				echo "<option value='".$date[0]."'".$chk." >".$date[0]."</option>";
			}
		}
		
		
		?>
					</select></span> <input type="submit" value="Show" /></form>

		<table border="1" style="position: relative; margin-top: 10px; margin-left: auto; margin-right: auto;">
			<tr style="font-weight: bold;">
				<td>Time</td>
				<?
				for($i=1;$i<=20;$i++)
				{
					echo "<td align='center' >C$i</td>";
				}
				?>
				<td>Total</td>

			</tr>
			
			<?
			
			$counter[21]=0;
			$k=0;
			//$tmp="00:00";
			$hur_tmp=0;//hour
			$min_tmp=0;//minute
			$this->load->model("Report");
			foreach($query2 as $row)
			{
				
				$start_date=$row->created_date;
				
				$date=split(" ",$row->created_date);
				$time=split(":",$date[1]);
				
							
				//$tmp=split(":",$tmp);
				
				$time=split(":",$date[1]);
				
				
				if(($hur_tmp<=$time[0]) or ($k==0))
				{
					$min_tmp2=($hur_tmp*60)+$min_tmp;
					$time1_tmp2=($time[0]*60)+$time[1];
					
					if(($min_tmp2<$time1_tmp2) or ($k==0))
					{
						
				
						//echo "<tr>";
						$mytd="<tr>";
						
						if($k==0)
						{
							$time[1]=$time[1]+60;
							if($time[1] > 59)
							{
								$time[1]=$time[1]-60;
								$time[0]=$time[0]+1;
							}
				
							if((int)$time[1]<10)
							{
								$time[1]="0".(int)$time[1];
							}
							
							if((int)$time[0]<10)
							{
								$time[0]="0".(int)$time[0];
							}
							
							
						
							$end_date=$date[0]." ".$time[0].":".$time[1].":00";
												
							
							//echo "<td align='center'>".substr($date[1],0,-3)." - ".$time[0].":".$time[1]."</td>";
							$mytd=$mytd."<td align='center'>".substr($date[1],0,-3)." - ".$time[0].":".$time[1]."</td>";
						}
						else
						{
							$min_tmp=$min_tmp+1;
							if($min_tmp>59)
							{
								$min_tmp=$min_tmp-60;
								$hur_tmp=$hur_tmp+1;
							}
							
							$start_date=$date[0]." ".$hur_tmp.":".$min_tmp.":00";
							$time[1]=$min_tmp+59;
							if($time[1] > 59)
							{
								$time[1]=$time[1]-60;
								$time[0]=$time[0]+1;
							}
				
							if((int)$time[1]<10)
							{
								$time[1]="0".(int)$time[1];
							}						
							
							if((int)$time[0]<10)
							{
								$time[0]="0".(int)$time[0];
							}
							if((int)$hur_tmp<10)
							{
								$hur_tmp="0".(int)$hur_tmp;
							}
							if((int)$min_tmp<10)
							{
								$min_tmp="0".(int)$min_tmp;
							}
							
							$time[0]=$hur_tmp+1;
							$time[1]=$min_tmp;
							
							if($time[0] > 24)
							{
								$time[1]=$time[1]-24;
							}
							
							
							if((int)$time[0]<10)
							{
								$time[0]="0".(int)$time[0];
							}
							
							if((int)$time[1]<10)
							{
								$time[1]="0".(int)$time[1];
							}
							
							$end_date=$date[0]." ".$time[0].":".$time[1].":00";
							
							
							//echo "<td align='center'>".$hur_tmp.":".$min_tmp." - ".$time[0].":".$time[1]."</td>";
							$mytd=$mytd."<td align='center'>".$hur_tmp.":".$min_tmp." - ".$time[0].":".$time[1]."</td>";
							
						}
		
						
						$tot=0;
						for($i=1;$i<=20;$i++)
						{
						        if(!(isset($counter[$i])))
							{
								$counter[$i]=0;
							}
							$count=$this->Report->get_counter_count($start_date,$end_date,$i);
							$counter[$i]=$counter[$i]+$count;
							//echo "<td align='center'>$count</td>";
							$mytd=$mytd."<td align='center'>$count</td>";
							$tot=$tot+$count;
						}
						$counter[21]=$counter[21]+$tot;
						//echo "<td align='center'>$tot</td>";
						//echo "</tr>";
						$mytd=$mytd."<td align='center'>$tot</td>";
						$mytd=$mytd."</tr>";
						
						$hur_tmp=(int)$time[0];
						$min_tmp=(int)$time[1];
						
						if($tot>0)
						{
							echo $mytd;
						}
						
					}
					
					
				}
				
				$k=$k+1;
				
			}
			?>
			<!--</tr> -->
			<tr>
				<td>
						<b>Total</b>
				</td>
				<?php
				for($i=1;$i<=21;$i++)
				{
				  echo "<td align='center'>$counter[$i]</td>";
				}
				?>
				
		</tr>
				</table>
			<a href="<?= $base ?>/index.php/admin/report_export_hour/<?= $curr_date ?>">Export To Excel</a>
	<?
	}
	?>
	
</div>    		
</div>	
    	</div>