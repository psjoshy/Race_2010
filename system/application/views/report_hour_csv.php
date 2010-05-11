<?
	header('Content-type: application/octet-stream');
	header('Content-Disposition: attachment; filename="report_15min.csv"');
	
	$this->load->helper('file');
	$output_path = $base.'/report_15.csv'; 
	$column = "Time,C1,C2,C3,C4,C5,C6,C7,C8,C9,C10,C11,C12,C13,C14,C15,C16,C17,C18,C19,C20,Total\n";
	$k=0;
	//$tmp="00:00";
	$hur_tmp=0;//hour
	$min_tmp=0;//minute
	$this->load->model("Report");
	foreach($query as $row)
	{
			
		$start_date=$row->created_date;
		$date=split(" ",$row->created_date);
		$time=split(":",$date[1]);
	
		//$tmp=split(":",$tmp);
			
		$time=split(":",$date[1]);
			
		if(($hur_tmp<$time[0]) or ($k==0))
		{
			if(($min_tmp<=$time[1]) or ($k==0))
			{
			
					
				if($k==0)
				{
					$time[1]=$time[1]+60;
					if($time[1] > 59)
					{
						$time[1]=$time[1]-60;
						$time[0]=$time[0]+1;
					}
			
					$end_date=$date[0]." ".$time[0].":".$time[1].":00";
					$column=$column.substr($date[1],0,-3)." - ".$time[0].":".$time[1].",";
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
						$time[1]=$min_tmp+60;
						if($time[1] > 59)
						{
							$time[1]=$time[1]-60;
							$time[0]=$time[0]+1;
						}
			
												
						$end_date=$date[0]." ".$time[0].":".$time[1].":00";
						
						$column=$column.$hur_tmp.":".$min_tmp." - ".$time[0].":".$time[1].",";;
					}
	
					$tot=0;
					for($i=1;$i<=20;$i++)
					{
						$count=$this->Report->get_counter_count($start_date,$end_date,$i);
						$column=$column.$count.",";
						$tot=$tot+$count;
					}
					$column=$column.$tot."\n";
										
					$hur_tmp=$time[0];
					$min_tmp=$time[1];
					
				}
				
				
			}
			
			$k=$k+1;
			
		}
		

	echo $column;

	?>
		