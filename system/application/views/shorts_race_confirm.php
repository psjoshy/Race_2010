<div id="content-wrapper">
    		<div id="main">
				<div class="main_content">
	<h2>Confirm Race Packs Quantity</h2>
	<?
		if(isset($res))
		{
			if($res!="")
			{
				echo $res;
			}
		}
		
	$val="";
	foreach($query as $row)
	{
		$val=$row->quantity ;
	}
	?>
	
	<form method="post" action="<?= $base ?>/index.php/admin/shorts_confrim_racepack">
				<table>
			<tr>

				<td>Quantity</td>
				<td><input type="text" name="quantity" id="quantity" value="<?= $val ?>"  /></td>
			</tr>
			<tr>
				<td colspan="2">
					<input type="hidden" name="type" value="shorts">
					<input type="hidden" name="created_date" value="<?= date("Y-m-d") ?>">
					<input type="hidden" name="created_by" value="<?= $this->session->userdata("id") ?>" >
					<input type="submit" name="" id="submit" value="Initialise" /> <span class="warning">This function can only be used once.</span>
				</td>

			</tr>
		</table>
	</form>
	
</div>    		</div>	
    	</div>
