<?
	header('Content-type: application/octet-stream');
	header('Content-Disposition: attachment; filename="report_15min.csv"');
	
	
	$column = "Time,C1,C2,C3,C4,C5,C6,C7,C8,C9,C10,C11,C12,C13,C14,C15,C16,C17,C18,C19,C20,Total\n";
	$k=0;
	//$tmp="00:00";
	$hur_tmp=0;//hour
	$min_tmp=0;//minute
	$counter[21]=0;
	$this->load->model("Report");	
	foreach($query as $row)
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
					if($k==0)
					{
						$time[1]=$time[1]+15;
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
						
						if(!(isset($column1)))
						{
							$column1="";
						}
						$column1=$column1.substr($date[1],0,-3)." - ".$time[0].":".$time[1].",";
					}
					else
					{
							$min_tmp=$min_tmp+1;
							if($min_tmp>59)
							{
								$min_tmp=$min_tmp-60;
								$hur_tmp=$hur_tmp+1;
							}
							
							//$start_date=$date[0]." ".$hur_tmp.":".$min_tmp.":00";
							$mytmp=$time[0];
							$time[0]=$hur_tmp;
							
							$time[1]=$min_tmp+15;
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
							
							$start_date=$date[0]." ".$hur_tmp.":".$min_tmp;
							
							
							
						$end_date=$date[0]." ".$time[0].":".$time[1].":00";
						
						$column1=$column1.$hur_tmp.":".$min_tmp." - ".$time[0].":".$time[1].",";
						
						if(($time[0]+1)<=$mytmp)
							{
								$time[1]=-1;
							}
							$time[0]=$mytmp;
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
						$column1=$column1.$count.",";
						$tot=$tot+$count;
					}
					$counter[21]=$counter[21]+$tot;
					$column1=$column1.$tot."\n";
					
					if($tot>0)
					{
						$column=$column.$column1;
					
					}
					
						$column1="";
					
					
					$hur_tmp=(int)$time[0];
					$min_tmp=(int)$time[1];
					
				}
				
				
		}
			
			$k=$k+1;
			
	}
		
	$column=$column."Total,";
	for($i=1;$i<=20;$i++)
	{
		$column=$column.$counter[$i].",";
	}
	
	$column=$column.$counter[21]."\n";
	
	echo $column;

	?>
		