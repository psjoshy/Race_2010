 <div id="content-wrapper">
    		<div id="main">
				<div class="main_content">
	<h2>Racepack Collected</h2>

	
	<div id="detail_show">
	<table>
	<?
	foreach($query as $row)
	{
		echo "<tr><td><b>Name:</b></td><td> ".$row->fullname."</td></tr>";
		echo "<tr><td><b>IC No:</b></td><td> ".$row->nric."</td></tr>";
		echo "<tr><td><b>Collected Date/Time:</b></td><td> ".date("d F 'y H:i:s",strtotime($row->created_date))."</td></tr>";
		echo "<tr><td><b>Counter:</b></td><td> ".$row->counter."</td></tr>";
		echo "<tr><td><b>RPC:</b></td><td> ".$row->created_by."</td></tr>";
		echo "<tr><td><b>Remark:</b></td><td> &nbsp; </td></tr>";
		echo "<tr><td colspan='2'>".$row->remark."</td></tr>";

	}
	?>
	</table>
	</div>
	

<br/>
<input type="button" value="Back" onclick="javascript:window.location='<?= $base ?>/index.php/collect/search/1'" />
	</div>
</div>
</div>
