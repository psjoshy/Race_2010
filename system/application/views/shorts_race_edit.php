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
		
	foreach ($query as $row)
	{
		
	?>
	<form method="post" action="<?= $base ?>/index.php/admin/shorts_edit_racepack/<?= $id ?>">
				<table>
			<tr>

				<td>Quantity</td>
				<td><input type="text" name="quantity" id="quantity" value="<?= $row->quantity ?>" /></td>
			</tr>
			<tr>
				<td colspan="2">
					<input type="hidden" name="modified_date" value="<?= date("Y-m-d") ?>">
					<input type="hidden" name="modified_by" value="<?= $this->session->userdata("id") ?>" >
					<input type="submit" name="" id="submit" value="Update" />
				</td>

			</tr>
		</table>
	</form>
	<?
	}
	?>
</div>    		</div>	
    	</div>
